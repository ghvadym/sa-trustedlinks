<?php
$testimonials = acf_option('testimonials');

if (empty($testimonials)) {
    return;
}

$bgId = acf_option('testimonials_bg');
if ($bgId) {
    $bgUrl = wp_get_attachment_image_url($bgId, 'full');
}

?>

<section class="testimonials slider_section">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($bgId); ?>" class="section_bg">
    <?php } ?>
    <div class="head white_theme">
        <?php _get_field(acf_option('testimonials_title'), 'title', 'h2'); ?>
        <?php if ($subtitle = acf_option('testimonials_subtitle')) { ?>
            <p class="subtitle">
                <?php echo text_spaces_control($subtitle); ?>
            </p>
        <?php } ?>
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
    <div class="swiper__nav">
        <div class="swiper__nav_item testimonials__button_prev">
            <?php get_svg('slider-arrow-left'); ?>
        </div>
        <div class="swiper__nav_item testimonials__button_next">
            <?php get_svg('slider-arrow-right'); ?>
        </div>
    </div>
</section>
