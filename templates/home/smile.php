<?php $smile = get_field( 'smile' ) ?>
<?php if ( !$smile['disabled'] ) { ?>
<section class="smile">
    <div class="container">
        <ul class="smile__items">        
            <li class="smile__item">
                <span><?= $smile['text_1'] ?></span>
            </li>
            <li class="smile__item">
                <span><?= $smile['text_2'] ?></span>
            </li>
            <li class="smile__item">
                <span><?= $smile['text_3'] ?></span>
            </li>
            <li class="smile__item">
                <span><?= $smile['text_4'] ?></span>
            </li>
        </ul>
    </div>
</section>
<?php } ?>