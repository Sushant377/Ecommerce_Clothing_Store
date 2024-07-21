<?php
/*********************/
// Move To Top
/********************/
 $wp_customize->add_setting( 'big_store_move_to_top', array(
    'default'           => true,
    'sanitize_callback' => 'big_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Big_Store_Toggle_Control( $wp_customize, 'big_store_move_to_top', array(
    'label'       => esc_html__( 'Enable', 'big-store' ),
    'section'     => 'big-store-move-to-top',
    'type'        => 'toggle',
    'settings'    => 'big_store_move_to_top',
  ) ) );

  // BG color
 $wp_customize->add_setting('big_store_move_to_top_bg_clr', array(
        'default'           => '#141415',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Big_Store_Customizer_Color_Control($wp_customize,'big_store_move_to_top_bg_clr', array(
        'label'      => __('Background Color', 'big-store' ),
        'section'    => 'big-store-move-to-top',
        'settings'   => 'big_store_move_to_top_bg_clr',
    ) ) 
 );  

$wp_customize->add_setting('big_store_move_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'big_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'big_store_move_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'big-store' ),
        'section'    => 'big-store-move-to-top',
        'settings'   => 'big_store_move_to_top_icon_clr',
    ) ) 
 );

/****************/
//doc link
/****************/
$wp_customize->add_setting('big_store_movetotop_learn_more', array(
    'sanitize_callback' => 'big_store_sanitize_text',
    ));
$wp_customize->add_control(new Big_Store_Misc_Control( $wp_customize, 'big_store_movetotop_learn_more',
            array(
        'section'    => 'big-store-move-to-top',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/big-store/#back-top',
        'description' => esc_html__( 'To know more go with this', 'big-store' ),
        'priority'   =>100,
    )));