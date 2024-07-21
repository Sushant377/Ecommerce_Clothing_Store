<?php
// cart total item count filter
if ( ! function_exists( 'shopline_header_add_to_cart_fragment' ) ) :
    add_filter('woocommerce_add_to_cart_fragments', 'shopline_header_add_to_cart_fragment');
function shopline_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i><div class="cart-crl"><?php echo $woocommerce->cart->cart_contents_count; ?></div></a>
  <?php

  $fragments['a.cart-contents'] = ob_get_clean();
  return $fragments;
}
endif;

if ( ! function_exists( 'shopline_remove_to_cart_product' ) ) :
// add cart product filter
add_filter('woocommerce_add_to_cart_fragments', 'shopline_remove_to_cart_product');
function shopline_remove_to_cart_product( $fragments ) {
  ob_start();
  ?>
  <div class="sidebar-quickcart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.sidebar-quickcart'] = ob_get_clean();
    return $fragments;
}
endif;

if ( ! function_exists( 'woo_custom_cart_loader' ) ) :
add_filter('woocommerce_ajax_loader_url', 'woo_custom_cart_loader');
function woo_custom_cart_loader() {
 
 global $woocommerce;
 
 if(is_checkout() || is_cart()){
  return __(get_template_directory_uri().'/images/loader-ajax-new.gif', 'woocommerce');
    }
 else
  return __(get_template_directory_uri().'/images/ajax-loader@2x.gif', 'woocommerce');
}
endif;
