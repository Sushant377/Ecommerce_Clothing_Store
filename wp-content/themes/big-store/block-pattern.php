<?php
/**
 * Big Store: Block Patterns
 *
 * @since Big Store
 */

/**
 * Registers block patterns and categories.
 *
 * @since Big Store
 *
 * @return void
 */
  function big_store_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'big-store' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'big-store' ) ),
		'header'   => array( 'label' => __( 'Headers', 'big-store' ) ),
		'query'    => array( 'label' => __( 'Query', 'big-store' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'big-store' ) ),
		'bigstore'    => array( 'label' => __( 'Big Store', 'big-store' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Big Store
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'bigstore_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'ribbon',
		'pricing',
		'service',
		'about',
		'banner-ribbon',
		'testimonials'
	);

	if (class_exists('WooCommerce')) {
		// $block_patterns [] = 'all-products';

		array_push($block_patterns, 'all-products','new-products');
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Big Store
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'bigstore_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'bigstore/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'big_store_register_block_patterns', 9 );