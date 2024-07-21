/*************************************/
// Banner Hide N Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
OPNCustomizerToggles ['big_store_banner_layout'] = [
		     

		     {
				controls: [    
				'big_store_bnr_1_img',
				'big_store_bnr_1_url',
				'big_store_bnr_2_img',
				'big_store_bnr_2_url',
				'big_store_bnr_3_img',
				'big_store_bnr_3_url',
				'big_store_bnr_4_img',
				'big_store_bnr_4_url',
				'big_store_bnr_5_img',
				'big_store_bnr_5_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'big_store_bnr_1_img',
				'big_store_bnr_1_url',
				'big_store_bnr_2_img',
				'big_store_bnr_2_url',
				'big_store_bnr_3_img',
				'big_store_bnr_3_url',
				'big_store_bnr_4_img',
				'big_store_bnr_4_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-five' ||  layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
		    {
				controls: [    
				'big_store_bnr_1_img',
				'big_store_bnr_1_url',
				'big_store_bnr_2_img',
				'big_store_bnr_2_url',
				'big_store_bnr_3_img',
				'big_store_bnr_3_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'big_store_bnr_1_img',
				'big_store_bnr_1_url',
				'big_store_bnr_2_img',
				'big_store_bnr_2_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five' || layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'big_store_bnr_1_img',
				'big_store_bnr_1_url',	
				],
				callback: function(layout){
					if(layout=='bnr-one' || layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five' || layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
				
		];	
	});
})( jQuery );