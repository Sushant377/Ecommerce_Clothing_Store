<?php
class themehunk_plugin_option{

function __construct(){

    // AJAX.
    add_action( 'wp_ajax_th_activeplugin',array($this,'th_activeplugin') );
  }

  /*** Plugin List return */
function get_plugin(){

  return include_once THEMEHUNK_PDIR . "plugins-list.php";
}
function tab_constant(){
    $theme_data = wp_get_theme();
    $tab_array = array();
    $tab_array['header'] = array('theme_brand' => __('ThemeHunk','wppb'),
    'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
    'welcome'=>esc_html__('ThemeHunk Marketplace', 'wppb' ),
    'welcome_desc' => esc_html__('Grow your business free and paid ThemeHunk plugins.', 'wppb' ),
    'v'=> 'Version '.esc_html($theme_data->get( 'Version' ))
    );
    return $tab_array;
}


function tab_page() {
    $text_array = $this->tab_constant();
    $theme_header =$text_array['header'];
    include('tab-html.php' ); 
}

     /*
          * Plugin install
          * Active plugin
          * Setup Homepage
          */
        public function th_activeplugin(){
      if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => __( 'No plugin specified', 'wppb' ),
          )
        );
      }

      $plugin_init = ( isset( $_POST['init'] ) ) ? sanitize_text_field( $_POST['init'] ) : '';

      $activate = activate_plugin( $plugin_init);

      if ( is_wp_error( $activate ) ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => $activate->get_error_message(),
          )
        );
      }

      wp_send_json_success(
        array(
          'success' => true,
          'message' => __( 'Plugin Successfully Activated', 'wppb' ),
        )
      );

        }

