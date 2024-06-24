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
    <div class="container-left">
        <div class="slider_wrapper">
            <div class="blog__slider swiper">
                <div class="swiper-wrapper">
                    <?php $i = 1; foreach ($posts as $post) {
                        $imgUrl = get_the_post_thumbnail_url($post->ID);
                        $terms = get_the_terms($post->ID, 'category');
                        $term = $terms[0] ?? [];
                        $timeToRead = get_field('time_to_read', $post->ID);

                        $additionalClass = '';
                        if ($i === 1 || $i % 4 === 0) {
                            $additionalClass = ' card_right_content';
                        } else if ($i % 3 !== 0) {
                            $additionalClass = ' full_image';
                        }
                        ?>
                        <div class="card_simple swiper-slide<?php echo $additionalClass; ?>">
                            <?php if (!empty($imgUrl)) { ?>
                                <div class="card_simple__img">
                                    <img src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                </div>
                            <?php } ?>
                            <div class="card_simple__body">
                                <div class="card_simple__head">
                                    <?php if (!empty($term)) { ?>
                                        <div class="card_simple__cat">
                                            <span><?php echo esc_html($term->name); ?></span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($timeToRead) { ?>
                                        <div class="card_simple__time">
                                            <?php echo esc_html($timeToRead); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="card_simple__title">
                                    <?php echo esc_html($post->post_title); ?>
                                </div>
                                <div class="card_simple__date">
                                    <?php echo date('M d, Y'); ?>
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog__pagination"></div>
    </div>
</section>
