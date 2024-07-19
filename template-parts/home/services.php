<?php
if (empty($fields)) {
    return;
}

$services = $fields['services_list'] ?? '';

if (empty($services)) {
    return;
}

$bgUrl = !empty($fields['services_bg']) ?  wp_get_attachment_image_url($fields['services_bg'], 'full') : '';
$imgUrl = !empty($fields['services_img_left']) ?  wp_get_attachment_image_url($fields['services_img_left'], 'medium') : '';
$imgUrlSecond = !empty($fields['services_img_right']) ?  wp_get_attachment_image_url($fields['services_img_right'], 'full') : '';

?>

<section class="services slider_section">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($fields['services_bg']); ?>" class="section_bg">
    <?php } ?>
    <?php if (!wp_is_mobile()) { ?>
        <?php if (!empty($imgUrl)) { ?>
            <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo get_the_title($fields['services_img_left']); ?>" class="services_planet_img">
        <?php } ?>
        <?php if (!empty($imgUrlSecond)) { ?>
            <img src="<?php echo esc_url($imgUrlSecond); ?>" alt="<?php echo get_the_title($fields['services_img_right']); ?>" class="services_planet_img">
        <?php } ?>
    <?php } ?>
    <div class="container">
        <div class="head white_theme">
            <?php _get_field($fields['services_title'] ?? '', 'title', 'h2'); ?>
            <?php if ($subtitle = $fields['services_subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="container slider_wrapper">
        <div class="services__slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($services as $service) {
                    $title = $service['title'] ?? '';
                    $text = $service['text'] ?? '';
                    $imgId = $service['img'] ?? '';
                    $imageUrl = '';

                    if ($imgId) {
                        $imgUrl = wp_get_attachment_image_url($imgId, 'medium');
                    }
                    ?>
                    <div class="card_simple swiper-slide<?php echo !empty($service['is_full_image']) ? ' full_image' : ''; ?>">
                        <?php if (!empty($imgUrl)) { ?>
                            <div class="card_simple__img">
                                <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo get_the_title($imgId); ?>">
                            </div>
                        <?php } ?>
                        <div class="card_simple__body">
                            <div class="card_simple__title">
                                <?php echo esc_html($title); ?>
                            </div>
                            <div class="card_simple__text" title="<?php echo esc_attr($text); ?>">
                                <?php echo esc_html($text); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="services__pagination"></div>
    </div>
</section>
