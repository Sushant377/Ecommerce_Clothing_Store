<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// custom header background
function themehunk_customizer_elanzalite_custom_style(){ 
$custom_css='';
$hd_bg_color          = get_theme_mod('hd_bg_color');
$hd_bg_shr_color      = get_theme_mod('hd_bg_shr_color','rgba(255,255,255,0.95)');
$site_title_color     = get_theme_mod('site_title_color','#5a5d5a');
$hd_menu_color        = get_theme_mod('hd_menu_color','#606060');
$hd_menu_hvr_color    = get_theme_mod('hd_menu_hvr_color','#66cdaa');
$mobile_menu_bg_color = get_theme_mod('mobile_menu_bg_color','#606060');
$theme_color          = get_theme_mod('theme_color','#66cda9');
$ftr_bg_color         = get_theme_mod('ftr_bg_color','#111');
$ftr_cpybg_color      = get_theme_mod('ftr_cpybg_color','#111');
$ftr_wgt_tl_color     = get_theme_mod('ftr_wgt_tl_color','#5a5d5a');
$copy_txt_color       = get_theme_mod('copy_txt_color','#5a5d5a');
$social_icon_color    = get_theme_mod('social_icon_color','#8224e3');
// header-setting
$top_hd_bg_color      = get_theme_mod('top_hd_bg_color','#0e0e0e');
$top_date_clr         = get_theme_mod('top_date_clr','#fff');
$top_menu_clr         = get_theme_mod('top_menu_clr','#fff');
$top_icon_clr         = get_theme_mod('top_icon_clr','#fff');
// slider
$slder_ovrlay_color    = get_theme_mod('slder_ovrlay_color','rgba(0, 0, 0, 0.18)');
$slider_title_color    = get_theme_mod('slider_title_color','#fff');
$slider_meta_color     = get_theme_mod('slider_meta_color','#fff');
$slider_desc_color     = get_theme_mod('slider_desc_color','#fff');
$slder_btn_bg_color    = get_theme_mod('slder_btn_bg_color','rgba(0, 0, 0, 0)');
$slider_btn_brd_color  = get_theme_mod('slider_btn_brd_color','#fff');
$slider_btn_txt_color  = get_theme_mod('slider_btn_txt_color','#fff');

$slder_btn_bg_hvr_color    = get_theme_mod('slder_btn_bg_hvr_color','rgba(0, 0, 0, 0)');
$slider_btn_brd_hvr_color  = get_theme_mod('slider_btn_brd_hvr_color','#fff');
$slider_btn_txt_hvr_color  = get_theme_mod('slider_btn_txt_hvr_color','#fff');
// MAGZINE-LAYOUT
$magzine_vw_bg_color  = get_theme_mod('magzine_vw_bg_color','#0e0e0e');
$ads_hd_bg_color      = get_theme_mod('ads_hd_bg_color','#0e0e0e');
$mobile_menu_text     = get_theme_mod('mobile_menu_text','Main Menu');

$custom_css .= ".header-wrap-top,.header-wrap-top .inner-wrap-top{background:$top_hd_bg_color;}.header-wrap-top .top-date{color:$top_date_clr;}.header-wrap-top .top-menu .top li a{color:$top_menu_clr;} .header-wrap-top .top-social-icon li a{color:$top_icon_clr;} 
header,.page header{background:{$hd_bg_color};}
h3.view{background:{$magzine_vw_bg_color};}
.home header.smaller, header.smaller{background:{$hd_bg_shr_color};}
.header .logo h1 a,.header .logo h1 a, header.smaller .header .logo h1 a{
color:{$site_title_color};}
.home .navigation .menu > li > a,.navigation .menu > li > a,.navigation ul li a:link,#main-menu-wrapper .menu-item-has-children > a:after,.home header #main-menu-wrapper .menu-item-has-children > a:after{
color:{$hd_menu_color};}
.home .navigation .menu > li > a:hover,.navigation .menu > li > a:hover,.navigation .menu > li.current-menu-item  > a{
color:{$hd_menu_hvr_color};}
.page-template-magazine-template header.header-style-one #main-menu-wrapper,
.magazine-box  header.header-style-one #main-menu-wrapper, 
.magazine-single-box .header-style-one .header #main-menu-wrapper{
 background:{$ads_hd_bg_color}; 
}

