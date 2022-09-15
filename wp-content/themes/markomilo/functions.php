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
