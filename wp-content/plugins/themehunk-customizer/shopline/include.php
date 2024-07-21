<?php
if ( ! function_exists( 'shopline_is_woocommerce_activated' ) ) :
function shopline_is_woocommerce_activated() {
  return class_exists( 'woocommerce' ) ? true : false;
}
endif;
require_once( plugin_dir_path(__FILE__) . 'inc/constant.php' );
require_once( plugin_dir_path(__FILE__) . 'inc/custom-style.php' );
require_once( plugin_dir_path(__FILE__) . '/inc/custom-function.php' );
require_once( plugin_dir_path(__FILE__) . 'inc/image-crop.php' );
require_once( plugin_dir_path(__FILE__) . 'inc/testimonial.php' );
require_once( plugin_dir_path(__FILE__) . 'inc/service.php' );
require_once( plugin_dir_path(__FILE__) . 'inc/shortcode.php' );
require_once( plugin_dir_path(__FILE__) . '/customizer/custom-customizer.php' );
require_once( plugin_dir_path(__FILE__) . '/customizer/customizer.php' );
require_once( plugin_dir_path(__FILE__) . '/woo/woo-inc.php' );
// woocommerce functions
add_action( 'wp_enqueue_scripts', 'shopline_scripts' );
add_action( 'shopline_checkout', 'shopline_checkout', 60);
add_action( 'shopline_myaccount', 'shopline_my_account', 60);
add_action( 'shopline_header', 'shopline_header_cart', 60);
add_action( 'shopline_cart', 'shopline_menu_woo_cart_product');
add_action( 'shopline_featured', 'shopline_featured_products', 40);
add_action( 'shopline_product', 'shopline_woo_product', 50);
add_action( 'shopline_product_slide', 'shopline_woo_product_slide', 50);
add_action( 'shopline_cate_image', 'shopline_category_image', 2);

if ( ! function_exists( 'shopline_show_dummy_data' ) ) :
function shopline_show_dummy_data(){
        $return = false;

if(get_theme_mod('dummydata_hide_show','show') == 'show'):
    $return = true;
endif;

    return $return;
}
endif;

/*
 * Include assets
 */
function themehunk_customizer_admin_assets() {
 wp_enqueue_media();
wp_enqueue_script('themehunk-customizer-widget-script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'themehunk/js/widget.js', array( 'jquery', 'wp-color-picker' ), THEMEHUNK_CUSTOMIZER_VERSION, true);
}
add_action('admin_enqueue_scripts', 'themehunk_customizer_admin_assets');

/*
 *   Mobile device detection
 */
if( !function_exists('shopline_mobile_user_agent_switch') ){
    function shopline_mobile_user_agent_switch(){
        $device = '';
        
        if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
            $device = "ipad";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
            $device = "iphone";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
            $device = "blackberry";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
            $device = "android";
        }

        if( $device ) {
            return $device; 
        }else{
            return false;
        }
    }
}

// svg-function
function shopline_svg_enable($svg = 'notfound',$svgstyle='',$bgcolor='', $default=''){
$return = '';
$fill=get_theme_mod($bgcolor);
if(get_theme_mod($svg,$default)=='svg'):
    if(get_theme_mod($svgstyle,'svg-one')=='svg-one'){
    $return = '<div class="svg-top-container" style="fill:'.$fill.'">
        <svg xmlns="http://www.w3.org/2000/svg" width="0" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 L100 100 L100 2 L0 100 Z" stroke-width="0"></path>
      </svg>
</div>';
}else{
    $return = '<div class="svg-top-container" style="fill:'.$fill.'">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1000 100" preserveAspectRatio="none">
      <path d="M-1.23 78.87c186.267-24.436 314.878-36.485 385.833-36.147 106.432.506 167.531 21.933 236.417 21.933s183.312-50.088 254.721-55.62c47.606-3.688 89.283 2.613 125.03 18.901v72.063l-1002 1.278v-22.408z"></path>
  </svg>
</div>';
}
endif;
return $return;
}

// widget-area
add_action('widgets_init', 'themehunk_customizer_widget_init');
function themehunk_customizer_widget_init() {
    register_sidebar(array(
    'name' => __('Service', 'shopline'),
    'id' => 'shopservice-widget',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));
    register_sidebar(array(
    'name' => __('Testimonial', 'shopline'),
    'id' => 'testimonial-widget',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));
}
?>