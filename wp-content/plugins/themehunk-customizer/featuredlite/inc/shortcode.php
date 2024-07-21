<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function themehunk_customizer_add_shotcode($section=''){
	$return =''; ?>
<?php  if($section=='parallax'):
$bnt_style = get_theme_mod('slidr_button','default'); ?>
<div class="main-header-section <?php echo $bnt_style; ?>">
<div class="container">
    <div class="main-text wow thunk-fadeInDown" data-wow-duration="2s">
    <?php if(get_theme_mod( 'parallax_heading',__('Beautiful Wordpress Business Themes','featuredlite'))!=''){?>
      <h1><?php echo get_theme_mod( 'parallax_heading',__('BEAUTIFUL WORDPRESS BUSINESS THEMES','featuredlite')); ?></h1>
      <?php } ?>
      <div class="main-head-partition"></div>
    <?php if(get_theme_mod( 'parallax_subheading',__('Best Optimized WordPress Themes','featuredlite'))!=''){?>
      <h2><?php echo get_theme_mod( 'parallax_subheading',__('Best Optimized WordPress Themes','featuredlite')); ?></h2>
        <?php } ?>
    <?php if(get_theme_mod( 'parallax_button_link','#')!=''){?>
      <div class="main-button">
 <?php if(get_theme_mod( 'prlx_opn_new_tab')==''){?>
        <a class="page-scroll" href="<?php echo get_theme_mod( 'parallax_button_link','#'); ?>"><button><?php echo get_theme_mod( 'parallax_button_text',__('Buy Now','featuredlite')); ?></button></a>
  <?php } else { ?>
        <a class="page-scroll" href="<?php echo get_theme_mod( 'parallax_button_link','#'); ?>" target=_blank><button><?php echo get_theme_mod( 'parallax_button_text',__('Buy Now','featuredlite')); ?></button></a>
      <?php } ?>    
      </div>
      <?php } ?>
    </div>
</div>
<?php elseif($section=='slider'): ?>
  <?php $i=0; ?> 
     <div class="fadein-slider">
        <?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>
          <div class="slide-item" style="background-image: url('<?php echo get_theme_mod( 'first_slider_image'); ?>');"></div>
        <?php } else {?>
         <div class="slide-item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/bg.jpg');"></div>
        <?php } ?>
        <?php if (get_theme_mod('second_slider_image','') != '') { $i++; ?>
          <div class="slide-item" style="background-image: url('<?php echo get_theme_mod( 'second_slider_image'); ?>');"></div>
         <?php } ?>
          <?php if (get_theme_mod('third_slider_image','') != '') { $i++; ?>
          <div class="slide-item" style="background-image: url('<?php echo get_theme_mod( 'third_slider_image'); ?>');"></div>
         <?php }  ?>
        </ul>
