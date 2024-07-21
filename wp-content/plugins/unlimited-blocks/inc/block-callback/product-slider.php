<?php
if (!defined('ABSPATH')) exit;
unlimited_blocks_register_block_fn('ubl-product',  [
    "render_callback" => "unlimited_blocks_product_one",
    'attributes' => [
        // save client id
        'wrapper_id' => ["type" => 'string', "default" => false],
        'align' => ['type' => "string", 'default' => false],
        // layout 
        "product_cate" => [
            "type" => "array",
            "default" => []
        ],
        'numberOfPosts' => [
            'type' => "number",
            "default" => 6
        ],
        'product_show_by' => [
            "type" => "string",
            "default" => 'recent'
        ],

        'sliderSettings' => [
            'type' => "object",
            "default" => [
                "numberOfColumn" => 3,
                "numberOfrow" => 1,
                "autoplay" => "",
                "loop" => "",
                "sliderControl" => 'dots',
                "margin" => 10 // box spacing
            ]
        ],
        // style 
        "boxStyle" => [
            "type" => "object",
            "default" => [
                "bgColor" => "#ffffff",
                "borderWidthLink" => true,
                "borderStyle" => "solid",
                "borderWidth" => 0,
                "borderColor" => "#f8c045",
                "borderRadiusLink" => true,
                "borderRadius" => 0,
                'boxShadowColor' => '#4b58ff40',
                'boxShadowColorHover' => '#4b58ff40',
            ]
        ],
        "addToCart" => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "Color" => "#20c9ae",
                "bgColor" => "#89767603",
                "ColorHover" => "#20c9ae",
                "bgColorHover" => "#89767603",
                "borderWidth" => "1px",
                "borderWidthLink" => true,
                "borderStyle" => "solid",
                "borderColor" => "#20c9ae",
                "borderRadius" => "5px",
                "borderRadiusLink" => true,
                "paddingV" => '26',
                "paddingH" => '120',
            ]
        ],
        "productTitle" => [
            "type" => "object",
            "default" => [
                'color' => "#3b3b3b",
                'colorHover' => "#3b3b3b",
                'fontSize' => 14
            ]
        ],
        "ratingStyle" => [
            "type" => "object",
            "default" => [
                'color' => "#fa8e1e",
                'bgColor' => "#d3ced2",
                'fontSize' => "14"
            ]
        ],
        "priceStyle" => [
            "type" => "object",
            "default" => [
                'color' => "#20c9ae",
                'discountColor' => "#d3ced2",
                'fontSize' => 14
            ]
        ],
        "saleStyle" => [
            "type" => "object",
            "default" => [
                'color' => "#fff",
                'bgColor' => "#000",
                'fontSize' => 12
            ]
        ],
        "buttonsStyle" => [
            "type" => "object",
            "default" => [
                'color' => "#555555",
                'colorHover' => "#555555",
                'fontSize' => 14
            ]
        ],
    ]
]);
