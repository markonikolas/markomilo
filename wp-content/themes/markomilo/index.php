<?php
/**
 * Main template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

?>

<main class="main">
	<?php get_header(); ?>

	<section class="main__content main__blog">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>
				<a class="main__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endwhile; ?>
		<?php endif; ?>

	</section>
</main>

<?php
get_footer();
