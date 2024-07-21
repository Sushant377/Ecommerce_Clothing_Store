<?php
// custom header background
if ( ! function_exists('custom_style') ) :
add_action('wp_head','custom_style');
function custom_style(){ 
$shopline_style=''; 
$theme_color = get_theme_mod('theme_color','#e7c09c');
$shopline_style .=".cart-widget .cart-crl, .cat-grid .catli figure.cat-img:hover .caption-heading{background:{$theme_color};}
.add_to_wishlist_a .show a:before, #testimonial_section a.web-link:hover, .lst-post figure.blog-list .blog-date b, .lst-post figure.blog-list i, .lst-post .read-more a, .lst-post figure.blog-list h3 a:hover, #best_sell_section a:hover,
#shopmain #wp-calendar tbody td a, #shopmain #wp-calendar tbody
td#today, .sidenav a:hover, #shopmain .woocommerce-breadcrumb, .woocommerce-page .yith-wcwl-wishlistexistsbrowse.show:before, .woocommerce-page .yith-wcwl-wishlistaddedbrowse.show:before,  .sidebar-inner-widget ul li a:hover, .woocommerce a.button.alt, .woocommerce input.button.alt, #shopmain .woocommerce-MyAccount-navigation ul li a:hover, #shopmain .woocommerce-info a:hover, #shopmain.woocommerce.woocommerce-account input.button:hover, .woocommerce a.button:hover,.woocommerce input.button:hover, #accordion .sidebar-quickcart p.buttons a:hover, figure.post-content span.read-more a:hover, .product-content-wrapper .add_to_wishlist_url .show a:before, #shopmain .woocommerce-MyAccount-content p strong, .woocommerce .price_slider_amount button.button:hover, .featured-grid .yith-wcwl-wishlistaddedbrowse.show a:before, .featured-grid .yith-wcwl-wishlistexistsbrowse.show a:before,.widget p.buttons a,.th-widget-recent-post .th-recent-post h5 a:hover, #shopmain #wp-calendar tfoot td#prev a:hover, .breadcrumb ul li a, .breadcrumb ul li span, .breadcrumb-trail,.last-btn.shrink #menu >li:last-child > a,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover{color:{$theme_color};}
.lst-post .read-more a, .lst-post .read-more a:hover, .widget p.buttons a, #shopmain #wp-calendar tbody
td#today, #accordion .sidebar-quickcart p.buttons a, .woocommerce a.button.alt, .woocommerce a.button.alt:hover, .woocommerce input.button.alt, .woocommerce input.button.alt:hover, #shopmain .woocommerce-info a, #shopmain .woocommerce-info a:hover, #shopmain.woocommerce.woocommerce-account input.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce input.button, .woocommerce input.button:hover, #accordion .sidebar-quickcart p.buttons a:hover, .woocommerce .widget a.button:hover, figure.post-content span.read-more a,.woocommerce .price_slider_amount button.button,
#commentform textarea#comment:focus, 
#commentform input#author:focus,
 #commentform input#email:focus, 
 #commentform input#url:focus,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{border-color:{$theme_color};}
.lst-post .read-more a:hover, #accordion .sidebar-quickcart p.buttons a, .woocommerce a.button, .woocommerce input.button, .woocommerce a.button.alt:hover, #shopmain .woocommerce-info a, .woocommerce input.button.alt:hover, #shopmain.woocommerce-account .addresses .title .edit, figure.post-content span.read-more a, .tagcloud a:hover, .navigation.pagination span.current, .navigation.pagination span:hover, .navigation.pagination a:hover,.woocommerce .price_slider_amount button.button,.last-btn.shrink #menu >li:last-child.menu-item-has-children > a:after, .last-btn.shrink #menu >li:last-child.menu-item-has-children > a:before,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{background:{$theme_color};}
#shopmain.woocommerce a.remove{color:{$theme_color}!important;}
#shopmain.woocommerce nav.woocommerce-pagination ul li a:focus,#shopmain.woocommerce nav.woocommerce-pagination ul li a:hover, #shopmain.woocommerce nav.woocommerce-pagination ul li span.current, .post-comment a, #move-to-top{
    background:{$theme_color};}
.single-post.woocommerce #commentform input#submit,.contact-form .leadform-show-form.leadform-lite input[type='submit'],.last-btn #menu >li:last-child > a{
    background: $theme_color;
    border-color: $theme_color;
}
#post_section .blog-cmt a:before{
    color:{$theme_color};
}
#shopmain.woocommerce nav.woocommerce-pagination ul li a:focus,#shopmain.woocommerce nav.woocommerce-pagination ul li a:hover{
  color:#fff;
}
#services .owl-dots .owl-dot.active span, #services .owl-dots .owl-dot:hover span{
   background: $theme_color;
}
.woocommerce #respond input#submit{background:$theme_color; border-color:$theme_color;}
.woocommerce #respond input#submit:hover{border-color:$theme_color; color:$theme_color;}

.single-post.woocommerce #commentform input#submit:hover{
   border-color: $theme_color;
   color: $theme_color;
   background:transparent;
}
.tagcloud a:hover:before{
border-right: 10px solid $theme_color;
 box-shadow: 2px 0 0 -1px $theme_color;
}
.blog-single-content .post-caption i, .post-content .post-cat a:hover, .post-content .post-author a:hover, .post-content .post-next a:hover, .post-content .post-previous a:hover{
color:{$theme_color};}
.commentlist .reply a, #cancel-comment-reply-link {
  background-color: $theme_color;
    border: 1px solid $theme_color;
}
.commentlist .reply a:hover, #cancel-comment-reply-link:hover, .commentlist b.fn,#close-btn:hover,.mobile-menu-active #pull:hover{
color: $theme_color;
}
.mobile-menu-active #pull:hover{
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;  
}
.post-comment a:after{
border-top: 8px solid $theme_color;
}
footer.footer-wrp .footer-menu-wrp ul li a:hover{color:{$theme_color};}
.woocommerce button.button.alt{border: 2px solid $theme_color; color:$theme_color;}
.woocommerce button.button.alt:hover{background: $theme_color; border-color:$theme_color;}
.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover{
  background-color: $theme_color;
    border: 2px solid $theme_color;
  }
.woocommerce .checkout_coupon button.button{
  border: 2px solid $theme_color;
    background-color: $theme_color;
}
.woocommerce .checkout_coupon button.button:hover{
    background-color: transparent;
    color:$theme_color;
}
.price_slider_wrapper .ui-slider .ui-slider-range{background: none repeat scroll 0 0 $theme_color;
box-shadow: 1px 1px 1px 0.5px $theme_color inset;
webkit-box-shadow: 1px 1px 1px 0.5px $theme_color inset;
}#shopline-popup-boxes .product .header .back{border-top: 30px solid $theme_color;border-left: 30px solid $theme_color;}
#main-menu-wrapper .mega li.thunk-widget-menu .widget .widget_shopping_cart_content p.buttons a{
    border: 1px solid $theme_color!important;
    color: $theme_color; 
}
.footer-bottom-left .leadform-show-form.leadform-lite input[type='submit']{background-color:$theme_color;}";

// cointainer-size-setting
$contn_size = get_theme_mod('contn_size','1200');
$contn_sz = $contn_size."px";
$shopline_style .=".container,#page {
    width:$contn_sz;}";
// shop-pages-setting
$woo_bg_color = get_theme_mod('woo_bg_color','#fff');
$shop_title_color = get_theme_mod('shop_title_color','#080808');
$shop_ratng_color = get_theme_mod('shop_rating_color','#f2c618');
$shop_price_color = get_theme_mod('shop_price_color','#e7c09c');
$shop_txt_color = get_theme_mod('shop_txt_color','#666666');
$shop_btn_color = get_theme_mod('shop_btn_color','#e7c09c');
$shop_whslst_color = get_theme_mod('shop_whslst_color','#bbb');
$shop_sale_color = get_theme_mod('shop_sale_color','#fff');
$shop_sale_bg_color = get_theme_mod('shop_sale_bg_color','#232531');
$shop_zoomicn_color = get_theme_mod('shop_zoomicn_color','#080808');
$shop_zoomicn_bg_color = get_theme_mod('shop_zoomicn_bg_color','#fff');
$shopline_style .="body.woocommerce-page{
background:{$woo_bg_color};}.woocommerce div.product h1.product_title, .woocommerce-Tabs-panel h2, #shopmain h2.woocommerce-loop-product__title, #shopline-popup-boxes .product .main h1{color:{$shop_title_color};}
.woocommerce .woocommerce-product-rating .star-rating,.woocommerce ul.products li.product .star-rating, .comment-text .star-rating, .woocommerce p.stars a,.woocommerce .footer-widget .star-rating span, .woocommerce .star-rating::before, #shopline-popup-boxes .star-rating span, .woocommerce #best_sell_section ul.product_list_widget li .star-rating, .woocommerce .mega .thunk-widget-menu ul.product_list_widget li .star-rating,.woocommerce .widget .star-rating{color:{$shop_ratng_color};}
.woocommerce div.product p.price, #shopmain.woocommerce ul.products li.product .price, #shopline-popup-boxes .product .footer p{color:{$shop_price_color};}
.woocommerce-product-details__short-description p, span.posted_in,span.posted_in a, .woocommerce-Tabs-panel--description p, #shopline-popup-boxes .product .main h2, #shopline-popup-boxes .product .main .right p{color:{$shop_txt_color};}
.woocommerce li.product .button{border: 2px solid $shop_btn_color; color:$shop_btn_color;}
 .woocommerce li.product .button:hover{background: $shop_btn_color; border-color:$shop_btn_color;}

