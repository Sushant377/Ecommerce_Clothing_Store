<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/***Front Custom Style********/

function th_advance_product_search_style($thaps_frnt_custom_css=''){

// max width search bar

$max_width_bar = esc_html(th_advance_product_search()->get_option( 'set_form_width' ));

if($max_width_bar!==''){

$thaps_frnt_custom_css.=".thaps-search-box{max-width:{$max_width_bar}px;}";

}else{

$thaps_frnt_custom_css.=".thaps-search-box{max-width:100%}";

}


if(th_advance_product_search()->get_option( 'level_submit' )!==''){

$thaps_frnt_custom_css.="

	#thaps-search-button {
       width: auto;
    font-size: 16px;
    padding: 0px 1rem;

}";

}

// Bar color
$bar_bg_clr         = esc_html(th_advance_product_search()->get_option( 'bar_bg_clr' ));
$bar_brdr_clr       = esc_html(th_advance_product_search()->get_option( 'bar_brdr_clr' ));
$bar_text_clr       = esc_html(th_advance_product_search()->get_option( 'bar_text_clr' ));
$bar_button_bg_clr  = esc_html(th_advance_product_search()->get_option( 'bar_button_bg_clr' ));
$bar_button_txt_clr = esc_html(th_advance_product_search()->get_option( 'bar_button_txt_clr' ));
$bar_button_hvr_clr = esc_html(th_advance_product_search()->get_option( 'bar_button_hvr_clr' ));
$bar_button_txt_hvr_clr = esc_html(th_advance_product_search()->get_option( 'bar_button_txt_hvr_clr' ));
$icon_clr = esc_html(th_advance_product_search()->get_option( 'icon_clr' ));

$thaps_frnt_custom_css.=".thaps-from-wrap,input[type='text'].thaps-search-autocomplete,.thaps-box-open .thaps-icon-arrow{background-color:{$bar_bg_clr};} .thaps-from-wrap{background-color:{$bar_bg_clr};} input[type='text'].thaps-search-autocomplete, input[type='text'].thaps-search-autocomplete::-webkit-input-placeholder{color:{$bar_text_clr};} .thaps-from-wrap,.thaps-autocomplete-suggestions{border-color:{$bar_brdr_clr};}

 .thaps-box-open .thaps-icon-arrow{border-left-color:{$bar_brdr_clr};border-top-color:{$bar_brdr_clr};} 

 #thaps-search-button{background:{$bar_button_bg_clr}; color:{$bar_button_txt_clr};} 

 #thaps-search-button:hover{background:{$bar_button_hvr_clr}; color:{$bar_button_txt_hvr_clr};}

 .submit-active #thaps-search-button .th-icon path{color:{$icon_clr};}";

//suggestion box
$sus_bg_clr = esc_html(th_advance_product_search()->get_option( 'sus_bg_clr' ));
$sus_hglt_clr = esc_html(th_advance_product_search()->get_option( 'sus_hglt_clr' ));
$sus_slect_clr = esc_html(th_advance_product_search()->get_option( 'sus_slect_clr' ));
$sus_brdr_clr = esc_html(th_advance_product_search()->get_option( 'sus_brdr_clr' ));
$sus_grphd_clr = esc_html(th_advance_product_search()->get_option( 'sus_grphd_clr' ));
$sus_title_clr = esc_html(th_advance_product_search()->get_option( 'sus_title_clr' ));
$sus_text_clr = esc_html(th_advance_product_search()->get_option( 'sus_text_clr' ));

$thaps_frnt_custom_css.=" .thaps-suggestion-heading .thaps-title, .thaps-suggestion-heading .thaps-title strong{color:{$sus_grphd_clr};} .thaps-title,.thaps-suggestion-taxonomy-product-cat .thaps-title, .thaps-suggestion-more .thaps-title strong{color:{$sus_title_clr};} .thaps-sku, .thaps-desc, .thaps-price,.thaps-price del{color:{$sus_text_clr};} .thaps-suggestion-heading{border-color:{$sus_brdr_clr};} .thaps-autocomplete-selected,.thaps-suggestion-more:hover{background:{$sus_slect_clr};} .thaps-autocomplete-suggestions,.thaps-suggestion-more{background:{$sus_bg_clr};} .thaps-title strong{color:{$sus_hglt_clr};} ";

return $thaps_frnt_custom_css;

}