<?php
if (!defined('ABSPATH')) exit;
// ubl post callback function
if (!function_exists('unlimited_blocks_render_latest_post_block')) {
    function unlimited_blocks_render_latest_post_block($attr)
    {
        // attribute sanetize
        $attr = unlimited_blocks_array_sanitize($attr);
        $args = ['post_type' => 'post'];
        if (isset($attr['numberOfPosts']) && intval($attr['numberOfPosts'])) {
            $numberOfpost = $attr['numberOfPosts'];
            $args['posts_per_page'] = $numberOfpost;
            if (is_array($attr["postCategories"])  && !empty($attr["postCategories"])) {
                $args['category_name'] = join(',', $attr["postCategories"]);
            }
            if (isset($attr['thumbnail'][0]['typeShow']) && $attr['thumbnail'][0]['typeShow'] == "1") {
                $args['meta_key'] = '_thumbnail_id';
            }
            $postalign   = isset($attr['align']) ? $attr["align"] : '';
            $query = new WP_Query($args);
            $postHtml = '';
            $currentPage = $postSetting = "";
            $totalPosts = $query->found_posts;
            $pagesOfPost = ceil($totalPosts / $numberOfpost);
            $currentPage = wp_json_encode(array("current" => 1, "total" => $pagesOfPost));
            $postSetting = wp_json_encode($attr);
            if ($query->have_posts()) {
                $postAuthor = isset($attr['author'][0]['enable']) && $attr['author'][0]['enable'] == "true" ? true : false;
                $blockStyle = '';
                if (isset($attr['meta_style'][0]['blockBgColor']['type'])) {
                    if ($attr['meta_style'][0]['blockBgColor']['type'] == 'color') {
                        $blockStyle .= "background-color:" . $attr['meta_style'][0]['blockBgColor']['color'] . ";";
                    } else if ($attr['meta_style'][0]['blockBgColor']['type'] == 'gradient') {
                        $blockStyle .= "background-image:" . $attr['meta_style'][0]['blockBgColor']['gradient'] . ";";
                    }
                }
            
                if($attr['dimension'][0]['width']=='1'){
                $blockStyle .= isset($attr['dimension'][0]['width']) && isset($attr['dimension'][0]['custom_width']) && intval($attr['dimension'][0]['custom_width']) ? "max-width:" . $attr['dimension'][0]['custom_width'] . "px;" : '';
                }
                $postHtml .= '<div class="ubl-block-post list-layout ubl-image-section wp-block-group align'.$postalign.'" id="ubl-block-post" style="' . $blockStyle . '">';
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
                $imageAlign_ = isset($attr['meta_style'][0]['imageAlign']) && $attr['meta_style'][0]['imageAlign'] ? $attr['meta_style'][0]['imageAlign'] : '';
                $postHtml .= "<div class='list-layout-section column-count column-count-1 image-align-" . $imageAlign_  . "' data-setting='" . $postSetting . "' data-currentpage='" . $currentPage . "' style='grid-gap:{$attr['postgap']}px;'>";
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
                            $paginationLink .= '<div class="dots pagination"><span>...</span></div>';
                            $paginationLink .= '<div class="ubl-image-section-np pagination" data-page="' . $pagesOfPost . '" style="' . $nextPrevStyle . '">' . $pagesOfPost . '</div>';
                        }
                        $paginationLink .= '</section>';
                    }
                    $postHtml .= "<div class='ubl-two-post-wrapper-next-prev'>
                            <div data-section='list-post' style='" . $nextPrevStyle . "' class='ubl-image-section-np disable prev'>
                                <i class='fas fa-chevron-left'></i>
                            </div>";
                    $postHtml .= $paginationLink;
                    $postHtml .= "<div data-section='list-post' style='" . $nextPrevStyle . "' class='ubl-image-section-np next'>
                                <i class='fas fa-chevron-right'></i>
                            </div>
                        </div>";
                }
                $postHtml .= "</div>";
                wp_reset_postdata();
                return $postChecker ? $postHtml : false;
            } else {
                return "<div>" . __("No post found.", "unlimited-blocks") . "</div>";
            }
        }
    }
}


