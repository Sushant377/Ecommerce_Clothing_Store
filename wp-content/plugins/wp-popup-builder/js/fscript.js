(function ($) {
  Business_front = {
    init: function () {
      // console.log(window.location.search);
      let forBlockElementor = window.location.search;
      var getFilterUrl = [];
      if (forBlockElementor) {
        forBlockElementor = forBlockElementor.replace("?", "");
        forBlockElementor = forBlockElementor.split("&");
        forBlockElementor.forEach(function (value) {
          let valueSplited = value.split("=");
          if (valueSplited[0]) getFilterUrl.push(valueSplited[0]);
          if (valueSplited[0]) getFilterUrl.push(valueSplited[1]);
        });
      }
      var is_customizerOpen = false;
      if (typeof wp !== "undefined") {
        is_customizerOpen = typeof wp.customize !== "undefined" ? true : false;
      }
      // if you're in the customizer do this
      if (!is_customizerOpen && !getFilterUrl.includes("elementor-preview")) {
        Business_front._show_popup();
      }

      Business_front._commonScript();
      Business_front._bind();
    },
    _show_popup: function () {
      let getPopup = $(".wppb-popup-open.popup.active")[0];
      if (getPopup) {
        getPopup = $(getPopup);
        getPopup.hide();
        let getHTml = getPopup.html();
        let setting_ = getPopup.find('input[name="popup-setting-front"]');
        setting_ = JSON.parse(setting_.val());

        let getOutSideColor =
          "outside-color" in setting_ ? setting_["outside-color"] : "#535353f2";
        let getEffect = "effect" in setting_ ? setting_["effect"] : 1;
        let popupOpenTime =
          "popup-delay-open" in setting_ ? setting_["popup-delay-open"] : 4;
        popupOpenTime = popupOpenTime * 1000;
        let popupAutoClose =
          "popup-delay-close" in setting_
            ? parseInt(setting_["popup-delay-close"])
            : 0;

        let effectClass = "wppb-effect-one";
        let renderTohtml =
          '<div id="wppbPopupShow" class="wppb-popup-main-wrap ' +
          effectClass +
          '"><div>';
        renderTohtml += getHTml;
        renderTohtml += "</div></div>";

        function addActivePopup() {
          $("body").append(renderTohtml);
          let wppbPopupShow = $("#wppbPopupShow");

          // create cookie
          let checkCookie = getPopup.attr("data-wppb-frequency");
          Business_front.setPopupCookie(getPopup);
          // create cookie

          // set auto height
          let getContentHeight = wppbPopupShow.find(
            ".wppb-popup-custom-content"
          );
          let windowHeight = window.innerHeight - 150;
          if (getContentHeight.outerHeight() > windowHeight) {
            getContentHeight.css({
              height: windowHeight + "px",
              "overflow-y": "scroll",
            });
          } else if (
            getContentHeight.innerHeight() <
            getContentHeight.children().outerHeight()
          ) {
            getContentHeight.css({ "overflow-y": "scroll" });
          }

          Business_front._setStyleColor(
            wppbPopupShow,
            getOutSideColor,
            "background-color"
          );
          wppbPopupShow.addClass("wppb_popup_active");
          $("body").addClass("wppbPopupActive");

          // getPopup.removeClass('active');
          getPopup.remove();

          if (popupAutoClose > 0) {
            popupAutoClose = popupAutoClose * 1000;
            setTimeout(function () {
              Business_front._popupAutoClose(wppbPopupShow);
            }, popupAutoClose);
          }
        }

        setTimeout(addActivePopup, popupOpenTime);
      }
    },
    _validJsonStr: function (str) {
      try {
        JSON.parse(str);
      } catch (e) {
        return false;
      }
      return true;
    },
    _inlineCssSeparate: function (inline_css) {
      let saparateStyle = [];
      inline_css.split(";").forEach((value_, index_) => {
        if (value_.search(":") > -1) {
          let getCss = value_.split(":");
          saparateStyle[getCss[0].trim()] = getCss[1].trim();
        }
      });
      return saparateStyle;
    },
    _setStyleColor: function (element, element_value, styleProperty) {
      let getElemStyle = element.attr("style");
      if (getElemStyle) {
        let saparateStyle = Business_front._inlineCssSeparate(getElemStyle);
        if (styleProperty in saparateStyle) delete saparateStyle[styleProperty];
        saparateStyle[styleProperty] = element_value;
        let newStyle = "";
        for (let key in saparateStyle) {
          newStyle += key + ":" + saparateStyle[key] + ";";
        }
        element.attr("style", newStyle);
      } else {
        element.attr("style", styleProperty + ":" + element_value);
      }
    },
    _commonScript: function () {
      // close by out side function
      $(document).mouseup(function (e) {
        var businessPopupDemo = $("#wppbPopupShow .wppb-popup-custom-wrapper");
        let setting_ = businessPopupDemo.find(
          'input[name="popup-setting-front"]'
        );

        setting_ = Business_front._validJsonStr(setting_.val())
          ? JSON.parse(setting_.val())
          : {};

        let getCloseParam =
          "close-type" in setting_ ? setting_["close-type"] : 3;
        if (getCloseParam == 2 || getCloseParam == 3) {
          if (
            !businessPopupDemo.is(e.target) &&
            businessPopupDemo.has(e.target).length === 0
          ) {
            $("#wppbPopupShow.wppb_popup_active").removeClass(
              "wppb_popup_active"
            );
            $("#wppbPopupShow").addClass("wppb_popup_shut");
            $("body").removeClass("wppbPopupActive");
            var remove_modal = function () {
              $("#wppbPopupShow").remove();
              if ($(".wppb-popup-open.active").length) {
                Business_front._show_popup();
              }
            };
            setTimeout(remove_modal, 500);
          }
        }
      });
    },
    _popupAutoClose: function (element_) {
      element_.removeClass("wppb_popup_active");
      element_.addClass("wppb_popup_shut");
      $("body").removeClass("wppbPopupActive");
      var remove_modal = function () {
        element_.remove();
        if ($(".wppb-popup-open.active").length) {
          Business_front._show_popup();
        }
      };
      setTimeout(remove_modal, 500);
    },
    _closeFunctionByIcon: function (e) {
      e.preventDefault();
      let button = $(this);
      button
        .closest("#wppbPopupShow.wppb_popup_active")
        .removeClass("wppb_popup_active");
      $("#wppbPopupShow").addClass("wppb_popup_shut");
      $("body").removeClass("wppbPopupActive");
      var remove_modal = function () {
        $("#wppbPopupShow").remove();
        if ($(".wppb-popup-open.active").length) {
          Business_front._show_popup();
        }
      };
      setTimeout(remove_modal, 500);
    },
    _responsive: function () {
      let getPopup = $(".wppb-popup-main-wrap.inline_");

      $.each(getPopup, (index, value) => {
        let popup = $(value);
        let getCss = popup.find(".wppb-popup-css-one-no_res").val();
        let popupWidth = Business_front._findWidth(popup);
        if (popupWidth.scale != 0) {
          getCss = Business_front._responsive_one(getCss, popupWidth.scale);
          let addClass =
            popupWidth.scale == 1
              ? "wppb-res-one"
              : popupWidth.scale == 2
              ? "wppb-res-one"
              : "wppb-res-three";
          popup.addClass(addClass);
        }
        popup
          .find(".wppb-popup-style-internal-stylesheet > style")
          .text(getCss);
        popup.find(".wppb-popup-custom-wrapper").css("width", popupWidth.width);
      });
    },
    _findWidth: function (popup) {
      let getPopupWidth = popup
        .find(".wppb-popup-css-one-no_res")
        .attr("data-wrapper");
      let findIndexWidth = getPopupWidth.indexOf("width");
      let findIndexPx = getPopupWidth.indexOf("px", findIndexWidth);
      getPopupWidth = parseInt(
        getPopupWidth.slice(findIndexWidth + 6, findIndexPx)
      );
      let popupParentWidth = parseInt(popup.parent().css("width"));
      let width =
        getPopupWidth > popupParentWidth ? popupParentWidth : getPopupWidth;
      let getPErcent, scale;
      if (getPopupWidth > popupParentWidth) {
        // how many percent small them their parent popup
        getPErcent = (100 * popupParentWidth) / getPopupWidth - 100;
        getPErcent = Math.round(getPErcent);
        getPErcent = getPErcent - 2 * getPErcent;
        scale =
          getPErcent < 45 ? 3 : getPErcent < 60 ? 2 : getPErcent < 85 ? 1 : 0;
      } else {
        scale = 0;
      }
      return { width: width, scale: scale };
    },
    _responsive_one: function (cssStr, scale) {
      let css = cssStr.split("}");
      let returnCss = "";
      let withoutPx = "";
      css.forEach((value) => {
        if (value && value.indexOf("px") > 0) {
          let id_css_Prop = value.split("{");
          if (Business_front._responsive_two(id_css_Prop, scale)) {
            returnCss +=
              id_css_Prop[0] +
              "{" +
              Business_front._responsive_two(id_css_Prop, scale) +
              "}";
          }
        } else {
          returnCss += value + "}";
        }
      });
      return returnCss;
    },
    _responsive_two: function (id_css_Prop, scale) {
      let cssProp = id_css_Prop[1].split(";");
      let returnWprop = "";
      cssProp.forEach((value) => {
        if (value.indexOf("px") > 0) {
          let cssPropValue = value.split(":");
          let propertyType = cssPropValue[0].trim();
          if (
            Business_front._responsive_three(cssPropValue, propertyType, scale)
          ) {
            returnWprop +=
              propertyType +
              ":" +
              Business_front._responsive_three(
                cssPropValue,
                propertyType,
                scale
              ) +
              ";";
          }
        } else {
          returnWprop += value + ";";
        }
      });
      return returnWprop;
    },
    _responsive_three: function (cssPropValue, arg, scale) {
      let get_px_arr = [];
      let css_con = false;
      let cssParameter = cssPropValue[1].split("px");
      cssParameter.forEach((value) => {
        value = parseInt(value.trim());
        if (value && (value > 0 || value <= -1)) {
          get_px_arr.push(value);
        }
      });
      css_con = cssPropValue[1];
      if (get_px_arr.length) {
        get_px_arr.sort(function (a, b) {
          return b - a;
        });
        get_px_arr.forEach((value) => {
          let percent = scale == 2 ? 60 : scale == 3 ? 50 : 70;
          let param = arg == "border-radius" ? value : (value / 100) * percent;
          param = Number(param).toFixed(2);
          if (arg == "font-size" && param < 10) {
            param = 10.0;
          }
          let replaceG = new RegExp(value, "g");
          css_con = css_con.replace(replaceG, param);
        });
      }
      return css_con;
    },
    setPopupCookie: function (element) {
      let frequency = element.attr("data-wppb-frequency");
      let day = element.attr("data-wppb-fr-d")
        ? element.attr("data-wppb-fr-d")
        : false;
      let hour = element.attr("data-wppb-fr-h")
        ? element.attr("data-wppb-fr-h")
        : false;
      let bid = element.attr("data-wppb-bid");
      if (bid && frequency) {
        let calculation;
        let cookieName = "wppb-fr-" + bid;
        if (day && hour) {
          // for day + hour
          calculation = 24 * parseInt(day) * (1000 * 60 * 60 * parseInt(hour));
        } else if (hour) {
          // for hour
          calculation = 1000 * 60 * parseInt(hour);
        } else if (frequency == "one-time") {
          // for one time will block for 30 days
          calculation = 24 * 30 * (1000 * 60 * 60);
        } else if (frequency == "every-page") {
          document.cookie =
            cookieName + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
        }
        if (calculation) {
          let date = new Date();
          date.setTime(date.getTime() + calculation);
          let expires = "expires=" + date.toUTCString();
          document.cookie =
            cookieName + "=" + frequency + ";" + expires + ";path=/";
        }
      }
    },
    _bind: function () {
      Business_front._responsive();
      $(document).on(
        "click",
        ".wppb-popup-close-btn",
        Business_front._closeFunctionByIcon
      );
    },
  };

  const getStylesAttr = $("[wppb-add-style]");
  if (getStylesAttr.length) {
    $.each(getStylesAttr, function () {
      const element = $(this);
      const getStyleAttr = element.attr("wppb-add-style");
      if ("" !== getStyleAttr) {
        element.attr("style", getStyleAttr);
      }
      element.removeAttr("wppb-add-style");
    });
  }
  Business_front.init();
})(jQuery);
