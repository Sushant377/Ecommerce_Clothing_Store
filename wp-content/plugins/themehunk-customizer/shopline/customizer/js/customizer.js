jQuery(document).ready(function() {
// section-hide 
// testimonail   
wp.customize( 'testimonial_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-sidebar-widgets-testimonial-widget' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } );
// service
wp.customize( 'service_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-sidebar-widgets-shopservice-widget' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } ); 
      
wp.customize( 'woo_cate_section_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-woo_cate_slider_setting' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } );  
//ribbon
wp.customize( 'ribbon_section_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-ribbon_panel' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } );
//product
wp.customize( 'woo_cate_product_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-woo_cate_product_filter' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } ); 
 //product1
wp.customize( 'woo_slide_product_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-woo_slide_product' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } ); 
//about
wp.customize( 'aboutus_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-aboutus_setting' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } );  
//blog
wp.customize( 'blog_hide', function( value ) {
        var subscribeSection = jQuery( '#accordion-section-blog_setting' );
        var filter_type = value.bind( function( to ) {
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } ); 
//three coloum
wp.customize( 'three_column_hide', function( value ){
        var subscribeSection = jQuery('#accordion-section-three_column_ftr_first_column');
        var filter_type = value.bind( function( to ){
        if(to=='1'){
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' ); 
            } else{
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );     
            }
        } );
        if(filter_type()=='1'){
             subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-hidden' ).removeClass( 'thunk-section-visible' );  
            } else {
            subscribeSection.find( '.accordion-section-title' ).addClass( 'thunk-section-visible' ).removeClass( 'thunk-section-hidden' );  
            }   
    } );       
// JUMP    
jQuery( '.focus-customizer-header-image' ).on( 'click', function ( e ) {
            e.preventDefault();
            wp.customize.section( 'header_image' ).focus();
} );
jQuery( '.focus-customizer-widget-redirect' ).on( 'click', function ( e ) {
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-menu-redirect' ).on( 'click', function ( e ) {
            e.preventDefault();
            wp.customize.panel( 'nav_menus' ).focus();
} );
// woo cate option
    wp.customize( 'woo_cate_image_bg', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
            jQuery( '#customize-control-woo_cate_slider_bg_image .customize-control-title,#customize-control-woo_cate_slider_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-woo_cat_svg_style .customize-control-title,#input_woo_cat_svg_style' ).css('display','none' ); 
            } else if(to=='image'){
            jQuery( '#customize-control-woo_cate_slider_bg_image .customize-control-title,#customize-control-woo_cate_slider_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-woo_cat_svg_style .customize-control-title,#input_woo_cat_svg_style' ).css('display','none' );    
            }
            else if(to=='svg'){
            jQuery( '#customize-control-woo_cat_svg_style .customize-control-title,#input_woo_cat_svg_style' ).css('display','block' );
            jQuery( '#customize-control-woo_cate_slider_bg_image .customize-control-title,#customize-control-woo_cate_slider_bg_image .attachment-media-view' ).css('display','none' );
            }
        } );
        if(filter_type()=='color'){
                jQuery( '#customize-control-woo_cate_slider_bg_image .customize-control-title,#customize-control-woo_cate_slider_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-woo_cat_svg_style .customize-control-title,#input_woo_cat_svg_style' ).css('display','none' ); 
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-woo_cate_slider_bg_image .customize-control-title,#customize-control-woo_cate_slider_bg_image .attachment-media-view' ).css('display','block' );
               jQuery( '#customize-control-woo_cat_svg_style .customize-control-title,#input_woo_cat_svg_style' ).css('display','none' ); 

            } 
            else if(filter_type()=='svg'){
            jQuery( '#customize-control-woo_cat_svg_style .customize-control-title,#input_woo_cat_svg_style' ).css('display','block' );
              jQuery( '#customize-control-woo_cate_slider_bg_image .customize-control-title,#customize-control-woo_cate_slider_bg_image .attachment-media-view' ).css('display','none' ); 
            }  

    } );
// shop-page-grid-layout-disable  
jQuery('#customize-control-woo_grid option').attr('disabled','disabled').eq(2).removeAttr('disabled');
// ribbon option
     wp.customize( 'ribbon_bg_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','none' );
             jQuery( '#customize-control-ribbn_parallax' ).css('display','none' );
             jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','none' );
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','none' );
                jQuery( '#customize-control-ribbn_parallax' ).css('display','block' );
                jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','none' );
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','none' );
            } else if(to=='video'){
                jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','block' );
                jQuery( '#customize-control-ribbn_parallax' ).css('display','none' );
                jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','block' );
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','none' );
            }
            else if(to=='svg'){
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','block' );
            jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','none' );
             jQuery( '#customize-control-ribbn_parallax' ).css('display','none' );
             jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','none' );
           }
        } );

           if(filter_type()=='color'){
             jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','none' );
             jQuery( '#customize-control-ribbn_parallax' ).css('display','none' );
             jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','none' );
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','none' );
                jQuery( '#customize-control-ribbn_parallax' ).css('display','block' );
                jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','none' );
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','none' );
            } else if(filter_type()=='video'){
                jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','block' );
                jQuery( '#customize-control-ribbn_parallax' ).css('display','none' );
                jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','block' );
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','none' );
            } 
            else if(filter_type()=='svg'){
            jQuery( '#customize-control-ribbon_svg_style .customize-control-title,#input_ribbon_svg_style' ).css('display','block' );
            jQuery( '#customize-control-ribbon_bg_image .customize-control-title,#customize-control-ribbon_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-ribbon_bg_video .customize-control-title,#customize-control-ribbon_bg_video .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-video_muted .customize-inside-control-row' ).css('display','none' );
             jQuery( '#customize-control-ribbn_parallax' ).css('display','none' );
             jQuery( '#customize-control-ribbon_video_bg_image .customize-control-title,#customize-control-ribbon_video_bg_image .attachment-media-view,#customize-control-ribbon_video_bg_image .description' ).css('display','none' );
           }
    } );
