<?php
/*
 *  shopservice Widget
 *
 */
if ( ! class_exists( 'shopline_shopservice' ) ) :

// register widget
add_action('widgets_init', 'shopline_shopservice_widget');
function shopline_shopservice_widget() {
    register_widget( 'shopline_shopservice' );
}
// shopline_service widget class
class shopline_shopservice extends WP_Widget{
    function __construct(){
        $widget_ops = array('classname' => 'shopline-shopservice');
        parent::__construct('shopline-shopservice-widget', __('Shopline : Service Widget','shopline'), $widget_ops);
    }
    function widget($args, $instance){
        extract($args);
        // widget content
        echo $before_widget;
        $service_show = isset($instance['service_show'])?$instance['service_show']:'image';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $icon = isset($instance['icon'])?$instance['icon']:'';
        $desc = isset($instance['desc'])?$instance['desc']:'';
        $title_color = isset($instance['title_color'])?$instance['title_color']:'';
        $desc_color = isset($instance['desc_color'])?$instance['desc_color']:'';
        $icon_color = isset($instance['icon_color'])?$instance['icon_color']:'';
        $ad_img_uri = isset($instance['ad_img_uri'])?$instance['ad_img_uri']:'';
        ?>
        <li class="wow thmkfadeIn" data-wow-duration="3s">
                <div class="wrap">
                    <div class="icon">
                        <?php if($service_show =='icon'){?>
                        <i style="color:<?php echo $icon_color;?>" class="<?php echo $icon; ?>" aria-hidden="true"></i>
                        <?php } else { ?>
                        <?php 
                        $img_path = th_image_resize($ad_img_uri,45, 45);
                        $image_url = $img_path['url'];?>
                        <img src="<?php echo $image_url;  ?>"/>
                        <?php } ?>
                    </div>
                    <div class="text">
                        <h5><a style="color:<?php echo $title_color;?>" href="<?php echo $link;?>"><?php echo $title;?></a></h5>
                        <p style="color:<?php echo $desc_color;?>"><?php echo $desc;?></p>
                    </div>
                </div>
        </li>
<?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['service_show'] = $new_instance['service_show'];
        $instance['icon'] = strip_tags( $new_instance['icon'] );
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['link'] = $new_instance['link'];
        $instance['desc'] = $new_instance['desc'];
        $instance['title_color'] = $new_instance['title_color'];
        $instance['desc_color'] = $new_instance['desc_color'];
        $instance['icon_color'] = $new_instance['icon_color'];
        $instance['ad_img_uri'] = $new_instance['ad_img_uri'];
        return $instance;
    }

    function form($instance) {
        if( $instance) {
        $service_show = isset($instance['service_show']) ? $instance['service_show'] :'image';
        $icon  = $instance['icon'];
        $title = esc_attr($instance['title']);
        $link  = $instance['link'];
        $desc  = $instance['desc'];
        $title_color = $instance['title_color'];
        $desc_color  = $instance['desc_color'];
        $icon_color  = $instance['icon_color'];
        $ad_img_uri = isset($instance['ad_img_uri']) ? $instance['ad_img_uri'] :'';
    } else {
        $service_show ='image';
        $icon = '';
        $title = '';
        $link = '';
        $desc = '';
        $title_color = '#232531';
        $desc_color = '#666666';
        $icon_color = '#080808';
        $ad_img_uri = '';
    }
    ?>
        <div class="clearfix"></div>
<p>
 <label for="<?php echo $this->get_field_id('service_show'); ?>"><?php _e('Choose','shopline'); ?>
        </label>   
<input 
style="margin-right:5px;margin-left:5px;" type="radio" id="role_info" class="widefat" name="<?php echo $this->get_field_name('service_show'); ?>"  value="image" <?php checked( $service_show, 'image' ); ?> >For Image
<br/>
<br/>
<input style="margin-right:5px;margin-left:5px;" type="radio" id="role_info" class="widefat" name="<?php echo $this->get_field_name('service_show'); ?>"  value="icon" <?php checked( $service_show, 'icon' ); ?> >For Icon
</p>
        <p>
        <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon','shopline'); ?></label>
        <label style="padding-bottom: 5px; padding-top:0px;font-size: 12px;font-style: italic;"><?php _e('Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','shopline'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('icon'); ?>" id="<?php echo $this->get_field_id('icon'); ?>"  class="widefat" ><?php echo $icon; ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('ad_img_uri'); ?>"><?php _e('Image','shopline'); ?>
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
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','shopline'); ?>
              </label>
        <input name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"  class="widefat" value="<?php echo $title; ?>">
        </p>
       <p>
        <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description','shopline'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('desc'); ?>" id="<?php echo $this->get_field_id('desc'); ?>"  class="widefat" ><?php echo $desc; ?></textarea>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','shopline'); ?> (ex: http://www.abc.com)</label>
        <input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>"  class="widefat" value="<?php echo $link; ?>"> 
       </p>

        <p><label for="<?php echo $this->get_field_id( 'title_color' ); ?>" style="display:block;"><?php _e( 'Title Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" type="text" value="<?php echo esc_attr( $title_color ); ?>" />
        </p>

        <p><label for="<?php echo $this->get_field_id( 'desc_color' ); ?>" style="display:block;"><?php _e( 'Description Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'desc_color' ); ?>" name="<?php echo $this->get_field_name( 'desc_color' ); ?>" type="text" value="<?php echo esc_attr( $desc_color ); ?>" />
        </p>

        <p><label for="<?php echo $this->get_field_id( 'icon_color' ); ?>" style="display:block;"><?php _e( 'Icon Color:','shopline' ); ?></label> 
        <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" type="text" value="<?php echo esc_attr( $icon_color ); ?>" />
        </p>
        <?php
    }
}
endif;
?>