.woocommerce-page .add_to_wishlist:before{color:{$shop_whslst_color};}
#shopline-popup-boxes .yith-wcwl-add-button.show a i.fa{color:{$shop_whslst_color};}
  .woocommerce span.onsale{color:$shop_sale_color; background:$shop_sale_bg_color;}
  .woocommerce div.product div.images .woocommerce-product-gallery__trigger{background:{$shop_zoomicn_bg_color};}
  .woocommerce div.product div.images .woocommerce-product-gallery__trigger:before{border-color:{$shop_zoomicn_color};}
  .woocommerce div.product div.images .woocommerce-product-gallery__trigger:after{
    background:{$shop_zoomicn_color};}";
//header setting
$headr_bckg           = get_theme_mod('headr_bckg');
$shrnk_headr_bckg     = get_theme_mod('shrnk_headr_bckg','rgba(255, 255, 255,1);');
$site_title_color     = get_theme_mod('site_title_color','#080808');
$site_desc_color      = get_theme_mod('site_desc_color','#666666');
$top_menu_color       = get_theme_mod('top_menu_color','#080808');
$top_menu_hvr_color   = get_theme_mod('top_menu_hvr_color','#e7c09c');
$top_icon_color       = get_theme_mod('top_icon_color','#080808');
$drp_menu_color       = get_theme_mod('drp_menu_color','#080808');
$drp_hvr_menu_color   = get_theme_mod('drp_hvr_menu_color','#e7c09c');
$drp_bckg             = get_theme_mod('drp_bckg','');
$mob_icon_color       = get_theme_mod('mob_icon_color','#575757');
$mobile_menu_bg       = get_theme_mod('mobile_menu_bg','#fff');
$mob_menu_color       = get_theme_mod('mob_menu_color','#080808');
$mob_hvr_menu_color   = get_theme_mod('mob_hvr_menu_color','#e7c09c');
$shopline_style   .="header{ background:{$headr_bckg};} header.shrink,
.home header.hdr-transparent.shrink{ background:{$shrnk_headr_bckg};}
h1.site-title a{color:{$site_title_color};}p.site-description{color:{$site_desc_color};}
@media screen and (min-width: 1025px){
.navigation .menu > li > a{color:{$top_menu_color};}
.navigation .menu > li.current-menu-item > a, .menu-item .active, .navigation .menu > li a:hover, .navigation .menu-item a.active{color:{$top_menu_hvr_color};}

.navigation ul ul a,
.navigation ul ul a:link,
.navigation ul ul a:visited {
    color: {$drp_menu_color};}
 .sub-menu li:hover, 
 .navigation ul ul a:hover, 
 .navigation ul ul a:link:hover, 
 .navigation ul ul a:visited:hover{color:{$top_menu_hvr_color};}  
 .navigation ul li li{background:{$drp_bckg};} 
 .menu-item-has-children > a:before,.menu-item-has-children > a:after{
  background:{$top_menu_color};}
}
.cart-widget .fa-shopping-cart, .header-extra .fa-heart, .header-extra ul.hdr-icon-list li.accnt a.logged-in:before, .header-extra ul.hdr-icon-list li.accnt a.logged-out:before,#search-btn,header .taiowc-icon .th-icon, header .taiowcp-icon .th-icon{color:{$top_icon_color};}
@media screen and (max-width: 1024px){
#pull{color:{$mob_icon_color};}
.navigation.mobile-menu-wrapper, .navigation ul li li{background-color:{$mobile_menu_bg};}
.navigation .menu > li > a, .navigation ul ul a, .navigation ul ul a:link, 
.navigation ul ul a:visited {color:{$mob_menu_color};}

.navigation ul .current-menu-item > a,
 .navigation ul li a:hover,
 li.current-menu-item a,
.menu-item .active, .navigation .menu > li a:hover, 
.sub-menu li:hover, .navigation ul ul a:hover, 
.navigation ul ul a:link:hover, .navigation ul ul a:visited:hover,
.sub-menu .menu-item-has-children ul li a:hover {color:{$top_menu_hvr_color};}}";
// mega-menu
$mega_menu_bckg   = get_theme_mod('drp_bckg','');
$mega_title_color = get_theme_mod('mega_title_color','#e7c09c');
$mega_link_color  = get_theme_mod('mega_link_color','#080808');
$mega_text_color  = get_theme_mod('mega_text_color','#666');
$mega_hvr_color  = get_theme_mod('mega_hvr_color','#e7c09c');
$shopline_style  .=".mega ul.sub-menu{ background:{$mega_menu_bckg};}
.mega >ul.sub-menu>li.mega-sub-item>a, .mega .thunk-widget-menu .widget h2.widgettitle, .mega .thunk-widget-menu .widget .recent-post h4.widgettitle {color:{$mega_title_color};}
li.mega-sub-item ul.sub-menu li a, .mega .thunk-widget-menu .widget .product-title, .mega li.thunk-widget-menu .th-widget-recent-post h5.r_title a, .mega .thunk-widget-menu .widget ul.product_list_widget li a, #main-menu-wrapper nav .mega .thunk-widget-menu .widget ul.product-categories .cat-item a,.thunk-widget-menu .widget ul.product-categories span.count, .thunk-widget-menu .widget ul.menu li a{color:{$mega_link_color};}
.mega .thunk-widget-menu .widget .textwidget, .mega .thunk-widget-menu .widget .amount, .mega .thunk-widget-menu .widget del, .mega .thunk-widget-menu .widget ins, .mega li.thunk-widget-menu .th-widget-recent-post .post-entry p, .mega li.thunk-widget-menu .th-widget-recent-post a, .thunk-widget-menu .total strong, .mega li.thunk-widget-menu .widget span.quantity{color:{$mega_text_color};}
li.mega-sub-item ul.sub-menu li a:hover, .mega .thunk-widget-menu .widget .product-title:hover, .mega li.thunk-widget-menu .th-widget-recent-post h5.r_title a:hover, .mega li.thunk-widget-menu .th-widget-recent-post a:hover, .mega .thunk-widget-menu .widget ul.product_list_widget li a:hover, #main-menu-wrapper nav .mega .thunk-widget-menu .widget ul.product-categories .cat-item a:hover,.thunk-widget-menu .widget ul.menu li a:hover, .widget ul.product-categories span.count:hover{color:{$mega_hvr_color};}
@media screen and (max-width: 1024px){
.mega ul.sub-menu{background:{$mobile_menu_bg};}
.mega >ul.sub-menu>li.mega-sub-item>a, .mega .thunk-widget-menu .widget h2.widgettitle, .mega .thunk-widget-menu .widget .recent-post h4.widgettitle {color:{$mob_menu_color}!important;}
}";
//slider
$slider_heading_color     = get_theme_mod('slider_heading_color','#111');
$slider_cate_color     = get_theme_mod('slider_cate_color','#222');
$slider_line_color     = get_theme_mod('slider_line_color','#e7c09c');
$slider_price_color    = get_theme_mod('slider_price_color','#666');
$slider_bg_image       = get_theme_mod('slider_bg_image','');
$slider_bg_overly      = get_theme_mod('slider_bg_overly','#e7e8e9');
$slider_first_button_bg_color       = get_theme_mod('slider_first_button_bg_color','');
$slider_first_button_text_color      = get_theme_mod('slider_first_button_text_color','');
$slider_first_hover_text_color       = get_theme_mod('slider_first_hover_text_color','');
$slider_second_button_bg_color       = get_theme_mod('slider_second_button_bg_color','');
$slider_second_button_text_color     = get_theme_mod('slider_second_button_text_color','');
$slider_second_hover_text_color       = get_theme_mod('slider_second_hover_text_color','');
$content_hide_hd_hero   = get_theme_mod('content_hide_hd_hero','');
$content_hide_sb_hero   = get_theme_mod('content_hide_sb_hero','');
$content_hide_btn_hero  = get_theme_mod('content_hide_btn_hero','');
$front_hero_height  = get_theme_mod('front_hero_height','');
$front_garedient_hero  = get_theme_mod('front_garedient_hero','gradient-default');
$shopline_style .=".product-slider .da-slider{ background:url({$slider_bg_image});}
#da-slider:before{ background:{$slider_bg_overly};}
.da-caption h3{ color:{$slider_heading_color};}
#da-slider h4.da-category, #da-slider h4.da-category a{ color:{$slider_cate_color};}
.da-caption .da-border{ border-color:{$slider_line_color};}
.da-caption span { color:{$slider_price_color};}
.woocommerce .da-slide del { color:{$slider_price_color};}
.woocommerce .da-slider a.button { border-color:{$slider_first_button_bg_color};}
.woocommerce .da-slider a.button {color:{$slider_first_button_text_color};}
.da-caption a.add_to_cart_button:before{color:{$slider_first_button_text_color};}
.woocommerce .da-slider a.button:hover{background-color:{$slider_first_button_bg_color};}
.woocommerce .da-slider a.button:hover{border-color:{$slider_first_button_bg_color};}
.woocommerce .da-slider a.button:hover,
.da-caption a.add_to_cart_button:hover:before{color:{$slider_first_hover_text_color};}
.da-caption a.da-buy{border-color:{$slider_second_button_bg_color};}
 .da-caption a.da-buy{color: {$slider_second_button_text_color};}