// woo product option
    wp.customize( 'woo_cate_product_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
            jQuery( '#customize-control-woo_cate_product_bg_image .customize-control-title,#customize-control-woo_cate_product_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-woo_prd_svg_style .customize-control-title,#input_woo_prd_svg_style' ).css('display','none' );
            } else if(to=='image'){
            jQuery( '#customize-control-woo_cate_product_bg_image .customize-control-title,#customize-control-woo_cate_product_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-woo_prd_svg_style .customize-control-title,#input_woo_prd_svg_style' ).css('display','none' );
            }
             else if(to=='svg'){
            jQuery( '#customize-control-woo_prd_svg_style .customize-control-title,#input_woo_prd_svg_style' ).css('display','block' );
            jQuery( '#customize-control-woo_cate_product_bg_image .customize-control-title,#customize-control-woo_cate_product_bg_image .attachment-media-view' ).css('display','none' );
            }
        } );
            if(filter_type()=='color'){
            jQuery( '#customize-control-woo_cate_product_bg_image .customize-control-title,#customize-control-woo_cate_product_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-woo_prd_svg_style .customize-control-title,#input_woo_prd_svg_style' ).css('display','block' );
            } else if(filter_type()=='image'){
            jQuery( '#customize-control-woo_cate_product_bg_image .customize-control-title,#customize-control-woo_cate_product_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-woo_prd_svg_style .customize-control-title,#input_woo_prd_svg_style' ).css('display','none' );
            }  
            else if(filter_type()=='svg'){
            jQuery( '#customize-control-woo_prd_svg_style .customize-control-title,#input_woo_prd_svg_style' ).css('display','block' );
            jQuery( '#customize-control-woo_cate_product_bg_image .customize-control-title,#customize-control-woo_cate_product_bg_image .attachment-media-view' ).css('display','none' );
            }   
    } );

    // Testimonial option
    wp.customize( 'testimonial_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
            jQuery( '#customize-control-testimonial_bg_image .customize-control-title,#customize-control-testimonial_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-testimonial_parallax' ).css('display','none' );
             jQuery( '#customize-control-testim_svg_style .customize-control-title,#input_testim_svg_style' ).css('display','none' );
            } else if(to=='image'){
            jQuery( '#customize-control-testimonial_bg_image .customize-control-title,#customize-control-testimonial_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-testimonial_parallax' ).css('display','block' );
             jQuery( '#customize-control-testim_svg_style .customize-control-title,#input_testim_svg_style' ).css('display','none' );
            }
            else if(to=='svg'){
            jQuery( '#customize-control-testimonial_bg_image .customize-control-title,#customize-control-testimonial_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-testimonial_parallax' ).css('display','none' );
             jQuery( '#customize-control-testim_svg_style .customize-control-title,#input_testim_svg_style' ).css('display','block' );
            }
        } );
            if(filter_type()=='color'){
                jQuery( '#customize-control-testimonial_bg_image .customize-control-title,#customize-control-testimonial_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-testimonial_parallax' ).css('display','none' );
                 jQuery( '#customize-control-testim_svg_style .customize-control-title,#input_testim_svg_style' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-testimonial_bg_image .customize-control-title,#customize-control-testimonial_bg_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-testimonial_parallax' ).css('display','block' );
                 jQuery( '#customize-control-testim_svg_style .customize-control-title,#input_testim_svg_style' ).css('display','none' );

            }   
             else if(filter_type()=='svg'){
            jQuery( '#customize-control-testimonial_bg_image .customize-control-title,#customize-control-testimonial_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-testimonial_parallax' ).css('display','none' );
             jQuery( '#customize-control-testim_svg_style .customize-control-title,#input_testim_svg_style' ).css('display','block' );
            }
    } );

 // testimonial-sider-option-autoplay  
  wp.customize( 'testm_play', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='off'){
             jQuery( '#customize-control-testm_slider_speed .customize-control-title,#customize-control-testm_slider_speed .range-slider ' ).css('display','none' );
            } else if(to=='on'){
                jQuery( '#customize-control-testm_slider_speed .customize-control-title,#customize-control-testm_slider_speed .range-slider' ).css('display','block' );
            }
        } );
        if(filter_type()=='off'){
                jQuery( '#customize-control-testm_slider_speed .customize-control-title,#customize-control-testm_slider_speed .range-slider' ).css('display','none' );
            } else if(filter_type()=='on'){
                jQuery( '#customize-control-testm_slider_speed .customize-control-title,#customize-control-testm_slider_speed .range-slider' ).css('display','block' );

            }   

    } );
  // product-sider-option-autoplay  
  wp.customize( 'slide_product_play', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='off'){
             jQuery( '#customize-control-product_slider_speed .customize-control-title,#customize-control-product_slider_speed .range-slider ' ).css('display','none' );
            } else if(to=='on'){
                jQuery( '#customize-control-product_slider_speed .customize-control-title,#customize-control-product_slider_speed .range-slider' ).css('display','block' );
            }
        } );
        if(filter_type()=='off'){
                jQuery( '#customize-control-product_slider_speed .customize-control-title,#customize-control-product_slider_speed .range-slider' ).css('display','none' );
            } else if(filter_type()=='on'){
                jQuery( '#customize-control-product_slider_speed .customize-control-title,#customize-control-product_slider_speed .range-slider' ).css('display','block' );

            }   

    } );
   // two-coloum-first
    wp.customize( 'two_coloum_bg_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='img'){
             jQuery( '#customize-control-two_column_img_first_image' ).css('display','block' );
             jQuery( '#customize-control-two_column_img_first_video' ).css('display','none' );
             jQuery( '#customize-control-two_column_img_first_text' ).css('display','block' );

            } else if(to=='ifrm'){
                jQuery( '#customize-control-two_column_img_first_image' ).css('display','none' );
                jQuery( '#customize-control-two_column_img_first_video' ).css('display','block' );
                jQuery( '#customize-control-two_column_img_first_text' ).css('display','none' );
            }
        } );
            if(filter_type()=='img'){
                jQuery( '#customize-control-two_column_img_first_image' ).css('display','block' );
                jQuery( '#customize-control-two_column_img_first_video' ).css('display','none' );
                jQuery( '#customize-control-two_column_img_first_text' ).css('display','block' );
            } else if(filter_type()=='ifrm'){
                jQuery( '#customize-control-two_column_img_first_image' ).css('display','none' );
                jQuery( '#customize-control-two_column_img_first_video' ).css('display','block' );
                jQuery( '#customize-control-two_column_img_first_text' ).css('display','none' );

            }   
    } );
    // two-coloum-second
    wp.customize( 'two_coloum_scnd_bg_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='img'){
            jQuery( '#customize-control-two_column_ads_second_image' ).css('display','block' );
            jQuery( '#customize-control-two_column_img_second_video' ).css('display','none' );
            jQuery( '#customize-control-two_column_img_second_text' ).css('display','block' );
            } else if(to=='ifrm'){
            jQuery( '#customize-control-two_column_ads_second_image' ).css('display','none' );
            jQuery( '#customize-control-two_column_img_second_video' ).css('display','block' );
            jQuery( '#customize-control-two_column_img_second_text' ).css('display','none' );
            }
        } );
            if(filter_type()=='img'){
            jQuery( '#customize-control-two_column_ads_second_image' ).css('display','block' );
            jQuery( '#customize-control-two_column_img_second_video' ).css('display','none' );
            jQuery( '#customize-control-two_column_img_second_text' ).css('display','block' );
            } else if(filter_type()=='ifrm'){
                jQuery( '#customize-control-two_column_ads_second_image' ).css('display','none' );
                jQuery( '#customize-control-two_column_img_second_video' ).css('display','block');
                jQuery( '#customize-control-two_column_img_second_text' ).css('display','none' );

            }   
    } );
    // aboutus option
    wp.customize( 'aboutus_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-aboutus_bg_image .customize-control-title,#customize-control-aboutus_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-about_svg_style .customize-control-title,#input_about_svg_style' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-aboutus_bg_image .customize-control-title,#customize-control-aboutus_bg_image .attachment-media-view' ).css('display','block' );
               jQuery( '#customize-control-about_svg_style .customize-control-title,#input_about_svg_style' ).css('display','none' );
            }
            else if(to=='svg'){
                jQuery( '#customize-control-aboutus_bg_image .customize-control-title,#customize-control-aboutus_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-about_svg_style .customize-control-title,#input_about_svg_style' ).css('display','block' );
               
            }
        } );
            if(filter_type()=='color'){
                jQuery( '#customize-control-aboutus_bg_image .customize-control-title,#customize-control-aboutus_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-about_svg_style .customize-control-title,#input_about_svg_style' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-aboutus_bg_image .customize-control-title,#customize-control-aboutus_bg_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-about_svg_style .customize-control-title,#input_about_svg_style' ).css('display','none' );
            }  
            else if(filter_type()=='svg'){
                jQuery( '#customize-control-aboutus_bg_image .customize-control-title,#customize-control-aboutus_bg_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-about_svg_style .customize-control-title,#input_about_svg_style' ).css('display','block' );
               
            } 
    } );

    // Blog option
    wp.customize( 'blog_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-blog_bg_image .customize-control-title, #customize-control-blog_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-blog_svg_style .customize-control-title, #input_blog_svg_style' ).css('display','none' );
            } else if(to=='image'){
            jQuery( '#customize-control-blog_bg_image .customize-control-title, #customize-control-blog_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-blog_svg_style .customize-control-title, #input_blog_svg_style' ).css('display','none' );
            }
            else if(to=='svg'){
            jQuery( '#customize-control-blog_bg_image .customize-control-title, #customize-control-blog_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-blog_svg_style .customize-control-title, #input_blog_svg_style' ).css('display','block' );

            }
        } );
            if(filter_type()=='color'){
            jQuery( '#customize-control-blog_bg_image .customize-control-title, #customize-control-blog_bg_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-blog_svg_style .customize-control-title, #input_blog_svg_style' ).css('display','none' );
            } else if(filter_type()=='image'){
            jQuery( '#customize-control-blog_bg_image .customize-control-title, #customize-control-blog_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-blog_svg_style .customize-control-title, #input_blog_svg_style' ).css('display','none' );                  
            } 
            else if(filter_type()=='svg'){
            jQuery( '#customize-control-blog_bg_image .customize-control-title, #customize-control-blog_bg_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-blog_svg_style .customize-control-title, #input_blog_svg_style' ).css('display','block' );        
                       

            }    
    } );
    // ad-style
    wp.customize( 'ad_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             
             jQuery( '#customize-control-ad_svg_style .customize-control-title, #input_ad_svg_style' ).css('display','none' );
            } 
            else if(to=='svg'){
            
            jQuery( '#customize-control-ad_svg_style .customize-control-title, #input_ad_svg_style' ).css('display','block' );

            }
        } );
            if(filter_type()=='color'){
            
            jQuery( '#customize-control-ad_svg_style .customize-control-title, #input_ad_svg_style' ).css('display','none' );
            }
            else if(filter_type()=='svg'){
            
            jQuery( '#customize-control-ad_svg_style .customize-control-title, #input_ad_svg_style' ).css('display','block' );        
                       

            }    
    } );
  // slider-product-style
