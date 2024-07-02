<?php
if (empty($fields)) {
    return;
}

$cards = $fields['pr_service_items'] ?? [];

if (empty($cards)) {
    return;
}
?>

<section class="pr_service slider_section">
    <div class="container">
        <div class="head">
            <?php _get_field($fields['pr_service_title'] ?? '', 'title', 'h2'); ?>
            <?php if ($subtitle = $fields['pr_service_subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="pr_service__slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($cards as $item) {
                    $isWideCard = $item['is_wide_card'] ?? false;
                    $imageId = $item['img'] ?? '';
                    $title = $item['title'] ?? '';
                    $text = $item['text'] ?? '';
                    $imageUrl = '';

                    if ($imageId) {
                        $imageUrl = wp_get_attachment_image_url($imageId, 'medium');
                    }
                    ?>
                    <div class="card_simple swiper-slide<?php echo $isWideCard ? ' wide-card' : ''; ?>">
                        <?php if (!empty($imageUrl)) { ?>
                            <div class="card_simple__img">
                                <img src="<?php echo esc_url($imageUrl); ?>" alt="<?php echo get_the_title($imageId); ?>">
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
        <div class="pr_service__pagination"></div>
    </div>
</section>
