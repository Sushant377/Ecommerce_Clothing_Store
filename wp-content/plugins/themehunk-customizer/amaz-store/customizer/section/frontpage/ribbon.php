<?php
define('AMAZ_STORE_RIBBON_LAYOUT_1', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. "amaz-store/customizer/images/ribbon-layout-1.png");
define('AMAZ_STORE_RIBBON_LAYOUT_2', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. "amaz-store/customizer/images/ribbon-layout-2.png");
$wp_customize->add_setting( 'amaz_store_disable_ribbon_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'amaz_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amaz_store_disable_ribbon_sec', array(
                'label'                 => esc_html__('Disable Section', 'amaz-store'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'amaz_store_ribbon',
                'settings'              => 'amaz_store_disable_ribbon_sec',
            ) ) );

// choose col layout
if(class_exists('amaz_store_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'amaz_store_ribbon_layout', array(
                'default'           => 'mhdrthree',
                'sanitize_callback' => 'amaz_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new amaz_store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'amaz_store_ribbon_layout', array(
                    'label'    => esc_html__( 'Ribbon Layout', 'amaz-store' ),
                    'section'  => 'amaz_store_ribbon',
                    'choices'  => array(
                        'ribbonleft' => array(
                            'url' => AMAZ_STORE_RIBBON_LAYOUT_1,
                        ),
                        'ribboncenter' => array(
                            'url' => AMAZ_STORE_RIBBON_LAYOUT_2,
                        ),                        
                                     
                    ),
                    'priority'   => 1,
                )
            )
        );
}

$wp_customize->add_setting('amaz_store_ribbon_background', array(
                'default'               => 'image',
                'sanitize_callback'     => 'amaz_store_sanitize_select',
            ) );
$wp_customize->add_control( new amaz_store_Customizer_Buttonset_Control( $wp_customize, 'amaz_store_ribbon_background', array(
                'label'                 => esc_html__( 'Choose Ribbon Background', 'amaz-store' ),
                 'priority'   => 2,
                'section'               => 'amaz_store_ribbon',
                'settings'              => 'amaz_store_ribbon_background',
                'choices'               => array(
                    'image'             => esc_html__( 'Image (Pro)', 'amaz-store' ),
                    'video'             => esc_html__( 'Video (Pro)', 'amaz-store' ), 
                ),
        ) ) );
    $wp_customize->add_setting( 'amaz_store_ribbon_bg_img_url', array(
        'sanitize_callback' => 'esc_url',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_setting( 'amaz_store_ribbon_bg_img_id', array(
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'amaz_store_ribbon_bg_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'amaz_store_ribbon_bg_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'amaz_store_ribbon_bg_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'amaz_store_ribbon_bg_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new amaz_store_Customize_Custom_Background_Control(
            $wp_customize,
            'amaz_store_ribbon_bg_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'amaz-store' ),
                'section'   => 'amaz_store_ribbon',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'amaz_store_ribbon_bg_img_url',
                    'image_id' => 'amaz_store_ribbon_bg_img_id',
                    'repeat' => 'amaz_store_ribbon_bg_background_repeat', // Use false to hide the field
                    'size' => 'amaz_store_ribbon_bg_background_size',
                    'position' => 'amaz_store_ribbon_bg_background_position',
                    'attach' => 'amaz_store_ribbon_bg_background_attach'
                )
            )
        )
    );

    $wp_customize->add_setting('amaz_store_ribbon_bg_video', array(
           'default'        => '',
           'sanitize_callback' => 'sanitize_text_field'
       ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize, 'amaz_store_ribbon_bg_video', array(
           'label'    => __('Upload Background Video', 'oneline'),
           'section'  => 'amaz_store_ribbon',
           'settings' => 'amaz_store_ribbon_bg_video',
    )));
    $wp_customize->add_setting('amaz_store_ribbon_video_poster_image', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'amaz_store_ribbon_video_poster_image', array(
        'label'    => __('Upload Video Poster Image', 'oneline'),
        'section'  => 'amaz_store_ribbon',
        'settings' => 'amaz_store_ribbon_video_poster_image',
    )));

    $wp_customize->add_setting( 'amaz_store_enable_youtube_video', array(
                'default'               => false,
                'sanitize_callback'     => 'amaz_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amaz_store_enable_youtube_video', array(
                'label'                 => esc_html__('Check to upload youtube video link', 'amaz-store'),
                'type'                  => 'checkbox',
                'section'               => 'amaz_store_ribbon',
                'settings'              => 'amaz_store_enable_youtube_video',
            ) ) );

$wp_customize->add_setting('amaz_store_youtube_video_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_textarea',
        
  ));
$wp_customize->add_control('amaz_store_youtube_video_link', array(
        'label'    => __('Enter youtube video embeded Url', 'amaz-store'),
        'section'  => 'amaz_store_ribbon',
        'settings' => 'amaz_store_youtube_video_link',
         'type'    => 'textarea',
 ));

if ( class_exists( 'amaz_store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'amaz_store_ribbon_margin', array(
                'sanitize_callback' => 'amaz_store_sanitize_range_value',
                'default'           => '178',
            )
        );
$wp_customize->add_control(
            new amaz_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'amaz_store_ribbon_margin', array(
                    'label'       => esc_html__( 'Ribbon Margin (Pro)', 'amaz-store' ),
                    'section'     => 'amaz_store_ribbon',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                      'media_query' => true,
                    'sum_type'    => true,
                )
           )
    );
}

$wp_customize->add_setting('amaz_store_ribbon_text', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('amaz_store_ribbon_text', array(
        'label'    => __('Text', 'amaz-store'),
        'section'  => 'amaz_store_ribbon',
        'settings' => 'amaz_store_ribbon_text',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('amaz_store_ribbon_btn_text', array(
        'default'           => 'Call To Action',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_text',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('amaz_store_ribbon_btn_text', array(
        'label'    => __('Button Text', 'amaz-store'),
        'section'  => 'amaz_store_ribbon',
        'settings' => 'amaz_store_ribbon_btn_text',
         'type'    => 'text',
 ));

$wp_customize->add_setting('amaz_store_ribbon_btn_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_text',
        
  ));
$wp_customize->add_control('amaz_store_ribbon_btn_link', array(
        'label'    => __('Button Link', 'amaz-store'),
        'section'  => 'amaz_store_ribbon',
        'settings' => 'amaz_store_ribbon_btn_link',
         'type'    => 'text',
 ));


  $wp_customize->add_setting('amaz_store_ribbon_doc', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
$wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz_store_ribbon_doc',
            array(
        'section'     => 'amaz_store_ribbon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/amaz-store/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'amaz-store' ),
        'priority'   =>100,
    )));
