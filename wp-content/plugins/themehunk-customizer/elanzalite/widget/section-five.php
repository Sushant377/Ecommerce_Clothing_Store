<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 *  Testimonial Widget
  */
class themehunk_customizer_section_five extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-section-five',
            'description' => 'Display post in left and right column with description');
        parent::__construct('themehunk-customizer-section-five', __('THunk : Post Style 5','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $title = isset($instance['title'])?$instance['title']:__('writing your description','themehunk_customizer');
        $one_cate = isset($instance['one_cate']) ? absint($instance['one_cate']) : 0;
        $one_count = isset($instance['one_count']) ? absint($instance['one_count']) : 4;
        $two_cate = isset($instance['two_cate']) ? absint($instance['two_cate']) : 0;
        $two_count = isset($instance['two_count']) ? absint($instance['two_count']) : 4;
        $title_bg_color = isset($instance['title_bg_color'])? $instance['title_bg_color']:'#66cda9';
        $title_txt_color = isset($instance['title_txt_color'])? $instance['title_txt_color']:'#fff';
        $r_title_bg_color = isset($instance['r_title_bg_color'])? $instance['r_title_bg_color']:'#66cda9';
        $r_title_txt_color = isset($instance['r_title_txt_color'])? $instance['r_title_txt_color']:'#fff';
        $args = array(
            'order' => 'DESC',
            'orderby' =>'date',
            'ignore_sticky_posts' => 1,
            'post_type' => 'post',
            'post_status' => 'publish',
           // 'meta_key' => '_thumbnail_id',
            'posts_per_page' => $one_count, 
            'cat' => $one_cate
        );
        if($one_cate != true){
            $args['orderby'] = 'rand';
        }
            $one_posts = new WP_Query($args);
?>
<section id="section_five">
        <div class="inner_wrap">
            <div class="col-one">
        <?php if ( $one_posts->have_posts() ) { $count=1; ?>
             <?php  while($one_posts->have_posts()): $one_posts->the_post();
              ?>
                <?php if($count<=1){ ?>

                <h3 class="title" style="background:<?php echo $title_bg_color;?>">
                    <a style="color:<?php echo $title_txt_color;?>" href="<?php echo esc_url(get_category_link( $one_cate )); ?>"><?php echo get_cat_name($one_cate); ?></a></h3>
                <div class="post-item">
                    
                    <div class="post-thumb"><a href="#"><?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
                        the_post_thumbnail( 'section-five-large' );
                         }
                        ?></a></div>
                    <div class="post-item-content">
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry-meta">
                            <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
                            <span class="comments-link"><?php THunk_Customizer_Comment(); ?></span>
                        </div>
                         <?php the_excerpt(); ?>
                    </div>
                </div>
                <ul class="feat-cat_small_list">
                <?php } else{ ?>
                    <li>
                        <div class="post-item">
                            
                            <div class="post-thumb">
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
                        the_post_thumbnail( 'section-five-small' );
                         }
                        ?></div>
                            <div class="post-item-content">
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-meta">
                                    <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
                                    <span class="comments-link"><?php THunk_Customizer_Comment(); ?></span>
                                </div>
                            </div>
                            
                        </div>
                    </li>

                 <?php } $count++; ?>
              <?php endwhile; } wp_reset_postdata(); ?> 
            </div>
<?php
  $targs = array(
            'order' => 'DESC',
            'orderby' =>'date',
            'ignore_sticky_posts' => 1,
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $two_count, 
            'cat' => $two_cate
        );
  if($two_cate != true){
            $targs['orderby'] = 'rand';
        }
            $two_posts = new WP_Query($targs);
