<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly



/*
 * Save Lead collecting method
 */
function lfb_save_lead_settings()
{
    $nonce = $_REQUEST['lrv_nonce_verify'];
    // Get all the user roles as an array.
    if (isset($_POST['action-lead-setting'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'lrv-nonce')) {

    $data_recieve_method = intval($_POST['data-recieve-method']);
    $this_form_id = intval($_POST['action-lead-setting']);
    global $wpdb;
    $table_name = LFB_FORM_FIELD_TBL;
    $update_query = "update " . LFB_FORM_FIELD_TBL . " set storeType='" . $data_recieve_method . "' where id='" . $this_form_id . "'";
    $th_save_db = new LFB_SAVE_DB($wpdb);
    $update_leads = $th_save_db->lfb_update_form_data($update_query);
    if ($update_leads) {
        esc_html_e('updated', 'lead-form-builder');
    }

    die();
    
}
}

add_action('wp_ajax_SaveLeadSettings', 'lfb_save_lead_settings');

/*
 * Save Email Settings
 */

function lfb_save_email_settings()
{

    $nonce = $_REQUEST['aes_nonce'];
    // Get all the user roles as an array.
    if (isset($_POST['email_setting']['form-id'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'aes-nonce')) {

    global $wpdb;
    $email_setting = array();
    $this_form_id = intval($_POST['email_setting']['form-id']);
    $email_setting['email_setting'] = isset($_POST['email_setting']) ? $_POST['email_setting'] : '';
    $serialize = maybe_serialize($email_setting);
    $table_name = LFB_FORM_FIELD_TBL;
    $update_query = "update " . LFB_FORM_FIELD_TBL . " set mail_setting='" . $serialize . "' where id='" . $this_form_id . "'";
    $th_save_db = new LFB_SAVE_DB($wpdb);
    $update_leads = $th_save_db->lfb_update_form_data($update_query);
    if ($update_leads) {
        esc_html_e('updated', 'lead-form-builder');
    }
    die();
    }
}

add_action('wp_ajax_SaveEmailSettings', 'lfb_save_email_settings');

/*
 * Save captcha Keys
 */

function lfb_save_captcha_settings()
{
    $nonce = $_POST['captcha_nonce'];

    if (isset($_POST['captcha-keys'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'captcha-nonce')) {

    $captcha_setting_sitekey = sanitize_text_field($_POST['captcha-setting-sitekey']);
    $captcha_setting_secret = sanitize_text_field($_POST['captcha-setting-secret']);

    if (get_option('captcha-setting-sitekey') !== false) {
        update_option('captcha-setting-sitekey', $captcha_setting_sitekey);
        update_option('captcha-setting-secret', $captcha_setting_secret);
    } else {
        add_option('captcha-setting-sitekey', $captcha_setting_sitekey);
        add_option('captcha-setting-secret', $captcha_setting_secret);
    }
}
    die();
}

add_action('wp_ajax_SaveCaptchaSettings', 'lfb_save_captcha_settings');

/*
 * Delete Leads From Back-end
 */
function lfb_delete_leads_backend()
{
    
    $nonce = $_REQUEST['_lfbnonce'];
    // Get all the user roles as an array.

    $check = false;
    if (isset($_POST['lead_id'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'lfb-nonce-rm')) {
        $check = true;

        $this_lead_id = intval($_POST['lead_id']);
        global $wpdb;
        $table_name = LFB_FORM_DATA_TBL;

        $update_query = $wpdb->prepare(" DELETE FROM $table_name WHERE id = %d ", $this_lead_id);

        $th_save_db = new LFB_SAVE_DB($wpdb);
        $update_leads = $th_save_db->lfb_delete_form($update_query);
        echo esc_html($update_leads);
    }

    echo $check;
}

add_action('wp_ajax_delete_leads_backend', 'lfb_delete_leads_backend');

/*
 * Save captcha status for form ON/OFF
 */

function lfb_save_captcha_option()
{
    $nonce = $_POST['captcha_nonce'];
if (isset($_POST['captcha_on_off_form_id'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'captcha-nonce')) {

    $captcha_option = sanitize_text_field($_POST['captcha-on-off-setting']);
    $this_form_id = intval($_POST['captcha_on_off_form_id']);
    global $wpdb;
    $table_name = LFB_FORM_FIELD_TBL;
    $update_query = "update " . LFB_FORM_FIELD_TBL . " set captcha_status='" . $captcha_option . "' where id='" . $this_form_id . "'";
    $th_save_db = new LFB_SAVE_DB($wpdb);
    $update_leads = $th_save_db->lfb_update_form_data($update_query);
    if ($update_leads) {
        esc_html_e('updated', 'lead-form-builder');
    }
}
    die();
}

add_action('wp_ajax_SaveCaptchaOption', 'lfb_save_captcha_option');

/*
 * Show all Leads column on Lead Page Based on form selection
 */

function lfb_ShowAllLeadThisForm()
{
    if ((isset($_POST['form_id']) && ($_POST['form_id'] != '')) || (isset($_GET['form_id']) && ($_GET['form_id'] != ''))) {

        global $wpdb;
        $table_name = LFB_FORM_DATA_TBL;
        $th_save_db = new LFB_SAVE_DB($wpdb);
        $nonce = wp_create_nonce('lfb-nonce-rm');
        $showLeadsObj = new LFB_Show_Leads();
        $start = 0;
        $limit = 10;
        $detail_view  = '';
        $slectleads = false;

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $start = ($id - 1) * $limit;
            $form_id = intval($_GET['form_id']);
            $sn_counter = $start;
        } else {
            $id = 1;
            $form_id = intval($_POST['form_id']);
            $sn_counter = 0;
        }
        if (isset($_GET['detailview'])) {
            $detail_view = sanitize_text_field($_GET['detailview']);
        }

        if (isset($_POST['slectleads'])) {
            $slectleads = sanitize_text_field($_POST['slectleads']);
        }

        $getArray = $th_save_db->lfb_get_all_view_leads_db($form_id, $start);
        $posts          = $getArray['posts'];
        $rows           = $getArray['rows'];
        $limit          = $getArray['limit'];
        $fieldData       = $getArray['fieldId'];
        $tableHead  = '';
        $headcount = 1;
        $leadscount = 5;

        foreach ($fieldData as $fieldkey => $fieldvalue) {
            // Html Field removed
            $pos = strpos($fieldkey, 'htmlfield_');
            if ($pos !== false) {
                continue;
            }

            if ($headcount < 6 && $slectleads) {
                $tableHead  .= '<th>' . $fieldvalue . '</th>';
            } elseif (!$slectleads) {

                $tableHead  .= '<th>' . $fieldvalue . '</th>';

                $leadscount =  $headcount;
            }
            $fieldIdNew[] = $fieldkey;
            $headcount++;

            // } else{ break; }
        }

        if (!empty($posts)) {
            $entry_counter = 0;
            $table_body = '';
            $table_head = '';
            $popupTab   = '';

            if ($headcount >= 6 && $leadscount == 5) {
                $table_head .= '<th></th><th> . . . </th><th><input type="button" onclick="show_all_leads(' . intval($id) . ',' . intval($form_id) . ')" value="Show all Columns"></th>';
            }

            foreach ($posts as $results) {
                $table_row = '';
                // $table_head = '';
                $sn_counter++;
                $row_size_limit = 0;
                $form_data = $results->form_data;
                $lead_id = $results->id;
                $lead_date = date("jS F Y", strtotime($results->date));
                $form_data = maybe_unserialize($form_data);
                unset($form_data['hidden_field']);
                unset($form_data['action']);
                $entry_counter++;
                $complete_data = '';
                $popup_data_val = '';
                $date_td = '<td><b>' . $lead_date . '</b></td>';


                $returnData = $th_save_db->lfb_lead_form_value($form_data, $fieldIdNew, $fieldData, $leadscount);
                $table_row .= $returnData['table_row'];
                $table_row .= $date_td;

                foreach ($form_data as $form_data_key => $form_data_value) {
                    $row_size_limit++;

                    if (($detail_view != 1) && ($row_size_limit == 6) && $leadscount == 5) {
                        $table_row .= '<td>. . .</td><td><a href="#lf-openModal-' . $lead_id . '" value="view">view</a></td>';
                    }
                }

                $complete_data .= "<table><tr><th>Field</th><th>Value</th></tr>" . $returnData['table_popup'] . "</table>";

                /****/
                $popupTab .= '<div id="lf-openModal-' . $lead_id . '" class="lf-modalDialog">
                          <div class="lfb-popup-leads" ><a href="#lf-close" title="Close" class="lf-close">X</a>' . $complete_data . '
                          </div>
                          </div>';

                //  $complete_data .=$returnData['table_popup']."</table>";

                $table_body .= '<tbody id="lead-id-' . $lead_id . '">';

                $table_body  .= '<tr><td><span class="lead-count">' . $sn_counter . '</span><a class="lead-remove" onclick="delete_this_lead(' . $lead_id . ',\'' . $nonce . '\')" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>' . $table_row . '</tr>';
            }

            $thHead = '<div class="wrap" id="form-leads-show"><table class="show-leads-table wp-list-table widefat fixed" id="show-leads-table" ><thead><tr><th>Action</th>' . $tableHead . '<th>Date</th>' . $table_head . '</tr></thead>';

            echo wp_kses($thHead . $table_body . '</tbody></table>' . $popupTab, $showLeadsObj->expanded_alowed_tags());

            $total = ceil($rows / $limit);
            if ($headcount >= 6 && $leadscount == 5) {

                if ($id > 1) {
                    echo "<a href=''  onclick='lead_pagi_view(" . intval($id - 1) . "," . intval($form_id) . ")' class='button'><i class='fa fa-chevron-right'></i></a>";
                }
                if ($id != $total) {
                    echo "<a href='' onclick='lead_pagi_view(" . intval($id + 1) . "," . intval($form_id) . ")' class='button'><i class='fa fa-chevron-left'></i></a>";
                }
                echo "<ul class='page'>";
                for ($i = 1; $i <= $total; $i++) {
                    if ($i == $id) {
                        echo "<li class='lf-current'><a href='#'>" . intval($i) . "</a></li>";
                    } else {
                        echo "<li><a href='' onclick='lead_pagi_view(" . intval($i) . "," . intval($form_id) . ")'>" . intval($i) . "</a></li>";
                    }
                }
                echo '</ul>';
            } else {

                if ($id > 1) {
                    echo "<a href=''  onclick='lead_pagination(" . intval($id - 1) . "," . intval($form_id) . ")' class='button'><i class='fa fa-chevron-right'></i></a>";
                }
                if ($id != $total) {
                    echo "<a href='' onclick='lead_pagination(" . intval($id + 1) . "," . intval($form_id) . ")' class='button'><i class='fa fa-chevron-left'></i></a>";
                }
                echo "<ul class='page'>";
                for ($i = 1; $i <= $total; $i++) {
                    if ($i == $id) {
                        echo "<li class='lf-current'><a href='#'>" . intval($i) . "</a></li>";
                    } else {
                        echo "<li><a href='' onclick='lead_pagination(" . intval($i) . "," . intval($form_id) . ")'>" . intval($i) . "</a></li>";
                    }
                }
                echo '</ul>';
            }
        } else {
            esc_html_e('Opps No lead...!!', 'lead-form-builder');
        }
        die();
    }
}

add_action('wp_ajax_ShowAllLeadThisForm', 'lfb_ShowAllLeadThisForm');



function lfb_ShowLeadPagi()
{
    if ((isset($_POST['form_id']) && ($_POST['form_id'] != '')) || (isset($_GET['form_id']) && ($_GET['form_id'] != ''))) {
        global $wpdb;
        $table_name = LFB_FORM_DATA_TBL;
        $th_save_db = new LFB_SAVE_DB($wpdb);
        $showLeadsObj = new LFB_Show_Leads();
        $nonce = wp_create_nonce('lfb-nonce-rm');
        $start = 0;
        $limit = 10;
        $detail_view = '';

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $start = ($id - 1) * $limit;
            $form_id = intval($_GET['form_id']);
            $sn_counter = $start;
        } else {
            $id = 1;
            $form_id = intval($_POST['form_id']);
            $sn_counter = 0;
        }
        if (isset($_GET['detailview'])) {
            $detail_view = isset($_GET['detailview']);
        }

        $getArray = $th_save_db->lfb_get_all_view_leads_db($form_id, $start);
        $posts          = $getArray['posts'];
        $rows           = $getArray['rows'];
        $limit          = $getArray['limit'];
        $fieldData       = $getArray['fieldId'];
        $tableHead  = '';
        $headcount = 1;

        foreach ($fieldData as $fieldkey => $fieldvalue) {
            if ($headcount < 6) {
                $tableHead  .= '<th>' . $fieldvalue . '</th>';
            }
            $fieldIdNew[] = $fieldkey;
            // } else{ break; }
            $headcount++;
        }
        if (!empty($posts)) {
            $entry_counter = 0;
            $table_body = '';
            $table_head = '';
            $popupTab   = '';

            if ($headcount >= 6) {
                $table_head .= '<th> . . . </th><th><input type="button" onclick="show_all_leads(' . $id . ',' . $form_id . ')" value="Show all Columns"></th>';
            }

            foreach ($posts as $results) {
                $table_row = '';
                $sn_counter++;
                $row_size_limit = 0;
                $form_data = $results->form_data;
                $lead_id = $results->id;
                $form_data = maybe_unserialize($form_data);
                unset($form_data['hidden_field']);
                unset($form_data['action']);
                $entry_counter++;
                $complete_data = '';
                $popup_data_val = '';

                $returnData = $th_save_db->lfb_lead_form_value($form_data, $fieldIdNew, $fieldData, 5);
                $table_row .= $returnData['table_row'];

                foreach ($form_data as $form_data_key => $form_data_value) {
                    $row_size_limit++;

                    if (($detail_view != 1) && ($row_size_limit == 6)) {
                        $table_row .= '<td>. . .</td><td><a href="#lf-openModal-' . $lead_id . '" value="view">view</a></td>';
                    }
                }

                $complete_data .= "<table><tr><th>Field</th><th>Value</th></tr>" . $returnData['table_popup'] . "</table>";

                /****/
                $popupTab .= '<div id="lf-openModal-' . $lead_id . '" class="lf-modalDialog">
                          <div class="lfb-popup-leads" ><a href="#lf-close" title="Close" class="lf-close">X</a>' . $complete_data . '
                          </div>
                          </div>';
                /****/
                $table_body .= '<tbody id="lead-id-' . $lead_id . '">';

                $table_body  .= '<tr><td><span class="lead-count">' . $sn_counter . '</span><a class="lead-remove" onclick="delete_this_lead(' . $lead_id . ',\'' . $nonce . '\')" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>' . $table_row . '</tr>';
            }

            $thHead = '<div class="wrap" id="form-leads-show"><table class="show-leads-table wp-list-table widefat fixed" id="show-leads-table" ><thead><tr><th>Action</th>' . $tableHead . $table_head . '</tr></thead>';

            echo wp_kses($thHead . $table_body . '</tbody></table>' . $popupTab, $showLeadsObj->expanded_alowed_tags());

            $total = ceil($rows / $limit);
            if ($id > 1) {
                echo "<a href=''  onclick='lead_pagi_view(" . intval($id - 1) . "," . intval($form_id) . ")' class='button'><i class='fa fa-chevron-right'></i></a>";
            }
            if ($id != $total) {
                echo "<a href='' onclick='lead_pagi_view(" . intval($id + 1) . "," . intval($form_id) . ")' class='button'><i class='fa fa-chevron-left'></i></a>";
            }
            echo "<ul class='page'>";
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='lf-current'><a href='#'>" . intval($i) . "</a></li>";
                } else {
                    echo "<li><a href='' onclick='lead_pagi_view(" . intval($i) . "," . intval($form_id) . ")'>" . intval($i) . "</a></li>";
                }
            }
            echo '</ul>';
        } else {
            esc_html_e('Opps No lead...!!', 'lead-form-builder');
        }
        die();
    }
}
add_action('wp_ajax_ShowLeadPagi', 'lfb_ShowLeadPagi');

/*
 * Show Leads on Lead Page Based on form selection
 */

function lfb_ShowAllLeadThisFormDate()
{
    if ((isset($_POST['form_id']) && ($_POST['form_id'] != '')) || (isset($_GET['form_id']) && ($_GET['form_id'] != ''))) {
        global $wpdb;
        $nonce = wp_create_nonce('lfb-nonce-rm');
        $table_name = LFB_FORM_DATA_TBL;
        $th_save_db = new LFB_SAVE_DB($wpdb);
        $showLeadsObj = new LFB_Show_Leads();
        $start = 0;
        $limit = 10;
        $detail_view = '';

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $datewise = sanitize_text_field($_GET['datewise']);
            $start = ($id - 1) * $limit;
            $form_id = intval($_GET['form_id']);
            $sn_counter = $start;
        } else {
            $id = 1;
            $datewise = '';
            $sn_counter = 0;
        }
        if (isset($_GET['detailview'])) {
            $detail_view = sanitize_text_field($_GET['detailview']);
        }
        $getArray =  $th_save_db->lfb_get_all_view_date_leads_db($form_id, $datewise, $start);

        $posts          = $getArray['posts'];
        $rows           = $getArray['rows'];
        $limit          = $getArray['limit'];
        $fieldData       = $getArray['fieldId'];
        $fieldIdNew     = array();
        $headcount = 1;

        $tableHead  = '';


        foreach ($fieldData as $fieldkey => $fieldvalue) {
            if ($headcount < 6) {
                $tableHead  .= '<th>' . $fieldvalue . '</th>';
            }
            $fieldIdNew[] = $fieldkey;
            // } else{ break; }
            $headcount++;
        }

        if (!empty($posts)) {
            $entry_counter = 0;
            $value1 = 0;
            $table_body = '';
            $table_head = '';
            $popupTab   = '';


            if ($headcount >= 6) {
                $table_head .= '<th><input type="button" onclick="show_all_leads(' . $id . ',' . $form_id . ')" value="Show all fields"></th>';
            }

            foreach ($posts as $results) {
                $table_row = '';
                $sn_counter++;
                $row_size_limit = 0;
                $form_data = $results->form_data;
                $lead_id = $results->id;
                $form_data = maybe_unserialize($form_data);
                unset($form_data['hidden_field']);
                unset($form_data['action']);
                $entry_counter++;
                $complete_data = '';
                $popup_data_val = '';

                $returnData = $th_save_db->lfb_lead_form_value($form_data, $fieldIdNew, $fieldData, 5);
                $table_row .= $returnData['table_row'];



                foreach ($form_data as $form_data_key => $form_data_value) {
                    $row_size_limit++;

                    if (($detail_view != 1) && ($row_size_limit == 6)) {
                        $table_row .= '<td>. . . . .</td><td><a href="#lf-openModal-' . $lead_id . '" value="view">view</a></td>';
                    }
                }

                $complete_data .= "<table><tr><th>Field</th><th>Value</th></tr>" . $returnData['table_popup'] . "</table>";

                /****/
                $popupTab .= '<div id="lf-openModal-' . $lead_id . '" class="lf-modalDialog">
                          <div class="lfb-popup-leads" ><a href="#lf-close" title="Close" class="lf-close">X</a>' . $complete_data . '
                          </div>
                          </div>';
                /****/
                $table_body .= '<tbody id="lead-id-' . $lead_id . '">';

                $table_body  .= '<tr><td><span class="lead-count">' . $sn_counter . '</span><a class="lead-remove" onclick="delete_this_lead(' . $lead_id . ',\'' . $nonce . '\')" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>' . $table_row . '</tr>';
            }

            $thHead = '<div class="wrap" id="form-leads-show"><table class="show-leads-table wp-list-table widefat fixed" id="show-leads-table" ><thead><tr><th>Action</th>' . $tableHead . $table_head . '</tr></thead>';

            echo wp_kses($thHead . $table_body . '</tbody></table>' . $popupTab, $showLeadsObj->expanded_alowed_tags());

            $rows = count($rows);
            $total = ceil($rows / $limit);
            if ($id > 1) {
                echo "<a href=''  onclick='lead_pagination_datewise(" . intval($id - 1) . "," . intval($form_id) . ",\"" . $datewise . "\");' class='button'><i class='fa fa-chevron-right'></i></a>";
            }
            if ($id != $total) {
                echo "<a href='' onclick='lead_pagination_datewise(" . intval($id + 1) . "," . intval($form_id) . ",\"" . $datewise . "\");' class='button'><i class='fa fa-chevron-left'></i></a>";
            }
            echo "<ul class='page'>";
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='lf-current'><a>" . intval($i) . "</a></li>";
                } else {
                    echo "<li><a href='' onclick='lead_pagination_datewise(" . intval($i) . "," . intval($form_id) . ",\"" . $datewise . "\");'>" . intval($i) . "</a></li>";
                }
            }
            echo '</ul>';
        } else {
            esc_html_e('Opps No lead...!!', 'lead-form-builder');
        }
        die();
    }
}
add_action('wp_ajax_ShowAllLeadThisFormDate', 'lfb_ShowAllLeadThisFormDate');

