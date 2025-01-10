<?php $reviews = get_field( 'reviews' ) ?>
<?php if ( !$reviews['disabled'] ) { ?>
    <section class="reviews">
        <div class="container">
            <div class="reviews__inner">
                <div class="reviews__header section-header">
                    <div class="reviews__label section-label">
                        <span class="label-text"><?= $reviews['label'] ?></span>
                    </div>
                    <h2 class="reviews__title section-title"><?= $reviews['title'] ?></h2>
                </div>
                <?php if ( !empty( $reviews['list'] ) ) : ?>
                    <div class="swiper reviews__slider">
                        <div class="swiper-wrapper">
                            <?php foreach ( $reviews['list'] as $item ) : 
                                $review_type = get_field( 'general_review_type', $item->ID );
                                $review_video = get_field( 'general_video', $item->ID );
                                $review_video_image = get_field( 'general_video_image', $item->ID );
                                $review_before_image = get_field( 'general_before_image', $item->ID );
                                $review_after_image = get_field( 'general_after_image', $item->ID );
                                $review_normal_image = get_field( 'general_normal_image', $item->ID );
                                $review_large_image = get_field( 'general_large_image', $item->ID );
                                ?>
                                <?php if ( $review_type == 'video' ) { ?>
                                    <div class="swiper-slide reviews__slide reviews__slide--video">
                                        <a href="#reviewsVideo" class="reviews__slide-link" data-fancybox="gallery">
                                            <img class="reviews__slide-img" src="<?php echo esc_url( $review_video_image ); ?>" alt="">
                                            <div class="reviews__slide-meta">
                                                <div class="reviews__slide-badge">Відео відгук</div>
                                                <div class="reviews__slide-badge">Послуга</div>
                                                <svg class="instagram-icon" aria-hidden="true">
                                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#instagram"></use>
                                                </svg>
                                            </div>
                                            <button class="video__play" aria-label="Play video">
                                                <svg class="play-icon" aria-hidden="true">
                                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#play"></use>
                                                </svg>
                                            </button>
                                        </a>
                                        <div class="hidden">
                                            <video controls autoplay class="reviews__video" id="reviewsVideo">
                                                <source src="<?php echo esc_url( $review_video ); ?>" type="video/mp4">
                                            </video> 
                                        </div>
                                    </div>
                                <?php } elseif ( $review_type == 'comparison' ) { ?>
                                    <div class="swiper-slide reviews__comparison">
                                        <img class="reviews__comparison-img reviews__comparison-img--active" src="<?php echo esc_url( $review_before_image ); ?>" alt="">
                                        <img class="reviews__comparison-img reviews__comparison-img--prev" src="<?php echo esc_url( $review_after_image ); ?>" alt="">
                                        <div class="reviews__slide-action">
                                            <svg class="angle-left-icon" aria-hidden="true">
                                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-left"></use>
                                            </svg>
                                            <span class="reviews__comparison-label">До</span>
                                            <svg class="angle-right-icon" aria-hidden="true">
                                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-right"></use>
                                            </svg>
                                        </div>
                                    </div>
                                <?php } elseif ( $review_type == 'normal' ) { ?>
                                    <div class="swiper-slide reviews__slide">
                                        <a href="<?php echo esc_url( $review_large_image ); ?>" class="reviews__slide-link" data-fancybox="gallery">
                                            <img class="reviews__slide-img" src="<?php echo esc_url( $review_normal_image ); ?>" alt="">
                                            <div class="reviews__slide-meta">
                                                <div class="reviews__slide-badge">Відгук</div>
                                                <div class="reviews__slide-badge">Послуга</div>
                                                <svg class="instagram-icon" aria-hidden="true">
                                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#instagram"></use>
                                                </svg>
                                            </div>
                                            <button class="video__play" aria-label="Play video">
                                                <svg class="play-icon" aria-hidden="true">
                                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#play"></use>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-actions">
                            <div class="swiper-pagination"></div>
                            <div class="reviews__buttons">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                            <?php if ( !empty($reviews['more_link']) ) { ?>
                                <div class="reviews__more">
                                    <svg class="arrow-right arrow-right--color" aria-hidden="true">
                                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                    </svg>
                                    <a href="<?= $reviews['more_link'] ?>" class="reviews__more-link" target="_blank">Більше відгуків в нашому Instagram</a>
                                    <svg class="arrow-right" aria-hidden="true">
                                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                                    </svg>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php } ?>
