<?php
//  =============================
//  = Default Theme Customizer Settings  =
function thunk_customize_register( $wp_customize ) {   
$palette = array('rgb(0, 0, 0, 0)',);  
//=============================
//= Theme option =
//=============================
$wp_customize->add_panel( 'theme_optn', array(
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Theme Option', 'featuredlite'),
    'description'    => '',
) );
$wp_customize->add_section('global_set', array(
        'title'    => __('Global Setting', 'featuredlite'),
        'priority' => 1,
        'panel'  => 'theme_optn',
));
 // Sidebar settings
$wp_customize->add_setting( 'featuredlite_layout',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
               
              )
         );
$wp_customize->add_control( 'featuredlite_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Site Layout', 'featuredlite'),
        'description'       => esc_html__('Site layout is applied for all page templates', 'featuredlite'),
        'section'     => 'global_set',
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'featuredlite'),
        'left' => esc_html__('Left sidebar', 'featuredlite'),
        'no-sidebar' => esc_html__('No sidebar', 'featuredlite'),
                    )
                )
            );
// Disable Sticky Header
            $wp_customize->add_setting( 'featuredlite_sticky_header_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'featuredlite_sticky_header_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Fixed Header?', 'featuredlite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Fixed header and activate Normal header.', 'featuredlite')
                )
            );
// Disable Animation
            $wp_customize->add_setting( 'featuredlite_animation_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'featuredlite_animation_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable animation effect?', 'featuredlite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable homepage section animation.', 'featuredlite')
                )
            );
 // Disable back to top button
            $wp_customize->add_setting( 'featuredlite_backtotop_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'featuredlite_backtotop_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide back to top button ?', 'featuredlite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Back To Top button.', 'featuredlite')
                )
            );  
 // site-color
$wp_customize->add_section('site_color', array(
        'title'    => __('Site Color', 'featuredlite'),
        'priority' => 2,
        'panel'  => 'theme_optn',
));
$wp_customize->add_setting('theme_color', array(
        'default'        => '#f16c20',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'theme_color', 
    array(
        'label'      => __( 'Theme Color', 'featuredlite' ),
        'section'    => 'site_color',
        'settings'   => 'theme_color',
    ) ) );
// footer-bg-color
$wp_customize->add_setting('footer_bg_color', array(
        'default'        => '#f8f8f8',
        'capability'     => 'edit_theme_options',
        
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'footer_bg_color', 
    array(
        'label'      => __('Footer Background Color', 'featuredlite' ),
        'section'    => 'site_color',
        'settings'   => 'footer_bg_color',
    ) ) );  
// footer-info-color
$wp_customize->add_setting('footer_info_bg_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'footer_info_bg_color', 
    array(
        'label'      => __( 'Copyright Background Color', 'featuredlite' ),
        'section'    => 'site_color',
        'settings'   => 'footer_info_bg_color',
    ) ) ); 
    //  =============================
    //  header option =
    //  =============================
// header-setting
$wp_customize->add_section('header_setting', array(
        'title'    => __('Header Setting', 'featuredlite'),
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
        'label'   => __('Header Layout Option','featuredlite'),
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
                'label'       => esc_html__('Header Transparent', 'featuredlite'),
                'section'     => 'header_setting',
                'description' => esc_html__('(Only applied for front page template.)', 'featuredlite')
                )
            ); 
//header transparent
    $wp_customize->add_setting( 'last_menu_btn',
              array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
    $wp_customize->add_control( 'last_menu_btn',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Custom Button', 'featuredlite'),
                'description' => esc_html__('(Check here to style last Menu Item as a Custom Button)', 'featuredlite'),
                'section'     => 'header_setting',
                
                )
            );                  
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
                'label'     => __('Header Background Color','featuredlite'),
                'section'   => 'header_setting',
                'settings'  => 'hd_bg_color',
                'palette'   => $palette
            )
        )
    );
// shrink header bg
$wp_customize->add_setting('shrnk_hd_bg_color',
        array(
            'default'     => '#222',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'shrnk_hd_bg_color',
            array(
                'label'     => __('Header Shrink Background Color','featuredlite'),
                'section'   => 'header_setting',
                'settings'  => 'shrnk_hd_bg_color',
                'palette'   => $palette
            )
        )
    );
// title
$wp_customize->add_setting('site_title_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'site_title_color', 
    array(
    'label' => __('Site Title Color','featuredlite'),
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
    'label' => __('Menu Link Color','featuredlite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_color',
    ) ) );
 // hover 
