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
	<header class="header lock-padding">
		<div class="header__top">
			<div class="container">
				<div class="header__inner header__inner--top">
					<div class="header__address">
						<svg width="24" height="24">
							<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#map-marker"></use>
						</svg>
                        <span class="header__address-text">Бульвар Миколи Міхновського 6-Б</span>
                    </div>
					<div class="header__schedule">
						<svg width="25" height="24">
							<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#clock"></use>
						</svg>
                        <span class="header__schedule-time">ПН-СБ: 10:00-19:00</span>
                        <span class="header__schedule-time">Неділя: Вихідний</span>
                    </div>
					<ul class="social-list">
						<li><a href="#"><img class="social-list__icon" src="/wp-content/themes/prozheiko/assets/img/facebook-icon.svg" alt=""></a></li>
						<li><a href="#"><img class="social-list__icon" src="/wp-content/themes/prozheiko/assets/img/instagram-icon.svg" alt=""></a></li>
						<li><a href="#"><img class="social-list__icon" src="/wp-content/themes/prozheiko/assets/img/youtube-icon.svg" alt=""></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header__bottom">
			<div class="container">
				<div class="header__inner header__inner--bottom">
					<div class="header__logo">
						<a href="/"><img src="/wp-content/themes/prozheiko/assets/img/logo.png" alt=""></a>
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
								<div class="header__nav-subnav">
									<div class="service-section__list">
										<div class="service-section__item">
											<h3 class="service-section__title">Гігієна та відбілювання</h3>
											<ul class="service-section__details">
												<li class="service-section__detail"><a href="#" class="service-section__link">Гігієна</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Відбілювання</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Профілактика</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Лікування ясен</a></li>
											</ul>
										</div>
										<div class="service-section__item">
											<h3 class="service-section__title">Гігієна та відбілювання</h3>
											<ul class="service-section__details">
												<li class="service-section__detail"><a href="#" class="service-section__link">Гігієна</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Відбілювання</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Профілактика</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Лікування ясен</a></li>
											</ul>
										</div>
										<div class="service-section__item">
											<h3 class="service-section__title">Гігієна та відбілювання</h3>
											<ul class="service-section__details">
												<li class="service-section__detail"><a href="#" class="service-section__link">Гігієна</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Відбілювання</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Профілактика</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Лікування ясен</a></li>
											</ul>
										</div>
										<div class="service-section__item">
											<h3 class="service-section__title">Гігієна та відбілювання</h3>
											<ul class="service-section__details">
												<li class="service-section__detail"><a href="#" class="service-section__link">Гігієна</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Відбілювання</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Профілактика</a></li>
												<li class="service-section__detail"><a href="#" class="service-section__link">Лікування ясен</a></li>
											</ul>
										</div>
									</div>
								</div>
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
						<li><a href="">+38 (068) 38-38-532</a></li>
						<li><a href="">+38 (044) 38-38-532</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>



