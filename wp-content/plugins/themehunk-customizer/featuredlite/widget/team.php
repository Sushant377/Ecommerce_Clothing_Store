<?php
/*
 *  team Featuredlite Column widget
 *
 */
// register widget
add_action('widgets_init', 'featuredlite_team_widget');
function featuredlite_team_widget() {
    register_widget( 'featuredlite_team' );
}
// add admin scripts
add_action('admin_enqueue_scripts', 'featuredlite_team_enqueue');
function featuredlite_team_enqueue() {
    wp_enqueue_media();
    wp_enqueue_script('featuredlite_team_script', get_template_directory_uri() . '/js/widget.js', array( 'jquery'), '1.0', true);
}
// featuredlite_team widget class
class featuredlite_team extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'th-team');
        parent::__construct('team-widget', __('ThemeHunk : Team Widget','featuredlite'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $text = isset($instance['text'])?$instance['text']:'writing your description';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
        $deg = isset($instance['deg'])?$instance['deg']:'Designation';
        $fontaws1 = isset($instance['fontaws1'])?$instance['fontaws1']:'';
        $fontaws2 = isset($instance['fontaws2'])?$instance['fontaws2']:'';
        $fontaws3 = isset($instance['fontaws3'])?$instance['fontaws3']:'';
        $fontaws1link = isset($instance['fontaws1link'])?$instance['fontaws1link']:'';
        $fontaws2link = isset($instance['fontaws2link'])?$instance['fontaws2link']:'';
        $fontaws3link = isset($instance['fontaws3link'])?$instance['fontaws3link']:'';
?>
     
<li class="multi-team first">
  <figure class="team-box blue">
  <?php  if($authpic!=''){ ?>
 <img src="<?php echo $authpic; ?>">
 <?php } ?>
  <figcaption>
    <h2><a href="<?php echo $link; ?>"><?php echo apply_filters('widget_title', $title ); ?></a></h2>
    <p><?php echo $text; ?></p>
    <div class="icons">
        <?php if($fontaws1!=''){ ?>
        <a href="<?php echo $fontaws1link; ?>"><i class="<?php echo $fontaws1; ?>" aria-hidden="true"></i></a>
            <?php } ?>
        <?php if($fontaws2!=''){ ?>
        <a href="<?php echo $fontaws2link ?>"><i class="<?php echo $fontaws2; ?>" aria-hidden="true"></i></a>
            <?php } ?>
        <?php if($fontaws3!=''){ ?>
            <a href="<?php echo $fontaws3link; ?>"><i class="<?php echo $fontaws3; ?>" aria-hidden="true"></i></a>
            <?php } ?>
</div>
  </figcaption>
  <div class="position"><?php echo $deg; ?></div>
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
        $instance['fontaws1link'] = $new_instance['fontaws1link'];
        $instance['fontaws2link'] = $new_instance['fontaws2link'];
      $instance['fontaws3link'] = $new_instance['fontaws3link'];

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
        $fontaws1link = $instance['fontaws1link'];
        $fontaws2link = $instance['fontaws2link'];
        $fontaws3link = $instance['fontaws3link'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
        $deg = '';
        $fontaws1 = 'fa fa-facebook';
        $fontaws2 = 'fa fa-twitter';
        $fontaws3 = 'fa fa-linkedin';
        $fontaws1link = '';
        $fontaws2link = '';
        $fontaws3link = '';
    }
    ?>
<div class="clearfix"></div>
<p>
        <label for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Member Image','featuredlite'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />
</p>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Member Name','featuredlite'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Designation','featuredlite'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('deg'); ?>" id="<?php echo $this->get_field_id('deg'); ?>" value="<?php  echo $deg; ?>">
</p>
<p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description','featuredlite'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
</p>        


      <p>  <label for="<?php echo $this->get_field_id('fontaws1'); ?>"><?php _e('Social-Icon-1','featuredlite'); ?></label>
      <label style="padding-bottom: 5px; padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','featuredlite'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws1'); ?>" id="<?php echo $this->get_field_id('fontaws1'); ?>" value="<?php  echo $fontaws1; ?>" style="margin-top:5px;">
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws1link'); ?>" id="<?php echo $this->get_field_id('fontaws1link'); ?>" value="<?php  echo $fontaws1link; ?>" placeholder="link"   style="margin-top:5px;"></p>


        <p><label for="<?php echo $this->get_field_id('fontaws2'); ?>"><?php _e('Social-Icon-2','featuredlite'); ?></label>


       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws2'); ?>" id="<?php echo $this->get_field_id('fontaws2'); ?>" value="<?php  echo $fontaws2; ?>" style="margin-top:5px;">
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws2link'); ?>" id="<?php echo $this->get_field_id('fontaws2link'); ?>" value="<?php  echo $fontaws2link; ?>" placeholder="link"   style="margin-top:5px;"></p>
      <p> <label for="<?php echo $this->get_field_id('fontaws3'); ?>"><?php _e('Social-Icon-3','featuredlite'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws3'); ?>" id="<?php echo $this->get_field_id('fontaws3'); ?>" value="<?php  echo $fontaws3; ?>" style="margin-top:5px;">
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws3link'); ?>" id="<?php echo $this->get_field_id('fontaws3link'); ?>" value="<?php  echo $fontaws3link; ?>" placeholder="link"   style="margin-top:5px;">
</p>
        <p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author Link','featuredlite'); ?> ex: http://www.abc.com</label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
</p>

<?php } } ?>