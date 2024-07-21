<?php
if ( ! function_exists('shopline_get_category_list')):
    function shopline_get_category_list($arr='',$all=true){
        $cats = array();
        if($all == true){
            $cats[0] = 'All Categories';
        }
        foreach ( get_categories($arr) as $categories => $category ){
            $cats[$category->term_id] = $category->name;
         }
         return $cats;
    }
endif;
// select category
if (! function_exists('shopline_get_categories_select')) :
function shopline_get_categories_select() {
if ( taxonomy_exists ( 'product_cat' )) {
$results= array ('all'=> 'All'); // for default value
$teh_cats = get_terms('product_cat', array ( 
    'orderby' => 'count', 
    'include' => ',' ,
    'order' => 'DESC'));
$count = count($teh_cats);
for ($i=0; $i < $count; $i++) { 
if (isset($teh_cats[$i])) $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name; //provide slug as options key and category name as options  value on select options
else
$count++;
}
return $results;
}else{
return array ("all" => __('Add Category', 'shopline')); // if woocommerce is not installed
}
}
endif;
//  = Default Theme Customizer Settings  =
function shopline_lite_customize_register( $wp_customize ) {
/**
     * Class Shopline_contact_Page_Instructions
     */
class Shopline_contact_Page_Instructions extends WP_Customize_Control{
        /**
         * Render about page instruction
         */
        public function render_content() {
            echo __( 'To customize the Contact Page first go to "Dashboard > Page > Template > Contact Page Template". Then open the page in the browser and click on customize. After that you will able to see the setting of Contact Page in your customize panel.', 'shopline' ) . '<br><br>' . __( 'Need further assistance? Check out this', 'shopline' ) . ' <a href="//themehunk.com/docs/shopline-theme/#contact-page" target="_blank">' . __( 'doc', 'shopline' ) . '</a>';
        }
 }
    
$color_palette = array('rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
       'rgba(50,50,50,0.8)',
        'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
        '#00CC99' // Mix of color types = no problem
                );
$palette = array('rgb(0, 0, 0, 0)'); 
// // dummy data on/off
// $wp_customize->add_section('section_dummydata', array(
//         'title'    => __('Dummy Data Hide/Show', 'shopline'),
//         'priority' => 1,
//     ));
// $wp_customize->add_setting('dummydata_hide_show', array(
//             'default'        =>'show',
//             'capability'     => 'edit_theme_options',
//             'sanitize_callback' => 'sanitize_text_field'
//     ));
// $wp_customize->add_control('dummydata_hide_show', array(
//             'settings' => 'dummydata_hide_show',
//             'label'   => __('Dummy Data Hide / Show','shopline'),
//             'section' => 'section_dummydata',
//             'type'    => 'radio',
//             'choices'    => array(
//                 'show'        => __('Show Dummy Data ','shopline'),
//                 'hide'      => __('Hide Dummy Data','shopline'),
//             ),
//     ));
/****************************************************************/
/************         Theme Settings      ************/
/****************************************************************/
 $wp_customize->add_panel( 'settings_theme_options', array(
        'priority'       => 4,
        'title'          => __('Appearance Settings', 'shopline'),
    ) );
/***********************  Global-setting    ************************/
$wp_customize->add_section('global_set', array(
        'title'    => __('Global Setting', 'shopline'),
        'priority' => 1,
        'panel'  => 'settings_theme_options',
));
 // page layout settings
$wp_customize->add_setting( 'shopline_layout',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
               
              )
         );
$wp_customize->add_control( 'shopline_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Page Layout', 'shopline'),
        'description'       => esc_html__('Choose sidebar option for inner pages (non-home)', 'shopline'),
        'section'     => 'global_set',
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'shopline'),
        'left' => esc_html__('Left sidebar', 'shopline'),
        'no-sidebar' => esc_html__('No sidebar', 'shopline'),
                    )
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
                    'label'       => esc_html__('Disable Parallax effect ?', 'shopline'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Parallax effect ', 'shopline')
                )
            );
// Disable Animation
            $wp_customize->add_setting( 'shopline_animation_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'shopline_animation_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable animation effect?', 'shopline'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable homepage section animation.', 'shopline')
                )
            );
   // Disable back to top button
            $wp_customize->add_setting( 'shopline_backtotop_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'shopline_backtotop_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide back to top button ?', 'shopline'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Back To Top button.', 'shopline')
                )
            ); 
// enable rtl-transform
            // $wp_customize->add_setting( 'shopline_rtl_optn',
            //     array(
            //         'sanitize_callback' => 'themehunk_sanitize_checkbox',
            //         'default'           => '',
            //     )
            // );
            // $wp_customize->add_control( 'shopline_rtl_optn',
            //     array(
            //         'type'        => 'checkbox',
            //         'label'       => esc_html__('Enable Rtl Transform ?', 'shopline'),
            //         'section'     => 'global_set',
            //         'description' => esc_html__('Check here to enable right to left transform in your site.', 'shopline')
            //     )
            // ); 
//  Genral Settings 
$wp_customize->get_section('title_tagline')->title = esc_html__('Site Identity', 'shopline');
$wp_customize->get_section('title_tagline')->priority = 2;                   
// Page Container Setting 
        $wp_customize->add_section('contn_setng', array(
        'title'    => __('Page Container Setting', 'shopline'),
        'priority' => 61,
        'panel'    =>'settings_theme_options'
         ));
        if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'contn_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1200,
                
            )
        );
        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'contn_size', array(
                    'label' => esc_html__( 'Container Size (In Pixel)', 'shopline' ),
                    'description'=> __('(For all theme pages)', 'shopline'),
                    'section' => 'contn_setng',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 1200,
                        'step' => 10,
                    ),
                )
            )
        );
}
$wp_customize->add_setting('container_desc', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'container_desc',
            array(
        'section'         => 'contn_setng',
        'type'            => 'custom_message',
        'description'     => wp_kses_post( 'For all theme pages.','shopline' ),
        'priority'        => 0,
        'active_callback' => 'shopline_is_contact_page',
    )));
/*************************************************************************/
                    //Contact-us-tempalte-option//
/**************************************************************************/   
$wp_customize->add_section( 'contact_sectn', array(
        'priority'       => 15,
        'title'          => __('Contact Page Setting', 'shopline'),
));
$wp_customize->add_setting('cnt_page_desc', array(
            'sanitize_callback' => 'sanitize_text_field'
           ));
$wp_customize->add_control(new Shopline_contact_Page_Instructions(
            $wp_customize,'cnt_page_desc',array(
            'section' => 'contact_sectn',
            'active_callback' => 'shopline_is_not_contact_page',
            )));


$wp_customize->add_setting('contact_txt', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'contact_txt',
            array(
        'section'  => 'contact_sectn',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'These settings will be applicable for page with <a target="_blank" href="//themehunk.com/docs/shopline-theme/#custom-setting">contact template</a> selected.','shopline' ),
        'priority'       => 0,
        'active_callback' => 'shopline_is_contact_page',
    ))); 
//pages-sidebar-settting
 $wp_customize->add_setting('contact_tel', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contact_tel', array(
            'label'    => __('Mobile', 'shopline'),
            'section'  => 'contact_sectn',
            'settings' => 'contact_tel',
             'type'       => 'text',
              'priority' => 5,
              'active_callback' => 'shopline_is_contact_page',
            ));

//adderess
$wp_customize->add_setting('contact_add', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            
            ));
        $wp_customize->add_control('contact_add', array(
            'label'    => __('Address', 'shopline'),
            'section'  => 'contact_sectn',
            'settings' => 'contact_add',
             'type'       => 'textarea',
            'priority' => 5,
            'active_callback' => 'shopline_is_contact_page',
            ));
//time
$wp_customize->add_setting('contact_time', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            
            ));
        $wp_customize->add_control('contact_time', array(
            'label'    => __('Time', 'shopline'),
            'section'  => 'contact_sectn',
            'settings' => 'contact_time',
             'type'       => 'textarea',
            'priority' => 5,
            'active_callback' => 'shopline_is_contact_page',
            ));
// shortcode
$wp_customize->add_setting('contact_shrcd', array(
        'default'           => '[lead-form form-id=1 title=Contact Us]',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('contact_shrcd', array(
            'label'    => __('Shortcode', 'shopline'),
            'description'    => __('Install recommended <a target="_blank" href="//wordpress.org/plugins/lead-form-builder/">Contact Form & Lead Form Builder</a> Plugin for Contact Us form.', 'shopline'),
            'section'  => 'contact_sectn',
            'settings' => 'contact_shrcd',
             'type'       => 'textarea',
             'priority' => 5,
             'active_callback' => 'shopline_is_contact_page',
            )); 


/*
/****************************************************************/
/************         Header Option      ************/
/****************************************************************/
$header_options = new PE_WP_Customize_Panel( $wp_customize, 'header_options', array(
    'title' => 'Header Options (Hero)',
    'priority' => 4,
));
$wp_customize->add_panel( $header_options );
/*************************************/
// Header-setting
/*************************************/
$wp_customize->add_section('header_setting', array(
        'title'    => __('Header Setting', 'shopline'),
        'priority' => 1,
        'panel'  => 'header_options',
));
$wp_customize->add_setting(
            'header_tab', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'header_tab', array(
                    'section' => 'header_setting',
                    'tabs'    => array(
                        'woo_cat_setting'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'shopline_sticky_header_disable',
                                'hdr_bg_trnsparent_active',
                                'hdr_intrnl_trnsparent_active',
                                'hdr_toggle_active',
                                'last_menu_btn',        
                            ),
                        ),
                        'woo_cat_style' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'header_break_color',
                                'headr_bckg',
                                'shrnk_headr_bckg',
                                'site_title_color',
                                'site_desc_color',
                                'menu_break_color',
                                'top_menu_color',
                                'top_menu_hvr_color',
                                'mob_icon_color',
                                'icon_break_color',
                                'top_icon_color'
                            ),
                        ),
                    ),
                )
            )
  );
}
// Disable fixed Header
            $wp_customize->add_setting( 'shopline_sticky_header_disable',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'shopline_sticky_header_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Fixed Header?', 'shopline'),
                    'section'     => 'header_setting',
                    'description' => esc_html__('Check here to disable Fixed header and activate Normal header.', 'shopline')
                )
            );
//header transparent
$wp_customize->add_setting( 'hdr_bg_trnsparent_active',
              array(
            'sanitize_callback' => 'themehunk_sanitize_checkbox',
            'default'           => '',
                )
            );
$wp_customize->add_control( 'hdr_bg_trnsparent_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Header Transparent (Home)', 'shopline'),
                'section'     => 'header_setting',
                'description' => esc_html__('(Only applied for Home page template.)','shopline')
                )
            );
//header transparent
$wp_customize->add_setting( 'hdr_intrnl_trnsparent_active',
              array(
            'sanitize_callback' => 'themehunk_sanitize_checkbox',
            'default'           => '',
                )
            );
$wp_customize->add_control( 'hdr_intrnl_trnsparent_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Header Transparent', 'shopline'),
                'section'     => 'header_setting',
                'description' => esc_html__('(Only applied for all other Pages.)','shopline')
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
        'label'     => __( 'Header Visibility','shopline'),
        'description' => esc_html__('(Check here to header will toggle on front page)', 'shopline'),
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
                'label'       => esc_html__('Custom Button', 'shopline'),
                'description' => esc_html__('(Check here to style last Menu Item as a Custom Button)', 'shopline'),
                'section'     => 'header_setting',
                
                )
            );
// header-setting-color-option
//break 
$wp_customize->add_setting('header_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'header_break_color',array(
            'section' => 'header_setting',
            'description' => __( 'Header Color', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            ))); 
// background-color
$wp_customize->add_setting('headr_bckg',
        array(
            'default'     => 'rgba(0, 0, 0,0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'headr_bckg',
            array(
                'label'     => __('Header Background','shopline'),
                'section'   => 'header_setting',
                'settings'  => 'headr_bckg',
                'palette'   => $palette
            )
        )
    );
// shrink header bg
$wp_customize->add_setting('shrnk_headr_bckg',
        array(
            'default'     => 'rgba(255, 255, 255,1)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            
        ) );

$wp_customize->add_control(
        new Customize_themehunk_Color_Control($wp_customize,
            'shrnk_headr_bckg',
            array(
                'label'     => __('Header Shrink Background','shopline'),
                'section'   => 'header_setting',
                'settings'  => 'shrnk_headr_bckg',
                'palette'   => $palette
            )
        )
    );
// site-title
$wp_customize->add_setting('site_title_color', array(
        'default'        => '#080808',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'site_title_color', 
    array(
    'label' => __('Site Title','shopline'),
        'section'    => 'header_setting',
        'settings'   => 'site_title_color',
    ) ) );
// sub-title
$wp_customize->add_setting('site_desc_color', array(
        'default'        => '#666666',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'site_desc_color', 
    array(
    'label' => __('Title Description','shopline'),
        'section'    => 'header_setting',
        'settings'   => 'site_desc_color',
    ) ) );
//break 
$wp_customize->add_setting('menu_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'menu_break_color',array(
            'section' => 'header_setting',
            'description' => __( 'Menu Color', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            ))); 
 $wp_customize->add_setting('top_menu_color', array(
        'default'        => '#080808',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'top_menu_color', 
    array(
    'label' => __('Menu Link','shopline'),
        'section'    => 'header_setting',
        'settings'   => 'top_menu_color',
    ) ) ); 

    $wp_customize->add_setting('top_menu_hvr_color', array(
        'default'        => '#e7c09c',
        'capability'     => 'edit_theme_options', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'top_menu_hvr_color', 
    array(
    'label' => __('Menu Link Hover/Active','shopline'),
        'section'    => 'header_setting',
        'settings'   => 'top_menu_hvr_color',
    ) ) ); 
    // responsive menu icon button color 
   $wp_customize->add_setting('mob_icon_color', array(
        'default'        => '#575757',
        'capability'     => 'edit_theme_options', 
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'mob_icon_color', 
    array(
    'label' => __('Mobile menu icon','featuredlite'),
        'section'    => 'header_setting',
        'settings'   => 'mob_icon_color',
) ) );   
//break 
$wp_customize->add_setting('icon_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'icon_break_color',array(
            'section' => 'header_setting',
            'description' => __( 'Icon Color', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));
$wp_customize->add_setting('top_icon_color', array(
        'default'        => '#080808',
        'capability'     => 'edit_theme_options', 
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'top_icon_color', 
    array(
    'label' => __('Icon','featuredlite'),
        'section'    => 'header_setting',
        'settings'   => 'top_icon_color',
) ) );  

 $wp_customize->add_section( 'header_image', array(
   'title'          => __( 'Header Image', 'shopline' ),
   'theme_supports' => 'custom-background',
   'priority'       => 8,
   'panel'  => 'header_options',

   ) ); 

