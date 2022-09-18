<?php
/**
 * Page template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

?>

<?php get_header(); ?>

<main class="main">

	<article class="main__content">
		<?php the_content(); ?>
	</article>
</main>

<?php get_footer(); ?>
