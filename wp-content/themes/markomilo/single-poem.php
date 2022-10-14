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

$purchase_link = get_field( 'purchase_link' );
?>

<?php get_header(); ?>

<main class="main" data-barba="container" data-barba-namespace="<?php the_title(); ?>">

	<article class="post main-content">
		<h1><?php the_title(); ?></h1>

		<?php echo get_the_post_thumbnail(); ?>

		<?php if ( get_field( 'show_synopsis' ) ) : ?>

		<blockquote>
			— <?php echo esc_html( get_field( 'quote_value' ) ); ?>
		</blockquote>

		<hr>

		<?php endif; ?>

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

			<?php if ( $purchase_link ) : ?>
				<div>
					<h3 class="post-meta__title"><?php esc_html_e( 'Printed book:', 'markomilo' ); ?></h3>

					<p class="post-meta__text">
						<a class="post-meta__link underline" href="<?php echo esc_url( $purchase_link['url'] ); ?>">
							<?php echo esc_attr( $purchase_link['title'] ); ?>
						</a>
					</p>	
				</div>
			<?php endif; ?>
		</section>
   
		<hr>

		<section class="post-next">
			<h3 class="post-meta__title post-meta__title--lg"><?php esc_html_e( 'Next:', 'markomilo' ); ?></h3> 
			<a class="link post-meta__text post-meta__text--lg post-next__link" 
				href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>">
				<?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
			</a>
		</section>
	</article>
</main>

<?php get_footer(); ?>
