( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['big_store_cat_slide_layout'] = [
		    {
				controls: [    
				'big_store_category_slider_optn', 
				],
				callback: function(layout){
					if(layout =='cat-layout-1'){
					return true;
					}
					return false;
				}
			},	
				
			
			 
		];	
    });
})( jQuery );