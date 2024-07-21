<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// custom header background
function themehunk_customizer_oneline_custom_style(){ 

$custom_css = "
.footer-wrapper .svg-top-container{ fill:#fff; }
.foot-copyright .svg-top-container{ fill: #1F1F1F; }
.footer{ background-color:#fff;}
.foot-copyright { background-color:#1F1F1F; }
";

$theme_color     = get_theme_mod('theme_color','#D4B068');
$footer_bg_color = get_theme_mod('footer_bg_color','#fff');
$footer_info_bg_color = get_theme_mod('footer_info_bg_color','#1F1F1F');
$custom_css .= ".caption-container h2, .widget ul li:before, .widget #recentcomments .recentcomments span a,.widget #recentcomments .recentcomments, li.nav-previous a:after, li.nav-next a:after,.post-meta a:hover, .post-comment a:hover:before, ul.paging li a,#respond input#submit:hover, .breadcrumbs .current, .breadcrumbs a:hover, .caption-container .archive-title h1, .widget #recentcomments .recentcomments:before, .footer-wrapper a:hover, .tagcloud a:hover,.sidebar-inner-widget li a:hover, a:hover, a:focus, figure.portfolio-content h2 a, .navigation .sub-menu a:hover,.th-widget-recent-post .th-recent-post h5 a:hover, .post-meta .post-previous a:hover,.post-meta .post-next a:hover,.post-meta .post-previous a:hover:before,.post-meta .post-next a:hover:before,.post-meta .post-previous a:hover,.post-meta .post-next a:hover, span.post-author a:hover:before,mark,figure.post-content .date, figure.post-content i,#latest-post span.read-more a:hover,a, .foot-copyright a:hover,.breadcrumb-trail ul li.trail-end,.commentlist .reply a:hover, #cancel-comment-reply-link:hover, ol.commentlist li .comment-metadata span.edit-link a:hover, .commentlist b.fn,ol.commentlist li .reply a{color:{$theme_color};}
   ::-moz-selection,::selection,#scroll:hover, ul.paging li a.current, ul.paging li a:hover, li.nav-next a:hover:after, li.nav-previous a:hover:after,.popup .post-detail::-webkit-scrollbar-thumb{
    background:{$theme_color};}
  ::-moz-selection {
    background: {$theme_color};}
::selection {
    background:{$theme_color};}
textarea#comment:focus:focus,#respond input:focus, .widget input.search-field:focus, .search input.search-field:focus, .error404 input.search-field:focus, #searchform input[type='text']:focus{
outline:{$theme_color} .1px solid;}

   .widgettitle, ul.paging li a, .post-meta .post-previous, #respond input#submit:hover,#scroll, .tagcloud a:hover, .page-description blockquote,.post-meta .post-previous a:hover,.post-meta .post-next a:hover, span.post-readmore a:hover, .post-date a:hover,#latest-post span.read-more a:hover{
                 border-color:{$theme_color};}
      .loader{
      border-color:{$theme_color};
      border-top: 2px solid #f3f3f3;}
      #scroll span {
      border-bottom-color:{$theme_color};}
      .last-btn #menu >li:last-child > a {
    border: 1px solid {$theme_color};
    background: {$theme_color};}
    .blog-content .nav-links span.current{
      color:{$theme_color};
      border-color:{$theme_color};
    }
.last-btn #menu >li:last-child > a:hover{color:{$theme_color};}
     .foot-copyright{background:{$footer_info_bg_color};}
.foot-copyright .svg-top-container{fill:{$footer_info_bg_color};}
.footer-wrapper,.footer{background:{$footer_bg_color};}
.footer-wrapper .svg-top-container{fill:{$footer_bg_color};}";

$hd_bg_color  = get_theme_mod('hd_bg_color'); 
$shrnk_hd_bg_color  = get_theme_mod('shrnk_hd_bg_color','rgba(20, 20, 20, 0.952941)'); 
$site_title_color  = get_theme_mod('site_title_color','#D4B068');  
$hd_menu_color     = get_theme_mod('hd_menu_color'); 
$hd_menu_hvr_color = get_theme_mod('hd_menu_hvr_color');
$mobile_menu_bg_color = get_theme_mod('mobile_menu_bg_color','#fff');


$custom_css .= ".header{background:{$hd_bg_color};}.header.smaller, .home .header.hdr-transparent.smaller{background:{$shrnk_hd_bg_color};}
.home .header #logo h1 a, .home .header #logo p,.header.smaller #logo h1 a, .header #logo p, .header.smaller #logo p{color:{$site_title_color};}

.home .navigation > ul > li >a,
.home .navigation > ul > li >a:link,
.navigation > ul > li >a,
.navigation > ul > li >a:link,
.smaller .navigation > ul > li > a, 
.smaller .navigation > ul > li > a:link{color:{$hd_menu_color};}
.home .navigation > ul > li >a:before,
.home .navigation ul li a.active:before,
.navigation > ul > li >a:before,
.navigation ul li a.active:before,
.navigation li.current_page_item > a:before{background:{$hd_menu_hvr_color};}
.home .navigation > ul > li >a:hover,
.home .navigation > ul > li >a:link:hover,
.home .navigation ul li a.active,
.home .smaller .navigation ul li a.active,
.navigation > ul > li >a:hover,
.navigation > ul > li >a:link:hover,
.navigation ul li a.active,
.smaller .navigation > ul > li > a.active,
.navigation > ul > li.current-menu-item > a, 
.navigation > ul > li.current-menu-item > a:link, 
.home .navigation > ul > li.current-menu-item > a,
.navigation > ul > li.current-menu-item > a,
.navigation > ul.sub-menu > li > a:hover,
.smaller .navigation > ul > li > a:hover, 
.smaller .navigation > ul > li > a:link:hover,
.smaller .navigation ul.sub-menu li a:hover,
.home .smaller .navigation ul.sub-menu li a:hover,.navigation ul.sub-menu li a:hover{color:{$hd_menu_hvr_color};}

@media screen and (max-width: 1024px){
  .last-btn #menu >li:last-child > a{
    background:#fff;
  }
.last-btn #menu >li:last-child > a:hover{
    background-color:{$hd_menu_hvr_color};}
