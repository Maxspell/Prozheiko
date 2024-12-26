<?php $steps = get_field( 'steps' ) ?>
<?php if ( !$steps['disabled'] ) { ?>
    <section class="steps">
        <div class="container">
            <div class="steps__inner">
                <div class="steps__header section-header">
                    <div class="steps__label section-label">
                        <span class="label-text"><?= $steps['label'] ?></span>
                    </div>
                    <h2 class="steps__title section-title"><?= $steps['title'] ?></h2>
                </div>
                <?php if ( !empty( $steps['list'] ) ) : ?>
                    <div class="swiper steps__slider">
                        <div class="swiper-wrapper">
                            <?php foreach ( $steps['list'] as $index => $step ) : ?>
                                <?php $number = sprintf('%02d', $index + 1); ?>
                                <div class="swiper-slide steps__slide">
                                    <h3 class="steps__slide-title"><?= $step['title'] ?></h3>
                                    <div class="steps__slide-description"><?= $step['description'] ?></div>
                                    <div class="steps__slide-num"><?= $number ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php } ?>