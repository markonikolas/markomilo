<?php
/**
 * Theme enqueues live here
 *
 * @package markomilo
 */

namespace MarkoMilo;

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

	wp_enqueue_script(
		'barba',
		'https://unpkg.com/@barba/core',
		array(),
		'1.0',
		false
	);

	wp_enqueue_script(
		'gsap',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js',
		array(),
		'1.0',
		false
	);

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
		array( 'jquery' ),
		fileatime( get_stylesheet_directory() . '/dist/js/main.js' ),
		true
	);

	if ( is_page_template( 'poetry.php' ) ) {
		wp_enqueue_script(
			'infinite-menu',
			get_theme_file_uri( '/dist/js/infiniteMenu.js' ),
			array( 'jquery' ),
			fileatime( get_stylesheet_directory() . '/dist/js/infiniteMenu.js' ),
			true
		);
	}

	wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap', array(), 1.0 );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

/**
 * Enqueue scripts as type="module".
 *
 * Resolves the issue of import declarations may only appear at top level of a module.
 *
 * @see https://stackoverflow.com/questions/42237388/syntaxerror-import-declarations-may-only-appear-at-top-level-of-a-module
 *
 * @param string $tag - script to enqueue.
 * @param string $handle - scripts id.
 * @param string $src - scripts source.
 */
function add_type_attribute( $tag, $handle, $src ) {
	if ( 'infinite-menu' === $handle ) {
		return '<script id="infinite-menu-js" type="module" src="' . esc_url( $src ) . '"></script>'; // @phpcs:ignore
	} elseif ( 'theme-main' === $handle ) {
		return '<script id="main-js" type="module" src="' . esc_url( $src ) . '"></script>'; // @phpcs:ignore
	}

	return $tag;
}
add_filter( 'script_loader_tag', __NAMESPACE__ . '\add_type_attribute', 10, 3 );
