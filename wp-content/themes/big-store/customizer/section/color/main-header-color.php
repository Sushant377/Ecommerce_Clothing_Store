<?php 
/******************/
//Main Header
/******************/
// background divider
$wp_customize->add_setting('big_store_divide_main_hdr_bg', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new big_store_Misc_Control( $wp_customize, 'big_store_divide_main_hdr_bg',
            array(
        'section'     => 'big-store-main-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Background','big-store' ),
        'priority'    => 1,
)));
// BG color
 $wp_customize->add_setting('big_store_main_hd_bg_clr', array(
        'default'           => '#2457AA',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_main_hd_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-main-header-clr',
        'settings'   => 'big_store_main_hd_bg_clr',
        'priority'   => 2,
    ) ) 
 );  

// above content header
$wp_customize->add_setting('big_store_divide_main_hdr_content', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new big_store_Misc_Control( $wp_customize, 'big_store_divide_main_hdr_content',
            array(
        'section'     => 'big-store-main-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Main Header Content','big-store' ),
        'priority'    => 3,
)));

$wp_customize->add_setting('big_store_main_content_txt_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_main_content_txt_clr', array(
        'label'      => __('Text Color', 'big-store' ),
        'section'    => 'big-store-main-header-clr',
        'settings'   => 'big_store_main_content_txt_clr',
        'priority' => 4,
    ) ) 
 );

$wp_customize->add_setting('big_store_main_content_link_clr', array(
        'default'           => '#fff',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_main_content_link_clr', array(
        'label'      => __('Link Color ', 'big-store' ),
        'section'    => 'big-store-main-header-clr',
        'settings'   => 'big_store_main_content_link_clr',
        'priority'   => 12,
    ) ) 
 );