$wp_customize->add_setting('hd_menu_hvr_color', array(
        'default'        => '#f16c20',
        'capability'     => 'edit_theme_options',      
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_hvr_color', 
    array(
    'label' => __('Menu Link Hover/Active Color','featuredlite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_hvr_color',
    ) ) );
 
// responsive menu button color 
   $wp_customize->add_setting('mobile_menu_bg_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
     
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'mobile_menu_bg_color', 
    array(
    'label' => __('Responsive Menu Color','featuredlite'),
        'section'    => 'header_setting',
        'settings'   => 'mobile_menu_bg_color',
    ) ) ); 
    //  =============================
    //  Social Icon Section      =
    //  =============================

    $wp_customize->add_section( 'social_icon_section', array(
         'title'          => __( 'Social Icon', 'featuredlite' ),
         'priority'       => 6,
          'panel'  => 'theme_optn',
    ) );

       $wp_customize->add_setting('f_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('f_link', array(
        'label'    => __('Facebook URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 'f_link',
         'type'       => 'text',
    ));

           $wp_customize->add_setting('t_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('t_link', array(
        'label'    => __('Twitter URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 't_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('p_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('p_link', array(
        'label'    => __('Pintrest URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 'p_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('y_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('y_link', array(
        'label'    => __('Youtube URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 'y_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('i_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('i_link', array(
        'label'    => __('Instagram URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 'i_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('s_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('s_link', array(
        'label'    => __('Skype URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 's_link',
         'type'       => 'text',
    ));
    

    $wp_customize->add_setting('l_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('l_link', array(
        'label'    => __('LinkedIn URL', 'featuredlite'),
        'section'  => 'social_icon_section',
        'settings' => 'l_link',
         'type'       => 'text',
    ));
 //============================
 // section ordering   
 //============================
 $wp_customize->add_section('section_hide', array(
        'title'    => __('Section On/Off', 'featuredlite'),
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
        'label'   => __( 'Section On/Off', 'featuredlite' ),
        'description'   => __( '(check to Hide section from frontpage)','featuredlite' ),
        'section' => 'section_hide',
        'choices' => array(
        'ribbon' => __( '1 Ribbon Section','featuredlite' ),
        'services' => __( '2 Service Section','featuredlite' ),
        'aboutus' => __( '3 About Us Section', 'featuredlite' ),
    'bottom-ribbon' => __( '4 Bottom Ribbon Section ','featuredlite' ),
    'blogslider' => __( '5 Blog Section Section','featuredlite' ),
      'testimonial'=> __( '6 Testimonial Section','featuredlite' ),
        'team' => __( '7 Team  Section','featuredlite' ),
       'woocommerce'=> __( '8 woocommerce  Section','featuredlite' ),
         'contact'  => __( '9 Contact Section','featured' ),

            )
        ) 
    )
);
//===============================
//  = section ordering pro feature Settings =
//  =============================
   $wp_customize->add_section('section_home_ordering', array(
        'title'    => __('Section Ordering', 'featuredlite'),
        'priority' => 3,
    ));
   $wp_customize->add_setting('section_order', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'section_order',
            array(
        'section'  => 'section_home_ordering',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/featured/">FeaturedPro</a> for full control over <strong>section ordering</strong>!','featuredlite' )
    )));     
         // =============================//
        // S1 = parallax sections  =
        // =============================//

    // parallax image and video
    $wp_customize->add_section('parallax_panel', array(
        'title'    => __('Background Option', 'featuredlite'),
        'priority' => 3,
    ));

    $wp_customize->add_setting('parallax_image_video', array(
        'default'           => 'image',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('parallax_image_video', array(
        'label'    => __('Background Option', 'featuredlite'),
        'section'  => 'parallax_panel',
        'settings' => 'parallax_image_video',
         'type'       => 'radio',
        'choices'    => array(
            // 'video' => __('Video Background Active','featuredlite'),
            'image' => __('Check to activate background image','featuredlite'),
            'slider' => __('Check to activate background slider','featuredlite'),
        ),
    ));
    
// START BACKGROUND SLIDER IMAGE
//slider speed 
    $wp_customize->add_setting('featured_slider_speed', array(
        'default'           => 3000,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_int'
    ));
    $wp_customize->add_control('featured_slider_speed', array(
        'label'    => __('Slider Speed Options', 'featuredlite'),
        'description'=> __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'featuredlite'),
        'section'  => 'parallax_panel',
        'settings' => 'featured_slider_speed',
         'type'       => 'text',

    ));
//first slider image
    $wp_customize->add_setting('first_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
        'label'    => __('First Image Upload', 'featuredlite'),
        'section'  => 'parallax_panel',
        'settings' => 'first_slider_image',
    )));
//Second slider image
    $wp_customize->add_setting('second_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
        'label'    => __('Second Image Upload', 'featuredlite'),
        'section'  => 'parallax_panel',
        'settings' => 'second_slider_image',
    )));
//Third slider image
$wp_customize->add_setting('third_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_slider_image', array(
        'label'    => __('Third Image Upload', 'featuredlite'),
        'section'  => 'parallax_panel',
        'settings' => 'third_slider_image',
    )));
$wp_customize->add_setting('for_more_slide', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'for_more_slide',
            array(
        'section'  => 'parallax_panel',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/featured/">FeaturedPro</a>  for multiple slides with advance settings!','featuredlite' )
    )));
//END BACKGROUND SLIDER IMAGE 
    $wp_customize->add_setting('parallax_image_upload', array(
        'default'       =>  get_template_directory_uri().'/images/bg.jpg',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'parallax_image_upload', array(
        'label'    => __('Background Image Upload', 'featuredlite'),
        'section'  => 'parallax_panel',
        'settings' => 'parallax_image_upload',
    )));
    // pro-feature-video-add
    $wp_customize->add_setting('for_video_add', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'for_video_add',
            array(
        'section'  => 'parallax_panel',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/featured/">FeaturedPro</a>  for using video background!','featuredlite' )
    )));
