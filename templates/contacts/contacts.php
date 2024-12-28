<?php 
$general = get_field( 'general' );
$general_options = get_field( 'general', 'options' );
?>
<section class="contacts">
    <div class="container">
        <div class="contacts__inner">
            <h1 class="contacts__title section-title"><?= $general['title'] ?></h1>
            <div class="contacts__content">
                <div class="contacts__list">
                    <div class="contacts__item">
                        <div class="contacts__item-col">
                            <div class="contacts__item-title">Адреса</div>
                            <p class="contacts__item-address"><?= $general_options['address'] ?></p>
                        </div>
                        <div class="contacts__item-col">
                            <div class="contacts__item-title">Телефон</div>
                            <ul class="contacs__item-list">
                                <li><a class="contacts__item-link" href="<?= $general_options['phone_1']['url'] ?>"><?= $general_options['phone_1']['title'] ?></a></li>
                                <li><a class="contacts__item-link" href="<?= $general_options['phone_2']['url'] ?>"><?= $general_options['phone_2']['title'] ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="contacts__item">
                        <div class="contacts__item-col">
                            <div class="contacts__item-title">Електронна адреса</div>
                            <a class="contacts__item-link" href="<?= $general_options['email']['url'] ?>"><?= $general_options['email']['title'] ?></a>
                        </div>
                        <div class="contacts__item-col">
                            <div class="contacts__item-title">Соцмережі</div>
                            <?php if ( $general_options['social_list'] ) : ?>
                                <ul class="social-list">
                                    <?php foreach ( $general_options['social_list'] as $item ) : ?>
                                        <li><a href="<?= $item['link'] ?>"><img class="social-list__icon" src="<?= $item['icon_color'] ?>" alt=""></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="contacts__map"><?= $general['map'] ?></div>
            </div>
        </div>
    </div>
</section>