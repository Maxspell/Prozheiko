<?php get_header();
$general = get_field( 'general', get_the_ID() );
$author = $general['author']; 

if ( $author ) {
    $current_team_id = $author;
    
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
        'post__not_in'   => [get_the_ID()],
    ]);
} 

?>

    <main class="main">

        <?php get_template_part( 'templates/common/breadcrumbs' ); ?>
        <?php get_template_part( 'templates/blog/single' ); ?>
        <?php get_template_part( 'templates/faq' ); ?>
        <?php get_template_part( 'templates/team/related', null, ['related_posts' => $related_posts] ); ?>

    </main>

<?php get_footer(); ?>