<?php if (have_posts()) : while (have_posts()) : the_post(); 
$general = get_field('general');
$experience = get_field('experience');
$certificates = get_field('certificates');
?>
    <section class="profile">
        <div class="container">
            <div class="profile__inner">
                <a href="/team/" class="profile__return-link--mobile">
                    <svg class="arrow-left" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                    </svg>
                    <span>Всі лікарі</span>
                </a>
                <div class="profile__image">
                    <?php if ( !empty($general['image'])) : ?>
                        <img src="<?= esc_url($general['image']); ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="profile__content">
                    <div class="profile__head">
                        <a href="/team/" class="profile__return-link">
                            <svg class="arrow-left" aria-hidden="true">
                                <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                            </svg>
                            <span>Всі лікарі</span>
                        </a>
                        <h1 class="profile__title"><?php the_title(); ?></h1>
                        <p class="profile__subtitle"><?php echo esc_html($general['role']); ?></p>
                    </div>
                    <?php if ( !empty( $general['services'] ) ) : ?>
                        <ul class="doctors__services profile__services">
                        <?php foreach ( $general['services'] as $service ) : ?>
                            <li class="doctors__service">
                                <svg class="check-icon" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                </svg>
                                <?= $service['service'] ?>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <button type="button" class="profile__button button popup-link" data-popup="popupForm">
                        <svg class="arrow-right arrow-right--left" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                        <span class="button-text">ЗАПИСАТИСЬ НА ВІЗИТ</span>
                        <svg class="arrow-right" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                    </button>
                    <div class="profile__description">
                        <?php echo $general['description']; ?>
                    </div>
                    <?php if ( !empty($experience['list'])) : ?>
                        <div class="profile__experience">
                            <h2 class="profile__experience-title">Експертиза</h2>
                            <ul class="profile__experience-list">
                                <?php foreach ($experience['list'] as $item) : ?>
                                    <li class="profile__experience-item">
                                        <div class="profile__experience-item-years">
                                            <span><?= $item['year'] ?></span>
                                        </div>
                                        <div class="profile__experience-item-text">
                                            <?= $item['text'] ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php if ( !empty($certificates['list'])) : ?>
        <?php get_template_part('templates/team/certificates', null, ['certificates' => $certificates]); ?>
    <?php endif; ?>
<?php endwhile; endif; ?>