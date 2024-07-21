<?php
if(!function_exists('jot_shop_product_query')){
    function jot_shop_product_query($term_id,$prdct_optn){
   $limit_product = get_theme_mod('jot_shop_prd_shw_no','20');
    // product filter
    $args = array('limit' => $limit_product, 'visibility' => 'catalog','status' => array( 'publish' ));
    if($term_id){
        $term_args = array('hide_empty' => 1,'slug'    => $term_id);
        $product_categories = get_terms( 'product_cat', $term_args);
    $product_cat_slug =  $product_categories[0]->slug;
    $args['category'] = $product_cat_slug;
    }
    if($prdct_optn=='random'){
      $args['orderby'] = 'rand';
    }elseif($prdct_optn=='featured'){
          $args['featured'] = true;
    }
    if(get_option('woocommerce_hide_out_of_stock_items')=='yes'){ 
            $args['stock_status'] = 'instock';
    }
    return $args;
    }
}

if(!function_exists('jot_shop_product_slide_list_loop')){
/********************************/
//product slider loop
/********************************/
function jot_shop_product_slide_list_loop($term_id,$prdct_optn){  
$args = jot_shop_product_query($term_id,$prdct_optn);
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class(); ?>>
          <div class="thunk-list">
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                  <?php echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' ); ?>
                  </a>
               </div>
               <div class="thunk-product-content">
                  <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-title woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
                  <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
          </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','jot-shop' );
    }
    wp_reset_query();
}
}

