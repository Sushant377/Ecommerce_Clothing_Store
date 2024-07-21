<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function m_shop_shortcode_template($section_name=''){
	switch ($section_name){
	case 'm_shop_show_frontpage':
	$section = array(
                                                    'front-topslider',
                                                    'front-highlight',  
                                                    'front-tabproduct',
                                                    'front-categoryslider',
                                                    'front-tabproductimage',
                                                    'front-ribbon',
                                                    'front-productslider',
                                                    'front-testimonial',   
                                                       
                                                    'front-productlist', 
                                                    'front-banner',   
                                                    'front-blog'                                   
    );
    foreach($section as $value):
    require_once (THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'm-shop/m-shop-front-page/'.$value.'.php');
    endforeach;
    break;
	}
}
function m_shop_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = m_shop_shortcode_template($section_name);
    return $output;
}
add_shortcode('m-shop', 'm_shop_shortcodeid_data');