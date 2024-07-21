<?php
/**
 *Blog Option
 /*******************/
//blog post content
/*******************/
    $wp_customize->add_setting('big_store_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('big_store_blog_post_content', array(
        'settings' => 'big_store_blog_post_content',
        'label'   => __('Blog Post Content','big-store'),
        'section' => 'big-store-section-blog-group',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','big-store'),
        'excerpt' => __('Excerpt Content','big-store'), 
        'nocontent' => __('No Content','big-store'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('big_store_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'big_store_sanitize_number',
		)
	);
	$wp_customize->add_control('big_store_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'big-store-section-blog-group',
			'label'       => __( 'Excerpt Length', 'big-store' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('big_store_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'big_store_sanitize_text',
            'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control('big_store_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'big-store-section-blog-group',
			'label'       => __( 'Read More Text', 'big-store' ),
			'settings' => 'big_store_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('big_store_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('big_store_blog_post_pagination', array(
        'settings' => 'big_store_blog_post_pagination',
        'label'   => __('Post Pagination','big-store'),
        'section' => 'big-store-section-blog-group',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','big-store'),
        'click'   => __('Load More (Pro)','big-store'), 
        'scroll'  => __('Infinite Scroll (Pro)','big-store'), 
        ),
        'priority'   =>13,
    ));
    $wp_customize->add_setting( 'big_store_blog_single_sidebar_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'big_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_store_blog_single_sidebar_disable', array(
                'label'                 => esc_html__('Force to disable sidebar in single page.', 'big-store'),
                'type'                  => 'checkbox',
                'section'               => 'big-store-section-blog-group',
                'settings'              => 'big_store_blog_single_sidebar_disable',
                'priority'   => 14,
            ) ) );
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('big_store_blog_arch_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_blog_arch_learn_more',
            array(
        'section'    => 'big-store-section-blog-group',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#blog-setting',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));