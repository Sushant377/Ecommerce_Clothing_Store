<?php
function oneline_lite_unlimited_customize_register( $wp_customize ) {
$palette = array('rgb(0, 0, 0, 0)',);  
//=============================
//= Theme option =
//=============================
$wp_customize->add_panel('theme_optn', array(
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Theme Option', 'oneline-lite'),
    'description'    => '',
) );
$wp_customize->add_section('global_set', array(
        'title'    => __('Global Setting', 'oneline-lite'),
        'priority' => 1,
        'panel'  => 'theme_optn',
));
 // Sidebar settings
$wp_customize->add_setting( 'oneline-lite_layout',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
               
              )
         );
$wp_customize->add_control( 'oneline-lite_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Page Layout', 'oneline-lite'),
        'description'       => esc_html__('Choose sidebar option for inner pages (non-home)', 'oneline-lite'),
        'section'     => 'global_set',
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'oneline-lite'),
        'left' => esc_html__('Left sidebar', 'oneline-lite'),
        'no-sidebar' => esc_html__('No sidebar', 'oneline-lite'),
                    )
                )
            );
// Disable Sticky Header
            $wp_customize->add_setting( 'oneline-lite_sticky_header_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'oneline-lite_sticky_header_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Fixed Header?', 'oneline-lite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Fixed header and activate Normal header.', 'oneline-lite')
                )
            );
// Disable Animation
            $wp_customize->add_setting( 'oneline-lite_animation_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'oneline-lite_animation_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable animation effect?', 'oneline-lite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable homepage section animation.', 'oneline-lite')
                )
            );
 // Disable back to top button
            $wp_customize->add_setting( 'oneline-lite_backtotop_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'oneline-lite_backtotop_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide back to top button ?', 'oneline-lite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Back To Top button.', 'oneline-lite')
                )
            ); 
// Disable SVG in all section
            $wp_customize->add_setting( 'oneline-lite_svg_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'oneline-lite_svg_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable SVG effect ?', 'oneline-lite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable SVG in all section', 'oneline-lite')
                )
            );
// Disable parallax effect in all site
            $wp_customize->add_setting( 'parallax_opt',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'parallax_opt',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Parallax effect ?', 'oneline-lite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Parallax effect ', 'oneline-lite')
                )
            );
       
//*****************************************//             
// site-color
//*****************************************//           
$wp_customize->add_section('site_color', array(
        'title'    => __('Site Color', 'oneline-lite'),
        'priority' => 2,
        'panel'  => 'theme_optn',
));
$wp_customize->add_setting('theme_color', array(
        'default'        => '#D4B068',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'theme_color', 
    array(
        'label'      => __( 'Theme Color', 'oneline-lite' ),
        'section'    => 'site_color',
        'settings'   => 'theme_color',
    ) ) );
// footer-bg-color
$wp_customize->add_setting('footer_bg_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'footer_bg_color', 
    array(
        'label'      => __('Footer Background Color', 'oneline-lite' ),
        'section'    => 'site_color',
        'settings'   => 'footer_bg_color',
    ) ) ); 
//  =============================
//  header option =
//  =============================
// header-setting
$wp_customize->add_section('header_setting', array(
        'title'    => __('Header Setting', 'oneline-lite'),
        'priority' => 3,
        'panel'  => 'theme_optn',
));
// header layout option
$wp_customize->add_setting('header_layout', array(
        'default'        =>'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'header_layout', array(
        'settings' => 'header_layout',
        'label'   => __('Header Layout Option','oneline-lite'),
        'section' => 'header_setting',
        'type'    => 'radio',
        'choices'    => array(
            'default'        => 'Default Menu',
            'center'        => 'Center Menu',
            'split'      => 'Split Menu',
        ),
    ));
 //header transparent
    $wp_customize->add_setting( 'hdr_bg_trnsparent_active',
              array(
            'sanitize_callback' => 'themehunk_sanitize_checkbox',
            'default'           => '1',
                )
            );
    $wp_customize->add_control( 'hdr_bg_trnsparent_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Header Transparent', 'oneline-lite'),
                'section'     => 'header_setting',
                'description' => esc_html__('(Only applied for front page template.)', 'oneline-lite')
                )
            );
 //header-toggle