/**************************** HERO FRONT SECTION ************************/
/********************************************************************/
$wp_customize->add_section( 'front_page_hero', array(
        'title'          => __('Front Page Hero', 'shopline'),
        'panel' => 'header_options',
        'priority' => 4,
));
$wp_customize->add_setting(
            'front_page_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'front_page_tabs', array(
                    'section' => 'front_page_hero',
                    'tabs'    => array(
                        'woo_cat_setting'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'front_page_doc_link',
                                'shopline_front_page_set',
                                'front_hero_height',
                                'content_hide_hd_hero',
                                'content_hide_sb_hero',
                                'content_hide_btn_hero',
                                'front_page_slide_first_line_break_color',
                                'first_slider_image',
                                'first_slider_heading',
                                'first_slider_desc',
                                'first_slider_link',
                                'first_button_text',
                                'first_button_link',
                                'front_page_slide_second_line_break_color',
                                'second_slider_image',
                                'second_slider_heading',
                                'second_slider_desc',
                                'second_slider_link',
                                'second_button_text',
                                'second_button_link',
                                'front_page_slide_third_line_break_color',
                                'third_slider_image',
                                'third_slider_heading',
                                'third_slider_desc',
                                'third_slider_link',
                                'third_button_text',
                                'third_button_link',
                                'sldr_content_front_align_set',
                                'align_image',
                                'normal_slider_speed',
                                '_content_front_align_set',
                                'front_hero_video',
                                'front_hero_video_poster',
                                'front_hero_video_muted',
                                'front_hero_img',
                                'front_hero_bg_color',
                                'front_garedient_hero',
                                'front_hero_video_heading',
                                'front_hero_video_desc',
                                'front_hero_video_link',
                                'front_hero_video_button_text',
                                'front_hero_video_button_link',
                                'front_extrnl_shrcd',
                                  
                            ),
                        ),
                        'woo_cat_style' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'hero_overlay_set',
                                'normal_slider_bg_overly',
                                'overlay_garedient_hero',
                                'sldr_heading_clr',
                                'sldr_subheading_clr',
                                'slider_bg_clr',
                                'sldr_btn_txt_clr',
                                'sldr_btn_brd_clr',
                                'slider_bg_hvr_clr',
                                'sldr_btn_hvr_txt_clr',
                                'sldr_btn_hvr_brd_clr' 
                            ),
                        ),
                    ),
                )
            )
  );
}
$wp_customize->add_setting('front_page_doc_link', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'front_page_doc_link',
            array(
        'section'  => 'front_page_hero',
        'priority' => 0,
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check <a target="_blank" href="//themehunk.com/docs/shopline-theme/#front-page">Doc</a> for front page hero.','shopline' )
)));
// Choose  settings
$wp_customize->add_setting( 'shopline_front_page_set',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'slide',
               
              )
         );
$wp_customize->add_control( 'shopline_front_page_set',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Hero Layout', 'shopline'),
        'description'       => esc_html__('Choose background type for front page', 'shopline'),
        'section'     => 'front_page_hero',
        'choices' => array(
        'slide' => esc_html__('Slide Show', 'shopline'),
        'video' => esc_html__('Video', 'shopline'),
        'image' => esc_html__('Image', 'shopline'),
        'color' => esc_html__('Color', 'shopline'),
        'gradient' => esc_html__('Gradient', 'shopline'),
        'external' => esc_html__('External Plugin', 'shopline'),
                    )
                )
            );
// front-hero height
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'front_hero_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => '765',
                
            )
        );
$wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'front_hero_height', array(
                    'label' => esc_html__( 'Set hero section height in px', 'shopline' ),
                    'section' => 'front_page_hero',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
}

// hide-content-option
$wp_customize->add_setting( 'content_hide_hd_hero',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
            )
    );
$wp_customize->add_control( 'content_hide_hd_hero',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide Heading', 'shopline'),
                    'section'     => 'front_page_hero',
     )
);
$wp_customize->add_setting( 'content_hide_sb_hero',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
            )
    );
$wp_customize->add_control( 'content_hide_sb_hero',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide Description', 'shopline'),
                    'section'     => 'front_page_hero',
     )
);
$wp_customize->add_setting( 'content_hide_btn_hero',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
            )
    );
$wp_customize->add_control( 'content_hide_btn_hero',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide Button', 'shopline'),
                    'section'     => 'front_page_hero',
     )
);
// first slider        
$wp_customize->add_setting('front_page_slide_first_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'front_page_slide_first_line_break_color',array(
            'section' => 'front_page_hero',
            'description' => __( 'First Slide', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

// slider-first-setting
$wp_customize->add_setting('first_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
        'label'    => __('Slider Image Upload', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'first_slider_image',
    )));
    $wp_customize->add_setting('first_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('first_slider_heading', array(
        'label'    => __('Slider Heading', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'first_slider_heading',
         'type'       => 'text',
    ));
 
    $wp_customize->add_setting('first_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        

    ));
    $wp_customize->add_control('first_slider_desc', array(
        'label'    => __('Description for slider', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'first_slider_desc',
         'type'       => 'textarea',
    ));
       $wp_customize->add_setting('first_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
        
    ));
    $wp_customize->add_control('first_slider_link', array(
        'label'    => __('Link for slider', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'first_slider_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('first_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('first_button_text', array(
        'label'    => __('Text for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'first_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('first_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
    ));
    $wp_customize->add_control('first_button_link', array(
        'label'    => __('Link for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'first_button_link',
         'type'       => 'text',
    ));
$wp_customize->add_setting('front_page_slide_second_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'front_page_slide_second_line_break_color',array(
            'section' => 'front_page_hero',
            'description' => __( 'Second Slide', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));   
//Second slider image
$wp_customize->add_setting('second_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
        'label'    => __('Slider Image Upload', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'second_slider_image',
    )));
    $wp_customize->add_setting('second_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('second_slider_heading', array(
        'label'    => __('Slider Heading', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'second_slider_heading',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('second_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('second_slider_desc', array(
        'label'    => __('Description for slider', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'second_slider_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('second_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
        
    ));
    $wp_customize->add_control('second_slider_link', array(
        'label'    => __('Link for slider', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'second_slider_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('second_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('second_button_text', array(
        'label'    => __('Text for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'second_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('second_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
    ));
    $wp_customize->add_control('second_button_link', array(
        'label'    => __('Link for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'second_button_link',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('front_page_slide_third_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
    $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'front_page_slide_third_line_break_color',array(
            'section' => 'front_page_hero',
            'description' => __( 'Third Slide', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));
 //Third slider image
$wp_customize->add_setting('third_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_slider_image', array(
        'label'    => __('Slider Image Upload', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'third_slider_image',
    )));
    $wp_customize->add_setting('third_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('third_slider_heading', array(
        'label'    => __('Slider Heading', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'third_slider_heading',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('third_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('third_slider_desc', array(
        'label'    => __('Description for slider', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'third_slider_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('third_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
        
    ));
    $wp_customize->add_control('third_slider_link', array(
        'label'    => __('Link for slider', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'third_slider_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('third_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('third_button_text', array(
        'label'    => __('Text for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'third_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('third_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
    ));
    $wp_customize->add_control('third_button_link', array(
        'label'    => __('Link for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'third_button_link',
         'type'       => 'text',
    ));
// slider-content-alignment-setting      
$wp_customize->add_setting( 'sldr_content_front_align_set',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'txt-center',
               
              )
         );
$wp_customize->add_control( 'sldr_content_front_align_set',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Content Alignment', 'shopline'),
        'section'     => 'front_page_hero',
        'choices' => array(
        'txt-center' => esc_html__('Text To Center', 'shopline'),
        'txt-left' => esc_html__('Text To Left', 'shopline'),
        'txt-right' => esc_html__('Text To Right', 'shopline'),
                    )
                )
            );
// slider-speed
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'normal_slider_speed', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 3000,
                
            )
        );
$wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'normal_slider_speed', array(
                    'label' => esc_html__( 'Slider Speed', 'shopline' ),
                    'description'=> __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'shopline'),
                    'section' => 'front_page_hero',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 100,
                        'max' => 5000,
                        'step' => 100,
                    ),
                )
            )
        );
}
// add-more-slider-pro   
$wp_customize->add_setting('slide_more', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'slide_more',
            array(
        'section'  => 'front_page_hero',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/shopline-pro-multipurpose-shopping-theme/">ShoplinePro</a> for six slide to show','shopline' )
)));

// front-video setting
$wp_customize->add_setting('front_hero_video', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'front_hero_video', array(
        'label'    => __('Video Upload', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video',
    ))); 
$wp_customize->add_setting('front_hero_video_poster', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'front_hero_video_poster', array(
        'label'    => __('Poster Image Upload', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video_poster',
)));
 // muted
$wp_customize->add_setting('front_hero_video_muted', array(
       'default'        => '',
       'capability'     => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'
   ));
$wp_customize->add_control( 'front_hero_video_muted', array(
       'settings' => 'front_hero_video_muted',
       'label'   => __('Mute Audio','shopline'),
       'section' => 'front_page_hero',
       'type'    => 'checkbox',
       'choices'    => array(
       'muted'      => 'Mute Audio',
       ),
)); 
// front-image-setting
$wp_customize->add_setting('front_hero_img', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'front_hero_img', array(
        'label'    => __('Image Upload', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_img',
    )));
// front-color
           $wp_customize->add_setting(
                'front_hero_bg_color',
                array(
                    'default'     => '#7D7D7D',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
            $wp_customize->add_control(
                new Customize_themehunk_Color_Control(
                    $wp_customize,
                    'front_hero_bg_color',
                    array(
                        'label'         => __( 'Background Color', 'shopline' ),
                        'section'       => 'front_page_hero',
                        'settings'      => 'front_hero_bg_color',
                        'show_opacity'  => true, // Optional.
                        'palette'   => $palette
                    )
                )
            );
 // gradient-front-setting
if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'front_garedient_hero', array(
                'default'           => 'gradient-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'front_garedient_hero', array(
                    'label'    => esc_html__( 'Gradient', 'shopline' ),
                    'section'  => 'front_page_hero',
                    'choices'  => array(
                        'gradient-default'   => array(
                            'url' => SHOPLINE_GRADIENT_DFLT_IMAGE,
                        ),
                        'gradient-one' => array(
                            'url' => SHOPLINE_GRADIENT_ONE_IMAGE,
                        ),
                        'gradient-two'  => array(
                            'url' => SHOPLINE_GRADIENT_TWO_IMAGE,
                        ),
                    ),
                )
            )
        );
    }           
// overall-container-setting
$wp_customize->add_setting('front_hero_video_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('front_hero_video_heading', array(
        'label'    => __('Heading', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video_heading',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('front_hero_video_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        
    ));
    $wp_customize->add_control('front_hero_video_desc', array(
        'label'    => __('Description', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('front_hero_video_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
        
    ));
    $wp_customize->add_control('front_hero_video_link', array(
        'label'    => __('Link', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('front_hero_video_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('front_hero_video_button_text', array(
        'label'    => __('Text for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('front_hero_video_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
    ));
    $wp_customize->add_control('front_hero_video_button_link', array(
        'label'    => __('Link for button', 'shopline'),
        'section'  => 'front_page_hero',
        'settings' => 'front_hero_video_button_link',
         'type'       => 'text',
    ));
// external plugin fornt setting
$wp_customize->add_setting('front_extrnl_shrcd', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('front_extrnl_shrcd', array(
            'label'    => __('Plugin Shortcode', 'shopline'),
            'description'    => __('Description', 'shopline'),
            'section'  => 'front_page_hero',
            'settings' => 'front_extrnl_shrcd',
             'type'       => 'textarea',
            ));
 // not-slider-content-alignment-setting      
$wp_customize->add_setting( '_content_front_align_set',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'txt-center',
              )
         );
$wp_customize->add_control( '_content_front_align_set',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Content Alignment', 'shopline'),
        'section'     => 'front_page_hero',
        'choices' => array(
        'txt-center' => esc_html__('Text To Center', 'shopline'),
        'txt-left' => esc_html__('Text To Left', 'shopline'),
        'txt-right' => esc_html__('Text To Right', 'shopline'),
        'txt-media-left' => esc_html__('Text With Media on Left', 'shopline'),
        'txt-media-right' => esc_html__('Text With Media on Right', 'shopline'),
                    )
                )
);

$wp_customize->add_setting('align_image', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
            ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'align_image', array(
                'label'    => __('Image Upload', 'shopline'),
                'section'  => 'front_page_hero',
                'settings' => 'align_image',
)));

// overlay color      
$wp_customize->add_setting( 'hero_overlay_set',
array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'color',
              )
         );
$wp_customize->add_control( 'hero_overlay_set',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Choose Overlay', 'shopline'),
        'section'     => 'front_page_hero',
        'choices' => array(
        'color' => esc_html__('Color', 'shopline'),
        'gradient' => esc_html__('Gradient', 'shopline'),
                    )
                )
            );

// overlay-color
           $wp_customize->add_setting(
                'normal_slider_bg_overly',
                array(
                    'default'     => 'rgba(0, 0, 0, 0)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
            $wp_customize->add_control(
                new Customize_themehunk_Color_Control(
                    $wp_customize,
                    'normal_slider_bg_overly',
                    array(
                        'label'         => __( 'Overlay Color', 'shopline' ),
                        'section'       => 'front_page_hero',
                        'settings'      => 'normal_slider_bg_overly',
                        'show_opacity'  => true, // Optional.
                        'palette'   => $palette
                    )
                )
            );
// overlay-gradient
// gradient-front-setting
if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'overlay_garedient_hero', array(
                'default'           => 'gradient-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'overlay_garedient_hero', array(
                    'label'    => esc_html__( 'Overlay Gradient', 'shopline' ),
                    'section'  => 'front_page_hero',
                    'choices'  => array(
                        'gradient-default'   => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_ONE_IMAGE,
                        ),
                        'gradient-one' => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_TWO_IMAGE,
                        ),
                        'gradient-two'  => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_THREE_IMAGE,
                        ),
                        'gradient-three' => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_FOUR_IMAGE,
                        ),
                        'gradient-four'  => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_FIVE_IMAGE,
                        ),
                        'gradient-five'  => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_SIX_IMAGE,
                        ),
                    ),
                )
            )
        );
    }      

   $wp_customize->add_setting('sldr_heading_clr', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'sldr_heading_clr', array(
            'label'      => __('Heading Color', 'shopline' ),
            'section'    => 'front_page_hero',
            'settings'   => 'sldr_heading_clr',
        ) ) );
   $wp_customize->add_setting('sldr_subheading_clr', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'sldr_subheading_clr', array(
            'label'      => __('Sub Heading Color', 'shopline' ),
            'section'    => 'front_page_hero',
            'settings'   => 'sldr_subheading_clr',
        ) ) );

   // slider-button 
    $wp_customize->add_setting(
                'slider_bg_clr',
                array(
                    'default'     => 'rgba(0, 0, 0, 0)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
            $wp_customize->add_control(
                new Customize_themehunk_Color_Control(
                    $wp_customize,
                    'slider_bg_clr',
                    array(
                        'label'         => __( 'Button Background Color', 'shopline' ),
                        'section'       => 'front_page_hero',
                        'settings'      => 'slider_bg_clr',
                        'show_opacity'  => true, // Optional.
                        'palette'   => $palette
                    )
                )
            );

  $wp_customize->add_setting('sldr_btn_txt_clr', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'sldr_btn_txt_clr', array(
            'label'      => __('Button Text Color', 'shopline' ),
            'section'    => 'front_page_hero',
            'settings'   => 'sldr_btn_txt_clr',
        ) ) );

    $wp_customize->add_setting('sldr_btn_brd_clr', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'sldr_btn_brd_clr', array(
            'label'      => __('Button Border Color', 'shopline' ),
            'section'    => 'front_page_hero',
            'settings'   => 'sldr_btn_brd_clr',
        ) ) );

$wp_customize->add_setting(
                'slider_bg_hvr_clr',
                array(
                    'default'     => '#ffffff',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
            $wp_customize->add_control(
                new Customize_themehunk_Color_Control(
                    $wp_customize,
                    'slider_bg_hvr_clr',
                    array(
                        'label'         => __( 'Button Background Hover Color', 'shopline' ),
                        'section'       => 'front_page_hero',
                        'settings'      => 'slider_bg_hvr_clr',
                        'show_opacity'  => true, // Optional.
                        'palette'   => $palette
                    )
                )
            );

    $wp_customize->add_setting('sldr_btn_hvr_txt_clr', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'sldr_btn_hvr_txt_clr', array(
            'label'      => __('Button Text Hover Color', 'shopline' ),
            'section'    => 'front_page_hero',
            'settings'   => 'sldr_btn_hvr_txt_clr',
        ) ) );

$wp_customize->add_setting('sldr_btn_hvr_brd_clr', array(
            'default'        => '#ffff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'sldr_btn_hvr_brd_clr', array(
            'label'      => __('Button Border Hover Color', 'shopline' ),
            'section'    => 'front_page_hero',
            'settings'   => 'sldr_btn_hvr_brd_clr',
        ) ) );
     
/**************************** HERO INNER SECTION ************************/
/********************************************************************/
$wp_customize->add_section( 'inner_page_hero', array(
        'title'          => __('Inner Page Hero', 'shopline'),
        'panel' => 'header_options',
        'priority' => 4,
));
$wp_customize->add_setting(
            'inner_page_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'inner_page_tabs', array(
                    'section' => 'inner_page_hero',
                    'tabs'    => array(
                        'woo_cat_setting'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'inner_page_doc_link',
                                'shopline_inner_page_set',
                                'inner_hero_height',
                                'title_hide_hero',
                                'inner_hero_speed',
                                'inner_page_slide_first_line_break_color',
                                'inner_slide_image',
                                'inner_page_slide_second_line_break_color',
                                'inner_slide2_image',
                                'inner_page_slide_third_line_break_color',
                                'inner_slide3_image',
                                'inner_hero_video',
                                'inner_hero_video_poster',
                                'inner_hero_video_muted',
                                'inner_hero_image',
                                'inner_hero_color',
                            ),
                        ),
                        'woo_cat_style' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'inner_hero_overlay_set',
                                'inner_bg_overly',
                                'overlay_garedient_hero_inner',
                                'inner_hero_title_color'
                                
                            ),
                        ),
                    ),
                )
            )
       );
}
$wp_customize->add_setting('inner_page_doc_link', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'inner_page_doc_link',
            array(
        'section'  => 'inner_page_hero',
         'priority' => 0,
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check <a target="_blank" href="//themehunk.com/docs/shopline-theme/#inner-page"> Doc </a> for Inner page hero.','shopline' )
))); 
// Choose settings
$wp_customize->add_setting( 'shopline_inner_page_set',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'image',
               
              )
         );
