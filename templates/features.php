<?php $features = get_field( 'features' ) ?>
<?php if ( !$features['disabled'] ) { ?>
<section class="features">
    <div class="container">
        <div class="features__inner">
            <div class="features__header section-header">
                <div class="features__label section-label">
                    <span class="label-text"><?= $features['label'] ?></span>
                </div>
                <h2 class="features__title section-title"><?= $features['title'] ?></h2>
            </div>
            <?php if ( !empty( $features['list'] ) ) : ?>
            <ul class="features__list">
                <?php foreach ( $features['list'] as $feature ) : ?>
                    <li class="features__item">
                        <div class="features__item-icon">
                            <img src="<?php echo esc_url( $feature['icon'] ); ?>" alt="">
                        </div>
                        <h3 class="features__item-title"><?= $feature['title'] ?></h3>
                        <p class="features__item-description"><?= $feature['description'] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php } ?>