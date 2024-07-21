<?php 
/**
 * Custom Style for Big StoreTheme.
 * @package     Big Store
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2021, Big Store
 * @since       Big Store1.0.0
 */
function big_store_custom_style(){
$big_store_style=""; 
$big_store_style.= big_store_responsive_slider_funct( 'big_store_logo_width', 'big_store_logo_width_responsive');

/**********************/
//Scheme Color
/**********************/
$big_store_color_scheme = esc_html(get_theme_mod('big_store_color_scheme','opn-light'));


/**************************/
// Above Header
/**************************/
    $big_store_above_brdr_clr = esc_html(get_theme_mod('big_store_above_brdr_clr','#fff'));  
    $big_store_style.=".top-header,body.big-store-dark .top-header{border-bottom-color:{$big_store_above_brdr_clr}}";
    $big_store_style.= big_store_responsive_slider_funct( 'big_store_abv_hdr_hgt', 'big_store_top_header_height_responsive');
    $big_store_style.= big_store_responsive_slider_funct( 'big_store_abv_hdr_botm_brd', 'big_store_abv_hdr_botm_brd_responsive');

/**************************/
// Above Fooetr
/**************************/
    $big_store_above_frt_brdr_clr = esc_html(get_theme_mod('big_store_above_frt_brdr_clr','#fff'));  
    $big_store_style.=".top-footer,body.big-store-dark .top-footer{border-bottom-color:{$big_store_above_frt_brdr_clr}}";
    $big_store_style.= big_store_responsive_slider_funct( 'big_store_above_ftr_hgt', 'big_store_top_footer_height_responsive');
    $big_store_style.= big_store_responsive_slider_funct( 'big_store_abv_ftr_botm_brd', 'big_store_top_footer_border_responsive');

/**************************/
// Below Fooetr
/**************************/
    $big_store_bottom_frt_brdr_clr = esc_html(get_theme_mod('big_store_bottom_frt_brdr_clr'));  
    $big_store_style.=".below-footer,body.big-store-dark .below-footer{border-top-color:{$big_store_bottom_frt_brdr_clr}}";
    $big_store_style.= big_store_responsive_slider_funct( 'big_store_btm_ftr_hgt', 'big_store_below_footer_height_responsive');
    $big_store_style.= big_store_responsive_slider_funct( 'big_store_btm_ftr_botm_brd', 'big_store_below_footer_border_responsive');
/*********************/
// Global Color Option
/*********************/ 
  $big_store_theme_clr = esc_html(get_theme_mod('big_store_theme_clr','#ffd200'));
  $big_store_style.="a:hover, .big-store-menu li a:hover, .big-store-menu .current-menu-item a,.top-header .top-header-bar .big-store-menu li a:hover, .top-header .top-header-bar  .big-store-menu .current-menu-item a,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,.header-icon a:hover,.thunk-related-links .nav-links a:hover,.woocommerce .thunk-list-view ul.products li.product.thunk-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,article.thunk-post-article .thunk-readmore.button,.thunk-wishlist a:hover, .thunk-compare a:hover,.woocommerce .thunk-product-hover a.th-button,.woocommerce ul.cart_list li .woocommerce-Price-amount, .woocommerce ul.product_list_widget li .woocommerce-Price-amount,.big-store-load-more button,.page-contact .leadform-show-form label,.thunk-contact-col .fa,.summary .yith-wcwl-wishlistaddedbrowse a, .summary .yith-wcwl-wishlistexistsbrowse a,.thunk-title .title:before,.thunk-hglt-icon,.woocommerce .thunk-product-content .star-rating,.thunk-product-cat-list.slider a:hover, .thunk-product-cat-list li a:hover,.site-title span a:hover,.cart-icon a span:hover,.thunk-product-list-section .thunk-list .thunk-product-content .woocommerce-LoopProduct-title:hover, .thunk-product-tab-list-section .thunk-list .thunk-product-content .woocommerce-LoopProduct-title:hover,.thunk-woo-product-list .woocommerce-loop-product__title a:hover,.mobile-nav-tab-category ul[data-menu-style='accordion'] li a:hover, .big-store-menu > li > a:hover, .top-header-bar .big-store-menu > li > a:hover, .bottom-header-bar .big-store-menu > li > a:hover, .big-store-menu li ul.sub-menu li a:hover,.header-support-content i,.slider-cat-title a:before,[type='submit'],.header-support-content a:hover,.mhdrthree .site-title span a:hover,.mobile-nav-bar .big-store-menu > li > a:hover,.woocommerce .widget_rating_filter ul li .star-rating,.woocommerce .star-rating::before,.woocommerce .widget_rating_filter ul li a,.search-close-btn,.woocommerce .thunk-single-product-summary-wrap .woocommerce-product-rating .star-rating,.woocommerce #alm-quick-view-modal .woocommerce-product-rating .star-rating,.summary .woosw-added:before,.thunk-product .woosw-btn.woosw-added, .woocommerce .entry-summary a.th-product-compare-btn.btn_type:before,.woocommerce .entry-summary a.th-product-compare-btn.th-added-compare:before, .woocommerce .entry-summary a.th-product-compare-btn.th-added-compare{color:{$big_store_theme_clr};}  .woocommerce a.remove:hover,.thunk-vertical-cat-tab .thunk-heading-wrap:before,.slide-layout-1 .slider-content-caption a.slide-btn{background:{$big_store_theme_clr}!important;} .widget_big_store_tabbed_product_widget .thunk-woo-product-list:hover .thunk-product,.woocommerce .entry-summary a.th-product-compare-btn.th-added-compare{border-color:{$big_store_theme_clr};}";

  $big_store_style.=".single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.cat-list a:after,.tagcloud a:hover, .thunk-tags-wrapper a:hover,.ribbon-btn,.btn-main-header,.page-contact .leadform-show-form input[type='submit'],.woocommerce .widget_price_filter .big-store-widget-content .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .big-store-widget-content .ui-slider .ui-slider-handle,.entry-content form.post-password-form input[type='submit'],#bigstore-mobile-bar a,#bigstore-mobile-bar,.post-slide-widget .owl-carousel .owl-nav button:hover,.woocommerce div.product form.cart .button,#search-button,#search-button:hover, .woocommerce ul.products li.product .button:hover,.slider-content-caption a.slide-btn,.page-template-frontpage .owl-carousel button.owl-dot, .woocommerce #alm-quick-view-modal .alm-qv-image-slider .flex-control-paging li a,.button.return.wc-backward,.button.return.wc-backward:hover,.woocommerce .thunk-product-hover a.th-button:hover,
.woocommerce .thunk-product-hover .thunk-wishlist a.add_to_wishlist:hover,
.thunk-wishlist .yith-wcwl-wishlistaddedbrowse:hover,
.thunk-wishlist .yith-wcwl-wishlistexistsbrowse:hover,
.thunk-quickview a:hover, .thunk-compare .compare-button a.compare.button:hover,
.thunk-woo-product-list .thunk-quickview a:hover,.woocommerce .thunk-product-hover a.th-button:hover,#alm-quick-view-modal .alm-qv-image-slider .flex-control-paging li a.flex-active,.menu-close-btn:hover:before, .menu-close-btn:hover:after,.cart-close-btn:hover:after,.cart-close-btn:hover:before,.cart-contents .count-item,[type='submit']:hover,.comment-list .reply a,.nav-links .page-numbers.current, .nav-links .page-numbers:hover,.woocommerce .thunk-product-image-tab-section .thunk-product-hover a.th-button:hover,.woocommerce .thunk-product-slide-section .thunk-product-hover a.th-button:hover,.woocommerce .thunk-compare .compare-button a.compare.button:hover,.thunk-product .woosw-btn:hover,.thunk-product .wooscp-btn:hover,.woosw-copy-btn input{background:{$big_store_theme_clr}}
  .open-cart p.buttons a:hover,
  .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .big-store-slide-post .owl-nav button.owl-prev:hover, .big-store-slide-post .owl-nav button.owl-next:hover,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type='submit']:hover,article.thunk-post-article .thunk-readmore.button:hover,.big-store-load-more button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,.thunk-heading-wrap:before,.woocommerce ul.products li.product .thunk-product-hover a.th-button:hover{background-color:{$big_store_theme_clr};} 
  .thunk-product-hover .th-button.th-button, .woocommerce ul.products .thunk-product-hover .th-button, .woocommerce .thunk-product-hover a.th-butto, .woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.open-cart p.buttons a:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .big-store-slide-post .owl-nav button.owl-prev:hover, .big-store-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type='submit']:hover,article.thunk-post-article .thunk-readmore.button,.woocommerce .thunk-product-hover a.th-button,.big-store-load-more button,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,.page-contact .leadform-show-form input[type='submit'],.woocommerce .thunk-product-hover a.product_type_simple,.post-slide-widget .owl-carousel .owl-nav button:hover{border-color:{$big_store_theme_clr}} .loader {
    border-right: 4px solid {$big_store_theme_clr};
    border-bottom: 4px solid {$big_store_theme_clr};
    border-left: 4px solid {$big_store_theme_clr};}
    .woocommerce .thunk-product-image-cat-slide .thunk-woo-product-list:hover .thunk-product,.woocommerce .thunk-product-image-cat-slide .thunk-woo-product-list:hover .thunk-product,[type='submit']{border-color:{$big_store_theme_clr}} .big-store-off-canvas-sidebar-wrapper .menu-close-btn:hover,.main-header .cart-close-btn:hover{color:{$big_store_theme_clr};}";
   //text
   $big_store_text_clr = esc_html(get_theme_mod('big_store_text_clr'));
   $big_store_style.="body,.woocommerce-error, .woocommerce-info, .woocommerce-message {color: {$big_store_text_clr}}";
   //title
   $big_store_title_clr = esc_html(get_theme_mod('big_store_title_clr'));
   $big_store_style.=".site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a{color: {$big_store_title_clr}}";
   //link
   $big_store_link_clr = esc_html(get_theme_mod('big_store_link_clr'));
   $big_store_link_hvr_clr = esc_html(get_theme_mod('big_store_link_hvr_clr'));
   $big_store_style.="a,#open-above-menu.big-store-menu > li > a{color:{$big_store_link_clr}} #open-above-menu.big-store-menu > li > a:hover,#open-above-menu.big-store-menu li a:hover{color:{$big_store_link_hvr_clr}}";

  // loader
   $big_store_loader_bg_clr = esc_html(get_theme_mod('big_store_loader_bg_clr','#9c9c9'));
   $big_store_style.=".big_store_overlayloader{background-color:{$big_store_loader_bg_clr}}";
  

