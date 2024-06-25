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

$bg = $fields['faq_bg_img'] ?? 0;
if (!empty($bg)) {
    $bgUrl = wp_get_attachment_image_url($bg, 'large');
}

$bgMobPath = '/dest/img/FAQ Block Mob.png';
if (file_exists(get_template_directory().$bgMobPath)) {
    $bgUrlMob = get_template_directory_uri() . $bgMobPath;
}
?>

<section class="faq">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($bg); ?>" class="section_bg faq_bg_desk">
    <?php } ?>

    <?php if (!empty($bgUrlMob)) { ?>
        <img src="<?php echo esc_url($bgUrlMob); ?>" alt="<?php echo get_the_title($bgMob); ?>" class="section_bg faq_bg_mob">
    <?php } ?>
    <div class="container">
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
    </div>
</section>


