<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! function_exists( 'thvs_settings' ) ):
	function thvs_settings(){

		do_action( 'before_thvs_settings', th_variation_swatches() );

		th_variation_swatches()->add_setting(
			'simple', esc_html__( 'Basic', 'th-variation-swatches' ), apply_filters(
			'thvs_simple_settings_section', array(
				array(
					'title'  => esc_html__( 'Basic Setting', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_simple_setting_fields', array(
							array(
								'id'      => 'tooltip',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Tooltip', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Enable tooltip on each product attribute.', 'th-variation-swatches' ),
								'default' => true
							),
							array(
								'id'      => 'stylesheet',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Default Stylesheet', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Enable default stylesheet', 'th-variation-swatches' ),
								'default' => true
							),
							array(
								'id'      => 'style',
								'type'    => 'radio',
								'title'   => esc_html__( 'Attribute Shape Style', 'th-variation-swatches' ),
								
								'options' => array(
									'rounded' => esc_html__( 'Rounded Shape', 'th-variation-swatches' ),
									'squared' => esc_html__( 'Squared Shape', 'th-variation-swatches' ),

								),
								'default' => 'squared'
							),
							array(
								'id'      => 'default_to_button',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Auto Dropdowns to Button', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Convert default dropdowns to button type', 'th-variation-swatches' ),
								'default' => true
							),

						)
					)
				)
			)
		), apply_filters( 'thvs_simple_setting_default_active', true )
		);

		th_variation_swatches()->add_setting(
			'advanced', esc_html__( 'Advanced', 'th-variation-swatches' ), apply_filters(
			'thvs_advanced_settings_section', array(
			
				array(
					'title'  => esc_html__( 'Display Setting', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_advanced_setting_fields', array(
							
                           array(
								'id'      => 'show_title',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Attribute Title', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Check to Show Attribute Title', 'th-variation-swatches' ),
								'default' => true,
								
							),
							array(
								'id'      => 'show_variation_label',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Selected Attribute variation Name', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Check to show selected attribute variation name after title', 'th-variation-swatches' ),
								'default' => true,
								
							),

							array(
								'id'      => 'variation_label_separator',
								'type'    => 'text',
								'title'   => esc_html__( 'Separator', 'th-variation-swatches' ),
								'desc'    => sprintf( __( 'Change separator between title and name.', 'th-variation-swatches' )),
								'default' => '=',
								
								'require' => array( 'show_variation_label' => array( 'type' => '==', 'value' => '1' ) )
							),
							
						)
					)
				),
	            array(
					'title'  => esc_html__( 'Image Setting', 'th-variation-swatches' ),
					'desc'   => esc_html__( '', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_image_setting_fields', array(
							
							array(
								'id'      => 'attribute_image_size',
								'type'    => 'select',
								'title'   => esc_html__( 'Attribute image size', 'th-variation-swatches' ),
								'desc'    => has_filter( 'thvs_product_attribute_image_size' ) ? __( '<span style="color: red">Attribute image size changed by <code>thvs_product_attribute_image_size</code> hook. So this option will not apply any effect.</span>', 'th-variation-swatches' ) : __( sprintf( 'Choose attribute image size. <a target="_blank" href="%s">Media Settings</a>', esc_url( admin_url( 'options-media.php' ) ) ), 'th-variation-swatches' ),
								'options' => thvs_get_all_image_sizes(),
								'default' => 'thumbnail'
							),
						
							

						)
					)
				),
				array(
					'title'  => esc_html__( 'Attribute Style', 'th-variation-swatches' ),
					'desc'   => esc_html__( '', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_attr_style_fields', array(
							
							array(
								'id'      => 'width',
								'type'    => 'number',
								'title'   => esc_html__( 'Width', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Variation item width', 'th-variation-swatches' ),
								'default' => 30,
								'min'     => 10,
								'max'     => 200,
								'suffix'  => 'px'
							),
							array(
								'id'      => 'height',
								'type'    => 'number',
								'title'   => esc_html__( 'Height', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Variation item height', 'th-variation-swatches' ),
								'default' => 30,
								'min'     => 10,
								'max'     => 200,
								'suffix'  => 'px'
							),
							array(
								'id'      => 'single_font_size',
								'type'    => 'number',
								'title'   => esc_html__( 'Font Size', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Variation item font size', 'th-variation-swatches' ),
								'default' => 16,
								'min'     => 8,
								'max'     => 24,
								'suffix'  => 'px'
							),
						array(
								'id'      => 'attribute_behavior',
								'type'    => 'radio',
								'title'   => esc_html__( 'Unavailable Attribute Behavior', 'th-variation-swatches' ),
								'desc'    => sprintf( __( 'Disabled attribute will be hide / blur. Disable ajax threshold doesn\'t apply this feature', 'th-variation-swatches' )),
								'options' => array(
									'blur'          => esc_html__( 'Blur with cross', 'th-variation-swatches' ),
									'blur-no-cross' => esc_html__( 'Blur without cross', 'th-variation-swatches' ),
									'hide'          => esc_html__( 'Hide', 'th-variation-swatches' ),
								),
								'default' => 'blur'
							),
						array(
								'id'      => 'threshold',
								'type'    => 'number',
								'title'   => esc_html__( 'Ajax variation threshold', 'th-variation-swatches' ),
								'desc'    => __( 'Control the number of enable ajax variation threshold, If you set <code>1</code> all product variation will be load via ajax. Default value is <code>30</code>, <br>Note: Disable ajax threshold doesn\'t follow attribute behaviour. It\'s recommended to keep this number between 30 - 40.', 'th-variation-swatches' ),
								'default' => 30,
								'min'     => 1,
								'max'     => 80,
								'require' => array( 'disable_threshold' => array( 'type' => 'empty' ) )
							),

							array(
								'id'      => 'clear_on_reselect',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Clear Attribute Setting', 'th-variation-swatches' ),
								'desc'    => esc_html__( 'Clear selected attribute on reselect', 'th-variation-swatches' ),
								'default' => false
							),
							

						)
					)
				),
			)
		), apply_filters( 'thvs_advanced_setting_default_active', false )
		);
        th_variation_swatches()->add_setting(
			'documention', esc_html__( 'Tutorial', 'th-variation-swatches' ), apply_filters(
			'thvs_document_settings_section', array(
				array(
					
					'title'  => esc_html__( 'Tutorial', 'th-variation-swatches' ),
					'desc'   => esc_html__( '', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_document_settings_fields', array(
							array(
								'id'         => 'doc_iframe',
                                'type'       => 'iframe',
                                'title'      => '',
                                'desc'       => '',
								'width'      => '720px',
								'height'      => '550px',
								'screen_frame'=> esc_url('https://www.youtube.com/embed/mLsuFC9-SrU'),
								'doc_link'    => esc_url('https://themehunk.com/docs/th-variation-swatches-plugin/'),
								'doc-texti' => esc_html__('For More Documentation','th-variation-swatches'),
								
							),
						)
					)
				)
			)
		), apply_filters( 'thvs_document_setting_default_active', true )
		);
		th_variation_swatches()->add_setting(
			'profeature', esc_html__( 'TH Swatches Pro', 'th-variation-swatches' ), apply_filters(
			'thvs_profeature_settings_section', array(
				array(
				
					'title'  => esc_html__( 'Pro Feature', 'th-variation-swatches' ),
					'desc'   => esc_html__( '', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_profeature_setting_fields', array(
							array(
								'id'         => 'profeature',
								'title'      =>'',
                                'type'       => 'pro',
                                'desc'       => '',
								'pro'          => true,
								'width'        => 'auto',
								'screen_shot1'  => esc_url( TH_VARIATION_SWATCHES_IMAGES_URI.'/pro1.png' ),
								'screen_shot2'  => esc_url( TH_VARIATION_SWATCHES_IMAGES_URI.'/pro2.png' ),
								'screen_shot3'  => esc_url( TH_VARIATION_SWATCHES_IMAGES_URI.'/pro3.png' ),
								'screen_shot4'  => esc_url( TH_VARIATION_SWATCHES_IMAGES_URI.'/pro4.png' ),
								'screen_shot5'  => esc_url( TH_VARIATION_SWATCHES_IMAGES_URI.'/pro5.png' ),
								'screen_shot6'  => esc_url( TH_VARIATION_SWATCHES_IMAGES_URI.'/pro6.png' ),
								'link1' => esc_url('https://themehunk.com/th-variation-swatches/#pricing'),
								'link2' => esc_url('https://themehunk.com/th-variation-swatches/'),
								
							),
						)
					)
				)
			)
		), apply_filters( 'thvs_profeature_setting_default_active', true )
		);
		th_variation_swatches()->add_setting(
			'usefull_plugin', esc_html__( 'Themehunk Useful Plugins', 'th-variation-swatches' ), apply_filters(
			'thvs_usefull_plugin_settings_section', array(
				array(
				
					'title'  => esc_html__( 'Themehunk Useful Plugins', 'th-variation-swatches' ),
					'desc'   => esc_html__( '', 'th-variation-swatches' ),
					'fields' => apply_filters(
						'thvs_usefull_plugin_setting_fields', array(
							array(
								'id'         => 'thvs-th-taiowc',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/th-all-in-one-woo-cart/assets/icon-128x128.png'),
								'plugin_title'  => esc_html__( 'TH Side Cart and Menu Cart for Woocommerce', 'th-variation-swatches' ),
								'plugin_link'  => esc_url('https://themehunk.com/th-all-in-one-woo-cart/'),	
								
							),
							array(
								'id'         => 'thvs-th-product-compare',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/th-product-compare/assets/icon-128x128.png'),
								'plugin_title'  => esc_html__( 'Th Product Compare', 'th-variation-swatches' ),
								'plugin_link'  => esc_url('https://themehunk.com/th-product-compare-plugin/'),	
								
							),
							array(
								'id'         => 'th-advance-product-search',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/th-advance-product-search/assets/icon-128x128.gif'),
								'plugin_title'  => esc_html__( 'TH Advance Product Search', 'th-variation-swatches' ),
								'plugin_link'  => esc_url('https://themehunk.com/advance-product-search/'),	
								
							),
							array(
								'id'         => 'lead-form-builder',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/lead-form-builder/assets/icon-128x128.png'),
								'plugin_title'  => esc_html__( 'Lead Form Builder', 'th-variation-swatches' ),
								'plugin_link'  => esc_url('https://themehunk.com/product/lead-form-builder-pro/'),	
								
							),
							array(
								'id'         => 'wp-popup-builder',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/wp-popup-builder/assets/icon-128x128.png'),
								'plugin_title'  => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'th-variation-swatches' ),
								'plugin_link'  => esc_url('https://themehunk.com/product/wp-popup-builder/'),	
								
							),
							
						)
					)
				)
			)
		), apply_filters( 'thvs_usefull_plugin_setting_default_active', true )
		);


		do_action( 'after_thvs_settings', th_variation_swatches() );
	}
