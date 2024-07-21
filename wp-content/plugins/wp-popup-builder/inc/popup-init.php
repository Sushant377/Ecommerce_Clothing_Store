<?php
if (!defined('ABSPATH')) exit;
class wp_popup_builder_init {


	
	public function editor_wp_kes(){
		$arr = wp_kses_allowed_html( 'post');
		$attribute = array(
			'class' => array(),
			'id'=>true,
			'type'=>true,
			'name'=>true,
			'value' =>true,
			'for'=>true,
			'required'=>true,
			'placeholder' => true,
			'wppb-add-style' =>  array(),
			'themecheck'=>true,
			'redirect'=>true,
			'action' => true,
			'method' => true,
			'href'=>true,
			'data-prebuilt-id'=>true,
			'data-outside-color'=>true,
			'data-layout'=>true,
			'data-rl-editable'=>true,
			'data-color-id-color'=>true,
			'data-overlay-image' => array(),
			'data-rl-column' => array(),
			'data-content-alignment' => array(),
			'data-editor-link' => array(),
			'data-editor-link-target' => array(),
			'data-form-styles' => array(),
			'data-rl-editable-wrap'=> array(),
			'data-form-id'=> array(),
			'data-shortcode'=> array(),
			'data-uniqid' => array(),
			'contenteditable'=> array(),
			'data-color-id-background-color'=> array(),
			'data-color-id-border-color'=> array(),
			'data-editor-link' => array(),
			'data-editor-link-target' => array(),
			'data-shortcode'=> array(),
			'wppb-popup-custom-wrapper'=>array(),
			'wppb-popup-overlay-custom-img'=>array(),
			'wppb-popup-custom-overlay'=>array(),
			'wppb-popup-custom-content'=>array(),
			'data-rl-wrap'=>array(),
			'title' => array(),
			'src' => array(),
			'alt' => array(),
			'data-editor-link' => array(),
			'data-editor-link-target' => array(),
			'data-shortcode'=> array(),
			'wrapper-height'=>true,
			'overlay-image-url'=>true,
			'overlay-style'=>true,
			'overlay-color'=>true,
			'data-option'=>true,
			'data-wppb-frequency'=>true,
			'data-wppb-bid'=>true,
			'popup-delay-open'=>true,
			'style'=>array(),
			);
	
		$arr['span'] = $attribute;
		$arr['label'] = $attribute;
		$arr['div'] = $attribute;
		$arr['img'] = $attribute;
		$arr['p'] = $attribute;
		$arr['a'] = $attribute;
		$arr['form'] = $attribute;
		$arr['input'] = $attribute;
		$arr['textarea'] = $attribute;
		$arr['style'] = $attribute;
		return $arr;
	}

	function input_wp_kses() {
		$kses = array();
		$allowed_html = array(
			'id' => true,
			'type' => true,
			'class' => true,
			'value' => true,
			'data-global-input' => true,
			'data-editor-input' => true,
			'data-bid' => true,
			'checked' => true,
			'data-lead-form' => true,
			'data-border' => true,
			'data-shadow' => true,
			'data-input-color' => true,
			'data-cmn' => true,
			'box-shadow-global' => true
		);

		$kses['label'] = $allowed_html;
		$kses['input'] = $allowed_html;
		return $kses;
	}


	function popup_wp_kses() {
		$arr = wp_kses_allowed_html('post');
		$attribute = array(
			'class' => true,
			'id' => true,
			'type' => true,
			'wrapper-width' => true,
			'data-editor-input' => true,
			'data-lead-form' => true,
			'data-shortcode' => true,
			'wrapper-height' => true,
			'title' => true,
			'min' => true,
			'max' => true,
			'value' => true,
			'data-cmn' => true,
			'data-margin' => true,
			'close-btn-margin-top' => true,
			'close-btn-margin-right' => true,
			'data-show-range' => true,
			'data-range-output' => true,
			'data-global-input' => true,
		);

		$arr['label'] = $attribute;
		$arr['div'] = $attribute;
		$arr['input'] = $attribute;

		return $arr;
	}



