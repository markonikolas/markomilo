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

/**
 * Set active nav menu item on
 * single poem page.
 *
 * @param array $classes - element class names.
 * @param bool  $menu_item - is it menu item (flag)?.
 */
function add_active_class_to_child_page( $classes = array(), $menu_item = false ) {
	$post_type      = 'poem';
	$menu_item_name = 'Works';

	$is_child_page = get_post_type() === $post_type && $menu_item_name === $menu_item->title && ! in_array( 'current-menu-item', $classes, true );

	if ( is_single() && $is_child_page ) {
		$classes[] = 'current-menu-item';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\add_active_class_to_child_page', 100, 2 );
