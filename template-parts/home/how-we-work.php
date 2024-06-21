<?php
$cards = get_field('how_we_work_cards');

if (empty($cards)) {
    return;
}
?>

<section class="how_we_work slider_section">
    <div class="container">
        <div class="head">
            <?php _get_field(get_field('how_we_work_title'), 'title', 'h2'); ?>
            <?php if ($subtitle = get_field('how_we_work_subtitle')) { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
        <div class="slider_wrapper">
            <div class="how_we_work__slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $card) {
                        $title = $card['title'] ?? '';
                        $text = $card['text'] ?? '';

                        if (!$title || !$text) {
                            continue;
                        }

                        $imageId = $card['img'] ?? '';
                        $imageUrl = '';

                        if ($imageId) {
                            $imageUrl = wp_get_attachment_image_url($imageId, 'medium');
                        }
                        ?>
                        <div class="card_simple swiper-slide">
                            <div class="card_simple__body">
                                <?php if (!empty($imageUrl)) { ?>
                                    <div class="card_simple__img">
                                        <img src="<?php echo esc_url($imageUrl); ?>" alt="<?php echo get_the_title($imageId); ?>">
                                    </div>
                                <?php } ?>
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
                <div class="how_we_work__pagination"></div>
            </div>
        </div>
    </div>
</section>
