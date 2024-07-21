<?php
/*
  Plugin Name: ThemeHunk Customizer
  Description: With the help of ThemeHunk unlimited addon you can add unlimited number of columns for services, Testimonial, and Team with color options for each.
  Version: 2.7.9
  Author: ThemeHunk
  Text Domain: themehunk-customizer
  Author URI: http://www.themehunk.com/
 */
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
  
// Version constant for easy CSS refreshes
define('THEMEHUNK_CUSTOMIZER_VERSION', '2.7.9');
define('THEMEHUNK_CUSTOMIZER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('THEMEHUNK_CUSTOMIZER_PLUGIN_PATH', plugin_dir_path(__FILE__) );
include_once(plugin_dir_path(__FILE__) . 'notify/notify.php' );
function themehunk_customizer_text_domain(){
	$theme = wp_get_theme();
	$themeArr=array();
	$themeArr[] = $theme->get( 'TextDomain' );
	$themeArr[] = $theme->get( 'Template' );
	return $themeArr;
}

$theme = themehunk_customizer_text_domain(); 
if(in_array("oneline-lite", $theme)){
include_once( plugin_dir_path(__FILE__) . 'oneline-lite/demo/import-data.php' );
}elseif(in_array("shopline", $theme)){
include_once( plugin_dir_path(__FILE__) . 'shopline/demo/import-shopline-data.php');
}elseif(in_array("featuredlite", $theme)){
include_once( plugin_dir_path(__FILE__) . 'featuredlite/demo/import-data.php');
}elseif(in_array("big-store", $theme)){
include_once( plugin_dir_path(__FILE__) . 'big-store/demo/import.php' );	
}elseif(in_array("m-shop", $theme)){
include_once( plugin_dir_path(__FILE__) . 'm-shop/demo/import.php' );	
}
elseif(in_array("jot-shop", $theme)){
register_activation_hook( __FILE__, 'jot_shop_pro_deactivate' );
include_once( plugin_dir_path(__FILE__) . 'jot-shop/demo/import.php' );	
}
elseif(in_array("amaz-store", $theme)){
register_activation_hook( __FILE__, 'themehunk_pro_plugin_deactivate' );
include_once( plugin_dir_path(__FILE__) . 'amaz-store/demo/import.php' );	
}

function jot_shop_pro_deactivate() {
       require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
       deactivate_plugins( plugin_basename('jot-shop-pro/jot-shop-pro.php' ) );
       
    }
function themehunk_pro_plugin_deactivate(){
		 $theme = themehunk_customizer_text_domain(); 
		 $theme_name = $theme[0];
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	deactivate_plugins( plugin_basename($theme_name.'-pro/'.$theme_name.'-pro.php' ) );
}
function themehunk_customizer_load_file(){
	include_once(plugin_dir_path(__FILE__) . 'themehunk/customizer-font-selector/class/class-oneline-font-selector.php' );
    include_once(plugin_dir_path(__FILE__) . 'themehunk/customizer-range-value/class/class-oneline-customizer-range-value-control.php' );
    $font_selector_functions = plugin_dir_path(__FILE__) . 'themehunk/customizer-font-selector/functions.php';
    if ( file_exists( $font_selector_functions ) ){
    	include_once( $font_selector_functions );
	}
}

add_action('after_setup_theme', 'themehunk_customizer_load_plugin');
function themehunk_customizer_load_plugin() {
	include_once( plugin_dir_path(__FILE__) . 'themehunk/widget.php' );
	include_once( plugin_dir_path(__FILE__) . 'themehunk/custom-customizer.php' );
	include_once( plugin_dir_path(__FILE__) . 'themehunk/color-picker/color-picker.php' );
	$theme = themehunk_customizer_text_domain(); 
	if(in_array("oneline-lite", $theme)){
		add_action('widgets_init', 'themehunk_customizer_widgets_init');
		include_once( plugin_dir_path(__FILE__) . 'oneline-lite/include.php' );
		
	}elseif(in_array("featuredlite", $theme)){
		add_action('widgets_init', 'themehunk_customizer_widgets_init');
		include_once( plugin_dir_path(__FILE__) . 'featuredlite/include.php' );
	}elseif(in_array("shopline", $theme)){

		include_once( plugin_dir_path(__FILE__) . 'shopline/include.php' );
		include_once(plugin_dir_path(__FILE__) . 'themehunk/customizer-tabs/class/class-themehunk-customize-control-tabs.php' );
		include_once(plugin_dir_path(__FILE__) . 'themehunk/customizer-radio-image/class/class-themehunk-customize-control-radio-image.php' );
		include_once(plugin_dir_path(__FILE__) . 'themehunk/customizer-scroll/class/class-themehunk-customize-control-scroll.php' );
		themehunk_customizer_load_file();


	}elseif(in_array("elanzalite", $theme)){
		themehunk_customizer_load_file();
		include_once( plugin_dir_path(__FILE__) . 'elanzalite/include.php' );
	}
	elseif(in_array("big-store", $theme) && class_exists('WooCommerce')){
		include_once( plugin_dir_path(__FILE__) . 'big-store/include.php' );
	}
		elseif(in_array("m-shop", $theme) && class_exists('WooCommerce') ){
		include_once( plugin_dir_path(__FILE__) . 'm-shop/include.php' );
	}
	elseif(in_array("jot-shop", $theme) && class_exists('WooCommerce')){
		include_once( plugin_dir_path(__FILE__) . 'jot-shop/include.php' );
	}
	elseif(in_array("amaz-store", $theme) && class_exists('WooCommerce')){
		include_once( plugin_dir_path(__FILE__) . 'amaz-store/include.php' );
	}
}
?>