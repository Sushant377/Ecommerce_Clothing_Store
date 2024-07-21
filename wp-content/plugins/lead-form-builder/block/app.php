<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Exit if accessed directly.
if ( ! class_exists( 'Lead_Form_Builder_Blocks' ) ) {
			class Lead_Form_Builder_Blocks {


				function __construct()
				{

					add_action( 'wp_ajax_lead_form_builderr_data', array( $this, 'lead_form_builder') );

				}

				public function lead_form_builder() {

					    // Check the nonce
					if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'lfb_nonce_action' ) ) {
							wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
							wp_die();
					}

					
					if(isset( $_POST['data'] ) && current_user_can('manage_options') && current_user_can('edit_posts')){


						$postData = json_decode( wp_unslash( $_POST['data'] ), true );

						if ( ! is_array( $postData ) ) {
							wp_die( 'Invalid data' );
						}
						$lfb = New LFB_SAVE_DB;

					
							// Sanitize and validate input
							$formid = isset( $postData['data'] ) ? absint( $postData['data'] ) : 0;

						    // Use the sanitized data in the shortcode
						$rander_form = do_shortcode( '[lead-form form-id=' . esc_attr($formid) . ']' );

						// Retrieve the lead form and check if rendering was successful
						$fid_new = $lfb->get_single_lead_form( $formid );

					if($rander_form==='' && $fid_new){
						$rander_form = do_shortcode( '[lead-form form-id=' . esc_attr($formid) . ']' );
						$formid = $fid_new;
					}


					wp_send_json_success( array(
						'fid' => $formid,
						'lfb_form' => $lfb->lfb_get_all_form_title(),
						'lfb_rander' => $rander_form
					));
					} else{
					wp_send_json_success( array('status'=>false) );

					}
				}
		}
}


function lead_form_builder_block_init() {
	New Lead_Form_Builder_Blocks;
    // Register the block script
    wp_register_script(
        'create-block-lead-form-builder-editor-script',
        plugins_url( 'build/index.js', __FILE__ ), // Adjust the path to your built JavaScript file
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-api-fetch' ), // Ensure the necessary dependencies are included
        filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' )
    );

    // Localize the script with the nonce and AJAX URL
    wp_localize_script(
        'create-block-lead-form-builder-editor-script',
        'lfbScriptData',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'security'    => wp_create_nonce( 'lfb_nonce_action' ),
        )
    );

	  // Register the block type and associate the script
	  register_block_type( __DIR__ . '/build', array(
        'editor_script' => 'create-block-lead-form-builder-editor-script',
    ) );

}
add_action( 'init', 'lead_form_builder_block_init' );


