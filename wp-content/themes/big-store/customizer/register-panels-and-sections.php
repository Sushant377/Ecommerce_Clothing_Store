<?php
/**
 * Register customizer panels & sections.
 */
/*************************/
/*WordPress Default Panel*/
/*************************/
/**
 * Category Section Customizer Settings
 */
if(!function_exists('big_store_get_category_list')){
function big_store_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->slug] = $category->name;
     }
     return $cats;
  }
}

$big_store_shop_panel_default = new Big_Store_WP_Customize_Panel( $wp_customize,'big-store-panel-default', array(
    'priority' => 1,
    'title'    => __( 'WordPress Default', 'big-store' ),
  ));
$wp_customize->add_panel($big_store_shop_panel_default);
$wp_customize->get_section( 'title_tagline' )->panel = 'big-store-panel-default';
$wp_customize->get_section( 'static_front_page' )->panel = 'big-store-panel-default';
$wp_customize->get_section( 'custom_css' )->panel = 'big-store-panel-default';

$wp_customize->add_setting('big_store_home_page_setup', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_home_page_setup',
            array(
        'section'    => 'static_front_page',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#homepage-setting',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));
/************************/
// Background option
/************************/
$big_store_shop_bg_option = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-bg-option', array(
    'title' =>  __( 'Background', 'big-store' ),
    'panel' => 'big-store-panel-default',
    'priority' => 10,
  ));
$wp_customize->add_section($big_store_shop_bg_option);

/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'big-store-panel-layout', array(
				'priority' => 3,
				'title'    => __( 'Layout', 'big-store' ),
) );

// Header
$big_store_section_header_group = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-section-header-group', array(
    'title' =>  __( 'Header', 'big-store' ),
    'panel' => 'big-store-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section( $big_store_section_header_group );

// above-header
$big_store_above_header = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-above-header', array(
    'title'    => __( 'Above Header', 'big-store' ),
    'panel'    => 'big-store-panel-layout',
        'section'  => 'big-store-section-header-group',
        'priority' => 3,
  ));
$wp_customize->add_section( $big_store_above_header );
// main-header
$big_store_shop_main_header = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-main-header', array(
    'title'    => __( 'Main Header', 'big-store' ),
    'panel'    => 'big-store-panel-layout',
    'section'  => 'big-store-section-header-group',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_shop_main_header );

// exclude category
$big_store_exclde_cat_header = new  Big_Store_WP_Customize_Section( $wp_customize, 'big_store_exclde_cat_header', array(
    'title'    => __( 'Exclude Category', 'big-store' ),
    'panel'    => 'big-store-panel-layout',
    'section'  => 'big-store-section-header-group',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_exclde_cat_header );

//blog
$big_store_section_blog_group = new  Big_Store_WP_Customize_Section( $wp_customize,'big-store-section-blog-group', array(
    'title' =>  __( 'Blog', 'big-store' ),
    'panel' => 'big-store-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($big_store_section_blog_group);

$big_store_section_footer_group = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-section-footer-group', array(
    'title' =>  __( 'Footer', 'big-store' ),
    'panel' => 'big-store-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $big_store_section_footer_group);
// sidebar
$big_store_section_sidebar_group = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'big-store' ),
    'panel' => 'big-store-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($big_store_section_sidebar_group);
// Scroll to top
$big_store_move_to_top = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-move-to-top', array(
    'title' =>  __( 'Move To Top (Pro)', 'big-store' ),
    'panel' => 'big-store-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($big_store_move_to_top);
//above-footer
$big_store_above_footer = new  Big_Store_WP_Customize_Section( $wp_customize, 'big-store-above-footer',array(
    'title'    => __( 'Above Footer','big-store' ),
    'panel'    => 'big-store-panel-layout',
        'section'  => 'big-store-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $big_store_above_footer);
//widget footer
$big_store_shop_widget_footer = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-widget-footer', array(
    'title'    => __('Widget Footer','big-store'),
    'panel'    => 'big-store-panel-layout',
    'section'  => 'big-store-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $big_store_shop_widget_footer);
//Bottom footer
$big_store_shop_bottom_footer = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-bottom-footer', array(
    'title'    => __('Below Footer','big-store'),
    'panel'    => 'big-store-panel-layout',
    'section'  => 'big-store-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $big_store_shop_bottom_footer);
// rtl
$big_store_rtl = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-rtl', array(
    'title' =>  __( 'RTL', 'big-store' ),
    'panel' => 'big-store-panel-layout',
    'priority' => 6,
));
$wp_customize->add_section($big_store_rtl);
/*************************/
/* Preloader */
/*************************/
$wp_customize->add_section( 'big-store-pre-loader' , array(
    'title'      => __('Preloader','big-store'),
    'priority'   => 30,
) );
/*************************/
/* Social   Icon*/
/*************************/
$big_store_social_header = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-social-icon', array(
    'title'    => __( 'Social Icon', 'big-store' ),
    'priority' => 30,
  ));
