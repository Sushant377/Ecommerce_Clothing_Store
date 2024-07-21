<?php
/**
 * big store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Big Store
 * @since 2.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'big_store_setup' ) ) :
define( 'BIG_STORE_THEME_VERSION','2.0.0');
define( 'BIG_STORE_THEME_DIR', get_template_directory() . '/' );
define( 'BIG_STORE_THEME_URI', get_template_directory_uri() . '/' );
define( 'BIG_STORE_THEME_SETTINGS', 'big-store-settings' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_big_store_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function big_store_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'big-store', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
	
		// Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

		add_editor_style( 'editor.css' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

		add_theme_support( 'custom-spacing' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Remove theme support for widget block editor
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', 

			apply_filters( 'big_store_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
				'video'          => false,
		) 


		) );
		// Add support for Custom Background.
         $args = array(
	    'default-color' => 'f1f1f1',
        );
        add_theme_support( 'custom-background',$args );
        
        $GLOBALS['content_width'] = apply_filters( 'big_store_content_width', 640 );
        add_theme_support( 'woocommerce', array(
                                                 'thumbnail_image_width' => 320,
                                             ) );
         // Recommend plugins
        add_theme_support( 'recommend-plugins', array(

        	'themehunk-customizer' => array(
                'name' => esc_html__( 'Themehunk Customizer (Highly Recommended)', 'big-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),
            'th-advance-product-search' => array(
            'name' => esc_html__( 'TH Advance Product Search', 'big-store' ),
            'img' => 'icon-128x128.gif',
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ),
            'th-all-in-one-woo-cart' => array(
                 'name' => esc_html__( 'TH All In One Woo Cart', 'big-store' ),
                  'img' => 'icon-128x128.gif',
                 'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
             ),
            'th-product-compare' => array(
                 'name' => esc_html__( 'TH Product Compare', 'big-store' ),
                  'img' => 'icon-128x128.gif',
                 'active_filename' => 'th-product-compare/th-product-compare.php',
             ),
            'unlimited-blocks' => array(
				'name' => esc_html__( 'Unlimited blocks For Gutenberg', 'big-store' ),
				'img' => 'icon-128x128.png',
				'active_filename' => 'unlimited-blocks/unlimited-blocks.php',
				),
            'th-variation-swatches' => array(
                'name' => esc_html__( 'TH Variation Swatches', 'big-store' ),
                 'img' => 'icon-128x128.gif',
                'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
            ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'big-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'big-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
            ), 
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'big-store' ),
                 'img' => 'icon-128x128.gif',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),

            'yith-woocommerce-wishlist' => array(
                 'name' => esc_html__( 'YITH WooCommerce Wishlist', 'big-store' ),
                  'img' => 'icon-128x128.jpg',
                 'active_filename' => 'yith-woocommerce-wishlist/init.php',
             ),
            
            

        ) );

        // Import Data Content plugins
        add_theme_support( 'import-demo-content', array(
             'themehunk-customizer' => array(
                'name' => esc_html__( 'Themehunk Customizer', 'big-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),

            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'big-store' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ), 
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'big-store' ),
                'img' => 'icon-128x128.gif',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),
            
            'th-advance-product-search' => array(
            'name' => esc_html__( 'TH Advance Product Search', 'big-store' ),
            'img' => 'icon-128x128.gif',
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ),

            'th-all-in-one-woo-cart' => array(
                 'name' => esc_html__( 'TH All In One Woo Cart', 'big-store' ),
                  'img' => 'icon-128x128.gif',
                 'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
             ),

        ));



        // Useful plugins
        add_theme_support( 'useful-plugins', array(
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'big-store' ),
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            ),
        ) );
	}
endif;
add_action( 'after_setup_theme', 'big_store_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 */
/**
 * Register widget area.
 */
