<?php

if (!defined('ABSPATH')){

    exit;
}

include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( is_plugin_active( 'th-product-compare-pro/th-product-compare-pro.php' ) ) {

    exit;
}

if ( ! class_exists( 'Th_Product_Compare_Notice' ) ){

class Th_Product_Compare_Notice{

    function __construct(){

        if(isset($_GET['ntc-cmpr-disable']) && $_GET['ntc-cmpr-disable'] == true){
        add_action('admin_init', array($this,'th_product_compare_notice_set_cookie'));
        }

       
        if(!isset($_COOKIE['thntc_time'])) {
        add_action( 'admin_enqueue_scripts', array($this,'th_product_compare_admin_enqueue_style') );
        add_action( 'admin_notices', array($this,'th_product_compare_admin_notice' ));
        }

        if(isset($_COOKIE['thntc_time'])) {
            add_action( 'admin_notices', array($this,'th_product_compare_notice_unset_cookie'));
        }

        
    }

    function th_product_compare_admin_enqueue_style(){

         wp_enqueue_style( 'th-product-compare-notice-style', TH_PRODUCT_URL.'notice/css/th-notice.css', array(), '1.0.0' );

    } 

    function th_product_compare_admin_notice() { 

    if(isset($_GET['ntc-cmpr-disable'])){

          $display ='none';

          }else{

          $display ='block';

          }

    ?>
     
    <div class="th-product-compare-notice notice " style="display:<?php echo esc_attr($display); ?>">
        <div class="th-product-compare-notice-wrap">
         <div class="th-product-compare-notice-image"><img src="<?php echo esc_url( TH_PRODUCT_URL.'notice/img/compare-pro.png' );?>" alt="<?php _e('TH Product Compare Pro','th-product-compare'); ?>"></div>
            <div class="th-product-compare-notice-content-wrap">
                <div class="th-product-compare-notice-content">
                <p class="th-product-compare-heading"><?php _e('Let\'s remove users confusion & help them to choose the correct product. Make product selection easy & advanced, using Compare Pro.','th-product-compare'); ?></p>
                <p><?php _e('Filter Similarities and Differences in Compare table for fast and easy comparison. You can show Custom and Global Attributes in the Compare table and order them in your desired order.','th-product-compare'); ?></p>
                </div>
                <a target="_blank" href="<?php echo esc_url('https://themehunk.com/th-product-compare-plugin/');?>" class="upgradetopro-btn"><?php _e('Upgrade To Pro','th-product-compare');?> </a>
            </div>
            <a href="?ntc-cmpr-disable=1"  class="ntc-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>
        </div>
    </div>

    <?php }


    function th_product_compare_notice_set_cookie() { 
 
        $visit_time = date('F j, Y  g:i a');

        $cok_time = time()+(86457*30);
 
        if(!isset($_COOKIE['thntc_time'])) {
 
        // set a cookie for 1 year
        setcookie('thntc_time', $cok_time, time()+(86457*30));
             
        }
 
    }

    function th_product_compare_notice_unset_cookie(){

            $visit_time = time();

            $cookie_time = isset($_COOKIE['thntc_time']) ? sanitize_key($_COOKIE['thntc_tim']) : '0';

            if ($cookie_time < $visit_time) {

            setcookie('thntc_time', null, strtotime('-1 day'));

            }

    }

    
}

$obj = New Th_Product_Compare_Notice();

 }
