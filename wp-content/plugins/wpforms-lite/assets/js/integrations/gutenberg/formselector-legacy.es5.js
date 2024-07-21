(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

/* global wpforms_gutenberg_form_selector, JSX */
/* jshint es3: false, esversion: 6 */

/**
 * @param strings.update_wp_notice_head
 * @param strings.update_wp_notice_text
 * @param strings.update_wp_notice_link
 * @param strings.wpforms_empty_help
 * @param strings.wpforms_empty_info
 */

var _wp = wp,
  _wp$serverSideRender = _wp.serverSideRender,
  ServerSideRender = _wp$serverSideRender === void 0 ? wp.components.ServerSideRender : _wp$serverSideRender;
var _wp$element = wp.element,
  createElement = _wp$element.createElement,
  Fragment = _wp$element.Fragment;
var registerBlockType = wp.blocks.registerBlockType;
var _ref = wp.blockEditor || wp.editor,
  InspectorControls = _ref.InspectorControls;
var _wp$components = wp.components,
  SelectControl = _wp$components.SelectControl,
  ToggleControl = _wp$components.ToggleControl,
  PanelBody = _wp$components.PanelBody,
  Placeholder = _wp$components.Placeholder;
var __ = wp.i18n.__;
var wpformsIcon = createElement('svg', {
  width: 20,
  height: 20,
  viewBox: '0 0 612 612',
  className: 'dashicon'
}, createElement('path', {
  fill: 'currentColor',
  d: 'M544,0H68C30.445,0,0,30.445,0,68v476c0,37.556,30.445,68,68,68h476c37.556,0,68-30.444,68-68V68 C612,30.445,581.556,0,544,0z M464.44,68L387.6,120.02L323.34,68H464.44z M288.66,68l-64.26,52.02L147.56,68H288.66z M544,544H68 V68h22.1l136,92.14l79.9-64.6l79.56,64.6l136-92.14H544V544z M114.24,263.16h95.88v-48.28h-95.88V263.16z M114.24,360.4h95.88 v-48.62h-95.88V360.4z M242.76,360.4h255v-48.62h-255V360.4L242.76,360.4z M242.76,263.16h255v-48.28h-255V263.16L242.76,263.16z M368.22,457.3h129.54V408H368.22V457.3z'
}));

/**
 * Popup container.
 *
 * @since 1.8.3
 *
 * @type {Object}
 */
var $popup = {};

/**
 * Close button (inside the form builder) click event.
 *
 * @since 1.8.3
 *
 * @param {string} clientID Block Client ID.
 */
var builderCloseButtonEvent = function builderCloseButtonEvent(clientID) {
  $popup.off('wpformsBuilderInPopupClose').on('wpformsBuilderInPopupClose', function (e, action, formId, formTitle) {
    if (action !== 'saved' || !formId) {
      return;
    }

    // Insert a new block when a new form is created from the popup to update the form list and attributes.
    var newBlock = wp.blocks.createBlock('wpforms/form-selector', {
      formId: formId.toString() // Expects string value, make sure we insert string.
    });

    // eslint-disable-next-line camelcase
    wpforms_gutenberg_form_selector.forms = [{
      ID: formId,
      post_title: formTitle
    }];

    // Insert a new block.
    wp.data.dispatch('core/block-editor').removeBlock(clientID);
    wp.data.dispatch('core/block-editor').insertBlocks(newBlock);
  });
};

/**
 * Open builder popup.
 *
 * @since 1.6.2
 *
 * @param {string} clientID Block Client ID.
 */
var openBuilderPopup = function openBuilderPopup(clientID) {
  if (jQuery.isEmptyObject($popup)) {
    var tmpl = jQuery('#wpforms-gutenberg-popup');
    var parent = jQuery('#wpwrap');
    parent.after(tmpl);
    $popup = parent.siblings('#wpforms-gutenberg-popup');
  }
  var url = wpforms_gutenberg_form_selector.get_started_url,
    $iframe = $popup.find('iframe');
  builderCloseButtonEvent(clientID);
  $iframe.attr('src', url);
  $popup.fadeIn();
};
var hasForms = function hasForms() {
  return wpforms_gutenberg_form_selector.forms.length > 0;
};
registerBlockType('wpforms/form-selector', {
  title: wpforms_gutenberg_form_selector.strings.title,
  description: wpforms_gutenberg_form_selector.strings.description,
  icon: wpformsIcon,
  keywords: wpforms_gutenberg_form_selector.strings.form_keywords,
  category: 'widgets',
  attributes: {
    formId: {
      type: 'string'
    },
    displayTitle: {
      type: 'boolean'
    },
    displayDesc: {
      type: 'boolean'
    },
    preview: {
      type: 'boolean'
    }
  },
  example: {
    attributes: {
      preview: true
    }
  },
  supports: {
    customClassName: hasForms()
  },
  edit: function edit(props) {
    // eslint-disable-line max-lines-per-function
    var _props$attributes = props.attributes,
      _props$attributes$for = _props$attributes.formId,
      formId = _props$attributes$for === void 0 ? '' : _props$attributes$for,
      _props$attributes$dis = _props$attributes.displayTitle,
      displayTitle = _props$attributes$dis === void 0 ? false : _props$attributes$dis,
      _props$attributes$dis2 = _props$attributes.displayDesc,
      displayDesc = _props$attributes$dis2 === void 0 ? false : _props$attributes$dis2,
      _props$attributes$pre = _props$attributes.preview,
      preview = _props$attributes$pre === void 0 ? false : _props$attributes$pre,
      setAttributes = props.setAttributes;
    var formOptions = wpforms_gutenberg_form_selector.forms.map(function (value) {
      return {
        value: value.ID,
        label: value.post_title
      };
    });
    var strings = wpforms_gutenberg_form_selector.strings;
    var jsx;
    formOptions.unshift({
      value: '',
      label: wpforms_gutenberg_form_selector.strings.form_select
    });
    function selectForm(value) {
      // eslint-disable-line jsdoc/require-jsdoc
      setAttributes({
        formId: value
      });
    }
    function toggleDisplayTitle(value) {
      // eslint-disable-line jsdoc/require-jsdoc
      setAttributes({
        displayTitle: value
      });
    }
    function toggleDisplayDesc(value) {
      // eslint-disable-line jsdoc/require-jsdoc
      setAttributes({
        displayDesc: value
      });
    }

    /**
     * Get block empty JSX code.
     *
     * @since 1.8.3
     *
     * @param {Object} blockProps Block properties.
     *
     * @return {JSX.Element} Block empty JSX code.
     */
    function getEmptyFormsPreview(blockProps) {
      var clientId = blockProps.clientId;
      return /*#__PURE__*/React.createElement(Fragment, {
        key: "wpforms-gutenberg-form-selector-fragment-block-empty"
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-no-form-preview"
      }, /*#__PURE__*/React.createElement("img", {
        src: wpforms_gutenberg_form_selector.block_empty_url,
        alt: ""
      }), /*#__PURE__*/React.createElement("p", {
        dangerouslySetInnerHTML: {
          __html: strings.wpforms_empty_info
        }
      }), /*#__PURE__*/React.createElement("button", {
        type: "button",
        className: "get-started-button components-button is-button is-primary",
        onClick: function onClick() {
          openBuilderPopup(clientId);
        }
      }, __('Get Started', 'wpforms-lite')), /*#__PURE__*/React.createElement("p", {
        className: "empty-desc",
        dangerouslySetInnerHTML: {
          __html: strings.wpforms_empty_help
        }
      }), /*#__PURE__*/React.createElement("div", {
        id: "wpforms-gutenberg-popup",
        className: "wpforms-builder-popup"
      }, /*#__PURE__*/React.createElement("iframe", {
        src: "about:blank",
        width: "100%",
        height: "100%",
        id: "wpforms-builder-iframe",
        title: "wpforms-gutenberg-popup"
      }))));
    }

    /**
     * Print empty forms notice.
     *
     * @since 1.8.3
     *
     * @param {string} clientId Block client ID.
     *
     * @return {JSX.Element} Field styles JSX code.
     */
    function printEmptyFormsNotice(clientId) {
      return /*#__PURE__*/React.createElement(InspectorControls, {
        key: "wpforms-gutenberg-form-selector-inspector-main-settings"
      }, /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel",
        title: strings.form_settings
      }, /*#__PURE__*/React.createElement("p", {
        className: "wpforms-gutenberg-panel-notice wpforms-warning wpforms-empty-form-notice",
        style: {
          display: 'block'
        }
      }, /*#__PURE__*/React.createElement("strong", null, __('You haven’t created a form, yet!', 'wpforms-lite')), __('What are you waiting for?', 'wpforms-lite')), /*#__PURE__*/React.createElement("button", {
        type: "button",
        className: "get-started-button components-button is-button is-secondary",
        onClick: function onClick() {
          openBuilderPopup(clientId);
        }
      }, __('Get Started', 'wpforms-lite'))));
    }

    /**
     * Get styling panels preview.
     *
     * @since 1.8.8
     *
     * @return {JSX.Element} JSX code.
     */
    function getStylingPanelsPreview() {
      return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel disabled_panel",
        title: strings.themes
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-panel-preview wpforms-panel-preview-themes"
      })), /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel disabled_panel",
        title: strings.field_styles
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-panel-preview wpforms-panel-preview-field"
      })), /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel disabled_panel",
        title: strings.label_styles
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-panel-preview wpforms-panel-preview-label"
      })), /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel disabled_panel",
        title: strings.button_styles
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-panel-preview wpforms-panel-preview-button"
      })), /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel disabled_panel",
        title: strings.container_styles
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-panel-preview wpforms-panel-preview-container"
      })), /*#__PURE__*/React.createElement(PanelBody, {
        className: "wpforms-gutenberg-panel disabled_panel",
        title: strings.background_styles
      }, /*#__PURE__*/React.createElement("div", {
        className: "wpforms-panel-preview wpforms-panel-preview-background"
      })));
    }
    if (!hasForms()) {
      jsx = [printEmptyFormsNotice(props.clientId)];
      jsx.push(getEmptyFormsPreview(props));
      return jsx;
    }
    jsx = [/*#__PURE__*/React.createElement(InspectorControls, {
      key: "wpforms-gutenberg-form-selector-inspector-controls"
    }, /*#__PURE__*/React.createElement(PanelBody, {
      title: wpforms_gutenberg_form_selector.strings.form_settings
    }, /*#__PURE__*/React.createElement(SelectControl, {
      label: wpforms_gutenberg_form_selector.strings.form_selected,
      value: formId,
      options: formOptions,
      onChange: selectForm
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: wpforms_gutenberg_form_selector.strings.show_title,
      checked: displayTitle,
      onChange: toggleDisplayTitle
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: wpforms_gutenberg_form_selector.strings.show_description,
      checked: displayDesc,
      onChange: toggleDisplayDesc
    }), /*#__PURE__*/React.createElement("p", {
      className: "wpforms-gutenberg-panel-notice wpforms-warning"
    }, /*#__PURE__*/React.createElement("strong", null, strings.update_wp_notice_head), strings.update_wp_notice_text, " ", /*#__PURE__*/React.createElement("a", {
      href: strings.update_wp_notice_link,
      rel: "noreferrer",
      target: "_blank"
    }, strings.learn_more))), getStylingPanelsPreview())];
    if (formId) {
      jsx.push( /*#__PURE__*/React.createElement(ServerSideRender, {
        key: "wpforms-gutenberg-form-selector-server-side-renderer",
        block: "wpforms/form-selector",
        attributes: props.attributes
      }));
    } else if (preview) {
      jsx.push( /*#__PURE__*/React.createElement(Fragment, {
        key: "wpforms-gutenberg-form-selector-fragment-block-preview"
      }, /*#__PURE__*/React.createElement("img", {
        src: wpforms_gutenberg_form_selector.block_preview_url,
        style: {
          width: '100%'
        },
        alt: ""
      })));
    } else {
      jsx.push( /*#__PURE__*/React.createElement(Placeholder, {
        key: "wpforms-gutenberg-form-selector-wrap",
        className: "wpforms-gutenberg-form-selector-wrap"
      }, /*#__PURE__*/React.createElement("img", {
        src: wpforms_gutenberg_form_selector.logo_url,
        alt: ""
      }), /*#__PURE__*/React.createElement(SelectControl, {
        key: "wpforms-gutenberg-form-selector-select-control",
        value: formId,
        options: formOptions,
        onChange: selectForm
      })));
    }
    return jsx;
  },
  save: function save() {
    return null;
  }
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJfd3AiLCJ3cCIsIl93cCRzZXJ2ZXJTaWRlUmVuZGVyIiwic2VydmVyU2lkZVJlbmRlciIsIlNlcnZlclNpZGVSZW5kZXIiLCJjb21wb25lbnRzIiwiX3dwJGVsZW1lbnQiLCJlbGVtZW50IiwiY3JlYXRlRWxlbWVudCIsIkZyYWdtZW50IiwicmVnaXN0ZXJCbG9ja1R5cGUiLCJibG9ja3MiLCJfcmVmIiwiYmxvY2tFZGl0b3IiLCJlZGl0b3IiLCJJbnNwZWN0b3JDb250cm9scyIsIl93cCRjb21wb25lbnRzIiwiU2VsZWN0Q29udHJvbCIsIlRvZ2dsZUNvbnRyb2wiLCJQYW5lbEJvZHkiLCJQbGFjZWhvbGRlciIsIl9fIiwiaTE4biIsIndwZm9ybXNJY29uIiwid2lkdGgiLCJoZWlnaHQiLCJ2aWV3Qm94IiwiY2xhc3NOYW1lIiwiZmlsbCIsImQiLCIkcG9wdXAiLCJidWlsZGVyQ2xvc2VCdXR0b25FdmVudCIsImNsaWVudElEIiwib2ZmIiwib24iLCJlIiwiYWN0aW9uIiwiZm9ybUlkIiwiZm9ybVRpdGxlIiwibmV3QmxvY2siLCJjcmVhdGVCbG9jayIsInRvU3RyaW5nIiwid3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3RvciIsImZvcm1zIiwiSUQiLCJwb3N0X3RpdGxlIiwiZGF0YSIsImRpc3BhdGNoIiwicmVtb3ZlQmxvY2siLCJpbnNlcnRCbG9ja3MiLCJvcGVuQnVpbGRlclBvcHVwIiwialF1ZXJ5IiwiaXNFbXB0eU9iamVjdCIsInRtcGwiLCJwYXJlbnQiLCJhZnRlciIsInNpYmxpbmdzIiwidXJsIiwiZ2V0X3N0YXJ0ZWRfdXJsIiwiJGlmcmFtZSIsImZpbmQiLCJhdHRyIiwiZmFkZUluIiwiaGFzRm9ybXMiLCJsZW5ndGgiLCJ0aXRsZSIsInN0cmluZ3MiLCJkZXNjcmlwdGlvbiIsImljb24iLCJrZXl3b3JkcyIsImZvcm1fa2V5d29yZHMiLCJjYXRlZ29yeSIsImF0dHJpYnV0ZXMiLCJ0eXBlIiwiZGlzcGxheVRpdGxlIiwiZGlzcGxheURlc2MiLCJwcmV2aWV3IiwiZXhhbXBsZSIsInN1cHBvcnRzIiwiY3VzdG9tQ2xhc3NOYW1lIiwiZWRpdCIsInByb3BzIiwiX3Byb3BzJGF0dHJpYnV0ZXMiLCJfcHJvcHMkYXR0cmlidXRlcyRmb3IiLCJfcHJvcHMkYXR0cmlidXRlcyRkaXMiLCJfcHJvcHMkYXR0cmlidXRlcyRkaXMyIiwiX3Byb3BzJGF0dHJpYnV0ZXMkcHJlIiwic2V0QXR0cmlidXRlcyIsImZvcm1PcHRpb25zIiwibWFwIiwidmFsdWUiLCJsYWJlbCIsImpzeCIsInVuc2hpZnQiLCJmb3JtX3NlbGVjdCIsInNlbGVjdEZvcm0iLCJ0b2dnbGVEaXNwbGF5VGl0bGUiLCJ0b2dnbGVEaXNwbGF5RGVzYyIsImdldEVtcHR5Rm9ybXNQcmV2aWV3IiwiYmxvY2tQcm9wcyIsImNsaWVudElkIiwiUmVhY3QiLCJrZXkiLCJzcmMiLCJibG9ja19lbXB0eV91cmwiLCJhbHQiLCJkYW5nZXJvdXNseVNldElubmVySFRNTCIsIl9faHRtbCIsIndwZm9ybXNfZW1wdHlfaW5mbyIsIm9uQ2xpY2siLCJ3cGZvcm1zX2VtcHR5X2hlbHAiLCJpZCIsInByaW50RW1wdHlGb3Jtc05vdGljZSIsImZvcm1fc2V0dGluZ3MiLCJzdHlsZSIsImRpc3BsYXkiLCJnZXRTdHlsaW5nUGFuZWxzUHJldmlldyIsInRoZW1lcyIsImZpZWxkX3N0eWxlcyIsImxhYmVsX3N0eWxlcyIsImJ1dHRvbl9zdHlsZXMiLCJjb250YWluZXJfc3R5bGVzIiwiYmFja2dyb3VuZF9zdHlsZXMiLCJwdXNoIiwiZm9ybV9zZWxlY3RlZCIsIm9wdGlvbnMiLCJvbkNoYW5nZSIsInNob3dfdGl0bGUiLCJjaGVja2VkIiwic2hvd19kZXNjcmlwdGlvbiIsInVwZGF0ZV93cF9ub3RpY2VfaGVhZCIsInVwZGF0ZV93cF9ub3RpY2VfdGV4dCIsImhyZWYiLCJ1cGRhdGVfd3Bfbm90aWNlX2xpbmsiLCJyZWwiLCJ0YXJnZXQiLCJsZWFybl9tb3JlIiwiYmxvY2siLCJibG9ja19wcmV2aWV3X3VybCIsImxvZ29fdXJsIiwic2F2ZSJdLCJzb3VyY2VzIjpbImZha2VfOTMyN2UwY2IuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyogZ2xvYmFsIHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IsIEpTWCAqL1xuLyoganNoaW50IGVzMzogZmFsc2UsIGVzdmVyc2lvbjogNiAqL1xuXG4vKipcbiAqIEBwYXJhbSBzdHJpbmdzLnVwZGF0ZV93cF9ub3RpY2VfaGVhZFxuICogQHBhcmFtIHN0cmluZ3MudXBkYXRlX3dwX25vdGljZV90ZXh0XG4gKiBAcGFyYW0gc3RyaW5ncy51cGRhdGVfd3Bfbm90aWNlX2xpbmtcbiAqIEBwYXJhbSBzdHJpbmdzLndwZm9ybXNfZW1wdHlfaGVscFxuICogQHBhcmFtIHN0cmluZ3Mud3Bmb3Jtc19lbXB0eV9pbmZvXG4gKi9cblxuY29uc3QgeyBzZXJ2ZXJTaWRlUmVuZGVyOiBTZXJ2ZXJTaWRlUmVuZGVyID0gd3AuY29tcG9uZW50cy5TZXJ2ZXJTaWRlUmVuZGVyIH0gPSB3cDtcbmNvbnN0IHsgY3JlYXRlRWxlbWVudCwgRnJhZ21lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IHJlZ2lzdGVyQmxvY2tUeXBlIH0gPSB3cC5ibG9ja3M7XG5jb25zdCB7IEluc3BlY3RvckNvbnRyb2xzIH0gPSB3cC5ibG9ja0VkaXRvciB8fCB3cC5lZGl0b3I7XG5jb25zdCB7IFNlbGVjdENvbnRyb2wsIFRvZ2dsZUNvbnRyb2wsIFBhbmVsQm9keSwgUGxhY2Vob2xkZXIgfSA9IHdwLmNvbXBvbmVudHM7XG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuXG5jb25zdCB3cGZvcm1zSWNvbiA9IGNyZWF0ZUVsZW1lbnQoICdzdmcnLCB7IHdpZHRoOiAyMCwgaGVpZ2h0OiAyMCwgdmlld0JveDogJzAgMCA2MTIgNjEyJywgY2xhc3NOYW1lOiAnZGFzaGljb24nIH0sXG5cdGNyZWF0ZUVsZW1lbnQoICdwYXRoJywge1xuXHRcdGZpbGw6ICdjdXJyZW50Q29sb3InLFxuXHRcdGQ6ICdNNTQ0LDBINjhDMzAuNDQ1LDAsMCwzMC40NDUsMCw2OHY0NzZjMCwzNy41NTYsMzAuNDQ1LDY4LDY4LDY4aDQ3NmMzNy41NTYsMCw2OC0zMC40NDQsNjgtNjhWNjggQzYxMiwzMC40NDUsNTgxLjU1NiwwLDU0NCwweiBNNDY0LjQ0LDY4TDM4Ny42LDEyMC4wMkwzMjMuMzQsNjhINDY0LjQ0eiBNMjg4LjY2LDY4bC02NC4yNiw1Mi4wMkwxNDcuNTYsNjhIMjg4LjY2eiBNNTQ0LDU0NEg2OCBWNjhoMjIuMWwxMzYsOTIuMTRsNzkuOS02NC42bDc5LjU2LDY0LjZsMTM2LTkyLjE0SDU0NFY1NDR6IE0xMTQuMjQsMjYzLjE2aDk1Ljg4di00OC4yOGgtOTUuODhWMjYzLjE2eiBNMTE0LjI0LDM2MC40aDk1Ljg4IHYtNDguNjJoLTk1Ljg4VjM2MC40eiBNMjQyLjc2LDM2MC40aDI1NXYtNDguNjJoLTI1NVYzNjAuNEwyNDIuNzYsMzYwLjR6IE0yNDIuNzYsMjYzLjE2aDI1NXYtNDguMjhoLTI1NVYyNjMuMTZMMjQyLjc2LDI2My4xNnogTTM2OC4yMiw0NTcuM2gxMjkuNTRWNDA4SDM2OC4yMlY0NTcuM3onLFxuXHR9IClcbik7XG5cbi8qKlxuICogUG9wdXAgY29udGFpbmVyLlxuICpcbiAqIEBzaW5jZSAxLjguM1xuICpcbiAqIEB0eXBlIHtPYmplY3R9XG4gKi9cbmxldCAkcG9wdXAgPSB7fTtcblxuLyoqXG4gKiBDbG9zZSBidXR0b24gKGluc2lkZSB0aGUgZm9ybSBidWlsZGVyKSBjbGljayBldmVudC5cbiAqXG4gKiBAc2luY2UgMS44LjNcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gY2xpZW50SUQgQmxvY2sgQ2xpZW50IElELlxuICovXG5jb25zdCBidWlsZGVyQ2xvc2VCdXR0b25FdmVudCA9IGZ1bmN0aW9uKCBjbGllbnRJRCApIHtcblx0JHBvcHVwXG5cdFx0Lm9mZiggJ3dwZm9ybXNCdWlsZGVySW5Qb3B1cENsb3NlJyApXG5cdFx0Lm9uKCAnd3Bmb3Jtc0J1aWxkZXJJblBvcHVwQ2xvc2UnLCBmdW5jdGlvbiggZSwgYWN0aW9uLCBmb3JtSWQsIGZvcm1UaXRsZSApIHtcblx0XHRcdGlmICggYWN0aW9uICE9PSAnc2F2ZWQnIHx8ICEgZm9ybUlkICkge1xuXHRcdFx0XHRyZXR1cm47XG5cdFx0XHR9XG5cblx0XHRcdC8vIEluc2VydCBhIG5ldyBibG9jayB3aGVuIGEgbmV3IGZvcm0gaXMgY3JlYXRlZCBmcm9tIHRoZSBwb3B1cCB0byB1cGRhdGUgdGhlIGZvcm0gbGlzdCBhbmQgYXR0cmlidXRlcy5cblx0XHRcdGNvbnN0IG5ld0Jsb2NrID0gd3AuYmxvY2tzLmNyZWF0ZUJsb2NrKCAnd3Bmb3Jtcy9mb3JtLXNlbGVjdG9yJywge1xuXHRcdFx0XHRmb3JtSWQ6IGZvcm1JZC50b1N0cmluZygpLCAvLyBFeHBlY3RzIHN0cmluZyB2YWx1ZSwgbWFrZSBzdXJlIHdlIGluc2VydCBzdHJpbmcuXG5cdFx0XHR9ICk7XG5cblx0XHRcdC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBjYW1lbGNhc2Vcblx0XHRcdHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IuZm9ybXMgPSBbIHsgSUQ6IGZvcm1JZCwgcG9zdF90aXRsZTogZm9ybVRpdGxlIH0gXTtcblxuXHRcdFx0Ly8gSW5zZXJ0IGEgbmV3IGJsb2NrLlxuXHRcdFx0d3AuZGF0YS5kaXNwYXRjaCggJ2NvcmUvYmxvY2stZWRpdG9yJyApLnJlbW92ZUJsb2NrKCBjbGllbnRJRCApO1xuXHRcdFx0d3AuZGF0YS5kaXNwYXRjaCggJ2NvcmUvYmxvY2stZWRpdG9yJyApLmluc2VydEJsb2NrcyggbmV3QmxvY2sgKTtcblx0XHR9ICk7XG59O1xuXG4vKipcbiAqIE9wZW4gYnVpbGRlciBwb3B1cC5cbiAqXG4gKiBAc2luY2UgMS42LjJcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gY2xpZW50SUQgQmxvY2sgQ2xpZW50IElELlxuICovXG5jb25zdCBvcGVuQnVpbGRlclBvcHVwID0gZnVuY3Rpb24oIGNsaWVudElEICkge1xuXHRpZiAoIGpRdWVyeS5pc0VtcHR5T2JqZWN0KCAkcG9wdXAgKSApIHtcblx0XHRjb25zdCB0bXBsID0galF1ZXJ5KCAnI3dwZm9ybXMtZ3V0ZW5iZXJnLXBvcHVwJyApO1xuXHRcdGNvbnN0IHBhcmVudCA9IGpRdWVyeSggJyN3cHdyYXAnICk7XG5cblx0XHRwYXJlbnQuYWZ0ZXIoIHRtcGwgKTtcblxuXHRcdCRwb3B1cCA9IHBhcmVudC5zaWJsaW5ncyggJyN3cGZvcm1zLWd1dGVuYmVyZy1wb3B1cCcgKTtcblx0fVxuXG5cdGNvbnN0IHVybCA9IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IuZ2V0X3N0YXJ0ZWRfdXJsLFxuXHRcdCRpZnJhbWUgPSAkcG9wdXAuZmluZCggJ2lmcmFtZScgKTtcblxuXHRidWlsZGVyQ2xvc2VCdXR0b25FdmVudCggY2xpZW50SUQgKTtcblx0JGlmcmFtZS5hdHRyKCAnc3JjJywgdXJsICk7XG5cdCRwb3B1cC5mYWRlSW4oKTtcbn07XG5cbmNvbnN0IGhhc0Zvcm1zID0gZnVuY3Rpb24oKSB7XG5cdHJldHVybiB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLmZvcm1zLmxlbmd0aCA+IDA7XG59O1xuXG5yZWdpc3RlckJsb2NrVHlwZSggJ3dwZm9ybXMvZm9ybS1zZWxlY3RvcicsIHtcblx0dGl0bGU6IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3Iuc3RyaW5ncy50aXRsZSxcblx0ZGVzY3JpcHRpb246IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3Iuc3RyaW5ncy5kZXNjcmlwdGlvbixcblx0aWNvbjogd3Bmb3Jtc0ljb24sXG5cdGtleXdvcmRzOiB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLnN0cmluZ3MuZm9ybV9rZXl3b3Jkcyxcblx0Y2F0ZWdvcnk6ICd3aWRnZXRzJyxcblx0YXR0cmlidXRlczoge1xuXHRcdGZvcm1JZDoge1xuXHRcdFx0dHlwZTogJ3N0cmluZycsXG5cdFx0fSxcblx0XHRkaXNwbGF5VGl0bGU6IHtcblx0XHRcdHR5cGU6ICdib29sZWFuJyxcblx0XHR9LFxuXHRcdGRpc3BsYXlEZXNjOiB7XG5cdFx0XHR0eXBlOiAnYm9vbGVhbicsXG5cdFx0fSxcblx0XHRwcmV2aWV3OiB7XG5cdFx0XHR0eXBlOiAnYm9vbGVhbicsXG5cdFx0fSxcblx0fSxcblx0ZXhhbXBsZToge1xuXHRcdGF0dHJpYnV0ZXM6IHtcblx0XHRcdHByZXZpZXc6IHRydWUsXG5cdFx0fSxcblx0fSxcblx0c3VwcG9ydHM6IHtcblx0XHRjdXN0b21DbGFzc05hbWU6IGhhc0Zvcm1zKCksXG5cdH0sXG5cdGVkaXQoIHByb3BzICkgeyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIG1heC1saW5lcy1wZXItZnVuY3Rpb25cblx0XHRjb25zdCB7IGF0dHJpYnV0ZXM6IHsgZm9ybUlkID0gJycsIGRpc3BsYXlUaXRsZSA9IGZhbHNlLCBkaXNwbGF5RGVzYyA9IGZhbHNlLCBwcmV2aWV3ID0gZmFsc2UgfSwgc2V0QXR0cmlidXRlcyB9ID0gcHJvcHM7XG5cdFx0Y29uc3QgZm9ybU9wdGlvbnMgPSB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLmZvcm1zLm1hcCggKCB2YWx1ZSApID0+IChcblx0XHRcdHsgdmFsdWU6IHZhbHVlLklELCBsYWJlbDogdmFsdWUucG9zdF90aXRsZSB9XG5cdFx0KSApO1xuXG5cdFx0Y29uc3Qgc3RyaW5ncyA9IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3Iuc3RyaW5ncztcblx0XHRsZXQganN4O1xuXG5cdFx0Zm9ybU9wdGlvbnMudW5zaGlmdCggeyB2YWx1ZTogJycsIGxhYmVsOiB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLnN0cmluZ3MuZm9ybV9zZWxlY3QgfSApO1xuXG5cdFx0ZnVuY3Rpb24gc2VsZWN0Rm9ybSggdmFsdWUgKSB7IC8vIGVzbGludC1kaXNhYmxlLWxpbmUganNkb2MvcmVxdWlyZS1qc2RvY1xuXHRcdFx0c2V0QXR0cmlidXRlcyggeyBmb3JtSWQ6IHZhbHVlIH0gKTtcblx0XHR9XG5cblx0XHRmdW5jdGlvbiB0b2dnbGVEaXNwbGF5VGl0bGUoIHZhbHVlICkgeyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIGpzZG9jL3JlcXVpcmUtanNkb2Ncblx0XHRcdHNldEF0dHJpYnV0ZXMoIHsgZGlzcGxheVRpdGxlOiB2YWx1ZSB9ICk7XG5cdFx0fVxuXG5cdFx0ZnVuY3Rpb24gdG9nZ2xlRGlzcGxheURlc2MoIHZhbHVlICkgeyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIGpzZG9jL3JlcXVpcmUtanNkb2Ncblx0XHRcdHNldEF0dHJpYnV0ZXMoIHsgZGlzcGxheURlc2M6IHZhbHVlIH0gKTtcblx0XHR9XG5cblx0XHQvKipcblx0XHQgKiBHZXQgYmxvY2sgZW1wdHkgSlNYIGNvZGUuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44LjNcblx0XHQgKlxuXHRcdCAqIEBwYXJhbSB7T2JqZWN0fSBibG9ja1Byb3BzIEJsb2NrIHByb3BlcnRpZXMuXG5cdFx0ICpcblx0XHQgKiBAcmV0dXJuIHtKU1guRWxlbWVudH0gQmxvY2sgZW1wdHkgSlNYIGNvZGUuXG5cdFx0ICovXG5cdFx0ZnVuY3Rpb24gZ2V0RW1wdHlGb3Jtc1ByZXZpZXcoIGJsb2NrUHJvcHMgKSB7XG5cdFx0XHRjb25zdCBjbGllbnRJZCA9IGJsb2NrUHJvcHMuY2xpZW50SWQ7XG5cblx0XHRcdHJldHVybiAoXG5cdFx0XHRcdDxGcmFnbWVudFxuXHRcdFx0XHRcdGtleT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItZnJhZ21lbnQtYmxvY2stZW1wdHlcIj5cblx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtbm8tZm9ybS1wcmV2aWV3XCI+XG5cdFx0XHRcdFx0XHQ8aW1nIHNyYz17IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3IuYmxvY2tfZW1wdHlfdXJsIH0gYWx0PVwiXCIgLz5cblx0XHRcdFx0XHRcdDxwIGRhbmdlcm91c2x5U2V0SW5uZXJIVE1MPXsgeyBfX2h0bWw6IHN0cmluZ3Mud3Bmb3Jtc19lbXB0eV9pbmZvIH0gfT48L3A+XG5cdFx0XHRcdFx0XHQ8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzc05hbWU9XCJnZXQtc3RhcnRlZC1idXR0b24gY29tcG9uZW50cy1idXR0b24gaXMtYnV0dG9uIGlzLXByaW1hcnlcIlxuXHRcdFx0XHRcdFx0XHRvbkNsaWNrPXtcblx0XHRcdFx0XHRcdFx0XHQoKSA9PiB7XG5cdFx0XHRcdFx0XHRcdFx0XHRvcGVuQnVpbGRlclBvcHVwKCBjbGllbnRJZCApO1xuXHRcdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdFx0PlxuXHRcdFx0XHRcdFx0XHR7IF9fKCAnR2V0IFN0YXJ0ZWQnLCAnd3Bmb3Jtcy1saXRlJyApIH1cblx0XHRcdFx0XHRcdDwvYnV0dG9uPlxuXHRcdFx0XHRcdFx0PHAgY2xhc3NOYW1lPVwiZW1wdHktZGVzY1wiIGRhbmdlcm91c2x5U2V0SW5uZXJIVE1MPXsgeyBfX2h0bWw6IHN0cmluZ3Mud3Bmb3Jtc19lbXB0eV9oZWxwIH0gfT48L3A+XG5cblx0XHRcdFx0XHRcdHsgLyogVGVtcGxhdGUgZm9yIHBvcHVwIHdpdGggYnVpbGRlciBpZnJhbWUgKi8gfVxuXHRcdFx0XHRcdFx0PGRpdiBpZD1cIndwZm9ybXMtZ3V0ZW5iZXJnLXBvcHVwXCIgY2xhc3NOYW1lPVwid3Bmb3Jtcy1idWlsZGVyLXBvcHVwXCI+XG5cdFx0XHRcdFx0XHRcdDxpZnJhbWUgc3JjPVwiYWJvdXQ6YmxhbmtcIiB3aWR0aD1cIjEwMCVcIiBoZWlnaHQ9XCIxMDAlXCIgaWQ9XCJ3cGZvcm1zLWJ1aWxkZXItaWZyYW1lXCIgdGl0bGU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wb3B1cFwiPjwvaWZyYW1lPlxuXHRcdFx0XHRcdFx0PC9kaXY+XG5cdFx0XHRcdFx0PC9kaXY+XG5cdFx0XHRcdDwvRnJhZ21lbnQ+XG5cdFx0XHQpO1xuXHRcdH1cblxuXHRcdC8qKlxuXHRcdCAqIFByaW50IGVtcHR5IGZvcm1zIG5vdGljZS5cblx0XHQgKlxuXHRcdCAqIEBzaW5jZSAxLjguM1xuXHRcdCAqXG5cdFx0ICogQHBhcmFtIHtzdHJpbmd9IGNsaWVudElkIEJsb2NrIGNsaWVudCBJRC5cblx0XHQgKlxuXHRcdCAqIEByZXR1cm4ge0pTWC5FbGVtZW50fSBGaWVsZCBzdHlsZXMgSlNYIGNvZGUuXG5cdFx0ICovXG5cdFx0ZnVuY3Rpb24gcHJpbnRFbXB0eUZvcm1zTm90aWNlKCBjbGllbnRJZCApIHtcblx0XHRcdHJldHVybiAoXG5cdFx0XHRcdDxJbnNwZWN0b3JDb250cm9scyBrZXk9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLWluc3BlY3Rvci1tYWluLXNldHRpbmdzXCI+XG5cdFx0XHRcdFx0PFBhbmVsQm9keSBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbFwiIHRpdGxlPXsgc3RyaW5ncy5mb3JtX3NldHRpbmdzIH0+XG5cdFx0XHRcdFx0XHQ8cCBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbC1ub3RpY2Ugd3Bmb3Jtcy13YXJuaW5nIHdwZm9ybXMtZW1wdHktZm9ybS1ub3RpY2VcIiBzdHlsZT17IHsgZGlzcGxheTogJ2Jsb2NrJyB9IH0+XG5cdFx0XHRcdFx0XHRcdDxzdHJvbmc+eyBfXyggJ1lvdSBoYXZlbuKAmXQgY3JlYXRlZCBhIGZvcm0sIHlldCEnLCAnd3Bmb3Jtcy1saXRlJyApIH08L3N0cm9uZz5cblx0XHRcdFx0XHRcdFx0eyBfXyggJ1doYXQgYXJlIHlvdSB3YWl0aW5nIGZvcj8nLCAnd3Bmb3Jtcy1saXRlJyApIH1cblx0XHRcdFx0XHRcdDwvcD5cblx0XHRcdFx0XHRcdDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzTmFtZT1cImdldC1zdGFydGVkLWJ1dHRvbiBjb21wb25lbnRzLWJ1dHRvbiBpcy1idXR0b24gaXMtc2Vjb25kYXJ5XCJcblx0XHRcdFx0XHRcdFx0b25DbGljaz17XG5cdFx0XHRcdFx0XHRcdFx0KCkgPT4ge1xuXHRcdFx0XHRcdFx0XHRcdFx0b3BlbkJ1aWxkZXJQb3B1cCggY2xpZW50SWQgKTtcblx0XHRcdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdD5cblx0XHRcdFx0XHRcdFx0eyBfXyggJ0dldCBTdGFydGVkJywgJ3dwZm9ybXMtbGl0ZScgKSB9XG5cdFx0XHRcdFx0XHQ8L2J1dHRvbj5cblx0XHRcdFx0XHQ8L1BhbmVsQm9keT5cblx0XHRcdFx0PC9JbnNwZWN0b3JDb250cm9scz5cblx0XHRcdCk7XG5cdFx0fVxuXG5cdFx0LyoqXG5cdFx0ICogR2V0IHN0eWxpbmcgcGFuZWxzIHByZXZpZXcuXG5cdFx0ICpcblx0XHQgKiBAc2luY2UgMS44Ljhcblx0XHQgKlxuXHRcdCAqIEByZXR1cm4ge0pTWC5FbGVtZW50fSBKU1ggY29kZS5cblx0XHQgKi9cblx0XHRmdW5jdGlvbiBnZXRTdHlsaW5nUGFuZWxzUHJldmlldygpIHtcblx0XHRcdHJldHVybiAoXG5cdFx0XHRcdDxGcmFnbWVudD5cblx0XHRcdFx0XHQ8UGFuZWxCb2R5IGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLXBhbmVsIGRpc2FibGVkX3BhbmVsXCIgdGl0bGU9eyBzdHJpbmdzLnRoZW1lcyB9PlxuXHRcdFx0XHRcdFx0PGRpdiBjbGFzc05hbWU9XCJ3cGZvcm1zLXBhbmVsLXByZXZpZXcgd3Bmb3Jtcy1wYW5lbC1wcmV2aWV3LXRoZW1lc1wiPjwvZGl2PlxuXHRcdFx0XHRcdDwvUGFuZWxCb2R5PlxuXHRcdFx0XHRcdDxQYW5lbEJvZHkgY2xhc3NOYW1lPVwid3Bmb3Jtcy1ndXRlbmJlcmctcGFuZWwgZGlzYWJsZWRfcGFuZWxcIiB0aXRsZT17IHN0cmluZ3MuZmllbGRfc3R5bGVzIH0+XG5cdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtcGFuZWwtcHJldmlldyB3cGZvcm1zLXBhbmVsLXByZXZpZXctZmllbGRcIj48L2Rpdj5cblx0XHRcdFx0XHQ8L1BhbmVsQm9keT5cblx0XHRcdFx0XHQ8UGFuZWxCb2R5IGNsYXNzTmFtZT1cIndwZm9ybXMtZ3V0ZW5iZXJnLXBhbmVsIGRpc2FibGVkX3BhbmVsXCIgdGl0bGU9eyBzdHJpbmdzLmxhYmVsX3N0eWxlcyB9PlxuXHRcdFx0XHRcdFx0PGRpdiBjbGFzc05hbWU9XCJ3cGZvcm1zLXBhbmVsLXByZXZpZXcgd3Bmb3Jtcy1wYW5lbC1wcmV2aWV3LWxhYmVsXCI+PC9kaXY+XG5cdFx0XHRcdFx0PC9QYW5lbEJvZHk+XG5cdFx0XHRcdFx0PFBhbmVsQm9keSBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbCBkaXNhYmxlZF9wYW5lbFwiIHRpdGxlPXsgc3RyaW5ncy5idXR0b25fc3R5bGVzIH0+XG5cdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtcGFuZWwtcHJldmlldyB3cGZvcm1zLXBhbmVsLXByZXZpZXctYnV0dG9uXCI+PC9kaXY+XG5cdFx0XHRcdFx0PC9QYW5lbEJvZHk+XG5cdFx0XHRcdFx0PFBhbmVsQm9keSBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbCBkaXNhYmxlZF9wYW5lbFwiIHRpdGxlPXsgc3RyaW5ncy5jb250YWluZXJfc3R5bGVzIH0+XG5cdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cIndwZm9ybXMtcGFuZWwtcHJldmlldyB3cGZvcm1zLXBhbmVsLXByZXZpZXctY29udGFpbmVyXCI+PC9kaXY+XG5cdFx0XHRcdFx0PC9QYW5lbEJvZHk+XG5cdFx0XHRcdFx0PFBhbmVsQm9keSBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbCBkaXNhYmxlZF9wYW5lbFwiIHRpdGxlPXsgc3RyaW5ncy5iYWNrZ3JvdW5kX3N0eWxlcyB9PlxuXHRcdFx0XHRcdFx0PGRpdiBjbGFzc05hbWU9XCJ3cGZvcm1zLXBhbmVsLXByZXZpZXcgd3Bmb3Jtcy1wYW5lbC1wcmV2aWV3LWJhY2tncm91bmRcIj48L2Rpdj5cblx0XHRcdFx0XHQ8L1BhbmVsQm9keT5cblx0XHRcdFx0PC9GcmFnbWVudD5cblx0XHRcdCk7XG5cdFx0fVxuXG5cdFx0aWYgKCAhIGhhc0Zvcm1zKCkgKSB7XG5cdFx0XHRqc3ggPSBbIHByaW50RW1wdHlGb3Jtc05vdGljZSggcHJvcHMuY2xpZW50SWQgKSBdO1xuXG5cdFx0XHRqc3gucHVzaCggZ2V0RW1wdHlGb3Jtc1ByZXZpZXcoIHByb3BzICkgKTtcblx0XHRcdHJldHVybiBqc3g7XG5cdFx0fVxuXG5cdFx0anN4ID0gW1xuXHRcdFx0PEluc3BlY3RvckNvbnRyb2xzIGtleT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItaW5zcGVjdG9yLWNvbnRyb2xzXCI+XG5cdFx0XHRcdDxQYW5lbEJvZHkgdGl0bGU9eyB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLnN0cmluZ3MuZm9ybV9zZXR0aW5ncyB9PlxuXHRcdFx0XHRcdDxTZWxlY3RDb250cm9sXG5cdFx0XHRcdFx0XHRsYWJlbD17IHdwZm9ybXNfZ3V0ZW5iZXJnX2Zvcm1fc2VsZWN0b3Iuc3RyaW5ncy5mb3JtX3NlbGVjdGVkIH1cblx0XHRcdFx0XHRcdHZhbHVlPXsgZm9ybUlkIH1cblx0XHRcdFx0XHRcdG9wdGlvbnM9eyBmb3JtT3B0aW9ucyB9XG5cdFx0XHRcdFx0XHRvbkNoYW5nZT17IHNlbGVjdEZvcm0gfVxuXHRcdFx0XHRcdC8+XG5cdFx0XHRcdFx0PFRvZ2dsZUNvbnRyb2xcblx0XHRcdFx0XHRcdGxhYmVsPXsgd3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3Rvci5zdHJpbmdzLnNob3dfdGl0bGUgfVxuXHRcdFx0XHRcdFx0Y2hlY2tlZD17IGRpc3BsYXlUaXRsZSB9XG5cdFx0XHRcdFx0XHRvbkNoYW5nZT17IHRvZ2dsZURpc3BsYXlUaXRsZSB9XG5cdFx0XHRcdFx0Lz5cblx0XHRcdFx0XHQ8VG9nZ2xlQ29udHJvbFxuXHRcdFx0XHRcdFx0bGFiZWw9eyB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLnN0cmluZ3Muc2hvd19kZXNjcmlwdGlvbiB9XG5cdFx0XHRcdFx0XHRjaGVja2VkPXsgZGlzcGxheURlc2MgfVxuXHRcdFx0XHRcdFx0b25DaGFuZ2U9eyB0b2dnbGVEaXNwbGF5RGVzYyB9XG5cdFx0XHRcdFx0Lz5cblx0XHRcdFx0XHQ8cCBjbGFzc05hbWU9XCJ3cGZvcm1zLWd1dGVuYmVyZy1wYW5lbC1ub3RpY2Ugd3Bmb3Jtcy13YXJuaW5nXCI+XG5cdFx0XHRcdFx0XHQ8c3Ryb25nPnsgc3RyaW5ncy51cGRhdGVfd3Bfbm90aWNlX2hlYWQgfTwvc3Ryb25nPlxuXHRcdFx0XHRcdFx0eyBzdHJpbmdzLnVwZGF0ZV93cF9ub3RpY2VfdGV4dCB9IDxhIGhyZWY9eyBzdHJpbmdzLnVwZGF0ZV93cF9ub3RpY2VfbGluayB9IHJlbD1cIm5vcmVmZXJyZXJcIiB0YXJnZXQ9XCJfYmxhbmtcIj57IHN0cmluZ3MubGVhcm5fbW9yZSB9PC9hPlxuXHRcdFx0XHRcdDwvcD5cblx0XHRcdFx0PC9QYW5lbEJvZHk+XG5cdFx0XHRcdHsgZ2V0U3R5bGluZ1BhbmVsc1ByZXZpZXcoKSB9XG5cdFx0XHQ8L0luc3BlY3RvckNvbnRyb2xzPixcblx0XHRdO1xuXG5cdFx0aWYgKCBmb3JtSWQgKSB7XG5cdFx0XHRqc3gucHVzaChcblx0XHRcdFx0PFNlcnZlclNpZGVSZW5kZXJcblx0XHRcdFx0XHRrZXk9XCJ3cGZvcm1zLWd1dGVuYmVyZy1mb3JtLXNlbGVjdG9yLXNlcnZlci1zaWRlLXJlbmRlcmVyXCJcblx0XHRcdFx0XHRibG9jaz1cIndwZm9ybXMvZm9ybS1zZWxlY3RvclwiXG5cdFx0XHRcdFx0YXR0cmlidXRlcz17IHByb3BzLmF0dHJpYnV0ZXMgfVxuXHRcdFx0XHQvPlxuXHRcdFx0KTtcblx0XHR9IGVsc2UgaWYgKCBwcmV2aWV3ICkge1xuXHRcdFx0anN4LnB1c2goXG5cdFx0XHRcdDxGcmFnbWVudFxuXHRcdFx0XHRcdGtleT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3ItZnJhZ21lbnQtYmxvY2stcHJldmlld1wiPlxuXHRcdFx0XHRcdDxpbWcgc3JjPXsgd3Bmb3Jtc19ndXRlbmJlcmdfZm9ybV9zZWxlY3Rvci5ibG9ja19wcmV2aWV3X3VybCB9IHN0eWxlPXsgeyB3aWR0aDogJzEwMCUnIH0gfSBhbHQ9XCJcIiAvPlxuXHRcdFx0XHQ8L0ZyYWdtZW50PlxuXHRcdFx0KTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0anN4LnB1c2goXG5cdFx0XHRcdDxQbGFjZWhvbGRlclxuXHRcdFx0XHRcdGtleT1cIndwZm9ybXMtZ3V0ZW5iZXJnLWZvcm0tc2VsZWN0b3Itd3JhcFwiXG5cdFx0XHRcdFx0Y2xhc3NOYW1lPVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci13cmFwXCI+XG5cdFx0XHRcdFx0PGltZyBzcmM9eyB3cGZvcm1zX2d1dGVuYmVyZ19mb3JtX3NlbGVjdG9yLmxvZ29fdXJsIH0gYWx0PVwiXCIgLz5cblx0XHRcdFx0XHQ8U2VsZWN0Q29udHJvbFxuXHRcdFx0XHRcdFx0a2V5PVwid3Bmb3Jtcy1ndXRlbmJlcmctZm9ybS1zZWxlY3Rvci1zZWxlY3QtY29udHJvbFwiXG5cdFx0XHRcdFx0XHR2YWx1ZT17IGZvcm1JZCB9XG5cdFx0XHRcdFx0XHRvcHRpb25zPXsgZm9ybU9wdGlvbnMgfVxuXHRcdFx0XHRcdFx0b25DaGFuZ2U9eyBzZWxlY3RGb3JtIH1cblx0XHRcdFx0XHQvPlxuXHRcdFx0XHQ8L1BsYWNlaG9sZGVyPlxuXHRcdFx0KTtcblx0XHR9XG5cblx0XHRyZXR1cm4ganN4O1xuXHR9LFxuXHRzYXZlKCkge1xuXHRcdHJldHVybiBudWxsO1xuXHR9LFxufSApO1xuIl0sIm1hcHBpbmdzIjoiOztBQUFBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsSUFBQUEsR0FBQSxHQUFnRkMsRUFBRTtFQUFBQyxvQkFBQSxHQUFBRixHQUFBLENBQTFFRyxnQkFBZ0I7RUFBRUMsZ0JBQWdCLEdBQUFGLG9CQUFBLGNBQUdELEVBQUUsQ0FBQ0ksVUFBVSxDQUFDRCxnQkFBZ0IsR0FBQUYs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
},{}]},{},[1])