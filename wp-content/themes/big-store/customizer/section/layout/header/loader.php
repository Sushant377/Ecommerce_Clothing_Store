<?php
//Enable Loader
$wp_customize->add_setting( 'big_store_preloader_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_preloader_enable', array(
                'label'                 => esc_html__('Enable Loader', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big-store-pre-loader',
                'settings'              => 'big_store_preloader_enable',
                'priority'   => 1,
            ) ) );
// BG color
 $wp_customize->add_setting('big_store_loader_bg_clr', array(
        'default'           => '#9c9c9c',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_loader_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-pre-loader',
        'settings'   => 'big_store_loader_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
/*******************/ 
// Pre loader Image
/*******************/ 
$wp_customize->add_setting('big_store_preloader_image_upload', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_preloader_image_upload', array(
        'label'          => __('Pre Loader Image', 'big-store'),
        'description'    => __('(You can also use GIF image.)', 'big-store'),
        'section'        => 'big-store-pre-loader',
        'settings'       => 'big_store_preloader_image_upload',
 )));

/****************/
// doc link
/****************/
$wp_customize->add_setting('big_store_loader_link_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_loader_link_more',
            array(
        'section'     => 'big-store-pre-loader',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#pre-loader',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));

// rtl
$wp_customize->add_setting( 'big_store_rtl', array(
    'default'           => false,
    'sanitize_callback' => 'big_store_sanitize_checkbox',
  ) );
$wp_customize->add_control( new Big_Store_Toggle_Control( $wp_customize, 'big_store_rtl', array(
    'label'       => esc_html__( 'Enable', 'big-store' ),
    'section'     => 'big-store-rtl',
    'type'        => 'toggle',
    'settings'    => 'big_store_rtl',
  ) ) );