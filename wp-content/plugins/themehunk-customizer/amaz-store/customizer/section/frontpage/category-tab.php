<?php
$wp_customize->add_setting( 'amaz_store_disable_cat_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'amaz_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amaz_store_disable_cat_sec', array(
                'label'                 => esc_html__('Disable Section', 'amaz-store'),
                'type'                  => 'checkbox',
                'section'               => 'amaz_store_category_tab_section',
                'settings'              => 'amaz_store_disable_cat_sec',
            ) ) );
// section heading
$wp_customize->add_setting('amaz_store_cat_tab_heading', array(
        'default' => __('Tabbed Product Carousel','amaz-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'amaz_store_cat_tab_heading', array(
        'label'    => __('Section Heading', 'amaz-store'),
        'section'  => 'amaz_store_category_tab_section',
         'type'       => 'text',
));
//= Choose All Category  =   
    if (class_exists( 'amaz_store_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('amaz_store_category_tab_list', array(
        'default'           => '',
        'sanitize_callback' => 'amaz_store_checkbox_explode'
    ));
    $wp_customize->add_control(new amaz_store_Customize_Control_Checkbox_Multiple(
            $wp_customize,'amaz_store_category_tab_list', array(
        'settings'=> 'amaz_store_category_tab_list',
        'label'   => __( 'Choose Categories To Show', 'amaz-store' ),
        'section' => 'amaz_store_category_tab_section',
        'choices' => amaz_store_get_category_list(array('taxonomy' =>'product_cat'),true),
        ) 
    ));

}  

$wp_customize->add_setting('amaz_store_category_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_select',
    ));
$wp_customize->add_control( 'amaz_store_category_optn', array(
        'settings' => 'amaz_store_category_optn',
        'label'   => __('Choose Option','amaz-store'),
        'section' => 'amaz_store_category_tab_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','amaz-store'),
        'featured'   => __('Featured','amaz-store'),
        'random'     => __('Random','amaz-store'),
            
        ),
    ));

$wp_customize->add_setting( 'amaz_store_single_row_slide_cat', array(
                'default'               => false,
                'sanitize_callback'     => 'amaz_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amaz_store_single_row_slide_cat', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'amaz-store'),
                'type'                  => 'checkbox',
                'section'               => 'amaz_store_category_tab_section',
                'settings'              => 'amaz_store_single_row_slide_cat',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'amaz_store_cat_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'amaz_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new amaz_store_Toggle_Control( $wp_customize, 'amaz_store_cat_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'amaz-store' ),
    'section'     => 'amaz_store_category_tab_section',
    'type'        => 'toggle',
    'settings'    => 'amaz_store_cat_slider_optn',
  ) ) );
$wp_customize->add_setting('amaz_store_cat_slider_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_number',
));
$wp_customize->add_control( 'amaz_store_cat_slider_speed', array(
        'label'       => __('Speed', 'amaz-store'),
        'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','amaz-store'),
        'section'  => 'amaz_store_category_tab_section',
         'type'    => 'number',
));

$wp_customize->add_setting('amaz_store_cat_tab_slider_doc', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
$wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz_store_cat_tab_slider_doc',
            array(
        'section'    => 'amaz_store_category_tab_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/amaz-store/#tabbed-product',
        'description' => esc_html__( 'To know more go with this', 'amaz-store' ),
        'priority'   =>100,
    )));
