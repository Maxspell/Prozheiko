<h1 class="team__title">Творці ваших усмішок</h1>
<?php
$team_categories = get_terms([
    'taxonomy' => 'team_category',
    'hide_empty' => true,
    'meta_key' => 'order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
]);

if (!empty($team_categories) && !is_wp_error($team_categories)) :
    foreach ($team_categories as $category) :
        $team_posts = new WP_Query([
            'post_type' => 'team',
            'posts_per_page' => -1,
            'orderby' => 'meta_value_num',
            'meta_key' => 'general_order',
            'order' => 'ASC',
            'tax_query' => [
                [
                    'taxonomy' => 'team_category',
                    'field' => 'term_id',
                    'terms' => $category->term_id,
                ],
            ],
        ]);
?>
<section class="team-section team-section--<?php echo esc_attr($category->slug); ?>">
    <h2 class="team-section__title"><?php echo esc_html($category->name); ?></h2>
    <ul class="team-section__list">
        <?php if ($team_posts->have_posts()) : ?>
            <?php while ($team_posts->have_posts()) : 
                $team_posts->the_post(); 
                $general = get_field('general');
                ?>
                <li class="team-section__item">
                    <a href="<?php the_permalink(); ?>" class="team-section__link">
                        <?php if ( !empty($general['image']) ) : ?>
                            <img src="<?php echo esc_url($general['image']); ?>" alt="<?php the_title(); ?>" class="team-section__image">
                        <?php endif; ?>
                        <div class="team-section__head">
                            <h3 class="team-section__name"><?php the_title(); ?></h3>
                            <p class="team-section__role">
                                <?php echo esc_html($general['role']); ?>
                            </p>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</section>
<?php
        wp_reset_postdata();
    endforeach;
endif;
?>