<?php
if(get_theme_mod('big_store_disable_ribbon_sec',false) == true){
    return;
  }
if(get_theme_mod('big_store_ribbon_background','image')=='image'){
?>
<section class="thunk-ribbon-section bg-image">
	
<?php big_store_display_customizer_shortcut( 'big_store_ribbon' );?>
<div class="content-wrap">
    <div class="thunk-ribbon-content">
    	<div class="thunk-ribbon-content-col1" ><h3><?php echo esc_html(get_theme_mod('big_store_ribbon_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.')); ?></h3></div>
    	<?php if(get_theme_mod('big_store_ribbon_btn_text','Call To Action')!==''):?>
    	<div class="thunk-ribbon-content-col2" ><a href="<?php echo esc_url(get_theme_mod('big_store_ribbon_btn_link','#'));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('big_store_ribbon_btn_text','Call To Action'));?></a></div>
        <?php endif; ?>
    </div>
</div>

</section>
<?php }elseif(get_theme_mod('big_store_ribbon_background')=='video'){?>
<section class="thunk-ribbon-section">
<video autoplay="autoplay" loop playsinline id="bgvid" muted  poster="<?php echo get_theme_mod( 'big_store_ribbon_video_poster_image'); ?>">
<source src="<?php echo get_theme_mod( 'big_store_ribbon_bg_video'); ?>" type="video/mp4" />
</video>	

<?php big_store_display_customizer_shortcut( 'big_store_ribbon' );?>
<div class="content-wrap">
	<div class="container">
    <div class="thunk-ribbon-content">
    	<div class="thunk-ribbon-content-col1" ><h3><?php echo esc_html(get_theme_mod('big_store_ribbon_text','')); ?></h3></div>
    	<?php if(get_theme_mod('big_store_ribbon_btn_text','')!==''):?>
    	<div class="thunk-ribbon-content-col2" ><a href="<?php echo esc_url(get_theme_mod('big_store_ribbon_btn_link',''));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('big_store_ribbon_btn_text',''));?></a></div>
        <?php endif; ?>
    </div>
</div>
</div>
</section>
<?php }?>