	function initColumn($column) {
		$popupColumn = '';
		foreach ($column as $value) {
			$uniqIdAttr = isset($value["id"]) ? ' data-uniqid="' . esc_attr($value["id"]) . '"' : '';
			$style = isset($value["style"]) ? 'wppb-add-style="' . esc_attr($value["style"]) . '"' : '';
			$popupValueContent = isset($value['content']) && is_array($value['content']) && !empty($value['content']) ? $this->initContent($value['content']) : '';
			$popupColumn .= '<div ' . $uniqIdAttr . ' data-rl-column="1" class="wppb-popup-rl-column rlEditorDropable" ' . $style . '>' . $popupValueContent . '</div>';
		}
		return $popupColumn;
	}

	function initContent($column_content) {
		$popupContent = '';
		foreach ($column_content as $setting_value) {
			$Style = '';
			if (isset($setting_value['style'])) {
				$style_attr = esc_attr($setting_value['style']);
				$Style = "wppb-add-style='$style_attr'";
			}
			$alignMent = isset($setting_value['alignment']) ? 'wppb-add-style="justify-content:' . esc_attr($setting_value['alignment']) . ';"' : '';
			$alignMentContent = $alignMent ? 'data-content-alignment="' . esc_attr($setting_value['alignment']) . '"' : '';
			$dataLink = isset($setting_value['link']) ? "data-editor-link='" . esc_attr($setting_value['link']) . "'" : '';
			$dataLinktarget = isset($setting_value['target']) ? "data-editor-link-target='" . esc_attr($setting_value['target']) . "'" : '';
			$uniqIdAttr = isset($setting_value["id"]) ? ' data-uniqid="' . esc_attr($setting_value["id"]) . '"' : '';

			$contentAttr = $alignMentContent . $dataLink . $dataLinktarget . $uniqIdAttr;

			if ($setting_value['type'] == 'text') {
				$popupContent .=	'<div class="data-rl-editable-wrap" ' . $alignMent . '>
									<div class="actions_">
									<span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span data-rl-editable="text" ' . $Style . ' ' . $contentAttr . '>' . $setting_value['content'] . '</span>
								</div>';
			} elseif ($setting_value['type'] == 'heading') {
				$popupContent .=	'<div class="data-rl-editable-wrap" ' . $alignMent . '>
									<div class="actions_">
									<span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span class="text-heading" data-rl-editable="heading" ' . $Style . ' ' . $contentAttr . '>' . $setting_value['content'] . '</span>
								</div>';
			} elseif ($setting_value['type'] == 'spacer') {
				$popupContent .=	'<div class="data-rl-editable-wrap">
											<div class="actions_">
											<span class="dashicons dashicons-no rlRemoveElement"></span>
										</div>
										<span data-rl-editable="spacer" ' . $Style . ' ' . $contentAttr . '></span>
									</div>';
			} elseif ($setting_value['type'] == 'image') {

				$popupContent .= '<div class="data-rl-editable-wrap wrap-image_" ' . $alignMent . '>
												<div class="actions_">
												<span class="dashicons dashicons-no rlRemoveElement"></span>
											 </div>
											 <img src="' . $setting_value['image-url'] . '" ' . $Style . ' ' . $contentAttr . ' data-rl-editable="image">
											</div>';
			} elseif ($setting_value['type'] == 'link') {
				$popupContent .=	'<div class="data-rl-editable-wrap" ' . $alignMent . '>
									<div class="actions_">
									<span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span data-rl-editable="link" ' . $Style . ' ' . $contentAttr . '>' . $setting_value['content'] . '</span>
								</div>';
			} elseif ($setting_value['type'] == 'lead-form' && (isset($setting_value['content']) && is_numeric($setting_value['content'])) && wppb_db::lead_form_front_end()) {
				$leadForm_Form = wppb_db::lead_form_front_end()->lfb_show_front_end_forms($setting_value['content']);
				$formStyles = '';
				if (isset($setting_value['styles'])) {
					$formStyles = htmlspecialchars(json_encode($setting_value['styles']), ENT_COMPAT);
					$formStyles = 'data-form-styles="' . $formStyles . '"';
				}

				$submitAlign = '';
				if (isset($setting_value['styles']['submit-align'])) {
					$submitAlign = 'lf_submit_' . $setting_value['styles']['submit-align'];
				}
				$popupContent .= '<div class="data-rl-editable-wrap" ' . $alignMent . '>
								<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div>
								<div class="wppb-popup-lead-form ' . $submitAlign . '" ' . $uniqIdAttr . ' data-form-id="' . $setting_value['content'] . '" ' . $formStyles . '>
									' . $leadForm_Form . '
									</div>
									</div>';
			} else if ($setting_value['type'] == 'shortcode' && isset($setting_value['content'])) {
				$shortCode = $setting_value['content'];
				$style_ = isset($setting_value['wrap-style']) ? $setting_value['wrap-style'] : '';
				$shortCode_ = '';
				$shortCode_ .= '<div class="wppb-popup-shortcode" data-shortcode="' . $shortCode . '" wppb-add-style="' . $style_ . '" ' . $uniqIdAttr . '>';
				$shortCode_ .= do_shortcode($shortCode);
				$shortCode_ .= "</div>";
				$popupContent .= '<div class="data-rl-editable-wrap" ' . $alignMent . '>
					<div class="actions_">
					<span class="dashicons dashicons-admin-page rlCopyElement"></span>
					<span class="dashicons dashicons-no rlRemoveElement"></span>
					</div>
					' . $shortCode_ . '
				</div>';
			}
		}
		return $popupContent;
	}

