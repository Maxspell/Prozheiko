<section class="blog-section">
    <div class="container">
        <div class="blog-section__inner">
            <h1 class="blog-section__title">Блог</h1>
            <ul class="blog__category-list">
            <?php
                $active_class = is_post_type_archive('blog') ? 'active' : '';
            ?>
                <li class="blog__category-item <?php echo $active_class; ?>">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog__category-link">
                        <span>Всі</span>
                        <span class="blog__category-amount"><?php echo wp_count_posts('post')->publish; ?></span>
                    </a>
                </li>
                <?php
                $terms = get_terms([
                    'taxonomy'   => 'blog_category',
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'hide_empty' => false,
                ]);

                foreach ($terms as $term) : ?>
                    <li class="blog__category-item">
                        <a href="<?php echo esc_url(get_category_link($term->term_id)); ?>" class="blog__category-link">
                            <span><?php echo esc_html($term->name); ?></span>
                            <span class="blog__category-amount"><?php echo esc_html($term->count); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="blog__articles">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                error_log($paged);
                $query = new WP_Query([
                    'post_type'      => 'blog',
                    'posts_per_page' => 6,
                    'paged'          => $paged,
                ]);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); 
                        $post_general = get_field('general', get_the_ID());
                        $team_id = $post_general['author'];
                        $team_general = get_field('general', $team_id);
                        $team_name = $team_general['name'];
                        $team_avatar = $team_general['avatar'];
                        $team_role = $team_general['role'];
                        ?>
                        <article class="blog__article">
                            <a href="<?php the_permalink(); ?>" class="blog__article-link">
                                <?php if ( !empty($post_general['image_in_list']) ) : ?>
                                    <img src="<?php echo esc_url($post_general['image_in_list']); ?>" alt="<?php the_title(); ?>" class="blog__article-image">
                                <?php endif; ?>
                                <div class="blog__article-head">
                                    <h3 class="blog__article-title"><?php the_title(); ?></h3>
                                    <div class="blog__article-category">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'blog_category');

                                        echo (!empty($terms) && !is_wp_error($terms)) 
                                            ? esc_html($terms[0]->name) 
                                            : '';
                                        ?>
                                    </div>
                                    <div class="blog__article-more">
                                        <span>Читати статтю</span>
                                        <svg class="arrow-right" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                        </svg>
                                    </div>
                                </div>
                                <?php if ( !empty($team_avatar) ) : ?>
                                    <div class="blog__article-meta">
                                        <div class="blog__article-author">
                                            <div class="blog__article-author-name"><?php echo esc_html($team_name); ?></div>
                                            <div class="blog__article-author-role"><?php echo esc_html($team_role); ?></div>
                                        </div>
                                        <div class="blog__article-avatar">
                                            <img src="<?php echo esc_url($team_avatar); ?>" alt="аватар">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Немає записів для відображення.</p>
                <?php endif; ?>
            </div>
            <div class="blog-pagination">
                <ul class="blog-pagination__numbers">
                    <?php
                    $total_pages = $query->max_num_pages;
                    for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="blog-pagination__number<?php echo ($paged == $i) ? ' active' : ''; ?>">
                            <a href="<?php echo get_pagenum_link($i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>

                <div class="blog-pagination__nav">
                    <div class="blog-pagination__prev<?php echo get_previous_posts_link() ? '' : ' disabled'; ?>">
                        <a href="<?php echo get_previous_posts_page_link() ?: '#'; ?>"<?php echo get_previous_posts_link() ? '' : ' tabindex="-1"'; ?>>
                            <svg class="angle-left-icon" aria-hidden="true">
                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-left"></use>
                            </svg>
                        </a>
                    </div>

                    <div class="blog-pagination__next<?php echo get_next_posts_link() ? '' : ' disabled'; ?>">
                        <a href="<?php echo get_next_posts_page_link($query->max_num_pages) ?: '#'; ?>"<?php echo get_next_posts_link() ? '' : ' tabindex="-1"'; ?>>
                            <svg class="angle-right-icon" aria-hidden="true">
                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>