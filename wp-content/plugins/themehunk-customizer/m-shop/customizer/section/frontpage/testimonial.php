<?php 
$wp_customize->add_setting( 'm_shop_disable_testimonial_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_testimonial_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'm_shop_testimonial',
                'settings'              => 'm_shop_disable_testimonial_sec',
            ) ) );

//Testimonials Content Via Repeater
              if ( class_exists( 'M_Shop_Repeater' ) ){
              $wp_customize->add_setting(
                'm_shop_testimonials_content', array(
                    'default'           =>  M_Shop_Defaults_Models::instance()->get_testimonials_default(),
                    'sanitize_callback' => 'm_shop_repeater_sanitize',  
                )
            );
            $wp_customize->add_control(
                new M_Shop_Repeater(
                    $wp_customize, 'm_shop_testimonials_content', array(
                        'label'                                => esc_html__( 'Testimonials Content', 'themehunk-customizer' ),
                        'section'                              => 'm_shop_testimonial',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Testimonial', 'themehunk-customizer' ),
                        'item_name'                            => esc_html__( 'Testimonial', 'themehunk-customizer' ),
                        'customizer_repeater_icon_control'  => false,
                        'customizer_repeater_image_control'    => true,
                        'customizer_repeater_title_control'    => true,
                        'customizer_repeater_price_control'    => false,
                        'customizer_repeater_subtitle_control' => true,
                        'customizer_repeater_text_control'     => true,
                       'customizer_repeater_text2_control' => false,
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,
                        'customizer_repeater_color_control' => false,
                    ),'m_shop_Testimonial_Repeater'
                )
            );
}