if(!function_exists('jot_shop_category_tab_list')){
/**********************************************
//Funtion Category list show
 **********************************************/   
function jot_shop_category_tab_list( $term_id ){
  if( taxonomy_exists( 'product_cat' ) && !empty($term_id)){ 
      // category filter  
      $args = array(
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'       => $term_id
        );
      $product_categories = get_terms( 'product_cat', $args );
      $count = count($product_categories);
      $cat_list = $cate_product = '';
      $cat_list_drop = '';
      $i=1;
      $dl=0;
?>
<?php
//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
  $device_cat =  '1';
    //browser reported as an iPhone/iPod touch -- do something here
}else if($iPad){
  $device_cat =  '3';
    //browser reported as an iPad -- do something here
}else if($Android){
  $device_cat =  '2';
    //browser reported as an Android device -- do something here
}else if($webOS){
   $device_cat =  '4';
    //browser reported as a webOS device -- do something here
}else{
    $device_cat =  '5';
}
     if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
              $current_class = '';
              $cat_list .='
                  <li>
                  <a data-filter="' .esc_attr($product_category->slug) .'" data-animate="fadeInUp"  href="#"  data-term-id='.esc_attr($product_category->term_id) .' product_count="'.esc_attr($product_category->count).'">
                     '.esc_html($product_category->name).'</a>
                  </li>';
          if ($i++ == $device_cat) break;
          }
          if($count > $device_cat){
          foreach ( $product_categories as $product_category ){
              //global $product; 
              $dl++;
              if($dl <= $device_cat) continue;
              $category_product = array();
              $current_class = '';
              $cat_list_drop .='
                  <li>
                  <a data-filter="' .esc_attr($product_category->slug) .'" data-animate="fadeInUp"  href="#"  data-term-id='.esc_attr($product_category->term_id) .' product_count="'.esc_attr($product_category->count).'">
                     '.esc_html($product_category->name).'</a>
                  </li>';
          }
        }
          $return = '<div class="tab-head" catlist="'.esc_attr($i).'" >
          <div class="tab-link-wrap">
          <ul class="tab-link">';
 $return .=  $cat_list;
 $return .= '</ul>';
 if($count > $device_cat){
  $return .= '<div class="header__cat__item dropdown"><a href="#" class="more-cat" title="'.__('More categories...','jot-shop').'">•••</a><ul class="dropdown-link">';
 $return .=  $cat_list_drop;
 $return .= '</ul></div>';
}
  $return .= '</div></div>';

 echo $return;
       }
    } 
}
}
if(!function_exists('jot_shop_product_cat_filter_default_loop')){
/********************************/
//product cat filter loop
/********************************/
function jot_shop_product_cat_filter_default_loop($term_id,$prdct_optn){
  global $product;
 $args = jot_shop_product_query($term_id,$prdct_optn);
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class('product',$pid); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
            
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                 <?php 
                      echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' );
                       $hover_style = get_theme_mod( 'jot_shop_woo_product_animation' );
                         // the_post_thumbnail();
                        if ( 'swap' === $hover_style ){
                                $attachment_ids = $product->get_gallery_image_ids($pid);
                                if(!empty($attachment_ids)){
                             
                                 $glr = wp_get_attachment_image($attachment_ids[0], 'shop_catalog', false, array( 'class' => 'show-on-hover' ));
                                   echo $category_product['glr'] = $glr;

                                 }
                               
                           }
                           if ( 'slide' === $hover_style ){
                                $attachment_ids = $product->get_gallery_image_ids($pid);
                                if(!empty($attachment_ids)){
                             
                                 $glr = wp_get_attachment_image($attachment_ids[0], 'shop_catalog', false, array( 'class' => 'show-on-slide' ));
                                   echo $category_product['glr'] = $glr;

                                 }
                               
                           }
                  ?>
                  </a>

                   <?php  echo'<div class="add-to-cart">';
                echo jot_shop_add_to_cart_url($product); 
                 echo '</div>';
                 ?>
                  
               </div>

               <div class="thunk-product-content">
                <?php if (class_exists('TH_Variation_Swatches_Pro')) {
                        thvs_loop_available_attributes($product);
                      }  ?>
                <h2 class="woocommerce-loop-product__title"><a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
                </h2>
                   <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  
                  <div class="price"><?php echo $product->get_price_html(); ?></div> 
               </div>
               <div class="thunk-product-hover">     
                    <?php 
                      //echo jot_shop_add_to_cart_url($product);
                      if(get_theme_mod( 'jot_shop_woo_quickview_enable', true )){
                  ?>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span><?php _e('Quick View','jot-shop');?></span>
                                   </a>
                                </span>
                    </div>
                  <?php } 

                     if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
                      echo jot_shop_add_to_compare_fltr($pid);
                        }
                          elseif( ( class_exists( 'WPCleverWoosc' ))){
                    jot_shop_wpc_compare($pid);
                  }
                    
                if( class_exists( 'YITH_WCWL' )){
                      jot_shop_whish_list($pid);
                    }
                      elseif( ( class_exists( 'WPCleverWoosw' ))){
                      jot_shop_wpc_wish_list($pid);
                    }
                  
                  ?>
                   
            </div>
          </div>
        </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','jot-shop' );
    }
     wp_reset_query();
}
}
if(!function_exists('jot_shop_product_filter_loop')){
function jot_shop_product_filter_loop($args){  
  global $product;
   $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      $hover_style = get_theme_mod( 'jot_shop_woo_product_animation' );
        if('swap' === $hover_style){
      
      $attachment_ids = $product->get_gallery_image_ids();
      if(count($attachment_ids) > '0'){
                $swapclasses='jot-shop-swap-item-hover product';
        }
       }elseif('slide' === $hover_style){
       
      $attachment_ids = $product->get_gallery_image_ids();
      if(count($attachment_ids) > '0'){
                $swapclasses='jot-shop-slide-item-hover product';
        }
       } else{
        $swapclasses='product';
       }
      ?>
        <div <?php post_class($swapclasses,$pid); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
            
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                 <?php 
                      echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' );
                       $hover_style = get_theme_mod( 'jot_shop_woo_product_animation' );
                         // the_post_thumbnail();
                        if ( 'swap' === $hover_style ){
                                $attachment_ids = $product->get_gallery_image_ids($pid);
                                if(!empty($attachment_ids)){
                             
                                 $glr = wp_get_attachment_image($attachment_ids[0], 'shop_catalog', false, array( 'class' => 'show-on-hover' ));
                                   echo $category_product['glr'] = $glr;

                                 }
                               
                           }
                           if ( 'slide' === $hover_style ){
                                $attachment_ids = $product->get_gallery_image_ids($pid);
                                if(!empty($attachment_ids)){
                             
                                 $glr = wp_get_attachment_image($attachment_ids[0], 'shop_catalog', false, array( 'class' => 'show-on-slide' ));
                                   echo $category_product['glr'] = $glr;

                                 }
                               
                           }
                  ?>
                  </a>

                   <?php  echo'<div class="add-to-cart">';
                echo jot_shop_add_to_cart_url($product); 
                 echo '</div>';
                 ?>
                  
               </div>

               <div class="thunk-product-content">
             <?php   if (class_exists('TH_Variation_Swatches_Pro')) {
                        thvs_loop_available_attributes($product);
                      } ?>
                <h2 class="woocommerce-loop-product__title"><a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
                </h2>
                   <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  
                  <div class="price"><?php echo $product->get_price_html(); ?></div> 
               </div>
               <div class="thunk-product-hover">     
                    <?php 
                      //echo jot_shop_add_to_cart_url($product);
                      if(get_theme_mod( 'jot_shop_woo_quickview_enable', true )){
                  ?>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span><?php _e('Quick View','jot-shop');?></span>
                                   </a>
                                </span>
                    </div>
                  <?php } 
                          
                          if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
                            echo jot_shop_add_to_compare_fltr($pid);
                          }
                    
                if( class_exists( 'YITH_WCWL' )){
                      echo jot_shop_whish_list($pid);
                    }
                     
                  ?>
                   
            </div>
          </div>
        </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','jot-shop' );
    }
    wp_reset_postdata();
}
}
if(!function_exists('jot_shop_post_query')){
/*****************************/
// Product show function
/****************************/
function jot_shop_post_query($query){

       $args = array(
            'orderby' => esc_html($query['orderby']),
            'order' => 'DESC',
            'ignore_sticky_posts' => esc_html($query['sticky']),
            'post_type' => 'post',
            'posts_per_page' => esc_html($query['count']), 
            'cat' => esc_html($query['cate']),
            'meta_key'     => '_thumbnail_id',
           
        );

       if($query['thumbnail']){
          $args['meta_key'] = '_thumbnail_id';
       }

            $return = new WP_Query($args);

            return $return;
}

}
if(!function_exists('jot_shop_product_list_categories_slider')){
  function jot_shop_product_list_categories_slider( $args = '' ){
    $term = get_theme_mod('jot_shop_include_category_slider','0');
  if(!empty($term['0'])){
    $include_id = $term;
    }else{
     $include_id = '';
   }
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 2,
        'echo'                => 0,
        'exclude'             => '',
        'exclude_tree'        => '',
        'include'             => esc_html($include_id),
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
        'show_option_none'    => __( 'No categories','jot-shop' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
        'walker'        => new Jot_Shop_List_Category_Images
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="thunk-product-cat-list slider" data-menu-style="vertical">'.$html.'</ul>';
  }
  // cLASS To fetch cat image
class Jot_Shop_List_Category_Images extends Walker_Category {
    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        $saved_data =  get_term_meta( $category->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $saved_data); 
        $cat_name = apply_filters(
            'list_cats',
            esc_attr( $category->name ),
            $category
        );
        $link='';
        
        $link.= '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
        if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        }

        $link .= '>';
        if(!empty($image)){
        $link .='<img src="' . $image . '">';
         }
        $link .= $cat_name . '</a>';
       

        if ( ! empty( $args['show_count'] ) ) {
            $link .= ' (' . number_format_i18n( $category->count ) . ')';
        }
        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
            $class = 'cat-item cat-item-' . $category->term_id;
            if ( ! empty( $args['current_category'] ) ) {
                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                if ( $category->term_id == $args['current_category'] ) {
                    $class .=  ' current-cat';
                } elseif ( $category->term_id == $_current_category->parent ) {
                    $class .=  ' current-cat-parent';
                }
            }
            $output .=  ' class="' . $class . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}
}
if (!function_exists('jot_shop_wpc_wish_list')) {
function jot_shop_wpc_wish_list($pid=''){
  echo do_shortcode('[woosw id='.$pid.']');
}
}
if (!function_exists('jot_shop_wpc_compare')) {
function jot_shop_wpc_compare($pid=''){
  echo do_shortcode('[woosc id='.$pid.']');
}
}
/**************************************/
//Below footer function
/**************************************/
if ( ! function_exists( 'jot_shop_below_footer_markup' ) ){  
function jot_shop_below_footer_markup(){ ?>   
<div class="below-footer">
      <div class="container">
        <div class="below-footer-bar thnk-col-1">
          <div class="below-footer-col1"> 
           <p class="footer-copyright">&copy;
              <?php
              echo date_i18n(
                /* translators: Copyright date format, see https://www.php.net/date */
                _x( 'Y', 'copyright date format', 'jot-shop' )
              );
              ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
              <span class="powered-by-wordpress">
              <span><?php _e( 'Designed by', 'jot-shop' ); ?></span>
              <a href="<?php echo esc_url( __( 'https://themehunk.com/', 'jot-shop' ) ); ?>" target="_blank">
                <?php _e( 'Themehunk', 'jot-shop' ); ?>
              </a>
            </span>
            </p><!-- .footer-copyright -->
           </div>
        </div>
      </div>
</div>
                  
<?php }
}
add_action( 'jot_shop_below_footer', 'jot_shop_below_footer_markup' );