@media screen and (max-width: 1024px){
  .page-template-magazine-template.page .header-style-one .header #main-menu-wrapper a#pull:before,.page-template-magazine-template.page .header-style-one .header #main-menu-wrapper a#pull:before, .magazine-box .header-style-one .header #main-menu-wrapper a#pull:before, 
  .magazine-single-box .header-style-one .header #main-menu-wrapper a#pull:before {
    content:'{$mobile_menu_text}';
}
.home .header a#pull,.header a#pull,.header-wrapper header.smaller a#pull{
    color: {$mobile_menu_bg_color};}
    .navigation ul .current-menu-item > a, .navigation ul li a:hover,.navigation ul ul li:hover{
      background:{$hd_menu_hvr_color};}     
}
.content .two-grid-layout .post-img,.content .standard-layout .post.format-standard .post-img{border-top-color:{$theme_color};}
a:hover,.post-title h2:hover,a.more-link,.widget .tagcloud a:hover,.footer-wrapper .social-icon li a:hover,.content .post-content .read-more a{color:{$theme_color};}
.nav-links .page-numbers.current, .nav-links .page-numbers:hover{
  border-color:{$theme_color};
  background:{$theme_color};
}
li.sl-related-thumbnail h3{
  border-color:{$theme_color};
}
.tagcloud a{
    background: {$theme_color};

}
.breadcrumbs a:hover,.breadcrumbs .trail-end span,.th-aboutme ul li i{
  color: {$theme_color};
}
#section_one .section-title,#section_one .slider_widgets h3.title,#section_two h3.title,#section_three h3.title,#section_four h3.title,#section_five h3.title,#section_five .col-two h3.title{background:{$theme_color};}
.nav-links .page-numbers{border-color:{$theme_color};}
#move-to-top{background:{$theme_color};}
.footer-wrapper{background:{$ftr_bg_color};}
.footer-wrapper .widget .widgettitle{color:{$ftr_wgt_tl_color};}
.footer-wrapper .footer-copyright .copyright a{color:{$copy_txt_color};}
.footer-wrapper .footer-copyright{background:{$ftr_cpybg_color};}
.footer-wrapper .social-icon li a{color:{$social_icon_color};}

.flex-slider .fs-caption-overlay{
    background:{$slder_ovrlay_color};}
    .flex-slider li .caption-content h1{
      color:{$slider_title_color};}
      .flex-slider li .caption-content p{color:{$slider_desc_color};}
      .flex-slider li .caption-content a{color:{$slider_meta_color};}
.flex-slider .read-more.read-more-slider a,.flex-slider.button-two .read-more.read-more-slider a,.flex-slider.button-one .read-more.read-more-slider a{color:{$slider_btn_txt_color};border-color:{$slider_btn_brd_color};background:{$slder_btn_bg_color};}
.flex-slider .read-more.read-more-slider a:hover,.flex-slider.button-two .read-more.read-more-slider a:hover,.flex-slider.button-one .read-more.read-more-slider a:hover{color:{$slider_btn_txt_hvr_color};border-color:{$slider_btn_brd_hvr_color};background:{$slder_btn_bg_hvr_color};}
.flex-slider.button-one .read-more.read-more-slider a:hover{
    -webkit-box-shadow: 0 14px 26px -12px " .elanzalite_hex2rgba($slider_btn_brd_hvr_color, 0.42);
     $custom_css.=", 0 4px 23px 0 " .elanzalite_hex2rgba($slider_btn_brd_hvr_color, 0.12); 
     $custom_css.=", 0 8px 10px -5px " .elanzalite_hex2rgba($slider_btn_brd_hvr_color, 0.2);
     $custom_css.=";box-shadow: 0 14px 26px -12px " .elanzalite_hex2rgba($slider_btn_brd_hvr_color, 0.42); 
    $custom_css.=", 0 4px 23px 0 " .elanzalite_hex2rgba($slider_btn_brd_hvr_color, 0.12); 
    $custom_css.=", 0 8px 10px -5px " .elanzalite_hex2rgba($slider_btn_brd_hvr_color, 0.12);
   $custom_css.="}";
/***********************************/
// body-typography
/***********************************/
$elanzalite_body_font = get_theme_mod( 'elanzalite_body_font' );
$elanzalite_body_font_size = get_theme_mod( 'elanzalite_body_font_size','14' );
$elanzalite_body_line_height = get_theme_mod( 'elanzalite_body_line_height','22' );
$elanzalite_body_letter_spacing = get_theme_mod( 'elanzalite_body_letter_spacing','0.4' );
// tab
$elanzalite_body_font_size_tb = get_theme_mod( 'elanzalite_body_font_size_tb','14' );
$elanzalite_body_line_height_tb = get_theme_mod( 'elanzalite_body_line_height_tb','22' );
$elanzalite_body_letter_spacing_tb = get_theme_mod( 'elanzalite_body_letter_spacing_tb','0.4' );
// mob
$elanzalite_body_font_size_mb = get_theme_mod( 'elanzalite_body_font_size_mb','14' );
$elanzalite_body_line_height_mb = get_theme_mod( 'elanzalite_body_line_height_mb','22' );
$elanzalite_body_letter_spacing_mb = get_theme_mod( 'elanzalite_body_letter_spacing_mb','0.4' );

 if ( ! empty( $elanzalite_body_font ) ) {
themehunk_enqueue_google_font($elanzalite_body_font);
$custom_css.="body,p{ 
   font-family:{$elanzalite_body_font};
   font-size:{$elanzalite_body_font_size}px;
   line-height:{$elanzalite_body_line_height}px;
   letter-spacing:{$elanzalite_body_letter_spacing}px;
  }";
}

