<?php 
$wp_customize->add_setting('big_store_prd_view', array(
        'default'        => 'grid-view',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
    $wp_customize->add_control('big_store_prd_view', array(
        'settings' => 'big_store_prd_view',
        'label'   => __('Display Product View','big-store'),
        'description' => __('(Select layout to display products at shop page.)','big-store'),
        'section' => 'big-store-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'grid-view'   => __('Grid','big-store'), 
        'list-view'     => __('List','big-store'),
        
        )
    ));
/************************/
//Shop product pagination
/************************/
   $wp_customize->add_setting('big_store_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
    $wp_customize->add_control('big_store_pagination', array(
        'settings' => 'big_store_pagination',
        'label'   => __('Shop Page Pagination','big-store'),
        'section' => 'big-store-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','big-store'),
        'click'   => __('Load More (Pro)','big-store'), 
        'scroll'  => __('Infinite Scroll (Pro)','big-store'), 
        )
    ));

  
$wp_customize->add_setting('big_store_pagination_loadmore_btn_text', array(
        'default'           => 'Load More',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('big_store_pagination_loadmore_btn_text', array(
        'label'    => __('Load More Text', 'big-store'),
        'section'  => 'big-store-woo-shop-page',
        'settings' => 'big_store_pagination_loadmore_btn_text',
         'type'    => 'text',
    ));
/****************/
// doc link
/****************/
$wp_customize->add_setting('big_store_shop_page_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_shop_page_more',
            array(
        'section'     => 'big-store-woo-shop-page',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#shop-page',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>  100,
    )));