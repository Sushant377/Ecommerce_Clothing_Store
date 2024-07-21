<?php
if(get_theme_mod('m_shop_disable_blog_sec',false) == true){
    return;
  }
?>
<section class="thunk-blog-section">
<?php m_shop_display_customizer_shortcut( 'm_shop_blog' );?>
 <div class="thunk-heading-wrap">
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('m_shop_blog_heading',__('Blog','themehunk-customizer')));?></span>
   </h4>
</div>
<div class="blog_cat_view"><a href="<?php echo esc_url(m_shop_get_blog_url(get_theme_mod('m_shop_blog_slider_cat'))); ?>"><?php echo esc_html__('View All','themehunk-customizer');?></a></div>
</div>
<div class="content-wrap">
    <div class="thunk-blog-wrap">
      <?php 
      
       $count_post = get_theme_mod('m_shop_post_show','4');
       $cat = get_theme_mod('m_shop_blog_slider_cat');
       $loop = new WP_Query(array(
      'posts_per_page' => $count_post,
      'order' => 'DESC',
      'ignore_sticky_posts' => true,
      'cat' => $cat,
    ));   
   if ( $loop->have_posts() ) { 
             while($loop->have_posts()): $loop->the_post(); 
             ?>
                <article class="post-item">
                    <div class="post-thumb">
                      <a href="<?php the_permalink(); ?>">
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
                        the_post_thumbnail();
                         }
                        ?>
                        </a>
                    </div>
                    <div class="entry-body">
                        <div class="post-item-content">
                            <a href="<?php the_permalink(); ?>"><span class="title"><?php the_title(); ?></span></a>
                            <div class="entry-meta">
                                <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
                            </div>
                           
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php } wp_reset_postdata(); ?>
    </div>
  </div>
</section>