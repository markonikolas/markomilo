<?php
/**
 * Page template file.
 *
 * @package markomilo
 */

namespace MarkoMilo;

?>

<?php get_header(); ?>

<main class="main" data-barba="container" data-barba-namespace="<?php the_title(); ?>">

	<article class="main-content">
		<?php the_content(); ?>
	</article>
</main>

<?php get_footer(); ?>