.navigation .menu a:hover, .navigation ul > li.current-menu-item>a{
    background-color:{$hd_menu_hvr_color};}
.navigation ul.sub-menu li a:hover{color:{$hd_menu_hvr_color}!important;}
.home a#pull:after,a#pull:after,.home .smaller a#pull:after,.smaller a#pull:after{color:{$mobile_menu_bg_color};}}";

$sldr_ovrly_color = get_theme_mod('sldr_ovrly_color','rgba(0, 0, 0, 0.55)');
$sldr_title_color = get_theme_mod('sldr_title_color','#fff');
$custom_css .= "#slider-div .over-lay{background:{$sldr_ovrly_color};}
#slider-div h2.title a{color:{$sldr_title_color};}";


$service_bg_color   = get_theme_mod('service_bg_color','#fff');
$service_hd_color   = get_theme_mod('service_hd_color','#111');
$service_sbhd_color = get_theme_mod('service_sbhd_color','#7D7D7D');
$custom_css .= "#services{ background-color:{$service_bg_color};}
.service-wrapper .svg-top-container { fill: {$service_bg_color};}
#services .main-heading{color:{$service_hd_color};}
#services .sub-heading{color:{$service_sbhd_color};}
.service-wrapper .svg-bottom-container{fill:{$service_bg_color};}";

$ribbn_bg_color = get_theme_mod('ribbn_bg_color','rgba(0,0,0,0.55)');
$ribbon_hd_color = get_theme_mod('ribbon_hd_color','#fff');
$ribbn_btn_bg_color = get_theme_mod('ribbn_btn_bg_color');
$ribbon_btn_title_color = get_theme_mod('ribbon_btn_title_color','#fff');
$ribbon_btn_brd_color = get_theme_mod('ribbon_btn_brd_color','#fff');
$ribbn_btn_bg_hvr_color = get_theme_mod('ribbn_btn_bg_hvr_color','rgba(255, 255, 255, 0.5)');
$ribbon_btn_title_hvr_color = get_theme_mod('ribbon_btn_title_hvr_color','#fff');
$ribbon_btn_brd_hvr_color = get_theme_mod('ribbon_btn_brd_hvr_color','#fff');
$custom_css .= "#ribbon:before{background:{$ribbn_bg_color};}
#ribbon h3.main-heading{color:{$ribbon_hd_color};}
#ribbon .header-button.left-button{color:{$ribbon_btn_title_color};}
#ribbon .header-button.left-button{border-color:{$ribbon_btn_brd_color};}
#ribbon .header-button.left-button{background:{$ribbn_btn_bg_color};}
#ribbon .header-button.left-button:hover{background:{$ribbn_btn_bg_hvr_color};color:{$ribbon_btn_title_hvr_color};border-color:{$ribbon_btn_brd_hvr_color};}";

