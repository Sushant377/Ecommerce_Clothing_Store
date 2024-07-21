<?php
if(get_theme_mod('big_store_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
  <div class="container">
	 <?php big_store_display_customizer_shortcut( 'big_store_highlight' );?>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">
          <?php   
            $default =  Big_Store_Defaults_Models::instance()->get_feature_default();
            big_store_highlight_content('big_store_highlight_content', $default);
           ?>
      </div>
  </div>
</div>
</section>