$wp_customize->add_control( 'shopline_inner_page_set',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Hero Layout', 'shopline'),
        'description'       => esc_html__('Choose background type for Inner pages', 'shopline'),
        'section'     => 'inner_page_hero',
        'choices' => array(
        'image' => esc_html__('Image', 'shopline'),
        'slide' => esc_html__('Slide Show', 'shopline'),
        'video' => esc_html__('Video', 'shopline'),
        'color' => esc_html__('Color', 'shopline'),
        'no-header' => esc_html__('No Header', 'shopline'),
                    )
                )
            );
// inner-hero height
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'inner_hero_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => '420',
                
            )
        );
$wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'inner_hero_height', array(
                    'label' => esc_html__( 'Set hero section height in px', 'shopline'),
                    'section' => 'inner_page_hero',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
}
// hide-content-option
$wp_customize->add_setting( 'title_hide_hero',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
            )
    );
$wp_customize->add_control( 'title_hide_hero',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide Title', 'shopline'),
                    'section'     => 'inner_page_hero',
     )
);
// slide-show
// first    
// iinner slider speed
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'inner_hero_speed', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => '5000',
                
            )
        );
$wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'inner_hero_speed', array(
                    'label' => esc_html__( 'Speed', 'shopline' ),
                    'section' => 'inner_page_hero',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1000,
                        'max' => 10000,
                        'step' => 100,
                    ),
                )
            )
        );
}  
$wp_customize->add_setting('inner_page_slide_first_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'inner_page_slide_first_line_break_color',array(
            'section' => 'inner_page_hero',
            'description' => __( 'First Slide', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
        )));
$wp_customize->add_setting('inner_slide_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'inner_slide_image', array(
        'label'    => __('Upload Background Image', 'shopline'),
        'section'  => 'inner_page_hero',
        'settings' => 'inner_slide_image',
       )));
// second      
$wp_customize->add_setting('inner_page_slide_second_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'inner_page_slide_second_line_break_color',array(
            'section' => 'inner_page_hero',
            'description' => __( 'Second Slide', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
        )));
$wp_customize->add_setting('inner_slide2_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'inner_slide2_image', array(
        'label'    => __('Upload Background Image', 'shopline'),
        'section'  => 'inner_page_hero',
        'settings' => 'inner_slide2_image',
       )));
// three      
$wp_customize->add_setting('inner_page_slide_third_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'inner_page_slide_third_line_break_color',array(
            'section' => 'inner_page_hero',
            'description' => __( 'Third Slide', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
        )));
$wp_customize->add_setting('inner_slide3_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'inner_slide3_image', array(
        'label'    => __('Upload Background Image', 'shopline'),
        'section'  => 'inner_page_hero',
        'settings' => 'inner_slide3_image',
       )));

// inner-video
// inner-video setting
$wp_customize->add_setting('inner_hero_video', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'inner_hero_video', array(
        'label'    => __('Video Upload', 'shopline'),
        'section'  => 'inner_page_hero',
        'settings' => 'inner_hero_video',
    ))); 
$wp_customize->add_setting('inner_hero_video_poster', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'inner_hero_video_poster', array(
        'label'    => __('Poster Image Upload', 'shopline'),
        'section'  => 'inner_page_hero',
        'settings' => 'inner_hero_video_poster',
)));
 // muted
$wp_customize->add_setting('inner_hero_video_muted', array(
       'default'        => '',
       'capability'     => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'
   ));
$wp_customize->add_control( 'inner_hero_video_muted', array(
       'settings' => 'inner_hero_video_muted',
       'label'   => __('Mute Audio','shopline'),
       'section' => 'inner_page_hero',
       'type'    => 'checkbox',
       'choices'    => array(
       'muted'      => 'Mute Audio',
       ),
)); 
// image
if ( class_exists( 'Themehunk_Display_Text' ) ) { 
$wp_customize->add_setting(
            'inner_hero_image', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
 $wp_customize->add_control(
            new Themehunk_Display_Text(
                $wp_customize, 'inner_hero_image', array(
                    'priority'     => 25,
                    'section'      => 'inner_page_hero',
                    'button_text'  => esc_html__( 'Header Image', 'shopline' ),
                    'button_class' => 'focus-customizer-header-image',
                   
                )
            )
        );
} 
// color
$wp_customize->add_setting(
        'inner_hero_color',
        array(
            'default'     => '#7D7D7D',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
            )       
 );
$wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'inner_hero_color',
            array(
                'label'         => __( 'Color', 'shopline' ),
                'section'       => 'inner_page_hero',
                'settings'      => 'inner_hero_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));
// inner color setting
// overlay color      
$wp_customize->add_setting( 'inner_hero_overlay_set',
array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'color',
              )
         );
$wp_customize->add_control( 'inner_hero_overlay_set',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Choose Overlay', 'shopline'),
        'section'     => 'inner_page_hero',
        'choices' => array(
        'color' => esc_html__('Color', 'shopline'),
        'gradient' => esc_html__('Gradient', 'shopline'),
                    )
                )
            );

// overlay-color
           $wp_customize->add_setting(
                'inner_bg_overly',
                array(
                    'default'     => 'rgba(8, 8, 8, 0.3)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
            $wp_customize->add_control(
                new Customize_themehunk_Color_Control(
                    $wp_customize,
                    'inner_bg_overly',
                    array(
                        'label'         => __( 'Overlay Color', 'shopline' ),
                        'section'       => 'inner_page_hero',
                        'settings'      => 'inner_bg_overly',
                        'show_opacity'  => true, // Optional.
                        'palette'   => $palette
                    )
                )
            );
// overlay-gradient
// gradient-front-setting
if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'overlay_garedient_hero_inner', array(
                'default'           => 'gradient-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'overlay_garedient_hero_inner', array(
                    'label'    => esc_html__( 'Overlay Gradient', 'shopline' ),
                    'section'  => 'inner_page_hero',
                    'choices'  => array(
                        'gradient-default'   => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_ONE_IMAGE,
                        ),
                        'gradient-one' => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_TWO_IMAGE,
                        ),
                        'gradient-two'  => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_THREE_IMAGE,
                        ),
                        'gradient-three' => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_FOUR_IMAGE,
                        ),
                        'gradient-four'  => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_FIVE_IMAGE,
                        ),
                        'gradient-five'  => array(
                            'url' => SHOPLINE_GRADIENT_OVLY_SIX_IMAGE,
                        ),
                    ),
                )
            )
        );
    } 
      
 
/*
/****************************************************************/
/************FRONT SECTION ************/
/****************************************************************/

$wp_customize->add_panel( 'front_page_section', array(
        'priority'       => 6,
        'title'          => __('Frontpage Section', 'shopline'),
    ) );
//===============================
//= section ordering Settings =
//=============================
  $wp_customize->add_section('section_order', array(
        'title'    => __('Section ordering', 'shopline'),
        'priority' => 60,
        'panel'    =>'front_page_section',
        
    )); 
// section ordering
    $wp_customize->add_setting('section_sorting', array(
        'default'        =>array('section_slider','section_woocate','section_ribbon','section_services','section_wooproduct','section_wooproduct1','section_testimonial','section_aboutus','section_blog','section_adsecond'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_checkbox_explode'
    ));
    $wp_customize->add_control(new Themehunk_Customize_Sort_List(
         $wp_customize,'section_sorting', array(
        'settings' => 'section_sorting',
        'label'   => __( 'Section Order', 'shopline' ),
        'section' => 'section_order',
        'choices' => array(
            'section_slider'      => __( '1 Slider Section',  'shopline'),
            'section_woocate'     => __( '2 Woocommerce Category Slider Section','shopline'),
            'section_ribbon'      => __( '3 Ribbon Section',     'shopline'),
            'section_services'    => __( '4 Service Section',     'shopline'),
            'section_wooproduct'  => __( '5 Woocommerce Product Section',  'shopline'),
            'section_wooproduct1' => __( '6 Woocommerce Product slider Section',  'shopline'),
            'section_testimonial' => __( '7 Testimonial Section','shopline' ),
            'section_aboutus'     => __( '8 About Us Section','shopline' ),
            'section_blog'        => __( '9 Latest Blog Section','shopline'),
            'section_adsecond'    => __( '10 Three column Ad Section','shopline'),
            ) ) ) );
/****************************************************************/
/************           WOO CATEGORY SLIDER         ************/
/****************************************************************/  
$wp_customize->add_section('woo_cate_slider_setting', array(
        'title'    => __('Category Slider (WooCommerce)', 'shopline'),
        'priority' => 1,
        'panel'    =>'front_page_section'
 ));
$wp_customize->add_setting(
            'woo_cate_slider_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'woo_cate_slider_tabs', array(
                    'section' => 'woo_cate_slider_setting',
                    'tabs'    => array(
                        'woo_cat_setting'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'cat_doc',
                                'woo_cate_section_hide',
                                'woo_cate_heading_hide',
                                'woo_cate_subheading_hide',
                                'woo_cate_slider_heading',
                                'woo_cate_slider_subheading',
                                'woo_cate_slider_list',
                                'cat_play',
                                'woo_cate_slider_speed',
                                'woo_cate_slider_speed_desc',
                                
                                
                            ),
                        ),
                        'woo_cat_style' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'woo_cate_image_bg',
                                'woo_cat_svg_style',
                                'woo_cate_slider_bg_image',
                                'woo_cate_slider_overly',
                                'woo_cate_heading_color',
                                'woo_cate_subheading_color',
                                'woo_cate_line_color',
                                'woocat_section_padding',
                                'woocat_top_padding',
                                'woocat_bottom_padding',
                            ),
                        ),
                    ),
                )
            )
  );
}
$wp_customize->add_setting('cat_doc', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'cat_doc',
            array(
        'section'  => 'woo_cate_slider_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Please check this <a target="_blank" href="//themehunk.com/docs/shopline-theme/#create-category"> doc </a> to create a category','shopline' )
    )));  
$wp_customize->add_setting( 'woo_cate_section_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_cate_section_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'woo_cate_slider_setting',
                )
);

$wp_customize->add_setting( 'woo_cate_heading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_cate_heading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Heading', 'shopline'),
                    'section'     => 'woo_cate_slider_setting',
                )
);
$wp_customize->add_setting( 'woo_cate_subheading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_cate_subheading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Sub Heading', 'shopline'),
                    'section'     => 'woo_cate_slider_setting',
                )
);

$wp_customize->add_setting('woo_cate_slider_heading', array(
        'default'           => '',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
   $wp_customize->add_control('woo_cate_slider_heading', array(
        'label'    => __('Heading', 'shopline'),
        'section'  => 'woo_cate_slider_setting',
        'settings' => 'woo_cate_slider_heading',
         'type'       => 'text',
    )); 
    $wp_customize->add_setting('woo_cate_slider_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'

    ));
    $wp_customize->add_control('woo_cate_slider_subheading', array(
        'label'    => __('Sub Heading', 'shopline'),
        'section'  => 'woo_cate_slider_setting',
        'settings' => 'woo_cate_slider_subheading',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('woo_cate_slider_list', array(
        'default'        => array(0),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_checkbox_explode',
    ));
    $wp_customize->add_control(new themehunk_Customize_Control_Checkbox_Multiple(
            $wp_customize,'woo_cate_slider_list', array(
        'settings' => 'woo_cate_slider_list',
        'label'   => __('Product Category','shopline'),
        'description' => __('Choose categories which you want to display. By default all categories will display. ','shopline'),
        'section' => 'woo_cate_slider_setting',
        'choices' => shopline_get_category_list(array('taxonomy' =>'product_cat'),false),
    )));
// autoplay on/off
    $wp_customize->add_setting('cat_play', array(
            'default'        =>'on',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    $wp_customize->add_control('cat_play', array(
            'settings' => 'cat_play',
            'label'   => __('Slider Autoplay','shopline'),
            'section' => 'woo_cate_slider_setting',
            'type'    => 'radio',
            'choices'    => array(
                'on'        => 'On',
                'off'      => 'Off',
            ),
        ));
  $wp_customize->add_setting('woo_cate_slider_speed_desc', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'woo_cate_slider_speed_desc',
            array(
        'section'  => 'woo_cate_slider_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post( '(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )','shopline' )
    ))); 
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'woo_cate_slider_speed', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 3000,
                
            )
        );
$wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woo_cate_slider_speed', array(
                    'label' => esc_html__( 'Slider Speed', 'shopline' ),
                    'description'=> __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'shopline'),
                    'section' => 'woo_cate_slider_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 100,
                        'max' => 5000,
                        'step' => 100,
                    ),
                )
            )
        );
}


    //= Choose Post Meta  =
    $wp_customize->add_setting('woo_cate_image_bg', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
    $wp_customize->add_control( 'woo_cate_image_bg', array(
            'settings' => 'woo_cate_image_bg',
            'label'   => __('Choose Background','shopline'),
            'section' => 'woo_cate_slider_setting',
            'type'    => 'radio',
            'choices'    => array(
                'color'        => 'Color',
                'svg'          => 'Color With SVG',
                'image'        => 'Image',
            ),
        ));
if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'woo_cat_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'woo_cat_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'woo_cate_slider_setting',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    }   
    $wp_customize->add_setting('woo_cate_slider_bg_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'woo_cate_slider_bg_image', array(
        'label'    => __('Upload Background Image', 'shopline'),
        'section'  => 'woo_cate_slider_setting',
        'settings' => 'woo_cate_slider_bg_image',
    )));

