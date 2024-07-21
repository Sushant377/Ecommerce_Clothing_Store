<?php
/**
 * Header Function for big store theme.
 * 
 * @package     big store
 * @author      big store
 * @copyright   Copyright (c) 2019, big store
 * @since       big store 1.0.0
 */
/**************************************/
//Top Header function
/**************************************/

if (!function_exists('big_store_top_header_markup')) {
  function big_store_top_header_markup()
  {
    $big_store_above_header_layout     = get_theme_mod('big_store_above_header_layout', 'abv-two');
    $big_store_above_header_col1_set   = get_theme_mod('big_store_above_header_col1_set', 'text');
    $big_store_above_header_col2_set   = get_theme_mod('big_store_above_header_col2_set', 'social');
    $big_store_above_header_col3_set   = get_theme_mod('big_store_above_header_col3_set', 'text');
    $big_store_menu_open = get_theme_mod('big_store_mobile_menu_open', 'left');
    if ($big_store_above_header_layout !== 'abv-none') : ?>
      <div class="top-header">
        <div class="container">
          <?php if ($big_store_above_header_layout == 'abv-three') { ?>
            <div class="top-header-bar thnk-col-3">
              <div class="top-header-col1">
                <?php big_store_top_header_conetnt_col1($big_store_above_header_col1_set, $big_store_menu_open); ?>
              </div>
              <div class="top-header-col2">
                <?php big_store_top_header_conetnt_col2($big_store_above_header_col2_set, $big_store_menu_open); ?>
              </div>
              <div class="top-header-col3">
                <?php big_store_top_header_conetnt_col3($big_store_above_header_col3_set, $big_store_menu_open); ?>
              </div>
            </div>
          <?php } ?>
          <?php if ($big_store_above_header_layout == 'abv-two') { ?>
            <div class="top-header-bar thnk-col-2">
              <div class="top-header-col1">
                <?php big_store_top_header_conetnt_col1($big_store_above_header_col1_set, $big_store_menu_open); ?>
              </div>
              <div class="top-header-col2">
                <?php big_store_top_header_conetnt_col2($big_store_above_header_col2_set, $big_store_menu_open); ?>
              </div>
            </div>
          <?php } ?>
          <?php if ($big_store_above_header_layout == 'abv-one') {
          ?>
            <div class="top-header-bar thnk-col-1">
              <div class="top-header-col1">
                <?php big_store_top_header_conetnt_col1($big_store_above_header_col1_set, $big_store_menu_open); ?>
              </div>
            </div>
          <?php } ?>
          <!-- end top-header-bar -->
        </div>
      </div>
    <?php endif;
  }
}
add_action('big_store_top_header', 'big_store_top_header_markup');



