<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function amaz_store_plugin_customize_register( $wp_customize ){
//Front Page
// require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/top-slider.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/category-tab.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/product-slide.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/category-slider.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/product-list.php';

require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/ribbon.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/banner.php';
require THEMEHUNK_CUSTOMIZER_PLUGIN_PATH . 'amaz-store/customizer/section/frontpage/higlight.php';

// product shown in front Page
 $wp_customize->add_setting('amaz_store_prd_shw_no', array(
            'default'           =>'20',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'absint',
        )
    );
    $wp_customize->add_control('amaz_store_prd_shw_no', array(
            'type'        => 'number',
            'section'     => 'amaz-store-woo-shop',
            'label'       => __( 'No. of product to show in Front Page', 'amaz-store' ),
            'input_attrs' => array(
                'min'  => 10,
                'step' => 1,
                'max'  => 1000,
            ),
        )
    ); 

    /*************************/
/* Typography Section for Pro*/
/*************************/
$wp_customize->add_section( 'amaz-typography-pro-show' , array(
    'title'      => __('Typography (Pro)','amaz-store'),
    'priority'   => 30,
) );

$wp_customize->add_setting('amaz-typography-pro-link', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
$wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz-typography-pro-link',
            array(
        'section'     => 'amaz-typography-pro-show',
        'type'        => 'pro-link',
        'url'         => 'https://themehunk.com/product/amaz-store/',
        'label' => esc_html__( 'Get Pro', 'amaz-store' ),
        'priority'   =>100,
    )));

$wp_customize->add_setting('amaz-footer-pro-link', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
$wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz-footer-pro-link',
            array(
        'section'     => 'amaz-store-bottom-footer',
        'type'        => 'pro-link',
        'url'         => 'https://themehunk.com/product/amaz-store/',
        'label' => esc_html__( 'Get Pro', 'amaz-store' ),
        'priority'   =>100,
    )));

/****************/
// Color Option For Pro
/****************/
$wp_customize->add_setting('amaz_store_color_optn_pro', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
$wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz_store_color_optn_pro',
         array(
        'section'     => 'amaz-store-gloabal-color',
        'type'        => 'pro-link',
        'url'         => '#',
        'label' => esc_html__( 'To get more color options Go to Pro', 'amaz-store' ),
        'priority'   =>98,
    )));

}
add_action('customize_register','amaz_store_plugin_customize_register');