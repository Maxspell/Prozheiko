<?php
$title = get_the_title(); 
$general = get_field( 'general' );
$hero = get_field( 'hero' );
?>
<?php if ( !$hero['disabled'] ) { ?>
    <section class="hero-service">
        <div class="container">
            <?php
            $categories = get_the_terms(get_the_ID(), 'service_category');

            if ($categories && !is_wp_error($categories)) :
                foreach ($categories as $category) :
                    echo '<ul class="hero-service__list">';
                    echo '<li class="hero-service__item">' . esc_html($category->name) . ':</li>';

                    $query_args = [
                        'post_type' => 'service',
                        'tax_query' => [
                            [
                                'taxonomy' => 'service_category',
                                'field'    => 'term_id',
                                'terms'    => $category->term_id,
                            ],
                        ],
                        'post_status' => 'publish',
                    ];

                    $query = new WP_Query($query_args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();

                            $active_class = (get_the_ID() === get_queried_object_id()) ? ' active' : '';

                            echo '<li class="hero-service__item">';
                            echo '<a href="' . get_permalink() . '" class="hero-service__link' . $active_class . '">' . get_the_title() . '</a>';
                            echo '</li>';
                        endwhile;
                    endif;

                    wp_reset_postdata();

                    echo '</ul>';
                endforeach;
            endif;
            ?>
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