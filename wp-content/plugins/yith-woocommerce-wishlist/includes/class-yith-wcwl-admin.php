<?php
/**
 * Admin init class
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist\Classes
 * @version 3.0.0
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'YITH_WCWL_Admin' ) ) {
	/**
	 * Initiator class. Create and populate admin views.
	 *
	 * @since 1.0.0
	 */
	class YITH_WCWL_Admin {

		/**
		 * Single instance of the class
		 *
		 * @var \YITH_WCWL_Admin
		 * @since 2.0.0
		 */
		protected static $instance;

		/**
		 * Wishlist panel
		 *
		 * @var string Panel hookname
		 * @since 2.0.0
		 */
		protected $panel = null;

		/**
		 * Tab name
		 *
		 * @var string
		 * @since 1.0.0
		 */
		public $tab;

		/**
		 * Plugin options
		 *
		 * @var array
		 * @since 1.0.0
		 */
		public $options;

		/**
		 * Returns single instance of the class
		 *
		 * @return \YITH_WCWL_Admin
		 * @since 2.0.0
		 */
		public static function get_instance() {
			if ( is_null( static::$instance ) ) {
				static::$instance = new static();
			}

			return static::$instance;
		}

		/**
		 * Constructor of the class
		 *
		 * @since 2.0.0
		 */
		public function __construct() {
			// install plugin, or update from older versions.
			add_action( 'init', array( $this, 'install' ) );

			// init admin processing.
			add_action( 'init', array( $this, 'init' ) );

			// enqueue scripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ), 20 );

			// plugin panel options.
			add_filter( 'yith_plugin_fw_panel_wc_extra_row_classes', array( $this, 'mark_options_disabled' ), 10, 23 );

			// add plugin links.
			add_filter( 'plugin_action_links_' . plugin_basename( YITH_WCWL_DIR . 'init.php' ), array( $this, 'action_links' ) );
			add_filter( 'yith_show_plugin_row_meta', array( $this, 'add_plugin_meta' ), 10, 5 );

			// register wishlist panel.
			add_action( 'admin_menu', array( $this, 'register_panel' ), 5 );

			// add a post display state for special WC pages.
			add_filter( 'display_post_states', array( $this, 'add_display_post_states' ), 10, 2 );
		}

		/* === ADMIN GENERAL === */

		/**
		 * Add a post display state for special WC pages in the page list table.
		 *
		 * @param array   $post_states An array of post display states.
		 * @param WP_Post $post        The current post object.
		 */
		public function add_display_post_states( $post_states, $post ) {
			if ( (int) get_option( 'yith_wcwl_wishlist_page_id' ) === $post->ID ) {
				$post_states['yith_wcwl_page_for_wishlist'] = __( 'Wishlist Page', 'yith-woocommerce-wishlist' );
			}

			return $post_states;
		}

		/* === INITIALIZATION SECTION === */

		/**
		 * Initiator method. Initiate properties.
		 *
		 * @return void
		 * @access private
		 * @since 1.0.0
		 */
		public function init() {
			$prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'unminified/' : '';
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			wp_register_style( 'yith-wcwl-font-awesome', YITH_WCWL_URL . 'assets/css/font-awesome.min.css', array(), '4.7.0' );
			wp_register_style( 'yith-wcwl-material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '3.0.1' );
			wp_register_style( 'yith-wcwl-admin', YITH_WCWL_URL . 'assets/css/admin.css', array( 'yith-wcwl-font-awesome' ), YITH_WCWL_Frontend()->version );
			wp_register_script( 'yith-wcwl-admin', YITH_WCWL_URL . 'assets/js/' . $prefix . 'admin/yith-wcwl' . $suffix . '.js', array( 'jquery', 'jquery-blockui' ), YITH_WCWL_Frontend()->version, true );
		}

		/**
		 * Run the installation
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function install() {
			if ( wp_doing_ajax() ) {
				return;
			}

			$stored_db_version = get_option( 'yith_wcwl_db_version' );

			if ( ! $stored_db_version || ! YITH_WCWL_Install()->is_installed() ) {
				// fresh installation.
				YITH_WCWL_Install()->init();
			} elseif ( version_compare( $stored_db_version, YITH_WCWL_DB_VERSION, '<' ) ) {
				// update database.
				YITH_WCWL_Install()->update( $stored_db_version );
				/**
				 * DO_ACTION: yith_wcwl_updated
				 *
				 * Allows to fire some action when the plugin database is updated.
				 */
				do_action( 'yith_wcwl_updated' );
			}

			// Plugin installed.
			/**
			 * DO_ACTION: yith_wcwl_installed
			 *
			 * Allows to fire some action when the plugin database is installed.
			 */
			do_action( 'yith_wcwl_installed' );
		}

		/**
		 * Adds plugin actions link
		 *
		 * @param mixed $links Available action links.
		 * @return array
		 */
		public function action_links( $links ) {
			$links = yith_add_action_links( $links, 'yith_wcwl_panel', defined( 'YITH_WCWL_PREMIUM' ), YITH_WCWL_SLUG );
			return $links;
		}

		/**
		 * Adds plugin row meta
		 *
		 * @param array  $new_row_meta_args Array of meta for current plugin.
		 * @param array  $plugin_meta Not in use.
		 * @param string $plugin_file Current plugin iit file path.
		 * @param array  $plugin_data Plugin info.
		 * @param string $status Plugin status.
		 * @param string $init_file Wishlist plugin init file.
		 * @return array
		 * @since 2.0.0
		 */
		public function add_plugin_meta( $new_row_meta_args, $plugin_meta, $plugin_file, $plugin_data, $status, $init_file = 'YITH_WCWL_INIT' ) {
			if ( ! defined( $init_file ) || constant( $init_file ) !== $plugin_file ) {
				return $new_row_meta_args;
			}

			$new_row_meta_args['slug']        = 'yith-woocommerce-wishlist';
			$new_row_meta_args['is_premium']  = defined( 'YITH_WCWL_PREMIUM' );
			$new_row_meta_args['is_extended'] = defined( 'YITH_WCWL_EXTENDED' );

			return $new_row_meta_args;
		}

		/* === WISHLIST SUBPANEL SECTION === */

		/**
		 * Retrieve the admin panel tabs.
		 *
		 * @return array
		 */
		protected function get_admin_panel_tabs(): array {
			return apply_filters(
				'yith_wcwl_admin_panel_tabs',
				array(
					'settings' => array(
						'title' => _x( 'Settings', 'Settings tab name', 'yith-woocommerce-wishlist' ),
						'icon'  => 'settings',
					),
				)
			);
		}

		/**
		 * Register wishlist panel
		 *
		 * @return void
		 * @since 2.0.0
		 */
		public function register_panel() {
			if ( ! empty( $this->panel ) ) {
				return;
			}

			$admin_tabs = $this->get_admin_panel_tabs();

			$args = array(
				'ui_version'         => 2,
				'create_menu_page'   => true,
				'parent_slug'        => '',
				'page_title'         => 'YITH WooCommerce Wishlist',
				'menu_title'         => 'Wishlist',
				'plugin_slug'        => YITH_WCWL_SLUG,
				'is_extended'        => defined( 'YITH_WCWL_EXTENDED' ),
				'is_premium'         => defined( 'YITH_WCWL_PREMIUM' ),
				'plugin_description' => __( 'Allows your customers to create and share lists of products that they want to purchase on your e-commerce.', 'yith-woocommerce-wishlist' ),
				/**
				 * APPLY_FILTERS: yith_wcwl_settings_panel_capability
				 *
				 * Filter the capability used to access the plugin panel.
				 *
				 * @param string $capability Capability
				 *
				 * @return string
				 */
				'capability'         => apply_filters( 'yith_wcwl_settings_panel_capability', 'manage_options' ),
				'parent'             => '',
				'class'              => function_exists( 'yith_set_wrapper_class' ) ? yith_set_wrapper_class() : '',
				'parent_page'        => 'yith_plugin_panel',
				'page'               => 'yith_wcwl_panel',
				'admin-tabs'         => $admin_tabs,
				'options-path'       => YITH_WCWL_DIR . 'plugin-options',
				'help_tab'           => array(
					'main_video' => array(
						'desc' => _x( 'Check this video to learn how to <b>configure wishlist and customize options:</b>', '[HELP TAB] Video title', 'yith-woocommerce-wishlist' ),
						'url'  => array(
							'en' => 'https://www.youtube.com/embed/oMnfyHo819M',
							'it' => 'https://www.youtube.com/embed/9hM9PgBVNTg',
							'es' => 'https://www.youtube.com/embed/5gi8SrEuip8',
						),
					),
					'playlists'  => array(
						'en' => 'https://www.youtube.com/watch?v=oMnfyHo819M&list=PLDriKG-6905lyNLO9kQ7GCsldGt7u-4Pa',
						'it' => 'https://www.youtube.com/watch?v=zpwlE60H6YM&list=PL9c19edGMs09kk40S7FEiXjKKppjS-CAK',
						'es' => 'https://www.youtube.com/watch?v=5Ftr4_v0s5I&list=PL9Ka3j92PYJMMYXecDH8FB5cxTfTbF4jJ',
					),
					'hc_url'     => 'https://support.yithemes.com/hc/en-us/categories/360003468437-YITH-WOOCOMMERCE-WISHLIST',
				),
			);

			// registers premium tab.
			if ( ! defined( 'YITH_WCWL_PREMIUM' ) ) {
				$args['premium_tab'] = array(
					'features' => array(
						array(
							'title'       => __( 'Allow users to create multiple wishlists', 'yith-woocommerce-wishlist' ),
							'description' => __( 'In the premium version, your customers can create a wishlist for their birthday, Christmas, a graduation party, etc.', 'yith-woocommerce-wishlist' ),
						),
						array(
							'title'       => __( 'Advanced wishlist management', 'yith-woocommerce-wishlist' ),
							'description' => __( 'Allow users to rename wishlists, choose whether to make them public or private, move products from one list to another, and more.', 'yith-woocommerce-wishlist' ),
						),
						array(
							'title'       => __( 'Different wishlist layouts', 'yith-woocommerce-wishlist' ),
							'description' => __( 'Choose which layout you prefer to display products in the wishlist for a more modern and 100% mobile-friendly user experience.', 'yith-woocommerce-wishlist' ),
						),
						array(
							'title'       => __( 'Insert a wishlist widget in the header of your shop', 'yith-woocommerce-wishlist' ),
							'description' => __( 'Give instant access to the wishlist and show a preview of the products added to it by inserting the widget in the site header.', 'yith-woocommerce-wishlist' ),
						),
						array(
							'title'       => __( 'Analyze your customers\' wishlists and the most popular products in your shop', 'yith-woocommerce-wishlist' ),
							'description' => __( 'In the premium version, you can analyze the wishlists of each user in your shop and get a clear overview of the most popular products in your shop.', 'yith-woocommerce-wishlist' ),
						),
						array(
							'title'       => __( 'Create targeted promotions and take advantage of the wishlists to increase conversions', 'yith-woocommerce-wishlist' ),
							'description' => __( 'The premium version of the plugin allows you to structure effective marketing strategies and increase conversions. Some examples? You can send promotional emails and offer a discount to all users who have a specific product on their wishlist, notify customers when a product on their wishlist is on sale, or notify them when an out-of-stock product is available again in your shop.', 'yith-woocommerce-wishlist' ),
						),
					),
				);
			}

			// Add "Your store tools" tab.
			if ( defined( 'YITH_WCWL_PREMIUM' ) ) {
				$args['your_store_tools'] = array(
					'items' => array(
						'gift-cards'             => array(
							'name'           => 'Gift Cards',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/gift-cards.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-gift-cards/',
							'description'    => _x(
								'Sell gift cards in your shop to increase your earnings and attract new customers.',
								'[YOUR STORE TOOLS TAB] Description for plugin YITH WooCommerce Gift Cards',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_YWGC_PREMIUM' ),
							'is_recommended' => true,
						),
						'ajax-product-filter'    => array(
							'name'           => 'Ajax Product Filter',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/ajax-product-filter.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-ajax-product-filter/',
							'description'    => _x(
								'Help your customers to easily find the products they are looking for and improve the user experience of your shop.',
								'[YOUR STORE TOOLS TAB] Description for plugin YITH WooCommerce Ajax Product Filter',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_WCAN_PREMIUM' ),
							'is_recommended' => true,
						),
						'booking'                => array(
							'name'           => 'Booking and Appointment',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/booking.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-booking/',
							'description'    => _x(
								'Enable a booking/appointment system to manage renting or booking of services, rooms, houses, cars, accommodation facilities and so on.',
								'[YOUR STORE TOOLS TAB] Description for plugin YITH Bookings',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_WCBK_PREMIUM' ),
							'is_recommended' => false,

						),
						'request-a-quote'        => array(
							'name'           => 'Request a Quote',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/request-a-quote.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-request-a-quote/',
							'description'    => _x(
								'Hide prices and/or the "Add to cart" button and let your customers request a custom quote for every product.',
								'[YOUR STORE TOOLS TAB] Description for plugin YITH WooCommerce Request a Quote',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_YWRAQ_PREMIUM' ),
							'is_recommended' => false,
						),
						'product-addons'         => array(
							'name'           => 'Product Add-Ons & Extra Options',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/product-add-ons.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-product-add-ons/',
							'description'    => _x(
								'Add paid or free advanced options to your product pages using fields like radio buttons, checkboxes, drop-downs, custom text inputs, and more.',
								'[YOUR STORE TOOLS TAB] Description for plugin YITH WooCommerce Product Add-Ons',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_WAPO_PREMIUM' ),
							'is_recommended' => false,
						),
						'dynamic-pricing'        => array(
							'name'           => 'Dynamic Pricing and Discounts',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/dynamic-pricing-and-discounts.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-dynamic-pricing-and-discounts/',
							'description'    => _x(
								'Increase conversions through dynamic discounts and price rules, and build powerful and targeted offers.',
								'[YOUR STORE TOOLS TAB] Description for plugin YITH WooCommerce Dynamic Pricing and Discounts',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_YWDPD_PREMIUM' ),
							'is_recommended' => false,
						),
						'customize-my-account'   => array(
							'name'           => 'Customize My Account Page',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/customize-myaccount-page.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-customize-my-account-page/',
							'description'    => _x( 'Customize the My Account page of your customers by creating custom sections with promotions and ad-hoc content based on your needs.', '[YOUR STORE TOOLS TAB] Description for plugin YITH WooCommerce Customize My Account', 'yith-woocommerce-wishlist' ),
							'is_active'      => defined( 'YITH_WCMAP_PREMIUM' ),
							'is_recommended' => false,
						),
						'recover-abandoned-cart' => array(
							'name'           => 'Recover Abandoned Cart',
							'icon_url'       => YITH_WCWL_URL . 'assets/images/plugins/recover-abandoned-cart.svg',
							'url'            => '//yithemes.com/themes/plugins/yith-woocommerce-recover-abandoned-cart/',
							'description'    => _x(
								'Contact users who have added products to the cart without completing the order and try to recover lost sales.',
								'[YOUR STORE TOOLS TAB] Description for plugin Recover Abandoned Cart',
								'yith-woocommerce-wishlist'
							),
							'is_active'      => defined( 'YITH_YWRAC_PREMIUM' ),
							'is_recommended' => false,
						),
					),
				);
			}

			/* === Fixed: not updated theme  === */
			if ( ! class_exists( 'YIT_Plugin_Panel_WooCommerce' ) ) {
				require_once YITH_WCWL_DIR . 'plugin-fw/lib/yit-plugin-panel-wc.php';
			}

			$this->panel = new YIT_Plugin_Panel_WooCommerce( $args );
		}

		/**
		 * Adds yith-disabled class
		 * Adds class to fields when required, and when disabled state cannot be achieved any other way (eg. by dependencies)
		 *
		 * @param array $classes Array of field extra classes.
		 * @param array $field   Array of field data.
		 *
		 * @return array Filtered array of extra classes
		 */
		public function mark_options_disabled( $classes, $field ) {
			if ( isset( $field['id'] ) && 'yith_wfbt_enable_integration' === $field['id'] && ! ( defined( 'YITH_WFBT' ) && YITH_WFBT ) ) {
				$classes[] = 'yith-disabled';
			}

			return $classes;
		}

		/**
		 * Load admin style.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function enqueue() {
			global $woocommerce, $pagenow;

			if ( 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'yith_wcwl_panel' === $_GET['page'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				wp_enqueue_style( 'yith-wcwl-admin' );
				wp_enqueue_script( 'yith-wcwl-admin' );

				if ( isset( $_GET['tab'], $_GET['sub_tab'] ) && 'dashboard' === $_GET['tab'] && 'dashboard-popular' === $_GET['sub_tab'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
					wp_enqueue_style( 'yith-wcwl-material-icons' );
					wp_enqueue_editor();
				}
			}
		}
	}
}

/**
 * Unique access to instance of YITH_WCWL_Admin class
 *
 * @return \YITH_WCWL_Admin
 * @since 2.0.0
 */
function YITH_WCWL_Admin() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid, Universal.Files.SeparateFunctionsFromOO
	if ( defined( 'YITH_WCWL_PREMIUM' ) ) {
		$instance = YITH_WCWL_Admin_Premium::get_instance();
	} elseif ( defined( 'YITH_WCWL_EXTENDED' ) ) {
		$instance = YITH_WCWL_Admin_Extended::get_instance();
	} else {
		$instance = YITH_WCWL_Admin::get_instance();
	}

	return $instance;
}
