<?php
/**
 * Insynia Theme Functions
 *
 * @package Insynia
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INSYNIA_VERSION', '1.0.0' );
define( 'INSYNIA_DIR', get_template_directory() );
define( 'INSYNIA_URI', get_template_directory_uri() );

/**
 * Load theme modules.
 */
require_once INSYNIA_DIR . '/inc/theme-setup.php';
require_once INSYNIA_DIR . '/inc/enqueue.php';
require_once INSYNIA_DIR . '/inc/widgets.php';
require_once INSYNIA_DIR . '/inc/template-tags.php';
