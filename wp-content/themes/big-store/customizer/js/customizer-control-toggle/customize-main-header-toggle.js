/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// Main Header settings
//**********************************/
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['big_store_main_header_option'] = [
		    {
				controls: [    
				'big_store_main_hdr_btn_txt', 
				'big_store_main_hdr_btn_lnk',
				'big_store_main_hdr_calto_txt',
				'big_store_main_hdr_calto_nub',
				'big_store_main_hdr_calto_email',
				'big_store_main_header_widget_redirect'
				],
				callback: function(headeroptn){
					if (headeroptn =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'big_store_main_hdr_btn_txt', 
				'big_store_main_hdr_btn_lnk',
				],
				callback: function(layout){
					if(layout=='button'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'big_store_main_hdr_calto_txt',
				'big_store_main_hdr_calto_nub',
				'big_store_main_hdr_calto_email',
				],
				callback: function(layout){
					if(layout=='callto'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'big_store_main_header_widget_redirect'
				],
				callback: function(layout){
					if(layout=='widget'){
					return true;
					}
					return false;
				}
			},
			 
		];	
		OPNCustomizerToggles ['big_store_sticky_header'] = [
		    {
				controls: [    
				'big_store_sticky_header_effect', 
				],
				callback: function(headeroptn){
					if (headeroptn == true){
					return true;
					}
					return false;
				}
			},	
		];	
    });
})( jQuery );