	function popup_layout($popupSetData, $layout = '') {
		$overlay_image = $popupSetData['overlay-image-url'] ? 'background-image:url(' . $popupSetData['overlay-image-url'] . ');' : '';
		$overlayStyle = $overlay_image ? $overlay_image . $popupSetData['overlay-style'] : '';

		$globalHeight = $popupSetData["wrapper-height"] != 'auto' ? $popupSetData["wrapper-height"] . 'px;' : $popupSetData["wrapper-height"] . ';';
		$globalStyle = "padding:" . $popupSetData["global-padding"] . ";height:" . $globalHeight;

		$return = $popupSetData["close-btn"] . '<div class="wppb-popup-custom-wrapper"  wppb-add-style="' . $popupSetData["wrapper-style"] . '" >
			         <div class="wppb-popup-overlay-custom-img" data-overlay-image="' . $popupSetData['overlay-image-url'] . '" wppb-add-style="' . $overlayStyle . '"></div>
			          <div class="wppb-popup-custom-overlay" wppb-add-style="background-color:' . $popupSetData['overlay-color'] . ';"></div>
			              <div class="wppb-popup-custom-content" wppb-add-style="' . $globalStyle . '">
				            ' . $popupSetData["content"] . '
			              </div>
			        </div>';
		return $return;
	}

	// popup page list of all popupSetData content
	public function wppbPopupContent($allSetting) {
		$popupSetData = array(
			'wrapper-style'		=> '',
			'wrapper-height'	=> 'auto',
			'overlay-image-url' => '',
			'overlay-style'		=> "",
			'overlay-color'		=> '#28292C91',
			'outside-color'		=> '#cdcbcb',
			'content' 			=> '',
			'global-padding'	=> '23px 37px',
			'layout' 			=> '',
			'close-btn' 		=> '',
			'popup-name' 		=> __('New Popup name', 'wppb'),
		);
		foreach ($allSetting as $setting_value) {
			if (isset($setting_value['content']) && is_array($setting_value['content'])) {
				if ($setting_value['type'] == 'global-setting') {
					foreach ($setting_value['content'] as $contentkey_ => $contentvalue_) {
						if (isset($popupSetData[$contentkey_])) $popupSetData[$contentkey_] = $contentvalue_;
					}
				} elseif ($setting_value['type'] == 'wrap') {
					$popupContentColumn = $this->initColumn($setting_value['content']);
					$popupSetData['content'] =	'<div data-rl-wrap="" class="wppb-popup-rl-wrap rl-clear">' . $popupContentColumn . '</div>';
				}
			} else if ($setting_value['type'] == "close-btn") {
				$uniqIdAttr = isset($setting_value["id"]) ? ' data-uniqid="' . esc_attr($setting_value["id"]) . '"' : '';
				$styleClose = isset($setting_value['style']) ? "wppb-add-style='" . esc_attr($setting_value['style']) . "'" : '';
				$popupSetData["close-btn"] = '<span ' . $uniqIdAttr . ' class="wppb-popup-close-btn dashicons dashicons-no-alt" ' . $styleClose . '></span>';
			}
		}
		return $popupSetData;
	}


