<?php
/*
 * Template Name: About Us
 */
get_header();
$post = get_post();
$fields = get_fields($post->ID);

$bgUrl = !empty($fields['hero_img_bg']) ? wp_get_attachment_image_url($fields['hero_img_bg'], 'large') : '';
$imgSpacemanUrl = !empty($fields['hero_img_spaceman']) ? wp_get_attachment_image_url($fields['hero_img_spaceman'], 'large') : '';
?>

<section class="hero">
    <?php if ($bgUrl) { ?>
        <img src="<?php echo esc_url($bgUrl); ?>" alt="<?php echo get_the_title($fields['hero_img_bg'] ?? ''); ?>" class="about_us__bg section_bg">
    <?php } ?>
    <div class="container">
        <div class="hero__body white_theme">
            <h1 class="title">
                <?php
                if ($title = $fields['hero_title'] ?? '') {
                    echo $title;
                } else {
                    echo $post->post_title;
                }
                ?>
            </h1>
            <?php if ($subtitle = $fields['hero_subitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
            <?php if ($btnTitle = $fields['hero_btn_title'] ?? '') { ?>
                <div class="btn_light popup_open">
                    <?php echo esc_html($btnTitle); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ($imgSpacemanUrl) { ?>
        <img src="<?php echo esc_url($imgSpacemanUrl); ?>" alt="<?php echo get_the_title($fields['hero_img_spaceman'] ?? ''); ?>" class="about_us__img">
    <?php } ?>
</section>

<?php
get_footer();
