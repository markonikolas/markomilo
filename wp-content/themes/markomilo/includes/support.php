<?php
/**
 * Add theme support.
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * Check supported extensions.
 */
add_filter(
	'wp_check_filetype_and_ext',
	function( $data, $file, $filename, $mimes ) {

		global $wp_version;
		if ( '4.7.1' !== $wp_version ) {
			return $data;
		}

		$filetype = wp_check_filetype( $filename, $mimes );

		return array(
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		);

	},
	10,
	4
);

/**
 * Add svg upload support.
 *
 * @param array $mimes - Meme types that site supports.
 */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', __NAMESPACE__ . '\cc_mime_types' );

/**
 * Fix svg styling.
 */
function fix_svg() {
	echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action( 'admin_head', __NAMESPACE__ . '\fix_svg' );

/**
 * Add theme support.
 */
function setup() {
	/**
	 * Featured image support.
	 */
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );

/**
 * Save point for acf.
 *
 * @param string $path - Where to save the settings.
 */
function acf_save_point( $path ) {

	$path = get_stylesheet_directory() . '/acf';

	return $path;
}
add_filter( 'acf/settings/save_json', __NAMESPACE__ . '\acf_save_point' );

/**
 * Load point for acf.
 *
 * @param string $paths - From where to load the settings.
 */
function acf_load_point( $paths ) {

	unset( $paths[0] );

	$paths[] = get_stylesheet_directory() . '/acf';

	return $paths;

}
add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\acf_load_point' );
