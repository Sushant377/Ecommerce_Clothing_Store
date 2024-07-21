<?php
/*
 *  Testimonial Widget
 *
 */
if ( ! class_exists('shopline_testimonial')) :
// register widget
add_action('widgets_init', 'shopline_testimonial_widget');
function shopline_testimonial_widget() {
    register_widget( 'shopline_testimonial' );
}
// shopline_testimonial widget class
class shopline_testimonial extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'shopline-testimonial');
        parent::__construct('shopline-testimonial-widget', __('Shopline : Testimonial Widget','shopline'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;

        $link_text = isset($instance['text'])?$instance['text']:'Link Text';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
        $desc = isset($instance['desc'])?$instance['desc']:'';

        $auth_color = isset($instance['auth_color'])?$instance['auth_color']:'';

        $desc_color = isset($instance['desc_color'])?$instance['desc_color']:'';

        $link_color = isset($instance['link_color'])?$instance['link_color']:'';

        $test_bg_color = isset($instance['test_bg_color'])?$instance['test_bg_color']:'';
        ?>
        <div class="testimonial-content item">
            <div class="figure-testimonial" style="background-color:<?php echo $test_bg_color; ?>;">
            <?php  if($authpic!=''){ ?>
            <?php 
                        $img_path = th_image_resize($authpic,140, 140);
                        $image_url = $img_path['url'];?>
             <img src="<?php echo $image_url; ?>">
             <?php } ?>
             <a style="color:<?php echo $link_color; ?>;" class="web-link" href="<?php echo $link; ?>"><?php echo $link_text; ?></a>        
            <p style="color:<?php echo $desc_color; ?>;"><?php echo $desc; ?></p>
            <h4 style="color:<?php echo $auth_color; ?>;"><?php echo apply_filters('widget_title', $title ); ?></h4>
            </div>
        </div>
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
        $instance['auth_color'] = $new_instance['auth_color'];
        $instance['desc_color'] = $new_instance['desc_color'];
    $instance['link_color'] = $new_instance['link_color'];
    $instance['test_bg_color'] = $new_instance['test_bg_color'];
        return $instance;
    }

    function form($instance) {
        if( $instance) {
        $title = esc_attr($instance['title']);
        $authpic = strip_tags($instance['authpic']);
        $text = $instance['text'];
        $link = $instance['link'];
        $desc = $instance['desc'];
        $auth_color = $instance['auth_color'];
        $desc_color = $instance['desc_color'];
        $link_color = $instance['link_color'];
        $test_bg_color = $instance['test_bg_color'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
        $desc = '';
        $auth_color = '#080808';
        $desc_color = '#666666';
        $link_color = '#666666';
        $test_bg_color = '#fff';
    }
    ?>
        <div class="clearfix"></div>
        <label style="padding-bottom:0px;" for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Author Image','shopline'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <p>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button-primary custom_media_button button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author Name','shopline'); ?>
              </label>
        <input name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"  class="widefat" value="<?php echo $title; ?>">
        </p>
       <p>
        <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description','shopline'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('desc'); ?>" id="<?php echo $this->get_field_id('desc'); ?>"  class="widefat" ><?php echo $desc; ?></textarea>
        </p>
        <p>
         <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Website Display Text','shopline'); ?> (ex: Mywebsite.com)
        </label>
        <input name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" value="<?php echo $text; ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Website Link','shopline'); ?> (ex: http://www.abc.com)</label>
        <input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>"  class="widefat" value="<?php echo $link; ?>"> 
       </p>

        <p><label for="<?php echo $this->get_field_id( 'auth_color' ); ?>" style="display:block;"><?php _e( 'Author Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'auth_color' ); ?>" name="<?php echo $this->get_field_name( 'auth_color' ); ?>" type="text" value="<?php echo esc_attr( $auth_color ); ?>" />
        </p>

        <p><label for="<?php echo $this->get_field_id( 'desc_color' ); ?>" style="display:block;"><?php _e( 'Description Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'desc_color' ); ?>" name="<?php echo $this->get_field_name( 'desc_color' ); ?>" type="text" value="<?php echo esc_attr( $desc_color ); ?>" />
        </p>

        <p><label for="<?php echo $this->get_field_id( 'link_color' ); ?>" style="display:block;"><?php _e( 'Link Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'link_color' ); ?>" name="<?php echo $this->get_field_name( 'link_color' ); ?>" type="text" value="<?php echo esc_attr( $link_color ); ?>" />
        </p>

        <p><label for="<?php echo $this->get_field_id( 'test_bg_color' ); ?>" style="display:block;"><?php _e( 'Background Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'test_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'test_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $test_bg_color ); ?>" />
        </p>

        <?php
    }
}
endif;
?>