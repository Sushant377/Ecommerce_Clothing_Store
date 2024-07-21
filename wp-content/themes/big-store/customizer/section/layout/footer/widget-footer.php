<?php

/******************/
//Widegt footer
/******************/
if(class_exists('Big_Store_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'big_store_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-none',
               'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'big_store_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','big-store'),
                    'section'  => 'big-store-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-four' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-five' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => BIG_STORE_FOOTER_WIDGET_LAYOUT_8,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize, 'big_store_bottom_footer_widget_redirect', array(
                    'section'      => 'big-store-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'big-store' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_ftr_wdgt_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_ftr_wdgt_learn_more',
            array(
        'section'    => 'big-store-widget-footer',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#widget-footer',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));