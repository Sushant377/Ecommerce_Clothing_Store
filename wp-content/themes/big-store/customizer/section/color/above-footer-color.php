<?php 
/******************/
//Above Footer
/******************/
// background divider
$wp_customize->add_setting('big_store_divide_abv_ftr_bg', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new Big_Store_Misc_Control( $wp_customize, 'big_store_divide_abv_ftr_bg',
            array(
        'section'     => 'big-store-abv-footer-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Background','big-store' ),
        'priority'    => 1,
)));
// BG color
 $wp_customize->add_setting('big_store_above_ftr_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_above_ftr_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-abv-footer-clr',
        'settings'   => 'big_store_above_ftr_bg_clr',
        'priority'   => 2,
    ) ) 
 );  

// Registers abv_header_background settings
    $wp_customize->add_setting( 'big_store_abv_ftr_background_image_url', array(
        'sanitize_callback' => 'esc_url',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_setting( 'big_store_abv_ftr_background_image_id', array(
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_abv_ftr_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_abv_ftr_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_abv_ftr_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_abv_ftr_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new Big_Store_Customize_Custom_Background_Control(
            $wp_customize,
            'big_store_abv_ftr_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'big-store' ),
                'section'   => 'big-store-abv-footer-clr',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'big_store_abv_ftr_background_image_url',
                    'image_id' => 'big_store_abv_ftr_background_image_id',
                    'repeat' => 'big_store_abv_ftr_background_repeat', // Use false to hide the field
                    'size' => 'big_store_abv_ftr_background_size',
                    'position' => 'big_store_abv_ftr_background_position',
                    'attach' => 'big_store_abv_ftr_background_attach'
                )
            )
        )
    );

     // above content header
$wp_customize->add_setting('big_store_divide_abv_ftr_content', array(
        'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control( new Big_Store_Misc_Control( $wp_customize, 'big_store_divide_abv_ftr_content',
            array(
        'section'     => 'big-store-abv-footer-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Above Footer Content','big-store' ),
        'priority'    => 14,
)));
$wp_customize->add_setting('big_store_abv_ftr_content_txt_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_abv_ftr_content_txt_clr', array(
        'label'      => __('Text Color', 'big-store' ),
        'section'    => 'big-store-abv-footer-clr',
        'settings'   => 'big_store_abv_ftr_content_txt_clr',
        'priority' => 15,
    ) ) 
 );
$wp_customize->add_setting('big_store_abv_ftr_content_link_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_abv_ftr_content_link_clr', array(
        'label'      => __('Link Color', 'big-store' ),
        'section'    => 'big-store-abv-footer-clr',
        'settings'   => 'big_store_abv_ftr_content_link_clr',
        'priority'   => 16,
    ) ) 
 );
$wp_customize->add_setting('big_store_abv_ftr_content_link_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_abv_ftr_content_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'big-store' ),
        'section'    => 'big-store-abv-footer-clr',
        'settings'   => 'big_store_abv_ftr_content_link_hvr_clr',
        'priority'   => 17,
    ) ) 
 );

/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_abv_ftr_doc_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_abv_ftr_doc_learn_more',
            array(
        'section'     => 'big-store-abv-footer-clr',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#footer-color',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));