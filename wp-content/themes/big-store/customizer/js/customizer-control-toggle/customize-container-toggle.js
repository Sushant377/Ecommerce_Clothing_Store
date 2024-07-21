/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
OPNCustomizerToggles ['big_store_default_container'] = [
		    {
				controls: [    
				'big_store_conatiner_maxwidth',
				'big_store_conatiner_top_btm',
				],
				callback: function(layout){
					if(layout=='fullwidth'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'big_store_conatiner_width',  
				],
				callback: function(layout){
					if(layout =='boxed'){
					return false;
					}
					return true;
				}
			},		
		];
	});
})( jQuery );