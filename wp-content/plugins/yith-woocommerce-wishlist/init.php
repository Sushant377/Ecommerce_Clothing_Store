<?php
/**
 * Plugin Name: YITH WooCommerce Wishlist
 * Plugin URI: https://yithemes.com/themes/plugins/yith-woocommerce-wishlist/
 * Description: <code><strong>YITH WooCommerce Wishlist</strong></code> gives your users the possibility to create, fill, manage and share their wishlists allowing you to analyze their interests and needs to improve your marketing strategies. <a href="https://yithemes.com/" target="_blank">Get more plugins for your e-commerce on <strong>YITH</strong></a>
 * Version: 3.35.0
 * Author: YITH
 * Author URI: https://yithemes.com/
 * Text Domain: yith-woocommerce-wishlist
 * Domain Path: /languages/
 * WC requires at least: 8.8
 * WC tested up to: 9.0
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! defined( 'YITH_WCWL' ) ) {
	define( 'YITH_WCWL', true );
}

if ( ! defined( 'YITH_WCWL_URL' ) ) {
	define( 'YITH_WCWL_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'YITH_WCWL_DIR' ) ) {
	define( 'YITH_WCWL_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'YITH_WCWL_INC' ) ) {
	define( 'YITH_WCWL_INC', YITH_WCWL_DIR . 'includes/' );
}

if ( ! defined( 'YITH_WCWL_INIT' ) ) {
	define( 'YITH_WCWL_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'YITH_WCWL_FREE_INIT' ) ) {
	define( 'YITH_WCWL_FREE_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'YITH_WCWL_SLUG' ) ) {
	define( 'YITH_WCWL_SLUG', 'yith-woocommerce-wishlist' );
}

if ( ! function_exists( 'yith_wcwl_install_plugin_fw' ) ) {
	/**
	 * Install plugin-fw when needed
	 *
	 * @since 3.9.0
	 */
	function yith_wcwl_install_plugin_fw() {
		if ( ! function_exists( 'yit_maybe_plugin_fw_loader' ) && file_exists( YITH_WCWL_DIR . 'plugin-fw/init.php' ) ) {
			require_once YITH_WCWL_DIR . 'plugin-fw/init.php';
		}
		yit_maybe_plugin_fw_loader( YITH_WCWL_DIR );
	}
}

if ( ! function_exists( 'yith_wcwl_register_activation' ) ) {
	/**
	 * Performs required action on activation hook
	 *
	 * @since 3.9.0
	 */
	function yith_wcwl_register_activation() {
		if ( ! function_exists( 'yith_plugin_registration_hook' ) ) {
			require_once 'plugin-fw/yit-plugin-registration-hook.php';
		}
		register_activation_hook( __FILE__, 'yith_plugin_registration_hook' );
	}
}

if ( ! function_exists( 'yith_wishlist_constructor' ) ) {
	/**
	 * Bootstrap function; loads all required dependencies and start the process
	 *
	 * @return void
	 * @since 2.0.0
	 */
	function yith_wishlist_constructor() {

		load_plugin_textdomain( 'yith-woocommerce-wishlist', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// Load required classes and functions.
		require_once YITH_WCWL_INC . 'data-stores/class-yith-wcwl-wishlist-data-store.php';
		require_once YITH_WCWL_INC . 'data-stores/class-yith-wcwl-wishlist-item-data-store.php';
		require_once YITH_WCWL_INC . 'functions-yith-wcwl.php';
		require_once YITH_WCWL_INC . 'legacy/functions-yith-wcwl-legacy.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-exception.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-form-handler.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-ajax-handler.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-session.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-cron.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-wishlist.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-wishlist-item.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-wishlist-factory.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-frontend.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-install.php';
		require_once YITH_WCWL_INC . 'class-yith-wcwl-shortcode.php';

		if ( is_admin() ) {
			require_once YITH_WCWL_INC . 'class-yith-wcwl-admin.php';
		}

		// Let's start the game!

		/**
		 * $yith_wcwl global was deprecated since 3.0.0
		 *
		 * @deprecated
		 */
		global $yith_wcwl;
		$yith_wcwl = YITH_WCWL();
	}
}

if ( ! function_exists( 'yith_wishlist_install' ) ) {
	/**
	 * Performs pre-flight checks, and gives green light for plugin bootstrap
	 *
	 * @return void
	 * @since 2.0.0
	 */
	function yith_wishlist_install() {
		if ( ! function_exists( 'yith_deactivate_plugins' ) ) {
			require_once 'plugin-fw/yit-deactive-plugin.php';
		}

		if ( ! function_exists( 'WC' ) ) {
			add_action( 'admin_notices', 'yith_wcwl_install_woocommerce_admin_notice' );
		} elseif ( defined( 'YITH_WCWL_PREMIUM' ) || defined( 'YITH_WCWL_EXTENDED' ) ) {
			yith_deactivate_plugins( 'YITH_WCWL_FREE_INIT' );
		} else {
			do_action( 'yith_wcwl_init' );
		}
	}
}

if ( ! function_exists( 'yith_wcwl_install_woocommerce_admin_notice' ) ) {
	/**
	 * Shows admin notice when plugin is activated without WooCommerce
	 *
	 * @return void
	 * @since 2.0.0
	 */
	function yith_wcwl_install_woocommerce_admin_notice() {
		?>
		<div class="error">
			<p><?php echo esc_html( 'YITH WooCommerce Wishlist ' . __( 'is enabled but not effective. It requires WooCommerce to work.', 'yith-woocommerce-wishlist' ) ); ?></p>
		</div>
		<?php
	}
}

if ( ! function_exists( 'yith_wcwl_deactivate_lower_tier_notice' ) ) {
	/**
	 * Print an admin notice if trying to activate this version when an higher tier is already enabled
	 *
	 * @return void
	 * @use    admin_notices hooks
	 * @since  1.0
	 */
	function yith_wcwl_deactivate_lower_tier_notice() {
		?>
		<div class="notice">
			<p><?php esc_html_e( 'YITH WooCommerce Wishlist was deactivated as you\'re running an higher tier version of the same plugin.', 'yith-woocommerce-wishlist' ); ?></p>
		</div>
		<?php
	}
}

yith_wcwl_register_activation();
yith_wcwl_install_plugin_fw();

add_action( 'yith_wcwl_init', 'yith_wishlist_constructor' );
add_action( 'plugins_loaded', 'yith_wishlist_install', 11 );
