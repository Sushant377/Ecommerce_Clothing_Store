<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

  /*
  * Add Widget
  */
class themehunk_customizer_section_news extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-section-news',
            'description' => 'Display breaking news slider');
        parent::__construct('themehunk-customizer-section-news', __('THunk : News Slider','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $title = isset($instance['title'])?$instance['title']:__('Breaking News','themehunk_customizer');
        $fcount = isset($instance['fcount']) ? absint($instance['fcount']) : 4;
        $fcate = isset($instance['fcate']) ? absint($instance['fcate']) : 0;
        $news_bg_color = isset($instance['news_bg_color'])? $instance['news_bg_color']:'#0e0e0e';
        $news_tle_color = isset($instance['news_tle_color'])? $instance['news_tle_color']:'#fff';
        $news_post_tle_color = isset($instance['news_post_tle_color'])? $instance['news_post_tle_color']:'#66cda9';
        $news_post_tme_color = isset($instance['news_post_tme_color'])? $instance['news_post_tme_color']:'#bbb';
        $news_post_tme_bgcolor = isset($instance['news_post_tme_bgcolor'])? $instance['news_post_tme_bgcolor']:'#403f3f';

        $args = array(
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'meta_key' => '_thumbnail_id',
            'posts_per_page' => $fcount, 
            'cat' => $fcate
        );
            $featured_posts = new WP_Query($args);
?>
<div class="breaking-new" style="background:<?php echo $news_bg_color;?>">
    <div class="inner-wrap">
    <div class="new-title">
        <h3 style="color:<?php echo $news_tle_color;?>"><?php echo $title; ?></h3>
    </div>
<div id="<?php echo $widget_id; ?>" class="news-ticker-wrap">
<?php if ( $featured_posts->have_posts() ) { ?>
    <ul class="news-ticker">
        <?php  while ($featured_posts->have_posts()): $featured_posts->the_post();?>
        <li><span style="color:<?php echo $news_post_tme_color;?>; background:<?php echo $news_post_tme_bgcolor;?>"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')). ' ago';?></span><a style="color:<?php echo $news_post_tle_color;?>"  target=_blank href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>  
        <?php endwhile; ?>  
    </ul>

<?php } wp_reset_postdata(); ?>

</div>
<div class="page-tab">
<i class="nt-prev fa fa-angle-left" id="nt-prev<?php echo $widget_id; ?>" aria-hidden="true"></i>
<i class="nt-next fa fa-angle-right" id="nt-next<?php echo $widget_id; ?>" aria-hidden="true" ></i>
</div>
  </div>
</div>

<script>
jQuery(window).load(function(){
var wdgetid = '<?php echo $widget_id; ?>';
// newsticker-widget
  var dd = jQuery('#'+wdgetid).easyTicker({
        direction: 'down',
        easing: 'swing',
        speed:'slow',
        interval: 2500,
        height: 'auto',
        visible: 1,
        mousePause:1,
        controls: {
        up: '#nt-prev'+wdgetid,
        down:'#nt-next'+wdgetid,
    }
  }).data('easyTicker');  
           });
</script>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance["fcount"] = absint($new_instance["fcount"]);
        $instance["fcate"] = absint($new_instance["fcate"]);
        $instance["news_bg_color"] = $new_instance["news_bg_color"];
        $instance["news_tle_color"] = $new_instance["news_tle_color"];
        $instance["news_post_tle_color"] = $new_instance["news_post_tle_color"];
        $instance["news_post_tme_color"] = $new_instance["news_post_tme_color"];
        $instance["news_post_tme_bgcolor"] = $new_instance["news_post_tme_bgcolor"];
        return $instance;
    }

    function form($instance) {
      $title = isset($instance['title']) ? esc_attr($instance['title']) : __('Breaking News','themehunk-customizer');  
      $fcate = isset($instance['fcate']) ? absint($instance['fcate']) : 0;
      $fcount = isset($instance['fcount']) ? absint($instance['fcount']) : 4;
      $news_bg_color = isset($instance['news_bg_color']) ? $instance['news_bg_color'] :"#0e0e0e";
      $news_tle_color = isset($instance['news_tle_color']) ? $instance['news_tle_color'] :"#fff";
      $news_post_tle_color = isset($instance['news_post_tle_color']) ? $instance['news_post_tle_color'] :"#66cda9";
      $news_post_tme_color = isset($instance['news_post_tme_color']) ? $instance['news_post_tme_color'] :"#bbb";
      $news_post_tme_bgcolor = isset($instance['news_post_tme_bgcolor']) ? $instance['news_post_tme_bgcolor'] :"#403f3f";


$termarr = array('child_of'   => 0);
$terms = get_terms('category' ,$termarr);
$foption = '<option value="0">Recent Post</option>';
foreach($terms as $cat) {
    $term_id = $cat->term_id;
    $selected1 = ($fcate==$term_id)?'selected':'';
$foption .= '<option value="'.$term_id.'" '.$selected1.'>'.$cat->name.'</option>';
}
    ?>
<div class="clearfix"></div>
   <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','themehunk-customizer'); ?></label>
    <input name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"  class="widefat" value="<?php echo $title; ?>" >
    </p>
    <p><label for="<?php echo $this->get_field_id('fcount'); ?>"><?php _e('Add Number Of Post To Show','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('fcount'); ?>" name="<?php echo $this->get_field_name('fcount'); ?>" type="text" value="<?php echo $fcount; ?>" size="3" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('fcate'); ?>"><?php _e('Select Specific Option To Display Post','themehunk-customizer'); ?></label>
        <select name="<?php echo $this->get_field_name('fcate'); ?>" ><?php echo $foption; ?></select>
    </p>
   <p><label for="<?php echo $this->get_field_id( 'news_bg_color' ); ?>" style="display:block;"><?php _e( 'Background Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'news_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'news_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $news_bg_color ); ?>" />
    </p>

    <p><label for="<?php echo $this->get_field_id( 'news_tle_color' ); ?>" style="display:block;"><?php _e( 'Tilte Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'news_tle_color' ); ?>" name="<?php echo $this->get_field_name( 'news_tle_color' ); ?>" type="text" value="<?php echo esc_attr( $news_tle_color ); ?>" />
    </p>
    <p><label for="<?php echo $this->get_field_id( 'news_post_tle_color' ); ?>" style="display:block;"><?php _e( 'Post Tilte Color:','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'news_post_tle_color' ); ?>" name="<?php echo $this->get_field_name( 'news_post_tle_color' ); ?>" type="text" value="<?php echo esc_attr($news_post_tle_color); ?>" />
    </p>
    <p><label for="<?php echo $this->get_field_id( 'news_post_tme_bgcolor' ); ?>" style="display:block;"><?php _e( 'Post Date Background Color :','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'news_post_tme_bgcolor' ); ?>" name="<?php echo $this->get_field_name( 'news_post_tme_bgcolor' ); ?>" type="text" value="<?php echo esc_attr($news_post_tme_bgcolor); ?>" />
    </p>
    <p><label for="<?php echo $this->get_field_id( 'news_post_tme_color' ); ?>" style="display:block;"><?php _e( 'Post Date Color :','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'news_post_tme_color' ); ?>" name="<?php echo $this->get_field_name( 'news_post_tme_color' ); ?>" type="text" value="<?php echo esc_attr($news_post_tme_color); ?>" />
    </p>

        <?php
    }
}
?>