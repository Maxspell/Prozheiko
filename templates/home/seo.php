<?php $seo = get_field( 'seo' ) ?>
<?php if ( !$seo['disabled'] && !empty($seo['text']) ) { ?>
<section class="seo">
    <div class="container">
        <div class="seo__inner">
            <div class="seo__text"><?= $seo['text'] ?></div>
            <div class="seo__more">
                <a href="#" class="seo__more-link">Розгорнути весь список</a>
                <svg class="arrow-right" aria-hidden="true">
                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                </svg>
            </div>
        </div>
    </div>
</section>
<?php } ?>