<?php
$cta = acf_option('cta_footer');

$title = $cta['title'] ?? '';
$subtitle = $cta['subtitle'] ?? '';
$btnText = $cta['button_text'] ?? '';
$imgId = $cta['img'] ?? '';

if ($imgId) {
    $imgUrl = wp_get_attachment_image_url($imgId, 'full');
}
?>

<section class="cta">
    <div class="container">
        <div class="cta__body">
            <?php if (!empty($imgUrl)) { ?>
                <div class="cta__img">
                    <img src="<?php echo esc_attr($imgUrl); ?>" alt="CTA Footer Spaceman">
                </div>
            <?php } ?>
            <div class="cta__content">
                <?php if ($title) { ?>
                    <div class="cta__title">
                        <?php echo $title; ?>
                    </div>
                <?php } ?>
                <?php if ($subtitle) { ?>
                    <div class="cta__text">
                        <?php echo text_spaces_control($subtitle); ?>
                    </div>
                <?php } ?>
                <div class="cta__btn btn_dark popup_open">
                    <?php echo $btnText ?: __('Contact Us', DOMAIN); ?>
                </div>
            </div>
        </div>
    </div>
</section>


