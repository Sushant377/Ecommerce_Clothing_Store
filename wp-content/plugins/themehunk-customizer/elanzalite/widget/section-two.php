<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 *  Testimonial Widget
  */
class themehunk_customizer_section_two extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-section-two',
            'description' => 'Display featured post slider');
        parent::__construct('themehunk-customizer-section-two', __('THunk : Post Style 2','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $title = isset($instance['title'])?$instance['title']:__('Top Stories','themehunk_customizer');
        $cate = isset($instance['cate']) ? absint($instance['cate']) : 0;
        $count = isset($instance['count']) ? absint($instance['count']) : 4;
        $title_bg_color = isset($instance['title_bg_color'])? $instance['title_bg_color']:'#66cda9';
        $title_txt_color = isset($instance['title_txt_color'])? $instance['title_txt_color']:'#fff';

        $args = array(
            'order' => 'DESC',
            'ignore_sticky_posts' => 1,
            'post_type' => 'post',
            'post_status' => 'publish',
            'meta_key' => '_thumbnail_id',
            'posts_per_page' => $count, 
            'cat' => $cate
        );
            $query_posts = new WP_Query($args);

?>
<section id="section_two">
        <div class="inner_wrap">
            <div class="post_slide">
                <h3 class="title" style="background:<?php echo $title_bg_color;?>; color:<?php echo $title_txt_color;?>"><?php echo apply_filters('widget_title', $title ); ?></h3>
                        <?php if ( $query_posts->have_posts() ) { ?>

                <div class="owl-carousel owl-theme">
<?php  while ($query_posts->have_posts()): $query_posts->the_post();
?>
                    <div class="item">
                        <div class="post-item">
                                <div class="post-thumb">
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
                            the_post_thumbnail('section-two-small');
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
                    </div>
<?php endwhile; ?>

<?php } wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
    </section>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance["cate"] = absint($new_instance["cate"]);
        $instance["count"] = absint($new_instance["count"]);
        $instance["title_bg_color"] = $new_instance["title_bg_color"];
        $instance["title_txt_color"] = $new_instance["title_txt_color"];
        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : __('Top Stories','themehunk-customizer');
        $cate = isset($instance['cate']) ? absint($instance['cate']) : 0;
        $count = isset($instance['count']) ? absint($instance['count']) : 4;
        $title_bg_color = isset($instance['title_bg_color']) ? $instance['title_bg_color'] :"#66cda9";
         $title_txt_color = isset($instance['title_txt_color']) ? $instance['title_txt_color'] :"#fff";


$termarr = array('child_of'   => 0);
$terms = get_terms('category' ,$termarr);
$foption = $ltoption = '';
foreach($terms as $cat) {
    $term_id = $cat->term_id;
    $selected1 = ($cate==$term_id)?'selected':'';
$foption .= '<option value="'.$term_id.'" '.$selected1.'>'.$cat->name.'</option>';
}
    ?>
        <div class="clearfix"></div>
     <img src="<?php echo THEMEHUNK_CUSTOMIZER_STYLE2; ?>" />
    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Featured Post Title','themehunk-customizer'); ?></label>
    <input name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"  class="widefat" value="<?php echo $title; ?>" >
    </p>
     <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Add Number Of Post To Show','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>
        <p>
    <p>
    <label for="<?php echo $this->get_field_id('cate'); ?>"><?php _e('Choose Category To Show Post','themehunk-customizer'); ?></label>
        <select name="<?php echo $this->get_field_name('cate'); ?>" ><?php echo $foption; ?></select>
    </p>

    <p><label for="<?php echo $this->get_field_id( 'title_bg_color' ); ?>" style="display:block;"><?php _e( 'Title Background Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'title_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $title_bg_color ); ?>" />
    </p>
    <p>
     <label for="<?php echo $this->get_field_id( 'title_txt_color' ); ?>" style="display:block;"><?php _e( 'Text Color','themehunk-customizer' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_txt_color' ); ?>" name="<?php echo $this->get_field_name( 'title_txt_color' ); ?>" type="text" value="<?php echo esc_attr( $title_txt_color); ?>" />
        </p>
        <?php
    }
}
?>