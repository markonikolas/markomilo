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
			<h1 class="animation-text text-center"><?php esc_html_e( 'Marko Milo', 'markomilo' ); ?></h1>
		</div>
		<video class="animation" loop muted>
			<source src="<?php echo get_stylesheet_directory_uri(); //phpcs:ignore ?>/assets/video/earth.mp4" type="video/mp4" />
		</video>
	</section>
	<?php
}
add_action( 'curtain', __NAMESPACE__ . '\add_curtain' );
