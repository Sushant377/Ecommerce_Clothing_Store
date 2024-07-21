<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Taiowc_Set' ) ):

	class Taiowc_Set {

        private $setting_name = 'taiowc';
		private $setting_reset_name = 'reset';
		private $theme_feature_name = 'taiowc';
		private $slug;
		private $plugin_class;
		private $defaults = array();
		private $fields = array();
		private $reserved_key = '';
		private $reserved_fields = array();
		private $settings_name;
		
             public function __construct() {
             $this->settings_name   = apply_filters( 'taiowc_settings_name', $this->setting_name );
             $this->fields          = apply_filters( 'taiowc_settings', $this->fields );
             $this->reserved_key    = sprintf( '%s_reserved', $this->settings_name );
		     $this->reserved_fields = apply_filters( 'taiowc_reserved_fields', array() );
 
             add_action( 'admin_menu', array( $this, 'add_menu' ) );
             add_action( 'init', array( $this, 'set_defaults' ), 8 );
             add_action( 'admin_init', array( $this, 'settings_init' ), 90 );
             add_action( 'admin_enqueue_scripts', array( $this, 'script_enqueue' ) );

             add_action('wp_ajax_taiowc_form_setting', array($this, 'taiowc_form_setting'));
			 add_action( 'wp_ajax_nopriv_taiowc_form_setting', array($this, 'taiowc_form_setting'));

            }
        

        public function add_menu(){

		$page_title = esc_html__( 'AIO Woo Cart', 'taiowc' );
		
		add_submenu_page( 'themehunk-plugins', $page_title,$page_title, 'manage_options', 'taiowc', array($this, 'settings_form'),10 );


		 }

		public function settings_form() {

			if ( ! current_user_can( 'manage_options' ) ) {

				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			if( ! class_exists( 'WooCommerce' ) ){

				   printf('<h2 class="requirement-notice">%s</h2>',__('TH All In One Woo Cart requires WooCommerce to work. Make sure that you have installed and activated WooCommerce Plugin.','taiowc' ) );

             return;

			}
		
			?>
			<div id="taiowc" class="settings-wrap">
				
				<form method="post" action="" enctype="multipart/form-data" class="taiowc-setting-form">
                 <input type="hidden" name="action" value="taiowc_form_setting">
					<?php $this->options_tabs(); ?>
                    <div class="setting-wrap">
                   <div class="setting-content"> 	
					 <div id="settings-tabs">
						<?php foreach ( $this->fields as $tab ):

							if ( ! isset( $tab['active'] ) ) {
								$tab['active'] = false;
							}
							$is_active = ( $this->get_last_active_tab() == $tab['id'] );

							?>

							<div id="<?php echo esc_attr($tab['id']); ?>"
								 class="settings-tab taiowc-setting-tab"
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
					<p class="submit taiowc-button-wrapper">
						
						<a onclick="return confirm('<?php esc_attr_e( 'Are you sure to reset current settings?', 'taiowc' ) ?>')" class="reset" href="<?php echo esc_url($this->reset_url()); ?>"><?php esc_html_e( 'Reset all', 'taiowc' ); ?>
						</a>
						 <button  disabled id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes', 'taiowc' ) ?>"><span class="dashicons dashicons-image-rotate spin"></span><span><?php esc_html_e( 'Save Changes', 'taiowc' ) ?></span>
						 </button>
					</p>
			</div> 
            </div>
            <div class="taiowc-notes-wrap">

            	<div class="taiowc-notes-row taiowc-wrap-pro"><h4 class="wrp-title"><?php esc_html_e( 'Unlock TH All In One Woo Cart Pro', 'taiowc' ) ?></h4><img src='<?php echo esc_url(TAIOWC_IMAGES_URI.'cart-pro-side-banner.png') ?>' alt="amaz-store"><a target="_blank" href="<?php echo esc_url('https://themehunk.com/th-all-in-one-woo-cart/'); ?>"><?php esc_html_e( 'Upgrade Now', 'taiowc' ) ?></a>

            	</div>
            	
            	<div class="taiowc-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Documentation', 'taiowc' ) ?></h4><p><?php esc_html_e( 'Want to know how this plugin works. Read our Documentation.', 'taiowc' ) ?></p><a target="_blank" href="<?php echo esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/');?>"><?php esc_html_e( 'Check Doc', 'taiowc' ) ?></a>
            	</div>
           
            	<div class="taiowc-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Join Group', 'taiowc' ) ?></h4><p><?php esc_html_e( 'Get connected to our Facebook. Join our User friendly community.', 'taiowc' ) ?></p><a target="_blank" href="<?php echo esc_url('https://www.facebook.com/groups/themehunk');?>"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e( 'Join Facebook Group', 'taiowc' ) ?></a>
            	</div>
            	
            	<div class="taiowc-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Contact Support', 'taiowc' ) ?></h4><p><?php esc_html_e( 'If you need any help you can contact to our support team', 'taiowc' ) ?></p><a target="_blank" href="<?php echo esc_url('https://themehunk.com/contact-us/');?>"><?php esc_html_e( 'Need Help ?', 'taiowc' ) ?></a>
            	</div>
            	
            	<div class="taiowc-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Review', 'taiowc' ) ?></h4><p><?php esc_html_e( 'Give us your valuable feedback', 'taiowc' ) ?></p><a target="_blank" href="<?php echo esc_url('https://www.trustpilot.com/review/themehunk.com');?>"><?php esc_html_e( 'Submit a review', 'taiowc' ) ?></a>
            	</div>

            	<div class="taiowc-wrap-doc taiowc-img">

            		<a target="_blank" href="<?php echo esc_url('https://themehunk.com/th-shop-mania/'); ?>"><img src='<?php echo esc_url(TAIOWC_IMAGES_URI.'th-shop-mania-ad.png') ?>' alt="th-shop-mania">
	               	</a>
            	</div>

            </div>
           
				</form>
			</div>
			<?php
			
		}
	    public function taiowc_form_setting(){  

	    	if ( ! current_user_can( 'administrator' ) ) {

		            wp_die( - 1, 403 );
		            
		      }
		      check_ajax_referer( 'taiowc_plugin_nonce','_wpnonce');

	             if( isset($_POST['taiowc']) ){ 
	                      $sanitize_data_array = $this->taiowc_form_sanitize($_POST['taiowc']);
	                      update_option('taiowc',$sanitize_data_array);         
		            }
		            die();  
	    }
        
	    public function taiowc_form_sanitize( $input ){
				$new_input = array();
				foreach ( $input as $key => $val ){
					$new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) :'';
		   }
		   return $new_input;

	    }
		public function options_tabs() {
			?>

			<div class="nav-tab-wrapper wp-clearfix">
				<div class="top-wrap"><div id="logo"><img src='<?php echo esc_url(TAIOWC_IMAGES_URI.'/th-logo.png') ?>' alt="th-logo"/></div>
				  <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
			     </div>
				<?php foreach ( $this->fields as $tabs ): ?>
					<a data-target="<?php echo esc_attr($tabs['id']); ?>"  class="taiowc-setting-nav-tab nav-tab <?php echo esc_html($this->get_options_tab_css_classes( $tabs )); ?> " href="#<?php echo esc_attr($tabs['id']); ?>"><span class="dashicons <?php echo $this->icon_list($tabs['id']); ?>"></span><?php echo esc_html($tabs['title']); ?></a>
				<?php endforeach; ?>
			</div>
			<?php
		}

		function icon_list($id ='dashicons-menu'){
			$icon = array(
				'taiowc_integration'=>'dashicons-admin-appearance',
				'taiowc_general' => 'dashicons-admin-generic',
			'taiowc_cart'=>'dashicons-cart',
			'taiowc_cart_style'=>'dashicons-color-picker',
			'taiowc_mobile_cart'=>'dashicons-smartphone',
			'taiowc_reset'=>'dashicons-warning',
			'taiowc_usefull_plugin'=>'dashicons-admin-plugins'
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
				
					echo '<th scope="row" class="taiowc-settings-label">';
					if ( ! empty( $field['args']['label_for'] ) ) {
						echo '<label for="' . esc_attr( $field['args']['label_for'] ) . '">' . esc_html($field['title']). '</label>';
					} else {
						echo esc_html($field['title']);
					}

					echo '</th>';
					echo '<td class="taiowc-settings-field-content">';
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

			return 'data-taiowcdepends="[' . esc_attr( wp_json_encode( $b_array ) ) . ']"';
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

			    case 'colorpkr':
					$this->colorpkr_field_callback( $field );
					break;		

				case 'html':
					$this->html_field_callback( $field );
					break;	

				case 'radio-image':
					$this->radio_image_field_callback( $field );
					break;
			    case 'textarea':
					$this->textarea_field_callback( $field );
					break;
				case 'usefullplugin':
					$this->usefullplugin_field_callback( $field );
					break;						

				default:
					$this->text_field_callback( $field );
					break;
			}
			do_action( 'taiowc_settings_field_callback', $field );
		}

     
      public function checkbox_field_callback( $args ) {
               
			$value = (bool)( $this->get_option( $args['id'] ) );

			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';?>
            <fieldset>
            	<label>
            		<input <?php echo esc_attr($attrs); ?> type="checkbox" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]" value="1" <?php echo esc_attr(checked( $value, true, false ));?>> <?php if ( ! empty( $args['desc'] ) ) {  echo esc_html($args['desc']); } ?>
            	</label>     
            </fieldset>

		<?php }

		public function select_field_callback( $args ) {

			$options = apply_filters( "taiowc_settings_{$args[ 'id' ]}_select_options", $args['options'] );

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

		public function textarea_field_callback( $args ) {
			$value = esc_attr( $this->get_option( $args['id'] ) );
			$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';?>
           <textarea class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]"><?php echo esc_attr($value); ?></textarea>

          <?php if ( ! empty( $args['desc'] ) ) { ?>
           <p class="description"><?php echo esc_html($args['desc']);?></p>
	      <?php 
	           }
				
		}
		
		public function html_field_callback( $args ) {
         if($args[ 'id' ]=='taiowc-how-to-integrate'):

			?>
			
		   <h4><?php _e( 'Using these three methods you can display cart at your desired location.', 'taiowc' ); ?>: </h4>
		   <ol>

		   	    <li><?php printf( __( 'Display cart in the header menu <span class="pro-ftr">(Pro)</span>. <br /> <br /> Go to the Appearance > %s . Check "TH All In One Woo Cart" and Click "Add to menu" button. <br /> <br /> ', 'taiowc' ), '<a href="#">' . __( 'Menu Screen', 'taiowc' ) . '</a>' ); ?>
				</li>
				<li><?php printf( __( 'Using Shortcode - <code>[taiowc]</code><br /> <br />%s    ', 'taiowc' ), '<ul><li>Add given shortcode at the desired location, You can use Shortcode block, Widget or any page builder shortcode add-on to display cart. <br /> </li>  </ul>' ); ?></li>
                <br /> <br />
				
				<li><?php printf( __( 'Using php - %s', 'taiowc' ), '<code>&lt;?php echo do_shortcode(\'[taiowc]\'); ?&gt;</code> <br /> <br /><ul><li>Add this php code at the desired location in any php file.</li>  </ul>' ); ?>
				</li>
				
			</ol>
		
		<?php 		
			endif;
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
	      /**
	     * Print a colorpicker
	     *
	     * @since 1.0
	     * @param string $key
	     * @param string $value
	     */
	     public function colorpkr_field_callback( $args ){

			$value = esc_attr( $this->get_option( $args['id'] ) );
			
			?>

		  <input type="text" class="color_picker" id="<?php echo esc_attr($args['id']);?>" name="<?php echo esc_attr($this->settings_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>" style="background:<?php echo esc_attr($value); ?>" />
          
          <?php if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>      

		<?php
	        }

		}

	     public function radio_image_field_callback( $args ) {

			$options = apply_filters( "taiowc_settings_{$args[ 'id' ]}_radio_options", $args['options'] );
			$value   = esc_attr( $this->get_option( $args['id'] ) );

			$attrs = isset( $args['attrs'] ) ? $this->make_implode_html_attributes( $args['attrs'] ) : '';

			return implode( '', array_map( function ( $key, $option ) use ( $attrs, $args, $value ) {
				echo sprintf( '<label class="radio-image"><input id="%2$s" %1$s type="radio"  name="%4$s[%2$s]" value="%3$s" %5$s/> <img src="%6$s"/> </label>', esc_attr($attrs), esc_attr($args['id']), esc_attr($key), esc_attr($this->settings_name), checked( esc_attr($value), esc_attr($key), false ), esc_attr($option));
			}, array_keys( $options ), $options ) );

		}

		public function usefullplugin_field_callback( $args ) {

			$is_html = isset( $args['html'] );

			if ( $is_html ) {

				$html = $args['html'];

			  } else {
				$plugin_image  = esc_url( $args['plugin_image'] );
				$plugin_title  = $args['plugin_title'];
				$plugin_link   = $args['plugin_link'];
				
			}?>


			<div class="taiowc-use-plugin"><img src="<?php echo esc_url($plugin_image);?>" /><a target="_blank" href="<?php echo esc_url($plugin_link);?>"><?php echo esc_html($plugin_title);?></a>
			</div>

		<?php }

	//*********************************/	
    // add ,delete ,get , reset, option
    /**********************************/

    public function set_defaults() {
			foreach ( $this->fields as $tab_key => $tab ) {
				$tab = apply_filters( 'taiowc_settings_tab', $tab );

				foreach ( $tab['sections'] as $section_key => $section ) {

					$section = apply_filters( 'taiowc_settings_section', $section, $tab );

					$section['id'] = ! isset( $section['id'] ) ? $tab['id'] . '-section' : $section['id'];

					$section['fields'] = apply_filters( 'taiowc_settings_fields', $section['fields'], $section, $tab );

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

			if ( $this->is_reset_all() ) {
				 $this->delete_settings();
				 wp_redirect($this->settings_url());
			}
              
		  register_setting( $this->settings_name, $this->settings_name, array( $this, 'sanitize_callback' ) );

			foreach ( $this->fields as $tab_key => $tab ) {

				$tab = apply_filters( 'taiowc_settings_tab', $tab );

				foreach ( $tab['sections'] as $section_key => $section ) {

					$section = apply_filters( 'taiowc_settings_section', $section, $tab );

					$section['id'] = ! isset( $section['id'] ) ? $tab['id'] . '-section-' . $section_key : $section['id'];

					// Adding Settings section id
					$this->fields[ $tab_key ]['sections'][ $section_key ]['id'] = $section['id'];

					add_settings_section( $tab['id'] . $section['id'], $section['title'], function () use ( $section ) {
						if ( isset( $section['desc'] ) && ! empty( $section['desc'] ) ) {
							echo '<div class="inside">' . esc_html($section['desc']) . '</div>';
						}
					}, $tab['id'] . $section['id'] );

					$section['fields'] = apply_filters( 'taiowc_settings_fields', $section['fields'], $section, $tab );

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

		public function reset_url() {
			return add_query_arg( 
				array( 
					'page' => 'taiowc', 
					'reset' => 'reset',
					'delete_wpnonce' => wp_create_nonce('delete_nonce')
					 ),
					 admin_url( 'admin.php' ) 
					);
		}

		public function settings_url(){
			return add_query_arg( 
				array( 
					'page' => 'taiowc',
					'_wpnonce' => wp_create_nonce('_nonce')
					 ), admin_url( 'admin.php' ) );
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


        public function is_reset_all() {
			return isset( $_GET['page'] ) && ( $_GET['page'] == 'taiowc' ) && isset( $_GET[ $this->setting_reset_name ] );
		}  

        public function delete_settings() {

        	if ( ! current_user_can( 'administrator' ) ) {

            wp_die( - 1, 403 );

            }

            if (isset($_GET['delete_wpnonce']) || wp_verify_nonce($_REQUEST['delete_wpnonce'], 'delete_nonce' ) ) {

			do_action( sprintf( 'delete_%s_settings', $this->settings_name ), $this );

			// license_key should not updated

			return delete_option( $this->settings_name );

		   }

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
			//get_current_screen()->base
        	if (isset($_GET['page']) && $_GET['page'] == 'taiowc') {

				// STYEL
				wp_enqueue_style( 'taiowc-admin', TAIOWC_PLUGIN_URI. 'assets/css/admin.css', array(), TAIOWC_VERSION );
				wp_enqueue_style( 'taiowc-pickr-nano-css', TAIOWC_PLUGIN_URI. 'assets/css/nano.min.css', array(), TAIOWC_VERSION );

				//SCRIPT
				wp_enqueue_script( 'taiowc-pickr-script', TAIOWC_PLUGIN_URI. 'assets/js/pickr.min.js', array('jquery'),TAIOWC_VERSION, true);
				wp_enqueue_script( 'taiowc-setting-script', TAIOWC_PLUGIN_URI. 'assets/js/taiowc-setting.js', array('jquery'),TAIOWC_VERSION, true);
				wp_enqueue_media();

				wp_localize_script(
					'taiowc-setting-script', 'TaiowcPluginObject', array(
						'media_title'   => esc_html__( 'Choose an Image', 'taiowc' ),
						'button_title'  => esc_html__( 'Use Image', 'taiowc' ),
						'add_media'     => esc_html__( 'Add Media', 'taiowc' ),
						'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php', 'relative' ) ),
						'nonce'         => wp_create_nonce( 'taiowc_plugin_nonce' ),
					)
				);
				
			}
		}

}

endif;