endif;


if ( ! function_exists( 'thvs_get_all_image_sizes' ) ):
	function thvs_get_all_image_sizes() {

		$image_subsizes = wp_get_registered_image_subsizes();
        
		return apply_filters(
			'thvs_get_all_image_sizes', array_reduce(
				array_keys( $image_subsizes ), function ( $carry, $item ) use ( $image_subsizes ) {

				$title  = ucwords( str_ireplace( array( '-', '_' ), ' ', $item ) );
				$width  = $image_subsizes[ $item ]['width'];
				$height = $image_subsizes[ $item ]['height'];

				$carry[ $item ] = sprintf( '%s (%d &times; %d)', $title, $width, $height );

				return $carry;
			}, array()
			)
		);
	}
endif;

//-------------------------------------------------------------------------------
// Add WooCommerce taxonomy Meta
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_add_product_taxonomy_meta' ) ) {
	function thvs_add_product_taxonomy_meta() {

		$fields         = thvs_taxonomy_meta_fields();

		$meta_added_for = apply_filters( 'thvs_product_taxonomy_meta_for', array_keys( $fields ) );

		if ( function_exists( 'wc_get_attribute_taxonomies' ) ):

			$attribute_taxonomies = wc_get_attribute_taxonomies();

			
			if ( $attribute_taxonomies ) :
				foreach ( $attribute_taxonomies as $tax ) :
					$product_attr      = wc_attribute_taxonomy_name( $tax->attribute_name );
					$product_attr_type = $tax->attribute_type;
					if ( in_array( $product_attr_type, $meta_added_for ) ) :
						th_variation_swatches()->add_term_meta( $product_attr, 'product', $fields[ $product_attr_type ] );

						do_action( 'thvs_wc_attribute_taxonomy_meta_added', $product_attr, $product_attr_type );
					endif; 
				endforeach; // $attribute_taxonomies
			endif; // $attribute_taxonomies
		endif; // function_exists( 'wc_get_attribute_taxonomies' )
	}
}
//-------------------------------------------------------------------------------
// WooCommerce taxonomy Meta Field Settings
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_taxonomy_meta_fields' ) ):
	function thvs_taxonomy_meta_fields( $field_id = false ) {

		$fields = array();

		$fields['color'] = array(
			array(
				'label' => esc_html__( 'Color', 'th-variation-swatches' ), 
				'desc'  => esc_html__( 'Choose a color', 'th-variation-swatches' ), 
				'id'    => 'product_attribute_color', 
				'type'  => 'color'
			)
		);

		$fields['image'] = array(
			array(
				'label' => esc_html__( 'Image', 'th-variation-swatches' ),
				'desc'  => esc_html__( 'Choose an Image', 'th-variation-swatches' ),
				'id'    => 'product_attribute_image',
				'type'  => 'image'
			)
		);

		$fields = apply_filters( 'thvs_product_taxonomy_meta_fields', $fields );

		if ( $field_id ) {
			return isset( $fields[ $field_id ] ) ? $fields[ $field_id ] : array();
		}

		return $fields;

	}