// overlay-color
    $wp_customize->add_setting(
        'woo_cate_slider_overly',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
            )       
    );
    $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'woo_cate_slider_overly',
            array(
                'label'         => __( 'Background Color ', 'shopline' ),
                'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                'section'       => 'woo_cate_slider_setting',
                'settings'      => 'woo_cate_slider_overly',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));

    $wp_customize->add_setting('woo_cate_heading_color', array(
        'default'        => '#080808',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'woo_cate_heading_color', array(
        'label'      => __('Heading Color','shopline' ),
        'section'    => 'woo_cate_slider_setting',
        'settings'   => 'woo_cate_heading_color',
    ) ) );
    $wp_customize->add_setting('woo_cate_subheading_color', array(
        'default'        => '#666666',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'woo_cate_subheading_color', array(
        'label'      => __('Sub Heading Color','shopline' ),
        'section'    => 'woo_cate_slider_setting',
        'settings'   => 'woo_cate_subheading_color',
    ) ) );
    $wp_customize->add_setting('woo_cate_line_color', array(
        'default'        => '#e7c09c',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'woo_cate_line_color', array(
        'label'      => __('Title Underline Color','shopline' ),
        'section'    => 'woo_cate_slider_setting',
        'settings'   => 'woo_cate_line_color',
    ) ) );
    // top-bottom padding ribbon
    $wp_customize->add_setting('woocat_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'woocat_section_padding',
            array(
        'section'  => 'woo_cate_slider_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));
   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'woocat_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woocat_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'woo_cate_slider_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'woocat_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woocat_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'woo_cate_slider_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }
// end woo_cat section
/****************************************************************/
/************  RIBBON SECTION  ************/
/****************************************************************/   
$wp_customize->add_section('ribbon_panel', array(
        'title'    => __('Ribbon', 'shopline'),
        'priority' => 2,
        'panel'    =>'front_page_section'
 )); 
$wp_customize->add_setting(
            'ribbon_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'ribbon_tabs', array(
                    'section' => 'ribbon_panel',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'ribbon_section_hide',
                                'ribbon_heading_hide',
                                'ribbon_subheading_hide',
                                'ribbon_heading',
                                'ribbon_subheading',
   
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'ribbon_bg_options',
                                'ribbon_svg_style',
                                'ribbon_bg_image',
                                'ribbon_bg_video',
                                'ribbon_video_bg_image',
                                'video_muted',
                                'ribbn_img_overly_color',
                                'ribbon_heading_color',
                                'ribbon_subheading_color',
                                'ribbon_line_color',
                                'ribbon_section_padding',
                                'ribbon_top_padding',
                                'ribbon_bottom_padding',
                            ),
                        ),
                    ),
                )
            )
  );
}
$wp_customize->add_setting( 'ribbon_section_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'ribbon_section_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'ribbon_panel',
                )
);
$wp_customize->add_setting( 'ribbon_heading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'ribbon_heading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Heading', 'shopline'),
                    'section'     => 'ribbon_panel',
                )
);

$wp_customize->add_setting( 'ribbon_subheading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'ribbon_subheading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Sub Heading', 'shopline'),
                    'section'     => 'ribbon_panel',
                )
);
$wp_customize->add_setting('ribbon_heading', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('ribbon_heading', array(
        'label'    => __('Heading', 'shopline'),
        'section'  => 'ribbon_panel',
        'settings' => 'ribbon_heading',
        'type'       => 'text',
    ));
$wp_customize->add_setting('ribbon_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        ));
        $wp_customize->add_control('ribbon_subheading', array(
            'label'    => __('Sub Heading', 'shopline'),
            'section'  => 'ribbon_panel',
            'settings' => 'ribbon_subheading',
             'type'       => 'textarea',
        ));

// Color
   //background option
    $wp_customize->add_setting('ribbon_bg_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
    $wp_customize->add_control('ribbon_bg_options', array(
            'settings' => 'ribbon_bg_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'ribbon_panel',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
                'image'      => 'Image',
                'video'      => 'Video'
            ),
        ));

if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ){
        $wp_customize->add_setting(
            'ribbon_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'ribbon_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'ribbon_panel',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    } 
    $wp_customize->add_setting('ribbon_bg_image', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'ribbon_bg_image', array(
        'label'    => __('Upload Background Image', 'shopline'),
        'section'  => 'ribbon_panel',
        'settings' => 'ribbon_bg_image',
    )));
    $wp_customize->add_setting('ribbon_bg_video', array(
       'default'        => '',
       'sanitize_callback' => 'sanitize_text_field'
   ));
   $wp_customize->add_control( new WP_Customize_Upload_Control(
       $wp_customize, 'ribbon_bg_video', array(
       'label'    => __('Upload Background Video', 'shopline'),
       'section'  => 'ribbon_panel',
       'settings' => 'ribbon_bg_video',
   )));
   $wp_customize->add_setting('ribbon_video_bg_image', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'ribbon_video_bg_image', array(
        'label'    => __('Upload Background Image', 'shopline'),
        'description' => __('Display Mobile view BG Image','shopline'),
        'section'  => 'ribbon_panel',
        'settings' => 'ribbon_video_bg_image',
    )));
   // muted
   $wp_customize->add_setting('video_muted', array(
       'default'        => '',
       'capability'     => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'
   ));
   $wp_customize->add_control( 'video_muted', array(
       'settings' => 'video_muted',
       'label'   => __('Mute Audio','shopline'),
       'section' => 'ribbon_panel',
       'type'    => 'checkbox',
       'choices'    => array(
       'muted'      => 'Video Mute Audio',
       ),
   ));
 // overlay-color
    $wp_customize->add_setting(
        'ribbn_img_overly_color',
        array(
            'default'     => '#7D7D7D',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
            )       
    );
    $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'ribbn_img_overly_color',
            array(
                'label'         => __( 'Background Color', 'shopline' ),
                'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                'section'       => 'ribbon_panel',
                'settings'      => 'ribbn_img_overly_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));

    $wp_customize->add_setting('ribbon_heading_color', array(
        'default'        => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'ribbon_heading_color', array(
        'label'      => __('Heading Color', 'shopline' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_heading_color',
    ) ) );
    $wp_customize->add_setting('ribbon_subheading_color', array(
        'default'        => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'ribbon_subheading_color', array(
        'label'      => __('Sub Heading Color', 'shopline' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_subheading_color',
    ) ) );
    $wp_customize->add_setting('ribbon_line_color', array(
        'default'        => '#e7c09c',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'ribbon_line_color', array(
        'label'      => __('Title Underline Color', 'shopline' ),
        'section'    => 'ribbon_panel',
        'settings'   => 'ribbon_line_color',
    ) ) );

// top-bottom padding ribbon
    $wp_customize->add_setting('ribbon_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'ribbon_section_padding',
            array(
        'section'  => 'ribbon_panel',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'ribbon_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'ribbon_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'ribbon_panel',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'ribbon_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'ribbon_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'ribbon_panel',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }
// end ribbon

/****************************************************************/
/************           WOO PRODUCT         ************/
/****************************************************************/       
$wp_customize->add_section('woo_cate_product_filter', array(
        'title'    => __('Product (WooCommerce)', 'shopline'),
        'priority' => 3,
        'panel'    => 'front_page_section' 
    ));
$wp_customize->add_setting(
            'woo_cate_product_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'woo_cate_product_tabs', array(
                    'section' => 'woo_cate_product_filter',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'woo_cate_product_hide',
                                'woo_cate_product_heading',
                                'woo_cate_product_heading_hide',
                                'woo_cate_product_filter_type',
                                'woo_cate_product_layout',
                                'woo_cate_product_count',
                                'woo_cate_product_list',
                                'section_order',
   
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'woo_cate_product_options',
                                'woo_prd_svg_style',
                                'woo_cate_product_bg_image',
                                'woo_cate_product_overly',
                                'woo_cate_product_heading_color',
                                'woo_cate_product_line_color',
                                'ribbn_img_overly_color',
                                'ribbon_heading_color',
                                'ribbon_subheading_color',
                                'woo_cate_product_cate_text_hover_color',
                                'woo_cate_product_border_color',
                                'woo_cate_product_line_break_color',
                                'woo_cate_product_text_color',
                                'woo_cate_product_price_color',
                                'woo_cate_product_cart_btn_color',
                                'woo_cate_product_cart_text_color',
                                'woo_cate_product_sale_btn_color',
                                'woo_cate_product_sale_text_color',
                                'woo_cate_product_section_padding',
                                'woo_cate_product_top_padding',
                                'woo_cate_product_bottom_padding',

                            ),
                        ),
                    ),
                )
            )
  );
}  
$wp_customize->add_setting( 'woo_cate_product_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_cate_product_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'woo_cate_product_filter',
                )
);

$wp_customize->add_setting( 'woo_cate_product_heading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_cate_product_heading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Heading', 'shopline'),
                    'section'     => 'woo_cate_product_filter',
                )
);



 $wp_customize->add_setting('woo_cate_product_heading', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
       $wp_customize->add_control('woo_cate_product_heading', array(
            'label'    => __('Main Heading', 'shopline'),
            'section'  => 'woo_cate_product_filter',
            'settings' => 'woo_cate_product_heading',
             'type'       => 'text',
        ));
    $wp_customize->add_setting('woo_cate_product_filter_type', array(
        'default'        =>'cate',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( 'woo_cate_product_filter_type', array(
        'settings' => 'woo_cate_product_filter_type',
        'label'   => __('Product Type','shopline'),
        'section' => 'woo_cate_product_filter',
        'type'    => 'radio',
        'choices'           => array(
            'cate'          => 'Category Product',
            'recent'        => 'Recent Product',
        ),
    ));
     $wp_customize->add_setting('woo_cate_product_layout', array(
        'default'        =>'grid',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'woo_cate_product_layout', array(
        'settings' => 'woo_cate_product_layout',
        'label'    => __('Product Layout','shopline'),
        'section'  => 'woo_cate_product_filter',
        'type'     => 'radio',
        'choices'           => array(
            'grid'          => 'Grid Layout',
        ),
    ));
     $wp_customize->add_setting('woo_cate_product_count', array(
        'default'           => 8,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('woo_cate_product_count', array(
        'settings'  => 'woo_cate_product_count',
        'label'     => __('Number of Product','shopline'),
        'section'   => 'woo_cate_product_filter',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 100) ));
     $wp_customize->add_setting('woo_cate_product_list', array(
        'default'        => array(0),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_checkbox_explode',
    ));
    $wp_customize->add_control(new themehunk_Customize_Control_Checkbox_Multiple(
            $wp_customize,'woo_cate_product_list', array(
        'settings' => 'woo_cate_product_list',
        'label'   => __('Product Category','shopline'),
        'description' => __('Choose Category Display Product. (By Default All Categories Product Will Display)','shopline'),
        'section' => 'woo_cate_product_filter',
        'choices' => shopline_get_category_list(array('taxonomy' =>'product_cat'),false),
    )));
$wp_customize->add_setting('section_order', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'section_order',
            array(
        'section'  => 'woo_cate_product_filter',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/shopline-pro-multipurpose-shopping-theme/">ShoplinePro</a> for advance <strong>Product layout</strong>!','shopline' )
    )));            
    //color
       
        $wp_customize->add_setting('woo_cate_product_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_control( 'woo_cate_product_options', array(
            'settings' => 'woo_cate_product_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'woo_cate_product_filter',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
                'image'      => 'Image',
            ),
        ));

        if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'woo_prd_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'woo_prd_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'woo_cate_product_filter',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    }   
        $wp_customize->add_setting('woo_cate_product_bg_image', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize, 'woo_cate_product_bg_image', array(
            'label'    => __('Upload Background Image', 'shopline'),
            'section'  => 'woo_cate_product_filter',
            'settings' => 'woo_cate_product_bg_image',
        )));
        
// overlay-color
    $wp_customize->add_setting(
        'woo_cate_product_overly',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
            )       
    );
    $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'woo_cate_product_overly',
            array(
                'label'         => __( 'Background Color', 'shopline' ),
                'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                'section'       => 'woo_cate_product_filter',
                'settings'      => 'woo_cate_product_overly',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )
        )
    );

        $wp_customize->add_setting('woo_cate_product_heading_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_heading_color', array(
            'label'      => __('Heading Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_heading_color',
        ) ) );
        $wp_customize->add_setting('woo_cate_product_line_color', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_line_color', array(
            'label'      => __('Title Underline Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_line_color',
        ) ) );

        

        $wp_customize->add_setting('woo_cate_product_cate_text_hover_color', array(
            'default'        => '#7c7c80',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_cate_text_hover_color', array(
            'label'      => __('Category Text Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_cate_text_hover_color',
        ) ) );
        $wp_customize->add_setting('woo_cate_product_border_color', array(
            'default'           => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_border_color', array(
            'label'      => __('Category Border & hover Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_border_color',
        ) ) );
         $wp_customize->add_setting('woo_cate_product_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'woo_cate_product_line_break_color',array(
            'section' => 'woo_cate_product_filter',
            'description' => __( 'Product Color Option', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

        $wp_customize->add_setting('woo_cate_product_text_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_text_color', array(
            'label'      => __('Title color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_text_color',
        ) ) );

        $wp_customize->add_setting('woo_cate_product_price_color', array(
            'default'        => '#1e1e23',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_price_color', array(
            'label'      => __('Pricing Text Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_price_color',
        ) ) );

        $wp_customize->add_setting('woo_cate_product_cart_btn_color', array(
            'default'        => '#232531',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_cart_btn_color', array(
            'label'      => __('Icon Background Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_cart_btn_color',
        ) ) );

        $wp_customize->add_setting('woo_cate_product_cart_text_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_cart_text_color', array(
            'label'      => __('Icon Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_cart_text_color',
        ) ) );

        $wp_customize->add_setting('woo_cate_product_sale_btn_color', array(
            'default'        => '#232531',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_sale_btn_color', array(
            'label'      => __('Sale Tag background', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_sale_btn_color',
        ) ) );

        $wp_customize->add_setting('woo_cate_product_sale_text_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_cate_product_sale_text_color', array(
            'label'      => __('Sale Tag Text Color', 'shopline' ),
            'section'    => 'woo_cate_product_filter',
            'settings'   => 'woo_cate_product_sale_text_color',
        ) ) );
        // top-bottom padding slide-product
    $wp_customize->add_setting('woo_cate_product_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'woo_cate_product_section_padding',
            array(
        'section'  => 'woo_cate_product_filter',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));
   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'woo_cate_product_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

      $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woo_cate_product_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'woo_cate_product_filter',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'woo_cate_product_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woo_cate_product_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'woo_cate_product_filter',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }      
/****************************************************************/
/************           WOO SLIDER PRODUCT         ************/
/****************************************************************/       
$wp_customize->add_section('woo_slide_product', array(
        'title'    => __('Product Slider(WooCommerce)', 'shopline'),
        'priority' => 3,
        'panel'    => 'front_page_section' 
    ));
$wp_customize->add_setting(
            'woo_slide_product_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'woo_slide_product_tabs', array(
                    'section' => 'woo_slide_product',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'woo_slide_product_hide',
                                'woo_slide_product_heading_hide',
                                'woo_slide_product_subheading_hide',
                                '_woo_slide_heading',
                                '_woo_slide_subheading',
                                'slide_woo_product',
                                'slide_woo_category',
                                'woo_slide_product_count',
                                'slide_product_play',
                                'product_slider_speed',

                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'product_slider_options',
                                'woo_slide_svg_style',
                                'product_slider_bg_image',
                                'product_slider_img_overly_color',
                                'product_slider_heading_color',
                                'product_slider_sbheading_color',
                                'product_slider_line_color',
                                'woo_slide_product_line_break_color',
                                'woo_slide_product_text_color',
                                'woo_slide_product_price_color',
                                'woo_slide_product_cart_btn_color',
                                'woo_slide_product_cart_text_color',
                                'woo_slide_product_sale_btn_color',
                                'woo_slide_product_sale_text_color',
                                'woo_slide_section_padding',
                                'woo_slide_top_padding',
                                'woo_slide_bottom_padding',
                            ),
                        ),
                    ),
                )
            )
  );
}  
$wp_customize->add_setting( 'woo_slide_product_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_slide_product_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'woo_slide_product',
                )
);

$wp_customize->add_setting( 'woo_slide_product_heading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_slide_product_heading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Heading', 'shopline'),
                    'section'     => 'woo_slide_product',
                )
);

