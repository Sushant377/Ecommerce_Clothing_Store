<?php
if(get_theme_mod('jot_shop_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
   <?php jot_shop_display_customizer_shortcut( 'jot_shop_highlight' ); ?>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">
          <?php   
            $default =  Jot_Shop_Defaults_Models::instance()->get_feature_default();
            jot_shop_highlight_content('jot_shop_highlight_content', $default);
           ?>
      </div>
  </div>
</section>