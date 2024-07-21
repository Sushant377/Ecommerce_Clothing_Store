<?php
function themehunk_customizer_widgets_init(){

    register_sidebar(array(
    'name' => __('Service Widget', 'themehunk-customizer'),
    'id' => 'multi-service-widget',
    'description' => __('Add Service Widget','themehunk-customizer'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));
    register_sidebar(array(
    'name' => __('Team Widget', 'themehunk-customizer'),
    'id' => 'multi-team-widget',
    'description' => __('Add Team Widget', 'themehunk-customizer'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));

    register_sidebar(array(
    'name' => __('Testimonial Widget', 'themehunk-customizer'),
    'id' => 'testimonial-widget',
    'description' => __('Add Testimonial Widget', 'themehunk-customizer'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ));
}
