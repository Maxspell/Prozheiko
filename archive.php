<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prozheiko
 */

get_header();
?>

	<main class="main">

		<?php if ( have_posts() ) : ?>
			<section class="blog-section">
				<h1 class="blog-section__title">Блог</h1>

				<ul class="blog__category-list">
					<li class="blog__category-item">
						<a href="#" class="blog__category-link">Всі</a>
					</li>
					<li class="blog__category-item">
						<a href="#" class="blog__category-link">Діагностика</a>
					</li>
					<li class="blog__category-item">
						<a href="#" class="blog__category-link">Лікування</a>
					</li>
					<li class="blog__category-item">
						<a href="#" class="blog__category-link">Візуалізація</a>
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
							</a>
						</article>

					<?php endwhile; ?>
				</div>

				<?php the_posts_navigation(); ?>

			</section>

		<?php endif; ?>

	</main>

<?php
get_footer();