wp.customize( 'product_slider_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-product_slider_bg_image .customize-control-title, #customize-control-product_slider_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-woo_slide_svg_style .customize-control-title, #input_woo_slide_svg_style' ).css('display','none' );
            } else if(to=='image'){
            jQuery( '#customize-control-product_slider_bg_image .customize-control-title, #customize-control-product_slider_bg_image .attachment-media-view' ).css('display','block' );
             jQuery( '#customize-control-woo_slide_svg_style .customize-control-title, #input_woo_slide_svg_style' ).css('display','none' );
            }
            else if(to=='svg'){
            jQuery( '#customize-control-product_slider_bg_image .customize-control-title, #customize-control-product_slider_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-woo_slide_svg_style .customize-control-title, #input_woo_slide_svg_style' ).css('display','block' );
            }
        } );
            if(filter_type()=='color'){
            jQuery( '#customize-control-product_slider_bg_image .customize-control-title, #customize-control-product_slider_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-woo_slide_svg_style .customize-control-title, #input_woo_slide_svg_style' ).css('display','none' );
            } else if(filter_type()=='image'){
            jQuery( '#customize-control-product_slider_bg_image .customize-control-title, #customize-control-product_slider_bg_image .attachment-media-view' ).css('display','block' );
             jQuery( '#customize-control-woo_slide_svg_style .customize-control-title, #input_woo_slide_svg_style' ).css('display','none' );
            } 
            else if(filter_type()=='svg'){
            jQuery( '#customize-control-product_slider_bg_image .customize-control-title, #customize-control-product_slider_bg_image .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-woo_slide_svg_style .customize-control-title, #input_woo_slide_svg_style' ).css('display','block' );           

            }    
    } );

