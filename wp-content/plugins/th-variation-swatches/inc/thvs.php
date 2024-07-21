<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'TH_Variation_Swatches' ) ):

    class TH_Variation_Swatches {
         /**
         * Member Variable
         *
         * @var object instance
         */

       
       private static $instance;
       private $_settings_api;
  
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
    add_action( 'before_woocommerce_init', array( $this, 'hpos_compatibility') );
        $this->includes();
        $this->hooks();

        }

        public function includes() {
           
                require_once TH_VARIATION_SWATCHES_PLUGIN_PATH . '/inc/thvs-meta.php';
                require_once TH_VARIATION_SWATCHES_PLUGIN_PATH . '/inc/thvs-settings.php';
                require_once TH_VARIATION_SWATCHES_PLUGIN_PATH . '/inc/thvs-function.php';
                require_once TH_VARIATION_SWATCHES_PLUGIN_PATH . '/inc/thvs-hook.php';
                require_once TH_VARIATION_SWATCHES_PLUGIN_PATH . '/inc/thvs-front-custom-style.php';
    
            
        }

        public function hooks() {
            
                if ( $this->is_required_php_version() && $this->is_wc_active() ) {
                add_filter( 'body_class', array( $this, 'body_class' ) );
                add_action( 'wp_enqueue_scripts', array( $this, 'th_variation_swatches_enqueue_scripts' ), 15 );
                    }
                add_action( 'init', array( $this, 'settings_api' ), 5 );
        }

        public function is_wc_active() {
            return class_exists( 'WooCommerce' );
        }
        
        /**
     *  Declare the woo HPOS compatibility.
     */
    public function hpos_compatibility() {

            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', TH_VARIATION_SWATCHES_PLUGIN_FILE, true );
            }
    }

        public function images_uri( $file ) {
            $file = ltrim( $file, '/' );

            return TH_VARIATION_SWATCHES_IMAGES_URI . $file;
        }

        public function is_required_php_version() {
            return version_compare( PHP_VERSION, '5.6.0', '>=' );
        }
        public function settings_api() {

            if ( ! $this->_settings_api )  {
                $this->_settings_api = new TH_Variation_Swatches_Settings();
            }

            return $this->_settings_api;
        }

        public function add_setting( $tab_id, $tab_title, $tab_sections, $active = false, $is_pro_tab = false, $is_new = false ) {
            add_filter(
                'thvs_settings', function ( $fields ) use ( $tab_id, $tab_title, $tab_sections, $active, $is_pro_tab, $is_new ) {
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
        public function th_variation_swatches_get_option( $id ) {
           
            if ( ! $this->_settings_api ) {
                $this->settings_api();
            }
            
            return $this->_settings_api->get_option( $id );
        }

        public function th_variation_swatches_get_options() {
            return get_option( 'th_variation_swatches' );
        }

        public function body_class( $classes ) {
           
            $old_classes = $classes;
            if ( apply_filters( 'disable_thvs_body_class', false ) ) {
                return $classes;
            }
            array_push( $classes, 'th-variation-swatches' );
            if ( wp_is_mobile() ) {
                array_push( $classes, 'th-variation-swatches-on-mobile' );
            }
            array_push( $classes, sprintf( 'thvs-style-%s', $this->th_variation_swatches_get_option( 'style' ) ) );
            array_push( $classes, sprintf( 'thvs-attr-behavior-%s', $this->th_variation_swatches_get_option( 'attribute_behavior' ) ) );
            array_push( $classes, sprintf( 'thvs%s-css', $this->th_variation_swatches_get_option( 'stylesheet' ) ? '' : '-no' ) );
            
            return apply_filters( 'thvs_body_class', array_unique( $classes ), $old_classes );
        }

        public function add_term_meta( $taxonomy, $post_type, $fields ) {
            return new Th_Variation_Swatches_Term_Meta( $taxonomy, $post_type, $fields );
        }

        public function th_variation_swatches_enqueue_scripts(){
           
          if ( wc_string_to_bool( $this->th_variation_swatches_get_option( 'stylesheet' ) ) ) {
          wp_enqueue_style( 'th-variation-swatches', TH_VARIATION_SWATCHES_PLUGIN_URI. '/assets/css/thvs-front-style.css', array(), TH_VARIATION_SWATCHES_VERSION );
           }
          wp_add_inline_style('th-variation-swatches', thvs_front_custom_style());

          wp_enqueue_script( 'th-variation-swatches-front', TH_VARIATION_SWATCHES_PLUGIN_URI. '/assets/js/thvs-front.js', array(
                    'jquery',
                    'wp-util',
                    'underscore',
                    'wc-add-to-cart-variation'
                ),true);
          wp_localize_script(
                'th-variation-swatches-front', 'th_variation_swatches_options', apply_filters(
                    'th_variation_swatches_js_options', array(
                        'is_product_page'           => is_product(),
                        'show_variation_label'      => wc_string_to_bool( $this->th_variation_swatches_get_option( 'show_variation_label' ) ),
                        'variation_label_separator' => esc_html( $this->th_variation_swatches_get_option( 'variation_label_separator' ) ),
                        'thvs_nonce'                => wp_create_nonce( 'th_variation_swatches' ),
                    )
                )
            );

        }
       
    }
// Load Plugin
    function th_variation_swatches(){
        return TH_Variation_Swatches::instance();
    }
    add_action( 'plugins_loaded', 'th_variation_swatches', 25 );
endif; 