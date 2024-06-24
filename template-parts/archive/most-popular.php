<?php
if (empty($fields)) {
    return;
}

$posts = $fields['most_popular_posts'] ?? [];

if (empty($posts)) {
    return;
}

$i = 1;
$postsPerIteration = 4;
?>

<section class="most_popular slider_section">
    <div class="container">
        <?php _get_field($fields['most_popular_title'] ?? '', 'title most_popular__title', 'h2'); ?>
        <div class="slider_wrapper">
            <div class="most_popular__posts">
                <div class="most_popular__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($posts as $post) {
                            $imgUrl = get_the_post_thumbnail_url($post->ID);
                            $terms = get_the_terms($post->ID, 'category');
                            $term = $terms[0] ?? [];
                            $timeToRead = get_field('time_to_read', $post->ID);

                            if (wp_is_mobile()) { ?>

                                <div class="card_simple full_image swiper-slide">
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

                            <?php } else {

                                if ($i === 1 || $i % 5 === 0) { ?>
                                    <div class="most_popular__posts_wrap swiper-slide">
                                <?php } ?>

                                <div class="card_simple card_right_content">
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

                                <?php if ($i % 4 === 0) { ?>
                                    </div>
                                <?php }
                                $i++;
                            }
                        } ?>
                    </div>
                </div>
                <div class="most_popular__pagination"></div>
            </div>
</section>
