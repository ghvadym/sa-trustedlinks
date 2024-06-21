<?php
$testimonials = get_field('testimonials', 'options');

if (empty($testimonials)) {
    return;
}

$bgId = get_field('testimonials_bg', 'options');
if ($bgId) {
    $bgUrl = wp_get_attachment_image_url($bgId, 'large');
}

?>

<section class="testimonials">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($bgId); ?>" class="section_bg">
    <?php } ?>
    <div class="head">
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
    <?php get_template_part_var('global/swiper-navigation'); ?>
</section>
