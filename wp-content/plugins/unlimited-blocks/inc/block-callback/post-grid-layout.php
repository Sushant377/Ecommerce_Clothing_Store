<?php
if (!defined('ABSPATH')) exit;
unlimited_blocks_register_block_fn('ubl-post-grid',  [
    "render_callback" => "unlimited_blocks_post_grid_block",
    'attributes' => [
        'numberOfPosts' => [
            'type' => "number",
            "default" => 6
        ],
        'align' => [
            'type' => "string",
            "default" => ""
        ],
        "numberOfColumn" => [
            "type" => "number",
            "default" => 3
        ],
        "title" => [
            "type" => "array",
            "default" => [[
                'enable' => true,
                "value" => __("Add Block Title", "unlimited-blocks"),
                "fontSize" => 16,
                "color" => "white",
                "backgroundColor" => "#22cb95",
                "align" => "left",
                "width" => 10,
                "fontWeight" => 400
            ]]
        ],
        "thumbnail" => [
            "type" => "array",
            "default" => [[
                "enable" => true,
                "typeShow" => '1',
                "borderRadius" => 4
            ]]
        ],
        'heading' => [
            'type' => "array",
            "default" => [[
                "tag" => 'h2',
                "fontSize" => 16,
                "color" => '#4b4848',
            ]]
        ],
        "meta_style" => [
            "type" => "array",
            "default" => [[
                "color" => "white",
                "left_border" => false,
                "fontSize" => 11,
                "blockBgColor" => [
                    "type" => "color",
                    "color" => "transparent",
                    'gradient' => "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)"
                ],
                "npPagination" => true,
                "npEnable" => true,
                "npColor" => '#adadad',
                "npBgColor" => 'white',
                "npBgfontSize" => 15,
            ]]
        ],
        "author" => [
            "type" => "array",
            "default" => [["enable" => true]]
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
                "backgroundColor" => "#22cb95",
                "fontSize" => 11,
                "count" => 2
            ]]
        ],
        'showTag' => [
            "type" => "array",
            "default" => [[
                "enable" => false,
                "color" => "#fcb900",
                "backgroundColor" => "transparent",
                "fontSize" => 11,
                "count" => 2
            ]]
        ],
        'excerpt' => [
            'type' => "array",
            "default" => [[
                "enable" => false,
                "words" => 8,
                "color" => '#969696',
                "fontSize" => 12
            ]]
        ],
        "postCategories" => [
            "type" => "array",
            "default" => []
        ],
        "preview" => [
            "type" => "boolean",
            "default" => false,
        ],
    ]
]);
