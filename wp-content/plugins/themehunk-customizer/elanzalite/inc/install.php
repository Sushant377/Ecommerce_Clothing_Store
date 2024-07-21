<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// image cropping
add_action( 'init', 'THunk_cropping' );

function THunk_cropping(){
    add_image_size('section-one-small', 433, 228, true);
    add_image_size('section-one-large', 908, 460, true);
    add_image_size('section-three-small', 165, 110, true);
    add_image_size('section-three-large', 710, 350, true);
    add_image_size('section-four', 405, 270, true);
    add_image_size('section-five-small', 165, 110, true);
    add_image_size('section-five-large', 710, 350, true);
    add_image_size('section-two-small', 353, 236, true);
}

add_action('widgets_init', 'themehunk_customizer_widget_init');
function themehunk_customizer_widget_init() {
    register_sidebar(array(
    'name' => __('Magazine Content Area', 'themehunk-customizer'),
    'id' => 'magzine-widget',
    'description' => __('Add desired magazine post widgets. Widgets added in this area will display in fullwidth. You can also re-order widgets using drag and drop feature.','themehunk-customizer'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));

    register_sidebar(array(
    'name' => __('Magazine Content Area with Sidebar ', 'themehunk-customizer'),
    'id' => 'magzine-sidebar-widget',
    'description' => __('Add desired magazine post widgets. Widgets added in this area will display with sidebar. You can also re-order widgets using drag and drop feature.','themehunk-customizer'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));

    register_widget( 'THunkcustomizer_RecentPost' );
    register_widget( 'themehunk_customizer_section_one' );
    register_widget( 'themehunk_customizer_section_two' );
    register_widget( 'themehunk_customizer_section_three' );
    register_widget( 'themehunk_customizer_section_four' );
    register_widget( 'themehunk_customizer_section_five' );
    register_widget( 'themehunk_customizer_section_add' );
    register_widget( 'themehunk_customizer_section_news' );
    register_widget( 'themehunk_customizer_aboutme' );
    register_widget( 'Socialth' );
}

function THunk_Customizer_Comment(){
	comments_popup_link(__('0','themehunk-customizer'), __('1','themehunk-customizer'), __('%','themehunk-customizer'));
}
/*
 * Category Color Options
 */
if ( ! function_exists( 'THunk_category_color' ) ) :
function THunk_category_color( $wp_category_id ) {
   $args = array(
      'orderby' => 'id',
      'hide_empty' => 0
   );
  $category = get_categories( $args );
   foreach ($category as $category_list ) {
      $color = get_theme_mod('elanzalite_category_color_'.$wp_category_id);
      return $color;
   }
}
endif;
function THunk_customizer_Cate(){
    $category = get_the_category();
    $return = '';
    foreach($category as $cat)
    {
$return .= "<a style=background:".THunk_category_color(get_cat_id($cat->name))."  href='".get_category_link($cat->cat_ID)."' class='{$cat->slug}'>{$cat->name}</a>";
    }

    return $return;
}
function THunkcustom_excerpt_length( $length ) {
        return 20;
    }
        add_filter( 'excerpt_length', 'THunkcustom_excerpt_length', 28 );

  function THunkcustom_excerpt_more($more) {
   return '…';
   }
   add_filter('excerpt_more', 'THunkcustom_excerpt_more');

if ( ! function_exists( 'elanzalite_hex2rgba' ) ) :
/*hexa to rgba convert*/
function elanzalite_hex2rgba($color, $opacity = false) {
 
 $default = 'rgb(0,0,0)';
 
 //Return default if no color provided
 if(empty($color)){
          return $default; 
 }
 //Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
         $color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
         if(abs($opacity) > 1){
         $opacity = 1.0;
     }
         $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
         $output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
endif;



// Include assets
function themehunk_customizer_enqueue_assets() {

 wp_enqueue_style('thunk-customizer-magzine', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . "/elanzalite/assets/css/magzine.css", '', THEMEHUNK_CUSTOMIZER_VERSION, 'all');

 wp_enqueue_style('owl-carousel', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . "/elanzalite/assets/css/owl.carousel.css", '', THEMEHUNK_CUSTOMIZER_VERSION, 'all');


wp_enqueue_script('flexslider', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'elanzalite/assets/js/jquery.flexslider.js', array(), THEMEHUNK_CUSTOMIZER_VERSION, true);

wp_enqueue_script('owl-carousel', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'elanzalite/assets/js/owl.carousel.js', array(), THEMEHUNK_CUSTOMIZER_VERSION, true);

wp_enqueue_script('news-ticker', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'elanzalite/assets/js/jquery.easy-ticker.js', array(), THEMEHUNK_CUSTOMIZER_VERSION, true);

wp_enqueue_script('custom-js', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'elanzalite/assets/js/custom.js', array(), THEMEHUNK_CUSTOMIZER_VERSION, true);

}
add_action('wp_enqueue_scripts', 'themehunk_customizer_enqueue_assets');

function themehunk_customizer_unlimited_admin_assets() {
    
wp_enqueue_script('elanzalite_widget_script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL. 'elanzalite/customizer/js/widget.js', array( 'jquery', 'wp-color-picker' ), THEMEHUNK_CUSTOMIZER_VERSION, true);
}
add_action('admin_enqueue_scripts', 'themehunk_customizer_unlimited_admin_assets');
?>