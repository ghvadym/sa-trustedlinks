<?php
/*
 * Template Name: Case Studies
 */
get_header();
$post = get_post();

$caseStudies = _get_posts([
    'post_type'   => 'case_study',
    'numberposts' => -1
]);

if (empty($caseStudies)) {
    echo '<h2>'.__('There is no Case Studies', DOMAIN).'</h2>';
    return;
}

$bgUrl = get_the_post_thumbnail_url($post->ID, 'large');
?>

<section class="case_studies">
    <?php if ($bgUrl) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo $post->ID; ?>" class="section_bg">
    <?php } ?>
    <div class="container">
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
    </div>
</section>

<?php
get_footer();