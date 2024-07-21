<?php
if ( ! function_exists( 'elanzalite_customizer_registers' ) ) :
function elanzalite_customizer_registers(){
wp_enqueue_style( 'elanzalite_customizer_style', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/elanzalite/customizer/customizer_styles.css','', THEMEHUNK_CUSTOMIZER_VERSION, 'all' );
wp_enqueue_script( 'elanzalite_customizer_script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/elanzalite/customizer/js/customizer.js', array("jquery"), '', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'elanzalite_customizer_registers' );
endif;
?>