$wp_customize->add_setting('hdr_toggle_active', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('hdr_toggle_active', array(
        'settings' => 'hdr_toggle_active',
        'label'     => __( 'Header Visibility','oneline-lite'),
        'description' => esc_html__('(Check here to header will toggle on front page)', 'oneline-lite'),
        'section' => 'header_setting',
        'type'    => 'checkbox',
    ) );
// custom-last-menu-button    
$wp_customize->add_setting( 'last_menu_btn',
              array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
$wp_customize->add_control( 'last_menu_btn',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Custom Button', 'oneline-lite'),
                'description' => esc_html__('(Check here to style last Menu Item as a Custom Button)', 'oneline-lite'),
                'section'     => 'header_setting',
                
                )
            );  
// header-setting-color-option
// background-color
$wp_customize->add_setting('hd_bg_color',
        array(
            'default'     => '',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'hd_bg_color',
            array(
                'label'     => __('Header Background Color','oneline-lite'),
                'section'   => 'header_setting',
                'settings'  => 'hd_bg_color',
                'palette'   => $palette
            )
        )
    );
// shrink header bg
$wp_customize->add_setting('shrnk_hd_bg_color',
        array(
            'default'     => 'rgba(20, 20, 20, 0.952941)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'shrnk_hd_bg_color',
            array(
                'label'     => __('Header Shrink Background Color','oneline-lite'),
                'section'   => 'header_setting',
                'settings'  => 'shrnk_hd_bg_color',
                'palette'   => $palette
            )
        )
    );
// title
$wp_customize->add_setting('site_title_color', array(
        'default'        => '#D4B068',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'site_title_color', 
    array(
    'label' => __('Site Title Color','oneline-lite'),
        'section'    => 'header_setting',
        'settings'   => 'site_title_color',
    ) ) );
// menu   
$wp_customize->add_setting('hd_menu_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_color', 
    array(
    'label' => __('Menu Link Color','oneline-lite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_color',
    ) ) );
  // hover 
$wp_customize->add_setting('hd_menu_hvr_color', array(
        'default'        => '#D4B068',
        'capability'     => 'edit_theme_options',      
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_hvr_color', 
    array(
    'label' => __('Menu Link Hover/Active Color','oneline-lite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_hvr_color',
    ) ) );
// responsive menu icon button color 
   $wp_customize->add_setting('mobile_menu_bg_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options', 
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'mobile_menu_bg_color', 
    array(
    'label' => __('Responsive Menu Icon Color','featuredlite'),
        'section'    => 'header_setting',
        'settings'   => 'mobile_menu_bg_color',
) ) );   
// footer-info-color
$wp_customize->add_setting('footer_info_bg_color', array(
        'default'        => '#1F1F1F',
        'capability'     => 'edit_theme_options',
        ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'footer_info_bg_color', 
    array(
        'label'      => __( 'Copyright Background Color', 'oneline-lite' ),
        'section'    => 'site_color',
        'settings'   => 'footer_info_bg_color',
    ) ) ); 

// footer text  
   $wp_customize->add_section( 'footer_option', array(
         'title'          => __( 'Footer Text', 'oneline-lite' ),
         'priority'       => 5,
          'panel'  => 'theme_optn',
    ) );
    $wp_customize->add_setting('copyright_textbox', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('copyright_textbox', array(
        'label'    => __('Footer Text', 'oneline-lite'),
        'section'  => 'footer_option',
        'settings' => 'copyright_textbox',
         'type'       => 'textarea',
    ));

//**************************************//            
// theme-option-end
//**************************************// 
//============================
// section On/off start 
//============================
 $wp_customize->add_section('section_hide', array(
        'title'    => __('Section On/Off', 'oneline-lite'),
        'priority' => 3,
    ));
     $wp_customize->add_setting('section_on_off', array(
        'default'        =>array(),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_checkbox_explode'
    ));
     $wp_customize->add_control(new themehunk_Customize_Control_Checkbox_Multiple(
            $wp_customize,'section_on_off', array(
        'settings' => 'section_on_off',
        'label'   => __( 'Section On/Off', 'oneline-lite' ),
        'description'   => __( '(check to Hide section from frontpage)','oneline-lite' ),
        'section' => 'section_hide',
        'choices' => array(
        'slider' => __( '1 Slider Section','oneline-lite' ),
        'services' => __( '2 Service Section','oneline-lite' ),
        'ribbon' => __( '3 Ribbon Section', 'oneline-lite' ),
    'team' => __( '4 Team Section ','oneline-lite' ),
    'testimonial'=> __( '6 Testimonial Section','oneline-lite' ),
    'blog' => __( '5 Blog Section','oneline-lite' ),
    'woocommerce'=> __( '8 woocommerce Section','oneline-lite' ),
    'contact'  => __( '9 Contact Section','oneline-lite' ),

            )
        ) 
    )
);
//===============================
//= section ordering pro feature Settings =
//=============================
   $wp_customize->add_section('section_home_ordering', array(
        'title'    => __('Section Ordering', 'oneline-lite'),
        'priority' => 3,
    ));
   $wp_customize->add_setting('section_order', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'section_order',
            array(
        'section'  => 'section_home_ordering',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/oneline-single-page-wordpress-theme/">OnelinePro</a> for full control over <strong>section ordering</strong>!','oneline-lite' )
    )));     
//****** Slider Section ****//
    $wp_customize->add_panel( 'slider_panel', array(
        'priority'       => 5,
        'title'          => __('Slider Setting', 'oneline-lite'),
        'description'    => '',
        ));
    $wp_customize->add_section('slider_set_optn', array(
        'title'    => __('Slider Setting', 'oneline-lite'),
        'priority' => 1,
         'panel'  => 'slider_panel',
    ));
    //slider speed 
    $wp_customize->add_setting('oneline_slider_speed', array(
        'default'           => 3000,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_int'
    ));
    $wp_customize->add_control('oneline_slider_speed', array(
        'label'    => __('Slider Speed', 'oneline-lite'),
        'description'=> __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'oneline-lite'),
        'section'  => 'slider_set_optn',
        'settings' => 'oneline_slider_speed',
         'type'       => 'text',

    ));
