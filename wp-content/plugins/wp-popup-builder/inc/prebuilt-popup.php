<?php
if (!defined('ABSPATH')) exit;
// prebuilt popup json 
$getOuterUrl_ 	= WPPB_URL . 'inc/wppb-builder.json';
$urlResponse 	= wp_remote_get($getOuterUrl_, ['timeout' => 120]);
$responseBody_ 	= wp_remote_retrieve_body($urlResponse);
$responseResult_ = json_decode($responseBody_, true);

$jsonPopupDemo = $jsonPopupHtml = '';
if (is_array($responseResult_) && !is_wp_error($responseResult_)) {
	$countColumn = 0;
	foreach ($responseResult_ as $prebuilt_value) {
		$prebuilt_value =  $wp_builder_obj->wppb_changeFilePath($prebuilt_value, WPPB_URL . "img/");
		$countColumn++;
		$prebuiltData = $wp_builder_obj->wppbPopupList_json($prebuilt_value, $countColumn, count($responseResult_));
		$jsonPopupDemo .= $prebuiltData['prebuilt-label'];
		$jsonPopupHtml .= $prebuiltData['prebuilt-html'];
	}
}

define('WPPB_ADIMG_URL', WPPB_URL . 'img/paid/');
?>
<section class="wppb-popup-name-layout">

	<div class="wp-popup-name-layout-name-init-2">
		<div class="rl_i_editor-item-content-header">
			<nav class="rl-clear">
				<span data-tab='prebuilt' data-tab-group="prebuilt-layout" class="active"><?php _e('Prebuilt Popup', 'wppb'); ?></span>
				<span data-tab='choose-layout' data-tab-group="prebuilt-layout"><?php _e('Choose Layout', 'wppb'); ?></span>
			</nav>
		</div>
		<button class="wppb-popup-name-init business_disabled"><?php _e('NEXT', 'wppb'); ?></button>
	</div>

	<!-- popup name  -->
	<div class="wppb-popup-name">
		<div>
			<span><?php _e('Enter Popup Name', 'wppb'); ?></span>
			<input type="text" name="wppb-popup-name">
		</div>
	</div>

	<!-- popup name  -->
	<div data-tab-active='choose-layout' data-tab-group="prebuilt-layout" class="prebulit-demo-popup rl_i_editor-item-content-i rl_i_editor-item-content-choose-layout">
		<!-- prebuilt popup section -->
		<section class="prebuilt-pupup-layout-container">
			<!-- layout 1 -->
			<div data-layout="layout-1">
				<span class="wppb-popup-close-btn dashicons dashicons-no-alt" style="color: #f01010d8;border: 2px solid #9c27b0e6;border-radius: 15px;padding: 1px;top: -2%;right: -2%;background-color: #ffffff;"></span>
				<div class="wppb-popup-custom-wrapper">
					<div class="wppb-popup-overlay-custom-img" data-overlay-image="" style=""></div>
					<div class="wppb-popup-custom-overlay" style="background-color:#6939bded;"></div>
					<div class="wppb-popup-custom-content" style="padding: 18px 37px;">
						<div data-rl-wrap="layout-1" class="wppb-popup-rl-wrap rl-clear">
							<div data-rl-column='1' class="wppb-popup-rl-column rlEditorDropable">
								<div class="data-rl-editable-wrap">
									<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span class="text-heading" data-rl-editable="heading" data-content-alignment="center" style="font-size: 26px; line-height: 30px;"><?php _e('Add Your Business Heading', 'wppb'); ?></span>
								</div>
								<div class="data-rl-editable-wrap">
									<div class="actions_">
										<span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span data-rl-editable="text" style="font-size: 16px;margin: -4px 0px 15px;color: #d6d6d6;"><?php _e('Add your business sub heading', 'wppb'); ?></span>
								</div>
								<div class="data-rl-editable-wrap wrap-image_" style="justify-content: center;">
									<div class="actions_">
										<span class="dashicons dashicons-no rlRemoveElement"></span>
									</div>
									<img src="<?php echo esc_url(WPPB_URL . "img/images.jpg", 'wppb'); ?>" data-content-alignment="center" data-rl-editable="image" style="width: 83%;">
								</div>
								<div class="data-rl-editable-wrap">
									<div class="actions_">
										<span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span data-rl-editable="text" style="font-size: 12px;color:#ACACAC;letter-spacing: 0;margin: 0;padding: 12px 0;"><?php _e('Small Business: Pop-Up Shop Ticket, Sat, Apr 25 2020', 'wppb'); ?></span>
								</div>

								<div class="data-rl-editable-wrap" style="justify-content: center;">
									<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span data-rl-editable="link" data-content-alignment="center" data-editor-link="#" style="width: fit-content; padding: 8px 16px; border: 1px solid rgba(211, 74, 74, 0.35); color: rgba(226, 178, 32, 1);font-size: 15px; border-radius:2px;"><?php _e('Book Ticket', 'wppb'); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- layout 2 -->
			<div data-layout="layout-2">
				<span class="wppb-popup-close-btn dashicons dashicons-no-alt" style="top: 0%; right: 0%;"></span>
				<div class="wppb-popup-custom-wrapper" style="width: 500px;">
					<div class="wppb-popup-overlay-custom-img" data-overlay-image="" style=""></div>
					<div class="wppb-popup-custom-overlay" style="background-color:#FEFEFF;"></div>
					<div class="wppb-popup-custom-content" style="padding: 40px 0;">
						<div data-rl-wrap="layout-2" class="wppb-popup-rl-wrap two-column rl-clear">
							<div data-rl-column='1' class="wppb-popup-rl-column rlEditorDropable">
								<div class="data-rl-editable-wrap wrap-image_">
									<div class="actions_">
										<span class="dashicons dashicons-no rlRemoveElement"></span>
									</div>
									<img src="<?php echo esc_url(WPPB_URL . 'img/images.jpg', 'wppb'); ?>" data-content-alignment="center" data-rl-editable="image" style="padding: 6px;">
								</div>
							</div>
							<div data-rl-column='1' class="wppb-popup-rl-column rlEditorDropable">
								<div class="data-rl-editable-wrap">
									<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span class="text-heading" data-rl-editable="heading" data-content-alignment="center" style="letter-spacing: 0; line-height: 40px; font-size: 35px; font-weight: 500; padding-right: 0px; padding-bottom: 1px; color: rgba(82, 82, 82, 1);"><?php _e('Do you want 25% off  your first order ?', 'wppb'); ?></span>
								</div>
								<div class="data-rl-editable-wrap" style="justify-content: center;">
									<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div><span data-rl-editable="link" data-editor-link="#" data-editor-link-target="0" style="width: 75%;padding: 8px 6px;border: 2px solid rgba(10, 198, 206, 1);letter-spacing: 0;font-weight: 500;font-size: 15px;line-height:15px;border-radius: 12px;color: rgba(10, 198, 206, 1);margin: 12px 0px 3px 0px;" data-content-alignment="center" class=""><?php _e('GET EXCLUSIVE CODE', 'wppb'); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- layout 3 -->
			<div data-layout="layout-3">
				<span class="wppb-popup-close-btn dashicons dashicons-no-alt" style="top: 0%; right: 0%;"></span>
				<div class="wppb-popup-custom-wrapper" style="width: 500px;">
					<div class="wppb-popup-overlay-custom-img" data-overlay-image="" style=""></div>
					<div class="wppb-popup-custom-overlay" style="background-color:#FEFEFF;"></div>
					<div class="wppb-popup-custom-content" style="padding: 40px 0;">
						<div data-rl-wrap="layout-3" class="wppb-popup-rl-wrap two-column rl-clear">
							<div data-rl-column='1' class="wppb-popup-rl-column rlEditorDropable">
								<div class="data-rl-editable-wrap">
									<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div>
									<span class="text-heading" data-rl-editable="heading" data-content-alignment="center" style="letter-spacing: 0; line-height: 40px; font-size: 35px; font-weight: 500; padding-right: 0px; padding-bottom: 1px; color: rgba(82, 82, 82, 1);"><?php _e('Do you want 25% off  your first order ?', 'wppb'); ?></span>
								</div>
								<div class="data-rl-editable-wrap" style="justify-content: center;">
									<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div><span data-rl-editable="link" data-editor-link="#" data-editor-link-target="0" style="width: 75%;padding: 8px 6px;border: 2px solid rgba(10, 198, 206, 1);letter-spacing: 0;font-weight: 500;font-size: 15px;line-height:15px;border-radius: 12px;color: rgba(10, 198, 206, 1);margin: 12px 0px 3px 0px;" data-content-alignment="center" class=""><?php _e('GET EXCLUSIVE CODE', 'wppb'); ?></span>
								</div>
							</div>
							<div data-rl-column='1' class="wppb-popup-rl-column rlEditorDropable">
								<div class="data-rl-editable-wrap wrap-image_">
									<div class="actions_">
										<span class="dashicons dashicons-no rlRemoveElement"></span>
									</div>
									<img src="<?php echo esc_url(WPPB_URL . "img/images.jpg", 'wppb'); ?>" data-content-alignment="center" data-rl-editable="image" style="padding: 6px;">
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- json data layout -->
			<?php echo wp_kses($jsonPopupHtml,$wp_builder_obj->editor_wp_kes()); ?>
			<!-- layout 3 -->
		</section>
		<!-- prebuilt popup section -->
		<div class="prebulilt-popup-inner">
			<ul>
				<li>
					<input id='wppb-popup-layout-label__layout-1' type="radio" name="wppb-popup-layout" value="layout-1">
					<label for="wppb-popup-layout-label__layout-1"><img src="<?php echo esc_url(WPPB_URL . "img/layout-1.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input id='wppb-popup-layout-label__layout-2' type="radio" name="wppb-popup-layout" value="layout-2">
					<label for="wppb-popup-layout-label__layout-2"><img src="<?php echo esc_url(WPPB_URL . "img/layout-2.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input id='wppb-popup-layout-label__layout-3' type="radio" name="wppb-popup-layout" value="layout-3">
					<label for="wppb-popup-layout-label__layout-3"><img src="<?php echo esc_url(WPPB_URL . "img/layout-3.png", "wppb"); ?>"></label>
				</li>

				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/layout-1-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/full-width-layout-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/popup-pro-top-bottom-bar-layout-front-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/popup-pro-bottom-top-bar-front-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/popup-pro-left-front-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/popup-pro-right-front-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/popup-pro-left-center-front-l.png", "wppb"); ?>"></label>
				</li>
				<li>
					<input type="radio" class="lock">
					<label><img src="<?php echo esc_url(WPPB_URL . "img/popup-pro-right-center-front-l.png", "wppb"); ?>"></label>
				</li>
			</ul>
		</div>
	</div>

	<!-- prebuilt json file  -->

	<section data-tab-active='prebuilt' data-tab-group="prebuilt-layout" class="wppb-prebuilt-popup-json rl_i_editor-item-content-i active">

		<div class="rl_i_editor-item-content-header prebuilt-free-paid">
			<nav class="rl-clear">
				<span data-tab='free' data-tab-group="free-paid" class="active"><?php _e('Free Popup', 'wppb'); ?></span>
				<span data-tab='paid' data-tab-group="free-paid"><?php _e('Premium Popup', 'wppb'); ?></span>
			</nav>
		</div>
		<div data-tab-active='free' data-tab-group="free-paid" class="prebuilt-free active">


		<?php echo wp_kses($jsonPopupDemo,$wp_builder_obj->editor_wp_kes()); ?>
		</div>
		<div data-tab-active='paid' data-tab-group="free-paid" class="prebuilt-paid">
			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "40percent-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "baby-offer-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "barber-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>


			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "bottom-bar-thumb.jpg", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "bottom-info-bar-layout.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "child-care-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>


			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "clickme-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "cup-cream-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "dressling-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>


			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "ebook-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "exit-popup-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "fashion-sale-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>


			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "fashion-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "full-width-img.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "halloween-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>


			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "herbal-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "ice-cream-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "joinus-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>


			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "left-bottom.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "left-center.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "pizza-right-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>

			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "right-bottom.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "right-center.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "scroll-page-thumb.jpg", "wppb"); ?>"></label>
				</div>
			</div>

			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "shoes-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "social-botom-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "social-left-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>

			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "social-right-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "subscribe-right.jpg", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "tasteofindia-thumb.png", "wppb"); ?>"></label>
				</div>
			</div>

			<div class="wppb-popup-row wppb-popup_clear">
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "top-bar-thumb.png", "wppb"); ?>"></label>
				</div>
				<div class="wppb-popup-column-three">
					<label class="wppb-popup-json-label lock"><img src="<?php echo esc_url(WPPB_ADIMG_URL . "top-info-bar-layout.png", "wppb"); ?>"></label>
				</div>
			</div>


		</div>
	</section>

	<!-- prebuilt json file  -->

	<div class="wp-popup-name-layout-name-init">
		<button class="wppb-popup-name-init business_disabled"><?php _e('NEXT', 'wppb'); ?>
		</button>
	</div>

</section>