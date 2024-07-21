<?php
/**
 * Lists options page
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist\Options
 * @version 3.0.0
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly

/**
 * APPLY_FILTERS: yith_wcwl_list_options
 *
 * Filter the options available in the 'All wishlists' tab.
 *
 * @param array $options Array of options
 *
 * @return array
 */
return apply_filters(
	'yith_wcwl_list_options',
	array(
		'lists' => array(
			'lists_section_start' => array(
				'type' => 'title',
				'desc' => '',
				'id'   => 'yith_wcwl_lists_settings',
			),
			'wishlists'           => array(
				'name'                 => __( 'Wishlists', 'yith-woocommerce-wishlist' ),
				'type'                 => 'yith-field',
				'yith-type'            => 'list-table',
				'class'                => '',
				'list_table_class'     => 'YITH_WCWL_Admin_Table',
				'list_table_class_dir' => YITH_WCWL_INC . 'tables/class-yith-wcwl-admin-table.php',
				'title'                => __( 'Wishlists', 'yith-woocommerce-wishlist' ),
				'search_form'          => array(
					'text'     => __( 'Search list', 'yith-woocommerce-wishlist' ),
					'input_id' => 'search_list',
				),
				'id'                   => 'wishlist-filter',
			),
			'lists_section_end'   => array(
				'type' => 'sectionend',
				'id'   => 'yith_wcwl_lists_settings',
			),
		),
	)
);
