<?php 
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package  Big StoreWordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	   return;
}

if ( ! function_exists( 'is_plugin_active' ) ){
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( ! function_exists( 'big_store_add_to_cart_url' ) ) {
  /**
   * Get the add to cart template for the loop.
   *
   * @param array $args Arguments.
   */
  function big_store_add_to_cart_url($product){
     $args = array();
     if ( $product ){
      $defaults = array(
        'quantity'   => 1,
        'class'      => implode(
          ' ',
          array_filter(
            array(
              'button th-button',
              'product_type_' . $product->get_type(),
              $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
              $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
            )
          )
        ),
        'attributes' => array(
          'data-product_id'  => $product->get_id(),
          'data-product_sku' => $product->get_sku(),
          'aria-label'       => $product->add_to_cart_description(),
          'rel'              => 'nofollow',
        ),
      );

      $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

      if ( isset( $args['attributes']['aria-label'] ) ) {
        $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
      }

      wc_get_template( 'loop/add-to-cart.php', $args );
    }
  }
}
/**********************************/
//Shop Product Markup
/**********************************/
if ( ! function_exists( 'big_store_product_meta_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function big_store_product_meta_start(){
    echo '<div class="thunk-product-wrap"><div class="thunk-product">';
  }
}
if ( ! function_exists( 'big_store_product_meta_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_product_meta_end(){

    echo '</div></div>';
  }
}
/**********************************/
//Shop Product Image Markup
/**********************************/
if ( ! function_exists( 'big_store_product_image_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function big_store_product_image_start(){
    echo '<div class="thunk-product-image">';
  }
}
if ( ! function_exists( 'big_store_product_image_end' ) ){

  /**
   * Thumbnail wrap start.
   */
    function big_store_product_image_end(){
    
    echo '</div>';
  }
}

if ( ! function_exists( 'big_store_product_content_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function big_store_product_content_start(){
    echo '<div class="thunk-product-content">';
  }
}
if ( ! function_exists( 'big_store_product_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_product_content_end(){

    echo '</div>';
  }
}
 /**
   * Thunk-product-hover start.
   */
 if ( ! function_exists( 'big_store_product_hover_start' ) ){
  function big_store_product_hover_start(){

    echo'<div class="thunk-product-hover">';
    // do_action('big_store_wishlist');
    // do_action('big_store_compare');
      
  }
}
if ( ! function_exists( 'big_store_product_hover_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_product_hover_end(){
    
    echo '</div>';
  }
}

if ( ! function_exists( 'big_store_shop_content_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_shop_content_start(){
    $viewshow = get_theme_mod('big_store_prd_view','grid-view');
    if($viewshow == 'grid-view'){
    echo '<div id="shop-product-wrap" class="thunk-grid-view">';
    }else{
    echo '<div id="shop-product-wrap" class="thunk-list-view">';
    }
  }
}

if ( ! function_exists( 'big_store_shop_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_shop_content_end(){
    
    echo '</div>';
  }
}

function big_store_quickview(){
do_action('quickview');
}
/**
* Shop customization.
*
* @return void
*/
add_action( 'woocommerce_before_shop_loop_item', 'big_store_product_meta_start', 10);
add_action( 'woocommerce_after_shop_loop_item', 'big_store_product_meta_end', 12 );
add_action( 'woocommerce_before_shop_loop_item_title', 'big_store_product_content_start',20);
add_action( 'woocommerce_after_shop_loop_item_title', 'big_store_product_content_end', 20 );
add_action( 'woocommerce_after_shop_loop_item_title', 'big_store_product_hover_start',50);
add_action( 'woocommerce_after_shop_loop_item', 'big_store_product_hover_end',20);
add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_open',5);
add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',10);
add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',0);
add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 20);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price',0);
add_action( 'woocommerce_before_shop_loop_item_title', 'big_store_product_image_start', 0);
add_action( 'woocommerce_before_shop_loop_item_title', 'big_store_product_image_end',10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_show_product_sale_flash',4);
add_action( 'woocommerce_after_shop_loop_item', 'big_store_quickview',11);
add_action( 'woocommerce_after_shop_loop_item', 'big_store_whish_list_both',11);
add_action( 'woocommerce_after_shop_loop_item', 'big_store_add_to_compare_fltr_single',11);

add_action( 'woocommerce_before_shop_loop', 'big_store_shop_content_start',1);
add_action( 'woocommerce_after_shop_loop', 'big_store_shop_content_end',1);

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action('woocommerce_init','th_compare_add_action_shop_list');
//To disable th compare Pro button 
remove_action('woocommerce_init', 'tpcp_add_action_shop_list');
/***************/
// single page
/***************/
if ( ! function_exists( 'big_store_single_summary_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_single_summary_start(){
    
    echo '<div class="thunk-single-product-summary-wrap">';
  }
}
if( ! function_exists( 'big_store_single_summary_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function big_store_single_summary_end(){
    
    echo '</div>';
  }
}
add_action( 'woocommerce_before_single_product_summary', 'big_store_single_summary_start',0);
add_action( 'woocommerce_after_single_product_summary', 'big_store_single_summary_end',0);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs',40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_filter( 'woocommerce_product_tabs', 'big_store_woocommerce_custom_product_tabs', 40 );
function big_store_woocommerce_custom_product_tabs( $tabs ) {
     $tabs['delivery_information'] = array(
        'title'     => __( 'Meta Information', 'big-store' ),
        'priority'  => 40,
        'callback'  => 'woocommerce_product_meta_tab'
    );
   return $tabs;
}
function woocommerce_product_meta_tab(){// this is where you indicate what appears in the description tab
wc_get_template( 'single-product/meta.php' ); // The meta content first
}

/**
 * Add next/prev buttons @ WooCommerce Single Product Page
 */
 
add_action( 'woocommerce_single_product_summary', 'big_store_prev_next_product',0 );
 
// and if you also want them at the bottom...
add_action( 'woocommerce_single_product_summary', 'big_store_prev_next_product',0 );
 
function big_store_prev_next_product(){
 
echo '<div class="prev_next_buttons">';
 
   // 'product_cat' will make sure to return next/prev from current category
   $previous = next_post_link('%link', '&larr;', TRUE, ' ', 'product_cat');
   $next = previous_post_link('%link', '&rarr;', TRUE, ' ', 'product_cat');
 
   echo $previous;
   echo $next;
    
echo '</div>';
         
}

/****************/
// add to compare
/****************/
function bigstore_lite_plugin_get_version(){
if(is_plugin_active( 'themehunk-customizer/themehunk-customizer.php' )){  
$plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/themehunk-customizer/themehunk-customizer.php');
$plugin_version = $plugin_data['Version'];
return $plugin_version;
}
}

function bigstore_pro_plugin_get_version(){
if(is_plugin_active( 'big-store-pro/big-store-pro.php' )){    
$plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/big-store-pro/big-store-pro.php');
$plugin_version = $plugin_data['Version'];
return $plugin_version;
}
}


/**********************/
/** whishlist and compare both **/
/**********************/
if ( ! function_exists('big_store_whish_list_both')){
 function big_store_whish_list_both($pid){
      if( class_exists( 'YITH_WCWL' )){
        big_store_whish_list($pid);
    }
    elseif( ( class_exists( 'WPCleverWoosw' ))){
     echo do_shortcode('[woosw id='.$pid.']');
    }
}
}

if ( ! function_exists('big_store_add_to_compare_fltr_both')){
function big_store_add_to_compare_fltr_both($pid){
             big_store_add_to_compare_fltr($pid);      
                  
}
}


/**********************/
/** compare **/
/**********************/

function big_store_add_to_compare_fltr_single(){
global $product;
$pid = $product->get_id();
      if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
    echo '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button">
          <a class="th-product-compare-btn compare button" data-th-product-id="'.$pid.'"></a>
          </div></span></div>';

           } 

   }

