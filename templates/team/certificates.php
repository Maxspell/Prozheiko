<?php
if ( isset( $args['certificates'] ) && !empty( $args['certificates'] ) ) :
    $certificates = $args['certificates'];
?>
<section class="certificates">
    <div class="container">
        <div class="certificates__inner">
            <h2 class="certificates__title"><?php echo $certificates['title'] ?></h2>
            <div class="swiper certificates__slider">
                <div class="swiper-wrapper">
                    <?php foreach ( $certificates['list'] as $certificate ) : ?>
                        <div class="swiper-slide certificates__slide">
                            <img src="<?php echo esc_url( $certificate ); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-actions">
                    <div class="swiper-pagination"></div>
                    <div class="reviews__buttons">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>