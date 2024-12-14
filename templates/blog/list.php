<?php get_header(); ?>

	<main class="main">

		<?php if ( have_posts() ) : ?>
			<section class="blog-section">
                <div class="container">
                    <div class="blog-section__inner">
                        <h1 class="blog-section__title">Блог</h1>
                        <ul class="blog__category-list">
                            <li class="blog__category-item active">
                                <a href="#" class="blog__category-link">
                                    <span>Всі</span>
                                    <span class="blog__category-amount">24</span>
                                </a>
                            </li>
                            <li class="blog__category-item">
                                <a href="#" class="blog__category-link">
                                    <span>Діагностика</span>
                                    <span class="blog__category-amount">12</span>
                                </a>
                            </li>
                            <li class="blog__category-item">
                                <a href="#" class="blog__category-link">
                                    <span>Лікування</span>
                                    <span class="blog__category-amount">7</span>
                                </a>
                            </li>
                            <li class="blog__category-item">
                                <a href="#" class="blog__category-link">
                                    <span>Візуалізація</span>
                                    <span class="blog__category-amount">4</span>
                                </a>
                            </li>
                        </ul>
                        <div class="blog__articles">
                            <?php while ( have_posts() ) : the_post(); ?>
        
                                <article class="blog__article">
                                    <a href="#" class="blog__article-link">
                                        <img src="/wp-content/themes/prozheiko/assets/img/related-1.jpg" alt="Стаття" class="blog__article-image">
                                        <div class="blog__article-head">
                                            <h3 class="blog__article-title">Первинна консультація та діагностика</h3>
                                            <p class="blog__article-category">Діагностика</p>    
                                        </div>
                                        <div class="blog__article-avatar">
                                            <img src="/wp-content/themes/prozheiko/assets/img/avatar.jpg" alt="">
                                        </div>
                                    </a>
                                </article>
        
                            <?php endwhile; ?>
                        </div>
        
                        <?php the_posts_navigation(); ?>
                    </div>
                </div>

			</section>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>