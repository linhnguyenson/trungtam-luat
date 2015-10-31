<?php
/**
 * thememe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thememe
 */

if ( ! function_exists( 'thememe_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thememe_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on thememe, use a find and replace
	 * to change 'thememe' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'thememe', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-left' => esc_html__( 'Primary Menu Left', 'thememe' ),
		'primary-right' => esc_html__( 'Primary Menu Right', 'thememe' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thememe_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // thememe_setup
add_action( 'after_setup_theme', 'thememe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thememe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thememe_content_width', 640 );
}
add_action( 'after_setup_theme', 'thememe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thememe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thememe' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s box-content">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<div class="box-content-header"><h2 class="widget-title heading-title">',
		'after_title'   => '</h2></div><div class="box-content-body">',
	) );
}
add_action( 'widgets_init', 'thememe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thememe_scripts() {

	wp_enqueue_style( 'thememe-css-font-awesome', get_template_directory_uri() . '/skins/font-awesome/css/font-awesome.min.css','4.4.0', false );

	wp_enqueue_style( 'thememe-css-bootstrap', get_template_directory_uri() . '/skins/css/bootstrap.min.css','3.3.5', false );

	wp_enqueue_style( 'thememe-style', get_stylesheet_uri() );

	wp_enqueue_script( 'thememe-js-bootstrap', get_template_directory_uri() . '/skins/js/bootstrap.min.js', array('jquery'), '3.3.5', true );

	wp_enqueue_script( 'thememe-navigation', get_template_directory_uri() . '/skins/js/navigation.js', array(), '20120206', true );


	wp_enqueue_script( 'thememe-js-customizer', get_template_directory_uri() . '/skins/js/customizer.js', array('jquery'), '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thememe_scripts' );

/**
 * Implement the Custom Post Type.
 */
require get_template_directory() . '/inc/custom-post.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );
 
/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Opional: set 'ot_show_new_layout' filter to false.
 */
 
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
include_once( 'inc/theme-options.php' );

/**
 * Theme meta box
 */
load_template( trailingslashit( get_template_directory() ) . 'inc/meta-boxes.php' );

