<?php
$title = get_the_title(); 
$general = get_field( 'general' );
$hero = get_field( 'hero' );
?>
<?php if ( !$hero['disabled'] ) { ?>
    <section class="hero-service">
        <div class="container">
            <ul class="hero-service__list">
                <li class="hero-service__item">Ортодонтія:</li>
                <li class="hero-service__item">
                    <a href="#" class="hero-service__link active">Брекети</a>
                </li>
                <li class="hero-service__item">
                    <a href="#" class="hero-service__link">Елайнери</a>
                </li>
                <li class="hero-service__item">
                    <a href="#" class="hero-service__link">Капи</a>
                </li>
            </ul>
            <div class="hero-service__inner">
                <div class="hero-service__content">
                    <div class="hero-service__title"><?= $title ?></div>
                    <div class="hero-service__description"><?= $hero['description'] ?></div>
                    <div class="hero-service__actions">
                        <button type="button" class="button">
                            <span>Детальний прайс</span>
                            <svg class="arrow-right" aria-hidden="true">
                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                            </svg>
                        </button>
                        <span class="hero-service__price"><?= $general['price'] ?></span>
                    </div>
                </div>
                <div class="hero-service__image">
                    <img src="<?php echo esc_url( $hero['image'] ); ?>" alt="">
                </div>
            </div>
        </div>
    </section>
<?php } ?>