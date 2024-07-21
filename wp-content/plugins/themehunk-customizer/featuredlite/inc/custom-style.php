<?php
 // custom header background
add_action('wp_head','featured_lite_custom_style');
function featured_lite_custom_style(){ 
$top_hd_bg_color = get_theme_mod('top_hd_bg_color','rgba(0, 0, 0, 0.3)');
$main_hdng_color = get_theme_mod('main_hdng_color');
$brdr_hdng_color = get_theme_mod('brdr_hdng_color');
$sub_hdng_color  = get_theme_mod('sub_hdng_color');
$first_colmn_bg_color   = get_theme_mod('first_colmn_bg_color');
$first_colmn_icon_color = get_theme_mod('first_colmn_icon_color');
$first_colmn_hdng_color = get_theme_mod('first_colmn_hdng_color');
$first_colmn_desc_color = get_theme_mod('first_colmn_desc_color');
$second_colmn_bg_color   = get_theme_mod('second_colmn_bg_color');
$second_colmn_icon_color = get_theme_mod('second_colmn_icon_color');
$second_colmn_hdng_color = get_theme_mod('second_colmn_hdng_color');
$second_colmn_desc_color = get_theme_mod('second_colmn_desc_color');
$third_colmn_bg_color   = get_theme_mod('third_colmn_bg_color');
$third_colmn_icon_color = get_theme_mod('third_colmn_icon_color');
$third_colmn_hdng_color = get_theme_mod('third_colmn_hdng_color');
$third_colmn_desc_color = get_theme_mod('third_colmn_desc_color');
// top-bottom-ribon
$ribbon_color = get_theme_mod('ribbon_color');
$ribbon_btn_color = get_theme_mod('ribbon_button_color');
$ribbon_btn_hover_color = get_theme_mod('ribbon_button_hover_color');
$top_ribbon_txt_color = get_theme_mod('top_ribbon_txt_color');
$ribbon_color_bottom = get_theme_mod('ribbon_color_bottom');
$ribbon_btn_color_bottom = get_theme_mod('ribbon_button_color_bottom');
$ribbon_btn_hover_color_bottom = get_theme_mod('ribbon_button_hover_color_bottom');
$btm_ribbon_txt_color = get_theme_mod('btm_ribbon_txt_color');
$ribbon_button_txt_color = get_theme_mod('ribbon_button_txt_color');
$ribbon_button_txt_hvr_color = get_theme_mod('ribbon_button_txt_hvr_color');

$ribbon_button_color_txt_bottom = get_theme_mod('ribbon_button_color_txt_bottom');
$ribbon_button_color_txt__hvr_bottom = get_theme_mod('ribbon_button_color_txt__hvr_bottom');

// services
$service_bg_color    = get_theme_mod('service_bg_color');
$srv_main_hd_color   = get_theme_mod('srv_main_hd_color');
$srv_sub_hd_color    = get_theme_mod('srv_sub_hd_color');
$srv_colom_bg_color  = get_theme_mod('srv_colom_bg_color');
$srv_colom_hd_color  = get_theme_mod('srv_colom_hd_color');
$srv_colom_txt_color = get_theme_mod('srv_colom_txt_color');
//aboutus 
$about_bg = get_theme_mod('about_us_bg_color');
$about_txt = get_theme_mod('about_us_txt_color');
//team
$team_bg = get_theme_mod('team_bg_color');
$team_txt = get_theme_mod('team_txt_color');
$team_sub_hd_color = get_theme_mod('team_sub_hd_color');
//woocommerce    
$woo_bg_color    = get_theme_mod('woo_bg_color');
$woo_hd_color    = get_theme_mod('woo_hd_color');
$woo_sub_hd_color= get_theme_mod('woo_sub_hd_color');
//testimonial
$testimonial_bg = get_theme_mod('testimonial_bg_color');
$testimonial_txt = get_theme_mod('testimonial_txt_color');
$testimonial_sub_hd_color = get_theme_mod('testimonial_sub_hd_color');
//recent post    
$blog_bg_color    = get_theme_mod('blog_bg_color');
$blog_hd_color    = get_theme_mod('blog_hd_color');
$blog_sub_hd_color = get_theme_mod('blog_sub_hd_color');
//contact
$cnt_bg = get_theme_mod('cnt_bg_color','rgba(0, 0, 0, 0.3)');
$cnt_main_heading_color = get_theme_mod('cnt_main_heading_color');
$cnt_sub_heading_color = get_theme_mod('cnt_sub_heading_color');
$cnt_txt = get_theme_mod('cnt_txt_color');
// site-color    
$theme_color     = get_theme_mod('theme_color','#f16c20');
$footer_bg_color = get_theme_mod('footer_bg_color');
$footer_info_bg_color = get_theme_mod('footer_info_bg_color');
$hd_bg_color          = get_theme_mod('hd_bg_color');
$shrnk_hd_bg_color    = get_theme_mod('shrnk_hd_bg_color');
$site_title_color     = get_theme_mod('site_title_color');
$hd_menu_color        = get_theme_mod('hd_menu_color','#fff');
$hd_menu_hvr_color    = get_theme_mod('hd_menu_hvr_color','#f16c20');
$mobile_menu_bg_color = get_theme_mod('mobile_menu_bg_color');

echo "<style type='text/css'>"; ?>
.loader {
    border-top: 2px solid <?php echo $theme_color; ?>;
}
#respond input#submit{
    background:<?php echo $theme_color; ?>;
}
.woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce ul.products li.product a.button:hover, .woocommerce.archive ul.products li.product a.button:hover, .woocommerce-page.archive ul.products li.product a.button:hover,.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce-page nav.woocommerce-pagination ul li a:focus {
    background:<?php echo $theme_color;?>;
}
.woocommerce ul.products li.product a.button, .woocommerce.archive ul.products li.product a.button, .woocommerce-page.archive ul.products li.product a.button {
   background:<?php echo $theme_color;?>;
}
.home .switch-lead .leadform-show-form.leadform-lite input[type="submit"] {
     background-color:<?php echo $theme_color; ?>!important; 
}
.home .switch-lead .lead-genration-wrapper .popup .close {
   color: <?php echo $theme_color; ?>; 
}
.last-btn .navigation ul#menu > li:last-child > a{
    border: 2px solid <?php echo $theme_color; ?>; 
    color: <?php echo $theme_color; ?>; 
}
.last-btn .menu-item-has-children > a:after{
color: <?php echo $theme_color; ?>; 
}
.last-btn.smaller .navigation ul#menu > li:last-child > a{
 border: 2px solid <?php echo $theme_color; ?>; 
 background:<?php echo $theme_color; ?>   
}
blockquote:before,
ul.multiple-testimonial-section li.multi-testimonial blockquote:before, a:hover, a:focus {
 color: <?php echo $theme_color; ?>;
}
span.multi-featured-icon i, #move-to-top .fa-angle-up:before {
    color: <?php echo $theme_color; ?>;
}
span.multi-testimonial-image img {
    box-shadow: 0px 0px 0px 1px <?php echo $theme_color; ?>;
}
ul.multiple-featured-section li:hover span.multi-featured-icon i {
    background-color: <?php echo $theme_color; ?>;
    color: #fff;
    border-color: <?php echo $theme_color; ?>;
}
ul.multiple-testimonial-section li.multi-testimonial a.author{
 color: <?php echo $theme_color; ?>!important;
}
.wpcf7 input[type=submit] {
background:<?php echo $theme_color; ?>;
}
input.search-submit {
background:<?php echo $theme_color; ?>;
}
.newsletter-wrapper form.Newsletter-form input[type="submit"] {
    background: <?php echo $theme_color; ?>;
    color: #fff;
}
.blog-container .blog-loop .read-more a, .single-container .single-loop .read-more a {
    border: 1px solid <?php echo $theme_color; ?>;
    color: <?php echo $theme_color; ?>;
}
.blog-container .blog-loop .read-more a:hover, .single-container .single-loop .read-more a:hover, .tagcloud a {
    background-color: <?php echo $theme_color; ?>;
}
.blog-container .breadcrumb h4, .single-container .breadcrumb h4{
border-bottom: 2px solid <?php echo $theme_color; ?>;
}
.contact-wrap .form-group:before {
 background: <?php echo $theme_color; ?>;
}
.contact-wrap .form-group.form-lined:before {
background: <?php echo $theme_color; ?>;
}
.contact-wrap .leadform-show-form.leadform-lite input[type="submit"]{
 background: <?php echo $theme_color; ?>;
}
.widgettitle > span:before, .widgettitle > span:after{
    border-color: <?php echo $theme_color; ?>;
}
.widgettitle > span:before, .widgettitle > span:after, .page .breadcrumb h1:after, #move-to-top, .widgettitle, .tagcloud a, h1.page-title:after  {
    border-color: <?php echo $theme_color; ?>!important;
}
.woocommerce span.onsale, .woocommerce-page span.onsale {   
 background-color:<?php echo$theme_color;?>
}
.woocommerce-page #respond input#submit {
    background:<?php echo$theme_color;?>
}
.woocommerce ul.products li.product a.button{   
 background-color:<?php echo$theme_color;?>
}
.woocommerce ul.products li.product a.button:hover{   
 background-color:<?php echo$theme_color;?>
}
 .woocommerce-page a.button{
background-color:<?php echo$theme_color;?>
 }
