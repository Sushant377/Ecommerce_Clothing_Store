<?php 
/******************/
//Below Header
/******************/
// BG color
 $wp_customize->add_setting('big_store_below_hd_bg_clr', array(
        'default'           => '#1f4c94',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_below_hd_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-below-header-clr',
        'settings'   => 'big_store_below_hd_bg_clr',
        'priority'   => 1,
    ) ) 
 );  

$wp_customize->add_setting('big_store_category_text_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_category_text_clr', array(
        'label'      => __('Category Text Color', 'big-store' ),
        'section'    => 'big-store-below-header-clr',
        'settings'   => 'big_store_category_text_clr',
        'priority' => 1,
    ) ) 
 );

$wp_customize->add_setting('big_store_category_icon_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_category_icon_clr', array(
        'label'      => __('Category Icon Color', 'big-store' ),
        'section'    => 'big-store-below-header-clr',
        'settings'   => 'big_store_category_icon_clr',
        'priority'   => 1,
    ) ) 
 );  
//********************/
// icon color
//********************/
$wp_customize->add_setting('big_store_sq_icon_bg_clr', array(
        'default'           => '#1f4c94',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_sq_icon_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-icon-header-clr',
        'settings'   => 'big_store_sq_icon_bg_clr',
        'priority'   => 1,
    ) ) 
 ); 

 // icon color
$wp_customize->add_setting('big_store_sq_icon_clr', array(
        'default'           => '#fff',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_sq_icon_clr', array(
        'label'      => __('Color', 'big-store' ),
        'section'    => 'big-store-icon-header-clr',
        'settings'   => 'big_store_sq_icon_clr',
        'priority'   => 2,
    ) ) 
 );  

// menu
$wp_customize->add_setting('big_store_divide_main_menu_clr', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new big_store_Misc_Control( $wp_customize, 'big_store_divide_main_menu_clr',
            array(
        'section'     => 'big-store-menu-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Main Menu','big-store' ),
        'priority'    => 1,
)));
$wp_customize->add_setting('big_store_menu_link_clr', array(
        'default'           => '#fff',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_menu_link_clr', array(
        'label'      => __('Link Color', 'big-store' ),
        'section'    => 'big-store-menu-header-clr',
        'settings'   => 'big_store_menu_link_clr',
        'priority'   => 1,
    ) ) 
 );  
$wp_customize->add_setting('big_store_menu_link_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_menu_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'big-store' ),
        'section'    => 'big-store-menu-header-clr',
        'settings'   => 'big_store_menu_link_hvr_clr',
        'priority'   => 2,
    ) ) 
 );  

$wp_customize->add_setting('big_store_divide_sub_menu_clr', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new big_store_Misc_Control( $wp_customize, 'big_store_divide_sub_menu_clr',
            array(
        'section'     => 'big-store-menu-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Sub Menu','big-store' ),
        'priority'    => 3,
)));

$wp_customize->add_setting('big_store_sub_menu_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_sub_menu_bg_clr', array(
        'label'      => __('Sub Menu BG Color', 'big-store' ),
        'section'    => 'big-store-menu-header-clr',
        'settings'   => 'big_store_sub_menu_bg_clr',
        'priority'   => 4,
    ) ) 
 ); 

 $wp_customize->add_setting('big_store_sub_menu_lnk_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_sub_menu_lnk_clr', array(
        'label'      => __('Sub Menu Link Color', 'big-store' ),
        'section'    => 'big-store-menu-header-clr',
        'settings'   => 'big_store_sub_menu_lnk_clr',
        'priority'   => 5,
    ) ) 
 );  

$wp_customize->add_setting('big_store_sub_menu_lnk_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_sub_menu_lnk_hvr_clr', array(
        'label'      => __('Sub Menu Link Hover Color', 'big-store' ),
        'section'    => 'big-store-menu-header-clr',
        'settings'   => 'big_store_sub_menu_lnk_hvr_clr',
        'priority'   => 6,
    ) ) 
 );  