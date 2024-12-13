<?php get_header(); ?>

    <main class="main">
        <div class="container">

            <h1 class="team__title">Творці ваших усмішок</h1>
            <?php get_template_part( 'templates/team/owners' ); ?>
            <?php get_template_part( 'templates/team/doctors' ); ?>
            <?php get_template_part( 'templates/team/admins' ); ?>

        </div>
    </main>

<?php get_footer(); ?>