// end-background-option
$wp_customize->add_panel( 'main_header_panel', array(
    'priority'       => 4,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Main Header Section', 'featuredlite'),
    'description'    => '',
) );
// parallax heading and subheading
    $wp_customize->add_section('parallax_heading_option', array(
        'title'    => __('Setting', 'featuredlite'),
        'priority' => 5,
         'panel'  => 'main_header_panel',
    ));

    $wp_customize->add_setting('parallax_heading', array(
        'default'           => __('Beautiful Wordpress Business Themes','featuredlite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
         
    ));
   $wp_customize->add_control('parallax_heading', array(
        'label'    => __(' Main Heading', 'featuredlite'),
        'section'  => 'parallax_heading_option',
        'settings' => 'parallax_heading',
         'type'       => 'text',
    )); 

    $wp_customize->add_setting('parallax_subheading', array(
        'default'           => __('Best Optimized WordPress Themes','featuredlite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
         'transport'         => 'postMessage'

    ));
    $wp_customize->add_control('parallax_subheading', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'parallax_heading_option',
        'settings' => 'parallax_subheading',
         'type'       => 'textarea',
    ));

    $wp_customize->add_setting('parallax_button_text', array(
        'default'           => __('Read More','featuredlite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
         'transport'         => 'postMessage',
    ));
   $wp_customize->add_control('parallax_button_text', array(
        'label'    => __('Button text', 'featuredlite'),
        'section'  => 'parallax_heading_option',
        'settings' => 'parallax_button_text',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('parallax_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
   $wp_customize->add_control('parallax_button_link', array(
        'label'    => __('Button Link', 'featuredlite'),
        'section'  => 'parallax_heading_option',
        'settings' => 'parallax_button_link',
         'type'       => 'text',
    ));
   $wp_customize->add_setting('prlx_opn_new_tab', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('prlx_opn_new_tab', array(
        'settings' => 'prlx_opn_new_tab',
        'label'     => __( 'Check to open link in new tab','featuredlite'),
        'section' => 'parallax_heading_option',
        'type'    => 'checkbox',
    ) );
// color-option-header-section
$wp_customize->add_setting('top_hd_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.3)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'top_hd_bg_color',
            array(
                'label'     => __('Background Overlay Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'parallax_heading_option',
                'settings'  => 'top_hd_bg_color',
                'palette'   => $palette
            )
        )
    );
    $wp_customize->add_setting('main_hdng_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'main_hdng_color', 
    array(
        'label'      => __( 'Main Heading Color', 'featuredlite' ),
        'section'    => 'parallax_heading_option',
        'settings'   => 'main_hdng_color',
    ) ) );

$wp_customize->add_setting('brdr_hdng_color', array(
        'default'        => '#adadad',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'brdr_hdng_color', 
    array(
        'label'      => __( 'Border Color', 'featuredlite' ),
        'section'    => 'parallax_heading_option',
        'settings'   => 'brdr_hdng_color',
    ) ) );

$wp_customize->add_setting('sub_hdng_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'sub_hdng_color', 
    array(
        'label'      => __( 'Sub Heading Color', 'featuredlite' ),
        'section'    => 'parallax_heading_option',
        'settings'   => 'sub_hdng_color',
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
        'label'       => esc_html__('Button', 'featuredlite'),
        'description'       => esc_html__('Choose button style for slider.', 'featuredlite'),
        'section'     => 'parallax_heading_option',
        'choices' => array(
        'default' => esc_html__('Button style 1', 'featuredlite'),
        'button-one' => esc_html__('Button style 2', 'featuredlite'),
        'button-two' => esc_html__('Button style 3', 'featuredlite'),
        'button-three' => esc_html__('Button style 4', 'featuredlite'),
        'button-four' => esc_html__('Button style 5', 'featuredlite'),
        'button-five' => esc_html__('Button style 6', 'featuredlite'),
             )
           )
        );
//  = Parallax Three Column Settings =
// Parallax First First Block
     $wp_customize->add_section('first_parallax_block', array(
        'title'    => __('First Column', 'featuredlite'),
        'priority' => 20,
         'panel'  => 'main_header_panel',
    ));
    $wp_customize->add_setting('first_parallax_font_icon', array(
        'default'           => 'fa fa-leaf',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',

    ));
    $wp_customize->add_control('first_parallax_font_icon', array(
        'label'    => __('Font Icon', 'featuredlite'),
        'description' => __( 'Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','featuredlite' ),
        'section'  => 'first_parallax_block',
        'settings' => 'first_parallax_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('first_parallax_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('first_parallax_heading', array(
        'label'    => __('Title', 'featuredlite'),
        'section'  => 'first_parallax_block',
        'settings' => 'first_parallax_heading',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('first_parallax_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('first_parallax_link', array(
        'label'    => __('Title Link', 'featuredlite'),
        'section'  => 'first_parallax_block',
        'settings' => 'first_parallax_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('first_parallax_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('first_parallax_desc', array(
        'label'    => __('Description', 'featuredlite'),
        'section'  => 'first_parallax_block',
        'settings' => 'first_parallax_desc',
         'type'       => 'textarea',

    ));
 
    $wp_customize->add_setting('first_colmn_icon_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'first_colmn_icon_color', 
    array(
        'label'      => __( 'Icon Color', 'featuredlite' ),
        'section'    => 'first_parallax_block',
        'settings'   => 'first_colmn_icon_color',
    ) ) );

$wp_customize->add_setting('first_colmn_hdng_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'first_colmn_hdng_color', 
    array(
        'label'      => __( 'Title Color', 'featuredlite' ),
        'section'    => 'first_parallax_block',
        'settings'   => 'first_colmn_hdng_color',
    ) ) );
$wp_customize->add_setting('first_colmn_desc_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color',      
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'first_colmn_desc_color', 
    array(
        'label'      => __( 'Description Color', 'featuredlite' ),
        'section'    => 'first_parallax_block',
        'settings'   => 'first_colmn_desc_color',
    ) ) );
$wp_customize->add_setting('first_colmn_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.6)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'first_colmn_bg_color',
            array(
                'label'     => __('Background Hover Color','featuredlite'),
                'section'   => 'first_parallax_block',
                'settings'  => 'first_colmn_bg_color',
                'palette'   => $palette
            )
        )
    );
    // parallax Second Block
     $wp_customize->add_section('second_parallax_block', array(
        'title'    => __('Second Column', 'featuredlite'),
        'priority' => 20,
         'panel'  => 'main_header_panel',
    ));
    $wp_customize->add_setting('second_parallax_font_icon', array(
        'default'           => 'fa fa-apple',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',

    ));
    $wp_customize->add_control('second_parallax_font_icon', array(
        'label'    => __('Font Icon', 'featuredlite'),
        'description' => __( 'Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','featuredlite' ),
        'section'  => 'second_parallax_block',
        'settings' => 'second_parallax_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('second_parallax_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('second_parallax_heading', array(
        'label'    => __('Title', 'featuredlite'),
        'section'  => 'second_parallax_block',
        'settings' => 'second_parallax_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('second_parallax_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('second_parallax_link', array(
        'label'    => __('Title Link', 'featuredlite'),
        'section'  => 'second_parallax_block',
        'settings' => 'second_parallax_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('second_parallax_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
    ));
    $wp_customize->add_control('second_parallax_desc', array(
        'label'    => __('Description', 'featuredlite'),
        'section'  => 'second_parallax_block',
        'settings' => 'second_parallax_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('second_colmn_icon_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'second_colmn_icon_color', 
    array(
        'label'      => __( 'Icon Color', 'featuredlite' ),
        'section'    => 'second_parallax_block',
        'settings'   => 'second_colmn_icon_color',
    ) ) );

$wp_customize->add_setting('second_colmn_hdng_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'second_colmn_hdng_color', 
    array(
        'label'      => __( 'Title Color', 'featuredlite' ),
        'section'    => 'second_parallax_block',
        'settings'   => 'second_colmn_hdng_color',
    ) ) );
$wp_customize->add_setting('second_colmn_desc_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'second_colmn_desc_color', 
    array(
        'label'      => __( 'Description Color', 'featuredlite' ),
        'section'    => 'second_parallax_block',
        'settings'   => 'second_colmn_desc_color',
    ) ) );
$wp_customize->add_setting('second_colmn_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.6)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'second_colmn_bg_color',
            array(
                'label'     => __('Background Hover Color','featuredlite'),
                'section'   => 'second_parallax_block',
                'settings'  => 'second_colmn_bg_color',
                'palette'   => $palette
            )
        )
    );
    // parallax Third Block
     $wp_customize->add_section('third_parallax_block', array(
        'title'    => __('Third Column', 'featuredlite'),
        'priority' => 20,
         'panel'  => 'main_header_panel',
    ));
    $wp_customize->add_setting('third_parallax_font_icon', array(
        'default'           => 'fa fa-ban',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('third_parallax_font_icon', array(
        'label'    => __('Font Icon', 'featuredlite'),
        'description' => __( 'Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','featuredlite' ),
        'section'  => 'third_parallax_block',
        'settings' => 'third_parallax_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('third_parallax_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('third_parallax_heading', array(
        'label'    => __('Title', 'featuredlite'),
        'section'  => 'third_parallax_block',
        'settings' => 'third_parallax_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('third_parallax_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('third_parallax_link', array(
        'label'    => __('Title Link', 'featuredlite'),
        'section'  => 'third_parallax_block',
        'settings' => 'third_parallax_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('third_parallax_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('third_parallax_desc', array(
        'label'    => __('Description', 'featuredlite'),
        'section'  => 'third_parallax_block',
        'settings' => 'third_parallax_desc',
         'type'       => 'textarea',
    ));
 $wp_customize->add_setting('third_colmn_icon_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'third_colmn_icon_color', 
    array(
        'label'      => __( 'Icon Color', 'featuredlite' ),
        'section'    => 'third_parallax_block',
        'settings'   => 'third_colmn_icon_color',
    ) ) );

$wp_customize->add_setting('third_colmn_hdng_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'third_colmn_hdng_color', 
    array(
        'label'      => __( 'Title Color', 'featuredlite' ),
        'section'    => 'third_parallax_block',
        'settings'   => 'third_colmn_hdng_color',
    ) ) );
$wp_customize->add_setting('third_colmn_desc_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'third_colmn_desc_color', 
    array(
        'label'      => __( 'Description Color', 'featuredlite' ),
        'section'    => 'third_parallax_block',
        'settings'   => 'third_colmn_desc_color',
    ) ) );
$wp_customize->add_setting('third_colmn_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.6)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );   
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'third_colmn_bg_color',
            array(
                'label'     => __('Background Hover Color','featuredlite'),
                'section'   => 'third_parallax_block',
                'settings'  => 'third_colmn_bg_color',
                'palette'   => $palette
            )
        )
    );
//===============================
//  = Header leadform pro feature Settings =
//  =============================
   $wp_customize->add_section('header_leadform_pro_feature', array(
        'title'    => __('Leadform Setting', 'featuredlite'),
        'priority' =>1,
        'panel' => 'main_header_panel',
    ));
   $wp_customize->add_setting('feature_pro_leadform', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'feature_pro_leadform',
            array(
        'section'  => 'header_leadform_pro_feature',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/featured/">FeaturedPro</a> for adding a leadform in main header section!','featuredlite' )
    )));
//-------------------End Parallax Panel----------------------------//

         //  ============================= //
        //  S2 = Heading and Button sections  =
        //  ============================= //
$wp_customize->add_panel( 'our_ribbon_panel', array(
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Ribbon Section', 'featuredlite'),
    'description'    => '',
) ); 
$wp_customize->add_section( 'ribbon_panel', array(
    'priority'       => 6,
    'title'          => __('First Ribbon', 'featuredlite'),
    'panel'  => 'our_ribbon_panel',
) );

    
   $wp_customize->add_setting('hb_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('hb_heading', array(
        'label'    => __('Title', 'featuredlite'),
        'section'  => 'ribbon_panel',
        'settings' => 'hb_heading',
        'type'       => 'textarea',
    ));

     $wp_customize->add_setting('hb_button_text', array(
        'default'           => __('Read More','featuredlite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
       
    ));
    $wp_customize->add_control('hb_button_text', array(
        'label'    => __('Button Text', 'featuredlite'),
        'section'  => 'ribbon_panel',
        'settings' => 'hb_button_text',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('hb_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('hb_button_link', array(
        'label'    => __('Button Link', 'featuredlite'),
        'section'  => 'ribbon_panel',
        'settings' => 'hb_button_link',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('top_opn_new_tab', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('top_opn_new_tab', array(
        'settings' => 'top_opn_new_tab',
        'label'     => __('Check to open link in new tab','featuredlite'),
        'section' => 'ribbon_panel',
        'type'    => 'checkbox',
    ) );

$wp_customize->add_setting('ribbon_color',
        array(
            'default'     => '#f16c20',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ribbon_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'ribbon_panel',
                'settings'  => 'ribbon_color',
                'palette'   => $palette
            )
        )
    );
$wp_customize->add_setting('top_ribbon_txt_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control( $wp_customize,'top_ribbon_txt_color', array(
        'label'      => __('Text Color', 'featuredlite' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'top_ribbon_txt_color',
    ) ) 
    );
     $wp_customize->add_setting('ribbon_button_color', array(
        'default'        => '#ff9d65',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_button_color', array(
        'label'      => __('Button Background Color', 'featuredlite' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_button_color',
    ) ) 
    );
    $wp_customize->add_setting('ribbon_button_txt_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_button_txt_color', array(
        'label'      => __('Button Text Color', 'featuredlite' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_button_txt_color',
    ) ) 
    );

    

     $wp_customize->add_setting('ribbon_button_hover_color', array(
        'default'        => '#e85500',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control( $wp_customize,'ribbon_button_hover_color', array(
        'label'      => __('Button Background Hover Color', 'featuredlite' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_button_hover_color',
    ) ) 
    );
$wp_customize->add_setting('ribbon_button_txt_hvr_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_button_txt_hvr_color', array(
        'label'      => __('Button Text Hover Color', 'featuredlite' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_button_txt_hvr_color',
    ) ) 
    );

// ribbon-bottom
$wp_customize->add_section( 'ribbon_bottom_panel', array(
    'priority'       => 7,
    'title'          => __('Second Ribbon', 'featuredlite'),
    'panel'  => 'our_ribbon_panel',
) );
$wp_customize->add_setting('hb_heading_bottom', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('hb_heading_bottom', array(
        'label'    => __('Title', 'featuredlite'),
        'section'  => 'ribbon_bottom_panel',
        'settings' => 'hb_heading_bottom',
         'type'       => 'textarea',
    ));
$wp_customize->add_setting('hb_button_text_bottom', array(
        'default'           => __('Read More','featuredlite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('hb_button_text_bottom', array(
        'label'    => __('Button Text', 'featuredlite'),
        'section'  => 'ribbon_bottom_panel',
        'settings' => 'hb_button_text_bottom',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('hb_button_link_bottom', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('hb_button_link_bottom', array(
        'label'    => __('Button Link', 'featuredlite'),
        'section'  => 'ribbon_bottom_panel',
        'settings' => 'hb_button_link_bottom',
         'type'       => 'text',
    ));
   $wp_customize->add_setting('btm_opn_new_tab', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('btm_opn_new_tab', array(
        'settings' => 'btm_opn_new_tab',
        'label'     => __( 'Check to open link in new tab' ),
        'section' => 'ribbon_bottom_panel',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_setting('ribbon_color_bottom',
        array(
            'default'     => 'rgba(241, 108, 32, 0.5)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ribbon_color_bottom',
            array(
                'label'     => __('Background Color','featuredlite'),
                 'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'ribbon_bottom_panel',
                'settings'  => 'ribbon_color_bottom',
                'palette'   => $palette
            )
        )
    );
$wp_customize->add_setting('btm_ribbon_txt_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control( $wp_customize,'btm_ribbon_txt_color', array(
        'label'      => __('Text Color', 'featuredlite' ),
        'section'    => 'ribbon_bottom_panel',
        'settings'   => 'btm_ribbon_txt_color',
    ) ) 
    );
$wp_customize->add_setting('ribbon_button_color_bottom', array(
        'default'        => '#f16c20',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_button_color_bottom', array(
        'label'      => __('Button Background Color', 'featuredlite' ),
        'section'    => 'ribbon_bottom_panel',
        'settings'   => 'ribbon_button_color_bottom',
    ) ) 
    );
$wp_customize->add_setting('ribbon_button_color_txt_bottom', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_button_color_txt_bottom', array(
        'label'      => __('Button Text Color', 'featuredlite' ),
        'section'    => 'ribbon_bottom_panel',
        'settings'   => 'ribbon_button_color_txt_bottom',
    ) ) 
    );
 $wp_customize->add_setting('ribbon_button_hover_color_bottom', array(
        'default'        => '#ff9d65',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control( $wp_customize,'ribbon_button_hover_color_bottom', array(
        'label'      => __('Button Background Hover Color', 'featuredlite' ),
        'section'    => 'ribbon_bottom_panel',
        'settings'   => 'ribbon_button_hover_color_bottom',
    ) ) 
    );
$wp_customize->add_setting('ribbon_button_color_txt__hvr_bottom', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_button_color_txt__hvr_bottom', array(
        'label'      => __('Button Text Hover Color', 'featuredlite' ),
        'section'    => 'ribbon_bottom_panel',
        'settings'   => 'ribbon_button_color_txt__hvr_bottom',
    ) ) 
    );
    
//--------------End heading and button Panel-------------//
    
      //  ============================= //
        //  S3 = Our Services sections  =
        //  ============================= //

    $wp_customize->add_panel( 'services_panel', array(
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Service Section', 'featuredlite'),
    'description'    => '',
) );

// Our Services heading and subheading
    $wp_customize->add_section('our_services_heading_option', array(
        'title'    => __('Setting', 'featuredlite'),
        'priority' => 4,
         'panel'  => 'services_panel',
    ));

    $wp_customize->add_setting('our_services_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
   $wp_customize->add_control('our_services_heading', array(
        'label'    => __('Main Heading', 'featuredlite'),
        'section'  => 'our_services_heading_option',
        'settings' => 'our_services_heading',
         'type'       => 'text',
    )); 

    $wp_customize->add_setting('our_services_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        

    ));
    $wp_customize->add_control('our_services_subheading', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'our_services_heading_option',
        'settings' => 'our_services_subheading',
         'type'       => 'textarea',
    ));   
$wp_customize->add_setting('service_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.3)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'service_bg_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'our_services_heading_option',
                'settings'  => 'service_bg_color',
                'palette'   => $palette
            )
        )
    );

$wp_customize->add_setting('srv_main_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'srv_main_hd_color', array(
        'label'      => __('Main Heading Color', 'featuredlite' ),
        'section'    => 'our_services_heading_option',
        'settings'   => 'srv_main_hd_color',
    ) ) 
);    

$wp_customize->add_setting('srv_sub_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'srv_sub_hd_color', array(
        'label'      => __('Sub Heading Color', 'featuredlite' ),
        'section'    => 'our_services_heading_option',
        'settings'   => 'srv_sub_hd_color',
    ) ) 
);    
$wp_customize->add_setting('srv_colom_bg_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'srv_colom_bg_color', array(
        'label'      => __('Column Background Color', 'featuredlite' ),
        'section'    => 'our_services_heading_option',
        'settings'   => 'srv_colom_bg_color',
    ) ) 
);
    
$wp_customize->add_setting('srv_colom_hd_color', array(
        'default'        => '#858585',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'srv_colom_hd_color', array(
        'label'      => __('Column Heading Color', 'featuredlite' ),
        'section'    => 'our_services_heading_option',
        'settings'   => 'srv_colom_hd_color',
    ) ) 
);    
 $wp_customize->add_setting('srv_colom_txt_color', array(
        'default'        => '#858585',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'srv_colom_txt_color', array(
        'label'      => __('Column Description Color', 'featuredlite' ),
        'section'    => 'our_services_heading_option',
        'settings'   => 'srv_colom_txt_color',
    ) ) 
);     
//-------------------End our services Panel----------------------------//
//  ============================= //
//  S4 = About Us sections  =
//  ============================= //

// Our heading 
    $wp_customize->add_section('about_us_option', array(
        'title'    => __('About Us Section', 'featuredlite'),
        'priority' => 9,
    ));
    $wp_customize->add_setting('about_us_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
   $wp_customize->add_control('about_us_heading', array(
        'label'    => __('Title', 'featuredlite'),
        'section'  => 'about_us_option',
        'settings' => 'about_us_heading',
         'type'       => 'text',
    )); 

    $wp_customize->add_setting('about_us_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
         

    ));
    $wp_customize->add_control('about_us_subheading', array(
        'label'    => __('Description', 'featuredlite'),
        'section'  => 'about_us_option',
        'settings' => 'about_us_subheading',
         'type'       => 'textarea',
    ));   

 $wp_customize->add_setting('about_us_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload',
        'default' =>FEATUREDLITE_ABOUTUS,
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'about_us_image', array(
        'label'    => __('Image Upload', 'featuredlite'),
        'section'  => 'about_us_option',
        'settings' => 'about_us_image',
    )));
$wp_customize->add_setting('about_us_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'about_us_bg_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'about_us_option',
                'settings'  => 'about_us_bg_color',
                'palette'   => $palette
            )
        )
    );

     $wp_customize->add_setting('about_us_txt_color', array(
        'default'        => '#000',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'about_us_txt_color', array(
        'label'      => __('Text Color', 'featuredlite' ),
        'section'    => 'about_us_option',
        'settings'   => 'about_us_txt_color',
    ) ) 
    );

//-------------------End about us Panel----------------------------//
        //  =  Our TEAM sections  =//
        //  ============================= //
 $wp_customize->add_panel( 'team_panel', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Team Section', 'featuredlite'),
    'description'    => '',
) );
// Our team heading and subheading
    $wp_customize->add_section('our_team_heading_option', array(
        'title'    => __('Setting', 'featuredlite'),
        'priority' => 4,
         'panel'  => 'team_panel',
    ));

    $wp_customize->add_setting('our_team_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
   $wp_customize->add_control('our_team_heading', array(
        'label'    => __('Main Heading', 'featuredlite'),
        'section'  => 'our_team_heading_option',
        'settings' => 'our_team_heading',
         'type'       => 'text',
    )); 

    $wp_customize->add_setting('our_team_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('our_team_subheading', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'our_team_heading_option',
        'settings' => 'our_team_subheading',
         'type'       => 'textarea',
    ));   
$wp_customize->add_setting('team_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'team_bg_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'our_team_heading_option',
                'settings'  => 'team_bg_color',
                'palette'   => $palette
            )
        )
    );
$wp_customize->add_setting('team_txt_color', array(
        'default'        => '#444',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'team_txt_color', array(
        'label'      => __('Main Heading Color', 'featuredlite' ),
        'section'    => 'our_team_heading_option',
        'settings'   => 'team_txt_color',
    ) ) 
    );
$wp_customize->add_setting('team_sub_hd_color', array(
        'default'        => '#444',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'team_sub_hd_color', array(
        'label'      => __('Sub Heading Color', 'featuredlite' ),
        'section'    => 'our_team_heading_option',
        'settings'   => 'team_sub_hd_color',
    ) ) 
    );

//--------------------End team section------------------------------//
//--------------------start woocommerce section---------------------------//
$wp_customize->add_panel( 'our_woocommerce_panel', array(
    'priority'       => 11,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('WooCommerce Section', 'featuredlite'),
    'description'    => '',
) );

// Our woocommerce heading and subheading
$wp_customize->add_section( 'woo_section', array(
        'title'          => __( 'WooCommerce Section','featuredlite' ),
        'priority'       => 11,
        ));

    $wp_customize->add_setting('woo_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
     ));
    $wp_customize->add_control('woo_head_', array(
        'label'    => __('Main Heading', 'featuredlite'),
        'section'  => 'woo_section',
        'settings' => 'woo_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('woo_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('woo_desc_', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'woo_section',
        'settings' => 'woo_desc_',
         'type'       => 'textarea',
    ));

  $wp_customize->add_setting('woo_shortcode', array(
        'default'        => '[recent_products]',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('woo_shortcode', array(
        'settings' => 'woo_shortcode',
        'label'     => 'WooCommerce ShortCode',
        'section' => 'woo_section',
        'type'    => 'textarea',
    ) );
  $wp_customize->add_setting('woo_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.3)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'woo_bg_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'woo_section',
                'settings'  => 'woo_bg_color',
                'palette'   => $palette
            )
        )
    );
 $wp_customize->add_setting('woo_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'woo_hd_color', array(
        'label'      => __('Main Heading Color', 'featuredlite' ),
        'section'    => 'woo_section',
        'settings'   => 'woo_hd_color',
    ) ) 
    );
    $wp_customize->add_setting('woo_sub_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    )); 
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'woo_sub_hd_color', array(
        'label'      => __('Sub Heading Color', 'featuredlite' ),
        'section'    => 'woo_section',
        'settings'   => 'woo_sub_hd_color',
    ) ) 
    );
