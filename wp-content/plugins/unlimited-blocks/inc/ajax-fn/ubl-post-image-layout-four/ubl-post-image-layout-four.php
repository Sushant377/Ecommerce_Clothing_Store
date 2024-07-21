<?php
if (!defined('ABSPATH')) exit;
if (!function_exists("unlimited_blocks_post_image_four_post")) {
    function unlimited_blocks_post_image_four_post()
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
                    "meta_key" => '_thumbnail_id'
                ];
                if (isset($attr["postCategories"]) && is_array($attr["postCategories"]) && !empty($attr["postCategories"])) {
                    $args['category_name'] = join(',', $attr["postCategories"]);
                }
                echo unlimited_blocks_post_image_four_post_html($args, $attr) ? unlimited_blocks_post_image_four_post_html($args, $attr) : 0;
                die();
            }
        }
    }
    add_action('wp_ajax_unlimited_section_post_image_four_post', "unlimited_blocks_post_image_four_post");
    add_action('wp_ajax_nopriv_unlimited_section_post_image_four_post', "unlimited_blocks_post_image_four_post");
}
// return html function
if (!function_exists('unlimited_blocks_post_image_four_post_html')) {
    function unlimited_blocks_post_image_four_post_html($args, $attr)
    {
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            $postAuthor = isset($attr['author'][0]['enable']) && $attr['author'][0]['enable'] == "true"  ? true : false;
            $postAuthor2 = isset($attr['author2'][0]['enable']) && $attr['author2'][0]['enable']  == "true" ? true : false;
            $layout_ = isset($attr['layout'][0]) ? $attr['layout'][0] : false;
            $showCate_ = isset($attr['showCate']) ? $attr["showCate"] : false;
            $heading_ = isset($attr['heading']) ? $attr["heading"] : false;
            $metaStyle_ = isset($attr['meta_style']) ? $attr["meta_style"] : false;
            $Excerpt_ = isset($attr['excerpt']) ? $attr["excerpt"] : false;
            $ShowTag  = isset($attr['showTag']) ? $attr["showTag"] : false;
            $date_ = isset($attr['date']) ? $attr["date"] : false;
            // secondary
            $showCate2_ = isset($attr['showCate2']) ? $attr["showCate2"] : false;
            $heading2_ = isset($attr['heading2']) ? $attr["heading2"] : false;
            $metaStyle2_ = isset($attr['meta_style2']) ? $attr["meta_style2"] : false;
            $Excerpt2_ = isset($attr['excerpt2']) ? $attr["excerpt2"] : false;
            $ShowTa2g  = isset($attr['showTag2']) ? $attr["showTag2"] : false;
            $date2_ = isset($attr['date2']) ? $attr["date2"] : false;
            $contentLayoutType = isset($attr['layout'][0]['type']) && intval($attr['layout'][0]['type']) ? intval($attr['layout'][0]['type']) : '';
            $postHtml = "";
            if ($contentLayoutType == 3 || $contentLayoutType == 4) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $postHtml .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, [["enable" => true]], $layout_);
                }
            } else {
                $checkFirst = $checkTwo = true;
                $checkForTwo = 1;
                $columnOne = '<div class="column-one">';
                $columnTwo = '<div class="column-two">';
                $columnTwo1 = "";
                $columnTwo2 = "<div>";
                while ($query->have_posts()) {
                    $query->the_post();
                    ////////////////////
                    if ($contentLayoutType == 2) {
                        if ($checkForTwo <= 3) {
                            $checkForTwo++;
                            if ($checkTwo) {
                                $checkTwo = false;
                                $columnTwo1 .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, [["enable" => true]], $layout_);
                            } else {
                                $columnTwo2 .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, [["enable" => true]], $layout_);
                            }
                        } else {
                            $columnTwo .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, [["enable" => true]], $layout_);
                        }
                    } else {
                        if ($checkFirst) {
                            $checkFirst = false;
                            $columnOne .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, [["enable" => true]], $layout_);
                        } else {
                            if ($checkTwo) {
                                $checkTwo = false;
                                $columnTwo1 .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, [["enable" => true]], $layout_);
                            } else {
                                $columnTwo2 .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, [["enable" => true]], $layout_);
                            }
                        }
                    }
                }
                $columnTwo2 .= "</div>";
                if ($contentLayoutType == 2) {
                    $columnOne .= $columnTwo1 . $columnTwo2 . "</div>";
                    $columnTwo .= "</div>";
                } else {
                    $columnOne .= "</div>";
                    $columnTwo .= $columnTwo1 . $columnTwo2 . "</div>";
                }

                $postHtml .= $columnOne;
                $postHtml .= $columnTwo;
            }
            wp_reset_postdata();
            return $postHtml;
        }
    }
}
