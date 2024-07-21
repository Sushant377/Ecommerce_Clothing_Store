<?php
$wp_customize->add_setting( 'jot_shop_disable_ribbon_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'jot_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jot_shop_disable_ribbon_sec', array(
                'label'                 => esc_html__('Disable Section', 'jot-shop'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'jot_shop_ribbon',
                'settings'              => 'jot_shop_disable_ribbon_sec',
            ) ) );

$wp_customize->add_setting('jot_shop_ribbon_background', array(
                'default'               => 'image',
                'sanitize_callback'     => 'jot_shop_sanitize_select',
            ) );
$wp_customize->add_control( new Jot_Shop_Customizer_Buttonset_Control( $wp_customize, 'jot_shop_ribbon_background', array(
                'label'                 => esc_html__( 'Choose Ribbon Background', 'jot-shop' ),
                 'priority'   => 2,
                'section'               => 'jot_shop_ribbon',
                'settings'              => 'jot_shop_ribbon_background',
                'choices'               => array(
                    'image'             => esc_html__( 'Image', 'jot-shop' ),
                    'video'             => esc_html__( 'Video', 'jot-shop' ), 
                ),
        ) ) );
    $wp_customize->add_setting( 'jot_shop_ribbon_bg_img_url', array(
        'sanitize_callback' => 'esc_url',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_setting( 'jot_shop_ribbon_bg_img_id', array(
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'jot_shop_ribbon_bg_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'jot_shop_ribbon_bg_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'jot_shop_ribbon_bg_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'jot_shop_ribbon_bg_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new Jot_Shop_Customize_Custom_Background_Control(
            $wp_customize,
            'jot_shop_ribbon_bg_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'jot-shop' ),
                'section'   => 'jot_shop_ribbon',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'jot_shop_ribbon_bg_img_url',
                    'image_id' => 'jot_shop_ribbon_bg_img_id',
                    'repeat' => 'jot_shop_ribbon_bg_background_repeat', // Use false to hide the field
                    'size' => 'jot_shop_ribbon_bg_background_size',
                    'position' => 'jot_shop_ribbon_bg_background_position',
                    'attach' => 'jot_shop_ribbon_bg_background_attach'
                )
            )
        )
    );

    $wp_customize->add_setting('jot_shop_ribbon_bg_video', array(
           'default'        => '',
           'sanitize_callback' => 'sanitize_text_field'
       ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize, 'jot_shop_ribbon_bg_video', array(
           'label'    => __('Upload Background Video', 'oneline'),
           'section'  => 'jot_shop_ribbon',
           'settings' => 'jot_shop_ribbon_bg_video',
    )));
    $wp_customize->add_setting('jot_shop_ribbon_video_poster_image', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'jot_shop_ribbon_video_poster_image', array(
        'label'    => __('Upload Video Poster Image', 'oneline'),
        'section'  => 'jot_shop_ribbon',
        'settings' => 'jot_shop_ribbon_video_poster_image',
    )));

    $wp_customize->add_setting( 'jot_shop_enable_youtube_video', array(
                'default'               => false,
                'sanitize_callback'     => 'jot_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jot_shop_enable_youtube_video', array(
                'label'                 => esc_html__('Check to upload youtube video link', 'jot-shop'),
                'type'                  => 'checkbox',
                'section'               => 'jot_shop_ribbon',
                'settings'              => 'jot_shop_enable_youtube_video',
            ) ) );

$wp_customize->add_setting('jot_shop_youtube_video_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_textarea',
        
  ));
$wp_customize->add_control('jot_shop_youtube_video_link', array(
        'label'    => __('Enter youtube video embeded Url', 'jot-shop'),
        'section'  => 'jot_shop_ribbon',
        'settings' => 'jot_shop_youtube_video_link',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('jot_shop_ribbon_text', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('jot_shop_ribbon_text', array(
        'label'    => __('Text', 'jot-shop'),
        'section'  => 'jot_shop_ribbon',
        'settings' => 'jot_shop_ribbon_text',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('jot_shop_ribbon_btn_text', array(
        'default'           => 'Call To Action',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_text',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('jot_shop_ribbon_btn_text', array(
        'label'    => __('Button Text', 'jot-shop'),
        'section'  => 'jot_shop_ribbon',
        'settings' => 'jot_shop_ribbon_btn_text',
         'type'    => 'text',
 ));

$wp_customize->add_setting('jot_shop_ribbon_btn_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_text',
        
  ));
$wp_customize->add_control('jot_shop_ribbon_btn_link', array(
        'label'    => __('Button Link', 'jot-shop'),
        'section'  => 'jot_shop_ribbon',
        'settings' => 'jot_shop_ribbon_btn_link',
         'type'    => 'text',
 ));


  $wp_customize->add_setting('jot_shop_ribbon_doc', array(
    'sanitize_callback' => 'jot_shop_sanitize_text',
    ));
$wp_customize->add_control(new Jot_Shop_Misc_Control( $wp_customize, 'jot_shop_ribbon_doc',
            array(
        'section'     => 'jot_shop_ribbon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/jot-shop/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'jot-shop' ),
        'priority'   =>100,
    )));