$wp_customize->add_setting( 'woo_slide_product_subheading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'woo_slide_product_subheading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Sub Heading', 'shopline'),
                    'section'     => 'woo_slide_product',
                )
);
 $wp_customize->add_setting('_woo_slide_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control('_woo_slide_heading', array(
        'label'    => __('Heading', 'shopline'),
        'section'  => 'woo_slide_product',
        'settings' => '_woo_slide_heading',
         'type'       => 'text',
    )); 
$wp_customize->add_setting('_woo_slide_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'

    ));
$wp_customize->add_control('_woo_slide_subheading', array(
        'label'    => __('Sub Heading', 'shopline'),
        'section'  => 'woo_slide_product',
        'settings' => '_woo_slide_subheading',
        'type'       => 'textarea',
));  

// Select featured/random/recent      
$wp_customize->add_setting( 'slide_woo_product',
array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'featured',
              )
         );
$wp_customize->add_control( 'slide_woo_product',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Choose Product Type', 'shopline'),
        'section'     => 'woo_slide_product',
        'choices'     => array(
        'recent'      => esc_html__('Recent', 'shopline'),
        'featured'    => esc_html__('Featured', 'shopline'),
        'random'      => esc_html__('Random', 'shopline'),
        'sale'      => esc_html__('Sale', 'shopline'),
                    )
                )
            );
$wp_customize->add_setting('slide_woo_category', array(
'default' => 'all',
'sanitize_callback' => 'sanitize_text_field',
) );
//control setting for select options
$wp_customize->add_control( 'slide_woo_category', array(
'label'   => __('Product Category','shopline'),
'description' => __('Choose Category to Display Product. (By Default All Categories Product Will Display)','shopline'),
'section' => 'woo_slide_product',
'type' => 'select',
'choices' => shopline_get_categories_select(),
) );
$wp_customize->add_setting('woo_slide_product_count', array(
        'default'           => 8,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('woo_slide_product_count', array(
        'settings'  => 'woo_slide_product_count',
        'label'     => __('Number of Product','shopline'),
        'section'   => 'woo_slide_product',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 100) ));
//autoplay on/off
    $wp_customize->add_setting('slide_product_play', array(
            'default'        =>'on',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    $wp_customize->add_control('slide_product_play', array(
            'settings' => 'slide_product_play',
            'label'   => __('Autoplay','shopline'),
            'section' => 'woo_slide_product',
            'type'    => 'radio',
            'choices'    => array(
                'on'        => 'On',
                'off'      => 'Off',
     ),
));
// slider-speed
if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'product_slider_speed', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 3000,
                
            )
        );
$wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'product_slider_speed', array(
                    'label' => esc_html__( 'Slider Speed', 'shopline' ),
                    'description'=> __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'shopline'),
                    'section' => 'woo_slide_product',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 100,
                        'max' => 5000,
                        'step' => 100,
                    ),
                )
            )
        );
}

$wp_customize->add_setting('product_slider_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
$wp_customize->add_control( 'product_slider_options', array(
            'settings' => 'product_slider_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'woo_slide_product',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
                'image'      => 'Image',
            ),
        ));
if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ){
        $wp_customize->add_setting(
            'woo_slide_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'woo_slide_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'woo_slide_product',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    }   
         $wp_customize->add_setting('product_slider_bg_image', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize, 'product_slider_bg_image', array(
            'label'    => __('Upload Background Image', 'shopline'),
            'section'  => 'woo_slide_product',
            'settings' => 'product_slider_bg_image',
        )));
        
        // overlay-color
            $wp_customize->add_setting(
                'product_slider_img_overly_color',
                array(
                    'default'     => '#fff',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'product_slider_img_overly_color',
            array(
                'label'         => __( 'Background Color', 'shopline' ),
                'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                'section'       => 'woo_slide_product',
                'settings'      => 'product_slider_img_overly_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));

        $wp_customize->add_setting('product_slider_heading_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'product_slider_heading_color', array(
            'label'      => __('Heading Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'product_slider_heading_color',
        ) ) );
        $wp_customize->add_setting('product_slider_sbheading_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'product_slider_sbheading_color', array(
            'label'      => __('Sub Heading Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'product_slider_sbheading_color',
        ) ) );
        $wp_customize->add_setting('product_slider_line_color', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'product_slider_line_color', array(
            'label'      => __('Title Underline Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'product_slider_line_color',
        ) ) );

        // product-color
        $wp_customize->add_setting('woo_slide_product_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'woo_slide_product_line_break_color',array(
            'section' => 'woo_slide_product',
            'description' => __( 'Product Color Option', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

        $wp_customize->add_setting('woo_slide_product_text_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_slide_product_text_color', array(
            'label'      => __('Text Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'woo_slide_product_text_color',
        ) ) );
       

        $wp_customize->add_setting('woo_slide_product_price_color', array(
            'default'           => '#1e1e23',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_slide_product_price_color', array(
            'label'      => __('Pricing Text Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'woo_slide_product_price_color',
        ) ) );

        $wp_customize->add_setting('woo_slide_product_cart_btn_color', array(
            'default'        => '#232531',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_slide_product_cart_btn_color', array(
            'label'      => __('Icon Background Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'woo_slide_product_cart_btn_color',
        ) ) );

        $wp_customize->add_setting('woo_slide_product_cart_text_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_slide_product_cart_text_color', array(
            'label'      => __('Icon Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'woo_slide_product_cart_text_color',
        ) ) );

        $wp_customize->add_setting('woo_slide_product_sale_btn_color', array(
            'default'        => '#232531',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_slide_product_sale_btn_color', array(
            'label'      => __('Sale Tag Background', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'woo_slide_product_sale_btn_color',
        ) ) );

        $wp_customize->add_setting('woo_slide_product_sale_text_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_slide_product_sale_text_color', array(
            'label'      => __('Sale Tag Text Color', 'shopline' ),
            'section'    => 'woo_slide_product',
            'settings'   => 'woo_slide_product_sale_text_color',
        ) ) );


    // top-bottom padding slide-product
    $wp_customize->add_setting('woo_slide_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'woo_slide_section_padding',
            array(
        'section'  => 'woo_slide_product',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));
   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'woo_slide_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

      $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woo_slide_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'woo_slide_product',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'woo_slide_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'woo_slide_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'woo_slide_product',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }      
/****************************************************************/
/************                TESTIMONIAL            ************/
/****************************************************************/ 
$wp_customize->add_section('testim_setting', array(
        'title'    => __('Testimonial', 'shopline'),
        'priority' => 4,
        'panel'    => 'front_page_section' 
    ));
$wp_customize->add_setting(
            'testim_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'testim_tabs', array(
                    'section' => 'testim_setting',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'testimonial_hide',
                                'testimonial_heading_hide',
                                'testimonial_subheading_hide',
                                'our_testm_heading',
                                'our_testm_subheading',
                                'testm_play',
                                'testm_slider_speed',
                                'widgets',
   
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'testimonial_options',
                                'testim_svg_style',
                                'testimonial_bg_image',
                                'tst_img_overly_color',
                                'testimonial_heading_color',
                                'testimonial_subheading_color',
                                'testimonial_line_color',
                                'testimonial_section_padding',
                                'testimonial_top_padding',
                                'testimonial_bottom_padding',
                                

                            ),
                        ),
                    ),
                )
            )
  );
} 


$wp_customize->add_setting( 'testimonial_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'testimonial_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'testim_setting',
                )
);
$wp_customize->add_setting( 'testimonial_heading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'testimonial_heading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Heading', 'shopline'),
                    'section'     => 'testim_setting',
                )
);
$wp_customize->add_setting( 'testimonial_subheading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'testimonial_subheading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Sub Heading', 'shopline'),
                    'section'     => 'testim_setting',
                )
);
    $wp_customize->add_setting('our_testm_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
   $wp_customize->add_control('our_testm_heading', array(
        'label'    => __('Heading', 'shopline'),
        'section'  => 'testim_setting',
        'settings' => 'our_testm_heading',
         'type'       => 'text',
    )); 
    $wp_customize->add_setting('our_testm_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'

    ));
    $wp_customize->add_control('our_testm_subheading', array(
        'label'    => __('Sub Heading', 'shopline'),
        'section'  => 'testim_setting',
        'settings' => 'our_testm_subheading',
        'type'       => 'textarea',
    ));  

        // autoplay on/off
    $wp_customize->add_setting('testm_play', array(
            'default'        =>'on',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    $wp_customize->add_control('testm_play', array(
            'settings' => 'testm_play',
            'label'   => __('Autoplay','shopline'),
            'section' => 'testim_setting',
            'type'    => 'radio',
            'choices'    => array(
                'on'        => 'On',
                'off'      => 'Off',
            ),
        ));
  

    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
        $wp_customize->add_setting(
            'testm_slider_speed', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 3000,
                
            )
        );
    $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'testm_slider_speed', array(
                    'label' => esc_html__( 'Slider Speed', 'shopline' ),
                    'description'=> __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'shopline'),
                    'section' => 'testim_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 100,
                        'max' => 5000,
                        'step' => 100,
                    ),
                )
            )
        );
}   
        $wp_customize->add_setting('testimonial_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 'testimonial_options', array(
            'settings' => 'testimonial_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'testim_setting',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
                'image'      => 'Image',
            ),
        ));

        if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'testim_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'testim_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'testim_setting',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    } 
         $wp_customize->add_setting('testimonial_bg_image', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize, 'testimonial_bg_image', array(
            'label'    => __('Upload Background Image', 'shopline'),
            'section'  => 'testim_setting',
            'settings' => 'testimonial_bg_image',
        )));
        
        // overlay-color
            $wp_customize->add_setting(
                'tst_img_overly_color',
                array(
                    'default'     => '#e7e8e9',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'tst_img_overly_color',
            array(
                'label'         => __( 'Background Color', 'shopline' ),
                'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                'section'       => 'testim_setting',
                'settings'      => 'tst_img_overly_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));

        $wp_customize->add_setting('testimonial_heading_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'testimonial_heading_color', array(
            'label'      => __('Heading Color', 'shopline' ),
            'section'    => 'testim_setting',
            'settings'   => 'testimonial_heading_color',
        ) ) );

        $wp_customize->add_setting('testimonial_subheading_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'testimonial_subheading_color', array(
            'label'      => __('Sub Heading Color', 'shopline' ),
            'section'    => 'testim_setting',
            'settings'   => 'testimonial_subheading_color',
        ) ) );

        $wp_customize->add_setting('testimonial_line_color', array(
        'default'        => '#e7c09c',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize,'testimonial_line_color', array(
        'label'      => __('Title Underline Color', 'shopline' ),
        'section'    => 'testim_setting',
        'settings'   => 'testimonial_line_color',
    ) ) );

// top-bottom padding testimonial
    $wp_customize->add_setting('testimonial_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'testimonial_section_padding',
            array(
        'section'  => 'testim_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));

   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'testimonial_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

      $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'testimonial_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'testim_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'testimonial_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );
        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'testimonial_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'testim_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }      

$control_handle = $wp_customize->get_control( 'testim_tabs' );
        if ( ! empty( $control_handle ) ) {
            $control_handle->section  = 'sidebar-widgets-testimonial-widget';
            $control_handle->priority = -100;
}

$subscribe_widgets = $wp_customize->get_section( 'sidebar-widgets-testimonial-widget' );
    if ( ! empty( $subscribe_widgets ) ) {
        $subscribe_widgets->panel    = 'front_page_section';
        $subscribe_widgets->priority = 0;
        $controls_to_move            = array(
            'testimonial_hide',
            'testimonial_heading_hide',
            'testimonial_subheading_hide',
            'our_testm_heading',
            'our_testm_subheading',
            'testm_play',
            'testm_slider_speed',
            'testimonial_options',
            'testim_svg_style',
            'testimonial_bg_image',
            'tst_img_overly_color',
            'testimonial_heading_color',
            'testimonial_subheading_color',
            'testimonial_line_color',
            'testimonial_section_padding',
            'testimonial_top_padding',
            'testimonial_bottom_padding',
                                
        );
        foreach ( $controls_to_move as $control_id ) {
            $control = $wp_customize->get_control( $control_id );
            if ( ! empty( $control ) ) {
                $control->section  = 'sidebar-widgets-testimonial-widget';
                $control->priority = -1;
            }
        }
    }

/****************************************************************/
/************           SERVICE SECTION           ************/
/****************************************************************/ 
$wp_customize->add_section('service_setting', array(
        'title'    => __('Service', 'shopline'),
        'priority' => 5,
        'panel'    => 'front_page_section',
    ));
$wp_customize->add_setting(
            'services_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'services_tabs', array(
                    'section' => 'service_setting',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'service_hide','widgets',
                                
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'service_bg_color',
                                'service_section_padding',
                                'service_top_padding',
                                'service_bottom_padding'
                                
                            ),
                        ),
                    ),
                )
            )
  );
} 

$wp_customize->add_setting( 'service_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'service_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'service_setting',
                )
);
$wp_customize->add_setting(
            'service_bg_color',
            array(
                'default'     => '#fff',
                'type'        => 'theme_mod',
                'capability'  => 'edit_theme_options',
                'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                )       
        );
        $wp_customize->add_control(
            new Customize_themehunk_Color_Control(
                $wp_customize,
                'service_bg_color',
                array(
                    'label'         => __( 'Background Color', 'shopline' ),
                    'section'       => 'service_setting',
                    'settings'      => 'service_bg_color',
                    'show_opacity'  => true, // Optional.
                    'palette'   => $palette
                )));
  // top-bottom padding service
    $wp_customize->add_setting('service_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'service_section_padding',
            array(
        'section'  => 'service_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));
   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'service_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 25,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'service_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'service_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'service_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 25,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'service_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'service_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }      
$control_handle = $wp_customize->get_control( 'services_tabs' );
        if ( ! empty( $control_handle ) ) {
            $control_handle->section  = 'sidebar-widgets-shopservice-widget';
            $control_handle->priority = -100;
}

$subscribe_widgets = $wp_customize->get_section( 'sidebar-widgets-shopservice-widget' );
    if ( ! empty( $subscribe_widgets ) ) {
        $subscribe_widgets->panel    = 'front_page_section';
        $subscribe_widgets->priority = 0;
        $controls_to_move            = array(
            'service_hide',
            'service_bg_color',
            'service_section_padding',
            'service_top_padding',
            'service_bottom_padding'                       
        );
        foreach ( $controls_to_move as $control_id ) {
            $control = $wp_customize->get_control( $control_id );
            if ( ! empty( $control ) ) {
                $control->section  = 'sidebar-widgets-shopservice-widget';
                $control->priority = -1;
            }
        }
    }
/****************************************************************/
/************            ABOUT US SECTION           ************/
/****************************************************************/ 
$wp_customize->add_section('aboutus_setting', array(
        'title'    => __('AboutUs', 'shopline'),
        'priority' => 5,
        'panel'    => 'front_page_section' 
    ));
$wp_customize->add_setting(
            'aboutus_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'aboutus_tabs', array(
                    'section' => 'aboutus_setting',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'aboutus_hide',
                                'about_rgt_line_break_color',
                                'aboutus_image',
                                'about_line_break_color',
                                'aboutus_heading',
                                'aboutus_shortdesc',
                                'aboutus_longdesc',
                                'aboutus_btn_text',
                                'aboutus_btn_link',

   
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'aboutus_options',
                                'about_svg_style',
                                'aboutus_bg_image',
                                'aboutus_overly',
                                'headingq_line_break_color',
                                'aboutus_heading_color',
                                'aboutus_shortdesc_color',
                                'aboutus_longdesc_color',
                                'button_line_break_color',
                                'aboutus_btn_color',
                                'aboutus_btn_text_color',
                                'aboutus_btn_shadow_color',
                                'about_section_padding',
                                'about_top_padding',
                                'about_bottom_padding'
                                

                            ),
                        ),
                    ),
                )
            )
  );
}  
$wp_customize->add_setting( 'aboutus_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'aboutus_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'aboutus_setting',
                )
);



         $wp_customize->add_setting('about_rgt_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'about_rgt_line_break_color',array(
            'section' => 'aboutus_setting',
            'description' => __( 'Right Column', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

       $wp_customize->add_setting('aboutus_image', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
            ));
              $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'aboutus_image', array(
                'label'    => __('Image Upload', 'shopline'),
                'section'  => 'aboutus_setting',
                'settings' => 'aboutus_image',
            )));
       
       $wp_customize->add_setting('about_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'about_line_break_color',array(
            'section' => 'aboutus_setting',
            'description' => __( 'Left Column', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));
