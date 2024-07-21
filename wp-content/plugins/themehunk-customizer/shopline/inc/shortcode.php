<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function themehunk_customizer_add_shotcode($section=''){
$return =''; ?>
<?php $prlx = get_theme_mod('parallax_opt','on');
$prlx_class = '';
$prlx_data_center = '';
$prlx_top_bottom ='';
if($prlx=='on'){
$prlx_class = 'parallax';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = '';
$prlx_data_center = '';
$prlx_top_bottom ='';
} ?>
<?php  if($section=='aboutus'):
$heading    = get_theme_mod('aboutus_heading','');
$subheading = get_theme_mod('aboutus_subheading','');
$shortdesc  = get_theme_mod('aboutus_shortdesc','');
$longdesc   = get_theme_mod('aboutus_longdesc','');
$aboutusimg = get_theme_mod('aboutus_image','');
$buttontext = get_theme_mod('aboutus_btn_text','');
$buttonlink = get_theme_mod('aboutus_btn_link','');
$aboutus_parallax = get_theme_mod('aboutus_parallax','on');
$buttontext  = ($buttontext!='')?$buttontext:"Get Link Page";
?>
<!-- Start amazing story -->
<div class="about-wrapper">
  <?php
  $svg_class = '';
  $svgbg = shopline_svg_enable('aboutus_options','about_svg_style','aboutus_overly');
  if($svgbg!=''){
  echo $svgbg;
  $svg_class = 'svg_enable';
  }
  ?>
  <?php if($aboutus_parallax =='on'){?>
  <section id="aboutus_section" class="amazing-story parallax <?php echo $svg_class;?>"
    data-center="background-position: 50% 0px;"
    data-top-bottom="background-position: 50% -100px;">
    <?php } else { ?>
    <section id="aboutus_section" class="amazing-story <?php echo $svg_class;?>">
      <?php } ?>
      <div class="container">
        <div class="amazing-block">
          <ul class="amazing-list">
            <li class="one wow thmkfadeIn" data-wow-duration="3s">
              <?php if($aboutusimg!=''){ ?>
              <img src="<?php echo $aboutusimg; ?>"/>
              <?php } else { ?>
              <?php if(shopline_show_dummy_data()): ?>
              <img src="<?php echo SHOPLINE_LARGE; ?>"/>
              <?php endif; ?>
              <?php } ?>
            </li>
            <li class="two wow thmkfadeIn" data-wow-duration="3s">
              <div class="flex-abt">
                <?php if($heading!=''){ ?>
                <h2 class="aboutus-heading"><?php echo $heading; ?></h2>
                <?php } else { ?>
                <?php if(shopline_show_dummy_data()): ?>
                <h2 class="aboutus-heading"><?php _e('Nulla sollicitudin euismod felis','oneline'); ?></h2>
                <?php endif; ?>
                <?php } ?>
                <?php if($shortdesc!=''){ ?>
                <h3><?php echo $shortdesc; ?></h3>
                <?php } else { ?>
                <?php if(shopline_show_dummy_data()): ?>
                <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis!</h3>
                <?php endif; ?>
                <?php } ?>
                <?php if($longdesc!=''){ ?>
                <p><?php echo $longdesc; ?></p>
                <?php } else { ?>
                <?php if(shopline_show_dummy_data()): ?>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis. Curabitur lacinia metus non hendrerit imperdiet. Vestibulum condimentum enim facilisis sollicitudin bibendum. Donec lacinia, nunc sit amet luctus aliquet, ante augue dapibus metus, nec dictum sapien velit vitae neque.</p>
                <?php endif; ?>
                <?php } ?>
                <?php if($buttonlink !='' || $buttontext !=''): ?>
                <a class="amazing-btn" href="<?php echo $buttonlink; ?>"><?php echo $buttontext ; ?></a>
                <?php else: ?>
                <?php if(shopline_show_dummy_data()): ?>
                <a class="amazing-btn" href="''">Get Link Page</a>
                <?php endif; ?>
                <?php endif; ?>
              </li>
            </div>
          </ul>
          
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
    <?php
    elseif($section=='blog'):
    $blog_slidr_spd   = get_theme_mod('blog_slider_speed','');
    $heading = esc_html(get_theme_mod('blog_heading',''));
    $subheading = esc_html(get_theme_mod('blog_subheading',''));
    if(get_theme_mod('blog_play','')=='on'){
    $blogply='true';
    }else{
    $blogply='false';
    };
    $oneline_plx = get_theme_mod('parallax_opt');
    if($oneline_plx =='' || $oneline_plx =='0'){
    $prlx_class = 'parallax';
    $prlx_data_center = 'background-position: 50% 0px';
    $prlx_top_bottom = 'background-position: 50% -100px;';
    }else{
    $prlx_class = '';
    $prlx_data_center = '';
    $prlx_top_bottom ='';
    }
    ?>
    <div class="blog-wrapper">
      <input type="hidden" id="blog_slidr_spd" value="<?php echo $blog_slidr_spd; ?>">
      <input type="hidden" id="blog_ply" value="<?php echo esc_html($blogply); ?>">
      <?php
      $svg_class = '';
      $svgbg = shopline_svg_enable('blog_options','blog_svg_style','blog_overly');
      if($svgbg!=''){
      echo $svgbg;
      $svg_class = 'svg_enable';
      }
      ?>
      <section id="post_section" class="lst-post <?php echo esc_html($prlx_class);?> <?php echo esc_html($svg_class);?>"
        data-center="<?php echo $prlx_data_center;?>"
        data-top-bottom="<?php echo $prlx_top_bottom;?>">
        <div class="container">
          <div class="block-heading wow thmkfadeIn" data-wow-duration="3s">
            <?php if($heading!=''){ ?>
            <h2 class="blog-heading"><?php echo $heading; ?></h2>
            <?php } else { ?>
            <?php if(shopline_show_dummy_data()): ?>
            <h2 class="blog-heading"><?php _e('THE BLOG','shopline'); ?></h2>
            <?php endif; ?>
            <?php } ?>
            <div class="heading-border"></div>
            <?php if($subheading!=''){ ?>
            <p class="blog-sub-heading"><?php echo $subheading; ?></p>
            <?php } else { ?>
            <?php if(shopline_show_dummy_data()): ?>
            <p class="blog-sub-heading"><?php _e('fitness quality backpacks, bags, travel goods and accessories','shopline'); ?> </p>
            <?php endif; ?>
            <?php } ?>
          </div>
          <div id="owl-blog" class="owl-carousel owl-theme wow thmkfadeInDown" data-wow-duration="2s">
            <?php
            $stickies = get_option('sticky_posts');
            $loop = new WP_Query(array('posts_per_page' => intval(get_theme_mod('slider_cate_count',4)),
            'cat' => get_theme_mod('slider_cate'),
            'order' => 'DESC',
            'ignore_sticky_posts' => 1, 'post__not_in' => $stickies,
            ));
            if ($loop->have_posts()):
            $i = 0;
            while ($loop->have_posts()) :
            $loop->the_post();
            $archive_year  = get_the_time('Y');
            $archive_month = get_the_time('m');
            $archive_day   = get_the_time('d');
            ?>
            <!-- post one -->
            <div class="item">
              <figure class="blog-list">
                <?php
                if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('shopline-custom-blog'); ?></a>
                <?php  } ?>
                <figcaption>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php echo shopline_get_custom_excerpt(); ?>
                <div class="bottom-icon">
                  <div class="blog-date">
                    <a href="<?php echo get_day_link($archive_year,$archive_month, $archive_day); ?>"><b><?php the_time('d'); ?></b><span><?php the_time('M Y'); ?></span></a>
                  </div>
                  <div class="blog-cmt">
                    <?php echo shopline_comment_number_thnk();?>
                  </div>
                </div>
                </figcaption>
              </figure>
            </div>
            <?php
            endwhile;
            wp_reset_postdata();
            else:
            echo '<p class="not_found">'.__('Sorry, The post you are looking is unavailable!','shopline').'</p>';
            endif;
            wp_reset_query();
            ?>
          </div>
        </div>
      </section>
    </div>
    <?php elseif($section=='adsecond'): ?>
    <?php
    $three_image_first = get_theme_mod('three_column_adds_first_image','');
    $three_url_first = get_theme_mod('three_column_adds_first_url','');
    $three_image_second = get_theme_mod('three_column_adds_second_image','');
    $three_url_second = get_theme_mod('three_column_adds_second_url','');
    $three_image_third = get_theme_mod('three_column_adds_third_image','');
    $three_url_third = get_theme_mod('three_column_adds_third_url','');
    ?>
    <?php if(shopline_show_dummy_data()): ?>
    <ul class="sell">
      <?php if($three_image_first!=''): ?>
      <li class="one wow thmkfadeIn" data-wow-duration="3s">
        <a class="fst-img" href="<?php echo $three_url_first; ?>"><img src="<?php echo $three_image_first; ?>">
        </a>
      </li>
      <?php else: ?>
      <li class="one wow thmkfadeIn" data-wow-duration="3s">
        <a href="#"><img src="<?php echo SHOPLINE_SMALL; ?>" >
        </a>
      </li>
      <?php endif; ?>
      <?php if($three_image_second!=''):?>
      <li class="two wow thmkfadeIn" data-wow-duration="3s">
        <a href="<?php echo $three_url_second; ?>"><img src="<?php echo $three_image_second; ?>"></a>
      </li>
      <?php else: ?>
      <li class="two wow thmkfadeIn" data-wow-duration="3s">
        <a href="#"><img src="<?php echo SHOPLINE_SMALL; ?>" ></a>
      </li>
      <?php endif; ?>
      <?php if($three_image_third!=''):?>
      <li class="three wow thmkfadeIn" data-wow-duration="3s">
        <a href="<?php echo $three_url_third; ?>"><img src="<?php echo $three_image_third; ?>"></a>
      </li>
      <?php else: ?>
      <li class="three wow thmkfadeIn" data-wow-duration="3s">
        <a href="#"><img src="<?php echo SHOPLINE_SMALL; ?>"></a>
      </li>
      <?php endif; ?>
    </ul>
    <?php endif;?>
    <?php elseif($section=='slider'):?>
    <?php
    $shopline_front_page_set = get_theme_mod('shopline_front_page_set','slide');
    if($shopline_front_page_set =='slide'): $i=0; ?>
    <div id="slider-div" class="slider">
      <div class="flexslider carousel">
        <input type="hidden" id="nor_slidespeed" value="<?php if (get_theme_mod('normal_slider_speed','') != '') { echo stripslashes(get_theme_mod('normal_slider_speed')); } else { ?>3000<?php } ?>"/>
        <ul class="slides">
          <?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>
          
          <li class="<?php echo $prlx_class;?>" style="background:url('<?php echo get_theme_mod('first_slider_image'); ?>')" data-center="<?php echo $prlx_data_center;?>"
            data-top-bottom="<?php echo $prlx_top_bottom;?>">
            
            <?php } else { ?>
            <?php if(get_theme_mod('norl_prlx_set','on') == 'on'){?>
            <li class="<?php echo $prlx_class;?>" style="background:url('<?php echo SHOPLINE_SLIDER; ?>')" data-center="<?php echo $prlx_data_center;?>"
              data-top-bottom="<?php echo $prlx_top_bottom;?>">
              <?php } else { ?>
              <li style="background:url('<?php echo SHOPLINE_SLIDER; ?>')">
                <?php } ?>
                <?php } ?>
                
                <div class="container_caption">
                  <div class="container">
                    <?php if (get_theme_mod('first_slider_heading','') != '') { ?>
                    <h2 class="thmkfadeInDown"><a href="<?php
                      if (get_theme_mod('first_slider_link','') != '') {
                      echo get_theme_mod('first_slider_link');
                      }
                    ?>"><?php echo get_theme_mod('first_slider_heading'); ?></a></h2>
                    <?php } else { ?>
                    <h2><a href="#">Shopping theme</a></h2>
                    <?php } ?>
                    <?php if (get_theme_mod('first_slider_desc') != '') { ?>
                    <p>
                      <?php echo get_theme_mod('first_slider_desc'); ?>
                    </p>
                    <?php } else { ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <?php } ?>
                    <?php if (get_theme_mod('first_button_text','') != '') { ?>
                    <a href="<?php if (get_theme_mod('first_button_link','') != '') {
                      echo stripslashes(get_theme_mod('first_button_link'));
                      } else {
                      echo "#";
                      }
                    ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('first_button_text')); ?></a>
                    <?php } else { ?>
                    <a href="#" class="slider-button">Buy Now!</a>
                    <?php } ?>
                  </div>
                </div>
              </li>
              
              <?php if (get_theme_mod('second_slider_image','')) { $i++; ?>
              
              <li class="<?php echo $prlx_class;?>" style="background:url('<?php echo get_theme_mod('second_slider_image'); ?>')" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>">
                <div class="container_caption">
                  <div class="container">
                    <h2><a href="<?php
                      if (get_theme_mod('second_slider_link','') != '') {
                      echo get_theme_mod('second_slider_link');
                      }
                    ?>"><?php echo stripslashes(get_theme_mod('second_slider_heading')); ?></a></h2>
                    <p><?php echo stripslashes(get_theme_mod('second_slider_desc')); ?></p>
                    <?php if (get_theme_mod('second_button_text','') != '') { ?>
                    <a href="<?php  if (get_theme_mod('second_button_link','') != '') {
                      echo stripslashes(get_theme_mod('second_button_link'));
                      } else { echo "#"; }
                    ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('second_button_text')); ?></a>
                    <?php } ?>
                  </div>
                </div>
              </li>
              <?php } ?>
              <?php if (get_theme_mod('third_slider_image','')) { $i++; ?>
              <li class="<?php echo $prlx_class;?>" style="background:url('<?php echo get_theme_mod('third_slider_image'); ?>')" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>" >
                
                <div class="container_caption">
                  <div class="container">
                    <h2><a href="<?php
                      if (get_theme_mod('third_slider_link','') != '') {
                      echo get_theme_mod('third_slider_link');
                      }
                    ?>"><?php echo stripslashes(get_theme_mod('third_slider_heading')); ?></a></h2>
                    <p><?php echo stripslashes(get_theme_mod('third_slider_desc')); ?></p>
                    <?php if (get_theme_mod('third_button_text','') != '') { ?>
                    <a href="<?php  if (get_theme_mod('third_button_link','') != '') {
                      echo stripslashes(get_theme_mod('third_button_link'));
                      } else { echo "#"; }
                    ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('third_button_text')); ?></a>
                    <?php } ?>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div></div>
          <?php endif;
          if($shopline_front_page_set=='color'):?>
          <div id="hero-color" class="top-hero hero-color" style="background:<?php echo get_theme_mod('front_hero_bg_color','#7D7D7D')?>">
            <div class="container_caption">
              <div class="container">
                <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                <div class="align-wrap">
                  <?php if(get_theme_mod('_content_front_align_set')=='txt-media-left'){?>
                  <div class="image-align">
                    <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                  </div>
                  <?php } ?>
                  <div class="content-align">
                    <?php endif; ?>
                    <?php if (get_theme_mod('front_hero_video_heading','') != '') { ?>
                    <h2 class="thmkfadeInDown"><a href="<?php
                      if (get_theme_mod('front_hero_video_link','') != '') {
                      echo get_theme_mod('front_hero_video_link');
                      }
                    ?>"><?php echo get_theme_mod('front_hero_video_heading'); ?></a></h2>
                    <?php } else { ?>
                    <h2><a href="#">Shopping theme</a></h2>
                    <?php } ?>
                    <?php if (get_theme_mod('front_hero_video_desc') != '') { ?>
                    <p>
                      <?php echo get_theme_mod('front_hero_video_desc'); ?>
                    </p>
                    <?php } else { ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <?php } ?>
                    <?php if (get_theme_mod('front_hero_video_button_text','') != '') { ?>
                    <a href="<?php if (get_theme_mod('front_hero_video_button_link','') != '') {
                      echo stripslashes(get_theme_mod('front_hero_video_button_link'));
                      } else {
                      echo "#";
                      }
                    ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('front_hero_video_button_text')); ?></a>
                    <?php } else { ?>
                    <a href="#" class="slider-button">Buy Now!</a>
                    <?php } ?>
                    <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                  </div>
                  <?php if(get_theme_mod('_content_front_align_set')=='txt-media-right'){?>
                  <div class="image-align">
                    <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                  </div>
                  <?php } ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <?php endif;?>
            <!-- hero-image -->
            <?php if($shopline_front_page_set=='image'):?>
            <div class="<?php echo $prlx_class;?>"  data-center="<?php echo $prlx_data_center;?>"
              data-top-bottom="<?php echo $prlx_top_bottom;?>" id="hero-image" class="top-hero hero-image" style="background-image: url(<?php echo get_theme_mod('front_hero_img');?>);">
              <div class="container_caption">
                <div class="container">
                  <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                  <div class="align-wrap">
                    <?php if(get_theme_mod('_content_front_align_set')=='txt-media-left'){?>
                    <div class="image-align">
                      <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                    </div>
                    <?php } ?>
                    <div class="content-align">
                      <?php endif; ?>
                      <?php if (get_theme_mod('front_hero_video_heading','') != '') { ?>
                      <h2 class="thmkfadeInDown"><a href="<?php
                        if (get_theme_mod('front_hero_video_link','') != '') {
                        echo get_theme_mod('front_hero_video_link');
                        }
                      ?>"><?php echo get_theme_mod('front_hero_video_heading'); ?></a></h2>
                      <?php } else { ?>
                      <h2><a href="#">Shopping theme</a></h2>
                      <?php } ?>
                      <?php if (get_theme_mod('front_hero_video_desc') != '') { ?>
                      <p>
                        <?php echo get_theme_mod('front_hero_video_desc'); ?>
                      </p>
                      <?php } else { ?>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <?php } ?>
                      <?php if (get_theme_mod('front_hero_video_button_text','') != '') { ?>
                      <a href="<?php if (get_theme_mod('front_hero_video_button_link','') != '') {
                        echo stripslashes(get_theme_mod('front_hero_video_button_link'));
                        } else {
                        echo "#";
                        }
                      ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('front_hero_video_button_text')); ?></a>
                      <?php } else { ?>
                      <a href="#" class="slider-button">Buy Now!</a>
                      <?php } ?>
                      <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                    </div>
                    <?php if(get_theme_mod('_content_front_align_set')=='txt-media-right'){?>
                    <div class="image-align">
                      <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                    </div>
                    <?php } ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif;?>
            <!-- hero-image -->
            <?php if($shopline_front_page_set=='video'):?>
            <div id="hero-video" class="hero-video">
              <?php $video_poster = get_theme_mod( 'front_hero_video_poster','');
              $video_muted = get_theme_mod( 'front_hero_video_muted');
              if($video_muted =='1'){
              $mutedvd = "muted";
              } else{
              $mutedvd = "";
              } ?>
              <?php if(shopline_mobile_user_agent_switch()==false): ?>
              <video id="video" <?php echo $mutedvd; ?> autoplay="autoplay" loop="loop" poster="<?php echo $video_poster; ?>"  id="hdvid" >
                <source src="<?php echo get_theme_mod('front_hero_video'); ?>" type="video/mp4">
              </video>
              <?php endif; ?>
              <?php if(shopline_mobile_user_agent_switch()):?>
              <video id="video" <?php echo $mutedvd; ?> autoplay="autoplay" loop="loop"  poster="<?php echo $video_poster; ?>"  id="bgvid">
                <source src="#" type="video/mp4">
              </video>
              <?php endif; ?>
              <div class="container_caption">
                <div class="container">
                  <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                  <div class="align-wrap">
                    <?php if(get_theme_mod('_content_front_align_set')=='txt-media-left'){?>
                    <div class="image-align">
                      <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                    </div>
                    <?php } ?>
                    <div class="content-align">
                      <?php endif; ?>
                      <?php if (get_theme_mod('front_hero_video_heading','') != '') { ?>
                      <h2 class="thmkfadeInDown"><a href="<?php
                        if (get_theme_mod('front_hero_video_link','') != '') {
                        echo get_theme_mod('front_hero_video_link');
                        }
                      ?>"><?php echo get_theme_mod('front_hero_video_heading'); ?></a></h2>
                      <?php } else { ?>
                      <h2><a href="#">Shopping theme</a></h2>
                      <?php } ?>
                      <?php if (get_theme_mod('front_hero_video_desc') != '') { ?>
                      <p>
                        <?php echo get_theme_mod('front_hero_video_desc'); ?>
                      </p>
                      <?php } else { ?>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <?php } ?>
                      <?php if (get_theme_mod('front_hero_video_button_text','') != '') { ?>
                      <a href="<?php if (get_theme_mod('front_hero_video_button_link','') != '') {
                        echo stripslashes(get_theme_mod('front_hero_video_button_link'));
                        } else {
                        echo "#";
                        }
                      ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('front_hero_video_button_text')); ?></a>
                      <?php } else { ?>
                      <a href="#" class="slider-button">Buy Now!</a>
                      <?php } ?>
                      <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                    </div>
                    <?php if(get_theme_mod('_content_front_align_set')=='txt-media-right'){?>
                    <div class="image-align">
                      <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                    </div>
                    <?php } ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif;
            if($shopline_front_page_set=='gradient'):?>
            <div id="hero-gradient" class="top-hero hero-gradient">
              <div class="container_caption">
                <div class="container">
                  <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                  <div class="align-wrap">
                    <?php if(get_theme_mod('_content_front_align_set')=='txt-media-left'){?>
                    <div class="image-align">
                      <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                    </div>
                    <?php } ?>
                    <div class="content-align">
                      <?php endif; ?>
                      <?php if (get_theme_mod('front_hero_video_heading','') != '') { ?>
                      <h2 class="thmkfadeInDown"><a href="<?php
                        if (get_theme_mod('front_hero_video_link','') != '') {
                        echo get_theme_mod('front_hero_video_link');
                        }
                      ?>"><?php echo get_theme_mod('front_hero_video_heading'); ?></a></h2>
                      <?php } else { ?>
                      <h2><a href="#">Shopping theme</a></h2>
                      <?php } ?>
                      <?php if (get_theme_mod('front_hero_video_desc') != '') { ?>
                      <p>
                        <?php echo get_theme_mod('front_hero_video_desc'); ?>
                      </p>
                      <?php } else { ?>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <?php } ?>
                      <?php if (get_theme_mod('front_hero_video_button_text','') != '') { ?>
                      <a href="<?php if (get_theme_mod('front_hero_video_button_link','') != '') {
                        echo stripslashes(get_theme_mod('front_hero_video_button_link'));
                        } else {
                        echo "#";
                        }
                      ?>" class="slider-button"><?php echo stripslashes(get_theme_mod('front_hero_video_button_text')); ?></a>
                      <?php } else { ?>
                      <a href="#" class="slider-button">Buy Now!</a>
                      <?php } ?>
                      <?php if(get_theme_mod('_content_front_align_set','')=='txt-media-left' || get_theme_mod('_content_front_align_set','')=='txt-media-right'):?>
                    </div>
                    <?php if(get_theme_mod('_content_front_align_set')=='txt-media-right'){?>
                    <div class="image-align">
                      <img src="<?php echo get_theme_mod('align_image',''); ?>"/>
                    </div>
                    <?php } ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endif;
            if($shopline_front_page_set=='external'):?>
            <div id="hero-slide-plugin" class="top-hero hero-slide-plugin">
              <?php $front_extrnl_shrcd = get_theme_mod('front_extrnl_shrcd');
              echo do_shortcode($front_extrnl_shrcd); ?>
            </div>
            <?php endif;?>
            <?php elseif($section=='ribbon'):?>
            <?php
            $heading    = get_theme_mod('ribbon_heading','');
            $subheading = get_theme_mod('ribbon_subheading','');
            $video_option = get_theme_mod('ribbon_bg_options','');
            $ribbon_video_bg_image = get_theme_mod( 'ribbon_video_bg_image','');
            if (get_theme_mod('video_muted')=='1'){
            $muted = "muted";
            } else{
            $muted = "";
            }
            ?>
            <div class="ribbon-wrpapper">
              <?php
              $svg_class = '';
              $svgbg = shopline_svg_enable('ribbon_bg_options','ribbon_svg_style','ribbn_img_overly_color');
              if($svgbg!=''){
              echo $svgbg;
              $svg_class = 'svg_enable';
              }
              ?>
              <section id="ribbon_section" class="vedio-ribbon <?php echo $prlx_class;?> <?php echo $svg_class;?>"
                data-center="<?php echo $prlx_data_center;?>"
                data-top-bottom="<?php echo $prlx_top_bottom;?>">
                <?php if($video_option =='video'):?>
                <?php if(shopline_mobile_user_agent_switch()==false): ?>
                <video id="video" autoplay="autoplay" loop="loop" poster="<?php echo $ribbon_video_bg_image; ?>" <?php echo $muted; ?> id="bgvid" >
                  <source src="<?php echo get_theme_mod('ribbon_bg_video'); ?>" type="video/mp4">
                </video>
                <?php endif; ?>
                <?php if(shopline_mobile_user_agent_switch()):?>
                <video id="video" autoplay="autoplay" loop="loop"  poster="<?php echo $ribbon_video_bg_image; ?>" <?php echo $muted; ?> id="bgvid">
                  <source src="#" type="video/mp4">
                </video>
                <?php endif;?>
                <?php endif; ?>
                <div class="title-wrap wow thmkfadeIn" data-wow-duration="3s">
                  <div class="video-title">
                    <?php if($heading!=''){ ?>
                    <h2 class="ribbon-heading"><?php echo $heading; ?></h2>
                    <?php } else { ?>
                    <?php if(shopline_show_dummy_data()): ?>
                    <h2 class="ribbon-heading"><?php _e('Video Background Show Your Website Visually','oneline'); ?></h2>
                    <?php endif; ?>
                    <?php } ?>
                    <div class="heading-border"></div>
                    <?php if($subheading!=''){ ?>
                    <p class="ribbon-sub-heading"><?php echo $subheading; ?></p>
                    <?php } else { ?>
                    <?php if(shopline_show_dummy_data()): ?>
                    <p class="ribbon-sub-heading"><?php _e('fitness quality backpacks, bags, travel goods and accessoriesus ut venenatis. Maecenas mattis mattisIn','oneline'); ?> </p>
                    <?php endif; ?>
                    <?php } ?>
                  </div>
                </div>
              </section>
            </div>
            <div class="clearfix"></div>
            <?php  elseif($section=='testimonial'): ?>
            <?php
            $testm_slidr_spd   = get_theme_mod('testm_slider_speed','');
            $heading    = get_theme_mod('our_testm_heading','');
            $subheading = get_theme_mod('our_testm_subheading','');
            $testimonial_parallax = get_theme_mod('testimonial_parallax','on');
            if(get_theme_mod('testm_play','')=='on'){
            $testmply='true';
            }else{
            $testmply='false';
            };
            ?>
            <div class="testimonial_wrapper">
              <input type="hidden" id="testm_ply" value="<?php echo $testmply; ?>"/>
              <input type="hidden" id="testm_slidr_spd" value="<?php echo $testm_slidr_spd; ?>"/>
              <?php
              $svg_class = '';
              $svgbg = shopline_svg_enable('testimonial_options','testim_svg_style','tst_img_overly_color');
              if($svgbg!=''){
              echo $svgbg;
              $svg_class = 'svg_enable';
              }
              ?>
              <!-- start testimonial -->
              <section id="testimonial_section" class="testimonial <?php echo $prlx_class;?> <?php echo $svg_class;?>"
                data-center="<?php echo $prlx_data_center;?>"
                data-top-bottom="<?php echo $prlx_top_bottom;?>">
                <div class="container">
                  <div class="block-heading wow thmkfadeIn" data-wow-duration="3s">
                    <?php if($heading!=''){ ?>
                    <h2 class="testimonial-heading"><?php echo $heading; ?></h2>
                    <?php } else { ?>
                    <?php if(shopline_show_dummy_data()): ?>
                    <h2 class="testimonial-heading"><?php _e('Watch Client Say?','oneline'); ?></h2>
                    <?php endif; ?>
                    <?php } ?>
                    <div class="heading-border"></div>
                    <?php if($subheading!=''){ ?>
                    <p class="testimonial-woocatesub-heading"><?php echo $subheading; ?></p>
                    <?php } else { ?>
                    <?php if(shopline_show_dummy_data()): ?>
                    <p class="testimonial-sub-heading" ><?php _e('fitness quality backpacks, bags, travel goods and accessories','oneline'); ?> </p>
                    <?php endif; ?>
                    <?php } ?>
                  </div>
                  <div class="testimonial-block wow thmkfadeInDown" data-wow-duration="2s">
                    <div class="testimonial-wrap owl-carousel">
                      <?php
                      if ( is_active_sidebar( 'testimonial-widget' ) ):
                      dynamic_sidebar( 'testimonial-widget' );
                      else:
                      ?>
                      <?php if(shopline_show_dummy_data()): ?>
                      <div class="testimonial-content item">
                        <div class="figure-testimonial">
                          <img src="<?php echo SHOPLINE_TESTIMONIAL; ?>">
                          <a class="web-link" href="#">www.themehunk.com</a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis. Curabitur lacinia metus non hendrerit imperdiet. Vestibulum condimentum enim facilisis sollicitudin bibendum.</p>
                          <h4>one Lery Page.</h4>
                        </div>
                      </div>
                      <div class="testimonial-content item">
                        <div class="figure-testimonial">
                          <img src="<?php echo SHOPLINE_TESTIMONIAL; ?>">
                          <a class="web-link" href="#">www.themehunk.com</a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis. Curabitur lacinia metus non hendrerit imperdiet. Vestibulum condimentum enim facilisis sollicitudin bibendum.</p>
                          <h4>one Lery Page.</h4>
                        </div>
                      </div>
                      <div class="testimonial-content item">
                        <div class="figure-testimonial">
                          <img src="<?php echo SHOPLINE_TESTIMONIAL; ?>">
                          <a class="web-link" href="#">www.themehunk.com</a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis. Curabitur lacinia metus non hendrerit imperdiet. Vestibulum condimentum enim facilisis sollicitudin bibendum.</p>
                          <h4>one Lery Page.</h4>
                        </div>
                      </div>
                      <div class="testimonial-content item">
                        <div class="figure-testimonial">
                          <img src="<?php echo SHOPLINE_TESTIMONIAL; ?>">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis. Curabitur lacinia metus non hendrerit imperdiet. Vestibulum condimentum enim facilisis sollicitudin bibendum.</p>
                          <h4>one Lery Page.</h4>
                        </div>
                      </div>
                      <div class="testimonial-content item">
                        <div class="figure-testimonial">
                          <img src="<?php echo SHOPLINE_TESTIMONIAL; ?>">
                          <a class="web-link" href="#">www.themehunk.com</a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin euismod felis. Curabitur lacinia metus non hendrerit imperdiet. Vestibulum condimentum enim facilisis sollicitudin bibendum.</p>
                          <h4>one Lery Page.</h4>
                        </div>
                      </div>
                      <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="clearfix"></div>
            <!-- service section -->
            <?php  elseif($section=='service'):
            ?>
            <section id="services">
              <div class="container">
                <div class="block-services">
                  <ul class="services-list owl-carousel">
                    <?php
                    if ( is_active_sidebar( 'shopservice-widget' ) ):
                    dynamic_sidebar( 'shopservice-widget' );
                    endif;
                    ?>
                  </ul>
                </div>
              </div>
            </section>
            <div class="clearfix"></div>
            <?php  elseif($section=='woocate'): ?>
            <!-- cat-home start -->
            <?php
            $cat_slidr_spd   = get_theme_mod('woo_cate_slider_speed','');
            $heading     = get_theme_mod('woo_cate_slider_heading','');
            $subheading  = get_theme_mod('woo_cate_slider_subheading','');
            $cat_prallax = get_theme_mod('woo_cate_parallax','on');
            if(get_theme_mod('cat_play','')=='on'){
            $catply='true';
            }else{
            $catply='false';
            };
            ?>
            <div class="woo_cat_wrapper">
              <input type="hidden" id="cat_ply" value="<?php echo $catply; ?>"/>
              <input type="hidden" id="cat_slidr_spd" value="<?php echo $cat_slidr_spd; ?>"/>
              <?php
              $svg_class = '';
              $svgbg = shopline_svg_enable('woo_cate_image_bg','woo_cat_svg_style','woo_cate_slider_overly');
              if($svgbg!=''){
              echo $svgbg;
              $svg_class = 'svg_enable';
              }
              ?>
              <section id="category_section" class="home-imagecat <?php echo $prlx_class;?> <?php echo $svg_class;?>"
                data-center="<?php echo $prlx_data_center;?>"
                data-top-bottom="<?php echo $prlx_top_bottom;?>">
                <div class="container">
                  <div class="imagecat-block">
                    <div class="block-heading wow thmkfadeIn" data-wow-duration="3s">
                      <?php if($heading!=''){ ?>
                      <h2 class="woocate-heading"><?php echo $heading; ?></h2>
                      <?php } else { ?>
                      <?php if(shopline_show_dummy_data()): ?>
                      <h2 class="woocate-heading"><?php _e('enjoy your shopping'); ?></h2>
                      <?php endif; ?>
                      <?php } ?>
                      
                      <div class="heading-border"></div>
                      <?php if($subheading!=''){ ?>
                      <p class="woocate-sub-heading"><?php echo $subheading; ?></p>
                      <?php } else { ?>
                      <?php if(shopline_show_dummy_data()): ?>
                      <p class="woocate-sub-heading"><?php _e('fitness quality backpacks, bags, travel goods and accessoriesus ut venenatis. Maecenas mattis mattisIn','shopline'); ?> </p>
                      <?php endif; ?>
                      <?php } ?>
                    </div>
                    <!-- grid-slider-layout -->
                    <div class="cat-grid owl-carousel wow thmkfadeInDown" data-wow-duration="2s">
                      <?php do_action('shopline_cate_image'); ?>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="clearfix"></div>
            <?php  elseif($section=='wooproduct'): ?>
            <!-- start featured product -->
            <div class="woo_product_wrapper">
              <?php
              $svg_class = '';
              $svgbg = shopline_svg_enable('woo_cate_product_options','woo_prd_svg_style','woo_cate_product_overly');
              if($svgbg!=''){
              echo $svgbg;
              $svg_class = 'svg_enable';
              }
              ?>
              <section id="featured_product_section" class="featured-prd <?php echo $prlx_class;?>  <?php echo $svg_class;?>" data-center="<?php echo $prlx_data_center;?>"
                data-top-bottom="<?php echo $prlx_top_bottom;?>">
                <div class="container" data-aos="fade-up">
                  <?php do_action( 'shopline_product' ); ?>
                </div>
              </section>
            </div>
            <div class="clearfix"></div>
            <?php  elseif($section=='cart_menu'): ?>
            <ul class="hdr-icon-list">
              <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
              if(is_plugin_active('yith-woocommerce-wishlist/init.php')){?>
              <li class="top-list wishlist">
                <a class="tooltip" href="<?php echo esc_url( shopline_whishlist_url() ); ?>"><i class="fa fa-heart icon-space" aria-hidden="true"></i>
                  <span class="tooltiptext"><?php _e('Wishlist','shopline'); ?></span></a>
                </li>
                <?php } ?>
                <li class="top-list accnt"><?php  do_action('shopline_myaccount'); ?></li>
        
                <li class="top-list search-icon"><i id="search-btn" class="fa fa-search"></i></li>
                <!-- serach box overlay -->
                <div id="search-overlay" class="block">
                  <div class="centered">
                    <i id="close-btn" class="fa fa-times fa-2x"></i>
                    <div id='search-box' class="wow thmkfadeInDown" data-wow-duration="1s">

                      <?php
                    if ( shortcode_exists('th-aps') ){

                    echo do_shortcode('[th-aps]');

                    }elseif( shortcode_exists('tapsp') ){

                    echo do_shortcode('[tapsp]');

                    }elseif(!shortcode_exists('th-aps') &&  !shortcode_exists('tapsp') && is_user_logged_in()){

                        $url =admin_url('plugin-install.php?s=th%20advance%20product%20search&tab=search&type=term');
                          echo '<a href="'.$url.'" target="_blank" class="plugin-active-msg">'.__('Please Install "th advance product search" Plugin','shopline').'</a>';


                    }

                  ?>
                      
                    </div>
                  </div>
                </div>
                <!-- serach box overlay -->

                        <li class="top-list cart">
                  <div class="cart-widget tooltip">
                     <?php if ( shortcode_exists('taiowc') ){ ?>

              

              <?php echo do_shortcode('[taiowc]');?>

              

             <?php  }elseif ( shortcode_exists('taiowcp') ){ ?>

             

              <?php echo do_shortcode('[taiowcp]');?>

             

             <?php  } elseif ( !shortcode_exists('taiowc') && !shortcode_exists('taiowcp') && is_user_logged_in()) {

                $url = admin_url('plugin-install.php?s=th%20all%20in%20one%20woo%20cart&tab=search&type=term');

                ?>

                <a target="_blank" class="cart-plugin-active-msg" href="<?php echo esc_url($url);?>">

                  <?php _e('Add Cart','shopline-pro');?>
                  
                </a>


                <?php      

            }?>
                  
                  </div>
                </li>
              </ul>
              <?php  elseif($section=='slideproduct'): ?>
              <?php
              $_woo_slide_heading      = get_theme_mod('_woo_slide_heading','');
              $_woo_slide_subheading   = get_theme_mod('_woo_slide_subheading','');
              $product_slider_speed   = get_theme_mod('product_slider_speed',3000);
              if(get_theme_mod('slide_product_play','')=='on'){
              $ply='true';
              }else{
              $ply='false';
              };
              ?>
              <div class="woo_slide_product_wrapper">
                <?php
                $svg_class = '';
                $svgbg = shopline_svg_enable('product_slider_options','woo_slide_svg_style','product_slider_img_overly_color');
                if($svgbg!=''){
                echo $svgbg;
                $svg_class = 'svg_enable';
                }
                ?>
                <input type="hidden" id="_ply" value="<?php echo $ply; ?>"/>
                <input type="hidden" id="_slidr_spd" value="<?php echo $product_slider_speed; ?>"/>
                <section id="featured_product_section1" class="<?php echo esc_html($prlx_class);?> <?php echo esc_html($svg_class);?>"
                  data-center="<?php echo $prlx_data_center;?>"
                  data-top-bottom="<?php echo $prlx_top_bottom;?>">
                  <div class="container">
                    <div class="block-heading wow thmkfadeIn">
                      <?php if($_woo_slide_heading!==''){ ?>
                      <h2 class="slide-woocate-heading"><?php echo $_woo_slide_heading ;?></h2>
                      <?php  } else { ?>
                      <?php if(shopline_show_dummy_data()): ?>
                      <h2 class="slide-woocate-heading"><?php _e('enjoy your shopping'); ?></h2>
                      
                      <?php endif;} ?>
                      <div class="heading-border"></div>
                      <?php if($_woo_slide_subheading!=''){ ?>
                      <p class="slide-woocate-sub-heading"><?php echo $_woo_slide_subheading; ?></p>
                      <?php } else { ?>
                      <?php if(shopline_show_dummy_data()): ?>
                      <p class="slide-woocate-sub-heading"><?php _e('fitness quality backpacks, bags, travel goods and accessoriesus ut venenatis. Maecenas mattis mattisIn','shopline'); ?> </p>
                      <?php endif; ?>
                      <?php } ?>
                    </div>
                    <div class="product-block featured-grid wow thmkfadeInDown" data-wow-duration="2s">
                      <div class="product-one owl-carousel">
                        <?php do_action( 'shopline_product_slide' ); ?>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <?php elseif($section=='woocommerce'): ?>
              <?php if( shortcode_exists( 'recent_products' ) ): ?>
              <?php $woo_product = get_theme_mod('woo_shortcode','[recent_products]'); ?>
              <div class="container">
                <?php if(get_theme_mod( 'woo_head_')!=''){?>
                <h2 class="head-text wow thmkfadeIn" data-wow-duration="1s"><?php echo get_theme_mod( 'woo_head_'); ?></h2>
                <?php } else { ?>
                <h2 class="head-text wow thmkfadeIn" data-wow-duration="1s"> <?php _e('Woocommerce ','featuredlite'); ?></h2>
                <?php } ?>
                <?php if(get_theme_mod( 'woo_desc_')!=''){?>
                <h3 class="subhead-text wow thmkfadeIn" data-wow-duration="1s"><?php echo get_theme_mod( 'woo_desc_'); ?></h3>
                <?php } else { ?>
                <h3 class="subhead-text wow thmkfadeIn" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featuredlite'); ?></h3>
                <?php } ?>
                <div class="wow thmkfadeIn" data-wow-duration="1s">
                  <?php echo do_shortcode($woo_product); ?>
                </div>
              </div>
              <?php endif; ?>
              <?php endif;
              }
              function themehunk_customizer_shortcode($atts) {
              $output = '';
              $pull_quote_atts = shortcode_atts(array(
              'section' => 1
              ), $atts);
              $did = wp_kses_post($pull_quote_atts['section']);
                $output = themehunk_customizer_add_shotcode($did);
              return $output;
              }
              add_shortcode('themehunk-customizer', 'themehunk_customizer_shortcode');
              //social icon shortocdes
              function themehunk_customizer_social(){
              $social ='<ul>
                <span style="font-style:italic;font-size:12px;">Share</span>
                <li><a target="_blank" href="https://twitter.com/home?status='.get_the_title().'-'.get_permalink().'"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"><i class="fa fa-google-plus"></i></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='.get_permalink().'&title='.get_the_title().'&source=LinkedIn"><i class="fa fa-linkedin"></i></a></li>
              </ul>';
              return $social;
              }
              function themehunk_customizer_social_shortcode($atts) {
              $output = '';
              $pull_quote_atts = shortcode_atts(array(
              'did' => 1
              ), $atts);
              $did = wp_kses_post($pull_quote_atts['did']);
              $output = themehunk_customizer_social($did);
              return $output;
              }
              add_shortcode('themehunk-customizer-social', 'themehunk_customizer_social_shortcode');
              // woocommerce plugin
              function themehunk_customizer_woo($did=''){
              $woo_product = get_theme_mod('woo_shortcode','[recent_products]');
              
              echo do_shortcode( $woo_product );
              
              }
              function themehunk_customizer_shopline_woo($atts) {
              $output = '';
              $pull_quote_atts = shortcode_atts(array(
              'did' => 1
              ), $atts);
              $did = wp_kses_post($pull_quote_atts['did']);
              $output = themehunk_customizer_woo($did);
              return $output;
              }
              add_shortcode('themehunk-customizer-woo', 'themehunk_customizer_shopline_woo');
              ?>
