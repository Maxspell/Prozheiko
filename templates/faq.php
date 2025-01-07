<?php $faq = get_field( 'faq' ) ?>
<?php if ( !$faq['disabled'] ) { ?>
    <section class="faq">
        <div class="container">
            <div class="faq__inner">
                <div class="faq__header section-header">
                    <div class="faq__label section-label">
                        <span class="label-text"><?= $faq['label'] ?></span>
                    </div>
                    <h2 class="faq__title section-title"><?= $faq['title'] ?></h2>
                    <div class="faq__more section-more">
                        <svg class="arrow-right arrow-right--color" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                        <a href="#" class="section-more__link popup-link" data-popup="popupForm">Поставити запитання</a>
                        <svg class="arrow-right" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                    </div>
                </div>
                <?php if ( !empty( $faq['list'] ) ) : ?>
                    <div class="faq__items">
                        <?php foreach ( $faq['list'] as $item ) : ?>
                            <div class="faq__item">
                                <div class="faq__item-head">
                                    <div class="faq__item-title"><?= $item['question'] ?></div>
                                    <div class="angle-up-icons">
                                        <svg class="angle-up-icon angle-up-icon--primary" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-up"></use>
                                        </svg>
                                        <svg class="angle-up-icon angle-up-icon--secondary" aria-hidden="true">
                                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-up"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="faq__item-content"><?= $item['answer'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php } ?>