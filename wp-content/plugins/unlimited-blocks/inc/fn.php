<?php
if (!defined('ABSPATH')) exit;
// add category 
if (!function_exists('unlimited_blocks_block_categories')) {
    function unlimited_blocks_block_categories($categories, $post)
    {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'unlimited-blocks-category',
                    'title' => __('Unlimited Blocks', 'unlimited-blocks'),
                    'icon'  => 'wordpress',
                ),
            )
        );
    }
    add_filter('block_categories_all', 'unlimited_blocks_block_categories', 10, 2);
}
// register blocks common function
if (!function_exists('unlimited_blocks_register_block_fn')) {
    function unlimited_blocks_register_block_fn($blockName, $extraFeature = [])
    {
        register_block_type(
            'unlimited-blocks/' . $blockName,
            array_merge(array(
                'editor_script' => 'unlimited-blocks-editor-secript',
                'editor_style'  => 'unlimited-blocks-editor-style',
                'script'  => 'unlimited-blocks-script',
                'style'         => 'frontend-style'
            ), $extraFeature)
        );
    }
}
// array value sanitize
if (!function_exists('unlimited_blocks_array_sanitize')) {
    function unlimited_blocks_array_sanitize($arr)
    {
        $returnArray = [];
        if (is_array($arr)) {
            foreach ($arr as $key => $value) {
                $key = is_numeric($key) ? $key : sanitize_text_field($key);
                if (is_array($value)) {
                    $returnArray[$key] = unlimited_blocks_array_sanitize($value);
                } else {
                    $value = is_numeric($value) ? intval($value) : sanitize_text_field($value);
                    $returnArray[$key] = $value;
                } //else
            } //foreach
        }
        return !empty($returnArray) ? $returnArray : false;
    }
}
// block call back function
include "block-callback/post-slider.php";
include "block-callback/post-list-layout-c.php";
include "block-callback/post-category-layout-c.php";
include "block-callback/post-grid-layout-c.php";
include "block-callback/post-image-layout-c.php";
include "block-callback/post-layout-2-c.php";
include "block-callback/post-layout-3-c.php";
include "block-callback/post-layout-4-c.php";
include "block-callback/product-slider-c.php";
include "block-callback/slick-slider-c.php";

// testing 

// include 'block-callback/test-fn.php';
