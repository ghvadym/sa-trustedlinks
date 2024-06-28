<?php
if (empty($fields)) {
    return;
}

$blocks = $fields['blocks_list'] ?? [];

if (empty($blocks)) {
    return;
}
?>

<section class="pricing_blocks">
    <?php if (!empty($bgUrl)) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title(); ?>" class="section_bg">
    <?php } ?>
    <div class="container">
        <div class="head white_theme">
            <?php _get_field($fields['blocks_title'] ?? '', 'title', 'h2'); ?>
            <?php if ($subtitle = $fields['blocks_subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
        <div class="pricing_blocks__list">
            <?php foreach ($blocks as $block) {
                $imgId = $block['img'] ?? '';
                $imgUrl = '';
                $title = $block['title'] ?? '';
                $text = $block['text'] ?? '';

                if ($imgId) {
                    $imgUrl = wp_get_attachment_image_url($imgId, 'large');
                }
                ?>
                <div class="pricing_block">
                    <div class="pricing_block__body">
                        <?php if ($imgUrl) { ?>
                            <div class="pricing_block__img">
                                <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                        <?php } ?>
                        <?php if ($title) { ?>
                            <div class="pricing_block__title">
                                <?php echo esc_html($title); ?>
                            </div>
                        <?php } ?>
                        <?php if ($text) { ?>
                            <div class="pricing_block__text">
                                <?php echo esc_html($text); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>
</section>

