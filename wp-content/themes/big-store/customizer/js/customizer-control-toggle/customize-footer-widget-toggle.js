/*****************************************************************************/
/**********************customizer control setting*************************/
/*****************************************************************************/
( function( $ ) {
//**********************************/
// Footer widget hide and show settings
//**********************************/
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['big_store_bottom_footer_widget_layout'] = [
			{
				controls: [
					
					
					'big_store_bottom_footer_widget_redirect',
				],
				callback: function(layout){
					if ('ft-wgt-none'== layout){
						return false;
					}
					return true;
				}
			},
				
		];	
 });
})( jQuery );