<?php
function elanzalite_unlimited_customize_register( $wp_customize ) {
    $palette = array('rgb(0, 0, 0, 0)',);  
      //  =============================
    //  = Home Post Slider Settings    =
    //  =============================
     $wp_customize->add_section('slider_option', array(
        'title'    => __('Hero Post Slider', 'elanzalite'),
        'priority' => 5,
    ));
     $wp_customize->add_setting('more_sldr_1', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'more_sldr_1',
            array(
        'section'  => 'slider_option',
        'type'        => 'custom_message',
        'description' => wp_kses_post( '(For Blog Post Layout only)','elanzalite' )
    ))); 
// Disable flex-slider
            $wp_customize->add_setting( 'elanzalite_slider_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'elanzalite_slider_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Slider ?', 'elanzalite'),
                    'section'     => 'slider_option',
                    'description' => esc_html__('Check here to disable Post Slider.', 'elanzalite')
                )
            ); 
  //= Choose All Category  =
  $cats = array();
   $cats[0] = 'All Categories';
    foreach ( get_categories() as $categories => $category ){
        $cats[$category->term_id] = $category->name;
    }
   
    $wp_customize->add_setting('slider_cate', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('slider_cate', array(
        'settings' => 'slider_cate',
        'label'   => 'Featured Post Category',
        'section' => 'slider_option',
        'type' => 'select',
        'choices' => $cats,
    ) );
    $wp_customize->add_setting('slider_count', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_int',
    ));
    $wp_customize->add_control('slider_count', array(
        'settings'  => 'slider_count',
        'label'     => 'Number of Slides',
        'section'   => 'slider_option',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 3)
    ) ); 

     $wp_customize->add_setting( 'slider_alignment',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'slider-left',
               
              )
         );
     $wp_customize->add_control( 'slider_alignment',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Text Alignment', 'elanzalite'),
        'section'     => 'slider_option',
        'choices' => array(  
        'slider-left' => esc_html__('Left', 'elanzalite'),
        'slider-center' => esc_html__('Center', 'elanzalite'),
        'slider-right' => esc_html__('Right', 'elanzalite'),
                    )
                )
            );


      $wp_customize->add_setting('slder_ovrlay_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0.18)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

    $wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'slder_ovrlay_color',
            array(
                'label'     => __('Slider Overlay','elanzalite'),
                'section'   => 'slider_option',
                'settings'  => 'slder_ovrlay_color',
                'palette'   => $palette
            )
        )
    );  
     $wp_customize->add_setting('slider_title_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_title_color', 
    array(
        'label'      => __( 'Post Title Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_title_color',
    ) ) );

    $wp_customize->add_setting('slider_meta_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_meta_color', 
    array(
        'label'      => __( 'Post Meta Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_meta_color',
    ) ) );

    $wp_customize->add_setting('slider_desc_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_desc_color', 
    array(
        'label'      => __( 'Post Description Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_desc_color',
    ) ) );

   //break 
    $wp_customize->add_setting('sdr_btn_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'sdr_btn_break_color',array(
            'section' => 'slider_option',
            'description' => __( 'Button Color', 'elanzalite' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            ))); 
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
        'label'       => esc_html__('Button', 'elanzalite'),
        'description'       => esc_html__('Choose button style for slider.', 'elanzalite'),
        'section'     => 'slider_option',
        'choices' => array(
        'default' => esc_html__('Button style 1', 'elanzalite'),
        'button-one' => esc_html__('Button style 2', 'elanzalite'),
        'button-two' => esc_html__('Button style 3', 'elanzalite'),
        
             )
           )
        );
        $wp_customize->add_setting('slder_btn_bg_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'slder_btn_bg_color',
            array(
                'label'     => __('Background Color','elanzalite'),
                'section'   => 'slider_option',
                'settings'  => 'slder_btn_bg_color',
                'palette'   => $palette
            )
        )
    );  
        $wp_customize->add_setting('slider_btn_brd_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_btn_brd_color', 
    array(
        'label'      => __( 'Border Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_btn_brd_color',
    ) ) );

        $wp_customize->add_setting('slider_btn_txt_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_btn_txt_color', 
    array(
        'label'      => __( 'Text Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_btn_txt_color',
    ) ) );
    // hover
     $wp_customize->add_setting('slder_btn_bg_hvr_color',
        array(
            'default'     => 'rgba(0, 0, 0, 0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'slder_btn_bg_hvr_color',
            array(
                'label'     => __('Background Hover Color','elanzalite'),
                'section'   => 'slider_option',
                'settings'  => 'slder_btn_bg_hvr_color',
                'palette'   => $palette
            )
        )
    );  

        $wp_customize->add_setting('slider_btn_brd_hvr_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_btn_brd_hvr_color', 
    array(
        'label'      => __( 'Border Hover Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_btn_brd_hvr_color',
    ) ) );

    $wp_customize->add_setting('slider_btn_txt_hvr_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'slider_btn_txt_hvr_color', 
    array(
        'label'      => __( 'Text Hover Color', 'elanzalite' ),
        'section'    => 'slider_option',
        'settings'   => 'slider_btn_txt_hvr_color',
    ) ) );
