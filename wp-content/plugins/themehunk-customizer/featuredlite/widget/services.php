<?php
/*
 *  Multi Featuredlite Column widget
 *
 */
// register widget
add_action('widgets_init', 'featuredlite_multifeature_column_widget');
function featuredlite_multifeature_column_widget() {
    register_widget( 'featuredlite_multifeature_column' );
}
// featuredlite__multifeature_column widget class
class featuredlite_multifeature_column extends WP_Widget {

    
function __construct() {
        $widget_ops = array('classname' => 'th-multifeature-column');
        parent::__construct('th-multifeature-column-widget', __('ThemeHunk : Multi Services Column','featuredlite'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $text = isset($instance['text'])?$instance['text']:'writing your description';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $fontaws = isset($instance['fontaws'])?$instance['fontaws']:'fa fa-car';
?>
        <li class="multi-featured first">
            <a href="<?php echo $link; ?>"><span class="multi-featured-icon"><i class="<?php echo $fontaws; ?>"></i></span></a>
            <div class="clearfix"></div>

            <a href="<?php echo $link; ?>"><h3><span><?php echo apply_filters('widget_title', $title ); ?></h3></a>
            <p><?php echo $text; ?></p>
        </li>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['fontaws'] = $new_instance['fontaws'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $fontaws = esc_attr($instance['fontaws']);
        $text = $instance['text'];
        $link = $instance['link'];
    } else {
        $title = '';
        $fontaws = 'fa fa-car';
        $text = '';
        $link = 'http://';
    }
    ?>
        <div class="clearfix"></div>
        <p>
        <label for="<?php echo $this->get_field_id('fontaws'); ?>"><?php _e('Font Awesome Icon','featuredlite'); ?></label>
        <label style="padding-bottom: 5px; padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','featuredlite'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws'); ?>" id="<?php echo $this->get_field_id('fontaws'); ?>" value="<?php  echo $fontaws; ?>" style="margin-top:5px;"></p>
        
<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','featuredlite'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>" style="margin-top:5px;"></p><p>
        
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description','featuredlite'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea></p>
        <p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','featuredlite'); ?> ex: http://www.abc.com</label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
        </p>
        <?php
    }
}