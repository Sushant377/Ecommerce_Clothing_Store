<?php

class Thaps_Widget extends WP_Widget {
 
    function __construct() {
        $widget_ops = array(
        	'classname' => 'thaps-widget',
            'description' => esc_html__('Show your TH Advance Search Bar','th-advance-product-search')
             );

        parent::__construct('thaps-widget', esc_html__('TH Advance Search Widget','th-advance-product-search'), $widget_ops);
 
           add_action( 'widgets_init', function() {

            register_widget( 'Thaps_Widget' );


        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="thaps-advance-widget-search ' . esc_attr($instance['thaps-style']) .'">';
 
        echo do_shortcode('[th-aps-wdgt layout="' . esc_attr($instance['thaps-style']) . '"]');
 
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ){
        $selec_attr = array(

          'id'=>'thaps-style',
          'label'=> esc_html__('Choose Product Type ','th-advance-product-search'),
          'default' => 'default_style',
          'option' => array('default_style'  =>esc_html__('Default','th-advance-product-search'),
                            'bar_style'      =>esc_html__('Search bar only','th-advance-product-search'),
                            'icon_style'     =>esc_html__('Search Icon only','th-advance-product-search'),
                            'flexible-style' =>esc_html__('Icon on mobile, search bar on desktop','th-advance-product-search')
                        )
          );


        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'th-advance-product-search' );
        $text = ! empty( $instance['thaps-style'] ) ? $instance['thaps-style'] : esc_html__( '', 'th-advance-product-search' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'th-advance-product-search' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
      

         <?php 
            $id = $selec_attr['id'];
	        $optn = isset($instance[$id]) ? $instance[$id]: $selec_attr['default'] ;
	      ?> 
         <p><label for="<?php echo esc_attr($this->get_field_id($id)); ?>"><?php  echo esc_attr($custarr['label']); ?></label>
         	
	     <select id="<?php echo esc_attr($this->get_field_id($id)); ?>" name="<?php echo esc_attr($this->get_field_name($id)); ?>" >
	     	<?php foreach( $selec_attr['option'] as $value => $title){ ?>
	     		<option value ="<?php echo esc_attr($value); ?>" <?php if($optn==$value){ echo 'selected'; }?> ><?php echo esc_html($title); ?> </option>
	     		<?php } ?>
	     </select>
	        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['thaps-style'] = ( !empty( $new_instance['thaps-style'] ) ) ? $new_instance['thaps-style'] : '';
 
        return $instance;
    }
 
}
$my_widget = new Thaps_Widget();