$wp_customize->add_setting('aboutus_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
            ));
       $wp_customize->add_control('aboutus_heading', array(
            'label'    => __('Main Heading', 'shopline'),
            'section'  => 'aboutus_setting',
            'settings' => 'aboutus_heading',
             'type'       => 'text',
            ));

        $wp_customize->add_setting('aboutus_shortdesc', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('aboutus_shortdesc', array(
            'label'    => __('Short Description', 'shopline'),
            'section'  => 'aboutus_setting',
            'settings' => 'aboutus_shortdesc',
             'type'       => 'textarea',
            ));
        $wp_customize->add_setting('aboutus_longdesc', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('aboutus_longdesc', array(
            'label'    => __('Description', 'shopline'),
            'section'  => 'aboutus_setting',
            'settings' => 'aboutus_longdesc',
             'type'       => 'textarea',
            ));
         $wp_customize->add_setting('aboutus_btn_text', array(
                'default'           => '',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));
        $wp_customize->add_control('aboutus_btn_text', array(
                'label'    => __('Button Text', 'shopline'),
                'section'  => 'aboutus_setting',
                'settings' => 'aboutus_btn_text',
                 'type'       => 'text',
            ));
            
       $wp_customize->add_setting('aboutus_btn_link', array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
            ));
        $wp_customize->add_control('aboutus_btn_link', array(
            'label'    => __('Button Link', 'shopline'),
            'section'  => 'aboutus_setting',
            'settings' => 'aboutus_btn_link',
             'type'       => 'text',
            ));
     
    //color
        $wp_customize->add_setting('aboutus_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_control( 'aboutus_options', array(
            'settings' => 'aboutus_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'aboutus_setting',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
                'image'      => 'Image',
            ),
        ));
         if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'about_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'about_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'aboutus_setting',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    } 
       $wp_customize->add_setting('aboutus_bg_image', array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize, 'aboutus_bg_image', array(
            'label'    => __('Upload Background Image', 'shopline'),
            'section'  => 'aboutus_setting',
            'settings' => 'aboutus_bg_image',
        )));
      
    // overlay-color
        $wp_customize->add_setting(
            'aboutus_overly',
            array(
                'default'     => '#fff',
                'type'        => 'theme_mod',
                'capability'  => 'edit_theme_options',
                'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                )       
        );
        $wp_customize->add_control(
            new Customize_themehunk_Color_Control(
                $wp_customize,
                'aboutus_overly',
                array(
                    'label'         => __( 'Background Color', 'shopline' ),
                    'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                    'section'       => 'aboutus_setting',
                    'settings'      => 'aboutus_overly',
                    'show_opacity'  => true, // Optional.
                    'palette'   => $palette
                )));

      $wp_customize->add_setting('headingq_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'headingq_line_break_color',array(
            'section' => 'aboutus_setting',
            'description' => __( 'Color', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));
        $wp_customize->add_setting('aboutus_heading_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'aboutus_heading_color', array(
            'label'      => __('Heading Color', 'shopline' ),
            'section'    => 'aboutus_setting',
            'settings'   => 'aboutus_heading_color',
        ) ) );

        $wp_customize->add_setting('aboutus_shortdesc_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'aboutus_shortdesc_color', array(
            'label'      => __('Short Description Color', 'shopline' ),
            'section'    => 'aboutus_setting',
            'settings'   => 'aboutus_shortdesc_color',
        ) ) );

         $wp_customize->add_setting('aboutus_longdesc_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'aboutus_longdesc_color', array(
            'label'      => __('Long Description Color', 'shopline' ),
            'section'    => 'aboutus_setting',
            'settings'   => 'aboutus_longdesc_color',
        ) ) );

         $wp_customize->add_setting('button_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'button_line_break_color',array(
            'section' => 'aboutus_setting',
            'description' => __( 'Button Color', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

        $wp_customize->add_setting('aboutus_btn_color', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'aboutus_btn_color', array(
            'label'      => __('Button Border and Hover Color', 'shopline' ),
            'section'    => 'aboutus_setting',
            'settings'   => 'aboutus_btn_color',
        ) ) );

        $wp_customize->add_setting('aboutus_btn_text_color', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'aboutus_btn_text_color', array(
            'label'      => __('Button Text Color', 'shopline' ),
            'section'    => 'aboutus_setting',
            'settings'   => 'aboutus_btn_text_color',
        ) ) );
        $wp_customize->add_setting('aboutus_btn_shadow_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'aboutus_btn_shadow_color', array(
            'label'      => __('Button Text Hover Color', 'shopline' ),
            'section'    => 'aboutus_setting',
            'settings'   => 'aboutus_btn_shadow_color',
        ) ) );
// top-bottom padding about setcion
    $wp_customize->add_setting('about_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'about_section_padding',
            array(
        'section'  => 'aboutus_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));

   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'about_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

      $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'about_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'aboutus_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'about_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );
        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'about_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'aboutus_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }      

/****************************************************************/
/************           LATEST POST SECTION         ************/
/****************************************************************/ 

$wp_customize->add_section('blog_setting', array(
        'title'    => __('Latest Blog', 'shopline'),
        'priority' => 6,
        'panel'    => 'front_page_section' 
    ));
$wp_customize->add_setting(
            'blog_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'blog_tabs', array(
                    'section' => 'blog_setting',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'blog_hide',
                                'blog_heading_hide',
                                'blog_subheading_hide',
                                'blog_heading',
                                'blog_subheading',
                                'slider_cate',
                                'slider_cate_count',
                                'read_more_txt',
                                'blog_play',
                                'blog_slider_speed',

   
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'blog_options',
                                'blog_svg_style',
                                'blog_bg_image',
                                'blog_overly',
                                'blog_heading_color',
                                'blog_subheading_color',
                                'blog_line_color',
                                'blog_line_break_color',
                                'blog_datetxt_color',
                                'blog_text_heading_color',
                                'blog_text_desc_color',
                                'blog_section_padding',
                                'blog_top_padding',
                                'blog_bottom_padding',
                            ),
                        ),
                    ),
                )
            )
  );
}  
$wp_customize->add_setting( 'blog_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'blog_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'blog_setting',
                )
);

$wp_customize->add_setting( 'blog_heading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'blog_heading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Heading', 'shopline'),
                    'section'     => 'blog_setting',
                )
);
$wp_customize->add_setting( 'blog_subheading_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'blog_subheading_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Sub Heading', 'shopline'),
                    'section'     => 'blog_setting',
                )
);


        $wp_customize->add_setting('blog_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('blog_heading', array(
            'label'    => __('Main Heading', 'shopline'),
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
            'label'    => __('Sub Heading', 'shopline'),
            'section'  => 'blog_setting',
            'settings' => 'blog_subheading',
             'type'       => 'textarea',
            ));
// blog-setting 
//= Choose All Category  =   
     $wp_customize->add_setting('slider_cate', array(
        'default'        => 0,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('slider_cate', array(
        'settings' => 'slider_cate',
        'label'   => __('Latest Post Category','shopline'),
        'section' => 'blog_setting',
        'type' => 'select',
        'choices' => shopline_get_category_list(),
    ) );
    $wp_customize->add_setting('slider_cate_count', array(
        'default'        => 4,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('slider_cate_count', array(
        'settings'  => 'slider_cate_count',
        'label'     => __('Number of Post','shopline'),
        'section'   => 'blog_setting',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 10)
    ) );
 $wp_customize->add_setting('read_more_txt', array(
        'default'        => 'Read More',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('read_more_txt', array(
        'settings'  => 'read_more_txt',
        'label'     => __('Change Read More Text','shopline'),
        'description'=> __('Enter a text below that you want to show instead of Read More','shopline'),
        'section'   => 'blog_setting',
        'type'      => 'text',
       
    ) );
    
//color
// autoplay on/off
    $wp_customize->add_setting('blog_play', array(
            'default'        =>'on',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    $wp_customize->add_control('blog_play', array(
            'settings' => 'blog_play',
            'label'   => __('Autoplay','shopline'),
            'section' => 'blog_setting',
            'type'    => 'radio',
            'choices'    => array(
                'on'        => 'On',
                'off'      => 'Off',
            ),
        ));

$wp_customize->add_setting('blog_slider_speed', array(
            'default'           => __('3000','shopline'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'));
$wp_customize->add_control('blog_slider_speed', array(
                'label'    => __('Speed', 'shopline'),
                'section'  => 'blog_setting',
                'settings' => 'blog_slider_speed',
                 'type'       => 'text',
)); 

$wp_customize->add_setting('blog_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
$wp_customize->add_control( 'blog_options', array(
            'settings' => 'blog_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'blog_setting',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
                'image'      => 'Image',
            ),
        ));

if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'blog_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'blog_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'blog_setting',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    } 
$wp_customize->add_setting('blog_bg_image', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
$wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize, 'blog_bg_image', array(
            'label'    => __('Upload Background Image', 'shopline'),
            'section'  => 'blog_setting',
            'settings' => 'blog_bg_image',
        )));
        
// overlay-color
        $wp_customize->add_setting(
        'blog_overly',
        array(
            'default'     => '#e7e8e9',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
            )       
        );
        $wp_customize->add_control(new Customize_themehunk_Color_Control(
            $wp_customize,
            'blog_overly',
            array(
                'label'         => __( 'Background Color', 'shopline' ),
                'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                'section'       => 'blog_setting',
                'settings'      => 'blog_overly',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
        ) ) );


        $wp_customize->add_setting('blog_heading_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'blog_heading_color', array(
            'label'      => __('Heading Color', 'shopline' ),
            'section'    => 'blog_setting',
            'settings'   => 'blog_heading_color',
        ) ) );
        $wp_customize->add_setting('blog_subheading_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'blog_subheading_color', array(
            'label'      => __('Sub Heading Color', 'shopline' ),
            'section'    => 'blog_setting',
            'settings'   => 'blog_subheading_color',
        ) ) );
         $wp_customize->add_setting('blog_line_color', array(
        'default'        => '#e7c09c',
        'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'blog_line_color', array(
            'label'      => __('Title Underline Color', 'shopline' ),
            'section'    => 'blog_setting',
            'settings'   => 'blog_line_color',
        ) ) );

         $wp_customize->add_setting('blog_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'blog_line_break_color',array(
            'section' => 'blog_setting',
            'description' => __( 'Post Color Options', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

        $wp_customize->add_setting('blog_datetxt_color', array(
            'default'        => '#bbb',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'blog_datetxt_color', array(
            'label'      => __('Date Text Color', 'shopline' ),
            'section'    => 'blog_setting',
            'settings'   => 'blog_datetxt_color',
        ) ) );

        $wp_customize->add_setting('blog_text_heading_color', array(
            'default'        => '#111',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'blog_text_heading_color', array(
            'label'      => __('Title Color', 'shopline' ),
            'section'    => 'blog_setting',
            'settings'   => 'blog_text_heading_color',
        ) ) );

        $wp_customize->add_setting('blog_text_desc_color', array(
            'default'        => '#666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'blog_text_desc_color', array(
            'label'      => __('Description Color', 'shopline' ),
            'section'    => 'blog_setting',
            'settings'   => 'blog_text_desc_color',
        ) ) ); 

        // top-bottom padding blog setcion
    $wp_customize->add_setting('blog_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'blog_section_padding',
            array(
        'section'  => 'blog_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));

   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'blog_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

      $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'blog_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'blog_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'blog_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );
        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'blog_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'blog_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }      
/****************************************************************/
/************             THREE COLUMN ADS             ************/
/****************************************************************/    
$wp_customize->add_section('three_column_ftr_first_column', array(
        'title'    => __('Three Column Featured', 'shopline'),
        'priority' => 7,
        'panel'    => 'front_page_section' 
    ));
$wp_customize->add_setting(
            'three_column_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'three_column_tabs', array(
                    'section' => 'three_column_ftr_first_column',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'three_column_hide',
                                'three_column_one_line_break_color',
                                'three_column_adds_first_image',
                                'three_column_adds_first_url',
                                'three_column_two_line_break_color',
                                'three_column_adds_second_image',
                                'three_column_adds_second_url',
                                'three_column_three_line_break_color',
                                'three_column_adds_third_image',
                                'three_column_adds_third_url',
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'ad_options',
                                'ad_svg_style',
                                'three_column_ads_bg_color',
                                'three_column_img_fst_color',
                                'three_column_img_scnd_color',
                                'three_column_img_thr_color',
                                'three_column_ads_section_padding',
                                'ad_top_padding',
                                'ad_bottom_padding'
                            ),
                        ),
                    ),
                )
            )
  );
}  
$wp_customize->add_setting( 'three_column_hide',
                array(
                    'sanitize_callback' => 'themehunk_sanitize_checkbox',
                    'default'  => '',
                )
            );
$wp_customize->add_control( 'three_column_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'shopline'),
                    'section'     => 'three_column_ftr_first_column',
                )
);
$wp_customize->add_setting('three_column_one_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'three_column_one_line_break_color',array(
            'section' => 'three_column_ftr_first_column',
            'description' => __( 'First', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));
