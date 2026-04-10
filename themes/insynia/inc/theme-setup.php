<?php
/**
 * Theme Setup
 *
 * Registers theme supports, navigation menus, and image sizes.
 *
 * @package Insynia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function insynia_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'insynia', INSYNIA_DIR . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	/*
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Add support for custom background.
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'ffffff',
		)
	);

	/*
	 * Add support for responsive embeds.
	 */
	add_theme_support( 'responsive-embeds' );

	/*
	 * Add support for wide alignment.
	 */
	add_theme_support( 'align-wide' );

	/*
	 * Add support for editor styles.
	 */
	add_theme_support( 'editor-styles' );

	/*
	 * Register navigation menus.
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Navigation', 'insynia' ),
			'footer'  => esc_html__( 'Footer Navigation', 'insynia' ),
			'social'  => esc_html__( 'Social Links', 'insynia' ),
		)
	);

	/*
	 * Register additional image sizes.
	 */
	add_image_size( 'insynia-featured', 1200, 630, true );
	add_image_size( 'insynia-card', 600, 400, true );
	add_image_size( 'insynia-square', 400, 400, true );

	/*
	 * Add support for post formats.
	 */
	add_theme_support(
		'post-formats',
		array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio' )
	);

	/*
	 * Add support for automatic feed links.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Add support for selective refresh for widgets.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'insynia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function insynia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'insynia_content_width', 800 );
}
add_action( 'after_setup_theme', 'insynia_content_width', 0 );

/**
 * Add custom body classes for layout context.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function insynia_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'insynia-singular';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'insynia_body_classes' );

/**
 * Add pingback URL auto-discovery header.
 */
function insynia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'insynia_pingback_header' );
