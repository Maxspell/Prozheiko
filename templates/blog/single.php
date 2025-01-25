<?php while ( have_posts() ) : the_post();
$general = get_field( 'general' );
$author = $general['author'];

$author_name = '';
$author_link = '#';
if ( $author ) {
    $author_name = get_the_title( $author );
    $author_link = get_permalink( $author );
}
?>
<section class="article-section">
    <div class="container">
        <div class="article-section__inner">
            <article class="article">
                <a href="/blog/" class="article__return-link">
                    <svg class="arrow-left" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                    </svg>
                    <span>Повернутись до блогу</span>
                </a>
                <h1 class="article__title"><?php the_title(); ?></h1>
                <div class="article__meta">
                    <ul class="article__meta-list">
                        <li class="article__meta-item">
                            <span>Автор:</span>
                            <?php if ( $author_name ) : ?>
                                <a href="<?php echo esc_url( $author_link ); ?>">
                                    <?php echo esc_html( $author_name ); ?>
                                </a>
                            <?php endif; ?>
                        </li>
                        <li class="article__meta-item">
                            <span>Дата публікації:</span> <span><?php the_time('d.m.Y'); ?></span>
                        </li>
                        <li class="article__meta-item">
                            <span>Категорія:</span>
                            <?php 
                            $terms = get_the_terms(get_the_ID(), 'blog_category');

                            if (!empty($terms) && !is_wp_error($terms)) {
                                $term = $terms[0];
                                echo '<a href="' . esc_url(get_term_link($term)) . '">' . 
                                    esc_html($term->name) . '</a>';
                            }
                            ?>
                        </li>
                    </ul>
                    <?php if ( !empty($general['description'])) : ?>
                        <div class="article__meta-description">
                            <?php echo $general['description']; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ( !empty($general['image'])) : ?>
                    <div class="article__image">
                        <img src="<?php echo esc_url($general['image']); ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="article__inner">
                    <ul class="article__toc">
                    </ul>
                    <div class="article__content">
                        <?php echo $general['content']; ?>                     
                    </div>
                    <div class="article__sidebar">
                        <div class="contact-card">
                            <div class="contact-card__logo">
                                <svg class="card-logo-icon" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#card-logo"></use>
                                </svg>
                            </div>
                            <div class="contact-card__title">Гігієна та відбілювання</div>
                            <p class="contact-card__subtitle">від 500 грн </p>
                            <button type="button" class="contact-form__button button popup-link" data-popup="popupForm">
                                <svg class="arrow-right arrow-right--left" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                </svg>
                                <span class="button-text">ЗАПИСАТИСЬ НА ВІЗИТ</span>
                                <svg class="arrow-right" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
<?php endwhile; ?>