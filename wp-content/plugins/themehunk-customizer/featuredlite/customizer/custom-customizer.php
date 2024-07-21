<?php

/**
 * Add controls for arbitrary heading, description, line
 *
 * @package     Customizer_Library
 * @author      Devin Price
 */
if ( ! function_exists( 'featuredlite_registers_js' ) ):
function featuredlite_registers_js(){
wp_enqueue_script( 'featuredlite_th_customizer_script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL .'/featuredlite/customizer/js/customizer.js', array("jquery"), '', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'featuredlite_registers_js' );
endif;

if ( ! function_exists( 'featuredlite_customizer_styles' ) ) :
function featuredlite_customizer_styles() {
wp_enqueue_style('featuredlite_th_customizer_styles', THEMEHUNK_CUSTOMIZER_PLUGIN_URL .'/featuredlite/customizer/customizer_styles.css');
}
add_action('customize_controls_print_styles', 'featuredlite_customizer_styles');
endif;