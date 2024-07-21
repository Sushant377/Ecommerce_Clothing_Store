<?php
// ubl post callback function
if (!defined('ABSPATH')) exit;
if (!function_exists('unlimited_blocks_two_column_block')) {
    function unlimited_blocks_two_column_block($attr)
    {
        $attr = unlimited_blocks_array_sanitize($attr);
        $args = ['post_type' => 'post'];
        if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
            $numberOfpost = $attr['numberOfPosts'];
            $args['posts_per_page'] = $numberOfpost;
            if (isset($attr['thumbnail'][0]['enable']) && $attr['thumbnail'][0]['enable']) {
                $args['meta_key'] = "_thumbnail_id";
            }
            $fourAndMoreNav = [];
            if (isset($attr["postCategories"]) && is_array($attr["postCategories"])  && !empty($attr["postCategories"])) {
                $args['category_name'] = join(',', $attr["postCategories"]);
                $fourAndMoreNav = $attr["postCategories"];
            } else {
                $cateGory = get_categories(['hide_empty' => true]);
                if (!empty($cateGory)) {
                    foreach ($cateGory as $cate_value_) {
                        $fourAndMoreNav[] =  $cate_value_->slug;
                    }
                }
            }
            // inner and outer making
            $innerITem = $outerItem = [];
            if (isset($attr["categorynav"][0]['enable']) && $attr["categorynav"][0]['enable'] && count($fourAndMoreNav) > 0) {
                if (count($fourAndMoreNav) <= 4) {
                    $innerITem = $fourAndMoreNav;
                } else {
                    $innerITem = array_slice($fourAndMoreNav, 0, 4);
                    $outerItem = array_slice($fourAndMoreNav, 4);
                }
            }
            $query = new WP_Query($args);
            $totalPosts = $query->found_posts;
            $pagesOfPost = ceil($totalPosts / $numberOfpost);
            $currentPage = wp_json_encode(array("current" => 1, "total" => $pagesOfPost));
            $postSetting = wp_json_encode($attr);
            $blockBgType = isset($attr['meta_style'][0]['blockBgColor']['type']) && $attr['meta_style'][0]['blockBgColor']['type'] ? $attr['meta_style'][0]['blockBgColor']['type'] : '';
            $blockBgColor = '';
            if ($blockBgType == "color") {
                $blockBgColor = "background-color:" . $attr['meta_style'][0]['blockBgColor']['color'] . ";";
            } else if ($blockBgType == "gradient") {
                $blockBgColor = "background-image:" . $attr['meta_style'][0]['blockBgColor']['gradient'] . ";";
            }
            $postalign   = isset($attr['align']) ? $attr["align"] : '';
            $postHtml = "<div class='ubl-two-col-container wp-block-group align".$postalign."' style='" . $blockBgColor . "'>";
            // loader
            $postHtml .= "<div class='ubl-block-loader linear-bubble'>";
            $postHtml .= "<div><span></span></div>";
            $postHtml .= "</div>";
            // loader

            if (count($innerITem) > 0 || (isset($attr['title'][0]["enable"]))) {
                $borderStyle = isset($attr['meta_style'][0]['underLine']) && $attr['meta_style'][0]['underLine'] && isset($attr['meta_style'][0]['underLineColor']) && $attr['meta_style'][0]['underLineColor'] ? "border-color:" . $attr['meta_style'][0]['underLineColor'] . ";" : '';
                $postHtml .= "<div class='navigation_' style='" . $borderStyle . "'>";
                if (isset($attr['title'][0]['enable']) && $attr['title'][0]['enable'] && isset($attr['title'][0]['value']) && $attr['title'][0]['value'] != '') {
                    $titleAttrs = $attr['title'][0];
                    $titleHeadingStyle = isset($titleAttrs['bgColor']) && $titleAttrs['bgColor'] ? "background-color:" . $titleAttrs['bgColor'] . ";" : '';
                    $titleHeadingStyle .= isset($titleAttrs['color']) && $titleAttrs['color'] ? "color:" . $titleAttrs['color'] . ";" : '';
                    $titleHeadingStyle .= isset($titleAttrs['fontSize']) && intval($titleAttrs['fontSize']) ? "font-size:" . $titleAttrs['fontSize'] . "px;" : '';

                    $postHtml .= '<div class="nav-heading">';
                    $postHtml .= '<h4 style="' . $titleHeadingStyle . '">';
                    $postHtml .= __($titleAttrs['value'], "unlimited-blocks");
                    $postHtml .= '</h4></div>';
                }
                if (count($innerITem) > 0) {
                    $navItemStyle = isset($attr["categorynav"][0]['fontSize']) && intval($attr["categorynav"][0]['fontSize']) ? 'font-size:' . $attr["categorynav"][0]['fontSize'] . 'px;' : '';
                    $navItemStyle .= isset($attr["categorynav"][0]['color']) && intval($attr["categorynav"][0]['color']) ? 'color:' . $attr["categorynav"][0]['color'] . ';' : '';
                    $navItemStyle .= isset($attr["categorynav"][0]['backgroundColor']) && intval($attr["categorynav"][0]['backgroundColor']) ? 'background-color:' . $attr["categorynav"][0]['backgroundColor'] . ';' : '';
                    // linear items
                    $postHtml .= "<div class='ubl-block-nav-items nav-linear-items'>";
                    $postHtml .= "<ul>";
                    $postHtml .= '<li class="cat-item"><a style="' . $navItemStyle . '" href="#" data-cateSlug="all">' . __('all', "unlimited-blocks") . '</a></li>';
                    foreach ($innerITem as $innerITem_value) {
                        $postHtml .= '<li class="cat-item"><a style="' . $navItemStyle . '" href="#" data-cateSlug="' . $innerITem_value . '">' . get_category_by_slug($innerITem_value)->name . '</a></li>';
                    }
                    $postHtml .= "</ul>";
                    $postHtml .= "</div>";
                    // dropdown items
                    if (!empty($outerItem)) {
                        $postHtml .= "<div class='ubl-block-nav-items nav-drop-items'>";
                        $postHtml .= "<span style='" . $navItemStyle . "' class='more-opener'>" . __("More", "unlimited-blocks") . "<i class='fas fa-chevron-down'></i></span>";
                        $postHtml .= "<ul>";
                        foreach ($outerItem as $outerItem_value) {
                            $postHtml .= '<li class="cat-item"><a style="' . $navItemStyle . '" href="#" data-cateSlug="' . $outerItem_value . '">' . get_category_by_slug($outerItem_value)->name . '</a></li>';
                        }
                        $postHtml .= "</ul>";
                        $postHtml .= "</div>";
                    }
                }
                // dropdown items
                $postHtml .= "</div>";
            }
            // category navigation
            $layoutPosition = isset($attr['meta_style'][0]["layoutPosition"]) && $attr['meta_style'][0]["layoutPosition"] ? $attr['meta_style'][0]["layoutPosition"] : '';
            $postHtml .= "<div class='ubl-two-post-wrapper' data-setting='" . $postSetting . "' data-currentpage='" . $currentPage . "'><div class='ubl-post-two-column column-layout-" . $layoutPosition . "'>";
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
                // if ($totalPosts > $attr['numberOfPosts']) {
                $keepDisable = $totalPosts <= $numberOfpost ? "disable" : '';
                $nextPrevStyle = isset($attr['meta_style'][0]['npBgfontSize']) && intval($attr['meta_style'][0]['npBgfontSize']) ? "font-size:" . $attr['meta_style'][0]['npBgfontSize'] . "px;" : '';
                $nextPrevStyle .= isset($attr['meta_style'][0]['npColor']) && $attr['meta_style'][0]['npColor'] ? "color:" . $attr['meta_style'][0]['npColor'] . ";" : '';
                $nextPrevStyle .= isset($attr['meta_style'][0]['npBgColor']) && $attr['meta_style'][0]['npBgColor'] ? "background-color:" . $attr['meta_style'][0]['npBgColor'] . ";" : '';
                $postHtml .= "<div class='ubl-two-post-wrapper-next-prev " . $keepDisable . "'>
                            <div style='" . $nextPrevStyle . "' class='ubl-post-NP-btn disable prev'>
                                <i class='fas fa-chevron-left'></i>
                            </div>
                            <div style='" . $nextPrevStyle . "' class='ubl-post-NP-btn next'>
                                <i class='fas fa-chevron-right'></i>
                            </div>
                        </div>";
                // }
                $postHtml .= '</div>';
                $postHtml .= '</div>';
                // echo "</pre>";
                wp_reset_postdata();
                return $postHtml;
            } else {
                return "<div>" . __("No post found.", "unlimited-blocks") . "</div>";
            }
        }
    }
}
