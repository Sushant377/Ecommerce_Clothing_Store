( function( $, api ) {

		api.controlConstructor['toggle'] = api.Control.extend( {
	
			ready: function() {
				var control = this;
	
				this.container.on( 'change', 'input:checkbox', function() {
					value = this.checked ? true : false;
					control.setting.set( value );
					control.container.find('.components-form-toggle').toggleClass('is-checked');

				});

			}
	   
		});

} )( jQuery, wp.customize );