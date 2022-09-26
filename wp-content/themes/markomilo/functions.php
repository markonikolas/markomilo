<?php
/**
 * Gather all bits and pieces together
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * The current version of the theme.
 */
define( 'MARKOMILO_VERSION', '0.0.1' );

/**
 * Add various support, for example svg upload support.
 */
require_once get_theme_file_path( '/includes/support.php' );

/**
 * Theme cleanup.
 */
require_once get_theme_file_path( '/includes/cleanup.php' );

/**
 * Register site navigation.
 */
require_once get_theme_file_path( '/includes/navigation.php' );

/**
 * Add cpt inits.
 */
require_once get_theme_file_path( '/includes/cpt.php' );

/**
 * Add scripts and styles to the theme.
 */
require_once get_theme_file_path( '/includes/enqueue.php' );

/**
 * Add navigation walker.
 */
require_once get_theme_file_path( '/includes/walker.php' );

/**
 * Add utilities.
 */
require_once get_theme_file_path( '/includes/utils.php' );

/**
 * Add hooks.
 */
require_once get_theme_file_path( '/includes/hooks.php' );
