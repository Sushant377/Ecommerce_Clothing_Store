jQuery(document).ready(function(){ 
        wp.customize.section( 'sidebar-widgets-primary-sidebar' ).panel('elanzalite_magzine');
    wp.customize.section( 'sidebar-widgets-primary-sidebar' ).priority('5');

// Magzine widget 
    // Magzine widget 

    wp.customize.section( 'sidebar-widgets-magzine-sidebar-widget' ).panel('elanzalite_magzine');
    wp.customize.section( 'sidebar-widgets-magzine-sidebar-widget' ).priority('6');

        return false;

        wp.customize.control( 'elanzalite_magzine_layout' ).section( 'sidebar-widgets-magzine-sidebar-widget' );


    wp.customize('elanzalite_listing_layout', function( value ){
        var filter_type = value.bind( function( to ) {
        if(to=='two-grid-layout'){
            jQuery( '#customize-control-blog_post_share_hide' ).css('display','none' );
             
            } else if(to=='standard-layout'){
            jQuery( '#customize-control-blog_post_share_hide' ).css('display','block' );
               
            }
        } );
        if(filter_type()=='two-grid-layout'){
                jQuery( '#customize-control-blog_post_share_hide' ).css('display','none' );
                
            } else if(filter_type()=='standard-layout'){
                jQuery( '#customize-control-blog_post_share_hide' ).css('display','block' );
               

            }   

    } );

    wp.customize('elanzalite_listing_layout', function( value ){
        var filter_type = value.bind( function( to ) {
        if(to=='standard-layout'){
            jQuery( '#customize-control-stndrd_post_excerpt_data_hide' ).css('display','block' );
            jQuery( '#customize-control-post_excerpt_data_hide' ).css('display','none' );
            jQuery( '#customize-control-excerpt_lenght' ).css('display','none' );
            jQuery( '#customize-control-post_read_more_hide' ).css('display','none' );
            jQuery( '#customize-control-readmore_text' ).css('display','none' );
      
             
            } else if(to=='two-grid-layout'){
            jQuery( '#customize-control-stndrd_post_excerpt_data_hide' ).css('display','none' );
            jQuery( '#customize-control-post_excerpt_data_hide' ).css('display','block' );
            jQuery( '#customize-control-excerpt_lenght' ).css('display','block' );
            jQuery( '#customize-control-post_read_more_hide' ).css('display','block' );
            jQuery( '#customize-control-readmore_text' ).css('display','block' );
             
               
            }
        } );
        if(filter_type()=='standard-layout'){
            jQuery( '#customize-control-stndrd_post_excerpt_data_hide' ).css('display','block' );
            jQuery( '#customize-control-post_excerpt_data_hide' ).css('display','none' );
            jQuery( '#customize-control-excerpt_lenght' ).css('display','none' );
            jQuery( '#customize-control-post_read_more_hide' ).css('display','none' );
            jQuery( '#customize-control-readmore_text' ).css('display','none' );

                
            } else if(filter_type()=='two-grid-layout'){
                jQuery( '#customize-control-stndrd_post_excerpt_data_hide' ).css('display','none' );
                jQuery( '#customize-control-post_excerpt_data_hide' ).css('display','block' );
            jQuery( '#customize-control-excerpt_lenght' ).css('display','block' );
            jQuery( '#customize-control-post_read_more_hide' ).css('display','block' );
            jQuery( '#customize-control-readmore_text' ).css('display','block' );

               
            }   
    } );
    wp.customize( 'post_excerpt_data_hide', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            jQuery( '#customize-control-excerpt_lenght' ).css('display','none' );
             
            } else if(to=='' || to=='0'){
            jQuery( '#customize-control-excerpt_lenght' ).css('display','block' );
               
            }
        } );
        if(filter_type()=='1'){
                jQuery( '#customize-control-excerpt_lenght' ).css('display','none' );
                
            } else if(filter_type()=='' || filter_type()=='0'){
                jQuery( '#customize-control-excerpt_lenght' ).css('display','block' );
               

            }   

    } );
    wp.customize('post_read_more_hide', function( value ){
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            jQuery( '#customize-control-readmore_text' ).css('display','none' );
             
            } else if(to=='' || to=='0'){
            jQuery( '#customize-control-readmore_text' ).css('display','block' );
               
            }
        } );
        if(filter_type()=='1'){
                jQuery( '#customize-control-readmore_text' ).css('display','none' );
                
            } else if(filter_type()=='' || filter_type()=='0'){
                jQuery( '#customize-control-readmore_text' ).css('display','block' );
               

            }   

    } );


