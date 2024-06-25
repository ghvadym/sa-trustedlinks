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

<section class="most_popular slider_section bg_light">
    <div class="container">
        <?php _get_field($fields['most_popular_title'] ?? '', 'title most_popular__title', 'h2'); ?>
        <div class="slider_wrapper">
            <div class="most_popular__posts">
                <div class="most_popular__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($posts as $post) {
                            if (wp_is_mobile()) {

                                get_template_part_var('cards/blog-card', [
                                    'post'         => $post,
                                    'card_classes' => 'full_image swiper-slide',
                                ]);

                            } else {

                                if ($i === 1 || $i % 5 === 0) { ?>
                                    <div class="most_popular__posts_wrap swiper-slide">
                                <?php }

                                get_template_part_var('cards/blog-card', [
                                    'post'         => $post,
                                    'card_classes' => 'white_bg card_right_content',
                                ]);

                                if ($i % 4 === 0) { ?>
                                    </div>
                                <?php }
                            }
                            $i++;
                        } ?>
                    </div>
                </div>
            </div>
            <div class="most_popular__pagination"></div>
        </div>
    </div>
</section>
