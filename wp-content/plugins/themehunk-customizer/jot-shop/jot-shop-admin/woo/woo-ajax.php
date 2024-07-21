<?php
if(!function_exists('jot_shop_cat_filter_ajax')){
/***************************/
//category product section product ajax filter
/***************************/

add_action('wp_ajax_jot_shop_cat_filter_ajax', 'jot_shop_cat_filter_ajax');
add_action('wp_ajax_nopriv_jot_shop_cat_filter_ajax', 'jot_shop_cat_filter_ajax');
function jot_shop_cat_filter_ajax(){
if(isset($_POST['data_cat_slug'])){
$prdct_optn = get_theme_mod('jot_shop_category_optn','recent');
$args = jot_shop_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
jot_shop_product_filter_loop($args);
}
    exit;
  }
}
