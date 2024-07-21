<?php 
$wp_customize->add_setting( 'amaz_store_disable_highlight_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'amaz_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amaz_store_disable_highlight_sec', array(
                'label'                 => esc_html__('Disable Section', 'amaz-store'),
                'type'                  => 'checkbox',
                'section'               => 'amaz_store_highlight',
                'settings'              => 'amaz_store_disable_highlight_sec',
            ) ) );

// section heading
// $wp_customize->add_setting('amaz_store_hglgt_heading', array(
//         'default' => __('Highlight Feature','amaz-store'),
//         'capability'        => 'edit_theme_options',
//         'sanitize_callback' => 'amaz_store_sanitize_text',
//         'transport'         => 'postMessage',
// ));
// $wp_customize->add_control( 'amaz_store_hglgt_heading', array(
//         'label'    => __('Section Heading', 'amaz-store'),
//         'section'  => 'amaz_store_highlight',
//          'type'       => 'text',
// ));

//Highlight Content Via Repeater
      if ( class_exists( 'amaz_store_Repeater' ) ) {
            $wp_customize->add_setting(
        'amaz_store_highlight_content', array(
        'sanitize_callback' => 'amaz_store_repeater_sanitize',  
        'default'           => amaz_store_Defaults_Models::instance()->get_feature_default(),
                )
            );

            $wp_customize->add_control(
                new amaz_store_Repeater(
                    $wp_customize, 'amaz_store_highlight_content', array(
                        'label'                                => esc_html__( 'Highlight Content', 'amaz-store' ),
                        'section'                              => 'amaz_store_highlight',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Feature', 'amaz-store' ),
                        'item_name'                            => esc_html__( 'Feature', 'amaz-store' ),
                        
                        'customizer_repeater_title_control'    => true, 
                        'customizer_repeater_color_control'     =>  false, 
                        'customizer_repeater_color2_control'    => false,
                        'customizer_repeater_icon_control'     => true,
                        'customizer_repeater_subtitle_control' => true, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => false,  
                        'customizer_repeater_link_control'     => false,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'amaz_store_Ship_Repeater'
                )
            );
        }


  $wp_customize->add_setting('amaz_store_highlight_doc', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
  $wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz_store_highlight_doc',
            array(
        'section'     => 'amaz_store_highlight',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/amaz-store/#highlight-section',
        'description' => esc_html__( 'To know more go with this', 'amaz-store' ),
        'priority'   =>100,
    )));