$wp_customize->add_setting('sldr_ovrly_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.55)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'sldr_ovrly_color',
            array(
                'label'     => __('Overlay Color','oneline-lite'),
                'section'   => 'slider_set_optn',
                'settings'  => 'sldr_ovrly_color',
                'palette'   => $palette
            )
        )
    );
// title-color
$wp_customize->add_setting('sldr_title_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'sldr_title_color', 
    array(
    'label' => __('Title Color','oneline-lite'),
        'section'    => 'slider_set_optn',
        'settings'   => 'sldr_title_color',
    ) ) );
// slider-button-style
$wp_customize->add_setting( 'slidr_button',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'default',
              )
         );
$wp_customize->add_control('slidr_button',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Button', 'oneline-lite'),
        'description'       => esc_html__('Choose button style for slider.', 'oneline-lite'),
        'section'     => 'slider_set_optn',
        'choices' => array(
        'default' => esc_html__('Button style 1', 'oneline-lite'),
        'button-one' => esc_html__('Button style 2', 'oneline-lite'),
        'button-two' => esc_html__('Button style 3', 'oneline-lite'),
        'button-three' => esc_html__('Button style 4', 'oneline-lite'),
        'button-four' => esc_html__('Button style 5', 'oneline-lite'),
             )
           )
        );
        //First slider image
        $wp_customize->add_section('section_slider_first', array(
            'title'    => __('First Slider Setting', 'oneline-lite'),
            'priority' => 1,
             'panel'  => 'slider_panel',
         ));
         $wp_customize->add_setting('first_slider_image', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
            'label'    => __('Slider Image Upload', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_slider_image',
        )));
        $wp_customize->add_setting('first_slider_heading', array(
            'default'           => __('Heading','oneline-lite'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        ));
        $wp_customize->add_control('first_slider_heading', array(
            'label'    => __('Slider Heading', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_slider_heading',
             'type'       => 'textarea',
        ));
        $wp_customize->add_setting('first_slider_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('first_slider_link', array(
            'label'    => __('Link for Heading', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_slider_link',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('first_button_text', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('first_button_text', array(
            'label'    => __('Text for button', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_button_text',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('first_button_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('first_button_link', array(
            'label'    => __('Link for button', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_button_link',
             'type'       => 'text',
        ));

        //Second slider image

        $wp_customize->add_section('section_slider_second', array(
            'title'    => __('Second Slider Setting', 'oneline-lite'),
            'priority' => 2,
             'panel'  => 'slider_panel',
        ));
        $wp_customize->add_setting('second_slider_image', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
            'label'    => __('Slider Image Upload', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_slider_image',
        )));
        $wp_customize->add_setting('second_slider_heading', array(
            'default'           => __('Heading','oneline-lite'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_slider_heading', array(
            'label'    => __('Slider Heading', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_slider_heading',
             'type'       => 'textarea',
        ));
        $wp_customize->add_setting('second_slider_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_slider_link', array(
            'label'    => __('Link for Heading', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_slider_link',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('second_button_text', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_button_text', array(
            'label'    => __('Text for button', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_button_text',
             'type'       => 'text',
         ));
        $wp_customize->add_setting('second_button_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_button_link', array(
            'label'    => __('Link for button', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_button_link',
             'type'       => 'text',
        ));
        //Second Third image

        $wp_customize->add_section('section_slider_third', array(
            'title'    => __('Third Slider Setting', 'oneline-lite'),
            'priority' => 3,
             'panel'  => 'slider_panel',
        ));
        $wp_customize->add_setting('third_slider_image', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_slider_image', array(
            'label'    => __('Slider Image Upload', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_slider_image',
        )));
        $wp_customize->add_setting('third_slider_heading', array(
            'default'           => __('Heading','oneline-lite'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_slider_heading', array(
            'label'    => __('Slider Heading', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_slider_heading',
             'type'       => 'textarea',
        ));
        $wp_customize->add_setting('third_slider_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_slider_link', array(
            'label'    => __('Link for Heading', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_slider_link',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('third_button_text', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_button_text', array(
            'label'    => __('Text for button', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_button_text',
             'type'       => 'text',
         ));
        $wp_customize->add_setting('third_button_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_button_link', array(
            'label'    => __('Link for button', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_button_link',
             'type'       => 'text',
        ));

 // add-more-slider-pro       
$wp_customize->add_section('more_slidr_', array(
        'title'    => __('For More Slider', 'oneline-lite'),
        'priority' => 5,
        'panel'  => 'slider_panel',
    ));
   $wp_customize->add_setting('slide_more', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'slide_more',
            array(
        'section'  => 'more_slidr_',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/oneline-single-page-wordpress-theme/">OnelinePro</a> for full control over <strong>section ordering</strong>!','oneline-lite' )
    )));     

// end slider section
/************************************************/
/** Our Services Section ***/
/************************************************/
    $wp_customize->add_panel( 'services_panel', array(
        'priority'       => 5,
        'title'          => __('Services Section', 'oneline-lite'),
    ) );
    $wp_customize->add_section('services_setting', array(
        'title'    => __('Setting', 'oneline-lite'),
        'priority' => 1,
        'panel'    =>'services_panel'
    ));
    $wp_customize->add_setting('our_services_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
   $wp_customize->add_control('our_services_heading', array(
        'label'    => __('Main Heading', 'oneline-lite'),
        'section'  => 'services_setting',
        'settings' => 'our_services_heading',
         'type'       => 'text',
    )); 
    $wp_customize->add_setting('our_services_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'

    ));
    $wp_customize->add_control('our_services_subheading', array(
        'label'    => __('Sub Heading', 'oneline-lite'),
        'section'  => 'services_setting',
        'settings' => 'our_services_subheading',
        'type'       => 'textarea',
    )); 
    $wp_customize->add_setting('service_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'service_bg_color', 
    array(
                'label'     => __('Background Color','oneline-lite'),
                'section'   => 'services_setting',
                'settings'  => 'service_bg_color',
            )
        )
    );
    $wp_customize->add_setting('service_hd_color', array(
        'default'        => '#111',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'service_hd_color', 
    array(
    'label' => __('Main Heading Color','oneline-lite'),
        'section'    => 'services_setting',
        'settings'   => 'service_hd_color',
    ) ) );
    $wp_customize->add_setting('service_sbhd_color', array(
        'default'        => '#7D7D7D',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'service_sbhd_color', 
    array(
    'label' => __('Sub Heading Color','oneline-lite'),
        'section'    => 'services_setting',
        'settings'   => 'service_sbhd_color',
    ) ) );
// end services section
/** Our Ribbon Section ***/
   $wp_customize->add_panel( 'ribbon_panel', array(
        'priority'       => 6,
        'title'          => __('Ribbon Section', 'oneline-lite'),
    ) );
    $wp_customize->add_section('ribbon_sittings', array(
        'title'    => __('Setting', 'oneline-lite'),
        'priority' => 1,
        'panel'    =>'ribbon_panel'
    ));
    $wp_customize->add_setting('ribbon_heading', array(
        'default'           => '',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('ribbon_heading', array(
        'label'    => __('Heading', 'oneline-lite'),
        'section'  => 'ribbon_sittings',
        'settings' => 'ribbon_heading',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('ribbon_button_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
   $wp_customize->add_control('ribbon_button_text', array(
        'label'    => __('Button Text', 'oneline-lite'),
        'section'  => 'ribbon_sittings',
        'settings' => 'ribbon_button_text',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('ribbon_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('ribbon_button_link', array(
        'label'    => __('Button Link', 'oneline-lite'),
        'section'  => 'ribbon_sittings',
        'settings' => 'ribbon_button_link',
         'type'       => 'text',
    )); 
    $wp_customize->add_setting('ribbn_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.55)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ribbn_bg_color',
            array(
                'label'     => __('Overlay Color','oneline-lite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','oneline-lite'),
                'section'   => 'ribbon_sittings',
                'settings'  => 'ribbn_bg_color',
                'palette'   => $palette
            )
        )
    ); 
    $wp_customize->add_setting('ribbon_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'ribbon_hd_color', 
    array(
    'label' => __('Heading Color','oneline-lite'),
        'section'    => 'ribbon_sittings',
        'settings'   => 'ribbon_hd_color',
    ) ) );

    $wp_customize->add_setting('ribbn_btn_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ribbn_btn_bg_color',
            array(
                'label'     => __('Button Background Color','oneline-lite'),
                'section'   => 'ribbon_sittings',
                'settings'  => 'ribbn_btn_bg_color',
                'palette'   => $palette
            )
        )
    ); 

    $wp_customize->add_setting('ribbon_btn_title_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'ribbon_btn_title_color', 
    array(
    'label' => __('Button Text Color','oneline-lite'),
        'section'    => 'ribbon_sittings',
        'settings'   => 'ribbon_btn_title_color',
    ) ) );

    $wp_customize->add_setting('ribbon_btn_brd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'ribbon_btn_brd_color', 
    array(
    'label' => __('Button Border Color','oneline-lite'),
        'section'    => 'ribbon_sittings',
        'settings'   => 'ribbon_btn_brd_color',
    ) ) );
    // btn-hover
    $wp_customize->add_setting('ribbn_btn_bg_hvr_color',
        array(
            'default'     => 'rgba(255, 255, 255, 0.5)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ribbn_btn_bg_hvr_color',
            array(
                'label'     => __('Button Background Hover Color','oneline-lite'),
                'section'   => 'ribbon_sittings',
                'settings'  => 'ribbn_btn_bg_hvr_color',
                'palette'   => $palette
            )
        )
    ); 

    $wp_customize->add_setting('ribbon_btn_title_hvr_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'ribbon_btn_title_hvr_color', 
    array(
    'label' => __('Button Text Hover Color','oneline-lite'),
        'section'    => 'ribbon_sittings',
        'settings'   => 'ribbon_btn_title_hvr_color',
    ) ) );

    $wp_customize->add_setting('ribbon_btn_brd_hvr_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'ribbon_btn_brd_hvr_color', 
    array(
    'label' => __('Button Border Color','oneline-lite'),
        'section'    => 'ribbon_sittings',
        'settings'   => 'ribbon_btn_brd_hvr_color',
    ) ) );

    //image
    $wp_customize->add_section('ribbon_image', array(
        'title'    => __('Image', 'oneline-lite'),
        'priority' => 3,
        'panel'    =>'ribbon_panel'
    ));

     $wp_customize->add_setting('ribbon_bg_image', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'ribbon_bg_image', array(
        'label'    => __('Upload Background Image', 'oneline-lite'),
        'section'  => 'ribbon_image',
        'settings' => 'ribbon_bg_image',
    )));
/********************************/
/** Our Team Section ***/
/********************************/
    $wp_customize->add_panel( 'team_panel', array(
        'priority'       => 9,
        'title'          => __('Team Section', 'oneline-lite'),
        ));
    //header
        $wp_customize->add_section('team_setting', array(
            'title'    => __('Setting', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'team_panel'
            ));
        $wp_customize->add_setting('team_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('team_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'team_setting',
            'settings' => 'team_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('team_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('team_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'team_setting',
            'settings' => 'team_subheading',
             'type'       => 'textarea',
            ));
       $wp_customize->add_setting('team_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'team_bg_color', 
    array(
                'label'     => __('Background Color','oneline-lite'),
                'section'   => 'team_setting',
                'settings'  => 'team_bg_color',
                
            )
        )
    ); 

    $wp_customize->add_setting('team_hd_color', array(
        'default'        => '#111',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'team_hd_color', 
    array(
    'label' => __('Main Heading Color','oneline-lite'),
        'section'    => 'team_setting',
        'settings'   => 'team_hd_color',
    ) ) );

    $wp_customize->add_setting('team_sb_hd_color', array(
        'default'        => '#7D7D7D',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'team_sb_hd_color', 
    array(
    'label' => __('Sub Heading Color','oneline-lite'),
        'section'    => 'team_setting',
        'settings'   => 'team_sb_hd_color',
    ) ) );
  //  =============================
 //  = Testimonial Settings       =
//  =============================
    $wp_customize->add_panel( 'testimonial_panel', array(
        'priority'       => 10,
        'title'          => __('Testimonial Section', 'oneline-lite'),
        ));

$wp_customize->add_section('testimonial_setting', array(
            'title'    => __('Color', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'testimonial_panel'
            ));
 $wp_customize->add_setting('testimonial_bg_color',
        array(
            'default'     => '#1F1F1F',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'testimonial_bg_color', 
    array(
                'label'     => __('Background Color','oneline-lite'),
                'section'   => 'testimonial_setting',
                'settings'  => 'testimonial_bg_color',
                
            )
        )
    ); 
$wp_customize->add_setting('testimonial_athr_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'testimonial_athr_color', 
    array(
                'label'     => __('Author Name Color','oneline-lite'),
                'section'   => 'testimonial_setting',
                'settings'  => 'testimonial_athr_color',
                
            )
        )
    ); 
$wp_customize->add_setting('testimonial_url_color',
        array(
            'default'     => '#808080',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'testimonial_url_color', 
    array(
            'label'     => __('Url & Border Color','oneline-lite'),
            'section'   => 'testimonial_setting',
            'settings'  => 'testimonial_url_color',
                
            )
        )
    ); 
$wp_customize->add_setting('testimonial_desc_color',
        array(
            'default'     => '#808080',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'testimonial_desc_color', 
    array(
            'label'     => __('Description Color','oneline-lite'),
            'section'   => 'testimonial_setting',
            'settings'  => 'testimonial_desc_color',
                
            )
        )
    );

/** woocommerce section**/
$wp_customize->add_section('woo_setting', array(
            'title'    => __('Woocommerce Section', 'oneline-lite'),
            'priority' => 12,
            ));
        $wp_customize->add_setting('woo_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('woo_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'woo_setting',
            'settings' => 'woo_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('woo_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('woo_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'woo_setting',
            'settings' => 'woo_subheading',
             'type'       => 'textarea',
            ));
        $wp_customize->add_setting('woo_shortcode', array(
            'default'        => '[recent_products]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('woo_shortcode', array(
            'label'    => __('Woocommerce Shortcode', 'oneline-lite'),
            'section'  => 'woo_setting',
            'settings' => 'woo_shortcode',
             'type'       => 'textarea',
            ));

  $wp_customize->add_setting('woo_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'woo_bg_color', 
    array(
                'label'     => __('Background Color','oneline-lite'),
                'section'   => 'woo_setting',
                'settings'  => 'woo_bg_color',
                
            )
        )
    ); 
    $wp_customize->add_setting('woo_hd_color',
        array(
            'default'     => '#111',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'woo_hd_color', 
    array(
                'label'     => __('Main Heading Color','oneline-lite'),
                'section'   => 'woo_setting',
                'settings'  => 'woo_hd_color',
                
            )
        )
    ); 
    $wp_customize->add_setting('woo_subhd_color',
        array(
            'default'     => '#7D7D7D',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'woo_subhd_color', 
    array(
                'label'     => __('Sub Heading Color','oneline-lite'),
                'section'   => 'woo_setting',
                'settings'  => 'woo_subhd_color',
                
            )
        )
    ); 
            /**End woocommerce section**/



/** Latest Post Section ***/
    
        $wp_customize->add_section('blog_setting', array(
            'title'    => __('Latest Post Section', 'oneline-lite'),
            'priority' => 11,
            ));
        $wp_customize->add_setting('blog_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('blog_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'blog_setting',
            'settings' => 'blog_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('blog_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('blog_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'blog_setting',
            'settings' => 'blog_subheading',
             'type'       => 'textarea',
            ));

$wp_customize->add_setting('post_cate_count', array(
        'default'        => 4,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('post_cate_count', array(
        'settings'  => 'post_cate_count',
        'label'     => __('Number of Post','oneline-lite'),
        'description' => __('(Enter number of post which you want to show.)','oneline-lite'),
        'section'   => 'blog_setting',
        'type'      => 'number',
        'input_attrs' => array('min' => 1,'max' => 8)
    ) );
$wp_customize->add_setting('read_more_txt', array(
        'default'        => 'Read More',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('read_more_txt', array(
        'settings'  => 'read_more_txt',
        'label'     => __('Change Read More Text','oneline-lite'),
        'description'=> __('Enter a text below that you want to show instead of Read More','oneline-lite'),
        'section'   => 'blog_setting',
        'type'      => 'text',
       
    ) );

        $wp_customize->add_setting('blog_bg_color',
        array(
            'default'     => '#f7f7f7',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'blog_bg_color', 
    array(
                'label'     => __('Background Color','oneline-lite'),
                'section'   => 'blog_setting',
                'settings'  => 'blog_bg_color',
                
            )
        )
    ); 
$wp_customize->add_setting('blog_hd_color',
        array(
            'default'     => '#111',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'blog_hd_color', 
    array(
                'label'     => __('Main Heading Color','oneline-lite'),
                'section'   => 'blog_setting',
                'settings'  => 'blog_hd_color',
                
            )
        )
    ); 
    $wp_customize->add_setting('blog_sbhd_color',
        array(
            'default'     => '#7D7D7D',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'blog_sbhd_color', 
    array(
                'label'     => __('Sub Heading Color','oneline-lite'),
                'section'   => 'blog_setting',
                'settings'  => 'blog_sbhd_color',
                
            )
        )
    ); 
/** Contact Us Section ***/
    $wp_customize->add_panel( 'contactus_panel', array(
        'priority'       => 13,
        'title'          => __('Contact Us Section', 'oneline-lite'),
        ));
    //header
        $wp_customize->add_section('contactus_setting', array(
            'title'    => __('Setting', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'contactus_panel'
            ));
        $wp_customize->add_setting('contactus_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('contactus_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('contactus_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_subheading',
             'type'       => 'textarea',
            ));
         $wp_customize->add_setting('contactus_shortcode', array(
            'default'           => '[lead-form form-id=1 title=Contact Us]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_shortcode', array(
            'label'    => __('Contact Us Shortcode', 'oneline-lite'),
            'description' =>__('Lead Form Builder Plugin Shortcode Insert.','oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_shortcode',
             'type'       => 'textarea',
            ));
        
        $wp_customize->add_setting('contactus_address_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('contactus_address_heading', array(
            'label'    => __('Address Heading', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_address_heading',
             'type'       => 'text',
            ));
        $wp_customize->add_setting('contactus_address', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_address', array(
            'label'    => __('Full Address', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_address',
             'type'       => 'textarea',
            ));
// contact-color    
$wp_customize->add_section('contactus_clr', array(
            'title'    => __('Color', 'oneline-lite'),
            'priority' => 2,
            'panel'    =>'contactus_panel'
            ));

$wp_customize->add_setting('cnt_bg_color',
        array(
            'default'     => '#1F1F1F',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'cnt_bg_color', 
    array(
            'label'     => __('Background Color','oneline-lite'),
            'section'   => 'contactus_clr',
            'settings'  => 'cnt_bg_color',
                
            )
        )
    ); 
$wp_customize->add_setting('cnt_bhd_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'cnt_bhd_color', 
    array(
            'label'     => __('Main Heading Color','oneline-lite'),
            'section'   => 'contactus_clr',
            'settings'  => 'cnt_bhd_color',
                
            )
        )
    ); 
$wp_customize->add_setting('cnt_sbhd_color',
        array(
            'default'     => '#7D7D7D',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'cnt_sbhd_color', 
    array(
            'label'     => __('Sub Heading Color','oneline-lite'),
            'section'   => 'contactus_clr',
            'settings'  => 'cnt_sbhd_color',
                
            )
        )
    ); 
$wp_customize->add_setting('cnt_ad_main_color',
        array(
            'default'     => '#D4B068',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'cnt_ad_main_color', 
    array(
            'label'     => __('Address Heading Color','oneline-lite'),
            'section'   => 'contactus_clr',
            'settings'  => 'cnt_ad_main_color',
                
            )
        )
    ); 
$wp_customize->add_setting('cnt_ad_txt_color',
        array(
            'default'     => '#7D7D7D',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'cnt_ad_txt_color', 
    array(
            'label'     => __('Address Text Color','oneline-lite'),
            'section'   => 'contactus_clr',
            'settings'  => 'cnt_ad_txt_color',
                
            )
        )
    );
//===============================
//  = ADD-NEW section pro feature Settings =
//  =============================
   $wp_customize->add_section('section_addnew_', array(
        'title'    => __('Add New Section', 'oneline-lite'),
        'priority' => 18,
    ));
   $wp_customize->add_setting('feature_addnew_pro', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'feature_addnew_pro',
            array(
        'section'  => 'section_addnew_',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/oneline-single-page-wordpress-theme/">OnelinePro</a> for full control over <strong>section ordering</strong>!','oneline-lite' )
    )));  

 // selective-refresh option added
$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '#logo .site-title a'
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '#logo p'
) );       
// slider
$wp_customize->selective_refresh->add_partial( 'first_slider_heading', array(
        'selector' => '#slider-div h2.title a',
) );
$wp_customize->selective_refresh->add_partial( 'first_button_text', array(
        'selector' => '#slider-div .slider-button',
) );
// services
$wp_customize->selective_refresh->add_partial( 'our_services_heading', array(
        'selector' => '#services h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'our_services_subheading', array(
        'selector' => '#services p.sub-heading',
) );
// ribbon
$wp_customize->selective_refresh->add_partial( 'ribbon_heading', array(
        'selector' => '#ribbon h3.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'ribbon_button_text', array(
        'selector' => '#ribbon .ribbon-button',
) );
// team
$wp_customize->selective_refresh->add_partial( 'team_heading', array(
        'selector' => '#team h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'team_subheading', array(
        'selector' => '#team p.sub-heading',
) );
// post
$wp_customize->selective_refresh->add_partial( 'blog_heading', array(
        'selector' => '#latest-post h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'blog_subheading', array(
        'selector' => '#latest-post p.sub-heading',
) );
// woocommerce
$wp_customize->selective_refresh->add_partial( 'woo_heading', array(
        'selector' => '#woo-section h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'woo_subheading', array(
        'selector' => '#woo-section p.sub-heading',
) );
// contact
$wp_customize->selective_refresh->add_partial( 'contactus_heading', array(
    'selector' => '#contact h2.cnt-main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_subheading', array(
        'selector' => '#contact p.cnt-sub-heading',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_address_heading', array(
        'selector' => '#contact .add-heading h3',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_address', array(
        'selector' => '#contact .addrs p',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_shortcode', array(
        'selector' => '#contact .cnt-div',
) );
// copyright
$wp_customize->selective_refresh->add_partial( 'copyright_text', array(
        'selector' => '.foot-copyright span.text-footer',
) );
$wp_customize->selective_refresh->add_partial( 'social_link_facebook', array(
        'selector' => '.social-ft i.fa-facebook',
) );
// end brand section
    
}
add_action('customize_register','oneline_lite_unlimited_customize_register',999);
?>