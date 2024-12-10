<?php $seo = get_field( 'seo' ) ?>
<?php if ( !$seo['disabled'] && !empty($seo['text']) ) { ?>
<section class="seo">
    <div class="container">
        <div class="seo__inner">
            <div class="seo__text"><?= $seo['text'] ?></div>
        </div>
    </div>
</section>
<?php } ?>