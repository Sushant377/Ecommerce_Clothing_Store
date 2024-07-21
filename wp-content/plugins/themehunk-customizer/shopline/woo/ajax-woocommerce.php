<?php
/** remove cart product **/
if ( ! function_exists( 'shopline_product_remove' ) ) :

add_action( 'wp_ajax_shopline_product_remove', 'shopline_product_remove' );
add_action( 'wp_ajax_nopriv_shopline_product_remove', 'shopline_product_remove' );
function shopline_product_remove() {
    global $woocommerce;
    $cart = $woocommerce->cart;
foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item){
    if($cart_item['product_id'] == $_POST['product_id'] ){
        // Remove product in the cart using  cart_item_key.
        $cart->remove_cart_item($cart_item_key);
        woocommerce_mini_cart();
            exit();
      }
    }
  die();
}
endif;

if ( ! function_exists( 'shopline_product_count_update' ) ) :

add_action( 'wp_ajax_shopline_product_count_update', 'shopline_product_count_update' );
add_action( 'wp_ajax_nopriv_shopline_product_count_update', 'shopline_product_count_update' );
function shopline_product_count_update() {
        global $woocommerce; ?>
        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-contents" ><i class="fa fa-shopping-cart"></i><div class="cart-crl"><?php echo $woocommerce->cart->cart_contents_count; ?></div></a>     
    <?php
      die();
}
endif;
if ( ! function_exists( 'addtocart' ) ) :

function addtocart(){
return $woocommerce->cart->add_to_cart( 1133 );
}
endif;

if ( ! function_exists( 'shopline_popup_product' ) ) :

add_action('wp_ajax_shopline_popup_product', 'shopline_popup_product');
add_action( 'wp_ajax_nopriv_shopline_popup_product', 'shopline_popup_product' );

function shopline_popup_product() {
   if(isset($_POST['popup'])){
   $productId = $_POST['popup'];

  
global $woocommerce;


$myarray = array($productId);

$args = array('post_type' => 'product',
      'post_status' => 'publish',
      'post__in' => $myarray
);

// The Query
$query = new WP_Query( $args );
 if($query->have_posts()) :
    while($query->have_posts()) : $query->the_post();
      global $product;
        $priceing = $product->get_price_html();
        $excerpt = $product->post->post_excerpt;
        $title =get_the_title();
        $rating =$product->get_rating_html();

        $category = wc_get_product_category_list($productId,' / ');


        $attachment_ids = $product->get_gallery_attachment_ids();
        $img = $label = '';
    if(!empty($attachment_ids)):  
        foreach( $attachment_ids as $attachment_id ) 
            {
              // Display the image URL
              $url = wp_get_attachment_url( $attachment_id );

              $img .='<input id="popup-slide-dot-'.$attachment_id.'" type="radio" name="slides" checked>
        <div style="background-image: url('.$url.');" class="popup-slide slide-'.$attachment_id.'"></div>';

              $label .='<label for="popup-slide-dot-'.$attachment_id.'"></label>';
              // Display Image instead of URL
             // $img .= wp_get_attachment_image($attachment_id, 'full');

            }
    else:

      $img .='<input id="popup-slide-dot-'.$productId.'" type="radio" name="slides" checked>
        <div style="background-image: url('.wc_placeholder_img_src().');" class="popup-slide slide-'.$productId.'"></div>';
              $label .='<label for="popup-slide-dot-'.$productId.'"></label>';

    endif;

     if ($average = $product->get_average_rating()) :
        $rating =  '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';
     endif; 

      $cart = shopline_add_to_cart_url($product);

     echo '<div id="shopline-popup-boxes">
<div id="dialog" class="product window">
  <div class="header">
  <div class="back close"></div>
  </div>
   <div class="main">
   <div class="head">
   <h1>'.$title.'</h1>
      <h2>'.$category.'</h2></div>
    <div class="left">
      <div class="popup-slider-container">
      <div class="popup-menu">
      '.$label.'
      </div>
      '.$img.'
      </div>
    </div>
    <div class="right">
      <p>'.$excerpt.'</p>'.$rating.shopline_whish_list().'
      <p class="quantity">Quantity'.shopline_quantity_add_to_cart($product).'</p>
    </div>
  </div>
  <div class="footer">
    <div class="left">
      <p id="price">'.$priceing.'</p>
    </div>
    <div class="right">
      '.$cart.'
    </div>
  </div>
</div><div style="display: none; opacity: 0.8;" id="mask"></div>'; 
  endwhile;
  wp_reset_postdata();

endif;
}
die();
}
endif;

/**
* Loop Add to Cart -- with quantity and AJAX
*/
if ( ! function_exists( 'shopline_quantity_add_to_cart' ) ) :

function shopline_quantity_add_to_cart($product){
$quantity = '';
if( $product->get_price() === '' && $product->product_type != 'external' ) return;

 if ( ! $product->is_in_stock() ) : ?>

    <a href="<?php echo get_permalink($product->id); ?>" class="button"><?php echo apply_filters('out_of_stock_add_to_cart_text', __('Read More', 'shopline')); ?></a>

<?php else :

        switch ( $product->product_type ) {
            case "variable" :
                $link   = get_permalink($product->id);
                $label  = apply_filters('variable_add_to_cart_text', __('Select options', 'shopline'));
            break;
            case "grouped" :
                $link   = get_permalink($product->id);
                $label  = apply_filters('grouped_add_to_cart_text', __('View options', 'shopline'));
            break;
            case "external" :
                $link   = get_permalink($product->id);
                $label  = apply_filters('external_add_to_cart_text', __('Read More', 'shopline'));
            break;
            default :
                $link   = esc_url( $product->add_to_cart_url() );
                $label  = apply_filters('add_to_cart_text', __('Add to cart', 'shopline'));
            break;
        }

        if ( $product->product_type == 'simple' ) {
           $quantity = '<form action="'.esc_url( $product->add_to_cart_url() ).'" class="cart" method="post" enctype="multipart/form-data">

                '. woocommerce_quantity_input( array(), $product, false ) .'
            </form>';


            // <button type="submit" data-quantity="1" data-product_id="'. $product->id .'"
            //         class="button alt ajax_add_to_cart add_to_cart_button product_type_simple">'. $label .'</button>
        } else {
            $form = sprintf('<a href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a>', $link, $product->id, $product->product_type, $label);
        }
     endif; 

     return $quantity;
}
endif;