$team_bg_color = get_theme_mod('team_bg_color','#fff');
$team_hd_color = get_theme_mod('team_hd_color','#111');
$team_sb_hd_color = get_theme_mod('team_sb_hd_color','#7D7D7D');
$custom_css .= ".team-wrapper #team{background:{$team_bg_color};}
.team-wrapper .svg-top-container{fill:{$team_bg_color};}
#team .main-heading{color:{$team_hd_color};}
#team .sub-heading{color:{$team_sb_hd_color};}";

$testimonial_bg_color = get_theme_mod('testimonial_bg_color','#1F1F1F');
$testimonial_athr_color = get_theme_mod('testimonial_athr_color','#fff');
$testimonial_url_color = get_theme_mod('testimonial_url_color','#808080');
$testimonial_desc_color = get_theme_mod('testimonial_desc_color','#808080');
$custom_css .="#testimonials:before{background:{$testimonial_bg_color};}
.testimonials-wrapper .svg-top-container{fill:{$testimonial_bg_color};}
.test-cont-heading h2{color:{$testimonial_athr_color};}
.test-cont a p{color:{$testimonial_url_color};}
.image-test img{border-color:{$testimonial_url_color};}
.test-cont p{color:{$testimonial_desc_color};}";

$blog_bg_color   = get_theme_mod('blog_bg_color','#f7f7f7');
$blog_hd_color   = get_theme_mod('blog_hd_color','#111');
$blog_sbhd_color = get_theme_mod('blog_sbhd_color','#7D7D7D');
$custom_css .="#latest-post{background:{$blog_bg_color};}
.post-wrapper .svg-top-container {fill:{$blog_bg_color};}
#latest-post .main-heading{color:{$blog_hd_color};}
#latest-post .sub-heading{color:{$blog_sbhd_color};}";

$cnt_bg_color   = get_theme_mod('cnt_bg_color','#1F1F1F');
$cnt_bhd_color   = get_theme_mod('cnt_bhd_color','#fff');
$cnt_sbhd_color = get_theme_mod('cnt_sbhd_color','#7D7D7D');
$cnt_ad_main_color   = get_theme_mod('cnt_ad_main_color','#D4B068');
$cnt_ad_txt_color = get_theme_mod('cnt_ad_txt_color','#7D7D7D');
$custom_css .="#contact:before{background:{$cnt_bg_color};}
.contact-wrapper .svg-top-container{fill:{$cnt_bg_color};}
#contact .cnt-main-heading{color:{$cnt_bhd_color};}
#contact .cnt-sub-heading{color:{$cnt_sbhd_color};}
#contact .add-heading h3{color:{$cnt_ad_main_color};}
#contact .addrs p {color:{$cnt_ad_txt_color};}";

$woo_bg_color   = get_theme_mod('woo_bg_color','#fff');
$woo_hd_color   = get_theme_mod('woo_hd_color','#111');
$woo_subhd_color = get_theme_mod('woo_subhd_color','#7D7D7D');
$custom_css .="#woo-section{background:{$woo_bg_color};}
.woo-wrapper .svg-top-container { fill: {$woo_bg_color};}
#woo-section .main-heading{color:{$woo_hd_color };}
#woo-section .sub-heading{color:{$woo_subhd_color};}
#woo-section .woocommerce span.onsale,
#searchform input[type='submit'],.woocommerce-product-search input[type='submit'] {background-color:{$theme_color};}
#woo-section .woocommerce .woocommerce-message {
 border-top-color:{$theme_color};}
#woo-section .woocommerce ul.products li.product h3,.woocommerce ul.products li.product .woocommerce-loop-category__title, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product h3{
  color:{$theme_color};}
#woo-section .woocommerce span.onsale, 
.woocommerce span.onsale, .woocommerce button.button.alt {
 background-color:{$theme_color};}
 .woocommerce button.button.alt,.woocommerce div.product form.cart .button {
    border: 1px solid {$theme_color};}
.woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce input.button.alt {
  background-color:{$theme_color};
  border-color:{$theme_color};}
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
.woocommerce div.product form.cart .button:hover,
.woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover{
    color:{$theme_color};
    border: 1px solid {$theme_color};}
.woocommerce #commentform p.stars a{
   color: {$theme_color};}";
return $custom_css;
}
function themehunk_customizer_enqueue(){
    echo "<style>";
   			echo  themehunk_customizer_oneline_custom_style();
     echo "</style>";

}
add_action( 'wp_head', 'themehunk_customizer_enqueue' );

?>