//--------------------end woocommerce section---------------------------//
      

         //  ============================= //
        //  S5 = blog sections  =
        //  ============================= //

       $wp_customize->add_section( 'blog_head_desc', array(
     'title'          => __( 'Recent Post Section','featuredlite' ),
     'priority'       => 13,
) );
       $wp_customize->add_setting('blog_head_', array(
        'default'           => __('Latest News & Blogs','featuredlite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('blog_head_', array(
        'label'    => __('Main Heading', 'featuredlite'),
        'section'  => 'blog_head_desc',
        'settings' => 'blog_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('blog_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('blog_desc_', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'blog_head_desc',
        'settings' => 'blog_desc_',
         'type'       => 'textarea',
    ));


     $cats = array();
   $cats[0] = 'All Categories';
    foreach ( get_categories() as $categories => $category ){
        $cats[$category->term_id] = $category->name;
    }
   
     $wp_customize->add_setting('slider_cate', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('slider_cate', array(
        'settings' => 'slider_cate',
        'label'   => __('Featured Post Category','featuredlite'),
        'section' => 'blog_head_desc',
        'type' => 'select',
        'choices' => $cats,
    ) );
    $wp_customize->add_setting('slider_count', array(
        'default'        => 4,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('slider_count', array(
        'settings'  => 'slider_count',
        'label'     => __('Number of Post','featuredlite'),
        'section'   => 'blog_head_desc',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 50)

    ) );
    $wp_customize->add_setting('post_count', array(
        'default'        => 5,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('post_count', array(
        'settings'  => 'post_count',
        'label'     => __('Number of visible post ','featuredlite'),
        'section'   => 'blog_head_desc',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 50)

    ) );
    $wp_customize->add_setting('blog_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.3)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'woo_bg_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'blog_head_desc',
                'settings'  => 'blog_bg_color',
                'palette'   => $palette
            )
        )
    );
$wp_customize->add_setting('blog_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_hd_color', array(
        'label'      => __('Main Heading Color', 'featuredlite' ),
        'section'    => 'blog_head_desc',
        'settings'   => 'blog_hd_color',
    ) ) 
    );
$wp_customize->add_setting('blog_sub_hd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_sub_hd_color', array(
        'label'      => __('Sub Heading Color', 'featuredlite' ),
        'section'    => 'blog_head_desc',
        'settings'   => 'blog_sub_hd_color',
    ) ) 
    );    
//-------------------End blog heading Panel----------------------------//

     //  =============================
    //  =S6 Testimonial Settings       =
    //  =============================

$wp_customize->add_panel( 'testimonial_panel', array(
    'priority'       => 12,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Testimonial Section', 'featuredlite'),
    'description'    => '',
));
// main heading
 $wp_customize->add_section('testimonial_heading_section', array(
        'title'    => __('Setting', 'featuredlite'),
        'priority' => 1,
        'panel'  => 'testimonial_panel',
    ));

    $wp_customize->add_setting('testimonial_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('testimonial_heading', array(
        'label'    => __('Main Heading', 'featuredlite'),
        'section'  => 'testimonial_heading_section',
        'settings' => 'testimonial_heading',
         'type'       => 'text',
    ));
     $wp_customize->add_setting('testimonial_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('testimonial_subheading', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'testimonial_heading_section',
        'settings' => 'testimonial_subheading',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('testimonial_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'testimonial_bg_color',
            array(
                'label'     => __('Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'testimonial_heading_section',
                'settings'  => 'testimonial_bg_color',
                'palette'   => $palette
            )
        )
    );
$wp_customize->add_setting('testimonial_txt_color', array(
        'default'        => '#444',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'testimonial_txt_color', array(
        'label'      => __('Main Heading Color', 'featuredlite' ),
        'section'    => 'testimonial_heading_section',
        'settings'   => 'testimonial_txt_color',
    ) ) 
    );
$wp_customize->add_setting('testimonial_sub_hd_color', array(
        'default'        => '#444',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'testimonial_sub_hd_color', array(
        'label'      => __('Sub Heading Color', 'featuredlite' ),
        'section'    => 'testimonial_heading_section',
        'settings'   => 'testimonial_sub_hd_color',
    ) ) 
    );
//-------------------End Author Section Panel----------------------------//

//  =  Our contact sections  =//
        //  ============================= //
 $wp_customize->add_panel( 'our_cnt_panel', array(
    'priority'       => 17,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Contact Section', 'featuredlite'),
    'description'    => '',
) );
$wp_customize->add_section('cnt_color_section', array(
        'title'    => __('Color Option', 'featuredlite'),
        'priority' => 6,
         'panel'  => 'our_cnt_panel',
    ));

$wp_customize->add_setting('cnt_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.3)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
        ) );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'cnt_bg_color',
            array(
                'label'     => __('Contact Background Color','featuredlite'),
                'description' => __('(Set background color for section or set color with transparency for section overlay)','featuredlite'),
                'section'   => 'cnt_color_section',
                'settings'  => 'cnt_bg_color',
                'palette'   => $palette
            )
        )
    );