//Move to top 
$big_store_move_to_top_bg_clr      = esc_html(get_theme_mod('big_store_move_to_top_bg_clr'));
$big_store_move_to_top_icon_clr    = esc_html(get_theme_mod('big_store_move_to_top_icon_clr'));
$big_store_style.="#move-to-top{background:{$big_store_move_to_top_bg_clr};color:{$big_store_move_to_top_icon_clr}}";

// Slider BG 
   $big_store_lay3_bg_img_ovrly = esc_html(get_theme_mod('big_store_lay3_bg_img_ovrly','#eaeaea'));
   $big_store_lay3_bg_background_image_url          = esc_url(get_theme_mod('big_store_lay3_bg_background_image_url',''));
   
   $big_store_lay3_bg_background_repeat         = esc_html(get_theme_mod('big_store_lay3_bg_background_repeat','no-repeat'));
   $big_store_lay3_bg_background_position       = esc_html(get_theme_mod('big_store_lay3_bg_background_position','center center'));
   $big_store_lay3_bg_background_size           = esc_html(get_theme_mod('big_store_lay3_bg_background_size','auto'));
   $big_store_lay3_bg_background_attach         = esc_html(get_theme_mod('big_store_lay3_bg_background_attach','scroll'));
   $big_store_style.=".thunk-slider-section.slide-layout-3:before{background:{$big_store_lay3_bg_img_ovrly}}";
   $big_store_style.=".thunk-slider-section.slide-layout-3{background-image:url($big_store_lay3_bg_background_image_url);
    background-repeat:{$big_store_lay3_bg_background_repeat};
    background-position:{$big_store_lay3_bg_background_position};
    background-size:{$big_store_lay3_bg_background_size};
    background-attachment:{$big_store_lay3_bg_background_attach};}";

    // ribbon
    $big_store_ribbon_bg_img_url          = esc_url(get_theme_mod('big_store_ribbon_bg_img_url',''));
    $big_store_ribbon_bg_background_repeat        = esc_html(get_theme_mod('big_store_ribbon_bg_background_repeat','no-repeat'));
   $big_store_ribbon_bg_background_position       = esc_html(get_theme_mod('big_store_ribbon_bg_background_position','center center'));
   $big_store_ribbon_bg_background_size           = esc_html(get_theme_mod('big_store_ribbon_bg_background_size','auto'));
   $big_store_ribbon_bg_background_attach         = esc_html(get_theme_mod('big_store_ribbon_bg_background_attach','scroll'));
   
   $big_store_style.="section.thunk-ribbon-section{background-image:url($big_store_ribbon_bg_img_url);
    background-repeat:{$big_store_ribbon_bg_background_repeat};
    background-position:{$big_store_ribbon_bg_background_position};
    background-size:{$big_store_ribbon_bg_background_size};
    background-attachment:{$big_store_ribbon_bg_background_attach};}";


  /**************************/
  //Above Header Color Option
  /**************************/
   $big_store_above_hd_bg_clr = esc_html(get_theme_mod('big_store_above_hd_bg_clr','#1f4c94'));
   $big_store_abv_header_background_image = esc_html( get_theme_mod('header_image'));
   $big_store_style.=".top-header:before{background:{$big_store_above_hd_bg_clr}}";
   $big_store_style.= ".top-header{background-image:url($big_store_abv_header_background_image);
   }";
   
    $big_store_abv_content_txt_clr = esc_html(get_theme_mod('big_store_abv_content_txt_clr','#fff'));
    $big_store_abv_content_link_clr = esc_html(get_theme_mod('big_store_abv_content_link_clr','#fff'));
    $big_store_style.= ".top-header .top-header-bar{color:{$big_store_abv_content_txt_clr}} .top-header .top-header-bar a{color:{$big_store_abv_content_link_clr}}";

  /**************************/
  //Main Header Color Option
  /**************************/
   $big_store_main_hd_bg_clr = esc_html(get_theme_mod('big_store_main_hd_bg_clr','#2457AA'));
   $big_store_main_content_txt_clr = esc_html(get_theme_mod('big_store_main_content_txt_clr','#fff'));
   $big_store_main_content_link_clr = esc_html(get_theme_mod('big_store_main_content_link_clr','#fff'));
   $big_store_style.=".main-header:before,.sticky-header:before, .search-wrapper:before{background:{$big_store_main_hd_bg_clr}}
    .site-description,main-header-col1,.header-support-content,.mhdrthree .site-description p{color:{$big_store_main_content_txt_clr}} .mhdrthree .site-title span a,.header-support-content a, .thunk-icon .count-item,.main-header a,.thunk-icon .cart-icon a.cart-contents,.sticky-header .site-title a {color:{$big_store_main_content_link_clr}}";


  /**************************/
  //Below Header Color Option
  /**************************/
   $big_store_below_hd_bg_clr = esc_html(get_theme_mod('big_store_below_hd_bg_clr','#1f4c94'));
   $big_store_category_text_clr = esc_html(get_theme_mod('big_store_category_text_clr',''));
   $big_store_category_icon_clr = esc_html(get_theme_mod('big_store_category_icon_clr',''));
   $big_store_style.=".below-header:before{background:{$big_store_below_hd_bg_clr}}
      .menu-category-list .toggle-title,.toggle-icon{color:{$big_store_category_text_clr}}
      .below-header .cat-icon span{background:{$big_store_category_icon_clr}}
   ";

  /**************************/
  //Header Square Icon Option
  /**************************/
   $big_store_sq_icon_bg_clr = esc_html(get_theme_mod('big_store_sq_icon_bg_clr','#1f4c94'));
   $big_store_sq_icon_clr = esc_html(get_theme_mod('big_store_sq_icon_clr','#fff'));
   $big_store_style.=".header-icon a ,.header-support-icon a.whishlist, .thunk-icon .cart-icon a.cart-contents i,.cat-icon,.sticky-header .header-icon a , .sticky-header .thunk-icon .cart-icon a.cart-contents,.responsive-main-header .header-support-icon a,.responsive-main-header .thunk-icon .cart-icon a.cart-contents,.responsive-main-header .menu-toggle .menu-btn,.sticky-header-bar .menu-toggle .menu-btn,.header-icon a.account,.header-icon a.prd-search .header-support-icon a.compare i {background:{$big_store_sq_icon_bg_clr};color:{$big_store_sq_icon_clr};} 
    .header-support-icon a.whishlist i {color:{$big_store_sq_icon_clr}!important;}
    .cat-icon span,.menu-toggle .icon-bar{background:{$big_store_sq_icon_clr};}.thunk-icon .taiowcp-icon ,.header-support-icon .taiowcp-icon .th-icon, .header-support-icon .taiowc-icon .th-icon, .sticky-header-col3 .taiowcp-icon .th-icon, .sticky-header-col3 .taiowc-icon .th-icon, .taiowcp-content .taiowcp-total, .taiowc-content .taiowcp-total,.header-support-icon a.whishlist span, .header-support-icon a.compare span{color:{$big_store_sq_icon_clr};} .thunk-icon .taiowcp-content .taiowcp-total,.thunk-icon .taiowc-content .taiowc-total,.header-icon a, .sticky-header-col3 .header-icon a, .sticky-header-col3 .header-icon a.prd-search-icon > .tapsp-search-box > .th-icon, .header-icon a.prd-search-icon > .thaps-search-box > .th-icon,.sticky-header-col3 .header-icon a.prd-search-icon > .thaps-search-box > .th-icon,.header-icon a.prd-search-icon > .tapsp-search-box > .th-icon,.responsive-main-header .taiowcp-icon .th-icon, .responsive-main-header .taiowc-icon .th-icon{color:{$big_store_sq_icon_clr};} .thunk-icon .taiowcp-icon, .thunk-icon .taiowcp-cart-item,.header-icon a, .sticky-header-col3 .header-icon a, .sticky-header-col3 .header-icon a.prd-search-icon > .tapsp-search-box > .th-icon, .sticky-header-col3 .header-icon a.prd-search-icon > .thaps-search-box > .th-icon,.header-icon a.prd-search-icon > .tapsp-search-box > .th-icon,.header-support-icon .taiowc-cart-item,.header-support-icon .taiowcp-cart-item, .header-support-icon .taiowc-cart-item, .sticky-header-col3 .taiowc-cart-item, .sticky-header-col3 .taiowcp-cart-item,.responsive-main-header .taiowcp-cart-item, .responsive-main-header .taiowc-cart-item,.header-icon a.prd-search-icon > .thaps-search-box > .th-icon{background:{$big_store_sq_icon_bg_clr};}";

  /**************************/
  //Main Menu
  /**************************/
  $big_store_menu_link_clr = esc_html(get_theme_mod('big_store_menu_link_clr'));
  $big_store_menu_link_hvr_clr = esc_html(get_theme_mod('big_store_menu_link_hvr_clr'));
  $big_store_style.=".big-store-menu > li > a,.menu-category-list .toggle-title,.toggle-icon{color:{$big_store_menu_link_clr}} .big-store-menu > li > a:hover,.big-store-menu .current-menu-item a{color:{$big_store_menu_link_hvr_clr}}";

  $big_store_sub_menu_bg_clr      = esc_html(get_theme_mod('big_store_sub_menu_bg_clr'));
  $big_store_sub_menu_lnk_clr     = esc_html(get_theme_mod('big_store_sub_menu_lnk_clr'));
  $big_store_sub_menu_lnk_hvr_clr = esc_html(get_theme_mod('big_store_sub_menu_lnk_hvr_clr'));
  $big_store_style.=".big-store-menu li ul.sub-menu li a{color:{$big_store_sub_menu_lnk_clr}} .big-store-menu li ul.sub-menu li a:hover{color:{$big_store_sub_menu_lnk_hvr_clr}}   .big-store-menu ul.sub-menu{background:{$big_store_sub_menu_bg_clr}}";
