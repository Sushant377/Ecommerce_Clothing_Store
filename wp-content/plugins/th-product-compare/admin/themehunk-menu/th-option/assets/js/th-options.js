
function openTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}


(function($){

    
    THoptionAdmin = {
        init: function(){
            this.rPlugins = ['hunk-companion', 'one-click-demo-import', 'woocommerce'];

            this._bind();
            this._noticeRemove();
            this._importActiveBtn();
        },

        _noticeRemove(){
           jQuery( "div" ).remove(".notice");
        },

        _loaderActive: function($class,$message = "Installing") {
             $class.addClass('updating-message').html($message);
            $class.removeClass( 'button-primary' ).addClass( 'disabled' );
        },
      _pluginexists: function(slug) {
               if(this.rPlugins.indexOf(slug) !== -1){  
                    THoptionAdmin._importActiveBtn();
            }   
        },
        _importActiveBtn: function() {
            rPlugins = this.rPlugins;
            var i=1;
            rPlugins.forEach(element => {
                        const activeCheck = document.querySelector('.'+element+'.disabled');
                        if(activeCheck) {
                            i++;
                            if(i>3){
                                var importdemo = jQuery( '.importdemo');
                                importdemo.removeClass( 'disabled' ).attr('href',THAdmin.oneClickDemo);
                                importdemo.addClass( 'ztabtn ' );
                            };
                        }
                });
        },

        _installNow: function( event ) {
             $document   = jQuery(document);
              var slug = $(this).data('slug'); 
            var $message = $( '.install-now.'+slug);

                if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
                    wp.updates.requestFilesystemCredentials( event );
                    $document.on( 'credential-modal-cancel', function() {
                        var $message = $( '.install-now' );

                        $message.text( wp.updates.l10n.installNow );

                        wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
                    } );
                }
                 wp.updates.installPlugin( {
                    slug:  $message.data('slug'),
                    init:  $message.data('init'),
                } );
        },
        /*
         * Plugin Installation Error.
         */
        _installError: function( event, response ){
            var $card = jQuery( '.install-now');
            $card.removeClass( 'button-primary' )
                .addClass( 'disabled' )
                .html( wp.updates.l10n.installFailedShort );
                    console.log(response.errorMessage);
        },

        /**
         * Installing Plugin
         */
        _pluginInstalling: function(event, args){
            event.preventDefault();
            var $card = jQuery( '.'+args.slug);
            var $button = $card.find( '.button-primary' );
            $button.removeClass( 'install-now button-primary installed button-disabled updated-message' );

            $card.addClass('updating-message').html('Installing Plugin');
            $button.addClass('already-started');
        },

        /**
         * Plugin activation
         */
        _activetedPlugin: function(event, args){
                event.preventDefault();
                var $card = jQuery( '.'+args.slug);
                THoptionAdmin._activePluginHomepage(args.slug,$card.data('init'));
        },
        /**
         * Plugin & Homepage Activation
         */
        _activePluginHomepage: function($slug,$init){
            var $message = jQuery( '.'+$slug);
            var $setting_class = jQuery( '.setting-'+$slug);

                $message.removeClass( 'install-now button-primary installed button-disabled updated-message' )
                .addClass('updating-message')
                .html($message.data('msg'));

            $.ajax({
                url  : ajaxurl,
                type : 'POST',

                data : {
                    action : 'th_activeplugin',
                    init   :  $init,
                    slug   :  $slug,
                    nonce  : ThCompareAdmin.nonce,
                }
            }).done(function ( response ){
            	if( response.success) {
                 $message.removeClass( 'button-primary updating-message' )
                .addClass( 'disabled' )
                .html( 'Activated');
                $setting_class.show();
                    THoptionAdmin._pluginexists($slug); //import butoon check

					} else {

						$message.removeClass( 'updating-message' );

					}

            });
        },
        /**
         * Plugin activation
         */
        _activePlugin: function(event){
                var $button = jQuery( event.target ),
                $init   = $button.data( 'init' ),
                $slug   = $button.data( 'slug' );
                THoptionAdmin._activePluginHomepage($slug,$init);
            },
        _bind: function(){               
            $( document ).on('click'                     , '.install-now', THoptionAdmin._installNow);
            $( document ).on('click'                     , '.activate-now', THoptionAdmin._activePlugin);
            $( document ).on('wp-plugin-install-error'   , THoptionAdmin._installError);
            $( document ).on('wp-plugin-installing'      , THoptionAdmin._pluginInstalling);
            $( document ).on('wp-plugin-install-success' , THoptionAdmin._activetedPlugin);  
        },


};
THoptionAdmin.init();
/**
         * TABS
         */
             function _plugins_tabs() {
                        $('.tabs-list a').click(function(){
                         $('.panel').hide();
                         $('.tabs-list a.active').removeClass('active');
                         $(this).addClass('active');
                         var panel = $(this).attr('href');
                         $(panel).fadeIn();
                         return false;  // prevents link action
                          });  // end click
                         $('.tabs-list a:first').click();
               
        }
             $(document).ready(function() {
            _plugins_tabs();
             });

})(jQuery);