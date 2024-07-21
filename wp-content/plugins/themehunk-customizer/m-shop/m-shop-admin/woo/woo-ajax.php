<?php
if ( ! class_exists( 'WooCommerce' ) ){
  return;
}
/***************************/
//category product section product ajax filter
/***************************/



if( !function_exists('m_shop_cat_filter_ajax')){

add_action('wp_ajax_m_shop_cat_filter_ajax', 'm_shop_cat_filter_ajax');
add_action('wp_ajax_nopriv_m_shop_cat_filter_ajax', 'm_shop_cat_filter_ajax');
function m_shop_cat_filter_ajax(){
if(isset($_POST['data_cat_slug'])){
$prdct_optn = get_theme_mod('m_shop_category_optn','recent');
$args = m_shop_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
m_shop_product_filter_loop($args);
}
exit;
}
}