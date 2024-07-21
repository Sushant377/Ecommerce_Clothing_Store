<?php
if (!defined('ABSPATH')) exit;
// ubl post callback function
if (!function_exists('unlimited_blocks_owl_slider')) {
    function unlimited_blocks_owl_slider($attr)
    {
        // echo "<pre>";
        // print_r($attr);
        // echo "</pre>";
        // return;
        $html = "";
        $wrapperAlignment = $attr['wrapper']['alignment'];
        $contentSpacing = $attr['wrapper']['spacing'];
        $sliderAttr = $attr['sliderSetting'];
        $button1 = $attr['buttoneOne'];
        $button1Bg = $button1['bg'];
        $button2 = $attr['buttoneTwo'];
        $button2Bg = $button2['bg'];

        $titleStyle = "font-size:{$attr['title']['fontSize']}px;color:{$attr['title']['color']};";
        $descriptionStyle = "font-size:{$attr['text']['fontSize']}px;color:{$attr['text']['color']};";

        $buttonStyle1 = '';
        $buttonStyle2 = '';
        // button 1 style ------------------------------------------------------------------------------
        // btn 1 fs
        if ($button1['fontSize']) {
            $buttonStyle1 .= "font-size:{$button1['fontSize']}px;";
        }
        // btn 1 color
        if ($button1['color']) {
            $buttonStyle1 .= "color:{$button1['color']};";
        }
        // btn 1 height
        if ($button1['height']) {
            $buttonStyle1 .= "padding-top:{$button1['height']}px;padding-bottom:{$button1['height']}px;";
        }
        // btn 1 width
        if ($button1['width']) {
            $buttonStyle1 .= "padding-left:{$button1['width']}px;padding-right:{$button1['width']}px;";
        }
        // btn 1 bg 
        if ($button1Bg['backgroundColorType'] == "color") {
            $buttonStyle1 .= "background-color:{$button1Bg['backgroundColor']};";
        } else if ($button1Bg['backgroundColorType'] == "gradient") {
            $buttonStyle1 .= "background-image:{$button1Bg['backgroundImageGradient']};";
        }
        // button 2 style ------------------------------------------------------------------------------
        // btn 2 fs
        if ($button2['fontSize']) {
            $buttonStyle2 .= "font-size:{$button2['fontSize']}px;";
        }
        // btn 2 color
        if ($button2['color']) {
            $buttonStyle2 .= "color:{$button2['color']};";
        }
        // btn 2 height
        if ($button2['height']) {
            $buttonStyle2 .= "padding-top:{$button2['height']}px;padding-bottom:{$button2['height']}px;";
        }
        // btn 2 width
        if ($button2['width']) {
            $buttonStyle2 .= "padding-left:{$button2['width']}px;padding-right:{$button2['width']}px;";
        }
        // btn 2 bg 
        if ($button2Bg['backgroundColorType'] == "color") {
            $buttonStyle2 .= "background-color:{$button2Bg['backgroundColor']};";
        } else if ($button2Bg['backgroundColorType'] == "gradient") {
            $buttonStyle2 .= "background-image:{$button2Bg['backgroundImageGradient']};";
        }

        // add style -----------------------------------------------------------_+++++++++++++++++++++++++++++++++++
        $addStyles = [];
        $WrapperID = '.' . $attr['wrapper_id'];
        // box style 
        // height // width 
        $addStyles[] = [
            'selector' =>  "{$WrapperID} .ubl-slider-content-wrapper",
            'css' => "height:{$sliderAttr['dimension']['custom_height']}px;"
        ];
        $addStyles[] = [
            'selector' =>  "{$WrapperID} .ubl-slick-slider-block",
            'css' => "width:{$sliderAttr['dimension']['custom_width']}%;"
        ];

        // nav dots size and active color 
        if ($sliderAttr['triggerActive'] == 'both' || $sliderAttr['triggerActive'] == 'dots') {
            $addStyles[] = [
                'selector' =>  "{$WrapperID} .ubl-slick-slider-block ul.slick-dots[data-class=ubl-slick-slider-dots] li.custonLi_ span",
                'css' => "height:{$sliderAttr['linearTrigger']['fontSize']}px;width:{$sliderAttr['linearTrigger']['fontSize']}px;background-color:{$sliderAttr['linearTrigger']['color']};"
            ];
            $addStyles[] = [
                'selector' =>  "{$WrapperID} .ubl-slick-slider-block ul.slick-dots[data-class=ubl-slick-slider-dots] li.custonLi_.slick-active span",
                'css' => "background-color:{$sliderAttr['linearTrigger']['activeColor']};"
            ];
        }
        // price style
        $styleAdd = wp_json_encode($addStyles);
        // add style -----------------------------------------------------------_+++++++++++++++++++++++++++++++++++

        $html .= "<div class='ubl-slick-slider-block-wrap {$attr['wrapper_id']} align{$attr['align']}' ubl-block-style='{$styleAdd}'>"; //------------------------------------------------------------+++++++wrapper+++++++++
        // slider wrapper 
        $sliderSetting = [];
        if ($sliderAttr['sliderEffect'] !== 'slideEffect') {
            $sliderSetting['fade'] = true;
        }
        if ($sliderAttr['triggerActive'] == 'both' || $sliderAttr['triggerActive'] == 'arrows') {
            $sliderSetting['arrows'] = true;
            $styleLeftRight = "font-size:{$sliderAttr['leftRightTrigger']['fontSize']}px;color:{$sliderAttr['leftRightTrigger']['color']};";
            $html .= "<div class='ubl-slick-slider-arrow prev_' style='{$styleLeftRight}'>
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

        // arrows (left right) true/false
        // autoplay true/false
        // autoplaySpeed 2000 
        // dots true/false
        // fade true/false in false slide active
        // infinite true/false infinite loop
        $sliderSetting = json_encode($sliderSetting);

        $html .= "<div data-slider='{$sliderSetting}' class='ubl-slick-slider-init ubl-slick-slider-block'>";
        // ubl-slick-slider-block
        foreach ($attr['slides'] as $slide_key => $value) {
            $overlayColor = false;
            $containerBg = $value['container']['bg'];
            if ($containerBg['backgroundType'] != "none") {
                $overlayColor = '';
                if ($containerBg['backgroundImage']) {
                    $overlayColor .= "opacity:{$containerBg['backgroundOpacity']};";
                }
                if ($containerBg['backgroundColorType']  == "color") {
                    $overlayColor .= "background-color:{$containerBg['backgroundColor']};";
                } else if ($containerBg['backgroundColorType']   == "gradient") {
                    $overlayColor .= "background-image:{$containerBg['backgroundImageGradient']};";
                }
            }

            $html .= '<div class="ubl-slider-wrapper">';
            // slides 
            // background image 
            $html .= '<div class="ubl-slider-container">
            <div class="ubl-slider-content-wrapper">';
            // ubl-slider-content-wrapper
            // ---------start----------
            if ($overlayColor && $containerBg['backgroundImage']) {
                $html .= "<div class='ubl-slider-image-container' style='background-size:{$containerBg['backgroundImageSize']};background-image:url({$containerBg['backgroundImage']});'>";
                $html .= '</div>';
            }
            // ---------end----------
            // overlay color 
            $html .= "<div class='ubl-slider-overlay-color' style='{$overlayColor}'></div>";
            // overlay color 
            $html .= "<div class='ubl-slider-text {$wrapperAlignment}'>";
            $html .= "<div style='grid-gap:{$contentSpacing}px;'>";
            // ubl-slider-text 
            $html .= "<h1 style='{$titleStyle}'>{$value['title']['text']}</h1>";
            $html .= "<h2 style='{$descriptionStyle}'>{$value['text']['text']}</h2>";
            $html .= '<div class="button-container">';
            // button 
            if ($value['buttoneOne']['enable']) {
                $target1_ = $value['buttoneOne']['target'] ? 'target="_blank"' : "";
                $html .= "<a {$target1_} style='{$buttonStyle1}' href='{$value['buttoneOne']['link']}'>{$value['buttoneOne']['text']}</a>";
            }
            if ($value['buttoneTwo']['enable']) {
                $target2_ = $value['buttoneTwo']['target'] ? 'target="_blank"' : "";
                $html .= "<a {$target2_} style='{$buttonStyle2}' href='{$value['buttoneTwo']['link']}'>{$value['buttoneTwo']['text']}</a>";
            }
            // button 
            $html .= '</div>';
            // ubl-slider-text 
            $html .= '</div>';
            $html .= '</div>';
            // ubl-slider-content-wrapper
            $html .= "</div>";
            $html .= "</div>";
            // ---------------------------------
            // slides 
            $html .= '</div>';
            // echo 'slide' . $slide_key;
        }
        // ubl-slick-slider-block
        $html .= "</div>";
        // slider wrapper 
        $html .= "</div>";
        return $html;
    }
}
