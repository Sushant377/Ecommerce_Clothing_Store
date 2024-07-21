<?php
//remove_action( 'woocommerce_sidebar',  'woocommerce_get_sidebar',10 );
remove_action( 'woocommerce_before_single_product', 'action_woocommerce_before_single_product', 10, 1 );
remove_action( 'woocommerce_after_single_product', 'action_woocommerce_after_single_product', 10, 1 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 11 );
// Re-arrange single product page rating and price 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'add_content_border_after_price_func', 10 );
// add share button
add_action( 'woocommerce_single_product_summary', 'add_product_sahre_button_func', 41 );
// /* notices */
 remove_action( 'woocommerce_before_single_product',         'wc_print_notices', 10 );
 add_action( 'woocommerce_before_single_product',            'wc_print_notices', 60 );
// remove_action( 'woocommerce_before_main_content',   'woocommerce_breadcrumb',           20, 0 );
remove_action( 'woocommerce_before_main_content',   'woocommerce_output_content_wrapper',     10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end',   10 );
add_action( 'woocommerce_before_main_content', 'shopline_category_container', 10 );

add_action( 'woocommerce_before_single_product', 'shopline_product_page_container', 10 );

//catrgory page
 add_action( 'woocommerce_before_single_product',    'shopline_shop_page_wrapper',10 );
add_action( 'woocommerce_after_main_content', 'shopline_product_page_section_end', 10 );
add_action( 'woocommerce_after_main_content',  'woocommerce_get_sidebar',10 );
add_action( 'woocommerce_after_main_content', 'shopline_product_page_wrapper_end', 10 );

if(get_theme_mod('shop_product_show','10')!==''){
add_filter( 'loop_shop_per_page', function($cols){return get_theme_mod('shop_product_show');},20);
}
add_filter('loop_shop_columns', 'shopline_loop_columns');
if (!function_exists('shopline_loop_columns')) {
function shopline_loop_columns() {
$shp_grid_col = get_theme_mod('woo_grid','columns-4');
if($shp_grid_col=='columns-2'){
$gird_col='2';
return $gird_col; 
}
elseif($shp_grid_col=='columns-3'){
$gird_col='3';
return $gird_col;
}
elseif($shp_grid_col=='columns-4'){
$gird_col='4';
return $gird_col;
}
elseif($shp_grid_col=='columns-5'){
$gird_col='5';
return $gird_col;
}
else{
return 4;
    }
  }
}
/**woocommerce_after_shop_loop_item
 * Before Shop loop
 * @since   1.0.0
 * @return  void
 */

if ( ! function_exists( 'shopline_product_page_container' ) ) {  
  function shopline_product_page_container() {

  }
}

if ( ! function_exists( 'shopline_category_container' ) ) :
function shopline_category_container(){ 
// shop pages sidebar value
$sngle_sdbr= get_theme_mod('sngle_sidebar_set','');
$shp_sdbr = get_theme_mod('shop_sidebar','');
$shp_grid = get_theme_mod('woo_grid','columns-4');
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
if (!function_exists( 'shopline_inner_page_set' ) ){
$shopline_inner_page_set = get_theme_mod('shopline_inner_page_set','image');
}
?>
<?php if( is_product() ): ?>
<div id="page" class="container <?php if($sngle_sdbr!==''){echo $sngle_sdbr;}else{echo"no-sidebar";} ?>">
<?php endif; ?>
<?php if( is_shop() || is_product_tag() || is_product_category() ):?>
  <div class="page-head <?php echo $prlx_class;?> <?php echo $shopline_inner_page_set;?>">
   <?php if($shopline_inner_page_set=='video'):?>
    <div class="page-head-image" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>">
<?php $sldr_video_poster = get_theme_mod( 'inner_hero_video_poster','');
$video_muted_sldr = get_theme_mod( 'inner_hero_video_muted');
if($video_muted_sldr =='1'){
$mutedvd = "muted";
} else {
$mutedvd = "";
} ?>
<?php if(shopline_mobile_user_agent_switch()==false): ?>
        <video id="video" <?php echo $mutedvd; ?> autoplay="autoplay" loop="loop" poster="<?php echo $sldr_video_poster; ?>"  id="hdvid" >
        <source src="<?php echo get_theme_mod('inner_hero_video'); ?>" type="video/mp4">
        </video>
        <?php endif; ?>
        <?php if(shopline_mobile_user_agent_switch()):?>
        <video id="video" <?php echo $mutedvd; ?> autoplay="autoplay" loop="loop"  poster="<?php echo $sldr_video_poster; ?>"  id="bgvid">
        <source src="#" type="video/mp4">
        </video>
<?php endif; ?>
    <div class="full-fs-caption">
      <div class="caption-container">
      <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<h1 class="title overtext"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif;?>  
<?php if($shopline_inner_page_set=='slide'):?>
    <input type="hidden" id="inner_slidespeed" value="<?php if (get_theme_mod('inner_hero_speed','') != '') { echo stripslashes(get_theme_mod('inner_hero_speed')); } else { ?>5000<?php } ?>"/>
  <?php $i = 0; ?> 
     <div class="fadein-slider">
         <?php if (get_theme_mod('inner_slide_image','') != '') { $i++; ?>
          <div class="slide-item" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>" style="background-image: url('<?php echo get_theme_mod( 'inner_slide_image'); ?>');"></div>
         <?php } ?>
          <?php if (get_theme_mod('inner_slide2_image','') != '') { $i++; ?>
          <div class="slide-item" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>" style="background-image: url('<?php echo get_theme_mod( 'inner_slide2_image'); ?>');">
          </div>
         <?php } ?>
          <?php if (get_theme_mod('inner_slide3_image','') != '') { $i++; ?>
          <div class="slide-item" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>" style="background-image: url('<?php echo get_theme_mod( 'inner_slide3_image'); ?>');">
          </div>
         <?php }  ?>    
       </div>
  <div class="page-head-image"> 
    <div class="full-fs-caption">
      <div class="caption-container">
          <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<h1 class="title overtext"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif;?>

<?php if($shopline_inner_page_set=='color' || $shopline_inner_page_set=='image'):?>
    <div class="page-head-image skrollable skrollable-between" style="background-image: url('<?php echo esc_url(get_header_image()); ?>');" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>">
      <div class="full-fs-caption">
        <div class="caption-container">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<h1 class="title overtext"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif;?>  
  </div>
<div id="page" class="container <?php echo $shp_grid; ?> <?php if($shp_sdbr!==''){echo $shp_sdbr;} else{ echo"no-sidebar";}?>">
      <?php endif; ?>

   <div class="content-wrapper">
    <div class="content">
<?php
}
endif; 
if ( ! function_exists( 'shopline_shop_page_wrapper' ) ) {
  function shopline_shop_page_wrapper() {

    ?>
    <section class="single-product">
    <?php 
  }
}

if ( ! function_exists( 'shopline_product_page_section_end' ) ) {  
  function shopline_product_page_section_end() {
    ?>
    </section>
    </div>
    </div><!-- .module-small -->
      <?php 
  }
}
if ( ! function_exists( 'shopline_product_page_wrapper_end' ) ) {  
  function shopline_product_page_wrapper_end() {
    ?>
    </div>
      <?php 
  }
}