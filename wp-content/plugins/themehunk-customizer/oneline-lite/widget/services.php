<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 *  Multi-Service Widget
 */
class themehunk_customizer_services_widget extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-services',
            'description' => 'Show your services provided');
        parent::__construct('themehunk-customizer-services-widget', __('ThemeHunk : Service Widget','themehunk-customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;

        $text = isset($instance['text'])?$instance['text']:__('writing your description','themehunk-customizer');
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:__('New Title','themehunk-customizer');
        $fontaws = isset($instance['fontaws'])?$instance['fontaws']:'fa fa-taxi';
        $iconcolor = isset($instance['iconcolor'])?$instance['iconcolor']:'#D4B068';
        $titlecolor = isset($instance['titlecolor'])?$instance['titlecolor']:'#111';
        $desccolor = isset($instance['desccolor'])?$instance['desccolor']:'#1f1f1f';
       ?>
        <li class="service-list">
            <div class="service-icon"><a  href="<?php echo $link; ?>"><i style="color:<?php echo $iconcolor;?>"  class="<?php echo $fontaws; ?>"></i></a></div>
            <div class="service-title"><a style="color:<?php echo $titlecolor; ?>" href="<?php echo $link; ?>"><?php echo apply_filters('widget_title', $title ); ?></a></div>
                <div class="service-content"><p style="color:<?php echo $desccolor; ?>"><?php echo $text; ?></p></div>
            </li>

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['fontaws'] = $new_instance['fontaws'];
        $instance['title']   = strip_tags( $new_instance['title'] );
        $instance['text']    = $new_instance['text'];
        $instance['link']    = $new_instance['link'];
        $instance['titlecolor'] = $new_instance['titlecolor'];
        $instance['iconcolor']  = $new_instance['iconcolor'];
        $instance['desccolor']  = $new_instance['desccolor'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $fontaws = esc_attr($instance['fontaws']);
        $text = $instance['text'];
        $link = $instance['link'];
        $titlecolor = $instance['titlecolor'];
        $iconcolor = $instance['iconcolor'];
        $desccolor = $instance['desccolor'];

    } else {
        $title = '';
        $fontaws = 'fa fa-taxi';
        $text = '';
        $link = 'http://';
        $titlecolor = '#111';
        $iconcolor = '#D4B068';
        $desccolor = '#1f1f1f';
    }
    ?>
        <div class="clearfix"></div>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>" style="margin-top:5px;">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description','themehunk-customizer'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','themehunk-customizer');  _e('ex: http://www.abc.com','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
       </p>
       <p>
        <label for="<?php echo $this->get_field_id('fontaws'); ?>"><?php _e('Font Awesome Icon','themehunk-customizer'); ?></label>
        <label style="padding-bottom: 5px; padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws'); ?>" id="<?php echo $this->get_field_id('fontaws'); ?>" value="<?php  echo $fontaws; ?>" style="margin-top:5px;">
       </p>

       <p><label for="<?php echo $this->get_field_id( 'iconcolor' ); ?>" style="display:block;"><?php _e( 'Icon Color','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'iconcolor' ); ?>" name="<?php echo $this->get_field_name( 'iconcolor' ); ?>" type="text" value="<?php echo esc_attr( $iconcolor ); ?>" />
      </p>
        <p><label for="<?php echo $this->get_field_id( 'titlecolor' ); ?>" style="display:block;"><?php _e( 'Title Color','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'titlecolor' ); ?>" name="<?php echo $this->get_field_name( 'titlecolor' ); ?>" type="text" value="<?php echo esc_attr( $titlecolor ); ?>" />
      </p>
      <p><label for="<?php echo $this->get_field_id( 'desccolor' ); ?>" style="display:block;"><?php _e( 'Description Color','themehunk-customizer' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'desccolor' ); ?>" name="<?php echo $this->get_field_name( 'desccolor' ); ?>" type="text" value="<?php echo esc_attr( $desccolor ); ?>" />
      </p>

        <?php
    }
}