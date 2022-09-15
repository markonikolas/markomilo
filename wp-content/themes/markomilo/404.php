<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package marmkomilo.
 */

namespace MarkoMilo;

?>

<main class="main">
	<?php get_header(); ?>

	<section class="main__content main__blog">
		<header class="page-header alignwide">
			<h1 class="page-title"><?php esc_html_e( 'Page not found.', 'markomilo' ); ?></h1>
		</header><!-- .page-header -->
	</section>
</main>

<?php
get_footer();