</div>
<?php elseif($section=='three-column'): ?>
  <li class="featured-section first wow thunk-fadeInLeftBig" data-wow-duration="2s">
    <a href="<?php echo get_theme_mod('first_parallax_link','#'); ?>">
      <span class="featured-icon">
        <i class="<?php echo get_theme_mod('first_parallax_font_icon','fa fa-leaf'); ?>"></i>
      </span>
      <?php if(get_theme_mod( 'first_parallax_heading')==''){?>
        <h3><?php _e('Parallax Effect','featuredlite');?></h3>
      <?php } else{ ?>
        <h3><?php echo get_theme_mod( 'first_parallax_heading'); ?></h3>
      <?php } ?>
      <?php if(get_theme_mod( 'first_parallax_desc')==''){?>
        <p><?php _e('Lorem Ipsum is simply dummy text','featuredlite');?></p>
      <?php } else { ?>
        <p><?php echo get_theme_mod( 'first_parallax_desc'); ?></p>
      <?php } ?>
    </a>
  </li>
  <li class="featured-section second wow thunk-fadeInUpBig" data-wow-duration="2s">
    <a href="<?php echo get_theme_mod('second_parallax_link','#'); ?>">
      <span class="featured-icon">
        <i class="<?php echo get_theme_mod('second_parallax_font_icon','fa fa-apple'); ?>"></i>
      </span>
      <?php if(get_theme_mod( 'second_parallax_heading')==''){?>
        <h3><?php _e('Unlimited options','featuredlite');?></h3>
      <?php } else{ ?>
        <h3><?php echo get_theme_mod( 'second_parallax_heading'); ?></h3>
      <?php } ?>
      <?php if(get_theme_mod( 'second_parallax_desc')==''){?>
        <p><?php _e('Lorem Ipsum is simply dummy text','featuredlite');?></p>
      <?php } else { ?>
        <p><?php echo get_theme_mod( 'second_parallax_desc'); ?></p>
      <?php } ?>
    </a>
  </li>
  <li class="featured-section third wow thunk-fadeInRightBig" data-wow-duration="2s">
  <a href="<?php echo get_theme_mod('third_parallax_link','#'); ?>">
      <span class="featured-icon">
        <i class="<?php echo get_theme_mod('third_parallax_font_icon','fa fa-ban'); ?>"></i>
      </span>
      <?php if(get_theme_mod( 'third_parallax_heading')==''){?>
      <h3><?php _e('Responsive design','featuredlite');?></h3>
      <?php } else{ ?>
        <h3><?php echo get_theme_mod( 'third_parallax_heading'); ?></h3>
      <?php } ?>
      <?php if(get_theme_mod( 'third_parallax_desc')==''){?>
        <p><?php _e('Lorem Ipsum is simply dummy text','featuredlite');?></p>
      <?php } else { ?>
        <p><?php echo get_theme_mod( 'third_parallax_desc'); ?></p>
      <?php } ?>
    </a>
  </li>
<?php elseif($section=='about_us'):?>
<?php if(get_theme_mod( 'about_us_image')!=''){?>
    <div class="aboutus-image wow thunk-fadeInRight" data-wow-duration="1s">
      <img src="<?php echo get_theme_mod( 'about_us_image'); ?>">
    </div>
    <?php } else { ?>
    <div class="aboutus-image wow thunk-fadeInRight" data-wow-duration="1s">
          <img src="<?php echo get_template_directory_uri(); ?>/images/about-us.png">
    </div>
    <?php } ?>
    <div class="aboutus-text wow thunk-fadeInLeft" data-wow-duration="1s">
      <?php if(get_theme_mod( 'about_us_heading')!=''){?>
      <h2 class="head-text"><?php echo get_theme_mod( 'about_us_heading'); ?></h2>
      <?php } else { ?>
            <h2 class="head-text"><?php _e('About Us','featuredlite');?></h2>
      <?php } ?>
            <?php if(get_theme_mod( 'about_us_subheading')!=''){?>
      <p><?php echo get_theme_mod( 'about_us_subheading'); ?></p>
    <?php } else{ ?>
      <p><?php _e('Lorem Ipsum is simply ras ac sapien erat. Mauris justo elit, faucibus sed interdum vitae, vestibulum et dui. Suspendisse convallis a nulla nec placerat. Cras ac porta ipsum. Nam suscipit eros ut neque posuere, aliquam dapibus metus congue. Praesent ullamcorper vulputate tempus. Praesent eget est egestas, sagittis leo vel, interdum mi. Maecenas nec arcu gravida justo mollis condimentum. Proin quis nulla quis nisi sagittis finibus. Fusce efficitur blandit nulla, luctus viverra enim lacinia a.','featuredlite');?></p>
    <?php } ?>
