<?php
/**
 * Theme enqueues live here
 *
 * @package lypheclinic
 */

namespace Lypheclinic;

/**
 * Enqueue google fonts
 */
function preconnect_fonts() {
	?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\preconnect_fonts' );

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

	wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap', array(), 1.0 );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