//************************************/
// Top header col1 function
//************************************/
if (!function_exists('big_store_top_header_conetnt_col1')) {
  function big_store_top_header_conetnt_col1($content, $mobileopen)
  { ?>
    <?php if ($content == 'text') { ?>
      <div class='content-html'>
        <?php echo esc_html(get_theme_mod('big_store_col1_texthtml',  __('Add your content here', 'big-store'))); ?>
      </div>
      <?php } elseif ($content == 'menu') {
      if (has_nav_menu('big-store-above-menu')) { ?>
        <!-- Menu Toggle btn-->
        <nav>
          <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
              <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </div>
            </button>
          </div>
          <div class="sider above big-store-menu-hide  <?php echo esc_attr($mobileopen); ?>">
            <div class="sider-inner">
              <?php big_store_abv_nav_menu(); ?>
            </div>
          </div>
        </nav>
      <?php
      } else { ?>
        <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e('Assign Above header menu', 'big-store'); ?></a>
      <?php }
    } elseif ($content == 'widget') { ?>
      <div class="content-widget">
        <?php if (is_active_sidebar('top-header-widget-col1')) {
          dynamic_sidebar('top-header-widget-col1');
        } else { ?>
          <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Add Widget', 'big-store'); ?></a>
        <?php } ?>
      </div>
    <?php } elseif ($content == 'social') { ?>
      <div class="content-social">
        <?php echo big_store_social_links(); ?>
      </div>
    <?php } elseif ($content == 'none') {
      return true;
    } ?>
  <?php }
}
//************************************/
// top header col2 function
//************************************/
if (!function_exists('big_store_top_header_conetnt_col2')) {
  function big_store_top_header_conetnt_col2($content, $mobileopen)
  { ?>
    <?php if ($content == 'text') { ?>
      <div class='content-html'>
        <?php echo esc_html(get_theme_mod('big_store_col2_texthtml',  __('Add your content here', 'big-store'))); ?>
      </div>
      <?php } elseif ($content == 'menu') {
      if (has_nav_menu('big-store-above-menu')) { ?>
        <!-- Menu Toggle btn-->
        <nav>
          <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
              <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </div>
            </button>
          </div>
          <div class="sider above big-store-menu-hide <?php echo esc_attr($mobileopen); ?>">
            <div class="sider-inner">
              <?php big_store_abv_nav_menu(); ?>
            </div>
          </div>
        </nav>
      <?php
      } else { ?>
        <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e('Assign Above header menu', 'big-store'); ?></a>
      <?php }
    } elseif ($content == 'widget') { ?>
      <div class="content-widget">
        <?php if (is_active_sidebar('top-header-widget-col2')) {
          dynamic_sidebar('top-header-widget-col2');
        } else { ?>
          <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Add Widget', 'big-store'); ?></a>
        <?php } ?>
      </div>
    <?php } elseif ($content == 'social') { ?>
      <div class="content-social">
        <?php echo big_store_social_links(); ?>
      </div>
    <?php } elseif ($content == 'none') {
      return true;
    } ?>
  <?php }
}
//************************************/
// top header col3 function
//************************************/
if (!function_exists('big_store_top_header_conetnt_col3')) {
  function big_store_top_header_conetnt_col3($content, $mobileopen)
  { ?>
    <?php if ($content == 'text') { ?>
      <div class='content-html'>
        <?php echo esc_html(get_theme_mod('big_store_col3_texthtml',  __('Add your content here', 'big-store'))); ?>
      </div>
      <?php } elseif ($content == 'menu') {
      if (has_nav_menu('big-store-above-menu')) { ?>
        <!-- Menu Toggle btn-->
        <nav>
          <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
              <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </div>
            </button>
          </div>
          <div class="sider above big-store-menu-hide <?php echo esc_attr($mobileopen); ?>">
            <div class="sider-inner">
              <?php big_store_abv_nav_menu(); ?>
            </div>
          </div>
        </nav>
      <?php
      } else { ?>
        <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e('Assign Above header menu', 'big-store'); ?></a>
      <?php }
    } elseif ($content == 'widget') { ?>
      <div class="content-widget">
        <?php if (is_active_sidebar('top-header-widget-col3')) {
          dynamic_sidebar('top-header-widget-col3');
        } else { ?>
          <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Add Widget', 'big-store'); ?></a>
        <?php } ?>
      </div>
    <?php } elseif ($content == 'social') { ?>
      <div class="content-social">
        <?php echo big_store_social_links(); ?>
      </div>
    <?php } elseif ($content == 'none') {
      return true;
    } ?>
    <?php }
}
/**************************************/
//Below Header function
/**************************************/
if (!function_exists('big_store_below_header_markup')) {
  function big_store_below_header_markup()
  {
    $main_header_layout = get_theme_mod('big_store_main_header_layout', 'mhdrthree');
    $big_store_menu_alignment = get_theme_mod('big_store_menu_alignment', 'left');
    $big_store_menu_open = get_theme_mod('big_store_mobile_menu_open', 'left');
    if ($main_header_layout !== 'mhdrtwo') : ?>
      <div class="below-header  <?php echo esc_attr($main_header_layout); ?> <?php echo esc_attr($big_store_menu_alignment); ?>">
        <div class="container">
          <div class="below-header-bar thnk-col-3">
            <?php if (class_exists('WooCommerce')) { ?>
              <div class="below-header-col1">
                <div class="menu-category-list toogleclose">
                  <div class="toggle-cat-wrap">
                    <p class="cat-toggle">
                      <span class="cat-icon">
                        <span class="cat-top"></span>
                        <span class="cat-top"></span>
                        <span class="cat-bot"></span>
                      </span>
                      <span class="toggle-title">
                        <?php echo esc_html(get_theme_mod('big_store_main_hdr_cat_txt', 'Category')); ?>

                      </span>
                      <span class="toggle-icon"></span>
                    </p>
                  </div>
                  <?php big_store_product_list_categories(); ?>
                </div><!-- menu-category-list -->
              </div>
            <?php } ?>
            <div class="below-header-col2">
              <?php if ($main_header_layout == 'mhdrthree') { ?>
                <nav>
                  <!-- Menu Toggle btn-->
                  <!-- Menu Toggle btn-->
                  <div class="menu-toggle">
                    <button type="button" class="menu-btn" id="menu-btn">
                      <div class="btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </div>
                    </button>
                  </div>
                  <div class="sider-inner">
                    <?php if (has_nav_menu('big-store-main-menu')) {
                      if (wp_is_mobile() !== true) {
                        if (has_nav_menu('big-store-above-menu')) {
                          big_store_abv_nav_menu();
                        }
                      }
                      big_store_main_nav_menu();
                    } else {
                      wp_page_menu(array(
                        'items_wrap'  => '<ul class="big-store-menu" data-menu-style="horizontal">%3$s</ul>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>'
                      ));
                    } ?>
                  </div>

                </nav>
              <?php } else {

              big_store_th_advance_product_search();
                
              } ?>
            </div>
            <?php if ($main_header_layout == 'mhdrdefault' || $main_header_layout == 'mhdrone') { ?>
              <div class="below-header-col3">
                <div class="header-support-wrap">

                  <div class="header-support-icon">

                    <?php big_store_header_icon(); ?>

                    <div class="thunk-icon">
                      <?php if (class_exists('WooCommerce')) {
                        if (get_theme_mod('big_store_cart_mobile_disable') == true) {
                          if (wp_is_mobile() !== true) :

                      ?>

                            
                            <?php big_store_th_cart();?>
                           

                             
            
                          <?php endif;
                        } elseif (get_theme_mod('big_store_cart_mobile_disable') == false) { ?>

                          
                          <?php big_store_th_cart();?>
 
                      <?php  }
                      } ?>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>
          </div> <!-- end main-header-bar -->
        </div>
      </div> <!-- end below-header -->
    <?php endif;
  }
}
add_action('big_store_below_header', 'big_store_below_header_markup');
/**************************************/
//Main Header function
/**************************************/
if (!function_exists('big_store_main_header_markup')) {
  function big_store_main_header_markup()
  {
    $main_header_layout = get_theme_mod('big_store_main_header_layout', 'mhdrthree');
    $main_header_opt = get_theme_mod('big_store_main_header_option', 'none');
    $big_store_menu_alignment = get_theme_mod('big_store_menu_alignment', 'left');
    $big_store_menu_open = get_theme_mod('big_store_mobile_menu_open', 'left');
    $offcanvas = get_theme_mod('big_store_canvas_alignment', 'cnv-none');

    // select category hide show 

    ?>
    <div class="main-header <?php echo esc_attr($main_header_layout); ?> <?php echo esc_attr($main_header_opt); ?> <?php echo esc_attr($big_store_menu_alignment); ?>  <?php echo esc_attr($offcanvas); ?>">
      <div class="container">
        <div class="desktop-main-header">
          <div class="main-header-bar thnk-col-3">
            <div class="main-header-col1">
              <span class="logo-content">
                <?php big_store_logo(); ?>
              </span>
              <?php if (function_exists('big_store_show_off_canvas_sidebar_icon')) {
                big_store_show_off_canvas_sidebar_icon();
              } ?>
            </div>
            <div class="main-header-col2">
              <?php if ($main_header_layout !== 'mhdrthree') { ?>
                <nav>
                  <!-- Menu Toggle btn-->
                  <div class="menu-toggle">
                    <button type="button" class="menu-btn" id="menu-btn">
                      <div class="btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </div>
                    </button>
                  </div>
                  <div class="sider main  big-store-menu-hide <?php echo esc_attr($big_store_menu_open); ?>">
                    <div class="sider-inner">
                      <?php if (has_nav_menu('big-store-main-menu')) {

                        if (wp_is_mobile() !== false) {
                          if (has_nav_menu('big-store-above-menu')) {
                            big_store_abv_nav_menu();
                          }
                        }
                        big_store_main_nav_menu();
                      } else {
                        wp_page_menu(array(
                          'items_wrap'  => '<ul class="big-store-menu" data-menu-style="horizontal">%3$s</ul>',
                          'link_before' => '<span>',
                          'link_after'  => '</span>'
                        ));
                      } ?>
                    </div>
                  </div>
                </nav>
              <?php } else {
                big_store_th_advance_product_search();
              } ?>
            </div>
            <div class="main-header-col3">
              <?php big_store_main_header_optn(); ?>
            </div>
          </div>
        </div>
        <!-- end main-header-bar -->
        <!-- responsive mobile main header-->
        <div class="responsive-main-header">
          <div class="main-header-bar thnk-col-3">
            <div class="main-header-col1">
              <span class="logo-content">
                <?php big_store_logo(); ?>
              </span>

            </div>

            <div class="main-header-col2">
              <?php
                big_store_th_advance_product_search();
                ?>
            </div>

            <div class="main-header-col3">
              <div class="thunk-icon-market">
                <?php 
                if(is_plugin_active('themehunk-megamenu-plus/themehunk-megamenu.php')){ 
                       big_store_main_nav_menu();
                    }else{ ?>   
                  <div class="menu-toggle">
                  <button type="button" class="menu-btn" id="menu-btn">
                    <div class="btn">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </div>
                  </button>
                </div>
                <?php } ?>
                <div class="header-support-wrap">
                  <div class="header-support-icon">
                    <?php if( class_exists( 'WooCommerce' ) &&get_theme_mod('big_store_whislist_mobile_disable',false) != true){ ?>
                      <a class="whishlist" href="<?php echo esc_url(big_store_whishlist_url()); ?>">
                        <span class="th-icon th-icon-heartline"></span><span><?php _e('Wishlist', 'big-store'); ?></span></a>
                    <?php } ?>

                    <?php if(class_exists( 'WooCommerce' ) && get_theme_mod('big_store_account_mobile_disable',false) != true){
                      big_store_account();
                    } ?>

                  </div>
                  <div class="thunk-icon">

                    <?php if (class_exists('WooCommerce')) {
                      if (wp_is_mobile()) {
                      if (get_theme_mod('big_store_cart_mobile_disable',false) !== true) {
                    ?>
                            
                            <?php big_store_th_cart(); ?>
                           
                          

                          
                        <?php 
                      }}
                      else{ ?>

                                
                               <?php big_store_th_cart(); ?>
                          

                        
                        
                   <?php   } 
                    } ?>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div> <!-- responsive-main-header END -->
      </div>
    </div>
    <div class="search-wrapper">
      <div class="container">
        <div class="search-close"><a class="search-close-btn"></a></div>
        <?php 
        big_store_th_advance_product_search();
        ?>
      </div>
    </div>
  <?php  }
}
add_action('big_store_main_header', 'big_store_main_header_markup');

function big_store_main_header_optn()
{
  $main_header_layout = get_theme_mod('big_store_main_header_layout', 'mhdrthree');
  $big_store_main_header_option = get_theme_mod('big_store_main_header_option', 'none'); ?>
  <div class="header-support-wrap">

    <?php if ($big_store_main_header_option == 'button') { ?>

      <a href="<?php echo esc_url(get_theme_mod('big_store_main_hdr_btn_lnk', '#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('big_store_main_hdr_btn_txt', 'Button Text')); ?></a>
    <?php } elseif ($big_store_main_header_option == 'callto') { ?>


      <div class="header-support-content">
        <i class="fa fa-headphones" aria-hidden="true"></i>
        <span class="sprt-tel"><b><?php echo esc_html(get_theme_mod('big_store_main_hdr_calto_txt', 'Call To')); ?></b> <a href="tel:<?php echo esc_html(get_theme_mod('big_store_main_hdr_calto_nub', '+1800090098')); ?>"><?php echo esc_html(get_theme_mod('big_store_main_hdr_calto_nub', '+1800090098')); ?></a></span>

      </div>

    <?php } elseif ($big_store_main_header_option == 'widget') { ?>
      <div class="header-widget-wrap">
        <?php
        if (is_active_sidebar('main-header-widget')) {
          dynamic_sidebar('main-header-widget');
        }
        ?>
      </div>
    <?php  } ?>
    <?php if ($main_header_layout !== 'mhdrdefault' && $main_header_layout !== 'mhdrone') { ?>
      <div class="header-support-icon">

        <?php big_store_header_icon(); ?>

        <div class="thunk-icon">

          <?php if (class_exists('WooCommerce')) {
            if (get_theme_mod('big_store_cart_mobile_disable') == true) {
              if (wp_is_mobile() !== true) :

          ?>
                   
                   <?php big_store_th_cart(); ?>
                          
              <?php endif;
            } elseif (get_theme_mod('big_store_cart_mobile_disable') == false) { ?>

                   
                     <?php big_store_th_cart();?>

                     
                         
          <?php  }
          } ?>
        </div>

      </div>
    <?php } ?>
  </div>
  <?php }
/**************************************/
//logo & site title function
/**************************************/
if (!function_exists('big_store_logo')) {
  function big_store_logo()
  {
    $title_disable          = get_theme_mod('title_disable', 'enable');
    $tagline_disable        = get_theme_mod('tagline_disable', 'enable');
    $description            = get_bloginfo('description', 'display');
    big_store_custom_logo();
    if ($title_disable != '' || $tagline_disable != '') {
      if ($title_disable != '') {
  ?>
        <div class="site-title"><span>
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
          </span>
        </div>
        <?php
      }
      if ($tagline_disable != '') {
        if ($description || is_customize_preview()) : ?>
          <div class="site-description">
            <p><?php echo esc_html($description); ?></p>
          </div>
    <?php endif;
      }
    }
  }
}
/**********************************/
// header icon function
/**********************************/
function big_store_header_icon()
{
  if (class_exists('WooCommerce')) {
    ?>
    <div class="header-icon">
      <?php
      if (get_theme_mod('big_store_main_header_layout') == 'mhdrtwo') { ?>

        <a class="prd-search-icon" ><?php  if ( shortcode_exists('tapsp') ){

          echo do_shortcode('[tapsp layout="icon_style"]'); 

        }elseif( shortcode_exists('th-aps') ){

              echo do_shortcode('[th-aps layout="icon_style"]'); 

        }?></span></a>

      <?php }
      big_store_account();
      if(class_exists('WPCleverWoosw')){ ?>
        <a class="whishlist" href="<?php echo esc_url(WPcleverWoosw::get_url()); ?>">
        <span class="th-icon th-icon-heartline"></span></a>
      <?php }
      if (class_exists('YITH_WCWL') && (!class_exists('WPCleverWoosw'))) { ?>
        <a class="whishlist" href="<?php echo esc_url(big_store_whishlist_url()); ?>">
        <span class="th-icon th-icon-heartline"></span></a></a>
      <?php }


      ?>
    </div>
    <?php }
}

/**************************/
//PRELOADER
/**************************/
if (!function_exists('big_store_preloader')) {
  function big_store_preloader()
  {
    if ((isset($_REQUEST['action']) && 'elementor' == $_REQUEST['action']) ||
      isset($_REQUEST['elementor-preview'])
    ) {
      return;
    } else {
      $big_store_preloader_enable = get_theme_mod('big_store_preloader_enable', false);
      $big_store_preloader_image_upload = get_theme_mod('big_store_preloader_image_upload', '');
      if ($big_store_preloader_enable == true) { ?>
        <div class="big_store_overlayloader">
          <div class="big-store-pre-loader"><img src="<?php echo esc_url($big_store_preloader_image_upload); ?>"></div>
        </div>
    <?php }
    }
  }
}
add_action('big_store_site_preloader', 'big_store_preloader');

/**********************/
// Sticky Header
/**********************/
if (!function_exists('big_store_sticky_header_markup')) {
  function big_store_sticky_header_markup()
  {

    // select category hide show 

    $big_store_menu_open = get_theme_mod('big_store_mobile_menu_open', 'left'); ?>
    <div class="sticky-header">
      <div class="container">
        <div class="sticky-header-bar thnk-col-3">
          <div class="sticky-header-col1">
            <span class="logo-content">
              <?php big_store_logo(); ?>
            </span>
          </div>
          <div class="sticky-header-col2">
            <nav>
              <!-- Menu Toggle btn-->
              <div class="menu-toggle">
                <button type="button" class="menu-btn" id="menu-btn-stk">
                  <div class="btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
                </button>
              </div>
              <div class="sider main  big-store-menu-hide  <?php echo esc_attr($big_store_menu_open); ?>">
                <div class="sider-inner">
                  <?php if (has_nav_menu('big-store-sticky-menu')) {
                    if (wp_is_mobile() !== false) {
                      if (has_nav_menu('big-store-above-menu')) {
                        big_store_abv_nav_menu();
                      }
                    }
                    big_store_stick_nav_menu();
                  } else {
                    wp_page_menu(array(
                      'items_wrap'  => '<ul class="big-store-menu" data-menu-style="horizontal">%3$s</ul>',
                      'link_before' => '<span>',
                      'link_after'  => '</span>'
                    ));
                  } ?>
                </div>
              </div>
            </nav>
          </div>
          <div class="sticky-header-col3">
            <div class="thunk-icon">

              <div class="header-icon">
                <a class="prd-search-icon" ><?php  if ( shortcode_exists('tapsp') ){

          echo do_shortcode('[tapsp layout="icon_style"]'); 

        }elseif( shortcode_exists('th-aps') ){

              echo do_shortcode('[th-aps layout="icon_style"]'); 
              
        }?></span></a>
                <?php
                if (class_exists('WPCleverWoosw')) {
                ?>
                  <a class="whishlist" href="<?php echo esc_url(WPcleverWoosw::get_url()); ?>"><span class="th-icon th-icon-heartline"></span></a>
                <?php }
                if (class_exists('YITH_WCWL') && (!class_exists('WPCleverWoosw'))) {
                ?>
                  <a class="whishlist" href="<?php echo esc_url(big_store_whishlist_url()); ?>"><span class="th-icon th-icon-heartline"></span></a>
                <?php }
                if (class_exists('WooCommerce')) {
                  big_store_account();
                }
                ?>
              </div>
              
              <?php if (class_exists('WooCommerce')) { ?>

                       <?php big_store_th_cart(); ?>
                           
              <?php  } ?>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="search-wrapper">
      <div class="container">
        <div class="search-close"><a class="search-close-btn"></a></div>
        <?php 
        big_store_th_advance_product_search();
        ?>
      </div>
    </div>
  <?php }
}
if (get_theme_mod('big_store_sticky_header', false) == true) :
  add_action('big_store_sticky_header', 'big_store_sticky_header_markup');
endif;

/*****************/
/*mobile nav bar*/
/*****************/

function bigstore_mobile_navbar()
{ ?>
  <?php if (class_exists('WooCommerce')) { ?>
    <div id="bigstore-mobile-bar">
      <ul>

        <li><a class="gethome" href="<?php echo esc_url(get_home_url()); ?>"><span class="th-icon th-icon-home"></span></a></li>
        <?php
        if (class_exists('WPCleverWoosw')) { ?>
          <li><a class="whishlist" href="<?php echo esc_url(WPcleverWoosw::get_url()); ?>"><span class="th-icon th-icon-heartline"></span></a></li>
        <?php }
        if (class_exists('YITH_WCWL') && (!class_exists('WPCleverWoosw'))) { ?>
          <li><a class="whishlist" href="<?php echo esc_url(big_store_whishlist_url()); ?>"><span class="th-icon th-icon-heartline"></span></a></li>
        <?php } ?>
        <li>
          <?php
         if(is_plugin_active( 'themehunk-megamenu-plus/themehunk-megamenu.php')) { 
          
         big_store_main_nav_menu();

            }else{  ?>
            
             <a href="#" class="menu-btn" id="mob-menu-btn">

            <div class="btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
            
          </a>
       <?php  }?>

        </li>
        <li><?php big_store_account(); ?></li>
        
      </ul>
    </div>
  <?php }
}
add_action('wp_footer', 'bigstore_mobile_navbar');

/// mobile panel
function big_store_cart_mobile_panel()
{
  $big_store_mobile_menu_open = get_theme_mod('big_store_mobile_menu_open', 'left');
  ?>
  <div class="mobile-nav-bar sider main  big-store-menu-hide <?php echo esc_attr($big_store_mobile_menu_open); ?>">
    <div class="sider-inner">

      <div class="mobile-tab-wrap">
        <?php if (class_exists('WooCommerce')) { ?>
          <div class="mobile-nav-tabs">
            <ul>
              <li class="primary active" data-menu="primary">
                <a href="#mobile-nav-tab-menu"><?php _e('Menu', 'big-store'); ?></a>
              </li>

              <li class="categories" data-menu="categories">
                <a href="#mobile-nav-tab-category"><?php _e('Categories', 'big-store'); ?></a>
              </li>

            </ul>
          </div>
        <?php } ?>
        <div id="mobile-nav-tab-menu" class="mobile-nav-tab-menu panel">
          <?php if (has_nav_menu('big-store-main-menu')) {
            if (has_nav_menu('big-store-above-menu')) {
              big_store_abv_nav_menu();
            }
            big_store_main_nav_menu();
          } else {
            wp_page_menu(array(
              'items_wrap'  => '<ul class="big-store-menu" data-menu-style="horizontal">%3$s</ul>',
              'link_before' => '<span>',
              'link_after'  => '</span>'
            ));
          } ?>
        </div>
        <?php if (class_exists('WooCommerce')) { ?>
          <div id="mobile-nav-tab-category" class="mobile-nav-tab-category panel">
            <?php big_store_product_list_categories_mobile(); ?>
          </div>
        <?php } ?>
      </div>
      <div class="mobile-nav-widget">
        <?php $big_store_main_header_option = get_theme_mod('big_store_main_header_option', 'none');
        if ($big_store_main_header_option == 'button') { ?>
          <a href="<?php echo esc_url(get_theme_mod('big_store_main_hdr_btn_lnk', '#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('big_store_main_hdr_btn_txt', 'Button Text')); ?></a>
        <?php } elseif ($big_store_main_header_option == 'callto') { ?>
          <div class="header-support-wrap">
            <div class="header-support-content">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span class="sprt-tel"><b><?php echo esc_html(get_theme_mod('big_store_main_hdr_calto_txt', 'Call To')); ?></b>
                <a href="tel:<?php echo esc_html(get_theme_mod('big_store_main_hdr_calto_nub', '+1800090098')); ?>"><?php echo esc_html(get_theme_mod('big_store_main_hdr_calto_nub', '+1800090098')); ?>
                </a>
              </span>
            </div>
          </div>
        <?php } elseif ($big_store_main_header_option == 'widget') { ?>
          <div class="header-widget-wrap">
            <?php
            if (is_active_sidebar('main-header-widget')) {
              dynamic_sidebar('main-header-widget');
            }
            ?>
          </div>
        <?php  } ?>
      </div>
    </div>
  </div>
<?php
}
add_action('big_store_below_header', 'big_store_cart_mobile_panel');

//********************************//
//th advance product search 
//*******************************//
function big_store_th_advance_product_search(){

              if ( shortcode_exists('th-aps') ){

                 echo do_shortcode('[th-aps]');

                }elseif ( shortcode_exists('tapsp') ){

                 echo do_shortcode('[tapsp]');

                }elseif( !shortcode_exists('th-aps') && !shortcode_exists('tapsp') && is_user_logged_in()){

                $url = admin_url('themes.php?page=thunk_started&th-tab=recommended-plugin');

                $pro_url =admin_url('plugin-install.php?s=th%20advance%20product%20search&tab=search&type=term');

                $url = (function_exists("big_store_pro_load_plugin"))?$pro_url:$url;

                ?>

                <a target="_blank" class="plugin-active-msg" href="<?php echo esc_url($url);?>">

                  <?php _e('Please Install "th advance product search" Plugin','big-store');?>
                  
                </a>


                <?php      

            }
}

//********************************//
//th woo cart 
//*******************************//

function big_store_th_cart(){

  if ( shortcode_exists('taiowc') ){

                echo do_shortcode('[taiowc]');

              }elseif ( shortcode_exists('taiowcp') ){

                echo do_shortcode('[taiowcp]');

              }elseif ( !shortcode_exists('taiowc') && !shortcode_exists('taiowcp') && is_user_logged_in()) {

                $url = admin_url('themes.php?page=thunk_started&th-tab=recommended-plugin');

                $pro_url =admin_url('plugin-install.php?s=th%20all%20in%20one%20woo%20cart&tab=search&type=term');

                $url = (function_exists("big_store_pro_load_plugin"))?$pro_url:$url;

                ?>

                <a target="_blank" class="cart-plugin-active-msg" href="<?php echo esc_url($url);?>">

                  <?php _e('Add Cart','big-store');?>
                  
                </a>


                <?php      

            }
}