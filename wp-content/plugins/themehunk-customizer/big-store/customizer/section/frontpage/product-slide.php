<?php 
function big_store_product_category_list($arr='',$all=true){
    $cats = array();
    if($all == true){
        $cats[0] = 'All Categories';
    }
    foreach ( get_categories($arr) as $categories => $category ){
        $cats[$category->slug] = $category->name;
     }
     return $cats;
}
$wp_customize->add_setting( 'big_store_disable_product_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_disable_product_slide_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big_store_product_slide_section',
                'settings'              => 'big_store_disable_product_slide_sec',
            ) ) );
// section heading
$wp_customize->add_setting('big_store_product_slider_heading', array(
	    'default' => __('Product Carousel','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'big_store_product_slider_heading', array(
        'label'    => __('Section Heading', 'big-store'),
        'section'  => 'big_store_product_slide_section',
         'type'       => 'text',
));

//control setting for select options
	$wp_customize->add_setting('big_store_product_slider_cat', array(
	'default' => 0,
	'sanitize_callback' => 'big_store_sanitize_select',
	) );
	$wp_customize->add_control( 'big_store_product_slider_cat', array(
	'label'   => __('Select Category','big-store'),
	'section' => 'big_store_product_slide_section',
	'type' => 'select',
	'choices' => big_store_product_category_list(array('taxonomy' =>'product_cat'),true),
	) );

$wp_customize->add_setting('big_store_product_slide_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_select',
    ));
$wp_customize->add_control( 'big_store_product_slide_optn', array(
        'settings' => 'big_store_product_slide_optn',
        'label'   => __('Choose Option','big-store'),
        'section' => 'big_store_product_slide_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','big-store'),
        'featured'   => __('Featured (Pro)','big-store'),
        'random'     => __('Random (Pro)','big-store'),
            
        ),
    ));

$wp_customize->add_setting( 'big_store_single_row_prdct_slide', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_single_row_prdct_slide', array(
                'label'                 => esc_html__('Enable Single Row Slide (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big_store_product_slide_section',
                'settings'              => 'big_store_single_row_prdct_slide',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'big_store_product_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'big_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Big_Store_Toggle_Control( $wp_customize, 'big_store_product_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'big-store' ),
    'section'     => 'big_store_product_slide_section',
    'type'        => 'toggle',
    'settings'    => 'big_store_product_slider_optn',
  ) ) );
   $wp_customize->add_setting('big_store_product_slider_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_number',
   ));
   $wp_customize->add_control( 'big_store_product_slider_speed', array(
            'label'       => __('Speed', 'big-store'),
            'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','big-store'),
            'section'     => 'big_store_product_slide_section',
             'type'       => 'number',
    ));


  $wp_customize->add_setting('big_store_product_slider_doc', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_product_slider_doc',
            array(
        'section'    => 'big_store_product_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#product-carousel',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));