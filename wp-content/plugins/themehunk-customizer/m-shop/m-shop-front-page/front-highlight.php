<?php
if(get_theme_mod('m_shop_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
  
	 <?php m_shop_display_customizer_shortcut( 'm_shop_highlight' );?>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">
          <?php   
            $default =  M_Shop_Defaults_Models::instance()->get_feature_default();
            m_shop_highlight_content('m_shop_highlight_content', $default);
           ?>
      </div>
  </div>

</section>