	// popup page list of all popupSetData

	public function wppbPopupList($allSetting, $business_id, $device_, $isActive = false) {

		$_nonce = wp_create_nonce('nonce_pop');

		$popup_is_active = $isActive ? " checked='checked'" : "";

		$popup_name = isset($allSetting[0]['content']['popup-name']) && $allSetting[0]['content']['popup-name'] ? $allSetting[0]['content']['popup-name'] : '';

		$business_id = $business_id ? $business_id : "";

		$url    = WPPB_PAGE_URL . '&custom-popup=' . $business_id . '&_pnonce=' . esc_attr($_nonce);

		$all 	 = !$device_ || $device_ == "all" ? 'checked' : '';

?>

		<div class='wppb-list-item'>

			<div class="wppb-popup-list-title"><span><?php echo esc_html($popup_name); ?></span>
			</div>
			<div class="wppb-popup-list-enable"><span>
					<div class="wppb-popup-checkbox">
						<input id="business_popup--<?php echo esc_attr($business_id); ?>" type="checkbox" class="wppb_popup_setting_active" data-bid="<?php echo esc_attr($business_id); ?>" <?php echo esc_attr($popup_is_active); ?>>
						<label for="business_popup--<?php echo esc_attr($business_id); ?>"></label>
					</div>
				</span>

			</div>

			<div class="wppb-popup-list-mobile">
				<div>
					<input data-device="<?php echo esc_attr($business_id); ?>" id="wppb-device-name-all<?php echo esc_attr($business_id); ?>'" type="radio" name="device-<?php echo esc_attr($business_id); ?>" value="all" <?php echo esc_attr($all); ?>>
					<label for="wppb-device-name-all<?php echo esc_attr($business_id); ?>"><span class="dashicons dashicons-admin-site-alt3"></span></label>
				</div>
			</div>

			<div class="wppb-popup-list-view">
				<a href="<?php echo esc_url(get_home_url() . "?wppb_preview=" . esc_attr($business_id)); ?>" target="_blank">
					<span class="dashicons dashicons-visibility"></span>
				</a>
			</div>

			<div class="wppb-popup-list-action"><span><a data-bid="<?php echo esc_attr($business_id); ?>" class="wppb_popup_deleteAddon dashicons dashicons-trash"></a><a class="wppb-popup-setting can_disable" href="<?php echo esc_url($url); ?>"><span class="dashicons dashicons-edit"></span></a></span></div>

			<div class="wppb-popup-list-setting"><a href="<?php echo esc_url($url) . '&wppb-setting'; ?>"><span class="dashicons dashicons-admin-generic"></span></a></div>

		</div>

	<?php }


