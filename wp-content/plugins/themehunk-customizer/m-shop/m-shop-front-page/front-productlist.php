<?php
if(get_theme_mod('m_shop_disable_product_list_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-list-section">
 
        <?php m_shop_display_customizer_shortcut( 'm_shop_product_slide_list' );?>
  <div class="thunk-heading-wrap">
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('m_shop_product_list_heading','Product List Carousel'));?></span>
   </h4>
</div>
<div class="product_cat_view"><a href="<?php echo esc_url(m_shop_get_prdct_url(get_theme_mod('m_shop_product_list_cat'))); ?>"><?php echo esc_html__('View All','themehunk-customizer');?></a></div>
</div>
<div class="content-wrap">
    <div class="thunk-slide thunk-product-list owl-carousel">
      <?php    
          $term_id = get_theme_mod('m_shop_product_list_cat'); 
          $prdct_optn = get_theme_mod('m_shop_product_list_optn','recent');
          m_shop_product_slide_list_loop($term_id,$prdct_optn); 
      ?>
    </div>
  </div>

</section>