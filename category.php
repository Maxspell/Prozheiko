<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prozheiko
 */

get_header();
?>

	<main class="main">

		<?php get_template_part( 'templates/common/breadcrumbs' ); ?>
		
<section class="blog-section">
    <div class="container">
        <div class="blog-section__inner">
            <h1 class="blog-section__title">Блог</h1>
            <ul class="blog__category-list">
                <li class="blog__category-item">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog__category-link">
                        <span>Всі</span>
                        <span class="blog__category-amount"><?php echo wp_count_posts('post')->publish; ?></span>
                    </a>
                </li>
                <?php
                $categories = get_categories([
                    'orderby' => 'name',
                    'order'   => 'ASC',
                ]);

                $current_category_id = get_queried_object_id();

                foreach ($categories as $category) : 
                    $active_class = ($category->term_id == $current_category_id) ? 'active' : '';
                ?>
                    <li class="blog__category-item <?php echo $active_class; ?>">
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="blog__category-link">
                            <span><?php echo esc_html($category->name); ?></span>
                            <span class="blog__category-amount"><?php echo esc_html($category->count); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="blog__articles">

                <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
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
                                        $category = get_the_category();
                                        echo !empty($category) ? esc_html($category[0]->name) : '';
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

<?php
get_footer();