<?php elseif($section=='bottom_ribbon'):?>
<?php if(get_theme_mod( 'hb_heading_bottom')==''){?>
                    <h2 class="heading-area wow thunk-fadeInLeft" data-wow-duration="2s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','featuredlite'); ?></h2>

      <?php } else { ?>
                 <h2 class="heading-area wow thunk-fadeInLeft" data-wow-duration="2s"><?php echo get_theme_mod( 'hb_heading_bottom'); ?></h2>
          <?php } ?>

          <?php if(get_theme_mod( 'hb_button_text_bottom','Read More')!=''){?>
                          <div class="ribbon-button wow thunk-fadeInRight" data-wow-duration="2s">
          <?php if(get_theme_mod( 'btm_opn_new_tab')==''){?>                 
         <a href="<?php echo get_theme_mod( 'hb_button_link_bottom','#'); ?>"><button><?php echo get_theme_mod( 'hb_button_text_bottom','Read More'); ?></button></a>
         <?php } else { ?>
         <a href="<?php echo get_theme_mod( 'hb_button_link_bottom','#'); ?>" target=_blank><button><?php echo get_theme_mod( 'hb_button_text_bottom','Read More'); ?></button></a>
         <?php } ?>
        </div>
        <?php } ?>

<?php elseif($section=='ribbon'):
 if(get_theme_mod( 'hb_heading')==''){?>
    <h2 class="heading-area wow thunk-fadeInLeft" data-wow-duration="2s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','featuredlite');?></h2>
    <?php } else { ?>
    <h2 class="heading-area wow thunk-fadeInLeft" data-wow-duration="2s"><?php echo get_theme_mod( 'hb_heading'); ?></h2>
    <?php } ?>
    <?php if(get_theme_mod( 'hb_button_text','Read More')!=''){?>
    <div class="ribbon-button wow thunk-fadeInRight" data-wow-duration="2s">
      <?php if(get_theme_mod( 'top_opn_new_tab')==''){?>
      <a href="<?php echo get_theme_mod( 'hb_button_link','#'); ?>"><button><?php echo get_theme_mod( 'hb_button_text','Read More'); ?></button></a>
      <?php }else{?>
      <a href="<?php echo get_theme_mod( 'hb_button_link','#'); ?>" target=_blank><button><?php echo get_theme_mod( 'hb_button_text','Read More'); ?></button></a>
      <?php } ?>
    </div>
    <?php } ?>

    <?php  elseif($section=='service'): ?>
      <?php if(get_theme_mod( 'our_services_heading')!=''){?>
      <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo get_theme_mod( 'our_services_heading'); ?></h2>
      <?php } else { ?>
      <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php _e('Our Services','featuredlite');?></h2>
      <?php } ?>
      <?php if(get_theme_mod( 'our_services_subheading')!=''){?>
      <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo get_theme_mod( 'our_services_subheading'); ?></h3>
      <?php } else { ?>
      <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featuredlite');?></h3>
      <?php } ?>
      <ul class="multiple-featured-section wow thunk-fadeInRight" data-wow-duration="1s">
        <?php
        if ( is_active_sidebar( 'multi-service-widget' ) ){
        dynamic_sidebar( 'multi-service-widget' );
        } else{
        ?>
        <li class="multi-featured first">
          <a href="#"><span class="multi-featured-icon"><i class="fa fa-sitemap"></i></span></a>
          <div class="clearfix"></div>
          <a href="#"><h3><?php _e('sitemap planner','featuredlite');?></h3></a>
          <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrystandard dummy text ever since the 1500s','featuredlite');?></p>
        </li>
        <li class="multi-featured second">
          <a href="#"><span class="multi-featured-icon"><i class="fa fa-sitemap"></i></span></a>
          <div class="clearfix"></div>
          <a href="#"><h3><?php _e('sitemap planner','featuredlite');?></h3></a>
          <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','featuredlite');?></p>
        </li>
        <li class="multi-featured third">
          <a href="#"><span class="multi-featured-icon"><i class="fa fa-sitemap"></i></span></a>
          <div class="clearfix"></div>
          <a href="#"><h3><?php _e('sitemap planner','featuredlite');?></h3></a>
          <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','featuredlite');?></p>
        </li>
        <li class="multi-featured fourth">
          <a href="#"><span class="multi-featured-icon"><i class="fa fa-sitemap"></i></span></a>
          <div class="clearfix"></div>
          <a href="#"><h3><?php _e('sitemap planner','featuredlite');?></h3></a>
          <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','featuredlite');?></p>
        </li>
        <li class="multi-featured fifth">
          <a href="#"><span class="multi-featured-icon"><i class="fa fa-sitemap"></i></span></a>
          <div class="clearfix"></div>
          <a href="#"><h3><?php _e('sitemap planner','featuredlite');?></h3></a>
          <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','featuredlite');?></p>
        </li>
        <li class="multi-featured sixth">
          <a href="#"><span class="multi-featured-icon"><i class="fa fa-sitemap"></i></span></a>
          <div class="clearfix"></div>
          <a href="#"><h3><?php _e('sitemap planner','featuredlite');?></h3></a>
          <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','featuredlite');?></p>
        </li>
        <?php } ?>
      </ul>
    <?php  elseif($section=='team'): ?>
    <?php if(get_theme_mod( 'our_team_heading')!=''){?>
    <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo get_theme_mod( 'our_team_heading'); ?></h2>
    <?php } else { ?>
    <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s">
    <?php _e('Our Perfect Team','featuredlite'); ?></h2>
    <?php } ?>
    <?php if(get_theme_mod( 'our_team_subheading')!=''){?>
    <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo get_theme_mod( 'our_team_subheading'); ?></h3>
    <?php } else { ?>
    <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featuredlite'); ?></h3>
    <?php } ?>
    <ul class="multiple-team-section wow thunk-fadeInRight" data-wow-duration="1s">
      <?php
      if ( is_active_sidebar( 'multi-team-widget' ) ){
      dynamic_sidebar( 'multi-team-widget' );
      } else{
      ?>
      <li class="multi-team first">
        <figure class="team-box red">
          <img src="<?php echo get_template_directory_uri(); ?>/images/team/team.jpg" alt="sample8" />
          <figcaption>
          <h2><?php _e('Gabriel','featuredlite'); ?><span><?php _e('Lavarez','featuredlite'); ?></span></h2>
          <p><?php _e('Im just very selective about the reality I choose to accept. ','featuredlite'); ?></p>
          <div class="icons"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
          </figcaption>
          <div class="position"><?php _e('Chairman','featuredlite'); ?></div>
        </figure>
        
      </li>
      <li class="multi-team second">
        <figure class="team-box yellow"><img src="<?php echo get_template_directory_uri(); ?>/images/team/team.jpg" alt="sample8" />
          <figcaption>
          <h2><?php _e('Roland','featuredlite'); ?><span><?php _e('Lee','featuredlite'); ?></span></h2>
          <p><?php _e('Im a simple man with complex tastes.','featuredlite'); ?></p>
          <div class="icons"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
          </figcaption>
          <div class="position"><?php _e('Software Engineer','featuredlite'); ?></div>
        </figure>
        
      </li>
      <li class="multi-team third">
        <figure class="team-box blue"><img src="<?php echo get_template_directory_uri(); ?>/images/team/team.jpg" alt="sample8" />
          <figcaption>
          <h2><?php _e('Annie','featuredlite'); ?><span><?php _e('Watkins','featuredlite'); ?></span></h2>
          <p><?php _e('Im just very selective about the reality I choose to accept. ','featuredlite'); ?></p>
          <div class="icons"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
          </figcaption>
          <div class="position"><?php _e('Accoutant','featuredlite'); ?></div>
        </figure>
      </li>
      <li class="multi-team fourth">
        <figure class="team-box green"><img src="<?php echo get_template_directory_uri(); ?>/images/team/team.jpg" alt="sample8" />
          <figcaption>
          <h2><?php _e('Annie','featuredlite'); ?><span><?php _e('Watkins','featuredlite'); ?></span></h2>
          <p><?php _e('Im just very selective about the reality I choose to accept. ','featuredlite'); ?></p>
          <div class="icons"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
          </figcaption>
          <div class="position"><?php _e('Consultant','featuredlite'); ?></div>
        </figure>
        
      </li>
      <?php } ?>
    </ul>
  <?php  elseif($section=='testimonial'): ?>
