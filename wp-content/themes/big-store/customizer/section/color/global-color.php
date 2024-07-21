<?php
/******************/
//Global Option
/******************/

// theme color
 $wp_customize->add_setting('big_store_theme_clr', array(
        'default'        => '#ffd200',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_theme_clr', array(
        'label'      => __('Theme Color', 'big-store' ),
        'section'    => 'big-store-gloabal-color',
        'settings'   => 'big_store_theme_clr',
        'priority' => 1,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('big_store_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_link_clr', array(
        'label'      => __('Link Color', 'big-store' ),
        'section'    => 'big-store-gloabal-color',
        'settings'   => 'big_store_link_clr',
        'priority' => 2,
    ) ) 
 );  
// link hvr color
 $wp_customize->add_setting('big_store_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'big-store' ),
        'section'    => 'big-store-gloabal-color',
        'settings'   => 'big_store_link_hvr_clr',
        'priority' => 3,
    ) ) 
 );

// text color
 $wp_customize->add_setting('big_store_text_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_text_clr', array(
        'label'      => __('Text Color', 'big-store' ),
        'section'    => 'big-store-gloabal-color',
        'settings'   => 'big_store_text_clr',
        'priority' => 4,
    ) ) 
 );
 // title color
 $wp_customize->add_setting('big_store_title_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_title_clr', array(
        'label'      => __('Title Color', 'big-store' ),
        'section'    => 'big-store-gloabal-color',
        'settings'   => 'big_store_title_clr',
        'priority' => 4,
    ) ) 
 );  
// gloabal background option
$wp_customize->get_control( 'background_color' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_color' )->priority = 6;
$wp_customize->get_control( 'background_image' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_image' )->priority = 7;
$wp_customize->get_control( 'background_preset' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_preset' )->priority = 8;
$wp_customize->get_control( 'background_position' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_position' )->priority = 8;
$wp_customize->get_control( 'background_repeat' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_repeat' )->priority = 9;
$wp_customize->get_control( 'background_attachment' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_attachment' )->priority = 10;
$wp_customize->get_control( 'background_size' )->section = 'big-store-gloabal-color';
$wp_customize->get_control( 'background_size' )->priority = 11;
/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_global_clr_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_global_clr_more',
            array(
        'section'     => 'big-store-gloabal-color',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#color-background',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));