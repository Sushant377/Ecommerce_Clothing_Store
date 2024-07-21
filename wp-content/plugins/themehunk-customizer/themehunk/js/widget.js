
jQuery(document).ready( function($) {

    function media_upload(button_class) {

        var _custom_media = true,

        _orig_send_attachment = wp.media.editor.send.attachment;



        $('body').on('click', button_class, function(e) {

            var button_id ='#'+$(this).attr('id');

            var self = $(button_id);

            var send_attachment_bkp = wp.media.editor.send.attachment;

            var button = $(button_id);

            var id = button.attr('id').replace('_button', '');

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment){

                if ( _custom_media  ) {
                   $('#'+id).val(attachment.url);
                    $('.'+id).attr('src',attachment.url).css('display','block');
                } else {

                    return _orig_send_attachment.apply( button_id, [props, attachment] );

                }

            }

            wp.media.editor.open(button);

                return false;

        });

    }

    media_upload('.custom_media_button.button');

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
    
   // alert($( "#accordion" ).accordion());


});
