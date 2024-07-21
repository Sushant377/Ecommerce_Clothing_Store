/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ){
/**
 * Dynamic Internal/Embedded Style for a Control
 */
function big_store_add_dynamic_css( control, style ){
      control = control.replace( '[', '-' );
      control = control.replace( ']', '' );
      jQuery( 'style#' + control ).remove();

      jQuery( 'head' ).append(
            '<style id="' + control + '">' + style + '</style>'
      );
}
/**
 * Responsive Spacing CSS
 */
function big_store_responsive_spacing( control, selector, type, side ){
	wp.customize( control, function( value ){
		value.bind( function( value ){
			var sidesString = "";
			var spacingType = "padding";
			if ( value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left ) {
				if ( typeof side != undefined ) {
					sidesString = side + "";
					sidesString = sidesString.replace(/,/g , "-");
				}
				if ( typeof type != undefined ) {
					spacingType = type + "";
				}
				// Remove <style> first!
				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();

				var desktopPadding = '',
					tabletPadding = '',
					mobilePadding = '';

				var paddingSide = ( typeof side != undefined ) ? side : [ 'top','bottom','right','left' ];

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['desktop'][sideValue] ) {
						desktopPadding += spacingType + '-' + sideValue +': ' + value['desktop'][sideValue] + value['desktop-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['tablet'][sideValue] ) {
						tabletPadding += spacingType + '-' + sideValue +': ' + value['tablet'][sideValue] + value['tablet-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['mobile'][sideValue] ) {
						mobilePadding += spacingType + '-' + sideValue +': ' + value['mobile'][sideValue] + value['mobile-unit'] +';';
					}
				});

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
					+ selector + '	{ ' + desktopPadding +' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + tabletPadding + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
					+ '</style>'
				);

			} else {
				wp.customize.preview.send( 'refresh' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();
			}

		} );
	} );
}
/**
 * Apply CSS for the element
 */
function big_store_css( control, css_property, selector, unit ){

	wp.customize( control, function( value ) {
		value.bind( function( new_value ) {

			// Remove <style> first!
			control = control.replace( '[', '-' );
			control = control.replace( ']', '' );

			if ( new_value ){
				/**
				 *	If ( unit == 'url' ) then = url('{VALUE}')
				 *	If ( unit == 'px' ) then = {VALUE}px
				 *	If ( unit == 'em' ) then = {VALUE}em
				 *	If ( unit == 'rem' ) then = {VALUE}rem.
				 */
				if ( 'undefined' != typeof unit) {
					if ( 'url' === unit ) {
						new_value = 'url(' + new_value + ')';
					} else {
						new_value = new_value + unit;
					}
				}

				// Remove old.
				jQuery( 'style#' + control ).remove();

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + css_property + ': ' + new_value + ' }'
					+ '</style>'
				);

			} else {

				wp.customize.preview.send( 'refresh' );

				// Remove old.
				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}
/*******************************/
// Range slider live customizer
/*******************************/
function bigStoreGetCss( arraySizes, settings, to ) {
    'use strict';
    var data, desktopVal, tabletVal, mobileVal,
        className = settings.styleClass, i = 1;

    var val = JSON.parse( to );
    if ( typeof( val ) === 'object' && val !== null ) {
        if ('desktop' in val) {
            desktopVal = val.desktop;
        }
        if ('tablet' in val) {
            tabletVal = val.tablet;
        }
        if ('mobile' in val) {
            mobileVal = val.mobile;
        }
    }

    for ( var key in arraySizes ) {
        // skip loop if the property is from prototype
        if ( ! arraySizes.hasOwnProperty( key )) {
            continue;
        }
        var obj = arraySizes[key];
        var limit = 0;
        var correlation = [1,1,1];
        if ( typeof( val ) === 'object' && val !== null ) {

            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }

            data = {
                desktop: ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0]) > limit ? ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0] ) : limit,
                tablet: ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) > limit ? ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) : limit,
                mobile: ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) > limit ? ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) : limit
            };
        } else {
            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }
            data =( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] > limit ? ( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] : limit;
        }
        settings.styleClass = className + '-' + i;
        settings.selectors  = obj.selectors;

        bigStoreSetCss( settings, data );
        i++;
    }
}
function bigStoreSetCss( settings, to ){
    'use strict';
    var result     = '';
    var styleClass = jQuery( '.' + settings.styleClass );
    if ( to !== null && typeof to === 'object' ){
        jQuery.each(
            to, function ( key, value ) {
                var style_to_add;
                if ( settings.selectors === '.container' ){
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
                } else {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
                }
                switch ( key ) {
                    case 'desktop':
                        result += style_to_add;
                        break;
                    case 'tablet':
                        result += '@media (max-width: 767px){' + style_to_add + '}';
                        break;
                    case 'mobile':
                        result += '@media (max-width: 544px){' + style_to_add + '}';
                        break;
                }
            }
        );
        if ( styleClass.length > 0 ) {
            styleClass.text( result );
        } else {
            jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
        }
    } else {
        jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
    }
}
//*****************************/
// Logo
//*****************************/
wp.customize(
    'big_store_logo_width', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'max-width',
                    propertyUnit: 'px',
                    styleClass: 'open-logo-width'
                };

                var arraySizes = {
                    size3: { selectors:'.thunk-logo img,.sticky-header .logo-content img', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
//top header
wp.customize('big_store_col1_texthtml', function(value){
         value.bind(function(to){
             $('.top-header-col1 .content-html').text(to);
         });
     });
 wp.customize('big_store_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col2 .content-html').text(to);
         });
     });
 wp.customize('big_store_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col3 .content-html').text(to);
         });
     });