endif;

//-----------------------------------------------------------------
// Available Product Attribute Types
//-----------------------------------------------------------------

if ( ! function_exists( 'thvs_available_attributes_types' ) ):
	function thvs_available_attributes_types( $type = false ) {
		$types = array();

		$types['color'] = array(
			'title'   => esc_html__( 'Color', 'th-variation-swatches' ),
			'output'  => 'thvs_color_variation_attribute_options',
			'preview' => 'thvs_color_variation_attribute_preview'
		);

		$types['image'] = array(
			'title'   => esc_html__( 'Image', 'th-variation-swatches' ),
			'output'  => 'thvs_image_variation_attribute_options',
			'preview' => 'thvs_image_variation_attribute_preview'
		);

		$types['button'] = array(
			'title'   => esc_html__( 'Button', 'th-variation-swatches' ),
			'output'  => 'thvs_button_variation_attribute_options',
			'preview' => 'thvs_button_variation_attribute_preview'
		);

		$types = apply_filters( 'thvs_available_attributes_types', $types );

		if ( $type ) {
			return isset( $types[ $type ] ) ? $types[ $type ] : array();
		}

		return $types;
	}
endif;
//-------------------------------------------------------------------------------
// Color Variation Preview
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_color_variation_attribute_preview' ) ):
	function thvs_color_variation_attribute_preview( $term_id, $attribute, $fields ) {

		$key   = $fields[0]['id'];
		$value = sanitize_hex_color( get_term_meta( $term_id, $key, true ) );

		printf( '<div class="thvs-preview thvs-color-preview" style="background-color:%s;"></div>', esc_attr( $value ) );
	}
endif;

//-------------------------------------------------------------------------------
// Image Variation Preview
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_image_variation_attribute_preview' ) ):
	function thvs_image_variation_attribute_preview( $term_id, $attribute, $fields ) {

		$key           = $fields[0]['id'];
		$attachment_id = absint( get_term_meta( $term_id, $key, true ) );
		$image         = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
		if ( is_array( $image ) ) {
			printf( '<img src="%s" alt="" width="%d" height="%d" class="thvs-preview thvs-image-preview" />', esc_url( $image[0] ), $image[1], $image[2] );
		}
	}
endif;
//-------------------------------------------------------------------------------
// Get a Attribute taxonomy values
//-------------------------------------------------------------------------------

// @TODO: See wc_attribute_taxonomy_id_by_name function and wc_get_attribute or wc_get_attribute_taxonomies

if ( ! function_exists( 'thvs_get_wc_attribute_taxonomy' ) ):
	function thvs_get_wc_attribute_taxonomy( $attribute_name ) {

		$transient_name = sprintf( 'thvs_attribute_taxonomy_%s', $attribute_name );

		$cache = '';

			global $wpdb;

			$attribute_name = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $attribute_name ) );

			$attribute_taxonomy = $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name='{$attribute_name}'" );

			// $cache->set_transient( $attribute_taxonomy );
		// }

		return apply_filters( 'thvs_get_wc_attribute_taxonomy', $attribute_taxonomy, $attribute_name );
	}
endif;

//-------------------------------------------------------------------------------
// Check has attribute type like color or image etc.
//-------------------------------------------------------------------------------
if ( ! function_exists( 'thvs_wc_product_has_attribute_type' ) ):
	function thvs_wc_product_has_attribute_type( $type, $attribute_name ) {

		$attributes           = wc_get_attribute_taxonomies();
		$attribute_name_clean = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $attribute_name ) );

		// Created Attribute
		if ( 'pa_' === substr( $attribute_name, 0, 3 ) ) {

			$attribute = array_values(
				array_filter(
					$attributes, function ( $attribute ) use ( $type, $attribute_name_clean ) {
					return $attribute_name_clean === $attribute->attribute_name;
				}
				)
			);

			if ( ! empty( $attribute ) ) {
				$attribute = apply_filters( 'thvs_get_wc_attribute_taxonomy', $attribute[0], $attribute_name );
			} else {
				$attribute = thvs_get_wc_attribute_taxonomy( $attribute_name );
			}

			return apply_filters( 'thvs_wc_product_has_attribute_type', ( isset( $attribute->attribute_type ) && ( $attribute->attribute_type == $type ) ), $type, $attribute_name, $attribute );
		} else {
			return apply_filters( 'thvs_wc_product_has_attribute_type', false, $type, $attribute_name, null );
		}
	}
