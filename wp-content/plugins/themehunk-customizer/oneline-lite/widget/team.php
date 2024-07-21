<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 *  team Feature Column widget
 */
class themehunk_customizer_team_widget extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-team',
            'description' => 'Show your team');
        parent::__construct('themehunk-customizer-team-widget', __('ThemeHunk : Team Widget','themehunk-customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:__('New Title','themehunk-customizer');
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
        $deg = isset($instance['deg'])?$instance['deg']:'Designation';
        $fontaws1 = isset($instance['fontaws1'])?$instance['fontaws1']:'';
        $fontaws2 = isset($instance['fontaws2'])?$instance['fontaws2']:'';
        $fontaws3 = isset($instance['fontaws3'])?$instance['fontaws3']:'';
        $fontaws4 = isset($instance['fontaws4'])?$instance['fontaws4']:'';
        $fontaws1link = isset($instance['fontaws1link'])?$instance['fontaws1link']:'';
        $fontaws2link = isset($instance['fontaws2link'])?$instance['fontaws2link']:'';
        $fontaws3link = isset($instance['fontaws3link'])?$instance['fontaws3link']:'';
        $fontaws4link = isset($instance['fontaws4link'])?$instance['fontaws4link']:'';
        $color = isset($instance['color'])?$instance['color']:'';
        $border_color = isset($instance['border_color'])?$instance['border_color']:'';
        $font_color = isset($instance['font_color'])?$instance['font_color']:'';
        $hov_color = isset($instance['hov_color'])?$instance['hov_color']:'';
?>

<li class="team-list">
 <figure class="team-content">
 <?php  if($authpic!=''){ ?>
 <img style="border:3px solid<?php echo $border_color ?>;" src="<?php echo $authpic; ?>">
 <?php } ?>
<figcaption>
            <a href="<?php echo $link;?>"><h3 style="color:<?php echo $font_color; ?>"><?php echo apply_filters('widget_title', $title ); ?></h3></a>
            <h4 style="color:<?php echo $hov_color ?>">
                <?php echo $deg; ?>
            </h4>
            <div class="team-social-meta">
                  <ul>
                  <li  class="team-social-social"><a href="<?php echo $fontaws1link?>"><i style="color:<?php echo $color; ?>" class="<?php echo $fontaws1; ?>"></i></a></li>
                  <li  class="team-social-social"><a href="<?php echo $fontaws2link?>"><i  style="color:<?php echo $color; ?>" class="<?php echo $fontaws2; ?>"></i></a></li>
                  <li class="team-social-social"><a href="<?php echo $fontaws3link?>"><i  style="color:<?php echo $color; ?>"  class="<?php echo $fontaws3; ?>"></i></a></li>
                  <li class="team-social-social"><a href="<?php echo $fontaws4link?>"><i style="color:<?php echo $color; ?>"  class="<?php echo $fontaws4; ?>"></i></a></li>
                  </ul>
              </div>
            </figcaption>
            </figure>   
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
        $instance['deg'] = $new_instance['deg'];
        $instance['fontaws1'] = $new_instance['fontaws1'];
        $instance['fontaws2'] = $new_instance['fontaws2'];
        $instance['fontaws3'] = $new_instance['fontaws3'];
        $instance['fontaws4'] = $new_instance['fontaws4'];
        $instance['fontaws1link'] = $new_instance['fontaws1link'];
        $instance['fontaws2link'] = $new_instance['fontaws2link'];
        $instance['fontaws3link'] = $new_instance['fontaws3link'];
        $instance['fontaws4link'] = $new_instance['fontaws4link'];
        $instance['color'] = $new_instance['color'];
        $instance['border_color'] = $new_instance['border_color'];
        $instance['font_color'] = $new_instance['font_color'];
        $instance['hov_color'] = $new_instance['hov_color'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $authpic = strip_tags($instance['authpic']);
        $text = $instance['text'];
        $link = $instance['link'];
        $deg = $instance['deg'];
        $fontaws1 = $instance['fontaws1'];
        $fontaws2 = $instance['fontaws2'];
        $fontaws3 = $instance['fontaws3'];
         $fontaws4 = $instance['fontaws4'];
        $fontaws1link = $instance['fontaws1link'];
        $fontaws2link = $instance['fontaws2link'];
        $fontaws3link = $instance['fontaws3link'];
        $fontaws4link = $instance['fontaws4link'];
        $color = $instance['color'];
        $border_color = $instance['border_color'];
        $font_color = $instance['font_color'];
        $hov_color = $instance['hov_color'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
        $deg = '';
        $fontaws1 = 'fa fa-facebook';
        $fontaws2 = 'fa fa-twitter';
        $fontaws3 = 'fa fa-linkedin';
        $fontaws4 = 'fa fa-google';
        $fontaws1link = '';
        $fontaws2link = '';
        $fontaws3link = '';
        $fontaws4link = '';
        $color = '';
        $border_color = '';
        $font_color = '';
        $hov_color = '';
    }

    ?>
<div class="clearfix"></div>
        <label for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Member Image','themehunk-customizer'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Member Name','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Designation','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('deg'); ?>" id="<?php echo $this->get_field_id('deg'); ?>" value="<?php  echo $deg; ?>">
      </p>
      
      <p>  <label for="<?php echo $this->get_field_id('fontaws1'); ?>"><?php _e('Social-Icon-1','themehunk-customizer'); ?></label>
      <label style="padding-bottom: 5px; padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','themehunk-customizer'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws1'); ?>" id="<?php echo $this->get_field_id('fontaws1'); ?>" value="<?php  echo $fontaws1; ?>" style="margin-top:5px;">
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws1link'); ?>" id="<?php echo $this->get_field_id('fontaws1link'); ?>" value="<?php  echo $fontaws1link; ?>" placeholder="link"   style="margin-top:5px;"></p>


        <p><label for="<?php echo $this->get_field_id('fontaws2'); ?>"><?php _e('Social-Icon-2','themehunk-customizer'); ?></label>


       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws2'); ?>" id="<?php echo $this->get_field_id('fontaws2'); ?>" value="<?php  echo $fontaws2; ?>" style="margin-top:5px;">
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws2link'); ?>" id="<?php echo $this->get_field_id('fontaws2link'); ?>" value="<?php  echo $fontaws2link; ?>" placeholder="link"   style="margin-top:5px;"></p>
      <p> <label for="<?php echo $this->get_field_id('fontaws3'); ?>"><?php _e('Social-Icon-3','themehunk-customizer'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws3'); ?>" id="<?php echo $this->get_field_id('fontaws3'); ?>" value="<?php  echo $fontaws3; ?>" style="margin-top:5px;">
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws3link'); ?>" id="<?php echo $this->get_field_id('fontaws3link'); ?>" value="<?php  echo $fontaws3link; ?>" placeholder="link"   style="margin-top:5px;">
</p>
<p><label for="<?php echo $this->get_field_id('fontaws4'); ?>"><?php _e('Social-Icon-4','themehunk-customizer'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws4'); ?>" id="<?php echo $this->get_field_id('fontaws4'); ?>" value="<?php  echo $fontaws4; ?>" style="margin-top:5px;">
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws4link'); ?>" id="<?php echo $this->get_field_id('fontaws4link'); ?>" value="<?php  echo $fontaws4link; ?>" placeholder="link"   style="margin-top:5px;">
</p>
<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author Link','themehunk-customizer'); _e('ex: http://www.abc.com','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
</p>
<label for="<?php echo $this->get_field_id( 'border_color' ); ?>" style="display:block;"><?php _e( 'Border Color','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name( 'border_color' ); ?>" type="text" value="<?php echo esc_attr( $border_color ); ?>" />
<label for="<?php echo $this->get_field_id( 'font_color' ); ?>" style="display:block;"><?php _e( 'Text Color','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'font_color' ); ?>" name="<?php echo $this->get_field_name( 'font_color' ); ?>" type="text" value="<?php echo esc_attr( $font_color ); ?>" />

<label for="<?php echo $this->get_field_id( 'hov_color' ); ?>" style="display:block;"><?php _e( 'Designation Color','themehunk-customizer' ); ?></label> 
 <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'hov_color' ); ?>" name="<?php echo $this->get_field_name( 'hov_color' ); ?>" type="text" value="<?php echo esc_attr( $hov_color ); ?>" />
<label for="<?php echo $this->get_field_id( 'color' ); ?>" style="display:block;"><?php _e( 'Social Icon Color','themehunk-customizer' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" type="text" value="<?php echo esc_attr( $color ); ?>" />

        <?php
    }
}
?>