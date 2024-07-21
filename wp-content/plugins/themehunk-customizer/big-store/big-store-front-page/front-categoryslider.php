<?php
if(get_theme_mod('big_store_disable_category_slide_sec',false) == true){
    return;
  }
?>

<section class="thunk-category-slide-section">
  <div class="container">

      <?php big_store_display_customizer_shortcut( 'big_store_cat_slide_section' );?>
    <div class="thunk-heading-wrap">    
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('big_store_cat_slider_heading','Woo Category'));?></span>
   </h4>
</div>
</div>
<div class="content-wrap">
<?php if(get_theme_mod('big_store_cat_slide_layout','cat-layout-1')=='cat-layout-1'):?>
<div class="thunk-slide thunk-cat-slide owl-carousel">
<?php   
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('big_store_category_slide_list'); 
      // category filter  
      $args = array(
            
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'       => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $category_list = $cate_product = '';
      if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
  $term_link = get_term_link( $product_category, 'product_cat' );
  $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
  $image = wp_get_attachment_url( $thumbnail_id ); 
  
              $current_class = '';
             
$category_list .='<div class="thunk-category">';
if(!empty($image)){
$category_list .='<div class="thunk-cat-box">
                              <a href="'.$term_link.'">';
                               $category_list .=' <img src="' . $image . '" alt="" />';
                               $category_list .='</a>
                              </div>';
                               }
                              $category_list .='<div class="thunk-cat-text">
                                   <div class="thunk-cat-title">
                                     <a href="'.$term_link.'"><span class="title">'.$product_category->name. '</span></a>
                                     </div>
                                     
                              </div>
                                 
                  </div>';
          }
          echo $category_list;
       }
    } 

  ?>
  </div>
<?php elseif(get_theme_mod('big_store_cat_slide_layout')=='cat-layout-2'):?>
<div class="cat-wrap cat-layout-2">
  <div class="cat-content">
<?php   
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('big_store_category_slide_list'); 
      // category filter  
      $args = array(
            
            'orderby'    => 'title',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'       => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $category_list = $cate_product = '';
      if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
  $term_link = get_term_link( $product_category, 'product_cat' );
  $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
  $image = wp_get_attachment_url( $thumbnail_id ); 
  $current_class = '';           
  $category_list .='<div class="cat-list">
                   <a href="'.esc_url($term_link).'">
                      <img src="'.esc_url($image).'">
                      <span>'.esc_html($product_category->name).'</span>
                    </a>
                  </div>';       
          }
          echo $category_list;
       }
    } 
  ?>
   </div>
</div>
<?php elseif(get_theme_mod('big_store_cat_slide_layout')=='cat-layout-3'):?>
<div class="cat-wrap cat-layout-3">
  <div class="cat-content-3">
      
     
      
<?php   
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('big_store_category_slide_list'); 
      // category filter  
      $args = array(
            
            'orderby'    => 'title',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'       => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $category_list = $cate_product = '';
      if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
  $term_link = get_term_link( $product_category, 'product_cat' );
  $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
  $image = wp_get_attachment_url( $thumbnail_id ); 
  $current_class = '';           
  $category_list .='<div class="cat-col">
<div class="cat-col-wrap">
  <img src="'.esc_url($image).'">
        <div class="hover-area">
          <span class="cat-title">'.esc_html($product_category->name).'</span>
          <div class="prd-total-number"><span class="item">'.$product_category->count.esc_html('Product','big-store').'</span></div>
              </div>
              <a href="'.esc_url($term_link).'"> </a>
      </div></div>';       
          }
          echo $category_list;
       }
    } 
  ?>
  </div>
</div>
<?php endif;?>
</div>
</div>
</section>