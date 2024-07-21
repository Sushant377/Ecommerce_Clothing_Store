<?php
if(get_theme_mod('big_store_disable_banner_sec',false) == true){
    return;
  }
?>
<section class="thunk-banner-section">
	<div class="container">
	<?php big_store_display_customizer_shortcut( 'big_store_banner' );?>
	<div class="content-wrap">
  <?php big_store_front_banner(); ?>
</div>
</div>
</section>