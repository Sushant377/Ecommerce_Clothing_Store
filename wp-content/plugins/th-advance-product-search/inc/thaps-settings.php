<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'TH_Advancde_Product_Search_Set' ) ):

	class TH_Advancde_Product_Search_Set {

		private $setting_name = 'th_advance_product_search';
		private $setting_reset_name = 'reset';
		private $theme_feature_name = 'th-advance-product-search';
		private $slug;
		private $plugin_class;
		private $defaults = array();
		private $fields = array();
		private $reserved_key = '';
		private $reserved_fields = array();
		private $settings_name;
	
		public function __construct() {
			$this->settings_name = apply_filters('thaps_settings_name', $this->setting_name);
             $this->fields          = apply_filters( 'thaps_settings', $this->fields );
             $this->reserved_key    = sprintf( '%s_reserved', $this->settings_name );
		     $this->reserved_fields = apply_filters( 'thaps_reserved_fields', array() );
 
             add_action( 'admin_menu', array( $this, 'add_menu' ) );
             add_action( 'init', array( $this, 'set_defaults' ), 8 );
             add_action( 'admin_init', array( $this, 'settings_init' ), 90 );
             add_action( 'admin_enqueue_scripts', array( $this, 'script_enqueue' ) );

             add_action('wp_ajax_thaps_form_setting', array($this, 'thaps_form_setting'));
			 add_action( 'wp_ajax_nopriv_thaps_form_setting', array($this, 'thaps_form_setting'));

			 add_action('wp_ajax_thaps_reset_settings', array($this, 'thaps_reset_settings'));
			 add_action( 'wp_ajax_nopriv_thaps_reset_settings', array($this, 'thaps_reset_settings'));

            }
        

        public function add_menu(){

						$page_title = esc_html__( 'Advance Search', 'th-advance-product-search' );

						add_submenu_page( 'themehunk-plugins', $page_title, $page_title, 'manage_options', 'th-advance-product-search', array($this, 'settings_form'),11 );


		 }

		public function form_add_class(){
              $classes='';

			  if($this->get_option( 'show_submit' ) == 1){

			  $classes .= ' show-submit ';

			  }

			  $classes .= $this->get_option( 'select_srch_type' );

			  return $classes;
				
		}

		public function settings_form() {
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'You do not have sufficient permissions to access this page.','th-advance-product-search' ) );
			}
		
			?>
			<div id="thaps" class="settings-wrap">
				
				<form method="post" action="" enctype="multipart/form-data" class="thaps-setting-form  <?php echo esc_attr($this->form_add_class());?>">
                 <input type="hidden" name="action" value="thaps_form_setting">
					<?php $this->options_tabs(); ?>
                     <div class="setting-wrap">
					 <div id="settings-tabs">
						<?php foreach ( $this->fields as $tab ):

							if ( ! isset( $tab['active'] ) ) {
								$tab['active'] = false;
							}
							$is_active = ( $this->get_last_active_tab() == $tab['id'] );

							?>

							<div id="<?php echo esc_attr($tab['id']); ?>"
								 class="settings-tab thaps-setting-tab"
								 style="<?php echo ! esc_attr($is_active) ? 'display: none' : '' ?>">
								 
								<?php foreach ( $tab['sections'] as $section ):

					        	$this->do_settings_sections( $tab['id'] . $section['id'] );

								endforeach; ?>
							</div>

						<?php endforeach; ?>
					</div>
					<?php
					$this->last_tab_input();
					
					?>
					<p class="submit thaps-button-wrapper">
						
						 <a class="reset" href="#"><?php esc_html_e( 'Reset all', 'th-advance-product-search' ); ?>
						</a>
						 <button  disabled id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes', 'th-advance-product-search' ) ?>"><span class="dashicons dashicons-image-rotate spin"></span><span><?php esc_html_e( 'Save Changes', 'th-advance-product-search' ) ?></span>
						 </button>
					</p> 

            </div>
            <div class="thaps-notes-wrap">

            	<div class="thaps-notes-row thaps-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Documentation', 'th-advance-product-search' ) ?></h4><p><?php esc_html_e( 'Want to know how this plugin works. Read our Documentation.', 'th-advance-product-search' ) ?></p><a target="_blank" href="<?php echo esc_url('https://themehunk.com/docs/th-advance-product-search/'); ?>"><?php esc_html_e( 'Read Now', 'th-advance-product-search' ) ?></a></div>

            	<div class="thaps-notes-row thaps-wrap-pro"><h4 class="wrp-title"><?php esc_html_e( 'Unlock TH Advance Product Search Pro', 'th-advance-product-search' ) ?></h4><img src='<?php echo esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'th-advance-search-pro-banner.png') ?>' alt="th-advance-search"><a target="_blank" href="<?php echo esc_url('https://themehunk.com/advance-product-search/'); ?>"><?php esc_html_e( 'Upgrade Now', 'th-advance-product-search' ) ?></a>

            	</div>

            	<div class="thaps-notes-row thaps-wrap-img">
	               	<a target="_blank" href="<?php echo esc_url('https://themehunk.com/th-shop-mania/'); ?>"><img src='<?php echo esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'th-shop-mania-ad.png') ?>' alt="th-shop-mania">
	               	</a>
            	</div>
               </div>

               
            
				</form>
			</div>
			<?php
			
		}

	    public function thaps_form_setting(){  

	    	  if ( ! current_user_can( 'administrator' ) ) {

		            wp_die( - 1, 403 );
		            
		      } 

              check_ajax_referer( 'thaps_plugin_nonce','_wpnonce');

	                if( isset($_POST['th_advance_product_search']) ){
	             	       
	                      $sanitize_data_array = $this->thaps_form_sanitize($_POST['th_advance_product_search']);

	                      update_option('th_advance_product_search',$sanitize_data_array);         
		            }
		            
		            die();  
	    }
        
	    public function thaps_form_sanitize( $input ){
				$new_input = array();
				foreach ( $input as $key => $val ){
					$new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) :'';
		   }
		   return $new_input;

	    }
		public function options_tabs() {
			?>

			<div class="nav-tab-wrapper wp-clearfix">
				<div class="top-wrap"><div id="logo"><img src='<?php echo esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'th-logo.png') ?>' alt="th-logo"/></div>
				  <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
			     </div>
				<?php foreach ( $this->fields as $tabs ): ?>
					<a data-target="<?php echo esc_attr($tabs['id']); ?>"  class="thaps-setting-nav-tab nav-tab <?php echo esc_html($this->get_options_tab_css_classes( $tabs )); ?> " href="#<?php echo esc_attr($tabs['id']); ?>"><span class="dashicons <?php echo $this->icon_list($tabs['id']); ?>"></span><?php echo esc_html($tabs['title']); ?></a>
				<?php endforeach; ?>
			</div>
			<?php
		}
		function icon_list($id ='dashicons-menu'){
			$icon = array(
				'integration'=>'dashicons-admin-appearance',
				'search-bar' => 'dashicons-admin-generic',
				'autosetting'=>'dashicons-hammer',
				'style'=>'dashicons-color-picker',
				'analytics'=>'dashicons-analytics',
				'premium'=>'dashicons-unlock',
				'thaps_usefull_plugin'=>'dashicons-admin-plugins',
		);

			return $icon[$id];

		}

		private function get_last_active_tab() {
			$last_option_tab = '';
			$last_tab        = $last_option_tab;

			if ( isset( $_GET['tab'] ) && ! empty( $_GET['tab'] ) ) {
				$last_tab = trim( sanitize_key($_GET['tab']) );
			}

			if ( $last_option_tab ) {
				$last_tab = $last_option_tab;
			}

			$default_tab = '';
			foreach ( $this->fields as $tabs ) {
				if ( isset( $tabs['active'] ) && $tabs['active'] ) {
					$default_tab = sanitize_key($tabs['id']);
					break;
				}
			}

			return ! empty( $last_tab ) ? esc_html( $last_tab ) : esc_html( $default_tab );

		}

		private function do_settings_sections( $page ) {
			global $wp_settings_sections, $wp_settings_fields;

			if ( ! isset( $wp_settings_sections[ $page ] ) ) {
				return;
			}

			foreach ( (array) $wp_settings_sections[ $page ] as $section ) {

				if ( $section['title'] ) {

					echo "<h2 class=".esc_attr($section['id']).">".esc_html($section['title'])."</h2>";

				}
                
				if ( $section['callback'] ) {
					call_user_func( $section['callback'], $section );
				}

				if ( ! isset( $wp_settings_fields ) || ! isset( $wp_settings_fields[ $page ] ) || ! isset( $wp_settings_fields[ $page ][ $section['id'] ] ) ) {
					continue;
				}

				echo '<table class="form-table" id='.esc_attr($section['id']).'>';
				$this->do_settings_fields( $page, $section['id'] );
				echo '</table>';
			}
		}

		private function last_tab_input() {
			printf( '<input type="hidden" id="_last_active_tab" name="%s[_last_active_tab]" value="%s">', $this->settings_name, $this->get_last_active_tab() );
		}

		private function get_options_tab_css_classes( $tabs ) {
			$classes = array();

			$classes[] = ( $this->get_last_active_tab() == $tabs['id'] ) ? 'nav-tab-active' : '';

			return implode( ' ', array_unique( apply_filters( 'get_options_tab_css_classes', $classes ) ) );
		}

		private function do_settings_fields( $page, $section ) {
			global $wp_settings_fields;

			if ( ! isset( $wp_settings_fields[ $page ][ $section ] ) ) {
				return;
			}

			foreach ( (array) $wp_settings_fields[ $page ][ $section ] as $field ) {
				
				$custom_attributes = $this->array2html_attr( isset( $field['args']['attributes'] ) ? $field['args']['attributes'] : array() );

				$wrapper_id = ! empty( $field['args']['id'] ) ? esc_attr( $field['args']['id'] ) . '-wrapper' : '';
				$dependency = ! empty( $field['args']['require'] ) ? $this->build_dependency( $field['args']['require'] ) : '';

				printf( '<tr id="%s" %s %s>', $wrapper_id, $custom_attributes, $dependency );

				 if ( isset( $field['args']['usefull'] ) ) {
					echo '<td colspan="2" style="padding: 0; margin: 0">';
					$this->usefullplugin_field_callback( $field['args'] );
					echo '</td>';
			  	}else{
					echo '<th scope="row" class="thaps-settings-label">';
					if ( ! empty( $field['args']['label_for'] ) ) {
						echo '<label for="' . esc_attr( $field['args']['label_for'] ) . '">' . esc_html($field['title']). '</label>';
					} else {
						echo esc_html($field['title']);
					}

					echo '</th>';
					echo '<td class="thaps-settings-field-content">';
					call_user_func( $field['callback'], $field['args'] );
					echo '</td>';
				}
				
				   echo '</tr>';
			}
		}

        public function array2html_attr( $attributes, $do_not_add = array() ) {

			$attributes = wp_parse_args( $attributes, array() );

			if ( ! empty( $do_not_add ) and is_array( $do_not_add ) ) {
				foreach ( $do_not_add as $att_name ) {
					unset( $attributes[ $att_name ] );
				}
			}


			$attributes_array = array();

			foreach ( $attributes as $key => $value ) {

				if ( is_bool( $attributes[ $key ] ) and $attributes[ $key ] === true ) {
					return $attributes[ $key ] ? $key : '';
				} elseif ( is_bool( $attributes[ $key ] ) and $attributes[ $key ] === false ) {
					$attributes_array[] = '';
				} else {
					$attributes_array[] = $key . '="' . esc_attr($value) . '"';
				}
			}

			return implode( ' ', $attributes_array );
		}

		 private function build_dependency( $require_array ) {
			$b_array = array();
			foreach ( $require_array as $k => $v ) {
				$b_array[ '#' . $k . '-field' ] = $v;
			}

			return 'data-thapsdepends="[' . esc_attr( wp_json_encode( $b_array ) ) . ']"';
		}

		 public function make_implode_html_attributes( $attributes, $except = array( 'type', 'id', 'name', 'value' ) ) {
			$attrs = array();
			foreach ( $attributes as $name => $value ) {
				if ( in_array( $name, $except, true ) ) {
					continue;
				}
				$attrs[] = esc_attr( $name ) . '="' . esc_attr( $value ) . '"';
			}

			return implode( ' ', array_unique( $attrs ) );
		}

		/***************/
		// Field call back function
		/***************/

		public function field_callback( $field ) {

			switch ( $field['type'] ) {
				
				case 'checkbox':
					$this->checkbox_field_callback( $field );
					break;

				case 'select':
					$this->select_field_callback( $field );
					break;

				case 'number':
					$this->number_field_callback( $field );
					break;

				case 'color':
					$this->color_field_callback( $field );
					break;

				case 'html':
					$this->html_field_callback( $field );
					break;

			    case 'analytics-html':
					$this->analytics_html_field_callback( $field );
					break;

				case 'premium-html':
					$this->premium_html_field_callback( $field );
					break;

				case 'usefullplugin':
					$this->usefullplugin_field_callback( $field );
					break;		 			

				default:
					$this->text_field_callback( $field );
					break;
			}
			do_action( 'thaps_settings_field_callback', $field );
		}

     
      public function checkbox_field_callback( $args ) {
               
			$value = (bool)( $this->get_option( $args['id'] ) );

			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';?>

            <fieldset>
            	<label>
            		<input <?php echo esc_attr($attrs); ?> type="checkbox" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]" value="1" <?php echo esc_attr(checked( $value, true, false ));?>> <?php if ( ! empty( $args['desc'] ) ) {  echo esc_html($args['desc']); } ?>
            	</label>     
            </fieldset>


        <?php 
			
		}
			
		public function select_field_callback( $args ) {

			$options = apply_filters( "thaps_settings_{$args[ 'id' ]}_select_options", $args['options'] );

			$valuee   = esc_attr( $this->get_option( $args['id'] ) );

		
			$size    = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';
			?>

			<select <?php echo esc_attr($attrs); ?> class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]">

				<?php foreach($options as $key => $value){ ?>

                <option <?php echo esc_attr(selected( $key, $valuee, false )) ;?> value="<?php echo esc_attr($key);?>">
                	
                	<?php echo esc_html($value);?> 	

                </option> 

               <?php } ?>

			</select>

			<?php if ( ! empty( $args['desc'] ) ) { ?>
            <p class="description"><?php echo esc_html($args['desc']);?></p>
		    <?php } }


		public function get_field_description( $args ) {

			$desc = '';

			if ( ! empty( $args['desc'] ) ) {
				$desc .= sprintf( '<p class="description">%s</p>', $args['desc'] );
			} else {
				$desc .= '';
			}

			return ( ( $args['type'] === 'checkbox' ) ) ? '' : $desc;
		}
		
		public function text_field_callback( $args ) {
			$value = esc_attr( $this->get_option( $args['id'] ) );
			$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';?>
           <input type="text" class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>"/>

          <?php if ( ! empty( $args['desc'] ) ) { ?>
           <p class="description"><?php echo esc_html($args['desc']);?></p>
	      <?php 
	           }
				
		}
		

		public function html_field_callback( $args ) {
         if($args[ 'id' ]=='how-to-integrate'):

			?>
			
		   <h4><?php _e( 'Easy 4 ways to integrate and display search bar your theme', 'th-advance-product-search' ); ?>: </h4>
			<ol>
				<li><?php printf( __( 'Using Shortcode - <br /> <br />%s    ', 'th-advance-product-search' ), '<ul><li>(a) <code>[th-aps]</code> To display default search bar. <br /> <br /> <img src="'.esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'search-1.png').'"> </li>  <li>(b) <code>[th-aps layout="bar_style"]</code> To display search bar with icon.  <br /> <br /> <img src="'.esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'search-2.png').'"> </li>   <li>(c) <code>[th-aps layout="icon_style"]</code> To display search icon only, Search bar will display on click. <br /> <br /> <img src="'.esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'search-3.png').'"></li> <li>(d) <code>[th-aps layout="flexible-style"]</code> To display search bar in PC and search icon in mobile view. </li></ul>' ); ?></li>
                <br /> <br />
				<li><?php printf( __( 'Using Widgets - Go to the Appearance > %s and choose "TH Advance Search Widget" <br /> <br /> <img src="'.esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'search-5.png').'">', 'th-advance-product-search' ), '<a href="' . admin_url( 'widgets.php' ) . '" target="_blank">' . __( 'Widgets Screen', 'th-advance-product-search' ) . '</a>' ); ?>
                <br /> <br />
				<li><?php printf( __( 'Using php - %s', 'th-advance-product-search' ), '<code>&lt;?php echo do_shortcode(\'[th-aps]\'); ?&gt;</code> Add this php code at the desired location in any php file. Search display style depends on shortcode you are using in the php code.' ); ?></li>
                <br /> <br />
				<li><?php printf( __( 'Display search bar as a menu. Go to the Appearance > %s . Check "TH Advance Search Bar" and click "Add to menu" button. <br /> <br /> <img src="'.esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'search-6.png').' " style="border: 1px solid #eee;">', 'th-advance-product-search' ), '<a href="' . admin_url( 'nav-menus.php' ) . '" target="_blank">' . __( 'Menu Screen', 'th-advance-product-search' ) . '</a>' ); ?></li>
			</ol>

		<?php 		
			endif;
		}

        public function analytics_html_field_callback($args){

            if($args[ 'id' ]=='how-to-integrate-analytics'):

			?>
             <h4><?php _e( 'Enable Site Search module Paste the following code into "functions.php" in your child theme.', 'th-advance-product-search' ); ?>: </h4>
			<ul>
				
				
				<li><?php printf( __( '%s', 'th-advance-product-search' ), '<code> apply_filters("thaps_enable_ga_site_search_module", "__return_true" ); </code>' ); ?></li>

				
			</ul>

			<h4><?php _e( 'To disable integrarion with Google Analytics paste following code "functions.php" your child theme.', 'th-advance-product-search' ); ?>: </h4>
           <ul>
				
				
				<li><?php printf( __( '%s', 'th-advance-product-search' ), '<code> thaps_google_analytics_events", "__return_false" ); </code>' ); ?></li>
               </ul>
           </br>
               <ul>

				<li><img src="<?php echo esc_url(TH_ADVANCE_PRODUCT_SEARCH_IMAGES_URI.'google-analtyitcs-result.png'); ?>"></li>
			</ul>
             <p><a target="_blank" href="<?php echo esc_url('https://themehunk.com/docs/th-advance-product-search/#google-analytics');?>" class="explore-google-analytics"><?php _e('Explore Doc','th-advance-product-search');?></a></p>
				
			</ul>

        <?php endif; }

         public function premium_html_field_callback($args){

            if($args[ 'id' ]=='premium'):

			?>
             <div class="th-upgrade-pro">
             	<h4><?php esc_html_e('Upgrade to Premium Version Of Advance WordPress Search','th-advance-product-search'); ?></h4>
             	<a href="<?php echo esc_url('https://themehunk.com/plugins/'); ?>" class="button-upgrade"><i class="dashicons dashicons-lock"></i><?php esc_html_e('Upgrade Pro','th-advance-product-search'); ?></a>
             </div>
			

			<ul class="th-search-images">
				<li> <img src="<?php echo TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'images/search-voice.png'; ?>"> </li>
				<li> <img src="<?php echo TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'images/search-loader.png'; ?>"> </li>
				<li> <img src="<?php echo TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'images/search-autocomplete.png'; ?>"> </li>
				<li> <img src="<?php echo TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'images/search-as.png'; ?>"> </li>
				<li> <img src="<?php echo TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'images/search-style.png'; ?>"> </li>

				
			</ul>

			<div class="th-upgrade-pro">
             	<h4><?php esc_html_e('Upgrade to Premium Version Of Advance WordPress Search','th-advance-product-search'); ?></h4>
             	<a href="<?php echo esc_url('https://themehunk.com/plugins/'); ?>" class="button-upgrade"><i class="dashicons dashicons-lock"></i><?php esc_html_e('Upgrade Pro','th-advance-product-search'); ?></a>
             </div>

        <?php endif; }



		public function color_field_callback( $args ){

			$value = esc_attr( $this->get_option( $args['id'] ) );
			
			$alpha = isset( $args['alpha'] ) && $args['alpha'] === true ? $args['alpha'] : false;?>

			<input type="text" data-alpha-enabled="<?php echo esc_attr($alpha); ?>" class="thaps-color-picker" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>"  data-default-color="<?php echo esc_attr($value); ?>" />
          
          <?php if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>      

		<?php
	        }

		}


		public function number_field_callback( $args ) {

			$value = esc_attr( $this->get_option( $args['id'] ) );
			$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'small';

			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';
            ?>

			<input type="number"  <?php echo esc_attr($attrs); ?> class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>"  min="<?php echo esc_attr($args['min']); ?>" max="<?php echo esc_attr($args['max']); ?>" step="<?php  if ( ! empty($args['step']) ) { 
				echo esc_attr($args['step']); } ?>" />

              <?php if(isset( $args['suffix'] ) && ! is_null( $args['suffix'] ) ){ ?>

			<span><?php echo esc_attr($args['suffix']); ?></span>
         
             <?php

               }

           if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>    

		<?php 	

	         } 
		}

		public function usefullplugin_field_callback( $args ) {

			$is_html = isset( $args['html'] );

			if ( $is_html ) {

				$html = $args['html'];

			  } else {

				$plugin_image  = $args['plugin_image'];
				$plugin_title  = $args['plugin_title'];
				$plugin_link   = $args['plugin_link'];

				
				
			}

			?>

			<div class="thaps-use-plugin"><img src="<?php echo esc_url($plugin_image);?>" /><a target="_blank" href="<?php echo esc_url($plugin_link);?>"><?php echo esc_html($plugin_title);?></a>
			</div>

		<?php }

	//*********************************/	
    // add ,delete ,get , reset, option
    /**********************************/

    public function set_defaults() {
			foreach ( $this->fields as $tab_key => $tab ) {
				$tab = apply_filters( 'thaps_settings_tab', $tab );

				foreach ( $tab['sections'] as $section_key => $section ) {

					$section = apply_filters( 'thaps_settings_section', $section, $tab );

					$section['id'] = ! isset( $section['id'] ) ? $tab['id'] . '-section' : $section['id'];

					$section['fields'] = apply_filters( 'thaps_settings_fields', $section['fields'], $section, $tab );

					foreach ( $section['fields'] as $field ) {
						if ( isset( $field['pro'] ) ) {
							continue;
						}
						$field['default'] = isset( $field['default'] ) ? $field['default'] : null;
						$this->set_default( $field['id'], $field['type'], $field['default'] );
					}
				}
			}
		}


		public function sanitize_callback( $options ) {

			foreach ( $this->get_defaults() as $opt ) {
				if ( $opt['type'] === 'checkbox' && ! isset( $options[ $opt['id'] ] ) ){
					$options[ $opt['id'] ] = 0;
				}
			}

			return $options;
		}

		public function settings_init() {

		  register_setting( $this->settings_name, $this->settings_name, array( $this, 'sanitize_callback' ) );

			foreach ( $this->fields as $tab_key => $tab ) {

				$tab = apply_filters( 'thaps_settings_tab', $tab );

				foreach ( $tab['sections'] as $section_key => $section ) {

					$section = apply_filters( 'thaps_settings_section', $section, $tab );

					$section['id'] = ! isset( $section['id'] ) ? $tab['id'] . '-section-' . $section_key : $section['id'];

					// Adding Settings section id
					$this->fields[ $tab_key ]['sections'][ $section_key ]['id'] = $section['id'];

					add_settings_section( $tab['id'] . $section['id'], $section['title'], function () use ( $section ) {
						if ( isset( $section['desc'] ) && ! empty( $section['desc'] ) ) {
							echo '<div class="inside">' . esc_html($section['desc']) . '</div>';
						}
					}, $tab['id'] . $section['id'] );

					$section['fields'] = apply_filters( 'thaps_settings_fields', $section['fields'], $section, $tab );

					foreach ( $section['fields'] as $field ) {

						$field['label_for'] = $field['id'] . '-field';
						$field['default']   = isset( $field['default'] ) ? $field['default'] : null;

						if ( $field['type'] == 'checkbox' || $field['type'] == 'radio' ) {
							unset( $field['label_for'] );
						}

						add_settings_field( $this->settings_name . '[' . $field['id'] . ']', $field['title'], array(
							$this,
							'field_callback'
						), $tab['id'] . $section['id'], $tab['id'] . $section['id'], $field );

					}
				}
			}


		}


		public function settings_url(){

			return add_query_arg( 

				array( 
				'page' => 'th-advance-product-search',
				'_wpnonce' => wp_create_nonce('_nonce'),
				 ),
				 admin_url( 'admin.php' ) );

		}
        private function set_default( $key, $type, $value ) {
		$this->defaults[ $key ] = array( 'id' => $key, 'type' => $type, 'value' => $value );
		}

		private function get_default( $key ) {
			return isset( $this->defaults[ $key ] ) ? $this->defaults[ $key ] : null;
		}

		public function get_defaults() {
			return $this->defaults;
		}


		public function thaps_reset_settings() {

			if ( ! current_user_can( 'administrator' ) ) {
  
				wp_die( - 1, 403 );
				
			} 

			check_ajax_referer('thaps_plugin_nonce','nonce');
			
			do_action( sprintf( 'delete_%s_settings', $this->settings_name ), $this );

			return delete_option( $this->settings_name );

		}

		public function get_option( $option ) {
			$default = $this->get_default( $option );
			$options = get_option( $this->settings_name );
			$is_new = ( ! is_array( $options ) && is_bool( $options ) );

			// Theme Support
			if ( current_theme_supports( $this->theme_feature_name ) ) {
				$theme_support    = get_theme_support( $this->theme_feature_name );
				$default['value'] = isset( $theme_support[0][ $option ] ) ? $theme_support[0][ $option ] : $default['value'];
			}

			$default_value = isset( $default['value'] ) ? $default['value'] : null;

			if ( ! is_null( $this->get_reserved( $option ) ) ) {
				$default_value = $this->get_reserved( $option );
			}

			if ( $is_new ) {
			
				return $default_value;
			} else {
			
				return isset( $options[ $option ] ) ? $options[ $option ] : $default_value;
			}
		}

		public function get_options(){
			return get_option( $this->settings_name );
		}

		public function get_reserved( $key = false ){

			$data = (array) get_option( $this->reserved_key );
			if ( $key ) {
				return isset( $data[ $key ] ) ? $data[ $key ] : null;
			} else {
				return $data;
			}
		}
		
        public function script_enqueue(){
			
			if (isset($_GET['page']) && $_GET['page'] == 'th-advance-product-search') {

				wp_enqueue_style( 'wp-color-picker' );
			
				wp_enqueue_style( 'th-advance-product-search-admin', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'assets/css/admin.css', array(), TH_ADVANCE_PRODUCT_SEARCH_VERSION );
				
				wp_enqueue_script( 'wp-color-picker-alpha', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'assets/js/wp-color-picker-alpha.js', array('wp-color-picker'),true);

				wp_enqueue_script( 'thaps-setting-script', TH_ADVANCE_PRODUCT_SEARCH_PLUGIN_URI. 'assets/js/thaps-setting.js', array('jquery'),true);

				wp_localize_script(
					'thaps-setting-script', 'THAPSPluginObject', array(
						'media_title'   => esc_html__( 'Choose an Image', 'th-advance-product-search' ),
						'button_title'  => esc_html__( 'Use Image', 'th-advance-product-search' ),
						'add_media'     => esc_html__( 'Add Media', 'th-advance-product-search' ),
						'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php', 'relative' ) ),
						'nonce'         => wp_create_nonce( 'thaps_plugin_nonce' ),
						'reset_text'    => esc_html__( 'Are you sure to reset current settings?', 'th-advance-product-search' ),
					)
				);
			}
		}

}

endif;