/*
 * Save from Data from front-end
 */

function lfb_form_name_email_filter($form_data)
{
    $name_email = array();
    $e = false;
    $n = false;
    foreach ($form_data as $key => $value) {
        $email = strpos($key, 'email_');
        $name = strpos($key, 'name_');
        if ($email !== false) {
            $name_email['email'] = $value;
            $e = true;
        } elseif ($name !== false) {
            $name_email['name'] = $value;
            $n = true;
        }
        if ($e === true && $n === true) {
            break;
        }
    }
    return $name_email;
}

function lfb_lead_sanitize($leads)
{
    if (is_array($leads)) {
        foreach ($leads as $key => $value) {
            $rKey = preg_replace("/[^a-zA-Z]+/", "", $key);
            if ($rKey === 'name' || $rKey === 'text' || $rKey === 'radio' || $rKey === 'option') {
                $leads[$key] = sanitize_text_field($value);
            } elseif ($rKey === 'email') {
                $leads[$key] = sanitize_email($value);
            } elseif ($rKey === 'number') {
                $leads[$key] = intval($value);
            } elseif ($rKey === 'message' || $rKey === 'textarea') {
                $leads[$key] = sanitize_textarea_field($value);
            } elseif ($rKey === 'date' || $rKey === 'dob') {
                $leads[$key] = sanitize_text_field($value);
            } elseif ($rKey === 'url') {
                $leads[$key] = esc_url_raw($value);
            } elseif ($rKey === 'checkbox') {

                foreach ($value as $ckey => $cvalue) {
                    $value[$ckey] = sanitize_text_field($cvalue);
                }
                $leads[$key] = $value;
            }
        } // end foreach

        return $leads;
    }
}

