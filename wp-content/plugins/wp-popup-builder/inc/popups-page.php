<?php
if (!defined('ABSPATH')) exit;

$custom_popup_all = wppb_db::getCustomPopup();

?>
<div class="resetConfirmPopup">
	<div class="reserConfirm_inner">
		<div class="resetWrapper">
			<div class="resetHeader">
				<span><?php _e('Popup Will Delete Permanentally.', 'wppb'); ?></span>
			</div>
			<div class="resetFooter">
				<a class="wppbPopup popup deny" href="#"><span class="dashicons dashicons-dismiss"></span><?php _e('No', 'wppb') ?></a>
				<a class="wppbPopup popup confirm" href="#"><span class="dashicons dashicons-yes-alt"></span><?php _e('Yes', 'wppb') ?></a>
			</div>
		</div>
	</div>
</div>

<div id="wppb-popup-demos-container">

	<section id="wppb-custom-popup-section" class="wppb-custom-popup-section">

		<div class="wppb-popup-cmn-nav" id="wppb-custom-popup-nav">

			<div class="wppb-popup-cmn-nav-item">

				<a class="active" data-tab='view-list' data-tab-group='pro-to-free' href="#"> <?php _e('View Popup List', 'wppb'); ?></a>

				<a data-tab='view-free-to-pro' data-tab-group='pro-to-free' href="#"> <?php _e('Free To Pro', 'wppb'); ?></a>

				<a data-tab='help' data-tab-group='pro-to-free' href="#"><?php _e('Help', 'wppb'); ?></a>

			</div>
			
		</div>

		<section class="wppb-front-view-list active" data-tab-active='view-list' data-tab-group="pro-to-free">

			<div class="wppb-custom-popup-heading">

				<h1><?php _e('WP Builder Popup', 'wppb'); ?></h1>

				<a href="<?php echo esc_url(WPPB_PAGE_URL . '&custom-popup&_pnonce='.esc_attr(wp_create_nonce( 'nonce_pop' )), 'wppb'); ?>"> <span class="dashicons dashicons-edit"></span> <?php _e('Add New Popup', 'wppb'); ?></a>

			</div>

			<?php if ($custom_popup_all != '') { ?>

				<div class="wppb-custom-popup-head rl-clear">

					<div class="wppb-popup-list-title"><span><?php _e('Title','wppb');?></span></div>

					<div class="wppb-popup-list-enable"><span><?php _e('Status','wppb');?></span></div>

					<div class="wppb-popup-list-mobile"><span><?php _e('Device','wppb');?></span></div>

					<div class="wppb-popup-list-view"><span>
					<?php _e('View','wppb');?></span></div>

					<div class="wppb-popup-list-action"><span><?php _e('Action','wppb');?></span></div>

					<div class="wppb-popup-list-setting"><span><?php _e('Setting','wppb');?></span></div>

				</div>

				<div class="wppb-custom-popup-list">

				<?php if (!empty($custom_popup_all)) {

				foreach ($custom_popup_all as $popupValue) {

					$allSetting = unserialize($popupValue->setting);

					$business_id 	   		= isset($popupValue->BID) ? $popupValue->BID : "";

					if ($popupValue->boption != '') {

						$bOption = unserialize($popupValue->boption);
					}
					
					$device = isset($bOption['device']) ? $bOption['device'] : false;

					$wp_builder_obj->wppbPopupList($allSetting, $business_id, $device, $popupValue->is_active);
				     }

                  } ?>

			</div>

			<?php } else { ?>

				<p class="no-popup-found">

					<?php _e('No Popup Found. Click Add New Popup To Create Popup.','wppb');?> 

				</p>;

			<?php } ?>

		</section>

		<?php

		include_once 'wppb-pro-popup.php';

		include_once 'wppb-help.php';

		?>

	</section>

</div>