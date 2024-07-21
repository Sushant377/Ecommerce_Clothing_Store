<?php
if (!defined('ABSPATH')) exit;
// ubl post slider callback function
if (!function_exists('unlimited_blocks_render_post_slider')) {
    function unlimited_blocks_render_post_slider($attr)
    {
        $attr = unlimited_blocks_array_sanitize($attr);
        // echo "<pre>";
        // print_r($attr);
        // echo "</pre>";
        // return;
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
            $query = new WP_Query($args);
            $postHtml = '';
            if ($query->have_posts()) {
                $postAuthor = isset($attr['author']['enable']) && $attr['author']['enable']  ? true : false;
                $postDate = isset($attr['date']['enable']) && $attr['date']['enable']  ? true : false;
                $postDateModify = isset($attr['date']['last_modified']) && $attr['date']['last_modified']  ? true : false;
                $postExcerpt = isset($attr['excerpt']['enable']) && $attr['excerpt']['enable']  ? true : false;
                $postExcerptColor = $postExcerpt && $attr['excerpt']['color'] ? $attr['excerpt']['color'] : "";
                $metaStyleColor = isset($attr['meta_style']['color']) && $attr['meta_style']['color']  ? $attr['meta_style']['color'] : "";
                $metaStyleFontSize = isset($attr['meta_style']['fontSize']) && $attr['meta_style']['fontSize']  ? $attr['meta_style']['fontSize'] : "";
                $metashowCate = isset($attr['showCate']['enable']) && $attr['showCate']['enable']  ? true : false;
                $metashowshowTag = isset($attr['showTag']['enable']) && $attr['showTag']['enable']  ? true : false;

                // -------------------------------------------------------------------------------- ----------------------------
                $postHtml = "";
                $sliderAttr = $attr['sliderSetting'];

                // add style -----------------------------------------------------------_+++++++++++++++++++++++++++++++++++
                $addStyles = [];
                $WrapperID = '.' . $attr['wrapper_id'] . ".ubl-post-slider-wrapper";
                // overlay color 
                $overLayColor = '';
                if (isset($sliderAttr["overlayColor"]['type'])) {
                    if ($sliderAttr["overlayColor"]['type'] == "color" && isset($sliderAttr["overlayColor"]['color'])) {
                        $overLayColor .= "background-color:" . $sliderAttr["overlayColor"]['color'] . ";";
                    } else if ($sliderAttr["overlayColor"]['type'] == "gradient"   && isset($sliderAttr["overlayColor"]['gradient'])) {
                        $overLayColor .= "background-image:" . $sliderAttr["overlayColor"]['gradient'] . ";";
                    }
                    $overLayColor .= "opacity:" . $sliderAttr["overlayColor"]['opacity'] / 10 . ";";
                }
                if ($overLayColor) {
                    $addStyles[] = [
                        'selector' =>  "{$WrapperID} .ubl-post-overlay-color",
                        'css' => $overLayColor
                    ];
                }

                // price style
                $styleAdd = wp_json_encode($addStyles);
                // add style -----------------------------------------------------------_+++++++++++++++++++++++++++++++++++

                $postHtml .= "<div class='ubl-post-slider-wrapper wp-block-group {$attr['wrapper_id']} align{$attr['align']}' ubl-block-style='{$styleAdd}'>"; //------------------------------------------------------------+++++++wrapper+++++++++
                // slider wrapper 
                $sliderSetting = [];
                if ($sliderAttr['sliderEffect'] !== 'slideEffect') {
                    $sliderSetting['fade'] = true;
                }
                if ($sliderAttr['triggerActive'] == 'both' || $sliderAttr['triggerActive'] == 'arrows') {
                    $sliderSetting['arrows'] = true;
                    $styleLeftRight = "font-size:{$sliderAttr['leftRightTrigger']['fontSize']}px;color:{$sliderAttr['leftRightTrigger']['color']};";
                    $postHtml .= "<div class='ubl-slick-slider-arrow prev_' style='{$styleLeftRight}'>
                                    <i class='fas fa-chevron-circle-left'></i>
                            </div>
                            <div class='ubl-slick-slider-arrow next_' style='{$styleLeftRight}'>
                                        <i class='fas fa-chevron-circle-right'></i>
                            </div>";
                }
                if ($sliderAttr['triggerActive'] == 'both' || $sliderAttr['triggerActive'] == 'dots') {
                    $sliderSetting['dots'] = true;
                }
                if ($sliderAttr['autoTrigger'] == 'true') {
                    $sliderSetting['autoplay'] = true;
                    $sliderSetting['autoplaySpeed'] = intval($sliderAttr['autoTriggerDelay']) * 1000;
                }
                if ($sliderAttr['numberOfcolumn'] > 1) {
                    $sliderSetting['slidesToShow'] = $sliderAttr['numberOfcolumn'];
                    $sliderSetting['slidesToScroll'] = $sliderAttr['numberOfcolumn'];
                }
                if ($sliderAttr['numberOfRow'] > 1) {
                    $sliderSetting['rows'] = intval($sliderAttr['numberOfRow']);
                }




                // {
                //     breakpoint: 1024,
                //     settings: {
                //       slidesToShow: 3,
                //       slidesToScroll: 3,
                //       infinite: true,
                //       dots: true
                //     }
                //   },
                //   {
                //     breakpoint: 600,
                //     settings: {
                //       slidesToShow: 2,
                //       slidesToScroll: 2
                //     }
                //   },
                //   {
                //     breakpoint: 480,
                //     settings: {
                //       slidesToShow: 1,
                //       slidesToScroll: 1
                //     }
                //   }


                // if (sliderSetting.numberOfcolumn > 1) {
                //     slider_options_.slidesToShow = sliderSetting.numberOfcolumn;
                //     slider_options_.slidesToScroll = sliderSetting.numberOfcolumn;
                //   }
                //   if (sliderSetting.numberOfRow > 1) {
                //     slider_options_.rows = sliderSetting.numberOfRow;
                //   }

                // arrows (left right) true/false
                // autoplay true/false
                // autoplaySpeed 2000 
                // dots true/false
                // fade true/false in false slide active
                // infinite true/false infinite loop
                $sliderSetting = json_encode($sliderSetting);

                $postHtml .= "<div data-slider='{$sliderSetting}' class='ubl-slick-slider-init ubl-slick-slider-block'>";
                // ubl-slick-slider-block
                while ($query->have_posts()) {
                    $query->the_post();

                    $postHtml .= "<div class='ubl-slider-container'>
                    <div class='ubl-slider-content-wrapper'>"; // div 1 , div 2

                    $postHtml .= "<div class='ubl-post-image-container'>";
                    $postHtml .= "<img src='" . esc_url(get_the_post_thumbnail_url()) . "' />";
                    $postHtml .= "</div>";
                    $postHtml .= "<div class='ubl-post-overlay-color'></div>"; // closes here
                    $postHtml .= "<div class='ubl-post-slider-text'>
                        <div class='slider-post-content'>"; // div 22, 

                    // $postHtml .= " <div class={`post-wrapper content-align-${sliderSetting . contentAlign}`}>
                    $postHtml .= " <div class='post-wrapper content-align-{$sliderAttr["contentAlign"]}'>
                        <div class='post-content'>"; // div 33
                    // title 
                    if (isset($attr['heading']['tag']) && $attr['heading']['tag'] && isset($attr['heading']['color'])) {
                        $postHtml .= "<" . $attr['heading']['tag'] . " style='color:" . $attr['heading']['color'] . "' class='post-heading'>";
                        $postHtml .= "<a href='" . esc_url(get_the_permalink()) . "'>" . get_the_title() . "</a>";
                        $postHtml .= "</" . $attr['heading']['tag'] . ">";
                    }
                    // category
                    if ($metashowCate) {
                        $postHtml .= '<p class="post-category">';
                        $category_ = get_the_category();
                        $category_ = wp_json_encode($category_);
                        $category_ = json_decode($category_, true);
                        if (!empty($category_)) {
                            $catestyle = isset($attr['showCate']['fontSize']) && $attr['showCate']['fontSize'] ? 'font-size:' . $attr['showCate']['fontSize'] . 'px;' : '';
                            if (isset($attr['showCate']['customColor']) && $attr['showCate']['customColor']) {
                                $catestyle .= isset($attr['showCate']['backgroundColor']) && $attr['showCate']['backgroundColor'] ? 'background-color:' . $attr['showCate']['backgroundColor'] . ';' : '';
                                $catestyle .= isset($attr['showCate']['color']) && $attr['showCate']['color'] ? 'color:' . $attr['showCate']['color'] . ';' : '';
                            }
                            // 
                            if (isset($args['category__in']) && is_array($args['category__in']) && !empty($args['category__in'])) {
                                $category__in = $args['category__in'];
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
                                $postHtml .= '<span style="' . $catestyle . '">';
                                $postHtml .= "<a href='" . esc_url(get_category_link($cateValue['term_id'])) . "'>" . $cateValue['name'] . "</a>";
                                $postHtml .= '</span>';
                                $countCate++;
                            }
                        }
                        $postHtml .= '</p>';
                    }
                    // post meta
                    $postHtml .= '<div class="post-meta-all">';
                    if ($postAuthor) {
                        $postHtml .= "<p style='color:" . $metaStyleColor . ";font-size:" . $metaStyleFontSize . "px;' class='_post-author'>";
                        $postHtml .= "<a target='_blank' href='" . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . "'>";
                        $postHtml .=  get_the_author();
                        $postHtml .= "</a></p>";
                    }

                    if ($postDate) {
                        // $postHtml .= $postAuthor ? '<span style="font-size:' . $metaStyleFontSize . 'px;color:' . $metaStyleColor . ';" class="slash">/</span>' : '';
                        $dateYear =   get_the_date('Y');
                        $dateMonth =   get_the_date('m');
                        $dateDay =   get_the_date('j');
                        $postHtml .= "<p style='color:" . $metaStyleColor . ";font-size:" . $metaStyleFontSize . "px;' class='_post-date'>";
                        $postHtml .= "<a target='_blank' href='" . esc_url(get_day_link($dateYear, $dateMonth, $dateDay)) . "'>";
                        $postHtml .=  get_the_date();
                        $postHtml .= "</a></p>";
                    }
                    if ($postDateModify) {
                        // $postHtml .= $postAuthor || $postDate ? '<span style="font-size:' . $metaStyleFontSize . 'px;color:' . $metaStyleColor . ';" class="slash">/</span>' : '';
                        $dateYear =   get_the_modified_date('Y');
                        $dateMonth =   get_the_modified_date('m');
                        $dateDay =   get_the_modified_date('j');
                        $postHtml .= "<p style='color:" . $metaStyleColor . ";font-size:" . $metaStyleFontSize . "px;' class='_post-date-last-modified'>";
                        $postHtml .= __('Modified : ', "unlimited-blocks") . "<a target='_blank' href='" . esc_url(get_day_link($dateYear, $dateMonth, $dateDay)) . "'>";
                        $postHtml .=  get_the_modified_date();
                        $postHtml .= "</a></p>";
                    }
                    $postHtml .= '</div>';
                    // post excerpt
                    if ($postExcerpt) {
                        $postExcerpt = get_the_excerpt();
                        // exerpt length
                        $exLength = isset($attr['excerpt']['words']) && $attr['excerpt']['words']  ? $attr['excerpt']['words'] : false;
                        if ($exLength) {
                            $postExcerpt = explode(" ", $postExcerpt);
                            $postExcerpt = array_slice($postExcerpt, 0, $exLength);
                            $postExcerpt = implode(" ", $postExcerpt);
                        }
                        $excerptFs = isset($attr['excerpt']['fontSize']) && intval($attr['excerpt']['fontSize']) ? intval($attr['excerpt']['fontSize']) : false;
                        $postHtml .= "<p style='color:" . $postExcerptColor . ";font-size:" . $excerptFs . "px;' class='_post-excerpt'>";
                        $postHtml .= $postExcerpt;
                        $postHtml .= "</p>";
                    }
                    // tags
                    if ($metashowshowTag) {
                        $tags = get_the_tags(get_the_ID());
                        $postHtml .= '<p class="post-tags">';
                        if (!empty($tags)) {
                            $Tagstyle = isset($tags_['fontSize']) && intval($tags_['fontSize']) ? 'font-size:' . intval($tags_['fontSize']) . 'px;' : '';
                            $Tagstyle .= isset($tags_['backgroundColor']) && $tags_['backgroundColor'] ? 'background-color:' . $tags_['backgroundColor'] . ';' : '';
                            $Tagstyle .= isset($tags_['color']) && $tags_['color'] ? 'color:' . $tags_['color'] . ';' : '';
                            $tagCount = 0;
                            foreach ($tags as $tagValue) {
                                if (isset($attr['showTag']['count']) && is_numeric($attr['showTag']['count']) && $attr['showTag']['count'] == $tagCount) break;
                                $postHtml .= '<span style="' . $Tagstyle . '">';
                                $postHtml .= "<a href='" . esc_url(get_category_link($tagValue->term_id)) . "'>" . $tagValue->name . "</a>";
                                $postHtml .= '</span>';
                                $tagCount++;
                            }
                        }
                        $postHtml .= '</p>';
                    }
                    $postHtml .= "</div></div>"; // div 33  
                    $postHtml .= "</div></div>"; // div 22, 
                    $postHtml .= "</div></div>"; // div 1 , div 2
                }
                // ubl-slick-slider-block
                $postHtml .= "</div>";
                // slider wrapper 
                $postHtml .= "</div>";
                return $postHtml;
                // -------------------------------------------------------------------------------- ----------------------------
            } else {
                return "<div>" . __("No post found.", "unlimited-blocks") . "</div>";
            }
        }
        // block code *******************
    }
}
