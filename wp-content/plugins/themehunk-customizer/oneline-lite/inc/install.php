<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// register widget
add_action('widgets_init', 'themehunk_customizer_widget_init');
function themehunk_customizer_widget_init() {
    register_widget( 'themehunk_customizer_services_widget' );
    register_widget( 'themehunk_customizer_team_widget' );
    register_widget( 'themehunk_customizer_testimonial_widget' );

}

/*
 * Include assets
 */
function themehunk_customizer_admin_assets() {
 wp_enqueue_media();
wp_enqueue_script('themehunk-customizer-widget-script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'oneline-lite/customizer/js/widget.js', array( 'jquery', 'wp-color-picker' ), THEMEHUNK_CUSTOMIZER_VERSION, true);
}
add_action('admin_enqueue_scripts', 'themehunk_customizer_admin_assets');
?>