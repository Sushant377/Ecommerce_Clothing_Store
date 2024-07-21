<?php
namespace AIOSEO\Plugin\Common\Standalone;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles registering the AIOSEO username in the WPCode snippets library.
 *
 * @since 4.3.8
 */
class WpCode {
	/**
	 * Class constructor.
	 *
	 * @since 4.3.8
	 */
	public function __construct() {
		if ( ! is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
			return;
		}

		add_action( 'wpcode_loaded', [ $this, 'registerUsername' ] );
	}

	/**
	 * Enqueues the script.
	 *
	 * @since 4.3.8
	 *
	 * @return void
	 */
	public function registerUsername() {
		if ( ! function_exists( 'wpcode_register_library_username' ) ) {
			return;
		}

		wpcode_register_library_username( 'aioseo', AIOSEO_PLUGIN_SHORT_NAME );
	}
}