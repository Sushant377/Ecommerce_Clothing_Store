<?php 
/******************/
//Above Header
/******************/

// BG color
 $wp_customize->add_setting('big_store_above_hd_bg_clr', array(
        'default'           => '#1f4c94',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_above_hd_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-abv-header-clr',
        'settings'   => 'big_store_above_hd_bg_clr',
        'priority'   => 2,
    ) ) 
 );  

// above content header
$wp_customize->add_setting('big_store_divide_abv_hdr_content', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new big_store_Misc_Control( $wp_customize, 'big_store_divide_abv_hdr_content',
            array(
        'section'     => 'big-store-abv-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Above Header Content','big-store' ),
        'priority'    => 3,
)));

$wp_customize->add_setting('big_store_abv_content_txt_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_abv_content_txt_clr', array(
        'label'      => __('Text Color', 'big-store' ),
        'section'    => 'big-store-abv-header-clr',
        'settings'   => 'big_store_abv_content_txt_clr',
        'priority' => 4,
    ) ) 
 );

$wp_customize->add_setting('big_store_abv_content_link_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_abv_content_link_clr', array(
        'label'      => __('Link Color', 'big-store' ),
        'section'    => 'big-store-abv-header-clr',
        'settings'   => 'big_store_abv_content_link_clr',
        'priority'   => 16,
    ) ) 
 );


/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_abv_hrd_doc_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new big_store_Misc_Control( $wp_customize, 'big_store_abv_hrd_doc_learn_more',
            array(
        'section'     => 'big-store-abv-header-clr',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store-pro/#header-color',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));