/**
 * Include Welcome page content
 */
 public  function plugin_install(){

    $recommend_plugins = $this->get_plugin();

       if ( is_array( $recommend_plugins ) ){
        $pluginArr =array();
        foreach($recommend_plugins as $slug=>$plugin){

           // pro plugin check
           $pro_path = isset($plugin['pro-plugin'])?ABSPATH . 'wp-content/plugins/'.$plugin['pro-plugin']['init']:'';
               $plugin_init = $plugin['active_filename'];
               $image_slug = $slug;
               $pro_text = $admin_link = $docs = ''; 
               $pluginArr['free_pro'] = __('Free','wppb');
               $pro_active = '';
               $pluginArr['admin_link'] = $plugin['admin_link'];

           if( file_exists($pro_path)) {
               $pluginArr['free_pro'] = __('Pro','wppb');
               $plugin_init = $plugin['pro-plugin']['init'];
               $pluginArr['admin_link'] = $plugin['pro-plugin']['admin_link'];
               $admin_link = $plugin['pro-plugin']['admin_link'];
               $docs = $plugin['pro-plugin']['docs'];
               $pro_text = 'pro'; 
               if(is_plugin_active( $plugin['pro-plugin']['init'] )){
                $pro_active = 1; 
            }
            }


            $status = is_dir( WP_PLUGIN_DIR . '/' . $slug );

            $button_class = 'install-now button '.$slug;

             if ( is_plugin_active( $plugin_init ) ) {
                   $button_class = 'button disabled '.$slug;
                   $button_txt = esc_html__( 'Activated', 'wppb' );
                   $detail_link = $install_url = '';
                   $pro_active = 1; 

                }

            if ( ! is_plugin_active( $plugin_init ) ){
                    $button_txt = esc_html__( 'Install Now', 'wppb' );
                    if ( ! $status ) {
                        $install_url = wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'install-plugin',
                                    'plugin' => $slug
                                ),
                                network_admin_url( 'update.php' )
                            ),
                            'install-plugin_'.$slug
                        );

                    } else {
                        $install_url = add_query_arg(array(
                            'action' => 'activate',
                            'plugin' => rawurlencode( $plugin_init ),
                            'plugin_status' => esc_html__( 'all', 'wppb' ),
                            'paged' => '1',
                            '_wpnonce' => wp_create_nonce('activate-plugin_' . $plugin_init ),
                        ), network_admin_url('plugins.php'));
                        $button_class = 'activate-now button-primary '.$slug;
                        $button_txt = esc_html__( 'Activate Now', 'wppb' );
                    }
                }
                $detail_link = add_query_arg(
                        array(
                            'tab' => 'plugin-information',
                            'plugin' => $slug,
                            'TB_iframe' => 'true',
                            'width' => '772',
                            'height' => '500',
                        ),
                        network_admin_url( 'plugin-install.php' )
                    );

                    $pluginArr['plugin_name'] =  $plugin['name'];
                    $pluginArr['pro_text']= $pro_text;
                    $pluginArr['slug']= $slug;
                    $pluginArr['thumb']= esc_url("https://ps.w.org/". $image_slug."/assets/".$plugin['img']);
                    $pluginArr['plugin_init']= $plugin_init;
                    $pluginArr['detail_pro']= $plugin['details'];
                    $pluginArr['detail_link']= $detail_link;
                    $pluginArr['button_txt']= $button_txt;
                    $pluginArr['button_class']= $button_class;
                    $pluginArr['plugin_active']= $pro_active;


                   $this->plugin_install_button($pluginArr);
        }

    } // plugin check

}
/*** Plugin Butons ***/
function plugin_install_button($plugin){
  $slug = $plugin['slug'];
  $upgrade_button='';
  $admin_link=$plugin['admin_link'];
  $pro_active=$plugin['plugin_active'];

  $deatil_link = '<a class="plugin-detail" target="_blank" href="'.esc_url( $plugin['detail_pro'] ).'">'.esc_html__( 'View details', 'wp-popup-builder' ).'</a>
   <span class="setting-link'.esc_attr($pro_active).' setting-'.esc_attr($slug).'">|</span><a class="setting-link'.esc_attr($pro_active).' setting-'.esc_attr($slug).'" href="'.admin_url('admin.php?page='.esc_attr($admin_link)).'">'.__('Settings','wppb').'</a>';

  if($plugin['free_pro']=='Free' && $slug !='themehunk-megamenu-plus'){
  $upgrade_button ='<a class="upgrade-to-pro button" target="_blank" href="'.$plugin['detail_pro'].'">Upgrade To Pro</a>';
  $deatil_link = '<a class="plugin-detail" target="_blank" href="'.esc_url( 'https://wordpress.org/plugins/'.esc_attr($slug )).'">'.esc_html__( 'View details', 'wp-popup-builder' ).'</a>
  <span class="setting-link'.esc_attr($pro_active).' setting-'.esc_attr($slug).'">|</span><a class="setting-link'.esc_attr($pro_active).' setting-'.esc_attr($slug).'" href="'.admin_url('admin.php?page='.esc_attr($admin_link)).'">'.__('Settings','wppb').'</a>';
  }



  $button = '<div class="rcp theme_link th-row">';
  $button .= ' <div class="th-column '.esc_attr($plugin['free_pro']).'"><img src="'.esc_url( $plugin['thumb'] ).'" /> </div>';
  $button .= '<div class="th-column two">';

  $button .= '<div class="title-plugin">
  <h4>'.esc_html( $plugin['plugin_name'] ). ' <b class="th-'.esc_attr($plugin['free_pro']).'">'.esc_html($plugin['free_pro']).'</b> </h4>';
  $button .= '<div class="plugin-link">'.wp_kses_post($deatil_link).'</div>';
  $button .= '</div>';

  $button .='<button data-activated="Activated" data-msg="Activating" data-init="'.esc_attr($plugin['plugin_init']).'" data-slug="'.esc_attr( $plugin['slug'] ).'" class="button '.esc_attr( $plugin['button_class'] ).'">'.esc_html($plugin['button_txt']).'</button>';
  $button .=  $upgrade_button;
  $button .= '</div></div>';

  echo wp_kses_post($button);
}
    
} // class end
 ?>