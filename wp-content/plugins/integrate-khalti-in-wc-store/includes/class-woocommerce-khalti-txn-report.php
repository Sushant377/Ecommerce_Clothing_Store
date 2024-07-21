<?php

use Automattic\WooCommerce\Utilities\OrderUtil;

if (!class_exists('WP_List_Table')) {
    include_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Transaction_Gateway_Report class.
 */
class WooCommerce_Khalti_Transaction_Report extends WP_List_Table
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(
            array(
                'singular' => __(
                    'Khalti Transaction Online Report',
                    'woocommerce-khalti'
                ),
                'plural' => __(
                    'Khalti Transaction Online Report',
                    'woocommerce-khalti'
                ),
                'ajax' => false,
            )
        );
    }

    /**
     * Default Column
     *
     * @param object  $item Item.
     * @param string $column_name Column name.
     * @return string
     */
    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'order_id':
                return $item->get_id();
            case 'reference':
                return method_exists($item, 'get_order_key') ? $item->get_order_key() : 'N/A';
            case 'amount':
                return $item->get_total();
            case 'status':
                return $item->get_status();
            case 'transaction_id':
                return $item->get_meta('_khalti_txn_id');
            case 'created_at':
                return $item->get_date_created()->date("F j, Y, g:i A");
            case 'action':
                return wp_kses_post('<a href="' . get_edit_post_link($item->get_id()) . '">View order</a>');
            default:
                return print_r($item, true);
        }
    }

    /**
     * Sortable Columns
     *
     * @return array
     */
    public function get_sortable_columns()
    {
        return array(
            'order_id' => array('order_id', false),
            'amount' => array('amount', false),
            'created_at' => array('created_at', false),
        );
    }

    /**
     * Columns
     *
     * @return array
     */
    public function get_columns()
    {
        return array(
            'order_id' => __('Order ID', 'Transaction-report'),
            'reference' => __('Order Name', 'Transaction-report'),
            'amount' => __('Amount', 'Transaction-report'),
            'status' => __('Status', 'Transaction-report'),
            'transaction_id' => __('Transaction ID', 'Transaction-report'),
            'created_at' => __('Created At', 'Transaction-report'),
            'action' => __('Action', 'Transaction-report'),
        );
    }

    /**
     * Format Amount
     *
     * @param object $item Item.
     * @return string
     */
    public function column_amount($item)
    {
        return $item->get_currency() . ' ' . number_format($item->get_total(), 2);
    }

    /**
     * Format Status
     *
     * @param object $item Item.
     * @return string
     */
    public function column_status($item)
    {
        return ucfirst($item->get_status());
    }

    /**
     * Prepare Items
     */
    public function prepare_items()
    {

        $orders = $this->fetch_order();
        usort($orders, array($this, 'usort_reorder'));
        $per_page = $this->get_items_per_page('records_per_page', 20);
        $current_page = $this->get_pagenum();
        $total_items = count($orders);

        $this->_column_headers = $this->get_column_info();
        $this->items = array_slice(
            $orders,
            ($current_page - 1) * $per_page,
            $per_page
        );
        $this->set_pagination_args(
            array(
                'total_items' => $total_items,
                'per_page' => $per_page,
            )
        );
    }

    /**
     * Sort - Reorder
     *
     * @param object $a first item.
     * @param object $b second item.
     * @return string
     */
    public function usort_reorder($a, $b)
    {
        $orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : '';
        $order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : '';

        switch ($orderby) {
            case 'order_id':
                $fun = 'get_id';
                break;
            case 'created_at':
                $fun = 'get_date_created';
                break;
            default:
                $fun = 'get_date_created';
                break;
        }

        $order = (!empty($order)) ? $order : 'desc';
        $result = ($orderby == 'amount')
            ? $this->int_cmp($a->get_total(), $b->get_total())
            : strcmp($a->$fun(), $b->$fun());

        return ('asc' === $order) ? $result : -$result;
    }

    /**
     * Fetch data
     *
     * @global object $wpdb
     * @return array
     */
    public function fetch_order()
    {
        if (OrderUtil::custom_orders_table_usage_is_enabled()) {
            $args = array(
                'status' => array('wc-processing', 'wc-on-hold', 'wc-cancelled', 'wc-completed', 'wc-pending', 'wc-failed', 'wc-refunded'),
                'meta_query' => array(
                    'meta_key'      => '_payment_method',
                    'meta_value'    => 'khalti',
                    'meta_compare'  => '=',
                )
            );

            if (!empty($_POST) && isset($_POST['s']) && '' != $_POST['s']) {
                $args['field_query'] = array(
                    array(
                        'field' => 'order_key',
                        'value' => sanitize_text_field($_POST['s'])
                    )
                );
            }
        } else {
            $args = array(
                'meta_key' => '_payment_method',
                'meta_value' => 'khalti',
                'meta_compare' => '=',
            );

            if (!empty($_POST) && isset($_POST['s'])) {
                $args['post_password'] = sanitize_text_field($_POST['s']);
            }
        }

        return wc_get_orders($args);
    }

    private function int_cmp($a, $b)
    {
        if ((int)$a == (int)$b) {
            return 0;
        }

        if ((int)$a  > (int)$b) {
            return 1;
        }

        if ((int)$a  < (int)$b) {
            return -1;
        }
    }

    /**
     * Function to add screen options
     */
    public function add_options_transaction()
    {
        global $transaction_table;

        $args = array(
            'label' => 'No. of records',
            'default' => 10,
            'option' => 'records_per_page',
        );
        add_screen_option('per_page', $args);

        $transaction_table = new self;
    }

    public function transaction_page_callback()
    {
        global $transaction_table;

        $allowed_html = array(
            'form' => array(
                'method' => array()
            ),
        );

        echo wp_kses_post('<div class="wrap"><h2>Khalti Transaction Report</h2>');
        echo wp_kses('<form method="post">', $allowed_html);

        $transaction_table->prepare_items();
        $transaction_table->search_box('search', 'transaction_search');
        $transaction_table->display();

        echo wp_kses('</form></div>', $allowed_html);
    }
}
