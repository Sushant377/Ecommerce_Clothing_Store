<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function m_shop_plugin_customize_register( $wp_customize ){
//Front Page
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/top-slider.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/category-tab.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/product-slide.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/category-slider.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/product-list.php';

require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/ribbon.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/banner.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/higlight.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/tab-productimage.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/testimonial.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/customizer/section/frontpage/blog.php';



/*************************/
/* Footer Section for Pro*/
/*************************/
$wp_customize->add_setting('mshop-footer-pro-link', array(
    'sanitize_callback' => 'mshop_store_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'mshop-footer-pro-link',
            array(
        'section'     => 'm-shop-bottom-footer',
        'type'        => 'pro-link',
        'url'         => 'https://themehunk.com/product/m-shop-pro/',
        'label' => esc_html__( 'Get Pro', 'themehunk-customizer' ),
        'priority'   =>100,
    )));

}
add_action('customize_register','m_shop_plugin_customize_register');