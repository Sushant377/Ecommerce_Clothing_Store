<?php
if (!defined('ABSPATH')) exit;
// ubl post callback function
if (!function_exists('unlimited_blocks_post_grid_block')) {
    function unlimited_blocks_post_grid_block($attr)
    {
        // attribute sanetize
        $attr = unlimited_blocks_array_sanitize($attr);
        $args = ['meta_key' => '_thumbnail_id', 'post_type' => 'post'];
        if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
            $numberOfpost = $attr['numberOfPosts'];
            $args['posts_per_page'] = $numberOfpost;
            if (isset($attr["postCategories"]) && is_array($attr["postCategories"]) && !empty($attr["postCategories"])) {
                $args['category_name'] = join(',', $attr["postCategories"]);
            }
            $postThumbnail = isset($attr['thumbnail'][0]['typeShow']) ? $attr['thumbnail'][0]['typeShow'] : '';
            if ($postThumbnail == "1") {
                $args['meta_key'] = '_thumbnail_id';
            }
            // typeShow
            $query = new WP_Query($args);
            $postHtml = '';
            if ($query->have_posts()) {
                $currentPage = $postSetting = "";
                $totalPosts = $query->found_posts;
                $pagesOfPost = ceil($totalPosts / $numberOfpost);
                $currentPage = wp_json_encode(array("current" => 1, "total" => $pagesOfPost));
                $postSetting = wp_json_encode($attr);
                $postAuthor = isset($attr['author'][0]['enable']) && $attr['author'][0]['enable']  ? true : false;
                $metaLeftBorder = isset($attr['meta_style'][0]['left_border']) && $attr['meta_style'][0]['left_border']  ? "left-border" : "";

                $blockBgType = isset($attr['meta_style'][0]['blockBgColor']['type']) && $attr['meta_style'][0]['blockBgColor']['type'] ? $attr['meta_style'][0]['blockBgColor']['type'] : '';
                $blockBgColor = '';
                if ($blockBgType == "color") {
                    $blockBgColor = "background-color:" . $attr['meta_style'][0]['blockBgColor']['color'] . ";";
                } else if ($blockBgType == "gradient") {
                    $blockBgColor = "background-image:" . $attr['meta_style'][0]['blockBgColor']['gradient'] . ";";
                }

                $postalign   = isset($attr['align']) ? $attr["align"] : '';
                $postHtml .= '<div class="ubl-block-post ubl-image-section wp-block-group align'.$postalign.'" id="ubl-block-post" style="' . $blockBgColor . '">';
                // post title
                // loader
                $postHtml .= "<div class='ubl-block-loader linear-bubble'>";
                $postHtml .= "<div><span></span></div>";
                $postHtml .= "</div>";
                // loader
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
                $gridColumn = isset($attr['numberOfColumn']) && intval($attr['numberOfColumn']) ? $attr['numberOfColumn'] : '';
                $postHtml .= "<div class='grid-layout-section column-count column-count-" . $gridColumn . " " . $metaLeftBorder . "' data-setting='" . $postSetting . "' data-currentpage='" . $currentPage . "'>";
                $postChecker = false;
                $showCate_ = isset($attr['showCate']) ? $attr["showCate"] : false;
                $heading_ = isset($attr['heading']) ? $attr["heading"] : false;
                $metaStyle_ = isset($attr['meta_style']) ? $attr["meta_style"] : false;
                $Excerpt_ = isset($attr['excerpt']) ? $attr["excerpt"] : false;
                $ShowTag  = isset($attr['showTag']) ? $attr["showTag"] : false;
                $thumbnail_ = isset($attr['thumbnail']) ? $attr["thumbnail"] : false;
                $date_ = isset($attr['date']) ? $attr["date"] : false;
                while ($query->have_posts()) {
                    $query->the_post();
                    if (!$postChecker) {
                        $postChecker = true;
                    }
                    $postHtml .= unlimited_blocks_returnHtmlListPost($showCate_, $heading_, $postAuthor, $metaStyle_, $date_, $Excerpt_, $ShowTag, $args, $thumbnail_);
                }
                $postHtml .= "</div>";
                if (($totalPosts > $numberOfpost) && isset($attr['meta_style'][0]['npEnable']) && ($attr['meta_style'][0]['npEnable'] == "true" || $attr['meta_style'][0]['npEnable'] == "1")) {
                    $nextPrevStyle = isset($attr['meta_style'][0]['npBgfontSize']) && intval($attr['meta_style'][0]['npBgfontSize']) ? "font-size:" . $attr['meta_style'][0]['npBgfontSize'] . "px;" : '';
                    $nextPrevStyle .= isset($attr['meta_style'][0]['npColor']) && $attr['meta_style'][0]['npColor'] ? "color:" . $attr['meta_style'][0]['npColor'] . ";" : '';
                    $nextPrevStyle .= isset($attr['meta_style'][0]['npBgColor']) && $attr['meta_style'][0]['npBgColor'] ? "background-color:" . $attr['meta_style'][0]['npBgColor'] . ";" : '';

                    $paginationLink = '';
                    if (isset($attr['meta_style'][0]['npPagination']) && ($attr['meta_style'][0]['npPagination'] == "true" || $attr['meta_style'][0]['npPagination'] == "1")) {
                        $paginationLink .= '<section class="paginationNumbers">';
                        $pagesOfPost = $pagesOfPost < 4 ? $pagesOfPost : 4;
                        for ($it = 1; $it <= $pagesOfPost; $it++) {
                            $disabled_ = "";
                            if ($it == 1) {
                                $disabled_ = "disable";
                            }
                            $paginationLink .= '<div class="ubl-image-section-np ' . $disabled_ . ' pagination" data-page="' . $it . '" style="' . $nextPrevStyle . '">' . $it . '</div>';
                        }
                        if ($pagesOfPost >= 4) {
                            $paginationLink .= '<div class="dots pagination" ><span>...</span></div>';
                            $paginationLink .= '<div class="ubl-image-section-np pagination" data-page="' . $pagesOfPost . '" style="' . $nextPrevStyle . '">' . $pagesOfPost . '</div>';
                        }
                        $paginationLink .= '</section>';
                    }
                    $postHtml .= "<div class='ubl-two-post-wrapper-next-prev'>
                                <div data-section='grid-post' style='" . $nextPrevStyle . "' class='ubl-image-section-np disable prev'>
                                    <i class='fas fa-chevron-left'></i>
                                </div>";
                    $postHtml .= $paginationLink;
                    $postHtml .= "<div data-section='grid-post' style='" . $nextPrevStyle . "' class='ubl-image-section-np next'>
                                    <i class='fas fa-chevron-right'></i>
                                </div>
                            </div>";
                }
                $postHtml .= "</div>";
                // echo "</pre>";
                wp_reset_postdata();
                return $postChecker ? $postHtml : false;
            } else {
                return "<div>" . __('No post found.', "unlimited-blocks") . "</div>";
            }
        }
    }
}
