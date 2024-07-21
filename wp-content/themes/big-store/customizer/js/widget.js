(function ($) {
$(document).on( 'widget-added widget-updated ready', function() {
        $('#widgets-right .color-picker').each( function() {
            if ( ! $(this).data('wpWpColorPicker') ) {
                $(this).wpColorPicker( {
                    change: _.throttle(function() {
                        $(this).trigger( 'change' );
                    }, 3000)
                });
            }
        });
    });
jQuery(document).ready(function ($) {
  function media_upload(button_selector) {
    var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
    $('body').on('click', button_selector, function () {
      var button_id = $(this).attr('id');
      wp.media.editor.send.attachment = function (props, attachment) {
        if (_custom_media) {
          $('.' + button_id + '_img').attr('src', attachment.url);
          $('.' + button_id + '_url').val(attachment.url);
        } else {
          return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
        }
      }
      wp.media.editor.open($('#' + button_id));
      return false;
    });
  }
  media_upload('.custom_media_button');
});

})( jQuery );