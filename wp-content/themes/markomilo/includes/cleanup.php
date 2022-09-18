<?php
/**
 * Theme cleanup
 * Remove all bloat that is not needed by current theme.
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * Remove WordPress block library
 */
function remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\remove_wp_block_library_css', 100 );

/**
 * Disable all colors within Gutenberg.
 */
function disable_gutenberg_all_colors() {
	add_theme_support( 'editor-color-palette' );
	add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\disable_gutenberg_all_colors', 99 );

/**
 * Remove WordPress jQuery Migrate
 *
 * @param string $scripts - site scripts.
 */
function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', __NAMESPACE__ . '\remove_jquery_migrate' );

/**
 * Remove WordPress emojis
 */
function disable_emoji_feature() {
	// Prevent Emoji from loading on the front-end.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove from admin area also.
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	// Remove from RSS feeds also.
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// Remove from Embeds.
	remove_filter( 'embed_head', 'print_emoji_detection_script' );

	// Remove from emails.
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Disable from TinyMCE editor. Currently disabled in block editor by default.
	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\disable_emojis_tinymce' );

	/** Finally, prevent character conversion too
	 ** without this, emojis still work
	 ** if it is available on the user's device
	 */
	add_filter( 'option_use_smilies', '__return_false' );
}

/**
 * Remove emojis in WYSIWYG editor
 *
 * @param string $plugins - site plugins.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		$plugins = array_diff( $plugins, array( 'wpemoji' ) );
	}
	return $plugins;
}
add_action( 'init', __NAMESPACE__ . '\disable_emoji_feature' );

// Remove WordPress global styles and SVG's.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
