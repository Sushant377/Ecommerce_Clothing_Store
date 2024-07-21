<?php

/**
 * Add controls for arbitrary heading, description, line
 *
 * @package     Customizer_Library
 * @author      Devin Price
 */
if ( ! function_exists( 'shopline_registers' ) ) :

function shopline_registers() {
wp_enqueue_script( 'shopline_customizer_script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/shopline/customizer/js/customizer.js', array("jquery"), '', true  );

wp_enqueue_script( 'pe-customize-controls', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/shopline/customizer/js/pe-customize-controls.js', array(), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'shopline_registers' );

endif;
if ( ! function_exists( 'shopline_customizer_styles' ) ) :

function shopline_customizer_styles() {
wp_enqueue_style('shopline_customizer_styles', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/shopline/customizer/customizer_styles.css');
wp_enqueue_style( 'pe-customize-controls', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/shopline/customizer/pe-customize-controls.css');

}
add_action('customize_controls_print_styles', 'shopline_customizer_styles');

endif;

if ( ! function_exists( 'shopline_checkbox_filter' ) ) :

// single page post meta
function shopline_checkbox_filter($search,$theme_mod,$default=false){
$filter = get_theme_mod($theme_mod);
$value = (!empty($filter) && !empty($filter[0]))?in_array($search, $filter):$default;
return $value;
}
endif;
//*******************************//
// nested-pannel-start
//*******************************//
if ( class_exists( 'WP_Customize_Panel' ) ) {

  class PE_WP_Customize_Panel extends WP_Customize_Panel {

    public $panel;

    public $type = 'pe_panel';

    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      return $array;

    }

  }

}

if ( class_exists( 'WP_Customize_Section' ) ){

  class PE_WP_Customize_Section extends WP_Customize_Section {

    public $section;

    public $type = 'pe_section';

    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      if ( $this->panel ) {

        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );

      } else {

        $array['customizeAction'] = 'Customizing';

      }

      return $array;

    }

  }

}

?>