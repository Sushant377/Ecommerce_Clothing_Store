<?php if (!defined('ABSPATH')) exit;

// popup directory
class th_product_compare
{
    private static $instance;
    public $localizeOption = [];
    private function __construct()
    {
        add_action( 'before_woocommerce_init', array( $this, 'hpos_compatibility') );
        add_action('admin_init', array($this, 'create_roles'));
        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_script'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_front_script'));
        add_filter('plugin_action_links_' . plugin_basename(TH_PRODUCT_PATH . '/' . basename(TH_PRODUCT_BASE_NAME)), array($this, 'add_menu_links'));
        add_filter('plugin_row_meta', array($this, 'docs_link'), 10, 2);

        $this->localizeOption = get_option('th_compare_option');
        $cookiesName = th_product_compare::cookieName();
    }
    public static function get()
    {
        return self::$instance ? self::$instance : self::$instance = new self();
    }

    public function create_roles()
    {
        global $wp_roles;

        if (!class_exists('WP_Roles')) {
            return;
        }

        if (!isset($wp_roles)) {

            $wp_roles = new WP_Roles();
        }

        // Shop manager role

        add_role('th_product_compare_role', __('Product Compare Role', 'th-product-compare'), array(
            'level_9'        => true,
            'read'          => true,
        ));

        $wp_roles->add_cap('th_product_compare_role', 'th_product_compare_manager');

        $wp_roles->add_cap('administrator', 'th_product_compare_manager');

    }

    /**
     *  Declare the woo HPOS compatibility.
     */
   public  function hpos_compatibility() {

            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', TH_PRODUCT_FILE, true );
            }
    }

    public function admin_menu()
    {

        add_submenu_page('themehunk-plugins', __('Product Compare', 'th-product-compare'), __('Product Compare', 'th-product-compare'), 'manage_options', 'th-product-compare', array($this, 'display_addons'), 1);
        
    }
    // add menu links in left where plugin name placed 
    public function add_menu_links($links)
    {
        $links[] = '<a href="' . admin_url("admin.php?page=th-product-compare") . '">' . __('Settings', 'th-compare-product') . '</a>';
        $links['premium'] = '<a href="' . esc_url('https://themehunk.com/plugins/') . '" target="_blank"><b>' . __('Get Pro', 'th-compare-product') . '</b></a>';
        return $links;
    }



    public function docs_link($plugin_meta, $plugin_file)
    {
        if (strpos($plugin_file, 'th-product-compare.php') !== false) {
            $new_links = array(
                'livedemo' => '<a href="' . esc_url('https://wpthemes.themehunk.com/th-product-compare-pro/') . '" target="_blank">' . __('Live Demo', 'th-product-compare') . '</a>',
                'documentation' => '<a href="' . esc_url('https://themehunk.com/docs/th-product-compare-pro/') . '" target="_blank">' . __('Documentation', 'th-product-compare') . '</a>',
                'support' => '<a href="' . esc_url('https://themehunk.com/contact-us/') . '" target="_blank">' . __('Support', 'th-product-compare') . '</a>',
                'premium_version' => '<a href="' . esc_url('https://themehunk.com/plugins/') . '" target="_blank">' . __('Premium Version', 'th-product-compare') . '</a>',
            );
            $plugin_meta = array_merge($plugin_meta, $new_links);
        }
        return $plugin_meta;
    }

    public function display_addons()
    {

        if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.','th-advance-product-search' ) );
        }
        
        if (isset($_GET['page']) && $_GET['page'] == 'th-product-compare') {

            $th_compare_option = $this->localizeOption; //appear in file pages/advance-setting.php, pages/general.php, pages/style.php
            include_once "page.php";
        }
    }

    public function enqueue_admin_script($hook)
    {
        // if ('check-plugin' != $hook) return;
        wp_enqueue_style('th-product-compare-style', TH_PRODUCT_URL . 'assets/style.css', false);
        wp_enqueue_script('th-product-js', TH_PRODUCT_URL . 'assets/js/script.js', [], 1, true);
        wp_localize_script('th-product-js', 'th_product', array(
            'th_product_ajax_url' => admin_url('admin-ajax.php'),
            'th_product_compare_nonce' => wp_create_nonce( '_wpnonce' ),

    ));
    }

    public function enqueue_front_script()
    {
        wp_enqueue_style('dashicons');
        wp_enqueue_style('th-product-compare-style-front', TH_PRODUCT_URL . 'assets/fstyle.css', false);
        wp_enqueue_script('th-product-js', TH_PRODUCT_URL . 'assets/js/fscript.js', array('jquery'), 1, true);
        wp_localize_script('th-product-js', 'th_product', array('th_product_ajax_url' => admin_url('admin-ajax.php')));
    }
    public static function th_decrypt($string, $key = 12345)
    {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

    public static function th_encrypt($string, $key = 12345)
    {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }
    public static function cookieName()
    {
        $str = get_site_url();
        $getSlash = strrpos($str, "//") + 2;
        $removedSlash = substr($str, $getSlash);
        $removeSingleSlash = str_replace('/', "", $removedSlash);
        $removeColone = str_replace(':', "", $removeSingleSlash);
        $convertMd5 = md5($removeColone);
        $minLength = substr($convertMd5, -12);
        return 'th_compare_product_' . $minLength;
    }
    // class end 
}