// main-heading-color
$wp_customize->add_setting('cnt_main_heading_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'cnt_main_heading_color', array(
        'label'      => __('Main Heading Color', 'featuredlite' ),
        'section'    => 'cnt_color_section',
        'settings'   => 'cnt_main_heading_color',
    ) ) 
    );
// sub-heading-color 
$wp_customize->add_setting('cnt_sub_heading_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'cnt_sub_heading_color', array(
        'label'      => __('Sub Heading Color', 'featuredlite' ),
        'section'    => 'cnt_color_section',
        'settings'   => 'cnt_sub_heading_color',
    ) ) 
    );   
$wp_customize->add_setting('cnt_txt_color', array(
        'default'        => '#000',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'cnt_txt_color', array(
        'label'      => __('Icon & Text Color', 'featuredlite' ),
        'section'    => 'cnt_color_section',
        'settings'   => 'cnt_txt_color',
    ) ) 
    );
// Our contact heading and subheading
    $wp_customize->add_section('our_cnt_heading_option', array(
        'title'    => __('Setting', 'featuredlite'),
        'priority' => 4,
         'panel'  => 'our_cnt_panel',
    ));

    $wp_customize->add_setting('our_cnt_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
   $wp_customize->add_control('our_cnt_heading', array(
        'label'    => __('Main Heading', 'featuredlite'),
        'section'  => 'our_cnt_heading_option',
        'settings' => 'our_cnt_heading',
         'type'       => 'text',
    )); 
    $wp_customize->add_setting('our_cnt_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('our_cnt_subheading', array(
        'label'    => __('Sub Heading', 'featuredlite'),
        'section'  => 'our_cnt_heading_option',
        'settings' => 'our_cnt_subheading',
         'type'       => 'textarea',
    ));  

   $wp_customize->add_setting('cf_shtcd_', array(
        'default'           => '[lead-form form-id=1 title=Contact Us]',
        'capability'        => 'edit_theme_options',
       'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',

    ));
    $wp_customize->add_control('cf_shtcd_', array(
        'label'    => __('Leadform Shortcode', 'featuredlite'),
        'description'    => __('Install recommended <a target="_blank" href="//wordpress.org/plugins/lead-form-builder/">Contact Form & Lead Form Builder</a> Plugin for Contact Us form.', 'featuredlite'),
        'section'  => 'our_cnt_heading_option',
        'settings' => 'cf_shtcd_',
        'type'       => 'textarea',
    ));

