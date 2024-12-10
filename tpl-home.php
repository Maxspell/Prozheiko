<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

    <main class="main">

        <?php get_template_part( 'templates/home/hero' ); ?>
        <?php get_template_part( 'templates/home/smile' ); ?>
        <?php get_template_part( 'templates/home/services' ); ?>
        <?php get_template_part( 'templates/home/leaders' ); ?>
        <?php get_template_part( 'templates/home/about' ); ?>
        <?php get_template_part( 'templates/home/video' ); ?>
        <?php get_template_part( 'templates/home/contact_form' ); ?>
        <?php get_template_part( 'templates/home/seo' ); ?>

    </main>

<?php get_footer(); ?>