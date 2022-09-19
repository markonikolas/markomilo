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
	<script>
	document.documentElement.className = "js";
	var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e };
	supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
	<?php
	wp_nav_menu(
		array(
			'menu'      => 'Primary',
			'container' => 'nav',
			'walker'    => new Navigation(),
		)
	);
	?>
</header>
