<?php

defined( 'ABSPATH' ) || exit;

abstract class WC_Esewa_Gateway_Response {
    protected function get_esewa_order( $transaction_uuid ) {
        $order_id = $this->extract_order_id( $transaction_uuid );
        $order = wc_get_order( $order_id );
        if ( ! $order ) {
            WC_Esewa_Gateway::log('#' . $order_id . ' Order not Found.', 'error');
            return false;
        }
        return $order;
    }

    // Extract Order from transaction_uuid
    protected function extract_order_id( $transaction_uuid ) {
        $identity = $this->gateway->get_option('invoice_prefix').'esewa-retro';
        $identity_length = strlen($identity);
        $order_id = substr($transaction_uuid, strpos($transaction_uuid, $identity) + $identity_length);
        WC_Esewa_Gateway::log( 'Extracting Order #'. $order_id . ' from eSewa response.' );
        return $order_id;
    }

    // Generate Signature
    protected function generate_signature( $data ) {
        WC_Esewa_Gateway::log( 'Generating response signature ' . $data['transaction_uuid'] );
        $input_string = "transaction_code={$data['transaction_code']},status={$data['status']},total_amount={$data['total_amount']},transaction_uuid={$data['transaction_uuid']},product_code={$data['product_code']},signed_field_names={$data['signed_field_names']}";
        $secret_key = $this->gateway->merchant_secret;
        $secret_key = htmlspecialchars_decode($secret_key);
        $signature = hash_hmac('sha256', $input_string, $secret_key, true);

        $base64_signature = base64_encode($signature);
        return $base64_signature;
    }

    // Empty the cart
    protected function payment_complete( $order, $transaction_code = '', $note = '' ) {
        $order->add_order_note( $note );
        $order->payment_complete( $transaction_code );
        WC()->cart->empty_cart();
    }
}