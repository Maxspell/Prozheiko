<?php $contact_form = get_field( 'contact_form' ) ?>
<?php if ( !$contact_form['disabled'] ) { ?>
<section class="contact-form">
    <div class="container">
        <div class="contact-form__inner">
            <div class="contact-form__formbox">
                <h2 class="contact-form__title section-title"><?= $contact_form['title'] ?></h2>
                <?php echo do_shortcode( '[contact-form-7 id="b3c5212" title="Contact Form" html_class="contact-form__form"]' ); ?>
            </div>
            <div class="contact-form__image">
                <img src="<?= $contact_form['image'] ?>" alt="">
            </div>
        </div>
    </div>
</section>
<?php } ?>