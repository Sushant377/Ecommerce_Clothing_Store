<?php
if ( ! function_exists( 'shopline_whishlist_url' ) ) {

function shopline_whishlist_url(){
    global $wpdb;
$table = $wpdb->prefix.'posts';
$search_query = "SELECT guid FROM $table WHERE post_type = 'page' 
                  AND post_content LIKE %s LIMIT 1";
$search  = '[yith_wcwl_wishlist]';
$like    = '%'.$search.'%';
$results = $wpdb->get_results($wpdb->prepare($search_query, $like), ARRAY_A);
$url = (isset($results[0]['guid']))?$results[0]['guid']:'';
return $url ;
}

}

if ( ! function_exists( 'shopline_cart_total_item' ) ) {
  /**
   * Cart Link
   * Displayed a link to the cart including the number of items present and the cart total
   */
  function shopline_cart_total_item() {
      global $woocommerce;
  ?>
    <a href="<?php echo wc_get_cart_url(); ?>" class="cart-contents" ><i class="fa fa-shopping-cart"></i><div class="cart-crl"><?php echo $woocommerce->cart->cart_contents_count; ?></div></a>     
    <?php
  }
}


if ( ! function_exists( 'shopline_header_cart' ) ) {

  function shopline_header_cart() {
    if ( shopline_is_woocommerce_activated() ) {
       shopline_cart_total_item();
    }
  }
}

/** Sidebar Add Cart Product **/
if ( ! function_exists( 'shopline_menu_woo_cart_product' ) ) :

function shopline_menu_woo_cart_product(){
  global $woocommerce;
?>
         <div class="sidebar-quickcart">

        <?php 
if ( ! function_exists( 'shopline_header_cart' ) ) {
        woocommerce_mini_cart(); 
      }
        ?>
    </div>
    <?php
}
endif;
if ( ! function_exists( 'shopline_slider_product' ) ) :
function shopline_slider_product(){
    if( taxonomy_exists( 'product_cat' ) ){
  $prduct_type = get_theme_mod('section_slider_filter_type','featured');
  $posts_per_page = get_theme_mod('section_slider_count',5);
  $term_id = get_theme_mod('section_slider_list',0);

 $args = array('posts_per_page' => $posts_per_page,
                'post_type' => 'product',
                'post_status' => 'publish',
                'orderby' =>'date',
                'order' => 'DESC');

if($term_id==true){
$args['tax_query'] = array(
                    array( 'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $term_id,
                          ) );
}


 if($prduct_type=='featured'){
  $args['meta_query'] = array( array(
    'key'   => '_featured',
    'value' => 'yes'
    ) ) ;
  }elseif($prduct_type=='sale'){
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

    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); 
    global $product; 
    $pid = $product->get_id();
        $category = wc_get_product_category_list($pid,' / ');

      echo '<div class="da-slide">
        <div class="da-caption">
          <h3>'.get_the_title() .'</h3>
          <div class="da-border"></div>
          <h4 class="da-category">'.$category.'</h4><div class="prd-price">
          '.$product->get_price_html().'</div>';
          woocommerce_template_loop_add_to_cart( $pid, $product );
        echo '<a popupid = "'.$pid.'" class="da-buy quickview">Buy Now</a>
            </div>
        <div class="da-img">'. woocommerce_get_product_thumbnail().'</div>
      </div>';
    endwhile; 
    wp_reset_query();
  }
}
endif;

/*
 * category product images
 */
if ( ! function_exists( 'shopline_category_image' ) ) :

function shopline_category_image() {
	if ( shopline_is_woocommerce_activated() ) {
    $cate_include = get_theme_mod('woo_cate_slider_list',0);
$prod_categories = get_terms( 'product_cat', array(
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => true,
        'include'    => $cate_include,
    ));

    foreach( $prod_categories as $prod_cat ) :
        $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
        $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
        if($shop_catalog_img=='') continue;
        $term_link = get_term_link( $prod_cat, 'product_cat' );
        ?>

          <div class="catli item">
            <figure class="cat-img">
            <div class="fig-img">
              <img src="<?php echo $shop_catalog_img[0]; ?>" alt="<?php echo $prod_cat->name; ?>" />
              </div>
              <figcaption>
              <div class="caption-heading">
                <p><?php echo $prod_cat->name; ?></p>
              </div>
              </figcaption>
              <a href="<?php echo $term_link; ?>"></a>
            </figure>
          </div>

    	<?php endforeach; wp_reset_query(); ?>
<?php
 }
}
endif;
/*
 * ###### FrontPage Featured producr show ########
 */
