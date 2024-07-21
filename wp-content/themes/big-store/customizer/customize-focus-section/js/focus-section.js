/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($){
    $.bigStore = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'big_store_top_slider_section',
                'big_store_category_tab_section',
                'big_store_product_slide_section',
                'big_store_cat_slide_section',
                'big_store_product_slide_list',
                'big_store_product_cat_list',
                'big_store_brand',
                'big_store_ribbon',
                'big_store_banner',
                'big_store_highlight',
                'big_store_product_tab_image',
                'big_store_product_big_feature',
                'big_store_1_custom_sec',
                'big_store_2_custom_sec',
                'big_store_3_custom_sec',
                'big_store_4_custom_sec',
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'big-store-customize-focus-section', element );
                });
            });
        }
    };
    $.bigStore.init();
    // color
    $.bigStoreColor = {
        init: function () {
            this.focusForCustomShortcutColor();
        },
        focusForCustomShortcutColor: function (){
            var fakeShortcutClasses = [
                'big-store-top-slider-color',
                'big-store-product-cat-slide-tab-color',
                'big-store-cat-slider-color',
                'big-store-product-slider-color',
                'big-store-product-list-slide-color',
                'big-store-product-list-tab-slide-color',
                'big-store-ribbon-color',
                'big-store-highlight-color',
                'big-store-banner-color',
                'big-store-brand-color',
                'big-store-tabimgprd-color',
                'big-store-big-featured-color',
                'big-store-custom-one-color',
                'big-store-custom-two-color',
                'big-store-custom-three-color',
                'big-store-custom-four-color',
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'big-store-customize-focus-color-section', element );
                });
            });
        }
    };
    $.bigStoreColor.init();
});