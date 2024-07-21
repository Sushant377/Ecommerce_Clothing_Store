jQuery(document).ready(function(){
//redirect
//above-header
jQuery( '.focus-customizer-menu-redirect-col1,.focus-customizer-menu-redirect-col2,.focus-customizer-menu-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel('nav_menus').focus();
} );
jQuery( '.focus-customizer-widget-redirect-col1,.focus-customizer-widget-redirect-col2,.focus-customizer-widget-redirect-col3,.focus-customizer-widget-redirect' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-social_media-redirect-col1,.focus-customizer-social_media-redirect-col2,.focus-customizer-social_media-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'big-store-social-icon' ).focus();
} ); 

jQuery('input[id=big_store_main_header_layout-mhdrdefault],input[id=big_store_main_header_layout-mhdrone],input[id=big_store_main_header_layout-mhdrtwo]').attr("disabled",true);
jQuery('input[id=big_store_top_slide_layout-slide-layout-4],input[id=big_store_top_slide_layout-slide-layout-2]').attr("disabled",true);
jQuery('input[id=big_store_cat_slide_layout-cat-layout-2],input[id=big_store_cat_slide_layout-cat-layout-3]').attr("disabled",true);
jQuery('input[id=big_store_banner_layout-bnr-four],input[id=big_store_banner_layout-bnr-three],input[id=big_store_banner_layout-bnr-five],input[id=big_store_banner_layout-bnr-six]').attr("disabled",true);
jQuery('input[id=big_store_bottom_footer_widget_layout-ft-wgt-one],input[id=big_store_bottom_footer_widget_layout-ft-wgt-two],input[id=big_store_bottom_footer_widget_layout-ft-wgt-three],input[id=big_store_bottom_footer_widget_layout-ft-wgt-five],input[id=big_store_bottom_footer_widget_layout-ft-wgt-six],input[id=big_store_bottom_footer_widget_layout-ft-wgt-seven],input[id=big_store_bottom_footer_widget_layout-ft-wgt-eight]').attr("disabled",true);
jQuery('input[id=big_store_bottom_footer_layout-ft-btm-two],input[id=big_store_bottom_footer_layout-ft-btm-three]').attr("disabled",true);
jQuery('#_customize-input-big_store_pagination option[value="click"],#_customize-input-big_store_pagination option[value="scroll"],#_customize-input-big_store_blog_post_pagination option[value="scroll"],#_customize-input-big_store_blog_post_pagination option[value="click"],#_customize-input-big_store_woo_product_animation option[value="swap"],#_customize-input-big_store_woo_product_animation option[value="slide"]').attr("disabled", true);
jQuery('#_customize-input-big_store_bottom_footer_col1_set option[value="none"],#_customize-input-big_store_bottom_footer_col1_set option[value="menu"],#_customize-input-big_store_bottom_footer_col1_set option[value="widget"],#_customize-input-big_store_bottom_footer_col1_set option[value="social"]').attr("disabled", true);

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
        placeholder: "ui-sortable-placeholder", 
        cursor: 'move',
        opacity: 0.65,
        stop: function ( event, ui){
        var data = jQuery(this).sortable('toArray');
            //  console.log(data); // This should print array of IDs, but returns empty string/array      
            jQuery( this ).parents( '.customize-control').find( 'input[type="hidden"]' ).val( data ).trigger( 'change' );
        }
    });


 //hide show option
 wp.customize('big_store_top_slide_layout', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slide-layout-1'){
            jQuery( '.customizer-repeater-logo-image-control' ).css('display','block' ); 
            }else{
             jQuery( '.customizer-repeater-logo-image-control' ).css('display','none' );     
            }
        } );
        if(filter_type()=='slide-layout-1'){
              jQuery( '.customizer-repeater-logo-image-control' ).css('display','block' );
                
            }  else{
             jQuery( '.customizer-repeater-logo-image-control' ).css('display','none' );     
            }

    } );     

});