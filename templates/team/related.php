<?php
if ( isset($args['related_posts']) && $args['related_posts']->have_posts() ) :
    $related_posts = $args['related_posts'];
?>
<section class="related">
    <div class="container">
        <div class="related__inner">
            <div class="related__header section-header">
                <div class="related__label section-label">
                    <span class="label-text">Статті</span>
                </div>
                <h2 class="related__title section-title">Статті, експертизи та висновки<br><span>PROZHEIKO dental</span></h2>
            </div>
            <div class="related__articles">
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                    <article class="related__article">
                        <a href="<?php the_permalink(); ?>" class="related__article-link">
                            <?php
                            $post_general = get_field('general', get_the_ID());
                            ?>
                            <?php if ( !empty($post_general['image_in_list']) ) : ?>
                                <img src="<?php echo esc_url($post_general['image_in_list']); ?>" alt="<?php the_title(); ?>" class="related__article-image">
                            <?php endif; ?>
                            <div class="related__article-head">
                                <h3 class="related__article-title"><?php the_title(); ?></h3>
                                <div class="related__article-category">
                                    <?php 
                                    $category = get_the_category();
                                    echo !empty($category) ? esc_html($category[0]->name) : '';
                                    ?>
                                </div>
                                <div class="related__article-more">
                                    <span>Читати статтю</span>
                                    <svg class="arrow-right" aria-hidden="true">
                                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="related__article-meta">
                                <div class="related__article-author">
                                    <div class="related__article-author-name">Прожейко Сергій</div>
                                    <div class="related__article-author-role">Головний лікар</div>
                                </div>
                                <div class="related__article-avatar">
                                    <img src="/wp-content/themes/prozheiko/assets/img/avatar.jpg" alt="">
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>