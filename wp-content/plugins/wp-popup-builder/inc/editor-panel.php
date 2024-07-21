<?php
if (!defined('ABSPATH')) exit;

$LfbPluginPath = false;

if (file_exists(WP_PLUGIN_DIR . '/lead-form-builder/lead-form-builder.php') && is_plugin_inactive('lead-form-builder/lead-form-builder.php')) {

	$LfbPluginPath = '<a href="#" class="add-lead-form-plugin active-lead-form-btn">' . __("Activate Lead Form", 'wppb') . '</a>';
} elseif (!file_exists(WP_PLUGIN_DIR . '/lead-form-builder/lead-form-builder.php')) {

	$LfbPluginPath = '<a href="#" class="add-lead-form-plugin install-lead-form-btn">' . __("Install Lead Form", 'wppb') . '</a>';
}

?>

<div class="rl_i_editor-inner-wrap">
	<div class="rl_i_editor-wrap-in">
		<div class="rl_i_editor-header">
			<div class="rl_i_editor-header-area">
				<span> <?php _e('Real Time Editor', 'wppb'); ?></span>
			</div>
		</div>
		<div class="rl_i_editor-content">
			<div class="rl_i_editor-content-area">
				<button class="wppb-export-sub"><?php _e("Export Popup", 'wppb'); ?></button>

				<?php $wp_builder_obj->header_title(__('Popup Name', 'wppb')); ?>
				<input data-global-input="popup-name" type="text" name="global-popup-name">
				<!-- content -->
				<div data-toggle="add-itemes" class="rl_i_editor-element-Toggle outer-toggle rl-active">
					<span><?php _e('Drag & Drop Module', 'wppb'); ?></span>
					<span class="bottomCarret dashicons dashicons-arrow-right"></span>
				</div>
				<section data-toggle-action="add-itemes" class="rl_i_editor-element-item">
					<div class="rl_i_editor-element-add-item">
						<ul class="rl_i_editor-element-add-item-list rl-clear">
							<li><span data-item-drag="text"><i class="text-icon"><?php _e("T", 'wppb'); ?></i><?php _e("Text", 'wppb'); ?></span></li>
							<li><span data-item-drag="heading"><i class="text-icon"><?php _e("H", 'wppb'); ?></i><?php _e("Heading", 'wppb'); ?></span></li>
							<li><span data-item-drag="link"><i class="text-icon dashicons dashicons-admin-links"></i><?php _e("Button", 'wppb'); ?></span></li>
							<li><span data-item-drag="image"><i class="text-icon dashicons dashicons-format-image"></i><?php _e("Image", 'wppb'); ?></span></li>
							<li><span data-item-drag="lead-form"><i class="text-icon dashicons dashicons-feedback"></i><?php _e("Form", 'wppb'); ?></span></li>
							<li><span class="wppb-drag-itemes" data-item-drag="spacer"><i class="text-icon dashicons dashicons-image-flip-vertical"></i><?php _e("Spacer", 'wppb'); ?></span>
							</li>
							<li>
								<span class="wppb-drag-itemes form" data-item-drag="shortcode"><i class="text-icon dashicons dashicons-shortcode"></i><?php _e("Short Code", 'wppb'); ?></span>
							</li>
							<li><span class="lock"><i class="text-icon dashicons dashicons-text"></i><?php _e('Icon List', 'wppb'); ?></span></li>
							<li><span class="lock"><i class="text-icon dashicons dashicons-star-empty"></i><?php _e('Icon', 'wppb'); ?></span></li>
							<li><span class="lock"><i class="text-icon dashicons dashicons-image-filter"></i><?php _e('Lottie', 'wppb'); ?></span></li>
							<li><span class="lock"><i class="text-icon dashicons dashicons-text"></i><?php _e("Section", 'wppb'); ?></span></li>
							<li><span class="lock form"><i class="text-icon dashicons dashicons-feedback"></i><?php _e("Contact Form 7", 'wppb'); ?></span></li>
							<li><span class="lock form"><i class="text-icon dashicons dashicons-email"></i><?php _e("Mail Chimp", 'wppb'); ?></span></li>
							<li><span class="lock"><i class="text-icon dashicons dashicons-format-video"></i><?php _e("Video", 'wppb'); ?></span></li>

						</ul>
					</div>
				</section>
				<!-- global setting -->
				<div data-toggle="global-setting" class="rl_i_editor-element-Toggle outer-toggle">
					<span><?php _e("Global Setting", 'wppb'); ?></span>
					<span class="bottomCarret dashicons dashicons-arrow-right"></span>
				</div>
				<section data-toggle-action="global-setting" class="rl_i_editor-global-setting rl_i_editor-element-item rl-display-none">
					<?php $wp_builder_obj->header_title(__('Popup Background Setting', 'wppb'));
					
					$wp_builder_obj->checkbox('global-overlay-image', __('Background Image', 'wppb'), 'data-global-input="global-overlay-image"');
					?>
					<section class="global-overlay-image">
						<div class="rl_i_editor-item-content-items image_">
							<div class="rl-i-choose-image">
								<div data-global-input='overlay-image' class="rl-i-choose-image-wrap" style="background-image: url(<?php echo esc_url(WPPB_URL . 'img/blank-img.png', 'wppb'); ?>);">
									<div class="rl-i-choose-image-inside-wrap"><span class="iconPlus dashicons dashicons-plus"></span></div>
								</div>
							</div>
							<div class="background-image-setting">
								<span class="rl-sub-title"><?php _e("Background Position", 'wppb') ?></span>
								<div class="background-image-setting-position">
									<div>
										<input id="image-setting-left-top1" type="radio" name="background-position" data-global-input='background-position' value="left top">
										<label for="image-setting-left-top1"><span class="dashicons dashicons-arrow-up-alt rotat-45"></span></label>
									</div>
									<div>
										<input id="image-setting-center-top1" type="radio" name="background-position" data-global-input='background-position' value="center top">
										<label for="image-setting-center-top1"><span class="dashicons dashicons-arrow-up-alt"></span></label>
									</div>
									<div>
										<input id="image-setting-right-top1" type="radio" name="background-position" data-global-input='background-position' value="right top">
										<label for="image-setting-right-top1"><span class="dashicons dashicons-arrow-up-alt rotat45"></span></label>
									</div>
									<div>
										<input id="image-setting-left-center1" type="radio" name="background-position" data-global-input='background-position' value="left center">
										<label for="image-setting-left-center1"><span class="dashicons dashicons-arrow-left-alt"></span></label>
									</div>
									<div>
										<input id="image-setting-center-center1" type="radio" name="background-position" data-global-input='background-position' value="center center">
										<label for="image-setting-center-center1"><span class="dashicons dashicons-move"></span></label>
									</div>
									<div>
										<input id="image-setting-center-right1" type="radio" name="background-position" data-global-input='background-position' value="center right">
										<label for="image-setting-center-right1"><span class="dashicons dashicons-arrow-right-alt"></span></label>
									</div>
									<div>
										<input id="image-setting-bottom-left1" type="radio" name="background-position" data-global-input='background-position' value="bottom left">
										<label for="image-setting-bottom-left1"><span class="dashicons dashicons-arrow-down-alt rotat45"></span></label>
									</div>
									<div>
										<input id="image-setting-bottom-center1" type="radio" name="background-position" data-global-input='background-position' value="bottom center">
										<label for="image-setting-bottom-center1"><span class="dashicons dashicons-arrow-down-alt"></span></label>
									</div>
									<div>
										<input id="image-setting-bottom-right1" type="radio" name="background-position" data-global-input='background-position' value="bottom right">
										<label for="image-setting-bottom-right1"><span class="dashicons dashicons-arrow-down-alt rotat-45"></span></label>
									</div>
								</div>
								<div class="rl_i_editor-item-content-items inline__">
									<label class="rl-sub-title"><?php _e('Background Size', 'wppb') ?></label>
									<div>
										<?php $wp_builder_obj->select("data-global-input='background-size'", [[__('Auto', 'wppb'), 'auto'], [__('Contain', 'wppb'), 'contain'], [__('Cover', 'wppb'), 'cover']]); ?>
									</div>
								</div>
							</div>
						</div>
					</section>
					<?php
					// overlay color / outside color / popup width 
					$wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-global-input', 'overlay-color');
					$wp_builder_obj->color(__('Outside Color', 'wppb'), 'background-color', 'data-global-input', 'outside-color');
					$wp_builder_obj->header_title(__('Popup Dimension', 'wppb'));
					$wp_builder_obj->range_slider(__('Width(px)', 'wppb'), 'main-wrapper', ['title' => 'px', 'min' => 200, 'max' => 800, 'value' => 200], 'wrapper-width');
					$wp_builder_obj->checkbox('wrapper-height', __('Height(custom)', 'wppb'), 'data-global-input="wrapper-height-check"');
					?>
					<section class="global-wrapper-height-custom-auto">
						<?php $wp_builder_obj->range_slider(__('Height(px)', 'wppb'), 'main-wrapper-height', ['title' => 'px', 'min' => 150, 'max' => 1000, 'value' => 200], 'wrapper-height'); ?>
					</section>
					<div class="rl_i_editor-item-content-items rl-two-column-width">
						<label class="rl-sub-title"><?php _e('Column Width', 'wppb'); ?></label>
						<div>
							<label class="rl-sub-title"><?php _e('Column One %', 'wppb'); ?></label>
							<label class="rl-sub-title"><?php _e('Column Two %', 'wppb'); ?></label>
						</div>
						<div>
							<input type="number" data-global-input="column-width" data-column="1">
							<input type="number" data-global-input="column-width" data-column="2">
						</div>
					</div>
					<?php
					$wp_builder_obj->margin_padding('main-wrapper', __('Padding(px)', 'wppb'), 'data-global-input', 'p');
					$wp_builder_obj->box_shadow('box-shadow-global', 'data-global-input');
					$wp_builder_obj->border('global-border', 'data-global-input');
					?>
				</section>
				<!-- Close button setting -->
				<div data-toggle="close-btn-setting" class="rl_i_editor-element-Toggle outer-toggle">
					<span><?php _e('Close Button Setting', 'wppb'); ?></span>
					<span class="bottomCarret dashicons dashicons-arrow-right"></span>
				</div>
				<section data-toggle-action="close-btn-setting" class="rl-display-none">
					<?php $wp_builder_obj->header_title(__('Close Popup By Click', 'wppb')); ?>
					<div class="rl_i_editor-item-content-items inline__">
						<?php $wp_builder_obj->select(' data-cmn="close-btn" data-global-input="close-option"', [[__('Click On Icon', 'wppb'), 1], [__('Click On Icon and Outside', 'wppb'), 2], [__('Click On Outside', 'wppb'), 3, true]]); ?>
					</div>

					<div class="close-btn-container">
						<div class="rl_i_editor-item-content-header">
							<nav class="rl-clear">
								<span data-editor-tab="close-btn-style" class="active_"><?php _e('Style', 'wppb'); ?></span>
								<span data-editor-tab="close-btn-alignment"><?php _e('Alignment', 'wppb'); ?></span>
							</nav>
						</div>

						<div class="rl_i_editor-item-content-i rl_i_editor-item-content-close-btn-alignment ">
							<div class="rl_i_editor-item-content-items title_ inline_">
								<div class="rl_i_range-font-size">
									<label class="rl-sub-title"><?php _e('Button Margin', 'wppb'); ?></label>
								</div>
							</div>
							<?php
							$wp_builder_obj->range_slider(__('Top', 'wppb'), 'close-btn', ['title' => '%', 'min' => "-20", 'max' => 100, 'value' => 18, "attr" => ' data-cmn="close-btn" data-margin="top"'], "close-btn-margin-top");
							$wp_builder_obj->range_slider(__('Right', 'wppb'), 'close-btn', ['title' => '%', 'min' => "-20", 'max' => 100, 'value' => 18, "attr" => ' data-cmn="close-btn" data-margin="right"'], "close-btn-margin-right");
							$wp_builder_obj->margin_padding('close-btn', __('Icon Padding in px', 'wppb'), 'data-global-input', 'p', ' data-cmn="close-btn"');
							?>
						</div>

						<section class="rl_i_editor-item-content-i rl_i_editor-item-content-close-btn-style active_">
							<?php
							$wp_builder_obj->header_title(__('Icon Style', 'wppb'));
							$wp_builder_obj->color(__('Color', 'wppb'), 'color', 'data-global-input', 'close-btn-color', " data-cmn='close-btn'");
							$wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-global-input', 'close-btn-bg-color', " data-cmn='close-btn'");
							$wp_builder_obj->range_slider(__("Font Size(px)", 'wppb'), 'close-font-size', ['title' => 'px', 'min' => 10, 'max' => 100, 'value' => 18, "attr" => ' data-cmn="close-btn"']);
							$wp_builder_obj->border('close-btn', 'data-global-input', " data-cmn='close-btn'");
							?>

						</section>
					</div>
					<!-- Close button setting -->
				</section>
				<!-- global setting -->
				<section class="rl_i_editor-item-content">
					<div class="rl_i_editor-item-content-tab">
						<div class="rl_i_editor-item-content-header">
							<nav class="rl-clear">
								<span data-editor-tab="content" class="active_"><?php _e('Content', 'wppb'); ?></span>
								<span data-editor-tab="style"><?php _e('Style', 'wppb'); ?></span>
							</nav>
						</div>
						<!-- content -->
						<div class="rl_i_editor-item-content-i rl_i_editor-item-content-content active_">
							<div>
								<div class="rl_i_editor-item-content-items spacer_">
									<?php
									$wp_builder_obj->range_slider(__("Height(px)", 'wppb'), 'height', ['title' => 'px', 'min' => 5, 'value' => 30, 'max' => 300, "container-class" => 'item-spacer'], false, 'data-editor-input');
									?>
								</div>
								<!-- image -->
								<div class="rl_i_editor-item-content-items item-image image_">
									<label class="rl-sub-title"><?php _e('Choose Image', 'wppb'); ?></label>
									<div class="rl-i-choose-image">
										<div data-editor-input='img' class="rl-i-choose-image-wrap" style="background-image: url(<?php echo esc_url(WPPB_URL . 'img/blank-img.png', 'wppb'); ?>);">
											<div class="rl-i-choose-image-inside-wrap"><span class="iconPlus dashicons dashicons-plus"></span></div>
										</div>
									</div>
								</div>
								<!-- title -->
								<div class="rl_i_editor-item-content-items item-text item-title_ block__">
									<label class="rl_i_editor-title rl-sub-title"><?php _e('Title', 'wppb'); ?></label>
									<textarea data-editor-input='title'></textarea>
								</div>
								<?php
								// text color/ background-color / font-size / letter-spacing / line height
								$wp_builder_obj->color(__('Text Color', 'wppb'), 'color', 'data-editor-input');
								$wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-editor-input');
								$wp_builder_obj->range_slider(__("Font Size(px)", 'wppb'), 'font-size', ['title' => 'px', 'min' => 10, 'value' => 30, 'max' => 100, "container-class" => 'item-text'], false, 'data-editor-input');
								$wp_builder_obj->range_slider(__("Letter Spacing(px)", 'wppb'), 'letter-spacing', ['title' => 'px', 'min' => '-5', 'value' => 1, 'max' => 50, "container-class" => 'item-text'], false, 'data-editor-input');
								$wp_builder_obj->range_slider(__('Line Height(px)', 'wppb'), 'line-height', ['title' => 'px', 'min' => '-5', 'value' => 1, 'max' => 100, "container-class" => 'item-text'], false, 'data-editor-input'); ?>
								<div class="rl_i_editor-item-content-items item-text item-link_ block__">
									<label class="rl_i_editor-title rl-sub-title"><?php _e('Link', 'wppb'); ?></label>
									<div class="rl_i_editor-anchor">
										<div class="rl_i_editor-anchor-input">
											<input type="text" data-editor-input='link'>
											<label data-toggle="_linktargetSetting" class="dashicons dashicons-admin-links"></label>
										</div>
										<div data-toggle-action="_linktargetSetting" class="rl_i_editor-anchor-setting">
											<?php
											$wp_builder_obj->checkbox('_linktarget', __('Another Tab', 'wppb'), 'data-editor-input="_linktarget"');
											?>
										</div>
									</div>
								</div>
								<!-- text alignment -->
								<?php $wp_builder_obj->alignment(__('Alignment', 'wppb'), 'text-alignment-choice', 'data-editor-input'); ?>
							</div>
						</div>
						<!-- style -->
						<div class="rl_i_editor-item-content-i rl_i_editor-item-content-style">
							<!-- width -->
							<?php
							$wp_builder_obj->range_slider(__('Width(%)', 'wppb'), 'item-width', ['title' => '%', 'min' => 1, 'value' => 20, 'max' => 100], false, 'data-editor-input');
							$wp_builder_obj->alignment(__('Container Alignment', 'wppb'), 'content-alignment', 'data-editor-input');

							?>
							<!-- font weight -->
							<div class="rl_i_editor-item-content-items item-text inline__">
								<label class="rl-sub-title"><?php _e('Font Weight', 'wppb'); ?></label>
								<div>
									<?php $wp_builder_obj->select('data-editor-input="font-weight"', [[200, 200], [300, 300], [400, 400], [500, 500], [600, 600], [700, 700], [800, 800], [900, 900]]); ?>

								</div>
							</div>
							<?php
							$wp_builder_obj->margin_padding('margin', __('Margin in px', 'wppb'), 'data-editor-input', 'm');
							$wp_builder_obj->margin_padding('padding', __('Padding in px', 'wppb'), 'data-editor-input', 'p');
							$wp_builder_obj->border('border', 'data-editor-input');
							?>
							<!-- border -->
						</div>
						<!-- style -->
					</div>
				</section>
				<!-- delete Setting -->
				<?php if (isset($wppb_popup_id)) { ?>
					<div data-toggle="popup-delete-opt" class="rl_i_editor-element-Toggle outer-toggle">
						<span><?php _e('Delete Popup', 'wppb'); ?></span>
						<span class="bottomCarret dashicons dashicons-arrow-right"></span>
					</div>
					<section data-toggle-action="popup-delete-opt" class="rl-popup-delete-opt rl-display-none">
						<div>
							<div class="popup-delete-wrap">

							
						<?php echo wp_kses($popupSetData['deletebtn'],array( 'button' => array('class'=> true,'data-bid'=> true))); ?>
									
								</div>
							<?php $wp_builder_obj->checkbox('popup_setting_active', __('Activate', 'wppb'), 'class="wppb_popup_setting_active" data-bid="' . esc_attr($wppb_popup_id) . '"' . esc_attr($popup_is_active)); ?>
						</div>
					</section>
				<?php } ?>
				<!-- delete Setting -->
				<!-- add lead form -->
				<section class="rl-display-none rl-lead-form-panel">
					<div class="rl_i_editor-element-Toggle">
						<span><?php _e('Lead Form', 'wppb'); ?></span>
					</div>

					<div class="rl_i_editor-item-content-items title_ inline__">
						<label class="rl-sub-title"><?php _e('Choose Lead Form', 'wppb'); ?></label>
					</div>
					<?php if ($LfbPluginPath) echo wp_kses_post($LfbPluginPath); ?>

					<div class="rl_i_editor-item-content-items lead-form-bulider-select <?php if ($LfbPluginPath) echo 'rl-display-none'; ?>">
						<select>
							<option><?php _e('Select Form', 'wppb'); ?></option>
							<?php echo wp_kses(wppb_db::lead_form_opt(),array( 'option' => array('value'=> true))); ?>
						</select>
					</div>
					<div class="wppb-lead-form-styling">
						<div class="rl_i_editor-item-content-header">
							<nav class="rl-clear">
								<span data-editor-tab="form-style" class="active_"><?php _e('Form', 'wppb'); ?></span>
								<span data-editor-tab="form-content"><?php _e('Form Content', 'wppb'); ?></span>
							</nav>
						</div>
						<!-- form-style -->
						<div class="rl_i_editor-item-content-i rl_i_editor-item-content-form-style active_  wppb-lf-form-style">
							<?php
							$wp_builder_obj->header_title(__('Form Setting', 'wppb'));
							$wp_builder_obj->range_slider(__('Form Width(%)', 'wppb'), 'lf-form-width', ['title' => '%', 'min' => "20", 'max' => 100, 'value' => 100], false, 'data-lead-form');
							$wp_builder_obj->alignment(__('Form Centered', 'wppb'), 'form-margin-center', 'data-lead-form');
							$wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-lead-form', 'lf-form-color');
							$wp_builder_obj->border('form-border', 'data-lead-form');
							?>
						</div>
							<!-- heading style -->
						<div class="rl_i_editor-item-content-i rl_i_editor-item-content-form-content wppb-lf-content-style">
							<?php
							//heading section
							$wp_builder_obj->header_title(__('Heading Setting', 'wppb'));
							$wp_builder_obj->checkbox("form-heading-enable", __("Heading Enable", 'wppb'), 'data-lead-form="form-heading-enable"'); ?>
							<div class='lead-form-heading-section'>
							<?php
							$wp_builder_obj->color(__('Color', 'wppb'), 'color', 'data-lead-form', 'lf-heading-color');
							$wp_builder_obj->range_slider(__('Font Size(px)', 'wppb'), 'lf-heading-font-size', ['title' => 'px', 'min' => "10", 'max' => 100, 'value' => 10], false, 'data-lead-form');
							?>
							</div>


							<?php
							//label text section
							$wp_builder_obj->header_title(__('Label Setting', 'wppb'));
							$wp_builder_obj->checkbox("form-label-enable", __("Label Enable", 'wppb'), 'data-lead-form="form-label-enable"');
							?>
							<div class='lead-form-label-section'> 
							<?php
							$wp_builder_obj->color(__('Color', 'wppb'), 'color', 'data-lead-form', 'lf-label-color');
							$wp_builder_obj->range_slider(__('Font Size(px)', 'wppb'), 'lf-label-font-size', ['title' => 'px', 'min' => "10", 'max' => 100, 'value' => 10], false, 'data-lead-form');
							?>
							</div>

							<!--  radio checkbox input text section -->
							<div class='lead-form-radio-text-section'>
							<?php
							$wp_builder_obj->header_title(__('Radio Checkbox Field Setting', 'wppb'));
							$wp_builder_obj->color(__('Color', 'wppb'), 'lf-radio-checkbox-text-color', 'data-lead-form', 'lf-radio-checkbox-text-color');
							$wp_builder_obj->range_slider(__('Font Size(px)', 'wppb'), 'lf-radio-checkbox-text-font-size', ['title' => 'px', 'min' => 10, 'max' => 100, 'value' => 10], false, 'data-lead-form');
							$wp_builder_obj->margin_padding('lf-radio-checkbox-text-margin', __('Input Margin(px)', 'wppb'), 'data-lead-form', 'm');
							?>
							</div>

							<?php
							//field text section
							$wp_builder_obj->header_title(__('Field Setting', 'wppb'));
							$wp_builder_obj->color(__('Color', 'wppb'), 'color', 'data-lead-form', 'lf-field-color');
							$wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-lead-form', 'lf-field-background-color');
							$wp_builder_obj->range_slider(__('Font Size(px)', 'wppb'), 'lf-field-font-size', ['title' => 'px', 'min' => "10", 'max' => 100, 'value' => 10], false, 'data-lead-form');
							$wp_builder_obj->range_slider(__('Height(px)', 'wppb'), 'lf-field-height', ['title' => 'px', 'min' => 12, 'max' => 120, 'value' => 25], false, 'data-lead-form');
							$wp_builder_obj->margin_padding('lf-field-margin', __('Field Margin(px)', 'wppb'), 'data-lead-form', 'm');
							$wp_builder_obj->border('lf-field-border', 'data-lead-form');
							//submit button section
							$wp_builder_obj->header_title(__('Submit Button Setting', 'wppb'));
							$wp_builder_obj->color(__('Color', 'wppb'), 'color', 'data-lead-form', 'lf-submit-btn-color');
							$wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-lead-form', 'lf-submit-btn-bcolor');
							$wp_builder_obj->range_slider(__('Font Size(px)', 'wppb'), 'lf-submit-btn-font-size', ['title' => 'px', 'min' => "10", 'max' => 100, 'value' => 10], false, 'data-lead-form');
							$wp_builder_obj->alignment(__('Button Alignment', 'wppb'), 'lf-submit-aliment', 'data-lead-form');
							?>
							<div class="rl_i_editor-item-content-items item-text inline__">
								<label class="rl-sub-title"><?php _e('Font Weight', 'wppb'); ?></label>
								<div>
							<?php $wp_builder_obj->select('data-lead-form="submit-font-weight"', [[200, 200], [300, 300], [400, 400], [500, 500], [600, 600], [700, 700], [800, 800], [900, 900]]); ?>
								</div>
							</div>
							<?php
							$wp_builder_obj->margin_padding('lf-submit-padding', __('Padding(px)', 'wppb'), 'data-lead-form', 'p');
							$wp_builder_obj->border('lf-submit-border', 'data-lead-form');
							?>
						</div>
					</div>
				</section>
				<!-- add lead form -->
				<!-- shortcode init  -->
				<section class="rl-display-none rl-shortcode-panel wppb-sections-extra">
					<div class="rl_i_editor-element-Toggle">
						<span><?php _e('Shortcode Configuration', 'wppb'); ?></span>
					</div>
					<div class="rl_i_editor-item-content-items title_ inline__">
						<label class="rl-sub-title"><?php _e('Paste Your Shortcode', 'wppb'); ?></label>
					</div>
					<div class="rl-mail-chip-api">
						<textarea name="shortcode-panel-api" data-shortcode='shortcode-code-get-code'></textarea>
					</div>
					<!-- style and content style  -->
					<div class="wppb-shortcode-styling">
						<!-- shortcode-style -->
						<div class="rl_i_editor-item-content-i rl_i_editor-item-content-shortcode-style active_">
							<?php
							$wp_builder_obj->header_title(__('Container Setting', 'wppb'));
							$wp_builder_obj->range_slider(__('Width(%)', 'wppb'), 'shortcode-container-width', ['title' => '%', 'min' => "20", 'max' => 100, 'value' => 100], false, 'data-shortcode');
							$wp_builder_obj->range_slider(__('Height(%)', 'wppb'), 'shortcode-container-height', ['title' => '%', 'min' => "20", 'max' => 1000, 'value' => 100], false, 'data-shortcode');
							// $wp_builder_obj->color(__('Background Color', 'wppb'), 'background-color', 'data-shortcode', 'form-bg-color');
							// $wp_builder_obj->border('shortcode-form-border', 'data-shortcode');
							?>
						</div>
					</div>
					<!-- style and content style  -->
				</section>
				<!-- shortcode init  -->
			</div>
		</div>
		<div class="rl_i_editor-footer">
			<div class="rl_i_editor-footer-area">
			<?php echo wp_kses($popupSetData['savebtn'],array( 'button' => array('class'=> array(),'data-bid'=> array()))); ?>
			</div>
		</div>
	</div>
</div>