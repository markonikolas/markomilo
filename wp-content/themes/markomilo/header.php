<?php
/**
 * The header for the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package markomilo
 */

namespace MarkoMilo;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
	<section class="inner-wrapper">
		<div class="header__logo"><?php echo get_custom_logo(); // phpcs:ignore ?></div>

		<?php
		wp_nav_menu(
			array(
				'menu'      => 'Primary',
				'container' => 'nav',
			)
		);
		?>
	</section>
</header>
