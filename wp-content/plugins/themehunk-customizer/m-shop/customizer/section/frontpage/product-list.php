<?php
$wp_customize->add_setting( 'm_shop_disable_product_list_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_product_list_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                'section'               => 'm_shop_product_slide_list',
                'settings'              => 'm_shop_disable_product_list_sec',
            ) ) );
// section heading
$wp_customize->add_setting('m_shop_product_list_heading', array(
	    'default' => __('Product List Carousel','themehunk-customizer'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_product_list_heading', array(
        'label'    => __('Section Heading', 'themehunk-customizer'),
        'section'  => 'm_shop_product_slide_list',
         'type'       => 'text',
));
//control setting for select options
	$wp_customize->add_setting('m_shop_product_list_cat', array(
	'default' => 0,
	'sanitize_callback' => 'm_shop_sanitize_select',
	) );
	$wp_customize->add_control( 'm_shop_product_list_cat', array(
	'label'   => __('Select Category','themehunk-customizer'),
	'section' => 'm_shop_product_slide_list',
	'type' => 'select',
	'choices' => m_shop_product_category_list(array('taxonomy' =>'product_cat'),true),
	) );

$wp_customize->add_setting('m_shop_product_list_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
$wp_customize->add_control('m_shop_product_list_optn', array(
        'settings' => 'm_shop_product_list_optn',
        'label'   => __('Choose Option','themehunk-customizer'),
        'section' => 'm_shop_product_slide_list',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','themehunk-customizer'),
        'featured'   => __('Featured','themehunk-customizer'),
        'random'     => __('Random','themehunk-customizer'),   
        ),
    ));

$wp_customize->add_setting( 'm_shop_single_row_prdct_list', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_single_row_prdct_list', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                'section'               => 'm_shop_product_slide_list',
                'settings'              => 'm_shop_single_row_prdct_list',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'm_shop_product_list_slide_optn', array(
    'default'           => false,
    'sanitize_callback' => 'm_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new M_Shop_Toggle_Control( $wp_customize, 'm_shop_product_list_slide_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'themehunk-customizer' ),
    'section'     => 'm_shop_product_slide_list',
    'type'        => 'toggle',
    'settings'    => 'm_shop_product_list_slide_optn',
  ) ) );
   $wp_customize->add_setting('m_shop_product_list_slide_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_number',
   ));
   $wp_customize->add_control( 'm_shop_product_list_slide_speed', array(
            'label'       => __('Speed', 'themehunk-customizer'),
            'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','themehunk-customizer'),
            'section'     => 'm_shop_product_slide_list',
             'type'       => 'number',
    ));
    
  $wp_customize->add_setting('m_shop_product_list_slide_doc', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
  $wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_product_list_slide_doc',
            array(
        'section'    => 'm_shop_product_slide_list',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#product-list',
        'description' => esc_html__( 'To know more go with this', 'themehunk-customizer' ),
        'priority'   =>100,
    )));