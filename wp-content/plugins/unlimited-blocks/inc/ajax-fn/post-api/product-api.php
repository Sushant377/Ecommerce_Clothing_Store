<?php

/**
 * for porduct ------------------- ddd ------------------ woocommerce ------------------------
 */

if (!function_exists('unlimited_blocks_product_api_result')) {
    function unlimited_blocks_product_api_result(\WP_REST_Request $request)
    {

        if (!class_exists('WooCommerce')) {
            return ['plugin_no' => true, 'exist' => 1];
        }

        // $request_params  = $request->get_params();
        $request_params  = $request->get_params();
        // first time initillize
        $firstTimeInit = isset($request_params['initialize']) && intval($request_params['initialize']) ? true : false;
        // number of post 
        $numberOfPost = isset($request_params['numberOfPosts']) && intval($request_params['numberOfPosts']) ? intval($request_params['numberOfPosts']) : false;
        //post category
        $product_cate = isset($request_params['product_cate']) && $request_params['product_cate'] != '' ? sanitize_text_field($request_params['product_cate']) : false;
        //product layout
        $productlayout = isset($request_params['productlayout']) && $request_params['productlayout'] != '' ? sanitize_text_field($request_params['productlayout']) : false;

        if ($numberOfPost) {
            $sendArgument = ['posts_per_page' => $numberOfPost];
            // category filter by slug
            if ($product_cate) {
                $sendArgument['product_cat'] = $product_cate;
            }
            // // =======++++++++data retrived++++++++========
            if ($firstTimeInit) {
                return unlimited_blocks_Product_Api_firstTimeIntilize($sendArgument, $productlayout);
            } else {
                $return = unlimited_blocks_Product_Filter($sendArgument, $productlayout);
                // return $return = array_merge($return, ["param" => $request_params, 'argg' => $sendArgument, 'l' => $productlayout]);
                return $return;
            }
        }
    }
}
// first time init function 
if (!function_exists('unlimited_blocks_Product_Api_firstTimeIntilize')) {
    function unlimited_blocks_Product_Api_firstTimeIntilize($sendArgument, $productlayout)
    {
        $returnPostData = array(
            'posts' => [],
            "totalPost" => '',
            "category" => ''
        );
        // for category 
        $allCategory = get_terms(
            array(
                'taxonomy' =>  'product_cat',
                'fields'   => 'all',
                'hide_empty' => true,
            )
        );
        $returnPostData['category'] = $allCategory && !empty($allCategory) ? $allCategory : '';
        //    for post and total post 
        $args = array(
            'post_type'           => 'product',
            'meta_query' => array(
                array(
                    'key' => '_stock_status',
                    'value' => 'instock'
                ),
                array(
                    'key' => '_backorders',
                    'value' => 'no'
                ),
            )
        );
        $args = array_merge($args, $sendArgument);
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            $postClass = new Th_Simple_Product();
            $returnPostData['totalPost'] = $query->found_posts;
            $options = ['add_to_cart_text' => 'Add To Cart', 'add_to_cart_icon_on' => 'on'];
            while ($query->have_posts()) {
                $query->the_post();
                $productId = get_the_ID();
                if ($productlayout == 'simple_layout') {
                    $singlePost = $postClass->product_html1($productId, $options);
                }
                $returnPostData['posts'][] = $singlePost;
            }
        } else {
            $returnPostData['posts'] = '';
            $returnPostData['totalPost'] = '';
        }
        return $returnPostData;
    }
}



// post filter time init function
if (!function_exists('unlimited_blocks_Product_Filter')) {
    function unlimited_blocks_Product_Filter($sendArgument, $productlayout)
    {
        $args = array(
            'post_type'           => 'product',
            'meta_query' => array(
                array(
                    'key' => '_stock_status',
                    'value' => 'instock'
                ),
                array(
                    'key' => '_backorders',
                    'value' => 'no'
                ),
            )
        );
        $args = array_merge($args, $sendArgument);
        $query = new WP_Query($args);
        $returnPostData = [
            'posts' => [],
            "totalPost" => '',
        ];
        if ($query->have_posts()) {
            $postClass = new Th_Simple_Product();
            $returnPostData['totalPost'] = $query->found_posts;
            $options = ['add_to_cart_text' => 'Add To Cart', 'add_to_cart_icon_on' => 'on'];
            while ($query->have_posts()) {
                $query->the_post();
                $productId = get_the_ID();
                if ($productlayout == 'simple_layout') {
                    $singlePost = $postClass->product_html1($productId, $options);
                }
                $returnPostData['posts'][] = $singlePost;
            }
        } else {
            $returnPostData['posts'] = '';
        }
        return $returnPostData;
    }
}

/**
 * for porduct ------------------------------------- woocommerce end ------------------------
 */
