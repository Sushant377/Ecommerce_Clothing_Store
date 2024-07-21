function jot_shop_install(newLocation) {
    jQuery('.loader,.flactvate-activating').css('display','block');
    jQuery('.button-large').css('display','none');
    jQuery.post(newLocation, { url: '' }, function(data) {
// home page settings
                jQuery('.loader,.flactvate-activating').css('display','none');
                jQuery('.button-large.flactvate').css('display','block');

        var data = {
            'action': 'jot_shop_default_home',
            'home': 'saved'
        };
        jQuery.post(ajaxurl, data, function(response) {
            jQuery('.button-large.flactvate').css('display','none');

            setTimeout(function() {
                            location.reload(true);
            }, 1000);
        });
    });
return false;
}

( function( api ) {
	// Extends our custom "novellite-1" section.
	api.sectionConstructor['th-pro-sect-link-1'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
