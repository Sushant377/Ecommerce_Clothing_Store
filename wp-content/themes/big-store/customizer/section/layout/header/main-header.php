<?php
// main header


/***************************************/
// Disable product category search box
/****************************************/

// choose col layout


if(class_exists('Big_Store_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'big_store_main_header_layout', array(
                'default'           => 'mhdrthree',
                'sanitize_callback' => 'big_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'big_store_main_header_layout', array(
                    'label'    => esc_html__( 'Header Layout', 'big-store' ),
                    'section'  => 'big-store-main-header',
                    'choices'  => array(
                        'mhdrthree' => array(
                            'url' => BIG_STORE_MAIN_HEADER_LAYOUT_ONE,
                        ),
                        'mhdrdefault'   => array(
                            'url' => BIG_STORE_MAIN_HEADER_LAYOUT_TWO,
                        ),
                        'mhdrone'   => array(
                            'url' => BIG_STORE_MAIN_HEADER_LAYOUT_THREE,
                        ),
                        'mhdrtwo' => array(
                            'url' => BIG_STORE_MAIN_HEADER_LAYOUT_FOUR,
                        ),
                        
                                     
                    ),
                    'priority'   => 1,
                )
            )
        );
} 



  
  




  



/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('big_store_menu_alignment', array(
                'default'               => 'left',
                'sanitize_callback'     => 'big_store_sanitize_select',
            ) );
$wp_customize->add_control( new Big_Store_Customizer_Buttonset_Control( $wp_customize, 'big_store_menu_alignment', array(
                'label'                 => esc_html__( 'Menu Alignment', 'big-store' ),
                'section'               => 'big-store-main-header',
                'settings'              => 'big_store_menu_alignment',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'big-store' ),
                    'center'            => esc_html__( 'center', 'big-store' ),
                    'right'             => esc_html__( 'Right', 'big-store' ),
                ),
                'priority'   => 2,
        ) ) );
//Main menu option
$wp_customize->add_setting('big_store_main_header_option', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
$wp_customize->add_control( 'big_store_main_header_option', array(
        'settings' => 'big_store_main_header_option',
        'label'    => __('Right Column','big-store'),
        'section'  => 'big-store-main-header',
        'type'     => 'select',
        'choices'    => array(
        'none'       => __('None','big-store'),
        'callto'     => __('Call-To (Pro)','big-store'),
        'button'     => __('Button (Pro)','big-store'),
        
        'widget'     => __('Widget (Pro)','big-store'),     
        ),
        'priority'   => 3,
    ));
//**************/
// BUTTON TEXT //
//**************/
$wp_customize->add_setting('big_store_main_hdr_btn_txt', array(
        'default' => __('Button Text','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'big_store_main_hdr_btn_txt', array(
        'label'    => __('Button Text', 'big-store'),
        'section'  => 'big-store-main-header',
         'type'    => 'text',
         'priority'   => 4,
));

$wp_customize->add_setting('big_store_main_hdr_btn_lnk', array(
        'default' => __('#','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        
));
$wp_customize->add_control( 'big_store_main_hdr_btn_lnk', array(
        'label'    => __('Button Link', 'big-store'),
        'section'  => 'big-store-main-header',
         'type'    => 'text',
         'priority'   => 5,
));
/*****************/
// Call-to
/*****************/
$wp_customize->add_setting('big_store_main_hdr_calto_txt', array(
        'default' => __('Call To','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'big_store_main_hdr_calto_txt', array(
        'label'    => __('Call To Text', 'big-store'),
        'section'  => 'big-store-main-header',
         'type'    => 'text',
         'priority'   => 6,
));

$wp_customize->add_setting('big_store_main_hdr_calto_nub', array(
        'default' => __('+1800090098','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'big_store_main_hdr_calto_nub', array(
        'label'    => __('Call To Number', 'big-store'),
        'section'  => 'big-store-main-header',
         'type'    => 'text',
         'priority'   => 7,
));

// col1 widget redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_main_header_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize, 'big_store_main_header_widget_redirect', array(
                    'section'      => 'big-store-main-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'big-store' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                    'priority'   => 8,
                )
            )
        );
} 
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('big_store_mobile_menu_open', array(
                'default'               => 'left',
                'sanitize_callback'     => 'big_store_sanitize_select',
            ) );
$wp_customize->add_control( new Big_Store_Customizer_Buttonset_Control( $wp_customize, 'big_store_mobile_menu_open', array(
                'label'                 => esc_html__( 'Mobile Menu', 'big-store' ),
                'section'               => 'big-store-main-header',
                'settings'              => 'big_store_mobile_menu_open',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'big-store' ),
                    // 'overcenter'        => esc_html__( 'center', 'big-store' ),
                    'right'             => esc_html__( 'Right', 'big-store' ),
                ),
                'priority'   => 9,
        ) ) );

  $wp_customize->add_setting( 'big_store_shadow_header', array(
    'default'           => false,
    'sanitize_callback' => 'big_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Big_Store_Toggle_Control( $wp_customize, 'big_store_shadow_header', array(
    'label'       => esc_html__( 'Header Shadow', 'big-store' ),
    'section'     => 'big-store-main-header',
    'type'        => 'toggle',
    'settings'    => 'big_store_shadow_header',
    'priority'   => 10,
  ) ) );
