<?php
if (!defined('ABSPATH')) exit;

$get_CustomPopup = isset($_GET['custom-popup']) && intval($_GET['custom-popup']) > 0 ? intval($_GET['custom-popup']) : false;

$popupSetData = array(
	'wrapper-style' => 'width:550px;',
	'wrapper-height' => 'auto',
	'overlay-image-url' => '',
	'overlay-style' => "",
	'overlay-color' => '#28292C91',
	'outside-color' => '#00000021',
	'content' => '',
	'savebtn' => '<button class="wppb_popup_saveAddon">save</button>',
	'deletebtn' => '',
	'global_content' => '',
	'global-padding' => '23px 37px',
	'layout' => '',
	'close-btn' => ''
);


if ($get_CustomPopup) {
	$custom_popup_all = wppb_db::getCustomPopup($get_CustomPopup);
	if (isset($custom_popup_all[0])) {
		$customAddon = $custom_popup_all[0];
		if (isset($customAddon->boption) && $customAddon->boption != '') $addon_option = unserialize($customAddon->boption);
		$popup_is_active = $customAddon->is_active ? " checked='checked'" : "";
		$allSetting = unserialize($customAddon->setting);
		$wppb_popup_id = $customAddon->BID;
		$popupSetData['savebtn'] = '<button data-bid="' . esc_attr($wppb_popup_id) . '" class="wppb_popup_updateAddon">' . __('Update', 'wppb') . '</button>';
		$popupSetData['deletebtn'] = '<button data-bid="' . esc_attr($wppb_popup_id) . '" class="wppb_popup_deleteAddon">' . __('Delete', 'wppb') . '</button>';
		foreach ($allSetting as $setting_value) {
			if (isset($setting_value['content']) && is_array($setting_value['content'])) {
				if ($setting_value['type'] == 'global-setting') {

					$popupSetData['global_content'] = htmlspecialchars(json_encode($setting_value['content']), ENT_COMPAT);
					foreach ($setting_value['content'] as $contentkey_ => $contentvalue_) {
						$popupSetData[$contentkey_] = $contentvalue_;
					}
				} elseif ($setting_value['type'] == 'wrap') {
					$data_layout = $popupSetData['layout'] == 'layout-3' || $popupSetData['layout'] == 'layout-2' ? 'two-column' : '';
					$uniqIdAttr = isset($setting_value["id"]) ? ' data-uniqid="' . esc_attr($setting_value["id"]) . '"' : '';
					$popupSetData["content"] .= '<div ' . $uniqIdAttr . ' data-rl-wrap="' . $popupSetData['layout'] . '" class="wppb-popup-rl-wrap rl-clear ' . $data_layout . '">' . $wp_builder_obj->initColumn($setting_value['content']) . '</div>';
				}
			} else if ($setting_value['type'] == "close-btn") {
				$uniqIdAttr = isset($setting_value["id"]) ? ' data-uniqid="' . esc_attr($setting_value["id"]) . '"' : '';
				$styleClose = isset($setting_value['style']) ? "style='" . esc_attr($setting_value['style']) . "'" : '';
				$popupSetData["close-btn"] = '<span ' . $uniqIdAttr . ' class="wppb-popup-close-btn dashicons dashicons-no-alt" ' . $styleClose . '></span>';
			}
		}
	}
}


$tabActiveOption  = isset($_GET['wppb-setting']) && isset($wppb_popup_id) ? 'active' : '';

$tabActiveEditor = !$tabActiveOption ? 'active' : '';

// preview anchor 

$position_name = isset($_GET['pos-name']) ? sanitize_text_field($_GET['pos-name']) : '';

$homePage_Priview = get_home_url() . "?wppb_preview=" . esc_attr($get_CustomPopup) . "&pos-name=" . esc_attr($position_name);


$nonce = $_REQUEST['_pnonce'];

if ( ! wp_verify_nonce( $nonce, 'nonce_pop' ) ) {

	// This nonce is not valid.

	die( __( 'Security check', 'wppb' ) ); 

} else {

?>

<div class="wppb-popup-cmn-container">

	<div class="resetConfirmPopup">
		<div class="reserConfirm_inner">
			<div class="resetWrapper">
				<div class="resetHeader">
					<span><?php _e('Popup Will Delete Permanentally.', 'wppb'); ?></span>
				</div>
				<div class="resetFooter">
					<a class="wppbPopup popup deny" href="#"><span class="dashicons dashicons-dismiss"></span><?php _e('No', 'wppb'); ?></a>
					<a class="wppbPopup popup confirm" href="#"><span class="dashicons dashicons-yes-alt"></span><?php _e('Yes', 'wppb'); ?></a>
				</div>
			</div>
		</div>
	</div>

	<div class="wppb-popup-cmn-nav wppb-popup-cmn-nav-popup-page-setting">

		<div class="wppb-popup-cmn-nav-item">

			<a class="wppb_icon_button" href="<?php echo esc_url(WPPB_PAGE_URL); ?>">
				<span class="dashicons dashicons-arrow-left-alt"></span><span><?php _e('Back', 'wppb'); ?></span>
			</a>

			<a class="wppb_icon_button wppb-popup-tab <?php echo esc_attr($tabActiveEditor); ?>" data-tab='setting' data-tab-group="main-nav" href="#">
				<span class="dashicons dashicons-edit"></span>
				<span><?php _e('Edit Popup', 'wppb'); ?></span>
			</a>

			<?php if (isset($wppb_popup_id)) { ?>

			<a class="wppb_icon_button wppb-popup-tab <?php echo esc_attr($tabActiveOption); ?>" data-tab='option' data-tab-group="main-nav" href="#">
					<span><?php _e('Setting', 'wppb'); ?></span>
			</a>

			<?php } ?>

		</div>
		<?php
		if (isset($wppb_popup_id)) {?>

			<a class="popup-preview" href="<?php echo esc_url($homePage_Priview); ?>" target="_blank">
			<span class="dashicons dashicons-visibility"></span>
			<span><?php _e("Preview", "wppb");?></span>
		    </a>

		<?php }
		?>
	</div>

	<section class="wppb-popup-demo wppb-popup-tab-container <?php echo esc_attr($tabActiveEditor); ?>" data-tab-active='setting' data-tab-group="main-nav">

		<div class="wppb-popup-demo-inner">

			<!-- confirm first placed here delete  -->

			<?php

			if (!$get_CustomPopup) 

			 include_once 'prebuilt-popup.php';

			include_once 'popup-custom.php';

			?>

			<div class="rl_i_editor-main-container <?php echo esc_attr(!$get_CustomPopup ? 'rl-display-none' : ''); ?>">

				<?php include_once "editor-panel.php"; ?>
			</div>

		</div>

	</section>

	<div class="wppb-popup-option wppb-popup-tab-container <?php echo esc_attr($tabActiveOption); ?>" data-tab-active='option' data-tab-group="main-nav">

		<?php if (isset($wppb_popup_id)){

		include_once 'popup-shortcode-tab.php'; 

        }
		?>

	</div>

</div>
<?php } ?>