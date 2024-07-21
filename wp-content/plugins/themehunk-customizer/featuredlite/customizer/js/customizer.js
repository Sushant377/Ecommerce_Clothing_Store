jQuery(document).ready(function() {
        // our service  widget
    wp.customize.section( 'sidebar-widgets-multi-service-widget' ).panel('services_panel');
    wp.customize.section( 'sidebar-widgets-multi-service-widget' ).priority('5');

        // team widget
    wp.customize.section( 'sidebar-widgets-multi-team-widget' ).panel('team_panel');
    wp.customize.section( 'sidebar-widgets-multi-team-widget' ).priority('5');

    // testimonial widget
    wp.customize.section( 'sidebar-widgets-testimonial-widget' ).panel('testimonial_panel');
    wp.customize.section( 'sidebar-widgets-testimonial-widget' ).priority('5');
});