$wp_customize->add_section( $big_store_social_header );
/*************************/
/* Frontpage Panel */
/*************************/
$wp_customize->add_panel( 'big-store-panel-frontpage', array(
                'priority' => 5,
                'title'    => __( 'Frontpage Sections', 'big-store' ),
) );

$big_store_top_slider_section = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_top_slider_section', array(
    'title'    => __( 'Top Slider', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_top_slider_section );

$big_store_category_tab_section = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_category_tab_section', array(
    'title'    => __( 'Tabbed Product Carousel', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_category_tab_section );



$big_store_cat_slide_section = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_cat_slide_section', array(
    'title'    => __( 'Woo Category', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_cat_slide_section );
$big_store_product_tab_image = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_product_tab_image', array(
    'title'    => __( 'Product Tab Image Carousel', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_product_tab_image );
// ribbon
$big_store_ribbon = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_ribbon', array(
    'title'    => __( 'Ribbon', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_ribbon );

$big_store_product_slide_section = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_product_slide_section', array(
    'title'    => __( 'Product Carousel', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_product_slide_section );

$big_store_banner = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_banner', array(
    'title'    => __( 'Banner', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_banner );

$big_store_product_slide_list = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_product_slide_list', array(
    'title'    => __( 'Product List Carousel', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_product_slide_list );



$big_store_highlight = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_highlight', array(
    'title'    => __( 'Highlight', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_highlight );

$big_store_brand = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_brand', array(
    'title'    => __( 'Brand', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_brand );

$big_store_product_big_feature = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_product_big_feature', array(
    'title'    => __( 'Big Featured Product', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_product_big_feature );
$big_store_product_cat_list = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_product_cat_list', array(
    'title'    => __( 'Tabbed Product List Carousel', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_product_cat_list );
$big_store_1_custom_sec = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_1_custom_sec', array(
    'title'    => __( 'First Custom Section', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_1_custom_sec );

$big_store_2_custom_sec = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_2_custom_sec', array(
    'title'    => __( 'Second Custom Section', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_2_custom_sec );

$big_store_3_custom_sec = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_3_custom_sec', array(
    'title'    => __( 'Third Custom Section', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_3_custom_sec );

$big_store_4_custom_sec = new Big_Store_WP_Customize_Section( $wp_customize, 'big_store_4_custom_sec', array(
    'title'    => __( 'Fourth Custom Section', 'big-store' ),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $big_store_4_custom_sec );
//section ordering
$big_store_section_order = new Big_Store_WP_Customize_Section($wp_customize,'big-store-section-order', array(
    'title'    => __('Section Ordering', 'big-store'),
    'panel'    => 'big-store-panel-frontpage',
    'priority' => 6,
));
$wp_customize->add_section($big_store_section_order);
/******************/
// Color Option
/******************/
$wp_customize->add_panel( 'big-store-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Total Color & BG Options', 'big-store' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('big-store-gloabal-color', array(
    'title'    => __('Global Colors', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 1,
));
//header
$big_store_header_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-header-color', array(
    'title'    => __('Header', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_header_color );
$big_store_abv_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-abv-header-clr', array(
    'title'    => __('Above Header','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_abv_header_clr);

$big_store_main_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-main-header-clr', array(
    'title'    => __('Main Header','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 2,
));
$wp_customize->add_section( $big_store_main_header_clr);

$big_store_below_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-below-header-clr', array(
    'title'    => __('Below Header','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 3,
));
$wp_customize->add_section( $big_store_below_header_clr);

$big_store_icon_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-icon-header-clr', array(
    'title'    => __('Square Icon','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 4,
));
$wp_customize->add_section( $big_store_icon_header_clr);
$big_store_menu_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-menu-header-clr', array(
    'title'    => __('Main Menu','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 4,
));
$wp_customize->add_section( $big_store_menu_header_clr);

