<?php
get_header();
$post = get_post();
$terms = get_the_terms($post->ID, 'category');
$similarPostsArgs = [
    'orderby'      => 'rand',
    'numberposts'  => 3,
    'post__not_in' => [$post->ID]
];

if (!empty($terms)) {
    $similarPostsArgs['tax_query'] = [
        [
            'taxonomy' => 'category',
            'field'    => 'id',
            'terms'    => array_column($terms, 'term_id'),
        ],
    ];
}

$similarPosts = _get_posts($similarPostsArgs);
?>

    <section class="single">
        <div class="container">
            <?php if ($terms) { ?>
                <div class="single__cats">
                    <?php foreach ($terms as $term) { ?>
                        <a href="<?php echo get_term_link($term->term_id) ?>" class="single__cat">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    <?php } ?>
                    <?php if ($timeToRead = get_field('time_to_read', $post->ID)) { ?>
                        <div class="single__time">
                            <?php echo time_to_read($timeToRead); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="single__head">
                <h1 class="single__title">
                    <?php echo esc_html($post->post_title); ?>
                </h1>
                <div class="single__subtitle">
                    <?php echo esc_html($post->post_excerpt); ?>
                </div>
            </div>
            <div class="single__thumbnail">
                <?php echo get_thumbnail_html($post->ID); ?>
            </div>
            <div class="text_block">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php if ($similarPosts) { ?>
    <section class="similar_posts slider_section">
        <div class="container">
            <div class="slider_wrapper">
                <div class="similar_posts__slider swiper">
                    <div class="swiper-wrapper">
                        <?php $i = 1;
                        foreach ($similarPosts as $post) {
                            $cardClasses = 'swiper-slide';

                            if ($i === 3) {
                                $cardClasses .= ' full_image';
                            } else {
                                $cardClasses .= ' white_bg';
                            }

                            get_template_part_var('cards/blog-card', [
                                'post'         => $post,
                                'card_classes' => $cardClasses,
                            ]);
                            $i++;
                        } ?>
                    </div>
                </div>
            </div>
            <div class="similar_posts__pagination"></div>
        </div>
    </section>
<?php } ?>

<?php
get_footer();