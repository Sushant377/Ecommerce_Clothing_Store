<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * social Widget
 * This widget shows social icon
 */
class Socialth extends WP_Widget {
    /** constructor */
    function __construct() {
        $widget_ops = array(
            'classname' => 'socialth_widget',
            'description' => 'Display Social Icon in Sidebar'
        );
        parent::__construct('advanced-social-widget', __('THunk : Social-Widget','themehunk_customizer'), $widget_ops);
    }

function widget($args, $instance) {
extract($args); 
// widget content
echo $before_widget;
$title = isset($instance['title'])?$instance['title']:'Latest Theme';

$icon_one_link = isset($instance['icon_one_link'])?$instance['icon_one_link']:'#';

$icon_second_link = isset($instance['icon_second_link'])?$instance['icon_second_link']:'';

$icon_third_link = isset($instance['icon_third_link'])?$instance['icon_third_link']:'';

$icon_four_link = isset($instance['icon_four_link'])?$instance['icon_four_link']:'';

$icon_five_link = isset($instance['icon_five_link'])?$instance['icon_five_link']:'';

$icon_six_link = isset($instance['icon_six_link'])?$instance['icon_six_link']:'';

?>
<!--Start view section-->    
<h4 class="widgettitle">
<?php echo apply_filters('widget_title',$title); ?>
</h4>       
<div class="th-social">
<!--START SOCIAL ICON-->
<ul class="latest-social">
<?php if($icon_one_link!=='') {?>
<li><a target="_blank" href="<?php echo $icon_one_link ?>">
<i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<?php } ?>
<?php if($icon_second_link!=='') {?>
<li><a target="_blank" href="<?php echo $icon_second_link ?>">
<i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
<?php } ?>
<?php if($icon_third_link!=='') {?>
<li><a target="_blank" href="<?php echo $icon_third_link ?>">
<i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<?php } ?>
<?php if($icon_four_link!=='') {?>
<li><a target="_blank" href="<?php echo $icon_four_link ?>">
<i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
<?php } ?>
<?php if($icon_five_link!=='') {?>
<li><a target="_blank" href="<?php echo $icon_five_link ?>">
<i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
<?php } ?>
<?php if($icon_six_link!=='') {?>
<li><a target="_blank" href="<?php echo $icon_six_link ?>">
<i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
<?php } ?>
</ul>   
</div>

<?php
echo $after_widget;       
       
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['icon_one_link'] = $new_instance['icon_one_link'];
        $instance['icon_second_link'] = $new_instance['icon_second_link'];
        $instance['icon_third_link'] = $new_instance['icon_third_link'];
        $instance['icon_four_link'] = $new_instance['icon_four_link'];
        $instance['icon_five_link'] = $new_instance['icon_five_link'];
        $instance['icon_six_link'] = $new_instance['icon_six_link'];
        return $instance;
    }

function form($instance) {
 if( $instance){
        $title = isset($instance['title']) ? esc_attr($instance['title']) :'Title';
        $icon_one_link= $instance['icon_one_link'];
        $icon_second_link = $instance['icon_second_link'];
        $icon_third_link= $instance['icon_third_link'];
        $icon_four_link= $instance['icon_four_link'];
        $icon_five_link= $instance['icon_five_link'];
        $icon_six_link= $instance['icon_six_link'];  
}
else{
        $title = 'Title';
        $icon_one_link= '#';
        $icon_second_link = '';
        $icon_third_link= '';
        $icon_four_link= '';
        $icon_five_link= '';
        $icon_six_link= '';        
}
 ?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Title','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<p><label for="<?php echo $this->get_field_id('icon_one_link'); ?>"><?php _e('Facebook URL','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon_one_link'); ?>" name="<?php echo $this->get_field_name('icon_one_link'); ?>" type="text" value="<?php echo $icon_one_link; ?>" />
        </p> 
        <!-- II  --> 
<p><label for="<?php echo $this->get_field_id('icon_second_link'); ?>"><?php _e('Google URL','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon_second_link'); ?>" name="<?php echo $this->get_field_name('icon_second_link'); ?>" type="text" value="<?php echo $icon_second_link; ?>" />
        </p>
<!-- III --> 
<p><label for="<?php echo $this->get_field_id('icon_second_link'); ?>"><?php _e('Twitter URL','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon_third_link'); ?>" name="<?php echo $this->get_field_name('icon_third_link'); ?>" type="text" value="<?php echo $icon_third_link; ?>" />
        </p>
 <!-- four --> 
<p><label for="<?php echo $this->get_field_id('icon_four_link'); ?>"><?php _e('Pinterest URL','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon_four_link'); ?>" name="<?php echo $this->get_field_name('icon_four_link'); ?>" type="text" value="<?php echo $icon_four_link; ?>" />
        </p>
<!-- FIVE -->
<p><label for="<?php echo $this->get_field_id('icon_five_link'); ?>"><?php _e('Linkedin URL','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon_five_link'); ?>" name="<?php echo $this->get_field_name('icon_five_link'); ?>" type="text" value="<?php echo $icon_five_link; ?>" />
        </p>
<!-- SIX -->
<p><label for="<?php echo $this->get_field_id('icon_six_link'); ?>"><?php _e('Youtube URL','themehunk_customizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon_six_link'); ?>" name="<?php echo $this->get_field_name('icon_six_link'); ?>" type="text" value="<?php echo $icon_six_link; ?>" />
</p>
        <?php
    }
}

?>
