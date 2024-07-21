<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * Include assets
 */
function lfb_admin_assets($hook) {
    $pageSearch = array('admin_page_add-new-form','admin_page_all-form-leads','themehunk_page_wplf-plugin-menu','admin_page_pro-form-leads');
    if(in_array($hook, $pageSearch)){
        wp_enqueue_style('wpth_fa_css', LFB_PLUGIN_URL . 'font-awesome/css/font-awesome.css');
        wp_enqueue_style('lfb-option-css', LFB_PLUGIN_URL . 'css/option-style.css');
        wp_enqueue_style('sweet-dropdown.min', LFB_PLUGIN_URL . 'css/jquery.sweet-dropdown.min.css');
        wp_enqueue_style('wpth_b_css', LFB_PLUGIN_URL . 'css/b-style.css');
        wp_enqueue_script('lfb_modernizr_js', LFB_PLUGIN_URL . 'js/modernizr.js', '', LFB_VER, true);
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script("jquery-ui-sortable");
        wp_enqueue_script("jquery-ui-draggable");
        wp_enqueue_script("jquery-ui-droppable"); 
        wp_enqueue_script("jquery-ui-accordion");
        wp_enqueue_style( 'jquery-ui' );  
        wp_enqueue_script('lfb_upload', LFB_PLUGIN_URL . 'js/upload.js', '', LFB_VER, true);
        wp_enqueue_script('sweet-dropdown.min', LFB_PLUGIN_URL . 'js/jquery.sweet-dropdown.min.js', '', LFB_VER, true);
        wp_enqueue_script('lfb_b_js', LFB_PLUGIN_URL . 'js/b-script.js', array('jquery'), LFB_VER, true);
        wp_localize_script('lfb_b_js', 'backendajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

}
add_action('admin_enqueue_scripts', 'lfb_admin_assets');

function lfb_wp_assets() {
    wp_enqueue_style('lfb_f_css', LFB_PLUGIN_URL . 'css/f-style.css');
    wp_enqueue_script('jquery-ui-datepicker');        
    wp_enqueue_script('lfb_f_js', LFB_PLUGIN_URL . 'js/f-script.js', array('jquery'), LFB_VER, true);
    wp_localize_script('lfb_f_js', 'frontendajax', array('ajaxurl' => admin_url('admin-ajax.php'),'_wpnonce' => wp_create_nonce( 'lfb_front_nonce' )));
    wp_enqueue_style('font-awesome', LFB_PLUGIN_URL . 'font-awesome/css/font-awesome.css');
}
add_action('wp_enqueue_scripts', 'lfb_wp_assets', 15);
/*
 * Register custom menu pages.
 */
function lfb_register_my_custom_menu_page() {

$user = get_userdata( get_current_user_id() );
// Get all the user roles as an array.
$user_roles = $user->roles;
add_submenu_page( 'themehunk-plugins', __('Lead Form Builder', 'wppb'), __('Lead Form Builder', 'wppb'), 'manage_options', 'wplf-plugin-menu','lfb_lead_form_page');
    add_submenu_page(false, __('Add Forms', 'lead-form-builder'), __('Add Forms', 'lead-form-builder'), 'manage_options', 'add-new-form', 'lfb_add_contact_forms');
    if( in_array( 'administrator', $user_roles, true )) {
    add_submenu_page(false, __('View Leads', 'lead-form-builder'), __('View Leads', 'lead-form-builder'), 'manage_options', 'all-form-leads', 'lfb_all_forms_lead');
    }
    add_submenu_page(false, __('Premium Version', 'th-lead-form'), __('Premium Version', 'th-lead-form'), 'manage_options', 'pro-form-leads', 'lfb_pro_feature');

}
add_action('admin_menu', 'lfb_register_my_custom_menu_page');

function lfb_lead_form_page() {
    if (isset($_GET['action']) && isset($_GET['formid'])) {
        $form_action = sanitize_text_field($_GET['action']);
        $this_form_id = intval($_GET['formid']);
        $nonce = isset($_REQUEST['_wpnonce'])?$_REQUEST['_wpnonce']:false;


        if ($form_action == 'delete' && wp_verify_nonce($nonce, '_nonce_verify')) {
            $page_id =1;
            if (isset($_GET['page_id'])) {
            $page_id = intval($_GET['page_id']);
            }
            $th_edit_del_form = new LFB_EDIT_DEL_FORM();
            $th_edit_del_form->lfb_delete_form_content($form_action, $this_form_id,$page_id);
        }
        if ($form_action == 'show' && isset($_GET['formid'])) {
                $fid = intval($_GET['formid']); 
                echo "<div class='lfb-show'><h1>". esc_html('Lead Form Preview Page')."</h1>";
            echo do_shortcode('[lead-form form-id="'.$fid.'" title=Contact Us]');

            echo "<div>";
        }
        if ($form_action == 'today_leads') {
            $th_show_today_leads = new LFB_Show_Leads();
            $th_show_today_leads->lfb_show_form_leads_datewise($this_form_id,"today_leads");
        }
        if ($form_action == 'total_leads') {
            $th_show_all_leads = new LFB_Show_Leads();
            $th_show_all_leads->lfb_show_form_leads_datewise($this_form_id,"total_leads");
        }
    } else {
        $th_show_forms = new LFB_SHOW_FORMS();
        $page_id =1;
        if (isset($_GET['page_id'])) {
        $page_id = intval($_GET['page_id']);
        }
        $th_show_forms->lfb_show_all_forms($page_id);
    }
}

// extra slas remove
function lfb_array_stripslash($theArray){
   foreach ( $theArray as &$v ) if ( is_array($v) ) $v = lfb_array_stripslash($v); else $v = stripslashes($v);
   return $theArray;
}

// form builder update nad delete function
function lfb_add_contact_forms() {
    if (isset($_POST['update_form']) && wp_verify_nonce($_REQUEST['_wpnonce'],'_nonce_verify') ) {
    $data_form =isset($_POST['lfb_form'])?$_POST['lfb_form']:'';
    $update_form_id = intval($_POST['update_form_id']);
    $title = sanitize_text_field($_POST['post_title']);
    unset($_POST['_wpnonce']);
    unset($_POST['post_title']);
    unset($_POST['update_form']);
    unset($_POST['update_form_id']);
    global $wpdb;
    $table_name = LFB_FORM_FIELD_TBL;
    $update_leads = $wpdb->update( 
    $table_name,
    array( 
        'form_title' => $title,
      'form_data' => maybe_serialize($data_form)
    ), 
    array( 'id' => $update_form_id ));
    $rd_url = esc_url(admin_url().'admin.php?page=add-new-form&action=edit&redirect=update&formid='.$update_form_id);
    $complete_url = wp_nonce_url($rd_url);
  }

if (isset($_GET['action']) && isset($_GET['formid'])) {
        $form_action = sanitize_text_field($_GET['action']);
        $this_form_id = intval($_GET['formid']);
        if ($form_action == 'edit') {
            $th_edit_del_form = new LFB_EDIT_DEL_FORM();
            $th_edit_del_form->lfb_edit_form_content($form_action, $this_form_id);
        }
    } else {
        $lf_add_new_form = new LFB_AddNewForm();
        $lf_add_new_form->lfb_add_new_form();
    }
}

function lfb_all_forms_lead() {
    $th_show_forms = new LFB_Show_Leads();
    $th_show_forms->lfb_show_form_leads();
}



function lfb_pro_feature(){

include_once( plugin_dir_path(__FILE__) . 'options/option.php' );

}