/***********************************/
//h1-typography
/***********************************/
$elanzalite_body_font_h1 = get_theme_mod( 'elanzalite_body_font_h1' );
$elanzalite_body_font_size_h1 = get_theme_mod( 'elanzalite_body_font_size_h1','44' );
$elanzalite_body_line_height_h1 = get_theme_mod( 'elanzalite_body_line_height_h1','55' );
$elanzalite_body_letter_spacing_h1 = get_theme_mod( 'elanzalite_body_letter_spacing_h1','0.7' );
// tab
$elanzalite_body_font_size_tb_h1 = get_theme_mod( 'elanzalite_body_font_size_tb_h1','44' );
$elanzalite_body_line_height_tb_h1 = get_theme_mod( 'elanzalite_body_line_height_tb_h1','55' );
$elanzalite_body_letter_spacing_tb_h1 = get_theme_mod( 'elanzalite_body_letter_spacing_tb_h1','0.7' );
// mob
$elanzalite_body_font_size_mb_h1 = get_theme_mod( 'elanzalite_body_font_size_mb_h1','44' );
$elanzalite_body_line_height_mb_h1 = get_theme_mod( 'elanzalite_body_line_height_mb_h1','55' );
$elanzalite_body_letter_spacing_mb_h1 = get_theme_mod( 'elanzalite_body_letter_spacing_mb_h1','0.7' );

if ( ! empty( $elanzalite_body_font_h1 ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_h1);
$custom_css.="h1,.flex-slider li .caption-content h1{ 
   font-family:{$elanzalite_body_font_h1};
   font-size:{$elanzalite_body_font_size_h1}px;
   line-height:{$elanzalite_body_line_height_h1}px;
   letter-spacing:{$elanzalite_body_letter_spacing_h1}px;
  }";
}
/***********************************/
//h2-typography
/***********************************/
$elanzalite_body_font_h2 = get_theme_mod( 'elanzalite_body_font_h2' );
$elanzalite_body_font_size_h2 = get_theme_mod( 'elanzalite_body_font_size_h2','38' );
$elanzalite_body_line_height_h2 = get_theme_mod( 'elanzalite_body_line_height_h2','48' );
$elanzalite_body_letter_spacing_h2 = get_theme_mod( 'elanzalite_body_letter_spacing_h2','0.7' );
// tab
$elanzalite_body_font_size_tb_h2 = get_theme_mod( 'elanzalite_body_font_size_tb_h2','38' );
$elanzalite_body_line_height_tb_h2 = get_theme_mod( 'elanzalite_body_line_height_tb_h2','48' );
$elanzalite_body_letter_spacing_tb_h2 = get_theme_mod( 'elanzalite_body_letter_spacing_tb_h2','0.7' );
// mob
$elanzalite_body_font_size_mb_h2 = get_theme_mod( 'elanzalite_body_font_size_mb_h2','38' );
$elanzalite_body_line_height_mb_h2 = get_theme_mod( 'elanzalite_body_line_height_mb_h2','48' );
$elanzalite_body_letter_spacing_mb_h2 = get_theme_mod( 'elanzalite_body_letter_spacing_mb_h2','0.7' );

