/**
 * Script for the customizer auto scrolling.
 *
 * Sends the section name to the preview.
 *

 * @package  Big Store
 *
 * @author   ThemeHunk
 */
/* global wp */
jQuery(document).ready(function() {
var thunk_customize_scroller = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;
				
				$('ul[id*="big-store-panel-frontpage"] .accordion-section').each(
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
});
