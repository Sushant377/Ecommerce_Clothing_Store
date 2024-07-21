<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'TH_Advancde_Product_Search_Options' ) ):

	class TH_Advancde_Product_Search_Options {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
        /**
		 * Constructor
		 */
		public function __construct(){
           add_action( 'init', array( $this,'thaps_option_settings'), 2 );
		}

		public function post_type_option(){
          
                    if(class_exists( 'WooCommerce' )){    

                            $pst_ary =     array(

									'post_srch'   => esc_html__( 'Post', 'th-advance-product-search' ),
									'product_srch' => esc_html__( 'Product', 'th-advance-product-search' ),
									'page_srch'  => esc_html__( 'Page', 'th-advance-product-search' )
								);

                        }else{
                              

                              $pst_ary =     array(

									'post_srch'   => esc_html__( 'Post', 'th-advance-product-search' ),
									'page_srch'  => esc_html__( 'Page', 'th-advance-product-search' )
								);

                        }


                           return $pst_ary;


		}

		public function post_type_option_default(){
                       
            if(class_exists( 'WooCommerce' )){

                        $option_default = 'product_srch';

                      }else{

                        $option_default = 'post_srch';

                      } 

                      return $option_default;


		}

          
		public function thaps_option_settings(){

            th_advance_product_search()->add_setting(
			'integration', esc_html__( 'Integration', 'th-advance-product-search' ), apply_filters(
			'thaps_integration_settings_section', array(
				array(
					'title'  => esc_html__( 'How to add search bar in your theme?', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_integration_setting_fields', array(
							array(
								'id'      => 'how-to-integrate',
								'type'    => 'html',
								'title'   => esc_html__( 'How To Add', 'th-advance-product-search' )
							)
						)
					)
				 )
			  )
		    ), apply_filters( 'thaps_integration_settings_default_active', true )
		  );

          th_advance_product_search()->add_setting(
			'search-bar', esc_html__( 'Basic Setting', 'th-advance-product-search' ), apply_filters(
			'thaps_search_bar_settings_section', array(
				array(
					'title'  => esc_html__( 'Basic', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_search_bar_setting_fields', array(
							array(
								'id'      => 'set_autocomplete_length',
								'type'    => 'number',
								'title'   => esc_html__( 'Minimum Character', 'th-advance-product-search' ),
								
								'desc'    => esc_html__( 'Min characters to show autocomplete, Search start showing the results after the minimum character value you set here', 'th-advance-product-search' ),
								'default' => 1,
								'min'     => 1,
								'max'     => 10
							),
							array(
								'id'      => 'set_form_width',
								'type'    => 'number',
								'title'   => esc_html__( 'Max Width', 'th-advance-product-search' ),
								
								'desc'    => esc_html__( 'It\'s a search bar width. Leave field empty to set 100% width.', 'th-advance-product-search' ),
								'default' => 550,
								'min'     => 1,
								'max'     => 2400,
								'suffix'  => 'px'
							),	
							array(
								'id'      => 'show_submit',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Submit Button', 'th-advance-product-search' ),
								'desc'    => esc_html__( 'Uncheck to disable submit button and to enable search icon', 'th-advance-product-search' ),
								'default' => true
							),

							array(
								'id'      => 'level_submit',
								'type'    => 'text',
								'title'   => esc_html__( 'Submit Button Lebel', 'th-advance-product-search' ),
								'default' => ''
								
							),
							array(
								'id'      => 'placeholder_text',
								'type'    => 'text',
								'title'   => esc_html__( 'Placeholder Text', 'th-advance-product-search' ),
								'default' => esc_html__('Search...','th-advance-product-search')
								
							)
						)
					)
				 ),
				array(
					'title'  => esc_html__( 'Loader', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_search_bar_setting_fields', array(
							array(
								'id'      => 'show_loader',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Loader', 'th-advance-product-search' ),
								'desc'    => esc_html__( 'Check to disable loader', 'th-advance-product-search' ),
								'default' => false
							    )
						
						)
					)
				 )

			   )
		     )
		   );
          th_advance_product_search()->add_setting(
			'autosetting', esc_html__( 'Advance Setting', 'th-advance-product-search' ), apply_filters(
			'thaps_autosetting_section', array(
				array(
					'title'  => esc_html__( 'Search Autocomplete Settings', 'th-advance-product-search' ),
	
					'fields' => apply_filters(
						'thaps_autosetting_fields', array(
							array(
								'id'      => 'select_srch_type',
								'type'    => 'select',
								'title'   => esc_html__( 'Select Search Type', 'th-advance-product-search' ),
								'default' => $this->post_type_option_default(),
								'options' => $this->post_type_option(),
								'desc'    => esc_html__( 'This setting define what you want to search, For example if you select "Product" then search will display olny products in search result.', 'th-advance-product-search' )
								
							),
							array(
								'id'      => 'result_length',
								'type'    => 'number',
								'title'   => esc_html__( 'Limit', 'th-advance-product-search' ),
								
								'desc'    => esc_html__( 'Show Search Result', 'th-advance-product-search' ),
								'default' => 5,
								'min'     => 1,
								'max'     => 100,
							),
							array(
								'id'      => 'no_reult_label',
								'type'    => 'text',
								'title'   => esc_html__( 'No Result Label', 'th-advance-product-search' ),
								'desc'    => esc_html__( 'This text will display at the search result dropdown.', 'th-advance-product-search' ),
								'default' => esc_html__( 'No Result Found', 'th-advance-product-search' )
								
							),
							array(
								'id'      => 'more_reult_label',
								'type'    => 'text',
								'title'   => esc_html__( 'More Result Label', 'th-advance-product-search' ),
								'desc'    => esc_html__( 'This text will display at the search result dropdown.', 'th-advance-product-search' ),
								'default' => esc_html__( 'See More Product..', 'th-advance-product-search' )
								
							),
						  array(
								'id'      => 'enable_group_heading',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Group Heading', 'th-advance-product-search' ),

								'desc'    => esc_html__( 'It\'s a main heading, Display in the search result dropdown.', 'th-advance-product-search' ),
								'default' => true
							    ),	
						   
						   array(
								'id'      => 'desc_excpt_length',
								'type'    => 'number',
								'title'   => esc_html__( 'Description Length', 'th-advance-product-search' ),
								
								'desc'    => esc_html__( 'This option limit searched item description length. Count value in words.', 'th-advance-product-search' ),
								'default' => 60,
								'min'     => 1,
								'max'     => 500
							)
							
						)
					)
				 ),
                  array(
					'title'  => esc_html__( 'Search Category', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_cat_setting_fields', array(
							 array(
								'id'      => 'show_category_in',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Show Category', 'th-advance-product-search' ),
								'desc'    => esc_html__( 'Check to display categories in the search result dropdown.', 'th-advance-product-search' ),
								'default' => false
							    ),
								array(
								'id'      => 'enable_cat_image',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Category Image', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => true
							    )
							
							
							
						)
					)
				 ),

				array(
					'title'  => esc_html__( 'Product', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_product_setting_fields', array(
								array(
								'id'      => 'enable_product_image',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Product Image', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => true
							    ),
							array(
								'id'      => 'enable_product_price',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Product price', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => true
							    ),
							array(
								'id'      => 'enable_product_desc',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Product Description', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => false
							    ),
							array(
								'id'      => 'enable_product_sku',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Product SKU', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => false
							    ),
							array(
								'id'      => 'exclude_product_sku',
								'type'    => 'text',
								'title'   => esc_html__( 'Exclude Product', 'th-advance-product-search' ),
								'desc'    => esc_html__( 'Exclude Product by SKU ID seperated by " , "', 'th-advance-product-search' ),
								'default' =>  false
								
							)
							
						)
					)
				 ),
				 array(
					'title'  => esc_html__( 'Post', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_post_setting_fields', array(
								array(
								'id'      => 'enable_post_image',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Post Image', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => true
							    ),
							
							array(
								'id'      => 'enable_post_desc',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Post Description', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => false
							    ),
							
							
						)
					)
				 ),
				 array(
					'title'  => esc_html__( 'Pages', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_pages_setting_fields', array(
								array(
								'id'      => 'enable_page_image',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Page Image', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => true
							    ),
							
							array(
								'id'      => 'enable_page_desc',
								'type'    => 'checkbox',
								'title'   => esc_html__( 'Enable Page Description', 'th-advance-product-search' ),
								'desc'    => '',
								'default' => false
							    ),
							
							
						)
					)
				 )
			  )
		    )
		  );

		 th_advance_product_search()->add_setting(
					'style', esc_html__( 'Style', 'th-advance-product-search' ), apply_filters(
					'thaps_style_settings_section', array(
						array(
							'title'  => esc_html__( 'Search Bar', 'th-advance-product-search' ),
							'fields' => apply_filters(
								'thaps_style_settings_fields', array(
									array(
										'id'      => 'bar_bg_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Bar Background Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'bar_brdr_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Border Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'bar_text_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Placeholder Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'icon_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Icon Color', 'th-advance-product-search' ),
										
										'alpha'   => true,
									),
									array(
										'id'      => 'bar_button_bg_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Submit Button BG Color ', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'bar_button_txt_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Submit Button Text Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'bar_button_hvr_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Submit Button BG Hover Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'bar_button_txt_hvr_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Submit Button Text Hover Color', 'th-advance-product-search' ),
										'alpha'   => true
									)
								)
							)
						 ),
						array(
							'title'  => esc_html__( 'Suggestion Box', 'th-advance-product-search' ),
							'fields' => apply_filters(
								'thaps_style_settings_fields', array(
									array(
										'id'      => 'sus_bg_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Background Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'sus_hglt_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Highlight Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'sus_slect_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Selected Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'sus_brdr_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Border Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'sus_grphd_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Group Title Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),
									array(
										'id'      => 'sus_title_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Title Color', 'th-advance-product-search' ),
										'alpha'   => true,
									),

									array(
										'id'      => 'sus_text_clr',
										'type'    => 'color',
										'title'   => esc_html__( 'Text Color', 'th-advance-product-search' ),
										'alpha'   => true
									)
									
								)
							)
						 )
					  )
				)
			);

		 th_advance_product_search()->add_setting(
			'analytics', esc_html__( 'Search Analytics', 'th-advance-product-search' ), apply_filters(
			'thaps_analytics_settings_section', array(
				array(
					'title'  => esc_html__( 'ADD SEARCH ANALYTICS IN YOUR THEME', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_analytics_setting_fields', array(
							array(
								'id'      => 'how-to-integrate-analytics',
								'type'    => 'analytics-html',
								'title'   => esc_html__( 'How To Add', 'th-advance-product-search' )
							)	
						)
					)
				 )
			  )
		    )
		  );
		 th_advance_product_search()->add_setting(
			'premium', esc_html__( 'Premium', 'th-advance-product-search' ), apply_filters(
			'thaps_premium_settings_section', array(
				array(
					'title'  => esc_html__( 'Upgrade to Pro ?', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_premium_setting_fields', array(
							array(
								'id'      => 'premium',
								'type'    => 'premium-html',
								'title'   => esc_html__( '', 'th-advance-product-search' )
							)	
						)
					)
				 )
			  )
		    )
		  );
		  th_advance_product_search()->add_setting(
			'thaps_usefull_plugin', esc_html__( 'Themehunk Useful Plugins', 'th-advance-product-search' ), apply_filters(
			'thaps_usefull_plugin_settings_section', array(
				array(
					'title'  => esc_html__( 'Themehunk Useful Plugins', 'th-advance-product-search' ),
					'fields' => apply_filters(
						'thaps_usefull_plugin_setting_fields', array(
							array(
								'id'         => 'thaps-th-Variation-Swatches',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/th-variation-swatches/assets/icon-128x128.gif'),
								'plugin_title'  => esc_html__( 'TH Variation Swatches', 'th-advance-product-search' ),
								'plugin_link'  => esc_url('https://themehunk.com/th-variation-swatches/'),	
								
							),
							array(
								'id'         => 'thaps-lead-form-builder',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/lead-form-builder/assets/icon-128x128.png'),
								'plugin_title'  => esc_html__( 'Lead Form Builder', 'th-advance-product-search' ),
								'plugin_link'  => esc_url('https://themehunk.com/product/lead-form-builder-pro/'),	
								
							),
							array(
								'id'         => 'thaps-wp-popup-builder',
								'title'      =>'',
                                'type'       => 'usefullplugin',
                                'desc'       => '',
								'usefull'          => true,
								'plugin_image' => esc_url('https://ps.w.org/wp-popup-builder/assets/icon-128x128.png'),
								'plugin_title'  => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'th-advance-product-search' ),
								'plugin_link'  => esc_url('https://themehunk.com/product/wp-popup-builder/'),	
								
							),
						)
					)
				 )
			  )
		    )
		  );

		}

	}
endif;	
TH_Advancde_Product_Search_Options::get_instance();