if ( ! empty( $elanzalite_body_font_h2 ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_h2);
$custom_css.="h2,.two-grid-layout .post-content h2,.standard-layout .post-title h2{ 
   font-family:{$elanzalite_body_font_h2};
   font-size:{$elanzalite_body_font_size_h2}px;
   line-height:{$elanzalite_body_line_height_h2}px;
   letter-spacing:{$elanzalite_body_letter_spacing_h2}px;
  }";
}
/***********************************/
//h3-typography
/***********************************/
$elanzalite_body_font_h3 = get_theme_mod( 'elanzalite_body_font_h3' );
$elanzalite_body_font_size_h3 = get_theme_mod( 'elanzalite_body_font_size_h3','38' );
$elanzalite_body_line_height_h3 = get_theme_mod( 'elanzalite_body_line_height_h3','48' );
$elanzalite_body_letter_spacing_h3 = get_theme_mod( 'elanzalite_body_letter_spacing_h3','0.7' );
// tab
$elanzalite_body_font_size_tb_h3 = get_theme_mod( 'elanzalite_body_font_size_tb_h3','38' );
$elanzalite_body_line_height_tb_h3 = get_theme_mod( 'elanzalite_body_line_height_tb_h3','48' );
$elanzalite_body_letter_spacing_tb_h3 = get_theme_mod( 'elanzalite_body_letter_spacing_tb_h3','0.7' );
// mob
$elanzalite_body_font_size_mb_h3 = get_theme_mod( 'elanzalite_body_font_size_mb_h3','38' );
$elanzalite_body_line_height_mb_h3 = get_theme_mod( 'elanzalite_body_line_height_mb_h3','48' );
$elanzalite_body_letter_spacing_mb_h3 = get_theme_mod( 'elanzalite_body_letter_spacing_mb_h3','0.7' );

if ( ! empty( $elanzalite_body_font_h3 ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_h3);
$custom_css.="h3{ 
   font-family:{$elanzalite_body_font_h3};
   font-size:{$elanzalite_body_font_size_h3}px;
   line-height:{$elanzalite_body_line_height_h3}px;
   letter-spacing:{$elanzalite_body_letter_spacing_h3}px;
  }";
}
/***********************************/
//h4-typography
/***********************************/
$elanzalite_body_font_h4 = get_theme_mod( 'elanzalite_body_font_h4' );
$elanzalite_body_font_size_h4 = get_theme_mod( 'elanzalite_body_font_size_h4','30' );
$elanzalite_body_line_height_h4 = get_theme_mod( 'elanzalite_body_line_height_h4','40' );
$elanzalite_body_letter_spacing_h4 = get_theme_mod( 'elanzalite_body_letter_spacing_h4','0.7' );
// tab
$elanzalite_body_font_size_tb_h4 = get_theme_mod( 'elanzalite_body_font_size_tb_h4','30' );
$elanzalite_body_line_height_tb_h4 = get_theme_mod( 'elanzalite_body_line_height_tb_h4','40' );
$elanzalite_body_letter_spacing_tb_h4 = get_theme_mod( 'elanzalite_body_letter_spacing_tb_h4','0.7' );
// mob
$elanzalite_body_font_size_mb_h4 = get_theme_mod( 'elanzalite_body_font_size_mb_h4','30' );
$elanzalite_body_line_height_mb_h4 = get_theme_mod( 'elanzalite_body_line_height_mb_h4','40' );
$elanzalite_body_letter_spacing_mb_h4 = get_theme_mod( 'elanzalite_body_letter_spacing_mb_h4','0.7' );

