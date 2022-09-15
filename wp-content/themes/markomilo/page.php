<?php
/**
 * Page template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

?>

<main class="main">
	<?php get_header(); ?>

	<article class="main__content">
		<?php the_content(); ?>
	</article>
</main>

<?php
get_footer();