.da-caption a.da-buy:after
{color:{$slider_second_button_text_color};}
.woocommerce .da-caption a.da-buy:hover{background-color:{$slider_second_button_bg_color};}
.woocommerce .da-caption a.da-buy:hover{border-color:{$slider_second_button_bg_color};}
.woocommerce .da-caption a.da-buy:hover{color:{$slider_second_hover_text_color};}
.da-caption a.da-buy:hover:after {color:{$slider_second_hover_text_color};}
.hero-wrap.slide .slides li,#hero-color,#hero-image,#hero-video,#hero-gradient{height:{$front_hero_height}px;}";
if($content_hide_hd_hero=='1'){
$shopline_style .=".flexslider .container_caption h2, .hero-wrap .container_caption h2{display:none;}";
}
if($content_hide_sb_hero=='1'){
$shopline_style .=".flexslider .container_caption p,.hero-wrap .container_caption p{display:none;}";
}
if($content_hide_btn_hero=='1'){
$shopline_style .=".flexslider .container_caption a.slider-button,.hero-wrap .container_caption a.slider-button{display:none;}";
}
if($front_garedient_hero=='gradient-default'){
$shopline_style .="#hero-gradient{background: -moz-linear-gradient(-45deg, rgba(26, 187, 197, 1) 0%, rgba(26, 187, 197, 1) 41%, rgba(45, 188, 129, 1) 56%, rgba(45, 188, 129, 1) 100%);background:-webkit-linear-gradient(-45deg, rgba(26, 187, 197, 1) 0%, rgba(26, 187, 197, 1) 41%, rgba(45, 188, 129, 1) 56%, rgba(45, 188, 129, 1) 100%);background:-ms-linear-gradient(-45deg, rgba(26, 187, 197, 1) 0%, rgba(26, 187, 197, 1) 41%, rgba(45, 188, 129, 1) 56%, rgba(45, 188, 129, 1) 100%);background:linear-gradient(-45deg, rgba(26, 187, 197, 1) 0%, rgba(26, 187, 197, 1) 41%, rgba(45, 188, 129, 1) 56%, rgba(45, 188, 129, 1) 100%);
  background:-o-linear-gradient(-45deg, rgba(26, 187, 197, 1) 0%, rgba(26, 187, 197, 1) 41%, rgba(45, 188, 129, 1) 56%, rgba(45, 188, 129, 1) 100%);
}";
}
if($front_garedient_hero=='gradient-one'){
$shopline_style .="#hero-gradient{background:-moz-linear-gradient( 311deg, rgba(255, 82, 171, 1) 0%, rgba(13, 0, 255, 1) 64%, rgba(255, 0, 234, 1) 98% );
  background:-webkit-linear-gradient( 311deg, rgba(255, 82, 171, 1) 0%, rgba(13, 0, 255, 1) 64%, rgba(255, 0, 234, 1) 98% );
   background:-ms-linear-gradient( 311deg, rgba(255, 82, 171, 1) 0%, rgba(13, 0, 255, 1) 64%, rgba(255, 0, 234, 1) 98% );
  background:linear-gradient( 311deg, rgba(255, 82, 171, 1) 0%, rgba(13, 0, 255, 1) 64%, rgba(255, 0, 234, 1) 98% );
  background: -o-linear-gradient( 311deg, rgba(255, 82, 171, 1) 0%, rgba(13, 0, 255, 1) 64%, rgba(255, 0, 234, 1) 98% );
}";
}
if($front_garedient_hero=='gradient-two'){
$shopline_style .="#hero-gradient{background:-moz-linear-gradient( 180deg, rgba(255, 115, 0, 1) 0%, rgba(0, 161, 176, 1) 100% );
  background:-webkit-linear-gradient( 180deg, rgba(255, 115, 0, 1) 0%, rgba(0, 161, 176, 1) 100% ); 
  background:-ms-linear-gradient( 180deg, rgba(255, 115, 0, 1) 0%, rgba(0, 161, 176, 1) 100% );
  background:linear-gradient( 180deg, rgba(255, 115, 0, 1) 0%, rgba(0, 161, 176, 1) 100% );
  background: -o-linear-gradient( 180deg, rgba(255, 115, 0, 1) 0%, rgba(0, 161, 176, 1) 100% );
}";
}
// inner-hero-pages
$shopline_inner_page_set = get_theme_mod('shopline_inner_page_set','image');
$inner_hero_height       = get_theme_mod('inner_hero_height','');
$inner_hero_image        = get_header_image();
$inner_hero_color        = get_theme_mod('inner_hero_color');
$title_hide_hero         = get_theme_mod('title_hide_hero','');
$inner_hero_overlay_set  = get_theme_mod('inner_hero_overlay_set','color');
$inner_bg_overly         = get_theme_mod('inner_bg_overly','');
$overlay_garedient_hero_inner = get_theme_mod('overlay_garedient_hero_inner','gradient-default');
$shopline_style .=".page-head-image,.page-head.video,.fadein-slider{height:{$inner_hero_height}px;}";
if($shopline_inner_page_set=='image'){
$shopline_style .=".page-head-image{background:url($inner_hero_image);}";  
}
if($shopline_inner_page_set=='color'){
$shopline_style .=".page-head-image{background:$inner_hero_color}";   
}
if($title_hide_hero=='1'){
$shopline_style .=".page-head h1.title{display:none;}";  
}
if($inner_hero_overlay_set=='color'){
$shopline_style .=".page-head-image:before{background:$inner_bg_overly;}"; 
}else{
if($overlay_garedient_hero_inner=='gradient-default'){
$shopline_style .=".page-head-image:before {
background:-moz-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background:-webkit-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background: linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background: -ms-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background: -o-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
}"; 
}
elseif($overlay_garedient_hero_inner=='gradient-one'){ 
$shopline_style .=".page-head-image:before{
background: -moz-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: -webkit-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: -ms-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: -o-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
}";
}
elseif($overlay_garedient_hero_inner=='gradient-two'){
$shopline_style .=".page-head-image:before{
background: -moz-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: -webkit-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: -ms-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: -o-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
}";
}
elseif($overlay_garedient_hero_inner=='gradient-three'){
$shopline_style .=".page-head-image:before{
background: -moz-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
 background: -webkit-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
background: linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
background: -ms-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
background: -o-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
}";
}
elseif($overlay_garedient_hero_inner=='gradient-four'){
$shopline_style .=".page-head-image:before{
background: -moz-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
 background: -webkit-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
background: linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
background: -ms-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
background: -o-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
}";
}
elseif($overlay_garedient_hero_inner=='gradient-five'){
$shopline_style .=".page-head-image:before{
background: -moz-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background: -webkit-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background:  linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background:  -ms-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background:  -o-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
}";
}
}

// normal slider
$normal_slider_bg_overly  = get_theme_mod('normal_slider_bg_overly','');
$overlay_garedient_hero  = get_theme_mod('overlay_garedient_hero','gradient-default');
$sldr_heading_clr  = get_theme_mod('sldr_heading_clr','#fff');
$sldr_subheading_clr  = get_theme_mod('sldr_subheading_clr','#fff');

$slider_bg_clr  = get_theme_mod('slider_bg_clr','rgba(0, 0, 0, 0)');
$sldr_btn_txt_clr  = get_theme_mod('sldr_btn_txt_clr','#fff');
$sldr_btn_brd_clr  = get_theme_mod('sldr_btn_brd_clr','#fff');

