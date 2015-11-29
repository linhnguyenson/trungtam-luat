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
	add_image_size( 'thumb-full', 750, 375, true );
	add_image_size( 'thumb-post', 150, 100, true );
	add_image_size( 'thumb-blog', 284, 192, true );
	add_image_size( 'thumb-gallery-full', 1024, 768, true );
	add_image_size( 'thumb-gallery-medium', 800, 560, true );

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
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'thememe' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'thememe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thememe_scripts() {

	wp_enqueue_style( 'thememe-css-font-awesome', get_template_directory_uri() . '/skins/font-awesome/css/font-awesome.min.css','4.4.0', false );

	wp_enqueue_style( 'thememe-css-font-serif', 'https://fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic&subset=latin,vietnamese','', false );

	wp_enqueue_style( 'thememe-css-font-san-serif', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,600,700,800,400italic&subset=latin,vietnamese', '', false );

	wp_enqueue_style( 'thememe-css-bootstrap', get_template_directory_uri() . '/skins/css/bootstrap.min.css','3.3.5', false );

	wp_enqueue_style( 'thememe-css-bootstrap-select', get_template_directory_uri() . '/skins/css/bootstrap-select.min.css','3.3.5', false );

	wp_enqueue_style( 'thememe-css-prettyphoto', get_template_directory_uri() . '/skins/prettyPhoto/css/prettyPhoto.css','3.1.6', false );

	wp_enqueue_style( 'thememe-css-bxslider', get_template_directory_uri() . '/skins/bxslider/jquery.bxslider.css','4.1.2', false );

	//HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
	wp_enqueue_script( 'thememe-js-html5', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array(), '20151010' );
	wp_script_add_data( 'thememe-js-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'thememe-js-respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '20151010' );
	wp_script_add_data( 'thememe-js-respond', 'conditional', 'lt IE 9' );

	wp_enqueue_style( 'thememe-style', get_stylesheet_uri() );


	wp_enqueue_style( 'thememe-css-ie', get_template_directory_uri() . '/skins/css/ie.css', array( 'thememe-style' ), '20151010' );
	wp_style_add_data( 'thememe-css-ie', 'conditional', 'lt IE 11' );


	

	wp_enqueue_script( 'thememe-js-bootstrap', get_template_directory_uri() . '/skins/js/bootstrap.min.js', array(), '3.3.5', true );

	wp_enqueue_script( 'thememe-js-bootstrap-select', get_template_directory_uri() . '/skins/js/bootstrap-select.min.js', array(), '3.3.5', true );

	wp_enqueue_script( 'thememe-navigation', get_template_directory_uri() . '/skins/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'thememe-js-prettyphoto', get_template_directory_uri() . '/skins/prettyPhoto/js/jquery.prettyPhoto.js', array(), '3.1.6', true );

	wp_enqueue_script( 'thememe-js-bxslider', get_template_directory_uri() . '/skins/bxslider/jquery.bxslider.min.js', array(), '4.1.2', true );


	


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

/**
 *============================Custome shortcode================================
 */
function category_box_func($atts, $content="") {
	extract(shortcode_atts( array(
			'slug' => '',
	), $atts ));
	$cat = get_category_by_slug($slug);
	$category_link = get_category_link( $cat->cat_ID );
	$shortcode = "<div class='inside-full-height box-content box-content-has-footer'>
					<div class='box-content-header'><h2 class='widget-title heading-title'>$cat->cat_name</h2></div>
					<div class='box-content-body cat-group'>
						[catlist name=$slug date=yes dateformat='d/m/Y h:i A' date_tag=span date_class=post-date numberposts=1 excerpt=yes excerpt_tag=p excerpt_class=excerpt excerpt_size=15 thumbnail=yes thumbnail_size=single-post-thumbnail thumbnail_class=post_thumbnail title_class='featured_title' template=catlist-template/]
						[catlist name=$slug offset=1 date=yes dateformat=d/m/Y date_tag=span date_class=post-date numberposts=4 /]
					</div>
					<div class='content-footer text-right'>
					
						<a href='$category_link' class='readmore'><span><i class='fa fa-bars'></i></span> Xem tất cả</a>
							
					</div>
				</div>";
	return do_shortcode($shortcode);
}
add_shortcode( 'catbox', 'category_box_func' );

/*Add shortcode to display events*/
function event_listing_func($atts, $content="") {
	extract(shortcode_atts( array(
			'slug' => '',
	), $atts ));
	$term = get_term_by( 'slug', $slug, 'calendartype');
	$term_link = get_term_link( $term);
	$today = date("Y-m-d");
	$args = array(
			'post_type'=> 'calendar',
			'posts_per_page'=> '5',
			'order'		=> 'ASC',
			'orderby'	=> 'meta_value',
			'meta_key' 	=> 'calendar_date',
			'tax_query' => array(
					array(
							'taxonomy' => 'calendartype',
							'field'    => 'slug',
							'terms'    => $slug,
					),
			),
			'meta_query' => array(
		        array(
		           'key' => 'calendar_date',
		           'meta-value' => $value,
		           'value' => $today,
		           'compare' => '>=',
		           'type' => 'CHAR'// you can change it to datetime also
		       )
		    )
	);
	query_posts( $args );

	$shortcode = "<div class='event-tab-list'>
					<div class='event-list'>
						<ul>%s</ul>
					</div>
				</div>";
	$all_event = "";
	while ( have_posts() ) : the_post();
		$postid = get_the_ID();
		$openingday_term = get_post_meta($postid, 'calendar_date', true);
		$postlink = get_permalink();
		$posttitle = get_the_title();
		$calendar_date = strtotime($openingday_term);
		$date = date('d', $calendar_date);
		$month = date('m', $calendar_date);
		$all_event .= "<li><span class='time-block'><span class='event-date'>$date</span><span class='event-month'>Th. $month</span></span><span class='title'><a href='$postlink'>$posttitle</a></span></li>";
	endwhile;
	$shortcode = sprintf($shortcode, $all_event);

	wp_reset_query();
	return do_shortcode($shortcode);
}

add_shortcode( 'eventlist', 'event_listing_func' );

