<?php
$wp_customize->add_setting( 'jot_shop_disable_category_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'jot_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jot_shop_disable_category_slide_sec', array(
                'label'                 => esc_html__('Disable Section', 'jot-shop'),
                'type'                  => 'checkbox',
                'section'               => 'jot_shop_cat_slide_section',
                'settings'              => 'jot_shop_disable_category_slide_sec',
            ) ) );

// section heading
$wp_customize->add_setting('jot_shop_cat_slider_heading', array(
        'default' => __('Woo Category','jot-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'jot_shop_cat_slider_heading', array(
        'label'    => __('Section Heading', 'jot-shop'),
        'section'  => 'jot_shop_cat_slide_section',
         'type'       => 'text',
));
/*****************/
// category layout
/*****************/
if(class_exists('Jot_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'jot_shop_cat_slide_layout', array(
                'default'           => 'cat-layout-1',
                'sanitize_callback' => 'jot_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Jot_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'jot_shop_cat_slide_layout', array(
                    'label'    => esc_html__( 'Category Layout', 'jot-shop' ),
                    'section'  => 'jot_shop_cat_slide_section',
                    'choices'  => array(
                        'cat-layout-1'   => array(
                            'url' => JOT_SHOP_CAT_SLIDER_LAYOUT_1,
                        ),
                        'cat-layout-2'   => array(
                            'url' => JOT_SHOP_CAT_SLIDER_LAYOUT_2,
                        ),
                        'cat-layout-3' => array(
                            'url' => JOT_SHOP_CAT_SLIDER_LAYOUT_3,
                        ),
                              
                    ),
                )
            )
        );
} 
//= Choose All Category  =   
    if (class_exists( 'Jot_Shop_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('jot_shop_category_slide_list', array(
        'default'           => '',
        'sanitize_callback' => 'jot_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new Jot_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'jot_shop_category_slide_list', array(
        'settings'=> 'jot_shop_category_slide_list',
        'label'   => __( 'Choose Categories To Show', 'jot-shop' ),
        'section' => 'jot_shop_cat_slide_section',
        'choices' => jot_shop_get_category_list(array('taxonomy' =>'product_cat'),true),
        ) 
    ));

}  
    $wp_customize->add_setting('jot_shop_cat_item_no', array(
            'default'           => 5,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'jot_shop_sanitize_number',
        )
    );
    $wp_customize->add_control('jot_shop_cat_item_no', array(
            'type'        => 'number',
            'section'     => 'jot_shop_cat_slide_section',
            'label'       => __( 'No. of Column to show', 'jot-shop' ),
            'input_attrs' => array(
                'min'  => 1,
                'step' => 1,
                'max'  => 10,
            ),
        )
    ); 
// Add an option to disable the logo.
  $wp_customize->add_setting( 'jot_shop_category_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'jot_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Jot_Shop_Toggle_Control( $wp_customize, 'jot_shop_category_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'jot-shop' ),
    'section'     => 'jot_shop_cat_slide_section',
    'type'        => 'toggle',
    'settings'    => 'jot_shop_category_slider_optn',
  ) ) );
  $wp_customize->add_setting('jot_shop_category_slider_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_number',
   ));
   $wp_customize->add_control( 'jot_shop_category_slider_speed', array(
            'label'       => __('Speed', 'jot-shop'),
            'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','jot-shop'),
            'section'     => 'jot_shop_cat_slide_section',
             'type'       => 'number',
    ));


  $wp_customize->add_setting('jot_shop_category_slider_doc', array(
    'sanitize_callback' => 'jot_shop_sanitize_text',
    ));
$wp_customize->add_control(new Jot_Shop_Misc_Control( $wp_customize, 'jot_shop_category_slider_doc',
            array(
        'section'    => 'jot_shop_cat_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/jot-shop/#woo-category',
        'description' => esc_html__( 'To know more go with this', 'jot-shop' ),
        'priority'   =>100,
    )));