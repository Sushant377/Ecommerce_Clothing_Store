<?php
/**
 * Dynamic Meta box on default page
 * Calls the th_metaClass on the post edit screen.
 */
if ( ! function_exists( 'big_store_admin_scripts' ) ) :
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
    function big_store_admin_scripts( $hook ){
            
            // Add recommend plugin css
            wp_enqueue_script( 'updates' );
            add_thickbox();
       
    }
endif;
add_action( 'admin_enqueue_scripts', 'big_store_admin_scripts' );

$prefix='big_store_';

$meta_boxes = array(
      array(
        'id' => 'open-meta-box',
        'title' => esc_html__('Dynamic Sidebar','big-store'),
        'pages' => array('page','post','product'),// custom post type array('page','post', 'link')
        'context' => 'side',
        'priority' => 'low',
        'fields' => array(
            array(
                'name' => esc_html__('Sidebar','big-store'),
                'id' => $prefix . 'sidebar_dyn',
                'type' => 'select',
                'std' => 'right',
                'options' => array( 
                    array("value" => 'right',"name" => esc_html__('Right Sidebar','big-store')),
                    array("value" => 'no-sidebar',"name" => esc_html__('No Sidebar','big-store')),
                    array("value" => 'left',"name" =>  esc_html__('Left Sidebar','big-store')),
                    
                 )
             ),
              
        )
    )
);
foreach ($meta_boxes as $meta_box){
    $my_box = new big_store_thMetaDataClass($meta_box);
}

class big_store_thMetaDataClass {
 
    protected $_meta_box;
 
    // create meta box based on given data
    function __construct($meta_box) {
        $this->_meta_box = $meta_box;
        add_action('admin_menu', array(&$this, 'add'));
 
        add_action('save_post', array(&$this, 'save'));
    }
    /// Add meta box for multiple post types
    function add(){
        foreach ($this->_meta_box['pages'] as $page) {
            add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
        }
    }
    // Callback function to show fields in meta box
    function show(){
        global $post;
        // Use nonce for verification
        echo '<input type="hidden" name="th_dynamic_custom_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
        echo '<div class="open-post-meta-box">';
 
        foreach ($this->_meta_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);
 
            echo '<div class="'.esc_attr($field['id']).'">',
                    '<p class="post-attributes-label"><strong for="', esc_attr($field['id']), '">', esc_html($field['name']), '</strong></p>',
                    '<p class="post-attributes-setting">';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', $meta ? $meta : esc_attr($field['std']), '" size="30" style="width:97%" />',
                        '<br />', esc_html($field['desc']);
                    break;
                case 'textarea':
                    echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', $meta ? $meta : esc_html($field['std']), '</textarea>',
                        '<br />', esc_html($field['desc']);
                    break;
                case 'select':
                    echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                    foreach ($field['options'] as $option) {
                        echo '<option value="'.esc_attr($option['value']).'"', $meta == $option['value'] ? ' selected="selected"' : '', '>', esc_html($option['name']), '</option>';
                    }
                    echo '</select>';
                    break;
                case 'radio':
                    foreach ($field['options'] as $option) {
                        $checked='';
                        if($field['std']==$option['value'] && empty($meta)){
                           $checked = 'checked="checked"';
                        }elseif($meta==$option['value']){
                             $checked = 'checked="checked"';
                        }
                       
                        echo '<input type="radio" name="', esc_attr($field['id']), '" value="', esc_attr($option['value']), '"', $checked, '/>', esc_html($option['name']);
                        echo '<br />';
                    }
                    break;
                case 'checkbox':
                    echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />'.esc_html($field['nameslug']);
                    break;
            }
            echo     '<p>',
                '</div>';
        }
 
        echo '</div>';
    }
    // Save data from meta box
    function save($post_id) {
        // verify nonce
          if (!isset($_POST['th_dynamic_custom_box_nonce']) || !wp_verify_nonce($_POST['th_dynamic_custom_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
 
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
 
        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
 
        foreach ($this->_meta_box['fields'] as $field){
            $old = get_post_meta($post_id, $field['id'], true);
            $new = sanitize_key($_POST[$field['id']]);
            if($new && $new != $old){
                update_post_meta($post_id, $field['id'], $new);
            }elseif('' == $new && $old){
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}