// blog-sider-option-autoplay 
wp.customize( 'blog_play', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='off'){
             jQuery( '#customize-control-blog_slider_speed .customize-control-title,#customize-control-blog_slider_speed #_customize-input-blog_slider_speed' ).css('display','none' );
            } else if(to=='on'){
                jQuery( '#customize-control-blog_slider_speed .customize-control-title,#customize-control-blog_slider_speed #_customize-input-blog_slider_speed' ).css('display','block' );
            }
        } );
        if(filter_type()=='off'){
                jQuery( '#customize-control-blog_slider_speed .customize-control-title,#customize-control-blog_slider_speed #_customize-input-blog_slider_speed' ).css('display','none' );
            } else if(filter_type()=='on'){
                jQuery( '#customize-control-blog_slider_speed .customize-control-title,#customize-control-blog_slider_speed #_customize-input-blog_slider_speed' ).css('display','block' );

            }   

    } );
//brand option
    wp.customize( 'brand_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-brand_bg_image' ).css('display','none' );
              jQuery( '#customize-control-brand_parallax' ).css('display','none' );
             
             } else if(to=='image'){
                jQuery( '#customize-control-brand_bg_image' ).css('display','block' );
                 jQuery( '#customize-control-brand_parallax' ).css('display','block' );
            }
        } );
            if(filter_type()=='color'){
                jQuery( '#customize-control-brand_bg_image' ).css('display','none' );
                jQuery( '#customize-control-brand_parallax' ).css('display','none' );
                
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-brand_bg_image' ).css('display','block' );
                jQuery( '#customize-control-brand_parallax' ).css('display','block' );
               

            }   
    } );

    // footer option
    wp.customize( 'footer_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-footer_image_upload .customize-control-title,#customize-control-footer_image_upload .attachment-media-view' ).css('display','none' );
             jQuery( '#customize-control-footer_svg_style .customize-control-title,#input_footer_svg_style' ).css('display','none' );  
             }else if(to=='image'){
             jQuery( '#customize-control-footer_image_upload .customize-control-title,#customize-control-footer_image_upload .attachment-media-view' ).css('display','block' );
             jQuery( '#customize-control-footer_svg_style .customize-control-title,#input_footer_svg_style' ).css('display','none' );  
             }
            else if(to=='svg'){
            jQuery( '#customize-control-footer_image_upload .customize-control-title,#customize-control-footer_image_upload .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-footer_svg_style .customize-control-title,#input_footer_svg_style' ).css('display','block' );
            }
        } );
            if(filter_type()=='color'){
            jQuery( '#customize-control-footer_image_upload .customize-control-title,#customize-control-footer_image_upload .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-footer_svg_style .customize-control-title,#input_footer_svg_style' ).css('display','none' );  
            } else if(filter_type()=='image'){
            jQuery( '#customize-control-footer_image_upload .customize-control-title,#customize-control-footer_image_upload .attachment-media-view' ).css('display','block' );  
            jQuery( '#customize-control-footer_svg_style .customize-control-title,#input_footer_svg_style' ).css('display','none' );  
            }  
            else if(filter_type()=='svg'){
            jQuery( '#customize-control-footer_image_upload .customize-control-title,#customize-control-footer_image_upload .attachment-media-view' ).css('display','none' );  
            jQuery( '#customize-control-footer_svg_style .customize-control-title,#input_footer_svg_style' ).css('display','block' );  
            }   
    } );

    
        // woo widget
    wp.customize( 'woo_widget_options', function( value ) {
        var filter_type = value.bind( function( to ) {
            if(to=='color'){
             jQuery( '#customize-control-woo_widget_bg_image' ).css('display','none' );
             jQuery( '#customize-control-woo_widget_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-woo_widget_bg_image' ).css('display','block' );
             jQuery( '#customize-control-woo_widget_parallax' ).css('display','block' );
            }
        } );
            if(filter_type()=='color'){
                jQuery( '#customize-control-woo_widget_bg_image' ).css('display','none' );
            jQuery( '#customize-control-woo_widget_parallax' ).css('display','none' );
            } else if(filter_type()=='image'){
jQuery( '#customize-control-woo_widget_bg_image' ).css('display','block' );
 jQuery( '#customize-control-woo_widget_parallax' ).css('display','block' );
             }   
    } );

