<?php
$wp_customize->add_setting( 'm_shop_disable_ribbon_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_ribbon_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'm_shop_ribbon',
                'settings'              => 'm_shop_disable_ribbon_sec',
            ) ) );

$wp_customize->add_setting('m_shop_ribbon_background', array(
                'default'               => 'image',
                'sanitize_callback'     => 'm_shop_sanitize_select',
            ) );
$wp_customize->add_control( new M_Shop_Customizer_Buttonset_Control( $wp_customize, 'm_shop_ribbon_background', array(
                'label'                 => esc_html__( 'Choose Ribbon Background', 'themehunk-customizer' ),
                 'priority'   => 2,
                'section'               => 'm_shop_ribbon',
                'settings'              => 'm_shop_ribbon_background',
                'choices'               => array(
                    'image'             => esc_html__( 'Image', 'themehunk-customizer' ),
                    'video'             => esc_html__( 'Video', 'themehunk-customizer' ), 
                ),
        ) ) );
    $wp_customize->add_setting( 'm_shop_ribbon_bg_img_url', array(
        'sanitize_callback' => 'esc_url',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_setting( 'm_shop_ribbon_bg_img_id', array(
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'm_shop_ribbon_bg_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'm_shop_ribbon_bg_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'm_shop_ribbon_bg_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'm_shop_ribbon_bg_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new M_Shop_Customize_Custom_Background_Control(
            $wp_customize,
            'm_shop_ribbon_bg_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'themehunk-customizer' ),
                'section'   => 'm_shop_ribbon',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'm_shop_ribbon_bg_img_url',
                    'image_id' => 'm_shop_ribbon_bg_img_id',
                    'repeat' => 'm_shop_ribbon_bg_background_repeat', // Use false to hide the field
                    'size' => 'm_shop_ribbon_bg_background_size',
                    'position' => 'm_shop_ribbon_bg_background_position',
                    'attach' => 'm_shop_ribbon_bg_background_attach'
                )
            )
        )
    );

    $wp_customize->add_setting('m_shop_ribbon_bg_video', array(
           'default'        => '',
           'sanitize_callback' => 'sanitize_text_field'
       ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize, 'm_shop_ribbon_bg_video', array(
           'label'    => __('Upload Background Video', 'themehunk-customizer'),
           'section'  => 'm_shop_ribbon',
           'settings' => 'm_shop_ribbon_bg_video',
    )));
    $wp_customize->add_setting('m_shop_ribbon_video_poster_image', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'm_shop_ribbon_video_poster_image', array(
        'label'    => __('Upload Video Poster Image', 'themehunk-customizer'),
        'section'  => 'm_shop_ribbon',
        'settings' => 'm_shop_ribbon_video_poster_image',
    )));

$wp_customize->add_setting('m_shop_ribbon_text', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('m_shop_ribbon_text', array(
        'label'    => __('Text', 'themehunk-customizer'),
        'section'  => 'm_shop_ribbon',
        'settings' => 'm_shop_ribbon_text',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('m_shop_ribbon_btn_text', array(
        'default'           => 'Call To Action',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('m_shop_ribbon_btn_text', array(
        'label'    => __('Button Text', 'themehunk-customizer'),
        'section'  => 'm_shop_ribbon',
        'settings' => 'm_shop_ribbon_btn_text',
         'type'    => 'text',
 ));

$wp_customize->add_setting('m_shop_ribbon_btn_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        
  ));
$wp_customize->add_control('m_shop_ribbon_btn_link', array(
        'label'    => __('Button Link', 'themehunk-customizer'),
        'section'  => 'm_shop_ribbon',
        'settings' => 'm_shop_ribbon_btn_link',
         'type'    => 'text',
 ));
if ( class_exists( 'M_Shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'm_shop_ribbon_top_padding', array(
                'sanitize_callback' => 'm_shop_sanitize_range_value',
                'default'           => '1.8',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'm_shop_ribbon_top_padding', array(
                    'label'       => esc_html__( 'Top Padding', 'themehunk-customizer' ),
                    'section'     => 'm_shop_ribbon',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 0.1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
$wp_customize->add_setting(
            'm_shop_ribbon_btm_padding', array(
                'sanitize_callback' => 'm_shop_sanitize_range_value',
                'default'           => '1.8',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'm_shop_ribbon_btm_padding', array(
                    'label'       => esc_html__( 'Bottom Padding', 'themehunk-customizer' ),
                    'section'     => 'm_shop_ribbon',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 0.1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}

  $wp_customize->add_setting('m_shop_ribbon_doc', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_ribbon_doc',
            array(
        'section'     => 'm_shop_ribbon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'themehunk-customizer' ),
        'priority'   =>100,
    )));