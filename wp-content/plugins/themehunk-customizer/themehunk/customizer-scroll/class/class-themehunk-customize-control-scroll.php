<?php if(!class_exists('WP_Customize_Control')){
	return;
}
/**
 * Scroll to section.
 *
 * @since  1.1.45
 * @access public
 */
class Thunk_Customize_Control_Scroll{
	/**
	 * Hestia_Customize_Control_Scroll constructor.
	 */
	public function __construct(){
		add_action( 'customize_controls_init', array( $this, 'enqueue' ) );
		add_action( 'customize_preview_init', array( $this, 'helper_script_enqueue' ) );
	}
	/**
	 * The priority of the control.
	 * @since 1.1.45
	 * @var   string
	 */
	  public $priority = 0;
	 /**
	 * Loads the customizer script.
	 *
	 * @since  1.1.45
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'thnmk-scroller-script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL.'/themehunk/customizer-scroll/js/script.js', array('jquery'), '1.0.0',true );
	}
	public function helper_script_enqueue() {
		wp_enqueue_script( 'thnmk-scroller-addon-script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL.'/themehunk/customizer-scroll/js/customizer-addon-script.js', array('jquery'), '1.0.0',true);
	}
}