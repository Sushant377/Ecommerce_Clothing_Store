<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'product_attributes_type_selector', 'thvs_product_attributes_types' );
add_action( 'init', 'thvs_settings', 2 );
add_action( 'admin_init', 'thvs_add_product_taxonomy_meta' );
add_filter( 'woocommerce_ajax_variation_threshold', 'thvs_ajax_variation_threshold', 8 );
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'thvs_variation_attribute_options_html', 200, 2 );
add_action( 'woocommerce_product_option_terms', 'thvs_product_option_terms', 20, 3 );

add_action( 'woocommerce_save_product_variation', 'thvs_clear_transient' );
add_action( 'woocommerce_update_product_variation', 'thvs_clear_transient' );
add_action( 'woocommerce_delete_product_variation', 'thvs_clear_transient' );
add_action( 'woocommerce_trash_product_variation', 'thvs_clear_transient' );
add_action( 'woocommerce_delete_product_transients', 'thvs_clear_transient' );
add_action( 'woocommerce_attribute_added', 'thvs_clear_transient', 20 );
add_action( 'woocommerce_attribute_updated', 'thvs_clear_transient', 20 );
add_action( 'woocommerce_attribute_deleted', 'thvs_clear_transient', 20 );

//filter attribute widget
add_filter( 'woocommerce_layered_nav_term_html', 'thvs_filter_add_html', 20, 4 );