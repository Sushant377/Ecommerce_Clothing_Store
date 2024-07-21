<?php 
$wp_customize->add_setting( 'm_shop_disable_blog_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_blog_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'm_shop_blog',
                'settings'              => 'm_shop_disable_blog_sec',
            ) ) );

$wp_customize->add_setting('m_shop_blog_heading', array(
        'default' => __('Blog','themehunk-customizer'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_blog_heading', array(
        'label'    => __('Section Heading', 'themehunk-customizer'),
        'section'  => 'm_shop_blog',
         'type'       => 'text',
));


//control setting for select options
function m_shop_post_category_list($arr='',$all=true){
    $cats = array();
    if($all == true){
        $cats[0] = 'All Categories';
    }
    foreach ( get_categories($arr) as $categories => $category ){
        $cats[$category->slug] = $category->name;
     }
     return $cats;
}
	$wp_customize->add_setting('m_shop_blog_slider_cat', array(
	'default' => 0,
	'sanitize_callback' => 'm_shop_sanitize_select',
	) );
	$wp_customize->add_control( 'm_shop_blog_slider_cat', array(
	'label'   => __('Select Category','themehunk-customizer'),
	'section' => 'm_shop_blog',
	'type' => 'select',
	'choices' => m_shop_post_category_list(),
	) );

	$wp_customize->add_setting('m_shop_post_show', array(
        'default' =>'4',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        
   ));
   $wp_customize->add_control( 'm_shop_post_show', array(
        'label'    => __('No. of Post to Show', 'themehunk-customizer'),
        'section'  => 'm_shop_blog',
         'type'       => 'number',
  ));