big_store_css( 'big_store_above_brdr_clr','border-bottom-color', '.top-header,body.big-store-dark .top-header');
wp.customize(
    'big_store_abv_hdr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-header .top-header-bar', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'big_store_abv_hdr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-header', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
/***************/
// MAIN HEADER
/***************/
wp.customize('big_store_main_hdr_btn_txt', function(value){
         value.bind(function(to){
             $('.btn-main-header').text(to);
         });
});
wp.customize('big_store_main_hdr_calto_txt', function(value){
         value.bind(function(to){
             $('.sprt-tel b').text(to);
         });
});
wp.customize('big_store_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});
wp.customize('big_store_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});

wp.customize('big_store_main_hdr_cat_txt', function(value){
         value.bind(function(to){
             $('.toggle-cat-wrap .toggle-title').text(to);
         });
});
//cat slider heading
wp.customize('big_store_cat_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-category-slide-section .thunk-title .title').text(to);
         });
     });
//product slide
wp.customize('big_store_product_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-slide-section .thunk-title .title').text(to);
         });
     });
//product list
wp.customize('big_store_product_list_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-list-section .thunk-title .title').text(to);
         });
     });
//product cat tab 
wp.customize('big_store_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-section .thunk-title .title').text(to);
         });
     });
//product cat tab list
wp.customize('big_store_list_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-list-section .thunk-title .title').text(to);
         });
     });
//Highlight 
wp.customize('big_store_hglgt_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-highlight-section .thunk-title .title').text(to);
         });
     });
//Big Featured
wp.customize('big_store_product_img_sec_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-image-tab-section .thunk-title .title').text(to);
         });
     });
//Ribbon Text
wp.customize('big_store_ribbon_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content h3').text(to);
         });
     });
wp.customize('big_store_ribbon_btn_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content a.ribbon-btn').text(to);
         });
     });
//Custom section One
wp.customize('big_store_custom_1_heading', function(value){
         value.bind(function(to) {
             $('.thunk-custom-one-section .thunk-title .title').text(to);
         });
     });
//Custom section two
wp.customize('big_store_custom_2_heading', function(value){
         value.bind(function(to) {
             $('.thunk-custom-two-section .thunk-title .title').text(to);
         });
     });
//Custom section three
wp.customize('big_store_custom_3_heading', function(value){
         value.bind(function(to) {
             $('.thunk-custom-three-section .thunk-title .title').text(to);
         });
     });
