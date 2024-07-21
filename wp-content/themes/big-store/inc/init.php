<?php 
/**
 * all file includeed
 *
 * @param  
 * @return mixed|string
 */
get_template_part( 'inc/admin-function');
get_template_part( 'inc/header-function');
get_template_part( 'inc/footer-function');
get_template_part( 'inc/blog-function');
// theme-option
include_once(ABSPATH.'wp-admin/includes/plugin.php');
if ( !is_plugin_active('big-store-pro/big-store-pro.php') ) {
  get_template_part( 'lib/th-option/th-option');
  get_template_part( 'lib/th-option/notify');
}
//breadcrumbs
get_template_part( 'lib/breadcrumbs/breadcrumbs');
//page-post-meta
get_template_part( 'lib/page-meta-box/bigstore-page-meta-box');
//custom-style
get_template_part( 'inc/big-store-custom-style');

//pagination
get_template_part( 'inc/pagination/pagination');
get_template_part( 'inc/pagination/infinite-scroll');

// customizer
get_template_part('customizer/models/class-big-store-singleton');
get_template_part('customizer/models/class-big-store-defaults-models');
get_template_part('customizer/repeater/class-big-store-repeater');
get_template_part('customizer/extend-customizer/class-big-store-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-big-store-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-big-store-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-big-store-customizer-range-value-control');
get_template_part('customizer/customizer-scroll/class/class-big-store-customize-control-scroll');
get_template_part('customizer/customize-focus-section/big-store-focus-section');
get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');
get_template_part('customizer/sortable/class-open-control-sortable');
get_template_part('customizer/background/class-big-store-background-image-control');
get_template_part('customizer/customizer-tabs/class-big-store-customize-control-tabs');
get_template_part('customizer/customizer-toggle/class-big-store-toggle-control');

get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer-constant');
get_template_part('customizer/customizer');
/******************************/
// woocommerce
/******************************/
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');

/******************************/
// Probutton
/******************************/
get_template_part('customizer/pro-button/class-customize');
get_template_part( 'inc/footer');
