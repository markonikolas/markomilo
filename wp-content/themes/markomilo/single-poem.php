<?php
/**
 * Single poem template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

$terms = get_the_terms( $post, 'type' );

if ( ! empty( $terms ) ) {
	$term_name = $terms[0]->name;
} else {
	$term_name = 'Uncategorized';
}

$next_post = get_next_post();

if ( ! $next_post ) {
	$next_post = get_post( custom_posttype_get_adjacent_id( 'prev', 'poem', get_the_ID() ) );
}

?>

<?php get_header(); ?>

<main class="main" data-barba="container" data-barba-namespace="<?php the_title(); ?>">

	<article class="post main-content">
		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<section class="post-meta">
			<div>
				<h3 class="post-meta__title"><?php esc_html_e( 'Date:', 'markomilo' ); ?></h3>
				<p class="post-meta__text"><?php echo get_the_date( 'd D Y' ); ?></p>
			</div>

			<div>
				<h3 class="post-meta__title"><?php esc_html_e( 'Category:', 'markomilo' ); ?></h3>
                <p class="post-meta__text"><?php echo $term_name; // @phpcs:ignore ?></p>
			</div>

			<div>
				<h3 class="post-meta__title"><?php esc_html_e( 'Printed book:', 'markomilo' ); ?></h3>

				<p class="post-meta__text"><a class="post-meta__link underline" href="#"><?php esc_html_e( 'Purchase now', 'markomilo' ); ?></a></p>	
			</div>
		</section>
   
		<hr>

		<section class="post-next">
			<h3 class="post-meta__title post-meta__title--lg"><?php esc_html_e( 'Next:', 'markomilo' ); ?></h3> 
			<a class="link post-meta__text post-meta__link post-meta__text--lg" 
				href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>">
				<?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
			</a>
		</section>
	</article>
</main>

<?php get_footer(); ?>
