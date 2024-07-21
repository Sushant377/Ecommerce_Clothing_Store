/*************************************/
// Blog Archive Hide and Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'big-store-toggle-control', function( argument, api ){
OPNCustomizerToggles ['big_store_blog_post_content'] = [
		    {
				controls: [    
				'big_store_blog_expt_length',
				'big_store_blog_read_more_txt',
				],
				callback: function(layout){
					if(layout=='full'|| layout=='nocontent'){
					return false;
					}
					return true;
				}
			},	
		];	
	});
})( jQuery );