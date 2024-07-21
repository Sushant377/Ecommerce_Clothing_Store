<?php
if (!defined('ABSPATH')) exit;
unlimited_blocks_register_block_fn('ubl-post-tc',  [
    "render_callback" => "unlimited_blocks_two_column_block",
    'attributes' => [
        'numberOfPosts' => [
            'type' => "number",
            "default" => 4
        ],
        'align' => [
            'type' => "string",
            "default" => ""
        ],
        "preview" => [
            "type" => "boolean",
            "default" => false,
        ],
        "title" => [
            "type" => "array",
            "default" => [[
                'enable' => true,
                "value" => __("Add Block Title", "unlimited-blocks"),
                "bgColor" => "#fcb900",
                "fontSize" => 16,
                "color" => "#ffffff",
            ]]
        ],
        "thumbnail" => [
            "type" => "array",
            "default" => [[
                "enable" => true,
                "borderRadius" => 4
            ]]
        ],
        'heading' => [
            'type' => "array",
            "default" => [[
                "tag" => 'h2',
                "fontSize" => 22,
                "color" => '#353434',
            ]]
        ],
        "meta_style" => [
            "type" => "array",
            "default" => [[
                "color" => "#abb8c3",
                "fontSize" => 14,
                "layoutPosition" => 'left',
                "underLine" => true,
                "underLineColor" => "#fcb900",
                "blockBgColor" => [
                    "type" => "color",
                    "color" => "transparent",
                    'gradient' => "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)"
                ],
                "npColor" => '#adadad',
                "npBgColor" => 'white',
                "npBgfontSize" => '15',
            ]]
        ],
        "author" => [
            "type" => "array",
            "default" => [["enable" => false]]
        ],
        'date' => [
            "type" => "array",
            "default" => [[
                "enable" => true,
                "last_modified" => false
            ]]
        ],
        'showCate' => [
            "type" => "array",
            "default" => [[
                "enable" => true,
                "customColor" => false,
                "color" => "#fffff",
                "backgroundColor" => "#1f1f1f",
                "fontSize" => 12,
                "count" => 2
            ]]
        ],
        'showTag' => [
            "type" => "array",
            "default" => [[
                "enable" => false,
                "color" => "white",
                "backgroundColor" => "black",
                "count" => 2,
                "fontSize" => 12
            ]]
        ],
        'excerpt' => [
            'type' => "array",
            "default" => [[
                "enable" => true,
                "words" => 12,
                "color" => '#737373',
                "fontSize" => 12
            ]]
        ],
        // secondary section
        "thumbnail2" => [
            "type" => "array",
            "default" => [[
                "enable" => false,
                "borderRadius" => 4
            ]]
        ],
        "meta_style2" => [
            "type" => "array",
            "default" => [[
                "color" => "#abb8c3",
                "fontSize" => 12
            ]]
        ],
        'heading2' => [
            'type' => "array",
            "default" => [[
                "tag" => 'h3',
                "fontSize" => 14,
                "color" => '#353434',
            ]]
        ],
        'excerpt2' => [
            'type' => "array",
            "default" => [[
                "enable" => false,
                "words" => 5,
                "color" => '#737373',
                "fontSize" => 12
            ]]
        ],
        "author2" => [
            "type" => "array",
            "default" => [["enable" => false]]
        ],
        'date2' => [
            "type" => "array",
            "default" => [[
                "enable" => true,
                "last_modified" => false
            ]]
        ],
        'showCate2' => [
            "type" => "array",
            "default" => [[
                "enable" => true,
                "customColor" => false,
                "color" => "#fffff",
                "backgroundColor" => "#1f1f1f",
                "fontSize" => 12,
                "count" => 2
            ]]
        ],
        "postCategories" => [
            "type" => "array",
            "default" => []
        ],
        "categorynav" => [
            "type" => "array",
            "default" => [["enable" => true, "color" => "#fcb900", "backgroundColor" => "#ececec", "fontSize" => 15]]
        ]
    ]
]);