$slider_bg_hvr_clr  = get_theme_mod('slider_bg_hvr_clr','#ffff');
$sldr_btn_hvr_txt_clr  = get_theme_mod('sldr_btn_hvr_txt_clr','#e7c09c');
$sldr_btn_hvr_brd_clr  = get_theme_mod('sldr_btn_hvr_brd_clr','#fff');
$hero_overlay_set = get_theme_mod('hero_overlay_set','color');
if($hero_overlay_set=='color'){
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {background:{$normal_slider_bg_overly};}";
}else{
if($overlay_garedient_hero=='gradient-default'){ 
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {
background:-moz-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background:-webkit-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background: linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background: -ms-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
background: -o-linear-gradient( 180deg, rgba(217, 66, 255, 0.72) 0%, rgba(0, 255, 255, 0.8) 100% );
}";
}
elseif($overlay_garedient_hero=='gradient-one'){ 
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {
background: -moz-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: -webkit-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: -ms-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
background: -o-linear-gradient( 180deg, rgba(255, 136, 0, 0.65) 0%, rgba(219, 0, 0, 0.49) 100% );
}";
}
elseif($overlay_garedient_hero=='gradient-two'){
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {
background: -moz-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: -webkit-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: -ms-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
background: -o-linear-gradient( 311deg, rgba(255, 82, 171, 0.73) 0%, rgba(13, 0, 255, 0.57) 64%, rgba(255, 0, 234, 0.57) 98% );
}";
}
elseif($overlay_garedient_hero=='gradient-three'){
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {
background: -moz-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
 background: -webkit-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
background: linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
background: -ms-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
background: -o-linear-gradient( 180deg, rgba(255, 115, 0, 0.62) 0%, rgba(0, 161, 176, 0.773) 100% );
}";
}
elseif($overlay_garedient_hero=='gradient-four'){
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {
background: -moz-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
 background: -webkit-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
background: linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
background: -ms-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
background: -o-linear-gradient( 229deg, rgba(213, 9, 224, 0.560784) 0%, rgba(119, 177, 224, 0.458824) 52%, rgba(119, 177, 224, 0.458824) 70%, rgb(255, 255, 255) 118% );
}";
}
elseif($overlay_garedient_hero=='gradient-five'){
$shopline_style .="#slider-div .slides li:before,#hero-image:before,
#hero-video:before {
background: -moz-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
 background: -webkit-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background:  linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background:  -ms-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
background:  -o-linear-gradient( 180deg, rgba(102, 148, 214, 0.88) 0%, rgba(98, 45, 7, 0.87) 100% );
}";
}
}

$shopline_style .=".flexslider .container_caption a.slider-button,.hero-wrap .container_caption a.slider-button{border-color:$sldr_btn_brd_clr; color:$sldr_btn_txt_clr; background:$slider_bg_clr;}
.flexslider .container_caption a.slider-button:hover,.hero-wrap .container_caption a.slider-button:hover{background:$slider_bg_hvr_clr; color:$sldr_btn_hvr_txt_clr; border-color:$sldr_btn_hvr_brd_clr;}
.flexslider .container_caption h2 a,.hero-wrap .container_caption h2 a{color:$sldr_heading_clr;}
.flexslider .container_caption p,.hero-wrap .container_caption p{color:$sldr_subheading_clr;}";

//woo category slider
$woo_cate_image_bg            = get_theme_mod('woo_cate_image_bg','color' );
$woo_cate_slider_overly       = get_theme_mod('woo_cate_slider_overly','#fff');
$woo_cate_background_color    = get_theme_mod('woo_cate_background_color','#fff');
$woo_cate_heading_color       = get_theme_mod('woo_cate_heading_color','#080808');
$woo_cate_subheading_color    = get_theme_mod('woo_cate_subheading_color','#666666');
$woo_cate_line_color          = get_theme_mod('woo_cate_line_color','#e7c09c');
$woo_cate_heading_hide        = get_theme_mod('woo_cate_heading_hide','');
$woo_cate_subheading_hide     = get_theme_mod('woo_cate_subheading_hide','');
$woocat_top_padding           = get_theme_mod('woocat_top_padding','65');
$woocat_bottom_padding        = get_theme_mod('woocat_bottom_padding','65');

$shopline_style .= "#category_section .block-heading h2{color:{$woo_cate_heading_color};}
#category_section .block-heading p{color:{$woo_cate_subheading_color};}
#category_section .block-heading .heading-border{ background:{$woo_cate_line_color};}
#category_section .owl-dots .owl-dot.active span,
#category_section .owl-dots .owl-dot:hover span{ background:{$woo_cate_line_color};}
#category_section:before{ background:{$woo_cate_slider_overly};}#category_section{padding-top:{$woocat_top_padding}px;padding-bottom:{$woocat_bottom_padding}px;}";
if($woo_cate_image_bg == 'color'){
$shopline_style .= "#category_section:before{background:{$woo_cate_slider_overly};}";
}else{
$woo_cate_slider_bg_image   = get_theme_mod('woo_cate_slider_bg_image','');
$shopline_style .="section#category_section{background-image:url($woo_cate_slider_bg_image);}";
}
if($woo_cate_heading_hide == '1'){
  $shopline_style .="#category_section .block-heading h2,
  #category_section .block-heading .heading-border{display:none;}";
}
if($woo_cate_subheading_hide == '1'){
  $shopline_style .="#category_section .block-heading p{display:none;}";
}
if($woo_cate_heading_hide == '1' && $woo_cate_subheading_hide == '1'){
  $shopline_style .="#category_section .block-heading{padding:0px;}";
}
//ribbon
$ribbon_bg_options          = get_theme_mod('ribbon_bg_options','');
$ribbon_bg_video            = get_theme_mod('ribbon_bg_video','#000');
$ribbn_img_overly_color     = get_theme_mod('ribbn_img_overly_color','#7D7D7D');
$ribbon_heading_color       = get_theme_mod('ribbon_heading_color','#fff');
$ribbon_subheading_color    = get_theme_mod('ribbon_subheading_color','#fff');
$ribbon_line_color          = get_theme_mod('ribbon_line_color','#e7c09c');
$ribbon_heading_hide        = get_theme_mod('ribbon_heading_hide','');
$ribbon_subheading_hide     = get_theme_mod('ribbon_subheading_hide','');
$ribbon_top_padding         = get_theme_mod('ribbon_top_padding','65');
$ribbon_bottom_padding      = get_theme_mod('ribbon_bottom_padding','65');

$shopline_style .=".vedio-ribbon .video-title h2{color:{$ribbon_heading_color};}
.vedio-ribbon .video-title p{color:{$ribbon_subheading_color};}
.vedio-ribbon .heading-border{ background:{$ribbon_line_color};}
#ribbon_section:before{ background:{$ribbn_img_overly_color};}#ribbon_section{padding-top:{$ribbon_top_padding}px;padding-bottom:{$ribbon_bottom_padding}px}";
if($ribbon_bg_options == 'video'):
$shopline_style .=".vedio-ribbon{background:url();}"; 
endif;
if($ribbon_bg_options == 'image'):
$ribbon_bg_image = get_theme_mod('ribbon_bg_image');
$shopline_style .=".vedio-ribbon{background:url($ribbon_bg_image);}";
endif;
if($ribbon_bg_options == 'color'):
$shopline_style .= "#ribbon_section:before{background:{$ribbn_img_overly_color};}";
endif;
if($ribbon_heading_hide == '1'){
  $shopline_style .=".vedio-ribbon .video-title h2,
  .vedio-ribbon .heading-border{display:none;}";
}
if($ribbon_subheading_hide == '1'){
  $shopline_style .=".vedio-ribbon .video-title p{display:none;}";
}

//woo product category
$woo_cate_product_options     = get_theme_mod('woo_cate_product_options','color');
$woo_cate_product_overly      = get_theme_mod('woo_cate_product_overly','#fff');
$woo_cate_product_heading_color         = get_theme_mod('woo_cate_product_heading_color','#080808');
$woo_cate_product_line_color      = get_theme_mod('woo_cate_product_line_color','#e7c09c');
$woo_cate_product_border_color    = get_theme_mod('woo_cate_product_border_color','#e7c09c');
$woo_cate_product_cate_text_hover_color = get_theme_mod('woo_cate_product_cate_text_hover_color','#7c7c80');
$woo_cate_product_heading_hide        = get_theme_mod('woo_cate_product_heading_hide','');
$shopline_style .="#featured_product_section .block-heading h2{color:{$woo_cate_product_heading_color};}
#featured_product_section .block-heading .heading-border, .product-content-wrapper .heading-border{ background:{$woo_cate_product_line_color};}
.woocommerce #featured_product_section .featured-filter a.button:hover, .woocommerce #featured_product_section .featured-filter a.button.current{color:{$woo_cate_product_border_color};}
.featured-filter a:hover:after, .featured-filter a.current:after {
background-color:{$woo_cate_product_border_color};}
.woocommerce #featured_product_section .featured-filter a.button{ color:{$woo_cate_product_cate_text_hover_color};}
#featured_product_section:before{ background:{$woo_cate_product_overly};}";

if($woo_cate_product_options == 'color'){
$shopline_style .= "section#featured_product_section{background-color:{$woo_cate_product_overly};}";
}else{
$woo_cate_product_bg_image  = get_theme_mod('woo_cate_product_bg_image','');
$shopline_style .="section#featured_product_section{background-image:url($woo_cate_product_bg_image);}";
}
if($woo_cate_product_heading_hide == '1'){
  $shopline_style .="#featured_product_section .block-heading h2,
  #featured_product_section .block-heading .heading-border{display:none;}";
}


$woo_cate_product_text_color      = get_theme_mod('woo_cate_product_text_color','#666666');
$woo_cate_product_desc_color      = get_theme_mod('woo_cate_product_desc_color','');
$woo_cate_product_price_color     = get_theme_mod('woo_cate_product_price_color','#1e1e23');
$woo_cate_product_cart_btn_color  = get_theme_mod('woo_cate_product_cart_btn_color','#232531');
$woo_cate_product_cart_text_color = get_theme_mod('woo_cate_product_cart_text_color','#fff');
$woo_cate_product_sale_btn_color  = get_theme_mod('woo_cate_product_sale_btn_color','#232531');
$woo_cate_product_sale_text_color = get_theme_mod('woo_cate_product_sale_text_color','#fff');
$woo_cate_product_top_padding     = get_theme_mod('woo_cate_product_top_padding','65');
$woo_cate_product_bottom_padding  = get_theme_mod('woo_cate_product_bottom_padding','65');

