<?php
if (!defined('ABSPATH')) exit;
unlimited_blocks_register_block_fn('ubl-post-section-two-post',  [
    "render_callback" => "unlimited_blocks_section_block",
    'attributes' => [
        'numberOfPosts' => [
            'type' => "number",
            "default" => 2
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
            "type" => "object",
            "default" => [
                'enable' => false,
                "value" => __("Add Block Title", "unlimited-blocks"),
                "fontSize" => 16,
                "color" => "white",
                "backgroundColor" => "#d80c79",
                "align" => "left",
                // "customWidth" => false,
                "width" => 10,
                "fontWeight" => 400
            ]
        ],
        "layout" => [
            "type" => "object",
            "default" => [
                // "type" => 1,
                // "contentPlace" => "inner",
                "contentAlign" => "bottom-left",
                // "overlayColor" => "transparent",
                "overlayColor" => [
                    "type" => "color",
                    "color" => "rgba(0, 0, 0, 0.25)",
                    'gradient' => "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                    "opacity" => 6
                ],
            ]
        ],
        "thumbnail" => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "borderRadius" => 10
            ]
        ],
        'heading' => [
            'type' => "object",
            "default" => [
                "tag" => 'h2',
                "fontSize" => 22,
                "color" => 'white',
            ]
        ],
        "meta_style" => [
            "type" => "object",
            "default" => [
                "color" => "white",
                "fontSize" => 12,
                // "left_border" => true
            ]
        ],
        "author" => [
            "type" => "object",
            "default" => ["enable" => false]
        ],
        'date' => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "last_modified" => false
            ]
        ],
        'showCate' => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "customColor" => false,
                "color" => "white",
                "backgroundColor" => "#d80c79",
                "count" => 2,
                "fontSize" => 14
            ]
        ],
        'showTag' => [
            "type" => "object",
            "default" => [
                "enable" => false,
                "color" => "white",
                "backgroundColor" => "transparent",
                "fontSize" => 12,
                "count" => 2,
            ]
        ],
        'excerpt' => [
            'type' => "object",
            "default" => [
                "enable" => false,
                "words" => 10,
                "color" => 'white',
                "fontSize" => 12
            ]
        ],
        // secondary section
        "meta_style2" => [
            "type" => "object",
            "default" => [
                "color" => "#8e8c8d",
                "fontSize" => 14
            ]
        ],
        'heading2' => [
            'type' => "object",
            "default" => [
                "tag" => 'h1',
                "fontSize" => 30,
                "color" => 'white',
            ]
        ],
        'excerpt2' => [
            'type' => "object",
            "default" => [
                "enable" => true,
                "words" => 10,
                "color" => 'white',
                "fontSize" => 12
            ]
        ],
        "author2" => [
            "type" => "object",
            "default" => ["enable" => true]
        ],
        'date2' => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "last_modified" => true
            ]
        ],
        'showCate2' => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "customColor" => false,
                "color" => "white",
                "backgroundColor" => "black",
                "count" => 2,
                "fontSize" => 12
            ]
        ],
        'showTag2' => [
            "type" => "object",
            "default" => [
                "enable" => true,
                "color" => "white",
                "backgroundColor" => "black",
                "count" => 2,
                "fontSize" => 12
            ]
        ],
        "postCategories" => [
            "type" => "array",
            "default" => []
        ],
        "categorynav" => [
            "type" => "object",
            "default" => [
                "enable" => true,
            ]
        ]
    ]
]);