.woocommerce div.product form.cart .button {
background-color:<?php echo$theme_color;?>     
}
.woocommerce .cart .button, .woocommerce .cart input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
background-color:<?php echo$theme_color;?>      
}
.footer-wrapper{
 background:<?php echo $footer_bg_color;?>   
}
.footer-copyright{
 background:<?php echo $footer_info_bg_color;?>      
}
.header-wrapper{
 background:<?php echo $hd_bg_color;?>      
}
header.smaller .header-wrapper, 
.home .hdr-transparent.smaller .header-wrapper{
background:<?php echo $shrnk_hd_bg_color;?>
}
.logo h1 a,.logo p,
.split-menu .logo-cent h1 a,
.split-menu .logo-cent p{
color:<?php echo $site_title_color; ?>    
}
.navigation .menu > li > a,
.menu-item-has-children > a:after{
color:<?php echo $hd_menu_color; ?>   
}
.navigation ul li a:hover,
.navigation .menu .current_page_item a, 
.navigation .menu li a.active{
color:<?php echo $hd_menu_hvr_color; ?>    
}
@media screen and (max-width: 1024px){
.navigation ul li a:hover,
.navigation .menu .current_page_item a,
.navigation .menu li a.active{
 background:<?php echo $hd_menu_hvr_color; ?>; 
 color:#fff!important;
}
.header a#pull{
 color:<?php echo $mobile_menu_bg_color; ?>   
}
}

