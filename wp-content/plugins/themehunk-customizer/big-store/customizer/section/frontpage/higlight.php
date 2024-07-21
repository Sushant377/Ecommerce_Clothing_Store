<?php 
$wp_customize->add_setting( 'big_store_disable_highlight_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_disable_highlight_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big_store_highlight',
                'settings'              => 'big_store_disable_highlight_sec',
            ) ) );

// section heading
// $wp_customize->add_setting('big_store_hglgt_heading', array(
//         'default' => __('Highlight Feature','big-store'),
//         'capability'        => 'edit_theme_options',
//         'sanitize_callback' => 'big_store_sanitize_text',
//         'transport'         => 'postMessage',
// ));
// $wp_customize->add_control( 'big_store_hglgt_heading', array(
//         'label'    => __('Section Heading', 'big-store'),
//         'section'  => 'big_store_highlight',
//          'type'       => 'text',
// ));

//Highlight Content Via Repeater
      if ( class_exists( 'Big_Store_Repeater' ) ) {
            $wp_customize->add_setting(
        'big_store_highlight_content', array(
        'sanitize_callback' => 'big_store_repeater_sanitize',  
        'default'           => Big_Store_Defaults_Models::instance()->get_feature_default(),
                )
            );

            $wp_customize->add_control(
                new Big_Store_Repeater(
                    $wp_customize, 'big_store_highlight_content', array(
                        'label'                                => esc_html__( 'Highlight Content', 'big-store' ),
                        'section'                              => 'big_store_highlight',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Feature', 'big-store' ),
                        'item_name'                            => esc_html__( 'Feature', 'big-store' ),
                        
                        'customizer_repeater_title_control'    => true, 
                        'customizer_repeater_color_control'		=>	false, 
                        'customizer_repeater_color2_control' 	=> false,
                        'customizer_repeater_icon_control'	   => true,
                        'customizer_repeater_subtitle_control' => true, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => false,  
                        'customizer_repeater_link_control'     => false,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'Big_Store_Ship_Repeater'
                )
            );
        }


  $wp_customize->add_setting('big_store_highlight_doc', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
  $wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_highlight_doc',
            array(
        'section'     => 'big_store_highlight',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#highlight-section',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));