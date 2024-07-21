<?php
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
// product animation
$wp_customize->add_setting('big_store_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
$wp_customize->add_control( 'big_store_woo_product_animation', array(
        'settings'=> 'big_store_woo_product_animation',
        'label'   => __('Product Image Hover Style','big-store'),
        'section' => 'big-store-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','big-store'),
        'zoom'            => __('Zoom','big-store'),
        'swap'            => __('Fade Swap (Pro)','big-store'), 
        'slide'           => __('Slide Swap (Pro)','big-store'),            
        ),
    ));
/*******************/
//Product Title 
/*******************/
$wp_customize->add_setting('big_store_prdct_single', array(
                'default'               => true,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'big_store_prdct_single', array(
                'label'         => esc_html__('Enable Product Tilte in Single line', 'big-store'),
                'type'          => 'checkbox',
                'section'       => 'big-store-woo-shop',
                'settings'      => 'big_store_prdct_single',
            ) ) );
/*******************/
//Quick view
/*******************/
$wp_customize->add_setting('big_store_woo_quickview_enable', array(
                'default'               => true,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'big_store_woo_quickview_enable', array(
                'label'         => esc_html__('Enable Quick View.', 'big-store'),
                'type'          => 'checkbox',
                'section'       => 'big-store-woo-shop',
                'settings'      => 'big_store_woo_quickview_enable',
            ) ) );
/****************/
// doc link
/****************/
$wp_customize->add_setting('big_store_product_style_link_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_product_style_link_more',
            array(
        'section'     => 'big-store-woo-shop',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#style-product',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));