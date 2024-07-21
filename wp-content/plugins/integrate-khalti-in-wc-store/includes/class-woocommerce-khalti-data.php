<?php

/**
 * Payment gateway - Khalti
 *
 * Provides an Khalti Payment Gateway.
 *
 * @package WooCommerce_Khalti\Classes\Payment
 */

defined('ABSPATH') || exit;

use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;

/**
 * WC_Gateway_Khalti Class.
 */
class WooCommerce_Khalti_Data
{
    /**
     * Instance of this class.
     *
     * @var object
     */
    protected static $instance = null;

    public function __construct()
    {
        add_action(
            'add_meta_boxes',
            array($this, 'add_custom_meta_boxes'),
            10,
            1
        );

        add_action(
            'woocommerce_email_order_details',
            array($this, 'add_note_after_order_details_email'),
            25,
            4
        );

        add_action(
            'admin_menu',
            array($this, 'register_my_transaction_submenu_page')
        );
    }

    /**
     * Return an instance of this class.
     *
     * @return object A single instance of this class.
     */
    public static function get_instance()
    {
        // If the single instance hasn't been set, set it now.
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function add_custom_meta_boxes()
    {
        $screen = (class_exists('\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController')
            && wc_get_container()->get(CustomOrdersTableController::class)->custom_orders_table_usage_is_enabled())
            ? wc_get_page_screen_id('shop-order')
            : 'shop_order';

        add_meta_box(
            'mv_other_fields',
            'Payment Info',
            array($this, 'khalti_info'),
            $screen,
            'side',
            'core'
        );
    }

    public function khalti_info($post)
    {
        $order = ($post instanceof WP_Post) ? wc_get_order($post->ID) : $post;

        $meta_info = '<p>Payment Method: <strong>Khalti </strong>';
        $meta_info .= '<p>Txn ID: <strong>' . $order->get_meta('_khalti_txn_id') . '</strong>';

        echo wp_kses_post($meta_info);
    }

    public function register_my_transaction_submenu_page()
    {
        include_once dirname(__FILE__) . '/class-woocommerce-khalti-txn-report.php';
        $txn_report = new WooCommerce_Khalti_Transaction_Report;

        $hook = add_submenu_page(
            'woocommerce',
            'Khalti Txn List',
            'Khalti Txn List',
            'manage_options',
            'transaction-list',
            array($txn_report, 'transaction_page_callback')
        );

        add_action(
            "load-$hook",
            array($txn_report, 'add_options_transaction')
        );
    }

    /*Display order custom meta data on email notifications*/
    public function add_note_after_order_details_email($order)
    {
        if ('khalti' != $order->get_payment_method()) {
            return;
        }

        $add_info = '<div style="margin-bottom: 40px;">';
        $add_info .= '<h2>Khalti Help & Support</h2>';
        $add_info .= '<table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:Helvetica,Roboto,Arial,sans-serif">';
        $add_info .= '<tr><td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;word-wrap:break-word">Toll Free: 1660-01-5-8888</td></tr>';
        $add_info .= '<tr><td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;word-wrap:break-word">Viber (Chat Only) Support: khalti.com/viber</td></tr>';
        $add_info .= '<tr><td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;word-wrap:break-word">Email: merchantsupport@khalti.com</td></tr>';
        $add_info .= '<tr><td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;word-wrap:break-word">Phone: 01-5970017</td></tr>';
        $add_info .= '</table></div>';

        echo wp_kses_post($add_info);
    }
}
