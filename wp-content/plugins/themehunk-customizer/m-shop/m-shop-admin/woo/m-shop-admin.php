<?php
if ( ! class_exists( 'WooCommerce' ) ){
  return;
}
if ( ! function_exists( 'm_shop_add_to_compare_fltr' ) ){ 
         /*********************/
        // Th Product compare
        /**********************/
        function m_shop_add_to_compare_fltr($pid){
    if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
    echo '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button">
          <a class="th-product-compare-btn compare button" data-th-product-id="'.$pid.'"></a>
          </div></span></div>';

           }elseif( ( class_exists( 'WPCleverWooscp' ))){
           echo '<div class="thunk-compare">'.do_shortcode('[wooscp id='.$pid.']').'</div>';
         }

        }

}

 if ( ! function_exists( 'm_shop_whish_list' ) ){ 
          /**********************/
          /** wishlist **/
          /**********************/
           function m_shop_whish_list($pid=''){
                if( shortcode_exists( 'yith_wcwl_add_to_wishlist' )){
                  echo '<div class="thunk-wishlist"><span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$pid.' icon="fa fa-heart" label='.__('wishlist','themehunk-customizer').'
                   already_in_wishslist_text='.__('Already','themehunk-customizer').' browse_wishlist_text='.__('Added','themehunk-customizer').']' ).'</span></div>';
                 }
                  elseif( ( class_exists( 'WPCleverWoosw' ))){
            echo '<div class="thunk-wishlist"><span class="thunk-wishlist-inner">'.do_shortcode('[woosw id='.$pid.']').'</span></div>';
       }
           } 
}


if(!function_exists('m_shop_product_query')){
    function m_shop_product_query($term_id,$prdct_optn){
    $limit_product = get_theme_mod('m_shop_frnt_prd_shw_no','20');
    // product filter
    $args = array('limit' => $limit_product, 'visibility' => 'catalog');
    if($term_id){
        $term_args = array('hide_empty' => 1,'slug'    => $term_id);
        $product_categories = get_terms( 'product_cat', $term_args);
    $product_cat_slug =  isset($product_categories[0]->slug)? $product_categories[0]->slug:0;
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


if(!function_exists('m_shop_product_slide_list_loop')){
/********************************/
//product slider loop
/********************************/
function m_shop_product_slide_list_loop($term_id,$prdct_optn){  
$args = m_shop_product_query($term_id,$prdct_optn);
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class('product'); ?>>
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
               <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
                                       M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"></path>
                                    </svg>
                                   </a>
                                </span>
                    </div>
          </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','themehunk-customizer' );
    }
    wp_reset_query();
}

}
if(!function_exists('m_shop_category_tab_list')){
/**********************************************
//Funtion Category list show
 **********************************************/   
function m_shop_category_tab_list( $term_id ){
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
  $return .= '<div class="header__cat__item dropdown"><a href="#" class="more-cat" title="More categories...">•••</a><ul class="dropdown-link">';
 $return .=  $cat_list_drop;
 $return .= '</ul></div>';
}
  $return .= '</div></div>';

 echo $return;
       }
    } 
}
}
if(!function_exists('m_shop_product_cat_filter_default_loop')){
/********************************/
//product cat filter loop
/********************************/
function m_shop_product_cat_filter_default_loop($term_id,$prdct_optn){
  global $product;
// product filter 
$args = m_shop_product_query($term_id,$prdct_optn);
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class('product'); ?>>
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
                       echo get_the_post_thumbnail( $pid, 'full' );
                       $hover_style = get_theme_mod( 'm_shop_woo_product_animation' );
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
                  <div class="thunk-hover-icon">  
                    <?php   
                      echo m_shop_whish_list($pid);
                      echo m_shop_add_to_compare_fltr($pid);  
                    ?>
                  </div>
                <?php if(get_theme_mod( 'm_shop_woo_quickview_enable', true )){?>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
                                       M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"></path>
                                    </svg>
                                      <span><?php _e('Quick View','themehunk-customizer');?></span>
                                   </a>
                                </span>
                    </div>
                  <?php }?>
               </div>
               <div class="thunk-product-content">  
                  <h2 class="woocommerce-loop-product__title"><a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a></h2>
                   <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <div class="price"><?php echo $product->get_price_html(); ?></div> 
                  <?php echo m_shop_add_to_cart_url($product);?>
               </div>
               
          </div>
        </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','themehunk-customizer' );
    }
    wp_reset_query();
}
}