//******************//   
// Themeoption
//******************//

   $wp_customize->add_section('global_set', array(
        'title'    => __('Global Setting', 'elanzalite'),
        'priority' => 1,
        'panel'  => 'elanzalite_theme_options',
   ));
// Disable Sticky Header
            $wp_customize->add_setting( 'elanzalite_sticky_header_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'elanzalite_sticky_header_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Fixed Header?', 'elanzalite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Fixed header and activate Normal header.', 'elanzalite'),
                    'active_callback' => 'elanzalite_is_not_magazine_page'
                )
            );
// Disable back to top button
            $wp_customize->add_setting( 'elanzalite_backtotop_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'elanzalite_backtotop_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable back to top button ?', 'elanzalite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Back To Top button.', 'elanzalite')
                )
            ); 
  //*****************************************//             
// site-color
//*****************************************//           
$wp_customize->add_section('site_color', array(
        'title'    => __('Global Color', 'elanzalite'),
        'priority' => 2,
        'panel'  => 'elanzalite_theme_options',
));
$wp_customize->add_setting('theme_color', array(
        'default'        => '#66cda9',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'theme_color', 
    array(
        'label'      => __( 'Theme Color', 'elanzalite' ),
        'section'    => 'site_color',
        'settings'   => 'theme_color',
    ) ) );
// footer-bg     
 $wp_customize->add_setting('ftr_bg_color',
        array(
            'default'     => '#111',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ftr_bg_color',
            array(
                'label'     => __('Footer Widget Background Color','elanzalite'),
                'section'   => 'site_color',
                'settings'  => 'ftr_bg_color',
                'palette'   => $palette
            )
        )
    );   
$wp_customize->add_setting('ftr_wgt_tl_color', array(
        'default'        => '#5a5d5a',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'ftr_wgt_tl_color', 
    array(
        'label'      => __( 'Footer Widget Title Color', 'elanzalite' ),
        'section'    => 'site_color',
        'settings'   => 'ftr_wgt_tl_color',
    ) ) );

    // copyright Background
 $wp_customize->add_setting('ftr_cpybg_color',
        array(
            'default'     => '#111',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ftr_cpybg_color',
            array(
                'label'     => __('Footer Copyright Background Color','elanzalite'),
                'section'   => 'site_color',
                'settings'  => 'ftr_cpybg_color',
                'palette'   => $palette
            )
        )
    );    
// copyright color
$wp_customize->add_setting('copy_txt_color', array(
        'default'        => '#ddd',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'copy_txt_color', 
    array(
        'label'      => __( 'Footer Copyright Text Color', 'elanzalite' ),
        'section'    => 'site_color',
        'settings'   => 'copy_txt_color',
    ) ) );
 // social icon color
 $wp_customize->add_setting('social_icon_color', array(
        'default'        => '#8224e3',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'social_icon_color', 
    array(
        'label'      => __( 'Icon color', 'elanzalite' ),
        'section'    => 'social_option',
        'settings'   => 'social_icon_color',
    ) ) );   

