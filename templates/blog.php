<?php
/*
 * Template Name: Blog
 */
get_header();
$fields = get_fields();

$bg = $fields['hero_image'] ?? '';
if ($bg) {
    $bgUrl = wp_get_attachment_image_url($bg, 'full');
}

$bgMob = $fields['hero_image_mob'] ?? '';
if ($bgMob) {
    $bgMobUrl = wp_get_attachment_image_url($bgMob, 'full');
}
?>

<section class="hero">
    <?php if (!empty($bgUrl)) { ?>
        <div class="hero__bg_img desk_ver">
            <img src="<?php echo esc_url($bgUrl); ?>" alt="Blog Hero Image">
        </div>
    <?php } ?>
    <?php if (!empty($bgMobUrl)) { ?>
        <div class="hero__bg_img mob_ver">
            <img src="<?php echo esc_url($bgMobUrl); ?>" alt="Blog Hero Image Mobile">
        </div>
    <?php } ?>
    <div class="container">
        <div class="hero__body white_theme">
            <?php if ($title = $fields['title'] ?? '') { ?>
                <h1>
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