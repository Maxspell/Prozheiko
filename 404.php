<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package prozheiko
 */

get_header();
?>

	<main class="main">

		<?php get_template_part( 'templates/404/content' ); ?>
		<?php get_template_part( 'templates/404/services' ); ?>

	</main>

<?php
get_footer();
