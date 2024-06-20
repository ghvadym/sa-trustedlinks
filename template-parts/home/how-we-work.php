<?php
$cards = get_field('how_we_work_cards');

if (empty($cards)) {
    return;
}
?>

<section class="how_we_work">
    <div class="container">
        <?php _get_field(get_field('how_we_work_title'), 'title how_we_work__title', 'h2'); ?>
        <?php _get_field(get_field('how_we_work_subtitle'), 'subtitle how_we_work__subtitle', 'p'); ?>
        <div class="how_we_work__wrap">
            <div class="how_we_work__slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $card) {
                        $title = $card['title'] ?? '';
                        $text = $card['text'] ?? '';

                        if (!$title || !$text) {
                            continue;
                        }

                        $imageId = $card['img'] ?? '';

                        if ($imageId) {
                            $imageUrl = wp_get_attachment_image_url($imageId, 'medium');
                        }
                        ?>
                        <div class="card_planet swiper-slide">
                            <div class="card_planet__body">
                                <?php if (!empty($imageUrl)) { ?>
                                    <div class="card_planet__img">
                                        <img src="<?php echo esc_url($imageUrl); ?>" alt="<?php echo get_the_title($imageId); ?>">
                                    </div>
                                <?php } ?>
                                <div class="card_planet__title">
                                    <?php echo esc_html($title); ?>
                                </div>
                                <div class="card_planet__text">
                                    <?php echo esc_html($text); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
<!--                <div class="swiper-pagination"></div>-->
            </div>
        </div>
    </div>
</section>
