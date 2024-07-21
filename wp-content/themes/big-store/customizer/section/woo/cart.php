<?php
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/***************/
// Cart
/***************/

// cross sell product divider
$wp_customize->add_setting('big_store_divide_woo_cross_sell', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new Big_Store_Misc_Control( $wp_customize, 'big_store_divide_woo_cross_sell',
            array(
        'section'     => 'big-store-woo-cart-page',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Cross Sell Product','big-store' ),
        'priority'    => 2,
)));
// cross sell product column
if ( class_exists( 'Big_Store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'big_store_cross_num_col_shw', array(
                'sanitize_callback' => 'big_store_sanitize_range_value',
                'default' => '2',
                
                
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'big_store_cross_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'big-store' ),
                    'section'     => 'big-store-woo-cart-page',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 3,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
              'big_store_cross_num_product_shw', array(
                'sanitize_callback' => 'big_store_sanitize_range_value',
                'default' => '4',       
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'big_store_cross_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'big-store' ),
                    'section'     => 'big-store-woo-cart-page',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
          )
   );
}

/****************/
// doc link
/****************/
$wp_customize->add_setting('big_store_cart_link_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_cart_link_more',
            array(
        'section'     => 'big-store-woo-cart-page',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#cart-page',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));