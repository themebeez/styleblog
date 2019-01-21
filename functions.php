<?php
/**
 * Style Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package StyleBlog
 */

if ( ! function_exists( 'styleblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function styleblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Style Blog, use a find and replace
		 * to change 'styleblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'styleblog', get_template_directory() . '/languages' );

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
		add_image_size( 'styleblog-thumbnail-one', 680, 450, true );
		add_image_size( 'styleblog-thumbnail-two', 750, 425, true );
		add_image_size( 'styleblog-thumbnail-three', 300, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'styleblog' ),
			'menu-2' => esc_html__( 'Social', 'styleblog' ),
			'menu-3' => esc_html__( 'Header-top', 'styleblog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'styleblog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'styleblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function styleblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'styleblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'styleblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function styleblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'styleblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'styleblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget_wrapper search_widget wow fadeInUp">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'styleblog' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'styleblog' ),
		'before_widget' => '<div class="col-md-4"><section id="%1$s" class="widget %2$s footer_block"><div class="widget_footer">',
		'after_widget'  => '</div></section></div>',
		'before_title'  => '<div class="footer_widget_title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement Area', 'styleblog' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add advertisement here', 'styleblog' ),
		'before_widget' => '<div class="header_widget_advt_inner">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Body Bottom Advertisement Area', 'styleblog' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add advertisement here', 'styleblog' ),
		'before_widget' => '<div class="third_advertisement_inner">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'styleblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function styleblog_scripts() {
	// Styles
	wp_enqueue_style( 'styleblog-style', get_stylesheet_uri() );

	wp_enqueue_style( 'styleblog-fonts', styleblog_fonts_url() );

	wp_enqueue_style( 'styleblog-main', get_template_directory_uri() . '/themebeez/assets/dist/css/main.min.css'  );

	// Scripts
	wp_enqueue_script( 'styleblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'styleblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	
	wp_enqueue_script( 'styleblog-bundle', get_template_directory_uri() . '/themebeez/assets/dist/js/bundle.min.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'styleblog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Tags
 */
require get_template_directory() . '/themebeez/theme-tags.php';

/**
 * Filters
 */
require get_template_directory() . '/themebeez/filters.php';

/**
 * Helpers Function
 */
require get_template_directory() . '/themebeez/helpers.php';

/**
 * Hook Function
 */
require get_template_directory() . '/themebeez/hooks.php';

/**
 * Default Values
 */
require get_template_directory() . '/themebeez/customizer/defaults.php';

/**
 * Default Values
 */
require get_template_directory() . '/themebeez/customizer/active-callback.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/themebeez/third-party/breadcrumbs.php';

/**
 * Load TGM Plugin Activation
 */
require get_template_directory() . '/themebeez/third-party/class-tgm-plugin-activation.php';

/**
 * Load Widget
 */
require get_template_directory() . '/themebeez/widget/widget-init.php';