?>
 <div class="col-two">
        <?php if ( $two_posts->have_posts() ) { $count=1; ?>
             <?php  while($two_posts->have_posts()): $two_posts->the_post(); ?>
                <?php if($count<=1){ ?>

                <h3 class="title" style="background:<?php echo $r_title_bg_color;?>"><a style="color:<?php echo $r_title_txt_color;?>" href="<?php echo esc_url(get_category_link( $two_cate )); ?>"><?php echo get_cat_name($two_cate); ?></a></h3>
                <div class="post-item">
                    
                    <div class="post-thumb"><a href="#"><?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
                        the_post_thumbnail( 'section-five-large' );
                         }
                        ?></a></div>
                    <div class="post-item-content">
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry-meta">
                            <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
                            <span class="comments-link"><?php THunk_Customizer_Comment(); ?></span>
                        </div>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <ul class="feat-cat_small_list">
                <?php } else{ ?>
                    <li>
                        <div class="post-item">
                            
                            <div class="post-thumb"><?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
                        the_post_thumbnail( 'section-five-small' );
                         }
                        ?></div>
                            <div class="post-item-content">
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-meta">
                                    <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
                                    <span class="comments-link"><?php THunk_Customizer_Comment(); ?></span>
                                </div>
                            </div>
                            
                        </div>
                    </li>

                 <?php } $count++; ?>
              <?php endwhile; } wp_reset_postdata(); ?> 
            </div>
        </div>
    </section>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance["one_cate"] = absint($new_instance["one_cate"]);
        $instance['one_count'] = strip_tags( $new_instance['one_count'] );
        $instance["two_cate"] = absint($new_instance["two_cate"]);
        $instance['two_count'] = strip_tags( $new_instance['two_count'] );
        $instance["title_bg_color"] = $new_instance["title_bg_color"];
        $instance["title_txt_color"] = $new_instance["title_txt_color"];
        $instance["r_title_bg_color"] = $new_instance["r_title_bg_color"];
        $instance["r_title_txt_color"] = $new_instance["r_title_txt_color"];
        return $instance;
    }

    function form($instance) {
        $one_cate = isset($instance['one_cate']) ? absint($instance['one_cate']) : 0;
        $one_count = isset($instance['one_count']) ? absint($instance['one_count']) : 4; 
        $two_cate = isset($instance['two_cate']) ? absint($instance['two_cate']) : 0;
        $two_count = isset($instance['two_count']) ? absint($instance['two_count']) : 4;
        $title_bg_color = isset($instance['title_bg_color']) ? $instance['title_bg_color'] :"#66cda9";
        $title_txt_color = isset($instance['title_txt_color']) ? $instance['title_txt_color'] :"#fff";
        $r_title_bg_color = isset($instance['r_title_bg_color']) ? $instance['r_title_bg_color'] :"#66cda9";
        $r_title_txt_color = isset($instance['r_title_txt_color']) ? $instance['r_title_txt_color'] :"#fff";


$termarr = array('child_of'   => 0);
$terms = get_terms('category' ,$termarr);
$oneoption = $twooption = '<option value="0">Random Post</option>';

foreach($terms as $cat) {
    $term_id = $cat->term_id;
    $selected1 = ($one_cate==$term_id)?'selected':'';
    $selected2 = ($two_cate==$term_id)?'selected':'';
$oneoption .= '<option value="'.$term_id.'" '.$selected1.'>'.$cat->name.'</option>';
$twooption .= '<option value="'.$term_id.'" '.$selected2.'>'.$cat->name.'</option>';
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
    <img src="<?php echo THEMEHUNK_CUSTOMIZER_STYLE5; ?>" />
    <p class="thunk-widget-title">Left Blog Setting</p>
    <p>
    <label for="<?php echo $this->get_field_id('one_cate'); ?>"><?php _e('Select Specific Option To Display Post','themehunk-customizer'); ?></label>
        <select name="<?php echo $this->get_field_name('one_cate'); ?>" ><?php echo $oneoption; ?></select>
    </p>
     <p><label for="<?php echo $this->get_field_id('one_count'); ?>"><?php _e('Add Number Of Post To Show','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('one_count'); ?>" name="<?php echo $this->get_field_name('one_count'); ?>" type="text" value="<?php echo $one_count; ?>" size="3" /></p>
<p><label for="<?php echo $this->get_field_id( 'title_bg_color' ); ?>" style="display:block;"><?php _e( 'Title Background Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'title_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $title_bg_color ); ?>" />
    </p>
    <p>
     <label for="<?php echo $this->get_field_id( 'title_txt_color' ); ?>" style="display:block;"><?php _e( 'Text Color','themehunk-customizer' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_txt_color' ); ?>" name="<?php echo $this->get_field_name( 'title_txt_color' ); ?>" type="text" value="<?php echo esc_attr( $title_txt_color); ?>" />
        </p>
    
    <p class="thunk-widget-title">Right Blog Setting</p>
      <p>
    <label for="<?php echo $this->get_field_id('two_cate'); ?>"><?php _e('Select Specific Option To Display Post','themehunk-customizer'); ?></label>
        <select name="<?php echo $this->get_field_name('two_cate'); ?>" ><?php echo $twooption; ?></select>
    </p>
     <p><label for="<?php echo $this->get_field_id('two_count'); ?>"><?php _e('Add Number Of Post To Show','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('two_count'); ?>" name="<?php echo $this->get_field_name('two_count'); ?>" type="text" value="<?php echo $two_count; ?>" size="3" /></p>
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