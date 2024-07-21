<?php
/**
 * Plugin Name:             All In One Woo Cart
 * Plugin URI:              https://themehunk.com/th-all-in-one-woo-cart/
 * Description:             TH All In One Woo Cart is a perfect choice to display Cart on your website and improve your potential customer’s buying experience. This plugin will add Floating Cart in your website.  Customers can update or remove products from the cart without reloading the cart continuously. It is a fully Responsive, mobile friendly plugin and supports many advanced features.
 * Version:                 2.0.2
 * Author:                  ThemeHunk
 * Author URI:              https://themehunk.com
 * Requires at least:       4.8
 * Tested up to:            6.4.3
 * WC requires at least:    3.2
 * WC tested up to:         7.5
 * Domain Path:             /languages
 * Text Domain:             taiowc
 * Tags: floating cart,ajax,cart,woocommerce,woocommerce cart,slider
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if (!defined('TAIOWC_PLUGIN_FILE')) {
    define('TAIOWC_PLUGIN_FILE', __FILE__);
}

if (!defined('TAIOWC_PLUGIN_URI')) {
    define( 'TAIOWC_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

if (!defined('TAIOWC_PLUGIN_PATH')) {
    define( 'TAIOWC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if (!defined('TAIOWC_PLUGIN_DIRNAME')) {
    define( 'TAIOWC_PLUGIN_DIRNAME', dirname( plugin_basename( __FILE__ ) ) );
}

if (!defined('TAIOWC_PLUGIN_BASENAME')) {
    define( 'TAIOWC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if (!defined('TAIOWC_IMAGES_URI')) {
define( 'TAIOWC_IMAGES_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'images' ) );
}

if (!defined('TAIOWC_VERSION')){
$plugin_data = get_file_data(__FILE__, array('version' => 'Version'), false);
define('TAIOWC_VERSION', $plugin_data['version']);
} 

if (!class_exists('Taiowc') && !class_exists('Taiowcp_Main')){

include_once(TAIOWC_PLUGIN_PATH . 'inc/themehunk-menu/admin-menu.php');
require_once("inc/taiowc.php");

}              

/**
* Add the settings link to plugin row
*
* @param array $links - Links for the plugin
* @return array - Links
 */

function taiowc_plugin_action_links($links){
          $settings_page = add_query_arg(array('page' => 'taiowc'), admin_url());
          $settings_link = '<a href="'.esc_url($settings_page).'">'.__('Settings', 'taiowc' ).'</a>';
          array_unshift($links, $settings_link);
          return $links;
        }
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'taiowc_plugin_action_links', 10, 1);

/**
   * Add links to plugin's description in plugins table
   *
   * @param array  $links  Initial list of links.
   * @param string $file   Basename of current plugin.
   *
   * @return array
   */
if ( ! function_exists( 'taiowc_plugin_meta_links' ) ){

  function taiowc_plugin_meta_links($links, $file){

    if ($file !== plugin_basename(__FILE__)) {
      return $links;
    }

    $demo_link = '<a target="_blank" href="#" title="' . __('Live Demo', 'taiowc') . '"><span class="dashicons  dashicons-laptop"></span>' . __('Live Demo', 'taiowc') . '</a>';

    $doc_link = '<a target="_blank" href="'.esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/').'" title="' . __('Documentation', 'taiowc') . '"><span class="dashicons  dashicons-search"></span>' . __('Documentation', 'taiowc') . '</a>';

    $support_link = '<a target="_blank" href="'.esc_url('https://themehunk.com/th-all-in-one-woo-cart/').'" title="' . __('Support', 'taiowc') . '"><span class="dashicons  dashicons-admin-users"></span>' . __('Support', 'taiowc') . '</a>';

    $pro_link = '<a target="_blank" href="'. esc_url('https://themehunk.com/th-all-in-one-woo-cart/').'" title="' . __('Premium Version', 'taiowc') . '"><span class="dashicons  dashicons-cart"></span>' . __('Premium Version', 'taiowc') . '</a>';

    $links[] = $demo_link;
    $links[] = $doc_link;
    $links[] = $support_link;
    $links[] = $pro_link;

    return $links;

  } // plugin_meta_links

}
add_filter('plugin_row_meta', 'taiowc_plugin_meta_links', 10, 2);


