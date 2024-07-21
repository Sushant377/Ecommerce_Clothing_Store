(function ($) {
  let fns = {
    int: function () {
      fns.bind();
    },
    _ajaxFunction: function (data_, datatyle_ = false) {
      let ajaxObj = {
        method: "POST",
        url: unlimited_blocks_ajax_url.admin_ajax,
        data: data_,
      };
      if (datatyle_ == "json") {
        ajaxObj["dataType"] = "json";
        ajaxObj["async"] = false;
      }
      return jQuery.ajax(ajaxObj);
    },
    unlimited_blocks_post_next_prev: function () {
      let thisBtn = $(this);
      let getDataWrapper = thisBtn.closest(".ubl-two-post-wrapper");
      let getData = getDataWrapper.data("setting");
      let trigger = thisBtn.hasClass("next") ? "next" : "prev";
      let currentPage = getDataWrapper.attr("data-currentpage");
      let data_ = {
        action: "unlimited_section_post_category_layout_block",
        attr: getData,
        trigger: trigger,
      };
      currentPage = JSON.parse(currentPage);
      if (
        currentPage &&
        "current" in currentPage &&
        currentPage.current > 0 &&
        (trigger == "prev" || currentPage.total >= currentPage.current + 1)
      ) {
        data_["page"] = currentPage.current;
        let loader_ = thisBtn
          .closest(".ubl-two-col-container")
          .find(".ubl-block-loader");
        loader_.addClass("active");
        let returnData = fns._ajaxFunction(data_);
        returnData.success(function (response) {
          // console.log("response3->" + response);
          // response
          loader_.removeClass("active");
          let nxtPrev = thisBtn.closest(".ubl-two-post-wrapper-next-prev");
          nxtPrev.find(".ubl-post-NP-btn").removeClass("disable");
          let string_fy =
            currentPage.current == 1 && trigger == "prev"
              ? 1
              : trigger == "next"
              ? currentPage.current + 1
              : currentPage.current - 1;
          if (string_fy == 1) {
            nxtPrev.find(".ubl-post-NP-btn.prev").addClass("disable");
          } else if (string_fy == currentPage.total) {
            nxtPrev.find(".ubl-post-NP-btn.next").addClass("disable");
          }
          string_fy = JSON.stringify({
            current: string_fy,
            total: currentPage.total,
          });
          getDataWrapper.attr("data-currentpage", string_fy);
          getDataWrapper.find(".ubl-post-two-column").html(response);
          // response
        });
      }
    },
    chooseCate: function (e) {
      e.preventDefault();
      let thisButton = $(this);
      if (!thisButton.parent("li").hasClass("active")) {
        // has class active li
        let getSlug = thisButton.attr("data-cateslug");
        if (getSlug) {
          let getDataWrapper = thisButton
            .closest(".ubl-two-col-container")
            .find(".ubl-two-post-wrapper");
          let getData = getDataWrapper.data("setting");
          if (typeof getData === "object") {
            if (getSlug === "all") {
              delete getData["postCategories"];
            } else {
              getData["postCategories"] = [getSlug];
            }
            let data_ = {
              action: "unlimited_section_post_category_layout_choose_category",
              attr: getData,
            };
            // loader and active btn
            thisButton
              .closest(".navigation_")
              .find("li.cat-item")
              .removeClass("active");
            thisButton.parent().addClass("active");
            let loader_ = thisButton
              .closest(".ubl-two-col-container")
              .find(".ubl-block-loader");
            loader_.addClass("active");
            let returnData = fns._ajaxFunction(data_, "json");
            // replace data setting after result success
            returnData.success(function (response) {
              // console.log(response);
              if (typeof response == "object" && "html" in response) {
                setTimeout(() => loader_.removeClass("active"), 500);
                getDataWrapper.find(".ubl-post-two-column").html(response.html);
                getDataWrapper.attr("data-currentpage", response.nextprev);
                getDataWrapper.attr("data-setting", JSON.stringify(getData));
                if (response.nextprev == null) {
                  getDataWrapper
                    .find(".ubl-two-post-wrapper-next-prev")
                    .addClass("disable");
                } else {
                  getDataWrapper
                    .find(".ubl-two-post-wrapper-next-prev")
                    .removeClass("disable");
                }
              }
            });
          }
        }
        // has class active li
      }
    },
    unlimited_blocks_post_next_prev_img: function () {
      let thisBtn = $(this);
      let getDataWrapper = thisBtn.closest(".ubl-image-section");
      let getSettingsWrapReplace = "",
        action = "";
      let getSEction = thisBtn.data("section");
      let trigger = thisBtn.hasClass("next") ? "next" : "prev";
      let nextPREvcontainer = thisBtn.closest(
        ".ubl-two-post-wrapper-next-prev"
      );
      // pagination function
      let pagNo = "";
      if (thisBtn.hasClass("pagination")) {
        trigger = "pagination";
        pagNo = parseInt(thisBtn.attr("data-page"));
        getSEction = thisBtn
          .closest(".ubl-two-post-wrapper-next-prev")
          .find(".ubl-image-section-np.prev")
          .attr("data-section");
      }
      // pagination function

      if (getSEction == "three-post") {
        getSettingsWrapReplace = getDataWrapper.find(".parent-column-two");
        action = "unlimited_section_post_image_three_post";
      } else if (getSEction == "four-post") {
        getSettingsWrapReplace = getDataWrapper.find(".ubl-post-four-post");
        action = "unlimited_section_post_image_four_post";
      } else if (getSEction == "five-post") {
        getSettingsWrapReplace = getDataWrapper.find(".ubl-post-five-post");
        action = "unlimited_section_post_image_five_post";
      } else if (getSEction == "list-post") {
        getSettingsWrapReplace = getDataWrapper.find(".list-layout-section");
        action = "unlimited_section_post_layout_list";
      } else if (getSEction == "grid-post") {
        getSettingsWrapReplace = getDataWrapper.find(".grid-layout-section");
        action = "unlimited_section_post_layout_grid";
      }
      let getData = getSettingsWrapReplace.data("setting");
      let currentPage = getSettingsWrapReplace.attr("data-currentpage");
      let data_ = {
        action: action,
        attr: getData,
        trigger: trigger,
      };
      // pagination function
      if (pagNo) {
        data_["page_no"] = pagNo;
      }
      // pagination function
      currentPage = JSON.parse(currentPage);
      if (
        currentPage &&
        "current" in currentPage &&
        currentPage.current > 0 &&
        (trigger == "prev" ||
          currentPage.total >= currentPage.current + 1 ||
          pagNo)
      ) {
        data_["page"] = currentPage.current;
        let loader_ = getDataWrapper.find(".ubl-block-loader");
        loader_.addClass("active");

        // console.log("data_", data_);

        let returnData = fns._ajaxFunction(data_);
        returnData.success(function (response) {
          // console.log("response3->" + response);
          // response
          loader_.removeClass("active");
          nextPREvcontainer
            .find(".ubl-image-section-np")
            .removeClass("disable");
          let string_fy =
            currentPage.current == 1 && trigger == "prev"
              ? 1
              : pagNo
              ? pagNo
              : trigger == "next"
              ? currentPage.current + 1
              : currentPage.current - 1;
          // pagination function
          let paginationPage = nextPREvcontainer.find(".paginationNumbers");
          if (paginationPage.length) {
            totaPageNo = parseInt(currentPage.total);
            let htmlPagination = "";
            const checkStrFy = (number1, number2) => {
              return number1 == number2 ? "disable" : "";
            };
            if (string_fy == 1 || string_fy == 2) {
              htmlPagination +=
                '<div class="ubl-image-section-np ' +
                checkStrFy(string_fy, 1) +
                ' pagination" data-page="1">1</div>';
              htmlPagination +=
                '<div class="ubl-image-section-np ' +
                checkStrFy(string_fy, 2) +
                ' pagination" data-page="2">2</div>';
              if (totaPageNo >= 3) {
                htmlPagination +=
                  '<div class="ubl-image-section-np ' +
                  checkStrFy(string_fy, 3) +
                  ' pagination" data-page="3">3</div>';
                if (totaPageNo >= 4) {
                  htmlPagination += '<div class="dots pagination" >...</div>';
                  htmlPagination +=
                    '<div class="ubl-image-section-np ' +
                    checkStrFy(string_fy, totaPageNo) +
                    ' pagination" data-page="' +
                    totaPageNo +
                    '">' +
                    totaPageNo +
                    "</div>";
                }
              }
            } else if (string_fy >= 3) {
              htmlPagination +=
                '<div class="ubl-image-section-np ' +
                checkStrFy(string_fy, 1) +
                ' pagination" data-page="1">1</div>';
              htmlPagination += '<div class="dots pagination" >...</div>';
              let strngifyMinus = string_fy - 1;
              let strngifyPlus = string_fy + 1;
              htmlPagination +=
                '<div class="ubl-image-section-np ' +
                checkStrFy(string_fy, strngifyMinus) +
                ' pagination" data-page="' +
                strngifyMinus +
                '">' +
                strngifyMinus +
                "</div>";
              htmlPagination +=
                '<div class="ubl-image-section-np ' +
                checkStrFy(string_fy, string_fy) +
                ' pagination" data-page="' +
                string_fy +
                '">' +
                string_fy +
                "</div>";
              if (totaPageNo >= strngifyPlus) {
                htmlPagination +=
                  '<div class="ubl-image-section-np total ' +
                  checkStrFy(string_fy, strngifyPlus) +
                  ' pagination" data-page="' +
                  strngifyPlus +
                  '">' +
                  strngifyPlus +
                  "</div>";
              }
              if (totaPageNo > 5 && totaPageNo > string_fy + 1) {
                htmlPagination += '<div class="dots pagination" >...</div>';
                htmlPagination +=
                  '<div class="ubl-image-section-np ' +
                  checkStrFy(string_fy, totaPageNo) +
                  ' pagination" data-page="' +
                  totaPageNo +
                  '">' +
                  totaPageNo +
                  "</div>";
              }
            }
            paginationPage.html(htmlPagination);
            let style_pagination = nextPREvcontainer
              .find(".ubl-image-section-np.prev")
              .attr("style");
            if (style_pagination) {
              paginationPage
                .find(".ubl-image-section-np")
                .attr("style", style_pagination);
            }
          }
          // pagination function
          if (string_fy == 1) {
            nextPREvcontainer
              .find(".ubl-image-section-np.prev")
              .addClass("disable");
          } else if (string_fy == currentPage.total) {
            nextPREvcontainer
              .find(".ubl-image-section-np.next")
              .addClass("disable");
          }
          string_fy = JSON.stringify({
            current: string_fy,
            total: currentPage.total,
          });
          getSettingsWrapReplace.attr("data-currentpage", string_fy);
          getSettingsWrapReplace.html(response);
          // response
        });
      }
    },
    bind: function () {
      $(document).on(
        "click",
        ".ubl-two-post-wrapper-next-prev:not('.disable') .ubl-post-NP-btn:not('.disable')",
        fns.unlimited_blocks_post_next_prev
      );
      $(document).on(
        "click",
        ".ubl-block-nav-items:not('.active') .cat-item a",
        fns.chooseCate
      );
      $(document).on(
        "click",
        ".ubl-two-post-wrapper-next-prev:not('.disable') .ubl-image-section-np:not('.disable')",
        fns.unlimited_blocks_post_next_prev_img
      );
    },
  };
  fns.int();
})(jQuery);
