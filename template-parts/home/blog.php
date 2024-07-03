<?php

if (empty($fields)) {
    return;
}

if ($fields['blog_show_last_posts'] ?? true) {
    $blogCountPosts = $fields['blog_count_posts'] ?? '';
    $posts = _get_posts([
        'numberposts' => $blogCountPosts ?: POSTS_PER_PAGE
    ]);
} else {
    $posts = $fields['blog_posts'] ?? '';
}

if (empty($posts)) {
    return;
}
?>

<section class="blog_section slider_section">
    <div class="container">
        <div class="head">
            <?php _get_field($fields['blog_title'] ?? '', 'title', 'h2'); ?>
            <?php if ($subtitle = $fields['blog_subtitle'] ?? '') { ?>
                <p class="subtitle">
                    <?php echo text_spaces_control($subtitle); ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="container-left slider_wrapper">
        <div class="blog__slider swiper">
            <div class="swiper-wrapper">
                <?php $i = 1; foreach ($posts as $post) {
                    $additionalClass = 'swiper-slide';
                    if ($i === 1 || $i % 4 === 0) {
                        $additionalClass .= ' card_right_content';
                    } else if ($i % 3 !== 0) {
                        $additionalClass .= ' full_image';
                    }

                    get_template_part_var('cards/blog-card', [
                        'post'         => $post,
                        'card_classes' => $additionalClass
                    ]);
                    $i++; } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog__pagination"></div>
    </div>
</section>
