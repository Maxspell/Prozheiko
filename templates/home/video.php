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
                <?php if ( !empty($video['more_link']) ) { ?>
                    <div class="video__more section-more">
                        <svg class="arrow-right arrow-right--color" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                        <a href="<?= $video['more_link'] ?>" class="section-more__link" target="_blank">Більше наших відео на youtube каналі</a>
                        <svg class="arrow-right" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                    </div>
                <?php } ?>
            </div>
            <div class="video__image" id="video-container">
                <img class="video__poster--desktop" src="<?= $video['poster'] ?>" alt="">
                <img class="video__poster--mobile" src="<?= $video['poster_mobile'] ?>" alt="">
                <button class="video__play" id="play-button" aria-label="Play video"></button>
            </div>
            <?php if (!empty($video['code'])) { ?>
                <div class="video__code" id="video-code">
                    <?= $video['code'] ?>
                </div>
            <?php } elseif (!empty($video['file']) && !empty($video['file_mobile'])) { ?>
                <video controls class="video__file" id="video-file">
                    <source id="video-source" src="<?= $video['file'] ?>" type="video/mp4">
                </video>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const video = document.getElementById("video-file");
                        const source = document.getElementById("video-source");

                        const updateVideoSource = () => {
                            const isMobile = window.innerWidth <= 480;
                            const newSrc = isMobile ? "<?= $video['file_mobile'] ?>" : "<?= $video['file'] ?>";

                            if (source.src !== newSrc) {
                                const wasPlaying = !video.paused;
                                console.log(wasPlaying);
                                const currentTime = video.currentTime;

                                source.src = newSrc;
                                video.load();
                                video.currentTime = currentTime;

                                if (wasPlaying) {
                                    video.play();
                                } else {
                                    video.pause();
                                }
                            }
                        };

                        updateVideoSource();

                        window.addEventListener("resize", updateVideoSource);
                    });
                </script>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>