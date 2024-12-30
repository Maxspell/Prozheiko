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
						<?php
							wp_nav_menu([
								'theme_location' => 'header-menu',
								'container'      => false,
								'menu_class'     => 'header__nav-list',
							]);
						?>
					</nav>
					<ul class="header__phones">
						<li><a href="<?= $general['phone_1']['url'] ?>"><?= $general['phone_1']['title'] ?></a></li>
						<li><a href="<?= $general['phone_2']['url'] ?>"><?= $general['phone_2']['title'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>



