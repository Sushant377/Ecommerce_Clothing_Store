<?php
/**
 * The range value customize control extends the WP_Customize_Control class.
 *
 * @package shopline
 * @since shopline 1.1.30
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2016, Soderlind
 * @link       https://github.com/soderlind/class-customizer-range-value-control/blob/master/README.md
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class Customizer_Range_Value_Control
 *
 * @since 1.1.31
 * @modified 1.1.38
 * @access public
 */
class Themehunk_Customizer_Range_Value_Control extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'range-value';

	/**
	 * Flag that enables media queries
	 *
	 * @var bool
	 */
	public $media_query = false;

	/**
	 * Settings for range inputs.
	 *
	 * @var array|mixed
	 */
	public $input_attr = array();

	/**
	 * Themehunk_Customizer_Range_Value_Control constructor.
	 *
	 * @param WP_Customize_Manager $manager Customize manager.
	 * @param string               $id Control id.
	 * @param array                $args Control arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );

		if ( ! empty( $args['media_query'] ) ) {
			$this->media_query = (bool) $args['media_query'];
		}

		if ( ! empty( $args['input_attr'] ) ) {
			$this->input_attr = $args['input_attr'];
		}
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 1.1.31
	 * @modified 1.1.38
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . 'themehunk/customizer-range-value/js/customizer-range-value-control.js', array( 'jquery', 'customize-base' ), '1.0.0', true );
		wp_enqueue_style( 'customizer-range-value-control', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . 'themehunk/customizer-range-value/css/customizer-range-value-control.css', array(), '1.0.0' );
	}

	/**
	 * Handles input value.
	 *
	 * @since 1.1.38
	 * @return array
	 */
	public function json() {
		$json = parent::json();

		$json['value'] = $this->value();

		$json['default_value'] = ! empty( $this->setting->default ) ? $this->setting->default : 0;

		$json['desktop_value'] = ! $this->is_json( $json['value'] ) ? $json['value'] : $json['default_value'];
		$json['tablet_value'] = $json['default_value'];
		$json['mobile_value'] = $json['default_value'];

		if ( $this->is_json( $json['value'] ) ) {
			$decoded_value = json_decode( $json['value'], true );
			$json['desktop_value'] = $decoded_value['desktop'];
			$json['tablet_value'] = $decoded_value['tablet'];
			$json['mobile_value'] = $decoded_value['mobile'];
		} else {
			$json['desktop_value'] = $json['value'];
		}

		$json['media_query'] = $this->media_query;
		$json['link']        = $this->get_link();
		$json['vals'] = json_encode( $this->input_attr );
		$json['min'] = ! empty( $this->input_attr['min'] ) ? $this->input_attr['min'] : 0;
		$json['max'] = ! empty( $this->input_attr['max'] ) ? $this->input_attr['max'] : 1;
		$json['step'] = ! empty( $this->input_attr['step'] ) ? $this->input_attr['step'] : 1;

		return $json;
	}

	/**
	 * Check if a string is in json format
	 *
	 * @param  string $string Input.
	 *
	 * @since 1.1.31
	 * @access public
	 * @return bool
	 */
	public function is_json( $string ) {
		return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
	}

	/**
	 * Render the control's content.
	 *
	 * @since 1.1.31
	 * @modified 1.1.38
	 * @access public
	 */
	protected function content_template() {
	?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">
				<span>{{{ data.label }}}</span>
			</span>
			<# if ( data.media_query ) { #>
				<ul class="responsive-switchers">
					<li class="desktop">
						<button type="button" class="preview-desktop active" data-device="desktop">
							<i class="dashicons dashicons-desktop"></i>
						</button>
					</li>
					<li class="tablet">
						<button type="button" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"></i>
						</button>
					</li>
					<li class="mobile">
						<button type="button" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"></i>
						</button>
					</li>
				</ul>
			<# } #>
		<# } #>
		<div class="range-slider <# if ( data.media_query ) { #>has-media-queries<# }#>">
			<div class="desktop-range active">
				<input type="range" class="range-slider__range" title="{{{data.label}}}" min="{{{data.min}}}" max="{{{data.max}}}" step="{{{data.step}}}" data-query="desktop" data-default="{{{data.default_value}}}" value="{{{ data.desktop_value }}}">
				<input type="number" class="range-slider-value" title="{{{data.label}}}" min="{{{data.min}}}" max="{{{data.max}}}" step="{{{data.step}}}" value="{{{ data.desktop_value }}}">
				<span class="range-reset-slider"><span class="dashicons dashicons-image-rotate"></span></span>
			</div>
			<# if ( data.media_query ) { #>
				<div class="tablet-range">
					<input type="range" class="range-slider__range" title="{{{data.label}}}" min="{{{data.min}}}" max="{{{data.max}}}" step="{{{data.step}}}" data-query="tablet" data-default="{{{ data.default_value }}}"  value="{{{ data.tablet_value }}}">
					<input type="number" class="range-slider-value" title="{{{data.label}}}" min="{{{data.min}}}" max="{{{data.max}}}" step="{{{data.tablet_step}}}" value="{{{ data.tablet_value }}}">
					<span class="range-reset-slider"><span class="dashicons dashicons-image-rotate"></span></span>
				</div>
				<div class="mobile-range">
					<input type="range" class="range-slider__range" title="{{{data.label}}}" min="{{{data.min}}}" max="{{{data.max}}}" step="{{{data.step}}}" data-query="mobile" data-default="{{{ data.default_value }}}" value="{{{ data.mobile_value }}}">
					<input type="number" class="range-slider-value" title="{{{data.label}}}" min="{{{data.min}}}" max="{{{data.max}}}" step="{{{data.step}}}" value="{{{ data.mobile_value }}}">
					<span class="range-reset-slider"><span class="dashicons dashicons-image-rotate"></span></span>
				</div>
			<# } #>
			<input type="hidden" class="range-collector" title="{{{data.label}}}" value="{{ data.value }}" {{{ data.link }}} >
		</div>
		<?php
	}
}

/**
 * Sanitize values for range inputs.
 *
 * @param string $input Control input.
 * @since 1.1.38
 */
function themehunk_sanitize_range_value( $input ) {
	if ( themehunk_is_json( $input ) ) {
		$range_value = json_decode( $input, true );
		$range_value['desktop'] = ! empty( $range_value['desktop'] ) || $range_value['desktop'] === '0' ? floatval( $range_value['desktop'] ) : '';
		$range_value['tablet'] = ! empty( $range_value['tablet'] ) || $range_value['tablet'] === '0' ? floatval( $range_value['tablet'] ) : '';
		$range_value['mobile'] = ! empty( $range_value['mobile'] ) || $range_value['mobile'] === '0' ? floatval( $range_value['mobile'] ) : '';
		return json_encode( $range_value );
	}
	return floatval( $input );
}
