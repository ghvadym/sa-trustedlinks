<?php
return;
if (empty($fields)) {
    return;
}

$bgUrl = !empty($fields['hero_bg_desk']) ? wp_get_attachment_image_url($fields['hero_bg_desk'], 'large') : '';
$bgMob = !empty($fields['hero_bg_mob']) ? wp_get_attachment_image_url($fields['hero_bg_mob'], 'large') : '';
$earthUrl = !empty($fields['hero_earth']) ? wp_get_attachment_image_url($fields['hero_earth'], 'large') : '';
$earthMobUrl = !empty($fields['hero_earth_mob']) ? wp_get_attachment_image_url($fields['hero_earth_mob'], 'large') : '';
$flyLeftImbUrl = !empty($fields['hero_fly_img_left']) ? wp_get_attachment_image_url($fields['hero_fly_img_left'], 'large') : '';
$flyRightImbUrl = !empty($fields['hero_fly_img_right']) ? wp_get_attachment_image_url($fields['hero_fly_img_right'], 'large') : '';
$spacemanUrl = !empty($fields['hero_spaceman']) ? wp_get_attachment_image_url($fields['hero_spaceman'], 'large') : '';
?>

<section class="hero_section">
    <div class="hero__bg">
        <?php if (wp_is_mobile()) { ?>
            <?php if ($hero_bg_mobile) { ?>
                <img src="<?php echo esc_url($hero_bg_mobile); ?>" alt="Hero Image">
            <?php } ?>
        <?php } else { ?>
            <?php if ($hero_bg_url) { ?>
                <img src="<?php echo esc_url($hero_bg_url); ?>" alt="Hero Image">
            <?php } ?>
        <?php } ?>
    </div>
    <div class="container">
        <div class="hero__content">
            <?php _get_field($fields['hero_title'], 'hero__title', 'h1'); ?>
            <?php if (!empty($fields['hero_text'])) { ?>
                <div class="hero__subtitle">
                    <?php echo $fields['hero_text']; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>