<?php  if(get_theme_mod( 'testimonial_heading')!=''){?>
    <h2 class="head-text wow thunk-fadeInRight" data-wow-duration="1s"><?php echo get_theme_mod( 'testimonial_heading'); ?></h2>
    <?php } else { ?>
    <h2 class="head-text wow thunk-fadeInRight" data-wow-duration="1s"><?php _e('Happy Customers','featuredlite'); ?></h2>
    <?php } ?>
    <?php if(get_theme_mod( 'testimonial_subheading')!=''){?>
    <h3 class="subhead-text wow thunk-fadeInRight" data-wow-duration="1s"><?php echo get_theme_mod( 'testimonial_subheading'); ?></h3>
    <?php } else { ?>
    <h3 class="subhead-text wow thunk-fadeInRight" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featuredlite'); ?></h3>
    <?php } ?>
    
    <ul class="multiple-testimonial-section wow thunk-fadeInLeft" data-wow-duration="1s">
      <?php if ( is_active_sidebar( 'testimonial-widget' ) ){
      dynamic_sidebar( 'testimonial-widget' );
      } else{ ?>
      <li class="multi-testimonial first">
        <span class="multi-testimonial-image"><img src="<?php echo FEATUREDLITE_THEME_URI; ?>/images/testimonial-image.png"></span>
        <div class="clearfix"></div>
        <blockquote><p><?php _e('Lorem Ipsum is simply ras ac sapien erat. Mauris justo elit, faucibus sed interdum vitae, vestibulum et dui. Suspendisse convallis a nulla nec placerat. Cras ac porta ipsum. Nam suscipit eros ut neque posuere, aliquam dapibus metus congue. Praesent ullamcorper vulputate tempus','featuredlite'); ?></p></blockquote>
        <a class="author" href="#"><?php _e('Alex','featuredlite'); ?></a>
      </li>
      <li class="multi-testimonial second">
        <span class="multi-testimonial-image"><img src="<?php echo FEATUREDLITE_THEME_URI; ?>/images/testimonial-image.png"></span>
        <div class="clearfix"></div>
        <blockquote><p><?php _e('Lorem Ipsum is simply ras ac sapien erat. Mauris justo elit, faucibus sed interdum vitae, vestibulum et dui. Suspendisse convallis a nulla nec placerat. Cras ac porta ipsum. Nam suscipit eros ut neque posuere, aliquam dapibus metus congue. Praesent ullamcorper vulputate tempus','featuredlite'); ?></p></blockquote>
        <a class="author" href="#"><?php _e('Alex','featuredlite'); ?></a>
      </li>
      <li class="multi-testimonial third">
        <span class="multi-testimonial-image"><img src="<?php echo FEATUREDLITE_THEME_URI; ?>/images/testimonial-image.png"></span>
        <div class="clearfix"></div>
        <blockquote><p><?php _e('Lorem Ipsum is simply ras ac sapien erat. Mauris justo elit, faucibus sed interdum vitae, vestibulum et dui. Suspendisse convallis a nulla nec placerat. Cras ac porta ipsum. Nam suscipit eros ut neque posuere, aliquam dapibus metus congue. Praesent ullamcorper vulputate tempus','featuredlite'); ?></p></blockquote>
        <a class="author" href="#"><?php _e('Alex','featuredlite'); ?></a>
      </li>
      <?php } ?>
    </ul>
    <?php  elseif($section=='contact_us'): ?>
 <?php $contactus_shortcode = get_theme_mod('cf_shtcd_','[lead-form form-id=1 title=Contact Us]');
