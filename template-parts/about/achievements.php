<?php
if (empty($fields)) {
    return;
}
?>

<section class="achievements bg_light">
    <div class="container">
        <div class="ach__row">
            <div class="head">
                <?php _get_field($fields['ach_title'] ?? '', 'title', 'h2'); ?>
                <?php if ($subtitle = $fields['ach_subtitle'] ?? '') { ?>
                    <p class="subtitle">
                        <?php echo text_spaces_control($subtitle); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="ach__content">
                <?php if (!empty($fields['achievements'])) { ?>
                    <div class="ach__list">
                        <?php foreach ($fields['achievements'] as $item) {
                            $title = $item['title'] ?? '';
                            $text = $item['text'] ?? '';
                            ?>
                            <div class="ach__item">
                                <?php if ($title) { ?>
                                    <strong>
                                        <?php echo esc_html($title); ?>
                                    </strong>
                                <?php } ?>
                                <?php if ($text) { ?>
                                    <p>
                                        <?php echo text_spaces_control($text); ?>
                                    </p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if ($mainText = $fields['ach_text'] ?? '') { ?>
                    <div class="ach__text">
                        <?php echo text_spaces_control($mainText); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>