<?php
if (empty($fields)) {
    return;
}

$bgUrl = !empty($fields['hero_bg_desk']) ? wp_get_attachment_image_url($fields['hero_bg_desk'], 'full') : '';
$bgMobUrl = !empty($fields['hero_bg_mob']) ? wp_get_attachment_image_url($fields['hero_bg_mob'], 'full') : '';
$earthUrl = !empty($fields['hero_earth']) ? wp_get_attachment_image_url($fields['hero_earth'], 'full') : '';
$flyLeftImbUrl = !empty($fields['hero_fly_img_left']) ? wp_get_attachment_image_url($fields['hero_fly_img_left'], 'full') : '';
$flyRightImbUrl = !empty($fields['hero_fly_img_right']) ? wp_get_attachment_image_url($fields['hero_fly_img_right'], 'full') : '';
$spacemanUrl = !empty($fields['hero_spaceman']) ? wp_get_attachment_image_url($fields['hero_spaceman'], 'full') : '';
?>

<section class="hero_section">
    <div class="hero__bg">
        <?php if (wp_is_mobile()) { ?>
            <?php if ($bgUrl) { ?>
                <img src="<?php echo esc_url($bgUrl); ?>" class="hero__bg_main section_bg" alt="<?php echo esc_attr(get_the_title($fields['hero_bg_desk'])); ?>">
            <?php } ?>
        <?php } else { ?>
            <?php if ($bgUrl) { ?>
                <img src="<?php echo esc_url($bgUrl); ?>" class="hero__bg_main section_bg" alt="<?php echo esc_attr(get_the_title($fields['hero_bg_mob'])); ?>">
            <?php } ?>
        <?php } ?>
        <?php if ($spacemanUrl) { ?>
            <div class="hero__bg_spaceman">
                <img src="<?php echo esc_url($spacemanUrl); ?>" class="hero__spaceman" alt="<?php echo esc_attr(get_the_title($fields['hero_spaceman'])); ?>">
                <img src="<?php echo img_url('cable-left.svg'); ?>" class="hero__spaceman_cable_left" alt="Cable left">
                <img src="<?php echo img_url('cable-right.svg'); ?>" class="hero__spaceman_cable_right" alt="Cable right">
            </div>
        <?php } ?>
    </div>
    <div class="container">
        <div class="hero__images">
            <?php if ($flyLeftImbUrl) { ?>
                <img src="<?php echo esc_url($flyLeftImbUrl); ?>" class="hero__bg_fly_left" alt="<?php echo esc_attr(get_the_title($fields['hero_fly_img_left'])); ?>">
            <?php } ?>
            <?php if ($flyRightImbUrl) { ?>
                <img src="<?php echo esc_url($flyRightImbUrl); ?>" class="hero__bg_fly_right" alt="<?php echo esc_attr(get_the_title($fields['hero_fly_img_right'])); ?>">
            <?php } ?>
            <?php if ($earthUrl) { ?>
                <img src="<?php echo esc_url($earthUrl); ?>" class="hero__bg_earth" alt="<?php echo esc_attr(get_the_title($fields['hero_earth'])); ?>">
            <?php } ?>
        </div>
        <div class="hero__content">
            <?php if (!empty($fields['hero_title'])) { ?>
                <h1 class="d-none">
                    <?php echo strip_tags($fields['hero_title']); ?>
                </h1>
                <h2 class="hero__title">
                    <?php echo $fields['hero_title']; ?>
                </h2>
            <?php } ?>
            <?php if ($fields['hero_text'] ?? '') { ?>
                <p class="hero__text">
                    <?php echo text_spaces_control($fields['hero_text']); ?>
                </p>
            <?php } ?>
            <?php _get_field($fields['hero_link_text'] ?? '', 'hero__btn btn_light popup_open'); ?>
            <?php if ($fields['hero_subtitle'] ?? '') { ?>
                <p class="hero__subtitle">
                    <?php echo text_spaces_control($fields['hero_subtitle']); ?>
                </p>
            <?php } ?>
            <?php
            $partners = acf_option('partners');
            if (!empty($partners)) { ?>
                <div class="hero__partners">
                    <?php foreach ($partners as $partnerImg) {
                        $partnerImgId = $partnerImg['img'] ?? '';

                        if (!$partnerImgId) {
                            continue;
                        }

                        $partnerImgUrl = wp_get_attachment_image_url($partnerImgId, 'medium');

                        if (!$partnerImgUrl) {
                            continue;
                        }
                        ?>
                        <div class="hero__partner">
                            <img src="<?php echo esc_url($partnerImgUrl); ?>" alt="Partner">
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>