jQuery( 'body' ).bind( 'click', '.devices button', function ( e ) {
if(jQuery('.devices-wrapper .preview-desktop').hasClass('active')){
// body
jQuery('#customize-control-elanzalite_body_font_size' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb' ).css('display','none' );
// H1
jQuery('#customize-control-elanzalite_body_font_size_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h1' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h1' ).css('display','none' );
// H2
jQuery('#customize-control-elanzalite_body_font_size_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h2' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h2' ).css('display','none' );
// H3
jQuery('#customize-control-elanzalite_body_font_size_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h3' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h3' ).css('display','none' );
// H4
jQuery('#customize-control-elanzalite_body_font_size_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h4' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h4' ).css('display','none' );
// H5
jQuery('#customize-control-elanzalite_body_font_size_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h5' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h5' ).css('display','none' );
// H6
jQuery('#customize-control-elanzalite_body_font_size_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h6' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h6' ).css('display','none' );
}
if(jQuery('.devices-wrapper .preview-tablet').hasClass('active')){
// body
jQuery('#customize-control-elanzalite_body_font_size' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb' ).css('display','none' );
// H1
jQuery('#customize-control-elanzalite_body_font_size_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h1' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h1' ).css('display','none' );
// H2
jQuery('#customize-control-elanzalite_body_font_size_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h2' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h2' ).css('display','none' );
// H3
jQuery('#customize-control-elanzalite_body_font_size_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h3' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h3' ).css('display','none' );
// H4
jQuery('#customize-control-elanzalite_body_font_size_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h4' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h4' ).css('display','none' );
// H5
jQuery('#customize-control-elanzalite_body_font_size_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h5' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h5' ).css('display','none' );
// H6
jQuery('#customize-control-elanzalite_body_font_size_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h6' ).css('display','none' );        
jQuery('#customize-control-elanzalite_body_line_height_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h6' ).css('display','none' );
}
if(jQuery('.devices-wrapper .preview-mobile').hasClass('active')){
// body
jQuery('#customize-control-elanzalite_body_font_size' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb' ).css('display','block' );
//H1
jQuery('#customize-control-elanzalite_body_font_size_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h1' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h1' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h1' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h1' ).css('display','block' );
//H2
jQuery('#customize-control-elanzalite_body_font_size_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h2' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h2' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h2' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h2' ).css('display','block' );
//H3
jQuery('#customize-control-elanzalite_body_font_size_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h3' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h3' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h3' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h3' ).css('display','block' );
//H4
jQuery('#customize-control-elanzalite_body_font_size_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h4' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h4' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h4' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h4' ).css('display','block' );
//H5
jQuery('#customize-control-elanzalite_body_font_size_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h5' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h5' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h5' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h5' ).css('display','block' );
//H6
jQuery('#customize-control-elanzalite_body_font_size_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_tb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_font_size_mb_h6' ).css('display','block' );        
jQuery('#customize-control-elanzalite_body_line_height_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_tb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_line_height_mb_h6' ).css('display','block' );
jQuery('#customize-control-elanzalite_body_letter_spacing_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_tb_h6' ).css('display','none' );
jQuery('#customize-control-elanzalite_body_letter_spacing_mb_h6' ).css('display','block' );
}});
});