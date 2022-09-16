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

<main class="main">

	<section class="main__content main__blog">
		<?php

		$args = array(
			'post_type'      => 'poem',
			'posts_per_page' => -1,
			'order'          => 'ASC',
		);

		$poem_query = new \WP_Query( $args );

		if ( $poem_query->have_posts() ) :
			while ( $poem_query->have_posts() ) :
				$poem_query->the_post();

				?>
				<a class="main__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endwhile; ?>
		<?php endif; ?>

	</section>
</main>

<?php get_footer(); ?>