endif;

// Default Button Variation Attribute Options
if ( ! function_exists( 'thvs_default_button_variation_attribute_options' ) ) :
	function thvs_default_button_variation_attribute_options( $args = array() ) {

		$args = wp_parse_args(
			$args, array(
				'options'          => false,
				'attribute'        => false,
				'product'          => false,
				'selected'         => false,
				'name'             => '',
				'id'               => '',
				'class'            => '',
				'type'             => '',
				'assigned'         => '',
				'show_option_none' => esc_html__( 'Choose an option', 'th-variation-swatches' )
			)
		);

		// $type                  = $args[ 'type' ];
		$type                  = $args['type'] ? $args['type'] : 'button';
		$options               = $args['options'];
		$product               = $args['product'];
		$attribute             = $args['attribute'];
		$name                  = $args['name'] ? $args['name'] : wc_variation_attribute_name( $attribute );
		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class                 = $args['class'];
		$show_option_none      = $args['show_option_none'] ? true : false;
		$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : esc_html__( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		if ( $product ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr($type) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}

		if ( $args['show_option_none'] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options, true ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' .esc_attr($selected). '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
				}
			}
		}

		echo '</select>';

		$content = thvs_default_variable_item( $type, $options, $args );

		thvs_variable_items_wrapper( $content, $type, $args );

		
	}
endif;


//-------------------------------------------------------------------------------
// Button Variation Attribute Options
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_button_variation_attribute_options' ) ) :
	function thvs_button_variation_attribute_options( $args = array() ) {

		$args = wp_parse_args(
			$args, array(
				'options'          => false,
				'attribute'        => false,
				'product'          => false,
				'selected'         => false,
				'name'             => '',
				'id'               => '',
				'class'            => '',
				'type'             => '',
				'show_option_none' => esc_html__( 'Choose an option', 'th-variation-swatches' )
			)
		);

		$type                  = $args['type'];
		$options               = $args['options'];
		$product               = $args['product'];
		$attribute             = $args['attribute'];
		$name                  = $args['name'] ? $args['name'] : wc_variation_attribute_name( $attribute );
		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class                 = $args['class'];
		$show_option_none      = $args['show_option_none'] ? true : false;
		$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : esc_html__( 'Choose an option', 'th-variation-swatches' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		if ( $product && taxonomy_exists( $attribute ) ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}

		if ( $args['show_option_none'] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options, true ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' . esc_attr($selected) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
				}
			}
		}

		echo '</select>';

		$content = thvs_variable_item( $type, $options, $args );

		thvs_variable_items_wrapper( $content, $type, $args );
	}
endif;


if ( ! function_exists( 'thvs_default_variable_item' ) ):
	function thvs_default_variable_item( $type, $options, $args, $saved_attribute = array() ) {

		$product   = $args['product'];
		$attribute = $args['attribute'];
		$assigned  = $args['assigned'];


		$is_archive           = ( isset( $args['is_archive'] ) && $args['is_archive'] );
		$show_archive_tooltip = wc_string_to_bool( th_variation_swatches()->th_variation_swatches_get_option( 'show_tooltip_on_archive' ) );

		$data = '';

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
				$name  = uniqid( wc_variation_attribute_name( $attribute ) );
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options, true ) ) {

						$option = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) );

						$is_selected = ( sanitize_title( $args['selected'] ) == $term->slug );

						$selected_class = $is_selected ? 'selected' : '';
						$tooltip        = trim( apply_filters( 'thvs_variable_item_tooltip', $option, $term, $args ) );

						if ( $is_archive && ! $show_archive_tooltip ) {
							$tooltip = false;
						}

						$tooltip_html_attr       = ! empty( $tooltip ) ? sprintf( ' data-thvstooltip="%s"', esc_attr( $tooltip ) ) : '';
						$screen_reader_html_attr = $is_selected ? ' aria-checked="true"' : ' aria-checked="false"';


						if ( wp_is_mobile() ) {
							$tooltip_html_attr .= ! empty( $tooltip ) ? ' tabindex="2"' : '';
						}

						$type = isset( $assigned[ $term->slug ] ) ? $assigned[ $term->slug ]['type'] : $type;

						if ( ! isset( $assigned[ $term->slug ] ) || empty( $assigned[ $term->slug ]['image_id'] ) ) {
							$type = 'button';
						}

						$data .= sprintf( '<li %1$s class="variable-item %2$s-variable-item %2$s-variable-item-%3$s %4$s" title="%5$s" data-title="%5$s"  data-value="%3$s" role="radio" tabindex="0"><div class="variable-item-contents">', $screen_reader_html_attr . $tooltip_html_attr, esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), $option );

						switch ( $type ):

							case 'image':
								$attachment_id = $assigned[ $term->slug ]['image_id'];
								$image_size    = sanitize_text_field( th_variation_swatches()->th_variation_swatches_get_option( 'attribute_image_size' ) );
								$image         = wp_get_attachment_image_src( $attachment_id, apply_filters( 'thvs_product_attribute_image_size', $image_size, $attribute, $product ) );

								$data .= sprintf( '<img class="variable-item-image" aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $option ), esc_url( $image[0] ), esc_attr( $image[1] ), esc_attr( $image[2] ) );
								// $data .= $image_html;
								break;


							case 'button':
								$data .= sprintf( '<span class="variable-item-span variable-item-span-%s">%s</span>', esc_attr( $type ), $option );
								break;

							default:
								$data .= apply_filters( 'thvs_variable_default_item_content', '', $term, $args, $saved_attribute );
								break;
						endswitch;
						$data .= '</div></li>';
					}
				}
			} else {

				foreach ( $options as $option ) {
					

					$option = esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) );

					$is_selected = ( sanitize_title( $option ) == sanitize_title( $args['selected'] ) );

					$selected_class = $is_selected ? 'selected' : '';
					$tooltip        = trim( apply_filters( 'thvs_variable_item_tooltip', $option, $options, $args ) );


					if ( $is_archive && ! $show_archive_tooltip ) {
						$tooltip = false;
					}

					$tooltip_html_attr       = ! empty( $tooltip ) ? sprintf( 'data-thvstooltip="%s"', esc_attr( $tooltip ) ) : '';
					$screen_reader_html_attr = $is_selected ? ' aria-checked="true"' : ' aria-checked="false"';

					if ( wp_is_mobile() ) {
						$tooltip_html_attr .= ! empty( $tooltip ) ? ' tabindex="2"' : '';
					}

					$type = isset( $assigned[ $option ] ) ? $assigned[ $option ]['type'] : $type;

					if ( ! isset( $assigned[ $option ] ) || empty( $assigned[ $option ]['image_id'] ) ) {
						$type = 'button';
					}

					$data .= sprintf( '<li %1$s class="variable-item %2$s-variable-item %2$s-variable-item-%3$s %4$s" title="%5$s" data-title="%5$s"  data-value="%3$s" role="radio" tabindex="0"><div class="variable-item-contents">', $screen_reader_html_attr . $tooltip_html_attr, esc_attr( $type ), esc_attr( $option ), esc_attr( $selected_class ), esc_html( $option ) );

					switch ( $type ):

						case 'image':
							$attachment_id = $assigned[ $option ]['image_id'];
							$image_size    = sanitize_text_field( th_variation_swatches()->th_variation_swatches_get_option( 'attribute_image_size' ) );
							$image         = wp_get_attachment_image_src( $attachment_id, apply_filters( 'wvs_product_attribute_image_size', $image_size, $attribute, $product ) );

							$data .= sprintf( '<img class="variable-item-image" aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $option ), esc_url( $image[0] ), esc_attr( $image[1] ), esc_attr( $image[2] ) );
							// $data .= $image_html;
							break;


						case 'button':
							$data .= sprintf( '<span class="variable-item-span variable-item-span-%s">%s</span>', esc_attr( $type ), esc_html( $option ) );
							break;

						default:
							$data .= apply_filters( 'thvs_variable_default_item_content', '', $option, $args, array() );
							break;
					endswitch;
					$data .= '</div></li>';
				}
			}
		}

		return apply_filters( 'thvs_default_variable_item', $data, $type, $options, $args, array() );
	}
