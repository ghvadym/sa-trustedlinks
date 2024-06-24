<?php
$services = get_field('services_list');

if (empty($services)) {
    return;
}

$bgId = get_field('services_img');
if ($bgId) {
    $bgUrl = wp_get_attachment_image_url($bgId, 'large');
}

?>

<section class="services slider_section">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($bgId); ?>" class="section_bg">
    <?php } ?>
    <div class="container">
        <div class="head white-theme">
            <?php _get_field(get_field('services_title'), 'title', 'h2'); ?>
            <?php if ($subtitle = get_field('services_subtitle')) { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
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
                    <div class="card_simple swiper-slide<?php echo !empty($service['is_full_image']) ? ' full-image' : ''; ?>">
                        <?php if (!empty($imgUrl)) { ?>
                            <div class="card_simple__img">
                                <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo get_the_title($imgId); ?>">
                            </div>
                        <?php } ?>
                        <div class="card_simple__body">
                            <div class="card_simple__title">
                                <?php echo esc_html($title); ?>
                            </div>
                            <div class="card_simple__text">
                                <?php echo esc_html($text); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="services__pagination"></div>
        </div>
    </div>
</section>
