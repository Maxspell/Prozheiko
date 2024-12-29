 <?php $smile = get_field( 'smile' ) ?>
<?php if ( !$smile['disabled'] ) { ?>
<section class="smile">
    <div class="container">
        <ul class="smile__items">        
            <li class="smile__item">
                <span>01</span>
                <span class="smile__item-text"><?= $smile['text_1'] ?></span>
            </li>
            <li class="smile__item">
                <span>02</span>
                <span class="smile__item-text"><?= $smile['text_2'] ?></span>
            </li>
            <li class="smile__item">
                <span>03</span>
                <span class="smile__item-text"><?= $smile['text_3'] ?></span>
            </li>
            <li class="smile__item">
                <span>04</span>
                <span class="smile__item-text"><?= $smile['text_4'] ?></span>
            </li>
        </ul>
    </div>
</section>
<?php } ?> 