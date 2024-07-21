<?php
if (!defined('ABSPATH')) exit;
// ubl post callback function
if (!function_exists('unlimited_blocks_product_one')) {
    function unlimited_blocks_product_one($attr)
    {
        // echo "<pre>"; 
        // print_r($attr);
        // echo "</pre>";
        if (!class_exists('WooCommerce')) {
            return '<p>' . __('Active Woocommerce Plugin.', 'unlimited-blocks') . ' </p>';
        }
        $postClass = new Th_Simple_Product();
        $cate = [];
        $options = [];
        if (isset($attr['numberOfPosts'])) {
            $options['number_of_product'] = $attr['numberOfPosts'];
        }
        if (isset($attr['product_show_by'])) {
            $options['product_show_by'] = $attr['product_show_by'];
        }
        if (isset($attr['sliderSettings']['numberOfColumn'])) {
            $options['number_of_column_slide'] = $attr['sliderSettings']['numberOfColumn'];
        }
        $options['number_of_column_slide_mobile'] = 1;
        $options['number_of_column_slide_tablet'] = 2;
        if (isset($attr['loop']) && $attr['loop'] == '1') {
            $options['slider_loop'] = 1;
        }
        $options['add_to_cart_text'] = __("Add To Cart", 'unlimited-blocks');
        $options['add_to_cart_icon_on'] = 'on';
        $options['autoPlaySpeed'] = 3;
        $options['slider_controll'] = isset($attr['sliderSettings']['slider_controll']) ? $attr['sliderSettings']['slider_controll'] : '';
        $options['slide_spacing'] = $attr['sliderSettings']['margin'];
        $options['number_of_row'] = $attr['sliderSettings']['numberOfrow'];

        if (isset($attr['product_cate']) && !empty($attr['product_cate'])) {
            $cate = $attr['product_cate'];
        }
        $postalign   = isset($attr['align']) ? $attr["align"] : '';
        // options 

        // $options['add_to_cart_hide_show'] =  $attr['addToCart']['enable'];
        // options 
        $products_ = $postClass->simple_product_slider($cate, $options);


        $addStyles = [];
        $WrapperID = '.' . $attr['wrapper_id'];
        // box style 
        // bgColor,borderStyle,borderWidth,borderColor,borderRadius,boxShadowColor,boxShadowColorHover
       // box style color
       $boxbgColor = isset($attr['boxStyle']['bgColor']) ? $attr['boxStyle']['bgColor'] : null;
       $boxborderColor = isset($attr['boxStyle']['borderColor']) ? $attr['boxStyle']['borderColor'] : null;
       $boxboxShadowColor = isset($attr['boxStyle']['boxShadowColor']) ? $attr['boxStyle']['boxShadowColor'] : null;
       $boxboxShadowColorHover = isset($attr['boxStyle']['boxShadowColorHover']) ? $attr['boxStyle']['boxShadowColorHover'] : null;

        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-wrap," .
                "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-bottom",
            'css' => "background-color:{$boxbgColor};border-style:{$attr['boxStyle']['borderStyle']};border-color:{$boxborderColor};border-radius:{$attr['boxStyle']['borderRadius']};color:{$boxboxShadowColor};border-width:{$attr['boxStyle']['borderWidth']};"
        ];
        
        $addStyles[] = [
            'selector' => "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-bottom:before",
            'css' => "background-color:{$boxbgColor};"
        ];

        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-wrap:hover,{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-bottom:hover",
            'css' => "color:{$boxboxShadowColorHover};"
        ];
        // box style 
        // add to cart style


        $addtoCartSelector = "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-add-to-cart-btn";
        
        if ($attr['addToCart']['enable']) {

            $addToCartborderColor = isset($attr['addToCart']['borderColor']) ? $attr['addToCart']['borderColor'] : null;
            $addToCartColor = isset($attr['addToCart']['Color']) ? $attr['addToCart']['Color'] : null;
            $addToCartbgColor = isset($attr['addToCart']['bgColor']) ? $attr['addToCart']['bgColor'] : null;
            $addToCartColorHover = isset($attr['addToCart']['ColorHover']) ? $attr['addToCart']['ColorHover'] : null;
            $addToCartbgColorHover = isset($attr['addToCart']['bgColorHover']) ? $attr['addToCart']['bgColorHover'] : null;
            $addStyles[] = [
                'selector' =>  "{$addtoCartSelector}",
                'css' => "border-width:{$attr['addToCart']['borderWidth']};border-style:{$attr['addToCart']['borderStyle']};border-color:{$addToCartborderColor};border-radius:{$attr['addToCart']['borderRadius']};color:{$addToCartColor};background-color:{$addToCartbgColor};width:{$attr['addToCart']['paddingH']}px;height:{$attr['addToCart']['paddingV']}px;"
            ];

            $addStyles[] = [
                'selector' =>  "{$addtoCartSelector}:hover",
                'css' => "color:{$addToCartColorHover};background-color:{$addToCartbgColorHover};"
            ];
        } else {
            $addStyles[] = [
                'selector' =>  "{$addtoCartSelector}",
                'css' => "display:none!important;"
            ];
        }

        // add to cart style
        // title style
        $titleSelector = "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-product-title";
        
        $productTitleColor = isset($attr['productTitle']['color']) ? $attr['productTitle']['color'] : null;
        $productTitleHoverColor = isset($attr['productTitle']['colorHover']) ? $attr['productTitle']['colorHover'] : null;

        $addStyles[] = [
            'selector' =>  "{$titleSelector}",
            'css' => "color:{$productTitleColor};font-size:{$attr['productTitle']['fontSize']}px;"
        ];

        $addStyles[] = [
            'selector' =>  "{$titleSelector}:hover",
            'css' => "color:{  $productTitleHoverColor};"
        ];

        // title style
        // rating style

        $ratingStyleColor = isset($attr['ratingStyle']['color']) ? $attr['ratingStyle']['color'] : null;
        $ratingStylebgColor = isset($attr['ratingStyle']['bgColor']) ? $attr['ratingStyle']['bgColor'] : null;
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-rating .star-rating",
            'css' => "font-size:{$attr['ratingStyle']['fontSize']}px;color:{$ratingStyleColor};"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-rating .star-rating:before",
            'css' => "color:{$ratingStylebgColor};"
        ];

        // rating style
        // price style
        $priceStyleColor = isset($attr['priceStyle']['color']) ? $attr['priceStyle']['color'] : null;
        $priceStylediscountColor = isset($attr['priceStyle']['discountColor']) ? $attr['priceStyle']['discountColor'] : null;

        $priceStyleSelector = "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-price";
       
        $addStyles[] = [
            'selector' =>  "{$priceStyleSelector}",
            'css' => "font-size:{$attr['priceStyle']['fontSize']}px;color:{$priceStyleColor};"
        ];
        $addStyles[] = [
            'selector' =>  "{$priceStyleSelector}  del",
            'css' => "color:{$priceStylediscountColor};"
        ];
    
        // sale text style
         
        // sale color
        $saleColor = isset($attr['saleStyle']['color']) ? $attr['saleStyle']['color'] : null;
        $salebgColor = isset($attr['saleStyle']['bgColor']) ?$attr['saleStyle']['bgColor'] : null;

        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-sale span",
            'css' => "font-size:{$attr['saleStyle']['fontSize']}px; 
                      color:{$saleColor};
                      background-color:{$salebgColor};
                    "
        ];

        if ($attr['sliderSettings']['numberOfrow'] == "2") {
            $addStyles[] = [
                'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap + .elemento-product-outer-wrap",
                'css' => "margin-top:calc({$attr['sliderSettings']['margin']}px + 12px);"
            ];
        }

        $buttonsStyleColor = isset($attr['buttonsStyle']['color']) ? $attr['buttonsStyle']['color'] : null;
        $buttonsStyleHoverColor = isset($attr['buttonsStyle']['colorHover']) ? $attr['buttonsStyle']['colorHover']: null;

        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button.woosw-btn:before,{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button.woosw-btn:after,{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button",
            'css' => "font-size:{$attr['buttonsStyle']['fontSize']}px;"
        ];
        $addStyles[] = [
            'selector' => "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button",
            'css' => "color:{$buttonsStyleColor};"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button:hover",
            'css' => "color:{$buttonsStyleHoverColor};"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .th-product-compare-btn.button:hover",
            'css' => "background:none;"
        ];

        $addStyles[] = [
            'selector' =>  "{$WrapperID} .ea-simple-product-slider .owl-carousel .owl-nav button,{$WrapperID} .ea-simple-product-slider .owl-carousel .owl-nav button:hover",
            'css' => "background:{$buttonsStyleColor};"
        ];

        $addStyles[] = [
            'selector' =>  "{$WrapperID} .ea-simple-product-slider .owl-carousel .owl-dots",
            'css' => "visibility: hidden;"
        ];


        // price style
        $filteredAddStyles = array_filter($addStyles, function($value) {
            return isset($value['selector']) && isset($value['css']);
        });
          
        $styleAdd = wp_json_encode($filteredAddStyles);

        if ($products_) {
            return sprintf("<div ubl-block-style='%s' class='ul-blocks-simple-product %s wp-block-group align".$postalign."'>%s</div>", $styleAdd, $attr['wrapper_id'], $products_);
        }
        // return $products_;
        // return "<h1>product ff aadded. </h1>";
    }
}
