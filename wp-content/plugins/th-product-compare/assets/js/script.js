(function ($) {
  const TH = {
    init: function () {
      TH.bind();
      TH.tab();
    },
    tab: function () {
      $("[data-group-tabs][data-tab]").click(function (e) {
        e.preventDefault();
        let BTN = $(this);
        let getTAbGRoup = BTN.attr("data-group-tabs");
        let getTAbSingle = BTN.attr("data-tab");
        let TABgorup = '[data-group-tabs="' + getTAbGRoup + '"]';
        $(TABgorup).removeClass("active");
        $(TABgorup + '[data-tab="' + getTAbSingle + '"]').addClass("active");
        $(TABgorup + '[data-tab-container="' + getTAbSingle + '"]').addClass(
          "active"
        );
      });
    },
    saveFN: function (inputs) {
      // console.log("inputs->", inputs);
      let returnSave = { attributes: {} };
      $.each(inputs, (ind_, val_) => {
        let Input_ = $(val_);
        let inputName = Input_.attr("data-th-save");
        if (inputName == "compare-field") {
          let inputVal = Input_.val();
          let save_ = "field-" + inputVal;
          if (Input_.prop("checked") == true) {
            returnSave[save_] = 1;
          } else {
            returnSave[save_] = "hide";
          }
        } else if (inputName == "compare-attributes") {
          let inputVal = Input_.val();
          returnSave["attributes"][inputVal] = {};
          if (Input_.prop("checked") == true) {
            returnSave["attributes"][inputVal]["active"] = 1;
          } else {
            returnSave["attributes"][inputVal]["active"] = 0;
          }
          if (Input_.attr("data-custom-attr") == 1) {
            returnSave["attributes"][inputVal]["custom"] = 1;
            returnSave["attributes"][inputVal]["label"] =
              Input_.siblings("label").html();
          }
        } else if (val_.tagName == "SELECT" || val_.tagName == "INPUT") {
          let inputVal = Input_.val();
          returnSave[inputName] = inputVal;
        }
      });
      return returnSave;
      // console.log("val_", val_);
    },
    saveData: function () {
      let thisBTN = $(this);
      let thContainer = thisBTN.closest(".th-product-compare-wrap");
      let inputs = thContainer.find(".container-tabs").find("[data-th-save]");
      thisBTN.addClass("loading");
      let sendData = TH.saveFN(inputs);
      // console.log("sendData", sendData);
      // return;
      $.ajax({
        method: "post",
        url: th_product.th_product_ajax_url,
        data: {
          action: "th_compare_save_data",
          inputs: sendData,
          nonce: th_product.th_product_compare_nonce,
        },
        success: function (response) {
          if (response == "update") {
            thisBTN.removeClass("loading");
          }
        },
      });
    },
    resetStyle: function () {
      let btn = $(this);
      btn.addClass("loading");
      $.ajax({
        method: "post",
        url: th_product.th_product_ajax_url,
        data: {
          action: "th_compare_reset_data",
          inputs: "reset",
          nonce: th_product.th_product_compare_nonce,
        },
        success: function (response) {
          if (response == "reset") {
            setTimeout(() => {
              location.reload();
            }, 500);
          } else {
            location.reload();
          }
        },
      });
    },
    bind: function () {
      $(document).on("click", ".th-option-save-btn", TH.saveData);
      $(document).on("click", ".th-compare-reset-style-btn", TH.resetStyle);
    },
  };
  TH.init();
})(jQuery);
