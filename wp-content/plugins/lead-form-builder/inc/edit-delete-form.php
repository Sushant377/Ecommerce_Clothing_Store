<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once('lf-db.php');
Class LFB_EDIT_DEL_FORM {


    function _alowed_tags() {
        $allowed = wp_kses_allowed_html( 'post' );
    
        // form fields - input
        $allowed['a'] = array(
            'href' => array(),
            'class'    => array(),
            'onclick'  => array(),
        );
    // form fields - input
        $allowed['input'] = array(
            'class' => array(),
            'id'    => array(),
            'name'  => array(),
            'value' => array(),
            'type'  => array(),
            'disabled'  => array(),
            'onclick' => array(),
            'placeholder'  => array(),
            'checked'  => array(),
        );
        $allowed['p'] = array(
            'class'    => array(),
            'onclick'  => array(),
            'id'   => array(),
        );

        $allowed['select'] = array(
            'class'    => array(),
            'onclick'  => array(),
            'id'   => array(),
            'name'  => array(),

        );

        $allowed['option'] = array(
            'value'    => array(),
            'selected'   => array(),
        );

        return $allowed;
    }

    function lfb_edit_form_content($form_action, $this_form_id) {
        global $wpdb;
        $th_save_db = new LFB_SAVE_DB($wpdb);
        $table_name = LFB_FORM_FIELD_TBL;
            $prepare_8 =  $wpdb->prepare( "SELECT * FROM $table_name WHERE id = %d LIMIT 1", $this_form_id  );
        $posts = $th_save_db->lfb_get_form_content($prepare_8);
        if ($posts){
            $form_title = esc_html($posts[0]->form_title);
            $form_data_result = maybe_unserialize($posts[0]->form_data);
            $mail_setting_result = $posts[0]->mail_setting;
            $usermail_setting_result = $posts[0]->usermail_setting;
            $captcha_option = $posts[0]->captcha_status;
            $lead_store_option = esc_html($posts[0]->storeType);

            $all_form_fields = $this->lfb_create_form_fields_for_edit($form_title, $form_data_result);
        }
       $form_message ='';
        if(isset($_GET['redirect'])){
            $redirect_value= esc_html($_GET['redirect']);
            if($redirect_value=='create'){
        $form_message='<div id="message" class="updated notice is-dismissible"><p>Form<strong>Saved</strong>.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">'.esc_html__("Dismiss this notice.","lead-form-builder").'</span></button></div>';
        }if($redirect_value=='update'){
            $form_message='<div id="message" class="updated notice is-dismissible"><p>Form <strong>Updated</strong>.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">'.esc_html__("Dismiss this notice.","lead-form-builder").'</span></button></div>';
            }
        }
        $nonce = wp_create_nonce( '_nonce_verify' );
        $update_url ="admin.php?page=add-new-form&action=edit&redirect=update&formid=".$this_form_id.'&_wpnonce='.$nonce;
        
       $email_active = $captcha_active = $form_active = $_active = '';
           if(isset($_GET['email-setting'])){
                        $email_active = 'nav-tab-active';
                }elseif(isset($_GET['captcha-setting'])){
                    $captcha_active = 'nav-tab-active';

                }elseif(isset($_GET['form-setting'])){
                 $form_active = 'nav-tab-active';
                }else{
                $_active = 'nav-tab-active';

                }

        echo '<div class="wrap">';
        include_once( plugin_dir_path(__FILE__) . 'header.php' );
                   echo wp_kses($form_message,$this->_alowed_tags());
        echo '<div class="nav-tab-wrapper">
            <a class="nav-tab edit-lead-form '.esc_attr($_active).'" href="#">'.esc_html__("Edit Form","lead-form-builder").'</a>
            <a class="nav-tab lead-form-email-setting  '.esc_attr($email_active).'" href="#">'.esc_html__("Email Setting","lead-form-builder").'</a>
            <a class="nav-tab lead-form-captcha-setting  '.esc_attr($captcha_active).'" href="#">'.esc_html__("Captcha Setting","lead-form-builder").'</a>
            <a class="nav-tab lead-form-setting  '.esc_attr($form_active).'" href="#">'.esc_html__("Setting","lead-form-builder").'</a>
        </div>
        <div id="sections">
        <span class="back-arrow"><a href="'.admin_url('admin.php?page=wplf-plugin-menu').'" ><img width ="18" src="'.LFB_FORM_BACK_SVG.'" ></a></span>
            <section><div class="wrap">
        <h2>Heading</h2>
        <form method="post" action="'.esc_url($update_url).'" id="new_lead_form">
            <div id="poststuff">
                <div id="post-body">
                    <div id="post-body-content">
                        <div id="titlediv">
                            <div id="titlewrap">
                                <input type="text" class="new_form_heading" name="post_title" placeholder="Enter title here" value="' . $form_title . '" size="30" id="title" spellcheck="true" autocomplete="off"></div><!-- #titlewrap -->
                            <div class="inside">
                            </div>
                        </div><!-- #titlediv -->
                    </div><!-- #post-body-content -->
                </div>
            </div>';
        $this->lfb_basic_form();
        echo wp_kses($all_form_fields,$this->_alowed_tags());
        echo '<div id="append_new_field"></div>
            </table>
            <p class="submit"><input type="submit" class="update_form button-primary" name="update_form" id="update_form" value="Update Form">'.LFB_FORM_PRO_FIELD_TYPE.'<input type="hidden" class="update_form_id button-primary" name="update_form_id" id="update_form_id" value="'.intval($this_form_id).'"></p>
                <input type="hidden" name = "_wpnonce" value="'.$nonce.'" />
            </td>
    </form> 
    </div>
    </section>
            <section>';
        if (is_admin()) {
            $lf_email_setting_form = new LFB_EmailSettingForm($this_form_id);
            $lf_email_setting_form->lfb_email_setting_form($this_form_id,$mail_setting_result,$usermail_setting_result);
        }
        echo '</section>
        <section>';
           if (is_admin()) {
                    $lf_email_setting_form = new LFB_EmailSettingForm($this_form_id);
                    $lf_email_setting_form->lfb_captcha_setting_form($this_form_id, $captcha_option);
                }
           echo '</section><section>';
           if (is_admin()) {
                    $lf_email_setting_form = new LFB_EmailSettingForm($this_form_id);
                    $lf_email_setting_form->lfb_lead_setting_form($this_form_id, $lead_store_option);
                }
           echo '</section></div>
    </div>';
    }
    
    function lfb_delete_form_content($form_action, $this_form_id, $page_id) {

       
        $nonce = isset($_REQUEST['_wpnonce'])?$_REQUEST['_wpnonce']:false;
    
        if (wp_verify_nonce($nonce, '_nonce_verify')) {
                    
                global $wpdb;
                $th_save_db = new LFB_SAVE_DB($wpdb);
                $table_name = LFB_FORM_FIELD_TBL;
            $update_leads = $wpdb->update( 
            $table_name,
            array( 
                'form_status' => esc_html('Disable')
            ), 
            array( 'id' =>$this_form_id));
                if($update_leads){    
                    $th_show_forms = new LFB_SHOW_FORMS();
                    $th_show_forms->lfb_show_all_forms($page_id);
                }

        }else{
            echo "Invalid URL";
        }
    }

    function lfb_basic_form() {
        echo "<div class='inside spth_setting_section'  id='wpth_add_form'>
          <h2 class='sec_head'>".esc_html__('Form Fields','lead-form-builder')."</h2>
          <table class='widefat' id='sortable'>          
          <thead>
          <tr>
          <th>".esc_html__('Field name','lead-form-builder')."</th>
          <th>".esc_html__('Field Type','lead-form-builder')."</th>
          <th>".esc_html__('Default Value','lead-form-builder')."</th>
          <th>".esc_html__('Use Default Value as Placeholder','lead-form-builder')."</th>
          <th>".esc_html__('Required','lead-form-builder')."</th>
          <th>".esc_html__('Action','lead-form-builder')."</th>
          </tr></thead>";
          //          <th>S.N.</th>

    }

    function lfbFormField($key){
            $fields =  array('name'=>'Name','email'=>'Email','message'=>'Message',
                'dob'=>'DOB(Date of Birth)','date'=>'Date','text'=>'Text (Single Line Text)','textarea'=>'Textarea (Multiple Line Text)','htmlfield'=>'Content Area (Read only Text)','url'=>'Link (Website Url)','number'=>'Number (Only Numeric 0-9)','upload'=>'File Upload','radio'=>'Radio (Choose Single Option)','option'=>'Option (Choose Single Option)','checkbox'=>'Checkbox (Choose Multiple Option)','terms'=>'Checkbox (Terms & condition)');
            $return = isset($fields[$key])?$fields[$key]:'';
            return $return;
    }

    // field name
    function lfbFieldName($fieldv,$fieldID){
    $fieldName = isset($fieldv['field_name'])?$fieldv['field_name']:'';

    $return = '<td><input type="text" name="lfb_form[form_field_' . $fieldID . '][field_name]" id="field_name_' . $fieldID . '" value="' . $fieldName . '"></td>';
        return $return;
    }

    function lfbFieldTypeDefault($fieldtype,$name,$fieldID){
        $return = '<td><select class="form_field_select" name="lfb_form[form_field_' . $fieldID . '][field_type][type]" id="field_type_' . $fieldID . '">
            <option value="'.$fieldtype.'" selected="selected">'.$name.'</option>
           </select></td>';
           return $return;
    }

    // field default value
    function lfbFieldDefaultValue($fieldv,$fieldID,$fieldtype=''){
    $defaultValue = isset($fieldv['default_value'])?$fieldv['default_value']:'';
          $hide = ($fieldtype=='terms')?'style=display:none;':'';

    $return = '<td><input '.$hide.' type="text" class="default_value" name="lfb_form[form_field_' . $fieldID . '][default_value]" id="default_value_' . $fieldID . '" value="'.$defaultValue.'">';

        return $return;
        
    }

    function lfbHtmlFieldValue($fieldv,$fieldID){
    $defaultValue = isset($fieldv['default_value'])?$fieldv['default_value']:'';

    $return = '<td colspan="3" ><div class="default_htmlfield_' . $fieldID . '" id="default_htmlfield"><textarea class="default_value default_htmlfield" name="lfb_form[form_field_' . $fieldID . '][default_value]" id="default_value_'. $fieldID . '">'.$defaultValue.'</textarea></div>';
        return $return;  
    }

     // field placeholder
    function lfbFieldPlaceholder($fieldv,$fieldID,$fieldtype){
        $fieldPlaceholder = isset($fieldv['default_placeholder'])?$fieldv['default_placeholder']:'';
        $isRequired = ($fieldPlaceholder == 1 ? 'checked' : "" );
        $hide = ($fieldtype=='terms')?'style=display:none;':'';

        $return = '<td><input '.$hide.' type="checkbox" class="default_placeholder" name="lfb_form[form_field_' . $fieldID . '][default_placeholder]" id="default_placeholder_' . $fieldID . '" value="1" '.$isRequired.'></td>';
        return $return;
    }

    // field is required
    function lfbFieldIsRequired($fieldv,$fieldID){
    $fieldRequired = isset($fieldv['is_required'])?$fieldv['is_required']:'';
    $isRequired = ($fieldRequired == 1 ? 'checked' : "" );
    $return = '<td><input type="checkbox" name="lfb_form[form_field_' . $fieldID . '][is_required]" id="is_required_'.$fieldID.'" value="1" '.$isRequired.'></td>';
    return $return;
    }

    // remove field button
    function lfbRemoveField($fieldID){
    $return = '<td id="wpth_add_form_table_' . $fieldID . '">
           <input type="button" class="button lf_remove" name="remove_field" id="remove_field_' . $fieldID . '" onclick="remove_form_fields(' . $fieldID . ')" value="Remove">
           <input type="hidden" value="' . $fieldID . '" name="lfb_form[form_field_' . $fieldID . '][field_id]">
           </td>';
               return $return;
    }

    function lfbAddField($fieldv,$fieldID,$lastFieldID){

            $return = '<td></td><td><input type="hidden" name="lfb_form[form_field_'.$fieldID.'][field_name]" id="field_name_'.$fieldID.'" value="submit"><select class="form_field_select" name="lfb_form[form_field_'.$fieldID.'][field_type][type]" id="field_type_'.$fieldID.'">
                <option value="submit" selected="selected">'.esc_html("Submit Button").'</option>
                       </select></td>';

        $return .=$this->lfbFieldDefaultValue($fieldv,$fieldID);

        $fieldButton = '<span><input type="button" class="button lf_addnew" name="add_new" id="add_new_'.$lastFieldID.'" onclick="add_new_form_fields('.$lastFieldID.')" value="Add New"></span>';
        $return .='<td><input type="hidden" value="' . $fieldID . '" name="lfb_form[form_field_' . $fieldID . '][field_id]"></td>';
        $return .= '<td></td><td class="add-field" id="wpth_add_form_table_' . $fieldID . '">'.$fieldButton.'
        </td>';

        return $return;
        
    }

    function lfbTypeText($fieldv,$fieldtype,$fieldID){
        $checkboxField = $isChecked = $return ='';
        $value = $this->lfbFormField($fieldtype);

         $return .= $this->lfbFieldName($fieldv,$fieldID);
         $return .= $this->lfbFieldTypeDefault($fieldtype,$value,$fieldID);
         $return .= $this->lfbFieldDefaultValue($fieldv,$fieldID,$fieldtype);
         $return .= $this->lfbFieldPlaceholder($fieldv,$fieldID,$fieldtype);
         $return .= $this->lfbFieldIsRequired($fieldv,$fieldID);
         $return .= $this->lfbRemoveField($fieldID);
         return $return;
    }

    function lfbTypeTextarea($fieldv,$fieldtype,$fieldID){
        $return ='';
        
         $return .= $this->lfbFieldName($fieldv,$fieldID);
         $return .= $this->lfbFieldTypeDefault('message','Message',$fieldID);
         $return .= $this->lfbFieldDefaultValue($fieldv,$fieldID,$fieldtype);
         $return .= $this->lfbFieldPlaceholder($fieldv,$fieldID,$fieldtype);
         $return .= $this->lfbFieldIsRequired($fieldv,$fieldID);
         $return .= $this->lfbRemoveField($fieldID);
         return $return;
    }

    function lfbhtmlfield($fieldv,$fieldtype,$fieldID){
        $return ='';
        
         $return .= $this->lfbFieldName($fieldv,$fieldID);
         $return .= $this->lfbFieldTypeDefault('htmlfield',esc_html__('Content Area (Read only Text)','lead-form-builder'),$fieldID);
         $return .= $this->lfbHtmlFieldValue($fieldv,$fieldID);
        // $return .= $this->lfbFieldPlaceholder($fieldv,$fieldID);
        // $return .= $this->lfbFieldIsRequired($fieldv,$fieldID);
         $return .= $this->lfbRemoveField($fieldID);
         return $return;
    }

// select option
    function lfbSelectOption($fieldv,$fieldtype,$fieldID){
        $optionField = $isChecked = $return ='';
        $lastFieldID = 0;
            unset($fieldtype['type']);
         foreach ($fieldtype as $key => $value) {
        $checkboxId = str_replace("field_", "", $key);

    $checked = isset($fieldv['default_value']['field']) && $fieldv['default_value']['field']==$checkboxId?'checked':'';

        $fieldMinus = '<p class="button lf_minus" id="delete_option_' . $checkboxId . '" onclick="delete_option_fields(' . $fieldID . ',' . $checkboxId . ')"><i class="fa fa-minus" aria-hidden="true"></i></p>';


    if($lastFieldID < $checkboxId){
            $lastFieldID = $checkboxId;
            $fieldPlus = '<p class="button lf_plus" id="add_new_option_' . $lastFieldID . '" onclick="add_new_option_fields(' . $fieldID . ',' . $lastFieldID . ')"><i class="fa fa-plus" aria-hidden="true"></i></p>';
        }

        $childOption = '<input type="text" class="input_option_val" name="lfb_form[form_field_' . $fieldID . '][field_type][field_' . $checkboxId . ']" id="option_field_' . $checkboxId . '" placeholder="First Choice" value="'.$value.'">';

        // default checked
        $isChecked .='<p id="default_option_value_' . $checkboxId . '">'.$value.' <input type="radio" class="checked" name="lfb_form[form_field_' . $fieldID . '][default_value][field]" id="default_option_value_' . $checkboxId . '" value="' . $checkboxId . '" '.$checked.'></p>';

        $optionField .= $childOption.$fieldMinus;
    }
    $optionField .= $fieldPlus;
     $return .=$this->lfbFieldName($fieldv,$fieldID);

     $return .= '<td>
          <select class="form_field_select" name="lfb_form[form_field_' . $fieldID . '][field_type][type]" id="field_type_' . $fieldID . '">
          <option value="option" selected="selected" >'.esc_html__("Option (Choose Single Option)","lead-form-builder").'</option>
           </select>
            <div class="add_radio_checkbox_' . $fieldID . '" id="add_radio_checkbox">
            <div class="" id="add_option">' . $optionField . '</div>
            </div>
        </td>
        <td><input  style="border:none;" type="text" class="default_value" name="lfb_form[form_field_' . $fieldID . '][default_value]" id="default_value_' . $fieldID . '" value="Choose Default Value" disabled="disabled">
        <div class="add_default_radio_checkbox_' . $fieldID . '" id="add_default_radio_checkbox">
            <div class="" id="default_add_option">' . $isChecked . '</div>
        </div>
        </td>';

    $return .= '<td>-</td>';
           
    $return .= $this->lfbFieldIsRequired($fieldv,$fieldID);

    $return .= $this->lfbRemoveField($fieldID);

        return $return;

    }
// radio options
    function lfbRadio($fieldv,$fieldtype,$fieldID){
        $optionField = $isChecked = $return ='';
        $lastFieldID = 0;
            unset($fieldtype['type']);
         foreach ($fieldtype as $key => $value) {
        $checkboxId = str_replace("field_", "", $key);



    $checked = isset($fieldv['default_value']['field']) && $fieldv['default_value']['field']==$checkboxId?'checked':'';


        $fieldMinus = '<p class="button lf_minus" id="delete_radio_' . $checkboxId . '" onclick="delete_radio_fields(' . $fieldID . ',' . $checkboxId . ')"><i class="fa fa-minus" aria-hidden="true"></i></p>';


        if($lastFieldID < $checkboxId){
            $lastFieldID = $checkboxId;
            $fieldPlus = '<p class="button lf_plus" id="add_new_radio_' . $lastFieldID . '" onclick="add_new_radio_fields(' . $fieldID . ',' . $lastFieldID . ')"><i class="fa fa-plus" aria-hidden="true"></i></p>';
        }
        

        $childOption = '<input type="text" class="input_radio_val" name="lfb_form[form_field_' . $fieldID . '][field_type][field_' . $checkboxId . ']" id="radio_field_' . $checkboxId . '" placeholder="'.esc_html__("First Choice","lead-form-builder").'" value="'.$value.'">';

        // default checked
        $isChecked .='<p id="default_radio_value_' . $checkboxId . '">'.$value.' <input type="radio" class="checked" name="lfb_form[form_field_' . $fieldID . '][default_value][field]" id="default_radio_value_' . $checkboxId . '" value="' . $checkboxId . '" '.$checked.'></p>';

        $optionField .= $childOption.$fieldMinus;
    }
    $optionField .= $fieldPlus;

     $return .=$this->lfbFieldName($fieldv,$fieldID);

     $return .= '<td>
          <select class="form_field_select" name="lfb_form[form_field_' . $fieldID . '][field_type][type]" id="field_type_' . $fieldID . '" >
          <option value="radio" selected="selected" >'.esc_html__("Radio (Choose Single Option)","lead-form-builder").'</option>
           </select>
            <div class="add_radio_checkbox_' . $fieldID . '" id="add_radio_checkbox">
            <div class="" id="add_radio">' . $optionField . '</div>
            </div>
        </td>
        <td><input type="text" class="default_value" name="lfb_form[form_field_' . $fieldID . '][default_value]" id="default_value_' . $fieldID . '" value="'.esc_html__("Choose Default Value","lead-form-builder").'" disabled="disabled">
        <div class="add_default_radio_checkbox_' . $fieldID . '" id="add_default_radio_checkbox">
            <div class="" id="default_add_radio">' . $isChecked . '</div>
        </div>
        </td>';

    $return .= '<td>-</td>';
           
    $return .= $this->lfbFieldIsRequired($fieldv,$fieldID);

    $return .= $this->lfbRemoveField($fieldID);

        return $return;

    }
// checkbox options
    function lfbCheckbox($fieldv,$fieldtype,$fieldID){
            $checkboxField = $isChecked = $return ='';
            $lastFieldID = 0;
            unset($fieldtype['type']);
         foreach ($fieldtype as $key => $value) {
        $checkboxId = str_replace("field_", "", $key);
        $checked = isset($fieldv['default_value'][$key])?'checked':'';

        $fieldMinus = '<p class="button lf_minus" id="delete_checkbox_' . $checkboxId . '" onclick="delete_checkbox_fields(' . $fieldID . ',' . $checkboxId . ')"><i class="fa fa-minus" aria-hidden="true"></i></p>';


        if($lastFieldID < $checkboxId){
            $lastFieldID = $checkboxId;
            $fieldPlus = '<p class="button lf_plus" id="add_new_checkbox_' . $lastFieldID . '" onclick="add_new_checkbox_fields(' . $fieldID . ',' . $lastFieldID . ')"><i class="fa fa-plus" aria-hidden="true"></i></p>';
        }

        $childCheckbox = '<input type="text" class="input_checkbox_val" name="lfb_form[form_field_' . $fieldID . '][field_type][field_' . $checkboxId . ']" id="checkbox_field_' . $checkboxId . '" placeholder="First Choice" value="'.$value.'">';

        // default checked
        $isChecked .='<p id="default_checkbox_value_' . $checkboxId . '">'.$value.' <input type="checkbox" class="checked" name="lfb_form[form_field_' . $fieldID . '][default_value][field_' . $checkboxId . ']" id="default_checkbox_val_' . $checkboxId . '" value="1" '.$checked.' ></p>';

        $checkboxField .= $childCheckbox.$fieldMinus;
    }
    $checkboxField .= $fieldPlus;
     $return .=$this->lfbFieldName($fieldv,$fieldID);

     $return .= '<td>
          <select class="form_field_select" name="lfb_form[form_field_' . $fieldID . '][field_type][type]" id="field_type_' . $fieldID . '" >
          <option value="checkbox" selected="selected" >'.esc_html__("Checkbox (Choose Multiple Option)","lead-form-builder").'</option>
           </select>
            <div class="add_radio_checkbox_' . $fieldID . '" id="add_radio_checkbox">
            <div class="" id="add_checkbox">' . $checkboxField . '</div>
            </div>
        </td>
        <td><input type="text" class="default_value" name="lfb_form[form_field_' . $fieldID . '][default_value]" id="default_value_' . $fieldID . '" value="'.esc_html__("Choose Default Value","lead-form-builder").'" disabled="disabled">
        <div class="add_default_radio_checkbox_' . $fieldID . '" id="add_default_radio_checkbox">
            <div class="" id="default_add_checkbox">' . $isChecked . '</div>
        </div>
        </td>';

    $return .= '<td>-</td>';
           
    $return .= $this->lfbFieldIsRequired($fieldv,$fieldID);

    $return .= $this->lfbRemoveField($fieldID);

        return $return;

    }

    function lfbFieldType($fieldv,$fieldID){
            $text = array('name','email','url','number','text','date','dob','upload','terms');
            $textarea = array('message','textarea');
           $fieldtype = $fieldv['field_type'];
           $fType = $fieldv['field_type']['type'];

         if($fType=='checkbox'){
             return $this->lfbCheckbox($fieldv,$fieldtype,$fieldID);

         } elseif($fType=='option') {
            return $this->lfbSelectOption($fieldv,$fieldtype,$fieldID);
         
         }  elseif($fType=='radio') {
            return $this->lfbRadio($fieldv,$fieldtype,$fieldID);
         
         } elseif($fType=='htmlfield') {
            return $this->lfbhtmlfield($fieldv,$fieldtype,$fieldID);
         
         } elseif(in_array($fType, $text)){
            return $this->lfbTypeText($fieldv,$fType,$fieldID);

         } elseif(in_array($fType, $textarea)){
            return $this->lfbTypeTextarea($fieldv,$fType,$fieldID);
         }
    }

/*
 * *For each for each form fields 
 */
    function lfb_create_form_fields_for_edit($form_title, $form_data_result) {
        $all_form_fields = "";
        $total_form_fields = count($form_data_result);
        $field_counter = 0;
            $fieldRow = $addButton = '';
            $lastFieldID = 0;
         foreach ($form_data_result as $fieldv) {
                $fieldID = $fieldv['field_id'];

                if($lastFieldID < $fieldID){
                    $lastFieldID = $fieldID;
                }

            if($fieldID==0){
            $addButton = $this->lfbAddField($fieldv,$fieldID,$lastFieldID);

            } else{
                $tr = $this->lfbFieldType($fieldv,$fieldID);
                $fieldRow .= '<tr id="form_field_row_' . $fieldID . '">'.$tr.'</tr>';
            }

        }

       return '<tbody class="append_new">'.$fieldRow.'</tbody>'.$addButton;

    }
}