if ( ! empty( $elanzalite_body_font_h4 ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_h4);
$custom_css.="h4,h4.widgettitle{ 
   font-family:{$elanzalite_body_font_h4};
   font-size:{$elanzalite_body_font_size_h4}px;
   line-height:{$elanzalite_body_line_height_h4}px;
   letter-spacing:{$elanzalite_body_letter_spacing_h4}px;
  }";
}
/***********************************/
//h5-typography
/***********************************/
$elanzalite_body_font_h5 = get_theme_mod( 'elanzalite_body_font_h5' );
$elanzalite_body_font_size_h5 = get_theme_mod( 'elanzalite_body_font_size_h5','26' );
$elanzalite_body_line_height_h5 = get_theme_mod( 'elanzalite_body_line_height_h5','36' );
$elanzalite_body_letter_spacing_h5 = get_theme_mod( 'elanzalite_body_letter_spacing_h5','0.7' );
// tab
$elanzalite_body_font_size_tb_h5 = get_theme_mod( 'elanzalite_body_font_size_tb_h5','26' );
$elanzalite_body_line_height_tb_h5 = get_theme_mod( 'elanzalite_body_line_height_tb_h5','36' );
$elanzalite_body_letter_spacing_tb_h5 = get_theme_mod( 'elanzalite_body_letter_spacing_tb_h5','0.7' );
// mob
$elanzalite_body_font_size_mb_h5 = get_theme_mod( 'elanzalite_body_font_size_mb_h5','26' );
$elanzalite_body_line_height_mb_h5 = get_theme_mod( 'elanzalite_body_line_height_mb_h5','36' );
$elanzalite_body_letter_spacing_mb_h5 = get_theme_mod( 'elanzalite_body_letter_spacing_mb_h5','0.7' );

if ( ! empty( $elanzalite_body_font_h5 ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_h5);
$custom_css.="h5{ 
   font-family:{$elanzalite_body_font_h5};
   font-size:{$elanzalite_body_font_size_h5}px;
   line-height:{$elanzalite_body_line_height_h5}px;
   letter-spacing:{$elanzalite_body_letter_spacing_h5}px;
  }";
}
/***********************************/
//h6-typography
/***********************************/
$elanzalite_body_font_h6 = get_theme_mod( 'elanzalite_body_font_h6' );
$elanzalite_body_font_size_h6 = get_theme_mod( 'elanzalite_body_font_size_h6','22' );
$elanzalite_body_line_height_h6 = get_theme_mod( 'elanzalite_body_line_height_h6','32' );
$elanzalite_body_letter_spacing_h6 = get_theme_mod( 'elanzalite_body_letter_spacing_h6','0.7' );
// tab
$elanzalite_body_font_size_tb_h6 = get_theme_mod( 'elanzalite_body_font_size_tb_h6','22' );
$elanzalite_body_line_height_tb_h6 = get_theme_mod( 'elanzalite_body_line_height_tb_h6','32' );
$elanzalite_body_letter_spacing_tb_h6 = get_theme_mod( 'elanzalite_body_letter_spacing_tb_h6','0.7' );
// mob
$elanzalite_body_font_size_mb_h6 = get_theme_mod( 'elanzalite_body_font_size_mb_h6','22' );
$elanzalite_body_line_height_mb_h6 = get_theme_mod( 'elanzalite_body_line_height_mb_h6','32' );
$elanzalite_body_letter_spacing_mb_h6 = get_theme_mod( 'elanzalite_body_letter_spacing_mb_h6','0.7' );

if ( ! empty( $elanzalite_body_font_h6 ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_h6);
$custom_css.="h6{ 
   font-family:{$elanzalite_body_font_h6};
   font-size:{$elanzalite_body_font_size_h6}px;
   line-height:{$elanzalite_body_line_height_h6}px;
   letter-spacing:{$elanzalite_body_letter_spacing_h6}px;
  }";
}
/***********************************/
//a-typography
/***********************************/
$elanzalite_body_font_a = get_theme_mod( 'elanzalite_body_font_a' );
if ( ! empty( $elanzalite_body_font_a ) ) {
themehunk_enqueue_google_font($elanzalite_body_font_a);
$custom_css.="a{ 
   font-family:{$elanzalite_body_font_a};
  }";
}

