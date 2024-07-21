<?php

/******************/
//Above footer
/******************/
//choose col layout
if(class_exists('Big_Store_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'big_store_above_footer_layout', array(
                'default'           => 'ft-abv-none',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'big_store_above_footer_layout', array(
                    'label'    => esc_html__('Layout','big-store'),
                    'section'  => 'big-store-above-footer',
                    'choices'  => array(
                        'ft-abv-none'   => array(
                            'url' => BIG_STORE_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-abv-one'   => array(
                            'url' => BIG_STORE_TOP_HEADER_LAYOUT_1,
                        ),
                        'ft-abv-two' => array(
                            'url' => BIG_STORE_TOP_HEADER_LAYOUT_2,
                        ),
                        'ft-abv-three' => array(
                            'url' => BIG_STORE_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('big_store_above_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('big_store_above_footer_col1_set', array(
        'settings' => 'big_store_above_footer_col1_set',
        'label'    => __('Column 1','big-store'),
        'section'  => 'big-store-above-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','big-store'),
        'text'             => __('Text','big-store'),
        'menu'             => __('Menu','big-store'),
        'widget'           => __('Widget','big-store'),
        'social'           => __('Social Media','big-store'),   
    ),
));
//col1-text/html
$wp_customize->add_setting('big_store_footer_col1_texthtml', array(
        'default'           => __('Add your content here','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('big_store_footer_col1_texthtml', array(
        'label'    => __('Text', 'big-store'),
        'section'  => 'big-store-above-footer',
        'settings' => 'big_store_footer_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_footer_col1_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize,'big_store_footer_col1_widget_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__('Go To Widget','big-store'),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_footer_col1_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize,'big_store_footer_col1_menu_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__('Go To Menu','big-store'),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_footer_col1_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize, 'big_store_footer_col1_social_media_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'big-store' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
/***************************************/
// col2
/***************************************/
$wp_customize->add_setting('big_store_above_footer_col2_set',array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'big_store_above_footer_col2_set',array(
        'settings' => 'big_store_above_footer_col2_set',
        'label'   => __('Column 2','big-store'),
        'section' => 'big-store-above-footer',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','big-store'),
        'text'             => __('Text','big-store'),
        'menu'                 => __('Menu','big-store'),
        'widget'                 => __('Widget','big-store'),
        'social'             => __('Social Media','big-store'),     
        ),
    ));
//col2-text/html
$wp_customize->add_setting('big_store_above_footer_col2_texthtml', array(
        'default'           => __('Add your content here','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_textarea', 
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control('big_store_above_footer_col2_texthtml', array(
        'label'    => __('Text', 'big-store'),
        'section'  => 'big-store-above-footer',
        'settings' => 'big_store_above_footer_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 widget redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_above_footer_col2_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize,'big_store_above_footer_col2_widget_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'big-store' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 menu redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_above_footer_col2_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize,'big_store_above_footer_col2_menu_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'big-store' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_above_footer_col2_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize, 'big_store_above_footer_col2_social_media_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'big-store' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('big_store_above_footer_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('big_store_above_footer_col3_set', array(
        'settings' => 'big_store_above_footer_col3_set',
        'label'   => __('Column 3','big-store'),
        'section' => 'big-store-above-footer',
        'type'    => 'select',
        'choices' => array(
        'none'             => __('None','big-store'),
        'text'             => __('Text','big-store'),
        'menu'             => __('Menu','big-store'),
        'widget'           => __('Widget','big-store'),
        'social'           => __('Social Media','big-store'),   
        ),
    ));
//col3-text/html
$wp_customize->add_setting('big_store_above_footer_col3_texthtml', array(
        'default'           => __('Add your content here','big-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_textarea', 
        'transport'         => 'postMessage', 
    ));
$wp_customize->add_control('big_store_above_footer_col3_texthtml', array(
        'label'    => __('Text', 'big-store'),
        'section'  => 'big-store-above-footer',
        'settings' => 'big_store_above_footer_col3_texthtml',
        'type'    => 'textarea',
    ));
// col3 social media redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_above_footer_col3_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize, 'big_store_above_footer_col3_social_media_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'big-store' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_above_footer_col3_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize,'big_store_above_footer_col3_widget_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'big-store' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// col3 menu redirection
if (class_exists('Big_Store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'big_store_above_footer_col3_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Big_Store_Widegt_Redirect(
                $wp_customize,'big_store_above_footer_col3_menu_redirect', array(
                    'section'      => 'big-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'big-store' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'Big_Store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'big_store_above_ftr_hgt', array(
                'sanitize_callback' => 'big_store_sanitize_range_value',
                'default'           => '30',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'big_store_above_ftr_hgt', array(
                    'label'       => esc_html__( 'Height', 'big-store' ),
                    'section'     => 'big-store-above-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 30,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
// above bottom-border
if ( class_exists( 'Big_Store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'big_store_abv_ftr_botm_brd', array(
                'sanitize_callback' => 'big_store_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'big_store_abv_ftr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'big-store' ),
                    'section'     => 'big-store-above-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
// border-color
 $wp_customize->add_setting('big_store_above_frt_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_above_frt_brdr_clr', array(
        'label'      => __('Border Color', 'big-store' ),
        'section'    => 'big-store-above-footer',
        'settings'   => 'big_store_above_frt_brdr_clr',
    ) ) 
 );  

/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_abv_ftr_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_abv_ftr_learn_more',
            array(
        'section'    => 'big-store-above-footer',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#above-footer',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));