<?php
if(get_theme_mod('jot_shop_disable_banner_sec',false) == true){
    return;
  }
?>
<section class="thunk-banner-section">	
	<?php jot_shop_display_customizer_shortcut('jot_shop_banner'); ?>
	<div class="content-wrap">
  <?php jot_shop_front_banner(); ?>
</div>
</section>