//  =============================
//  = top Header Settings =
//  =============================
$wp_customize->add_section('top_header_setng_option', array(
        'title'    => __('Top Header Setting', 'elanzalite'),
        'priority' => 3,
        'panel' => 'elanzalite_theme_options',
));
$wp_customize->add_setting('more_grd_lyt_11', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'more_grd_lyt_11',
            array(
        'section'  => 'top_header_setng_option',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'First create a menu for showing your top header','elanzalite' )
 )));
$wp_customize->add_setting( 'top_hdr_active',
              array(
            'sanitize_callback' => 'themehunk_sanitize_checkbox',
            'default'           => '',
                )
            );
    $wp_customize->add_control( 'top_hdr_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Top Header Hide', 'elanzalite'),
                'section'     => 'top_header_setng_option',
                'description' => esc_html__('(Check here to Disable Top Header)', 'elanzalite')
                )
            );
 // TOP header-bg-color
$wp_customize->add_setting('top_hd_bg_color',
        array(
            'default'     => '#0e0e0e',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'top_hd_bg_color',
            array(
                'label'     => __('Background Color','elanzalite'),
                'section'   => 'top_header_setng_option',
                'settings'  => 'top_hd_bg_color',
                'palette'   => $palette
            )
        )
    );  
$wp_customize->add_setting('top_date_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'top_date_clr', 
    array(
    'label' => __('Date Color','elanzalite'),
        'section'    => 'top_header_setng_option',
        'settings'   => 'top_date_clr',
    ) ) );
$wp_customize->add_setting('top_menu_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'top_menu_clr', 
    array(
    'label' => __('Menu Color','elanzalite'),
        'section'    => 'top_header_setng_option',
        'settings'   => 'top_menu_clr',
    ) ) ); 

$wp_customize->add_setting('top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'top_icon_clr', 
    array(
    'label' => __('Social Icon Color','elanzalite'),
        'section'    => 'top_header_setng_option',
        'settings'   => 'top_icon_clr',
    ) ) );      
//  =============================
//  = Header Settings =
//  =============================
$wp_customize->add_section('heaer_setng_option', array(
        'title'    => __('Header Setting', 'elanzalite'),
        'priority' => 3,
        'panel' => 'elanzalite_theme_options',
    ));
//header transparent
$wp_customize->add_setting( 'heaer_bg_trnsparent_active',
              array(
            'sanitize_callback' => 'themehunk_sanitize_checkbox',
            'default'           => '1',
                )
            );
    $wp_customize->add_control( 'heaer_bg_trnsparent_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Header Transparent', 'elanzalite'),
                'section'     => 'heaer_setng_option',
                'description' => esc_html__('(Only applied for front page template.)', 'elanzalite'),'active_callback' => 'elanzalite_is_not_magazine_page'
                )
            );
//header visibility
$wp_customize->add_setting( 'header_visibility_active',
              array(
            'sanitize_callback' => 'themehunk_sanitize_checkbox',
            'default'           => '',
                )
            );
    $wp_customize->add_control( 'header_visibility_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Header Visibility', 'elanzalite'),
                'section'     => 'heaer_setng_option',
                'description' => esc_html__('(Only applied for front page template.)', 'elanzalite'),'active_callback' => 'elanzalite_is_not_magazine_page'
                )
            );
// header-bg-color
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
                'label'     => __('Header Background Color','elanzalite'),
                'section'   => 'heaer_setng_option',
                'settings'  => 'hd_bg_color',
                'active_callback' => 'elanzalite_is_not_magazine_page',
                'palette'   => $palette,

            )
        )
    );
