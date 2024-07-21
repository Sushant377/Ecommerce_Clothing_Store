<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 *  Add Widget
  */
class themehunk_customizer_section_add extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-section-add',
            'description' => 'Display Banner ad or Google adsense by adding code');
        parent::__construct('themehunk-customizer-section-add', __('THunk : Ad Widget','themehunk_customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $ad_show = isset($instance['ad_show'])?$instance['ad_show']:'ads_image';
        $ad_img_uri = isset($instance['ad_img_uri'])?$instance['ad_img_uri']:'';
        $ads_link = isset($instance['ads_link'])?$instance['ads_link']:'';
        $add_code = isset($instance['add_code'])?$instance['add_code']:__('Add Ad code Here','themehunk_customizer');
?>
<section id="section_adver">
        <div class="inner_wrap">
            <div class="adver_wrap" style="text-align: center;">
                <?php if($ad_show =='ads_image' && $ad_img_uri!=''){?>
                   <a href="<?php echo $ads_link;?>"><img src="<?php echo $ad_img_uri;?>"></a>  
                <?php }if($ad_show =='ads_code'){
                 echo $add_code;
             }
             ?>
           </div>    
        </div>
    </section>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['ad_show'] = $new_instance['ad_show'];
        $instance['ad_img_uri'] = $new_instance['ad_img_uri'];
        $instance['ads_link'] = $new_instance['ads_link'];
        $instance['add_code'] = $new_instance['add_code'];
        return $instance;
    }

    function form($instance) {
        $ad_show = isset($instance['ad_show']) ? $instance['ad_show'] :'ads_image';
        $ad_img_uri = isset($instance['ad_img_uri']) ? $instance['ad_img_uri'] :'';
        $ads_link = isset($instance['ads_link']) ? $instance['ads_link'] :'';
        $add_code = isset($instance['add_code']) ? $instance['add_code'] :'';
    ?>
<p>
<input 
style="margin-right:5px;margin-left:5px;" type="radio" id="role_info" class="widefat" name="<?php echo $this->get_field_name('ad_show'); ?>"  value="ads_image" <?php checked( $ad_show, 'ads_image' ); ?> >For Banner Image
<br/>
<br/>
<input style="margin-right:5px;margin-left:5px;" type="radio" id="role_info" class="widefat" name="<?php echo $this->get_field_name('ad_show'); ?>"  value="ads_code" <?php checked( $ad_show, 'ads_code' ); ?> >For Adsense Code
</p>

<p>
        <label for="<?php echo $this->get_field_id('ad_img_uri'); ?>"><?php _e('Banner Image','themehunk-customizer'); ?>
        </label>
                <?php
            if ( isset($instance['ad_img_uri']) && $instance['ad_img_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['ad_img_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('ad_img_uri'); ?>" id="<?php echo $this->get_field_id('ad_img_uri'); ?>" value="<?php  echo $ad_img_uri; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('ad_img_uri'); ?>_button" name="<?php echo $this->get_field_name('ad_img_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
</p>
     <p>
        <label for="<?php echo $this->get_field_id('ads_link'); ?>"><?php _e('Banner Link','themehunk_customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('ads_link'); ?>" id="<?php echo $this->get_field_id('ads_link'); ?>" value="<?php  if(isset($instance["ads_link"])){ echo $instance['ads_link']; } ?>" style="margin-top:5px;">
    </p>
     
     <p>OR</p>

    <p>
    <label for="<?php echo $this->get_field_id('add_code'); ?>"><?php _e('Google Adsense / Custom Ad','themehunk-customizer'); ?></label>
    <label style="padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Generate <a target="_blank" href="https://www.google.com/adsense/start/">Google Adsense</a> code and paste it below.','themehunk-customizer'); ?></label>
     <textarea  rows="8" name="<?php echo $this->get_field_name('add_code'); ?>" id="<?php echo $this->get_field_id('add_code'); ?>"  class="widefat" placeholder="<?php _e('Ad Generated Here','themehunk-customizer'); ?>"><?php echo $add_code; ?></textarea>
    </p>
        <?php
    }
}
?>