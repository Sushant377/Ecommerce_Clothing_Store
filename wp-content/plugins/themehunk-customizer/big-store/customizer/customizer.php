<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function big_store_plugin_customize_register( $wp_customize ){
//Front Page
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/top-slider.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/category-tab.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/product-slide.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/category-slider.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/product-list.php';

require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/ribbon.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/banner.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/higlight.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'big-store/customizer/section/frontpage/tab-productimage.php';

// product shown in front Page
 $wp_customize->add_setting('big_store_prd_shw_no', array(
            'default'           =>'20',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'big_store_sanitize_number',
        )
    );
    $wp_customize->add_control('big_store_prd_shw_no', array(
            'type'        => 'number',
            'section'     => 'big-store-woo-shop',
            'label'       => __( 'No. of product to show in Front Page', 'big-store' ),
            'input_attrs' => array(
                'min'  => 10,
                'step' => 1,
                'max'  => 1000,
            ),
        )
    ); 



/*************************/
/* Footer Section for Pro*/
/*************************/

$wp_customize->add_setting('big-store-footer-pro-link', array(
    'sanitize_callback' => 'big_store_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big-store-footer-pro-link',
            array(
        'section'     => 'big-store-bottom-footer',
        'type'        => 'pro-link',
        'url'         => 'https://themehunk.com/product/big-store-pro/',
        'label' => esc_html__( 'Get Pro', 'big-store' ),
        'priority'   =>100,
    )));


}
add_action('customize_register','big_store_plugin_customize_register');

