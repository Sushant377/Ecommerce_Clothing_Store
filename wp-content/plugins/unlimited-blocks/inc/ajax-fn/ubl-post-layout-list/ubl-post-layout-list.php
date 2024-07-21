<?php
if (!defined('ABSPATH')) exit;
if (!function_exists('unlimited_blocks_layout_list')) {
    function unlimited_blocks_layout_list()
    {
        if (isset($_POST['attr']) && is_array($_POST['attr'])) {
            $attr = unlimited_blocks_array_sanitize($_POST['attr']);
            if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
                $trigger = isset($_POST['trigger']) ? sanitize_text_field($_POST['trigger']) : '';
                $page_ = isset($_POST['page']) && intval($_POST['page']) ? intval($_POST['page']) : '';
                $pageNo = $trigger == "next" && is_numeric($page_) ? $page_ + 1 : $page_ - 1;
                $page_No = isset($_POST['page_no']) && intval($_POST['page_no']) ? intval($_POST['page_no']) : false;
                if ($page_No) {
                    $pageNo = $page_No;
                }
                $args = [
                    'post_type' => 'post',
                    "posts_per_page" => intval($attr['numberOfPosts']),
                    'paged' => $pageNo,
                ];
                if (isset($attr["postCategories"]) && is_array($attr["postCategories"]) && !empty($attr["postCategories"])) {
                    $args['category_name'] = join(',', $attr["postCategories"]);
                }
                echo unlimited_blocks_layout_list_html($args, $attr) ? unlimited_blocks_layout_list_html($args, $attr) : 0;
                die();
            }
        }
    }
    add_action('wp_ajax_unlimited_section_post_layout_list', "unlimited_blocks_layout_list");
    add_action('wp_ajax_nopriv_unlimited_section_post_layout_list', "unlimited_blocks_layout_list");
}
// return html function
if (!function_exists('unlimited_blocks_layout_list_html')) {
    function unlimited_blocks_layout_list_html($args, $attr)
    {
        $postThumbnail = isset($attr['thumbnail'][0]['typeShow']) && $attr['thumbnail'][0]['typeShow'] ? $attr['thumbnail'][0]['typeShow'] : false;
        if ($postThumbnail == "1") {
            $args['meta_key'] = '_thumbnail_id';
        }
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            $postAuthor = isset($attr['author'][0]['enable']) && $attr['author'][0]['enable'] == "true" ? true : false;
            $postChecker = false;
            $showCate_ = isset($attr['showCate']) ? $attr["showCate"] : false;
            $heading_ = isset($attr['heading']) ? $attr["heading"] : false;
            $metaStyle_ = isset($attr['meta_style']) ? $attr["meta_style"] : false;
            $Excerpt_ = isset($attr['excerpt']) ? $attr["excerpt"] : false;
            $ShowTag  = isset($attr['showTag']) ? $attr["showTag"] : false;
            $thumbnail_ = isset($attr['thumbnail']) ? $attr["thumbnail"] : false;
            $date_ = isset($attr['date']) ? $attr["date"] : false;
            $postHtml = '';
            while ($query->have_posts()) {
                $query->the_post();
                if ($postThumbnail == "1") {
                    if (!$postChecker) {
                        $postChecker = true;
                    }
                    $postHtml .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, $thumbnail_);
                } else {
                    if (!$postChecker) {
                        $postChecker = true;
                    }
                    $postHtml .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, $thumbnail_);
                }
            }
            wp_reset_postdata();
            return $postChecker ? $postHtml : false;
        }
    }
}
