<?php

/**
 * Plugin Name:             TH Variation Swatches
 * Plugin URI:              https://themehunk.com/th-variation-swatches/
 * Description:             Beautiful Colors, Images and Buttons Variation Swatches For WooCommerce Product Attributes. This plugin will replace default swatches to professionally styled and colourful swatches. Plugin interface is User-friendly which allows you to edit variations seamlessly. <a href="https://themehunk.com/plugins/" target="_blank">Get more plugins for your website on <strong>ThemeHunk</strong></a>
 * Version:                 1.3.1
 * Author:                  ThemeHunk
 * Author URI:              https://themehunk.com
 * Requires at least:       4.8
 * Tested up to:            6.3.2
 * WC requires at least:    3.2
 * WC tested up to:         7.4
 * Domain Path:             /languages
 * Text Domain:             th-variation-swatches
 */
if (!defined('ABSPATH')) exit;

if (!defined('TH_VARIATION_SWATCHES_PLUGIN_FILE')) {
  define('TH_VARIATION_SWATCHES_PLUGIN_FILE', __FILE__);
}

if (!defined('TH_VARIATION_SWATCHES_PLUGIN_URI')) {
  define('TH_VARIATION_SWATCHES_PLUGIN_URI', plugin_dir_url(__FILE__));
}

if (!defined('TH_VARIATION_SWATCHES_PLUGIN_PATH')) {
  define('TH_VARIATION_SWATCHES_PLUGIN_PATH', plugin_dir_path(__FILE__));
}

if (!defined('TH_VARIATION_SWATCHES_PLUGIN_DIRNAME')) {
  define('TH_VARIATION_SWATCHES_PLUGIN_DIRNAME', dirname(plugin_basename(__FILE__)));
}

if (!defined('TH_VARIATION_SWATCHES_PLUGIN_BASENAME')) {
  define('TH_VARIATION_SWATCHES_PLUGIN_BASENAME', plugin_basename(__FILE__));
}

if (!defined('TH_VARIATION_SWATCHES_IMAGES_URI')) {
  define('TH_VARIATION_SWATCHES_IMAGES_URI', trailingslashit(plugin_dir_url(__FILE__) . 'images'));
}

if (!defined('TH_VARIATION_SWATCHES_VERSION')) {
  $plugin_data = get_file_data(__FILE__, array('version' => 'Version'), false);
  define('TH_VARIATION_SWATCHES_VERSION', $plugin_data['version']);
}

if (!class_exists('TH_Variation_Swatches') && (!class_exists('TH_Variation_Swatches_Pro'))) {

// Plugin is compatible with HPOS.
  include_once(TH_VARIATION_SWATCHES_PLUGIN_PATH . 'inc/themehunk-menu/admin-menu.php');
  require_once("inc/thvs.php");
  
}

function thvs_plugin_action_links($links)
{
  $settings_page = add_query_arg(array('page' => 'th-variation-swatches'), admin_url());
  $settings_link = '<a href="' . esc_url($settings_page) . '">' . __('Settings', 'th-variation-swatches') . '</a>';
  array_unshift($links, $settings_link);
  return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'thvs_plugin_action_links', 10, 1);

if (!function_exists('thvs_plugin_meta_links')) {

  function thvs_plugin_meta_links($links, $file)
  {

    if ($file !== plugin_basename(__FILE__)) {

      return $links;
    }

    $doc_link = '<a target="_blank" href="' . esc_url('https://themehunk.com/docs/th-variation-swatches-plugin/') . '" title="' . __('Documentation', 'th-variation-swatches') . '"><span class="dashicons  dashicons-search"></span>' . __('Documentation', 'th-variation-swatches') . '</a>';
    $support_link = '<a target="_blank" href="' . esc_url('https://themehunk.com/contact-us/') . '" title="' . __('Support', 'th-variation-swatches') . '"><span class="dashicons  dashicons-admin-users"></span>' . __('Support', 'th-variation-swatches') . '</a>';
    $pro_link = '<a target="_blank" href="' . esc_url('https://themehunk.com/th-variation-swatches/') . '" title="' . __('Premium Version', 'th-variation-swatches') . '"><span class="dashicons  dashicons-cart"></span>' . __('Premium Version', 'th-variation-swatches') . '</a>';

    $links[] = $doc_link;
    $links[] = $support_link;
    $links[] = $pro_link;

    return $links;
  } // plugin_meta_links

}
add_filter('plugin_row_meta', 'thvs_plugin_meta_links', 10, 2);
