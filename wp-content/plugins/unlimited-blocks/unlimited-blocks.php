<?php

/**
 * Plugin Name: Unlimited Blocks
 * Plugin URI: https://themehunk.com/unlimited-blocks/
 * Description: Extra Unlimited blocks Library for building aesthetic websites in the WordPress block editor.
 * Version: 1.2.7
 * Author: ThemeHunk
 * Author URI: https://themehunk.com/
 * License: GPLv2 or later
 * Text Domain: unlimited-blocks
 */
if (!defined('ABSPATH')) exit;
define('UNLIMITED_BLOCKS', plugins_url('unlimited-blocks') . '/');
define('UNLIMITED_BLOCKS_PATH', plugin_dir_path(__FILE__));
include "inc/inc.php";
include "inc/fn.php";
// unlimited_blocks 
if (!function_exists('unlimited_blocks_register_block')) {
	function unlimited_blocks_register_block()
	{
		// Register JavasScript File build/index.js
		wp_register_script(
			'unlimited-blocks-editor-secript',
			UNLIMITED_BLOCKS . 'dist/editor.js',
			array('jquery', 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data', 'wp-html-entities', "wp-i18n", 'underscore'),
			1
		);
		// Register JavasScript File src/script.js

		wp_register_script(
			'unlimited-blocks-script',
			UNLIMITED_BLOCKS . 'dist/script.js',
		);
		// Register animate .css
		// wp_register_style(
		// 	'ul-animate-css',
		// 	'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
		// 	array('wp-edit-blocks'),
		// 	1
		// );
		// Register editor style src/editor.css
		wp_register_style(
			'unlimited-blocks-editor-style',
			UNLIMITED_BLOCKS . 'dist/editor.css',
			array('wp-edit-blocks'),
			1
		);

		// wp_register_style(
		// 	'owl-slider-css',
		// 	UNLIMITED_BLOCKS . 'assets/css/owl-slider-min.css',
		// 	array('wp-edit-blocks'),
		// 	1
		// );
		// wp_register_style(
		// 	'owl-slider-css-default',
		// 	UNLIMITED_BLOCKS . 'assets/css/ow.slided.default.css',
		// 	array('wp-edit-blocks'),
		// 	1
		// );


		if (!is_admin()) {
			// wp_register_style(
			// 'ul-animate-css',
			// 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
			// 	'dist/script.css',
			// );
			wp_register_style(
				'frontend-style',
				UNLIMITED_BLOCKS . 'dist/script.css',
			);
		}
		wp_localize_script(
			'unlimited-blocks-editor-secript',
			'plugin_url',
			array(
				'url' => UNLIMITED_BLOCKS
			)
		);
		include "inc/blocks.php";

		// $cuuuDataa = wp_get_current_user();
		// print_r($cuuuDataa);

	}
	add_action('init', 'unlimited_blocks_register_block');
}
if (!function_exists('unlimited_blocks_script')) {
	// enque css icon file
	function unlimited_blocks_script()
	{

		wp_enqueue_style('owl-slider-css', UNLIMITED_BLOCKS . 'assets/css/owl-slider-min.css', false);
		wp_enqueue_style('owl-slider-css-default', UNLIMITED_BLOCKS . 'assets/css/ow.slided.default.css', false);

		// slick 
		wp_enqueue_style('slick-slider', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css", false);
		wp_enqueue_style('slick-theme', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css", false);
		wp_enqueue_script('custom-query-2', UNLIMITED_BLOCKS . 'assets/js/ubl-custom.js', array('jquery'), 2);
		// slick 

		wp_enqueue_style('fontawesom-css', UNLIMITED_BLOCKS . 'assets/fontawesome/css/all.min.css', false);
		wp_enqueue_style('ul-animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', false);
		wp_enqueue_style('google-font', UNLIMITED_BLOCKS_FONT_FAMILY_LINK, false);
		wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Catamaran:wght@400;600;700&display=swap', false);
		wp_enqueue_script('custom-query', UNLIMITED_BLOCKS . 'src/custom-query.js', array('jquery'), 2);
		wp_enqueue_script('custom-query-2', UNLIMITED_BLOCKS . 'assets/js/ubl-custom.js', array('jquery'), 2);
		wp_localize_script('custom-query', 'unlimited_blocks_ajax_url', array('admin_ajax' => admin_url('admin-ajax.php')));
	}
	function unlimited_blocks_script_only_front()
	{
		wp_enqueue_script('owl-slider-js', UNLIMITED_BLOCKS . 'assets/js/owl-slider.js', array('jquery'), [], true);
		// slick slider css 
		wp_enqueue_style('slick-slider-18', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", false);
		// wp_enqueue_style('slick-theme', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css", false);
		// slick slider css 
		wp_enqueue_script('slick-slider-js', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), [], true);
	}
	add_action('admin_enqueue_scripts', 'unlimited_blocks_script');

	add_action('wp_enqueue_scripts', 'unlimited_blocks_script_only_front', 15);
	add_action('wp_enqueue_scripts', 'unlimited_blocks_script', 15);
}
/*
 * 
 * 
 */
// load file important all file called here
if (!function_exists('unlimited_blocks_loaded')) {
	add_action('plugins_loaded', 'unlimited_blocks_loaded');
	function unlimited_blocks_loaded()
	{
		include_once(UNLIMITED_BLOCKS_PATH . 'inc/ajax-fn/ajax.php');
	}
}
