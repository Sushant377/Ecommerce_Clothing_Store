<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
if( ! class_exists( 'WP_Customize_Control' ) ){
	return;
}
add_action( 'customize_preview_init', 'big_store_focus_section_enqueue');
add_action( 'customize_controls_init', 'big_store_focus_section_helper_script_enqueue' );
function big_store_focus_section_enqueue(){
	   wp_enqueue_style( 'big-store-focus-section-style',BIG_STORE_THEME_URI . 'customizer/customize-focus-section/css/focus-section.css');
		wp_enqueue_script( 'big-store-focus-section-script',BIG_STORE_THEME_URI . 'customizer/customize-focus-section/js/focus-section.js', array('jquery'),'',false);
	}
function big_store_focus_section_helper_script_enqueue(){
		wp_enqueue_script( 'big-store-focus-section-addon-script', BIG_STORE_THEME_URI . 'customizer/customize-focus-section/js/addon-focus-section.js', array('jquery'),'',false);
	}

