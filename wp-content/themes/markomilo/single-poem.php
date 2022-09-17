<?php
/**
 * Single poem template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

$categories = get_the_category();

if ( ! empty( $categories ) ) {
	$category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
}

$next_post = get_next_post();

?>

<?php get_header(); ?>

<main class="main">

	<article class="post main__content">
		<?php the_content(); ?>

		<section class="post-meta">
			<div>
				<h3 class="post-meta__title"><?php esc_html_e( 'Date:', 'markomilo' ); ?></h3>
				<p class="post-meta__text"><?php echo get_the_date(); ?></p>
			</div>

			<div>
				<h3 class="post-meta__title"><?php esc_html_e( 'Category:', 'markomilo' ); ?></h3>
                <p class="post-meta__text"><?php echo $category; // @phpcs:ignore ?></p>
			</div>

			<div>
				<h3 class="post-meta__title"><?php esc_html_e( 'Printed book:', 'markomilo' ); ?></h3>
				<a class="post-meta__text post-meta__link underline" href="#"><?php esc_html_e( 'Purchase now', 'markomilo' ); ?></a>
			</div>
		</section>
   
		<hr>

		<section class="post-next">
			<h3 class="post-meta__title post-meta__title--lg"><?php esc_html_e( 'Next:', 'markomilo' ); ?></h3> 
			<a class="link post-meta__text post-meta__link post-meta__text--lg" href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></a>
		</section>
	</article>
</main>

<?php get_footer(); ?>
