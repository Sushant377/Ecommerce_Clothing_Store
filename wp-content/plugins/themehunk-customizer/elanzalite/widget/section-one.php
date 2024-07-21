<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Post first Widget
*/
class themehunk_customizer_section_one extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-section-one',
            'description' => 'Display post slider in left column and other post in right column');
        parent::__construct('themehunk-customizer-section-one', __('THunk : Post Style 1','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $title = isset($instance['title'])?$instance['title']:__('Featured Post Title','themehunk_customizer');
        $fcate = isset($instance['fcate']) ? absint($instance['fcate']) : 0;
        $lttitle = isset($instance['lttitle']) ? esc_attr($instance['lttitle']) : __('Latest Post Title','themehunk-customizer');
        $ltcate = isset($instance['ltcate']) ? absint($instance['ltcate']) : 0;
        $fcount = isset($instance['fcount']) ? absint($instance['fcount']) : 4;
        $title_bg_color = isset($instance['title_bg_color'])? $instance['title_bg_color']:'#66cda9';
        $title_txt_color = isset($instance['title_txt_color'])? $instance['title_txt_color']:'#fff';
        $r_title_bg_color = isset($instance['r_title_bg_color'])? $instance['r_title_bg_color']:'#66cda9';
        $r_title_txt_color = isset($instance['r_title_txt_color'])? $instance['r_title_txt_color']:'#fff';

        $args = array(
            'order' => 'DESC',
            'ignore_sticky_posts' => 1,
            'post_type' => 'post',
            'post_status' => 'publish',
            'meta_key' => '_thumbnail_id',
            'posts_per_page' => $fcount, 
            'cat' => $fcate
        );
            $featured_posts = new WP_Query($args);

?>
<section id="section_one">
        <div class="inner_wrap">
        <?php if ( $featured_posts->have_posts() ) { ?>
            <div class="slider">
                <div class="flexslider carousel">
                    <h3 class="section-title" style="background:<?php echo $title_bg_color;?>; color:<?php echo $title_txt_color;?>"><?php echo apply_filters('widget_title', $title ); ?></h3>
                    <ul class="slides">
<?php  while ($featured_posts->have_posts()): $featured_posts->the_post();
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
    $imgurl =  get_the_post_thumbnail_url($featured_posts->ID,'section-one-large');
        ?>
            <li class="slide" style="background:url('<?php echo $imgurl; ?>')">
                <div class="slide-header">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="entry-meta">
                        <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>

                        <span class="comments-link"><?php THunk_Customizer_Comment(); ?></span>

                    </div>
                    <div class="slide-cat"><span class="cat-links">
                        <?php echo THunk_customizer_Cate(); ?>
                         </span></div>
                </div>
            </li>
<?php } endwhile; ?>
                    </ul>
                </div>
            </div>
<?php } wp_reset_postdata(); ?>
<?php 
$args1 = array(
            'order' => 'DESC',
            'ignore_sticky_posts' => 1,
            'post_type' => 'post',
            'post_status' => 'publish',
            'meta_key' => '_thumbnail_id',
            'posts_per_page' => 4, 
            'cat' => $ltcate
        );
$latest_posts = new WP_Query($args1);

if ( $latest_posts->have_posts() ) { ?>
            <div class="slider_widgets">
                <div class="slider_widgets_one">
                    <h3 class="title" style="background:<?php echo $r_title_bg_color;?>; color:<?php echo $r_title_txt_color;?>"><?php echo $lttitle; ?></h3>
                    <div class="feature-grid">
                    <?php  while ($latest_posts->have_posts()): $latest_posts->the_post(); ?>
        <div class="post-item one">
            <div class="post-thumb">
<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
         the_post_thumbnail( 'section-one-small' );
        }
    ?>
</div>
            <div class="post-item-content">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="entry-meta">
                    <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
                    <span class="comments-link"><?php THunk_Customizer_Comment(); ?></span>
                </div>
            </div>
        </div>
<?php endwhile; ?>
                    </div>
                </div>
            </div>
<?php } wp_reset_postdata(); ?>

    </div>
