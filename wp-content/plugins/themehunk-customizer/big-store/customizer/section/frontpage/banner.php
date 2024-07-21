<?php 
$wp_customize->add_setting( 'big_store_disable_banner_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_disable_banner_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big_store_banner',
                'settings'              => 'big_store_disable_banner_sec',
            ) ) );
// choose col layout
if(class_exists('Big_Store_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'big_store_banner_layout', array(
                'default'           => 'bnr-one',
                'sanitize_callback' => 'big_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Big_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'big_store_banner_layout', array(
                    'label'    => esc_html__( 'Layout', 'big-store' ),
                    'section'  => 'big_store_banner',
                    'choices'  => array(
                        'bnr-one'  => array(
                            'url'  => BIG_STORE_BANNER_IMG_LAYOUT_1,
                        ),
                        'bnr-two'   => array(
                            'url'   => BIG_STORE_BANNER_IMG_LAYOUT_2,
                        ),
                        'bnr-three' => array(
                            'url'   => BIG_STORE_BANNER_IMG_LAYOUT_3,
                        ),
                        'bnr-four' => array(
                            'url'  => BIG_STORE_BANNER_IMG_LAYOUT_4,
                        ),
                        'bnr-five' => array(
                            'url'  => BIG_STORE_BANNER_IMG_LAYOUT_5,
                        ),
                        'bnr-six' => array(
                            'url'  => BIG_STORE_BANNER_IMG_LAYOUT_5,
                        ),
                        
                    ),
                )
            )
        );
    } 
// first image
$wp_customize->add_setting('big_store_bnr_1_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_bnr_1_img', array(
        'label'          => __('Image 1', 'big-store'),
        'section'        => 'big_store_banner',
        'settings'       => 'big_store_bnr_1_img',
 )));

// first url
$wp_customize->add_setting('big_store_bnr_1_url', array(
	    'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
));
$wp_customize->add_control( 'big_store_bnr_1_url', array(
        'label'    => __('url', 'big-store'),
        'section'  => 'big_store_banner',
         'type'    => 'text',
));
// second image
$wp_customize->add_setting('big_store_bnr_2_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_bnr_2_img', array(
        'label'          => __('Image 2', 'big-store'),
        'section'        => 'big_store_banner',
        'settings'       => 'big_store_bnr_2_img',
 )));

// second url
$wp_customize->add_setting('big_store_bnr_2_url', array(
	    'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
));
$wp_customize->add_control( 'big_store_bnr_2_url', array(
        'label'    => __('url', 'big-store'),
        'section'  => 'big_store_banner',
         'type'    => 'text',
));

// third image
$wp_customize->add_setting('big_store_bnr_3_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_bnr_3_img', array(
        'label'          => __('Image 3', 'big-store'),
        'section'        => 'big_store_banner',
        'settings'       => 'big_store_bnr_3_img',
 )));

// third url
$wp_customize->add_setting('big_store_bnr_3_url', array(
	    'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
));
$wp_customize->add_control( 'big_store_bnr_3_url', array(
        'label'    => __('url', 'big-store'),
        'section'  => 'big_store_banner',
         'type'    => 'text',
));


// fourth image
$wp_customize->add_setting('big_store_bnr_4_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_bnr_4_img', array(
        'label'          => __('Image 4', 'big-store'),
        'section'        => 'big_store_banner',
        'settings'       => 'big_store_bnr_4_img',
 )));
$wp_customize->add_setting('big_store_bnr_4_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
));
$wp_customize->add_control( 'big_store_bnr_4_url', array(
        'label'    => __('url', 'big-store'),
        'section'  => 'big_store_banner',
         'type'    => 'text',
));

// fifth image
$wp_customize->add_setting('big_store_bnr_5_img', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'big_store_bnr_5_img', array(
        'label'          => __('Image 5', 'big-store'),
        'section'        => 'big_store_banner',
        'settings'       => 'big_store_bnr_5_img',
 )));
$wp_customize->add_setting('big_store_bnr_5_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_text',
));
$wp_customize->add_control( 'big_store_bnr_5_url', array(
        'label'    => __('url', 'big-store'),
        'section'  => 'big_store_banner',
         'type'    => 'text',
));

$wp_customize->add_setting('big_store_bnr_doc', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_bnr_doc',
            array(
        'section'     => 'big_store_banner',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/big-store/#banner-section',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));