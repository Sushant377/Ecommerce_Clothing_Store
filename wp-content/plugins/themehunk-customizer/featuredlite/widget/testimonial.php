<?php
/*
 *  Testimonial widget
 *
 */
// register widget
add_action('widgets_init', 'featuredlite_testimonial_widget');
function featuredlite_testimonial_widget() {
register_widget( 'featuredlite_testimonial' );
}


// add admin scripts
add_action('admin_enqueue_scripts', 'featuredlite_testimonial_enqueue');
function featuredlite_testimonial_enqueue() {
    wp_enqueue_media();
    wp_enqueue_script('featuredlite_testimonial_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
}
// featuredlite_testimonial widget class
class featuredlite_testimonial extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'th-testimonial');
        parent::__construct('testimonial-widget', __('ThemeHunk : Testimonial Widget','featuredlite'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;

        $text = isset($instance['text'])?$instance['text']:'writing your description';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
?>
        <li class="multi-testimonial">
            <span class="multi-testimonial-image"><img src="<?php echo $authpic; ?>"></span>
            <div class="clearfix"></div>
            <blockquote><p><?php echo $text; ?></p></blockquote>
            <a class="author" href="<?php echo $link; ?>"><?php echo apply_filters('widget_title', $title ); ?></a>
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
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $authpic = strip_tags($instance['authpic']);
        $text = $instance['text'];
        $link = $instance['link'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
    }
    ?>
        <div class="clearfix"></div>
        <p>
        <label for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Author Image','featuredlite'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />
</p><p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Author Short bio','featuredlite'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
        </p><p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author Name','featuredlite'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>" style="margin-top:5px;">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author Link','featuredlite'); ?> ex: http://www.abc.com</label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
        </p>
        <?php
    }
}
?>