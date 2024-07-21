<?php
class themehunk_plugin_option{
function __construct(){
    // AJAX.
  }

  /*** Plugin List return */
function get_plugin(){

  return include_once THEMEHUNK_PDIR . "plugins-list.php";
}
function tab_constant(){
    $theme_data = wp_get_theme();
    $tab_array = array();
    $tab_array['header'] = array('theme_brand' => __('ThemeHunk','lead-form-builder'),
    'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
    'welcome'=>esc_html__('ThemeHunk Marketplace', 'lead-form-builder' ),
    'welcome_desc' => esc_html__('Grow your business with ThemeHunk free/pro themes & plugins.', 'lead-form-builder' ),
    'v'=> 'Version '.$theme_data->get( 'Version' )
    );
    return $tab_array;
}


function tab_page() {
    $text_array = $this->tab_constant();
    $theme_header =$text_array['header'];
    include('tab-html.php' ); 
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
               $pluginArr['free_pro'] = 'Free';
                $pro_active = '';
                $pluginArr['admin_link'] = $plugin['admin_link'];

           if( file_exists($pro_path)) {
               $pluginArr['free_pro'] = 'Pro';
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
                   $button_txt = esc_html__( 'Activated', 'lead-form-builder' );
                   $detail_link = $install_url = '';
                   $pro_active = 1; 

                }

            if ( ! is_plugin_active( $plugin_init ) ){
                    $button_txt = esc_html__( 'Install Now', 'lead-form-builder' );
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
                            'plugin_status' => 'all',
                            'paged' => '1',
                            '_wpnonce' => wp_create_nonce('activate-plugin_' . $plugin_init ),
                        ), network_admin_url('plugins.php'));
                        $button_class = 'activate-now button-primary '.$slug;
                        $button_txt = esc_html__( 'Activate Now', 'lead-form-builder' );
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
                    $pluginArr['thumb']= "https://ps.w.org/". $image_slug."/assets/".$plugin['img'];
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

  $deatil_link = '<a class="plugin-detail" target="_blank" href="'.esc_url( $plugin['detail_pro'] ).'">'.esc_html__( 'View details', 'lead-form-builder' ).'</a>
   <span class="setting-link'.$pro_active.' setting-'.$slug.'">|</span><a class="setting-link'.$pro_active.' setting-'.$slug.'" href="'.admin_url('admin.php?page='.$admin_link).'">Settings</a>';

  if($plugin['free_pro']=='Free' && $slug !='themehunk-megamenu-plus'){
  $upgrade_button ='<a class="upgrade-to-pro button" target="_blank" href="'.$plugin['detail_pro'].'">Upgrade To Pro</a>';
  $deatil_link = '<a class="plugin-detail" target="_blank" href="'.esc_url( 'https://wordpress.org/plugins/'.$slug ).'">'.esc_html__( 'View details', 'lead-form-builder' ).'</a>
  <span class="setting-link'.$pro_active.' setting-'.$slug.'">|</span><a class="setting-link'.$pro_active.' setting-'.$slug.'" href="'.admin_url('admin.php?page='.$admin_link).'">Settings</a>';
}



  $button = '<div class="rcp theme_link th-row">';
  $button .= ' <div class="th-column '.$plugin['free_pro'].'"><img src="'.esc_url( $plugin['thumb'] ).'" /> </div>';
  $button .= '<div class="th-column two">';

  $button .= '<div class="title-plugin">
  <h4>'.esc_html( $plugin['plugin_name'] ). ' <b class="th-'.$plugin['free_pro'].'">'.$plugin['free_pro'].'</b> </h4>';
  $button .= '<div class="plugin-link">'.$deatil_link.'</div>';
  $button .= '</div>';

  $button .='<button data-activated="Activated" data-msg="Activating" data-init="'.esc_attr($plugin['plugin_init']).'" data-slug="'.esc_attr( $plugin['slug'] ).'" class="button '.esc_attr( $plugin['button_class'] ).'">'.esc_html($plugin['button_txt']).'</button>';
  $button .=  $upgrade_button;
  $button .= '</div></div>';

  echo $button;
}
	
} // class end
 ?>