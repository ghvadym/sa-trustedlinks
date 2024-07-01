<?php
/*
 * Template Name: How We Work
 */
get_header();

$post = get_post();
$fields = get_fields($post->ID);

$bgUrl = !empty($fields['bg_img']) ? wp_get_attachment_image_url($fields['bg_img'], 'full') : '';
$contentItems = $fields['content_blocks'] ?? [];
?>

<section class="how_we_work">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($fields['bg_img']); ?>" class="section_bg">
    <?php } ?>
    <div class="no-container">
        <div class="head white_theme">
            <?php if ($title = $fields['title'] ?? '') { ?>
                <h2 class="title">
                    <?php echo text_spaces_control($title); ?>
                </h2>
            <?php } ?>
            <?php if ($subtitle = $fields['subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
        <?php if (!empty($contentItems)) { $i = 1; ?>
            <div class="how_we_work__blocks">
                <?php foreach ($contentItems as $item) {
                    $title = $item['title'] ?? '';
                    $text = $item['text'] ?? '';
                    $imgId = $item['img'] ?? '';
                    $imgUrl = '';

                    if ($i < 9) {
                        $number = '0'.$i;
                    } else {
                        $number = $i;
                    }

                    if ($imgId) {
                        $imgUrl = wp_get_attachment_image_url($imgId, 'full');
                    }
                    ?>
                    <div class="how_we_work__block">
                        <?php if (!empty($imgUrl)) { ?>
                            <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo esc_attr($title); ?>" class="how_we_work__img">
                        <?php } ?>
                        <div class="how_we_work__content">
                            <div class="how_we_work__number">
                                <?php echo $number; ?>
                            </div>
                            <?php if ($title) { ?>
                                <h2 class="how_we_work__title">
                                    <?php echo esc_html($title); ?>
                                </h2>
                            <?php } ?>
                            <?php if ($text) { ?>
                                <div class="how_we_work__text">
                                    <?php echo $text; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php $i++; } ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php
get_footer();