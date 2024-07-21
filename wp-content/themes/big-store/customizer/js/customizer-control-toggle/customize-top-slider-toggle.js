( function( $ ){
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles['big_store_top_slide_layout'] = [
		    {
				controls: [    
				'big_store_top_slider_2_title',
				'big_store_lay2_adimg',
				'big_store_lay2_url',
				'big_store_lay2_adimg2',
				'big_store_lay2_url2',
				'big_store_top_slider_2_title2',
				'big_store_lay2_adimg3',
				'big_store_lay2_url3',
				'big_store_lay3_adimg',
				'big_store_lay3_url',
				'big_store_lay3_adimg3',
				'big_store_lay3_3url',
				'big_store_lay3_adimg2',
				'big_store_lay3_2url',
				'big_store_include_category_slider',
				'big_store_lay3_bg_img',
				'big_store_lay3_bg_img_ovrly',
				'big_store_lay3_heading_txt',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-1'){
					return false;
					}
					return true;
				}
			},	
			{
				controls: [    
				'big_store_top_slide_content',
				'big_store_top_slider_2_title',
				'big_store_lay2_adimg',
				'big_store_lay2_url',
				'big_store_lay2_adimg2',
				'big_store_lay2_url2',
				'big_store_top_slider_2_title2',
				'big_store_lay2_adimg3',
				'big_store_lay2_url3',
				'big_store_lay3_bg_img_ovrly',
				'big_store_lay3_bg_img',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-2'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [  
				'big_store_top_slide_content',  
				'big_store_lay3_adimg',
				'big_store_lay3_url',
				'big_store_lay3_adimg2',
				'big_store_lay3_2url',
				'big_store_lay3_adimg3',
				'big_store_lay3_3url',
				'big_store_include_category_slider',
				'big_store_lay3_bg_img_ovrly',
				'big_store_lay3_bg_img',
				'big_store_lay3_heading_txt',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-3'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [  
				
				'big_store_lay3_bg_img_ovrly',
				'big_store_lay3_bg_img',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-4' || slideroptn =='slide-layout-3'|| slideroptn =='slide-layout-2'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'big_store_top_slide_content',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-4' || slideroptn =='slide-layout-1' || slideroptn =='slide-layout-2' || slideroptn =='slide-layout-3'){
					return true;
					}
					return false;
				}
			},
			
			
			 
		];	
            OPNCustomizerToggles['big_store_top_slider_optn'] = [
		    {
				controls: [    
				'big_store_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles['big_store_cat_slider_optn'] = [
		    {
				controls: [    
				'big_store_cat_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles['big_store_product_slider_optn'] = [
		    {
				controls: [    
				'big_store_product_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			];	
			OPNCustomizerToggles['big_store_category_slider_optn'] = [
		    {
				controls: [    
				'big_store_category_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];

			OPNCustomizerToggles['big_store_product_list_slide_optn'] = [
		    {
				controls: [    
				'big_store_product_list_slide_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];
			OPNCustomizerToggles['big_store_feature_product_slider_optn'] = [
		    {
				controls: [    
				'big_store_feature_product_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];
			OPNCustomizerToggles['big_store_cat_tb_lst_slider_optn'] = [
		    {
				controls: [    
				'big_store_cat_tb_lst_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];
			OPNCustomizerToggles['big_store_brand_slider_optn'] = [
		    {
				controls: [    
				'big_store_brand_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
		];


    });
})( jQuery );