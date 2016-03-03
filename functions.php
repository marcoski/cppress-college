<?php
/**
 * CpPress College Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CpPress_College_Theme
 */
use CpPress\CpPress;
use CpPressCollege\Filters\LayoutFilter;
use CpPressCollege\Filters\WidgetsFilter;

require_once 'vendor/autoload.php';

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('cp-press'.DIRECTORY_SEPARATOR.'cp-press.php') && !is_admin()){
	require_once WP_PLUGIN_DIR.DIRECTORY_SEPARATOR.'cp-press'.DIRECTORY_SEPARATOR.'cp-press.php';
	
	LayoutFilter::add();
	WidgetsFilter::add();
}


if ( ! function_exists( 'cppress_college_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cppress_college_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CpPress College Theme, use a find and replace
	 * to change 'cppress-college' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cppress-college', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'cppress-college' ),
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

	
}
endif;
add_action( 'after_setup_theme', 'cppress_college_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cppress_college_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Blog Sidebar'),
			'id' => 'blog-sidebar',
			'description' => __( 'The blog sidebar.' ),
			'before_widget' => '<div id="%1$s" class="block %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cppress_college_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cppress_college_scripts() {
	wp_enqueue_style( 'cppress-college-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'backtotop', get_template_directory_uri() . '/js/jquery.backtotop.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery', 'backbone', 'underscore'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cppress_college_scripts', 9);