/***********************************/  
// Sticky Header
/***********************************/ 
  $wp_customize->add_setting( 'big_store_sticky_header', array(
    'default'           => false,
    'sanitize_callback' => 'big_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Big_Store_Toggle_Control( $wp_customize, 'big_store_sticky_header', array(
    'label'       => esc_html__( 'Sticky Header', 'big-store' ),
    'section'     => 'big-store-main-header',
    'type'        => 'toggle',
    'settings'    => 'big_store_sticky_header',
    'priority'   => 10,
  ) ) );

  $wp_customize->add_setting('big_store_sticky_header_effect', array(
        'default'        => 'scrldwmn',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
$wp_customize->add_control( 'big_store_sticky_header_effect', array(
        'settings' => 'big_store_sticky_header_effect',
        'label'    => __('Sticky Header Effect','big-store'),
        'section'  => 'big-store-main-header',
        'type'     => 'select',
        'choices'    => array(
        'scrldwmn'    => __('Effect One','big-store'),
        'scrltop'     => __('Effect Two','big-store'),
        
        ),
        'priority'   => 11,
    ));
/******************/
// Disable in Mobile
/******************/
$wp_customize->add_setting( 'big_store_whislist_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_whislist_mobile_disable', array(
                'label'                 => esc_html__('Check to disable whislist icon in mobile device', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big-store-main-header',
                'settings'              => 'big_store_whislist_mobile_disable',
                'priority'   => 12,
            ) ) );

$wp_customize->add_setting( 'big_store_account_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_account_mobile_disable', array(
                'label'                 => esc_html__('Check to disable account icon in mobile device', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big-store-main-header',
                'settings'              => 'big_store_account_mobile_disable',
                'priority'   => 13,
            ) ) );

$wp_customize->add_setting( 'big_store_cart_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_cart_mobile_disable', array(
                'label'                 => esc_html__('Check to disable cart icon in mobile device', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big-store-main-header',
                'settings'              => 'big_store_cart_mobile_disable',
                'priority'   => 14,
            ) ) );

/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_main_header_doc_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_main_header_doc_learn_more',
            array(
        'section'    => 'big-store-main-header',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#main-header',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));

// exclude header category
function big_store_get_category_id($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->term_id] = $category->name;
     }
     return $cats;
  }
$wp_customize->add_setting('big_store_main_hdr_cat_txt', array(
        'default' => __('Category','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'big_store_main_hdr_cat_txt', array(
        'label'    => __('Category Text', 'big-store'),
        'section'  => 'big_store_exclde_cat_header',
         'type'    => 'text',
));
 if (class_exists( 'Big_Store_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('big_store_exclde_category', array(
        'default'           => '',
        'sanitize_callback' => 'big_store_checkbox_explode'
    ));
    $wp_customize->add_control(new Big_Store_Customize_Control_Checkbox_Multiple(
            $wp_customize,'big_store_exclde_category', array(
        'settings'=> 'big_store_exclde_category',
        'label'   => __( 'Choose Categories To Exclude', 'big-store' ),
        'section' => 'big_store_exclde_cat_header',
        'choices' => big_store_get_category_id(array('taxonomy' =>'product_cat'),true),
        ) 
    ));

}  