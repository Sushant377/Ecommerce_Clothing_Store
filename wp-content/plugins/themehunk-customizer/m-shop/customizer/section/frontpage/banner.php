<?php 
$wp_customize->add_setting( 'm_shop_disable_banner_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_disable_banner_sec', array(
                'label'                 => esc_html__('Disable Section', 'themehunk-customizer'),
                'type'                  => 'checkbox',
                'section'               => 'm_shop_banner',
                'settings'              => 'm_shop_disable_banner_sec',
            ) ) );
// choose col layout
if(class_exists('M_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'm_shop_banner_layout', array(
                'default'           => 'bnr-two',
                'sanitize_callback' => 'm_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'm_shop_banner_layout', array(
                    'label'    => esc_html__( 'Layout', 'themehunk-customizer' ),
                    'section'  => 'm_shop_banner',
                    'choices'  => array(
                        'bnr-one'  => array(
                            'url'  => M_SHOP_BANNER_IMG_LAYOUT_1,
                        ),
                        'bnr-two'   => array(
                            'url'   => M_SHOP_BANNER_IMG_LAYOUT_2,
                        ),
                        'bnr-three' => array(
                            'url'   => M_SHOP_BANNER_IMG_LAYOUT_3,
                        ),
                        'bnr-four' => array(
                            'url'  => M_SHOP_BANNER_IMG_LAYOUT_4,
                        ),
                        'bnr-five' => array(
                            'url'  => M_SHOP_BANNER_IMG_LAYOUT_5,
                        ),
                        'bnr-six' => array(
                            'url'  => M_SHOP_BANNER_IMG_LAYOUT_6,
                        ),
                        
                    ),
                )
            )
        );
    } 
// first image
$wp_customize->add_setting('m_shop_bnr_1_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'm_shop_bnr_1_img', array(
        'label'          => __('Image 1', 'themehunk-customizer'),
        'section'        => 'm_shop_banner',
        'settings'       => 'm_shop_bnr_1_img',
 )));

// first url
$wp_customize->add_setting('m_shop_bnr_1_url', array(
	    'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
));
$wp_customize->add_control( 'm_shop_bnr_1_url', array(
        'label'    => __('url', 'themehunk-customizer'),
        'section'  => 'm_shop_banner',
         'type'    => 'text',
));
// second image
$wp_customize->add_setting('m_shop_bnr_2_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'm_shop_bnr_2_img', array(
        'label'          => __('Image 2', 'themehunk-customizer'),
        'section'        => 'm_shop_banner',
        'settings'       => 'm_shop_bnr_2_img',
 )));

// second url
$wp_customize->add_setting('m_shop_bnr_2_url', array(
	    'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
));
$wp_customize->add_control( 'm_shop_bnr_2_url', array(
        'label'    => __('url', 'themehunk-customizer'),
        'section'  => 'm_shop_banner',
         'type'    => 'text',
));

// third image
$wp_customize->add_setting('m_shop_bnr_3_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'm_shop_bnr_3_img', array(
        'label'          => __('Image 3', 'themehunk-customizer'),
        'section'        => 'm_shop_banner',
        'settings'       => 'm_shop_bnr_3_img',
 )));

// third url
$wp_customize->add_setting('m_shop_bnr_3_url', array(
	    'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
));
$wp_customize->add_control( 'm_shop_bnr_3_url', array(
        'label'    => __('url', 'themehunk-customizer'),
        'section'  => 'm_shop_banner',
         'type'    => 'text',
));


// fourth image
$wp_customize->add_setting('m_shop_bnr_4_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'm_shop_bnr_4_img', array(
        'label'          => __('Image 4', 'themehunk-customizer'),
        'section'        => 'm_shop_banner',
        'settings'       => 'm_shop_bnr_4_img',
 )));
$wp_customize->add_setting('m_shop_bnr_4_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
));
$wp_customize->add_control( 'm_shop_bnr_4_url', array(
        'label'    => __('url', 'themehunk-customizer'),
        'section'  => 'm_shop_banner',
         'type'    => 'text',
));

// fifth image
$wp_customize->add_setting('m_shop_bnr_5_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'm_shop_bnr_5_img', array(
        'label'          => __('Image 5', 'themehunk-customizer'),
        'section'        => 'm_shop_banner',
        'settings'       => 'm_shop_bnr_5_img',
 )));
$wp_customize->add_setting('m_shop_bnr_5_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
));
$wp_customize->add_control( 'm_shop_bnr_5_url', array(
        'label'    => __('url', 'themehunk-customizer'),
        'section'  => 'm_shop_banner',
         'type'    => 'text',
));

$wp_customize->add_setting('m_shop_bnr_doc', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_bnr_doc',
            array(
        'section'     => 'm_shop_banner',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#banner-section',
        'description' => esc_html__( 'To know more go with this', 'themehunk-customizer' ),
        'priority'   =>100,
    )));