endif;
//-------------------------------------------------------------------------------
// Color Variation Attribute Options
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_color_variation_attribute_options' ) ) :
	function thvs_color_variation_attribute_options( $args = array() ) {

		$args = wp_parse_args(
			$args, array(
				'options'          => false,
				'attribute'        => false,
				'product'          => false,
				'selected'         => false,
				'name'             => '',
				'id'               => '',
				'class'            => '',
				'type'             => '',
				'show_option_none' => esc_html__( 'Choose an option', 'th-variation-swatches' )
			)
		);

		$type                  = $args['type'];
		$options               = $args['options'];
		$product               = $args['product'];
		$attribute             = $args['attribute'];
		$name                  = $args['name'] ? $args['name'] : wc_variation_attribute_name( $attribute );
		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class                 = $args['class'];
		$show_option_none      = $args['show_option_none'] ? true : false;
		$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : esc_html__( 'Choose an option', 'th-variation-swatches' ); 

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		if ( $product && taxonomy_exists( $attribute ) ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}

		if ( $args['show_option_none'] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options, true ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' . esc_attr($selected) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
				}
			}
		}

		echo '</select>';

		$content = thvs_variable_item( $type, $options, $args );

		thvs_variable_items_wrapper( $content, $type, $args );

	}
endif;
//-------------------------------------------------------------------------------
// Variation variable item
//-------------------------------------------------------------------------------
if ( ! function_exists( 'thvs_variable_item' ) ):
	function thvs_variable_item( $type, $options, $args, $saved_attribute = array() ) {

		$product   = $args['product'];
		$attribute = $args['attribute'];
		$data      = '';
      
		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
				$name  = uniqid( wc_variation_attribute_name( $attribute ) );
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options, true ) ) {

						// aria-checked="false"
						$option = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) );

						$is_selected    = ( sanitize_title( $args['selected'] ) == $term->slug );
						$selected_class = $is_selected ? 'selected' : '';
						$tooltip        = trim( apply_filters( 'thvs_variable_item_tooltip', $option, $term, $args ) );

						$tooltip_html_attr       = ! empty( $tooltip ) ? sprintf( ' data-thvstooltip="%s"', esc_attr( $tooltip ) ) : '';
						$screen_reader_html_attr = $is_selected ? ' aria-checked="true"' : ' aria-checked="false"';

						if ( wp_is_mobile() ) {
							$tooltip_html_attr .= ! empty( $tooltip ) ? ' tabindex="2"' : '';
						}

						$data .= sprintf( '<li %1$s class="variable-item %2$s-variable-item %2$s-variable-item-%3$s %4$s" title="%5$s" data-title="%5$s" data-value="%3$s" role="radio" tabindex="0"><div class="variable-item-contents">', $screen_reader_html_attr . $tooltip_html_attr, esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), $option );

						switch ( $type ):
							case 'color':

								$color = sanitize_hex_color( thvs_get_product_attribute_color( $term ) );
								$data  .= sprintf( '<span class="variable-item-span variable-item-span-%s" style="background-color:%s;"></span>', esc_attr( $type ), esc_attr( $color ) );
								break;

							case 'image':

								$attachment_id = apply_filters( 'thvs_product_global_attribute_image_id', absint( thvs_get_product_attribute_image( $term ) ), $term, $args );
								$image_size    = th_variation_swatches()->th_variation_swatches_get_option( 'attribute_image_size' );
								$image         = wp_get_attachment_image_src( $attachment_id, apply_filters( 'thvs_product_attribute_image_size', $image_size, $attribute, $product ) );

								$data .= sprintf( '<img class="variable-item-image" aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $option ), esc_url( $image[0] ), esc_attr( $image[1] ), esc_attr( $image[2] ) );

								break;


							case 'button':
								$data .= sprintf( '<span class="variable-item-span variable-item-span-%s">%s</span>', esc_attr( $type ), $option );
								break;

							case 'radio':
								$id   = uniqid( $term->slug );
								$data .= sprintf( '<input name="%1$s" id="%2$s" class="thvs-radio-variable-item" %3$s  type="radio" value="%4$s" data-title="%5$s" data-value="%4$s" /><label for="%2$s">%5$s</label>', $name, $id, checked( sanitize_title( $args['selected'] ), $term->slug, false ), esc_attr( $term->slug ), $option );
								break;

							default:
								$data .= apply_filters( 'thvs_variable_default_item_content', '', $term, $args, $saved_attribute );
								break;
						endswitch;
						$data .= '</div></li>';
					}
				}
			}
		}

		return apply_filters( 'thvs_variable_item', $data, $type, $options, $args, $saved_attribute );
	}
