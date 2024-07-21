<?php
if (!function_exists('themehunk_admin_menu')) {
  include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
    define('THEMEHUNK_PURL', plugin_dir_url(__FILE__));
    define('THEMEHUNK_PDIR', plugin_dir_path(__FILE__));
    add_action('admin_menu',  'themehunk_admin_menu');
    add_action( 'admin_enqueue_scripts', 'admin_scripts');

    function themehunk_admin_menu(){
            add_menu_page(__('ThemeHunk', 'th-product-compare'), __('ThemeHunk', 'th-product-compare'), 'manage_options', 'themehunk-plugins', 'themehunk_plugins',  THEMEHUNK_PURL . '/th-option/assets/images/ico.png', 59);
        }
    function themehunk_plugins(){

      if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.','th-advance-product-search' ) );
        }

        include_once THEMEHUNK_PDIR . "/th-option/th-option.php";
        $obj = new themehunk_plugin_option();
        $obj->tab_page();
    }

function admin_scripts( $hook ) {
  
    if ($hook === 'toplevel_page_themehunk-plugins'  ) {
      
      wp_enqueue_style( 'themehunk-plugin-css', THEMEHUNK_PURL . '/th-option/assets/css/started.css' );

      wp_enqueue_script('themehunk-plugin-js', THEMEHUNK_PURL . '/th-option/assets/js/th-options.js',array( 'jquery', 'updates' ),'1', true);

      wp_localize_script(
          'themehunk-plugin-js', 'ThCompareAdmin', array(
            'nonce'         => wp_create_nonce( 'th_product_compare_admin_nonce' ),
          )
      );

    }

  }

}