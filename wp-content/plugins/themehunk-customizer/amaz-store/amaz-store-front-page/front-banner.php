<?php
if(get_theme_mod('amaz_store_disable_banner_sec',false) == true){
    return;
  }
?>
<section class="thunk-banner-section">	
	<?php amaz_store_display_customizer_shortcut('amaz_store_banner'); ?>
	<div class="content-wrap">
  <?php amaz_store_front_banner(); ?>
</div>
</section>