// top-sider-option-autoplay
wp.customize( 'da_play', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='off'){
             jQuery( '#customize-control-da_slider_speed' ).css('display','none' );
            } else if(to=='on'){
                jQuery( '#customize-control-da_slider_speed' ).css('display','block' );
            }
        } );
        if(filter_type()=='off'){
                jQuery( '#customize-control-da_slider_speed' ).css('display','none' );
            } else if(filter_type()=='on'){
                jQuery( '#customize-control-da_slider_speed' ).css('display','block' );

            }   

    } );
// woo_cat-sider-option-autoplay
wp.customize( 'cat_play', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='off'){
             jQuery( '#customize-control-woo_cate_slider_speed .customize-control-title,#customize-control-woo_cate_slider_speed .range-slider ' ).css('display','none' );
            } else if(to=='on'){
                jQuery( '#customize-control-woo_cate_slider_speed .customize-control-title,#customize-control-woo_cate_slider_speed .range-slider' ).css('display','block' );
            }
        } );
        if(filter_type()=='off'){
                jQuery( '#customize-control-woo_cate_slider_speed .customize-control-title,#customize-control-woo_cate_slider_speed .range-slider' ).css('display','none' );
            } else if(filter_type()=='on'){
                jQuery( '#customize-control-woo_cate_slider_speed .customize-control-title,#customize-control-woo_cate_slider_speed .range-slider' ).css('display','block' );

            }   

    } );