function lfb_Save_Form_Data()
{
  
    if (isset($_POST['fdata']) && wp_verify_nonce($_POST['_wpnonce'], 'lfb_front_nonce' )) {
        wp_parse_str($_POST['fdata'], $fromData);

        $form_id = intval($fromData['hidden_field']);
        unset($fromData['g-recaptcha-response']);
        unset($fromData['action']);
        unset($fromData['hidden_field']);

        $en = lfb_form_name_email_filter($fromData);


        if ((isset($en['email'])) && ($en['email'] != '')) {
            $user_emailid = sanitize_email($en['email']);
        } else {
            $user_emailid = esc_html__('invalid_email', 'lead-form-builder');
        }
        $sanitize_leads =  lfb_lead_sanitize($fromData);
        $form_data = maybe_serialize($sanitize_leads);

        $lf_store   = new LFB_LeadStoreType();
        $th_save_db = new LFB_SAVE_DB();

        $lf_store->lfb_mail_type($form_id, $form_data, $th_save_db, $user_emailid);
    }else{
        echo esc_html__('INVAILD','lead-form-builder');
    }
    die();
}

add_action('wp_ajax_Save_Form_Data', 'lfb_Save_Form_Data');
add_action('wp_ajax_nopriv_Save_Form_Data', 'lfb_Save_Form_Data');

