<?php
/**
 * Add hooks here.
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * Adds a curtain component.
 */
function add_curtain() { ?>
	<svg id="curtain" class="curtain" viewBox="0 0 1000 1000" preserveAspectRatio="none">
		<path id="curtain-path" class="curtain__path" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
	</svg>
	<section class="animation-overlay">
		<div class="animation-text-wrapper">
			<h1 class="animation-text text-center">Marko <em>Milo</em></h1>
		</div>
		<video class="animation" loop muted>
			<source src="<?php echo get_stylesheet_directory_uri(); //phpcs:ignore ?>/assets/video/earth.mp4" type="video/mp4" />
		</video>
	</section>
	<?php
}
add_action( 'curtain', __NAMESPACE__ . '\add_curtain' );

/**
 * Add link elements for favicon.
 */
function add_link_elements() {
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#e20000">
	<meta name="msapplication-TileColor" content="#e20000">
	<meta name="theme-color" content="#e20000">
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\add_link_elements' );
