<?php
if (!defined('ABSPATH')) exit;

if (!class_exists('wppb_db')) return;


class wppb_db
{
  private static $db;
  private static $table;
  private static $lfb_table;
  function __construct()
  {
    global $wpdb;
    self::$db = $wpdb;
    self::$table = self::$db->prefix . 'wppb';
    self::$lfb_table = self::$db->prefix . 'lead_form';
  }
  public static function getCustomPopup($bid = "")
  {
    if ($bid && is_numeric($bid)) {

      $querystr = self::$db->prepare("SELECT * FROM " . self::$table . " WHERE addon_name=%s AND BID= %d ",'custom_popup',$bid);
    } else if ($bid == '') {
      $querystr = self::$db->prepare("SELECT * FROM " . self::$table . " WHERE addon_name=%s ORDER BY BID DESC",'custom_popup');
    }
    $pageposts = isset($querystr) ? self::$db->get_results($querystr) : '';
    return !empty($pageposts) ? $pageposts : false;
  }


  public function popup_insert()
  {
    if (isset($_POST['htmldata'])) {
      $popupData = $this->arrayValueSanetize($_POST['htmldata'], true);
      if ($popupData) {
        $data['setting']  = serialize($popupData);
        $data['addon_name'] = 'custom_popup';
        $data_formate = ['%s', '%s'];
        self::$db->insert(self::$table, $data, $data_formate);
        return self::$db->insert_id;
      }
    }
  }
  public function popup_update()
  {
    if (isset($_POST['bid']) && is_numeric($_POST['bid']) && intval($_POST['bid']) > 0) {
      $bid = intval($_POST['bid']);
      if (isset($_POST['htmldata'])) {
        $popupData = $this->arrayValueSanetize($_POST['htmldata'], true);
        if ($popupData) {
          $data['setting']  = serialize($popupData);
          $formate_data     = ['%s'];
          $where = ['BID' => $bid];
          $formate_data_where =  ['%d'];
          return self::$db->update(self::$table, $data, $where, $formate_data, $formate_data_where);
        }
      } elseif (isset($_POST['is_active'])) {
        $data['is_active']  = intval($_POST['is_active']);
        $formate_data       = ['%d'];
        $where              = ['BID' => $bid];
        $formate_data_where = ['%d'];
        return self::$db->update(self::$table, $data, $where, $formate_data, $formate_data_where);
      }
    }
  }

  public function popup_delete()
  {
    if (isset($_POST['bid']) && is_numeric($_POST['bid'])) {
      $bid = intval($_POST['bid']);
      return self::$db->delete(self::$table, ['BID' => $bid], ['%d']);
    }
  }
  //business popup update
  public function opt_update()
  {
    if (isset($_POST['popup_id']) && is_numeric($_POST['popup_id']) && isset($_POST['option']) && $_POST['option'] != '') {
      $optionData = $this->arrayValueSanetize($_POST['option']);
      if ($optionData) {
        $bid     = intval($_POST['popup_id']);
        $data['boption'] = serialize($optionData);
        $result = self::$db->update(self::$table, $data, ['BID' => $bid], ['%s'], ['%d']);
        return $result;
      }
    }
  }
  //get popup for all pages,pages,post
  public static function popup_pages()
  {
    $querystr = self::$db->prepare("SELECT BID,setting,boption,addon_name FROM " . self::$table . " WHERE setting !='' AND boption!='' AND is_active = %d ",1);
    $pageposts = self::$db->get_results($querystr);
    return !empty($pageposts) ? $pageposts : false;
  }

  //get for addon for update 
  public static function Popup_show($bid, $preview = false, $popup_page = false)
  {
    if ($bid && is_numeric($bid)) {
      if ($popup_page) {
        return  self::$db->get_row(self::$db->prepare( "SELECT BID,setting,boption,addon_name FROM " . self::$table . " WHERE BID = %d AND is_active=%d",$bid,1));
      } else if ($preview) {
        return  self::$db->get_row(self::$db->prepare("SELECT addon_name,setting FROM " . self::$table . " WHERE BID=%d ",$bid));
      } else {
        return  self::$db->get_row(self::$db->prepare("SELECT addon_name,setting FROM " . self::$table . " WHERE BID='" . $bid . "' AND is_active=%d",1));
      }
    }
  }

