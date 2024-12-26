<?php $clinic_offers = get_field( 'clinic_offers' ) ?>
<?php if ( !$clinic_offers['disabled'] ) { ?>
<section class="clinic-offers">
    <div class="container">
        <div class="clinic-offers__inner">
            <div class="steps__header section-header">
                <div class="steps__label section-label">
                    <span class="label-text"><?= $clinic_offers['label'] ?></span>
                </div>
                <h2 class="steps__title section-title"><?= $clinic_offers['title'] ?></h2>
            </div>
            <div class="clinic-offers__content">
                <?php if ( !empty( $clinic_offers['list'] ) ) : ?>
                <ul class="clinic-offers__list">
                    <?php foreach ( $clinic_offers['list'] as $index => $offer ) : ?>
                        <li class="clinic-offers__item">
                            <div class="clinic-offers__item-icon">
                                <span><?= $index + 1 ?></span>
                                <svg class="clinic-offers-icon" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#card-logo"></use>
                                </svg>
                            </div>
                            <div class="clinic-offers__item-content">
                                <div class="clinic-offers__item-head">
                                    <div class="clinic-offers__item-title"><?= $offer['title'] ?></div>
                                    <div class="clinic-offers__item-price"><?= $offer['price'] ?></div>
                                </div>
                                <div class="clinic-offers__item-description"><?= $offer['description'] ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <div class="clinic-offers__image">
                    <img src="/wp-content/themes/prozheiko/assets/img/clinic-offers.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>