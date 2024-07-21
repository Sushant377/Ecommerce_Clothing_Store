<?php

/**
 * Add controls for arbitrary heading, description, line
 *
 * @package     Customizer_Library
 * @author      Devin Price
 */
if ( ! function_exists( 'onelinelite_registers' ) ) :
function onelinelite_registers() {
wp_enqueue_script( 'onelinelite_customizer_script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/oneline-lite/customizer/js/customizer.js', array("jquery"), '', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'onelinelite_registers' );
endif;
if ( ! function_exists( 'onelinelite_customizer_styles' ) ) :
function onelinelite_customizer_styles() {
wp_enqueue_style('onelinelite_customizer_styles', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/oneline-lite/customizer/customizer_styles.css');
}
add_action('customize_controls_print_styles', 'onelinelite_customizer_styles');
endif;