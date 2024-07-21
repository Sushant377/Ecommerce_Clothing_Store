<?php
if (!defined('ABSPATH')) exit;
// ubl post section callback function
if (!function_exists('unlimited_blocks_section_five_post')) {
    function unlimited_blocks_section_five_post($attr)
    {

        $attr = unlimited_blocks_array_sanitize($attr);
        $args = [
            'post_type' => 'post',
            "meta_key" => '_thumbnail_id'
        ];
        if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
            $numberOfpost = $attr['numberOfPosts'];
            $args['posts_per_page'] = $numberOfpost;
            if (isset($attr["postCategories"]) && is_array($attr["postCategories"]) && !empty($attr["postCategories"])) {
                $args['category_name'] = join(',', $attr["postCategories"]);
            }
            $postalign   = isset($attr['align']) ? $attr["align"] : '';
            $query = new WP_Query($args);

            $currentPage = $postSetting = "";
            $totalPosts = $query->found_posts;
            $pagesOfPost = ceil($totalPosts / $numberOfpost);
            $currentPage = wp_json_encode(array("current" => 1, "total" => $pagesOfPost));
            $postSetting = wp_json_encode($attr);

            if ($query->have_posts()) {
                $postAuthor = isset($attr['author'][0]['enable']) && $attr['author'][0]['enable']  ? true : false;
                $postAuthor2 = isset($attr['author2'][0]['enable']) && $attr['author2'][0]['enable']  ? true : false;
                $postHtml = "<div class='ubl-section-post ubl-image-section post-layout-4 wp-block-group align".$postalign."' id='ubl-section-post'>";
                // loader
                $postHtml .= "<div class='ubl-block-loader linear-bubble'>";
                $postHtml .= "<div><span></span></div>";
                $postHtml .= "</div>";
                // loader
                // post title
                if (isset($attr['title'][0]['enable']) && $attr['title'][0]['enable'] && isset($attr['title'][0]['value']) && $attr['title'][0]['value'] != '') {
                    $titleHeadingStyle = isset($attr['title'][0]['backgroundColor']) && $attr['title'][0]['backgroundColor'] ? "background-color:" . $attr['title'][0]['backgroundColor'] . ";" : '';
                    $titleHeadingStyle .= isset($attr['title'][0]['color']) && $attr['title'][0]['color'] ? "color:" . $attr['title'][0]['color'] . ";" : '';
                    $titleHeadingStyle .= isset($attr['title'][0]['fontSize']) && intval($attr['title'][0]['fontSize']) ? "font-size:" . $attr['title'][0]['fontSize'] . "px;" : '';
                    $titleHeadingStyle .= isset($attr['title'][0]['fontWeight']) && intval($attr['title'][0]['fontWeight']) ? "font-weight:" . $attr['title'][0]['fontWeight'] . ";" : '';
                    // title block
                    $headingBlockStyle = isset($attr['title'][0]['align']) && $attr['title'][0]['align'] ? "justify-content:" . $attr['title'][0]['align'] . ";" : '';
                    $headingBlockStyle .= isset($attr['title'][0]['backgroundColor']) && $attr['title'][0]['backgroundColor'] ? "border-color:" . $attr['title'][0]['backgroundColor'] . ";" : '';
                    $postHtml .= '<div style="' . $headingBlockStyle . '" class="ubl-block-post-title" id="ubl-block-post-title">';
                    $postHtml .= '<h4 style="' . $titleHeadingStyle . '">';
                    $postHtml .= __($attr['title'][0]['value'], "unlimited-blocks");
                    $postHtml .= '</h4>';
                    $postHtml .= "</div>";
                }
                $contentAlign = isset($attr['layout'][0]['contentAlign']) && $attr['layout'][0]['contentAlign'] ? $attr['layout'][0]['contentAlign'] : '';
                $contentPlaced = isset($attr['layout'][0]['contentPlace']) && $attr['layout'][0]['contentPlace'] ? $attr['layout'][0]['contentPlace'] : '';
                $contentLayoutType = isset($attr['layout'][0]['type']) && intval($attr['layout'][0]['type']) ? intval($attr['layout'][0]['type']) : '';

                $postHtml .= "<div class='column-count parent-column-two count-3 post-five-layout-" . $contentLayoutType . " content-align-" . $contentAlign . " content-placed-" . $contentPlaced . "'  data-setting='" . $postSetting . "' data-currentpage='" . $currentPage . "'>";
                $checkFirst = true;

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

                $CountTwoLayout = 1;
                $columnOne = '<div><div class="column-count column-count-1">';
                $columnTwo = '<div><div class="column-count column-count-2">';
                while ($query->have_posts()) {
                    $query->the_post();
                    if ($contentLayoutType == 2) {
                        if ($CountTwoLayout > 4) {
                            $columnOne .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, [["enable" => true]], $layout_);
                        } else {
                            $CountTwoLayout++;
                            $columnTwo .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, [["enable" => true]], $layout_);
                        }
                    } else if ($contentLayoutType == 3) {
                        $postHtml .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, [["enable" => true]], $layout_);
                    } else {
                        if ($checkFirst) {
                            $checkFirst = false;
                            $columnOne .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, [["enable" => true]], $layout_);
                        } else {
                            $columnTwo .= unlimited_blocks_returnHtmlListPost($showCate2_, $heading2_, $postAuthor2, $metaStyle2_, $date2_, $Excerpt2_, $ShowTa2g, $args, [["enable" => true]], $layout_);
                        }
                    }
                }
                if ($contentLayoutType != 3) {
                    $columnOne .= "</div></div>";
                    $columnTwo .= "</div></div>";

                    if ($contentLayoutType == 2) {
                        $postHtml .= $columnTwo;
                        $postHtml .= $columnOne;
                    } else {
                        $postHtml .= $columnOne;
                        $postHtml .= $columnTwo;
                    }
                }

                $postHtml .= '</div>';

                if (isset($attr['meta_style'][0]['npEnable']) && ($attr['meta_style'][0]['npEnable'] == "true" || $attr['meta_style'][0]['npEnable'] == "1")) {
                    $nextPrevStyle = isset($attr['meta_style'][0]['npBgfontSize']) && intval($attr['meta_style'][0]['npBgfontSize']) ? "font-size:" . $attr['meta_style'][0]['npBgfontSize'] . "px;" : '';
                    $nextPrevStyle .= isset($attr['meta_style'][0]['npColor']) && $attr['meta_style'][0]['npColor'] ? "color:" . $attr['meta_style'][0]['npColor'] . ";" : '';
                    $nextPrevStyle .= isset($attr['meta_style'][0]['npBgColor']) && $attr['meta_style'][0]['npBgColor'] ? "background-color:" . $attr['meta_style'][0]['npBgColor'] . ";" : '';
                    $keepDisable = $totalPosts <= $numberOfpost ? "disable" : '';
                    $postHtml .= "<div class='ubl-two-post-wrapper-next-prev " . $keepDisable . "'>
                            <div data-section='five-post' style='" . $nextPrevStyle . "' class='ubl-image-section-np disable prev'>
                                <i class='fas fa-chevron-left'></i>
                            </div>
                            <div data-section='five-post' style='" . $nextPrevStyle . "' class='ubl-image-section-np next'>
                                <i class='fas fa-chevron-right'></i>
                            </div>
                        </div>";
                }

                $postHtml .= '</div>';

                wp_reset_postdata();
                return $postHtml;
            } else {
                return "<div>" . __('No post found.', "unlimited-blocks") . "</div>";
            }
        }
    }
}
