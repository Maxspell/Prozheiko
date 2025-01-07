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
                    <?php if ( !empty( $price['doctors'] ) ) : ?>
                        <div class="swiper doctors__slider">
                            <div class="swiper-wrapper">
                                <?php foreach ( $price['doctors'] as $item ) : ?>
                                    <div class="swiper-slide doctors__slide">
                                        <?php 
                                            $doctor_image = get_field( 'general_image', $item->ID );
                                            $doctor_role = get_field( 'general_role', $item->ID );
                                            $doctor_services = get_field( 'general_services', $item->ID );
                                        ?>
                                        <img src="<?php echo esc_url( $doctor_image ); ?>" alt="">
                                        <div class="doctors__slide-title"><?php echo esc_html( $item->post_title ); ?></div>
                                        <div class="doctors__slide-subtitle"><?php echo esc_html( $doctor_role ); ?></div>
                                        <?php if ( !empty( $doctor_services ) ) : ?>
                                            <ul class="doctors__services">
                                                <?php foreach ( $doctor_services as $service ) : ?>
                                                    <?php if ( !empty( $service['service'] ) ) : ?>
                                                        <li class="doctors__service">
                                                            <svg class="check-icon" aria-hidden="true">
                                                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                                            </svg>
                                                            <?php echo esc_html( $service['service'] ); ?>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?> 
                                            </ul>
                                        <?php endif; ?> 
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
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-actions">
                                <div class="swiper-pagination"></div>
                                <div class="reviews__buttons">
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>