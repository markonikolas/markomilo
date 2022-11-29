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
		<video class="animation" autoplay loop muted playsinline> 
			<source src="<?php echo get_stylesheet_directory_uri(); //phpcs:ignore ?>/src/video/markomilo.mp4" type="video/mp4" />
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
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ffffff">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\add_link_elements' );

/**
 * Add meta tags.
 */
function add_meta_tags() {
	global $post;

	$meta         = wp_strip_all_tags( $post->post_content );
	$meta         = strip_shortcodes( $post->post_content );
	$meta         = str_replace( array( "\n", "\r", "\t" ), ' ', $meta );
	$meta         = substr( $meta, 0, 160 );
	$keywords     = get_the_category( $post->ID );
	$metakeywords = '';

	foreach ( $keywords as $keyword ) {
		$metakeywords .= $keyword->cat_name . ', ';
	}

	if ( is_front_page() ) {
		echo '<meta name="description" content="Marko Milo - Writter, copywritter and music lover." />' . "\n";
		echo '<meta name="keywords" content="Marko Milo, Writter, Copywritter" />' . "\n";
	} else {

		echo '<meta name="description" content="' . esc_html( $meta ) . '" />' . "\n";
		echo '<meta name="keywords" content="' . esc_html( $metakeywords ) . '" />' . "\n";
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\add_meta_tags', 2 );
