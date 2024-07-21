<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**************************************/
// inner-page-header
/**************************************/
function shopline_default_header_image(){
$dfimg_hd='';
    if(get_theme_mod('shopline_inner_page_set','')=='image'){
       if(shopline_page_thumb()!=''){
            $dfimg_hd = 'background-image:url('.shopline_page_thumb().')';
        }
        return $dfimg_hd;
    }
}

function shopline_slidespeed(){
    $slidespeed = get_theme_mod('inner_hero_speed','');
    if ($slidespeed!=''){
        $slidespeed; 
    }else{
        $slidespeed=5000;
    }   
    return $slidespeed;
}
function shopline_comment_number_thnk(){
comments_popup_link(__('0','shopline'), __('1','shopline'), __('%','shopline')); 
 }
function shopline_close_bottom($page_show){
$return = "<h1 class='title overtext'>".get_the_title()."</h1>";
if($page_show=='archive'){
   $return = '<h1 class="title overtext">'.get_the_archive_title().'</h1>'; 
}elseif($page_show=='home'){
    $return = '';
}

    return  $return."</div></div></div></div><div class='clearfix'></div>";
}

function shopline_innerpage_hero($header='top',$page_show = 'page'){

    if($header=='top'){
        $return='';
        if (!function_exists( 'shopline_inner_page_set' ) ){
            $shopline_inner_page_set = get_theme_mod('shopline_inner_page_set','image');
            $innervideo = get_theme_mod('inner_hero_video');
        }
        $oneline_plx = get_theme_mod('parallax_opt');
        if($oneline_plx =='' || $oneline_plx =='0'){  
            $prlx_class = 'parallax';
            $prlx_data_center = 'background-position: 50% 0px';
            $prlx_top_bottom = 'background-position: 50% -100px;';
        } else {
            $prlx_class = ''; 
            $prlx_data_center = '';
            $prlx_top_bottom =''; 
        } 
        $return.='<div class="page-head '.$prlx_class.' '.$shopline_inner_page_set.'">';
        if($shopline_inner_page_set=='video'):
            $return.='<div class="page-head-image" data-center="'.$prlx_data_center.'" data-top-bottom="'.$prlx_top_bottom.'">';
            $sldr_video_poster = get_theme_mod( 'inner_hero_video_poster','');
            $video_muted_sldr = get_theme_mod( 'inner_hero_video_muted');
        if($video_muted_sldr =='1'){
            $mutedvd = "muted";
        } else {
            $mutedvd = "";
        }
        if(shopline_mobile_user_agent_switch()==false):
                $return.='<video id="video"'.$mutedvd.' autoplay="autoplay" loop="loop" poster="'.$sldr_video_poster.'"  id="hdvid" >
                        <source src="'.$innervideo.'" type="video/mp4">
                        </video>';
            endif;
            if(shopline_mobile_user_agent_switch()):
                $return.='<video id="video"'.$mutedvd.' autoplay="autoplay" loop="loop"  poster="'.$sldr_video_poster.'"  id="bgvid">
                    <source src="#" type="video/mp4">
                    </video>';
            endif;
            $return.='<div class="full-fs-caption">
                        <div class="caption-container">';
            $return .= shopline_close_bottom($page_show);

        elseif($shopline_inner_page_set=='slide'):
                $inner_slide_image  = get_theme_mod( 'inner_slide_image','');
                $inner_slide2_image = get_theme_mod( 'inner_slide2_image','');
                $inner_slide3_image = get_theme_mod( 'inner_slide3_image','');
                $slidespeed = get_theme_mod('inner_hero_speed'); 
                $return.='<input type="hidden" id="inner_slidespeed" value="'.shopline_slidespeed().'"/>';
                $i = 0;
                $return.='<div class="fadein-slider">';
            if ($inner_slide_image != '') { $i++;
                $return.='<div class="slide-item" data-center="'.$prlx_data_center.'" data-top-bottom="'.$prlx_top_bottom.'" style="background-image: url('.$inner_slide_image.');"></div>';
            }
            if ($inner_slide2_image != '') { $i++;
                $return.='<div class="slide-item" data-center="'.$prlx_data_center.'" data-top-bottom="'.$prlx_top_bottom.'" style="background-image: url('.$inner_slide2_image.');">
                          </div>';
            }
            if ($inner_slide3_image != '') { $i++;
                $return.='<div class="slide-item" data-center="'.$prlx_data_center.'" data-top-bottom="'.$prlx_top_bottom.'" style="background-image: url('.$inner_slide3_image.');">
                          </div>';
            }  
            $return .='</div>
                <div class="page-head-image">   
                    <div class="full-fs-caption">
                        <div class="caption-container">';
             $return .= shopline_close_bottom($page_show);

        elseif($shopline_inner_page_set=='color' || $shopline_inner_page_set=='image'):
            $return.='<div class="page-head-image" 
            style="'.shopline_default_header_image().'" 
            data-center="'.$prlx_data_center.'" data-top-bottom="'.$prlx_top_bottom.'">
            <div class="full-fs-caption"> 

                        <div class="caption-container">';
             $return .= shopline_close_bottom($page_show);
        endif;
            echo $return;
    } elseif($header=='hide'){
        echo '<style> header,.footer-wrapper{ display:none; }</style>';
    }elseif($header=='footer'){
    // footer shortcode
    $back_to_top_ = get_theme_mod('shopline_backtotop_disable');?>
    <?php if($back_to_top_=='' || $back_to_top_=='0') {
    $back_to_top='on';
    }else{
    $back_to_top='';
    } ?>
    <input type="hidden" id="back-to-top" value="<?php echo esc_attr($back_to_top); ?>"/>
    <!-- back to top button -->
      <?php if (function_exists('shopline_svg_enable')){
            $svg_class = '';
            $svgbg = shopline_svg_enable('footer_options','footer_svg_style','footer_imager_overly');
          if($svgbg!=''){
              echo $svgbg;
              $svg_class = 'svg_enable';
          }
      } ?>
      <?php $footer_plx = get_theme_mod('parallax_opt');
        if($footer_plx =='' || $footer_plx =='0'){?>
      <footer id="footer-wrp" class="footer-wrp parallax  <?php if (function_exists('shopline_svg_enable')) { echo esc_attr($svg_class);} ?>"
        data-center="background-position: 50% 0px;"
        data-top-bottom="background-position: 50% -100px;">
        <?php } else { ?>
        <footer id="footer-wrp" class="footer-wrp <?php echo esc_attr($svg_class);?>">
        <?php } 
    }
}
// shortcode added
function themehunk_customizer_header_shortcode($atts) {
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
          'header' => 'top',
          'type'=>'page'
            ), $atts);
    $output = shopline_innerpage_hero($pull_quote_atts['header'],$pull_quote_atts['type']);
    return $output;
}
add_shortcode('themehunk-customizer-header', 'themehunk_customizer_header_shortcode');