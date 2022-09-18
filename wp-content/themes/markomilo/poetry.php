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

	<section class="main__content main__list">
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
				<a class="main__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