$big_store_sticky_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-sticky-header-clr', array(
    'title'    => __('Sticky Header','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 2,
));
$wp_customize->add_section($big_store_sticky_header_clr);


$big_store_mobile_pan_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-mobile-pan-clr', array(
    'title'    => __('Mobile','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 2,
));
$wp_customize->add_section($big_store_mobile_pan_clr);

$big_store_canvas_pan_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-canvas-pan-clr', array(
    'title'    => __('Off Canvas Sidebar','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-header-color',
    'priority' => 2,
));
$wp_customize->add_section($big_store_canvas_pan_clr);

$big_store_main_header_header_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-main-header-header-clr', array(
    'title'    => __('Header','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-main-header-clr',
    'priority' => 2,
));
$wp_customize->add_section($big_store_main_header_header_clr);

// main-menu
$big_store_main_header_menu_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-main-header-menu-clr', array(
    'title'    => __('Main Menu','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-main-header-clr',
    'priority' => 2,
));
$wp_customize->add_section($big_store_main_header_menu_clr);

// header category
$big_store_main_header_cat_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-main-header-cat-clr', array(
    'title'    => __('Category','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-main-header-clr',
    'priority' => 3,
));
$wp_customize->add_section($big_store_main_header_cat_clr);
// header search
$big_store_main_header_srch_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-main-header-srch-clr', array(
    'title'    => __('Search','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-main-header-clr',
    'priority' => 4,
));
$wp_customize->add_section($big_store_main_header_srch_clr);
//Shop Icon
$big_store_main_header_shp_icon = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-main-header-shp-icon', array(
    'title'    => __('Shop Icon','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-main-header-clr',
    'priority' => 5,
));
$wp_customize->add_section($big_store_main_header_shp_icon);
/****************/
//Sidebar
/****************/
$big_store_sidebar_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-sidebar-color', array(
    'title'    => __('Sidebar', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_sidebar_color );
/****************/
//footer
/****************/
$big_store_footer_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-footer-color', array(
    'title'    => __('Footer', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_footer_color );

$big_store_abv_footer_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-abv-footer-clr', array(
    'title'    => __('Above Footer','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-footer-color',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_abv_footer_clr);

$big_store_footer_widget_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-footer-widget-clr', array(
    'title'    => __('Footer Widget','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-footer-color',
    'priority' => 2,
));
$wp_customize->add_section($big_store_footer_widget_clr);

$big_store_btm_footer_clr = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-btm-footer-clr', array(
    'title'    => __('Bottom Footer','big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-footer-color',
    'priority' => 3,
));
$wp_customize->add_section( $big_store_btm_footer_clr);

/****************/
//Woocommerce color
/****************/
$big_store_woo_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-woo-color', array(
    'title'    => __('Woocommerce', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 6,
));
$wp_customize->add_section( $big_store_woo_color );
// product
$big_store_woo_prdct_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-woo-prdct-color', array(
    'title'    => __('Product', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-woo-color',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_woo_prdct_color );
// shopping cart
$big_store_woo_cart_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-woo-cart-color', array(
    'title'    => __('Shopping Cart', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-woo-color',
    'priority' => 1,
));
$wp_customize->add_section( $big_store_woo_cart_color );

// sale
$big_store_woo_prdct_sale_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-woo-prdct-sale-color', array(
    'title'    => __('Sale Badge', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-woo-color',
    'priority' => 2,
));
$wp_customize->add_section( $big_store_woo_prdct_sale_color );
// single product
$big_store_woo_prdct_single_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-woo-prdct-single-color', array(
    'title'    => __('Single Product', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-woo-color',
    'priority' => 3,
));
$wp_customize->add_section( $big_store_woo_prdct_single_color );

/*************************/
// Frontpage
/*************************/
$big_store_front_page_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-front-page-color', array(
    'title'    => __('Frontpage', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 4,
));
$wp_customize->add_section($big_store_front_page_color);

$big_store_top_slider_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-top-slider-color', array(
    'title'    => __('Top Slider', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 1,
));
$wp_customize->add_section($big_store_top_slider_color);

