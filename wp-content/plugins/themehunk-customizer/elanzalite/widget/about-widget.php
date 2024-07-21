<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 *  Add Widget
  */
// about me widget class
class themehunk_customizer_aboutme extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-about-me','description' => 'Display member image with description, link and font awesome icons');
        parent::__construct('themehunk-customizer-about-me-widget', __('THunk : About Me','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
        $title = isset($instance['title'])?$instance['title']:'';
        $text = isset($instance['text'])?$instance['text']:'';
        $author_img_uri = isset($instance['author_img_uri'])?$instance['author_img_uri']:'';
        $readlink = isset($instance['readlink'])?$instance['readlink']:'';
        $readtxt = isset($instance['readtxt'])?$instance['readtxt']:'';
        $icon1 = isset($instance['icon1'])?$instance['icon1']:'';
        $icon2 = isset($instance['icon2'])?$instance['icon2']:'';
        $icon3 = isset($instance['icon3'])?$instance['icon3']:'';
        $icon4 = isset($instance['icon4'])?$instance['icon4']:'';
        $linkicon1 = isset($instance['linkicon1'])?$instance['linkicon1']:'http://';
        $linkicon2 = isset($instance['linkicon2'])?$instance['linkicon2']:'http://';
        $linkicon3 = isset($instance['linkicon3'])?$instance['linkicon3']:'http://';
        $linkicon4 = isset($instance['linkicon4'])?$instance['linkicon4']:'http://';
?>
<div class="th-aboutme">
<h4 class="widgettitle">
<?php echo apply_filters('widget_title',$title); ?>
</h4>
<?php if($author_img_uri != ''){ ?>
 <a href="<?php echo $readlink; ?>"><img src="<?php echo esc_url($author_img_uri); ?>" /></a>
 <?php } ?>
 <p><?php echo $text; ?></p>
 <a class="read-more" href="<?php echo $readlink; ?>"><?php echo $readtxt; ?></a>
 <?php if($icon1!=='') {?>
 <div class="about-social-meta">
                  <ul>
                  <li class="about-social-social"><a href="<?php echo $linkicon1;?>"><i  class="<?php echo $icon1; ?>"></i></a></li>
                  <li class="about-social-social"><a href="<?php echo $linkicon2;?>"><i  class="<?php echo $icon2; ?>"></i></a></li>
                  <li class="about-social-social"><a href="<?php echo $linkicon3;?>"><i  class="<?php echo $icon3; ?>"></i></a></li>
                  <li class="about-social-social"><a href="<?php echo $linkicon4;?>"><i  class="<?php echo $icon4; ?>"></i></a></li>
                  </ul>
  </div>
<?php } ?>
</div>

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = $new_instance['text'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['author_img_uri'] = strip_tags( $new_instance['author_img_uri'] );
        $instance['readlink'] = $new_instance['readlink'];
        $instance['readtxt'] = $new_instance['readtxt'];
        $instance['icon1'] = $new_instance['icon1'];
        $instance['icon2'] = $new_instance['icon2'];
        $instance['icon3'] = $new_instance['icon3'];
        $instance['icon4'] = $new_instance['icon4'];
        $instance['linkicon1'] = $new_instance['linkicon1'];
        $instance['linkicon2'] = $new_instance['linkicon2'];
        $instance['linkicon3'] = $new_instance['linkicon3'];
        $instance['linkicon4'] = $new_instance['linkicon4'];
        return $instance;
    }

    function form($instance) {
    if( $instance) {
        $title = $instance['title'];
        $text = $instance['text'];
        $author_img_uri = $instance['author_img_uri'];
        $readlink = $instance['readlink'];
        $readtxt = $instance['readtxt'];
        $icon1 = $instance['icon1'];
        $icon2 = $instance['icon2'];
        $icon3 = $instance['icon3'];
        $icon4 = $instance['icon4'];
        $linkicon1 = $instance['linkicon1'];
        $linkicon2 = $instance['linkicon2'];
        $linkicon3 = $instance['linkicon3'];
        $linkicon4 = $instance['linkicon4'];
       
        
    } else {
        $title = '';
        $text = '';
        $author_img_uri = '';
        $readtxt = '';
        $readlink = 'https://';
        $icon1 = 'fa fa-facebook';
        $icon2 = 'fa fa-twitter';
        $icon3 = 'fa fa-linkedin';
        $icon4 = 'fa fa-google';
        $linkicon1 = '';
        $linkicon2 = '';
        $linkicon3 = '';
        $linkicon4 = '';
    }


    ?>
<div class="clearfix"></div>
<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','themehunk_customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  if(isset($instance["title"])){ echo $instance['title']; } ?>" style="margin-top:5px;">
    </p>
    
<p>
        <label for="<?php echo $this->get_field_id('author_img_uri'); ?>"><?php _e('Member Image','themehunk-customizer'); ?></label>
                <?php
            if ( isset($instance['author_img_uri']) && $instance['author_img_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['author_img_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('author_img_uri'); ?>" id="<?php echo $this->get_field_id('author_img_uri'); ?>" value="<?php  echo $author_img_uri; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('author_img_uri'); ?>_button" name="<?php echo $this->get_field_name('author_img_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
</p>

    <p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('About Me Description','themehunk-customizer'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" >
        <?php if(isset($instance["text"])){ echo $instance['text']; } ?></textarea>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('readtxt'); ?>"><?php _e('Read More Text','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('readtxt'); ?>" id="<?php echo $this->get_field_id('readtxt'); ?>" value="<?php  if(isset($instance["readtxt"])){ echo $instance['readtxt']; } ?>" style="margin-top:5px;">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('readlink'); ?>"><?php _e('Link','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('readlink'); ?>" id="<?php echo $this->get_field_id('readlink'); ?>" value="<?php  if(isset($instance["readlink"])){ echo $instance['readlink']; } ?>" style="margin-top:5px;">
    </p>
    
    <p>
        <label style="padding-bottom: 5px; padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','themehunk-customizer'); ?></label>
        <label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('Fontawesome Social Icon-1','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('icon1'); ?>" id="<?php echo $this->get_field_id('icon1'); ?>" value="<?php  if(isset($instance["icon1"])){ echo $instance['icon1']; } ?>" style="margin-top:5px;">
        <label for="<?php echo $this->get_field_id('linkicon1'); ?>"><?php _e('Social Icon Link','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('linkicon1'); ?>" id="<?php echo $this->get_field_id('linkicon1'); ?>" value="<?php  if(isset($instance["linkicon1"])){ echo $instance['linkicon1']; } ?>" style="margin-top:5px;" placeholder="<?php _e('Social Link-1'); ?>" >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('icon2'); ?>"><?php _e('Fontawesome Social Icon-2','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('icon2'); ?>" id="<?php echo $this->get_field_id('icon2'); ?>" value="<?php  if(isset($instance["icon2"])){ echo $instance['icon2']; } ?>" style="margin-top:5px;">
         <label for="<?php echo $this->get_field_id('linkicon2'); ?>"><?php _e('Social Icon Link','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('linkicon2'); ?>" id="<?php echo $this->get_field_id('linkicon2'); ?>" value="<?php  if(isset($instance["linkicon2"])){ echo $instance['linkicon2']; } ?>" style="margin-top:5px;" placeholder="<?php _e('Social Link-2'); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('icon3'); ?>"><?php _e('Fontawesome Social Icon-3','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('icon3'); ?>" id="<?php echo $this->get_field_id('icon3'); ?>" value="<?php  if(isset($instance["icon3"])){ echo $instance['icon3']; } ?>" style="margin-top:5px;" >
        <label for="<?php echo $this->get_field_id('linkicon3'); ?>"><?php _e('Social Icon Link','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('linkicon3'); ?>" id="<?php echo $this->get_field_id('linkicon3'); ?>" value="<?php  if(isset($instance["linkicon3"])){ echo $instance['linkicon3']; } ?>" style="margin-top:5px;" placeholder="<?php _e('Social Link-3'); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('icon4'); ?>"><?php _e('Fontawesome Social Icon-4','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('icon4'); ?>" id="<?php echo $this->get_field_id('icon4'); ?>" value="<?php  if(isset($instance["icon4"])){ echo $instance['icon4']; } ?>" style="margin-top:5px;">
         <label for="<?php echo $this->get_field_id('linkicon4'); ?>"><?php _e('Social Icon Link','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('linkicon4'); ?>" id="<?php echo $this->get_field_id('linkicon4'); ?>" value="<?php  if(isset($instance["linkicon4"])){ echo $instance['linkicon4']; } ?>" style="margin-top:5px;" placeholder="<?php _e('Social Link-4'); ?>">
    </p>

<?php
    }
}