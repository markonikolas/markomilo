<?php
/**
 * Main template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

get_header(); ?>

<ul>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			?>
			<li><?php the_title(); ?></li>
		<?php endwhile; ?>
	<?php endif; ?>

</ul>

<?php
get_footer();
