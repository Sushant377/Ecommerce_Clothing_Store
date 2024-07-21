<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 *  Testimonial Widget
  */
class themehunk_customizer_testimonial_widget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-testimonial',
            'description' => 'Show your testimonial');
        parent::__construct('themehunk-customizer-testimonial-widget', __('ThemeHunk : Testimonial Widget','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;

        $text = isset($instance['text'])?$instance['text']:__('writing your description','themehunk_customizer');
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:__('New Title','themehunk_customizer');
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
        $desc = isset($instance['desc'])?$instance['desc']:'';
?>
       
        <li><div class="image-test">
        <?php  if($authpic!=''){ ?>
         <img src="<?php echo $authpic; ?>">
         <?php } ?>
        </div>
        <div class="test-cont-heading"><h2><?php echo apply_filters('widget_title', $title ); ?></h2></div>
        <div class="test-cont">
            <a href="<?php echo $link; ?>"><p><?php echo $text; ?></p></a>
            <p><?php echo $desc; ?></p>
        </div>
        </li>

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['authpic'] = $new_instance['authpic'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        $instance['desc'] = $new_instance['desc'];
        return $instance;
    }

    function form($instance) {
        if( $instance) {
        $title = esc_attr($instance['title']);
        $authpic = strip_tags($instance['authpic']);
        $text = $instance['text'];
        $link = $instance['link'];
        $desc = $instance['desc'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
        $desc = '';
    }
    ?>
        <div class="clearfix"></div>
        <label for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Author Image','themehunk-customizer'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />


              <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author Name','themehunk-customizer'); ?>
              </label>
                <textarea  name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"  class="widefat" ><?php echo $title; ?></textarea>

        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Author Website Url','themehunk-customizer'); ?>
        </label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
        
        <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description','themehunk-customizer'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('desc'); ?>" id="<?php echo $this->get_field_id('desc'); ?>"  class="widefat" ><?php echo $desc; ?></textarea>

        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author Link','themehunk-customizer'); _e( 'ex: http://www.abc.com','themehunk-customizer'); ?></label>
       <textarea  name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>"  class="widefat" ><?php echo $link; ?></textarea>
        <?php
    }
}
?>