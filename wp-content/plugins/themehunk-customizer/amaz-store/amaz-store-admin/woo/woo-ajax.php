<?php
if(!function_exists('amaz_store_cat_filter_ajax')){
/***************************/
//category product section product ajax filter
/***************************/

add_action('wp_ajax_amaz_store_cat_filter_ajax', 'amaz_store_cat_filter_ajax');
add_action('wp_ajax_nopriv_amaz_store_cat_filter_ajax', 'amaz_store_cat_filter_ajax');
function amaz_store_cat_filter_ajax(){
if(isset($_POST['data_cat_slug'])){
$prdct_optn = get_theme_mod('amaz_store_category_optn','recent');
$args = amaz_store_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
amaz_store_product_filter_loop($args);
}
    exit;
  }
}