class Th_Simple_Product
{
    public function simple_product_slider($cate = [], $options = [])
    {
        if (!class_exists('WooCommerce')) {
            return '<p>' . __('Active Woocommerce Plugin.', 'unlimited-blocks') . ' </p>';
        }

        if (isset($options['number_of_product'])) {
            $numOfproduct = $options['number_of_product'];
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $numOfproduct,
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    ),
                    array(
                        'key' => '_backorders',
                        'value' => 'no'
                    ),
                )
            );
            $stringCate = '';
            if (is_array($cate) && !empty($cate)) {
                $stringCate = implode(",", $cate);
                if (!in_array('all', $cate)) {
                    $args['product_cat'] = $stringCate;
                }
            }
            // random, featured, recently 
            if (isset($options['product_show_by'])) {
                if ($options['product_show_by'] == 'featured') {
                    $args['post__in'] = wc_get_featured_product_ids();
                    $args['orderby'] = 'date';
                } else if ($options['product_show_by'] == 'random') {
                    $args['orderby'] = 'rand';
                } else {
                    $args['orderby'] = 'date';
                }
            }
            $query = new WP_Query($args);
            $productHtml = '';
            $productHtml .= '<div class="ea-simple-product-slider">';
            if ($query->have_posts()) {
                $productHtml .= $this->product_slide($query, $options, $stringCate);
            }
            $productHtml .= '</div>';
            return $productHtml;
        } else {
            return '<p>No Product </p>';
        }
    }
    // slider slides 
    private function product_slide($query, $options)
    {
        // return $cate;
        // html options 
        $sliderSetting = [
            'items' => $options['number_of_column_slide'],
        ];
        // number of column mobile and tablet
        if (isset($options['number_of_column_slide_mobile'])) {
            $sliderSetting['items_mobile'] = $options['number_of_column_slide_mobile'];
        }
        if (isset($options['number_of_column_slide_tablet'])) {
            $sliderSetting['items_tablet'] = $options['number_of_column_slide_tablet'];
        }


        // slider autoplay and speed 
        if (isset($options['slider_auto_play']) && $options['slider_auto_play'] == 'on' && isset($options['autoPlaySpeed']) && intval($options['autoPlaySpeed'])) {
            $sliderSetting['autoplay'] = true;
            $sliderSetting['autoPlaySpeed'] = $options['autoPlaySpeed'];
        }
        // slider controll 
        if (isset($options['slider_controll'])) {
            $sliderSetting['slider_controll'] = $options['slider_controll'];
            if ($options['slider_controll'] == 'arr' || $options['slider_controll'] == 'ar_do') {
                $availNextPrevious = true;
            }
        }
        // slider loop 
        if (isset($options['slider_loop']) && $options['slider_loop'] == '1') {
            $sliderSetting['slider_loop'] = 1;
        }
        // slider direction 
        if (isset($options['autoPlayDirection']) && $options['autoPlayDirection'] == 'l') {
            $sliderSetting['autoPlayDirection'] = 'l';
        }
        // slider_auto_play
        // slider margin 
        if (isset($options['slide_spacing'])) {
            $sliderSetting['slide_spacing'] = $options['slide_spacing'];
        }

        $dataSetting = wp_json_encode($sliderSetting);
        // print_r($dataSetting);
        // print_r($options);
        $productHtml = '';
        $productHtml .= "<div class='elemento-owl-slider-common-secript' data-setting='" . $dataSetting . "'>";
        if (isset($availNextPrevious)) {
            $arrowType = '-alt'; //1


            $productHtml .= '<div class="elemento-addons-owl-np-cln elemento-addons-owl-prev"><span class="dashicons dashicons-arrow-left' . $arrowType . '"></span></div>';
            $productHtml .= '<div class="elemento-addons-owl-np-cln elemento-addons-owl-next"><span class="dashicons dashicons-arrow-right' . $arrowType . '"></span></div>';
        }
        $productHtml .= "<div class='elemento-owl-slider owl-carousel owl-theme'>";
        if ($query->have_posts()) {
            if (isset($options['number_of_row']) && $options['number_of_row'] == '2') {
                $countRow = 1;
                $countTotal = count($query->posts);
                $productHtml .= '<div class="item">';
                while ($query->have_posts()) {
                    $query->the_post();
                    $productId = get_the_ID();
                    $productHtml .= $this->product_html1($productId, $options);
                    if ($countRow % 2 === 0) {
                        $productHtml .= '</div>';
                        if ($countTotal != $countRow) $productHtml .= '<div class="item">';
                    }
                    $countRow++;
                }
                $productHtml .= '</div>';
            } else {
                while ($query->have_posts()) {
                    $query->the_post();
                    $productId = get_the_ID();
                    $productHtml .= '<div class="item">';
                    $productHtml .= $this->product_html1($productId, $options);
                    $productHtml .= '</div>';
                }
            }
        }
        $productHtml .= '</div>';
        $productHtml .= '</div>';
        return $productHtml;
    }
    public function product_html1($productId, $options)
    {
        $product = wc_get_product($productId);
        $regularPrice = $product->get_regular_price();
        $currentPrice = $product->get_price();
        $currentPricehtml = $product->get_price_html();
        $rating = $product->get_average_rating();
        $count_rating = $product->get_rating_count();
        $ratingHtml = $count_rating > 0 ? wc_get_rating_html($rating, $count_rating) : false;

        $checkSale = $regularPrice > $currentPrice ? true : false;
        // sale price 
        $ps_sale = '';
        if ($checkSale) {
            $salePrice = $regularPrice - $currentPrice;
            $currency_ = get_woocommerce_currency_symbol();
            $ps_sale = '<div class="elemento-addons-sale">
                        <span class="elemento-addons-sale-tag">-' . $currency_ . $salePrice . '</span>
                    </div>';
        }
        // add to cart --------------
        $addToCart = '';
        // if (false) {
        // if ($options['add_to_cart_hide_show']) {
        $textAddTocart = $options['add_to_cart_text'] !== '' && $options['add_to_cart_text'] ? $options['add_to_cart_text'] : false;
        $iconAddTocart = $options['add_to_cart_icon_on'] == 'on' && $options['add_to_cart_icon_on'] ? true : false;
        $addToCart = $this->elemento_add_tocart($product, $textAddTocart, $iconAddTocart);
        // }

        // quick view --------------
        // price --------------
        $price = '<span class="elemento-addons-price">' . $currentPricehtml . '</span>';

        $returnHtml = '';
        $returnHtml .= '<div class="elemento-product-outer-wrap">'; //inner wrap
        $returnHtml .= $this->product_html2($productId, $product, $ps_sale, $ratingHtml, $price, $addToCart);
        $returnHtml .= '</div>'; //inner wrap 
        return $returnHtml;
    }
    private function product_html2($productId, $product, $ps_sale, $ratingHtml, $price, $addToCart)
    {
        $wishlist_ = $this->elemento_addons_wishlist_wpc($productId);
        $compare_ = $this->elemento_addons_compare($productId);

        $productHtml = '<div class="elemento-product-simple-inner-wrap">'; //inner rap
        // quick view 
        if (function_exists('th_elemento_addon_quickView_enable')) {
            $productHtml .= '<a href="#" data-product="' . $productId . '" class="elemento-addons-quickview-simple">' . __('Quick View') . '</a>';
        }
        $productHtml .= $ps_sale;
        $productHtml .= '<a class="img_" href="' . get_permalink($productId) . '" target="_blank">
                                    ' . $product->get_image() . '
                                    </a>';

        $productHtml .= '<a class="elemento-addons-product-title" href="' . get_permalink($productId) . '" target="_blank">' . $product->get_name() . '</a>';
        $productHtml .= $ratingHtml ? '<div class="elemento-addons-rating">' . $ratingHtml . '</div>' : '';
        // add to cart 
        $productHtml .=  $price;
        $productHtml .=  '</div>';

        $productHtml .=  "<div class='elemento-product-simple-inner-bottom'>";
        $productHtml .=  $addToCart;
        if ($wishlist_ || $compare_) {
            // buttons icon 
            $productHtml .=  "<div class='buttons_'>";
            $productHtml .=  $wishlist_;
            $productHtml .=  $compare_;
            $productHtml .=  "</div>";
            // buttons icon 
        }
        $productHtml .=  "</div>";
        return $productHtml;
    }
    function  elemento_add_tocart($product,  $text, $icon)
    {
        $text =  $text ? "<span class='add-to-cart-text'>" .  $text . "</span>" : '';
        $icon_ = $icon ? '<span class="dashicons dashicons-cart"></span>' : '';

        $cart_url =  apply_filters(
            'woocommerce_loop_add_to_cart_link',
            sprintf(
                '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="elemento-add-to-cart-btn %s %s">' . $icon_ . $text . '</a>',
                esc_url($product->add_to_cart_url()),
                esc_attr($product->get_id()),
                esc_attr($product->get_sku()),
                1,
                // esc_attr(isset($quantity) ? $quantity : 1),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->is_purchasable() && $product->is_in_stock() && $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
                esc_html($product->add_to_cart_text())
            ),
            $product
        );
        return $cart_url;
    }
    function elemento_addons_compare($productId)
    {
        if (intval($productId) && shortcode_exists('th_compare')) {
            $html = '<button class="th-product-compare-btn button" data-th-product-id="' . $productId . '">';
            $html .= '<i class="fas fa-exchange-alt"></i>';
            $html .= '<span>' . __('Compare', 'th-elemento') . '</span>';
            $html .= '</button>';
            return $html;
        }
    }
    function elemento_addons_wishlist_wpc($productId)
    {
        if (intval($productId) && shortcode_exists('woosw')) {
            $html = '';
            $html .= do_shortcode('[woosw id="' . $productId . '"]');
            return $html;
        }
    }
    // class end 
}