//Custom section four
wp.customize('big_store_custom_4_heading', function(value){
         value.bind(function(to){
             $('.thunk-custom-four-section .thunk-title .title').text(to);
         });
     });
// slider
wp.customize('big_store_lay3_heading_txt', function(value){
         value.bind(function(to){
             $('.slider-cat-title a').text(to);
         });
     });

// blog
wp.customize('big_store_blog_read_more_txt', function(value){
         value.bind(function(to){
             $('a.thunk-readmore.button ').text(to);
         });
     });

//tooltip option
//big_store_css('big_store_add_to_cart_tooltip_txt','background', '.tooltip-show-with-title');
wp.customize('big_store_add_to_cart_tooltip_txt', function(value){
         value.bind(function(to){
             $('.tooltip-show-with-title ').text(to);
         });
     });

/****************/
// footer
/****************/
wp.customize('big_store_footer_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('big_store_above_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('big_store_above_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col3 .content-html').text(to);
         });
     });
big_store_css( 'big_store_above_frt_brdr_clr','border-bottom-color', 'body.big-store-dark .top-footer,.top-footer');
wp.customize(
    'big_store_above_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer .top-footer-bar', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'big_store_abv_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);

 wp.customize('big_store_footer_bottom_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('big_store_bottom_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('big_store_bottom_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col3 .content-html').text(to);
         });
     });
big_store_css( 'big_store_bottom_frt_brdr_clr','border-top-color', '.below-footer,body.big-store-dark .below-footer');
wp.customize(
    'big_store_btm_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer .below-footer-bar', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'big_store_btm_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-top-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
// loader
big_store_css( 'big_store_loader_bg_clr','background-color','.big_store_overlayloader');
//*****************************/
// Global Color Custom Style
//*****************************/
wp.customize( 'big_store_theme_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                 dynamicStyle += 'a:hover, .big-store-menu li a:hover, .big-store-menu .current-menu-item a,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,.header-icon a:hover,.thunk-related-links .nav-links a:hover,.woocommerce .thunk-list-view ul.products li.product.thunk-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,article.thunk-post-article .thunk-readmore.button,.thunk-wishlist a:hover, .thunk-compare a:hover,.woocommerce .thunk-product-hover a.th-button,.woocommerce ul.cart_list li .woocommerce-Price-amount, .woocommerce ul.product_list_widget li .woocommerce-Price-amount,.big-store-load-more button,.page-contact .leadform-show-form label,.thunk-contact-col .fa,.summary .yith-wcwl-wishlistaddedbrowse a, .summary .yith-wcwl-wishlistexistsbrowse a,.thunk-title .title:before,.thunk-hglt-icon,.woocommerce .thunk-product-content .star-rating,.thunk-product-cat-list.slider a:hover, .thunk-product-cat-list li a:hover,.site-title span a:hover,.header-support-icon a:hover span,.cart-icon a span:hover,.header-support-content i,.slider-cat-title a:before{ color: ' + cssval + '} ';
                 dynamicStyle += '.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.cat-list a:after,.tagcloud a:hover, .thunk-tags-wrapper a:hover,.ribbon-btn,.btn-main-header,.page-contact .leadform-show-form input[type="submit"],.woocommerce .widget_price_filter .big-store-widget-content .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .big-store-widget-content .ui-slider .ui-slider-handle,.entry-content form.post-password-form input[type="submit"],#bigstore-mobile-bar a,#bigstore-mobile-bar,.post-slide-widget .owl-carousel .owl-nav button:hover,.woocommerce div.product form.cart .button,#search-button,#search-button:hover,.cart-contents .count-item, .woocommerce ul.products li.product .button,.slide-layout-1 .slider-content-caption a.slide-btn,.slider-content-caption a.slide-btn,.page-template-frontpage .owl-carousel button.owl-dot, .woocommerce #alm-quick-view-modal .alm-qv-image-slider .flex-control-paging li a,.button.return.wc-backward,.button.return.wc-backward:hover,.woocommerce .thunk-product-hover a.add_to_cart_button:hover,.woocommerce .thunk-product-hover .thunk-wishlist a.add_to_wishlist:hover,.thunk-wishlist .yith-wcwl-wishlistaddedbrowse:hover,.thunk-wishlist .yith-wcwl-wishlistexistsbrowse:hover,.thunk-quickview a:hover, .thunk-compare .compare-button a.compare.button:hover,.thunk-woo-product-list .thunk-quickview a:hover,.thunk-heading-wrap:before{ background: ' + cssval + '} ';
                 dynamicStyle += '.open-cart p.buttons a:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .big-store-slide-post .owl-nav button.owl-prev:hover, .big-store-slide-post .owl-nav button.owl-next:hover,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type="submit"]:hover,article.thunk-post-article .thunk-readmore.button:hover,.big-store-load-more button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,.woocommerce .thunk-product-image-cat-slide .thunk-woo-product-list:hover .thunk-product{border-color: ' + cssval + '} ';
                big_store_add_dynamic_css( 'big_store_theme_clr', dynamicStyle );

        } );
    } );