/****************/
//Block registered
/****************/

function taiowc_register_blocks() {
  $blocks = array(
      array(
          'name'           => 'taiowc/taiowc',
          'script_handle'  => 'taiowc',
          'editor_style'   => 'taiowc-editor-style',
          'frontend_style' => 'taiowc-frontend-style',
          'render_callback' => 'taiowc_blocks_render_callback',
          'localize_data'  => array(
              'adminUrltaiowc' => admin_url('admin.php?page=taiowc'),
          ),
      ),
  );

  foreach ( $blocks as $block ) {
      // Register JavaScript file
      wp_register_script(
          $block['script_handle'],
          TAIOWC_PLUGIN_URI . 'build/' . $block['script_handle'] . '.js',
          array( 'wp-blocks', 'wp-element', 'wp-editor' ),
          filemtime( TAIOWC_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.js' )
      );

      // Register editor style
      wp_register_style(
          $block['editor_style'],
          TAIOWC_PLUGIN_URI . 'build/' . $block['script_handle'] . '.css',
          array( 'wp-edit-blocks' ),
          filemtime( TAIOWC_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.css' )
      );

      // Register front end block style
      wp_register_style(
          $block['frontend_style'],
          TAIOWC_PLUGIN_URI . 'build/style-' . $block['script_handle'] . '.css',
          array(),
          filemtime( TAIOWC_PLUGIN_PATH . '/build/style-' . $block['script_handle'] . '.css' )
      );

      // Localize the script with data
      if ( isset( $block['localize_data'] ) && ! is_null( $block['localize_data'] ) ) {
          wp_localize_script(
              $block['script_handle'],
              'ThBlockDatataiowc',
              $block['localize_data']
          );
      }

      // Prepare the arguments for registering the block
      $block_args = array(
          'editor_script'   => $block['script_handle'],
          'editor_style'    => $block['editor_style'],
          'style'           => $block['frontend_style'],
      );

      // Check if the render callback is set and not null
      if ( isset( $block['render_callback'] ) && ! is_null( $block['render_callback'] ) ) {
          $block_args['render_callback'] = $block['render_callback'];
         
      }

      // Register each block
      register_block_type( $block['name'], $block_args );
  }
  
}

add_action( 'init', 'taiowc_register_blocks' );

function taiowc_blocks_categories( $categories ) {
  return array_merge(
      $categories,
      [
          [
              'slug'  => 'taiowc',
              'title' => __( 'All In One Woo Cart', 'taiowc' ),
          ],
      ]
  );
}
add_filter( 'block_categories_all', 'taiowc_blocks_categories', 11, 2);

function taiowc_blocks_editor_assets(){

$asset_file = require_once TAIOWC_PLUGIN_PATH .'build/taiowc-data.asset.php';

wp_enqueue_script(
  'taiowc-data-block',
  TAIOWC_PLUGIN_URI . 'build/taiowc-data.js',
  array_merge(
    $asset_file['dependencies']
  ),
  '1.0.0',
  true
);
  wp_localize_script(
      'taiowc-data-block',
      'thnkblock',
      array(
          'homeUrl' => plugins_url( '/', __FILE__ ),
          'showOnboarding' => '',
      )
  );
    
}
add_action( 'enqueue_block_editor_assets', 'taiowc_blocks_editor_assets' );



function taiowc_blocks_render_callback( $attr ) {

 if ( function_exists( 'get_current_screen' ) && get_current_screen()->is_block_editor() ) {
    return;
 } 
   
  $block_content = '<div id="wp-block-taiowc-' . esc_attr($attr['uniqueID']) . '"  class="wp-block-taiowc">';
  
  $cartStyle = isset($attr['cartStyle']) ? $attr['cartStyle'] : '[taiowc]';

  $block_content .= ''.do_shortcode($cartStyle).'</div>';
  
  return $block_content;
  
}