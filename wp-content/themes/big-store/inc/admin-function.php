<?php 
/**
 * Common Function for Big StoreTheme.
 *
 * @package     big store
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2019, big store
 * @since       big store 1.0.0
 */
 if ( ! function_exists( 'big_store_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function big_store_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) ){?>
    	<div class="thunk-logo">
        <?php the_custom_logo();?>
        </div>
   <?php  }
}
endif;
/*********************/
// Menu 
/*********************/
function big_store_header_menu_style(){
 $big_store_main_header_layout = get_theme_mod('big_store_main_header_layout');
        	$menustyle='horizontal';	
        	return $menustyle;
		}
function big_store_add_classes_to_page_menu( $ulclass ){
  return preg_replace( '/<ul>/', '<ul class="big-store-menu" data-menu-style='.esc_attr(big_store_header_menu_style()).'>', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'big_store_add_classes_to_page_menu' );		
     // This theme uses wp_nav_menu() in two locations.
	  function big_store_custom_menu(){
		     register_nav_menus(array(
		    'big-store-above-menu'       => esc_html__( 'Header Above Menu', 'big-store' ),
			'big-store-main-menu'        => esc_html__( 'Main', 'big-store' ),
			'big-store-sticky-menu'        => esc_html__( 'Sticky', 'big-store' ),
			'big-store-footer-menu'  => esc_html__( 'Footer Menu', 'big-store' ),
		) );
	  }
	  add_action( 'after_setup_theme', 'big_store_custom_menu' );
	  // MAIN MENU
           function big_store_main_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'big-store-main-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="big-store-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="big-store-menu" class="big-store-menu" data-menu-style='.esc_attr(big_store_header_menu_style()).'>%3$s</ul>',
             ));
         }
          //STICKY MENU
           function big_store_stick_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'big-store-sticky-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="big-store-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="big-store-stick-menu" class="big-store-menu" data-menu-style='.esc_attr(big_store_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // HEADER ABOVE MENU
         function big_store_abv_nav_menu(){
              wp_nav_menu( array('theme_location' => 'big-store-above-menu', 
              'container'   => false, 
              'link_before' => '<span class="big-store-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="open-above-menu" class="big-store-menu" data-menu-style='.esc_attr(big_store_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // FOOTER TOP MENU
         function big_store_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'big-store-footer-menu', 
              'container'   => false, 
              'link_before' => '<span class="big-store-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="open-footer-menu" class="open-bottom-menu">%3$s</ul>',
             ));
         }
function big_store_add_classes_to_page_menu_default( $ulclass ){
return preg_replace( '/<ul>/', '<ul class="big-store-menu" data-menu-style="horizontal">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'big_store_add_classes_to_page_menu_default' );
/************************/
// description Menu
/************************/
function big_store_nav_description( $item_output, $item, $depth, $args ){
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . esc_html($item->description) . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'big_store_nav_description', 10, 4 );

/*********************/
/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'big_store_check_is_ie' ) ) :
	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function big_store_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'big_store_check_is_ie', $is_ie );
	}

endif;
/**
 * ratia image
 */
