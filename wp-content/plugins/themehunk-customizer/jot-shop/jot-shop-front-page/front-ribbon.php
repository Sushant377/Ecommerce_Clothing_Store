<?php
if(get_theme_mod('jot_shop_disable_ribbon_sec',false) == true){
    return;
  }
if(get_theme_mod('jot_shop_ribbon_background','image')=='image'){
?>
<section class="thunk-ribbon-section bg-image">
    
<?php jot_shop_display_customizer_shortcut( 'jot_shop_ribbon' ); ?>
<div class="content-wrap">
    <div class="thunk-ribbon-content">
        <div class="thunk-ribbon-content-col1" ><h3><?php echo esc_html(get_theme_mod('jot_shop_ribbon_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.')); ?></h3></div>
        <?php if(get_theme_mod('jot_shop_ribbon_btn_text','Call To Action')!==''):?>
        <div class="thunk-ribbon-content-col2" ><a href="<?php echo esc_url(get_theme_mod('jot_shop_ribbon_btn_link',''));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('jot_shop_ribbon_btn_text','Call To Action'));?></a></div>
        <?php endif; ?>
    </div>
</div>
</section>
<?php }elseif(get_theme_mod('jot_shop_ribbon_background')=='video'){
$jot_shop_youtube_video_link = get_theme_mod('jot_shop_youtube_video_link',''); ?>
<section class="thunk-ribbon-section">
    <?php if (get_theme_mod('jot_shop_enable_youtube_video','') == 1) { ?>
       <?php if ($jot_shop_youtube_video_link != '') { ?>
<div class="th-youtube-video">
<iframe class="" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" src="<?php echo esc_url($jot_shop_youtube_video_link); ?>?autoplay=1&amp;controls=0&amp;rel=0&amp;playsinline=1&amp;mute=1&amp;enablejsapi=1"></iframe>
</div> 
<?php } 
    }
    else{ ?>
        <video autoplay="autoplay" loop playsinline id="bgvid" muted  poster="<?php echo get_theme_mod( 'jot_shop_ribbon_video_poster_image'); ?>">
<source src="<?php echo get_theme_mod( 'jot_shop_ribbon_bg_video'); ?>" type="video/mp4" />
</video>  
<?php } ?>
<?php jot_shop_display_customizer_shortcut( 'jot_shop_ribbon' ); ?>
<div class="content-wrap">
    <div class="thunk-ribbon-content">
        <div class="thunk-ribbon-content-col1" ><h3><?php echo esc_html(get_theme_mod('jot_shop_ribbon_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue lorem id porta volutpat.')); ?></h3></div>
        <?php if(get_theme_mod('jot_shop_ribbon_btn_text','')!==''):?>
        <div class="thunk-ribbon-content-col2" ><a href="<?php echo esc_url(get_theme_mod('jot_shop_ribbon_btn_link',''));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('jot_shop_ribbon_btn_text',''));?></a></div>
        <?php endif; ?>
    </div>
</div>
</section>
<?php }?>