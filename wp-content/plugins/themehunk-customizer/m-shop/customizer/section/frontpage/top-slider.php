<?php
$wp_customize->add_setting( 'm_shop_disable_top_slider_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_top_slider_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                'section'               => 'm_shop_top_slider_section',
                'settings'              => 'm_shop_disable_top_slider_sec',
            ) ) );

if(class_exists('M_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'm_shop_top_slide_layout', array(
                'default'           => 'slide-layout-1',
                'sanitize_callback' => 'm_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'm_shop_top_slide_layout', array(
                    'label'    => esc_html__( 'Slider Layout', 'themehunk-customizer' ),
                    'section'  => 'm_shop_top_slider_section',
                    'choices'  => array(
                        'slide-layout-1'   => array(
                            'url' => M_SHOP_SLIDER_LAYOUT_1,
                        ),
                        'slide-layout-6' => array(
                            'url' => M_SHOP_SLIDER_LAYOUT_6,
                        ),
                        'slide-layout-2' => array(
                            'url' => M_SHOP_SLIDER_LAYOUT_2,
                        ),
                        'slide-layout-3' => array(
                            'url' => M_SHOP_SLIDER_LAYOUT_3,
                        ), 
                        'slide-layout-4' => array(
                            'url' => M_SHOP_SLIDER_LAYOUT_4,
                        ), 
                        'slide-layout-5' => array(
                            'url' => M_SHOP_SLIDER_LAYOUT_5,
                        ),         
                    ),
                )
            )
        );
} 
//Slider Content Via Repeater
      if ( class_exists( 'M_Shop_Repeater' ) ){
            $wp_customize->add_setting(
             'm_shop_top_slide_content', array(
             'sanitize_callback' => 'm_shop_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new M_Shop_Repeater(
                    $wp_customize, 'm_shop_top_slide_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'themehunk-customizer' ),
                        'section'                              => 'm_shop_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'themehunk-customizer' ),
                        'item_name'                            => esc_html__( 'Slide', 'themehunk-customizer' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'m_shop_top_slide_content'
                )
            );
        }


  // Add an option to disable the logo.
  $wp_customize->add_setting( 'm_shop_top_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'm_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new M_Shop_Toggle_Control( $wp_customize, 'm_shop_top_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'themehunk-customizer' ),
    'section'     => 'm_shop_top_slider_section',
    'type'        => 'toggle',
    'settings'    => 'm_shop_top_slider_optn',
  ) ) );

$wp_customize->add_setting('m_shop_slider_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_number',
));
$wp_customize->add_control( 'm_shop_slider_speed', array(
        'label'    => __('Speed', 'themehunk-customizer'),
        'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','themehunk-customizer'),
        'section'  => 'm_shop_top_slider_section',
         'type'        => 'number',
));

$wp_customize->add_setting('m_shop_top_slider_doc', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_top_slider_doc',
            array(
        'section'    => 'm_shop_top_slider_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#top-slider',
        'description' => esc_html__( 'To know more go with this', 'themehunk-customizer' ),
        'priority'   =>100,
    )));