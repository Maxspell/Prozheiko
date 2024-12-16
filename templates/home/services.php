<?php $services = get_field( 'services' ); ?>
<?php if ( !$services['disabled'] ) { ?>
<section class="services">
    <div class="container">
        <div class="services__header section-header">
            <div class="services__label section-label">
                <span class="label-text"><?= $services['label'] ?></span>
            </div>
            <h2 class="services__title section-title"><?= $services['title'] ?></h2>
        </div>
        <?php if ( !empty( $services['service_categories'] ) ) { ?>
            <ul class="services__list">
                <?php foreach ( $services['service_categories'] as $index => $term ) { ?>
                    <li class="services__item">
                        <div class="services__item-meta">
                            <div class="services__item-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bleaching-icon.svg" alt="">
                            </div>
                            <div class="services__item-num">0<?= $index + 1 ?></div>
                        </div>
                        <h3 class="services__item-title"><?= esc_html( $term->name ) ?></h3>

                        <?php 
                        $args = array(
                            'post_type' => 'service',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service_category',
                                    'field'    => 'term_id',
                                    'terms'    => $term->term_id,
                                ),
                            ),
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) : ?>
                            <ul class="services__item-list">
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <li class="services__item-detail">
                                        <span class="services__item-detail-name"><?php the_title(); ?></span>
                                        <span class="services__item-detail-price">
                                            <?= get_field( 'price' ) ? 'від ' . esc_html( get_field( 'price' ) ) . ' грн' : ''; ?>
                                        </span>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php 
                        endif; 
                        wp_reset_postdata(); 
                        ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</section>
<?php } ?>