$cnt_tel = get_theme_mod('cnt_tel');
$cnt_add = get_theme_mod('cnt_add');
$cnt_mail = get_theme_mod('cnt_mail'); ?>  
<?php if(get_theme_mod( 'our_cnt_heading')!=''){?>
        <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo get_theme_mod( 'our_cnt_heading'); ?></h2>
      <?php } else { ?>
        <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s">
        <?php _e('Contact us','featured'); ?></h2>
    <?php } ?>
    <?php if(get_theme_mod( 'our_cnt_subheading')!=''){?>
    <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo get_theme_mod( 'our_cnt_subheading'); ?></h3>
      <?php } else { ?> 
    <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featured'); ?></h3>
   <?php } ?> 
   <div class="cnt-block">
   <div class="contact-wrap"><?php echo do_shortcode($contactus_shortcode); ?></div>
   <div class="detail-wrap">
   <div class="cnt-detail">
     <ul>
      <?php if($cnt_tel!=''){?>
       <li class="tel">
       <div class="cnt-icon"><a href="tel:<?php echo $cnt_tel;?>"><i class="fa fa-mobile" aria-hidden="true"></i></a></div>
       <div class="cnt-info"><a href="tel:<?php echo $cnt_tel;?>"><?php echo $cnt_tel;?></a></div>
       </li>
       <?php } ?>
       <?php if($cnt_add!=''){?>
       <li class="address">
       <div class="cnt-icon">
       <i class="fa fa-home" aria-hidden="true"></i>
       </div>
       <div class="cnt-info"><p><?php echo $cnt_add;?></p></div>
       </li>
       <?php } ?>
