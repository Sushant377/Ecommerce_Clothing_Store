<?php
/**
 * Customizer Control: Big Storebuttonset.
 *
 * @package      Big Store
 * @subpackage  Controls
 * @see   		https://github.com/aristath/kirki
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! class_exists( 'WP_Customize_Control' ) ){
	return;
}
/**
 * Buttonset control
 */
class Big_Store_Customizer_Buttonset_Control extends WP_Customize_Control{
	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'big-store-buttonset';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue(){
		wp_enqueue_script( 'big-store-buttonset-js',get_template_directory_uri() . '/customizer/customize-buttonset/buttonset.js',array( 'jquery', 'customize-base' ), '1.0.0', true);
		wp_enqueue_style( 'big-store-buttonset-style', get_template_directory_uri() .'/customizer/customize-buttonset/buttonset.css');
	}
	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		} else {
			$this->json['default'] = $this->setting->default;
		}
		$this->json['value']       = $this->value();
		$this->json['choices']     = $this->choices;
		$this->json['link']        = $this->get_link();
		$this->json['id']          = $this->id;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
	}
	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div id="input_{{ data.id }}" class="buttonset">
			<# for ( key in data.choices ) { #>
				<input {{{ data.inputAttrs }}} class="switch-input" type="radio" value="{{ key }}" name="_customize-radio-{{{ data.id }}}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( key === data.value ) { #> checked="checked" <# } #>>
					<label class="switch-label switch-label-<# if ( key === data.value ) { #>on <# } else { #>off<# } #>" for="{{ data.id }}{{ key }}">
						{{ data.choices[ key ] }}
					</label>
				</input>
			<# } #>
		</div>
		<?php
	}
}