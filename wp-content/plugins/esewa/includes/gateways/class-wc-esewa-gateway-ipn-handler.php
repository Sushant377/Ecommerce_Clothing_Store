<?php

defined( 'ABSPATH' ) || exit;

include_once dirname( __FILE__ ) . '/class-wc-esewa-gateway-response.php';

class WC_Esewa_Gateway_IPN_Handler extends WC_Esewa_Gateway_Response {

    protected $gateway;

    public function __construct( $gateway ) {
        add_action( 'woocommerce_api_wc_esewa_gateway', array( $this, 'check_response' ) );
        add_action( 'valid-esewa-standard-ipn-request', array( $this, 'valid_response' ) );

        $this->gateway = $gateway;
    }

    // check response of esewa
    public function check_response() {
        if ( ! empty( $_REQUEST ) && isset( $_REQUEST['data'] ) ) {

            // Decode of eSewa response
            $decoded_esewa_data = json_decode( base64_decode( $_REQUEST['data'] ), true );

            if ( $this->validate_ipn( $decoded_esewa_data ) ) {
                do_action( 'valid-esewa-standard-ipn-request', $decoded_esewa_data);
                exit;
            }
        }
        wp_die( 'eSewa Request Failure', 'eSewa IPN', array( 'response' => 500 ) );
    }   

    // Validate Instant Payment notification
    public function validate_ipn( $esewa_data ) {
        WC_Esewa_Gateway::log( 'Checking IPN response is valid' );
        if ( isset( $esewa_data['transaction_uuid']) && isset( $esewa_data['total_amount'] ) ) {
            $order = $this->get_esewa_order( $esewa_data['transaction_uuid'] );
            $esewa_data['total_amount'] = wc_format_decimal($esewa_data['total_amount'], 1);
            if ( $order && wc_format_decimal($order->get_total(), 1) !== $esewa_data['total_amount'] ) {
                WC_Esewa_Gateway::log( 'Amount alert: eSewa amount do not match (sent "' . $order->get_total() . '" | returned "' . $esewa_data['total_amount'] . '").', 'alert' );
                $esewa_data['total_amount'] = wc_format_decimal($order->get_total(), 1);
            }
        } else {
            WC_Esewa_Gateway::log( 'no transactio uuid' );
            return false;
        }
        // Check valid signature
        $merchant_signature = $this->generate_signature( $esewa_data );
        $esewa_signature = $esewa_data['signature'];
        if ( $merchant_signature === $esewa_signature ) {
            WC_Esewa_Gateway::log( 'Response signature does match' );
            return true;
        } else {
            WC_Esewa_Gateway::log( 'Response signature does not match' );
            return false;
        }
    }

    // Validate response of esewa
    public function valid_response( $esewa_data ) {
        $order = isset( $esewa_data['transaction_uuid']) ? $this->get_esewa_order($esewa_data['transaction_uuid']) : false;

        if ( $order ) {
            WC_Esewa_Gateway::log( 'Found order #' . $order->get_id() );

            // Cancel status status check event
            $this->esewa_cancel_status_check_event($order->get_id());

            $payment_status = 'failed';
            if ( isset( $esewa_data['status'] ) && $esewa_data['status'] === 'COMPLETE') {
                $payment_status = 'completed';
            }

            WC_Esewa_Gateway::log( 'Payment status: ' . $payment_status . 'for order #' . $order->get_id() ); 

            if ( method_exists( $this, 'payment_status_' . $payment_status ) ) {
                call_user_func ( array( $this, 'payment_status_' . $payment_status ), $order, $esewa_data );
                wp_safe_redirect( esc_url_raw( add_query_arg ( 'utm_nooverride', '1', $this->gateway->get_return_url( $order ) ) ) );
                exit;
            }

        } else {
            WC_Esewa_Gateway::log('Order not found for order ID ' . $esewa_data['transaction_uuid']);
            wp_safe_redirect(esc_url_raw(home_url('/error-page')));
            exit;
        }
    }

    // Cancel status check event
    public function esewa_cancel_status_check_event($order_id) {
        $scheduled = wp_next_scheduled('esewa_payment_status_check_event', array($order_id));

        if ( $scheduled ) {
            // Cancel the scheduled status check event when the order status changes
            wp_clear_scheduled_hook('esewa_payment_status_check_event', array($order_id));
            WC_Esewa_Gateway::log('Cancelled scheduled event for order ID: ' . $order_id);
        }
    }

    // Change paymen status to when response is valid
    protected function payment_status_completed( $order, $esewa_data ) {
        if ( $order->has_status( wc_get_is_paid_statuses() ) ) {
            WC_Esewa_Gateway::log( 'Aborting, Order #' . $order->get_id() . ' is already complete.' );
            exit;
        }
        
        if ( $order->has_status( 'cancelled' ) ) {
            WC_Esewa_Gateway::log( 'Already Cancelled order: #' . $order->get_id );
            $this->payment_status_paid_cancelled_order( $order );
        }

        $this->payment_complete( $order, ( ! empty( $esewa_data['transaction_code']) ? wc_clean( $esewa_data['transaction_code'] ) : ''), __( 'IPN payment completed', 'esewa-woocommerce'));

        if ( ! empty( $esewa_data['transaction_code'] ) ) {
            update_post_meta( $order->get_id(), 'eSewa Reference Code', wc_clean( $esewa_data['transaction_code'] ) );
        }
    }

    // Change status to failed
    protected function payment_status_failed( $order ) {
        $order->update_status( 'failed', __('Payment failed via IPN', 'esewa-woocommerce') );
        WC_Esewa_Gateway::log('order ID: ' . $order->get_id() . 'failed');
    }

    // Create Email to Send Admin for Cancelled Order
    protected function payment_status_paid_cancelled_order( $order ) {
        WC_Esewa_Gateway::log( 'Preparing Nofication for cancelled order #' . $order->get_id());
        $this->send_ipn_email_notification(
            sprintf( __( 'Payment for cancelled order %s received', 'esewa-woocommerce' ), esc_url( $order->get_edit_order_url() ) ),
            sprintf( __( 'Order #%s has been marked paid by eSewa IPN, but was previously cancelled. Admin handling required.', 'esewa-woocommerce' ), $order->get_order_number() )
        );
    }

    // Send email when payment is done but order is cancelled
    protected function send_ipn_email_notification( $subject, $message) {
        $new_setting_order = get_option( 'woocommerce_new_order_settings', array() );
        $mailer = WC()->mailer();
        $message = $mailer->wrap_message( $subject, $message);
        $esewa_woocommerce_settings = get_option( 'woocommerce_esewa_settings' );

        if (! empty($esewa_woocommerce_settings['ipn_notification'] && 'no' === $esewa_woocommerce_settings['ipn_notification'] ) ) {
            WC_Esewa_Gateway::log( 'IPN email notifaction in disable.' );
            return;
        }
        WC_Esewa_Gateway::log( 'Sending IPN Email' );
        if($mailer->send( ! empty( $new_setting_order['recipient'] ) ? $new_setting_order['recipient'] : get_option( 'admin_email' ), strip_tags( $subject), $message) ) {
            WC_Esewa_Gateway::log('Email is sended.');
        } else {
            WC_Esewa_Gateway::log( "No email send");
        }
    }
}