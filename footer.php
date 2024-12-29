<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prozheiko
 */

$general = get_field( 'general', 'options' );
?>

	<footer class="footer">
		<div class="container">
			<div class="footer__top">
				<address class="footer__contacts">
					<div class="footer__logo">
						<a href="/">
							<img src="<?= $general['logo'] ?>" alt="Логотип Prozheiko" width="216" height="39">
						</a>
					</div>
					<p class="footer__logo-slogan">Місце здорових посмішок</p>
					<nav class="footer__contact-info">
						<ul class="footer__contact-list">
							<li class="footer__phone">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#phone"></use>
								</svg>
								<a href="<?= $general['phone_1']['url'] ?>" class="footer__phone-link"><?= $general['phone_1']['title'] ?></a>
							</li>
							<li class="footer__phone">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#phone"></use>
								</svg>
								<a href="<?= $general['phone_2']['url'] ?>" class="footer__phone-link"><?= $general['phone_2']['title'] ?></a>
							</li>
							<li class="footer__email">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#email"></use>
								</svg>
								<a href="<?= $general['email']['url'] ?>" class="footer__email-link"><?= $general['email']['title'] ?></a>
							</li>
							<li class="footer__address">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#location"></use>
								</svg>
								<p class="footer__address-text"><?= $general['address'] ?></p>
							</li>
						</ul>
					</nav>
				</address>
				<div class="footer__schedule">
					<h3 class="footer__column-title footer__schedule-title">Графік роботи</h3>
					<p class="footer__schedule-text"><?= $general['schedule_1'] ?></p>
					<p class="footer__schedule-text"><?= $general['schedule_2'] ?></p>
				</div>
				<div class="footer__menu">
					<h3 class="footer__column-title footer__menu-title">Про головне</h3>
					<ul class="footer__menu-list">
						<li class="footer__menu-item"><a href="#" class="footer__menu-link">Наша команда</a></li>
						<li class="footer__menu-item"><a href="#" class="footer__menu-link">Послуги та ціни</a></li>
						<li class="footer__menu-item"><a href="#" class="footer__menu-link">Блог</a></li>
						<li class="footer__menu-item"><a href="#" class="footer__menu-link">Контакти</a></li>
					</ul>
				</div>
				<div class="footer__action">
					<button type="button" class="button popup-link" data-popup="popupForm">
						<svg class="arrow-right arrow-right--left" aria-hidden="true">
							<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
						</svg>
						<span class="button-text">ЗАПИСАТИСЬ НА ВІЗИТ</span>
						<svg class="arrow-right" aria-hidden="true">
        					<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
    					</svg>
					</button>
					<?php if ( $general['social_list'] ) : ?>
						<ul class="social-list social-list--footer">
							<?php foreach ( $general['social_list'] as $item ) : ?>
								<li><a href="<?= $item['link'] ?>"><img class="social-list__icon" src="<?= $item['icon_color'] ?>" alt=""></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="footer__copyright">
					<p class="footer__copyright-text"><?= $general['copyright'] ?></p>
				</div>
				<div class="footer__policies">
					<?php if ( !empty($general['policy_1']) ) : ?>
						<a href="<?= $general['policy_1']['url'] ?>" class="footer__policy-link"><?= $general['policy_1']['title'] ?></a>
					<?php endif; ?>
					<?php if ( !empty($general['policy_2']) ) : ?>
						<a href="<?= $general['policy_2']['url'] ?>" class="footer__policy-link"><?= $general['policy_2']['title'] ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>

</div>

<div id="popupForm" class="popup">
	<div class="popup__body">
		<div class="popup__content">
			<button class="popup__close close-popup" type="button">
				<svg class="close-icon" aria-hidden="true">
                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#close"></use>
                </svg>
			</button>
			<div class="popup__title section-title">Заплануйте свій<br/><span>візит до стоматолога</span></div>
			<?php echo do_shortcode( '[contact-form-7 id="e5d38cd" title="Feedback Form"]' ); ?>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
