<?php
/**
 * Poem template file.
 * Template Name: Poetry
 *
 * @package markomilo
 */

namespace MarkoMilo;

?>

<?php get_header(); ?>

	<main class="main main-navigation" data-barba="container" data-barba-namespace="Works">
		<?php
		$args = array(
			'post_type'      => 'poem',
			'posts_per_page' => -1,
			'order'          => 'ASC',
		);

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();

				?>

				<div class="main__link"><a class="main__link-inner" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

			<?php endwhile; ?>
		<?php endif; ?>
	</main>

<?php get_footer(); ?>
