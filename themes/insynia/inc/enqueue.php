<?php
/**
 * Scripts and Styles Enqueuing
 *
 * @package Insynia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue front-end scripts and styles.
 */
function insynia_scripts() {
	// Main stylesheet (theme header stub).
	wp_enqueue_style(
		'insynia-style',
		get_stylesheet_uri(),
		array(),
		INSYNIA_VERSION
	);

	// Primary CSS — design system + layout.
	wp_enqueue_style(
		'insynia-main',
		INSYNIA_URI . '/assets/css/main.css',
		array( 'insynia-style' ),
		INSYNIA_VERSION
	);

	// Primary JavaScript.
	wp_enqueue_script(
		'insynia-main',
		INSYNIA_URI . '/assets/js/main.js',
		array(),
		INSYNIA_VERSION,
		true  // Load in footer.
	);

	// Localize script with theme data.
	wp_localize_script(
		'insynia-main',
		'insyniaData',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'insynia_nonce' ),
		)
	);

	// Comment reply script — only on singular posts with comments open.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'insynia_scripts' );

/**
 * Enqueue editor styles.
 */
function insynia_editor_styles() {
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'insynia_editor_styles' );

/**
 * Preconnect to Google Fonts to speed up font loading.
 * Only added if a Google Fonts URL is used in the future.
 */
function insynia_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => true,
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'insynia_resource_hints', 10, 2 );
