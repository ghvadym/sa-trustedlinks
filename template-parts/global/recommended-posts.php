<?php

if (empty($posts)) {
    $posts = acf_option('recent_posts_list');

    if (empty($posts)) {
        $posts = _get_posts([
            'orderby'     => 'rand',
            'numberposts' => 3
        ]);
    }
}

if (empty($posts)) {
    return;
}

?>
<section class="similar_posts slider_section">
    <div class="container">
        <?php _get_field(acf_option('recent_posts_title'), 'title similar_posts__title', 'h2'); ?>
    </div>
    <div class="container slider_wrapper">
        <div class="similar_posts__slider swiper">
            <div class="swiper-wrapper">
                <?php $i = 1;
                foreach ($posts as $post) {
                    $cardClasses = 'swiper-slide';

                    if (wp_is_mobile()) {
                        $cardClasses .= ' full_image';
                    } else {
                        if ($i % 3 === 0) {
                            $cardClasses .= ' full_image';
                        } else {
                            $cardClasses .= ' white_bg';
                        }
                    }

                    get_template_part_var('cards/blog-card', [
                        'post'         => $post,
                        'card_classes' => $cardClasses
                    ]);
                    $i++;
                } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="similar_posts__pagination"></div>
    </div>
</section>