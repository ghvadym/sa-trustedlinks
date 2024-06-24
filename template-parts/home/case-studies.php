<?php
if (empty($fields)) {
    return;
}

$bgMainId = $fields['case_studies_image_bg'] ?? '';
if ($bgMainId) {
    $bgMainUrl = wp_get_attachment_image_url($bgMainId, 'large');
}
$bgBottomId = $fields['case_studies_image_bottom'] ?? '';
if ($bgBottomId) {
    $bgBottomUrl = wp_get_attachment_image_url($bgBottomId, 'large');
}

$caseStudies = $fields['case_studies'] ?? '';
?>

<section class="case_studies">
    <?php if (!empty($bgMainUrl)) { ?>
        <img src="<?php echo esc_url($bgMainUrl); ?>" alt="<?php echo get_the_title($bgMainId); ?>" class="section_bg case_studies__bg_main">
    <?php } ?>
    <?php if (!empty($bgBottomUrl)) { ?>
        <img src="<?php echo esc_url($bgBottomUrl); ?>" alt="<?php echo get_the_title($bgBottomId); ?>" class="case_studies__bg_bottom">
    <?php } ?>
    <div class="container">
        <div class="head">
            <?php _get_field($fields['case_studies_title'] ?? '', 'title case_studies__title', 'h2'); ?>
            <?php if ($subtitle = $fields['case_studies_subtitle'] ?? '') { ?>
                <p class="subtitle case_studies__subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
            <?php
            $btn = $fields['case_studies_link'] ?? '';
            if (!empty($btn)) { ?>
                <a href="<?php echo esc_url($btn['url'] ?? ''); ?>"
                   target="<?php echo esc_attr($btn['target'] ?? '_self'); ?>"
                   class="btn_light case_studies__btn">
                    <?php echo esc_html($btn['title'] ?? ''); ?>
                </a>
            <?php } ?>
        </div>
        <?php if (!empty($caseStudies)) { ?>
            <div class="table__wrap">
                <div class="table">
                    <div class="table__head">
                        <div class="table__row">
                            <div class="table__cell">
                                <?php _e('Client', DOMAIN); ?>
                            </div>
                            <div class="table__cell">
                                <?php _e('Traffic Increase', DOMAIN); ?>
                            </div>
                            <div class="table__cell">
                                <?php _e('Links Built', DOMAIN); ?>
                            </div>
                            <div class="table__cell">
                                <?php _e('Time Span', DOMAIN); ?>
                            </div>
                        </div>
                    </div>
                    <div class="table__body">
                        <?php foreach ($caseStudies as $caseStudyId) {
                            $title = get_the_title($caseStudyId);
                            $fields = get_fields($caseStudyId);
                            ?>
                            <div class="table__row">
                                <div class="table__cell">
                                    <?php if (has_post_thumbnail($caseStudyId)) { ?>
                                        <div class="table__img">
                                            <?php echo get_the_post_thumbnail($caseStudyId); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="table__name">
                                        <?php echo esc_html($title); ?>
                                    </div>
                                </div>
                                <div class="table__cell">
                                    <div class="traffic__row">
                                        <div class="traffic__icon">
                                            <?php get_svg('arrow-top-green'); ?>
                                        </div>
                                        <div class="traffic__value">
                                            <?php if ($fields['traffic_increase_percentage']) { ?>
                                                <div class="traffic__percent">
                                                    <?php echo esc_html($fields['traffic_increase_percentage']) . '%'; ?>
                                                </div>
                                            <?php } ?>
                                            <?php if ($fields['traffic_increase']) { ?>
                                                <div class="traffic__range">
                                                    <?php echo esc_html($fields['traffic_increase']); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="table__cell">
                                    <?php if ($fields['links_built']) { ?>
                                        <div class="traffic__links_progress"
                                             style="max-width: <?php echo $fields['links_built'] / 3.5; ?>px">
                                        <span>
                                            <?php echo esc_html($fields['links_built']); ?>
                                        </span>
                                        </div>
                                    <?php } else {
                                        echo '-';
                                    } ?>
                                </div>
                                <div class="table__cell">
                                    <?php if ($fields['time_spent']) {
                                        get_svg('clock');
                                        echo esc_html($fields['time_spent']);
                                    } else {
                                        echo '-';
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
