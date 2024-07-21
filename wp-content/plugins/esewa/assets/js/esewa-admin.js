jQuery( function( $ ) {
	'use strict';

	/**
	 * Object to handle eSewa admin functions.
	 */
	var esewa_retro_wc_admin = {
		isTestMode: function() {
			return $( '#woocommerce_esewa_testmode' ).is( ':checked' );
		},

		/**
		 * Initialize.
		 */
		init: function() {
			console.log('yes');
			$( document.body ).on( 'change', '#woocommerce_esewa_testmode', function() {
				var test_merchant_secret = $( '#woocommerce_esewa_sandbox_merchant_secret' ).parents( 'tr' ).eq( 0 ),
					live_merchant_secret = $( '#woocommerce_esewa_merchant_secret' ).parents( 'tr' ).eq( 0 ),
					test_product_code = $( '#woocommerce_esewa_sandbox_product_code' ).parents( 'tr' ).eq( 0 ),
					live_product_code = $( '#woocommerce_esewa_product_code' ).parents( 'tr' ).eq( 0 );

				if ( $( this ).is( ':checked' ) ) {
					test_merchant_secret.show();
					live_merchant_secret.hide();
					live_product_code.hide();
					test_product_code.show();
				} else {
					test_merchant_secret.hide();
					live_merchant_secret.show();
					live_product_code.show();
					test_product_code.hide();
				}
			} );

			$( '#woocommerce_esewa_testmode' ).change();
		}
	};

	esewa_retro_wc_admin.init();
});
