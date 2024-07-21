<?php

defined ( 'ABSPATH' ) || exit;

// eSewa Settings
return array(
    'enabled' => array(
        'title' => __('Enable/Disable', 'esewa-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable eSewa Payment', 'esewa-woocommerce'),
        'default' => 'yes',
    ),
    'title' => array(
        'title' => __('Title', 'esewa-woocommerce'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __('This controls the title which the user sees during checkout.', 'esewa-woocommerce'),
        'default' => __('eSewa', 'esewa-woocommerce'),
    ),
    'description' => array(
        'title' => __('Description', 'esewa-woocommerce'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __( 'This controls the description which the user sees during checkout.', 'esewa-woocommerce'),
        'default' => __('Pay via eSewa, Securly and Relaibly'),
    ),
    'merchant_secret' => array(
        'title' => __('Merchat Secret Key', 'esewa-woocommerce'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __('Please enter your live esewa merchant secret', 'esewa-woocommerce'),
        'default' => '',
    ),
    'sandbox_merchant_secret' => array(
        'title' => __('Test Merchant Secret', 'esewa-woocommerce'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __('Please enter your test eSewa merchant secret.', 'esewa-woocommerce'),
        'default' => '8gBm/:&EnhH.1/q',
    ),
    'product_code' => array(
        'title' => __('Product Code', 'esewa-woocommerce'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __('Please enter your product key.', 'esewa-woocommerce'),
        'default' => '',
    ),
    'sandbox_product_code' => array(
        'title' => __('Test Product Code', 'esewa-woocommerce'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __('Please enter your test eSewa product code.', 'esewa-woocommerce'),
        'default' => 'EPAYTEST',
    ),
    'invoice_prefix' => array(
        'title' => __('Invoice Prefix', 'esewa-woocommerce'),
        'type' => 'string',
        'desc_tip' => true,
        'description' => __('Enter unqiue prefix for your invoices. eSewa will not accept same invoice number if you have multiple stores', 'esewa-woocommerce'),
        'default' => 'WC_',
    ),
    'advanced' => array(
        'title' => __('Advanced options', 'esewa-woocommerce'),
        'type' => 'title',
        'description' => '',    
    ),
    'testmode' => array(
        'title' => __('Sandbox mode', 'esewa-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable Sandbox Mode', 'esewa-woocommerce'),
        'default' => 'no',
        'description' => __('Enable esewa sandbox to text payment. Please contact eSewa merchant provider.', 'esewa-woocommerce'),
    ),
    'debug' => array(
        'title' => __('Debug log', 'esewa-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable logging', 'esewa-woocommerce'),
        'default' => 'no',
        'description' => sprintf( 
            __( 'Log eSewa events, such as IPN requests, WooCommerce -> inside Status -> Logs', 'esewa-woocommerce' ) ),
    ),
    'ipn_notification' => array(
        'title' => __('IPN email notification', 'esewa-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable IPN email notifications', 'esewa-woocommerce'),
        'default' => 'yes',
        'description' => __('Send email when an IPN is received from esewa for cancelled order.', 'esewa-woocommerce'),
    ),
);