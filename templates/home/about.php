<?php $about = get_field( 'about' ) ?>
<?php if ( !$about['disabled'] ) { ?>
<section class="about">
    <div class="container">
        <div class="about__header section-header">
            <div class="about__label section-label">
                <span class="label-text"><?= $about['label'] ?></span>
            </div>
            <h2 class="about__title section-title"><?= $about['title'] ?></h2>
        </div>
        <div class="about__inner">
            <div class="about__content">
            <?php if ( !empty($about['tabs']) ) { ?>
                <div class="tabs">
                    <div class="tabs__nav">
                    <?php foreach ( $about['tabs'] as $index => $item ) { ?>
                        <button 
                            class="tabs__button <?php echo $index === 0 ? 'tabs__button--active' : ''; ?>" 
                            data-tab="aboutTab-<?php echo $index + 1; ?>">
                            <?= $item['title'] ?>
                        </button>
                    <?php } ?>
                    </div>
                    <div class="tabs__content">
                    <?php foreach ( $about['tabs'] as $index => $item ) { ?>
                        <div 
                            class="tabs__panel <?php echo $index === 0 ? 'tabs__panel--active' : ''; ?>" 
                            id="aboutTab-<?php echo $index + 1; ?>">
                            <?= $item['content'] ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="accordion">
                    <?php foreach ( $about['tabs'] as $index => $item ) { ?>
                        <div class="accordion__item">
                            <button class="accordion__header" aria-expanded="false" aria-controls="panel-<?= $index + 1; ?>">
                                <span><?= $item['title'] ?></span>
                                <svg class="angle-up-icon angle-up-icon--accordion" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#angle-up"></use>
                                </svg>
                            </button>
                            <div class="accordion__content" id="panel-<?= $index + 1; ?>">
                                <?= $item['content'] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
            <div class="about__contact-card contact-card">
                <div class="contact-card__logo">
                    <svg class="card-logo-icon" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#card-logo"></use>
                    </svg>
                </div>
                <address class="contact-card__details">
                    <a href="tel:+380683838532" class="contact-card__phone">+38 (068) 38-38-532</a>
                    <a href="mailto:clients@prozheiko.kiev.ua" class="contact-card__email">clients@prozheiko.kiev.ua</a>
                    <p class="contact-card__address">бул-р Миколи Міхновського 6-Б</p>
                </address>
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
        </div>
    </div>
</section>
<?php } ?>