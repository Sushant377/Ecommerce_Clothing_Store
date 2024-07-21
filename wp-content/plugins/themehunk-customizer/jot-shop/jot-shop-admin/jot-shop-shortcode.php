<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function jot_shop_shortcode_template($section_name=''){
	switch ($section_name){
	case 'jot_shop_show_frontpage':
	$section = array(
                                                    'front-highlight',  
                                                    'front-tabproduct',
                                                    'front-categoryslider',
                                                    'front-ribbon',
                                                    'front-productslider',
                                                    'front-banner',
                                                    'front-productlist',                                       
    );
    foreach($section as $value):
    require_once (THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'jot-shop/jot-shop-front-page/'.$value.'.php');
    endforeach;
    break;
	}
}
function jot_shop_shortcodeid_data($atts){
    $output = '';
     if (class_exists('WooCommerce')) {
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = jot_shop_shortcode_template($section_name);
  }
    return $output;
}
add_shortcode('jot-shop', 'jot_shop_shortcodeid_data');