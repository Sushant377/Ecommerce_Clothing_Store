/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

jQuery(function ($) {

  Promise.resolve().then(function () {
    return __webpack_require__(11);
  }).then(function () {

    // Init on Ajax Popup :)
    $(document).on('wc_variation_form.thvs', '.variations_form:not(.thvs-loaded)', function (event) {
      $(this).ThVariationSwatches();
    });

    // Try to cover all ajax data complete
    $(document).ajaxComplete(function (event, request, settings) {
      _.delay(function () {
        $('.variations_form:not(.thvs-loaded)').each(function () {
          $(this).wc_variation_form();
        });
      }, 100);
    });
  });
}); // end of jquery main wrapper

/***/ }),

/***/ 11:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }


var ThVariationSwatches = function ($) {

  var Default = {};

  var ThVariationSwatches = function () {
    function ThVariationSwatches(element, config) {
      _classCallCheck(this, ThVariationSwatches);

      // Assign
      this._element = element;
      this.$element = $(element);
      this._config = $.extend({}, Default, config);
      this._generated = {};
      this._out_of_stock = {};
      this._disabled = {};
      this.product_variations = this.$element.data('product_variations') || [];
      this.is_ajax_variation = this.product_variations.length < 1;
      this.product_id = this.$element.data('product_id');
      this.reset_variations = this.$element.find('.reset_variations');
      /*this.hidden_behaviour       = $('body').hasClass('th-variation-swatches-attribute-behavior-hide');*/
      this.is_mobile = $('body').hasClass('th-variation-swatches-on-mobile');
      this.selected_item_template = '<span class="woo-selected-variation-item-name" data-default=""></span>';

      this.$element.addClass('thvs-loaded');

      // Call
      this.init();
      this.update();

      // Trigger
      $(document).trigger('th_variation_swatches', [this.$element]);
    }

    _createClass(ThVariationSwatches, [{
      key: 'checkAvailable',
      value: function checkAvailable() {
        if ([].includes) {}
      }
    }, {
      key: 'init',
      value: function init() {
        var _this2 = this;

        var _this = this;

        this._generated = this.product_variations.reduce(function (obj, variation) {

          Object.keys(variation.attributes).map(function (attribute_name) {
            if (!obj[attribute_name]) {
              obj[attribute_name] = [];
            }

            if (variation.attributes[attribute_name]) {
              obj[attribute_name].push(variation.attributes[attribute_name]);
            }
          });

          return obj;
        }, {});

        this._out_of_stock = this.product_variations.reduce(function (obj, variation) {

          Object.keys(variation.attributes).map(function (attribute_name) {
            if (!obj[attribute_name]) {
              obj[attribute_name] = [];
            }

            if (variation.attributes[attribute_name] && !variation.is_in_stock) {
              obj[attribute_name].push(variation.attributes[attribute_name]);
            }
          });

          return obj;
        }, {});

        // Append Selected Item Template
        if (th_variation_swatches_options.show_variation_label) {
          this.$element.find('.variations .label').each(function (index, el) {
            $(el).append(_this2.selected_item_template);
          });
        }

        this.$element.find('ul.variable-items-wrapper').each(function (i, el) {

          $(this).parent().addClass('woo-variation-items-wrapper');

          var select = $(this).siblings('select.woo-variation-raw-select');
          var selected = '';

          var options = $(this).siblings('select.woo-variation-raw-select').find('option');
          var disabled = $(this).siblings('select.woo-variation-raw-select').find('option:disabled');
          var out_of_stock = $(this).siblings('select.woo-variation-raw-select').find('option.enabled.out-of-stock');
          var current = $(this).siblings('select.woo-variation-raw-select').find('option:selected');
          var eq = $(this).siblings('select.woo-variation-raw-select').find('option').eq(1);

          var li = $(this).find('li:not(.th-variation-swatches-variable-item-more)');
          var reselect_clear = $(this).hasClass('reselect-clear');

          var mouse_event_name = 'click.thvs'; // 'touchstart click';

          var attribute = $(this).data('attribute_name');
          // let attribute_values = ((_this.is_ajax_variation) ? [] : _this._generated[attribute])
          // let out_of_stocks = ((_this.is_ajax_variation) ? [] : _this._out_of_stock[attribute])
          var selects = [];
          var disabled_selects = [];
          var out_of_stock_selects = [];
          var $selected_variation_item = $(this).parent().prev().find('.woo-selected-variation-item-name');

          // For Avada FIX
          if (options.length < 1) {
            select = $(this).parent().find('select.woo-variation-raw-select');
            options = $(this).parent().find('select.woo-variation-raw-select').find('option');
            disabled = $(this).parent().find('select.woo-variation-raw-select').find('option:disabled');
            out_of_stock = $(this).siblings('select.woo-variation-raw-select').find('option.enabled.out-of-stock');
            current = $(this).parent().find('select.woo-variation-raw-select').find('option:selected');
            eq = $(this).parent().find('select.woo-variation-raw-select').find('option').eq(1);
          }

          options.each(function () {
            if ($(this).val() !== '') {
              selects.push($(this).val());
              selected = current ? current.val() : eq.val();
            }
          });

          disabled.each(function () {
            if ($(this).val() !== '') {
              disabled_selects.push($(this).val());
            }
          });

          // Out Of Stocks
          out_of_stock.each(function () {
            if ($(this).val() !== '') {
              out_of_stock_selects.push($(this).val());
            }
          });

          var in_stocks = _.difference(selects, disabled_selects);

          

          var available = _.difference(in_stocks, out_of_stock_selects);

          // Mark Selected
          li.each(function (index, li) {

            var attribute_value = $(this).attr('data-value');
            var attribute_title = $(this).attr('data-title');

            // Resetting LI
            $(this).removeClass('selected disabled out-of-stock').addClass('disabled');
            $(this).attr('aria-checked', 'false');
            $(this).attr('tabindex', '-1');

            if ($(this).hasClass('radio-variable-item')) {
              $(this).find('input.thvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
            }

            

            if (_.includes(in_stocks, attribute_value)) {

              $(this).removeClass('selected disabled');
              $(this).removeAttr('aria-hidden');
              $(this).attr('tabindex', '0');

              $(this).find('input.thvs-radio-variable-item:radio').prop('disabled', false);

              if (attribute_value === selected) {

                $(this).addClass('selected');
                $(this).attr('aria-checked', 'true');

                if (th_variation_swatches_options.show_variation_label) {
                  $selected_variation_item.text(th_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
                }

                if ($(this).hasClass('radio-variable-item')) {
                  $(this).find('input.thvs-radio-variable-item:radio').prop('checked', true);
                }
              }
            }

            // Out of Stock

            if (available.length > 0 && _.includes(out_of_stock_selects, attribute_value) && th_variation_swatches_options.clickable_out_of_stock) {
              $(this).removeClass('disabled').addClass('out-of-stock');
            }
          });

          // Trigger Select event based on list

          if (reselect_clear) {
            // Non Selected Item Should Select
            $(this).on(mouse_event_name, 'li:not(.selected):not(.radio-variable-item):not(.th-variation-swatches-variable-item-more)', function (e) {
              e.preventDefault();
              e.stopPropagation();
              var value = $(this).data('value');
              select.val(value).trigger('change');
              select.trigger('click');

              select.trigger('focusin');

              if (_this.is_mobile) {
                select.trigger('touchstart');
              }

              $(this).trigger('focus'); // Mobile tooltip
              $(this).trigger('thvs-selected-item', [value, select, _this.$element]); // Custom Event for li
            });

            // Selected Item Should Non Select
            $(this).on(mouse_event_name, 'li.selected:not(.radio-variable-item):not(.th-variation-swatches-variable-item-more)', function (e) {
              e.preventDefault();
              e.stopPropagation();

              var value = $(this).val();

              select.val('').trigger('change');
              select.trigger('click');

              select.trigger('focusin');

              if (_this.is_mobile) {
                select.trigger('touchstart');
              }

              $(this).trigger('focus'); // Mobile tooltip

              $(this).trigger('thvs-unselected-item', [value, select, _this.$element]); // Custom Event for li
            });

            // RADIO

            // On Click trigger change event on Radio button
            $(this).on(mouse_event_name, 'input.thvs-radio-variable-item:radio', function (e) {

              e.stopPropagation();

              $(this).trigger('change.thvs', { radioChange: true });
            });

            $(this).on('change.thvs', 'input.thvs-radio-variable-item:radio', function (e, params) {

              e.preventDefault();
              e.stopPropagation();

              if (params && params.radioChange) {

                var value = $(this).val();
                var is_selected = $(this).parent('li.radio-variable-item').hasClass('selected');

                if (is_selected) {
                  select.val('').trigger('change');
                  $(this).parent('li.radio-variable-item').trigger('thvs-unselected-item', [value, select, _this.$element]); // Custom Event for li
                } else {
                  select.val(value).trigger('change');
                  $(this).parent('li.radio-variable-item').trigger('thvs-selected-item', [value, select, _this.$element]); // Custom Event for li
                }

                select.trigger('click');
                select.trigger('focusin');
                if (_this.is_mobile) {
                  select.trigger('touchstart');
                }
              }
            });
          } else {

            $(this).on(mouse_event_name, 'li:not(.radio-variable-item):not(.th-variation-swatches-variable-item-more)', function (event) {

              event.preventDefault();
              event.stopPropagation();

              var value = $(this).data('value');
              select.val(value).trigger('change');
              select.trigger('click');
              select.trigger('focusin');
              if (_this.is_mobile) {
                select.trigger('touchstart');
              }

              $(this).trigger('focus'); // Mobile tooltip

              $(this).trigger('thvs-selected-item', [value, select, _this._element]); // Custom Event for li
            });

            // Radio
            $(this).on('change.thvs', 'input.thvs-radio-variable-item:radio', function (event) {
              event.preventDefault();
              event.stopPropagation();

              var value = $(this).val();

              select.val(value).trigger('change');
              select.trigger('click');
              select.trigger('focusin');

              if (_this.is_mobile) {
                select.trigger('touchstart');
              }

              // Radio
              $(this).parent('li.radio-variable-item').removeClass('selected disabled').addClass('selected');
              $(this).parent('li.radio-variable-item').trigger('thvs-selected-item', [value, select, _this.$element]); // Custom Event for li
            });
          }

          // Keyboard Access
          $(this).on('keydown.thvs', 'li:not(.disabled):not(.th-variation-swatches-variable-item-more)', function (event) {
            if (event.keyCode && 32 === event.keyCode || event.key && ' ' === event.key || event.keyCode && 13 === event.keyCode || event.key && 'enter' === event.key.toLowerCase()) {
              event.preventDefault();
              $(this).trigger(mouse_event_name);
            }
          });
        });

        this.$element.trigger('th_variation_swatches_init', [this, this.product_variations]);

        $(document).trigger('th_variation_swatches_loaded', [this.$element, this.product_variations]);
      }
    }, {
      key: 'update',
      value: function update() {

        var _this = this;
        this.$element.off('woocommerce_variation_has_changed.thvs');
        this.$element.on('woocommerce_variation_has_changed.thvs', function (event) {

          

          $(this).find('ul.variable-items-wrapper').each(function (index, el) {

            var select = $(this).siblings('select.woo-variation-raw-select');
            var selected = '';

            var options = $(this).siblings('select.woo-variation-raw-select').find('option');
            var disabled = $(this).siblings('select.woo-variation-raw-select').find('option:disabled');
            var out_of_stock = $(this).siblings('select.woo-variation-raw-select').find('option.enabled.out-of-stock');
            var current = $(this).siblings('select.woo-variation-raw-select').find('option:selected');
            var eq = $(this).siblings('select.woo-variation-raw-select').find('option').eq(1);
            var li = $(this).find('li:not(.th-variation-swatches-variable-item-more)');

           

            var attribute = $(this).data('attribute_name');
            

            var selects = [];
            var disabled_selects = [];
            var out_of_stock_selects = [];
            var $selected_variation_item = $(this).parent().prev().find('.woo-selected-variation-item-name');

            // For Avada FIX
            if (options.length < 1) {
              select = $(this).parent().find('select.woo-variation-raw-select');
              options = $(this).parent().find('select.woo-variation-raw-select').find('option');
              disabled = $(this).parent().find('select.woo-variation-raw-select').find('option:disabled');
              out_of_stock = $(this).siblings('select.woo-variation-raw-select').find('option.enabled.out-of-stock');
              current = $(this).parent().find('select.woo-variation-raw-select').find('option:selected');
              eq = $(this).parent().find('select.woo-variation-raw-select').find('option').eq(1);
            }

            options.each(function () {
              if ($(this).val() !== '') {
                selects.push($(this).val());
                selected = current ? current.val() : eq.val();
              }
            });

            disabled.each(function () {
              if ($(this).val() !== '') {
                disabled_selects.push($(this).val());
              }
            });

            // Out Of Stocks
            out_of_stock.each(function () {
              if ($(this).val() !== '') {
                out_of_stock_selects.push($(this).val());
              }
            });

            var in_stocks = _.difference(selects, disabled_selects);

            var available = _.difference(in_stocks, out_of_stock_selects);

            if (_this.is_ajax_variation) {

              li.each(function (index, el) {

                var attribute_value = $(this).attr('data-value');
                var attribute_title = $(this).attr('data-title');

                $(this).removeClass('selected disabled');
                $(this).attr('aria-checked', 'false');

                // To Prevent blink
                if (selected.length < 1 && th_variation_swatches_options.show_variation_label) {
                  $selected_variation_item.text('');
                }

                if (attribute_value === selected) {
                  $(this).addClass('selected');
                  $(this).attr('aria-checked', 'true');

                  if (th_variation_swatches_options.show_variation_label) {
                    $selected_variation_item.text(th_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
                  }

                  if ($(this).hasClass('radio-variable-item')) {
                    $(this).find('input.thvs-radio-variable-item:radio').prop('disabled', false).prop('checked', true);
                  }
                }

                $(this).trigger('thvs-item-updated', [selected, attribute_value, _this]);
              });
            } else {

              li.each(function (index, el) {

                var attribute_value = $(this).attr('data-value');
                var attribute_title = $(this).attr('data-title');

                $(this).removeClass('selected disabled out-of-stock').addClass('disabled');
                $(this).attr('aria-checked', 'false');
                $(this).attr('tabindex', '-1');

                if ($(this).hasClass('radio-variable-item')) {
                  $(this).find('input.thvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
                }

                if (_.includes(in_stocks, attribute_value)) {

                  $(this).removeClass('selected disabled');
                  $(this).removeAttr('aria-hidden');
                  $(this).attr('tabindex', '0');

                  $(this).find('input.thvs-radio-variable-item:radio').prop('disabled', false);

                  // To Prevent blink
                  if (selected.length < 1 && th_variation_swatches_options.show_variation_label) {
                    $selected_variation_item.text('');
                  }

                  if (attribute_value === selected) {

                    $(this).addClass('selected');
                    $(this).attr('aria-checked', 'true');

                    if (th_variation_swatches_options.show_variation_label) {
                      $selected_variation_item.text(th_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
                    }

                    if ($(this).hasClass('radio-variable-item')) {
                      $(this).find('input.thvs-radio-variable-item:radio').prop('checked', true);
                    }
                  }
                }

                // Out of Stock
                if (available.length > 0 && _.includes(out_of_stock_selects, attribute_value) && th_variation_swatches_options.clickable_out_of_stock) {
                  $(this).removeClass('disabled').addClass('out-of-stock');
                }

                $(this).trigger('thvs-item-updated', [selected, attribute_value, _this]);
              });
            }

            // Items Updated
            $(this).trigger('thvs-items-updated');
          });
        });
      }
    }], [{
      key: '_jQueryInterface',
      value: function _jQueryInterface(config) {
        return this.each(function () {
          new ThVariationSwatches(this, config);
        });
      }
    }]);

    return ThVariationSwatches;
  }();

  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn['ThVariationSwatches'] = ThVariationSwatches._jQueryInterface;
  $.fn['ThVariationSwatches'].Constructor = ThVariationSwatches;
  $.fn['ThVariationSwatches'].noConflict = function () {
    $.fn['ThVariationSwatches'] = $.fn['ThVariationSwatches'];
    return ThVariationSwatches._jQueryInterface;
  };

  return ThVariationSwatches;
}(jQuery);

 __webpack_exports__["default"] = (ThVariationSwatches);

/***/ }),

/***/ 9:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

/******/ });