	// popup page list of all popupSetData json file
	public function wppbPopupList_json($allSetting, $column_making, $countPopup) {

		$imageUrl = isset($allSetting[0]['img-url']) ? $allSetting[0]['img-url'] : '';

		$imageUrl = $imageUrl ? "<img src='" . esc_url($imageUrl) . "'>" : '';

		$prebuilt_id = 'wppb-prebuilt-id-' . esc_attr($column_making);

		$popupSetData = $this->wppbPopupContent($allSetting);

		$attr_inbuilt = isset($popupSetData['layout']) && $popupSetData['layout'] ? ' data-layout="' . esc_attr($popupSetData['layout']) . '"' : '';

		$attr_inbuilt .= isset($popupSetData['outside-color']) && $popupSetData['outside-color'] ? ' data-outside-color="' . esc_attr($popupSetData['outside-color']) . '"' : '';

		$attr_inbuilt .= " data-prebuilt-id='" . esc_attr($prebuilt_id) . "'";

		$popupSetData = $this->popup_layout($popupSetData);

		$popupSetData = "<div data-layout='" . esc_attr($prebuilt_id) . "'>" . $popupSetData . '</div>';

		$returnHtml = ['prebuilt-html' => $popupSetData, 'prebuilt-label' => ''];

		if ($column_making == 1) $returnHtml['prebuilt-label'] .= '<div class="wppb-popup-row wppb-popup_clear">';

		$returnHtml['prebuilt-label'] .= '<div class="wppb-popup-column-three">
								<input id="wppb-popup-layout-label__layout--' . $column_making . '" type="radio" name="wppb-popup-layout" value="prebuilt" ' . $attr_inbuilt . '>
								<label for="wppb-popup-layout-label__layout--' . $column_making . '" class="wppb-popup-json-label">' . $imageUrl . '</label>
						</div>';

		if ($countPopup == ($column_making)) {

			$returnHtml['prebuilt-label'] .= '</div>';
		} elseif (($column_making) % 3 === 0) {

			$returnHtml['prebuilt-label'] .= '</div><div class="wppb-popup-row wppb-popup_clear">';
		}

		return $returnHtml;
	}

	// shortcode 

	public function show_popup_part_start($value, $shortcode = false) {
		$return_data = false;
		$cookieFilter = true;
		$option = unserialize($value->boption);
		if (isset($_COOKIE['wppb-fr-' . $value->BID]) && isset($option['frequency']) && $_COOKIE['wppb-fr-' . $value->BID] == $option['frequency']) {
			$cookieFilter = false;
		}
		if ($cookieFilter) {
			$device = isset($option['device']) ? $option['device'] : false;
			$checkMobile = wp_is_mobile();
			// if ( $device == 'mobile' && $checkMobile ) { //desktop condition
			if (($device == 'mobile' || isset($option['mobile-enable'])) && $checkMobile) { //desktop condition and also for previous user
				$return_data = true;
			} else if ($device == 'desktop' && !$checkMobile) { //mobile condition
				$return_data =  true;
			} else if ($device == 'all' || $device == false) { //all and if not device set
				$return_data =  true;
			}
		}
		return $return_data ? $this->show_popup_part_one($value, $option, $shortcode) : false;
	}

	public function show_popup_part_one($value, $option, $shortcode) {
		$return_ = false;
		$setting_ = [];
		$popup_attr = '';
		$placement = isset($option['placement']) ? $option['placement'] : false;
		// if ( $placement == 'all' ) {//new user
		if ($placement == 'all' || (isset($option['all']) && $option['all'])) {
			$return_ = true;
			// }else if ( $placement == 'home_page' && is_front_page() ) { for new update
		} else if (($placement == 'home_page' && is_front_page()) || (isset($option['home_page']) && $option['home_page'])) {
			$return_ = true;
		}

		// class and attr by trigger
		if (isset($option['trigger'])) {
			$trigger = $option['trigger'];
			//for page load 
			if (isset($trigger['page-load'])) {
				if (!$trigger['page-load'] || $trigger['page-load'] == 'false') $return_ = false;
			}
			//for setting like popup open delay 
			if (isset($trigger['time'])) {
				$minute_ = isset($trigger['time']['minute']) && is_numeric(isset($trigger['time']['minute'])) ? $trigger['time']['minute'] * 60 : false;
				$second_ = $minute_ ? $minute_ + $trigger['time']['second'] : $trigger['time']['second'];
				$setting_['popup-delay-open'] = $second_;
			}
		}
		// for frequency 
		if (isset($option['frequency']) && $option['frequency']) {
			$popup_attr .= 'data-wppb-frequency="' . esc_attr($option['frequency']) . '"';
			$popup_attr .= 'data-wppb-bid="' . esc_attr($value->BID) . '"';
		}

		if ($shortcode || $return_) {
			$popupHtml = new wppb_db();
			$popupHtmlContent = $popupHtml->wppb_html($value->setting, '', $setting_);
			$showPopup = $popupHtmlContent ? '<div data-option="1" class="wppb-popup-open popup active" ' . $popup_attr . '>' . $popupHtmlContent . '</div>' : '';
			if ($showPopup) return $showPopup;
		}
	}
	// shortcode 