//tel
$wp_customize->add_setting('cnt_tel', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
             
            ));
        $wp_customize->add_control('cnt_tel', array(
            'label'    => __('Mobile', 'featuredlite'),
            'section'  => 'our_cnt_heading_option',
            'settings' => 'cnt_tel',
             'type'       => 'text',
            'priority' => 20,
   ));

//adderess
$wp_customize->add_setting('cnt_add', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            
            ));
        $wp_customize->add_control('cnt_add', array(
            'label'    => __('Address', 'featuredlite'),
            'section'  => 'our_cnt_heading_option',
            'settings' => 'cnt_add',
             'type'       => 'textarea',
            'priority' => 20,
            ));
//mail
$wp_customize->add_setting('cnt_mail', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
             
            ));
        $wp_customize->add_control('cnt_mail', array(
            'label'    => __('Email', 'featuredlite'),
            'section'  => 'our_cnt_heading_option',
            'settings' => 'cnt_mail',
             'type'       => 'text',
            'priority' => 20,
            ));

//map
$wp_customize->add_setting('map_add', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
             'sanitize_callback' => 'themehunk_customizer_textarea_html'
            ));
        $wp_customize->add_control('map_add', array(
            'label'    => __('Map Address', 'featuredlite'),
            'description' => __('insert goole map iframe <a target="_blank" href="https://www.google.co.in/maps">Map</a>','featured'),
            'section'  => 'our_cnt_heading_option',
            'settings' => 'map_add',
             'type'       => 'textarea',
            'priority' => 20,
            ));    

