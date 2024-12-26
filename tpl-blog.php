<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

    <main class="main">

        <?php get_template_part( 'templates/common/breadcrumbs' ); ?>
        <?php get_template_part( 'templates/blog/list' ); ?>

    </main>

<?php get_footer(); ?>