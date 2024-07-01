<?php
$fields = acf_option('contact_form');

if (empty($fields)) {
    return;
}

$formId = $fields['form_id'] ?? 0;

if (!$formId) {
    return;
}

$form = '[contact-form-7 id="' . esc_attr($formId) . '" html_class="contact-form-popup"]' ?? '';

$imgId = $fields['img'] ?? '';

if ($imgId) {
    $imgUrl = wp_get_attachment_image_url($imgId, 'full');
}
?>

<div id="tl-contact-form" class="modal_window">
    <div class="modal_window__bg"></div>
    <div class="modal_window__wrap">
        <?php if (!empty($imgUrl)) { ?>
            <div class="modal_window__img">
                <img src="<?php echo esc_attr($imgUrl); ?>"
                     alt="<?php echo get_the_title($imgId); ?>">
            </div>
        <?php } ?>
        <div class="modal_window__body white_theme">
            <?php if ($title = $fields['title'] ?? '') { ?>
                <p class="title modal_window__title">
                    <?php echo $title; ?>
                </p>
            <?php } ?>
            <?php if ($subtitle = $fields['subtitle'] ?? '') { ?>
                <p class="subtitle modal_window__subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
            <div class="modal_window__form">
                <?php echo do_shortcode($form); ?>
            </div>
            <div class="modal_window__icon_close">
                <img src="<?php img_url('Close.svg') ?>" alt="Close" class="popup_close_icon">
            </div>
        </div>
    </div>
</div>