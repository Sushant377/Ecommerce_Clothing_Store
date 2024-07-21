<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
/***Front Custom Style********/

function thvs_front_custom_style($thvs_frnt_custom_css=''){
if(wc_string_to_bool( th_variation_swatches()->th_variation_swatches_get_option( 'tooltip' ) )):	
$thvs_frnt_custom_css.="[data-thvstooltip]:before {
  min-width: 100px;
  content: attr(data-thvstooltip);
}
[data-thvstooltip]:before {
    margin-bottom: 5px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    padding: 7px;
    border-radius: 3px;
    background-color: #111;
    background-color: #111;
    color: #fff;
    text-align: center;
    font-size: 14px;
    line-height: 1.2;
}
[data-thvstooltip]:after, [data-thvstooltip]:before {
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    box-sizing: inherit;
    position: absolute;
    bottom: 130%;
    left: 50%;
    z-index: 999;
}
[data-thvstooltip]:after {
    margin-left: -5px;
    width: 0;
    border-top: 5px solid #111;
    border-top: 5px solid #111;
    border-right: 5px solid transparent;
    border-left: 5px solid transparent;
    content:'';
    font-size: 0;
    line-height: 0;
}
[data-thvstooltip]:hover:after, [data-thvstooltip]:hover:before {
    bottom: 120%;
    visibility: visible;
    opacity: 1;
}
";
endif;
$attrwdht = esc_html(th_variation_swatches()->th_variation_swatches_get_option( 'width' ));
$attrhgt = esc_html(th_variation_swatches()->th_variation_swatches_get_option( 'height' ));
$attrsingle_font_size = esc_html(th_variation_swatches()->th_variation_swatches_get_option( 'single_font_size' ));
$thvs_frnt_custom_css.=".variable-item:not(.radio-variable-item){
	height:{$attrwdht}px;width:{$attrhgt}px;
} 
.thvs-attr-behavior-blur .variable-item.disabled .variable-item-contents span:after{
    height:{$attrwdht}px;
    line-height:{$attrwdht}px;
}
.woo-variation-items-wrapper .button-variable-item span,.th-variation-swatches.thvs-style-squared .variable-items-wrapper .variable-item.button-variable-item .variable-item-span {
    font-size:{$attrsingle_font_size}px;
}";

if(wc_string_to_bool( th_variation_swatches()->th_variation_swatches_get_option( 'show_title' ) )==''):
    $thvs_frnt_custom_css.=".thvs-loaded .variations td.label{
        display:none!important;
    }";
endif;


return $thvs_frnt_custom_css;
}