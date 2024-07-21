<?php
if(get_theme_mod('m_shop_disable_product_slide_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-slide-section">
 <?php m_shop_display_customizer_shortcut( 'm_shop_product_slide_section' );?>
 <div class="thunk-heading-wrap">
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('m_shop_product_slider_heading',__('Product Carousel','themehunk-customizer')));?></span>
   </h4>
</div>
<div class="product_cat_view"><a href="<?php echo esc_url(m_shop_get_prdct_url(get_theme_mod('m_shop_product_slider_cat'))); ?>"><?php echo esc_html__('View All','themehunk-customizer');?></a></div>
</div>
<div class="content-wrap">
    <div class="thunk-slide thunk-product-slide owl-carousel">
      <?php    
          $term_id = get_theme_mod('m_shop_product_slider_cat');  
          $prdct_optn = get_theme_mod('m_shop_product_slide_optn','recent');
          m_shop_product_cat_filter_default_loop($term_id,$prdct_optn); 
      ?>
    </div>
  </div>

</section>