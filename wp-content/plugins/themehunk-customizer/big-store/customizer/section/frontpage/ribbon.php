<?php
$wp_customize->add_setting( 'big_store_disable_ribbon_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_disable_ribbon_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'big_store_ribbon',
                'settings'              => 'big_store_disable_ribbon_sec',
            ) ) );

$wp_customize->add_setting('big_store_ribbon_background', array(
                'default'               => 'image',
                'sanitize_callback'     => 'big_store_sanitize_select',
            ) );
$wp_customize->add_control( new Big_Store_Customizer_Buttonset_Control( $wp_customize, 'big_store_ribbon_background', array(
                'label'                 => esc_html__( 'Choose Ribbon Background', 'big-store' ),
                 'priority'   => 2,
                'section'               => 'big_store_ribbon',
                'settings'              => 'big_store_ribbon_background',
                'choices'               => array(
                    'image'             => esc_html__( 'Image', 'big-store' ),
                    'video'             => esc_html__( 'Video (Pro)', 'big-store' ), 
                ),
        ) ) );
    $wp_customize->add_setting( 'big_store_ribbon_bg_img_url', array(
        'sanitize_callback' => 'esc_url',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_setting( 'big_store_ribbon_bg_img_id', array(
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_ribbon_bg_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_ribbon_bg_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_ribbon_bg_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'big_store_ribbon_bg_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new Big_Store_Customize_Custom_Background_Control(
            $wp_customize,
            'big_store_ribbon_bg_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'big-store' ),
                'section'   => 'big_store_ribbon',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'big_store_ribbon_bg_img_url',
                    'image_id' => 'big_store_ribbon_bg_img_id',
                    'repeat' => 'big_store_ribbon_bg_background_repeat', // Use false to hide the field
                    'size' => 'big_store_ribbon_bg_background_size',
                    'position' => 'big_store_ribbon_bg_background_position',
                    'attach' => 'big_store_ribbon_bg_background_attach'
                )
            )
        )
    );

    $wp_customize->add_setting('big_store_ribbon_bg_video', array(
           'default'        => '',
           'sanitize_callback' => 'sanitize_text_field'
       ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize, 'big_store_ribbon_bg_video', array(
           'label'    => __('Upload Background Video', 'oneline'),
           'section'  => 'big_store_ribbon',
           'settings' => 'big_store_ribbon_bg_video',
    )));
    $wp_customize->add_setting('big_store_ribbon_video_poster_image', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'big_store_ribbon_video_poster_image', array(
        'label'    => __('Upload Video Poster Image', 'oneline'),
        'section'  => 'big_store_ribbon',
        'settings' => 'big_store_ribbon_video_poster_image',
    )));

$wp_customize->add_setting('big_store_ribbon_text', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('big_store_ribbon_text', array(
        'label'    => __('Text', 'big-store'),
        'section'  => 'big_store_ribbon',
        'settings' => 'big_store_ribbon_text',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('big_store_ribbon_btn_text', array(
        'default'           => 'Call To Action',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('big_store_ribbon_btn_text', array(
        'label'    => __('Button Text', 'big-store'),
        'section'  => 'big_store_ribbon',
        'settings' => 'big_store_ribbon_btn_text',
         'type'    => 'text',
 ));

$wp_customize->add_setting('big_store_ribbon_btn_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        
  ));
$wp_customize->add_control('big_store_ribbon_btn_link', array(
        'label'    => __('Button Link', 'big-store'),
        'section'  => 'big_store_ribbon',
        'settings' => 'big_store_ribbon_btn_link',
         'type'    => 'text',
 ));


  $wp_customize->add_setting('big_store_ribbon_doc', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_ribbon_doc',
            array(
        'section'     => 'big_store_ribbon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));