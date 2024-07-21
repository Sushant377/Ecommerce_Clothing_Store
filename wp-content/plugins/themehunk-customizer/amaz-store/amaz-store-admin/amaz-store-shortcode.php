<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function amaz_store_shortcode_template($section_name=''){
	switch ($section_name){
	case 'amaz_store_show_frontpage':
	$section = array(
                                            'front-tabproduct',
                                            'front-ribbon',
                                            'front-categoryslider',
                                            'front-productslider',
                                            'front-banner',   
                                            'front-productlist',                  
                                            'front-highlight',                                                   
                                                                                                                
    );
    foreach($section as $value):
    require_once (THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/amaz-store-front-page/'.$value.'.php');
    endforeach;
    break;
	}
}
function amaz_store_shortcodeid_data($atts){
    $output = '';
     if (class_exists('WooCommerce')) {
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = amaz_store_shortcode_template($section_name);
  }
    return $output;
}
add_shortcode('amaz-store', 'amaz_store_shortcodeid_data');