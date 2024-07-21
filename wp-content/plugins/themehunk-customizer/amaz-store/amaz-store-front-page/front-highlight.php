<?php
if(get_theme_mod('amaz_store_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
   <?php amaz_store_display_customizer_shortcut( 'amaz_store_highlight' ); ?>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">
          <?php   
            $default =  amaz_store_Defaults_Models::instance()->get_feature_default();
            amaz_store_highlight_content('amaz_store_highlight_content', $default);
           ?>
      </div>
  </div>
</section>