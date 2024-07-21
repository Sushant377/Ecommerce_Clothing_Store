<?php
defined('ABSPATH') || exit;

class WC_Esewa_Gateway_Request {
    protected $gateway;
    protected $notify_url;
    protected $endpoint;

    public function __construct($gateway) {
        $this->gateway = $gateway;
        $this->notify_url = WC()->api_request_url('WC_Esewa_Gateway');
    }

    // Generate request signature
    private function generate_signature($data, $order) {
        WC_Esewa_Gateway::log( 'Generating signature for order ' . $order->get_id() );
        $input_string = "total_amount={$data['total_amount']},transaction_uuid={$data['transaction_uuid']},product_code={$data['product_code']}";
        $secret_key = $this->gateway->merchant_secret;
        $secret_key = htmlspecialchars_decode($secret_key);

        $signature = hash_hmac('sha256', $input_string, $secret_key, true);

        $base64_signature = base64_encode($signature);
        return $base64_signature;
    }
    
    // Generate arguments for eSewa form
    public function get_esewa_args($order) {
        WC_Esewa_Gateway::log( 'Generating payment form for order ' . $order->get_id() . '. Notify URL: ' . $this->notify_url );
        $args = [
            'amount' => wc_format_decimal( $order->get_subtotal() - $order->get_total_discount(), 2 ),
            'tax_amount' => wc_format_decimal( $order->get_total_tax(), 2 ),
            'total_amount' => wc_format_decimal($order->get_total(), 2),
            'transaction_uuid' => uniqid().esc_html($this->gateway->get_option( 'invoice_prefix' ).'esewa-retro'.$order->get_id()), // Generating a UUID for transaction ID
            'product_code' => $this->gateway->product_code,
            'product_service_charge' => wc_format_decimal( $this->get_service_charge( $order ), 2 ),
            'product_delivery_charge' => wc_format_decimal($order->get_total_shipping(), 2),
            'success_url' => $this->limit_length($this->notify_url, 255),
            'failure_url' => esc_url_raw($order->get_cancel_order_url_raw()),
            'signed_field_names' => "total_amount,transaction_uuid,product_code",
            'signature' => '',
        ];

        // Generate signature after constructing the args array
        $args['signature'] = $this->generate_signature( $args, $order );

        return $args;
    }

    protected function limit_length( $string, $limit = 127 ) {
        $str_limit = $limit - 3;
        if ( function_exists( 'mb_strimwidth' ) ) {
            if ( mb_strlen( $string ) > $limit ) {
                $string = mb_strimwidth($string, 0, $str_limit) . '...';
            }
        } else {
            if (strlen($string) > $limit) {
                $string = substr($string, 0, $str_limit) . '...';
            }
        }
        return $string;
    }

    protected function get_service_charge( $order ) {
        $fee_total = 0;
  
        if ( count( $order->get_fees() ) > 0 ) {
           foreach ( $order->get_fees() as $item ) {
              $fee_total += ( isset( $item['line_total'] ) ) ? $item['line_total'] : 0;
           }
        }
        return $fee_total;
     }
}