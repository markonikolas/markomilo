<?php
/**
 * Register menus.
 * Remove all bloat that is not needed by current theme.
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * Register site main navigation.
 */
function register_primary_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'markomilo' ) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\register_primary_menu' );
