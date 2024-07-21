<?php
if (!defined('ABSPATH')) exit;

class wppb_shortcode
{
	private function __construct()
	{
		add_shortcode('wppb', array($this, 'popup'));
	}
	public static function get()
	{
		return new self();
	}
 	public function popup( $atts ,$content) {
			    $a = shortcode_atts( array('popup' => '','inline' => '','widget' => ''), $atts );
				$popup_id = false;
				$popupInline = uniqid('inline-');;
				if ($a['inline']) {
					$popup_id = $a['inline'];
					$open_popup_div = '<div class="wppb-popup-main-wrap inline_ inline-popup active">'; 
				}elseif ($a['popup']) {
				 	$popup_id = $a['popup'];	
					$PopupDataGet = wppb_db::Popup_show($popup_id,false,true);
 					$popupInitObj = new wp_popup_builder_init();
					$popupData = $popupInitObj->show_popup_part_start($PopupDataGet,true);
 					if ( $popupData ) return $popupData;
					$popup_id = false;
				}elseif ($a['widget']) {
					$popup_id = $a['widget'];	
					$open_popup_div = '<div class="wppb-popup-main-wrap inline_ widget-popup active">'; 
				}
				if ($popup_id) {
					$return_Html = wppb_db::Popup_show($popup_id);
					if ( isset($return_Html->setting) ) {
							$popupHtml = new wppb_db();
		 					$popupHtmlContent = $popupHtml->wppb_html( $return_Html->setting,$popupInline );
							return $popupHtmlContent && $return_Html ? $open_popup_div.$popupHtmlContent.'</div>':'';
					}
			}

	}
	// class end
}