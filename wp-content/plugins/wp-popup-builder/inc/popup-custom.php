<?php
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<input type="hidden" name="popup-url" value="<?php echo esc_attr(WPPB_URL); ?>">

<input type="hidden" data-global-save="global-content" value='<?php echo esc_attr($popupSetData["global_content"]); ?>'>

<div class="wppb-popup-custom <?php echo esc_attr(!$get_CustomPopup ?'rl-display-none':''); ?>" style="background-color:<?php echo esc_attr($popupSetData['outside-color']); ?>;">
	<div>
	    <?php 


		echo wp_kses($wp_builder_obj->popup_layout($popupSetData),$wp_builder_obj->editor_wp_kes());
		?>	
	</div>	
	
</div> 