if ( ! function_exists( 'shopline_featured_products' ) ) :

function shopline_featured_products() {
	if ( shopline_is_woocommerce_activated() ) {
		echo '<section id="featured-prd" class="featured-prd"><div class="container">';

		do_action( 'shopline_homepage_before_featured_products' );

		echo '<div class="featured-wrap"><h4 class="section-title">' . __("FEATURED PRODUCT",'shopline') . '</h4></div>';

		do_action( 'shopline_homepage_after_featured_products_title' );

		$meta_query   = WC()->query->get_meta_query();

		$meta_query[] = array(
		'key'   => '_featured',
		'value' => 'yes'
		);

		$args = array(
		'post_type'   => 'product',
    'post_status' => 'publish',
		'stock'       => 1,
		'showposts'   =>  6,
		'columns'     =>  4,
		'orderby'     =>  'date',
		'order'       =>  'DESC',
		'meta_query'  =>  $meta_query
		);
		
		echo '    <div id="owl-demo" class="owl-carousel owl-theme">';
		
		$featured_query = new WP_Query( $args );

		while( $featured_query->have_posts() ) : $featured_query->the_post(); global $product; ?>
			<div class="item">
				<div class="products-grid">
					<div class="product-block">
						<figure class="image">
							<a href="" class="product-image">
								<?php
								if ( has_post_thumbnail( $featured_query->post->ID ) )
								echo get_the_post_thumbnail( $featured_query->post->ID, 'shop_catalog' );
								else
								echo '<img src="' . wc_placeholder_img_src() . '" alt="product" class="image-hover wp-post-image"  />';
								?>
							</a>
							<div class="icons">
								<div class="add-cart">
									<?php
									woocommerce_template_loop_add_to_cart( $featured_query->post, $product ); ?>Ï
									<a href="" class=" button product_type_simple add_to_cart_button ajax_add_to_cart"><i class="fa fa-cart-plus"></i></a>
								</div>

								<div class="yith-wcwl-add-button show">
									<a href="" class="add_to_wishlist">
									<i class="fas fa-heart"></i><span></span></a>
								</div>
								<div class="quick-view">
									<a href="<?php echo esc_url(get_permalink()); ?>" class="quickview yith-wcqv-button" data-product_id="<?php echo $featured_query->post->ID; ?>" style="zoom: 1;">
									<span><i class="fas fa-eye"> </i></span>
									</a>
								</div>
							</div>
						</figure>
						<div class="meta">
							<h3 class="name">
							<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
							</h3>
							<span class="price">
								<?php echo $product->get_price_html(); ?>
							</span>
						</div>
					</div>
				</div>
			</div>
				<?php
		endwhile;

		do_action( 'shopline_homepage_after_featured_products' );
	echo "</div></div></section><div class='clearfix'></div>";
	}
}
endif;

/*
 * ###### FrontPage Category Product show ########
 */
if ( ! function_exists( 'shopline_woo_product' ) ) :
function shopline_woo_product(){
     shopline_category_products();
 
}
endif;
/*
 * ###### FrontPage Slider Product show ########
 */
if ( ! function_exists( 'shopline_woo_product_slide' ) ) :
function shopline_woo_product_slide(){  
  shopline_slide_category_products();
}
endif;

if ( ! function_exists( 'shopline_add_to_cart_url' ) ) :
function shopline_add_to_cart_url($product){
 $cart_url =  apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s %s"><span>%s</span></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        esc_html( $product->add_to_cart_text() )
    ),$product );
 return $cart_url;
}
endif;
if ( ! function_exists( 'shopline_woo_product_heading' ) ) :
function shopline_woo_product_heading(){
  $hdn = get_theme_mod("woo_cate_product_heading","");
  if($hdn!=''){
  $return = '<h2>'.get_theme_mod("woo_cate_product_heading","Weekly Featured Product").'</h2><div class="heading-border"></div>';
  
}else{
  $return = '<h2>Weekly Featured Product</h2><div class="heading-border"></div>';
}
return $return;
}
endif;