$shopline_style .=".featured-grid .meta .name a,.product-content-wrapper .meta .name a{color:{$woo_cate_product_text_color};}
.product-content-wrapper p.description{color:{$woo_cate_product_desc_color};}
.product-content-wrapper .amount,.featured-grid .product-block .price > *{color:{$woo_cate_product_price_color};}
.featured-grid .product-block .price del,
.product-content-wrapper .price del {color:{$woo_cate_product_price_color};}
.woocommerce .featured-grid a.button, .featured-grid .add_to_wishlist_a, .featured-grid .quick-view,
.woocommerce .product-content-wrapper a.button, .product-content-wrapper .icons, .featured-grid .add-cart 
{background-color:{$woo_cate_product_cart_btn_color};}
.featured-grid .add_to_cart_button:before,.featured-grid .add_to_wishlist a, .featured-grid .add_to_wishlist, .featured-grid .quick-view a,
.product-content-wrapper .add_to_cart_button:before, .product-content-wrapper .add_to_wishlist_url a, .product-content-wrapper .quick-view a {color:{$woo_cate_product_cart_text_color};}
.featured-grid .product-block span.onsale, .woocommerce .product-image-wrapper span.onsale  {
    background-color: {$woo_cate_product_sale_btn_color};}
    .featured-grid .product-block span.onsale, .woocommerce .product-image-wrapper span.onsale {
    color: {$woo_cate_product_sale_text_color};}section#featured_product_section{padding-top:{$woo_cate_product_top_padding}px;padding-bottom:{$woo_cate_product_bottom_padding}px;}";

//slide-woocommerce
$woo_slide_product_text_color       = get_theme_mod('woo_slide_product_text_color','#666666');
$woo_slide_product_price_color      = get_theme_mod('woo_slide_product_price_color','#1e1e23');
$woo_slide_product_cart_btn_color   = get_theme_mod('woo_slide_product_cart_btn_color','#232531');
$woo_slide_product_cart_text_color  = get_theme_mod('woo_slide_product_cart_text_color','#fff');
$woo_slide_product_sale_btn_color   = get_theme_mod('woo_slide_product_sale_btn_color','#232531');
$woo_slide_product_sale_text_color  = get_theme_mod('woo_slide_product_sale_text_color','#fff');
$woo_slide_top_padding     = get_theme_mod('woo_slide_top_padding','65');
$woo_slide_bottom_padding  = get_theme_mod('woo_slide_bottom_padding','65');

$shopline_style .="#featured_product_section1 .featured-grid .meta .name a, .product-content-wrapper .meta .name a{color:{$woo_slide_product_text_color};}#featured_product_section1.product-content-wrapper .amount, #featured_product_section1 .featured-grid .product-block .price > *{color:{$woo_slide_product_price_color};}
#featured_product_section1 .featured-grid .product-block .price del,
#featured_product_section1 .product-content-wrapper .price del {color:{$woo_slide_product_price_color};}
.woocommerce #featured_product_section1 .featured-grid a.button, #featured_product_section1 .featured-grid .add_to_wishlist_a, #featured_product_section1 .featured-grid .quick-view,
.woocommerce  #featured_product_section1 .product-content-wrapper a.button, #featured_product_section1 .product-content-wrapper .icons, #featured_product_section1 .featured-grid .add-cart 
{background-color:{$woo_slide_product_cart_btn_color};}
#featured_product_section1 .featured-grid .add_to_cart_button:before,#featured_product_section1 .featured-grid .add_to_wishlist a, #featured_product_section1 .featured-grid .add_to_wishlist, #featured_product_section1 .featured-grid .quick-view a,
#featured_product_section1 .product-content-wrapper .add_to_cart_button:before,#featured_product_section1 .product-content-wrapper .add_to_wishlist_url a, #featured_product_section1 .product-content-wrapper .quick-view a {color:{$woo_slide_product_cart_text_color};}
#featured_product_section1 .featured-grid .product-block span.onsale, .woocommerce #featured_product_section1 .product-image-wrapper span.onsale  {
    background-color: {$woo_slide_product_sale_btn_color};}
  #featured_product_section1 .featured-grid .product-block span.onsale, 
  #featured_product_section1 .woocommerce .product-image-wrapper span.onsale {
    color: {$woo_slide_product_sale_text_color};} #featured_product_section1{padding-top:{$woo_slide_top_padding}px;padding-bottom:{$woo_slide_bottom_padding}px;}";
$woo_slide_product_heading_hide     = get_theme_mod('woo_slide_product_heading_hide','');
$woo_slide_product_subheading_hide  = get_theme_mod('woo_slide_product_subheading_hide','');
if($woo_slide_product_heading_hide == '1'){
  $shopline_style .="section#featured_product_section1 .block-heading h2,
  section#featured_product_section1 .block-heading .heading-border{display:none;}";
}
if($woo_slide_product_subheading_hide == '1'){
  $shopline_style .="section#featured_product_section1 .block-heading p{display:none;}";
}
if($woo_slide_product_heading_hide == '1' && $woo_slide_product_subheading_hide == '1'){
  $shopline_style .="section#featured_product_section1 .block-heading{padding:0px;}";
}
//testimonial
$testimonial_options           = get_theme_mod('testimonial_options','color');
$tst_img_overly_color          = get_theme_mod('tst_img_overly_color','#e7e8e9');
$testimonial_heading_color     = get_theme_mod('testimonial_heading_color','#080808');
$testimonial_subheading_color  = get_theme_mod('testimonial_subheading_color','#666666');
$testimonial_line_color        = get_theme_mod('testimonial_line_color','#e7c09c');
$testimonial_heading_hide      = get_theme_mod('testimonial_heading_hide','');
$testimonial_subheading_hide   = get_theme_mod('testimonial_subheading_hide','');
$testimonial_top_padding       = get_theme_mod('testimonial_top_padding','65');
$testimonial_bottom_padding    = get_theme_mod('testimonial_bottom_padding','65');

$testimonial_hide_section = get_theme_mod( 'testimonial_hide','');
if($testimonial_hide_section == '1'){
  $shopline_style .="#testimonial_section{display:none;}";
}
if($testimonial_heading_hide == '1'){
  $shopline_style .="#testimonial_section .block-heading h2,
  #testimonial_section .block-heading .heading-border{display:none;}";
}
if($testimonial_subheading_hide == '1'){
  $shopline_style .="#testimonial_section .block-heading p{display:none;}";
}
if($testimonial_heading_hide == '1' && $testimonial_subheading_hide == '1'){
  $shopline_style .="#testimonial_section .block-heading{padding:0px;}";
}
$shopline_style .="#testimonial_section .block-heading h2{color:{$testimonial_heading_color};}
#testimonial_section .block-heading p{color:{$testimonial_subheading_color};}
#testimonial_section .block-heading .heading-border, #testimonial_section .owl-dots .owl-dot.active span, #testimonial_section .owl-dots .owl-dot:hover span{ background:{$testimonial_line_color};}
#testimonial_section:before{ background:{$tst_img_overly_color};}#testimonial_section{padding-top:{$testimonial_top_padding }px;padding-bottom:{$testimonial_bottom_padding}px;}";

if($testimonial_options == 'color'){
$shopline_style .= "section#testimonial_section{background-color:{$tst_img_overly_color};}";
}else{
$testimonial_bg_image       = get_theme_mod('testimonial_bg_image','');
$shopline_style .="section#testimonial_section{background-image:url($testimonial_bg_image);}";
}

