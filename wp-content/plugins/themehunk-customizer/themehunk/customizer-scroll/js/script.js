/**
 * Script for the customizer auto scrolling.
 *
 * Sends the section name to the preview.
 *
 * @since    1.1.50
 * @package Hestia
 *
 * @author    ThemeIsle
 */

/* global wp */

var thunk_customize_scroller = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;
				$( 'ul[id*="front_page_section"] .accordion-section, #accordion-section-footer_setting.accordion-section' ).each(
					function (){
						$( this ).on(
							'click', function(){
								var section = $( this ).attr( 'aria-owns' );
								customize.previewer.send( 'clicked-customizer', section );
							}
						);
					}
				);
		}
	);
};

thunk_customize_scroller( jQuery );