$wp_customize->add_setting('three_column_adds_first_image', array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'three_column_adds_first_image', array(
            'label'    => __('Upload Image', 'shopline'),
            'section'  => 'three_column_ftr_first_column',
            'settings' => 'three_column_adds_first_image',
        )));
    $wp_customize->add_setting('three_column_adds_first_url', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
    $wp_customize->add_control('three_column_adds_first_url', array(
            'label'    => __('Image Link', 'shopline'),
            'section'  => 'three_column_ftr_first_column',
            'settings' => 'three_column_adds_first_url',
             'type'       => 'text',
        ));
  
$wp_customize->add_setting('three_column_two_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'three_column_two_line_break_color',array(
            'section' => 'three_column_ftr_first_column',
            'description' => __( 'Second', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));
$wp_customize->add_setting('three_column_adds_second_image', array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'three_column_adds_second_image', array(
            'label'    => __('Upload Image', 'shopline'),
            'section'  => 'three_column_ftr_first_column',
            'settings' => 'three_column_adds_second_image',
        )));
    $wp_customize->add_setting('three_column_adds_second_url', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
    $wp_customize->add_control('three_column_adds_second_url', array(
            'label'    => __('Image Link', 'shopline'),
            'section'  => 'three_column_ftr_first_column',
            'settings' => 'three_column_adds_second_url',
             'type'       => 'text',
        ));


     // Third ads
     $wp_customize->add_setting('three_column_three_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'three_column_three_line_break_color',array(
            'section' => 'three_column_ftr_first_column',
            'description' => __( 'Third', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            ))); 
    $wp_customize->add_setting('three_column_adds_third_image', array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'three_column_adds_third_image', array(
            'label'    => __('Upload Image', 'shopline'),
            'section'  => 'three_column_ftr_first_column',
            'settings' => 'three_column_adds_third_image',
        )));
    $wp_customize->add_setting('three_column_adds_third_url', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
    $wp_customize->add_control('three_column_adds_third_url', array(
            'label'    => __('Image Link', 'shopline'),
            'section'  => 'three_column_ftr_first_column',
            'settings' => 'three_column_adds_third_url',
             'type'       => 'text',
        ));

$wp_customize->add_setting('ad_options', array(
            'default'        =>'color',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
$wp_customize->add_control( 'ad_options', array(
            'settings' => 'ad_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'three_column_ftr_first_column',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'      => 'Color With SVG',
            ),
        ));

if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'ad_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'ad_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'three_column_ftr_first_column',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    } 
//colors
$wp_customize->add_setting('three_column_ads_bg_color', array(
           'default'        => '#fff',
           'sanitize_callback' => 'sanitize_hex_color'
    ));
$wp_customize->add_control( 
           new WP_Customize_Color_Control($wp_customize,'three_column_ads_bg_color', array(
           'label'      => __('Background Color', 'shopline' ),
           'section'    => 'three_column_ftr_first_column',
           'settings'   => 'three_column_ads_bg_color',
     ) ) );
  // first overlay-color
            $wp_customize->add_setting(
                'three_column_img_fst_color',
                array(
                    'default'     => 'rgba(0, 0, 0, 0)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'three_column_img_fst_color',
            array(
                'label'         => __( 'First Image Overlay Color', 'shopline' ),
                'section'       => 'three_column_ftr_first_column',
                'settings'      => 'three_column_img_fst_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));     
// second overlay-color
        $wp_customize->add_setting(
                'three_column_img_scnd_color',
                array(
                    'default'     => 'rgba(0, 0, 0, 0)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'three_column_img_scnd_color',
            array(
                'label'         => __( 'Second Image Overlay Color', 'shopline' ),
                'section'       => 'three_column_ftr_first_column',
                'settings'      => 'three_column_img_scnd_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));
        //third overlay-color
            $wp_customize->add_setting(
                'three_column_img_thr_color',
                array(
                    'default'     => 'rgba(0, 0, 0, 0)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                    'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                    )       
            );
        $wp_customize->add_control(
        new Customize_themehunk_Color_Control(
            $wp_customize,
            'three_column_img_thr_color',
            array(
                'label'         => __( 'Third Image Overlay Color', 'shopline' ),
                'section'       => 'three_column_ftr_first_column',
                'settings'      => 'three_column_img_thr_color',
                'show_opacity'  => true, // Optional.
                'palette'   => $palette
            )));
        // top-bottom padding ad setcion
    $wp_customize->add_setting('three_column_ads_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'three_column_ads_section_padding',
            array(
        'section'  => 'three_column_ftr_first_column',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));

   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'ad_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );

      $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'ad_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'three_column_ftr_first_column',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'ad_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 65,
                
            )
        );
        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'ad_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'three_column_ftr_first_column',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }  
/****************************************************************/
/************              SHOP-PAGES SETTING         ************/
/****************************************************************/ 
$wp_customize->add_section('shop_setting', array(
        'title'    => __('Shop page settings (WooCommerce)', 'shopline'),
        'priority' => 8,
    ));
$wp_customize->add_setting(
            'shop_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'shop_tabs', array(
                    'section' => 'shop_setting',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'shop_page_doc_link',
                                'sngle_sidebar_set',
                                'shop_sidebar',
                                'woo_grid',
                                'shop_product_show',
                                'more_grd_lyt',
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'shop_title_color',
                                'shop_rating_color',
                                'shop_price_color',
                                'shop_txt_color',
                                'shop_btn_color',
                                'shop_rating_color',
                                'shop_whslst_color',
                                'shop_sale_color',
                                'shop_sale_bg_color',
                                'shop_zoomicn_color',
                                'shop_zoomicn_bg_color'
                            ),
                        ),
                    ),
                )
            )
  );
}  
$wp_customize->add_setting('shop_page_doc_link', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'shop_page_doc_link',
            array(
        'section'  => 'shop_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check <a target="_blank" href="//themehunk.com/docs/shopline-theme/#shop-page"> Doc </a> for Shop page setting.','shopline' )
))); 
// single-sidebar choose option
$wp_customize->add_setting('sngle_sidebar_set', array(
            'default'           =>'no-sidebar',
            'capability'        =>'edit_theme_options',
            'sanitize_callback' =>'sanitize_text_field'
        ));
$wp_customize->add_control('sngle_sidebar_set', array(
            'settings' => 'sngle_sidebar_set',
            'label'    => __('Product Single Page','shopline'),
            'section'  => 'shop_setting',
            'type'     => 'radio',
            'choices'  => array(
                'left'       => 'Left',
                'right'      => 'Right',
                'no-sidebar' => 'No-Sidebar',
            ),
));  
// shop-sidebar choose option
$wp_customize->add_setting('shop_sidebar', array(
            'default'           =>'no-sidebar',
            'capability'        =>'edit_theme_options',
            'sanitize_callback' =>'sanitize_text_field'
        ));
$wp_customize->add_control('shop_sidebar', array(
            'settings' => 'shop_sidebar',
            'label'    => __('Shop / Category / Archive Page','shopline'),
            'section'  => 'shop_setting',
            'type'     => 'radio',
            'choices'  => array(
                'left'       => 'Left',
                'right'      => 'Right',
                'no-sidebar' => 'No-Sidebar',
            ),
));  
    $wp_customize->add_setting('woo_grid', array(
        'default'        => 'columns-4',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control( 'woo_grid', array(
        'settings' => 'woo_grid',
        'label'   => __('Choose Product Layout','shopline'),
        'section' => 'shop_setting',
        'type'    => 'select',
        'choices'    => array(
            
            'columns-2'  => __('Two Grid','shopline'),
            'columns-3'  => __('Three Grid','shopline'),
            'columns-4'  => __('Four Grid','shopline'),
            'columns-5'  => __('Five Grid','shopline'),
            
        ),
    ));
// product show shop page
    $wp_customize->add_setting('shop_product_show', array(
        'default'        => 10,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('shop_product_show', array(
        'settings'  => 'shop_product_show',
        'label'     => __('Number of Product','shopline'),
        'section'   => 'shop_setting',
        'type'      => 'number',
    ) );
 // add-more-layout-pro       
   $wp_customize->add_setting('more_grd_lyt', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'more_grd_lyt',
            array(
        'section'  => 'shop_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/shopline-pro-multipurpose-shopping-theme/">ShoplinePro</a> for multiple product layout','shopline' )
    )));   
// title
$wp_customize->add_setting('shop_title_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_title_color', array(
            'label'      => __('Title Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_title_color',
        ) ) );
// rating
$wp_customize->add_setting('shop_rating_color', array(
            'default'        => '#f2c618',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_rating_color', array(
            'label'      => __('Rating Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_rating_color',
        ) ) );
 // price 
 $wp_customize->add_setting('shop_price_color', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_price_color', array(
            'label'      => __('Price Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_price_color',
        ) ) );
// text
 $wp_customize->add_setting('shop_txt_color', array(
            'default'        => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_txt_color', array(
            'label'      => __('Text Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_txt_color',
        ) ) );  
// button
$wp_customize->add_setting('shop_btn_color', array(
            'default'        => '#e7c09c',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_btn_color', array(
            'label'      => __('Button Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_btn_color',
        ) ) );  
 // wishlist 
$wp_customize->add_setting('shop_whslst_color', array(
            'default'        => '#bbb',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_whslst_color', array(
            'label'      => __('Wishlist Icon Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_whslst_color',
        ) ) );   
 // sale
 $wp_customize->add_setting('shop_sale_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_sale_color', array(
            'label'      => __('Sale Text Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_sale_color',
        ) ) );  
$wp_customize->add_setting('shop_sale_bg_color', array(
            'default'        => '#232531',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_sale_bg_color', array(
            'label'      => __('Sale Background Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_sale_bg_color',
        ) ) ); 
 // zoom-icon        
 $wp_customize->add_setting('shop_zoomicn_color', array(
            'default'        => '#080808',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_zoomicn_color', array(
            'label'      => __('Zoom Icon Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_zoomicn_color',
        ) ) );    
  $wp_customize->add_setting('shop_zoomicn_bg_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'shop_zoomicn_bg_color', array(
            'label'      => __('Zoom Icon Background Color', 'shopline' ),
            'section'    => 'shop_setting',
            'settings'   => 'shop_zoomicn_bg_color',
        ) ) );             
/****************************************************************/
/************              FOOTER SECTION            ************/
/****************************************************************/ 
$wp_customize->add_section('footer_setting', array(
        'title'    => __('Footer Setting', 'shopline'),
        'priority' => 8,
    ));
$wp_customize->add_setting(
            'footer_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Themehunk_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Themehunk_Customize_Control_Tabs(
                $wp_customize, 'footer_tabs', array(
                    'section' => 'footer_setting',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'shopline' ),
                            'controls' => array(
                                'footer_logo_line_break_color',
                                'copyright_upload',
                    
                                'footer_social_line_break_color',
                                'social_link_facebook',
                                'social_link_youtube',
                                'social_link_linkedin',
                                'social_link_pintrest',
                                'social_link_twitter',
                                'redirect_widget_desc',
                                'widget_redirect',
                                'redirect_menu_desc',
                                'menu_redirect'
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'shopline' ),
                            'controls' => array(
                                'footer_options',
                                'footer_svg_style',
                                'footer_image_upload',
                                'footer_imager_overly',
                                'footer_widget_menu_color',
                                'footer_widget_title_color',
                                'footer_widget_text_color',
                                'footer_copyright_text_color',
                                'footer_followus_color',
                                'footer_hr_line_color',
                                'footer_section_padding',
                                'footer_top_padding',
                                'footer_bottom_padding',
                                'more_news_1'
                                
                            ),
                        ),
                    ),
                )
            )
  );
}  

$wp_customize->add_setting('footer_logo_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
$wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'footer_logo_line_break_color',array(
            'section' => 'footer_setting',
            'description' => __( 'Footer Logo', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));

        $wp_customize->add_setting('copyright_upload', array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
          $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'copyright_upload', array(
            'label'    => __('Footer Top Section Image Upload', 'shopline'),
            'section'  => 'footer_setting',
            'settings' => 'copyright_upload',
        )));
       
     $wp_customize->add_setting('footer_social_line_break_color', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new themehunk_break_Misc_Control(
            $wp_customize,'footer_social_line_break_color',array(
            'section' => 'footer_setting',
            'description' => __( 'Social Icon', 'shopline' ),
            'type' => 'content',
            'input_attrs' => array('divider' => true),
            )));  
    //social icon        
       $wp_customize->add_setting('social_link_facebook', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('social_link_facebook', array(
        'label'    => __('Facebook URL', 'shopline'),
        'section'  => 'footer_setting',
        'settings' => 'social_link_facebook',
         'type'       => 'text',
        ));

        $wp_customize->add_setting('social_link_youtube', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('social_link_youtube', array(
        'label'    => __('Youtube URL', 'shopline'),
        'section'  => 'footer_setting',
        'settings' => 'social_link_youtube',
         'type'       => 'text',
        ));
        $wp_customize->add_setting('social_link_linkedin', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('social_link_linkedin', array(
        'label'    => __('Linkedin URL', 'shopline'),
        'section'  => 'footer_setting',
        'settings' => 'social_link_linkedin',
         'type'       => 'text',
        ));
        $wp_customize->add_setting('social_link_pintrest', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('social_link_pintrest', array(
        'label'    => __(' Pinterest URL', 'shopline'),
        'section'  => 'footer_setting',
        'settings' => 'social_link_pintrest',
         'type'       => 'text',
        ));
        $wp_customize->add_setting('social_link_twitter', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('social_link_twitter', array(
        'label'    => __('Twitter URL', 'shopline'),
        'section'  => 'footer_setting',
        'settings' => 'social_link_twitter',
         'type'       => 'text',
        )); 

$wp_customize->add_setting('redirect_widget_desc', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'redirect_widget_desc',
            array(
        'section'  => 'footer_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Click here to set your widget','shopline' )
    )));


// widget-redirect
if ( class_exists( 'Themehunk_Display_Widget' ) ) { 
$wp_customize->add_setting(
            'widget_redirect', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
 $wp_customize->add_control(
            new Themehunk_Display_Widget(
                $wp_customize, 'widget_redirect', array(
                    'priority'     => 25,
                    'section'      => 'footer_setting',
                    'button_text'  => esc_html__( 'Go to widget', 'shopline' ),
                    'button_class' => 'focus-customizer-widget-redirect',
                   
                )
            )
        );
}           

$wp_customize->add_setting('redirect_menu_desc', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
$wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'redirect_menu_desc',
            array(
                'priority'     => 26,
        'section'  => 'footer_setting',
        'type'        => 'custom_message',
       'description' => wp_kses_post( 'If you want to show a menu in your footer click here and create a menu','shopline' )
)));
// widget-redirect
if ( class_exists( 'Themehunk_Display_Widget' ) ) { 
$wp_customize->add_setting(
            'menu_redirect', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
 $wp_customize->add_control(
            new Themehunk_Display_Widget(
                $wp_customize, 'menu_redirect', array(
                    'priority'     => 27,
                    'section'      => 'footer_setting',
                    'button_text'  => esc_html__( 'Go to Menu', 'shopline' ),
                    'button_class' => 'focus-customizer-menu-redirect',
                   
                )
            )
        );
}                   
      //color   
      $wp_customize->add_setting('footer_options', array(
        'default'        =>'color',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
      ));
      $wp_customize->add_control( 'footer_options', array(
            'settings' => 'footer_options',
            'label'   => __('Choose Background','shopline'),
            'section' => 'footer_setting',
            'type'    => 'radio',
            'choices'    => array(
                'color'      => 'Color',
                'svg'        => 'Color With SVG',
                'image'      => 'Image',
            ),
        ));
if ( class_exists( 'Themehunk_Customize_Control_Radio_Image' ) ) {
        $wp_customize->add_setting(
            'footer_svg_style', array(
                'default'           => 'svg-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Themehunk_Customize_Control_Radio_Image(
                $wp_customize, 'footer_svg_style', array(
                    'label'    => esc_html__( 'Choose SVG Style', 'shopline' ),
                    'section'  => 'footer_setting',
                    'choices'  => array(
                        'svg-one'   => array(
                            'url' => SHOPLINE_SVG_IMG1,
                        ),
                        'svg-two' => array(
                            'url' => SHOPLINE_SVG_IMG2,
                        ),
                        
                    ),
                )
            )
        );
    } 
   $wp_customize->add_setting('footer_image_upload', array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
          $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footer_image_upload', array(
            'label'    => __('Footer Background Image', 'shopline'),
            'section'  => 'footer_setting',
            'settings' => 'footer_image_upload',
        )));
 
    // overlay-color
        $wp_customize->add_setting(
            'footer_imager_overly',
            array(
                'default'     => '#232531',
                'type'        => 'theme_mod',
                'capability'  => 'edit_theme_options',
                'sanitize_callback' => 'themehunk_customizer_sanitize_hex_rgba_color'
                )       
        );
        $wp_customize->add_control(
            new Customize_themehunk_Color_Control(
                $wp_customize,
                'footer_imager_overly',
                array(
                    'label'         => __( 'Background Color', 'shopline' ),
                    'description'=> __( '(Set background color for section or set color with transparency for section overlay)', 'shopline' ),
                    'section'       => 'footer_setting',
                    'settings'      => 'footer_imager_overly',
                    'show_opacity'  => true, // Optional.
                    'palette'   => $palette
        )));

        $wp_customize->add_setting('footer_widget_menu_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'footer_widget_menu_color', array(
            'label'      => __('Footer Menu Color', 'shopline' ),
            'section'    => 'footer_setting',
            'settings'   => 'footer_widget_menu_color',
        ) ) );

        $wp_customize->add_setting('footer_widget_title_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'footer_widget_title_color', array(
            'label'      => __('Widget Title Color', 'shopline' ),
            'section'    => 'footer_setting',
            'settings'   => 'footer_widget_title_color',
        ) ) );
        $wp_customize->add_setting('footer_widget_text_color', array(
            'default'        => '#bbb',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'footer_widget_text_color', array(
            'label'      => __('Widget Text Color', 'shopline' ),
            'section'    => 'footer_setting',
            'settings'   => 'footer_widget_text_color',
        ) ) );

         $wp_customize->add_setting('footer_copyright_text_color', array(
            'default'        => '#bbb',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'footer_copyright_text_color', array(
            'label'      => __('Copyright Text Color', 'shopline' ),
            'section'    => 'footer_setting',
            'settings'   => 'footer_copyright_text_color',
        ) ) );
        $wp_customize->add_setting('footer_followus_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'footer_followus_color', array(
            'label'      => __('Follow Us Color', 'shopline' ),
            'section'    => 'footer_setting',
            'settings'   => 'footer_followus_color',
        ) ) );
        $wp_customize->add_setting('footer_hr_line_color', array(
            'default'        => '#1b1c26',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'footer_hr_line_color', array(
            'label'      => __('Top & Bottom Horizontal Line Color', 'shopline' ),
            'section'    => 'footer_setting',
            'settings'   => 'footer_hr_line_color',
        ) ) );
       
