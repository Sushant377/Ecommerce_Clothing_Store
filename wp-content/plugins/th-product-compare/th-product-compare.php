<?php
/*
* Plugin Name: TH Product Compare
* Description: Th Product Compare plugin helps you to create interactive product comparison tables and allow customers to compare their products on their WooCommerce Store. It will also increases engagement and conversion rates. This plugin lets the customers to compare different product and display fields like Image, Title, Rating, Price, Add to cart, Description, Availability and SKU. You can display Compare button or link with your products and also add Number of Product to Compare in your comparison table. It is Woocommerce Compatible, fully Responsive, and user friendly plugin which make your buying decision more easy.
* Version: 1.2.9
* Requires at least:       5.0
* Tested up to:            6.4
* WC requires at least:    3.2
* WC tested up to:         8.3
* Author: ThemeHunk
* Author URI: http://www.themehunk.com/
* Text Domain: th-product-compare
 */
if (!defined('ABSPATH')) exit;
if (!function_exists('tpcp_loaded')) {

    if (!defined('TH_PRODUCT_FILE')) {
  define('TH_PRODUCT_FILE', __FILE__);
}
    define('TH_PRODUCT_URL', plugin_dir_url(__FILE__));
    define('TH_PRODUCT_PATH', plugin_dir_path(__FILE__));
    define('TH_PRODUCT_BASE_NAME', __FILE__);

    include_once(TH_PRODUCT_PATH . 'admin/themehunk-menu/admin-menu.php');
    include_once(TH_PRODUCT_PATH . 'admin/inc.php');
    include_once(TH_PRODUCT_PATH . 'notice/th-notice.php');
    include_once(TH_PRODUCT_PATH . 'admin/front/front.php');
    include_once(TH_PRODUCT_PATH . 'admin/front/product.php');
    include_once(TH_PRODUCT_PATH . 'admin/back/init.php');
    add_action('plugins_loaded', 'th_product_compare_loaded');
    function th_product_compare_loaded()
    {
        $frontObj = new th_product_compare_shortcode();
        th_compare_admin::get();
        th_product_compare::get();
        $frontObj->get();
        th_product_compare_return::get();
    }

}