/*************************/
// media-typography
/*************************/
$custom_css .="@media screen and (max-width: 768px){";
if ( ! empty( $elanzalite_body_font ) ) {
$custom_css .="body,p{ 
   font-size:{$elanzalite_body_font_size_tb}px;
   line-height:{$elanzalite_body_line_height_tb}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb}px;
  }";
}
if ( ! empty( $elanzalite_body_font_h1 ) ) {
$custom_css .="h1,.flex-slider li .caption-content h1{ 
   font-size:{$elanzalite_body_font_size_tb_h1}px;
   line-height:{$elanzalite_body_line_height_tb_h1}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb_h1}px;
  } ";
}
if ( ! empty( $elanzalite_body_font_h2 ) ) {
$custom_css .="h2,.two-grid-layout .post-content h2,.standard-layout .post-title h2{ 
   font-size:{$elanzalite_body_font_size_tb_h2}px;
   line-height:{$elanzalite_body_line_height_tb_h2}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb_h2}px;
  }"; 
}
if ( ! empty( $elanzalite_body_font_h3 ) ) {
$custom_css .="h3{ 
   font-size:{$elanzalite_body_font_size_tb_h3}px;
   line-height:{$elanzalite_body_line_height_tb_h3}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb_h3}px;
  }";
}
if ( ! empty( $elanzalite_body_font_h4 ) ) {
$custom_css .="h4,h4.widgettitle{ 
   font-size:{$elanzalite_body_font_size_tb_h4}px;
   line-height:{$elanzalite_body_line_height_tb_h4}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb_h4}px;
  }"; 
}
if ( ! empty( $elanzalite_body_font_h5 ) ) {
$custom_css .="h5{ 
   font-size:{$elanzalite_body_font_size_tb_h5}px;
   line-height:{$elanzalite_body_line_height_tb_h5}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb_h5}px;
  }";
} 
 if ( ! empty( $elanzalite_body_font_h5 ) ) {
$custom_css .=" h6{ 
   font-size:{$elanzalite_body_font_size_tb_h6}px;
   line-height:{$elanzalite_body_line_height_tb_h6}px;
   letter-spacing:{$elanzalite_body_letter_spacing_tb_h6}px;
  } ";  
}
$custom_css .="}
@media screen and (max-width: 550px){";
if ( ! empty( $elanzalite_body_font ) ) {
$custom_css .="body,p{ 
   font-size:{$elanzalite_body_font_size_mb}px;
   line-height:{$elanzalite_body_line_height_mb}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb}px;
  }";
}
if ( ! empty( $elanzalite_body_font_h1 ) ) {
$custom_css .="h1,.flex-slider li .caption-content h1{ 
   font-size:{$elanzalite_body_font_size_mb_h1}px;
   line-height:{$elanzalite_body_line_height_mb_h1}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb_h1}px;
  }";
}
if ( ! empty( $elanzalite_body_font_h2 ) ) {
$custom_css .="h2,.two-grid-layout .post-content h2,.standard-layout .post-title h2{ 
   font-size:{$elanzalite_body_font_size_mb_h2}px;
   line-height:{$elanzalite_body_line_height_mb_h2}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb_h2}px;
  } ";
}
if ( ! empty( $elanzalite_body_font_h3 ) ) {
$custom_css .="h3{ 
   font-size:{$elanzalite_body_font_size_mb_h3}px;
   line-height:{$elanzalite_body_line_height_mb_h3}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb_h3}px;
  }";
}
if ( ! empty( $elanzalite_body_font_h4 ) ) {
$custom_css .="h4,h4.widgettitle{ 
   font-size:{$elanzalite_body_font_size_mb_h4}px;
   line-height:{$elanzalite_body_line_height_mb_h4}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb_h4}px;
  } ";
}
if ( ! empty( $elanzalite_body_font_h5 ) ) {
$custom_css .="h5{ 
   font-size:{$elanzalite_body_font_size_mb_h5}px;
   line-height:{$elanzalite_body_line_height_mb_h5}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb_h5}px;
  }";
}  
if ( ! empty( $elanzalite_body_font_h5 ) ) {
$custom_css .=" h6{ 
   font-size:{$elanzalite_body_font_size_mb_h6}px;
   line-height:{$elanzalite_body_line_height_mb_h6}px;
   letter-spacing:{$elanzalite_body_letter_spacing_mb_h6}px;
  }";     
 }
$custom_css .="}";
return $custom_css;
}
function themehunk_customizers_enqueue(){
    echo "<style>";
   	echo  themehunk_customizer_elanzalite_custom_style();
    echo "</style>";

}
add_action( 'wp_head', 'themehunk_customizers_enqueue' );

?>