/**********************************************/
// Front Pge Hero -option-autoplay 
/**********************************************/
wp.customize( 'shopline_front_page_set', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slide'){
             jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','block' );
             jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','block' );
             jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','block' );
             jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','block' );
             jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','block' );
             jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','block' );
             jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','block' );
           // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-second_slider_image .customize-control-title, #customize-control-second_slider_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','block' );
            jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','block' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','block' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','block' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','block' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','block' );
            jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','block' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','block' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','block' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','block' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','none' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
            //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
           //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','block' );
            //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','none' );
            //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider' ).css('display','block' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            
            } 
        else if(to=='video'){
           jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
             //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
            //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','block' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }
        else if(to=='image'){    
           jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','block' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
            //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
           //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
            //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
            //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }
        else if(to=='color'){ 
           jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
           //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','block' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','none' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','none' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }
        else if(to=='gradient'){
                jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
           //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','block' );
            //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
           //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','none' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','none' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }
        else if(to=='external'){
                jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','none' );
           //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','block' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','none' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','none' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','none' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','none' );
            }
        } );
        if(filter_type()=='slide'){
            // firstside
                jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','block' );
                jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','block' );
                jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','block' );
            jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','block' );
            jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','block' );
            jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','block' );
            // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','block' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','block' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','block' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','block' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','block' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','block' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','block' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','block' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','block' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','block' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','block' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','block' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','block' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','none' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
           //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','block' );
            //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','none' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','block' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            
            } 
            else if(filter_type()=='video'){
                jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
             jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
             jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
            // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
            //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','block' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }  
            else if(filter_type()=='image'){
               jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
           // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','block' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }  
            else if(filter_type()=='color'){
            jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
// video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','block' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }  
            else if(filter_type()=='gradient'){
               jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
// video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','block' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','block' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','block' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','none' );
            //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','block' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','block' );
            }   
            else if(filter_type()=='external'){
                jQuery( '#customize-control-front_page_slide_first_line_break_color hr,#customize-control-front_page_slide_first_line_break_color .description' ).css('display','none' );
           jQuery( '#customize-control-first_slider_image .customize-control-title,#customize-control-first_slider_image .attachment-media-view' ).css('display','none' );
           jQuery( '#customize-control-first_slider_heading .customize-control-title,#customize-control-first_slider_heading #_customize-input-first_slider_heading' ).css('display','none' );
           jQuery( '#customize-control-first_slider_desc .customize-control-title,#customize-control-first_slider_desc #_customize-input-first_slider_desc' ).css('display','none' );
           jQuery( '#customize-control-first_slider_link .customize-control-title,#customize-control-first_slider_link #_customize-input-first_slider_link' ).css('display','none' );
           jQuery( '#customize-control-first_button_text .customize-control-title,#customize-control-first_button_text #_customize-input-first_button_text' ).css('display','none' );
           jQuery( '#customize-control-first_button_link .customize-control-title,#customize-control-first_button_link #_customize-input-first_button_link' ).css('display','none' );
             // secondslide
            jQuery( '#customize-control-front_page_slide_second_line_break_color hr,#customize-control-front_page_slide_second_line_break_color .description' ).css('display','none' );
                jQuery( '#customize-control-second_slider_image .customize-control-title,#customize-control-second_slider_image .attachment-media-view' ).css('display','none' );
                jQuery( '#customize-control-second_slider_heading .customize-control-title,#customize-control-second_slider_heading #_customize-input-second_slider_heading' ).css('display','none' );
                jQuery( '#customize-control-second_slider_desc .customize-control-title,#customize-control-second_slider_desc #_customize-input-second_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-second_slider_link .customize-control-title,#customize-control-second_slider_link #_customize-input-second_slider_link' ).css('display','none' );
            jQuery( '#customize-control-second_button_text .customize-control-title,#customize-control-second_button_text #_customize-input-second_button_text' ).css('display','none' );
            jQuery( '#customize-control-second_button_link .customize-control-title,#customize-control-second_button_link #_customize-input-second_button_link' ).css('display','none' );
            //thirdslide
            jQuery( '#customize-control-front_page_slide_third_line_break_color hr,#customize-control-front_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-third_slider_image .customize-control-title,#customize-control-third_slider_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-third_slider_heading .customize-control-title,#customize-control-third_slider_heading #_customize-input-third_slider_heading' ).css('display','none' );
            jQuery( '#customize-control-third_slider_desc .customize-control-title,#customize-control-third_slider_desc #_customize-input-third_slider_desc' ).css('display','none' );
            jQuery( '#customize-control-third_slider_link .customize-control-title,#customize-control-third_slider_link #_customize-input-third_slider_link' ).css('display','none' );
            jQuery( '#customize-control-third_button_text .customize-control-title,#customize-control-third_button_text #_customize-input-third_button_text' ).css('display','none' );
            jQuery( '#customize-control-third_button_link .customize-control-title,#customize-control-third_button_link #_customize-input-third_button_link' ).css('display','none' );
          // video-setting
            jQuery( '#customize-control-front_hero_video .customize-control-title,#customize-control-front_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_poster .customize-control-title,#customize-control-front_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_heading .customize-control-title,#customize-control-front_hero_video_heading #_customize-input-front_hero_video_heading' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_desc .customize-control-title,#customize-control-front_hero_video_desc #_customize-input-front_hero_video_desc' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_link .customize-control-title,#customize-control-front_hero_video_link #_customize-input-front_hero_video_link' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_text .customize-control-title,#customize-control-front_hero_video_button_text #_customize-input-front_hero_video_button_text' ).css('display','none' );
            jQuery( '#customize-control-front_hero_video_button_link .customize-control-title,#customize-control-front_hero_video_button_link #_customize-input-front_hero_video_button_link' ).css('display','none' );
            //image-setting
            jQuery( '#customize-control-front_hero_img .customize-control-title,#customize-control-front_hero_img .attachment-media-view' ).css('display','none' );
            //color-setting
            jQuery( '#customize-control-front_hero_bg_color .customize-control-title,#customize-control-front_hero_bg_color .wp-picker-container' ).css('display','none' );
            //gradient-setting
            jQuery( '#customize-control-front_garedient_hero .customize-control-title,#customize-control-front_garedient_hero #input_front_garedient_hero' ).css('display','none' );
             //external-plugin-setting
            jQuery( '#customize-control-front_extrnl_shrcd .customize-control-title,#customize-control-front_extrnl_shrcd .description,#customize-control-front_extrnl_shrcd #_customize-input-front_extrnl_shrcd' ).css('display','block' );
           //slider content alignment
            jQuery( '#customize-control-sldr_content_front_align_set .customize-control-title,#customize-control-sldr_content_front_align_set select' ).css('display','none' );
             //non-slider content alignment
            jQuery( '#customize-control-_content_front_align_set .customize-control-title,#customize-control-_content_front_align_set select' ).css('display','none' );
             //mute 
            jQuery( '#customize-control-front_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            // overlay-setting
            jQuery( '#customize-control-hero_overlay_set .customize-control-title,#customize-control-hero_overlay_set select' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            //slider-speed
            jQuery( '#customize-control-normal_slider_speed .customize-control-title,#customize-control-normal_slider_speed .range-slider ' ).css('display','none' );
            //hide-option
            jQuery( '#customize-control-content_hide_hd_hero .customize-inside-control-row,#customize-control-content_hide_sb_hero .customize-inside-control-row,#customize-control-content_hide_btn_hero .customize-inside-control-row' ).css('display','none' );
    }} );

/**********************************************/
// Front Pge Hero choose-overlay
/**********************************************/
wp.customize( 'hero_overlay_set', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','none' );
            } else if(to=='gradient'){
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','none' );
            } else if(filter_type()=='gradient'){
            jQuery( '#customize-control-normal_slider_bg_overly .customize-control-title,#customize-control-normal_slider_bg_overly .wp-picker-container' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero .customize-control-title,#customize-control-overlay_garedient_hero #input_overlay_garedient_hero' ).css('display','block' );
            }   

    } );
/**********************************************/
// Front Pge Hero content align
/**********************************************/
wp.customize( '_content_front_align_set', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='txt-media-left'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','block' );
            } 
        else if(to=='txt-media-right'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','block' ); 
            }
        else if(to=='txt-center'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }
        else if(to=='txt-right'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }
        else if(to=='txt-left'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }
        } );
        if(filter_type()=='txt-media-left'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','block' );
            } 
        else if(filter_type()=='txt-media-right'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','block' );
            }
        else if(filter_type()=='txt-center'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }
        else if(filter_type()=='txt-right'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }
        else if(filter_type()=='txt-left'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }  
    } );
wp.customize( 'shopline_front_page_set', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slide'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            } 
            else if(to=='external'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            } 
         else{
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','block' );
         }   
        } );
        if(filter_type()=='slide'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
     } 
     else if(filter_type()=='external'){
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','none' );
            }
     else{
            jQuery( '#customize-control-align_image .customize-control-title,#customize-control-align_image .attachment-media-view' ).css('display','block' );
         }
} );
//************************************//
// inner hero page
//************************************//
wp.customize( 'shopline_inner_page_set', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slide'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','block' );
            // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','block' );
            } 
        else if(to=='video'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
              // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','block' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        else if(to=='image'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
               // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
           //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','block' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        else if(to=='color'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
               // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','block' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
           //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        else if(to=='no-header'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
               // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','none' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        } );
        if(filter_type()=='slide'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','block' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','block' );
            // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','block' );
            } 
        else if(filter_type()=='video'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
            // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','block' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','block' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        else if(filter_type()=='image'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
               // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','block' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        else if(filter_type()=='color'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
               // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' );
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','block' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','block' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
            }
        else if(filter_type()=='no-header'){
            jQuery( '#customize-control-inner_page_slide_first_line_break_color hr,#customize-control-inner_page_slide_first_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_second_line_break_color hr,#customize-control-inner_page_slide_second_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_page_slide_third_line_break_color hr,#customize-control-inner_page_slide_third_line_break_color .description' ).css('display','none' );
            jQuery( '#customize-control-inner_slide_image .customize-control-title,#customize-control-inner_slide_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide2_image .customize-control-title,#customize-control-inner_slide2_image .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_slide3_image .customize-control-title,#customize-control-inner_slide3_image .attachment-media-view' ).css('display','none' );
               // video
            jQuery( '#customize-control-inner_hero_video .customize-control-title,#customize-control-inner_hero_video .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_poster .customize-control-title,#customize-control-inner_hero_video_poster .attachment-media-view' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_video_muted .customize-inside-control-row' ).css('display','none' );
            //image
            jQuery( '#customize-control-inner_hero_image button' ).css('display','none' ); 
            //color
            jQuery( '#customize-control-inner_hero_color .customize-control-title,#customize-control-inner_hero_color .wp-picker-container' ).css('display','none' );
            //no-header
            jQuery( '#customize-control-title_hide_hero .customize-inside-control-row' ).css('display','none' );
            //speed
            jQuery( '#customize-control-inner_hero_speed .customize-control-title,#customize-control-inner_hero_speed .range-slider' ).css('display','none' );
    } } );