<?php if($cnt_mail!=''){?>
        <li class="email-ad">
        <div class="cnt-icon"><a href="mailto:<?php echo $cnt_mail;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></div>
       <div class="cnt-info"><a href="mailto:<?php echo $cnt_mail;?>"><?php echo $cnt_mail;?></a></div>
       </li>
<?php } ?>
     </ul>
   </div>
   <div class="map"><?php 
$map = get_theme_mod('map_add','');
if($map !==''){
echo html_entity_decode($map);
}else{ ?>  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.8663710261!2d-74.25819529498874!3d40.70531103717957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1474307010013" frameborder="0" allowfullscreen></iframe><?php } ?></div>
</div>
</div>



    <?php elseif($section=='woocommerce'): ?>
      <?php if( shortcode_exists( 'recent_products' ) ): ?>
    <?php $woo_product = get_theme_mod('woo_shortcode','[recent_products]'); ?>
  <div class="container">
    <?php if(get_theme_mod( 'woo_head_')!=''){?>
    <h2 class="head-text wow thunk-fadeInRight" data-wow-duration="1s"><?php echo get_theme_mod( 'woo_head_'); ?></h2>
    <?php } else { ?>
    <h2 class="head-text wow thunk-fadeInRight" data-wow-duration="1s"> <?php _e('Woocommerce ','featuredlite'); ?></h2>
    <?php } ?>
    <?php if(get_theme_mod( 'woo_desc_')!=''){?>
    <h3 class="subhead-text wow thunk-fadeInRight" data-wow-duration="1s"><?php echo get_theme_mod( 'woo_desc_'); ?></h3>
    <?php } else { ?>
    <h3 class="subhead-text wow thunk-fadeInRight" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featuredlite'); ?></h3>
    <?php } ?>
    <div class="wow thunk-fadeInLeft" data-wow-duration="1s">
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

function themehunk_customizer_oneline_lite_woo($atts) {
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'did' => 1
            ), $atts);
    $did = wp_kses_post($pull_quote_atts['did']);

  $output = themehunk_customizer_woo($did);
  return $output;
}
add_shortcode('themehunk-customizer-woo', 'themehunk_customizer_oneline_lite_woo');


?>