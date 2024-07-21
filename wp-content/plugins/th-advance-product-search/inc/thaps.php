<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'TH_Advance_Product_Search' ) ):

    class TH_Advance_Product_Search {
         /**
         * Member Variable
         *
         * @var object instance
         */

       
       private static $instance;
       private $_settings_api;
       public  $searchInstances = 0 ;
       /**
         * Initiator
         */
        public static function instance() {
            if ( ! isset( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct(){
        add_action( 'before_woocommerce_init', array( $this, 'hpos_compatibility' ) );
        $this->includes();
        $this->hooks();
        // Plugin is compatible with HPOS.

        }

        public function includes() {
           
                
                require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/thaps-settings.php';
                require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/thaps-option-setting.php';
                require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/thaps-function.php';
                require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/thaps-front-custom-style.php';

                require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/thaps-nav-menu.php';
                require_once TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . 'inc/widget.php';
            
        }

        public function hooks() {
               add_action( 'init', array( $this, 'setImageSize' ));
           
                add_action( 'init', array( $this, 'settings_api' ), 5 );
                add_shortcode( 'th-aps', array( $this, 'addBody' ), 5 );
                add_shortcode( 'th-aps-wdgt', array( $this, 'addBody' ), 5 );
                add_filter( 'body_class', array( $this, 'body_class' ) );
                add_action( 'wp_enqueue_scripts', array( $this, 'th_advance_product_search_scripts' ), 15 );
           
        }

        public function is_wc_active() {
            return class_exists( 'WooCommerce' );
        }


        	/**
		 *  Declare the woo HPOS compatibility.
		 */
		public function hpos_compatibility() {

            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_FILE, true );
            }
		}
	
        

      

        public function is_required_php_version() {
            return version_compare( PHP_VERSION, '5.6.0', '>=' );
        }

        public function settings_api() {

           
           $this->_settings_api = new TH_Advancde_Product_Search_Set();
            

            return $this->_settings_api;
        }

        public function get_option( $id ) {
           
            if ( ! $this->_settings_api ) {
                $this->settings_api();
            }
            
            return $this->_settings_api->get_option( $id );
        }

        public function get_options() {
            return get_option( 'th_advance_product_search' );
        }

        public function body_class( $classes ) {
           
            $old_classes = $classes;
            if ( apply_filters( 'disable_thaps_body_class', false ) ) {
                return $classes;
            }
            array_push( $classes, 'th-advance-product-search' );
            if ( wp_is_mobile() ) {
                array_push( $classes, 'th-advance-product-search-on-mobile' );
            }
            
            return apply_filters( 'thads_body_class', array_unique( $classes ), $old_classes );
        }

        public function th_advance_product_search_scripts(){

          wp_enqueue_style( 'th-icon', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'th-icon/style.css', array(), TH_ADVANCE_PRODUCT_SEARCH_VERSION );  
          wp_enqueue_style( 'th-advance-product-search-front', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'assets/css/thaps-front-style.css', array(), TH_ADVANCE_PRODUCT_SEARCH_VERSION );
          wp_add_inline_style('th-advance-product-search-front', th_advance_product_search_style());
          wp_enqueue_script( 'th-advance-product-search-front', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'assets/js/thaps-search.js', array(
                    'jquery',
                ),true);
          
          wp_localize_script(
                'th-advance-product-search-front', 'th_advance_product_search_options', apply_filters(
                    'th_advance_product_search_js_options', array(
                        'ajaxUrl'   => esc_url(admin_url( 'admin-ajax.php' )),
                        'thaps_nonce'                     => wp_create_nonce( 'th_advance_product_search' ),

                        'thaps_length'                    => esc_html(th_advance_product_search()->get_option( 'set_autocomplete_length' )),

                        'thaps_ga_event'                    => apply_filters( 'thaps_google_analytics_events', true ),
                        'thaps_ga_site_search_module'       => apply_filters( 'thaps_enable_ga_site_search_module', false ),

                    )
                )
            );

        }

         public function add_setting( $tab_id, $tab_title, $tab_sections, $active = false, $is_pro_tab = false, $is_new = false ) {
            add_filter(
                'thaps_settings', function ( $fields ) use ( $tab_id, $tab_title, $tab_sections, $active, $is_pro_tab, $is_new ) {
                array_push(
                    $fields, array(
                        'id'       => $tab_id,
                        'title'    => esc_html( $tab_title ),
                        'active'   => $active,
                        'sections' => $tab_sections,
                        'is_pro'   => $is_pro_tab,
                        'is_new'   => $is_new
                    )
                );

                return $fields;
            }
            );
        }
       
      /*****************/
      // ADD SHORTCODE
      /*****************/
       public function addBody( $atts, $content, $tag ) {

        $searchArgs = shortcode_atts( array(
            'layout'         => '',
        ), $atts, $tag );

        $args = apply_filters( 'thaps_shortcode_form_arg', $searchArgs );

        return self::getForm( $args );
       }

       public function getForm( $args ) {

        wp_enqueue_script( 'th-advance-product-search-front' );

        ob_start();

        $filename = apply_filters( 'thaps_form_path', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_PATH . '/inc/thaps-search-from.php' );

        if ( file_exists( $filename ) ) {

            include $filename;

            if ( function_exists( 'wp_opcache_invalidate' ) ) {

                wp_opcache_invalidate( $filename, true );

            }
        }
        
        $html = ob_get_clean();

        return apply_filters( 'thaps_form_html', $html, $args );
       }


       /****************short code end**********************/

       public function setImageSize() {

        add_image_size( 'thaps-thumb-img', 48, 0, true );
        
      }
       

 
}
// Load Plugin
    function th_advance_product_search(){
        return TH_Advance_Product_Search::instance();
    }
    add_action( 'plugins_loaded', 'th_advance_product_search', 25 );
endif; 