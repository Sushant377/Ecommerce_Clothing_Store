<?php
namespace AIOSEO\Plugin\Common\Api\Integrations;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AIOSEO\Plugin\Common\Integrations\WpCode as WpCodeIntegration;

/**
 * Route class for the API.
 *
 * @since 4.3.8
 */
class WpCode {
	/**
	 * Load the WPCode Snippets from the library, if available.
	 *
	 * @since 4.3.8
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getSnippets( $request ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		return new \WP_REST_Response( [
			'success'           => true,
			'snippets'          => WpCodeIntegration::loadWpCodeSnippets(),
			'pluginInstalled'   => WpCodeIntegration::isPluginInstalled(),
			'pluginActive'      => WpCodeIntegration::isPluginActive(),
			'pluginNeedsUpdate' => WpCodeIntegration::pluginNeedsUpdate()
		], 200 );
	}
}