big_store_css( 'big_store_text_clr','color','body,.woocommerce-error, .woocommerce-info, .woocommerce-message');
big_store_css( 'big_store_title_clr','color','.site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a');
big_store_css( 'big_store_link_clr','color','a,#open-above-menu.big-store-menu > li > a');
big_store_css( 'big_store_link_hvr_clr','color','a:hover,#open-above-menu.big-store-menu > li > a:hover,#open-above-menu.big-store-menu li a:hover');

//Above Header
big_store_css( 'big_store_above_hd_bg_clr','background', '.top-header:before,body.big-store-dark .top-header:before');
// above header bg image
wp.customize('header_image', function (value){
    value.bind(function (to){
        $('.top-header').css('background-image', 'url( '+ to +')');
    });
});
// above header content
big_store_css( 'big_store_abv_content_txt_clr','color', '.top-header .top-header-bar,body.big-store-dark .top-header .top-header-bar');
big_store_css( 'big_store_abv_content_link_clr','color', '.top-header .top-header-bar a,body.big-store-dark .top-header .top-header-bar a');
big_store_css( 'big_store_abv_content_link_hvr_clr','color', '.top-header .top-header-bar a:hover,body.big-store-dark .top-header .top-header-bar a:hover');
// main header
big_store_css( 'big_store_main_hd_bg_clr','background', '.main-header:before,.sticky-header:before, .search-wrapper:before');
big_store_css( 'big_store_main_content_txt_clr','color', '.site-description,main-header-col1,.header-support-content,.mhdrthree .site-description p');
big_store_css( 'big_store_main_content_link_clr','color', '.mhdrthree .site-title span a,.header-support-content a, .thunk-icon .count-item,.main-header a,.thunk-icon .cart-icon a.cart-contents,.sticky-header .site-title a');
//Below Header Color Option
big_store_css( 'big_store_below_hd_bg_clr','background', '.below-header:before');
big_store_css( 'big_store_category_text_clr','color', '.menu-category-list .toggle-title,.toggle-icon');
big_store_css( 'big_store_category_icon_clr','background', '.below-header .cat-icon span');
//header icon
big_store_css( 'big_store_sq_icon_bg_clr','background', '.header-icon a ,.header-support-icon a.whishlist ,.thunk-icon .cart-icon a.cart-contents i,.cat-icon,.sticky-header .header-icon a , .sticky-header .thunk-icon .cart-icon a.cart-contents,.responsive-main-header .header-support-icon a,.responsive-main-header .thunk-icon .cart-icon a.cart-contents,.responsive-main-header .menu-toggle .menu-btn,.sticky-header-bar .menu-toggle .menu-btn,.header-icon a.account,.header-icon a.prd-search,.thunk-icon .taiowc-icon, .thunk-icon .taiowc-cart-item,.thunk-icon .taiowcp-icon, .thunk-icon .taiowcp-cart-item,.header-icon a, .sticky-header-col3 .header-icon a, .sticky-header-col3 .header-icon a.prd-search-icon > .tapsp-search-box > .th-icon, .sticky-header-col3 .header-icon a.prd-search-icon > .thaps-search-box > .th-icon,.header-icon a.prd-search-icon > .tapsp-search-box > .th-icon');
wp.customize( 'big_store_sq_icon_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                 dynamicStyle += '.header-icon a ,.header-support-icon a.whishlist ,.header-support-icon a.whishlist i,.thunk-icon .cart-icon a.cart-contents i,.cat-icon,.sticky-header .header-icon a , .sticky-header .thunk-icon .cart-icon a.cart-contents,.responsive-main-header .header-support-icon a,.responsive-main-header .thunk-icon .cart-icon a.cart-contents,.responsive-main-header .menu-toggle .menu-btn,.sticky-header-bar .menu-toggle .menu-btn,.header-icon a.account,.header-icon a.prd-search,.header-support-icon a.compare i, .header-support-icon a.wishlist i, .header-icon a.account, .thunk-icon .taiowc-content .taiowc-total,.thunk-icon .taiowcp-content .taiowcp-total,.thunk-icon .taiowc-content .taiowc-total,.header-icon a, .sticky-header-col3 .header-icon a, .sticky-header-col3 .header-icon a.prd-search-icon > .tapsp-search-box > .th-icon, .sticky-header-col3 .header-icon a.prd-search-icon > .thaps-search-box > .th-icon,.thunk-icon .taiowcp-icon ,.header-support-icon .taiowcp-icon .th-icon, .header-support-icon .taiowc-icon .th-icon, .sticky-header-col3 .taiowcp-icon .th-icon, .sticky-header-col3 .taiowc-icon .th-icon, .taiowcp-content .taiowcp-total, .taiowc-content .taiowcp-total,.header-support-icon a.whishlist span, .header-support-icon a.compare span,.header-icon a.prd-search-icon > .tapsp-search-box > .th-icon{ color: ' + cssval + '!important} ';
                 dynamicStyle += '.cat-icon span{ background: ' + cssval + '} ';
                 dynamicStyle += '.thunk-icon .taiowc-icon svg{fill: ' + cssval + '} ';
                big_store_add_dynamic_css( 'big_store_sq_icon_clr', dynamicStyle );

        } );
    } );

