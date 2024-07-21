<?php
/**
 * WooCommerce eSewa setup
 * 
 */
defined( 'ABSPATH' ) || exit;

/**
 * Main WooCommerce eSewa Class
 * 
 * @class WooCommerce_Esewa
 */
final class WooCommerce_Esewa {
    
    protected static $instance = null;

    private function __construct() {
        // Check if WooCommerce is installed
        if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '4.5', '>=' ) ) {
            $this->includes();

            // Hooks
            add_filter( 'woocommerce_payment_gateways', array( $this, 'add_gateway' ) );
            add_filter( 'plugin_action_links_' . plugin_basename(WC_ESEWA_PLUGIN_FILE), array( $this, 'esewa_wc_plugin_action_links' ) );
        } else {
            add_action( 'admin_notices', array( $this, 'esewa_wc_missing_notice' ) );
        }
    }

    // Create one instance
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function includes() {
        include_once dirname(WC_ESEWA_PLUGIN_FILE) . '/includes/class-wc-esewa-gateway.php';
    }

    // Add eSewa gateway in woocommerce
    public function add_gateway( $methods ) {
        $methods[] = 'WC_Esewa_Gateway';
        return $methods;
    }

    // Add setting link in plugin view
    public function esewa_wc_plugin_action_links( $actions ) {
		$link_action = array(
			'settings' => '<a href="' . admin_url( 
                'admin.php?page=wc-settings&tab=checkout&section=esewa' ) . '" aria-label="' . esc_attr( 
                    __( 'View WooCommerce eSewa settings', 'esewa-woocommerce' ) ) . '">' . __( 'Settings', 'esewa-woocommerce' ) . '</a>',
		);
		return array_merge( $link_action, $actions );
	}

	public function esewa_wc_missing_notice() {
		/* translators: %s: woocommerce version */
		echo '<div class="error notice is-dismissible"><p>' . sprintf( 
            esc_html__( 'eSewa WooCommerce depends on the last version of %s or later to work!', 'esewa-woocommerce' ), 
            '<a href="http://www.woothemes.com/woocommerce/" target="_blank">' . esc_html__( 
                'WooCommerce 4.5', 'esewa-woocommerce' ) . '</a>' ) . '</p></div>';
	}

}