$big_store_cat_slider_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-cat-slider-color', array(
    'title'    => __('Woo Category', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 2,
));
$wp_customize->add_section($big_store_cat_slider_color);

$big_store_product_slider_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-product-slider-color', array(
    'title'    => __('Product Carousel', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 3,
));
$wp_customize->add_section($big_store_product_slider_color);

$big_store_product_cat_slide_tab_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-product-cat-slide-tab-color', array(
    'title'    => __('Tabbed Product Carousel', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 3,
));
$wp_customize->add_section($big_store_product_cat_slide_tab_color);

$big_store_product_list_slide_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-product-list-slide-color', array(
    'title'    => __('Product List Carousel', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 4,
));
$wp_customize->add_section($big_store_product_list_slide_color);

$big_store_product_list_tab_slide_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-product-list-tab-slide-color', array(
    'title'    => __('Tabbed Product List Carousel', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 5,
));
$wp_customize->add_section($big_store_product_list_tab_slide_color);

$big_store_banner_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-banner-color', array(
    'title'    => __('Banner', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_banner_color);

$big_store_ribbon_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-ribbon-color', array(
    'title'    => __('Ribbon', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_ribbon_color);

$big_store_brand_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-brand-color', array(
    'title'    => __('Brand', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_brand_color);

$big_store_highlight_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-highlight-color', array(
    'title'    => __('Highlight', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_highlight_color);
$big_store_tabimgprd_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-tabimgprd-color', array(
    'title'    => __('Product Tab Image', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_tabimgprd_color);
$big_store_big_featured_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-big-featured-color', array(
    'title'    => __('Big Featured Product', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_big_featured_color);
/****************/
//custom section
/****************/
$big_store_custom_one_color = new Big_Store_WP_Customize_Section($wp_customize,'big-store-custom-one-color', array(
    'title'    => __('Custom Section', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_custom_one_color);

$big_store_custom_two_color = new Big_Store_WP_Customize_Section($wp_customize,'big-store-custom-two-color', array(
    'title'    => __('Custom Section Two', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_custom_two_color);

$big_store_custom_three_color = new Big_Store_WP_Customize_Section($wp_customize,'big-store-custom-three-color', array(
    'title'    => __('Custom Section Three', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_custom_three_color);


$big_store_custom_four_color = new Big_Store_WP_Customize_Section($wp_customize,'big-store-custom-four-color', array(
    'title'    => __('Custom Section Four', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'section'  => 'big-store-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($big_store_custom_four_color);

// pan color
$big_store_pan_color = new  Big_Store_WP_Customize_Section($wp_customize,'big-store-pan-color', array(
    'title'    => __('Pan / Mobile Menu Color', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 5,
));
$wp_customize->add_section( $big_store_pan_color);
/*********************/
// Page Content Color
/*********************/
$big_store_custom_page_content_color = new Big_Store_WP_Customize_Section($wp_customize,'big-store-page-content-color', array(
    'title'    => __('Content Color', 'big-store'),
    'panel'    => 'big-store-panel-color-background',
    'priority' => 2,
));
$wp_customize->add_section($big_store_custom_page_content_color);
/******************/
// Shop Page
/******************/
$big_store_woo_shop = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-woo-shop', array(
    'title'    => __( 'Product Style', 'big-store' ),
     'panel'    => 'woocommerce',
     'priority' => 2,
));
$wp_customize->add_section( $big_store_woo_shop );

$big_store_woo_single_product = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-woo-single-product', array(
    'title'    => __( 'Single Product', 'big-store' ),
     'panel'    => 'woocommerce',
     'priority' => 3,
));
$wp_customize->add_section($big_store_woo_single_product );

$big_store_woo_cart_page = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-woo-cart-page', array(
    'title'    => __( 'Cart Page', 'big-store' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($big_store_woo_cart_page);

$big_store_woo_shop_page = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-woo-shop-page', array(
    'title'    => __( 'Shop Page', 'big-store' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($big_store_woo_shop_page);


$big_store_woo_tooltip_page = new Big_Store_WP_Customize_Section( $wp_customize, 'big-store-woo-tooltip-page', array(
    'title'    => __( 'Tooltip Option', 'big-store' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($big_store_woo_tooltip_page);