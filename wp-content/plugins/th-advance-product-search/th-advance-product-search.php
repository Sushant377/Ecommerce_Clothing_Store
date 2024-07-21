<?php
/**
 * Plugin Name:             Advance Product Search
 * Plugin URI:              https://themehunk.com
 * Description:             Responsive Search Plugin for WordPress and WooCommerce. Best Live Ajax Search Support Plugin. Plugin comes with user friendly settings, You can use shortcode and widget to display search bar at your desired location.This plugin provide you freedom to choose color and styling to match up with your website. It also supports Google search analytics to monitor your website visitor and searching behaviour. <a href="https://themehunk.com/plugins/" target="_blank">Get more plugins for your website on <strong>ThemeHunk</strong></a>
 * Version:                 1.2.3
 * Author:                  ThemeHunk
 * Author URI:              https://themehunk.com
 * Requires at least:       5.0
 * Tested up to:            6.3
 * WC requires at least:    3.2
 * WC tested up to:         7.4
 * Domain Path:             /languages
 * Text Domain:             th-advance-product-search
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_FILE')) {
    define('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_FILE', __FILE__);
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_DIRNAME')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_DIRNAME', dirname( plugin_basename( __FILE__ ) ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_BASENAME')) {
    define( 'TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI')) {
define( 'TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'images' ) );
}

if (!defined('TH_ADVANCE_PRODUCT_SEARCH_VERSION')) {
    $plugin_data = get_file_data(__FILE__, array('version' => 'Version'), false);
    define('TH_ADVANCE_PRODUCT_SEARCH_VERSION', $plugin_data['version']);
} 

if (!class_exists('TH_Advance_Product_Search') && ( ! class_exists( 'Tapsp_Main' ))) {
include_once(TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/themehunk-menu/admin-menu.php');
require_once("inc/thaps.php");
} 

        /**
         * Add the settings link to the plugin row
         *
         * @param array $links - Links for the plugin
         * @return array - Links
         */
        function th_advance_product_search_plugin_action_links($links) {

                      $settings_page = add_query_arg(array('page' => 'th-advance-product-search'), admin_url('admin.php'));

                      $settings_link = '<a href="'.esc_url($settings_page).'">'.__('Settings', 'th-advance-product-search' ).'</a>';

                      array_unshift($links, $settings_link); 

                      return $links;
        }

        add_filter('plugin_action_links_'.TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_BASENAME, 'th_advance_product_search_plugin_action_links', 10, 1);


    /**
   * Add links to plugin's description in plugins table
   *
   * @param array  $links  Initial list of links.
   * @param string $file   Basename of current plugin.
   *
   * @return array
   */
if ( ! function_exists( 'th_advance_product_search_plugin_meta_links' ) ){

  function th_advance_product_search_plugin_meta_links($links, $file){

    if ($file !== plugin_basename(__FILE__)){
      return $links;
    }

    $doc_link = '<a target="_blank" href="https://themehunk.com/docs/th-advance-product-search/" title="' . __('Documentation', 'th-advance-product-search') . '"><span class="dashicons  dashicons-search"></span>' . __('Documentation', 'th-advance-product-search') . '</a>';

    $support_link = '<a target="_blank" href="https://themehunk.com/contact-us/" title="' . __('Support', 'th-advance-product-search') . '"><span class="dashicons  dashicons-admin-users"></span>' . __('Support', 'th-advance-product-search') . '</a>';

    $pro_link = '<a target="_blank" href="https://themehunk.com/advance-product-search/" title="' . __('Premium Version', 'th-advance-product-search') . '"><span class="dashicons  dashicons-cart"></span>' . __('Premium Version', 'th-advance-product-search') . '</a>';

    $links[] = $doc_link;
    $links[] = $support_link;
    $links[] = $pro_link;

    return $links;

  } // plugin_meta_links

}
add_filter('plugin_row_meta', 'th_advance_product_search_plugin_meta_links', 10, 2);



// icon style

function th_advance_product_search_icon_style_svg($classes, $clr){ ?>
<span class="th-icon th-icon-vector-search <?php echo esc_attr($classes); ?>" style="color:<?php echo esc_attr($clr); ?>"></span>
<?php }

/****************/
//Block registered
/****************/

function register_blocks() {
    $blocks = array(
        array(
            'name'           => 'th-advance-product-search/th-advance-product-search',
            'script_handle'  => 'th-advance-product-search',
            'editor_style'   => 'th-advance-product-search-editor-style',
            'frontend_style' => 'th-advance-product-search-frontend-style',
            'render_callback' => 'th_advance_product_search_blocks_render_callback',
            'localize_data'  => array(
                'adminUrlsearch' => admin_url('admin.php?page=th-advance-product-search'),
            ),
        ),
    );

    

    foreach ( $blocks as $block ) {

        
        // Register JavaScript file
        wp_register_script(
            $block['script_handle'],
            TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI . 'build/' . $block['script_handle'] . '.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            filemtime( TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.js' )
        );

        // Register editor style
        wp_register_style(
            $block['editor_style'],
            TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI . 'build/' . $block['script_handle'] . '.css',
            array( 'wp-edit-blocks' ),
            filemtime( TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.css' )
        );

        // Register front end block style
        wp_register_style(
            $block['frontend_style'],
            TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI . 'build/style-' . $block['script_handle'] . '.css',
            array(),
            filemtime( TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . '/build/style-' . $block['script_handle'] . '.css' )
        );

        // Localize the script with data
        if ( isset( $block['localize_data'] ) && ! is_null( $block['localize_data'] ) ) {
            wp_localize_script(
                $block['script_handle'],
                'ThBlockDataSearch',
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

add_action( 'init', 'register_blocks' );

function th_advance_product_search_blocks_categories( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'th-advance-product-search',
                'title' => __( 'TH advance product search', 'th-advance-product-search' ),
            ],
        ]
    );
}
add_filter( 'block_categories_all', 'th_advance_product_search_blocks_categories', 11, 2);

function th_advance_product_search_blocks_editor_assets(){

    $asset_file = require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH .'build/th-advance-product-search-data.asset.php';

	wp_enqueue_script(
		'data-block',
		TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI . 'build/th-advance-product-search-data.js',
		array_merge(
			$asset_file['dependencies']
		),
		'1.0.0',
		true
	);
    wp_localize_script(
        'data-block',
        'thnkblock',
         array(
            'homeUrl' => plugins_url( '/', __FILE__ ),
            'showOnboarding' => '',
        )
    );
      
}
add_action( 'enqueue_block_editor_assets', 'th_advance_product_search_blocks_editor_assets' );

function th_advance_product_search_blocks_render_callback( $attr ) {

    $block_content = '<div id="wp-block-th-advance-product-search-' . esc_attr($attr['uniqueID']) . '"  class="wp-block-th-advance-product-search" style="width:100%";>';
    
    $searchStyle = isset($attr['searchStyle']) ? $attr['searchStyle'] : '[th-aps]';

    $block_content .= ''.do_shortcode($searchStyle).'</div>';
    
    return $block_content;
}