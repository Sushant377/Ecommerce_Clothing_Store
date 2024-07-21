<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function big_store_customize_register( $wp_customize ){
//view pro feature
//Registered panel and section
require BIG_STORE_THEME_DIR . 'customizer/register-panels-and-sections.php';	
//site identity
require BIG_STORE_THEME_DIR . 'customizer/section/layout/header/set-identity.php';
require BIG_STORE_THEME_DIR . 'customizer/section/layout/header/header.php';	
//Header
require BIG_STORE_THEME_DIR . 'customizer/section/layout/header/above-header.php';	
require BIG_STORE_THEME_DIR . 'customizer/section/layout/header/main-header.php';
require BIG_STORE_THEME_DIR . 'customizer/section/layout/header/loader.php';
//Footer
require BIG_STORE_THEME_DIR . 'customizer/section/layout/footer/above-footer.php';
require BIG_STORE_THEME_DIR . 'customizer/section/layout/footer/widget-footer.php';
require BIG_STORE_THEME_DIR . 'customizer/section/layout/footer/bottom-footer.php';

//section ordering
require BIG_STORE_THEME_DIR . 'customizer/section-ordering.php';
//social Icon
require BIG_STORE_THEME_DIR . 'customizer/section/layout/social-icon/social-icon.php';
//Blog
require BIG_STORE_THEME_DIR . 'customizer/section/layout/blog/blog.php';
//Color Option
require BIG_STORE_THEME_DIR . 'customizer/section/color/global-color.php';
require BIG_STORE_THEME_DIR . 'customizer/section/color/above-header-color.php';
require BIG_STORE_THEME_DIR . 'customizer/section/color/main-header-color.php';
require BIG_STORE_THEME_DIR . 'customizer/section/color/below-header-color.php';
//woo-product
require BIG_STORE_THEME_DIR . 'customizer/section/woo/product.php';
require BIG_STORE_THEME_DIR . 'customizer/section/woo/single-product.php';
require BIG_STORE_THEME_DIR . 'customizer/section/woo/cart.php';
require BIG_STORE_THEME_DIR . 'customizer/section/woo/shop.php';
require BIG_STORE_THEME_DIR . 'customizer/section/woo/tooltip.php';

// scroller
if ( class_exists('Big_Store_Customize_Control_Scroll')){
      $scroller = new Big_Store_Customize_Control_Scroll();
  }
}
add_action('customize_register','big_store_customize_register');
function big_store_is_json( $string ){
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}