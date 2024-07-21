<?php
if(get_theme_mod('m_shop_disable_banner_sec',false) == true){
    return;
  }
?>
<section class="thunk-banner-section">
	
	<?php m_shop_display_customizer_shortcut( 'm_shop_banner' );?>
	<div class="content-wrap">
  <?php m_shop_front_banner(); ?>
</div>

</section>