if(!function_exists('m_shop_product_filter_loop')){

function m_shop_product_filter_loop($args){ 
global $product; 
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      $hover_style = get_theme_mod( 'm_shop_woo_product_animation' );
        if('swap' === $hover_style){
            global $product;
      $attachment_ids = $product->get_gallery_image_ids();
      if(count($attachment_ids) > '0'){
                $swapclasses='m-shop-swap-item-hover';
        }
       }elseif('slide' === $hover_style){
            global $product;
      $attachment_ids = $product->get_gallery_image_ids();
      if(count($attachment_ids) > '0'){
                $swapclasses='m-shop-slide-item-hover';
        }
       } else{
        $swapclasses='';
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
                       echo get_the_post_thumbnail( $pid, 'full' );
                       $hover_style = get_theme_mod( 'm_shop_woo_product_animation' );
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
                  <div class="thunk-hover-icon">  
                    <?php   
                      echo m_shop_whish_list($pid);
                      echo m_shop_add_to_compare_fltr($pid);  
                    ?>
                  </div>
                <?php if(get_theme_mod( 'm_shop_woo_quickview_enable', true )){?>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
                                       M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"></path>
                                    </svg>
                                      <span><?php _e('Quick View','themehunk-customizer');?></span>
                                   </a>
                                </span>
                    </div>
                  <?php }?>
               </div>
               <div class="thunk-product-content">  
                  <h2 class="woocommerce-loop-product__title"><a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a></h2>
                   <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <div class="price"><?php echo $product->get_price_html(); ?></div> 
                  <?php echo m_shop_add_to_cart_url($product);?>
               </div>
               
          </div>
        </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','themehunk-customizer' );
    }
    wp_reset_query();
}
}
if(!function_exists('m_shop_widget_product_query')){
/*****************************/
// Product show function
/****************************/
function m_shop_widget_product_query($query){
$productType = $query['prd-orderby'];
$count = $query['count'];
$cat_slug = $query['cate'];
global $th_cat_slug;
$th_cat_slug = $cat_slug;
        $args = array(
            'hide_empty' => 1,
            'posts_per_page' => $count,        
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        );
       if($productType == 'featured'){
        $taxquery = array(
           'relation' => 'AND',
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' =>  $cat_slug
                          ),
                          array(
                                'taxonomy'  => 'product_visibility',
                                'terms'     => array( 'exclude-from-catalog' ),
                                'field'     => 'name',
                                'operator'  => 'NOT IN',
                            )
          );
        $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'post__in'  => wc_get_featured_product_ids(),
              );
        } 
        elseif($productType == 'random'){
            //random product
          $args['orderby'] = 'rand';
        }
        elseif($productType == 'sale') {
          //sale product
        $args['meta_query']     = array(
        'relation' => 'OR',
        array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
        array( // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        )
    );
}
$args['meta_key'] = '_thumbnail_id';
if($cat_slug != '0'){
                //$args['product_cat'] = $cat_slug;
                $args['tax_query'] = array(
                   'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $cat_slug,
                            ),
                          array(
                                'taxonomy'  => 'product_visibility',
                                'terms'     => array( 'exclude-from-catalog' ),
                                'field'     => 'name',
                                'operator'  => 'NOT IN',
                            )
                         );
     }
$return = new WP_Query($args);
return $return;
}
}

if(!function_exists('m_shop_post_query')){
/*****************************/
// Product show function
/****************************/
function m_shop_post_query($query){

       $args = array(
            'orderby' => $query['orderby'],
            'order' => 'DESC',
            'ignore_sticky_posts' => $query['sticky'],
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $query['count'], 
            'cat' => $query['cate'],
            'meta_key'     => '_thumbnail_id',
           
        );

       if($query['thumbnail']){
          $args['meta_key'] = '_thumbnail_id';
       }

            $return = new WP_Query($args);

            return $return;
}
}