// top-bottom padding ribbon
    $wp_customize->add_setting('footer_section_padding', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'footer_section_padding',
            array(
        'section'  => 'footer_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Section Padding','shopline' )
    )));
   if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {
      $wp_customize->add_setting(
            'footer_top_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 40,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'footer_top_padding', array(
                    'label' => esc_html__( 'Top Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'footer_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
        $wp_customize->add_setting(
            'footer_bottom_padding', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 40,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'footer_bottom_padding', array(
                    'label' => esc_html__( 'Bottom Padding', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'footer_setting',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    )
                )
            )
        );
    }
$wp_customize->add_setting('more_news_1', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'more_news_1',
            array(
        'section'  => 'footer_setting',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/shopline-pro-multipurpose-shopping-theme/">ShoplinePro</a>  for <strong>News Letter!</strong>','shopline' )
    )));

    /****************************************************************/
    /************           Theme Color                  ************/
    /****************************************************************/ 
    $wp_customize->add_setting('theme_color', array(
        'default'        => '#e7c09c',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'theme_color', array(
        'label'      => __( 'Theme Color', 'shopline' ),
        'section'    => 'colors',
        'settings'   => 'theme_color',
        'priority'       => 1,
    ) ) ); 
     
    $wp_customize->get_section('colors')->title = esc_html__('Theme Color', 'shopline');
    $wp_customize->get_section('colors')->priority = 59;
    $wp_customize->get_section('colors')->panel = 'settings_theme_options';
   // background
    $wp_customize->add_section( 'background_image', array(
   'title'          => __( 'Body Background Image', 'shopline' ),
   'theme_supports' => 'custom-background',
   'priority'       => 80,
   'panel' =>'settings_theme_options',
   ) );  
     
    $wp_customize->get_section('custom_css')->priority = 17;

/************************************************************************/
                    //Gloabal-typograpgy//
/**************************************************************************/
$wp_customize->register_control_type( 'Themehunk_Customizer_Range_Value_Control' );
// normal slider
$theme_tygrphy = new PE_WP_Customize_Panel( $wp_customize, 'theme_tygrphy', array(
    'title'          => __('Typography', 'shopline'),
    'panel' => 'settings_theme_options',
    'priority' => 1,
  ));
$wp_customize->add_panel( $theme_tygrphy ); 
$wp_customize->add_section(
        'shopline_fontsubset_typography', array(
            'title' => esc_html__( 'Font Subsets', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
if ( class_exists( 'themehunk_Customize_Control_Checkbox_Multiple' ) ) {

        $wp_customize->add_setting(
            'shopline_font_subsets', array(
                'default' => array( 'latin' ),
                'sanitize_callback' => 'themehunk_checkbox_explode',
            )
        );

        $wp_customize->add_control(
            new themehunk_Customize_Control_Checkbox_Multiple(
                $wp_customize, 'shopline_font_subsets', array(
                    'section' => 'shopline_fontsubset_typography',
                    'label' => esc_html__( 'Font Subsets', 'shopline' ),
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
        'shopline_typography', array(
            'title' => esc_html__( 'Body', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_body_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_body_font', array(
        'label' => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_typography',
                    'priority'          => 2,
                    'type'              => 'select',
                )
            )
        );
    }
    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ) {

        $wp_customize->add_setting(
            'shopline_body_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 14,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 14,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 14,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
            $wp_customize, 'shopline_body_font_size_mb', array(
           'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.4,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
            'shopline_body_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.4,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
        // mob
        $wp_customize->add_setting(
            'shopline_body_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 0.4,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_body_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_typography',
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
   } // body(end)

//***********************************************//
// heading-h1
//***********************************************//
$wp_customize->add_section(
        'shopline_h1_typography', array(
            'title' => esc_html__( 'Heading 1 (H1)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );

    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_h1_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_h1_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),

                    'section'           => 'shopline_h1_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().

    $wp_customize->add_setting('h1_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'h1_typo_detail',
            array(
        'section'  => 'shopline_h1_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all h1 heading like page title, product title in single page.)','shopline' ),
        'priority'          => 0,

    )));

    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'shopline_h1_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 26,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h1_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 26,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h1_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 26,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // line-height
        $wp_customize->add_setting(
            'shopline_h1_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h1_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h1_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // letter-spacing
        $wp_customize->add_setting(
            'shopline_h1_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h1_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h1_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h1_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h1_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
    }
//***********************************************//
// heading-h2
//***********************************************//
$wp_customize->add_section(
        'shopline_h2_typography', array(
            'title' => esc_html__( 'Heading 2 (H2)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
   $wp_customize->add_setting('h2_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'h2_typo_detail',
            array(
        'section'  => 'shopline_h2_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all h2 heading like slider heading, section heading.)','shopline' ),
        'priority'          => 0,

    )));
    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_h2_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_h2_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_h2_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().
    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'shopline_h2_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h2_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h2_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 22,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // line-height
        $wp_customize->add_setting(
            'shopline_h2_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h2_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h2_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // letter-spacing
        $wp_customize->add_setting(
            'shopline_h2_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h2_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h2_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h2_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h2_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
    }
//***********************************************//
// heading-h3
//***********************************************//
$wp_customize->add_section(
        'shopline_h3_typography', array(
            'title' => esc_html__( 'Heading 3 (H3)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
$wp_customize->add_setting('h3_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'h3_typo_detail',
            array(
        'section'  => 'shopline_h3_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all h3 heading like product title, blog title.)','shopline' ),
        'priority'          => 0,

    )));
    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_h3_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_h3_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_h3_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().
    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'shopline_h3_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 20,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h3_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 20,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h3_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 20,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // line-height
        $wp_customize->add_setting(
            'shopline_h3_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h3_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h3_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // letter-spacing
        $wp_customize->add_setting(
            'shopline_h3_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h3_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h3_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h3_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h3_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
    }
//***********************************************//
// heading-h4
//***********************************************//
$wp_customize->add_section(
        'shopline_h4_typography', array(
            'title' => esc_html__( 'Heading 4 (H4)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
$wp_customize->add_setting('h4_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'h4_typo_detail',
            array(
        'section'  => 'shopline_h4_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all h4 heading like footer widget title, sidebar widget title.)','shopline' ),
        'priority'          => 0,

    )));
    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_h4_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_h4_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_h4_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().
    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'shopline_h4_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 18,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h4_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 18,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h4_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 18,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // line-height
        $wp_customize->add_setting(
            'shopline_h4_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h4_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h4_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // letter-spacing
        $wp_customize->add_setting(
            'shopline_h4_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h4_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h4_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h4_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h4_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
    }
//***********************************************//
// heading-h5
//***********************************************//
$wp_customize->add_section(
        'shopline_h5_typography', array(
            'title' => esc_html__( 'Heading 5 (H5)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
$wp_customize->add_setting('h5_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'h5_typo_detail',
            array(
        'section'  => 'shopline_h5_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all h5 heading.)','shopline' ),
        'priority'          => 0,

    )));
    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_h5_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_h5_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_h5_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().
    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'shopline_h5_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 16,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h5_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 16,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h5_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 16,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // line-height
        $wp_customize->add_setting(
            'shopline_h5_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h5_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h5_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // letter-spacing
        $wp_customize->add_setting(
            'shopline_h5_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h5_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h5_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h5_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h5_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
    }
//***********************************************//
// heading-h6
//***********************************************//
$wp_customize->add_section(
        'shopline_h6_typography', array(
            'title' => esc_html__( 'Heading 6 (H6)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
$wp_customize->add_setting('h6_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'h6_typo_detail',
            array(
        'section'  => 'shopline_h6_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all h6 heading.)','shopline' ),
        'priority'          => 0,

    )));
    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_h6_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_h6_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_h6_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().
    if ( class_exists( 'Themehunk_Customizer_Range_Value_Control' ) ){
        $wp_customize->add_setting(
            'shopline_h6_font_size', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 14,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_font_size', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h6_font_size_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 14,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_font_size_tb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h6_font_size_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 14,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_font_size_mb', array(
                    'label' => esc_html__( 'Font size', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 2,
                )
            )
        );
        // line-height
        $wp_customize->add_setting(
            'shopline_h6_line_height', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_line_height', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h6_line_height_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_line_height_tb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h6_line_height_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 35,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_line_height_mb', array(
                    'label' => esc_html__( 'Line height', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ),
                    'priority' => 3,
                )
            )
        );
        // letter-spacing
        $wp_customize->add_setting(
            'shopline_h6_letter_spacing', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_letter_spacing', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // tab
        $wp_customize->add_setting(
            'shopline_h6_letter_spacing_tb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_letter_spacing_tb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
        // mob
        $wp_customize->add_setting(
            'shopline_h6_letter_spacing_mb', array(
                'sanitize_callback' => 'themehunk_sanitize_range_value',
                'default' => 1,
                
            )
        );

        $wp_customize->add_control(
            new Themehunk_Customizer_Range_Value_Control(
                $wp_customize, 'shopline_h6_letter_spacing_mb', array(
                    'label' => esc_html__( 'Letter-spacing ', 'shopline' ) . ' ( ' . esc_html__( 'px','shopline' ) . ' )',
                    'section' => 'shopline_h6_typography',
                    'type' => 'range-value',
                    'input_attr' => array(
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ),
                    'priority' => 4,
                )
            )
        );
    }
//***********************************************//
// a-anchor
//***********************************************//
$wp_customize->add_section(
        'shopline_a_typography', array(
            'title' => esc_html__( 'Anchor (a)', 'shopline' ),
            'priority' => 25,
            'panel' => 'theme_tygrphy',
        )
    );
$wp_customize->add_setting('a_typo_detail', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'a_typo_detail',
            array(
        'section'  => 'shopline_a_typography',
        'type'        => 'custom_message',
        'description' => wp_kses_post('(Applicable for all Anchor link.)','shopline' ),
        'priority'          => 0,

    )));
    if ( class_exists( 'Themehunk_Font_Selector' ) ) {
        $wp_customize->add_setting(
            'shopline_a_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Themehunk_Font_Selector(
                $wp_customize, 'shopline_a_font', array(
        'label'  => esc_html__( 'Font family', 'shopline' ),
                    'section'           => 'shopline_a_typography',
                    'priority'          => 1,
                    'type'              => 'select',
                )
            )
        );
    }// End if().    
// typo-end
//===============================
//= pro-typography =
//=============================
  $wp_customize->add_section('pro_typo', array(
        'title'    => __('Section Typography', 'shopline'),
        'priority' => 10,
        'panel'     => 'theme_tygrphy',
        
    )); 
$wp_customize->add_setting('pro_typo_adv', array(
        'sanitize_callback' => 'themehunk_sanitize_text',
    ));
   $wp_customize->add_control( new themehunk_Misc_Control( $wp_customize, 'pro_typo_adv',
            array(
        'section'  => 'pro_typo',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/shopline-pro-multipurpose-shopping-theme/">ShoplinePro</a>  for full control over <strong>Section Typography!</strong>','shopline' )
    ))); 

// scroller
   if ( class_exists( 'Thunk_Customize_Control_Scroll' ) ) {
        $scroller = new Thunk_Customize_Control_Scroll();
    }
// selective-refresh option added
// logo     
$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.header-wrapper .site-title a'
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '#logo p'
) );
// slider
$wp_customize->selective_refresh->add_partial('first_slider_heading', array(
        'selector' => '.flexslider .container_caption h2 a',
) );
$wp_customize->selective_refresh->add_partial('first_slider_desc', array(
        'selector' => '.flexslider .container_caption p',
) );
$wp_customize->selective_refresh->add_partial('first_button_text', array(
        'selector' => '.flexslider .container_caption a.slider-button',
) );
// woo category section
$wp_customize->selective_refresh->add_partial('woo_cate_slider_heading', array(
        'selector' => 'h2.woocate-heading',
) );
$wp_customize->selective_refresh->add_partial('woo_cate_slider_subheading', array(
        'selector' => 'p.woocate-sub-heading',
) );
$wp_customize->selective_refresh->add_partial('_woo_slide_heading', array(
        'selector' => 'section#featured_product_section1 .block-heading h2',
) );
$wp_customize->selective_refresh->add_partial('_woo_slide_subheading', array(
        'selector' => 'section#featured_product_section1 .block-heading p',
) );
// ribbon
$wp_customize->selective_refresh->add_partial('ribbon_heading', array(
        'selector' => 'h2.ribbon-heading',
) );
$wp_customize->selective_refresh->add_partial('ribbon_subheading', array(
        'selector' => 'p.ribbon-sub-heading',
) );
// woo_product section
$wp_customize->selective_refresh->add_partial('woo_cate_product_heading', array(
        'selector' => '#featured_product_section .block-heading h2',
) );
// testimonial
$wp_customize->selective_refresh->add_partial( 'our_testm_heading', array(
        'selector' => 'h2.testimonial-heading',
) );
$wp_customize->selective_refresh->add_partial( 'our_testm_subheading', array(
        'selector' => 'p.testimonial-sub-heading',
) );
// about us 
$wp_customize->selective_refresh->add_partial( 'aboutus_heading', array(
        'selector' => 'h2.aboutus-heading',
) );
$wp_customize->selective_refresh->add_partial( 'aboutus_subheading', array(
        'selector' => 'p.aboutus-sub-heading',
) );
$wp_customize->selective_refresh->add_partial( 'aboutus_shortdesc', array(
        'selector' => '#aboutus_section h3',
) );
$wp_customize->selective_refresh->add_partial( 'aboutus_longdesc', array(
        'selector' => '#aboutus_section p',
) );
$wp_customize->selective_refresh->add_partial( 'aboutus_btn_text', array(
        'selector' => '#aboutus_section a.amazing-btn',
) );
$wp_customize->selective_refresh->add_partial( 'aboutus_image', array(
        'selector' => '#aboutus_section .amazing-list li.two',
) );
// blog
$wp_customize->selective_refresh->add_partial( 'blog_heading', array(
        'selector' => 'h2.blog-heading',
) );
$wp_customize->selective_refresh->add_partial( 'blog_subheading', array(
        'selector' => 'p.blog-sub-heading',
) );
// three ad
$wp_customize->selective_refresh->add_partial( 'three_column_adds_first_image', array(
        'selector' => '.hot-sell-block li.one',
) );
$wp_customize->selective_refresh->add_partial( 'three_column_adds_second_image', array(
        'selector' => '.hot-sell-block li.two',
) );
$wp_customize->selective_refresh->add_partial( 'three_column_adds_third_image', array(
        'selector' => '.hot-sell-block li.three',
) );
// footer
$wp_customize->selective_refresh->add_partial('copyright_text', array(
        'selector' => '.footer-bottom .footer-bottom-left',
) );
$wp_customize->selective_refresh->add_partial('social_link_facebook', array(
        'selector' => '.footer-social-icon p',
) );
$wp_customize->selective_refresh->add_partial('copyright_upload', array(
        'selector' => '.footer-menu-wrp-right',
) );    

}

add_action('customize_register','shopline_lite_customize_register');
/**
 * Check if a string is in json format
 *
 * @param  string $string Input.
 *
 * @since 1.1.38
 * @return bool
 */
function themehunk_is_json( $string ) {
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}
function shopline_is_contact_page() {
    return is_page_template( 'contact-page.php' );
}
function shopline_is_not_contact_page() {
    return ! is_page_template( 'contact-page.php' );
}

?>