// header-bg-shrink-color
$wp_customize->add_setting('hd_bg_shr_color',
        array(
            'default'     => 'rgba(255, 255, 255, 0.95)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'hd_bg_shr_color',
            array(
                'label'     => __('Header Shrink Background Color','elanzalite'),
                'section'   => 'heaer_setng_option',
                'settings'  => 'hd_bg_shr_color',
                'active_callback' => 'elanzalite_is_not_magazine_page',
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
    'label' => __('Site Title Color','elanzalite'),
        'section'    => 'heaer_setng_option',
        'settings'   => 'site_title_color',
    ) ) );

// menu   
$wp_customize->add_setting('hd_menu_color', array(
        'default'        => '#606060',
        'capability'     => 'edit_theme_options',  
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_color', 
    array(
    'label' => __('Menu Link Color','elanzalite'),
        'section'    => 'heaer_setng_option',
        'settings'   => 'hd_menu_color',
    ) ) );
  // hover 
$wp_customize->add_setting('hd_menu_hvr_color', array(
        'default'        => '#66cdaa',
        'capability'     => 'edit_theme_options',      
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_hvr_color', 
    array(
    'label' => __('Menu Link Hover/Active Color','elanzalite'),
        'section'    => 'heaer_setng_option',
        'settings'   => 'hd_menu_hvr_color',
    ) ) );
  // responsive menu icon button color 
   $wp_customize->add_setting('mobile_menu_bg_color', array(
        'default'        => '#606060',
        'capability'     => 'edit_theme_options', 
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'mobile_menu_bg_color', 
    array(
    'label' => __('Responsive Menu Icon Color','elanzalite'),
        'section'    => 'heaer_setng_option',
        'settings'   => 'mobile_menu_bg_color',
) ) );   
//  =============================
//  = Home Post Settings    =
//  =============================
// Sidebar settings
    $wp_customize->add_setting( 'elanzalite_blog_layout',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
               
              )
         );
     $wp_customize->add_control( 'elanzalite_blog_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Sidebar Alignment', 'elanzalite'),
        'description'       => esc_html__('Choose sidebar option for Blog Page', 'elanzalite'),
        'section'     => 'blog_option',
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'elanzalite'),
        'left' => esc_html__('Left sidebar', 'elanzalite'),
        'no-sidebar' => esc_html__('No sidebar', 'elanzalite'),
                    )
                )
            );
            $wp_customize->add_setting( 'post_cat_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'post_cat_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Category ?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Post Category', 'elanzalite')
                )
            );

         // Hide Excerpt data in standarad
            $wp_customize->add_setting( 'stndrd_post_excerpt_data_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'stndrd_post_excerpt_data_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Content ?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Post Excerpt Content', 'elanzalite')
                )
            );   
     // Hide Excerpt data
            $wp_customize->add_setting( 'post_excerpt_data_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'post_excerpt_data_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Excerpt ?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Post Excerpt Content', 'elanzalite')
                )
            );
    // excerpt length    
    $wp_customize->add_setting('excerpt_lenght', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('excerpt_lenght', array(
        'label'      => __('Post Excerpt Length', 'elanzalite'),
        'section'    => 'blog_option',
        'type'          =>'text',
        'settings'   => 'excerpt_lenght',
    )
    );

    // Hide readmore text
            $wp_customize->add_setting( 'post_read_more_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'post_read_more_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Read More?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Read More Text', 'elanzalite')
                )
            );
    // Read more text  
    $wp_customize->add_setting('readmore_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('readmore_text', array(
        'label'      => __('Read More Text', 'elanzalite'),
        'section'    => 'blog_option',
        'type'          =>'text',
        'settings'   => 'readmore_text',
    )
    );
    // Hide Post Meta
            $wp_customize->add_setting( 'post_meta_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'post_meta_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Meta?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Post Meta', 'elanzalite')
                )
            );
    // Hide blog social share
            $wp_customize->add_setting( 'blog_post_share_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'blog_post_share_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post share ?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Post share in Standard Post', 'elanzalite')
                )
            );
    // Hide Prefix archive
            $wp_customize->add_setting( 'archive_pre_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'archive_pre_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Prefix?', 'elanzalite'),
                    'section'     => 'blog_option',
                    'description' => esc_html__('Check here to disable Prefix in Archive Page', 'elanzalite')
                )
            );

     $wp_customize->add_setting('more_grd_lyt_1', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'more_grd_lyt_1',
            array(
        'section'  => 'blog_option',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/elanza-blogging-theme/">Elanza</a> for More <strong>Home Page Layout!</strong>','elanzalite' )
    )));         
    //  =============================
    //  = Single post setting =
    //  =============================
    $wp_customize->add_section('blog_single_option', array(
        'title'    => __('Single Post', 'elanzalite'),
        'priority' => 5,
        'panel' => 'elanzalite_theme_options',
    ));
     // Sidebar settings
    $wp_customize->add_setting( 'elanzalite_blog_single_layout',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
               
              )
         );
     $wp_customize->add_control( 'elanzalite_blog_single_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Sidebar Alignment', 'elanzalite'),
        'description'       => esc_html__('Choose sidebar option for Single Page', 'elanzalite'),
        'section'     => 'blog_single_option',
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'elanzalite'),
        'left' => esc_html__('Left sidebar', 'elanzalite'),
        'no-sidebar' => esc_html__('No sidebar', 'elanzalite'),
                    )
                )
            );
         // Hide post meta single page
            $wp_customize->add_setting('single_post_cat_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('single_post_cat_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Category ?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Post Category in Single Page', 'elanzalite')
                )
            );
         // Hide post meta single page
            $wp_customize->add_setting('single_post_meta_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('single_post_meta_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Meta?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Post meta in Single Page', 'elanzalite')
                )
            );
            // Featured Image 
            $wp_customize->add_setting('single_post_ftured_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('single_post_ftured_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Featured Image ?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Featured Image in Single Page', 'elanzalite')
                )
            );


            
            // Related post
            $wp_customize->add_setting('post_related_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('post_related_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Related Post ?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Related Post in Single Page', 'elanzalite')
                )
            );
            // TAG
            $wp_customize->add_setting('post_tag_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('post_tag_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Tag ?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Tag in Single Page', 'elanzalite')
                )
            );
            // Post navigation
            $wp_customize->add_setting('post_nav_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('post_nav_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Navigation ?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Post Navigation in Single Page', 'elanzalite')
                )
            );
            // share 
            $wp_customize->add_setting('post_share_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('post_share_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Post Share ?', 'elanzalite'),
                    'section'     => 'blog_single_option',
                    'description' => esc_html__('Check here to disable Post Share in Single Page', 'elanzalite')
                )
            );