.main-header-section{
 background-color:<?php echo $top_hd_bg_color;?>   
}
.main-header-section .main-text h1{
 color:<?php echo $main_hdng_color;?>   
}
.main-header-section .main-text h2{
 color:<?php echo $sub_hdng_color;?>      
}
.main-header-section .main-head-partition{
 border-color:<?php echo $brdr_hdng_color;?>      
}
.featured-section.first a:hover{
background-color:<?php echo $first_colmn_bg_color;?>   	
}
.featured-section.first span.featured-icon i{
color:<?php echo $first_colmn_icon_color; ?>;	
border-color:<?php echo $first_colmn_icon_color; ?>
}
.featured-section.first h3{
color:<?php echo $first_colmn_hdng_color; ?>	
}
.featured-section.first p{
color:<?php echo $first_colmn_desc_color; ?>		
}

.featured-section.second a:hover{
background-color:<?php echo $second_colmn_bg_color;?>   	
}
.featured-section.second span.featured-icon i{
color:<?php echo $second_colmn_icon_color; ?>;	
border-color:<?php echo $second_colmn_icon_color; ?>
}
.featured-section.second h3{
color:<?php echo $second_colmn_hdng_color; ?>	
}
.featured-section.second p{
color:<?php echo $second_colmn_desc_color; ?>		
}
.featured-section.third a:hover{
background-color:<?php echo $third_colmn_bg_color;?>   	
}
.featured-section.third span.featured-icon i{
color:<?php echo $third_colmn_icon_color; ?>;	
border-color:<?php echo $third_colmn_icon_color; ?>
}
.featured-section.third h3{
color:<?php echo $third_colmn_hdng_color; ?>	
}
.featured-section.third p{
color:<?php echo $third_colmn_desc_color; ?>		
}

