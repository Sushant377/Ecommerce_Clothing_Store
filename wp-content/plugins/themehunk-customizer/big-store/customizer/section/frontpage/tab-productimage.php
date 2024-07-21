<?php
$wp_customize->add_setting( 'big_store_disable_product_img_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_disable_product_img_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big_store_product_tab_image',
                'settings'              => 'big_store_disable_product_img_sec',
 ) ) );

// section heading
$wp_customize->add_setting('big_store_product_img_sec_heading', array(
        'default' => __('Product Tab Image Carousel','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'big_store_product_img_sec_heading', array(
        'label'    => __('Section Heading', 'big-store'),
        'section'  => 'big_store_product_tab_image',
         'type'       => 'text',
));

//= Choose All Category  =   
    if (class_exists( 'Big_Store_Customize_Control_Checkbox_Multiple')){
   $wp_customize->add_setting('big_store_product_img_sec_cat_list', array(
        'default'           => '',
        'sanitize_callback' => 'big_store_checkbox_explode'
    ));
    $wp_customize->add_control(new Big_Store_Customize_Control_Checkbox_Multiple(
            $wp_customize,'big_store_product_img_sec_cat_list', array(
        'settings'=> 'big_store_product_img_sec_cat_list',
        'label'   => __( 'Choose Categories To Show', 'big-store' ),
        'section' => 'big_store_product_tab_image',
        'choices' => big_store_get_category_list(array('taxonomy' =>'product_cat'),true),
        ) 
    ));

}  

$wp_customize->add_setting('big_store_product_img_sec_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
$wp_customize->add_control( 'big_store_product_img_sec_optn', array(
        'settings' => 'big_store_product_img_sec_optn',
        'label'   => __('Choose Option','open-mart'),
        'section' => 'big_store_product_tab_image',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','big-store'),
        'featured'   => __('Featured (Pro)','big-store'),
        'random'     => __('Random (Pro)','big-store'),
            
        ),
    ));

// Add an option to disable the logo.
  $wp_customize->add_setting( 'big_store_product_img_sec_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'big_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new big_store_Toggle_Control( $wp_customize, 'big_store_product_img_sec_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'big-store' ),
    'section'     => 'big_store_product_tab_image',
    'type'        => 'toggle',
    'settings'    => 'big_store_product_img_sec_slider_optn',
  ) ) );

  $wp_customize->add_setting('big_store_product_img_sec_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_product_img_sec_adimg', array(
        'label'          => __('Upload Image', 'big-store'),
        'section'        => 'big_store_product_tab_image',
        'settings'       => 'big_store_product_img_sec_adimg',
 )));

$wp_customize->add_setting('big_store_product_img_sec_side', array(
        'default'        => 'left',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
$wp_customize->add_control( 'big_store_product_img_sec_side', array(
        'settings' => 'big_store_product_img_sec_side',
        'label'   => __('PLace Image On','big-store'),
        'section' => 'big_store_product_tab_image',
        'type'    => 'select',
        'choices'    => array(
        'left'     => __('Left','big-store'),
        'right'     => __('Right (Pro)','big-store'),
            
        ),
    ));
$wp_customize->add_setting( 'big_store_product_img_sec_single_row_slide', array(
                'default'               => true,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_product_img_sec_single_row_slide', array(
                'label'                 => esc_html__('Enable Single Row Slide (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big_store_product_tab_image',
                'settings'              => 'big_store_product_img_sec_single_row_slide',
            ) ) );
$wp_customize->add_setting('big_store_product_img_sec_doc', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_product_img_sec_doc',
            array(
        'section'   => 'big_store_product_tab_image',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#product-tab',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));