if ( ! function_exists( 'big_store_replace_header_attr' ) ) :
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function big_store_replace_header_attr( $attr, $attachment, $size ){
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ){
			$attach_data = array();
			if ( ! is_customize_preview() ){
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'open-logo-size' );

				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];
			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'open-logo-svg';
			}
			$retina_logo = get_theme_mod( 'big_store_header_retina_logo' );
			$attr['srcset'] = '';
			if ( apply_filters( 'open_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if (big_store_check_is_ie() ){
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return apply_filters( 'big_store_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'big_store_replace_header_attr', 10, 3 );

/********************************/
// responsive slider function
/*********************************/
if ( ! function_exists( 'big_store_responsive_slider_funct' ) ) :
function big_store_responsive_slider_funct($control_name,$function_name){
  $custom_css='';
           $control_value = get_theme_mod( $control_name );
           if ( empty( $control_value ) ){
                return '';
             }  
        if ( big_store_is_json( $control_value ) ){
    $control_value = json_decode( $control_value, true );
    if ( ! empty( $control_value ) ) {

      foreach ( $control_value as $key => $value ){
        $custom_css .= call_user_func( $function_name, $value, $key );
      }
    }
    return $custom_css;
  }  
}
endif;
/********************************/
// responsive slider function add media query
/********************************/
if ( ! function_exists( 'big_store_add_media_query' ) ) :
function big_store_add_media_query( $dimension, $custom_css ){
  switch ($dimension){
      case 'desktop':
      $custom_css = '@media (min-width: 769px){' . $custom_css . '}';
      break;
      break;
      case 'tablet':
      $custom_css = '@media (max-width: 768px){' . $custom_css . '}';
      break;
      case 'mobile':
      $custom_css = '@media (max-width: 550px){' . $custom_css . '}';
      break;
  }

      return $custom_css;
}
endif;
/**
 * Display Sidebars
 */
if ( ! function_exists( 'big_store_get_sidebar' ) ){
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.1.1
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function big_store_get_sidebar( $sidebar_id ){
		 return $sidebar_id;
	}
}

/******************/
//Banner Function
/******************/
function big_store_front_banner(){
$big_store_banner_layout     = get_theme_mod( 'big_store_banner_layout','bnr-one');
// first
$big_store_bnr_1_img     = get_theme_mod( 'big_store_bnr_1_img','');
$big_store_bnr_1_url     = get_theme_mod( 'big_store_bnr_1_url','');
// second
$big_store_bnr_2_img     = get_theme_mod( 'big_store_bnr_2_img','');
$big_store_bnr_2_url     = get_theme_mod( 'big_store_bnr_2_url','');
// third
$big_store_bnr_3_img     = get_theme_mod( 'big_store_bnr_3_img','');
$big_store_bnr_3_url     = get_theme_mod( 'big_store_bnr_3_url','');
// fouth
$big_store_bnr_4_img     = get_theme_mod( 'big_store_bnr_4_img','');
$big_store_bnr_4_url     = get_theme_mod( 'big_store_bnr_4_url','');
// fifth
$big_store_bnr_5_img     = get_theme_mod( 'big_store_bnr_5_img','');
$big_store_bnr_5_url     = get_theme_mod( 'big_store_bnr_5_url','');

if($big_store_banner_layout=='bnr-one'){?>
<div class="thunk-banner-wrap bnr-layout-1 thnk-col-1">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($big_store_bnr_1_url);?>"><img src="<?php echo esc_url($big_store_bnr_1_img );?>"></a>
 	 	</div>
 	 </div>
  </div>
<?php }elseif($big_store_banner_layout=='bnr-two'){?>
<div class="thunk-banner-wrap bnr-layout-2 thnk-col-2">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($big_store_bnr_1_url);?>"><img src="<?php echo esc_url($big_store_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($big_store_bnr_2_url);?>"><img src="<?php echo esc_url($big_store_bnr_2_img );?>"></a></div>
 	 </div>
  </div>

<?php }?>
      
<?php
 
}


/**********************/
// Top Slider Function
/**********************/
//Slider ontent output function layout 1
function big_store_top_slider_content( $big_store_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$big_store_slide_content = get_theme_mod( $big_store_slide_content_id, $default );
		if ( ! empty( $big_store_slide_content ) ) :
			$big_store_slide_content = json_decode( $big_store_slide_content );
			if ( ! empty( $big_store_slide_content) ) {
				foreach ( $big_store_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'big-store_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'big-store_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'big-store_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'big-store_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
		                    <div>
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <div class="slide-content-wrap">
                                <div class="slide-content">
                                  <div class="logo">
                                  	<a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($logo_image); ?>"></a>
                                  </div>
                                  <h2><?php echo esc_html($title); ?></h2>
                                  <p><?php echo esc_html($subtitle); ?></p>
                                  <?php if($text!==''): ?>
                                  <a class="slide-btn" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
	
			<?php	
				endif;
				endforeach;			
			} // End if().
		
	endif;	
}
//Single Slider ontent output function layout 5
function big_store_top_single_slider_content( $big_store_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$big_store_slide_content = get_theme_mod( $big_store_slide_content_id, $default );
		if ( ! empty( $big_store_slide_content ) ) :
			$big_store_slide_content = json_decode( $big_store_slide_content );
			if ( ! empty( $big_store_slide_content) ) {
				foreach ( $big_store_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'big-store_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
		                    <div>
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <a  href="<?php echo esc_url($link); ?>"></a>
                            </div>
	
			<?php	
				endif;
				endforeach;			
			} // End if().
		
	endif;	
}
// slider layout 2
function big_store_top_slider_2_content( $big_store_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$big_store_slide_content = get_theme_mod( $big_store_slide_content_id, $default );
		if ( ! empty( $big_store_slide_content ) ) :
			$big_store_slide_content = json_decode( $big_store_slide_content );
			if ( ! empty( $big_store_slide_content) ) {
				foreach ( $big_store_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'big-store_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'big-store_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'big-store_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'big-store_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
                   <div class="thunk-to2-slide-list">
                    <img src="<?php echo esc_url($image); ?>">
                    <div class="slider-content-caption">
                        <h2 class="animated delay-0.5s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h2>
                        <p class="animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($subtitle); ?></p>
                         <?php if($text!==''): ?>
                       <a class="slide-btn animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                        <?php endif;?>
                    </div>
                  </div>
			<?php	
				endif;
			endforeach;			
			} // End if().
		
	endif;	
}
function big_store_top_slider_multi_content( $big_store_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$big_store_slide_content = get_theme_mod( $big_store_slide_content_id, $default );
		if ( ! empty( $big_store_slide_content ) ) :
			$big_store_slide_content = json_decode( $big_store_slide_content );
			if ( ! empty( $big_store_slide_content) ) {
				foreach ( $big_store_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'big-store_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'big-store_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'big-store_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'big-store_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'big-store_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
                   
                  <div class="thunk-slider-multi-item">
              <a href="<?php echo esc_url($link); ?>">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
              </a>
              <div class="slide-item-wrapper">
                <div class="item-title"><h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
                <div class="item-subtitle"><?php echo esc_html($subtitle); ?></div></div>

                <?php if($text!==''){?>
                <div class="item-button"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a></div>
               <?php }?>
              </div>
            </div>
			<?php	
				endif;
			endforeach;			
			} // End if().
		
	endif;	
}
//*********************//
// Highlight feature
//*********************//
function big_store_highlight_content($big_store_highlight_content_id,$default){
	$big_store_highlight_content= get_theme_mod( $big_store_highlight_content_id, $default );
//passing the seeting ID and Default Values

	if ( ! empty( $big_store_highlight_content ) ) :

		$big_store_highlight_content = json_decode( $big_store_highlight_content );
		if ( ! empty( $big_store_highlight_content ) ) {
			foreach ( $big_store_highlight_content as $ship_item ) :
               $icon   = ! empty( $ship_item->icon_value ) ? apply_filters( 'big_store_translate_single_string', $ship_item->icon_value, '' ) : '';
				$title    = ! empty( $ship_item->title ) ? apply_filters( 'big_store_translate_single_string', $ship_item->title, '' ) : '';
				$subtitle    = ! empty( $ship_item->subtitle ) ? apply_filters( 'big_store_translate_single_string', $ship_item->subtitle, '' ) : '';
					?>
         <div class="thunk-highlight-col">
          	<div class="thunk-hglt-box">
          		<div class="thunk-hglt-icon"><i class="<?php echo "fa ".esc_attr($icon); ?>"></i></div>
          		<div class="content">
          			<h6><?php echo esc_html($title);?></h6>
          			<p><?php echo esc_html($subtitle);?></p>
          		</div>
          	</div>
          </div>
    			<?php
			endforeach;
		}
	endif;
}
 
// Mobile Menu Wrapper Add.
function big_store_mobile_menu_wrap(){
echo '<div class="big-store-mobile-menu-wrapper"></div>';
}
add_action( 'wp_footer', 'big_store_mobile_menu_wrap' );

// section is_customize_preview
/**
 * This function display a shortcut to a customizer control.
 *
 * @param string $class_name        The name of control we want to link this shortcut with.
 */
function big_store_display_customizer_shortcut( $class_name ){
	if ( ! is_customize_preview() ) {
		return;
	}
	$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
        </svg>';
	echo'<span class="open-focus-section customize-partial-edit-shortcut customize-partial-edit-shortcut-' . esc_attr( $class_name ) . '">
            <button class="customize-partial-edit-shortcut-button">
                ' . $icon . '
            </button>
        </span>';
}

/*************************/
//Get Page Title
/*************************/
function big_store_get_page_title(){ ?>
			<?php if(is_search()){ ?> 
            <h2 class="thunk-page-top-title entry-title">
              	<?php printf( __( 'Search Results for: %s', 'big-store' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>

			<?php }elseif (big_store_is_blog() && !is_single() && !is_archive()){
				if( !(is_front_page()) ){
                    $our_title = get_the_title( get_option('page_for_posts', true) );
			echo '<h1 class="thunk-page-top-title entry-title">'.esc_html($our_title).'</h1>'; ?>
			<?php }else{
			echo'<h1 class="thunk-page-top-title entry-title">'.esc_html__('Blog','big-store').'</h1>'; ?>
			<?php }	 
			 }elseif(is_archive() && (class_exists( 'WooCommerce' ) && !is_shop())){
                   echo the_archive_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php }elseif(class_exists( 'WooCommerce' ) && is_shop()) { ?>
				<h1 class="thunk-page-top-title entry-title"><?php woocommerce_page_title(); ?></h1> 
			<?php }elseif(is_page()) { 
				echo the_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php } ?>
   <?php 
}

/**************************/
// Dynamic Social Link
/**************************/
function big_store_social_links(){
$social='';
$original_color = get_theme_mod('big_store_social_original_color',false);
if($original_color==true){
$class_original='original-social-icon';
}else{
$class_original='';	
}
$social.='<ul class="social-icon ' .esc_attr($class_original). ' ">';
if($f_link = get_theme_mod('social_shop_link_facebook','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($f_link).'"><i class="fa fa-facebook"></i></a></li>';
endif;
if($l_link = get_theme_mod('social_shop_link_linkedin','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($l_link).'"><i class="fa fa-linkedin"></i></a></li>';
endif;
if($p_link = get_theme_mod('social_shop_link_pintrest','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($p_link).'"><i class="fa fa-pinterest"></i></a></li>';
endif;
if($t_link = get_theme_mod('social_shop_link_twitter','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($t_link).'"><i class="fa fa-twitter"></i></a></li>';
endif;
if($insta_link = get_theme_mod('social_shop_link_insta','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($insta_link).'"><i class="fa fa-instagram"></i></a></li>';
endif;
if($tum_link = get_theme_mod('social_shop_link_tumblr','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($tum_link).'"><i class="fa fa-tumblr"></i></a></li>';
endif;
if($y_link = get_theme_mod('social_shop_link_youtube','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($y_link).'"><i class="fa fa-youtube-play"></i></a></li>';
endif;
if($stumb_link = get_theme_mod('social_shop_link_stumbleupon','#')):
	$social.='<li><a target="_blank" href="'.esc_url($stumb_link).'">
	 <i class="fa fa-stumbleupon"></i></a></li>';
endif;
if($dribble_link = get_theme_mod('social_shop_link_dribble','#')):
	$social.='<li><a target="_blank" href="'.esc_url($dribble_link).'">
	 <i class="fa fa-dribbble"></i></a></li>';
endif;
if($skype_link = get_theme_mod('social_shop_link_skype','#')):
	$social.='<li><a target="_blank" href="'.esc_url($skype_link).'">
	 <i class="fa fa-skype"></i></a></li>';
endif;
$social.='</ul>';
return $social;
}
/******************************/
//Sticky sidebar function
/******************************/
function big_store_stick_sidebar($class){
            $big_store_sticky_sidebar = get_theme_mod( 'big_store_sticky_sidebar');
            if ($big_store_sticky_sidebar){
                $class = 'bigstr-sticky-sidebar';
            }
            return $class;
}
add_filter( 'big_store_stick_sidebar_class','big_store_stick_sidebar', 999 );
/*****************************/
//add class active
function big_store_body_classes( $classes ){
if(class_exists( 'WooCommerce' )):
$classes[] = 'woocommerce';
endif;
$big_store_color_scheme = get_theme_mod( 'big_store_color_scheme','opn-light' );
        
          if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
                 $classes[] = 'big-store-wishlist-activate';
         } 

return $classes;
}
add_filter( 'body_class', 'big_store_body_classes' );

// default size in upload image
function big_store_attachment_display_settings() {
    update_option( 'image_default_size', 'large' );
}
add_action( 'after_setup_theme', 'big_store_attachment_display_settings' );