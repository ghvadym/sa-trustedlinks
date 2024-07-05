<?php
if (empty($fields)) {
    return;
}

$faqList = $fields['faq_list'] ?? [];

if (empty($faqList)) {
    return;
}

$faqListItems = count($faqList);
if ($faqListItems > 1) {
    $faqListColumns = array_chunk($faqList, ceil($faqListItems / 2));
}

if (!empty($options)) {
    $bgDeskId = $options['faq_bg_img_desk'] ?? '';
    $bgMobId = $options['faq_bg_img_mob'] ?? '';

    if ($bgDeskId) {
        $bgDeskUrl = wp_get_attachment_image_url($bgDeskId, 'full');
    }

    if ($bgMobId) {
        $bgMobUrl = wp_get_attachment_image_url($bgMobId, 'full');
    }
}
?>

<section class="faq">
    <?php if (is_home() || is_front_page()) { ?>
        <img src="<?php echo get_stylesheet_directory_uri() . '/dest/img/bg-stars.png'; ?>" alt="Background main" class="section_bg">
    <?php } ?>
    <?php if (!empty($bgMobUrl)) { ?>
        <img src="<?php echo esc_url($bgMobUrl); ?>" alt="Background mobile" class="section_bg_contain faq_bg_mob">
    <?php } ?>
    <div class="container">
        <?php if (!empty($bgDeskUrl)) { ?>
            <img src="<?php echo esc_url($bgDeskUrl); ?>" alt="Background desktop" class="section_bg_contain faq_bg_desk">
        <?php } ?>
        <div class="head white_theme">
            <?php _get_field($fields['faq_title'] ?? '', 'title', 'h2'); ?>
            <?php if ($subtitle = $fields['faq_subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
        <div class="faq__list">
            <?php if (!empty($faqListColumns)) { ?>
                <?php foreach ($faqListColumns as $faqListColumn) {
                    if (empty($faqListColumn)) {
                        continue;
                    }
                    ?>
                    <div class="faq__list_column">
                        <?php foreach ($faqListColumn as $faqItem) {
                            $answer = $faqItem['answer'] ?? '';
                            $response = $faqItem['response'] ?? '';
                            ?>
                            <div class="faq__item">
                                <div class="faq__body">
                                    <?php if ($answer) { ?>
                                        <div class="faq__head">
                                            <?php echo esc_html($answer); ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($response) { ?>
                                        <div class="faq__text">
                                            <?php echo $response; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <?php if (is_home() || is_front_page() || is_page_template('templates/pricing.php')) {
            get_template_part_var('global/cta');
        } ?>
    </div>
</section>