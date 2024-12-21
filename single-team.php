<?php get_header(); 

$current_team_id = get_the_ID();

$related_posts = new WP_Query([
    'post_type'      => 'post',
    'meta_query'     => [
        [
            'key'     => 'general_author',
            'value'   => $current_team_id,
            'compare' => '=',
        ],
    ],
    'posts_per_page' => 3,
]);

?>

    <main class="main">

        <?php get_template_part( 'templates/team/profile' ); ?>
        <?php get_template_part( 'templates/team/related', null, ['related_posts' => $related_posts] ); ?>

    </main>

<?php get_footer(); ?>