(function ($) {
  var Wppb_save = {
    init: function () {
      Wppb_save._bind();
    },
    _saveBusinessAddon: function () {
      if ($(".wppb-back-page-popup").length)
        $(".wppb-back-page-popup").removeClass("wppb-back-page-popup");
      let this_btn = $(this);
      this_btn.addClass("rlLoading");
      let saveData = Wppb_save._saveData();

      let data_ = { action: "custom_insert", htmldata: saveData, p_wppb_nonce:wppb_ajax_backend.wppb_nonce };
      let returnData = Wppb_save._ajaxFunction(data_);
      returnData.success(function (response) {
        
        if (response && response != 0) {
      
          let pathName =
          window.location.pathname + window.location.search + "&custom-popup=" + response;
          window.history.replaceState(null, null, pathName);
          location.reload();
        }
      });
    },
    _updateAddon: function () {
      if ($(".wppb-back-page-popup").length)
        $(".wppb-back-page-popup").removeClass("wppb-back-page-popup");
      let this_btn = $(this);
      this_btn.addClass("rlLoading");
      let saveData = Wppb_save._saveData();
      let bid = this_btn.data("bid");
      let data_ = { action: "custom_update", htmldata: saveData, bid: bid, p_wppb_nonce:wppb_ajax_backend.wppb_nonce };
      let returnData = Wppb_save._ajaxFunction(data_);
      returnData.success(function (response) {
        if (response || response == 0) {
          setTimeout(() => this_btn.removeClass("rlLoading"), 1000);
        }
      });
    },
    _exportPopup: function () {
      let saveData = Wppb_save._saveData();
      let uniqId = Math.floor(Math.random() * Date.now());
      let filename = "wppb-" + uniqId + "-builder.json";
      let jsonStr = JSON.stringify(saveData);
      let anchor_ = document.createElement("a");
      anchor_.setAttribute(
        "href",
        "data:text/plain;charset=utf-8," + encodeURIComponent(jsonStr)
      );
      anchor_.setAttribute("download", filename);
      anchor_.style.display = "none";
      document.body.appendChild(anchor_);
      anchor_.click();
      document.body.removeChild(anchor_);
    },
    _initGlobalSave: function (inputs) {
      let contentGlobal = $('input[type="hidden"][data-global-save]');
      contentGlobal = contentGlobal.val()
        ? JSON.parse(contentGlobal.val())
        : {};
      let outerParent = $(".wppb-popup-custom");
      // overlay color set
      let overLayColor = outerParent.find(".wppb-popup-custom-overlay");
      overLayColor = Custom_popup_editor._checkStyle(
        overLayColor,
        "background-color"
      );
      if (overLayColor) contentGlobal["overlay-color"] = overLayColor;
      // outside color set
      let outSideColor = Custom_popup_editor._checkStyle(
        outerParent,
        "background-color"
      );
      if (outSideColor) contentGlobal["outside-color"] = outSideColor;
      // outside color set
      let globalPadding = outerParent.find(".wppb-popup-custom-content");
      globalPadding = Custom_popup_editor._checkStyle(globalPadding, "padding");
      if (outSideColor) contentGlobal["global-padding"] = globalPadding;

      let overlayImage = outerParent.find("[data-overlay-image]");

      if (
        overlayImage.attr("data-overlay-image") &&
        overlayImage.css("background-image") != "none"
      ) {
        // let findOnOff = overlayImage.css('background-image');

        contentGlobal["overlay-image-url"] =
          overlayImage.attr("data-overlay-image");
      } else {
        if (contentGlobal["overlay-image-url"])
          delete contentGlobal["overlay-image-url"];
      }
      let overlayStyle = Custom_popup_editor._removeStyle(
        overlayImage,
        "background-image",
        false
      );
      if (overlayStyle) contentGlobal["overlay-style"] = overlayStyle;

      let wrapperWidth = outerParent.find(".wppb-popup-custom-wrapper");
      if (wrapperWidth.attr("style"))
        contentGlobal["wrapper-style"] = wrapperWidth.attr("style");
      // popup name
      let popupName = $('input[name="global-popup-name"]').val();
      contentGlobal["popup-name"] = popupName;
      return { type: "global-setting", content: contentGlobal };
    },
    _saveData: function () {
      let getSaveData = $(".wppb-popup-custom");
      let getSaveDataWrap = getSaveData.find("[data-rl-wrap]");
      let saveData = [];
      let getSaveGlobal = Wppb_save._initGlobalSave();
      if (!jQuery.isEmptyObject(getSaveGlobal.content))
        saveData.push(getSaveGlobal);
      // find all wrap
      jQuery.each(getSaveDataWrap, (Wrap_index, Wrap_value) => {
        let get_column = $(Wrap_value).find("[data-rl-column]");
        let wrap_content = { type: "wrap", content: _columnGet(get_column) };
        if ($(Wrap_value).attr("data-uniqid"))
          wrap_content["id"] = $(Wrap_value).attr("data-uniqid");
        saveData.push(wrap_content);
      });
      // close btn
      if (_getClosebtn()) saveData.push(_getClosebtn());

      function _getClosebtn() {
        let closebtn = $(".wppb-popup-custom .wppb-popup-close-btn");
        if (closebtn.length) {
          let returnData = { type: "close-btn" };
          if (closebtn.attr("style"))
            returnData["style"] = closebtn.attr("style");
          if (closebtn.attr("data-uniqid"))
            returnData["id"] = closebtn.attr("data-uniqid");
          return returnData;
        }
      }

      function _columnGet(column_) {
        let column_Data = [];
        jQuery.each(column_, (Column_index, Column_value) => {
          let column_data_ = $(Column_value);
          let data_column = column_data_.find(
            "[data-rl-editable], .wppb-popup-lead-form,.wppb-popup-shortcode"
          );
          let column_content = {
            type: "column",
            content: _contentGet(data_column),
          };
          if (column_data_.attr("data-uniqid"))
            column_content["id"] = column_data_.attr("data-uniqid");
          if (column_data_.attr("style"))
            column_content["style"] = column_data_.attr("style");

          column_Data.push(column_content);
        });
        return column_Data;
      }

      function _contentGet(getSaveDataInputs) {
        let content_data = [];
        if (!getSaveDataInputs.length) {
          return false;
        } else {
          jQuery.each(getSaveDataInputs, (index, value) => {
            let checkInput = $(value);
            let saveAttrData = "";
            if (checkInput.hasClass("wppb-popup-shortcode")) {
              saveAttrData = {
                type: "shortcode",
                content: checkInput.attr("data-shortcode"),
              };
              if (checkInput.attr("style")) {
                saveAttrData["wrap-style"] = checkInput.attr("style");
              }
              if (checkInput.attr("data-uniqid"))
                saveAttrData["id"] = checkInput.attr("data-uniqid");
            } else if (checkInput.hasClass("wppb-popup-lead-form")) {
              saveAttrData = {
                type: "lead-form",
                content: checkInput.attr("data-form-id"),
              };
              if (checkInput.attr("data-uniqid"))
                saveAttrData["id"] = checkInput.attr("data-uniqid");
              let leadForm = checkInput.find("form");
              let leadFormStyle = {};
              if (leadForm.attr("style"))
                leadFormStyle["form-style"] = leadForm.attr("style");
              if (leadForm.find("h2").attr("style"))
                leadFormStyle["heading-style"] = leadForm
                  .children("h2")
                  .attr("style");
              if (leadForm.find(".text-type.lf-field > label").attr("style"))
                leadFormStyle["label-style"] = leadForm
                  .find(".text-type.lf-field > label")
                  .attr("style");

              if (
                leadForm
                  .find(
                    ".checkbox-type.lf-field > label,.radio-type.lf-field > label,.select-type.lf-field > label"
                  )
                  .attr("style")
              ) {
                leadFormStyle["radio-label-style"] = leadForm
                  .find(
                    ".checkbox-type.lf-field > label,.radio-type.lf-field > label,.select-type.lf-field > label"
                  )
                  .attr("style");
              }

              if (
                leadForm
                  .find(".checkbox-type.lf-field li,.radio-type.lf-field li")
                  .attr("style")
              ) {
                leadFormStyle["radio-text-style"] = leadForm
                  .find(".checkbox-type.lf-field li,.radio-type.lf-field li")
                  .attr("style");
              }

              if (leadForm.find(".text-type.lf-field input").attr("style"))
                leadFormStyle["field-style"] = leadForm
                  .find(".text-type.lf-field input")
                  .attr("style");

              if (leadForm.find(".lf-form-submit").attr("style"))
                leadFormStyle["submit-style"] = leadForm
                  .find(".lf-form-submit")
                  .attr("style");

              if (leadForm.find(".lf-form-submit").attr("data-alignment"))
                leadFormStyle["submit-align"] = leadForm
                  .find(".lf-form-submit")
                  .attr("data-alignment");

              if (leadForm.find(".text-type.lf-field").attr("style"))
                leadFormStyle["lf-field-style"] = leadForm
                  .find(".text-type.lf-field")
                  .attr("style");

              saveAttrData["styles"] = leadFormStyle;
            } else if (checkInput.data("rl-editable") == "spacer") {
              saveAttrData = { type: "spacer", content: "" };
              if (checkInput.attr("style")) {
                saveAttrData["style"] = checkInput.attr("style");
              }
              if (checkInput.attr("data-uniqid"))
                saveAttrData["id"] = checkInput.attr("data-uniqid");
            } else {
              saveAttrData = {
                type: checkInput.data("rl-editable"),
                content: checkInput.html(),
              };
              if (checkInput.attr("style"))
                saveAttrData["style"] = checkInput.attr("style");
              if (checkInput.data("editor-link"))
                saveAttrData["link"] = checkInput.attr("data-editor-link");
              if (checkInput.data("editor-link-target") && saveAttrData["link"])
                saveAttrData["target"] = checkInput.attr(
                  "data-editor-link-target"
                );
              if (checkInput.data("content-alignment"))
                saveAttrData["alignment"] = checkInput.attr(
                  "data-content-alignment"
                );
              if (checkInput.attr("data-uniqid"))
                saveAttrData["id"] = checkInput.attr("data-uniqid");
              // image condition
              if (checkInput.data("rl-editable") == "image") {
                saveAttrData["image-url"] = checkInput.attr("src");
              }
            }
            content_data.push(saveAttrData);
          });
          return content_data;
        }
      }

      return saveData;
    },
    _confirmMsg: function (show, msg = false) {
      if (show) {
        let container = $(".resetConfirmPopup");
        if (msg) container.find(".resetHeader > span").html(msg);
        container.addClass("active");
        $(".wppbPopup.deny").click(function (e) {
          e.preventDefault();
          container.removeClass("active");
        });
        $(document).mouseup(function (e) {
          let resetWrapper = $(".resetWrapper");
          if (
            !resetWrapper.is(e.target) &&
            resetWrapper.has(e.target).length === 0
          ) {
            container.removeClass("active");
          }
        });
      }
    },
    _deleteAddon: function (e) {
      e.preventDefault();
      let this_btn = $(this);
      let bid = this_btn.data("bid");
      Wppb_save._confirmMsg(true, "Popup Will Delete Permanentally.");
      $(".wppbPopup.confirm")
        .off()
        .click(function (e) {
          let confirmBtn = $(this);
          confirmBtn.addClass("rlLoading");
          e.preventDefault();
          let data_ = { action: "delete_popup", bid: bid, p_wppb_nonce:wppb_ajax_backend.wppb_nonce };
          let returnData = Wppb_save._ajaxFunction(data_);
          returnData.success(function (response) {
            if (response || response == 0) {
              if (this_btn.closest(".wppb-custom-popup-list").length) {
                this_btn
                  .closest(".wppb-list-item")
                  .fadeOut("slow", function () {
                    this_btn.closest(".wppb-list-item").remove();
                  });
                $(".resetConfirmPopup").removeClass("active");
                confirmBtn.removeClass("rlLoading");
              } else {
                setTimeout(() => {
                  let pathName = window.location.pathname + "?page=wppb";
                  window.location.href = pathName;
                }, 1000);
              }
            }
          });
        });
    },
    _backPreviousPopup: function (e) {
      e.preventDefault();
      let href = $(this).attr("href");
      Wppb_save._confirmMsg(
        true,
        "Your Popup Data Will lose If You Will Not Save OR Update Popup."
      );
      $(".wppbPopup.confirm").click(function (e) {
        e.preventDefault();
        window.location.href = href;
      });
    },
    _businessTabSetting: function (e) {
      e.preventDefault();
      let tabActive = "active";
      let currentLink = $(this);
      currentLink.siblings().removeClass(tabActive);
      currentLink.addClass(tabActive);
      // for tab change
      let getTabActive = currentLink.data("tab");
      let getTabGroup = currentLink.data("tab-group");
      $('[data-tab-group="' + getTabGroup + '"][data-tab-active]').removeClass(
        tabActive
      );
      $(
        '[data-tab-group="' +
          getTabGroup +
          '"][data-tab-active="' +
          getTabActive +
          '"]'
      ).addClass(tabActive);
    },
    _ajaxFunction: function (data_) {
      return jQuery.ajax({
        method: "post",
        url: wppb_ajax_backend.wppb_ajax_url,
        data: data_,
      });
    },
    _savePopupActiveDeactive: function () {
      let this_button = $(this);
      let popup_id = this_button.data("bid");
      let isActive = this_button.prop("checked") == true ? 1 : 0;
      this_button.addClass("business_disabled");
      let data_ = {
        action: "popup_active",
        bid: popup_id,
        is_active: isActive,
        p_wppb_nonce:wppb_ajax_backend.wppb_nonce,
      };
      let returnData = Wppb_save._ajaxFunction(data_);
      returnData.success(function (response) {
        if (response) {
          this_button.removeClass("business_disabled");
        }
      });
    },
    _installNow: function (event) {
      event.preventDefault();
      var $button = $(event.target);
      $(this).addClass("rlLoading");
      $document = $(document);
      if (
        $button.hasClass("updating-message") ||
        $button.hasClass("button-disabled")
      ) {
        return;
      }
      if (
        wp.updates.shouldRequestFilesystemCredentials &&
        !wp.updates.ajaxLocked
      ) {
        wp.updates.requestFilesystemCredentials(event);
        $document.on("credential-modal-cancel", function () {
          var $message = $(".install-lead-form-btn");
          $message
            .addClass("active-lead-form-btn")
            .removeClass("updating-message install-lead-form-btn")
            .text(wp.updates.l10n.installNow);
          wp.a11y.speak(wp.updates.l10n.updateCancel, "polite");
        });
      }
      wp.updates.installPlugin({
        slug: "lead-form-builder",
      });
    },
    _activatePlugin: function (event, response) {
      event.preventDefault();
      $(this).addClass("rlLoading");
      let button = $(".install-lead-form-btn");
      let timining = 100;
      if (0 === button.length) {
        button = $(".active-lead-form-btn");
        timining = 1000;
      }
      setTimeout(function () {
        let data_ = { action: "activate_lead_form" };
        let returnData = Wppb_save._ajaxFunction(data_);
        returnData.success(function (response) {
          if (response.data.success) {
            button.remove();
            $(".lead-form-bulider-select").show();
            $(".lead-form-bulider-select select").html(
              "<option>select form</option>" + response.data.success
            );
          }
        });
      }, timining);
    },
    _pluginInstalling: function (event, args) {
      event.preventDefault();
      let leadFormBtn = $(".install-lead-form-btn");
      leadFormBtn.addClass("updating-message");
    },
    _installError: function (event, response) {
      var $card = $(".install-lead-form-btn");
      $card
        .removeClass("button-primary")
        .addClass("disabled")
        .html(wp.updates.l10n.installFailedShort);
    },
    _saveSetting: function () {
      let savedata = {};
      // popup placement data------------
      let getPlacement = $(
        '.wppb-popup-placement input[name="popup-placement"]:checked'
      );
      if (getPlacement.length && getPlacement.val() != "") {
        savedata["placement"] = getPlacement.val();
      }
      // popup Selected device------------
      let getPopupDevice = $(
        '.wppb-display-device [name="popup-device"]:checked'
      );
      if (getPopupDevice.length && getPopupDevice.val())
        savedata["device"] = getPopupDevice.val();
      //popup trigger------------
      let getTrigger = $('.wppb-display-trigger input[name="popup-trigger"]');
      if (getTrigger.length) {
        savedata["trigger"] = {};
        $.each(getTrigger, function () {
          let input_ = $(this);
          let checked_ = input_.prop("checked") == true ? true : false;
          let inputval = input_.val();
          //for time spent
          if (inputval == "page-load") {
            savedata["trigger"]["page-load"] = checked_;
            if (checked_) {
              savedata["trigger"]["time"] = {};
              let time_ = $(
                '.wppb-display-trigger .trigger-time input[type="number"][name="second"]'
              );
              if (time_.val() && time_.val() > 0)
                savedata["trigger"]["time"]["second"] = time_.val();
              if ($.isEmptyObject(savedata["trigger"]["time"]))
                delete savedata["trigger"]["time"];
            }
          }
        });
      }
      // frequency------------
      // for one time
      let frequency_ = $(
        '.wppb-popup-frequency input[name="frequency"]:checked'
      );
      if (frequency_.length) {
        savedata["frequency"] = frequency_.val();
      }
      return savedata;
    },
    _businessOptionUpdate: function (e) {
      let optData = Wppb_save._saveSetting();
      let button = $(this);
      button.addClass("rlLoading");
      let bid = button.data("bid");
      let data_ = { action: "option_update", popup_id: bid, option: optData, p_wppb_nonce:wppb_ajax_backend.wppb_nonce };
      let returnData = Wppb_save._ajaxFunction(data_);
      returnData.success(function (response) {
        // console.log(response);
        setTimeout(function () {
          button.addClass("business_disabled");
          button.removeClass("rlLoading");
        }, 500);
      });
    },
    _wppbPopupSetting: function () {
      // console.log($(this));
      $(".wppb-popup-setting-save").removeClass("business_disabled");
      let input = $(this);
      let inputName = input.attr("name");
      let inputVal = input.val();
      let check = input.prop("checked") == true ? true : false;

      // for placement
      if (inputName == "popup-placement") {
        inputVal == "pages"
          ? $(".wppb-placement-selection").slideDown()
          : $(".wppb-placement-selection").slideUp();
      } else if (inputName == "popup-trigger") {
        if (inputVal == "click") {
          check
            ? $(".wppb-display-trigger .trigger-class-id").slideDown()
            : $(".wppb-display-trigger .trigger-class-id").slideUp();
        } else if (inputVal == "page-load") {
          check
            ? $(".wppb-display-trigger .trigger-time").slideDown()
            : $(".wppb-display-trigger .trigger-time").slideUp();
        } else if (inputVal == "page-scroll") {
          check
            ? $(".wppb-display-trigger .page-scroll").slideDown()
            : $(".wppb-display-trigger .page-scroll").slideUp();
        }
      }
    },
    _bind() {
      $(document).on(
        "change keyup",
        ".wppb-popup-option input[type]",
        Wppb_save._wppbPopupSetting
      );
      $(document).on(
        "click",
        ".wppb_popup_saveAddon",
        Wppb_save._saveBusinessAddon
      );
      $(document).on(
        "click",
        ".wppb_popup_updateAddon",
        Wppb_save._updateAddon
      );
      $(document).on(
        "click",
        ".wppb_popup_deleteAddon",
        Wppb_save._deleteAddon
      );

      $(document).on(
        "click",
        ".wppb-back-page-popup",
        Wppb_save._backPreviousPopup
      );

      $(document).on(
        "click",
        ".wppb-popup-setting-save",
        Wppb_save._businessOptionUpdate
      );
      $(document).on(
        "click",
        "[data-tab-group][data-tab]",
        Wppb_save._businessTabSetting
      );
      $(document).on(
        "change",
        ".wppb_popup_setting_active",
        Wppb_save._savePopupActiveDeactive
      );

      $(document).on("click", ".wppb-export-sub", Wppb_save._exportPopup);

      // lead form install
      $(document).on("click", ".install-lead-form-btn", Wppb_save._installNow);
      $(document).on(
        "click",
        ".active-lead-form-btn",
        Wppb_save._activatePlugin
      );
      $(document).on("wp-plugin-install-success", Wppb_save._activatePlugin);
      $(document).on("wp-plugin-installing", Wppb_save._pluginInstalling);
      $(document).on("wp-plugin-install-error", Wppb_save._installError);
    },
  };
  // business popup editor functionlity
  var Custom_popup_editor = {
    init: function () {
      Custom_popup_editor._popupEditorInit();
      Custom_popup_editor._bind();
    },
    _confirmMsgOn: function () {
      if (!$(".wppb-back-page-popup").length)
        $(".wppb-popup-cmn-nav-item a:first-child").addClass(
          "wppb-back-page-popup"
        );
      // Custom_popup_editor._confirmMsgOn()
    },
    _resetSettingOnClick: function () {
      $(".rl_i_editor-item-content").slideUp("fast");
      $(".rl-lead-form-panel, .wppb-sections-extra").slideUp("fast");
      if ($(".rl-editable-key-action").length)
        $(".rl-editable-key-action").removeClass("rl-editable-key-action");
      $(".rl-list-panel").slideUp();
    },
    _resetSettingOpen: function () {
      let toggleContainer = $("[data-toggle]");
      // let toggleContainer = $(".rl_i_editor-element-Toggle");
      jQuery.each(toggleContainer, (index, value) => {
        let separateToggle = $(value);
        let separateToggleData = separateToggle.data("toggle");
        separateToggle.removeClass("rl-active");
        $('[data-toggle-action="' + separateToggleData + '"]').slideUp("slow");
      });
    },
    _popupEditorInit: function () {
      //link same tab and another tab setting
      $(".rl_i_editor-item-content-header [data-editor-tab]").click(
        function () {
          let thisButton = $(this);
          thisButton
            .closest(".rl_i_editor-item-content-header")
            .siblings(".rl_i_editor-item-content-i")
            .removeClass("active_");
          thisButton.addClass("active_").siblings().removeClass("active_");
          $(
            ".rl_i_editor-item-content-" + thisButton.data("editor-tab")
          ).addClass("active_");
        }
      );

      $("[data-toggle]").click(function () {
        // close container while open content style
        let clickTarget = $(this);
        clickTarget.siblings().removeClass("rl-active");
        let getContainer = clickTarget.data("toggle");
        clickTarget.toggleClass("rl-active");
        $('[data-toggle-action="' + getContainer + '"]')
          .siblings("[data-toggle-action]")
          .slideUp("fast");
        $('[data-toggle-action="' + getContainer + '"]').slideToggle("fast");
        // hide style element
        if (clickTarget.hasClass("outer-toggle"))
          $(".rl_i_editor-item-content").slideUp("fast");
        $(".rl-lead-form-panel").hide();
      });
      Custom_popup_editor._dragAndShort();
      Custom_popup_editor._globalSettingInit();
      Custom_popup_editor._leadFormInit();

      if ($(".rl_i_editor-main-container").length) {
        Custom_popup_editor._forEditorSticky();
        $(window).scroll(() => Custom_popup_editor._forEditorSticky());
      }
    },
    _forEditorSticky: function () {
      let navigation = $(".rl_i_editor-main-container");
      let windowOffset = $(window);
      if (
        windowOffset.scrollTop() + 32 > navigation.offset().top &&
        navigation.offset().top != 0
      ) {
        navigation.find(".rl_i_editor-inner-wrap").addClass("sticky");
      } else {
        navigation.find(".rl_i_editor-inner-wrap").removeClass("sticky");
      }
    },
    _dragAndShort: function () {
      $(".wppb-popup-custom .rlEditorDropable")
        .sortable({
          connectWith: ".wppb-popup-custom .rlEditorDropable",
          revert: true,
          placeholder: "ui-state-highlight",
          cursor: "move",
          // cancel:'.contentEditable',
          update: function () {
            let droppedContainer = $(this);
            if (droppedContainer.children().length > 1)
              droppedContainer.children(".rl_rmBlankSpace").remove();
          },
        })
        .disableSelection();

      let clientXcount = 0,
        clientYcount = 0;

      $(".rl_i_editor-element-add-item-list [data-item-drag]")
        .draggable({
          connectToSortable: ".wppb-popup-custom .rlEditorDropable",
          helper: "clone",
          revert: "invalid",
          cursor: "move",
          containment: "document",
          drag: function (event, ui) {
            let container = $(".wppb-popup-custom .rlEditorDropable");
            container.addClass("wppb-drop-on-target");
          },
          stop: function (event, ui) {
            $(".wppb-popup-custom .rlEditorDropable").removeClass(
              "wppb-drop-on-target"
            );
            Custom_popup_editor._initAfterDrag(ui.helper);
          },
        })
        .disableSelection();
    },
    _initAfterDrag: function (myObj) {
      let editable, defaultText, extraAttr;
      let checkDragItem = myObj.data("item-drag");
      if (checkDragItem == "text") {
        defaultText = "Add Your Text Here";
        editable = "text";
      } else if (checkDragItem == "heading") {
        defaultText = "Add Your Heading Here";
        editable = "heading";
        extraAttr = { class: "text-heading" };
      } else if (checkDragItem == "link") {
        defaultText = "Link Text";
        editable = "link";
        extraAttr = {
          "data-editor-link": "#",
          "data-editor-link-target": "0",
          style:
            "width:fit-content;padding: 6px 12px;border:1px solid #ffffff;",
          "data-content-alignment": "center",
        };
      } else if (checkDragItem == "lead-form") {
        defaultText = "Please Select Form";
        editable = "lead-form";
        extraAttr = { class: "wppb-popup-lead-form", id: "lf-business-popup" };
      } else if (checkDragItem == "spacer") {
        defaultText = "";
        editable = "spacer";
        extraAttr = {
          style: "height: 60px;",
        };
      } else if (checkDragItem == "shortcode") {
        defaultText = "Enter Shortcode";
        editable = "shortcode";
        extraAttr = { class: "wppb-popup-shortcode" };
      }

      let putAttr = { "data-rl-editable": editable };
      if (extraAttr) putAttr = jQuery.extend(putAttr, extraAttr);

      let newElement = Custom_popup_editor._addElement(
        putAttr,
        checkDragItem,
        defaultText
      );

      myObj.css("visibility", "hidden");
      setTimeout(function () {
        myObj.replaceWith(newElement);
      }, 600);
    },
    _addElement: function (putAttr, checkDragItem, defaultText) {
      let putHtml = '<div class="data-rl-editable-wrap">';
      putHtml +=
        '<div class="actions_"><span class="dashicons dashicons-no rlRemoveElement"></span></div>';
      putHtml += "<span>" + defaultText + "</span>";
      putHtml += "</div>";
      let newElement = $(putHtml);
      newElement.children("span").attr(putAttr);
      if (checkDragItem == "image") {
        let imageUrl = $('input[name="popup-url"]').val();
        let iMg =
          '<img src="' +
          imageUrl +
          'img/blank-img.png" style="width: 210px;" data-rl-editable="image">';
        newElement.children("span").replaceWith(iMg);
      } else if (checkDragItem == "link") {
        newElement.css("justify-content", "center");
      } else if (checkDragItem == "lead-form" || checkDragItem == "shortcode") {
        newElement.css("justify-content", "center");
        newElement.children("span").removeAttr("data-rl-editable");
      }
      return newElement;
    },
    _openEditPanel: function (e) {
      let clickedObj = $(this);
      let clickedObjData1 = clickedObj.data("rl-editable");
      //   if ($(".rl-editable-key-action").length)
      //     $(".rl-editable-key-action").removeClass("rl-editable-key-action");
      //   clickedObj.addClass("rl-editable-key-action");
      //   let wrapperContent = $(".rl_i_editor-item-content");
      // close container while open content style
      //   $(".rl-lead-form-panel").hide();
      //   let toggleContainer = $(".rl_i_editor-element-Toggle");
      //   jQuery.each(toggleContainer, (index, value) => {
      //     let separateToggle = $(value);
      //     let separateToggleData = separateToggle.data("toggle");
      //     if (
      //       separateToggleData == "add-itemes" ||
      //       separateToggleData == "global-setting" ||
      //       separateToggleData == "close-btn-setting"
      //     ) {
      //       separateToggle.removeClass("rl-active");
      //       $('[data-toggle-action="' + separateToggleData + '"]').slideUp(
      //         "slow"
      //       );
      //     }
      //   });
      Custom_popup_editor._resetSettingOpen();

      // let toggleContainer = $("[data-toggle]");
      //   // let toggleContainer = $(".rl_i_editor-element-Toggle");
      //   jQuery.each(toggleContainer, (index, value) => {
      //     let separateToggle = $(value);
      //     let separateToggleData = separateToggle.data("toggle");
      //     separateToggle.removeClass("rl-active");
      //     $('[data-toggle-action="' + separateToggleData + '"]').slideUp("slow");
      //   });
      Custom_popup_editor._resetSettingOnClick();
      // $(".rl_i_editor-item-content").slideUp("fast");
      //   $(".rl-lead-form-panel, .wppb-sections-extra").slideUp("fast");
      //   if ($(".rl-editable-key-action").length)
      //     $(".rl-editable-key-action").removeClass("rl-editable-key-action");
      //   $(".rl-list-panel").slideUp();
      clickedObj.addClass("rl-editable-key-action");
      let wrapperContent = $(".rl_i_editor-item-content");
      $(".rl_i_editor-item-content .spacer_").hide();
      $('[data-editor-tab="style"]').show();
      if (clickedObjData1 == "image") {
        $(".rl_i_editor-item-content .item-image").show();
        $(".rl_i_editor-item-content .item-text").hide();
      } else if (clickedObjData1 == "spacer") {
        $(".rl_i_editor-item-content .item-image").hide();
        $(".rl_i_editor-item-content .item-text").hide();
        $(".rl_i_editor-item-content .spacer_").show();
        $('[data-editor-tab="style"]').hide();
        clickedObj.removeAttr("contenteditable");
      } else {
        $(".rl_i_editor-item-content .item-image").hide();
        $(".rl_i_editor-item-content .item-text").show();
        clickedObj.attr("contenteditable", true);
        Custom_popup_editor.placeCaretAtEnd(clickedObj.focus()[0]);
      }
      // close container while open content style
      wrapperContent.slideDown("slow");

      // scrolling function apply
      Custom_popup_editor._scrollFunction(wrapperContent);

      let allInputs = wrapperContent.find("[data-editor-input]");
      let initInput_ = (index, value) => {
        let seperateInput = $(value);
        let seperateInputData1 = seperateInput.data("editor-input");
        
        // reset value
        if (value.type == "radio" || value.type == "checkbox") {
          seperateInput.prop("checked", false);
        } else if (
          value.type == "text" ||
          value.type == "textarea" ||
          value.type == "number"
        ) {
          seperateInput.val("");
        }
        // reset value
        if (
          (clickedObjData1 == "text" ||
            clickedObjData1 == "link" ||
            clickedObjData1 == "heading") &&
          seperateInputData1 == "title"
        ) {
          // get text of clicked item
          seperateInput.val(clickedObj.html());
          // if change by content editable then it will on
          clickedObj.keyup(function (e) {
            seperateInput.val($(this).text());
          });
        } else if (seperateInputData1 == "link") {
          // get link href of clicked item
          clickedObj.data("editor-link")
            ? seperateInput.val(clickedObj.data("editor-link"))
            : seperateInput.val("#");
        } else if (
          clickedObj.data("editor-link") &&
          seperateInputData1 == "_linktarget"
        ) {
          if (clickedObj.data("editor-link-target") == 1) {
            seperateInput.prop("checked", true);
          } else {
            seperateInput.prop("checked", false);
          }
        } else if (
          seperateInput.data("input-color") &&
          seperateInputData1 != "border"
        ) {
          Custom_popup_editor._colorPickr(
            seperateInput,
            clickedObj,
            seperateInputData1
          );
        } else if (seperateInputData1 == "text-alignment-choice") {

          let getAlignment = clickedObj.css("text-align");
          if (seperateInput.val() == getAlignment) {
            seperateInput.prop("checked", true);
          }
        } else if (seperateInput.attr("type") == "range") {
          if (seperateInputData1 == "item-width") {
            let width = clickedObj.outerWidth();
            let pwidth = clickedObj.parent().width();
            let getWidthInPer = Math.round((width / pwidth) * 100);
            Custom_popup_editor._inputRange(
              seperateInput,
              clickedObj,
              seperateInputData1,
              getWidthInPer
            );
          } else {
            Custom_popup_editor._inputRange(
              seperateInput,
              clickedObj,
              seperateInputData1
            );
          }
        } else if (seperateInputData1 == "content-alignment") {
          if (
            clickedObj.data("content-alignment") == "center" &&
            seperateInput.val() == "center"
          ) {
            seperateInput.prop("checked", true);
          } else if (
            clickedObj.data("content-alignment") == "flex-end" &&
            seperateInput.val() == "right"
          ) {
            seperateInput.prop("checked", true);
          } else if (
            !clickedObj.data("content-alignment") &&
            seperateInput.val() == "left"
          ) {
            seperateInput.prop("checked", true);
          }
        } else if (seperateInputData1 == "margin") {
          let margins = clickedObj.css(
            "margin-" + seperateInput.data("margin")
          );
          if (margins || margins == "0") seperateInput.val(parseInt(margins));
        } else if (seperateInputData1 == "padding") {
          let paddings = clickedObj.css(
            "padding-" + seperateInput.data("padding")
          );
          if (paddings || paddings == "0")
            seperateInput.val(parseInt(paddings));
        } else if (seperateInputData1 == "img" && clickedObjData1 == "image") {
          let imgCurrent = clickedObj.attr("src");
          seperateInput.css("background-image", "url(" + imgCurrent + ")");
          if ($(".getChangeImage_").length)
            $(".getChangeImage_").removeClass("getChangeImage_");
          clickedObj.addClass("getChangeImage_");
        } else if (seperateInputData1 == "border") {
          Custom_popup_editor.__borderGet(clickedObj, seperateInput);
        } else if (seperateInputData1 == "font-weight") {
          let fontWeight = clickedObj.css("font-weight");
          seperateInput.val(fontWeight);
        }
      };
      jQuery.each(allInputs, initInput_);
    },
    _changedSetEditor: function (e) {
      let eventType = e.type;
      Custom_popup_editor._confirmMsgOn();
      let changedInput = $(this);
      let clickedObj = $(".rl-editable-key-action");
      let changeData = changedInput.data("editor-input");
      let changeValue = changedInput.val();
      if (changeData == "title" && eventType == "keyup") {
        // set text of clicked item
        clickedObj.html(changeValue);
      } else if (changeData == "link") {
        // set link href of clicked item
        clickedObj.attr("data-editor-link", changeValue);
      } else if (
        changeData == "_linktarget" &&
        clickedObj.data("editor-link")
      ) {
        // set link href of clicked item
        let putVal = changedInput.prop("checked") == true ? 1 : 0;
        clickedObj.attr("data-editor-link-target", putVal);
      } else if (changeData == "text-alignment-choice") {
        // set aligment clicked item
        clickedObj.css("text-align", changeValue);
      } else if (changeData == "font-size") {
        // set font size with parameter clicked item
        clickedObj.css("font-size", changeValue + "px");
      } else if (changeData == "letter-spacing") {
        // set line-height of clicked item
        clickedObj.css("letter-spacing", changeValue + "px");
      } else if (changeData == "line-height") {
        // set line-height of clicked item
        clickedObj.css("line-height", changeValue + "px");
      } else if (changeData == "margin" || changeData == "padding") {
        Custom_popup_editor._marginPadding(
          changeData,
          changedInput,
          clickedObj,
          changeValue
        );
      } else if (changeData == "item-width") {
        clickedObj.css("width", changeValue + "%");
      } else if (changeData == "content-alignment") {
        Custom_popup_editor._contentAlign(clickedObj, changeValue);
      } else if (changeData == "border") {
        Custom_popup_editor._borderFn(clickedObj, changedInput, changeValue);
      } else if (changeData == "font-weight") {
        clickedObj.css("font-weight", changeValue);
      } else if (changeData == "height") {
        clickedObj.css("height", changeValue + "px");
      }
    },
    _globalSettingInit: function () {
      let inputs = $("[data-global-input]");
      if (inputs.length) jQuery.each(inputs, globalInit_);
      function globalInit_(ind, value) {
        //loop
        let sepInput = $(value);
        let dataInput = sepInput.data("global-input");
        let sepInputDataClr = sepInput.data("input-color");

        let setHiddenInputI = $('input[type="hidden"][data-global-save]');
        let setHiddenInput = setHiddenInputI;
        if (setHiddenInput.val()) {
          setHiddenInput = JSON.parse(setHiddenInput.val());
        }
        if (dataInput == "main-wrapper") {
          if (sepInput.data("show-range") == "wrapper-width") {
            Custom_popup_editor._inputRange(
              sepInput,
              $(".wppb-popup-custom .wppb-popup-custom-wrapper"),
              "width"
            );
          } else if (sepInput.data("padding")) {
            let paddings = $(
              ".wppb-popup-custom .wppb-popup-custom-content"
            ).css("padding-" + sepInput.data("padding"));
            sepInput.val(parseInt(paddings));
          }
        } else if (dataInput == "popup-name") {
          if (setHiddenInput["popup-name"]) {
            sepInput.val(setHiddenInput["popup-name"]);
            $(".wppb-popup-title-name").html(setHiddenInput["popup-name"]);
          } else {
            sepInput.val("No Name");
            $(".wppb-popup-title-name").html("No Name");
          }
        } else if (dataInput == "global-border") {
          let globalBorder = $(".wppb-popup-custom .wppb-popup-custom-wrapper");
          Custom_popup_editor.__borderGet(globalBorder, sepInput);
        } else if (dataInput == "main-wrapper-height") {
          Custom_popup_editor._inputRange(
            sepInput,
            $(".wppb-popup-custom .wppb-popup-custom-content"),
            "height"
          );
        } else if (dataInput == "wrapper-height-check") {
          let globalContentH = $(
            ".wppb-popup-custom .wppb-popup-custom-content"
          );
          let height = Custom_popup_editor._checkStyle(
            globalContentH,
            "height"
          );
          if (height == "auto" || !height) {
            sepInput.prop("checked", false);
            $(".global-wrapper-height-custom-auto").hide();
          } else {
            sepInput.prop("checked", true);
            $(".global-wrapper-height-custom-auto").show();
            if (
              globalContentH.innerHeight() <
              globalContentH.children().outerHeight()
            )
              globalContentH.css({ "overflow-y": "scroll" });
          }
        } else if (
          sepInputDataClr == "overlay-color" ||
          sepInputDataClr == "outside-color"
        ) {
          let colorObj;
          if (sepInputDataClr == "outside-color") {
            colorObj = $(".wppb-popup-custom");
            if (setHiddenInput["outside-color"])
              Custom_popup_editor._setStyleColor(
                colorObj,
                setHiddenInput["outside-color"],
                "background-color"
              );
          } else {
            colorObj = $(".wppb-popup-custom .wppb-popup-custom-overlay");
          }
          Custom_popup_editor._colorPickr(sepInput, colorObj, dataInput);
        } else if (dataInput == "overlay-image") {
          let imgUrl = $(
            ".wppb-popup-custom .wppb-popup-overlay-custom-img"
          ).css("background-image");
          let imageContainer = $(".global-overlay-image");
          let imageCheckbox = $('[data-global-input="global-overlay-image"]');
          if (imgUrl && imgUrl != "none") {
            sepInput.css("background-image", imgUrl);
            imageContainer.show();
            imageCheckbox.prop("checked", true);
          } else {
            sepInput.css("background-image", "none");
            imageContainer.hide();
            imageCheckbox.prop("checked", false);
          }
        } else if (dataInput == "background-position") {
          let getElemStyle = $(".wppb-popup-custom .wppb-popup-overlay-custom-img").attr("style");
          let saparateStyle =false;
          try {
            let saparateStyle = Custom_popup_editor._inlineCssSeparate(getElemStyle);          }
          catch(err) {
          }

          if (saparateStyle && "background-position" in saparateStyle &&
            sepInput.val() == saparateStyle["background-position"]
          ) {
            sepInput.prop("checked", true);
          } else if (sepInput.val() == "left top") {
            sepInput.prop("checked", true);
          }
        } else if (dataInput == "background-size") {
          let getElemStyle = $(
            ".wppb-popup-custom .wppb-popup-overlay-custom-img"
          );
          getElemStyle = getElemStyle.css("background-size");
          sepInput.val(getElemStyle);
        } else if (sepInput.data("cmn") == "close-btn") {
          let closeBtn = $(".wppb-popup-custom .wppb-popup-close-btn");
          if (dataInput == "close-option") {
            if (setHiddenInput["close-type"]) {
              sepInput.val(setHiddenInput["close-type"]);
            } else {
              sepInput.val(2);
            }
          }
          if (closeBtn.length) {
            let checkStyle = Custom_popup_editor._checkStyle(
              closeBtn,
              "display"
            );
            if (checkStyle != "none") {
              $(".close-btn-container").show();
            } else {
              $(".close-btn-container").hide();
            }

            if (dataInput == "close-font-size") {
              Custom_popup_editor._inputRange(sepInput, closeBtn, "font-size");
            } else if (dataInput == "close-btn" && sepInput.data("padding")) {
              let paddings = closeBtn.css(
                "padding-" + sepInput.data("padding")
              );
              sepInput.val(parseInt(paddings));
            } else if (
              sepInputDataClr == "close-btn-color" ||
              sepInputDataClr == "close-btn-bg-color"
            ) {
              Custom_popup_editor._colorPickr(sepInput, closeBtn, dataInput);
            } else if (dataInput == "close-btn" && sepInput.data("margin")) {
              let checkStyle = Custom_popup_editor._checkStyle(
                closeBtn,
                sepInput.data("margin")
              );
              let putParam = checkStyle ? parseInt(checkStyle) : 5;
              Custom_popup_editor._inputRange(
                sepInput,
                closeBtn,
                sepInput.data("margin"),
                putParam
              );
            } else if (
              sepInput.data("border") ||
              sepInput.data("input-color") == "border-color"
            ) {
              Custom_popup_editor.__borderGet(closeBtn, sepInput);
            }
          } else {
            $(".close-btn-container").hide();
          }
        } else if (dataInput == "column-width") {
          let get_wrap = $(".wppb-popup-custom .wppb-popup-rl-wrap");
          let getColumn = get_wrap.find(".wppb-popup-rl-column");
          if (getColumn.length == 2) {
            $(".rl-two-column-width").show();
            if (sepInput.data("column") == 1) {
              let firstClumn = $(getColumn[0]);
              let firstColumnW = Custom_popup_editor._checkStyle(
                firstClumn,
                "width"
              );
              firstColumnW
                ? sepInput.val(parseInt(firstColumnW))
                : sepInput.val(50);
            } else if (sepInput.data("column") == 2) {
              let firstClumn = $(getColumn[1]);
              let firstColumnW = Custom_popup_editor._checkStyle(
                firstClumn,
                "width"
              );
              firstColumnW
                ? sepInput.val(parseInt(firstColumnW))
                : sepInput.val(50);
            }
          } else {
            $(".rl-two-column-width").hide();
          }
        } else if (dataInput == "popup-delay-close") {
          let popupDalayClose = setHiddenInput["popup-delay-close"]
            ? setHiddenInput["popup-delay-close"]
            : 0;
          Custom_popup_editor._inputRange(
            sepInput,
            false,
            false,
            popupDalayClose
          );
        } else if (dataInput == "box-shadow-global") {
          Custom_popup_editor._setBoxShadow(
            sepInput,
            $(".wppb-popup-custom .wppb-popup-custom-wrapper")
          );
        }
      } //loop
    },
    _globalSetEditor: function (e) {
      Custom_popup_editor._confirmMsgOn();
      let sepInput = $(this);
      if (sepInput) {
        let checkDatatype = sepInput.data("type");
        let inputData = sepInput.data("global-input");
        let inputValue = sepInput.val();
        let setHiddenInputI = $('input[type="hidden"][data-global-save]');
        let setHiddenInput = setHiddenInputI;
        if (setHiddenInput.val()) {
          setHiddenInput = JSON.parse(setHiddenInput.val());
        }
        let checkArray = typeof setHiddenInput === "object" ? true : false;
        if (inputData == "main-wrapper") {
          if (sepInput.data("show-range") == "wrapper-width") {
            $(".wppb-popup-custom .wppb-popup-custom-wrapper").css(
              "width",
              inputValue
            );
          } else if (sepInput.data("padding")) {
            let optPerform = $(".wppb-popup-custom .wppb-popup-custom-content");
            Custom_popup_editor._globalPadding(
              "padding",
              sepInput,
              optPerform,
              inputValue
            );
          } else if (sepInput.data("origin") == "padding") {
            let optPerform = $(".wppb-popup-custom .wppb-popup-custom-content");
            Custom_popup_editor._globalPadding(
              "padding-origin",
              sepInput,
              optPerform,
              inputValue
            );
          }
        } else if (inputData == "global-border") {
          let globalBorder = $(".wppb-popup-custom .wppb-popup-custom-wrapper");
          Custom_popup_editor._borderFn(globalBorder, sepInput, inputValue);
        } else if (inputData == "main-wrapper-height") {
          let globalContentH = $(
            ".wppb-popup-custom .wppb-popup-custom-content"
          );
          globalContentH.css("height", inputValue + "px");

          if (
            globalContentH.innerHeight() <
            globalContentH.children().outerHeight()
          ) {
            globalContentH.css({ "overflow-y": "scroll" });
          } else {
            Custom_popup_editor._removeStyle(globalContentH, "overflow");
          }
          if (checkArray) setHiddenInput["wrapper-height"] = inputValue;
        } else if (inputData == "wrapper-height-check") {
          let globalContentH = $(
            ".wppb-popup-custom .wppb-popup-custom-content"
          );
          if (sepInput.prop("checked") === false) {
            globalContentH.css("height", "auto");
            if (checkArray) setHiddenInput["wrapper-height"] = "auto";
            $(".global-wrapper-height-custom-auto").slideUp("fast");
            Custom_popup_editor._removeStyle(globalContentH, "overflow");
          } else {
            $(".global-wrapper-height-custom-auto").slideDown("fast");
            let putHeight = $(".global-wrapper-height-custom-auto").find(
              '[data-global-input="main-wrapper-height"]'
            );
            Custom_popup_editor._inputRange(
              putHeight,
              globalContentH,
              "height"
            );
          }
        } else if (inputData == "background-position") {
          $(".wppb-popup-custom .wppb-popup-overlay-custom-img").css(
            "background-position",
            inputValue
          );
        } else if (inputData == "background-size") {
          $(".wppb-popup-custom .wppb-popup-overlay-custom-img").css(
            "background-size",
            inputValue
          );
        } else if (inputData == "global-overlay-image") {
          let imageContainer = $(".global-overlay-image");
          let imageDiv = $(".wppb-popup-custom .wppb-popup-overlay-custom-img");
          if (sepInput.prop("checked") === true) {
            imageContainer.slideDown("fast");
            let popupUrl = $('input[name="popup-url"]').val();
            let imgUrl = "url('" + popupUrl + "img/blank-img.png')";
            if (imageDiv.attr("data-overlay-image") != "") {
              imgUrl = "url('" + imageDiv.data("overlay-image") + "')";
              imageDiv.css("background-image", imgUrl);
            }
            $(".global-overlay-image .rl-i-choose-image-wrap").css(
              "background-image",
              imgUrl
            );
          } else {
            imageContainer.slideUp("fast");
            imageDiv.css("background-image", "none");
            // $('.wppb-popup-custom .wppb-popup-overlay-custom-img').removeAttr('data-overlay-image');
          }
        } else if (inputData == "close-font-size") {
          $(".wppb-popup-custom .wppb-popup-close-btn").css(
            "font-size",
            inputValue + "px"
          );
        } else if (inputData == "close-option") {
          if (checkArray) setHiddenInput["close-type"] = inputValue;
          let closeBtn = $(".wppb-popup-custom .wppb-popup-close-btn");
          if (inputValue == 1 || inputValue == 2) {
            if (!closeBtn.length) {
              let closeBtn =
                '<span class="wppb-popup-close-btn dashicons dashicons-no-alt"></span>';
              $(".wppb-popup-custom > div").prepend(closeBtn);
            } else {
              closeBtn.show();
            }
            $(".close-btn-container").show();
            Custom_popup_editor._globalSettingInit();
          } else {
            // $('.wppb-popup-custom .wppb-popup-close-btn').remove();
            closeBtn.hide();
            $(".close-btn-container").hide();
          }
        } else if (inputData == "close-btn") {
          let optPerform = $(".wppb-popup-custom .wppb-popup-close-btn");
          if (sepInput.data("padding")) {
            Custom_popup_editor._globalPadding(
              "padding",
              sepInput,
              optPerform,
              inputValue
            );
          } else if (sepInput.data("origin") == "padding") {
            Custom_popup_editor._globalPadding(
              "padding-origin",
              sepInput,
              optPerform,
              inputValue
            );
          } else if (sepInput.data("margin")) {
            optPerform.css(sepInput.data("margin"), inputValue + "%");
          } else if (sepInput.data("border")) {
            Custom_popup_editor._borderFn(optPerform, sepInput, inputValue);
          }
        } else if (inputData == "column-width") {
          let get_wrap = $(".wppb-popup-custom .wppb-popup-rl-wrap");
          let getColumn = get_wrap.find(".wppb-popup-rl-column");
          if (sepInput.data("column") == 1) {
            $(getColumn[0]).css("width", inputValue + "%");
            $(getColumn[1]).css("width", 100 - inputValue + "%");
            sepInput.siblings("input").val(100 - inputValue);
          } else if (sepInput.data("column") == 2) {
            $(getColumn[1]).css("width", inputValue + "%");
            $(getColumn[0]).css("width", 100 - inputValue + "%");
            sepInput.siblings("input").val(100 - inputValue);
          }
        } else if (inputData == "popup-delay-close") {
          if (checkArray) setHiddenInput["popup-delay-close"] = inputValue;
        } else if (inputData == "box-shadow-global") {
          Custom_popup_editor._boxShadowFn(
            $(".wppb-popup-custom .wppb-popup-custom-wrapper"),
            sepInput
          );
        }
        if (checkArray) setHiddenInputI.val(JSON.stringify(setHiddenInput));
      }
    },
    _rlRemoveElement: function () {
      let button = $(this);
      button.closest(".data-rl-editable-wrap").remove();
      $(".rl_i_editor-item-content").hide();
    },
    _chooseLayout: function () {
      let layoutName = $(
        '.wppb-popup-name-layout input[name="wppb-popup-layout"]'
      );
      let popupName = $(
        '.wppb-popup-name-layout input[name="wppb-popup-name"]'
      );
      let checkRadio = false;
      jQuery.each(layoutName, (index, value) => {
        let radio_ = $(value);
        if (radio_.prop("checked") == true) checkRadio = true;
      });
      if (checkRadio == true && popupName.val() != "") {
        $(".wppb-popup-name-init").removeClass("business_disabled");
      } else {
        $(".wppb-popup-name-init").addClass("business_disabled");
      }
    },
    _popupName: function () {
      let layOutRadio = $(
        '.wppb-popup-name-layout input[name="wppb-popup-layout"]:checked'
      );
      let layoutName = layOutRadio.val();
      let popupName = $(
        '.wppb-popup-name-layout input[name="wppb-popup-name"]'
      ).val();
      if (layoutName && popupName) {
        let getLayout = "";
        if (layoutName == "prebuilt") {
          let prebuiltLayout = layOutRadio.attr("data-prebuilt-id");
          getLayout = $(
            '.prebuilt-pupup-layout-container > div[data-layout="' +
              prebuiltLayout +
              '"]'
          ).html();
          layoutName = layOutRadio.data("layout")
            ? layOutRadio.data("layout")
            : "";
        } else {
          getLayout = $(
            '.prebuilt-pupup-layout-container > div[data-layout="' +
              layoutName +
              '"]'
          ).html();
        }

        let saveLAyout = { layout: layoutName, "popup-name": popupName };
        let outSideColor = $(
          '.wppb-popup-name-layout input[name="wppb-popup-layout"]:checked'
        ).data("outside-color");
        if (outSideColor) saveLAyout["outside-color"] = outSideColor;
        $('input[type="hidden"][data-global-save]').val(
          JSON.stringify(saveLAyout)
        );
        let putLayout = $(".wppb-popup-custom > div");
        putLayout.html(getLayout);
        $(".wppb-popup-name-layout").hide();
        $(".wppb-popup-custom, .rl_i_editor-main-container").show();
        Custom_popup_editor._dragAndShort();
        Custom_popup_editor._globalSettingInit();
      } else {
        alert("fill the popup name");
      }
    },
    _leadFormOpenPanel: function () {
      //   let getForm = $(this);
      //   $(".rl-lead-form-panel").slideDown("fast");
      //   // scrolling function apply
      //   Custom_popup_editor._scrollFunction($(".rl-lead-form-panel"));

      //   // close container while open content style
      //   $(".rl-editable-key-action").removeClass("rl-editable-key-action");
      //   let toggleContainer = $(".rl_i_editor-element-Toggle");
      //   jQuery.each(toggleContainer, (index, value) => {
      //     let separateToggle = $(value);
      //     let separateToggleData = separateToggle.data("toggle");
      //     separateToggle.removeClass("rl-active");
      //     $('[data-toggle-action="' + separateToggleData + '"]').slideUp("slow");
      //   });
      //   $(".rl_i_editor-item-content").slideUp("fast");

      //   if (getForm.data("form-id")) {
      //     $(".rl-lead-form-panel .lead-form-bulider-select select").val(
      //       getForm.attr("data-form-id")
      //     );
      //     Custom_popup_editor._leadFormStyling();
      //   }
      let getForm = $(this);
      Custom_popup_editor._scrollFunction($(".rl-lead-form-panel"));
      Custom_popup_editor._resetSettingOpen();
      Custom_popup_editor._resetSettingOnClick();
      $(".rl-lead-form-panel").slideDown("fast");
      $('rl-lead-form-panel').addClass("rl-editable-key-action");

      if (getForm.data("form-id")) {
        $(".rl-lead-form-panel .lead-form-bulider-select select").val(
          getForm.attr("data-form-id")
        );
        Custom_popup_editor._leadFormStyling();
      }
    },
    _leadFormChoose: function () {
      Custom_popup_editor._confirmMsgOn();
      let select = $(this);
      let form_id = select.val();
      if (parseInt(form_id)) {
        let letExistForm = $(
          ".wppb-popup-custom .wppb-popup-lead-form[data-form-id]"
        );
        letExistForm.length
          ? letExistForm.addClass("rlLoading")
          : $(".wppb-popup-custom #lf-business-popup").addClass("rlLoading");

        let data_ = { action: "getLeadForm", form_id: form_id };
        let returnData = Wppb_save._ajaxFunction(data_);
        returnData.success(function (response) {
          if (response && response != 0) {
            let replace_form =
              "<div class='wppb-popup-lead-form' data-form-id='" +
              form_id +
              "'>" +
              response +
              "</div>";
            if (letExistForm.length) {
              let getStyles = letExistForm.attr("data-form-styles");
              replace_form = $(replace_form).attr(
                "data-form-styles",
                getStyles
              );
              letExistForm.replaceWith(replace_form);
            } else {
              $(".wppb-popup-custom #lf-business-popup").replaceWith(
                replace_form
              );
            }
            Custom_popup_editor._leadFormInit();
            Custom_popup_editor._leadFormStyling();
          }
        });
      }
    },
    _leadFormInit: function () {
      let leadForm_ = $(".wppb-popup-lead-form");
      jQuery.each(leadForm_, (index, value) => {
        let leadForm = $(value);
        let leadFormStyle_ = leadForm.data("form-styles");
        leadForm = leadForm.find("form");
        if (leadFormStyle_) {
          // submit style
          if (leadFormStyle_["submit-style"]) {
            leadForm
              .find(".lf-form-submit")
              .attr("style", leadFormStyle_["submit-style"]);
          }
          // submit alignment
          if (leadFormStyle_["submit-align"]) {
            leadForm
              .find(".lf-form-submit")
              .attr("data-alignment", leadFormStyle_["submit-align"]);
          }
          if (leadFormStyle_["form-alignment"]) {
            let justify_ = "left";
            if (leadFormStyle_["form-alignment"] == "center") {
              justify_ = "center";
            } else if (leadFormStyle_["form-alignment"] == "right") {
              justify_ = "flex-end";
            }
            leadForm.attr(
              "data-form-alignment",
              leadFormStyle_["form-alignment"]
            );
            leadForm
              .closest(".leadform-show-form")
              .css("justify-content", justify_);
          }
          // form style
          if (leadFormStyle_["form-style"]) {
            leadForm.attr("style", leadFormStyle_["form-style"]);
          }
          //form alignment
          Custom_popup_editor._removeStyle(leadForm, "margin");
          //label style
          if (leadFormStyle_["label-style"]) {
            let element = leadForm.find(
              ".name-type.lf-field > label, .text-type.lf-field > label, .textarea-type.lf-field > label"
            );
            element.attr("style", leadFormStyle_["label-style"]);
          }
          // radio-label-style
          if (leadFormStyle_["radio-label-style"]) {
            let element = leadForm.find(
              ".checkbox-type.lf-field > label,.radio-type.lf-field > label,.select-type.lf-field > label"
            );
            element.attr("style", leadFormStyle_["radio-label-style"]);
          }
          // radio text
          if (leadFormStyle_["radio-text-style"]) {
            let element = leadForm.find(
              ".checkbox-type.lf-field li,.radio-type.lf-field li"
            );
            element.attr("style", leadFormStyle_["radio-text-style"]);
          }
          // radio-label-style
          if (leadFormStyle_["field-style"]) {
            let element = leadForm
              .find(".lf-field input, .lf-field textarea")
              .not(
                'input[type="submit"],input[type="radio"],input[type="checkbox"]'
              );
            element.attr("style", leadFormStyle_["field-style"]);
          }
          // heading style
          if (leadFormStyle_["heading-style"]) {
            let element = leadForm.children("h2");
            element.attr("style", leadFormStyle_["heading-style"]);
          }
          if (leadFormStyle_["lf-field-style"]) {
            // let element = leadForm.find('.name-type.lf-field, .text-type.lf-field,.textarea-type.lf-field');
            let element = leadForm.find(".lf-field");
            element.attr("style", leadFormStyle_["lf-field-style"]);
          }
        }
      });
    },
    _leadFormStyling: function () {
      $(".wppb-lead-form-styling").show();
      let leadForm = $(".wppb-popup-custom .wppb-popup-lead-form form");
      let getInputs = $(".wppb-lead-form-styling [data-lead-form]");
      function leadFormInput(index, value) {
        let sepInput = $(value);
        let getData = sepInput.data("lead-form");
        if (getData == "lf-form-width") {
          let width = leadForm.outerWidth();
          let pwidth = leadForm.closest(".leadform-show-form").width();
          let getWidthInPer = Math.round((width / pwidth) * 100);
          Custom_popup_editor._inputRange(
            sepInput,
            false,
            false,
            getWidthInPer
          );
        } else if (sepInput.data("input-color") == "lf-form-color") {
          Custom_popup_editor._colorPickr(
            sepInput,
            leadForm,
            "background-color"
          );
        } else if (sepInput.data("input-color") == "lf-heading-color") {
          Custom_popup_editor._colorPickr(
            sepInput,
            leadForm.children("h2"),
            "color"
          );
        } else if (getData == "lf-heading-font-size") {
          Custom_popup_editor._inputRange(
            sepInput,
            false,
            false,
            leadForm.children("h2").css("font-size")
          );
        } else if (sepInput.data("input-color") == "lf-submit-btn-color") {
          Custom_popup_editor._colorPickr(
            sepInput,
            leadForm.find("input.lf-form-submit"),
            "color"
          );
        } else if (sepInput.data("input-color") == "lf-submit-btn-bcolor") {
          Custom_popup_editor._colorPickr(
            sepInput,
            leadForm.find("input.lf-form-submit"),
            "background-color"
          );
        } else if (getData == "lf-submit-btn-font-size") {
          Custom_popup_editor._inputRange(
            sepInput,
            false,
            false,
            leadForm.find("input.lf-form-submit").css("font-size")
          );
        } else if (sepInput.data("input-color") == "lf-label-color") {
          // let element = leadForm.find('.name-type.lf-field > label, .text-type.lf-field > label, .textarea-type.lf-field > label');
          let element = leadForm.find(".lf-field > label");
          Custom_popup_editor._colorPickr(sepInput, element, "color");
        } else if (getData == "lf-label-font-size") {
          let element = leadForm.find(".lf-field > label").css("font-size");
          Custom_popup_editor._inputRange(sepInput, false, false, element);
        } else if (
          getData == "form-border" ||
          getData == "lf-submit-border" ||
          getData == "lf-field-border"
        ) {
          let elementBorder =
            getData == "form-border"
              ? leadForm
              : getData == "lf-field-border"
              ? leadForm
                  .find(".lf-field input, .textarea-type.lf-field textarea")
                  .not(
                    'input[type="submit"], input[type="radio"], input[type="checkbox"]'
                  )
              : leadForm.find("input.lf-form-submit");
          Custom_popup_editor.__borderGet(elementBorder, sepInput);
        } else if (getData == "form-heading-enable") {
          if (leadForm.children("h2").css("display") != "none") {
            $(".lead-form-heading-section").show();
            sepInput.prop("checked", true);
          } else {
            $(".lead-form-heading-section").hide();
            sepInput.prop("checked", false);
          }
        } else if (getData == "form-label-enable") {
          if (
            leadForm
              .find(".lf-field > label:not(.submit-type > label)")
              .css("display") != "none"
          ) {
            // $('.lead-form-label-section').show();
            sepInput.prop("checked", true);
          } else {
            // $('.lead-form-label-section').hide();
            sepInput.prop("checked", false);
          }
        } else if (sepInput.data("input-color") == "lf-field-color") {
          let element = leadForm.find(
            ".name-type.lf-field input, .text-type.lf-field input, .textarea-type.lf-field textarea"
          );
          Custom_popup_editor._colorPickr(sepInput, element, "color");
        } else if (
          sepInput.data("input-color") == "lf-field-background-color"
        ) {
          let element = leadForm.find(
            ".name-type.lf-field input, .text-type.lf-field input, .textarea-type.lf-field textarea"
          );
          Custom_popup_editor._colorPickr(
            sepInput,
            element,
            "background-color"
          );
        } else if (
          getData == "lf-field-font-size" ||
          getData == "lf-field-height"
        ) {
          let element = leadForm.find(".lf-field input");
          element =
            getData == "lf-field-font-size"
              ? element.css("font-size")
              : element.css("height");
          Custom_popup_editor._inputRange(sepInput, false, false, element);
        } else if (getData == "lf-submit-padding") {
          let element = leadForm.find("input.lf-form-submit");
          let paddings = element.css("padding-" + sepInput.data("padding"));
          if (paddings || paddings == "0") sepInput.val(parseInt(paddings));
        } else if (getData == "submit-font-weight") {
          let fontWeight = leadForm
            .find("input.lf-form-submit")
            .css("font-weight");
          if (fontWeight || fontWeight == "0")
            sepInput.val(parseInt(fontWeight));
        } else if (getData == "lf-submit-aliment") {
          let getAlignment = leadForm
            .find(".submit-type.lf-field")
            .css("text-align");
          if (getAlignment == sepInput.val()) sepInput.prop("checked", true);
        } else if (getData == "form-margin-center") {
          let checkAlign = leadForm.attr("data-form-alignment");
          if (checkAlign == "center" && sepInput.val() == "center") {
            sepInput.prop("checked", true);
          } else if (checkAlign == "right" && sepInput.val() == "right") {
            sepInput.prop("checked", true);
          } else if (
            (!checkAlign || checkAlign == "left") &&
            sepInput.val() == "left"
          ) {
            sepInput.prop("checked", true);
          }
        } else if (getData == "lf-field-margin") {
          let fieldMArgin = leadForm.find(".text-type.lf-field");
          let margins = fieldMArgin.css("margin-" + sepInput.data("margin"));
          if (margins || margins == "0") sepInput.val(parseInt(margins));
        } else if (getData == "lf-radio-checkbox-text-color") {
          let element = leadForm.find(
            ".radio-type.lf-field li,.checkbox-type.lf-field li"
          );
          if (element.length) {
            $(".lead-form-radio-text-section").show();
            Custom_popup_editor._colorPickr(sepInput, element, "color");
          } else {
            $(".lead-form-radio-text-section").hide();
          }
        } else if (getData == "lf-radio-checkbox-text-font-size") {
          let element = leadForm
            .find(".radio-type.lf-field li,.checkbox-type.lf-field li")
            .css("font-size");
          Custom_popup_editor._inputRange(sepInput, false, false, element);
        } else if (getData == "lf-radio-checkbox-text-margin") {
          let fieldMArgin = leadForm.find(
            ".radio-type.lf-field li,.checkbox-type.lf-field li"
          );
          let margins = fieldMArgin.css("margin-" + sepInput.data("margin"));
          if (margins || margins == "0") sepInput.val(parseInt(margins));
        }
      }
      jQuery.each(getInputs, leadFormInput);
    },
    _leadFormStylingSet: function () {
      Custom_popup_editor._confirmMsgOn();
      let input_ = $(this);
      let dataCheck = input_.data("lead-form");

      let inputVal = input_.val();
      let leadForm = $(".wppb-popup-custom .wppb-popup-lead-form form");
      if (dataCheck == "lf-form-width") {
        leadForm.css("width", inputVal + "%");
      } else if (dataCheck == "lf-radio-checkbox-text-font-size") {
        leadForm
          .find(".radio-type.lf-field li,.checkbox-type.lf-field li")
          .css("font-size", inputVal + "px");
      } else if (dataCheck == "lf-radio-checkbox-text-margin") {
        let radioCheckBox = leadForm.find(
          ".radio-type.lf-field li,.checkbox-type.lf-field li"
        );
        Custom_popup_editor._marginPadding(
          "margin",
          input_,
          radioCheckBox,
          inputVal
        );
      } else if (dataCheck == "lf-label-font-size") {
        leadForm.find(".lf-field > label").css("font-size", inputVal + "px");
      } else if (
        dataCheck == "lf-field-font-size" ||
        dataCheck == "lf-field-height"
      ) {
        let element = leadForm
          .find(".lf-field input, .textarea-type.lf-field textarea")
          .not(
            'input[type="submit"],input[type="radio"],input[type="checkbox"]'
          );
        dataCheck == "lf-field-font-size"
          ? element.css("font-size", inputVal + "px")
          : element.css("height", inputVal + "px");
      } else if (dataCheck == "lf-submit-btn-font-size") {
        leadForm.find("input.lf-form-submit").css("font-size", inputVal + "px");
      } else if (dataCheck == "lf-heading-font-size") {
        leadForm.children("h2").css("font-size", inputVal + "px");
      } else if (
        dataCheck == "form-border" ||
        dataCheck == "lf-submit-border" ||
        dataCheck == "lf-field-border"
      ) {
        let elementBorder =
          dataCheck == "form-border"
            ? leadForm
            : dataCheck == "lf-field-border"
            ? leadForm
                .find(".lf-field input, .textarea-type.lf-field textarea")
                .not(
                  'input[type="submit"],input[type="radio"],input[type="checkbox"]'
                )
            : leadForm.find("input.lf-form-submit");
        Custom_popup_editor._borderFn(elementBorder, input_, inputVal);
      } else if (dataCheck == "form-heading-enable") {
        if (input_.prop("checked") == true) {
          $(".lead-form-heading-section").slideDown("fast");
          leadForm.children("h2").show();
        } else {
          $(".lead-form-heading-section").slideUp("fast");
          leadForm.children("h2").hide();
        }
      } else if (dataCheck == "form-label-enable") {
        if (input_.prop("checked") == true) {
          // $('.lead-form-label-section').slideDown('fast');
          leadForm
            .find(".lf-field > label")
            .not(
              ".submit-type > label,.checkbox-type > label,.radio-type > label"
            )
            .show();
        } else {
          // $('.lead-form-label-section').slideUp('fast');
          leadForm
            .find(".lf-field > label")
            .not(
              ".submit-type > label,.checkbox-type > label,.radio-type > label"
            )
            .hide();
        }
      } else if (input_.data("padding") && dataCheck == "lf-submit-padding") {
        Custom_popup_editor._globalPadding(
          "padding",
          input_,
          leadForm.find("input.lf-form-submit"),
          inputVal
        );
      } else if (
        input_.data("origin") == "padding" &&
        dataCheck == "lf-submit-padding"
      ) {
        Custom_popup_editor._globalPadding(
          "padding-origin",
          input_,
          leadForm.find("input.lf-form-submit"),
          inputVal
        );
      } else if (dataCheck == "submit-font-weight") {
        leadForm.find("input.lf-form-submit").css("font-weight", inputVal);
      } else if (dataCheck == "lf-submit-aliment") {
        leadForm.find("input.lf-form-submit").attr("data-alignment", inputVal);
        leadForm.find(".submit-type.lf-field").css("text-align", inputVal);
      } else if (dataCheck == "form-margin-center") {
        let justify_ = "left";
        if (inputVal == "center") {
          justify_ = "center";
        } else if (inputVal == "right") {
          justify_ = "flex-end";
        }
        leadForm
          .closest(".leadform-show-form")
          .css("justify-content", justify_);
        leadForm.attr("data-form-alignment", inputVal);
      } else if (dataCheck == "lf-field-margin") {
        // let fieldMArgin = leadForm.find('.text-type.lf-field, .textarea-type.lf-field');
        let fieldMArgin = leadForm.find(".lf-field");
        Custom_popup_editor._marginPadding(
          "margin",
          input_,
          fieldMArgin,
          inputVal
        );
      }
    },
    _bind: function () {
      // $(document).on('click', '.wppb-popup-custom [data-rl-editable]',Custom_popup_editor._openEditPanel);

      $(document).on(
        "click",
        ".wppb-popup-custom [data-rl-editable]:not(.rl-editable-key-action)",
        Custom_popup_editor._openEditPanel
      );
      $(document).on(
        "click",
        ".wppb-popup-custom .rlRemoveElement",
        Custom_popup_editor._rlRemoveElement
      );
      $(document).on(
        "click",
        ".rl-i-choose-image",
        Custom_popup_editor._chooseImage
      );
      $(document).on(
        "keyup change",
        "[data-editor-input]",
        Custom_popup_editor._changedSetEditor
      );
      $(document).on(
        "keyup change",
        "[data-global-input]",
        Custom_popup_editor._globalSetEditor
      );
      $(document).on(
        "change",
        ".lead-form-bulider-select > select",
        Custom_popup_editor._leadFormChoose
      );
      $(document).on(
        "click",
        ".wppb-popup-lead-form:not(.rl-editable-key-action)",
        Custom_popup_editor._leadFormOpenPanel
      );

      $(document).on(
        "keyup",
        '.wppb-popup-name-layout input[name="wppb-popup-name"]',
        Custom_popup_editor._chooseLayout
      );
      $(document).on(
        "click",
        '.wppb-popup-name-layout input[name="wppb-popup-layout"]',
        Custom_popup_editor._chooseLayout
      );
      $(document).on(
        "click",
        ".wppb-popup-name-init",
        Custom_popup_editor._popupName
      );
      $(document).on(
        "keyup change",
        ".wppb-lead-form-styling [data-lead-form]",
        Custom_popup_editor._leadFormStylingSet
      );

      // color picker
      $(document).on(
        "click",
        ".color-output",
        Custom_popup_editor._colorPickerByclick
      );
    },
    _scrollFunction: function (scrPanel) {
      function scrollFn() {
        let headerOffset =
          $(".rl_i_editor-header-area").offset().top +
          $(".rl_i_editor-header-area").outerHeight() +
          10;
        let scrElem = $(".rl_i_editor-content-area");
        // let scrElem2 = $('.rl-lead-form-panel');
        let scrElem2 = scrPanel;

        let panelOff = scrElem2.offset().top;
        let offsetApply = panelOff - headerOffset;
        let panelOuterHeight = scrElem2.outerHeight();
        let editorOuterHeight = scrElem.outerHeight();
        if (editorOuterHeight > panelOuterHeight) {
          offsetApply = editorOuterHeight - panelOuterHeight + headerOffset;
        }
        let scrollEnable = true;
        if (
          panelOff == headerOffset ||
          panelOff < headerOffset ||
          offsetApply == panelOff
        ) {
          scrollEnable = false;
        }
        if (scrollEnable) {
          scrElem.animate({ scrollTop: offsetApply });
        }
      }
      setTimeout(scrollFn, 600);
    },
    placeCaretAtEnd: function (el) {
      el.focus();
      if (
        typeof window.getSelection != "undefined" &&
        typeof document.createRange != "undefined"
      ) {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
      } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
      }
    },
    _colorPickr: function (
      select_element,
      clickedObj,
      getColorProperty,
      getColor = false
    ) {
      let getColorValue = clickedObj.css(getColorProperty);
      if (getColorProperty == "box-shadow") {
        let getCss = Custom_popup_editor._checkStyle(clickedObj, "box-shadow");
        getColorValue = Custom_popup_editor._box_shadow_prop(
          getCss,
          "color",
          true,
          true
        );
      }
      select_element.css("background-color", getColorValue);
      let uniQid =
        Math.random().toString(11).replace("0.", "wppb-pcr-") + "-init";
      clickedObj.attr("data-color-id-" + getColorProperty, uniQid);
      select_element.attr({
        "data-color-id": uniQid,
        "data-color-propetry": getColorProperty,
      });
    },
    _colorPickerByclick: function (e) {
      let select_element = $(this);
      let getColorProperty = select_element.attr("data-color-propetry");
      let clickedObj = select_element.attr("data-color-id");
      clickedObj = $(
        "[data-color-id-" + getColorProperty + '="' + clickedObj + '"]'
      );
      let getColor_default = select_element.css("background-color");
      const inputElement = select_element[0];
      const pickr = new Pickr({
        el: inputElement,
        useAsButton: true,
        default: getColor_default,
        theme: "nano",
        swatches: [
          "rgba(244, 67, 54, 1)",
          "rgba(233, 30, 99, 0.95)",
          "rgba(156, 39, 176, 0.9)",
          "rgba(103, 58, 183, 0.85)",
          "rgba(63, 81, 181, 0.8)",
          "rgba(33, 150, 243, 0.75)",
          "rgba(255, 193, 7, 1)",
        ],
        components: {
          preview: true,
          opacity: true,
          hue: true,
          interaction: {
            input: true,
          },
        },
      })
        .on("init", (instance) => {
          $(instance._root.app).addClass("visible");
        })
        .on("change", (color, instance) => {
          let color_ = color.toHEXA().toString(0);
          // preview css on input editor item
          select_element.css("background-color", color_);
          // apply color on selected item
          if (getColorProperty == "box-shadow") {
            let getCss = Custom_popup_editor._checkStyle(
              clickedObj,
              "box-shadow"
            );
            let propBoxShadow = Custom_popup_editor._box_shadow_prop(
              getCss,
              "color",
              color_
            );
            Custom_popup_editor._setStyleColor(
              clickedObj,
              propBoxShadow,
              "box-shadow"
            );
          } else {
            Custom_popup_editor._setStyleColor(
              clickedObj,
              color_,
              getColorProperty
            );
          }
          Custom_popup_editor._confirmMsgOn();
        })
        .on("hide", (instance) => {
          instance._root.app.remove();
        });
    },
    _chooseImage: function (e) {
      Custom_popup_editor._confirmMsgOn();
      e.preventDefault();
      let this_button = $(this);
      custom_uploader = wp
        .media({
          title: "Business Popup Image Uploader",
          library: { type: "image" },
          button: { text: "Choose This Image" },
          multiple: false,
        })
        .on("select", function () {
          let attachment = custom_uploader
            .state()
            .get("selection")
            .first()
            .toJSON();
          let putImageInner = this_button.find(".rl-i-choose-image-wrap");
          if (putImageInner.data("global-input")) {
            $(".wppb-popup-custom .wppb-popup-overlay-custom-img")
              .css("background-image", "url(" + attachment.url + ")")
              .attr("data-overlay-image", attachment.url);
          } else {
            $(".getChangeImage_").attr("src", attachment.url);
          }
          putImageInner.css("background-image", "url(" + attachment.url + ")");
        })
        .open();
    },
    _inlineCssSeparate: function (inline_css) {

      let saparateStyle = [];
      if (inline_css !='undefined' && inline_css != "" && inline_css.search(";") > -1) {
        inline_css.split(";").forEach((value_, index_) => {
          if (value_.search(":") > -1) {
            let getCss = value_.split(":");
            saparateStyle[getCss[0].trim()] = getCss[1].trim();
          }
        });
      }
      return saparateStyle;
    },
    _setStyleColor: function (element, element_value, styleProperty) {
      let getElemStyle = element.attr("style");
      if (getElemStyle) {
        let saparateStyle =
          Custom_popup_editor._inlineCssSeparate(getElemStyle);
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
    _removeStyle: function (element, removeStyle, apply_ = true) {
      let getElemStyle = element.attr("style");
      if (getElemStyle) {
        let saparateStyle =
          Custom_popup_editor._inlineCssSeparate(getElemStyle);
        let newStyle = "";
        for (let key in saparateStyle) {
          if (key.indexOf(removeStyle) == 0) continue;
          newStyle += key + ":" + saparateStyle[key] + ";";
        }
        if (apply_) {
          element.attr("style", newStyle);
        } else {
          return newStyle;
        }
      }
    },
    _checkStyle: function (element, style_) {
      let getElemStyle = element.attr("style");
      if (getElemStyle !='undefined' && getElemStyle) {
        
        let saparateStyle =
          Custom_popup_editor._inlineCssSeparate(getElemStyle);
        return style_ in saparateStyle ? saparateStyle[style_] : false;
      }
    },
    _inputRange: function (rangeSlider, clickedObj, prop, def = "") {
      let thisData = rangeSlider.data("show-range");
      let putOutput = $('[data-range-output="' + thisData + '"]');
      // set default data
      let defaultValue = !def && clickedObj.length ? clickedObj.css(prop) : def;
      putOutput.val(parseInt(defaultValue));
      rangeSlider.val(parseInt(defaultValue));

      rangeSlider[0].oninput = function () {
        putOutput.val($(this).val());
        rangeSlider.change();
      };
      putOutput.on("change", function () {
        rangeSlider.val($(this).val()).change();
      });
    },
    _marginPadding: function (
      changeData,
      changedInput,
      clickedObj,
      changeValue
    ) {
      if (changedInput.data("origin") && changeData == "margin") {
        if (changedInput.prop("checked")) {
          let getFirstInput = changedInput
            .closest(".paraMeterContainer__")
            .find('input[data-margin="top"]');
          let getFirstValue = getFirstInput.val() ? getFirstInput.val() : 0;
          changedInput
            .closest(".paraMeterContainer__")
            .find('input[type="number"]')
            .val(getFirstValue);
          clickedObj.css("margin", getFirstValue + "px");
        }
      } else if (changeData == "margin") {
        let marginOrigin = changedInput.data("margin");
        let getCheckBox = changedInput
          .closest(".paraMeterContainer__")
          .find('[data-origin="margin"]');
        if (getCheckBox.prop("checked")) {
          clickedObj.css("margin", changeValue + "px");
          changedInput
            .closest(".paraMeterContainer__")
            .find('input[type="number"]')
            .val(changeValue);
        } else {
          clickedObj.css("margin-" + marginOrigin, changeValue + "px");
        }
      } else if (changedInput.data("origin") && changeData == "padding") {
        if (changedInput.prop("checked")) {
          let getFirstInput = changedInput
            .closest(".paraMeterContainer__")
            .find('input[data-padding="top"]');
          let getFirstValue = getFirstInput.val() ? getFirstInput.val() : 0;
          changedInput
            .closest(".paraMeterContainer__")
            .find('input[type="number"]')
            .val(getFirstValue);
          clickedObj.css("padding", getFirstValue + "px");
        }
      } else if (changeData == "padding") {
        let paddingOrigin = changedInput.data("padding");
        let getCheckBox = changedInput
          .closest(".paraMeterContainer__")
          .find('[data-origin="padding"]');
        if (getCheckBox.prop("checked")) {
          clickedObj.css("padding", changeValue + "px");
          changedInput
            .closest(".paraMeterContainer__")
            .find('input[type="number"]')
            .val(changeValue);
        } else {
          clickedObj.css("padding-" + paddingOrigin, changeValue + "px");
        }
      }
    },
    __borderGet: function (elementBorder, input_) {
      if (input_.data("border") == "border-enable") {
        let checkBorder = Custom_popup_editor._checkStyle(
          elementBorder,
          "border"
        );
        let container = input_
          .closest(".content-style-border")
          .find(".content-border");
        if (checkBorder) {
          input_.prop("checked", true);
          container.slideDown("fast");
        } else {
          input_.prop("checked", false);
          container.slideUp("fast");
        }
      } else if (input_.data("border") == "width") {
        let getWidth = elementBorder.css("border-width");
        input_.val(parseInt(getWidth));
      } else if (input_.data("border") == "radius") {
        let getRadius = elementBorder.css("border-radius");
        input_.val(parseInt(getRadius));
      } else if (input_.data("input-color") == "border-color") {
        Custom_popup_editor._colorPickr(input_, elementBorder, "border-color");
      }
    },
    _borderFn: function (clickedObj, changedInput, changeValue) {
      let container = changedInput.closest(".content-style-border");
      if (
        changedInput.data("border") &&
        changedInput.data("border") == "border-enable"
      ) {
        if (changedInput.prop("checked")) {
          clickedObj.css("border", "1px solid orange");
        } else {
          Custom_popup_editor._removeStyle(clickedObj, "border");
        }

        let allInputs = container.find("[data-border],[data-input-color]");
        jQuery.each(allInputs, (index, value) => {
          Custom_popup_editor.__borderGet(clickedObj, $(value));
        });
      } else if (
        changedInput.data("border") &&
        container.find('[type="checkbox"][data-border]').prop("checked")
      ) {
        let checkProp = changedInput.data("border");
        if (checkProp == "width") {
          clickedObj.css("border-width", changeValue);
        } else if (checkProp == "radius") {
          clickedObj.css("border-radius", changeValue + "px");
        } else if (checkProp == "border-style") {
          clickedObj.css("border-style", changeValue);
        }
      }
    },
    _setBoxShadow: function (input, clickedObj) {
      let checkData = input.data("shadow");
      let getCss = Custom_popup_editor._checkStyle(clickedObj, "box-shadow");
      if (getCss && getCss != "none") {
        if (checkData == "enable") {
          input
            .closest(".content-style-box-shadow")
            .find(".content-box-shadow")
            .slideDown("fast");
          input.prop("checked", true);
        } else if (
          checkData == "x-offset" ||
          checkData == "y-offset" ||
          checkData == "blur" ||
          checkData == "spread"
        ) {
          let putVal = Custom_popup_editor._box_shadow_prop(
            getCss,
            checkData,
            true,
            true
          );
          input.val(parseInt(putVal));
        } else if (checkData == "color") {
          Custom_popup_editor._colorPickr(input, clickedObj, "box-shadow");
        }
      } else {
        if (checkData == "enable") {
          input.prop("checked", false);
        }
        input
          .closest(".content-style-box-shadow")
          .find(".content-box-shadow")
          .slideUp("fast");
      }
    },
    _boxShadowFn: function (clickedObj, changedInput) {
      let checkData = changedInput.data("shadow");
      let inputVal = changedInput.val();
      let container = changedInput.closest(".content-style-box-shadow");
      if (checkData == "enable") {
        if (changedInput.prop("checked")) {
          let style = "#808080 2px 4px 7px 1px";
          Custom_popup_editor._setStyleColor(clickedObj, style, "box-shadow");
        } else {
          Custom_popup_editor._removeStyle(clickedObj, "box-shadow");
        }
        let allInputs = container.find("[data-shadow]");
        jQuery.each(allInputs, (index, value) => {
          Custom_popup_editor._setBoxShadow($(value), clickedObj);
        });
      } else if (
        container.find('[type="checkbox"][data-shadow]').prop("checked") &&
        checkData
      ) {
        let getCss = Custom_popup_editor._checkStyle(clickedObj, "box-shadow");
        let getBoxShadow = Custom_popup_editor._box_shadow_prop(
          getCss,
          checkData,
          inputVal
        );
        if (getBoxShadow)
          Custom_popup_editor._setStyleColor(
            clickedObj,
            getBoxShadow,
            "box-shadow"
          );
      }
    },
    _box_shadow_prop: function (css, shadow_prop, value_, get_prop_) {
      let splitted = css.split(" ");
      if (shadow_prop == "color") {
        if (get_prop_) {
          return splitted[0];
        } else {
          splitted[0] = value_;
        }
      } else if (shadow_prop == "x-offset") {
        if (get_prop_) {
          return splitted[1];
        } else {
          splitted[1] = value_ + "px";
        }
      } else if (shadow_prop == "y-offset") {
        if (get_prop_) {
          return splitted[2];
        } else {
          splitted[2] = value_ + "px";
        }
      } else if (shadow_prop == "blur") {
        if (get_prop_) {
          return splitted[3];
        } else {
          splitted[3] = value_ + "px";
        }
      } else if (shadow_prop == "spread") {
        if (get_prop_) {
          return splitted[4];
        } else {
          splitted[4] = value_ + "px";
        }
      }
      splitted = splitted.join(" ");
      return value_ ? splitted : false;
    },
    _globalPadding: function (
      changeData,
      changedInput,
      clickedObj,
      changeValue
    ) {
      if (changeData == "padding") {
        let paddingOrigin = changedInput.data("padding");
        let getCheckBox = changedInput
          .closest(".paraMeterContainer__")
          .find('[data-origin="padding"]');
        if (getCheckBox.prop("checked")) {
          clickedObj.css("padding", changeValue + "px");
          changedInput
            .closest(".paraMeterContainer__")
            .find('input[type="number"]')
            .val(changeValue);
        } else {
          clickedObj.css("padding-" + paddingOrigin, changeValue + "px");
        }
      } else if (changeData == "padding-origin") {
        if (changedInput.prop("checked")) {
          let getFirstInput = changedInput
            .closest(".paraMeterContainer__")
            .find('input[data-padding="top"]');
          let getFirstValue = getFirstInput.val() ? getFirstInput.val() : 0;
          changedInput
            .closest(".paraMeterContainer__")
            .find('input[type="number"]')
            .val(getFirstValue);
          clickedObj.css("padding", getFirstValue + "px");
        }
      }
    },
    _contentAlign: function (clickedObj, changeValue) {
      let alignContent = clickedObj.closest(".data-rl-editable-wrap");
      if (changeValue == "center") {
        alignContent.css("justify-content", "center");
        clickedObj.attr("data-content-alignment", "center");
      } else if (changeValue == "right") {
        alignContent.css("justify-content", "flex-end");
        clickedObj.attr("data-content-alignment", "flex-end");
      } else if (changeValue == "left") {
        alignContent.css("justify-content", "unset");
        if (clickedObj.data("content-alignment"))
          clickedObj.removeAttr("data-content-alignment");
      }
    },
  };
  // short code -------------------------------++++++++++++++++
  let Wppb_shortcode_api = {
    _shortcode_OpenPanel: function () {
      let getForm = $(this);
      Custom_popup_editor._resetSettingOpen();
      Custom_popup_editor._resetSettingOnClick();
      getForm.addClass("rl-editable-key-action");
      Custom_popup_editor._scrollFunction($(".rl-shortcode-panel"));
      $(".rl-shortcode-panel").slideDown("fast");
      // // check mail chimp id
      // // console.log("mail chimp id ->", getForm.attr("data-mail-chimp-id"));
      // .rl-shortcode-panel textarea[name='shortcode-panel-api']
      if (getForm.attr("data-shortcode")) {
        $(".rl-shortcode-panel [name='shortcode-panel-api']").val(
          getForm.attr("data-shortcode")
        );
        Wppb_shortcode_api._shortcodeStyling();
      } else {
        $(".wppb-shortcode-styling").hide();
      }
    },
    _shortcodeChoose: function () {
      let text_ = $(this);
      let inputVal = text_.val();
      // console.log("text_", text_);
      let shortcodeWrap = $(
        ".wppb-popup-custom .wppb-popup-shortcode.rl-editable-key-action"
      );
      if (inputVal) {
        // console.log(inputVal);
        // return;
        let data_ = {
          action: "shortcode_Api_Add",
          shortcode: inputVal,
        };
        let returnData = Wppb_save._ajaxFunction(data_);
        returnData.success(function (response) {
          // console.log("response->", response);
          if (response) {
            let html_ =
              '<div class="wppb-popup-shortcode rl-editable-key-action" data-shortcode="' +
              inputVal +
              '">' +
              response +
              "</div>";
            shortcodeWrap.replaceWith(html_);
          }
        });
        Wppb_shortcode_api._shortcodeStyling();
      }
    },
    _shortcodeStyling: function () {
      $(".wppb-shortcode-styling").show();
      let shortcodeWrap = $(
        ".wppb-popup-custom .wppb-popup-shortcode.rl-editable-key-action"
      );
      let getInputs = $(".wppb-shortcode-styling [data-shortcode]");

      jQuery.each(getInputs, shortCodeInit);
      function shortCodeInit(index, value) {
        let sepInput = $(value);
        let getData = sepInput.attr("data-shortcode");
        // console.log('getData->',getData);
        if (getData == "shortcode-container-width") {
          let width = shortcodeWrap.outerWidth();
          let pwidth = shortcodeWrap.closest(".data-rl-editable-wrap").width();
          let getWidthInPer = Math.round((width / pwidth) * 100);
          Custom_popup_editor._inputRange(
            sepInput,
            false,
            false,
            getWidthInPer
          );
        } else if (getData == "shortcode-container-height") {
          let css_ = shortcodeWrap.css("height");
          Custom_popup_editor._inputRange(sepInput, false, false, css_);
        }
        // end get data
      }
    },
    _shortcodeStylingSet: function () {
      Custom_popup_editor._confirmMsgOn();
      let input_ = $(this);
      let dataCheck = input_.attr("data-shortcode");
      let inputVal = input_.val();
      // console.log("dataCheck->", dataCheck);
      // console.log("inputVal->", inputVal);
      let shortcodeWrap = $(
        ".wppb-popup-custom .wppb-popup-shortcode.rl-editable-key-action"
      );
      if (inputVal != "") {
        if (dataCheck == "shortcode-container-width") {
          shortcodeWrap.css("width", inputVal + "%");
        } else if (dataCheck == "shortcode-container-height") {
          shortcodeWrap.css("min-height", inputVal + "px");
        }
      }
    },
    bind: function () {
      $(document).on(
        "click",
        ".wppb-popup-shortcode:not(.rl-editable-key-action)",
        Wppb_shortcode_api._shortcode_OpenPanel
      );
      $(document).on(
        "keyup change",
        ".wppb-shortcode-styling [data-shortcode]",
        Wppb_shortcode_api._shortcodeStylingSet
      );
      $(document).on(
        "change keyup",
        ".rl-shortcode-panel textarea[name='shortcode-panel-api']",
        Wppb_shortcode_api._shortcodeChoose
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
  Custom_popup_editor.init();

  Wppb_save.init();
  Wppb_shortcode_api.bind();
})(jQuery);