function big_store_add_to_compare_fltr($pid){ 
  if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
    echo '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button">
          <a class="th-product-compare-btn compare button" data-th-product-id="'.$pid.'"></a>
          </div></span></div>';

           }
        }
/**********************/
/** wishlist **/
/**********************/

 function big_store_whish_list_single($pid){
       if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
        echo '<div class="thunk-wishlist"><span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist  product_id='.$pid.' icon="fa fa-heart-o" label="wishlist" already_in_wishslist_text="Already" browse_wishlist_text="Added"]' ).'</span></div>';
     }
 } 

  function big_store_whish_list($pid){
       if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
        echo '<div class="thunk-wishlist">
        <span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist  product_id='.$pid.' icon="th-icon th-icon-heart1" label="wishlist" already_in_wishslist_text="Already" browse_wishlist_text="Added"]' ).'</span></div>';
     }
     elseif( ( class_exists( 'WPCleverWoosw' ))){
     echo do_shortcode('[woosw id='.$pid.']');
    }

 } 


/**********************/
/** wishlist url**/
/**********************/
function big_store_whishlist_url(){
$wishlist_page_id =  get_option( 'yith_wcwl_wishlist_page_id' );
$wishlist_permalink = get_the_permalink( $wishlist_page_id );
return $wishlist_permalink ;
} 
// shop open
/** My Account Menu **/
function big_store_account(){
 if ( is_user_logged_in() ){
  $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span class="th-icon th-icon-user"></span></a></a>';
  } 
 else {
  $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span class="th-icon th-icon-lock1"></a>';
}
 echo $return;
 }

 // Plus Minus Quantity Buttons @ WooCommerce Single Product Page
add_action( 'woocommerce_before_add_to_cart_quantity', 'big_store_display_quantity_minus',10,2 );
function big_store_display_quantity_minus(){
    echo '<div class="big-store-quantity"><button type="button" class="minus" >-</button>';
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'big_store_display_quantity_plus',10,2 );
function big_store_display_quantity_plus(){
    echo '<button type="button" class="plus" >+</button></div>';
}

//Woocommerce: How to remove page-title at the home/shop page but not category pages
add_filter( 'woocommerce_show_page_title', 'big_store_not_a_shop_page' );
function big_store_not_a_shop_page() {
    return boolval(!is_shop());
}

//***********************/
// product category list
//************************/
function big_store_product_list_categories( $args = '' ){
  if (!class_exists( 'WooCommerce' )) {
    return;
  }
$term = get_theme_mod('big_store_exclde_category','');
if(!empty($term[0])){
  $exclude_id = $term;
  }else{
  $exclude_id = '';
 }
$defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 5,
        'echo'                => 0,
        'exclude'             => $exclude_id,
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','big-store' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="product-cat-list thunk-product-cat-list" data-menu-style="vertical">'.$html.'</ul>';
  }
function big_store_product_list_categories_mobile( $args = '' ){
  $term = get_theme_mod('big_store_exclde_category','');
if(!empty($term[0])){
  $exclude_id = $term;
  }else{
  $exclude_id = '';
 }
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 5,
        'echo'                => 0,
        'exclude'             => $exclude_id,
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','big-store' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="thunk-product-cat-list mobile" data-menu-style="accordion">'.$html.'</ul>';
  }