	// builder internal tools function
	public function wppb_changeFilePath($arr, $path) {
		$return = [];
		if (is_array($arr)) {
			foreach ($arr as $key => $value) {
				if (is_array($value)) {
					$return[$key] = $this->wppb_changeFilePath($value, $path);
				} else {
					if ($key == 'image-url' || $key == 'overlay-image-url' || $key == 'img-url') {
						$Exp = explode('/', $value);
						$End = end($Exp);
						$return[$key] = $path . $End;
					} else {
						$return[$key] = $value;
					}
				} //else
			} //foreach
		}
		return $return;
	}

	public function header_title($title) { ?>

		<div class="rl_i_editor-header-title">
			<label><?php echo esc_html($title); ?></label>
		</div>

		<?php }

	public function color($title, $prop, $type, $color_id = 1, $attr = '') {
		if ($title && $prop && $type) {

		?>
			<div class="rl_i_editor-item-content-items item-text inline__">
				<label class="rl-sub-title"><?php echo esc_html($title); ?></label>

				<div>
					<label class="color-output" data-input-color="<?php echo esc_attr($color_id); ?>" <?php echo esc_attr($type) . '="' . esc_attr($prop) . '"' . esc_attr($attr); ?>></label>

				</div>
			</div>
		<?php }
	}

	public function range_slider($title, $id, $arr, $id_two = false, $type_ = "data-global-input") {

		$title_ = isset($arr['title']) ? $arr['title'] : '';
		$attr  = isset($arr['min']) ? ' min="' . $arr['min'] . '"' : '';
		$attr .= isset($arr['max']) ? ' max="' . $arr['max'] . '"' : '';
		$attr .= isset($arr['value']) ? ' value="' . $arr['value'] . '"' : '';
		$attr .= $attrTwo = isset($arr['attr']) ? $arr['attr'] : '';
		$id_two = !$id_two ? $id : $id_two;

		$attr .=  ' ' . $type_ . '="' . $id . '"';
		$container = isset($arr['container-class']) ? $arr['container-class'] : '';
		$html = '<div  class="rl_i_editor-item-content-items inline__ ' . $container . '">';
		$html .= '<label class="rl-sub-title range-titile">' . $title . '</label>';
		$html .= '<div class="range_ rl_i_range-font-size">
							<input data-show-range="' . $id_two . '"  type="range" ' . $attr . '>
						</div>';
		$html .= '<div class="data-range-output"><input class="rl-sub-title" type="number" data-range-output="' . $id_two . '" ' . $attrTwo . '>';
		$html .= '</div>
					</div>';
		echo wp_kses($html, $this->popup_wp_kses());
	}

	public function select($attr, $option) { ?>
		<select class='rl-sub-title' <?php echo wp_kses_data($attr); ?>>
			<?php if (is_array($option)) {
				foreach ($option as $value) {
					if (isset($value[0]) && isset($value[1])) {
						$selected = isset($value[2]) ? 'selected="selected"' : ''; ?>

						<option value='<?php echo esc_attr($value[1]); ?>' <?php echo esc_attr($selected); ?>><?php echo esc_attr($value[0]); ?>
						</option>

					<?php } elseif (isset($value[0])) { ?>

						<option><?php echo esc_attr($value[0]); ?></option>

			<?php 	}
				}
			}

			?>
		</select>

	<?php }

	public function checkbox($id, $title, $attr) {
	?>
		<div class="rl_i_editor-item-content-items title_ inline__">

			<div class="rl_i_range-font-size">

				<div class="wppb-popup-checkbox-container">

					<label class="wppb-popup-checkbox-title rl-sub-title"><?php echo esc_html($title); ?></label>

					<div class="wppb-popup-checkbox">

						<?php $input = '<input id="wppb_popup__checkbox__label_id-' . $id . '" type="checkbox" ' . $attr . '>';

						echo wp_kses($input, $this->input_wp_kses());

						?>
						<label for="wppb_popup__checkbox__label_id-<?php echo esc_attr($id); ?>"></label>

					</div>

				</div>

			</div>

		</div>

	<?php }