endif;

//-------------------------------------------------------------------------------
// Get Color Attribute Value
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_get_product_attribute_color' ) ):
	function thvs_get_product_attribute_color( $term ) {
		if ( ! is_object( $term ) ) {
			return false;
		}

		return get_term_meta( $term->term_id, 'product_attribute_color', true );
	}
endif;

//-------------------------------------------------------------------------------
// Get Image Attribute Value
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_get_product_attribute_image' ) ):
	function thvs_get_product_attribute_image( $term ) {
		if ( ! is_object( $term ) ) {
			return false;
		}

		return get_term_meta( $term->term_id, 'product_attribute_image', true );
	}
endif;
//-------------------------------------------------------------------------------
// Variation attribute options wrapper
//-------------------------------------------------------------------------------
if ( ! function_exists( 'thvs_variable_items_wrapper' ) ):
	function thvs_variable_items_wrapper( $contents, $type, $args, $saved_attribute = array() ) {

		$attribute = $args['attribute'];
		$options   = $args['options'];

		$css_classes = apply_filters( 'thvs_variable_items_wrapper_class', array( "{$type}-variable-wrapper" ), $type, $args, $saved_attribute );

		$clear_on_reselect = th_variation_swatches()->th_variation_swatches_get_option( 'clear_on_reselect' ) ? 'reselect-clear' : '';

		array_push( $css_classes, $clear_on_reselect );

		$data = sprintf( '<ul role="radiogroup" aria-label="%1$s"  class="variable-items-wrapper %2$s" data-attribute_name="%3$s" data-attribute_values="%4$s">%5$s</ul>', esc_attr( wc_attribute_label( $attribute ) ), trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ), wc_esc_json( wp_json_encode( array_values( $options ) ) ), $contents );

		echo apply_filters( 'thvs_variable_items_wrapper', $data, $contents, $type, $args, $saved_attribute );
	}
