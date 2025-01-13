<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prozheiko
 */

get_header();
?>

	<main class="main">

		<?php get_template_part( 'templates/common/breadcrumbs' ); ?>
		<?php get_template_part( 'templates/blog/list' ); ?>

	</main>

<?php
get_footer();
