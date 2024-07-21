<?php
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/***************/
// Woo Tool Tips
/***************/


$wp_customize->add_setting('big_store_hdr_tp_enable', array(
                'default'               => true,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'big_store_hdr_tp_enable', array(
                'label'         => esc_html__('Header Tooltip Enable.', 'big-store'),
                'type'          => 'checkbox',
                'section'       => 'big-store-woo-tooltip-page',
                'settings'      => 'big_store_hdr_tp_enable',
                'priority'   =>1,
            ) ) );

$wp_customize->add_setting('big_store_page_tp_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'big_store_page_tp_enable', array(
                'label'         => esc_html__('Page Tooltip Enable.', 'big-store'),
                'type'          => 'checkbox',
                'section'       => 'big-store-woo-tooltip-page',
                'settings'      => 'big_store_page_tp_enable',
                'priority'   =>2,
            ) ) );


// Tooltip BG Color
 $wp_customize->add_setting('big_store_tooltip_bg_clr', array(
        'default'           => '#000000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_tooltip_bg_clr', array(
        'label'      => __('Tooltip Background Color', 'big-store' ),
        'section'    => 'big-store-woo-tooltip-page',
        'settings'   => 'big_store_tooltip_bg_clr',
        'priority'   => 2,
    ) ) 
 );  


// Tooltip Text Color
$wp_customize->add_setting('big_store_tooltip_text_clr', array(
        'default'        => '#ffffff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_tooltip_text_clr', array(
        'label'      => __('Tooltip Text Color', 'big-store' ),
        'section'    => 'big-store-woo-tooltip-page',
        'settings'   => 'big_store_tooltip_text_clr',
        'priority' => 3,
    ) ) 
 );




// add to cart Tool Tip text

$wp_customize->add_setting('big_store_account_tooltip_txt', array(
            'default'           =>'Account',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'big_store_sanitize_text',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control('big_store_account_tooltip_txt', array(
            'type'        => 'text',
            'section'     => 'big-store-woo-tooltip-page',
            'label'       => __( 'Account Tooltip Text', 'big-store' ),
            'settings' => 'big_store_account_tooltip_txt',
             'priority'   =>11,
            
        )
    );




    $wp_customize->add_setting('big_store_add_to_cart_tooltip_txt', array(
            'default'           =>'Add To Cart',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'big_store_sanitize_text',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control('big_store_add_to_cart_tooltip_txt', array(
            'type'        => 'text',
            'section'     => 'big-store-woo-tooltip-page',
            'label'       => __( 'Add To Cart Tooltip Text', 'big-store' ),
            'settings' => 'big_store_add_to_cart_tooltip_txt',
             'priority'   =>11,
            
        )
    );


    // Wishlist Tool Tip text
    $wp_customize->add_setting('big_store_wishlist_tooltip_txt', array(
            'default'           =>'Wishlist',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'big_store_sanitize_text',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control('big_store_wishlist_tooltip_txt', array(
            'type'        => 'text',
            'section'     => 'big-store-woo-tooltip-page',
            'label'       => __( 'Wishlist Button Tooltip Text', 'big-store' ),
            'settings' => 'big_store_wishlist_tooltip_txt',
             'priority'   =>13,
            
        )
    );


    // Quickview Tool Tip text
    $wp_customize->add_setting('big_store_quickview_tooltip_txt', array(
            'default'           =>'Quickview',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'big_store_sanitize_text',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control('big_store_quickview_tooltip_txt', array(
            'type'        => 'text',
            'section'     => 'big-store-woo-tooltip-page',
            'label'       => __( 'Quick View button Tooltip Text', 'big-store' ),
            'settings' => 'big_store_quickview_tooltip_txt',
             'priority'   =>15,
            
        )
    );


    // Compare Button Tool Tip text
    $wp_customize->add_setting('big_store_compare_tooltip_txt', array(
            'default'           =>'Compare',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'big_store_sanitize_text',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control('big_store_compare_tooltip_txt', array(
            'type'        => 'text',
            'section'     => 'big-store-woo-tooltip-page',
            'label'       => __( 'Compare button Tooltip Text', 'big-store' ),
            'settings' => 'big_store_compare_tooltip_txt',
             'priority'   =>15,
            
        )
    );

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