//product-slide
$product_slider_options             = get_theme_mod('product_slider_options','color');
$product_slider_bg_image            = get_theme_mod('product_slider_bg_image');
$product_slider_img_overly_color    = get_theme_mod('product_slider_img_overly_color','#fff');
$product_slider_heading_color       = get_theme_mod('product_slider_heading_color','#080808');
$product_slider_sbheading_color     = get_theme_mod('product_slider_sbheading_color','#666666');
$product_slider_line_color          = get_theme_mod('product_slider_line_color','#e7c09c');
if($product_slider_options == 'color'){
$shopline_style .= "section#featured_product_section1{background-color:{$product_slider_img_overly_color};}";
}else{
$shopline_style .="section#featured_product_section1{background-image:url($product_slider_bg_image);} section#featured_product_section1:before{background:{$product_slider_img_overly_color};}";
}
$shopline_style .="section#featured_product_section1 .block-heading h2{color:{$product_slider_heading_color};}
section#featured_product_section1 .block-heading p{color:{$product_slider_sbheading_color};}
section#featured_product_section1 .block-heading .heading-border,section#featured_product_section1 .product-block .owl-dots .owl-dot.active span,section#featured_product_section1 .product-block .owl-dots .owl-dot:hover span{background-color:{$product_slider_line_color};}
";
//about us
$aboutus_options    = get_theme_mod('aboutus_options','color');
$aboutus_overly       = get_theme_mod('aboutus_overly','#fff');
$aboutus_heading_color      = get_theme_mod('aboutus_heading_color','#080808');
$aboutus_subheading_color      = get_theme_mod('aboutus_subheading_color','#666666');
$aboutus_line_color      = get_theme_mod('aboutus_line_color','#e7c09c');
$aboutus_shortdesc_color       = get_theme_mod('aboutus_shortdesc_color','#D4B068');
$aboutus_longdesc_color        = get_theme_mod('aboutus_longdesc_color','#7D7D7D;');
$aboutus_btn_color      = get_theme_mod('aboutus_btn_color','#e7c09c');
$aboutus_btn_text_color      = get_theme_mod('aboutus_btn_text_color','#e7c09c');
$aboutus_btn_shadow_color      = get_theme_mod('aboutus_btn_shadow_color','#fff');
$about_top_padding             = get_theme_mod('about_top_padding','65');
$about_bottom_padding          = get_theme_mod('about_bottom_padding','65');
$shopline_style .="#aboutus_section h2.aboutus-heading{color:{$aboutus_heading_color};}
#aboutus_section .block-heading .heading-border{ background:{$aboutus_line_color};}
.amazing-block ul.amazing-list li h3{color:{$aboutus_shortdesc_color};}
.amazing-block ul.amazing-list li p{color:{$aboutus_longdesc_color};}
#aboutus_section:before{ background:{$aboutus_overly};}
#aboutus_section a.amazing-btn {color:{$aboutus_btn_text_color};}
#aboutus_section a.amazing-btn {border-color:{$aboutus_btn_color};}
#aboutus_section a.amazing-btn:hover{background:{$aboutus_btn_color};}
#aboutus_section a.amazing-btn:hover
{border-color:{$aboutus_btn_color};}
#aboutus_section a.amazing-btn:hover
{color:$aboutus_btn_shadow_color};}
section#aboutus_section{background-color:{$aboutus_overly};}
section#aboutus_section{padding-top:{$about_top_padding}px;padding-bottom:{$about_bottom_padding}px;}";
if($aboutus_options == 'color'){
$shopline_style .= "section#aboutus_section{background-color:{$aboutus_overly};}";
}else{
$aboutus_bg_image    = get_theme_mod('aboutus_bg_image','');
$shopline_style .="section#aboutus_section{background-image:url($aboutus_bg_image);}";
}
//blogs
$blog_options     = get_theme_mod('blog_options','color');
$blog_overly    = get_theme_mod('blog_overly','#e7e8e9');
$blog_heading_color          = get_theme_mod('blog_heading_color','#080808');
$blog_subheading_color         = get_theme_mod('blog_subheading_color','#666666');
$blog_datetxt_color    = get_theme_mod('blog_datetxt_color','#bbb');
$blog_text_heading_color       = get_theme_mod('blog_text_heading_color','#111');
$blog_text_desc_color          = get_theme_mod('blog_text_desc_color','#666');
$blog_line_color  = get_theme_mod('blog_line_color','#e7c09c');
$blog_top_padding             = get_theme_mod('blog_top_padding','65');
$blog_bottom_padding          = get_theme_mod('blog_bottom_padding','65');
$shopline_style .="#post_section .block-heading h2{color:{$blog_heading_color};}
#post_section .block-heading .heading-border{background:{$blog_line_color};}
#post_section .block-heading p{color:{$blog_subheading_color};}
.lst-post figure.blog-list h3 a{color:{$blog_text_heading_color};}
.lst-post figure.blog-list p{color:{$blog_text_desc_color};}
.lst-post figure.blog-list span,#post_section .blog-cmt a {color:{$blog_datetxt_color};}
#post_section:before{ background:{$blog_overly};}
#post_section .owl-theme .owl-dots .owl-dot.active span, #post_section .owl-theme .owl-dots .owl-dot:hover span{ background:{$blog_line_color};}
section#post_section{background-color:{$blog_overly};padding-top:{$blog_top_padding}px;padding-bottom:{$blog_bottom_padding}px;}";
if($blog_options == 'color'){
$shopline_style .= "section#post_section{background-color:{$blog_overly};}";
}else{
$blog_bg_image    = get_theme_mod('blog_bg_image','');
$shopline_style .="section#post_section{background-image:url($blog_bg_image);}";
}
$blog_heading_hide  = get_theme_mod('blog_heading_hide','');
$blog_subheading_hide  = get_theme_mod('blog_subheading_hide','');
if($blog_heading_hide == '1'){
  $shopline_style .="#post_section .block-heading h2,
  #post_section .block-heading .heading-border{display:none;}";
}
if($blog_subheading_hide == '1'){
  $shopline_style .="#post_section .block-heading p{display:none;}";
}
if($blog_heading_hide == '1' && $blog_subheading_hide == '1'){
  $shopline_style .="#post_section .block-heading{padding:0px;}";
}
// shop-services
$service_bg_color              = get_theme_mod('service_bg_color','#fff');
$service_top_padding           = get_theme_mod('service_top_padding','25');
$service_bottom_padding        = get_theme_mod('service_bottom_padding','25');

$service_hide = get_theme_mod( 'service_hide','');
if($service_hide == '1'){
  $shopline_style .="section#services{display:none;}";
}
$shopline_style .="section#services{background:{$service_bg_color}; padding-top:{$service_top_padding}px;
padding-bottom:{$service_bottom_padding}px;}";
//brand 
$brand_options    = get_theme_mod('brand_options','color');
$brand_overly          = get_theme_mod('brand_overly','#fff');
if($brand_options == 'color'){
$shopline_style .= "section#brand_section{background-color:{$brand_overly};}";
}else{
$brand_bg_image     = get_theme_mod('brand_bg_image','');
$shopline_style .="section#brand_section{background-image:url($brand_bg_image);}";
}
$shopline_style .="#brand_section:before { background:{$brand_overly};}";
//two column 
$two_column_img_fst_color = get_theme_mod('two_column_img_fst_color','');
$two_column_img_scnd_color = get_theme_mod('two_column_img_scnd_color','');
$shopline_style .= "#hot_deal_section li.one a:after{background:{$two_column_img_fst_color};}";
$shopline_style .= "#hot_deal_section li.two a:after{background:{$two_column_img_scnd_color};}";

//three column 
$three_column_ads_bg_color    = get_theme_mod('three_column_ads_bg_color','#fff');
$three_column_img_fst_color = get_theme_mod('three_column_img_fst_color','');
$three_column_img_scnd_color = get_theme_mod('three_column_img_scnd_color','');
$three_column_img_thr_color = get_theme_mod('three_column_img_thr_color','');
$ad_top_padding             = get_theme_mod('ad_top_padding','65');
$ad_bottom_padding          = get_theme_mod('ad_bottom_padding','65');
$shopline_style .= "div#hot_sell_section{background-color:{$three_column_ads_bg_color};padding-top:{$ad_top_padding}px;padding-bottom:{$ad_bottom_padding}px;}";
$shopline_style .= "#hot_sell_section .sell li.one a:after{background:{$three_column_img_fst_color};}";
$shopline_style .= "#hot_sell_section .sell li.two a:after{background:{$three_column_img_scnd_color};}";
$shopline_style .= "#hot_sell_section .sell li.three a:after{background:{$three_column_img_thr_color};}";

//woo widget
$woo_widget_options = get_theme_mod('woo_widget_options','color');
$woo_widget_overly = get_theme_mod('woo_widget_overly','#e7e8e9');
$woo_widget_heading_color = get_theme_mod('woo_widget_heading_color','#fff');
$woo_widget_bg_color = get_theme_mod('woo_widget_bg_color','#e7c09c');
$shopline_style .=".widget-content ul.sell-grid li.sell-list .widget-heading h3{color:{$woo_widget_heading_color};}
.widget-content ul.sell-grid li.sell-list .widget-heading{background-color:{$woo_widget_bg_color};}";

if($woo_widget_options == 'color'){
$shopline_style .= "section#best_sell_section{background-color:{$woo_widget_overly};}";
}else{
$woo_widget_bg_image = get_theme_mod('woo_widget_bg_image','#000');
$shopline_style .="section#best_sell_section{background-image:url($woo_widget_bg_image);}
#best_sell_section:before { background:{$woo_widget_overly};}";
}
//footer
$footer_options             = get_theme_mod('footer_options','color');
$footer_imager_overly       = get_theme_mod('footer_imager_overly','#232531');
$footer_widget_menu_color   = get_theme_mod('footer_widget_menu_color','#fff');
$footer_widget_title_color  = get_theme_mod('footer_widget_title_color','#fff');
$footer_widget_text_color   = get_theme_mod('footer_widget_text_color','#bbb');
$footer_copyright_text_color= get_theme_mod('footer_copyright_text_color','#bbb');
$footer_followus_color      = get_theme_mod('footer_followus_color','#fff');
$footer_hr_line_color       = get_theme_mod('footer_hr_line_color','#1b1c26');
$footer_top_padding      = get_theme_mod('footer_top_padding');
$footer_bottom_padding       = get_theme_mod('footer_bottom_padding');