  public function arrayValueSanetize($arr, $uniqid = false)
  {
    $returnArray = [];
    if (is_array($arr)) {

      if ($uniqid) $arr = $this->uniq_class($arr);

      foreach ($arr as $key => $value) {
        $key = is_numeric($key) ? $key : sanitize_text_field($key);
        if (is_array($value)) {
          $returnArray[$key] = $this->arrayValueSanetize($value, $uniqid);
        } else {
          if ($key && ($key == "link" || $key == "image-url" || $key == 'overlay-image-url' || $key == 'video-url' || $key == 'poster')) {
            // senetize link 
            $value = sanitize_url($value);
          } else if ($key == "style" || $key == "overlay-style") {
            // senetize style 
            $value = wp_kses_post($value);
          } else {
            // senetize text and normal text
            $value = sanitize_text_field($value);
          }
          $returnArray[$key] = $value;
        } //else

      } //foreach
    }
    return !empty($returnArray) ? $returnArray : false;
  }

  public function uniq_class($arr)
  {
    if (((isset($arr['type']) && isset($arr['content'])) || (isset($arr['type']) && $arr['type'] == 'close-btn')) && !isset($arr['id'])) {
      $uniqid = !is_array($arr['type']) ? uniqid('wppb-' . $arr['type'] . '-', true) : uniqid('wppb-content-', true);
      $uniqid = str_replace('.', '', $uniqid);
      $arr = array_merge($arr, ['id' => $uniqid]);
    }
    return $arr;
  }

  // popup html creating
  public function wppb_html($setting, $inline = '', $setting_ = false)
  {
    if ($setting && @unserialize($setting)) {
      $popupSetData = array(
        'wrapper-style' => 'width:550px;',
        'wrapper-height' => 'auto',
        'overlay-image-url' => '',
        'overlay-style' => "",
        'overlay-color' => '#28292C91',
        'outside-color' => '#535353F2',
        'content' => '',
        'global-padding' => '23px 37px',
        'layout' => '',
        'close-btn' => '',
        'style' => '',
        'lead-form' => '',
        'global-content-id' => false
      );
      // $popupFrontSetting = ['close-type'=>3,'outside-color'=>'#535353F2','effect'=>1,'popup-delay-open'=>3,'popup-delay-close'=>0];
      $popupFrontSetting = ['layout' => '', 'close-type' => 3, 'outside-color' => '#535353F2', 'effect' => 1];
      if (is_array($setting_)) $popupFrontSetting = array_merge($popupFrontSetting, $setting_);

      $allSetting = unserialize($setting);
      foreach ($allSetting as $setting_value) {
        if (isset($setting_value['content']) && is_array($setting_value['content'])) {

          if ($setting_value['type'] == 'global-setting') {
            foreach ($setting_value['content'] as $contentkey_ => $contentvalue_) {
              $popupSetData[$contentkey_] = $contentvalue_;
              if (isset($popupFrontSetting[$contentkey_])) $popupFrontSetting[$contentkey_] = $contentvalue_;
            }
            if (isset($setting_value['id'])) $popupSetData['global-content-id'] = $inline . $setting_value['id'];
          } elseif ($setting_value['type'] == 'wrap') {

            $data_layout = $popupSetData['layout'] == 'layout-3' || $popupSetData['layout'] == 'layout-2' ? 'two-column' : '';

            $Wrap_uniq_id = isset($setting_value['id']) ? $inline . $setting_value['id'] : '';
            $popupColumnContent = $this->wppb_initColumn($setting_value['content'], $Wrap_uniq_id);
            $popupSetData["content"] .= '<div id="' . $Wrap_uniq_id . '" class="' . $data_layout . ' wppb-popup-rl-wrap rl-clear">' . $popupColumnContent['content'] . '</div>';
            $popupSetData["style"] .= $popupColumnContent['style'];
          }
        } else if ($setting_value['type'] == "close-btn" && !$inline) {
          $Wrap_uniq_id = isset($setting_value['id']) ? $inline . $setting_value['id'] : '';
          $popupSetData["style"] .= isset($setting_value['style']) ? "#" . $Wrap_uniq_id . "{" . $setting_value['style'] . "}" : '';
          $popupSetData["close-btn"] = '<span id="' . $Wrap_uniq_id . '" class="wppb-popup-close-btn dashicons dashicons-no-alt"></span>';
        }
      }
      $popupSetData['front-setting'] = htmlspecialchars(json_encode($popupFrontSetting), ENT_COMPAT);
      return $this->wppb_layout($popupSetData, $inline);
    }
  }

