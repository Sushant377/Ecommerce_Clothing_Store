<?php 
$wp_customize->add_setting( 'm_shop_disable_highlight_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_highlight_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                'section'               => 'm_shop_highlight',
                'settings'              => 'm_shop_disable_highlight_sec',
            ) ) );

// section heading
// $wp_customize->add_setting('m_shop_hglgt_heading', array(
//         'default' => __('Highlight Feature','themehunk-customizer'),
//         'capability'        => 'edit_theme_options',
//         'sanitize_callback' => 'm_shop_sanitize_text',
//         'transport'         => 'postMessage',
// ));
// $wp_customize->add_control( 'm_shop_hglgt_heading', array(
//         'label'    => __('Section Heading', 'themehunk-customizer'),
//         'section'  => 'm_shop_highlight',
//          'type'       => 'text',
// ));

//Highlight Content Via Repeater
      if ( class_exists( 'M_Shop_Repeater' ) ) {
            $wp_customize->add_setting(
        'm_shop_highlight_content', array(
        'sanitize_callback' => 'm_shop_repeater_sanitize',  
        'default'           => M_Shop_Defaults_Models::instance()->get_feature_default(),
                )
            );

            $wp_customize->add_control(
                new M_Shop_Repeater(
                    $wp_customize, 'm_shop_highlight_content', array(
                        'label'                                => esc_html__( 'Highlight Content', 'themehunk-customizer' ),
                        'section'                              => 'm_shop_highlight',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Feature', 'themehunk-customizer' ),
                        'item_name'                            => esc_html__( 'Feature', 'themehunk-customizer' ),
                        
                        'customizer_repeater_title_control'    => true, 
                        'customizer_repeater_color_control'		=>	false, 
                        'customizer_repeater_color2_control' 	=> false,
                        'customizer_repeater_icon_control'	   => true,
                        'customizer_repeater_subtitle_control' => true, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => false,  
                        'customizer_repeater_link_control'     => false,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'M_Shop_Ship_Repeater'
                )
            );
        }


  $wp_customize->add_setting('m_shop_highlight_doc', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
  $wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_highlight_doc',
            array(
        'section'     => 'm_shop_highlight',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#highlight-section',
        'description' => esc_html__( 'To know more go with this', 'themehunk-customizer' ),
        'priority'   =>100,
    )));