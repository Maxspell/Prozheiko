<?php $hero = get_field( 'hero' ) ?>
<?php if ( !$hero['disabled'] ) { ?>
<section class="hero" style="background-image: url(<?= $hero['image'] ?>);">
    <div class="container">
        <div class="hero__content">
        <?php if ( !empty($hero['title']) ) { ?>
            <h1 class="hero__title"><?= $hero['title'] ?></h1>
        <?php } ?>
        <?php if ( !empty($hero['subtitle']) ) { ?>
            <p class="hero__subtitle"><?= $hero['subtitle'] ?></p>
        <?php } ?>
            <div class="hero__button">
                <button type="button" class="button popup-link" data-popup="popupForm">
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