// new ---------------------------------------------------------------
if (!function_exists('unlimited_blocks_returnHtmlListPostNew')) {
    function unlimited_blocks_returnHtmlListPostNew($cate_, $heading__, $postAuthor, $meta_, $postDate, $postExcerpt__, $tags_, $category__in, $thumbnail = false, $layout = [])
    {

        // print_r($thumbnail);

        $postHtmlCl1 = "<article class='block-post-article'>";
        $postHtmlCl1 .= "<div class='post-wrapper' id='post-wrapper'>";
        if (((isset($thumbnail['typeShow']) && ($thumbnail['typeShow'] == 1 || $thumbnail['typeShow'] == 'all')) && $thumbnail['enable'] && get_the_post_thumbnail_url()) || (!isset($thumbnail['typeShow']) && $thumbnail['enable'] && get_the_post_thumbnail_url())) {
            $thumbnailStyle = isset($thumbnail['borderRadius']) ? "border-radius:" . $thumbnail['borderRadius'] . "px;" : '';
            $postHtmlCl1 .= '<div class="featured-image">';
            $postHtmlCl1 .= "<a href='" . esc_url(get_the_permalink()) . "'>";
            $postHtmlCl1 .= '<img style="' . $thumbnailStyle . '" src="' . esc_url(get_the_post_thumbnail_url()) . '"/>';
            $postHtmlCl1 .= '</a>';
            $postHtmlCl1 .= '</div>';
        }
        $layoutStyleBgClr = '';
        $layoutStyleBgClrType = isset($layout['overlayColor']['type']) && $layout['overlayColor']['type'] ? $layout['overlayColor']['type'] : '';
        if ($layoutStyleBgClrType == "color") {
            $layoutStyleBgClr .= "background-color:" . $layout['overlayColor']['color'] . ";";
        } else if ($layoutStyleBgClrType == "gradient") {
            $layoutStyleBgClr .= "background-image:" . $layout['overlayColor']['gradient'] . ";";
        }
        $layoutStyleBgClr .= isset($layout['overlayColor']['opacity']) ? "opacity:" . $layout['overlayColor']['opacity'] / 10 . ";" : '';
        // content style 
        $postContentStyle = '';
        if (isset($layout['contentAlign'])) {
            if ($layout['contentAlign'] == "bottom-left") {
                $postContentStyle .= "align-items:normal;";
            } else if ($layout['contentAlign'] == "bottom-center") {
                $postContentStyle .= "align-items:center;";
            } else if ($layout['contentAlign'] == "bottom-right") {
                $postContentStyle .= "align-items:flex-end;";
            } else if ($layout['contentAlign'] == "center") {
                $postContentStyle .= "align-items:center;justify-content:center;";
            }
        }
        $postContentStyle = $postContentStyle ? "style='" . $postContentStyle . "'" : '';

        $postHtmlCl1 .= "<div class='post-content-overlay' style='" . $layoutStyleBgClr . "'></div>";
        $postHtmlCl1 .= "<div class='post-content' " . $postContentStyle . ">";
        // category
        if (isset($cate_['enable']) && ($cate_['enable'] == 'true' || $cate_['enable'] == 1)) {
            $postHtmlCl1 .= '<p class="post-category">';
            $category_ = get_the_category();
            $category_ = json_encode($category_);
            $category_ = json_decode($category_, true);
            if (!empty($category_)) {
                $catestyle = isset($cate_['fontSize']) && intval($cate_['fontSize']) ? 'font-size:' . $cate_['fontSize'] . 'px;' : '';
                if ($cate_['customColor'] == "true" && isset($cate_['backgroundColor']) && isset($cate_['color'])) {
                    $catestyle .= 'background-color:' . $cate_['backgroundColor'] . ';color:' . $cate_['color'] . ';';
                }
                if (isset($category__in['category__in']) && is_array($category__in) && empty($category__in)) {
                    $category__in = $category__in['category__in'];
                    foreach ($category__in as $newArraycate) {
                        foreach ($category_ as $cateKKey => $cateValue_) {
                            if ($newArraycate == $cateValue_['term_id']) {
                                unset($category_[$cateKKey]);
                                array_unshift($category_, ['name' => $cateValue_['name'], 'term_id' => $cateValue_['term_id']]);
                            }
                        }
                    }
                }
                $countCate = 0;
                foreach ($category_ as $cateValue) {
                    if (isset($cate_['count']) && intval($cate_['count']) && $cate_['count'] == $countCate) break;
                    $postHtmlCl1 .= '<span style="' . $catestyle . '">';
                    $postHtmlCl1 .= "<a href='" . esc_url(get_category_link($cateValue['term_id'])) . "'>" . $cateValue['name'] . "</a>";
                    $postHtmlCl1 .= '</span>';
                    $countCate++;
                }
            }
            $postHtmlCl1 .= '</p>';
        }
        // category
        if (isset($heading__['tag']) && isset($heading__['color']) && isset($heading__['fontSize'])) {
            $postHtmlCl1 .= "<" . $heading__['tag'] . " style='color:" . $heading__['color'] . ";font-size:" . $heading__['fontSize'] . "px;' class='post-heading'>";
            $postHtmlCl1 .= "<a href='" . esc_url(get_the_permalink()) . "'>" . get_the_title() . "</a>";
            $postHtmlCl1 .= "</" . $heading__['tag'] . ">";
        }
        $postHtmlCl1 .= '<div class="post-meta-all">';
        $metaStyle = isset($meta_['color']) && isset($meta_['fontSize']) ? "color:" . $meta_['color'] . ";font-size:" . $meta_['fontSize'] . ";" : '';
        if ($postAuthor) {
            $postHtmlCl1 .= "<p style='" . $metaStyle . "' class='post-author'>";
            $postHtmlCl1 .= "<a target='_blank' href='" . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . "'>";
            $postHtmlCl1 .=  get_the_author();
            $postHtmlCl1 .= "</a></p>";
        }
        if (isset($postDate['enable']) && ($postDate['enable'] == 'true' || $postDate['enable'] == 1)) {
            $postHtmlCl1 .= $postAuthor ? '<span style="' . $metaStyle . '" class="slash">/</span>' : '';
            $dateYear =   get_the_date('Y');
            $dateMonth =   get_the_date('m');
            $dateDay =   get_the_date('j');
            $postHtmlCl1 .= "<p style='" . $metaStyle . "' class='post-date'>";
            $postHtmlCl1 .= "<a target='_blank' href='" . esc_url(get_day_link($dateYear, $dateMonth, $dateDay)) . "'>";
            $postHtmlCl1 .=  get_the_date();
            $postHtmlCl1 .= "</a></p>";
        }
        if (isset($postDate['last_modified']) && ($postDate['last_modified'] == 'true' || $postDate['last_modified'] == 1)) {
            $postHtmlCl1 .= ($postDate || $postAuthor) ? '<span style="' . $metaStyle . '" class="slash">/</span>' : '';
            $dateYear =   get_the_modified_date('Y');
            $dateMonth =   get_the_modified_date('m');
            $dateDay =   get_the_modified_date('j');
            $postHtmlCl1 .= "<p style='" . $metaStyle . "' class='post-date-last-modified'>";
            $postHtmlCl1 .= __("Modified", "unlimited-blocks") . ":<a target='_blank' href='" . esc_url(get_day_link($dateYear, $dateMonth, $dateDay)) . "'>";
            $postHtmlCl1 .=  get_the_modified_date();
            $postHtmlCl1 .= "</a></p>";
        }
        $postHtmlCl1 .= '</div>';
        if (isset($postExcerpt__["enable"]) && ($postExcerpt__["enable"] == "true" || $postExcerpt__["enable"] == 1)) {
            $postExcerpt = get_the_excerpt();
            $exLength = isset($postExcerpt__['words']) && $postExcerpt__['words']  ? $postExcerpt__['words'] : false;
            if ($exLength) {
                $postExcerpt = explode(" ", $postExcerpt);
                $postExcerpt = array_slice($postExcerpt, 0, $exLength);
                $postExcerpt = implode(" ", $postExcerpt);
            }
            $postExcerptStyle = isset($postExcerpt__["color"]) ? 'color:' . $postExcerpt__["color"] . ';' : '';
            $postExcerptStyle .= isset($postExcerpt__["fontSize"]) && intval($postExcerpt__["fontSize"]) ? 'font-size:' . $postExcerpt__["fontSize"] . ';' : '';
            $postHtmlCl1 .= "<p style='" . $postExcerptStyle . "' class='post-excerpt'>";
            $postHtmlCl1 .= $postExcerpt;
            $postHtmlCl1 .= "<a class='read-more' href='" . esc_url(get_the_permalink()) . "'>" . __('Read More', "unlimited-blocks") . "</a>";
            $postHtmlCl1 .= "</p>";
        }
        ///////////////////// tags
        if (isset($tags_['enable']) && ($tags_['enable'] == "true" || $tags_['enable'] == 1)) {
            $tags = get_the_tags(get_the_ID());
            $postHtmlCl1 .= '<p class="post-tags">';
            if (!empty($tags)) {
                $Tagstyle = isset($tags_['fontSize']) && intval($tags_['fontSize']) ? 'font-size:' . intval($tags_['fontSize']) . 'px;' : '';
                $Tagstyle .= isset($tags_['backgroundColor']) && $tags_['backgroundColor'] ? 'background-color:' . $tags_['backgroundColor'] . ';' : '';
                $Tagstyle .= isset($tags_['color']) && $tags_['color'] ? 'color:' . $tags_['color'] . ';' : '';
                $tagCount = 0;
                foreach ($tags as $tagValue) {
                    if ($tags_['count'] == $tagCount) break;
                    $postHtmlCl1 .= '<span style="' . $Tagstyle . '">';
                    $postHtmlCl1 .= "<a href='" . esc_url(get_category_link($tagValue->term_id)) . "'>" . $tagValue->name . "</a>";
                    $postHtmlCl1 .= '</span>';
                    $tagCount++;
                }
            }
            $postHtmlCl1 .= '</p>';
        }
        // tags
        $postHtmlCl1 .= "</div>";
        $postHtmlCl1 .= "</div>";
        $postHtmlCl1 .= "</article>";
        return $postHtmlCl1;
    }
}
// deprecated ---------------------------------------------------------------
if (!function_exists('unlimited_blocks_returnHtmlListPost')) {
    function unlimited_blocks_returnHtmlListPost($cate_, $heading__, $postAuthor, $meta_, $postDate, $postExcerpt__, $tags_, $category__in, $thumbnail = false, $layout = [])
    {
        $postHtmlCl1 = "<article class='block-post-article'>";
        $postHtmlCl1 .= "<div class='post-wrapper' id='post-wrapper'>";
        if (((isset($thumbnail[0]['typeShow']) && ($thumbnail[0]['typeShow'] == 1 || $thumbnail[0]['typeShow'] == 'all')) && $thumbnail[0]['enable'] && get_the_post_thumbnail_url()) || (!isset($thumbnail[0]['typeShow']) && $thumbnail[0]['enable'] && get_the_post_thumbnail_url())) {
            $thumbnailStyle = isset($thumbnail[0]['borderRadius']) ? "border-radius:" . $thumbnail[0]['borderRadius'] . "px;" : '';
            $postHtmlCl1 .= '<div class="featured-image">';
            $postHtmlCl1 .= "<a href='" . esc_url(get_the_permalink()) . "'>";
            $postHtmlCl1 .= '<img style="' . $thumbnailStyle . '" src="' . esc_url(get_the_post_thumbnail_url()) . '"/>';
            $postHtmlCl1 .= '</a>';
            $postHtmlCl1 .= '</div>';
        }
        $layoutStyleBgClr = '';
        $layoutStyleBgClrType = isset($layout['overlayColor']['type']) && $layout['overlayColor']['type'] ? $layout['overlayColor']['type'] : '';
        if ($layoutStyleBgClrType == "color") {
            $layoutStyleBgClr .= "background-color:" . $layout['overlayColor']['color'] . ";";
        } else if ($layoutStyleBgClrType == "gradient") {
            $layoutStyleBgClr .= "background-image:" . $layout['overlayColor']['gradient'] . ";";
        }
        $layoutStyleBgClr .= isset($layout['overlayColor']['opacity']) ? "opacity:" . $layout['overlayColor']['opacity'] / 10 . ";" : '';
        // content style 
        $postContentStyle = '';
        if (isset($layout['contentAlign'])) {
            if ($layout['contentAlign'] == "bottom-left") {
                $postContentStyle .= "align-items:normal;";
            } else if ($layout['contentAlign'] == "bottom-center") {
                $postContentStyle .= "align-items:center;";
            } else if ($layout['contentAlign'] == "bottom-right") {
                $postContentStyle .= "align-items:flex-end;";
            } else if ($layout['contentAlign'] == "center") {
                $postContentStyle .= "align-items:center;justify-content:center;";
            }
        }
        $postContentStyle = $postContentStyle ? "style='" . $postContentStyle . "'" : '';

        $postHtmlCl1 .= "<div class='post-content-overlay' style='" . $layoutStyleBgClr . "'></div>";
        $postHtmlCl1 .= "<div class='post-content' " . $postContentStyle . ">";
        // category
        if (isset($cate_[0]['enable']) && ($cate_[0]['enable'] == 'true' || $cate_[0]['enable'] == 1)) {
            $postHtmlCl1 .= '<p class="post-category">';
            $category_ = get_the_category();
            $category_ = json_encode($category_);
            $category_ = json_decode($category_, true);
            if (!empty($category_)) {
                $catestyle = isset($cate_[0]['fontSize']) && intval($cate_[0]['fontSize']) ? 'font-size:' . $cate_[0]['fontSize'] . 'px;' : '';
                if ($cate_[0]['customColor'] == "true" && isset($cate_[0]['backgroundColor']) && isset($cate_[0]['color'])) {
                    $catestyle .= 'background-color:' . $cate_[0]['backgroundColor'] . ';color:' . $cate_[0]['color'] . ';';
                }
                if (isset($category__in['category__in']) && is_array($category__in) && empty($category__in)) {
                    $category__in = $category__in['category__in'];
                    foreach ($category__in as $newArraycate) {
                        foreach ($category_ as $cateKKey => $cateValue_) {
                            if ($newArraycate == $cateValue_['term_id']) {
                                unset($category_[$cateKKey]);
                                array_unshift($category_, ['name' => $cateValue_['name'], 'term_id' => $cateValue_['term_id']]);
                            }
                        }
                    }
                }
                $countCate = 0;
                foreach ($category_ as $cateValue) {
                    if (isset($cate_[0]['count']) && intval($cate_[0]['count']) && $cate_[0]['count'] == $countCate) break;
                    $postHtmlCl1 .= '<span style="' . $catestyle . '">';
                    $postHtmlCl1 .= "<a href='" . esc_url(get_category_link($cateValue['term_id'])) . "'>" . $cateValue['name'] . "</a>";
                    $postHtmlCl1 .= '</span>';
                    $countCate++;
                }
            }
            $postHtmlCl1 .= '</p>';
        }
        // category
        if (isset($heading__[0]['tag']) && isset($heading__[0]['color']) && isset($heading__[0]['fontSize'])) {
            $postHtmlCl1 .= "<" . $heading__[0]['tag'] . " style='color:" . $heading__[0]['color'] . ";font-size:" . $heading__[0]['fontSize'] . "px;' class='post-heading'>";
            $postHtmlCl1 .= "<a href='" . esc_url(get_the_permalink()) . "'>" . get_the_title() . "</a>";
            $postHtmlCl1 .= "</" . $heading__[0]['tag'] . ">";
        }
        $postHtmlCl1 .= '<div class="post-meta-all">';
        $metaStyle = isset($meta_[0]['color']) && isset($meta_[0]['fontSize']) ? "color:" . $meta_[0]['color'] . ";font-size:" . $meta_[0]['fontSize'] . ";" : '';
        if ($postAuthor) {
            $postHtmlCl1 .= "<p style='" . $metaStyle . "' class='post-author'>";
            $postHtmlCl1 .= "<a target='_blank' href='" . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . "'>";
            $postHtmlCl1 .=  get_the_author();
            $postHtmlCl1 .= "</a></p>";
        }
        if (isset($postDate[0]['enable']) && ($postDate[0]['enable'] == 'true' || $postDate[0]['enable'] == 1)) {
            $postHtmlCl1 .= $postAuthor ? '<span style="' . $metaStyle . '" class="slash">/</span>' : '';
            $dateYear =   get_the_date('Y');
            $dateMonth =   get_the_date('m');
            $dateDay =   get_the_date('j');
            $postHtmlCl1 .= "<p style='" . $metaStyle . "' class='post-date'>";
            $postHtmlCl1 .= "<a target='_blank' href='" . esc_url(get_day_link($dateYear, $dateMonth, $dateDay)) . "'>";
            $postHtmlCl1 .=  get_the_date();
            $postHtmlCl1 .= "</a></p>";
        }
        if (isset($postDate[0]['last_modified']) && ($postDate[0]['last_modified'] == 'true' || $postDate[0]['last_modified'] == 1)) {
            $postHtmlCl1 .= ($postDate || $postAuthor) ? '<span style="' . $metaStyle . '" class="slash">/</span>' : '';
            $dateYear =   get_the_modified_date('Y');
            $dateMonth =   get_the_modified_date('m');
            $dateDay =   get_the_modified_date('j');
            $postHtmlCl1 .= "<p style='" . $metaStyle . "' class='post-date-last-modified'>";
            $postHtmlCl1 .= __("Modified", "unlimited-blocks") . ":<a target='_blank' href='" . esc_url(get_day_link($dateYear, $dateMonth, $dateDay)) . "'>";
            $postHtmlCl1 .=  get_the_modified_date();
            $postHtmlCl1 .= "</a></p>";
        }
        $postHtmlCl1 .= '</div>';
        if (isset($postExcerpt__[0]["enable"]) && ($postExcerpt__[0]["enable"] == "true" || $postExcerpt__[0]["enable"] == 1)) {
            $postExcerpt = get_the_excerpt();
            $exLength = isset($postExcerpt__[0]['words']) && $postExcerpt__[0]['words']  ? $postExcerpt__[0]['words'] : false;
            if ($exLength) {
                $postExcerpt = explode(" ", $postExcerpt);
                $postExcerpt = array_slice($postExcerpt, 0, $exLength);
                $postExcerpt = implode(" ", $postExcerpt);
            }
            $postExcerptStyle = isset($postExcerpt__[0]["color"]) ? 'color:' . $postExcerpt__[0]["color"] . ';' : '';
            $postExcerptStyle .= isset($postExcerpt__[0]["fontSize"]) && intval($postExcerpt__[0]["fontSize"]) ? 'font-size:' . $postExcerpt__[0]["fontSize"] . ';' : '';
            $postHtmlCl1 .= "<p style='" . $postExcerptStyle . "' class='post-excerpt'>";
            $postHtmlCl1 .= $postExcerpt;
            $postHtmlCl1 .= "<a class='read-more' href='" . esc_url(get_the_permalink()) . "'>" . __('Read More', "unlimited-blocks") . "</a>";
            $postHtmlCl1 .= "</p>";
        }
        ///////////////////// tags
        if (isset($tags_[0]['enable']) && ($tags_[0]['enable'] == "true" || $tags_[0]['enable'] == 1)) {
            $tags = get_the_tags(get_the_ID());
            $postHtmlCl1 .= '<p class="post-tags">';
            if (!empty($tags)) {
                $Tagstyle = isset($tags_[0]['fontSize']) && intval($tags_[0]['fontSize']) ? 'font-size:' . intval($tags_[0]['fontSize']) . 'px;' : '';
                $Tagstyle .= isset($tags_[0]['backgroundColor']) && $tags_[0]['backgroundColor'] ? 'background-color:' . $tags_[0]['backgroundColor'] . ';' : '';
                $Tagstyle .= isset($tags_[0]['color']) && $tags_[0]['color'] ? 'color:' . $tags_[0]['color'] . ';' : '';
                $tagCount = 0;
                foreach ($tags as $tagValue) {
                    if ($tags_[0]['count'] == $tagCount) break;
                    $postHtmlCl1 .= '<span style="' . $Tagstyle . '">';
                    $postHtmlCl1 .= "<a href='" . esc_url(get_category_link($tagValue->term_id)) . "'>" . $tagValue->name . "</a>";
                    $postHtmlCl1 .= '</span>';
                    $tagCount++;
                }
            }
            $postHtmlCl1 .= '</p>';
        }
        // tags
        $postHtmlCl1 .= "</div>";
        $postHtmlCl1 .= "</div>";
        $postHtmlCl1 .= "</article>";
        return $postHtmlCl1;
    }
}
