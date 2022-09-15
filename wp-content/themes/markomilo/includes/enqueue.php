<?php
/**
 * Theme enqueues live here
 *
 * @package lypheclinic
 */

namespace Lypheclinic;

/**
 * Theme main enqueues
 */
function enqueue_assets() {

	wp_enqueue_style(
		'theme-main',
		get_theme_file_uri( '/dist/css/style.css' ),
		array(),
		fileatime( get_stylesheet_directory() . '/dist/css/style.css' ),
		'all'
	);

	wp_enqueue_script(
		'theme-main',
		get_theme_file_uri( '/dist/js/main.js' ),
		array(),
		fileatime( get_stylesheet_directory() . '/dist/js/main.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
