<?php
if (!defined('ABSPATH')) exit;
unlimited_blocks_register_block_fn('owl-slider',  [
    "render_callback" => "unlimited_blocks_owl_slider",
    'attributes' => [
        "preview" => [
            "type" => "boolean",
            "default" => false,
        ],
        'align' => [
            'type' => "string",
            'default' => "",
        ],
        "wrapper_id" => [
            "type" => "string",
            "default" => "byphp"
        ],
        "sliderSetting" => [
            "type" => "object",
            "default" => [
                // slider settings
                "dimension" => [
                    "width" => false,
                    "custom_width" => 100,
                    "height" => false,
                    "custom_height" => 300,
                ],
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
                // slider settings
            ],
        ],
        "wrapper" => [
            "type" => "object",
            "default" => ["alignment" => "center", "spacing" => 15, "textAlign" => "center"],
        ],
        "title" => [
            "type" => "object",
            "default" => ["fontSize" => 38, "color" => "#ffffff"],
        ],
        "text" => [
            "type" => "object",
            "default" => ["fontSize" => 17, "color" => "#d2d2d2"],
        ],
        "buttoneOne" => [
            "type" => "object",
            "default" => [
                "fontSize" => "",
                "color" => "",
                "height" => "",
                "width" => "",
                "bg" => [
                    "backgroundColorType" => "color",
                    "backgroundColor" => "#ffbf00",
                    "backgroundImageGradient" =>
                    "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                ],
                "border" => [],
            ],
        ],
        "buttoneTwo" => [
            "type" => "object",
            "default" => [
                "fontSize" => "",
                "color" => "",
                "height" => "",
                "width" => "",
                "bg" => [
                    "backgroundColorType" => "color",
                    "backgroundColor" => "#ffbf00",
                    "backgroundImageGradient" =>
                    "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                ],
                // border=> false,
                // "borderColor"=> "",
                // borderWidth=> "",
                // borderRadius=> "",
                "border" => [],
            ],
        ],
        "slides" => [
            "type" => "array",
            "default" => [
                // slider slide
                [
                    "container" => [
                        "bg" => [
                            "backgroundType" => "color",
                            "backgroundImage" => "",
                            "backgroundImageSize" => "cover",
                            "backgroundColorType" => "color",
                            "backgroundColor" => "#20202e",
                            "backgroundImageGradient" =>
                            "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                            "backgroundOpacity" => 0.6,
                        ],
                    ],
                    "title" => [
                        "text" => __("This Is Title text", "unlimited-blocks"),
                    ],
                    "text" => [
                        "text" => __("Add Description", "unlimited-blocks"),
                    ],
                    "buttoneOne" => [
                        "enable" => true,
                        "text" => __("Button One", "unlimited-blocks"),
                        "link" => "https://example.com/",
                        "target" => false,
                    ],
                    "buttoneTwo" => [
                        "enable" => true,
                        "text" => __("Button Two", "unlimited-blocks"),
                        "link" => "https://example.com/",
                        "target" => false,
                    ],
                ],
                [
                    "container" => [
                        "bg" => [
                            "backgroundType" => "color",
                            "backgroundImage" => "",
                            "backgroundImageSize" => "cover",
                            "backgroundColorType" => "color",
                            "backgroundColor" => "#20202e",
                            "backgroundImageGradient" =>
                            "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                            "backgroundOpacity" => 0.6,
                        ],
                    ],
                    "title" => [
                        "text" => __("This Is Title text", "unlimited-blocks"),
                    ],
                    "text" => [
                        "text" => __("Add Description", "unlimited-blocks"),
                    ],
                    "buttoneOne" => [
                        "enable" => true,
                        "text" => __("Button One", "unlimited-blocks"),
                        "link" => "https://example.com/",
                        "target" => false,
                    ],
                    "buttoneTwo" => [
                        "enable" => true,
                        "text" => __("Button Two", "unlimited-blocks"),
                        "link" => "https://example.com/",
                        "target" => false,
                    ],
                ],
                [
                    "container" => [
                        "bg" => [
                            "backgroundType" => "color",
                            "backgroundImage" => "",
                            "backgroundImageSize" => "cover",
                            "backgroundColorType" => "color",
                            "backgroundColor" => "#20202e",
                            "backgroundImageGradient" =>
                            "radial-gradient(rgb(6, 147, 227) 38%, rgb(155, 81, 224) 80%)",
                            "backgroundOpacity" => 0.6,
                        ],
                    ],
                    "title" => [
                        "text" => __("This Is Title text", "unlimited-blocks"),
                    ],
                    "text" => [
                        "text" => __("Add Description", "unlimited-blocks"),
                    ],
                    "buttoneOne" => [
                        "enable" => true,
                        "text" => __("Button One", "unlimited-blocks"),
                        "link" => "https://example.com/",
                        "target" => false,
                    ],
                    "buttoneTwo" => [
                        "enable" => true,
                        "text" => __("Button Two", "unlimited-blocks"),
                        "link" => "https://example.com/",
                        "target" => false,
                    ],
                ]

                // slider slides
            ],
        ],
    ]
]);
