<?php

/*
* Plugin Name: eSewa - Nepal's First Payment Gateway
* Description: eSewa official plugin for WooCommerce
* Version: 2.1
* Text Domain: esewa-woocommerce
*/

defined( 'ABSPATH' ) || exit;

/**
 * 
 * Plugin File Path
 * 
 */
if ( ! defined( 'WC_ESEWA_PLUGIN_FILE' ) ) {
    define( 'WC_ESEWA_PLUGIN_FILE', __FILE__);
}

/**
 * Main WooCommerce eSewa class
 */
if ( ! class_exists( 'WooCommerce_Esewa' ) ) {
    include_once dirname(__FILE__) . '/includes/class-esewa-woocommerce.php';
}


// Initialization the plugin
add_action( 'plugins_loaded', array('WooCommerce_Esewa', 'get_instance' ) );