$shopline_style .="footer.footer-wrp .footer-menu-wrp ul li a, .footer-menu-wrp ul.menu li:after{color:{$footer_widget_menu_color};}
footer.footer-wrp .footer-menu-wrp ul li{border-right-color:{$footer_widget_menu_color};}
.footer-widget-column .widget h4,.footer-widget-column .widget h4 span, .footer-bottom-left .leadform-show-form.leadform-lite h1, .footer-bottom .footer-bottom-right ul.footer-social-icon li p{color:{$footer_widget_title_color};}
.footer-widget-column .widget ul li a, .footer-widget .product-title, .footer-widget .total strong, .footer-widget .widget span, .footer-widget .widget span.amount, #shopmain #wp-calendar thead th,.footer-widget .widget .textwidget p,span.text-footer{color:{$footer_widget_text_color};}
.footer-bottom .footer-bottom-left a, #footer-wrp .copy-right a{color:{$footer_copyright_text_color};}
.footer-widget, .footer-bottom {border-color:{$footer_hr_line_color};}
.footer-widget .textwidget{color:{$footer_widget_text_color};} .footer-bottom .footer-bottom-right ul.footer-social-icon li p{color:{$footer_followus_color};}footer.footer-wrp{padding-top:{$footer_top_padding}px;padding-bottom:{$footer_bottom_padding}px;}

";

if($footer_options == 'color'){
$shopline_style .= "footer.footer-wrp{background-color:{$footer_imager_overly};}";
}else{
$footer_image_upload  = get_theme_mod('footer_image_upload','');
$shopline_style .="footer.footer-wrp{background-image:url($footer_image_upload);}
#footer-wrp:before { background:{$footer_imager_overly};};";
}

// single product & some issues css changes
$shopline_style .=".social-share ul li i{
  line-height: inherit;
}
.page-head .page-head-image:before{
  display: block;
  z-index: 0;
}
.full-fs-caption{
  position: relative;
}
";
/***********************************/
// body-typography
/***********************************/
$shopline_body_font = get_theme_mod( 'shopline_body_font' );
$shopline_body_font_size = get_theme_mod( 'shopline_body_font_size','14' );
$shopline_body_line_height = get_theme_mod( 'shopline_body_line_height','22' );
$shopline_body_letter_spacing = get_theme_mod( 'shopline_body_letter_spacing','0.4' );
 if ( ! empty( $shopline_body_font ) ) {
themehunk_enqueue_google_font($shopline_body_font);
$shopline_style .="body,p,.woocommerce table.shop_table th,.woocommerce table.wishlist_table thead th{ 
   font-family:{$shopline_body_font};
   font-size:{$shopline_body_font_size}px;
   line-height:{$shopline_body_line_height}px;
   letter-spacing:{$shopline_body_letter_spacing}px;
  }
  #shopmain.woocommerce-cart .amount,.woocommerce table .cart_item td span,.woocommerce .amount,.featured-grid .product-block .price > *,.leadform-show-form.leadform-lite textarea,.leadform-show-form.leadform-lite .select-type select,.hero-wrap .container_caption p{
font-family:{$shopline_body_font};}";
}
$shopline_body_font_size_tb = get_theme_mod( 'shopline_body_font_size_tb','14' );
$shopline_body_line_height_tb = get_theme_mod( 'shopline_body_line_height_tb','22' );
$shopline_body_letter_spacing_tb = get_theme_mod( 'shopline_body_letter_spacing_tb','0.4' );
$shopline_body_font_size_mb = get_theme_mod( 'shopline_body_font_size_mb','14' );
$shopline_body_line_height_mb = get_theme_mod( 'shopline_body_line_height_mb','22' );
$shopline_body_letter_spacing_mb = get_theme_mod( 'shopline_body_letter_spacing_mb','0.4' );
$shopline_style .="@media screen and (max-width: 768px){
  body, p,.woocommerce table.shop_table th,.woocommerce table.wishlist_table thead th{
           font-size:{$shopline_body_font_size_tb}px;
           line-height:{$shopline_body_line_height_tb}px;
           letter-spacing:{$shopline_body_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
 body, p,.woocommerce table.shop_table th,.woocommerce table.wishlist_table thead th{
           font-size:{$shopline_body_font_size_mb}px;
           line-height:{$shopline_body_line_height_mb}px;
           letter-spacing:{$shopline_body_letter_spacing_mb}px; 
         };}";

/***********************************/
// h1-typography
/***********************************/
$shopline_h1_font = get_theme_mod( 'shopline_h1_font' );
$shopline_h1_font_size = get_theme_mod( 'shopline_h1_font_size','26' );
$shopline_h1_line_height = get_theme_mod( 'shopline_h1_line_height','35' );
$shopline_h1_letter_spacing = get_theme_mod( 'shopline_h1_letter_spacing','1' );
 if ( ! empty( $shopline_h1_font ) ) {
themehunk_enqueue_google_font($shopline_h1_font);
$shopline_style .="h1,.full-fs-caption h2.title a, .archive-title h1, .full-fs-caption h1,.woocommerce div.product h1.product_title{ 
   font-family:{$shopline_h1_font};
   font-size:{$shopline_h1_font_size}px;
   line-height:{$shopline_h1_line_height}px;
   letter-spacing:{$shopline_h1_letter_spacing}px;
  }
#shopline-popup-boxes .product .main h1{
font-family:{$shopline_h1_font};
}";
}
$shopline_h1_font_size_tb = get_theme_mod( 'shopline_h1_font_size_tb','26' );
$shopline_h1_line_height_tb = get_theme_mod( 'shopline_h1_line_height_tb','35' );
$shopline_h1_letter_spacing_tb = get_theme_mod( 'shopline_h1_letter_spacing_tb','1' );
$shopline_h1_font_size_mb = get_theme_mod( 'shopline_h1_font_size_mb','26' );
$shopline_h1_line_height_mb = get_theme_mod( 'shopline_h1_line_height_mb','35' );
$shopline_h1_letter_spacing_mb = get_theme_mod( 'shopline_h1_letter_spacing_mb','1' );
$shopline_style .="@media screen and (max-width: 768px){
  h1,.full-fs-caption h2.title a, .archive-title h1, .full-fs-caption h1,.woocommerce div.product h1.product_title{
           font-size:{$shopline_h1_font_size_tb}px;
           line-height:{$shopline_h1_line_height_tb}px;
           letter-spacing:{$shopline_h1_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
 h1,.full-fs-caption h2.title a, .archive-title h1, .full-fs-caption h1,.woocommerce div.product h1.product_title{
           font-size:{$shopline_h1_font_size_mb}px;
           line-height:{$shopline_h1_line_height_mb}px;
           letter-spacing:{$shopline_h1_letter_spacing_mb}px; 
         };}";

/***********************************/
// h2-typography
/***********************************/
$shopline_h2_font = get_theme_mod( 'shopline_h2_font' );
$shopline_h2_font_size = get_theme_mod( 'shopline_h2_font_size','22' );
$shopline_h2_line_height = get_theme_mod( 'shopline_h2_line_height','35' );
$shopline_h2_letter_spacing = get_theme_mod( 'shopline_h2_letter_spacing','1' );
 if ( ! empty( $shopline_h2_font ) ) {
themehunk_enqueue_google_font($shopline_h2_font);
$shopline_style .="h2,.block-heading h2,.flexslider .container_caption h2 a,.woocommerce-Tabs-panel h2,.woocommerce #reviews #comments h2,.vedio-ribbon .video-title h2{ 
   font-family:{$shopline_h2_font};
   font-size:{$shopline_h2_font_size}px;
   line-height:{$shopline_h2_line_height}px;
   letter-spacing:{$shopline_h2_letter_spacing}px;
  }";
}
$shopline_h2_font_size_tb = get_theme_mod( 'shopline_h2_font_size_tb','22' );
$shopline_h2_line_height_tb = get_theme_mod( 'shopline_h2_line_height_tb','35' );
$shopline_h2_letter_spacing_tb = get_theme_mod( 'shopline_h2_letter_spacing_tb','1' );
$shopline_h2_font_size_mb = get_theme_mod( 'shopline_h2_font_size_mb','22' );
$shopline_h2_line_height_mb = get_theme_mod( 'shopline_h2_line_height_mb','35' );
$shopline_h2_letter_spacing_mb = get_theme_mod( 'shopline_h2_letter_spacing_mb','1' );
$shopline_style .="@media screen and (max-width: 768px){
  h2,.block-heading h2,.flexslider .container_caption h2 a,.woocommerce-Tabs-panel h2,.woocommerce #reviews #comments h2,.vedio-ribbon .video-title h2{
           font-size:{$shopline_h2_font_size_tb}px;
           line-height:{$shopline_h2_line_height_tb}px;
           letter-spacing:{$shopline_h2_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
 h2,.block-heading h2,.flexslider .container_caption h2 a,.woocommerce-Tabs-panel h2,.woocommerce #reviews #comments h2,.vedio-ribbon .video-title h2{
           font-size:{$shopline_h2_font_size_mb}px;
           line-height:{$shopline_h2_line_height_mb}px;
           letter-spacing:{$shopline_h2_letter_spacing_mb}px; 
         };}";