if ( ! function_exists( 'shopline_woo_category_list' ) ) :
function shopline_woo_category_list($category_list){
  $cate_list = '<div class="block-heading wow thmkfadeIn" data-wow-duration="3s">'.shopline_woo_product_heading().'
              <div class="featured-filter button-group filters-button-group"><ul>
              '.$category_list.'
              </ul></div>
            </div>';
            return $cate_list;
}
endif;

function shopline_category_open($productArr){

  if($productArr['style']=='li'){
  $return = '<li class="featured-isotope cd-item featured-list '.$productArr['slug'].'" id="post-'.$productArr['pid'].'">';
  }elseif($productArr['style']=='div'){
    $return = '<div class="product-slide item">';
  }
  return $return;
}
function shopline_category_close($productArr){
    if($productArr['style']=='li'){
  $return = '</li>';
  } elseif($productArr['style']=='div'){
    $return = '</div>';
  }
    return $return;

}



if ( ! function_exists( 'shopline_woo_category_product_grid' ) ) :

function shopline_woo_category_product_grid($productArr){
  $product_list = shopline_category_open($productArr).'
                  <div class="product-block">

                    <figure class="image">
                      '.$productArr['sale'].'
                      <a href="'.$productArr['permalink'].'" class="product-image">
                      '.$productArr['thumb'].'</a>
                      <div>
                        <div class="icons">
                          <div class="add-cart tooltip">
                          '.$productArr['cart_url'].'
                          <span class="tooltiptext">Cart</span>
                          </div>
                          <div class="add_to_wishlist_a tooltip">
                            '.shopline_whish_list().'
                            <span class="tooltiptext">Wishlist</span>
                            </div>
                           
                            <div class="quick-view tooltip">
                              <a popupid = "'.$productArr['pid'].'" class="quickview cd-trigger" data-product_id="65" style="zoom: 1;">
                                <span><i class="fas fa-eye"> </i></span>
                                <span class="tooltiptext">View</span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </figure>
                      <div class="meta">
                        <h3 class="name">
                        <a href="'.$productArr['permalink'].'">'. $productArr['title'] .'</a>
                        </h3>
                        <div class="price-grid">
                          <span class="price">
                          '.$productArr['price'].'
                          </span>
                        </div>
                      </div>
                    </div>
                  '.shopline_category_close($productArr);
                  return $product_list;
}
endif;

if ( ! function_exists( 'shopline_woo_category_product_boxed' ) ) :

function shopline_woo_category_product_boxed($productArr){
    $boxed = '<li class="featured-isotope featured-boxed '.$productArr['slug'].'"id="post-'.$productArr['pid'].'">
                  <div class="product-block">
                    <div class="product-image-wrapper">
                      <figure class="image">
                      '.$productArr['sale'].'
                        <a href="'.$productArr['permalink'].'" class="product-image">
                      '.$productArr['thumb'].'</a>
                      </figure>
                    </div>
                    <div class="product-content-wrapper">
                      <div class="meta">
                        <h2 class="name">
                      <a href="'.$productArr['permalink'].'">'. $productArr['title'] .'</a></h2>
                        <div class="heading-border"></div>
                        <div class="price-grid">
                          <span class="price">
                            '.$productArr['price'].'
                          </span>
                          <p class="description">
                            '.$productArr['excerpt'].'
                          </p>
                          <div class="icons">
                            <div class="add-cart tooltip">
                              '.$productArr['cart_url'].'
                            <span class="tooltiptext">Cart</span></div>
                            <div class="add_to_wishlist_url tooltip">
                            '.shopline_whish_list().'
                              <span class="tooltiptext">Wishlist</span></div>
                              <div class="quick-view tooltip">
                                <a popupid = "'.$productArr['pid'].'" class="quickview yith-wcqv-button" data-product_id="65" style="zoom: 1;">
                                  <span><i class="fas fa-eye"> </i></span>
                                  <span class="tooltiptext">View</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>';
                  return $boxed;
}
endif;