function big_store_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'big-store' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="big-store-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'big-store' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'big-store' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'big-store' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Main Header Widget', 'big-store' ),
		'id'            => 'main-header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in main header.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'big-store' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'big-store' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'big-store' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'big-store' ),
		'id'            => 'footer-below-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'big-store' ),
		'id'            => 'footer-below-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'big-store' ),
		'id'            => 'footer-below-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'big-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	for ( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'big-store' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	
}
add_action( 'widgets_init', 'big_store_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function big_store_scripts(){
	// enqueue css
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'font-awesome-th', BIG_STORE_THEME_URI . 'third-party/fonts/font-awesome/css/font-awesome.css', '', BIG_STORE_THEME_VERSION );
	wp_enqueue_style( 'th-icon', BIG_STORE_THEME_URI . 'third-party/fonts/th-icon/style.css', '', BIG_STORE_THEME_VERSION );
	wp_enqueue_style( 'animate', BIG_STORE_THEME_URI . 'css/animate.css','',BIG_STORE_THEME_VERSION);
	wp_enqueue_style( 'owl.carousel-css', BIG_STORE_THEME_URI . 'css/owl.carousel.css','',BIG_STORE_THEME_VERSION);
	wp_enqueue_style( 'big-store-pro-menu', BIG_STORE_THEME_URI . 'css/big-store-menu.css','',BIG_STORE_THEME_VERSION);
    if((bool)get_theme_mod('big_store_rtl')==true || in_array('rtl', get_body_class())){
	wp_enqueue_style( 'big-store-rtl-style', BIG_STORE_THEME_URI . 'css/rtl.css','',BIG_STORE_THEME_VERSION);	
	}else{
	wp_enqueue_style( 'big-store-main-style', BIG_STORE_THEME_URI . 'css/style.css','',BIG_STORE_THEME_VERSION);	
	}	
	wp_enqueue_style( 'big-store-style', get_stylesheet_uri(), array(), BIG_STORE_THEME_VERSION );
	wp_add_inline_style('big-store-style', big_store_custom_style());
	
    //enqueue js
    
    wp_enqueue_script('imagesloaded');

    wp_enqueue_script('big-store-menu-js', BIG_STORE_THEME_URI .'js/big-store-menu.js', array( 'jquery' ), '1.0.0', true );
   
    wp_enqueue_script('owl.carousel-js', BIG_STORE_THEME_URI .'js/owl.carousel.js', array( 'jquery' ), '1.0.1', true );
   
    wp_enqueue_script('big-store-accordian-menu-js', BIG_STORE_THEME_URI .'js/big-store-accordian-menu.js', array( 'jquery' ), BIG_STORE_THEME_VERSION , true );

    wp_enqueue_script( 'big-store-custom-js', BIG_STORE_THEME_URI .'js/big-store-custom.js', array( 'jquery' ), BIG_STORE_THEME_VERSION , true );
     $bigstorelocalize = array(
     			'page_tt_enable' => get_theme_mod('big_store_page_tp_enable', false),
     			'header_tt_enable' => get_theme_mod('big_store_hdr_tp_enable', true),
     			'tt_account' =>  get_theme_mod( 'big_store_account_tooltip_txt', __( 'Account', 'big-store' )),
     			'tt_add_to_cart' =>  get_theme_mod( 'big_store_add_to_cart_tooltip_txt', __( 'Add To Cart', 'big-store' )),
     			'tt_wishlist' =>  get_theme_mod( 'big_store_wishlist_tooltip_txt', __( 'Wishlist', 'big-store' )),
     			'tt_quickview' =>  get_theme_mod( 'big_store_quickview_tooltip_txt', __( 'Quickview', 'big-store' )),
     			'tt_compare' =>  get_theme_mod( 'big_store_compare_tooltip_txt', __( 'Compare', 'big-store' )),
				'big_store_top_slider_optn' => get_theme_mod('big_store_top_slider_optn',false),
				'big_store_move_to_top_optn' => get_theme_mod('big_store_move_to_top',true),
				'big_store_sticky_header_effect' => get_theme_mod('big_store_sticky_header_effect','scrldwmn'),
				'big_store_slider_speed' => get_theme_mod('big_store_slider_speed','3000'),
				'big_store_rtl' => (bool)get_theme_mod('big_store_rtl'),
				'mobile_menuclose' => __('Close','big-store'),
				
			);
    wp_localize_script( 'big-store-custom-js', 'big_store',  $bigstorelocalize);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'big_store_scripts' );
/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
add_action( 'wp_enqueue_scripts', 'big_store_load_dashicons_front_end' );
function big_store_load_dashicons_front_end(){
  wp_enqueue_style( 'dashicons' );
}

/**
 * Load init.
 */
require_once trailingslashit(BIG_STORE_THEME_DIR).'inc/init.php';

//custom function conditional check for blog page
function big_store_is_blog (){
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}


if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

// Add block patterns
require get_template_directory() . '/block-pattern.php';