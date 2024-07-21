( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
         OPNCustomizerToggles ['big_store_pagination'] = [
		    {
				controls: [    
				'big_store_pagination_loadmore_btn_text',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == 'click'){
					return true;
					}
					return false;
				}
			},
			
			];


    });
})( jQuery );