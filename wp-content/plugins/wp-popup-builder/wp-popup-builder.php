<?php
if (!defined('ABSPATH')) exit;
/*
  Plugin Name: WP Popup Builder
  Description: WP Popup Builder is a powerfull tool to create amazing popup form for your site. Its drag and drop feature helps to create form in very easy step without having knowledge of coding. And also you can easily design and edit your form using easy to use interface. It has ready to use "Pre Built Popup" to give a quick start for your form, Also you can create your own design by choosing three different "Layouts" available. Images, Heading, Text, Button and even external form can be added to it. <a href="https://themehunk.com/plugins/" target="_blank">Get more plugins for your website on <strong>ThemeHunk</strong></a>
  Version: 1.3.4
  Requires at least: 5.5
  Tested up to:  6.3.2
  Author: ThemeHunk
  Author URI: http://www.themehunk.com/
  Text Domain: wppb
 */
if (!function_exists('wppb_loaded_pro')) {
  define('WPPB_URL', plugin_dir_url(__FILE__));
  define('WPPB_PATH', plugin_dir_path(__FILE__));
  define("WPPB_PAGE_URL", admin_url('admin.php?page=wppb'));
  include_once(WPPB_PATH . 'admin/themehunk-menu/admin-menu.php');
  include_once(WPPB_PATH . 'admin/inc.php');
  include_once(WPPB_PATH . 'front/shortcode.php');
  include_once(WPPB_PATH . 'front/load.php');


  add_action('plugins_loaded', 'wppb_loaded');

  function wppb_loaded()
  {
    $instance  = wppb::get();
    $load_Files =  wppb::load_file();
    foreach ($load_Files as $value) {
      include_once(WPPB_PATH . 'admin/' . esc_html($value) . '.php');
    }
    wppb_shortcode::get();
    wppb_load::get();
  }

  // show notify
  include_once(plugin_dir_path(__FILE__) . 'notify/notify.php');

  add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wppb_plugin_action_links', 10, 1);

  add_filter('plugin_row_meta', 'plugin_meta_links', 10, 2);

  if (!function_exists('wppb_plugin_action_links')) {

    function wppb_plugin_action_links($links)
    {

      $settings_page = add_query_arg(array('page' => 'wppb'), admin_url('admin.php'));

      $settings_link = '<a href="' . esc_url($settings_page) . '">' . __('Settings', 'wppb') . '</a>';

      array_unshift($links, $settings_link);

      return $links;
    }
  }

  /**
   * Add links to plugin's description in plugins table
   *
   * @param array  $links  Initial list of links.
   * @param string $file   Basename of current plugin.
   *
   * @return array
   */
  if (!function_exists('plugin_meta_links')) {

    function plugin_meta_links($links, $file)
    {

      if ($file !== plugin_basename(__FILE__)) {
        return $links;
      }

      $demo_link = '<a target="_blank" href="https://themehunk.com/wp-popup-builder-pro/#demos" title="' . __('Live Demo', 'wppb') . '"><span class="dashicons  dashicons-laptop"></span>' . __('Live Demo', 'wppb') . '</a>';

      $doc_link = '<a target="_blank" href="https://themehunk.com/docs/wp-popup-builder/" title="' . __('Documentation', 'wppb') . '"><span class="dashicons  dashicons-search"></span>' . __('Documentation', 'wppb') . '</a>';

      $support_link = '<a target="_blank" href="https://themehunk.com/contact-us/" title="' . __('Support', 'wppb') . '"><span class="dashicons  dashicons-admin-users"></span>' . __('Support', 'wppb') . '</a>';

      $pro_link = '<a target="_blank" href="https://themehunk.com/wp-popup-builder-pro/" title="' . __('Premium Version', 'wppb') . '"><span class="dashicons  dashicons-cart"></span>' . __('Premium Version', 'wppb') . '</a>';

      $links[] = $demo_link;
      $links[] = $doc_link;
      $links[] = $support_link;
      $links[] = $pro_link;

      return $links;
    } // plugin_meta_links

  }
  
}