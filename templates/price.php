<?php $price = get_field( 'price' ) ?>
<?php if ( !$price['disabled'] ) { ?>
    <section class="price">
        <div class="container">
            <div class="price__inner">
                <div class="price__header section-header">
                    <div class="price__label section-label">
                        <span class="label-text"><?= $price['label'] ?></span>
                    </div>
                    <h2 class="price__title section-title"><?= $price['title'] ?></h2>
                </div>
                <div class="price__content">
                    <div class="price__list-wrapper">
                        <?php if ( !empty( $price['list'] ) ) : ?>
                            <ul class="price__list">
                                <?php foreach ( $price['list'] as $index => $item ) : ?>
                                    <li class="price__item">
                                        <div class="price__item-head">
                                            <h3 class="price__item-title"><?= $item['title'] ?></h3>
                                            <div class="price__item-price"><?= $item['price'] ?></div>
                                        </div>
                                        <?php if ( !empty( $item['description'] ) ) : ?>
                                            <div class="price__item-decription"><?= $item['description'] ?></div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="section-more price__list-more">
                                <a href="#" class="section-more__link">Розгорнути весь список</a>
                                <svg class="arrow-right" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper doctors__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide doctors__slide">
                                <img src="/wp-content/themes/prozheiko/assets/img/doctor.jpg" alt="">
                                <div class="doctors__slide-title">Прожейко Сергій</div>
                                <div class="doctors__slide-subtitle">Головний лікар, Лікар-ортопед</div>
                                <ul class="doctors__services">
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Вініри
                                    </li>
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Реставрація зубів
                                    </li>
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Протезування
                                    </li>
                                </ul>
                                <button type="button" class="contact-form__button button">
                                    <span>ЗАПИСАТИСЬ НА ВІЗИТ</span>
                                    <svg class="arrow-right" aria-hidden="true">
                                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="swiper-slide doctors__slide">
                                <img src="/wp-content/themes/prozheiko/assets/img/doctor.jpg" alt="">
                                <div class="doctors__slide-title">Прожейко Сергій</div>
                                <div class="doctors__slide-subtitle">Головний лікар, Лікар-ортопед</div>
                                <ul class="doctors__services">
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Вініри
                                    </li>
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Реставрація зубів
                                    </li>
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Протезування
                                    </li>
                                </ul>
                                <button type="button" class="contact-form__button button">
                                    <span>ЗАПИСАТИСЬ НА ВІЗИТ</span>
                                    <svg class="arrow-right" aria-hidden="true">
                                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="swiper-slide doctors__slide">
                                <img src="/wp-content/themes/prozheiko/assets/img/doctor.jpg" alt="">
                                <div class="doctors__slide-title">Прожейко Сергій</div>
                                <div class="doctors__slide-subtitle">Головний лікар, Лікар-ортопед</div>
                                <ul class="doctors__services">
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Вініри
                                    </li>
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Реставрація зубів
                                    </li>
                                    <li class="doctors__service">
                                        <svg class="check-icon" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                        </svg>
                                        Протезування
                                    </li>
                                </ul>
                                <button type="button" class="contact-form__button button">
                                    <span>ЗАПИСАТИСЬ НА ВІЗИТ</span>
                                    <svg class="arrow-right" aria-hidden="true">
                                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="swiper-actions">
                            <div class="swiper-pagination"></div>
                            <div class="reviews__buttons">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>