// top section
//===============================
//  = ADD-NEW section pro feature Settings =
//  =============================
   $wp_customize->add_section('section_addnew_', array(
        'title'    => __('Add New Section', 'featuredlite'),
        'priority' => 18,
    ));
   $wp_customize->add_setting('feature_addnew_pro', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'feature_addnew_pro',
            array(
        'section'  => 'section_addnew_',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//www.themehunk.com/product/featured/">FeaturedPro</a> for adding multiple new section!','featuredlite' )
    )));  

$wp_customize->selective_refresh->add_partial('parallax_heading', array(
        'selector' => '.main-header-section .main-text h1',
) );
$wp_customize->selective_refresh->add_partial('parallax_subheading', array(
        'selector' => '.main-header-section .main-text h2',
) );
$wp_customize->selective_refresh->add_partial('parallax_button_text', array(
        'selector' => '.main-header-section .main-button a',
) );
// three coloum
$wp_customize->selective_refresh->add_partial('first_parallax_font_icon', array(
        'selector' => '.first a span.featured-icon',
) );
$wp_customize->selective_refresh->add_partial('second_parallax_font_icon', array(
        'selector' => '.second a span.featured-icon',
) );
$wp_customize->selective_refresh->add_partial('third_parallax_font_icon', array(
        'selector' => '.third a span.featured-icon',
) );
// ribbon-top
$wp_customize->selective_refresh->add_partial('hb_heading', array(
    'selector' => '.ribbon-section h2.heading-area',
) );
// services
$wp_customize->selective_refresh->add_partial('our_services_heading', array(
        'selector' => '#multifeature h2',
) );
$wp_customize->selective_refresh->add_partial('our_services_subheading', array(
        'selector' => '#multifeature h3.subhead-text',
) );
// about us
$wp_customize->selective_refresh->add_partial('about_us_heading', array(
        'selector' => '#about h2',
) );
$wp_customize->selective_refresh->add_partial('about_us_subheading', array(
        'selector' => '#about p',
) );
// blog
$wp_customize->selective_refresh->add_partial('blog_head_', array(
        'selector' => '#news h2',
) );
$wp_customize->selective_refresh->add_partial('blog_desc_', array(
        'selector' => '#news h3.subhead-text',
) );
// testimonial
$wp_customize->selective_refresh->add_partial('testimonial_heading', array(
        'selector' => '#testimonials h2',
) );
$wp_customize->selective_refresh->add_partial('testimonial_subheading', array(
        'selector' => '#testimonials h3.subhead-text',
) );
// news letter
$wp_customize->selective_refresh->add_partial('cf_head_', array(
        'selector' => '#newsletter h3',
) );
// team
$wp_customize->selective_refresh->add_partial('our_team_heading', array(
        'selector' => '#team h2',
) );
$wp_customize->selective_refresh->add_partial('our_team_subheading', array(
        'selector' => '#team h3.subhead-text',
) );
// price
$wp_customize->selective_refresh->add_partial('our_price_heading', array(
        'selector' => '#price h2',
) );
$wp_customize->selective_refresh->add_partial('our_price_subheading', array(
        'selector' => '#price h3.subhead-text',
) );
// woocommerce
$wp_customize->selective_refresh->add_partial('woo_head_', array(
        'selector' => '.woocommerce-section h2.head-text',
) );
$wp_customize->selective_refresh->add_partial('woo_desc_', array(
        'selector' => '.woocommerce-section h3.subhead-text',
) );
//bottom ribbon
$wp_customize->selective_refresh->add_partial('hb_heading_bottom', array(
        'selector' => '#bottom-ribbon h2.heading-area',
) );
//contact
$wp_customize->selective_refresh->add_partial('our_cnt_heading', array(
        'selector' => '.contact-section h2',
) );
$wp_customize->selective_refresh->add_partial('our_cnt_subheading', array(
        'selector' => '.contact-section h3.subhead-text',
) );
$wp_customize->selective_refresh->add_partial('cf_shtcd_', array(
        'selector' => '.contact-wrap',
) );
$wp_customize->selective_refresh->add_partial('cnt_tel', array(
        'selector' => '.contact-section .cnt-detail ul li.tel .cnt-info',
) );
$wp_customize->selective_refresh->add_partial('cnt_add', array(
        'selector' => '.contact-section .cnt-detail ul li.address .cnt-info',
) );
$wp_customize->selective_refresh->add_partial('cnt_mail', array(
        'selector' => '.contact-section .cnt-detail ul li.email-ad .cnt-info',
) );

}
add_action('customize_register','thunk_customize_register');
?>