	public function border($id, $type, $attr = '') {
		$data_attr = $type . '="' . $id . '"' . $attr;
	?>
		<section class="content-style-border">

			<?php echo $this->checkbox($id, "Border", $data_attr . ' data-border="border-enable"');
			?>

			<div class="rl_i_editor-item-content-items content-border">
				<div>
					<label class="rl-sub-title"><?php _e('Border Width(<small>px</small>)', 'wppb'); ?></label>
					<div>
						<?php
						$input = '<input class="rl-sub-title" type="number" value=""  ' . $data_attr . ' data-border="width">';
						echo wp_kses($input, $this->input_wp_kses());

						?>

					</div>
				</div>
				<div>

					<label class="rl-sub-title"><?php _e('Border radius(<small>px</small>)', 'wppb'); ?>
					</label>

					<div>
						<?php
						$input = '<input class="rl-sub-title" type="number" value=""  ' . $data_attr . ' data-border="radius">';
						echo wp_kses($input, $this->input_wp_kses());
						?>
					</div>

				</div>

				<div>
					<label class="rl-sub-title"><?php _e('Border Color', 'wppb'); ?>
					</label>
					<div>

						<?php
						$label = '<label class="color-output"  ' . $data_attr . '  data-input-color="border-color"></label>';
						echo wp_kses($label, $this->input_wp_kses());
						?>
					</div>
				</div>

				<div>
					<label class="rl-sub-title">
						<?php _e('Border Style', 'wppb'); ?>
					</label>
					<?php $this->select($data_attr . ' data-border="border-style"', [['solid', 'solid'], ['dashed', 'dashed'], ['dotted', 'dotted'], ['double', 'double'], ['groove', 'groove'], ['ridge', 'ridge']]);
					?>
					<div></div>
				</div>
			</div>
		</section>
	<?php }


	public function box_shadow($id, $type, $attr = '') {
		$data_attr = esc_attr($type) . '="' . esc_attr($id) . '"'; ?>
		<section class="content-style-border content-style-box-shadow">
			<?php $this->checkbox($type, 'Box Shadow', $data_attr . ' data-shadow="enable"'); ?>
			<div class="rl_i_editor-item-content-items content-border content-box-shadow">
				<div>
					<label class="rl-sub-title">
						<?php _e('X Offset', 'wppb'); ?>
					</label>
					<div>
						<input class="rl-sub-title" type="number" value="" <?php echo  esc_attr($type) . '="' . esc_attr($id) . '"'; ?> data-shadow="x-offset">
					</div>
				</div>
				<div>
					<label class="rl-sub-title"><?php _e('Y Offset', 'wppb'); ?></label>
					<div><input class="rl-sub-title" type="number" value="" <?php echo  esc_attr($type) . '="' . esc_attr($id) . '"'; ?> data-shadow="y-offset"></div>
				</div>
				<div>
					<label class="rl-sub-title"><?php _e('Blur', 'wppb'); ?></label>
					<div><input class="rl-sub-title" type="number" value="" <?php echo  esc_attr($type) . '="' . esc_attr($id) . '"'; ?> data-shadow="blur"></div>
				</div>
				<div>
					<label class="rl-sub-title"><?php _e('Spread', 'wppb'); ?>
					</label>
					<div>
						<input class="rl-sub-title" type="number" value="" <?php echo  esc_attr($type) . '="' . esc_attr($id) . '"'; ?> data-shadow="spread">
					</div>
				</div>
				<div>
					<label class="rl-sub-title"><?php _e('Color', 'wppb'); ?>
					</label>
					<div>
						<label class="color-output" <?php echo  esc_attr($type) . '="' . esc_attr($id) . '"'; ?> data-shadow="color"></label>
					</div>
				</div>
			</div>
		</section>

	<?php }