//menu
big_store_css( 'big_store_menu_link_clr','color', '.big-store-menu > li > a,.menu-category-list .toggle-title,.toggle-icon');
big_store_css( 'big_store_menu_link_hvr_clr','color', '.big-store-menu > li > a:hover');
big_store_css( 'big_store_sub_menu_bg_clr','background-color', '.big-store-menu ul.sub-menu');
big_store_css( 'big_store_sub_menu_lnk_clr','color', '.big-store-menu li ul.sub-menu li a');
big_store_css( 'big_store_sub_menu_lnk_hvr_clr','color', '.big-store-menu li ul.sub-menu li a:hover');
//move to top
big_store_css( 'big_store_move_to_top_bg_clr','background', '#move-to-top');
big_store_css( 'big_store_move_to_top_icon_clr','color', '#move-to-top');

//tooltip option
big_store_css( 'big_store_tooltip_bg_clr','background-color', 'div.tooltip-show-with-title');
big_store_css( 'big_store_tooltip_bg_clr','fill', '.tooltip-show-with-title .pointer_');
big_store_css( 'big_store_tooltip_text_clr','color', 'div.tooltip-show-with-title');


//Slider Bg
big_store_css('big_store_lay3_bg_img_ovrly','background', '.thunk-slider-section.slide-layout-3:before');
wp.customize('big_store_lay3_bg_background_image_url', function (value){
value.bind(function (to){
    $('.thunk-slider-section.slide-layout-3').css('background-image', 'url( '+ to +')');
    });
});
big_store_css( 'big_store_lay3_bg_background_repeat','background-repeat', '.thunk-slider-section.slide-layout-3');
big_store_css( 'big_store_lay3_bg_header_background_position','background-position', '.thunk-slider-section.slide-layout-3');
big_store_css( 'big_store_lay3_bg_header_background_size','background-size', '.thunk-slider-section.slide-layout-3');
big_store_css( 'big_store_lay3_bg_header_background_attach','background-attachment', '.thunk-slider-section.slide-layout-3');
})( jQuery );