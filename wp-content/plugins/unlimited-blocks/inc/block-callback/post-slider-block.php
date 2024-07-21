<?php
if (!defined('ABSPATH')) exit;
// ubl block post slider
unlimited_blocks_register_block_fn('ubl-post-slider',  [
    "render_callback" => "unlimited_blocks_render_post_slider",
    'attributes' => array(
        "align" => [
            "type" => "string",
            'default' => ''
        ],
        "wrapper_id" => [
            "type" => "string",
            "default" => ""
        ],
        "sliderSetting" => [
            "type" => "object",
            "default" => [
                // slider settings
                // "dimension" => [
                //     "width" => false,
                //     "custom_width" => 100,
                //     "height" => false,
                //     "custom_height" => 300,
                // ],
                "sliderEffect" => "slideEffect",
                "triggerActive" => "both",
                "linearTrigger" => [
                    "fontSize" => 12,
                    "color" => "rgba(231,192,192,1)",
                    "activeColor" => "rgba(68,222,68,1)",
                ],
                "leftRightTrigger" => [
                    "fontSize" => 15,
                    "color" => "rgba(231,192,192,1)",
                ],
                "autoTrigger" => false,
                "autoTriggerDelay" => 4,
                'numberOfcolumn' => 1,
                'numberOfRow' => 1,
                'columnGap' => 15,
                'rowGap' => 15,
                // slider settings
                "contentAlign" => "center",
                "overlayColor" => [
                    "type" => "color",
                    "color" => "rgba(112,112,112,0.35)",
                    'gradient' => "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                    "opacity" => 6
                ],

            ],
        ],

        'numberOfPosts' => [
            'type' => "number",
            "default" => 2
        ],

        'heading' => [
            'type' => "object",
            "default" => [
                "tag" => 'h2',
                "fontSize" => 32,
                "color" => '#fffff',
            ]
        ],
        "meta_style" => [
            "type" => "object",
            "default" => [
                "color" => "#ffffff",
                "left_border" => true,
                "fontSize" => 12
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
                "customColor" => true,
                "color" => "#ffffff",
                "backgroundColor" => "rgba(54,26,234,0.45)",
                "fontSize" => 12,
                "count" => 2,
            ]
        ],
        'showTag' => [
            "type" => "object",
            "default" => [
                "enable" => false,
                // "customColor" => false,
                "color" => "#dfdfdf",
                "backgroundColor" => "transparent",
                "fontSize" => 12,
                "count" => 2,
            ]
        ],
        'excerpt' => [
            'type' => "object",
            "default" => [
                "enable" => false,
                "words" => 25,
                "color" => '#E2E2E2',
                "fontSize" => 12
            ]
        ],
        "postCategories" => [
            "type" => "array",
            "default" => []
        ],
        "preview" => [
            "type" => "boolean",
            "default" => false,
        ],
    )
]);
