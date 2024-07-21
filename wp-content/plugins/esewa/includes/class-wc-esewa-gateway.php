<?php

defined('ABSPATH') || exit;

class WC_Esewa_Gateway extends WC_Payment_Gateway
{
    const LIVE_URL = "https://epay.esewa.com.np/api/epay/main/v2/form";
    const TEST_URL = "https://rc-epay.esewa.com.np/api/epay/main/v2/form";
    const TEST_STATUS_CHECK_URL = "https://uat.esewa.com.np/api/epay/transaction/status/";
    const LIVE_STATUS_CHECK_URL = "https://epay.esewa.com.np/api/epay/transaction/status/";

    public static $log_enabled = false;

    public static $log = false;

    public function __construct()
    {
        $this->id = 'esewa';

        add_action(
            'woocommerce_update_options_payment_gateways_' . $this->id,
            array($this, 'process_admin_options')
        );
        add_action('woocommerce_receipt_' . $this->id, array($this, 'esewa_woocommerce_confirmation_form'));
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));

        $this->icon = apply_filters('woocommerce_esewa_icon', plugins_url('/assets/images/eSewa_logo.png', WC_ESEWA_PLUGIN_FILE));
        $this->has_fields = false;
        $this->order_button_text = __("Procced to eSewa", 'esewa-woocommerce');
        $this->method_title = __('eSewa', 'esewa-woocommerce');
        $this->method_description = __('Payment via eSewa - sends customers to eSewa protal', 'esewa-woocommerce');

        // load the setting
        $this->init_form_fields();
        $this->init_settings();

        // Define user set variables
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->testmode = 'yes' === $this->get_option('testmode', 'no');
        $this->debug = 'yes' === $this->get_option('debug', 'no');
        $this->merchant_secret = $this->get_option('merchant_secret');
        $this->product_code = $this->get_option('product_code');

        // API endpoints
        $this->payment_request_api_endpoint = self::LIVE_URL;
        $this->payment_status_check_endpoint = self::LIVE_STATUS_CHECK_URL;

        // Enable logging for events.
        self::$log_enabled = $this->debug;

        // Test mode
        if ($this->testmode) {
            $this->description .= ' ' . __('SANDBOX ENABLED. You can use testing accounts only.', 'esewa-woocommerce');
            $this->description = trim($this->description);
            $this->merchant_secret = $this->get_option('sandbox_merchant_secret');
            $this->product_code = $this->get_option('sandbox_product_code');
            $this->payment_request_api_endpoint = self::TEST_URL;
            $this->payment_status_check_endpoint = self::TEST_STATUS_CHECK_URL;
        }

        if (!$this->is_valid_for_use()) {
            $this->enabled = 'no';
        } elseif ($this->product_code && $this->merchant_secret) {
            include_once dirname(__FILE__) . '/gateways/class-wc-esewa-gateway-ipn-handler.php';
            new WC_Esewa_Gateway_IPN_Handler($this);
        }
    }

    // save log
    public static function log($message, $level = 'info')
    {
        if (self::$log_enabled) {
            if (empty(self::$log)) {
                self::$log = wc_get_logger();
            }
            self::$log->log($level, $message, array('source' => 'esewa'));
        }
    }

    public function process_admin_options()
    {
        $saved = parent::process_admin_options();

        if ('yes' !== $this->get_option('debug', 'no')) {
            if (empty(self::$log)) {
                self::$log = wc_get_logger();
            }

            self::$log->clear('esewa');
        }

        return $saved;
    }

    // check currency
    public function is_valid_for_use()
    {
        return in_array(
            get_woocommerce_currency(),
            apply_filters(
                'woocommerce_esewa_supported_currencies',
                array('NPR')
            ),
            true
        );
    }

    // initialization of admin form
    public function init_form_fields()
    {
        $this->form_fields = include 'gateways/esewa-settings.php';
    }

    // redirect to payment process
    public function process_payment($order_id)
    {
        $order = wc_get_order($order_id);

        $redirect = $order->get_checkout_payment_url(true);
        return array(
            'result' => 'success',
            'redirect' => $redirect
        );
    }

    // Generate confirmation formation form
    public function esewa_woocommerce_confirmation_form($order_id)
    {
        include_once dirname(__FILE__) . '/gateways/class-wc-esewa-gateway-request.php';

        $order = new WC_Order($order_id);
        $esewa_request = new WC_Esewa_Gateway_Request($this);
        $esewa_args = $esewa_request->get_esewa_args($order);
        update_post_meta($order_id, 'transaction_uuid', $esewa_args['transaction_uuid']);
        $this->schedule_status_check($order_id);

        $paymentForm = "";
        $paymentForm .= '<form method="POST" action="' . esc_url($this->payment_request_api_endpoint) . '" id="esewa_payment_form" name="esewa_load">';

        $paymentForm .= '<input type="hidden" id="amount" name="amount" value="' . $esewa_args['amount'] . '">';

        $paymentForm .= '<input type="hidden" id="tax_amount" name="tax_amount" value="' . $esewa_args['tax_amount'] . '">';

        $paymentForm .= '<input type="hidden" id="total_amount" name="total_amount" value="' . $esewa_args['total_amount'] . '">';

        $paymentForm .= '<input type="hidden" id="transaction_uuid" name="transaction_uuid" value="' . $esewa_args['transaction_uuid'] . '">';

        $paymentForm .= '<input type="hidden" id="product_code" name="product_code" value="' . $esewa_args['product_code'] . '">';

        $paymentForm .= '<input type="hidden" id="product_service_charge" name="product_service_charge" value="' . $esewa_args['product_service_charge'] . '">';

        $paymentForm .= '<input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="' . $esewa_args['product_delivery_charge'] . '">';

        $paymentForm .= '<input type="hidden" id="success_url" name="success_url" value="' . $esewa_args['success_url'] . '">';

        $paymentForm .= '<input type="hidden" id="failure_url" name="failure_url" value="' . $esewa_args['failure_url'] . '">';

        $paymentForm .= '<input type="hidden" id="signed_field_names" name="signed_field_names" value="' . $esewa_args['signed_field_names'] . '">';

        $paymentForm .= '<input type="hidden" id="signature" name="signature" value="' . $esewa_args['signature'] . '">';

        $paymentForm .= '<input type="submit" value="Proceed to Esewa">';

        $paymentForm .= '</form>';

        $paymentForm .= '<script type="text/javascript">document.getElementById("esewa_payment_form").submit();</script>';

        echo $paymentForm;
    }

    // load javascript
    public function admin_scripts()
    {
        $screen = get_current_screen();
        $screen_id = $screen ? $screen->id : '';

        if ('woocommerce_page_wc-settings' != $screen_id) {
            return;
        }

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        wp_enqueue_script('woocommerce_esewa_admin', plugins_url('/assets/js/esewa-admin' . $suffix . '.js', WC_ESEWA_PLUGIN_FILE), array(), WC_VERSION, true);
    }


    public function schedule_status_check($order_id)
    {
        // Check if the event is already scheduled
        $scheduled_time = wp_next_scheduled('esewa_payment_status_check_event', array($order_id));

        if (!$scheduled_time) {
            // If the event is not scheduled, schedule it
            wp_schedule_single_event(time() + 360, 'esewa_payment_status_check_event', array($order_id));
            WC_Esewa_Gateway::log('Scheduled event created for order ID: ' . $order_id . ', next run time: ' . date('Y-m-d H:i:s', $scheduled_time));
        } else {
            // If the event is already scheduled, log the existing event information
            WC_Esewa_Gateway::log('Scheduled event already exists for order ID: ' . $order_id . ', next run time: ' . date('Y-m-d H:i:s', $scheduled_time));
        }

        // Check if the event has been scheduled successfully
        if (!wp_next_scheduled('esewa_payment_status_check_event', array($order_id))) {
            WC_Esewa_Gateway::log('Scheduled event not created for order ID: ' . $order_id);
        }
    }

    public function esewa_payment_status_check($order_id)
    {
        WC_Esewa_Gateway::log('payment status check running.');
        $order = wc_get_order($order_id);

        if (!$order) {
            WC_Esewa_Gateway::log('Order not found for order ID: ' . $order_id . 'for status check.', 'error');
            return;
        }

        // Get order details
        $total_amount = $order->get_total();
        $transaction_uuid = get_post_meta($order_id, 'transaction_uuid', true);;

        // Construct the URL for status check API
        $url = $this->payment_status_check_endpoint;
        $url .= '?product_code=' . $this->product_code;
        $url .= '&total_amount=' . $total_amount;
        $url .= '&transaction_uuid=' . $transaction_uuid;

        // Perform a request to eSewa API to check transaction status
        $response = wp_remote_get($url);

        if (is_wp_error($response)) {
            // Log error if request fails
            $error_message = $response->get_error_message();
            WC_Esewa_Gateway::log('Error while checking transaction status: ' . $error_message, 'error');
            return;
        }

        // Check if API response is successful
        $response_code = wp_remote_retrieve_response_code($response);
        $response_body = wp_remote_retrieve_body($response);
        WC_Esewa_Gateway::log('Response Body: ' . $response_body);

        if ($response_code == 200) {
            $response_data = json_decode($response_body, true);
            if ($response_data && isset($response_data['status'])) {
                WC_Esewa_Gateway::log('Order ID ' . $order_id . 'Response Status: ' . $response_data['status']);
                $esewa_data = [
                    'status' => $response_data['status'],
                    'transaction_code' => $response_data['ref_id'],
                    'transaction_uuid' => $transaction_uuid,
                ];
                $ipn_handler = new WC_Esewa_Gateway_IPN_Handler($this);
                $ipn_handler->valid_response($esewa_data);
            } else {
                WC_Esewa_Gateway::log('Failed to parse response data or missing status field.', 'error');
            }
        } else {
            // Log error if response code is not 200
            WC_Esewa_Gateway::log('Error while checking transaction status. Response code: ' . $response_code, 'error');
        }
    }
}

add_action('esewa_payment_status_check_event', 'schedule_payment_status_check', 10, 1);
function schedule_payment_status_check($order_id)
{
    $event_class = new WC_Esewa_Gateway();
    $event_class->esewa_payment_status_check($order_id);
}
