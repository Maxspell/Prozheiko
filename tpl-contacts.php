<?php
/*
Template Name: Contacts
*/
?>

<?php get_header(); ?>

    <main class="main">

        <?php get_template_part( 'templates/common/breadcrumbs' ); ?>
        <?php get_template_part( 'templates/contacts/contacts' ); ?>
        <?php get_template_part( 'templates/home/video' ); ?>
        <?php get_template_part( 'templates/home/contact_form' ); ?>

    </main>

<?php get_footer(); ?>