  public function wppb_initColumn($column, $parentId)
  {
    $popupColumn = ['content' => '', 'style' => ''];
    foreach ($column as $value) {
      $id = isset($value["id"]) ? $value["id"] : '';
      $popupColumn['style'] .= isset($value["style"]) ? '#' . $parentId . ' .' . $id . '{' . $value["style"] . '}' : '';
      $popupContent = isset($value['content']) && is_array($value['content']) && !empty($value['content']) ? $this->wppb_initContent($value['content'], $parentId) : ['content' => '', 'style' => ''];
      $popupColumn['style'] .= $popupContent["style"];
      $popupColumn['content'] .= '<div class="' . $id . ' wppb-popup-rl-column">' . $popupContent["content"] . '</div>';
    }
    return $popupColumn;
  }

  public function wppb_initContent($column_content, $parentId)
  {
    $popupContent = ['content' => '', 'style' => ''];

    foreach ($column_content as $setting_value) {
      $uniqIdAttr = isset($setting_value["id"]) ? $setting_value["id"] : '';

      if (isset($setting_value['style'])) {
        $popupContent['style'] .= "#" . $parentId . ' .' . $uniqIdAttr . '{' . $setting_value['style'] . ';}';
      }

      $alignMent = isset($setting_value['alignment']) ? 'wppb-add-style="justify-content:' . $setting_value['alignment'] . ';"' : '';
      $dataLink = isset($setting_value['link']) ? $setting_value['link'] : '';
      $dataLinktarget = isset($setting_value['target']) && $setting_value['target'] ? "target='_blank'" : '';
      $uniqIdAttr = $setting_value['type'] == 'heading' ? $uniqIdAttr . " text-heading" : $uniqIdAttr;

      if ($setting_value['type'] == 'link' || $dataLink) {
        $popupContent['content'] .=  '<div class="data-rl-editable-wrap" ' . $alignMent . '>
                          <a href="' . $dataLink . '" class="' . $uniqIdAttr . '" ' . $dataLinktarget . '>' . $setting_value['content'] . '</a>
                        </div>';
      } elseif ($setting_value['type'] == 'text' || $setting_value['type'] == 'heading') {
        $popupContent['content'] .=  '<div class="data-rl-editable-wrap" ' . $alignMent . '>
                          <span class="' . $uniqIdAttr . '">' . $setting_value['content'] . '</span>
                        </div>';
      } elseif ($setting_value['type'] == 'spacer') {
        $popupContent['content'] .=  '<div class="data-rl-editable-wrap">
                              <span class="' . $uniqIdAttr . '"></span>
                          </div>';
      } elseif ($setting_value['type'] == 'image') {
        $popupContent['content'] .= '<div class="data-rl-editable-wrap wrap-image_" ' . $alignMent . '>
                               <img  class="' . $uniqIdAttr . '" src="' . $setting_value['image-url'] . '">
                              </div>';
      } elseif ($setting_value['type'] == 'lead-form' && isset($setting_value['content']) && is_numeric($setting_value['content']) && self::lead_form_front_end()) {

        $submitAlign = '';
        if (isset($setting_value['styles']) && $uniqIdAttr) {
          $allUniqueId = "#" . $parentId . ' #' . $uniqIdAttr;
          // form style
          if (isset($setting_value['styles']['form-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form{' . $setting_value['styles']['form-style'] . ';}';
          }
          // submit button style
          if (isset($setting_value['styles']['submit-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form input[type="submit"]{' . $setting_value['styles']['submit-style'] . ';}';
          }
          // input label style
          if (isset($setting_value['styles']['label-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form .lf-field.name-type > label,' . $allUniqueId . ' form .lf-field.text-type > label,' . $allUniqueId . ' form .lf-field.textarea-type > label{' . $setting_value['styles']['label-style'] . ';}';
          }
          // radio  checkbox select label style
          if (isset($setting_value['styles']['radio-label-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form .lf-field.checkbox-type > label,' . $allUniqueId . ' form .lf-field.radio-type > label,' . $allUniqueId . ' form .lf-field.select-type > label{' . $setting_value['styles']['radio-label-style'] . ';}';
          }
          //radio text style
          if (isset($setting_value['styles']['radio-text-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form .lf-field.checkbox-type li,' . $allUniqueId . ' form .lf-field.radio-type li{' . $setting_value['styles']['radio-text-style'] . ';}';
          }
          // heading style
          if (isset($setting_value['styles']['heading-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form > h2{' . $setting_value['styles']['heading-style'] . ';}';
          }
          // input field heading style
          if (isset($setting_value['styles']['field-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form .lf-field input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]),' . $allUniqueId . ' form .lf-field textarea{' . $setting_value['styles']['field-style'] . ';}';
          }
          // input parent field heading style
          if (isset($setting_value['styles']['lf-field-style'])) {
            $popupContent['style'] .= $allUniqueId . ' form .lf-field{' . $setting_value['styles']['lf-field-style'] . ';}';
          }
          // submit allignement style
          if (isset($setting_value['styles']['submit-align'])) {
            $submitAlign = 'lf_submit_' . $setting_value['styles']['submit-align'];
          }
        }

        $popupContent['content'] .= '<div class="data-rl-editable-wrap" ' . $alignMent . '>
                  <div class="wppb-popup-lead-form ' . $submitAlign . '" id="' . $uniqIdAttr . '">
                  ' . self::lead_form_front_end()->lfb_show_front_end_forms($setting_value['content']) . '
                  </div>
                  </div>';
      } elseif ($setting_value['type'] == 'shortcode' && isset($setting_value['content'])) {
        $shortCode = $setting_value['content'];
        $allUniqueId = "#" . $parentId . ' #' . $uniqIdAttr;
        if (isset($setting_value['wrap-style'])) {
          $popupContent['style'] .= $allUniqueId . '{' . $setting_value['wrap-style'] . ';}';
        }
        $shortCode_ = '';
        $shortCode_ .= '<div class="wppb-popup-shortcode" id="' . $uniqIdAttr . '">';
        $shortCode_ .= do_shortcode($shortCode);
        $shortCode_ .= "</div>";
        $popupContent_ = '<div class="data-rl-editable-wrap" ' . $alignMent . '>
									' . $shortCode_ . '
								</div>';
        $popupContent['content'] .= $popupContent_;
      }
    }
    return $popupContent;
  }

  public function wppb_layout($popupSetData, $inline, $layout = '')
  {
    $overlay_image = $popupSetData['overlay-image-url'] ? 'background-image:url(' . $popupSetData['overlay-image-url'] . ');' : '';
    $overlayStyle = $overlay_image ? $overlay_image . $popupSetData['overlay-style'] : '';
    $globalHeight = $popupSetData["wrapper-height"] != 'auto' ? $popupSetData["wrapper-height"] . 'px;' : $popupSetData["wrapper-height"] . ';';

    $popupSetData['style'] .= "#" . $popupSetData["global-content-id"] . "{padding:" . $popupSetData["global-padding"] . ";height:" . $globalHeight . '}';
    $popupSetData['style'] .= "#wrapper-" . $popupSetData["global-content-id"] . "{" . $popupSetData["wrapper-style"] . "}";

    // $return = $popupSetData["close-btn"].'<div id="wrapper-'.$popupSetData["global-content-id"].'" class="wppb-popup-custom-wrapper" style="'.$popupSetData["wrapper-style"].'">
    $return = $popupSetData["close-btn"] . '<div id="wrapper-' . $popupSetData["global-content-id"] . '" class="wppb-popup-custom-wrapper">
            <input type="hidden" name="popup-setting-front" value="' . $popupSetData["front-setting"] . '">
             <div class="wppb-popup-overlay-custom-img" wppb-add-style="' . $overlayStyle . '"></div>
              <div class="wppb-popup-custom-overlay" wppb-add-style="background-color:' . $popupSetData['overlay-color'] . ';"></div>
                  <div id="' . $popupSetData["global-content-id"] . '" class="wppb-popup-custom-content">
                  ' . $popupSetData["content"] . '
                  </div>
            </div>';

    $internal_Css = '';
    if ($popupSetData['style']) {
      $style    = $popupSetData['style'];
      $style_res = !$inline ? $style . '@media only screen and (max-width: 480px){' . $this->_responsiveCss($style) . '}' : '';
      $forInline = $inline ? "<textarea wppb-add-style='display:none;' class='wppb-popup-css-one-no_res' data-wrapper='" . $popupSetData["wrapper-style"] . "'>" . $style . "</textarea>" : '';
      $internal_Css = "<div class='wppb-popup-style-internal-stylesheet'>
                  " . $forInline . "
                    <style>" . $style_res . "</style>
                  </div>";
    }
    return $internal_Css . $return;
  }

  public function _responsiveCss($cssMainStr)
  {
    $css = explode('}', $cssMainStr);
    $returnCss = '';
    foreach ($css as $css_value) {
      if ($css_value && substr_count($css_value, 'px') > 0) {
        $id_css_Prop = explode('{', $css_value);
        if ($this->_responsiveCss2($id_css_Prop)) {
          $returnCss .= $id_css_Prop[0] . '{' . $this->_responsiveCss2($id_css_Prop) . '}';
        }
      }
    }
    return $returnCss;
  }
  public function _responsiveCss2($id_css_Prop)
  {
    $cssProp = explode(';', $id_css_Prop[1]);
    $returnWprop = '';
    foreach ($cssProp as $cssProp_value) {
      if (substr_count($cssProp_value, 'px') > 0) {
        $cssProp_value = explode(':', $cssProp_value);
        if ($this->_responsiveCss3($cssProp_value)) {
          $propertyType = trim($cssProp_value[0]);
          $returnWprop .= $propertyType . ':' . $this->_responsiveCss3($cssProp_value, $propertyType) . ';';
        }
      }
    }
    return $returnWprop;
  }
  public function _responsiveCss3($cssProp_value, $arg = false)
  {
    $get_px_arr = [];
    $css_con = false;
    $cssParameter  = explode('px', $cssProp_value[1]);
    foreach ($cssParameter as $value) {
      if (is_numeric($value) && ($value > 0 || $value <= -1)) {
        $get_px_arr[] = trim($value);
      }
    }
    if (!empty($get_px_arr)) {
      rsort($get_px_arr);
      $css_con = $cssProp_value[1];
      foreach ($get_px_arr as $number_px) {
        $param = $arg == 'border-radius' ? $number_px : ($number_px / 100) * 60;
        $param = number_format((float)$param, 2, '.', '');
        if ($arg == 'font-size' && $param < 10) {
          $param = 10.00;
        }
        $css_con = str_replace($number_px . 'px', $param . 'px', $css_con);
      }
    }
    return $css_con;
  }

  // lead form -------------- function --------------- 

  public static function lead_form_front_end()
  {
    return class_exists('LFB_Front_end_FORMS') ? new LFB_Front_end_FORMS() : false;
  }

  public static function lead_form_db()
  {
    return class_exists('LFB_SAVE_DB') ? new LFB_SAVE_DB() : false;
  }

  public static function lead_form_opt()
  {
    $forms = self::lead_form_db() ? self::lead_form_db()->lfb_get_all_form_title() : false;
    $return = '';
    if (!empty($forms)) {
      foreach ($forms as $value) {
        if (isset($value->id) && isset($value->form_title)) $return .= "<option value='" . $value->id . "'>" . $value->form_title . "</option>";
      }
    }
    return $return ? $return : "<option>" . __("No Form Found", 'wppb') . "</option>";
  }

  public function get_lead_form_ajx()
  {
    if (isset($_POST['form_id']) && is_numeric($_POST['form_id']) && self::lead_form_front_end()) {
      return  intval($_POST['form_id']);      
    }
  }


  // class end
}
