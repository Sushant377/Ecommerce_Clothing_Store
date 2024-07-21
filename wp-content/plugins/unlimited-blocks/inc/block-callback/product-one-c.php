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
        // options 
        // options 
        $products_ = $postClass->simple_product_slider($cate, $options);


        $addStyles = [];
        $WrapperID = '.' . $attr['wrapper_id'];
        // box style 
        // bgColor,borderStyle,borderWidth,borderColor,borderRadius,boxShadowColor,boxShadowColorHover
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-wrap," .
                "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-bottom",
            'css' => "background-color:{$attr['boxStyle']['bgColor']};border-style:{$attr['boxStyle']['borderStyle']};border-color:{$attr['boxStyle']['borderColor']};border-radius:{$attr['boxStyle']['borderRadius']};color:{$attr['boxStyle']['boxShadowColor']};border-width:{$attr['boxStyle']['borderWidth']};"
        ];
        $addStyles[] = [
            'selector' => "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-bottom:before",
            'css' => "background-color:{$attr['boxStyle']['bgColor']};"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-wrap:hover,{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-product-simple-inner-bottom:hover",
            'css' => "color:{$attr['boxStyle']['boxShadowColorHover']};"
        ];
        // box style 
        // add to cart style
        $addtoCartSelector = "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-add-to-cart-btn";
        $addStyles[] = [
            'selector' =>  "{$addtoCartSelector}",
            'css' => "border-width:{$attr['addToCart']['borderWidth']};border-style:{$attr['addToCart']['borderStyle']};border-color:{$attr['addToCart']['borderColor']};border-radius:{$attr['addToCart']['borderRadius']};color:{$attr['addToCart']['Color']};background-color:{$attr['addToCart']['bgColor']};padding:{$attr['addToCart']['paddingV']}px {$attr['addToCart']['paddingH']}px {$attr['addToCart']['paddingV']}px {$attr['addToCart']['paddingH']}px;"
        ];

        $addStyles[] = [
            'selector' =>  "{$addtoCartSelector}:hover",
            'css' => "color:{$attr['addToCart']['ColorHover']};background-color:{$attr['addToCart']['bgColorHover']};"
        ];

        // add to cart style
        // title style
        $titleSelector = "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-product-title";
        $addStyles[] = [
            'selector' =>  "{$titleSelector}",
            'css' => "color:{$attr['productTitle']['color']};font-size:{$attr['productTitle']['fontSize']}px;"
        ];
        $addStyles[] = [
            'selector' =>  "{$titleSelector}:hover",
            'css' => "color:{$attr['productTitle']['colorHover']};"
        ];
        // title style
        // rating style
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-rating .star-rating",
            'css' => "font-size:{$attr['ratingStyle']['fontSize']}px;color:{$attr['ratingStyle']['color']};"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-rating .star-rating:before",
            'css' => "color:{$attr['ratingStyle']['bgColor']};"
        ];
        // rating style
        // price style
        $priceStyleSelector = "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-price";
        $addStyles[] = [
            'selector' =>  "{$priceStyleSelector}",
            'css' => "font-size:{$attr['priceStyle']['fontSize']}px;color:{$attr['priceStyle']['color']};"
        ];
        $addStyles[] = [
            'selector' =>  "{$priceStyleSelector}  del",
            'css' => "color:{$attr['priceStyle']['discountColor']};"
        ];
        // $addStyles[] = [
        //     'selector' =>  "{$priceStyleSelector} del",
        //     'css' => "color:{$attr['priceStyle']['discountColor']};"
        // ];
        // sale text style
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .elemento-addons-sale span",
            'css' => "font-size:{$attr['saleStyle']['fontSize']}px; color:{$attr['saleStyle']['color']}; background-color:{$attr['saleStyle']['bgColor']};"
        ];

        if ($attr['sliderSettings']['numberOfrow'] == "2") {
            $addStyles[] = [
                'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap + .elemento-product-outer-wrap",
                'css' => "margin-top:calc({$attr['sliderSettings']['margin']}px + 12px);"
            ];
        }
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button.woosw-btn:before,{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button.woosw-btn:after,{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button",
            'css' => "font-size:{$attr['buttonsStyle']['fontSize']}px;"
        ];
        $addStyles[] = [
            'selector' => "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button",
            'css' => "color:{$attr['buttonsStyle']['color']};"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button:hover",
            'css' => "color:{$attr['buttonsStyle']['colorHover']};"
        ];

        // echo "<pre>";
        // // echo "<h1>hello</h1>";
        // print_r($addStyles);
        // echo "{$WrapperID}.ul-blocks-simple-product .elemento-product-outer-wrap .buttons_ button";
        // echo "<br>";
        // echo $attr['buttonsStyle']['color'];
        // echo "</pre>";
        // return;


        // price style
        $styleAdd = wp_json_encode($addStyles);
        if ($products_) {
            return sprintf("<div ubl-block-style='%s' class='ul-blocks-simple-product %s'>%s</div>", $styleAdd, $attr['wrapper_id'], $products_);
        }
        // return $products_;
        // return "<h1>product ff aadded. </h1>";
    }
}
