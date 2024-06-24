<?php
/*
 * Template Name: Blog
 */
get_header();
$fields = get_fields();

$bg = $fields['hero_image'] ?? '';
if ($bg) {
    $bgUrl = wp_get_attachment_image_url($bg, 'large');
}
?>

<section class="hero">
    <?php if (!empty($bgUrl)) { ?>
        <div class="hero__bg_img">
            <img src="<?php echo esc_url($bgUrl); ?>" alt="Blog Hero Image">
        </div>
    <?php } ?>
    <div class="container">
        <div class="hero__body white-theme">
            <?php if ($title = $fields['title'] ?? '') { ?>
                <h1 class="title">
                    <?php echo $title; ?>
                </h1>
            <?php } ?>
            <?php if ($subtitle = $fields['subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
    </div>
</section>

<?php
get_template_part_var('archive/most-popular', [
    'fields' => $fields
]);

get_template_part_var('archive/recent-posts', [
    'fields' => $fields
]);

get_footer();