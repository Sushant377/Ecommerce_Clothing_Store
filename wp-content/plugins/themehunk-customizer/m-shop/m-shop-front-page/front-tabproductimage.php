<?php
if(get_theme_mod('m_shop_disable_product_img_sec',false) == true){
    return;
  }
if (get_theme_mod('m_shop_product_img_sec_adimg','') != '') {
 $banner_img = 'image-enable';
}
else{
 $banner_img = 'image-disable';
}
?>
<section class="thunk-product-image-tab-section">
  <?php m_shop_display_customizer_shortcut( 'm_shop_product_tab_image' );?>
 <!-- thunk head start -->
  <div id="thunk-cat-tab" class="thunk-cat-tab">
  <div class="thunk-heading-wrap">
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('m_shop_product_img_sec_heading',__('Product Tab Image Carousel','themehunk-customizer')));?></span>
   </h4>
  </div>
<!-- tab head start -->
<?php  $term_id = get_theme_mod('m_shop_product_img_sec_cat_list');   
m_shop_category_tab_list($term_id); 
?>
</div>
<!-- tab head end -->
<div class="content-wrap <?php echo esc_attr(get_theme_mod('m_shop_product_img_sec_side')); ?>">
 <?php  if (get_theme_mod('m_shop_product_img_sec_adimg','') != '') { ?>
  <div class="tab-image">
    <img src="<?php echo esc_url(get_theme_mod('m_shop_product_img_sec_adimg','')); ?>">
  </div>
  <?php  }  ?>
  <div class="tab-content <?php echo esc_attr($banner_img); ?>">
      <div class="thunk-slide thunk-product-image-cat-slide owl-carousel">
       <?php 
          $term_id = get_theme_mod('m_shop_product_img_sec_cat_list'); 
          $prdct_optn = get_theme_mod('m_shop_product_img_sec_optn','recent');
          m_shop_product_cat_filter_default_loop($term_id,$prdct_optn); 
         ?>
      </div>
  </div>
  </div>
</div>
</section>