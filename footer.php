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

?>

	<footer class="footer">
		<div class="container">
			<div class="footer__top">
				<address class="footer__contacts">
					<div class="footer__logo">
						<a href="/">
							<img src="/wp-content/themes/prozheiko/assets/img/logo.png" alt="Логотип Prozheiko" width="216" height="39">
						</a>
					</div>
					<p class="footer__logo-slogan">Місце здорових посмішок</p>
					<nav class="footer__contact-info">
						<ul class="footer__contact-list">
							<li class="footer__phone">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#phone"></use>
								</svg>
								<a href="tel:+380683835323" class="footer__phone-link">+38 (068) 38-38-532</a>
							</li>
							<li class="footer__phone">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#phone"></use>
								</svg>
								<a href="tel:+380733838532" class="footer__phone-link">+38 (073) 38-38-532</a>
							</li>
							<li class="footer__email">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#email"></use>
								</svg>
								<a href="mailto:clients@prozheiko.kiev.ua" class="footer__email-link">clients@prozheiko.kiev.ua</a>
							</li>
							<li class="footer__address">
								<svg class="footer__contact-icon" aria-hidden="true">
									<use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#location"></use>
								</svg>
								<p class="footer__address-text">бульвар Миколи Міхновського 6-Б</p>
							</li>
						</ul>
					</nav>
				</address>
				<div class="footer__schedule">
					<h3 class="footer__column-title footer__schedule-title">Графік роботи</h3>
					<p class="footer__schedule-text">ПН-СБ: <span>10:00-19:00</span></p>
					<p class="footer__schedule-text">Неділя: <span>Вихідний</span></p>
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
					<ul class="social-list social-list--footer">
						<li><a href="#"><img class="social-list__icon" src="/wp-content/themes/prozheiko/assets/img/facebook-color-icon.svg" alt=""></a></li>
						<li><a href="#"><img class="social-list__icon" src="/wp-content/themes/prozheiko/assets/img/instagram-color-icon.svg" alt=""></a></li>
						<li><a href="#"><img class="social-list__icon" src="/wp-content/themes/prozheiko/assets/img/youtube-color-icon.svg" alt=""></a></li>
					</ul>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="footer__copyright">
					<p class="footer__copyright-text">Усі права захищено © Стоматологічна клініка PROZHEIKO DENTAL STUDIO</p>
				</div>
				<div class="footer__policies">
					<a href="#" class="footer__policy-link">Політика конфіденційності</a>
					<a href="#" class="footer__policy-link">Договір оферти</a>
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
