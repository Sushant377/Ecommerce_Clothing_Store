<?php
if (!defined('ABSPATH')) exit;
ob_start();

include_once WPPB_PATH . 'inc/popup-init.php';
// popup directory
class wppb
{
	private static $instance;
	

	private function __construct()
	{
		add_action('admin_menu', array($this, 'admin_menu'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_script'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_front_script'));
	}
	public static function get()
	{
		return self::$instance ? self::$instance : self::$instance = new self();
	}
	public function admin_menu()
	{

		add_submenu_page( 'themehunk-plugins', __('Wp Popup Builder', 'wppb'), __('Wp Popup Builder', 'wppb'), 'manage_options', 'wppb', array($this, 'display_addons'),51 );

	}
	public function display_addons()
	{
		if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		$wp_builder_obj = new wp_popup_builder_init();
		
		if (isset($_GET['custom-popup'])) {

			include_once WPPB_PATH . "inc/popup.php";

		} else {

			include_once WPPB_PATH . "inc/popups-page.php";
		}

	}

	public function enqueue_admin_script($hook)
	{
        if(isset($_GET['page']) && $_GET['page']=='wppb'){
			wp_enqueue_style('color-pickr', WPPB_URL . 'js/color/nano.min.css', false);
			wp_enqueue_script('color-pickr', WPPB_URL . 'js/color/pickr.es5.min.js', array('jquery'), 1, true);

			//minicolor
			wp_enqueue_style('wppb', WPPB_URL . 'css/style.css', false);
			wp_enqueue_style('wppb-style', WPPB_URL . 'css/popup-style.css', false);
			wp_enqueue_style('wppb-rl', WPPB_URL . 'css/rl_i_editor.css', false);
			wp_enqueue_media();
			wp_enqueue_script('wppb-js', WPPB_URL . 'js/script.js', array('jquery', 'jquery-ui-draggable', 'wp-util', 'updates'), 1, true);
			wp_localize_script('wppb-js', 'wppb_ajax_backend', array('wppb_ajax_url' => admin_url('admin-ajax.php'),'wppb_nonce' => wp_create_nonce( '_wppb_nonce' )));
		}
	}

	public function enqueue_front_script()
	{
		wp_enqueue_style('wppb-front', WPPB_URL . 'css/fstyle.css', false);
		wp_enqueue_script('wppb-front-js', WPPB_URL . 'js/fscript.js', array('jquery'), 1, true);
		wp_enqueue_style('dashicons');
	}

	public static function load_file()
	{
		return  array('db', 'ajax');
	}
}

if (!function_exists('wppb_install')) {
	function wppb_install()
	{
		global $wpdb;
		$wppb = $wpdb->prefix . 'wppb';
		$charset_collate = $wpdb->get_charset_collate();
		if ($wpdb->get_var("SHOW TABLES LIKE '$wppb'") != $wppb) {
			$sql = "CREATE TABLE IF NOT EXISTS $wppb (
		          BID INT(11) PRIMARY KEY AUTO_INCREMENT ,
		          addon_name VARCHAR(100) NOT NULL,
				      setting LONGTEXT NOT NULL,
				      boption TEXT NOT NULL,
		          is_active BOOLEAN DEFAULT '1'
		        ) $charset_collate;";
			$wpdb->query($sql);
		}
	}
	add_action('admin_init', 'wppb_install');
}


ob_end_clean();