if ( ! function_exists( 'shopline_category_product_loop' ) ) :
function shopline_category_product_loop($category_product,$args,$layout){
                  $cate_product = '';
                  $products = new WP_Query( $args );
                  if($products->have_posts()) :
                  while($products->have_posts()) : $products->the_post();
                  global $product;
                  $pid =  $product->get_id();
            
                      // echo "<pre>"; print_r($product);
                       //echo "</pre><br></hr>";
                       $category_product['products'] = $products;
                       $category_product['pid'] = $pid;
                       $category_product['title'] = get_the_title();
                       $category_product['excerpt'] = get_the_excerpt();
                       $category_product['permalink'] = esc_url(get_permalink());
                       $category_product['price'] = $product->get_price_html();
                       $category_product['cart_url'] = shopline_add_to_cart_url($product);

                    $sale = get_post_meta( $pid, '_sale_price', true);

                    if( $sale) {
                        $sale = '<span class="onsale">'.__('Sale','shopline').'</span>';
                    }
               
                  $category_product['sale'] = $sale;

          if (has_post_thumbnail( $pid ) ):
              $thumbnail = get_the_post_thumbnail( $pid, 'shop_single' );
              else:
              $thumbnail = '<img src="' . wc_placeholder_img_src() . '" alt="product" class="image-hover wp-post-image"  />';
              endif;

              $category_product['thumb'] = $thumbnail;
              if($layout=='grid'){
                   $cate_product .= shopline_woo_category_product_grid($category_product);
                } elseif ($layout=='boxed-layout') {
                  $cate_product .= shopline_woo_category_product_boxed($category_product);
               }
              endwhile;//Possibility to add else statement
                wp_reset_postdata();
              return $cate_product;
                else:
              echo '<p class="not_found">'.__('Sorry, The post you are looking is unavailable!','shopline').'</p>';
              endif;
              wp_reset_query();
}
endif;

if ( ! function_exists( 'shopline_category_products' ) ) :
function shopline_category_products() {
  if( taxonomy_exists( 'product_cat' ) ){
      $layout = 'grid';
      $term_id = get_theme_mod('woo_cate_product_list',0); 
      $posts_per_page  = get_theme_mod('woo_cate_product_count',8); 
      $catetype = get_theme_mod('woo_cate_product_filter_type','cate');
  

       $args=array();

        if($catetype=='cate'){
           // category filter  
        $args = array(
            //'number'     => $count,
            'orderby'    => 'title',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'include'    => $term_id
        );
  }

      $product_categories = get_terms( 'product_cat', $args );
      $count = count($product_categories);
      $category_list = $cate_product = '';
    if ( $count > 0 && $catetype=='cate'){

      foreach ( $product_categories as $product_category ) {
              //global $product; 
              $category_product = array();
              $category_product['style'] = 'li';
              $current_class = '';
              if($product_category->slug=='albums'){
                  $current_class = 'current';
              }
            
            $category_list .='<li><a class="button '.$current_class.'" data-filter=".'.$product_category->slug .'">' . $product_category->name . '</a></li>';
            
            $category_product['slug'] = $product_category->slug;

            // product filter  
            $args = array(
                      'posts_per_page' => $posts_per_page,
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              // 'terms' => 'white-wines'
                              'terms' => $category_product['slug']
                          )
                      ),
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'date'
                  );

            $cate_product .= shopline_category_product_loop($category_product,$args,$layout);
      }


    }elseif($catetype=='recent'){
     
      $category_product = array();
      $category_product['style'] = 'li';
      $category_product['slug'] = 'recent';
      $EmptyArray = array_filter($term_id);
       if(!empty($EmptyArray)){
        $args = array(
                      'posts_per_page' => $posts_per_page,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'term_id',
                              'terms' => $term_id,
                          )
                      ),
                      'orderby' =>'date',
                      'order' => 'DESC'
                  );
       }else{
        $args = array(
                      'posts_per_page' => $posts_per_page,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' =>'date',
                      'order' => 'DESC'
                  );

       }
            $cate_product .= shopline_category_product_loop($category_product,$args,$layout);

    }


          $cate_list = shopline_woo_category_list($category_list);

          $cate_list .= '<div class="featured-block">
                <ul class="poup-product featured-'.$layout.' wow thmkfadeInDown" data-wow-duration="2s">
                   '. $cate_product.'
                </ul></div>';

          echo $cate_list; 
  } 
}
endif;


