<?php get_header(); ?>

<main class="main">

    <section class="blog-section">
        <div class="container">
            <div class="blog-section__inner">
                <h1 class="blog-section__title">Блог</h1>
                <ul class="blog__category-list">
                    <li class="blog__category-item active">
                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="blog__category-link">
                            <span>Всі</span>
                            <span class="blog__category-amount"><?php echo wp_count_posts('post')->publish; ?></span>
                        </a>
                    </li>
                    <?php
                    $categories = get_categories([
                        'orderby' => 'name',
                        'order'   => 'ASC',
                    ]);

                    foreach ($categories as $category) : ?>
                        <li class="blog__category-item">
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="blog__category-link">
                                <span><?php echo esc_html($category->name); ?></span>
                                <span class="blog__category-amount"><?php echo esc_html($category->count); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="blog__articles">
                    <?php
                    $query = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => 6,
                    ]);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); 
                            $post_general = get_field('general', get_the_ID());
                            $team_id = $post_general['author'];
                            $team_general = get_field('general', $team_id);
                            $team_image = $team_general['image'];
                            ?>
                            <article class="blog__article">
                                <a href="<?php the_permalink(); ?>" class="blog__article-link">
                                    <?php if ( !empty($post_general['image_in_list']) ) : ?>
                                        <img src="<?php echo esc_url($post_general['image_in_list']); ?>" alt="<?php the_title(); ?>" class="related__article-image">
                                    <?php endif; ?>
                                    <div class="blog__article-head">
                                        <h3 class="blog__article-title"><?php the_title(); ?></h3>
                                        <p class="blog__article-category">
                                            <?php
                                            $category = get_the_category();
                                            echo !empty($category) ? esc_html($category[0]->name) : '';
                                            ?>
                                        </p>
                                    </div>
                                    <div class="blog__article-avatar">
                                        <img src="<?php echo esc_url($team_image); ?>" alt="">
                                    </div>
                                </a>
                            </article>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>Немає записів для відображення.</p>
                    <?php endif; ?>
                </div>

                <!-- Навигация -->
                <?php the_posts_pagination([
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ]); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>