/***********************************/
// h3-typography
/***********************************/
$shopline_h3_font = get_theme_mod( 'shopline_h3_font' );
$shopline_h3_font_size = get_theme_mod( 'shopline_h3_font_size','20' );
$shopline_h3_line_height = get_theme_mod( 'shopline_h3_line_height','35' );
$shopline_h3_letter_spacing = get_theme_mod( 'shopline_h3_letter_spacing','1' );
 if ( ! empty( $shopline_h3_font ) ) {
themehunk_enqueue_google_font($shopline_h3_font);
$shopline_style .="h3,.featured-grid .meta .name a,#shopmain h2.woocommerce-loop-product__title,#post_section figure.blog-list h3 a,.blog-content li figure.post-content h3{ 
   font-family:{$shopline_h3_font};
   font-size:{$shopline_h3_font_size}px;
   line-height:{$shopline_h3_line_height}px;
   letter-spacing:{$shopline_h3_letter_spacing}px;
  }";
}
$shopline_h3_font_size_tb = get_theme_mod( 'shopline_h3_font_size_tb','20' );
$shopline_h3_line_height_tb = get_theme_mod( 'shopline_h3_line_height_tb','35' );
$shopline_h3_letter_spacing_tb = get_theme_mod( 'shopline_h3_letter_spacing_tb','1' );
$shopline_h3_font_size_mb = get_theme_mod( 'shopline_h3_font_size_mb','20' );
$shopline_h3_line_height_mb = get_theme_mod( 'shopline_h3_line_height_mb','35' );
$shopline_h3_letter_spacing_mb = get_theme_mod( 'shopline_h3_letter_spacing_mb','1' );
$shopline_style .="@media screen and (max-width: 768px){
  h3,.featured-grid .meta .name a,#shopmain h2.woocommerce-loop-product__title,#post_section figure.blog-list h3 a,.blog-content li figure.post-content h3{
           font-size:{$shopline_h3_font_size_tb}px;
           line-height:{$shopline_h3_line_height_tb}px;
           letter-spacing:{$shopline_h3_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
 h3,.featured-grid .meta .name a,#shopmain h2.woocommerce-loop-product__title,#post_section figure.blog-list h3 a,.blog-content li figure.post-content h3{
           font-size:{$shopline_h3_font_size_mb}px;
           line-height:{$shopline_h3_line_height_mb}px;
           letter-spacing:{$shopline_h3_letter_spacing_mb}px; 
         };}";
/***********************************/
// h4-typography
/***********************************/
$shopline_h4_font = get_theme_mod( 'shopline_h4_font' );
$shopline_h4_font_size = get_theme_mod( 'shopline_h4_font_size','18' );
$shopline_h4_line_height = get_theme_mod( 'shopline_h4_line_height','35' );
$shopline_h4_letter_spacing = get_theme_mod( 'shopline_h3_letter_spacing','1' );
 if ( ! empty( $shopline_h4_font ) ) {
themehunk_enqueue_google_font($shopline_h4_font);
$shopline_style .="h4,.footer-widget-column .widget h4,.sidebar-inner-widget .widgettitle{ 
   font-family:{$shopline_h4_font};
   font-size:{$shopline_h4_font_size}px;
   line-height:{$shopline_h4_line_height}px;
   letter-spacing:{$shopline_h4_letter_spacing}px;
  }";
}
$shopline_h4_font_size_tb = get_theme_mod( 'shopline_h4_font_size_tb','18' );
$shopline_h4_line_height_tb = get_theme_mod( 'shopline_h4_line_height_tb','35' );
$shopline_h4_letter_spacing_tb = get_theme_mod( 'shopline_h4_letter_spacing_tb','1' );
$shopline_h4_font_size_mb = get_theme_mod( 'shopline_h4_font_size_mb','18' );
$shopline_h4_line_height_mb = get_theme_mod( 'shopline_h4_line_height_mb','35' );
$shopline_h4_letter_spacing_mb = get_theme_mod( 'shopline_h4_letter_spacing_mb','1' );
$shopline_style .="@media screen and (max-width: 768px){
  h4,.footer-widget-column .widget h4,.sidebar-inner-widget .widgettitle{
           font-size:{$shopline_h4_font_size_tb}px;
           line-height:{$shopline_h4_line_height_tb}px;
           letter-spacing:{$shopline_h4_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
 h4,.footer-widget-column .widget h4,.sidebar-inner-widget .widgettitle{
           font-size:{$shopline_h4_font_size_mb}px;
           line-height:{$shopline_h4_line_height_mb}px;
           letter-spacing:{$shopline_h4_letter_spacing_mb}px; 
         };}";        

/***********************************/
// h5-typography
/***********************************/
$shopline_h5_font = get_theme_mod( 'shopline_h5_font' );
$shopline_h5_font_size = get_theme_mod( 'shopline_h5_font_size','16' );
$shopline_h5_line_height = get_theme_mod( 'shopline_h5_line_height','35' );
$shopline_h5_letter_spacing = get_theme_mod( 'shopline_h5_letter_spacing','1' );
 if ( ! empty( $shopline_h5_font ) ) {
themehunk_enqueue_google_font($shopline_h5_font);
$shopline_style .="h5{ 
   font-family:{$shopline_h5_font};
   font-size:{$shopline_h5_font_size}px;
   line-height:{$shopline_h5_line_height}px;
   letter-spacing:{$shopline_h5_letter_spacing}px;
  }";
}
$shopline_h5_font_size_tb = get_theme_mod( 'shopline_h5_font_size_tb','16' );
$shopline_h5_line_height_tb = get_theme_mod( 'shopline_h5_line_height_tb','35' );
$shopline_h5_letter_spacing_tb = get_theme_mod( 'shopline_h5_letter_spacing_tb','1' );
$shopline_h5_font_size_mb = get_theme_mod( 'shopline_h5_font_size_mb','16' );
$shopline_h5_line_height_mb = get_theme_mod( 'shopline_h5_line_height_mb','35' );
$shopline_h5_letter_spacing_mb = get_theme_mod( 'shopline_h5_letter_spacing_mb','1' );
$shopline_style .="@media screen and (max-width: 768px){
  h5{
           font-size:{$shopline_h5_font_size_tb}px;
           line-height:{$shopline_h5_line_height_tb}px;
           letter-spacing:{$shopline_h5_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
 h5{
           font-size:{$shopline_h5_font_size_mb}px;
           line-height:{$shopline_h5_line_height_mb}px;
           letter-spacing:{$shopline_h5_letter_spacing_mb}px; 
         };}"; 
/***********************************/
// h6-typography
/***********************************/
$shopline_h6_font = get_theme_mod( 'shopline_h6_font' );
$shopline_h6_font_size = get_theme_mod( 'shopline_h6_font_size','14' );
$shopline_h6_line_height = get_theme_mod( 'shopline_h6_line_height','35' );
$shopline_h6_letter_spacing = get_theme_mod( 'shopline_h6_letter_spacing','1' );
 if ( ! empty( $shopline_h6_font ) ) {
themehunk_enqueue_google_font($shopline_h6_font);
$shopline_style .="h6{ 
   font-family:{$shopline_h6_font};
   font-size:{$shopline_h6_font_size}px;
   line-height:{$shopline_h6_line_height}px;
   letter-spacing:{$shopline_h6_letter_spacing}px;
  }";
}
$shopline_h6_font_size_tb = get_theme_mod( 'shopline_h6_font_size_tb','14' );
$shopline_h6_line_height_tb = get_theme_mod( 'shopline_h6_line_height_tb','35' );
$shopline_h6_letter_spacing_tb = get_theme_mod( 'shopline_h6_letter_spacing_tb','1' );
$shopline_h6_font_size_mb = get_theme_mod( 'shopline_h6_font_size_mb','14' );
$shopline_h6_line_height_mb = get_theme_mod( 'shopline_h6_line_height_mb','35' );
$shopline_h6_letter_spacing_mb = get_theme_mod( 'shopline_h6_letter_spacing_mb','1' );
$shopline_style .="@media screen and (max-width: 768px){
h6{
           font-size:{$shopline_h6_font_size_tb}px;
           line-height:{$shopline_h6_line_height_tb}px;
           letter-spacing:{$shopline_h6_letter_spacing_tb}px; 
         };}
@media screen and (max-width: 550px){
h6{
           font-size:{$shopline_h6_font_size_mb}px;
           line-height:{$shopline_h6_line_height_mb}px;
           letter-spacing:{$shopline_h6_letter_spacing_mb}px; 
         };}"; 
/***********************************/
// a-typography
/***********************************/
$shopline_a_font = get_theme_mod( 'shopline_a_font' );
 if ( ! empty( $shopline_a_font ) ) {
themehunk_enqueue_google_font($shopline_a_font);
$shopline_style .="a,.cat-grid .catli figure.cat-img figcaption p,.woocommerce #featured_product_section .featured-filter a.button,.lst-post figure.blog-list h3 a,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.single-post.woocommerce #commentform input#submit,.woocommerce div.product .woocommerce-tabs ul.tabs li a{ 
   font-family:{$shopline_a_font};
  }";
}
 echo "<style type='text/css'>".$shopline_style."</style>";
    }
  endif;
  
?>