endif;
//-------------------------------------------------------------------------------
// Generate Option HTML
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_variation_attribute_options_html' ) ):
	function thvs_variation_attribute_options_html( $html, $args ) {

		if ( apply_filters( 'default_thvs_variation_attribute_options_html', false, $args, $html ) ) {
			return $html;
		}

		// WooCommerce Product Bundle Fixing
		if ( isset( $_POST['action'] ) && $_POST['action'] === 'woocommerce_configure_bundle_order_item' ) {
			return $html;
		}

		$product = $args['product'];

		$is_default_to_image          = apply_filters( 'thvs_is_default_to_image', ! ! ( th_variation_swatches()->th_variation_swatches_get_option( 'default_to_image' ) ), $args );
		$is_default_to_button         = apply_filters( 'thvs_is_default_to_button', ! ! ( th_variation_swatches()->th_variation_swatches_get_option( 'default_to_button' ) ), $args );
		$default_image_type_attribute = apply_filters( 'thvs_default_image_type_attribute', th_variation_swatches()->th_variation_swatches_get_option( 'default_image_type_attribute' ), $args );

		$is_default_to_image_button = ( $is_default_to_image || $is_default_to_button );

		$use_transient  = wc_string_to_bool( th_variation_swatches()->th_variation_swatches_get_option( 'use_transient' ) );
		$currency       = get_woocommerce_currency();
		$transient_name = sprintf( 'thvs_variation_attribute_options_html_%s_%s_%s', $product->get_id(), ( wc_variation_attribute_name( $args['attribute'] ) . $args['selected'] ), $currency );
		$cache          = '';

		// Clear cache
		if ( isset( $_GET['thvs_clear_transient'] ) ) {
			$cache->delete_transient();
		}

		// Return cache. We already cache full template on pro so we don't have to cache when pro is active.
		if ( $use_transient ) {
			$transient_html = $cache->get_transient( $transient_name );
			if ( ! empty( $transient_html ) ) {
				return $transient_html . '<!-- from thvs_variation_attribute_options_html  -->';
			}
		}

		ob_start();

		if ( apply_filters( 'thvs_no_individual_settings', true, $args, $is_default_to_image, $is_default_to_button ) ) {

			$attributes = $product->get_variation_attributes();
			$variations = $product->get_available_variations();

			$available_type_keys = array_keys( thvs_available_attributes_types() );
			$available_types     = thvs_available_attributes_types();

			$default             = true;

			foreach ( $available_type_keys as $type ) {
				if ( thvs_wc_product_has_attribute_type( $type, $args['attribute'] ) ) {

					$output_callback = apply_filters( 'thvs_variation_attribute_options_callback', $available_types[ $type ]['output'], $available_types, $type, $args, $html );
					$output_callback(
						apply_filters(
							'thvs_variation_attribute_options_args', wp_parse_args(
								$args, array(
									'options'    => $args['options'],
									'attribute'  => $args['attribute'],
									'product'    => $product,
									'selected'   => $args['selected'],
									'type'       => $type,
									'is_archive' => ( isset( $args['is_archive'] ) && $args['is_archive'] )
								)
							)
						)
					);
					$default = false;
				}
			}

			if ( $default && $is_default_to_image_button ) {

				if ( $default_image_type_attribute === '__max' ) {

					$attribute_counts = array();
					foreach ( $attributes as $attr_key => $attr_values ) {
						$attribute_counts[ $attr_key ] = count( $attr_values );
					}

					$max_attribute_count = max( $attribute_counts );
					$attribute_key       = array_search( $max_attribute_count, $attribute_counts );

				} elseif ( $default_image_type_attribute === '__min' ) {
					$attribute_counts = array();
					foreach ( $attributes as $attr_key => $attr_values ) {
						$attribute_counts[ $attr_key ] = count( $attr_values );
					}
					$min_attribute_count = min( $attribute_counts );
					$attribute_key       = array_search( $min_attribute_count, $attribute_counts );

				} elseif ( $default_image_type_attribute === '__first' ) {
					$attribute_keys = array_keys( $attributes );
					$attribute_key  = current( $attribute_keys );
				} else {
					$attribute_key = $default_image_type_attribute;
				}

				$selected_attribute_name = wc_variation_attribute_name( $attribute_key );


				$default_attribute_keys = array_keys( $attributes );
				$default_attribute_key  = current( $default_attribute_keys );
				$default_attribute_name = wc_variation_attribute_name( $default_attribute_key );

				$current_attribute      = $args['attribute'];
				$current_attribute_name = wc_variation_attribute_name( $current_attribute );


				if ( $is_default_to_image ) {

					$assigned = array();

					foreach ( $variations as $variation_key => $variation ) {

						$attribute_name = isset( $variation['attributes'][ $selected_attribute_name ] ) ? $selected_attribute_name : $default_attribute_name;

						$attribute_value = esc_html( $variation['attributes'][ $attribute_name ] );

						$assigned[ $attribute_name ][ $attribute_value ] = array(
							'image_id'     => $variation['image_id'],
							'variation_id' => $variation['variation_id'],
							'type'         => ( empty( $variation['image_id'] ) ? 'button' : 'image' ),
						);
					}

					$type     = ( empty( $assigned[ $current_attribute_name ] ) ? 'button' : 'image' );
					$assigned = ( isset( $assigned[ $current_attribute_name ] ) ? $assigned[ $current_attribute_name ] : array() );

					if ( $type === 'button' && ! $is_default_to_button ) {
						$type = 'select';
					}

					thvs_default_image_variation_attribute_options(
						apply_filters(
							'thvs_variation_attribute_options_args', wp_parse_args(
								$args, array(
									'options'    => $args['options'],
									'attribute'  => $args['attribute'],
									'product'    => $product,
									'selected'   => $args['selected'],
									'assigned'   => $assigned,
									'type'       => $type,
									'is_archive' => ( isset( $args['is_archive'] ) && $args['is_archive'] )
								)
							)
						)
					);

				} elseif ( $is_default_to_button ) {

					thvs_default_button_variation_attribute_options(
						apply_filters(
							'thvs_variation_attribute_options_args', wp_parse_args(
								$args, array(
									'options'    => $args['options'],
									'attribute'  => $args['attribute'],
									'product'    => $product,
									'selected'   => $args['selected'],
									'is_archive' => ( isset( $args['is_archive'] ) && $args['is_archive'] )
								)
							)
						)
					);
				} else {
					echo $html;
				}
			} elseif ( $default && ! $is_default_to_image_button ) {
				echo $html;
			}

		}

		$data = ob_get_clean();

		// Set cache
		if ( $use_transient ) {
			$cache->set_transient( $data, HOUR_IN_SECONDS );
		}

		$html = apply_filters( 'thvs_variation_attribute_options_html', $data, $args, $is_default_to_image, $is_default_to_button );

		return $html;
	}
endif;
//-------------------------------------------------------------------------------
// Image Variation Attribute Options
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_image_variation_attribute_options' ) ) :
	function thvs_image_variation_attribute_options( $args = array() ) {

		$args = wp_parse_args(
			$args, array(
				'options'          => false,
				'attribute'        => false,
				'product'          => false,
				'selected'         => false,
				'name'             => '',
				'id'               => '',
				'class'            => '',
				'type'             => '',
				'show_option_none' => esc_html__( 'Choose an option', 'th-variation-swatches' )
			)
		);

		$type                  = $args['type'];
		$options               = $args['options'];
		$product               = $args['product'];
		$attribute             = $args['attribute'];
		$name                  = $args['name'] ? $args['name'] : wc_variation_attribute_name( $attribute );
		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class                 = $args['class'];
		$show_option_none      = $args['show_option_none'] ? true : false;
		$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : esc_html__( 'Choose an option', 'th-variation-swatches' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}


		if ( $product && taxonomy_exists( $attribute ) ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}


		if ( $args['show_option_none'] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options, true ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( esc_attr( $args['selected'] ), $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' . esc_attr($selected). '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
				}
			}
		}

		echo '</select>';

		$content = thvs_variable_item( $type, $options, $args );

		echo thvs_variable_items_wrapper( $content, $type, $args );
	}