if ( ! function_exists( 'm_shop_front_banner' ) ){ 
/******************/
//Banner Function
/******************/
function m_shop_front_banner(){
$m_shop_banner_layout     = get_theme_mod( 'm_shop_banner_layout','bnr-two');
// first
$m_shop_bnr_1_img     = get_theme_mod( 'm_shop_bnr_1_img','');
$m_shop_bnr_1_url     = get_theme_mod( 'm_shop_bnr_1_url','');
// second
$m_shop_bnr_2_img     = get_theme_mod( 'm_shop_bnr_2_img','');
$m_shop_bnr_2_url     = get_theme_mod( 'm_shop_bnr_2_url','');
// third
$m_shop_bnr_3_img     = get_theme_mod( 'm_shop_bnr_3_img','');
$m_shop_bnr_3_url     = get_theme_mod( 'm_shop_bnr_3_url','');
// fouth
$m_shop_bnr_4_img     = get_theme_mod( 'm_shop_bnr_4_img','');
$m_shop_bnr_4_url     = get_theme_mod( 'm_shop_bnr_4_url','');
// fifth
$m_shop_bnr_5_img     = get_theme_mod( 'm_shop_bnr_5_img','');
$m_shop_bnr_5_url     = get_theme_mod( 'm_shop_bnr_5_url','');

if($m_shop_banner_layout=='bnr-one'){?>
<div class="thunk-banner-wrap bnr-layout-1 thnk-col-1">
   <div class="thunk-banner-col1">
    <div class="thunk-banner-col1-content"><a href="<?php echo esc_url($m_shop_bnr_1_url);?>"><img src="<?php echo esc_url($m_shop_bnr_1_img );?>"></a>
    </div>
   </div>
  </div>
<?php }elseif($m_shop_banner_layout=='bnr-two'){?>
<div class="thunk-banner-wrap bnr-layout-2 thnk-col-2">
   <div class="thunk-banner-col1">
    <div class="thunk-banner-col1-content"><a href="<?php echo esc_url($m_shop_bnr_1_url);?>"><img src="<?php echo esc_url($m_shop_bnr_1_img );?>"></a></div>
   </div>
   <div class="thunk-banner-col2">
    <div class="thunk-banner-col2-content"><a href="<?php echo esc_url($m_shop_bnr_2_url);?>"><img src="<?php echo esc_url($m_shop_bnr_2_img );?>"></a></div>
   </div>
  </div>

<?php }?>
      
<?php
 
}
}
if ( ! function_exists( 'm_shop_top_single_slider_content' ) ){ 
/**********************/
// Top Slider Function
/**********************/
//Slider ontent output function layout 1
function m_shop_top_slider_content( $m_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
  $m_shop_slide_content = get_theme_mod( $m_shop_slide_content_id, $default );
    if ( ! empty( $m_shop_slide_content ) ) :
      $m_shop_slide_content = json_decode( $m_shop_slide_content );
      if ( ! empty( $m_shop_slide_content) ) {
        foreach ( $m_shop_slide_content as $slide_item ) :
          $image = ! empty( $slide_item->image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
          $logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
          $title  = ! empty( $slide_item->title ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
          $subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
          $text   = ! empty( $slide_item->text ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
          $link   = ! empty( $slide_item->link ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
      ?>  
      <?php if($image!==''):?>
                        <div>
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <div class="slide-content-wrap">
                                <div class="slide-content">
                                  <div class="logo">
                                    <a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($logo_image); ?>"></a>
                                  </div>
                                  <h2><?php echo esc_html($title); ?></h2>
                                  <p><?php echo esc_html($subtitle); ?></p>
                                  <?php if($text!==''): ?>
                                  <a class="slide-btn" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
  
      <?php 
        endif;
        endforeach;     
      } // End if().
    
  endif;  
}
}

if ( ! function_exists( 'm_shop_top_single_slider_content' ) ){ 
//Single Slider ontent output function layout 5
function m_shop_top_single_slider_content( $m_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
  $m_shop_slide_content = get_theme_mod( $m_shop_slide_content_id, $default );
    if ( ! empty( $m_shop_slide_content ) ) :
      $m_shop_slide_content = json_decode( $m_shop_slide_content );
      if ( ! empty( $m_shop_slide_content) ) {
        foreach ( $m_shop_slide_content as $slide_item ) :
          $image = ! empty( $slide_item->image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
          $link   = ! empty( $slide_item->link ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
      ?>  
      <?php if($image!==''):?>
                        <div>
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <a  href="<?php echo esc_url($link); ?>"></a>
                            </div>
  
      <?php 
        endif;
        endforeach;     
      } // End if().
    
  endif;  
}
}
if ( ! function_exists( 'm_shop_top_slider_2_content' ) ){ 
// slider layout 2
function m_shop_top_slider_2_content( $m_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
  $m_shop_slide_content = get_theme_mod( $m_shop_slide_content_id, $default );
    if ( ! empty( $m_shop_slide_content ) ) :
      $m_shop_slide_content = json_decode( $m_shop_slide_content );
      if ( ! empty( $m_shop_slide_content) ) {
        foreach ( $m_shop_slide_content as $slide_item ) :
          $image = ! empty( $slide_item->image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
          $logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
          $title  = ! empty( $slide_item->title ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
          $subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
          $text   = ! empty( $slide_item->text ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
          $link   = ! empty( $slide_item->link ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
      ?>  
      <?php if($image!==''):?>
                   <div class="thunk-to2-slide-list">
                    <img src="<?php echo esc_url($image); ?>">
                    <div class="slider-content-caption">
                        <h2 class="animated delay-0.5s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h2>
                        <p class="animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($subtitle); ?></p>
                         <?php if($text!==''): ?>
                       <a class="slide-btn animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                        <?php endif;?>
                    </div>
                  </div>
      <?php 
        endif;
      endforeach;     
      } // End if().
    
  endif;  
}
}
if ( ! function_exists( 'm_shop_top_slider_6_content' ) ){ 
// slider layout 2
function m_shop_top_slider_6_content( $m_shop_slide_content_id, $default ){
  $cap_cls='';
//passing the seeting ID and Default Values
  $m_shop_slide_content = get_theme_mod( $m_shop_slide_content_id, $default );
    if ( ! empty( $m_shop_slide_content ) ) :
      $m_shop_slide_content = json_decode( $m_shop_slide_content );
      if ( ! empty( $m_shop_slide_content) ) {
        foreach ( $m_shop_slide_content as $slide_item ) :
          $image = ! empty( $slide_item->image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
          $logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
          $title  = ! empty( $slide_item->title ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
          $subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
          $text   = ! empty( $slide_item->text ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
          $link   = ! empty( $slide_item->link ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
      ?>  
      <?php if($image ==''){
           $cap_cls ='center-cap';
      }else{
           $cap_cls ='';
      }?>
                   <div class="thunk-top6-slide-list">
                     <div class="container">
                    <div class="thunk-top6-slide-list-wrap <?php echo esc_attr($cap_cls);?>">
                     
                    <div class="slider-content-caption6">
                        <h2 class="animated delay-0.5s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h2>
                        <p class="animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($subtitle); ?></p>
                         <?php if($text!==''): ?>
                       <a class="slide-btn animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                        <?php endif;?>
                    </div>
                  
                    <?php if($image!==''){?>
                     <div class="image-wrap">
                        <img src="<?php echo esc_url($image); ?>">
                     </div>  
                   <?php } ?>
                 </div>
                  </div>
                  </div>
      <?php 
      endforeach;     
      } // End if().
    
  endif;  
}
}
if ( ! function_exists( 'm_shop_top_slider_multi_content' ) ){ 
function m_shop_top_slider_multi_content( $m_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
  $m_shop_slide_content = get_theme_mod( $m_shop_slide_content_id, $default );
    if ( ! empty( $m_shop_slide_content ) ) :
      $m_shop_slide_content = json_decode( $m_shop_slide_content );
      if ( ! empty( $m_shop_slide_content) ) {
        foreach ( $m_shop_slide_content as $slide_item ) :
          $image = ! empty( $slide_item->image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
          $logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
          $title  = ! empty( $slide_item->title ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
          $subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
          $text   = ! empty( $slide_item->text ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
          $link   = ! empty( $slide_item->link ) ? apply_filters( 'm-shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
      ?>  
      <?php if($image!==''):?>
                   
                  <div class="thunk-slider-multi-item">
              <a href="<?php echo esc_url($link); ?>">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
              </a>
              <div class="slide-item-wrapper">
                <div class="item-title"><h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3></div>
                <?php if($text!==''){?>
                <div class="item-button"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a></div>
               <?php }?>
              </div>
            </div>
      <?php 
        endif;
      endforeach;     
      } // End if().
    
  endif;  
}
}
//*********************//
// Highlight feature
//*********************//
if ( ! function_exists( 'm_shop_highlight_content' ) ){ 
function m_shop_highlight_content($m_shop_highlight_content_id,$default){
  $m_shop_highlight_content= get_theme_mod( $m_shop_highlight_content_id, $default );
//passing the seeting ID and Default Values

  if ( ! empty( $m_shop_highlight_content ) ) :

    $m_shop_highlight_content = json_decode( $m_shop_highlight_content );
    if ( ! empty( $m_shop_highlight_content ) ) {
      foreach ( $m_shop_highlight_content as $ship_item ) :
               $icon   = ! empty( $ship_item->icon_value ) ? apply_filters( 'm_shop_translate_single_string', $ship_item->icon_value, '' ) : '';
        $title    = ! empty( $ship_item->title ) ? apply_filters( 'm_shop_translate_single_string', $ship_item->title, '' ) : '';
        $subtitle    = ! empty( $ship_item->subtitle ) ? apply_filters( 'm_shop_translate_single_string', $ship_item->subtitle, '' ) : '';
          ?>
         <div class="thunk-highlight-col">
            <div class="thunk-hglt-box">
              <div class="thunk-hglt-icon"><i class="<?php echo "fa ".esc_attr($icon); ?>"></i></div>
              <div class="content">
                <h6><?php echo esc_html($title);?></h6>
                <p><?php echo esc_html($subtitle);?></p>
              </div>
            </div>
          </div>
          <?php
      endforeach;
    }
  endif;
}
}
