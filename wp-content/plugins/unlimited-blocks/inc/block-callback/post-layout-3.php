<?php
if (!defined('ABSPATH')) exit;
unlimited_blocks_register_block_fn('ubl-post-section-four-post',  [
    "render_callback" => "unlimited_blocks_section_four_post",
    'attributes' => [
        'numberOfPosts' => [
            'type' => "number",
            "default" => 4
        ],
        "preview" => [
            "type" => "boolean",
            "default" => false,
        ],
        'align' => [
            'type' => "string",
            "default" => ""
        ],
        "title" => [
            "type" => "array",
            "default" => [[
                'enable' => true,
                "value" => __("Add Block Title", "unlimited-blocks"),
                "fontSize" => 16,
                "color" => "white",
                "backgroundColor" => "#ffbd09",
                "align" => "left",
                // "customWidth" => false,
                "width" => 10,
                "fontWeight" => 400
            ]]
        ],
        "layout" => [
            "type" => "array",
            "default" => [[
                "type" => 1,
                "contentPlace" => "inner",
                "contentAlign" => "bottom",
                "overlayColor" => [
                    "type" => "color",
                    "color" => "rgba(0, 0, 0, 0.25)",
                    'gradient' => "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                    "opacity" => 6
                ],
                // "contentBgColor" => "black",
            ]]
        ],
        // "thumbnail" => [
        //     "type" => "array",
        //     "default" => [[
        //         "enable" => true,
        //         "borderRadius" => 10
        //     ]]
        // ],
        'heading' => [
            'type' => "array",
            "default" => [[
                "tag" => 'h2',
                "fontSize" => 22,
                "color" => '#f1efea',
            ]]
        ],
        "meta_style" => [
            "type" => "array",
            "default" => [[
                "color" => "#fcb900",
                "fontSize" => 12,
                "blockBgColor" => "transparent",
                "npEnable" => false,
                "npColor" => '#fcb900',
                "npBgColor" => 'transparent',
                "npBgfontSize" => 15,
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
                "customColor" => true,
                "color" => "white",
                "backgroundColor" => "#fcb900",
                "count" => 1,
                "fontSize" => 12
            ]]
        ],
        'showTag' => [
            "type" => "array",
            "default" => [[
                "enable" => false,
                "color" => "white",
                "backgroundColor" => "transparent",
                "fontSize" => 12,
                "count" => 2,
            ]]
        ],
        'excerpt' => [
            'type' => "array",
            "default" => [[
                "enable" => false,
                "words" => 10,
                "color" => 'white',
                "fontSize" => 12
            ]]
        ],
        // secondary section
        "meta_style2" => [
            "type" => "array",
            "default" => [[
                "color" => "#fcb900",
                "fontSize" => 12
            ]]
        ],
        'heading2' => [
            'type' => "array",
            "default" => [[
                "tag" => 'h3',
                "fontSize" => 18,
                "color" => '#f1efea',
            ]]
        ],
        'excerpt2' => [
            'type' => "array",
            "default" => [[
                "enable" => false,
                "words" => 8,
                "color" => 'white',
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
                "customColor" => true,
                "color" => "white",
                "backgroundColor" => "#fcb900",
                "count" => 1,
                "fontSize" => 12
            ]]
        ],
        'showTag2' => [
            "type" => "array",
            "default" => [[
                "enable" => false,
                "color" => "white",
                "backgroundColor" => "black",
                "count" => 2,
                "fontSize" => 12
            ]]
        ],
        "postCategories" => [
            "type" => "array",
            "default" => []
        ],
        "categorynav" => [
            "type" => "array",
            "default" => [["enable" => true,]]
        ]
    ]
]);