function lfb_verifyFormCaptcha()
{
    if ((isset($_POST['captcha_res'])) && (!empty($_POST['captcha_res']))) {
        $captcha = stripslashes($_POST['captcha_res']);
        $secret_key = get_option('captcha-setting-secret');
        $response = wp_remote_post(
            'https://www.google.com/recaptcha/api/siteverify',
            array(
                'method' => 'POST',
                'body' => array(
                    'secret' => $secret_key,
                    'response' => $captcha
                )
            )
        );
        $reply_obj = json_decode(wp_remote_retrieve_body($response));
        if (isset($reply_obj->success) && $reply_obj->success == 1) {
            esc_html_e('Yes', 'lead-form-builder');
        } else {
            esc_html_e('No', 'lead-form-builder');
        }
    } else {
        esc_html_e('Invalid', 'lead-form-builder');
    }
    die();
}
add_action('wp_ajax_verifyFormCaptcha', 'lfb_verifyFormCaptcha');
add_action('wp_ajax_nopriv_verifyFormCaptcha', 'lfb_verifyFormCaptcha');

function lfb_RememberMeThisForm()
{
    $nonce = $_POST['rem_nonce'];

    if (isset($_POST['form_id'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'rem-nonce')) {

        $remember_me = intval($_POST['form_id']);
        if (get_option('lf-remember-me-show-lead') !== false) {
            update_option('lf-remember-me-show-lead', $remember_me);
        } else {
            add_option('lf-remember-me-show-lead', $remember_me);
        }
        echo esc_html(get_option('lf-remember-me-show-lead'));
        die();
    }
}
add_action('wp_ajax_RememberMeThisForm', 'lfb_RememberMeThisForm');


/*
 * Save Email Settings
 */



function lfb_emailsettings_sanitize($email_settings)
{

    $email_settings['from'] = sanitize_email($email_settings['from']);
    $email_settings['header'] = sanitize_text_field($email_settings['header']);
    $email_settings['subject'] = sanitize_text_field($email_settings['subject']);
    $email_settings['message'] = sanitize_textarea_field($email_settings['message']);
    $email_settings['user-email-setting-option'] = sanitize_text_field($email_settings['user-email-setting-option']);
    $email_settings['form-id'] = intval($email_settings['form-id']);
    return $email_settings;
}

function lfb_SaveUserEmailSettings()
{
    unset($_POST['action']);
    $mailArr = array();

    $nonce = $_REQUEST['ues_nonce'];
    // Get all the user roles as an array.
    if (isset($_POST['user_email_setting'])  && current_user_can('manage_options') && wp_verify_nonce($nonce, 'ues-nonce')) {

        $mailArr['user_email_setting'] = lfb_emailsettings_sanitize($_POST['user_email_setting']);

        $email_setting = maybe_serialize($mailArr);
        $this_form_id = intval($_POST['user_email_setting']['form-id']);
        global $wpdb;
        $table_name = LFB_FORM_FIELD_TBL;
        $update_query = "update " . LFB_FORM_FIELD_TBL . " set usermail_setting='" . $email_setting . "' where id='" . $this_form_id . "'";
        $th_save_db = new LFB_SAVE_DB($wpdb);
        $update_leads = $th_save_db->lfb_update_form_data($update_query);
        if ($update_leads) {
            echo esc_html("updated");
        }
    }
    die();
}
add_action('wp_ajax_SaveUserEmailSettings', 'lfb_SaveUserEmailSettings');
