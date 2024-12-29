<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prozheiko
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
	<?php $general = get_field( 'general', 'options' ); ?>
	<header class="header lock-padding">
		<div class="header__top">
			<div class="container">
				<div class="header__inner header__inner--top">
					<div class="header__address">
						<svg width="24" height="24">
							<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#map-marker"></use>
						</svg>
                        <span class="header__address-text"><?= $general['address'] ?></span>
                    </div>
					<div class="header__schedule">
						<svg width="25" height="24">
							<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#clock"></use>
						</svg>
                        <span class="header__schedule-time"><?= $general['schedule_1'] ?></span>
                        <span class="header__schedule-time"><?= $general['schedule_2'] ?></span>
                    </div>
					<?php if ( $general['social_list'] ) : ?>
						<ul class="social-list">
							<?php foreach ( $general['social_list'] as $item ) : ?>
								<li><a href="<?= $item['link'] ?>"><img class="social-list__icon" src="<?= $item['icon'] ?>" alt=""></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="header__bottom">
			<div class="container">
				<div class="header__inner header__inner--bottom">
					<div class="header__logo">
						<a href="/"><img src="<?= $general['logo'] ?>" alt="Prozheiko Dental Studio"></a>
					</div>
					<nav class="header__nav">
						<ul class="header__nav-list">
							<li class="header__nav-item">
								<a href="#" class="header__nav-link">ПРО НАС</a>
							</li>
							<li class="header__nav-item">
								<a href="/team/" class="header__nav-link">Наша команда</a>
							</li>
							<li class="header__nav-item header__nav-item--services">
								<a href="#" class="header__nav-link">Послуги та ціни</a>
								<?php
								$service_categories = get_terms([
									'taxonomy' => 'service_category',
									'hide_empty' => true,
								]);

								if (!empty($service_categories) && !is_wp_error($service_categories)) : ?>
									<div class="header__nav-subnav">
										<div class="service-section__list">
											<?php foreach ($service_categories as $category) : 
												$service_posts = new WP_Query([
													'post_type' => 'service',
													'posts_per_page' => -1,
													'tax_query' => [
														[
															'taxonomy' => 'service_category',
															'field' => 'term_id',
															'terms' => $category->term_id,
														],
													],
												]);
												?>
												<div class="service-section__item">
													<h3 class="service-section__title"><?php echo esc_html($category->name); ?></h3>
													<ul class="service-section__details">
														<?php if ($service_posts->have_posts()) : ?>
															<?php while ($service_posts->have_posts()) : 
																$service_posts->the_post(); 
																?>
																<li class="service-section__detail">
																	<a href="<?php the_permalink(); ?>" class="service-section__link"><?php the_title(); ?></a>
																</li>
															<?php endwhile; ?>
														<?php endif; ?>
													</ul>
												</div>
											<?php  
												wp_reset_postdata();
										 		endforeach; 
												?>
										</div>
									</div>
								<?php endif; ?>
							</li>
							<li class="header__nav-item">
								<a href="/blog/" class="header__nav-link">Блог</a>
							</li>
							<li class="header__nav-item">
								<a href="/contacts/" class="header__nav-link">КОНТАКТИ</a>
							</li>
						</ul>
					</nav>
					<ul class="header__phones">
						<li><a href="<?= $general['phone_1']['url'] ?>"><?= $general['phone_1']['title'] ?></a></li>
						<li><a href="<?= $general['phone_2']['url'] ?>"><?= $general['phone_2']['title'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>