if ( ! function_exists( 'shopline_slide_category_products' ) ) :
function shopline_slide_category_products() {
if( taxonomy_exists( 'product_cat' ) ){
$count = get_theme_mod('woo_slide_product_count',8);
$cat_slug   = get_theme_mod('slide_woo_category','all');
$term_product = get_theme_mod('slide_woo_product','recent');
      $layout = 'grid';
      $posts_per_page  = $count;   
      $slug  = $cat_slug;
      $productType = $term_product;
      // argument filter  
        $args = array(
            'hide_empty' => 1,
             'posts_per_page' => $posts_per_page,        
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'date',
                      'order' => 'DESC'
        );

        if($productType == 'featured'){
                  // featured product

            $args['meta_query'] =  array(
                'key'   => '_featured',
                'value' => 'yes'
            );
        } elseif($productType == 'random'){
            //random product
          $args['orderby'] = 'rand';

        }elseif($productType == 'sale') {
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
        // category filter
          if($slug != 'all'){
          //  $args['product_cat'] = $slug;
            $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            // 'terms' => 'white-wines'
                            'terms' => $slug
                        )
                     );
          }
         $category_product = array();
         $category_product['style'] = 'div';

     $cate_product = shopline_category_product_loop($category_product,$args,$layout);
          echo $cate_product; 

  } 
}
endif;


if ( ! function_exists( 'shopline_recent_contegory_product' ) ) :

function shopline_recent_contegory_product(){
  $layout = get_theme_mod('woo_cate_product_layout','grid');
  $term_id = get_theme_mod('woo_cate_product_list',0);
  $posts_per_page  = get_theme_mod('woo_cate_product_count',8);   
  $category_product = array();

  $category_product['slug'] = 'recent-product';

  $args = array(
                      'posts_per_page' => $posts_per_page,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'term_id',
                              'terms' => $term_id,
                          )
                      ),
                      'orderby' =>'date',
                      'order' => 'DESC'
                  );
$recent_product = shopline_category_product_loop($category_product,$args,$layout);
$cate_list = '<div class="block-heading">'.shopline_woo_product_heading().'</div>';
$cate_list .= '<div class="featured-block">
                <ul class="featured-'.$layout.'">
                   '. $recent_product.'
                </ul></div>';

    echo $cate_list; 
}

endif;

if ( ! function_exists( 'shopline_woo_sidebar' ) ) :
/** Cart,checkout,dashboard page sidebar diable **/
  function shopline_woo_sidebar($sidebar = false){
    $return =false;
    if( is_checkout() || is_cart() ){
          $return = $sidebar;
      } 
      return $return;
  }

endif;

if ( ! function_exists( 'shopline_remove_password_strength' ) ) :
/** Registration weak password disable **/

  function shopline_remove_password_strength() {
  if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
    wp_dequeue_script( 'wc-password-strength-meter' );
  }
}
add_action( 'wp_print_scripts', 'shopline_remove_password_strength', 100 );


endif;

if ( ! function_exists( 'shopline_my_account' ) ) :
/** My Account Menu **/
function shopline_my_account(){
 if ( is_user_logged_in() ) {
  $return = '<a class="logged-in tooltip" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span>'.__('My Account','shopline').'</span><span class="tooltiptext">Account</span></a>';
  } 
 else {
 $return = '<a class="logged-out tooltip" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">
 <span>'.__('Login / Register','shopline').'</span>
 <span class="tooltiptext">Register</span></a>'; } 
 echo $return;
 }


endif;

if ( ! function_exists( 'shopline_checkout' ) ) :
/** Checkout Menu **/
function shopline_checkout(){
  global $woocommerce;
if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) :
  echo '<a href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout','shopline' ) . '</a>';
endif;
}

endif;

if ( ! function_exists( 'shopline_whish_list' ) ) :

  /** wishlist **/
  function shopline_whish_list(){
     if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
        return do_shortcode('[yith_wcwl_add_to_wishlist icon="fas fa-heart" browse_wishlist_text=""]' );
      }
  }
  endif;
?>