	public function margin_padding($id, $title, $type, $margin_padding, $attr = '') {

		$parameter = $margin_padding == "m" ? 'margin' : 'padding'; ?>

		<div class="rl_i_editor-item-content-items title_ inline_">
			<div class="rl_i_range-font-size"><label class="rl-sub-title"><?php echo esc_html($title); ?></label></div>
		</div>
		<div class="rl_i_editor-item-content-items inline_">
			<div class="rl_i_editor-item-content-padding_ paraMeterContainer__">
				<ul class="ul-inputs-margin-padding rl-clear">
					<li>
						<input class="rl-sub-title" type="number" value="" <?php echo esc_attr($type) . "='" . esc_attr($id) . "'"; ?> data-cmn="close-btn" data-<?php echo esc_attr($parameter); ?>="top">
					</li>
					<li>
						<input class="rl-sub-title" type="number" value="" <?php echo esc_attr($type) . "='" . esc_attr($id) . "'"; ?> data-cmn="close-btn" data-<?php echo esc_attr($parameter); ?>="right">

					</li>
					<li>
						<input class="rl-sub-title" type="number" value="" <?php echo esc_attr($type) . "='" . esc_attr($id) . "'"; ?> data-cmn="close-btn" data-<?php echo esc_attr($parameter); ?>="bottom">

					</li>
					<li>
						<input class="rl-sub-title" type="number" value="" <?php echo esc_attr($type) . "='" . esc_attr($id) . "'"; ?> data-cmn="close-btn" data-<?php echo esc_attr($parameter); ?>="left">
					</li>

					<li class="padding-origin_ margin-padding-origin">
						<input id="m__p_origin-<?php echo esc_attr($parameter); ?>-<?php echo esc_attr($id); ?>" type="checkbox" <?php echo esc_attr($type) . "='" . esc_attr($id) . "'"; ?> data-cmn="close-btn" data-origin="<?php echo esc_attr($parameter); ?>">
						<label for="m__p_origin-<?php echo esc_attr($parameter); ?>-<?php echo esc_attr($id); ?>">
							<span class="dashicons dashicons-admin-links">
							</span>
						</label>
					</li>

				</ul>
				<ul class="ul-inputs-text rl-clear">
					<li><?php _e('TOP', 'wppb'); ?></li>
					<li><?php _e('RIGHT', 'wppb'); ?></li>
					<li><?php _e('BOTTOM', 'wppb'); ?></li>
					<li><?php _e('LEFT', 'wppb'); ?></li>
					<li></li>
				</ul>
			</div>
		</div>

	<?php }

	public function alignment($title, $id, $type, $attr = '', $number_ = false) {
	?>
		<div class="rl_i_editor-item-content-items item-alignment_ inline__">
			<label class="rl-sub-title"><?php echo esc_html($title); ?></label>
			<div class="rl_text-alignment">
				<ul class="text-alignment-choice">
					<li>
						<input id="_alignment_label_<?php echo esc_attr($id); ?>_left" <?php echo esc_attr($type) . "='" . esc_attr($id) . "' " . esc_attr($attr); ?> type="radio" name="<?php echo esc_attr($id); ?>" value="left">
						<label for="_alignment_label_<?php echo esc_attr($id); ?>_left" class="dashicons dashicons-editor-alignleft"></label>
					</li>
					<li>
						<input id="_alignment_label_<?php echo esc_attr($id); ?>_center" <?php echo esc_attr($type) . "='" . esc_attr($id) . "' " . esc_attr($attr); ?> type="radio" name="<?php echo esc_attr($id); ?>" value="center">
						<label for="_alignment_label_<?php echo esc_attr($id); ?>_center" class="dashicons dashicons-editor-aligncenter"></label>
					</li>
					<?php if ($number_ != 2) { ?>
						<li>
							<input id="_alignment_label_<?php echo esc_attr($id); ?>_right" <?php echo esc_attr($type) . "='" . esc_attr($id) . "' " . esc_attr($attr); ?> type="radio" name="<?php echo esc_attr($id); ?>" value="right">
							<label for="_alignment_label_<?php echo esc_attr($id); ?>_right" class="dashicons dashicons-editor-alignright"></label>
						</li>
					<?php } ?>

				</ul>
			</div>
		</div>
<?php }
	// class end
}