
jQuery(document).ready(function(){
jQuery('#customize-control-big_store_above_header_layout,#customize-control-big_store_above_footer_layout').addClass("lite");	
jQuery('#_customize-input-big_store_above_header_col1_set option[value="none"],#_customize-input-big_store_above_header_col1_set option[value="menu"],#_customize-input-big_store_above_header_col1_set option[value="widget"],#_customize-input-big_store_above_header_col1_set option[value="social"],#_customize-input-big_store_above_header_col2_set option[value="none"],#_customize-input-big_store_above_header_col2_set option[value="text"],#_customize-input-big_store_above_header_col2_set option[value="menu"],#_customize-input-big_store_above_header_col2_set option[value="widget"]').attr("disabled",true);
jQuery('#customize-control-big_store_above_mobile_disable input,#customize-control-big_store_move_to_top input').attr("disabled",true);
jQuery('input[id=big_store_above_header_layout-abv-none],input[id=big_store_above_header_layout-abv-one],input[id=big_store_above_header_layout-abv-three],input[id=big_store_menu_alignmentcenter],input[id=big_store_menu_alignmentright],#customize-control-big_store_shadow_header input,#customize-control-big_store_sticky_header input,#customize-control-big_store_whislist_mobile_disable input,#customize-control-big_store_account_mobile_disable input,#customize-control-big_store_cart_mobile_disable input,input[id=big_store_above_footer_layout-ft-abv-none],input[id=big_store_above_footer_layout-ft-abv-one],input[id=big_store_above_footer_layout-ft-abv-two],input[id=big_store_above_footer_layout-ft-abv-three],#customize-control-big_store_main_header_option option[value="button"],#customize-control-big_store_main_header_option option[value="widget"],#customize-control-big_store_main_header_option option[value="callto"]').attr("disabled",true);

// FrontPage
// TopSlider
jQuery('input[id=big_store_top_slide_layout-slide-layout-1],#customize-control-big_store_disable_top_slider_sec input,#customize-control-big_store_top_slider_optn input').attr("disabled",true);
jQuery('#customize-control-big_store_include_category_slider li input').attr("disabled",true);
jQuery('#customize-control-big_store_include_category_slider li:nth-of-type(1) input,#customize-control-big_store_include_category_slider li:nth-of-type(2) input,#customize-control-big_store_include_category_slider li:nth-of-type(3) input').attr("disabled",false);
jQuery('#customize-control-big_store_top_slide_content .customizer-repeater-new-field,#customize-control-big_store_top_slide_content .social-repeater-general-control-remove-field,#customize-control-big_store_highlight_content .customizer-repeater-new-field,#customize-control-big_store_highlight_content .social-repeater-general-control-remove-field').remove();

//Tabbed Product Carousel
jQuery('#customize-control-big_store_disable_cat_sec input,#customize-control-big_store_disable_category_slide_sec input,#customize-control-big_store_disable_product_img_sec input,#customize-control-big_store_disable_ribbon_sec input,#customize-control-big_store_disable_product_slide_sec input,#customize-control-big_store_disable_banner_sec input,#customize-control-big_store_disable_product_list_sec input,#customize-control-big_store_disable_highlight_sec input').attr("disabled",true);
jQuery('#customize-control-big_store_category_tab_list li input').attr("disabled",true);
jQuery('#customize-control-big_store_category_tab_list li:nth-of-type(1) input,#customize-control-big_store_category_tab_list li:nth-of-type(2) input,#customize-control-big_store_category_tab_list li:nth-of-type(3) input').attr("disabled",false);
jQuery('#_customize-input-big_store_category_optn option[value="featured"],#_customize-input-big_store_category_optn option[value="random"]').attr("disabled",true);
jQuery('#customize-control-big_store_single_row_slide_cat input,#customize-control-big_store_cat_slider_optn input').attr("disabled",true);

//Woo Category
jQuery('#customize-control-big_store_cat_item_no input,#customize-control-big_store_category_slider_optn input').attr("disabled",true);

// ProducT Tab Image Carousel
jQuery('#customize-control-big_store_product_img_sec_cat_list input').attr("disabled",true);
jQuery('#customize-control-big_store_product_img_sec_cat_list li:nth-of-type(1) input,#customize-control-big_store_product_img_sec_cat_list li:nth-of-type(2) input,#customize-control-big_store_product_img_sec_cat_list li:nth-of-type(3) input').attr("disabled",false);
jQuery('#_customize-input-big_store_product_img_sec_optn option[value="featured"],#_customize-input-big_store_product_img_sec_optn option[value="random"]').attr("disabled",true);
jQuery('#customize-control-big_store_product_img_sec_slider_optn input,#_customize-input-big_store_product_img_sec_side option[value="right"],#customize-control-big_store_product_img_sec_single_row_slide input').attr("disabled",true);

//Ribbon
jQuery('#big_store_ribbon_backgroundvideo').attr("disabled",true);

//Product Carousel 
jQuery('#_customize-input-big_store_product_slide_optn option[value="featured"],#_customize-input-big_store_product_slide_optn option[value="random"]').attr("disabled",true);
jQuery('#customize-control-big_store_single_row_prdct_slide input,#customize-control-big_store_product_slider_optn input').attr("disabled",true);

//Banner
jQuery('#big_store_banner_layout-bnr-two').attr("disabled",true);
// Product List Carousel
jQuery('#_customize-input-big_store_product_list_optn option[value="featured"],#_customize-input-big_store_product_list_optn option[value="random"]').attr("disabled",true);
jQuery('#customize-control-big_store_single_row_prdct_list input,#customize-control-big_store_product_list_slide_optn input').attr("disabled",true);

jQuery('#customize-control-big_store_category_tab_list,#customize-control-big_store_product_img_sec_cat_list,#customize-control-big_store_include_category_slider').append("<h4>(To Select More Feature Available In Pro Version)</h4>");

jQuery('#customize-control-big_store_top_slide_content,#customize-control-big_store_highlight_content').append("<h4>(To Add More Slides Feature Available In Pro Version)</h4>");

});