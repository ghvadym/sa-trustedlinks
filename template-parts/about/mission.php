<?php
if (empty($fields)) {
    return;
}

$bgUrl = !empty($fields['mission_bg_img']) ? wp_get_attachment_image_url($fields['mission_bg_img'], 'full') : '';
$imgUrl = !empty($fields['mission_img']) ? wp_get_attachment_image_url($fields['mission_img'], 'full') : '';
?>

<section class="mission">
    <?php if ($bgUrl) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($fields['mission_bg_img'] ?? ''); ?>" class="section_bg">
    <?php } ?>
    <div class="container">
        <div class="mission__row">
            <?php if ($imgUrl) { ?>
                <div class="mission__img">
                    <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo get_the_title($fields['mission_img'] ?? ''); ?>">
                </div>
            <?php } ?>
            <div class="mission__content">
                <?php _get_field($fields['mission_title'] ?? '', 'mission__title', 'h2'); ?>
                <?php if ($text = $fields['mission_text'] ?? '') { ?>
                    <div class="mission__text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>