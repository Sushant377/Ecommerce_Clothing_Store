/**
 * Script fort the customizer sections scroll function.
 *
 * @since    1.1.43
 * @package themehunk
 *
 * @author  themehunk
 */

/* global wp */

var thunk_customizer_section_scroll = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;

				customize.preview.bind('clicked-customizer', function( data ) {

						var sectionId = '';
						    switch (data) {
							case'sub-accordion-section-woo_cate_slider_setting':
								sectionId = 'section#category_section';
							break;
							case'sub-accordion-section-ribbon_panel':
							sectionId = 'section#ribbon_section';
							break;
							case'sub-accordion-section-woo_cate_product_filter':
							sectionId = 'section#featured_product_section';
							break;
							case'sub-accordion-section-woo_slide_product':
							sectionId = 'section#featured_product_section1';
							break;
							case'sub-accordion-section-sidebar-widgets-testimonial-widget':
							sectionId = 'section#testimonial_section';
							break;
							case'sub-accordion-section-sidebar-widgets-shopservice-widget':
							sectionId = 'section#services';
							break;
							case'sub-accordion-section-aboutus_setting':
							sectionId = 'section#aboutus_section';
							break;
							case'sub-accordion-section-blog_setting':
							sectionId = 'section#post_section';
							break;
							case'sub-accordion-section-three_column_ftr_first_column':
							sectionId = '#hot_sell_section';
							break;
							case'sub-accordion-section-footer_setting':
							sectionId = '#footer-wrp';
							break;
							default:
								sectionId = 'section#' + data;
							break;
						}
						if ( $( sectionId ).length > 0) {
							$( 'html, body' ).animate(
								{
									scrollTop: $( sectionId ).offset().top - 80
								}, 1000
							);
						}
					}
				);
		}
	);
};

thunk_customizer_section_scroll( jQuery );
