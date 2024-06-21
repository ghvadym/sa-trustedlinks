<?php
$cards = get_field('pr_service_items');

if (empty($cards)) {
    return;
}
?>

<section class="pr_service slider_section">
    <div class="container-left">
        <?php _get_field(get_field('pr_service_title'), 'title', 'h2'); ?>
        <?php if ($subtitle = get_field('pr_service_subtitle')) { ?>
            <p class="subtitle">
                <?php echo text_spaces_control($subtitle); ?>
            </p>
        <?php } ?>
        <div class="slider_wrapper">
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
                                <div class="card_simple__text">
                                    <?php echo esc_html($text); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="pr_service__pagination"></div>
            </div>
        </div>
    </div>
</section>
