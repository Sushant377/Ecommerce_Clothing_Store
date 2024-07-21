<?php
if (!defined('ABSPATH')) exit;
if (!function_exists('unlimited_blocks_post_tc')) {
    function unlimited_blocks_post_tc()
    {
        if (isset($_POST['attr']) && is_array($_POST['attr'])) {
            $attr = unlimited_blocks_array_sanitize($_POST['attr']);
            if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
                $trigger = isset($_POST['trigger']) ? sanitize_text_field($_POST['trigger']) : '';
                $page_ = isset($_POST['page']) && intval($_POST['page']) ? intval($_POST['page']) : '';
                $pageNo = $trigger == "next" && is_numeric($page_) ? $page_ + 1 : $page_ - 1;
                $args = [
                    'post_type' => 'post',
                    "posts_per_page" => intval($attr['numberOfPosts']),
                    'paged' => $pageNo,
                ];
                if (isset($attr["postCategories"]) && is_array($attr["postCategories"]) && !empty($attr["postCategories"])) {
                    $args['category_name'] = join(',', $attr["postCategories"]);
                }
                echo unlimited_blocks_post_tc_html($args, $attr) ? unlimited_blocks_post_tc_html($args, $attr) : 0;
                die();
            }
        }
    }
    add_action('wp_ajax_unlimited_section_post_category_layout_block', "unlimited_blocks_post_tc");
    add_action('wp_ajax_nopriv_unlimited_section_post_category_layout_block', "unlimited_blocks_post_tc");
}
if (!function_exists('unlimited_blocks_choose_cate')) {
    function unlimited_blocks_choose_cate()
    {
        if (isset($_POST['attr']) && is_array($_POST['attr'])) {
            $attr = unlimited_blocks_array_sanitize($_POST['attr']);
            if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
                $args = [
                    'post_type' => 'post',
                    "posts_per_page" => intval($attr['numberOfPosts']),
                    'paged' => 1,
                ];
                if (isset($attr["postCategories"]) && is_array($attr["postCategories"]) && !empty($attr["postCategories"])) {
                    $args['category_name'] = join(',', $attr["postCategories"]);
                }
                echo unlimited_blocks_post_tc_html($args, $attr) ? wp_json_encode(unlimited_blocks_post_tc_html($args, $attr, true)) : 0;
                die();
            }
        }
    }
    add_action('wp_ajax_unlimited_section_post_category_layout_choose_category', "unlimited_blocks_choose_cate");
    add_action('wp_ajax_nopriv_unlimited_section_post_category_layout_choose_category', "unlimited_blocks_choose_cate");
}
// return html function
if (!function_exists('unlimited_blocks_post_tc_html')) {
    function unlimited_blocks_post_tc_html($args, $attr, $showNextPrev = false)
    {
        if (isset($attr['thumbnail'][0]['enable']) && ($attr['thumbnail'][0]['enable'] == "true" || $attr['thumbnail'][0]['enable'] == 1)) {
            $args['meta_key'] = "_thumbnail_id";
        }
        $query = new WP_Query($args);
        $layoutPosition = isset($attr['meta_style'][0]["layoutPostion"]) && $attr['meta_style'][0]["layoutPostion"] ? $attr['meta_style'][0]["layoutPostion"] : '';
        $postHtml = "<div class='ubl-post-two-column column-layout-" . $layoutPosition . "'>";
        $postHtmlCl1 = '<div class="column-one">';
        $postHtmlCl2 = '<div class="column-two">';
        if ($query->have_posts()) {
            $postAuthor = isset($attr['author'][0]['enable']) && $attr['author'][0]['enable']  ? true : false;
            $postAuthor2 = isset($attr['author2'][0]['enable']) && $attr['author2'][0]['enable']  ? true : false;
            $showCate_ = isset($attr['showCate']) ? $attr["showCate"] : false;
            $heading_ = isset($attr['heading']) ? $attr["heading"] : false;
            $metaStyle_ = isset($attr['meta_style']) ? $attr["meta_style"] : false;
            $Excerpt_ = isset($attr['excerpt']) ? $attr["excerpt"] : false;
            $ShowTag  = isset($attr['showTag']) ? $attr["showTag"] : false;
            $thumbnail_ = isset($attr['thumbnail']) ? $attr["thumbnail"] : false;
            $date_ = isset($attr['date']) ? $attr["date"] : false;
            // secondary
            $showCate2_ = isset($attr['showCate2']) ? $attr["showCate2"] : false;
            $heading2_ = isset($attr['heading2']) ? $attr["heading2"] : false;
            $metaStyle2_ = isset($attr['meta_style2']) ? $attr["meta_style2"] : false;
            $Excerpt2_ = isset($attr['excerpt2']) ? $attr["excerpt2"] : false;
            $ShowTa2g  = isset($attr['showTag2']) ? $attr["showTag2"] : false;
            $date2_ = isset($attr['date2']) ? $attr["date2"] : false;
            $checkFirst = true;
            while ($query->have_posts()) {
                $query->the_post();
                if ($checkFirst) {
                    $checkFirst = false;
                    $postHtmlCl1 .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, $thumbnail_);
                } else {
                    $postHtmlCl2 .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, $thumbnail_);
                }
            }
            $postHtmlCl1 .=  '</div>';
            $postHtmlCl2 .= '</div>';
            $postHtml .= $postHtmlCl1 . $postHtmlCl2;
            $postHtml .= '</div>';

            // for category click 
            if ($showNextPrev === true && isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
                $totalPosts = $query->found_posts;
                $currentPage = null;
                if ($totalPosts > intval($attr['numberOfPosts'])) {
                    $pagesOfPost = ceil($totalPosts / intval($attr['numberOfPosts']));
                    $currentPage = wp_json_encode(array("current" => 1, "total" => $pagesOfPost));
                }
                $returnObj = ["nextprev" => $currentPage];
            }
            // echo "</pre>";
            wp_reset_postdata();
            if ($showNextPrev === false) {
                return $postHtml;
            } else {
                $returnObj['html'] = $postHtml;
                return $returnObj;
            }
        }
    }
}