/*************************************************************************/

                    //Gloabal-typograpgy//

/**************************************************************************/
$wp_customize->register_control_type( 'Themehunk_Customizer_Range_Value_Control' );
$wp_customize->add_panel( 'theme_tygrphy', array(
    'priority'       => 4,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Typography', 'elanzalite'),
    'description'    => '',
) );
$wp_customize->add_section(
        'elanzalite_fontsubset_typography', array(
            'title' => esc_html__( 'Font Subsets', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
if ( class_exists( 'themehunk_Customize_Control_Checkbox_Multiple' ) ) {

        $wp_customize->add_setting(
            'themehunk_font_subsets', array(
                'default' => array( 'latin' ),
                'sanitize_callback' => 'themehunk_checkbox_explode',
            )
        );

        $wp_customize->add_control(
            new themehunk_Customize_Control_Checkbox_Multiple(
                $wp_customize, 'themehunk_font_subsets', array(
                    'section' => 'elanzalite_fontsubset_typography',
                    'label' => esc_html__('Font Subsets', 'elanzalite'),
                    'choices' => array(
                        'latin' => 'latin',
                        'latin-ext' => 'latin-ext',
                        'cyrillic' => 'cyrillic',
                        'cyrillic-ext' => 'cyrillic-ext',
                        'greek' => 'greek',
                        'greek-ext' => 'greek-ext',
                        'vietnamese' => 'vietnamese',
                        'arabic' => 'arabic',
                    ),
                    'priority' => 10,
                )
            )
        );
    }
$wp_customize->add_section(
        'elanzalite_typography', array(
            'title' => esc_html__( 'Body', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 15,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 20,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 15,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 20,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 15,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 20,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 24,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 50,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 24,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 50,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 24,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 50,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );

    }
/************************************/   
// H1-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_h1', array(
            'title' => esc_html__( 'Heading 1 (H1)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_h1', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_h1', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_h1',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 44,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_h1', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 44,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb_h1', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 44,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb_h1', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 55,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_h1', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 55,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb_h1', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 55,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb_h1', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_h1', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb_h1', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb_h1', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb_h1', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h1',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );

    }
/************************************/   
// H2-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_h2', array(
            'title' => esc_html__( 'Heading 2 (H2)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_h2', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_h2', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_h2',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 38,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_h2', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 38,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb_h2', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 38,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb_h2', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 48,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_h2', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 48,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb_h2', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 48,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb_h2', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_h2', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb_h2', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb_h2', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb_h2', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h2',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );

    }
/************************************/   
// H3-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_h3', array(
            'title' => esc_html__( 'Heading 3 (H3)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_h3', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_h3', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_h3',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 34,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_h3', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 34,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb_h3', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 34,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb_h3', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 44,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_h3', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 44,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb_h3', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 44,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb_h3', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_h3', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb_h3', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb_h3', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb_h3', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h3',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );

    }    
 /************************************/   
// H4-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_h4', array(
            'title' => esc_html__( 'Heading 4 (H4)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_h4', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_h4', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_h4',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 30,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_h4', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 30,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb_h4', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 30,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb_h4', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 40,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_h4', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 40,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb_h4', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 40,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb_h4', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_h4', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb_h4', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb_h4', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb_h4', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h4',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );

    }       
/************************************/   
// H5-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_h5', array(
            'title' => esc_html__( 'Heading 5 (H5)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_h5', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_h5', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_h5',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 26,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_h5', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 26,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb_h5', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 26,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb_h5', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 36,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_h5', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 36,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb_h5', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 36,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb_h5', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_h5', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb_h5', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb_h5', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb_h5', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h5',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );

    }       
/************************************/   
// H6-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_h6', array(
            'title' => esc_html__( 'Heading 6 (H6)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_h6', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_h6', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_h6',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
     if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'elanzalite_body_font_size_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_h6', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );

        // tab
        $wp_customize->add_setting(
            'elanzalite_body_font_size_tb_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_tb_h6', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
         // mob
        $wp_customize->add_setting(
            'elanzalite_body_font_size_mb_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_font_size_mb_h6', array(
                    'label' => esc_html__( 'Font size', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // line-height
      $wp_customize->add_setting(
            'elanzalite_body_line_height_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 32,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_h6', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_line_height_tb_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 32,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_tb_h6', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'elanzalite_body_line_height_mb_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 32,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_line_height_mb_h6', array(
                    'label' => esc_html__( 'Line height', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // letter-spacing
       $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_h6', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_tb_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_tb_h6', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
         //mob
        $wp_customize->add_setting(
            'elanzalite_body_letter_spacing_mb_h6', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.7,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'elanzalite_body_letter_spacing_mb_h6', array(
                    'label' => esc_html__( 'Letter-spacing ', 'elanzalite' ) . ' ( ' . esc_html__( 'px','elanzalite' ) . ' )',
                    'section' => 'elanzalite_typography_h6',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ),
                    'priority' => 25,
                )
            )
        );
    }  
/************************************/   
// a-typography
/***********************************/
    $wp_customize->add_section(
        'elanzalite_typography_a', array(
            'title' => esc_html__( 'Anchor Tag (a)', 'elanzalite' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'elanzalite_body_font_a', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'elanzalite_body_font_a', array(
        'label' => esc_html__( 'Font family', 'elanzalite' ),
                    'section'           => 'elanzalite_typography_a',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
/*********************/   
//magzine template
/*********************/   
  $wp_customize->add_panel( 'elanzalite_magzine', array(
        'priority'       => 3,
        'title'          => __('Magazine Template', 'elanzalite'),
    ) ); 

$wp_customize->add_section('magzine_box_layout', array(
        'title'    => __('Boxed Layout', 'elanzalite'),
        'priority' => 1,
        'panel' => 'elanzalite_magzine',
    ));
//choose Boxed layout
$wp_customize->add_setting('magzine_boxed_layout', array(
        'default'        => 'disable-all',
        'capability'     => 'edit_theme_options',
        'priority' => 1,
    ));
    $wp_customize->add_control('magzine_boxed_layout', array(
        'settings' => 'magzine_boxed_layout',
        'label'   => 'Boxed Layout',
        'section' => 'magzine_box_layout',
        'active_callback' => 'elanzalite_is_magazine_page',
        'type'    => 'radio',
        'choices'    => array(
                    'disable-all'  => ' Disable For All',
                    'boxed-single'   => 'Enable Boxed Layout ( Single page)',
                    'boxed-all'  => ' Enable Boxed Layout ( All pages)',
                    
        ),
    ));
$wp_customize->add_section('magzine_box_hrdr_layout', array(
        'title'    => __('Header Layout', 'elanzalite'),
        'priority' => 3,
        'panel' => 'elanzalite_magzine',
        'active_callback' => 'elanzalite_is_magazine_page',
)); 
 $wp_customize->add_setting('mag_header_desc', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'mag_header_desc',
            array(
        'section'  => 'magzine_box_hrdr_layout',
        'type'        => 'custom_message',
        'description' => wp_kses_post( '(First Enable boxed layout for showing header layout on your site)','elanzalite' )
    )));
// choose header style
$wp_customize->add_setting('header_style1_active', array(
        'default'        => 'hdr_default',
        'capability'     => 'edit_theme_options',
    ));
$wp_customize->add_control( 'header_style1_active', array(
        'settings' => 'header_style1_active',
        'label'   => 'Choose Header Style',
        'section' => 'magzine_box_hrdr_layout',
        'type'    => 'radio',
        'choices'    => array(
                    'hdr_default'   => 'Default',
                    'hdr_one_ads'   => 'Header With Ad',
                                    
        ),
    ));
//  = Choose ads  =
     $wp_customize->add_setting('ads_select', array(
        'default'        => 'ads_image',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('ads_select', array(
        'settings' => 'ads_select',
        'label'   => 'Choose Ad',
        'section' => 'magzine_box_hrdr_layout',
        'type'    => 'radio',
        'choices'    => array(
                    'ads_image'   => 'Banner Ad',
                    'ads_code'  => 'Google Ad',
                    
        ),
    ));
    //ads-image
    $wp_customize->add_setting('hdr_ads_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'hdr_ads_image', array(
        'label'    => __('Upload Ad Image', 'elanza'),
        'section'  => 'magzine_box_hrdr_layout',
        'settings' => 'hdr_ads_image',
    )));
    // ads link
 $wp_customize->add_setting('ads_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('ads_link', array(
        'settings' => 'ads_link',
        'label'   => 'Ad Link',
        'section' => 'magzine_box_hrdr_layout',
        'type'    => 'text',
    )  );
 // adsense code
    $wp_customize->add_setting('hdr_adsense_code', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control('hdr_adsense_code', array(
        'settings'        => 'hdr_adsense_code',
        'label'           => __('Adsense Code','elanza'),
        'description'     => __('Google Adsense / Custom Ad Generate <a target="_blank" href="//www.google.com/adsense/start/">Google Adsense</a> code and paste it below.','elanzalite'),
        'section' => 'magzine_box_hrdr_layout',
        'type'    => 'textarea',
    ) );
    //bg-color-menu   
$wp_customize->add_setting('ads_hd_bg_color',
        array(
            'default'     => '#0e0e0e',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'ads_hd_bg_color',
            array(
                'label'     => __('Menu Background Color','elanzalite'),
                'section'   => 'magzine_box_hrdr_layout',
                'settings'  => 'ads_hd_bg_color',
                'palette'   => $palette
            )
        )
    );
// responsive menu text 
$wp_customize->add_setting('mobile_menu_text', array(
        'default'        => 'Main Menu',
        'capability'     => 'edit_theme_options',
));
$wp_customize->add_control('mobile_menu_text', array(
        'settings' => 'mobile_menu_text',
        'label'   => 'Mobile Menu Text',
        'section' => 'magzine_box_hrdr_layout',
        'type'    => 'text',
    )  );
 // magazine-color  
 $wp_customize->add_section('magzine_color_option', array(
        'title'    => __('Setting', 'elanzalite'),
        'priority' => 5,
        'panel' => 'elanzalite_magzine',
    ));
// Sidebar settings

     $wp_customize->add_section('elanzalite_magzine_layout_section', array(
        'title'    => __('Setting', 'elanzalite'),
        'priority' => 1,
        'panel' => 'elanzalite_magzine',
    ));
    $wp_customize->add_setting( 'elanzalite_magzine_layout',
            array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
               
              )
         );
     $wp_customize->add_control( 'elanzalite_magzine_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Sidebar Alignment', 'elanzalite'),
        'description' => esc_html__('Choose sidebar option for Magazine Template', 'elanzalite'),
         'active_callback' => 'elanzalite_is_magazine_page',
        'section'     => 'elanzalite_magzine_layout_section',
        'priority' => 100,
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'elanzalite'),
        'left' => esc_html__('Left sidebar', 'elanzalite'),
                    )
                )
        );
//break 
    $wp_customize->add_setting('mg_view_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'mg_view_break_color',array(
            'section' => 'magzine_color_option',
            'description' => __( 'View All Button', 'elanzalite' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
             'active_callback' => 'elanzalite_is_magazine_page',
             'priority' => 2,
            ))); 

    $wp_customize->add_setting('magzine_vw_bg_color', array(
        'default'        => '#0e0e0e',
        'capability'     => 'edit_theme_options',
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'magzine_vw_bg_color', 
    array(
        'label'      => __( 'Background Color', 'elanzalite' ),
        'section'    => 'magzine_color_option',
        'settings'   => 'magzine_vw_bg_color',
         'active_callback' => 'elanzalite_is_magazine_page',
         'priority' => 3,
    ) ) );
//break 
    $wp_customize->add_setting('mg_cat_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'mg_cat_break_color',array(
            'section' => 'magzine_color_option',
            'description' => __( 'Category Background Color', 'elanzalite' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            'active_callback' => 'elanzalite_is_magazine_page',
            'priority' => 4,
            ))); 
$i = 1;
    $args = array(
        'orderby' => 'id',
        'hide_empty' => 0
    );
    $categories = get_categories( $args );
    $wp_category_list = array();
    foreach ( $categories as $category_list ) {
        $wp_category_list[ $category_list->cat_ID ] = $category_list->cat_name;

        $wp_customize->add_setting( 'elanzalite_category_color_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
            'default' => '',
            'capability' => 'edit_theme_options',
            
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'elanzalite_category_color_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
            'label' => sprintf( __( '%s', 'elanzalite' ), $wp_category_list[ $category_list->cat_ID ] ),
            'section' => 'magzine_color_option',
            'settings' => 'elanzalite_category_color_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
            'priority' => $i,
            'active_callback' => 'elanzalite_is_magazine_page',
            'priority' => 5,
        ) ) );
        $i ++;
    }

}
add_action('customize_register','elanzalite_unlimited_customize_register',999);
/**
 * Check if a string is in json format
 * @param  string $string Input.
 *
 * @since 1.1.38
 * @return bool
 */
function themehunk_is_json( $string ) {
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}
function elanzalite_is_magazine_page() {
    return is_page_template('magazine-template.php');
}
function elanzalite_is_not_magazine_page() {
    return ! is_page_template('magazine-template.php');
}
?>