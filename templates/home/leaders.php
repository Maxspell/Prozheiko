<?php $leaders = get_field( 'leaders' ) ?>
<?php if ( !$leaders['disabled'] ) { ?>
<section class="leaders">
    <div class="container">
        <div class="leaders__inner">
            <img class="leaders__image" src="/wp-content/themes/prozheiko/assets/img/leaders.jpg" alt="">
            <div class="leaders__overlay--left">
                <div class="leaders__overlay-icons">
                    <svg class="quotes-icon" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#quotes"></use>
                    </svg>
                    <svg class="close-leaders-primary-icon" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#close-leaders-primary"></use>
                    </svg>
                </div>
            </div>
            <div class="leaders__overlay--right">
                <div class="leaders__overlay-icons">
                    <svg class="quotes-icon" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#quotes"></use>
                    </svg>
                    <svg class="close-leaders-secondary-icon" aria-hidden="true">
                        <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#close-leaders-secondary"></use>
                    </svg>
                </div>
            </div>
            <div class="leaders__content">
                <div class="leaders__item">
                    <div class="leaders__title"><?= $leaders['title_1'] ?></div>
                    <div class="leaders__subtitle"><?= $leaders['subtitle_1'] ?></div>
                    <?php if ( !empty($leaders['services_1']) ) { ?>
                        <ul class="leaders__services">
                        <?php foreach ( $leaders['services_1'] as $item ) { ?>
                            <li class="leaders__service">
                                <svg class="check-icon" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                </svg>
                                <?= $item['service'] ?>
                            </li>
                        <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="leaders__item">
                    <div class="leaders__title"><?= $leaders['title_2'] ?></div>
                    <div class="leaders__subtitle"><?= $leaders['subtitle_2'] ?></div>
                    <?php if ( !empty($leaders['services_2']) ) { ?>
                        <ul class="leaders__services">
                        <?php foreach ( $leaders['services_2'] as $item ) { ?>
                            <li class="leaders__service">
                                <svg class="check-icon" aria-hidden="true">
                                    <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#check"></use>
                                </svg>
                                <?= $item['service'] ?>
                            </li>
                        <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>    
        </div>
    </div>
</section>
<?php } ?>