<?php
/******************/
//Bootm footer
/******************/
//choose col layout
if(class_exists('Big_Store_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'big_store_bottom_footer_layout', array(
                'default'           => 'ft-btm-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'big_store_bottom_footer_layout', array(
                    'label'    => esc_html__('Layout','big-store'),
                    'section'  => 'big-store-bottom-footer',
                    'choices'  => array(
                       'ft-btm-none'   => array(
                            'url' => BIG_STORE_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-btm-one'   => array(
                            'url' => BIG_STORE_TOP_HEADER_LAYOUT_1,
                        ),
                        'ft-btm-two' => array(
                            'url' => BIG_STORE_TOP_FOOTER_LAYOUT_2,
                        ),
                        'ft-btm-three' => array(
                            'url' => BIG_STORE_TOP_FOOTER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('big_store_bottom_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('big_store_bottom_footer_col1_set', array(
        'settings' => 'big_store_bottom_footer_col1_set',
        'label'    => __('Column 1','big-store'),
        'section'  => 'big-store-bottom-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','big-store'),
        'text'             => __('Text','big-store'),
        'menu'             => __('Menu (pro)','big-store'),
        'widget'           => __('Widget (pro)','big-store'),
        'social'           => __('Social Media (pro)','big-store'),    
         
    ),
));



//col1-text/html
$wp_customize->add_setting('big_store_footer_bottom_col1_texthtml', array(
        'default'           => __('Copyright | Big Store| Developed by ThemeHunk','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('big_store_footer_bottom_col1_texthtml', array(
        'label'    => __('Text', 'big-store'),
        'section'  => 'big-store-bottom-footer',
        'settings' => 'big_store_footer_bottom_col1_texthtml',
         'type'    => 'textarea',
    ));


/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_ftr_blw_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_ftr_blw_learn_more',
            array(
        'section'     => 'big-store-bottom-footer',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#below-footer',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'    =>100,
    )));

$wp_customize->selective_refresh->add_partial('big_store_footer_bottom_col1_texthtml', array(
        'selector' => '.below-footer-col1 .content-html',
) );