<?php
/**
 * Toggle Customizer Control
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Exit if WP_Customize_Control does not exsist.
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * This class is for the toggle control in the Customizer.
 *
 * @access public
 */
class Big_Store_Toggle_Control extends WP_Customize_Control {
	/**
	 * The type of customize control.
	 *
	 * @access public
	 * @since  1.3.4
	 * @var    string
	 */
	public $type = 'toggle';
	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'big-store-toggle-control-styles', get_parent_theme_file_uri( 'customizer/customizer-toggle/toggle.css' ), false, '1.0.0', 'all' );
		wp_enqueue_script( 'big-store-toggle-control-scripts', get_parent_theme_file_uri( 'customizer/customizer-toggle/toggle.js' ), array( 'jquery' ), '1.0.0', true );
	}
	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function to_json() {
		parent::to_json();
		// The setting value.
		$this->json['id']           = $this->id;
		$this->json['value']        = $this->value();
		$this->json['link']         = $this->get_link();
		$this->json['defaultValue'] = $this->setting->default;
	}
	/**
	 * Don't render the content via PHP.  This control is handled with a JS template.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function render_content() {}
	/**
	 * An Underscore (JS) template for this control's content.
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @since  1.3.4
	 * @return void
	 */
	protected function content_template() {
		?>
        <div class="components-base-control components-toggle-control">
            <div class="components-base-control__field">
                <# if ( data.label ) { #>
                <label for="inspector-toggle-control-{{ data.id }}" class="components-toggle-control__label">{{ data.label }}</label>
                <# } #>
                <span class="components-form-toggle <# if ( data.value ) { #>is-checked<# } #>">
                    <input class="components-form-toggle__input" id="inspector-toggle-control-{{ data.id }}" type="checkbox" value="{{ data.value }}" {{{ data.link }}} <# if ( data.value ) { #> checked="checked" <# } #> />
                    <span class="components-form-toggle__track"></span>
                    <span class="components-form-toggle__thumb"></span>
                    
                </span>
            </div>
            <# if ( data.description ) { #>
            <p id="inspector-toggle-control-{{ data.id }}__help" class="components-base-control__help">{{ data.description }}</p>
            <# } #>
        </div>
	<?php
	}
}