</section>
<?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance["fcate"] = absint($new_instance["fcate"]);
        $instance['lttitle'] = strip_tags( $new_instance['lttitle'] );
        $instance["ltcate"] = absint($new_instance["ltcate"]);
        $instance["fcount"] = absint($new_instance["fcount"]);
        $instance["title_bg_color"] = $new_instance["title_bg_color"];
        $instance["title_txt_color"] = $new_instance["title_txt_color"];
        $instance["r_title_bg_color"] = $new_instance["r_title_bg_color"];
        $instance["r_title_txt_color"] = $new_instance["r_title_txt_color"];
        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : __('Featured Post Title','themehunk-customizer');
        $fcate = isset($instance['fcate']) ? absint($instance['fcate']) : 0;
        $lttitle = isset($instance['lttitle']) ? esc_attr($instance['lttitle']) : __('Latest Post Title','themehunk-customizer');
        $ltcate = isset($instance['ltcate']) ? absint($instance['ltcate']) : 0;
        $fcount = isset($instance['fcount']) ? absint($instance['fcount']) : 4;
        $title_bg_color = isset($instance['title_bg_color']) ? $instance['title_bg_color'] :"#66cda9";
        $title_txt_color = isset($instance['title_txt_color']) ? $instance['title_txt_color'] :"#fff";
        $r_title_bg_color = isset($instance['r_title_bg_color']) ? $instance['r_title_bg_color'] :"#66cda9";
        $r_title_txt_color = isset($instance['r_title_txt_color']) ? $instance['r_title_txt_color'] :"#fff";
       


$termarr = array('child_of'   => 0);
$terms = get_terms('category' ,$termarr);
$foption = $ltoption = '';
foreach($terms as $cat) {
    $term_id = $cat->term_id;
    $selected1 = ($fcate==$term_id)?'selected':'';
    $selected2 = ($ltcate==$term_id)?'selected':'';
$foption .= '<option value="'.$term_id.'" '.$selected1.'>'.$cat->name.'</option>';
$ltoption .= '<option value="'.$term_id.'" '.$selected2.'>'.$cat->name.'</option>';
}
    ?>
    <style>
    .thunk-widget-title{
     background: #d9e8e9;
    padding: 6px;
    text-align: center;
    border-radius: 1px;
}
    </style>
     <div class="clearfix"></div>
     <img src="<?php echo THEMEHUNK_CUSTOMIZER_STYLE1; ?>" />
     <p class="thunk-widget-title">Left Column Slider Setting</p>
    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Featured Post Title','themehunk-customizer'); ?></label>
    <input name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"  class="widefat" value="<?php echo $title; ?>" >
    </p>
     <p><label for="<?php echo $this->get_field_id('fcount'); ?>"><?php _e('Add Number Of Post To Show','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('fcount'); ?>" name="<?php echo $this->get_field_name('fcount'); ?>" type="text" value="<?php echo $fcount; ?>" size="3" /></p>
        <p>
    <p>
    <label for="<?php echo $this->get_field_id('fcate'); ?>"><?php _e('Choose Category To Show Post','themehunk-customizer'); ?></label>
        <select name="<?php echo $this->get_field_name('fcate'); ?>" ><?php echo $foption; ?></select>
    </p>
     <p><label for="<?php echo $this->get_field_id( 'title_bg_color' ); ?>" style="display:block;"><?php _e( 'Title Background Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'title_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $title_bg_color ); ?>" />
    </p>
    

    <p>
     <label for="<?php echo $this->get_field_id( 'title_txt_color' ); ?>" style="display:block;"><?php _e( 'Text Color','themehunk-customizer' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_txt_color' ); ?>" name="<?php echo $this->get_field_name( 'title_txt_color' ); ?>" type="text" value="<?php echo esc_attr( $title_txt_color); ?>" />
        </p>
    <div class='tchr'></div>
         <p class="thunk-widget-title">Right Column Setting</p>
     <p><label for="<?php echo $this->get_field_id('lttitle'); ?>"><?php _e('Latest Post Title','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('lttitle'); ?>" name="<?php echo $this->get_field_name('lttitle'); ?>" type="text" value="<?php echo $lttitle; ?>" /></p>
        <p>
 <p>
    <label for="<?php echo $this->get_field_id('ltcate'); ?>"><?php _e('Choose Category To Show Post','themehunk-customizer'); ?></label>
<select name="<?php echo $this->get_field_name('ltcate'); ?>" ><?php echo $ltoption; ?></select>    
    </p>
 <p><label for="<?php echo $this->get_field_id( 'r_title_bg_color' ); ?>" style="display:block;"><?php _e( 'Title Background Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'r_title_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'r_title_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $r_title_bg_color ); ?>" />
    </p>
    

    <p>
     <label for="<?php echo $this->get_field_id( 'r_title_txt_color' ); ?>" style="display:block;"><?php _e( 'Text Color','themehunk-customizer' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'r_title_txt_color' ); ?>" name="<?php echo $this->get_field_name( 'r_title_txt_color' ); ?>" type="text" value="<?php echo esc_attr( $r_title_txt_color); ?>" />
        </p>

        <?php
    }
}
?>