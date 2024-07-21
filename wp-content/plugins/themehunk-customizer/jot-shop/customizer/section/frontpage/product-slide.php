<?php 
if(!function_exists('jot_shop_product_category_list')){
function jot_shop_product_category_list($arr='',$all=true){
    $cats = array();
    if($all == true){
        $cats[0] = 'All Categories';
    }
    foreach ( get_categories($arr) as $categories => $category ){
        $cats[$category->slug] = $category->name;
     }
     return $cats;
 }
}
$wp_customize->add_setting( 'jot_shop_disable_product_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'jot_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jot_shop_disable_product_slide_sec', array(
                'label'                 => esc_html__('Disable Section', 'jot-shop'),
                'type'                  => 'checkbox',
                'section'               => 'jot_shop_product_slide_section',
                'settings'              => 'jot_shop_disable_product_slide_sec',
            ) ) );
// section heading
$wp_customize->add_setting('jot_shop_product_slider_heading', array(
        'default' => __('Product Carousel','jot-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'jot_shop_product_slider_heading', array(
        'label'    => __('Section Heading', 'jot-shop'),
        'section'  => 'jot_shop_product_slide_section',
         'type'       => 'text',
));

//control setting for select options
    $wp_customize->add_setting('jot_shop_product_slider_cat', array(
    'default' => 0,
    'sanitize_callback' => 'jot_shop_sanitize_select',
    ) );
    $wp_customize->add_control( 'jot_shop_product_slider_cat', array(
    'label'   => __('Select Category','jot-shop'),
    'section' => 'jot_shop_product_slide_section',
    'type' => 'select',
    'choices' => jot_shop_product_category_list(array('taxonomy' =>'product_cat'),true),
    ) );

$wp_customize->add_setting('jot_shop_product_slide_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_select',
    ));
$wp_customize->add_control( 'jot_shop_product_slide_optn', array(
        'settings' => 'jot_shop_product_slide_optn',
        'label'   => __('Choose Option','jot-shop'),
        'section' => 'jot_shop_product_slide_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','jot-shop'),
        'featured'   => __('Featured','jot-shop'),
        'random'     => __('Random','jot-shop'),
            
        ),
    ));

$wp_customize->add_setting( 'jot_shop_single_row_prdct_slide', array(
                'default'               => false,
                'sanitize_callback'     => 'jot_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jot_shop_single_row_prdct_slide', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'jot-shop'),
                'type'                  => 'checkbox',
                'section'               => 'jot_shop_product_slide_section',
                'settings'              => 'jot_shop_single_row_prdct_slide',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'jot_shop_product_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'jot_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Jot_Shop_Toggle_Control( $wp_customize, 'jot_shop_product_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'jot-shop' ),
    'section'     => 'jot_shop_product_slide_section',
    'type'        => 'toggle',
    'settings'    => 'jot_shop_product_slider_optn',
  ) ) );
   $wp_customize->add_setting('jot_shop_product_slider_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'jot_shop_sanitize_number',
   ));
   $wp_customize->add_control( 'jot_shop_product_slider_speed', array(
            'label'       => __('Speed', 'jot-shop'),
            'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','jot-shop'),
            'section'     => 'jot_shop_product_slide_section',
             'type'       => 'number',
    ));


  $wp_customize->add_setting('jot_shop_product_slider_doc', array(
    'sanitize_callback' => 'jot_shop_sanitize_text',
    ));
$wp_customize->add_control(new Jot_Shop_Misc_Control( $wp_customize, 'jot_shop_product_slider_doc',
            array(
        'section'    => 'jot_shop_product_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/jot-shop/#product-carousel',
        'description' => esc_html__( 'To know more go with this', 'jot-shop' ),
        'priority'   =>100,
    )));