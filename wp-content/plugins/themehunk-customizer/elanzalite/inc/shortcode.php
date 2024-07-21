<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function themehunk_customizer_elanzalite_dummy($section=''){

    if($section=='cate-slider'){
    $slider_alignment=get_theme_mod('slider_alignment','slider-left');
    $slidr_button=get_theme_mod('slidr_button','default');
    $count = (get_theme_mod('slider_count',1)>3)?3:get_theme_mod('slider_count',1);
    $stickies = get_option('sticky_posts');
    $loop = new WP_Query(array('posts_per_page' => $count,
    'cat' => get_theme_mod('slider_cate'),
    'order' => 'DESC',
    'ignore_sticky_posts' => 1, 
    'post__not_in' => $stickies,
    'meta_query' => array(array( 'key' => '_thumbnail_id')) ));
    if ($loop->have_posts()) {
    $i = 0;
    
     if (get_theme_mod('elanzalite_slider_disable','')=='' || get_theme_mod('elanzalite_slider_disable','')=='0'){?>
      <div class="flex-slider <?php echo $slider_alignment; ?> <?php echo $slidr_button; ?>"  style="height:100vh!important;">
      <ul class="slides">
        <?php
        while ($loop->have_posts()) : $loop->the_post();
       $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ),'size' );
        ?>
       <li class="bg-dark"  style="background-image: url(<?php echo $thumbnail_src[0]; ?>);">
        <div class="fs-caption-overlay">
        <div class="fs-caption">
            <div class="caption-content">
              <div class="fs-category">
                <span><?php echo $category_list = get_the_category_list( __( ',', 'elanzalite' ) ); ?></span>
              </div>
              <div class="fs-post-title">
                <a href="<?php the_permalink(); ?>">
                  <h1><?php the_title(); ?></h1>
                </a>
              </div>
              <div class="slider-post-date"><span><a><?php the_time( get_option('date_format') ); ?></a></span></div>
                        <div class="fs-desc"><p><?php if ( ! has_excerpt() ){
        echo elanzalite_get_custom_excerpt();
      }else{
             the_excerpt();
      } ?></p></div>
              <div class="read-more read-more-slider"><a class="section-scroll" href="<?php the_permalink(); ?>"><?php _e('Continue Reading','elanzalite'); ?></a></div>
            </div>
          </div>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php 
  }
    } }elseif($section=='magzine'){ 
      if ( is_active_sidebar( 'magzine-widget' ) ){
        dynamic_sidebar( 'magzine-widget' );
        }
    }elseif($section=='magzine-sidebar'){ 
      if ( is_active_sidebar( 'magzine-sidebar-widget' ) ){
        dynamic_sidebar( 'magzine-sidebar-widget' );
        }
    } elseif($section=='social-share'){ 
    ?>
      <div class="post-share">
      <span class="share-text"><?php _e('Share:','elanzalite' ); ?></span>
      <ul class="single-social-icon">
        <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a></li>
        <li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
        <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=LinkedIn"><i class="fa fa-linkedin"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/home?status=<?php the_title(); ?>-<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a></li>
        <li><a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=&amp;description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a></li>
      </ul>
    </div>
  <?php
    }
}

function themehunk_customizer_elanzalite_data($atts) {
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'page' => 1
            ), $atts);
    $did = wp_kses_post($pull_quote_atts['page']);

  	$output = themehunk_customizer_elanzalite_dummy($did);
    return $output;
}
add_shortcode('themehunk-customizer-elanzalite', 'themehunk_customizer_elanzalite_data');
?>