if((bool)get_theme_mod('big_store_shadow_header')==true){
$big_store_style.="header{
    box-shadow: 0 .125rem .3rem -.0625rem rgba(0,0,0,.03),0 .275rem .75rem -.0625rem rgba(0,0,0,.06)!important;
position: relative;
 }";
}
//Product title in single line
$big_store_color_scheme = (bool)get_theme_mod('big_store_prdct_single',true);
if($big_store_color_scheme==false){
   $big_store_style.=".thunk-woo-product-list .woocommerce-loop-product__title {
    overflow: hidden;
    text-overflow: inherit;
    display: inherit;
    -webkit-box-orient: inherit;
    -webkit-line-clamp: inherit;
    line-height: 24px;
    max-height: inherit;}";
}

//tooltip bg color and text color

$big_store_tooltip_bg_clr = esc_html(get_theme_mod('big_store_tooltip_bg_clr'));
$big_store_tooltip_text_clr = esc_html(get_theme_mod('big_store_tooltip_text_clr'));
$big_store_style.=".tooltip-show-with-title{background-color:{$big_store_tooltip_bg_clr}}
        .tooltip-show-with-title{color:{$big_store_tooltip_text_clr}}
        .tooltip-show-with-title{border:{$big_store_tooltip_bg_clr}}
        .tooltip-show-with-title .pointer_{fill:{$big_store_tooltip_bg_clr}}
      .span.th-ttt {color:{$big_store_tooltip_text_clr}}";



//Hide yith if WPC SMART Icon 

if( (class_exists( 'YITH_WCWL' )) ){
$big_store_style.=" .woocommerce .entry-summary .woosw-btn{
  display:none;
}";
}elseif((class_exists( 'WPCleverWoosw' ))){
$big_store_style.=" .woocommerce .entry-summary .yith-wcwl-add-to-wishlist{
  display:none;
}";
}

if( (class_exists( 'YITH_Woocompare' )) ){
$big_store_style.=" .woocommerce .entry-summary .woosc-btn, .woocommerce-shop .woosc-btn{
  display:none;
}";
}elseif((class_exists( 'WPCleverWoosc' ))){
$big_store_style.=" .woocommerce .entry-summary a.compare.button{
  display:none;
}";
}

  return $big_store_style;
}

//start logo width
function big_store_logo_width_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.thunk-logo img,.sticky-header .logo-content img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
// top header height
function big_store_top_header_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header .top-header-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function big_store_abv_hdr_botm_brd_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// top footer height
function big_store_top_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer .top-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function big_store_top_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// below footer height
function big_store_below_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer .below-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function big_store_below_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer{
    border-top-width: ' . $v3 . 'px;
  }';
  $custom_css = big_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}