endif;
//-------------------------------------------------------------------------------
// Extra Product Option Terms for WC 3.6+
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_product_option_terms' ) ) :
	function thvs_product_option_terms( $attribute_taxonomy, $i, $attribute ) {
		if ( in_array( $attribute_taxonomy->attribute_type, array_keys( thvs_available_attributes_types() ) ) ) {

			?>
			<select multiple="multiple" data-placeholder="<?php esc_attr_e( 'Select terms', 'th-variation-swatches' ); ?>" class="multiselect attribute_values wc-enhanced-select" name="attribute_values[<?php echo esc_attr( $i ); ?>][]">
				<?php
				$args      = array(
					'orderby'    => 'name',
					'hide_empty' => 0,
				);
				$all_terms = get_terms( $attribute->get_taxonomy(), apply_filters( 'woocommerce_product_attribute_terms', $args ) );
				if ( $all_terms ) {
					foreach ( $all_terms as $term ) {
						$options = $attribute->get_options();
						$options = ! empty( $options ) ? $options : array();
						echo '<option value="' . esc_attr( $term->term_id ) . '"' . wc_selected( $term->term_id, $options ) . '>' . esc_attr( apply_filters( 'woocommerce_product_attribute_term_name', $term->name, $term ) ) . '</option>';
					}
				}
				?>
			</select>
			<button class="button plus select_all_attributes"><?php esc_html_e( 'Select all', 'th-variation-swatches' ); ?></button>
			<button class="button minus select_no_attributes"><?php esc_html_e( 'Select none', 'th-variation-swatches' ); ?></button>

			<?php
			$fields = thvs_taxonomy_meta_fields( $attribute_taxonomy->attribute_type );

			if ( ! empty( $fields ) ): ?>
				<button disabled="disabled" class="button fr plus wvs_add_new_attribute" data-dialog_title="<?php printf( esc_html__( 'Add new %s', 'th-variation-swatches' ), esc_attr( $attribute_taxonomy->attribute_label ) ) ?>"><?php esc_html_e( 'Add new', 'th-variation-swatches' ); ?></button>
			<?php else: ?>
				<button class="button fr plus add_new_attribute"><?php esc_html_e( 'Add new', 'th-variation-swatches' ); ?></button>
			<?php endif; ?>
			<?php
		}
	}
endif;
//-------------------------------------------------------------------------------
// Add attribute types on WooCommerce taxonomy
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_product_attributes_types' ) ):
	function thvs_product_attributes_types( $selector ) {

		foreach ( thvs_available_attributes_types() as $key => $options ) {
			$selector[ $key ] = $options['title'];
		}

		return $selector;
	}
endif;

//-------------------------------------------------------------------------------
// Enable Ajax Variation
//-------------------------------------------------------------------------------

if ( ! function_exists( 'thvs_ajax_variation_threshold' ) ):
	function thvs_ajax_variation_threshold() {
		return absint( th_variation_swatches()->th_variation_swatches_get_option( 'threshold' ) );
	}
endif;

//-------------------------------------------------------------------------------
// Swatch clear transient
//-------------------------------------------------------------------------------
function thvs_clear_transient() {

	// Increments the transient version to invalidate cache.
	if ( method_exists( 'WC_Cache_Helper', 'get_transient_version' ) ) {
		WC_Cache_Helper::get_transient_version( 'thvs_template', true );
		WC_Cache_Helper::get_transient_version( 'thvs_attribute_taxonomy', true );
		WC_Cache_Helper::get_transient_version( 'thvs_archive_template', true );
		WC_Cache_Helper::get_transient_version( 'thvs_variation_attribute_options_html', true );
	}

	if ( method_exists( 'WC_Cache_Helper', 'invalidate_cache_group' ) ) {
		WC_Cache_Helper::invalidate_cache_group( 'thvs_template' );
		WC_Cache_Helper::invalidate_cache_group( 'thvs_attribute_taxonomy' );
		WC_Cache_Helper::invalidate_cache_group( 'thvs_archive_template' );
		WC_Cache_Helper::invalidate_cache_group( 'thvs_variation_attribute_options_html' );
	}
}
/****************************/
//FOR FLITER ATTRIBUTE Widget
/****************************/
if ( ! function_exists( 'thvs_filter_add_html' ) ):
function thvs_filter_add_html( $term_html, $term, $link, $count ){
	$attribute_taxonomies = wc_get_attribute_taxonomies();
    if ( $attribute_taxonomies ){
            foreach ( $attribute_taxonomies as $tax ){
            if ( $tax->attribute_name == wc_attribute_taxonomy_slug($term->taxonomy)){
               if($tax->attribute_type =='color'){                                
           
       
				$color = sanitize_hex_color( thvs_get_product_attribute_color( $term ) );

				if ( $count > 0 || $option_is_set ) {
							
							
							$term_html = '<a class="thvs-attribute-item variable-item-contents" rel="nofollow" href="' . esc_url( $link ) . '">
						
							<span class="variable-item-span variable-item-span-'.esc_attr($tax->attribute_type).'" style="background-color:'.esc_attr($color).'"></span>
						
							</a>';
							
						} else {
							$link      = false;
							$term_html = '<span>' . esc_html( $term->name ) . '</span>';
						}
			   }elseif($tax->attribute_type =='image'){
            
						 $attachment_id = apply_filters( 'thvs_product_global_attribute_image_id', absint( thvs_get_product_attribute_image( $term ) ), $term, $args );
			              $image_src = wp_get_attachment_image_src( $attachment_id);
				if ( $count > 0 || $option_is_set ) {
							
							
							$term_html = '<a class="thvs-attribute-item variable-item-contents" rel="nofollow" href="' . esc_url( $link ) . '">
						
							<span class="variable-item-span variable-item-span-'.esc_attr($tax->attribute_type).'"><img class="variable-item-image" aria-hidden="true" alt="'.esc_attr($term->name).'" src="'.esc_url( $image_src[0] ).'" /></span>
						
							</a>';	
							
						} else {
							$link      = false;
							$term_html = '<span>' . esc_html( $term->name ) . '</span>';
						}
			 }elseif($tax->attribute_type =='button'){
		                  if ( $count > 0 || $option_is_set ) {
						
						
						$term_html = '<a class="thvs-attribute-item variable-item-contents" rel="nofollow" href="' . esc_url( $link ) . '">
					
						<span class="variable-item-span variable-item-span-'.esc_attr($tax->attribute_type).'">' . esc_html( $term->name ) . '</span>
					
						</a>';
						
					} else {
						$link      = false;
						$term_html = '<span>' . esc_html( $term->name ) . '</span>';
					}

			     }

			 } 
         }
     }		
    
	return $term_html;
}

endif;