/**********************************************/
// Inner Pge Hero choose-overlay
/**********************************************/
wp.customize( 'inner_hero_overlay_set', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
            jQuery( '#customize-control-inner_bg_overly .customize-control-title,#customize-control-inner_bg_overly .wp-picker-container' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero_inner .customize-control-title,#customize-control-overlay_garedient_hero_inner #input_overlay_garedient_hero_inner' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_title_color .customize-control-title,#customize-control-inner_hero_title_color .wp-picker-container' ).css('display','block' );
            } else if(to=='gradient'){
            jQuery( '#customize-control-inner_bg_overly .customize-control-title,#customize-control-inner_bg_overly .wp-picker-container' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero_inner .customize-control-title,#customize-control-overlay_garedient_hero_inner #input_overlay_garedient_hero_inner' ).css('display','block' );
            jQuery( '#customize-control-inner_hero_title_color .customize-control-title,#customize-control-inner_hero_title_color .wp-picker-container' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
            jQuery( '#customize-control-inner_bg_overly .customize-control-title,#customize-control-inner_bg_overly .wp-picker-container' ).css('display','block' );
            jQuery( '#customize-control-overlay_garedient_hero_inner .customize-control-title,#customize-control-overlay_garedient_hero_inner #input_overlay_garedient_hero_inner' ).css('display','none' );
            jQuery( '#customize-control-inner_hero_title_color .customize-control-title,#customize-control-inner_hero_title_color .wp-picker-container' ).css('display','block' );
            } 
        else if(filter_type()=='gradient'){
            jQuery( '#customize-control-inner_bg_overly .customize-control-title,#customize-control-inner_bg_overly .wp-picker-container' ).css('display','none' );
            jQuery( '#customize-control-overlay_garedient_hero_inner .customize-control-title,#customize-control-overlay_garedient_hero_inner #input_overlay_garedient_hero_inner' ).css('display','block' );
            jQuery( '#customize-control-inner_hero_title_color .customize-control-title,#customize-control-inner_hero_title_color .wp-picker-container' ).css('display','block' );
            }   

    } );

 /* Move our focus widgets in the our focus panel */
/*Documentation link and Upgrade to PRO link */
    /* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );

        // section sorting
    jQuery( "#sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
    });

    jQuery( "#sortable" ).sortable({
        cursor: 'move',
        opacity: 0.65,
        stop: function ( event, ui){
        var data = jQuery(this).sortable('toArray');
            //  console.log(data); // This should print array of IDs, but returns empty string/array      
            jQuery( this ).parents( '.customize-control').find( 'input[type="hidden"]' ).val( data ).trigger( 'change' );
        }
    });
    // testimonial widget
    wp.customize.section( 'sidebar-widgets-testimonial-widget' ).panel('front_page_section');
    wp.customize.section( 'sidebar-widgets-testimonial-widget' ).priority('4');
    // service widget
    wp.customize.section( 'sidebar-widgets-shopservice-widget' ).panel('front_page_section');
    wp.customize.section( 'sidebar-widgets-shopservice-widget' ).priority('4');
    
    // typography
jQuery( 'body' ).bind( 'click', '.devices button', function ( e ) {
if(jQuery('.devices-wrapper .preview-desktop').hasClass('active')){
// body
jQuery('#customize-control-shopline_body_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_body_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_body_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_body_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_body_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_body_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_body_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_body_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_body_letter_spacing_mb' ).css('display','none' );
// H1
jQuery('#customize-control-shopline_h1_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_h1_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h1_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_h1_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_h1_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_letter_spacing_mb' ).css('display','none' );
// H2
jQuery('#customize-control-shopline_h2_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_h2_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h2_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_h2_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_h2_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_letter_spacing_mb' ).css('display','none' );
// H3
jQuery('#customize-control-shopline_h3_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_h3_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h3_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_h3_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_h3_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_letter_spacing_mb' ).css('display','none' );
// H4
jQuery('#customize-control-shopline_h4_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_h4_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h4_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_h4_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_h4_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_letter_spacing_mb' ).css('display','none' );
// H5
jQuery('#customize-control-shopline_h5_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_h5_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h5_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_h5_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_h5_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_letter_spacing_mb' ).css('display','none' );
// H6
jQuery('#customize-control-shopline_h6_font_size' ).css('display','block' );
jQuery('#customize-control-shopline_h6_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h6_line_height' ).css('display','block' );
jQuery('#customize-control-shopline_h6_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_letter_spacing' ).css('display','block' );
jQuery('#customize-control-shopline_h6_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_letter_spacing_mb' ).css('display','none' );

}
if(jQuery('.devices-wrapper .preview-tablet').hasClass('active')){
// body
jQuery('#customize-control-shopline_body_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_body_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_body_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_body_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_body_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_body_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_body_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_body_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_body_letter_spacing_mb' ).css('display','none' );
// H1
jQuery('#customize-control-shopline_h1_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h1_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h1_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h1_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h1_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h1_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h1_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h1_letter_spacing_mb' ).css('display','none' );
// H2
jQuery('#customize-control-shopline_h2_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h2_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h2_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h2_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h2_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h2_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h2_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h2_letter_spacing_mb' ).css('display','none' );
// H3
jQuery('#customize-control-shopline_h3_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h3_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h3_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h3_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h3_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h3_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h3_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h3_letter_spacing_mb' ).css('display','none' );
// H4
jQuery('#customize-control-shopline_h4_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h4_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h4_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h4_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h4_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h4_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h4_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h4_letter_spacing_mb' ).css('display','none' );
// H5
jQuery('#customize-control-shopline_h5_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h5_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h5_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h5_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h5_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h5_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h5_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h5_letter_spacing_mb' ).css('display','none' );
// H6
jQuery('#customize-control-shopline_h6_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h6_font_size_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h6_font_size_mb' ).css('display','none' );        
jQuery('#customize-control-shopline_h6_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h6_line_height_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h6_line_height_mb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h6_letter_spacing_tb' ).css('display','block' );
jQuery('#customize-control-shopline_h6_letter_spacing_mb' ).css('display','none' );

}
if(jQuery('.devices-wrapper .preview-mobile').hasClass('active')){
// body    
jQuery('#customize-control-shopline_body_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_body_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_body_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_body_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_body_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_body_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_body_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_body_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_body_letter_spacing_mb' ).css('display','block' );     
//h1   
jQuery('#customize-control-shopline_h1_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h1_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_h1_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h1_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_h1_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h1_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h1_letter_spacing_mb' ).css('display','block' ); 
//h2   
jQuery('#customize-control-shopline_h2_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h2_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_h2_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h2_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_h2_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h2_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h2_letter_spacing_mb' ).css('display','block' ); 
//h3   
jQuery('#customize-control-shopline_h3_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h3_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_h3_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h3_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_h3_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h3_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h3_letter_spacing_mb' ).css('display','block' ); 
//h4   
jQuery('#customize-control-shopline_h4_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h4_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_h4_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h4_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_h4_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h4_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h4_letter_spacing_mb' ).css('display','block' ); 
//h5  
jQuery('#customize-control-shopline_h5_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h5_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_h5_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h5_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_h5_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h5_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h5_letter_spacing_mb' ).css('display','block' ); 
//h6  
jQuery('#customize-control-shopline_h6_font_size' ).css('display','none' );
jQuery('#customize-control-shopline_h6_font_size_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_font_size_mb' ).css('display','block' );        
jQuery('#customize-control-shopline_h6_line_height' ).css('display','none' );
jQuery('#customize-control-shopline_h6_line_height_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_line_height_mb' ).css('display','block' );
jQuery('#customize-control-shopline_h6_letter_spacing' ).css('display','none' );
jQuery('#customize-control-shopline_h6_letter_spacing_tb' ).css('display','none' );
jQuery('#customize-control-shopline_h6_letter_spacing_mb' ).css('display','block' ); 

}
});

});