.ribbon-section{
background: <?php echo $ribbon_color; ?>;
}
.ribbon-section .ribbon-button button:hover{
    background: <?php echo $ribbon_btn_hover_color; ?>;
    color: <?php echo $ribbon_button_txt_hvr_color; ?>;
}
.ribbon-section h2.heading-area{
   color:<?php echo $top_ribbon_txt_color;?> 
}
.ribbon-section .ribbon-button button{
    background: <?php echo $ribbon_btn_color; ?>;
    color: <?php echo $ribbon_button_txt_color; ?>;
}
.bottom-ribbon-section{
 background:<?php echo $ribbon_color_bottom; ?>;
}
.bottom-ribbon-section .ribbon-button button:hover {
    background:<?php echo  $ribbon_btn_hover_color_bottom; ?>;
    color:<?php echo $ribbon_button_color_txt__hvr_bottom; ?>;
}
.bottom-ribbon-section .ribbon-button button{
    background:<?php echo $ribbon_btn_color_bottom; ?>;
    color:<?php echo $ribbon_button_color_txt_bottom; ?>;
}
.bottom-ribbon-section h2.heading-area{
    color:<?php echo $btm_ribbon_txt_color; ?>;
}

.multi-feature-area {
    background-color: <?php echo $service_bg_color; ?>;
}
.multi-feature-area h2.head-text{
    color:<?php echo $srv_main_hd_color;?>
}
.multi-feature-area h3.subhead-text{
    color:<?php echo $srv_sub_hd_color;?>
}

ul.multiple-featured-section li.multi-featured{
background:<?php echo $srv_colom_bg_color;?>
}

.multi-feature-area h3{
    color:<?php echo $srv_colom_hd_color;?>
}
ul.multiple-featured-section li.multi-featured p{
    color:<?php echo $srv_colom_txt_color;?>
}
.aboutus-section {
    background:  <?php echo $about_bg; ?>;
}
.aboutus-text h2, .aboutus-text p{
    color: <?php echo $about_txt; ?>;
}
.client-team-section  {
  background:<?php echo $team_bg; ?>;
}
.client-team-section h2 {
        color: <?php echo $team_txt; ?>;
}
.client-team-section h3 {
        color: <?php echo $team_sub_hd_color; ?>;
}
#woocommerce.woocommerce-section{
background:<?php echo $woo_bg_color; ?>;  
}
.woocommerce-section h2{
color:<?php echo $woo_hd_color; ?>    
}
.woocommerce-section h3{
color:<?php echo $woo_sub_hd_color; ?>        
}
.client-testimonial-section {
    background: <?php echo $testimonial_bg; ?>;
}
.client-testimonial-section h2 {
	    color: <?php echo $testimonial_txt; ?>;
}
#testimonials h3.subhead-text{
        color: <?php echo $testimonial_sub_hd_color; ?>;
}
#news.multi-slider-area{
  background:  <?php echo $blog_bg_color; ?>
}
#news.multi-slider-area h2.head-text{
   color:<?php echo $blog_hd_color; ?>
}
#news.multi-slider-area h3.subhead-text{
    color:<?php echo $blog_sub_hd_color; ?>
}
.contact-section{
 background:<?php echo $cnt_bg; ?>   
}
.contact-section h2{
 color: <?php echo $cnt_main_heading_color; ?>;   
}
.contact-section h3.subhead-text{
    color: <?php echo $cnt_sub_heading_color; ?>;
}
.cnt-detail .cnt-icon i, .cnt-detail .cnt-info a, .cnt-info p{
    color: <?php echo $cnt_txt; ?>;
}
<?php
 echo get_theme_mod('custom_css_text');
 echo "</style>";
    }
?>