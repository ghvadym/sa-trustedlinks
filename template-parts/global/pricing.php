<?php

$cards = acf_option('pricing_cards');

if (empty($cards)) {
    return;
}

if (!empty($bg)) {
    $bgUrl = wp_get_attachment_image_url($bg, 'large');
}

$ctaTitle = acf_option('pricing_cta_title');
$ctaBtnText = acf_option('pricing_cta_btn_text');
$lightArrows = !empty($light_arrows) ? '-light' : '';
$lightTheme = !empty($light_theme) ? ' white_theme' : '';
?>

<section class="pricing slider_section">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($bg); ?>" class="section_bg">
    <?php } ?>
    <div class="container">
        <div class="head<?php echo $lightTheme; ?>">
            <?php _get_field($title ?? '', 'title', 'h2'); ?>
            <?php if (!empty($subtitle)) { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="container-left">
        <div class="slider_wrapper">
            <div class="pricing__slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $card) {
                        $imgId = $card['img'] ?? '';
                        $imgUrl = '';
                        $name = $card['name'] ?? '';
                        $price = $card['price'] ?? '';
                        $period = $card['period'] ?? '';
                        $btn_title = $card['btn_title'] ?? '';
                        $value = $card['value'] ?? '';
                        $advantages = $card['advantages'] ?? [];
                        $iconColor = empty($card['is_highlighted']) ? 'black' : 'white';

                        if ($imgId) {
                            $imgUrl = wp_get_attachment_image_url($imgId, 'medium');
                        }
                        ?>
                        <div class="pricing_item swiper-slide<?php echo !empty($card['is_highlighted']) ? ' pricing-highlighted' : ''; ?><?php echo $lightTheme; ?>">
                            <div class="pricing_item_body">
                                <div class="pricing_item__name">
                                    <?php if ($name) { ?>
                                        <span><?php echo esc_html($name); ?></span>
                                    <?php } ?>
                                    <?php if (!empty($imgUrl)) { ?>
                                        <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo esc_attr(get_the_title($imgId)); ?>">
                                    <?php } ?>
                                </div>
                                <?php if ($price) { ?>
                                    <div class="pricing_item__price">
                                        <?php echo sprintf('$ %s', esc_html($price)); ?>
                                        <?php if ($period) { ?>
                                            <span><?php echo sprintf('/ %s', esc_html($period)); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div class="pricing_item__btn popup_open<?php echo !empty($card['is_highlighted']) ? ' btn_light' : ' btn_dark'; ?>" data-plan="<?php esc_attr($name); ?>">
                                    <?php echo $btn_title ? esc_html($btn_title) : __('Let’s Work', DOMAIN); ?>
                                </div>
                                <?php if ($value) { ?>
                                    <div class="pricing_item__val">
                                        <?php get_svg('link'); ?>
                                        <?php echo esc_html($value); ?>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($advantages)) { ?>
                                    <ul class="pricing_item__list">
                                        <?php foreach ($advantages as $advantage) {
                                            $title = $advantage['title'] ?? '';

                                            if (!$title) {
                                                return;
                                            }
                                            ?>
                                            <li>
                                                <?php get_svg("check-$iconColor"); ?>
                                                <?php echo esc_html($title); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <div class="pricing_item__link popup_open" data-plan="<?php esc_attr($name); ?>">
                                    <?php _e('Learn more', DOMAIN); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="swiper__nav">
            <div class="swiper__nav_item pricing__button_prev">
                <?php get_svg("slider-arrow$lightArrows-left"); ?>
            </div>
            <div class="swiper__nav_item pricing__button_next">
                <?php get_svg("slider-arrow$lightArrows-right"); ?>
            </div>
        </div>
        <?php if ($ctaTitle && $ctaBtnText) { ?>
            <div class="pricing__cta">
                <div class="pricing__cta_body">
                    <div class="pricing__cta_title desk_ver">
                        <?php echo strip_tags($ctaTitle); ?>
                    </div>
                    <div class="pricing__cta_title mob_ver">
                        <?php echo $ctaTitle; ?>
                    </div>
                    <div class="pricing__cta_btn btn_light popup_open">
                        <?php echo esc_html($ctaBtnText); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
