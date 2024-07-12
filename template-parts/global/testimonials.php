<?php

$options = get_fields('options');

$testimonials = $options['testimonials'] ?? '';

if (empty($testimonials)) {
    return;
}

$bgUrl = !empty($options['testimonials_bg']) ?  wp_get_attachment_image_url($options['testimonials_bg'], 'full') : '';
$bgUrlPlanet = !empty($options['testimonials_planet_img']) ?  wp_get_attachment_image_url($options['testimonials_planet_img'], 'full') : '';
$bgUrlPlanetSecond = !empty($options['testimonials_planet_img_second']) ?  wp_get_attachment_image_url($options['testimonials_planet_img_second'], 'full') : '';

?>

<section class="testimonials slider_section">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($options['testimonials_bg']); ?>" class="section_bg">
    <?php } ?>
    <?php if (!wp_is_mobile()) { ?>
        <?php if (!empty($bgUrlPlanet)) { ?>
            <img src="<?php echo esc_url($bgUrlPlanet); ?>" alt="<?php echo get_the_title($options['testimonials_planet_img']); ?>" class="testimonials_planet_img">
        <?php } ?>
        <?php if (!empty($bgUrlPlanetSecond)) { ?>
            <img src="<?php echo esc_url($bgUrlPlanetSecond); ?>" alt="<?php echo get_the_title($options['testimonials_planet_img_second']); ?>" class="testimonials_planet_img">
        <?php } ?>
    <?php } ?>
    <div class="container">
        <div class="head white_theme">
            <?php _get_field($options['testimonials_title'] ?? '', 'title', 'h2'); ?>
            <?php if ($subtitle = $options['testimonials_subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="testimonials__slider swiper">
        <div class="swiper-wrapper">
            <?php foreach ($testimonials as $testimonial) {
                $name = $testimonial['name'] ?? '';
                $text = $testimonial['text'] ?? '';
                $imgUrl = $testimonial['img'] ?? '';
                $job = $testimonial['job_title'] ?? '';

                if (!$name || !$text) {
                    continue;
                }
                ?>
                <div class="testimonial__card swiper-slide">
                    <div class="testimonial__body">
                        <?php get_svg('marks'); ?>
                        <div class="testimonial__text">
                            <?php echo esc_html($text); ?>
                        </div>
                        <div class="testimonial__author">
                            <?php if ($imgUrl) { ?>
                                <div class="testimonial__img">
                                    <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo esc_attr($name); ?>">
                                </div>
                            <?php } ?>
                            <div class="testimonial__name">
                                <?php echo esc_html($name); ?>
                                <?php if ($job) { ?>
                                    <span><?php echo esc_html($job); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="swiper__nav">
            <div class="swiper__nav_item testimonials__button_prev">
                <?php get_svg('slider-arrow-left'); ?>
            </div>
            <div class="swiper__nav_item testimonials__button_next">
                <?php get_svg('slider-arrow-right'); ?>
            </div>
        </div>
    </div>
</section>
