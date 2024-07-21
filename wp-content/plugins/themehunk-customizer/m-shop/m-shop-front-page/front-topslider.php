<?php
if(get_theme_mod('m_shop_disable_top_slider_sec',false) == true){
    return;
  }
?>
<section class="thunk-slider-section   <?php echo esc_attr(get_theme_mod('m_shop_top_slide_layout','slide-layout-1'));?>">
  
<?php 
m_shop_display_customizer_shortcut( 'm_shop_top_slider_section' );
if(get_theme_mod('m_shop_top_slide_layout','slide-layout-1')=='slide-layout-1'){?>
 <div class="thunk-slider-content-wrap">
      
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-full-slide owl-carousel">
            <?php m_shop_top_slider_2_content('m_shop_top_slide_content', ''); ?>
          </div>
        </div>
      
  </div> 
 <?php }elseif(get_theme_mod('m_shop_top_slide_layout')=='slide-layout-6'){?>

 <div class="thunk-slider-content-wrap">
      
        <div class="thunk-slider-content-bar">
          <div class="thunk-slider-full-slide owl-carousel">
            <?php m_shop_top_slider_6_content('m_shop_top_slide_content', ''); ?>
          </div>
        </div>
      
  </div> 
 <?php } ?>   

</section>