<?php
if (!defined('ABSPATH')) exit;
// ubl block post slider
unlimited_blocks_register_block_fn('test-block',  [
    "render_callback" => "unlimited_blocks_test_block",
    'attributes' => array(
        // "title" => [
        //     "type" => "array",
        //     "default" => [
        //         [
        //             "value" => 'Add Block Title test',
        //         ],
        //         [
        //             "value" => 'Add Block Title test',
        //         ]
        //     ]
        // ]
        "title" => [
            "type" => "object",
            "default" => [
                "slide1" => [
                    "value" => 'Add Block Title test',
                ],
                "slide2" => [
                    "value" => 'Add Block Title test',
                ]
            ]
        ]
    )
]);
