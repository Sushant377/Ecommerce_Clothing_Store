<?php
if (!defined('ABSPATH')) exit;
class wppb_load
{
	private function __construct()
	{
		if (isset($_GET['wppb_preview'])) {
			add_action('wp_footer', array($this, 'preview_footer'));
		} else {
			add_action('wp_footer', array($this, 'footer_load'));
		}
	}
	public static function get()
	{
		return new self();
	}
	public function preview_footer()
	{
		if (isset($_GET['wppb_preview']) && $_GET['wppb_preview'] && is_numeric($_GET['wppb_preview'])) {

			$popupId = intval($_GET['wppb_preview']);

			$return_Html = wppb_db::Popup_show($popupId, true);

			if (isset($return_Html->setting)) {
				$popupInitObj = new wp_popup_builder_init();
				$popupHtml = new wppb_db();

				$popupHtmlContent = $popupHtml->wppb_html($return_Html->setting);

				$html_content = $popupHtmlContent && $return_Html ? '<div data-option="1" class="wppb-popup-open popup active">' . $popupHtmlContent . '</div>' : '';

				echo wp_kses($html_content,$popupInitObj->editor_wp_kes());
			}
		}
	}
	public  function footer_load()
	{
		$return_Html = wppb_db::popup_pages();
		if (!empty($return_Html)) {

			$popupInitObj = new wp_popup_builder_init();

			foreach ($return_Html as $value) {

				if (isset($value->boption) && isset($value->setting) && @unserialize($value->boption)) {

					$popupData = $popupInitObj->show_popup_part_start($value);

					if ($popupData) {

						echo wp_kses($popupData,$popupInitObj->editor_wp_kes());
					}

						
					
				}
			}
		}
	}
	// class end
}