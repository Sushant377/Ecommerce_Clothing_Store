<?php 
/**
 *
 *
 * @package      Big Store
 * @author       Big Store
 * @copyright   Copyright (c) 2019,  Big Store
 * @since        Big Store1.0.0
 */
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/***************/
// Checkout
/***************/
$wp_customize->add_setting('big_store_woo_checkout_distraction_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'big_store_woo_checkout_distraction_enable', array(
                'label'         => esc_html__('Enable Distraction Free Checkout.', 'big-store'),
                'type'          => 'checkbox',
                'section'       => 'big-store-woo-checkout-page',
                'settings'      => 'big_store_woo_checkout_distraction_enable',
            ) ) );

/****************/
// doc link
/****************/
$wp_customize->add_setting('big_store_checkout_link_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_checkout_link_more',
            array(
        'section'     => 'big-store-woo-checkout-page',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more go with this <a target="_blank" href="%s">Doc</a> !', 'big-store' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/big-store-theme/#checkout-page')),
        'priority'   =>30,
    )));