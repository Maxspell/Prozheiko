<?php $video = get_field( 'video' ) ?>
<?php if ( !$video['disabled'] ) { ?>
<section class="video">
    <div class="container">
        <div class="video__inner">
            <div class="video__header section-header">
                <div class="video__label section-label">
                    <span class="label-text"><?= $video['label'] ?></span>
                </div>
                <h2 class="video__title section-title"><?= $video['title'] ?></h2>
            </div>
            <div class="video__image" id="video-container">
                <img src="<?= $video['poster'] ?>" alt="">
                <button class="video__play" id="play-button" aria-label="Play video">
                    <svg class="play-icon" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#play"></use>
                    </svg>
                </button>
            </div>
            <div class="video__code" id="video-code">
                <?= $video['code'] ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>