<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function big_store_shortcode_template($section_name=''){
	switch ($section_name){
	case 'big_store_show_frontpage':
	$section = array(
                                                    'front-topslider',
                                                    'front-tabproduct',
                                                    'front-categoryslider',
                                                    'front-tabproductimage',
                                                    'front-ribbon',
                                                    'front-productslider',
                                                    'front-banner',
                                                    'front-productlist',
                                                    'front-highlight',                                             
    );
    foreach($section as $value):
    require_once (THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/big-store-front-page/'.$value.'.php');
    endforeach;
    break;
	}
}
function big_store_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = big_store_shortcode_template($section_name);
    return $output;
}
add_shortcode('big-store', 'big_store_shortcodeid_data');