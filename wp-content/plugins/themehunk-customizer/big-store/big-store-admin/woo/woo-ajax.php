<?php
if(!function_exists('big_store_cat_filter_ajax')){
/***************************/
//category product section product ajax filter
/***************************/

add_action('wp_ajax_big_store_cat_filter_ajax', 'big_store_cat_filter_ajax');
add_action('wp_ajax_nopriv_big_store_cat_filter_ajax', 'big_store_cat_filter_ajax');
function big_store_cat_filter_ajax(){
if(isset($_POST['data_cat_slug'])){
$prdct_optn = get_theme_mod('big_store_category_optn','recent');
$args = big_store_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
big_store_product_filter_loop($args);
}
    exit;
  }
}
