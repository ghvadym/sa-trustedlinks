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

$fields = get_fields($post->ID);
$postLink = get_the_permalink($post->ID);
$shareLinks = $fields['share_links'] ?? [];
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
                <?php if ($timeToRead = $fields['time_to_read'] ?? '') { ?>
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
        <div class="single__footer">
            <div class="single__date">
                <?php echo date('M d, Y', strtotime($post->post_date)); ?>
            </div>
            <?php if (!empty($shareLinks)) { ?>
                <div class="single__links">
                    <?php foreach ($shareLinks as $shareLinkId) {
                        $title = get_the_title($shareLinkId);
                        $url = socials_share_links($title);

                        if (!$url) {
                            continue;
                        }
                        $title = rawurlencode($title);
                        $shareImgUrl = get_the_post_thumbnail_url($shareLinkId);
                        $url = str_replace(['[link]', '[title]'], [$postLink, $title], $url);

                        echo sprintf(
                            '<a href="%s" target="_blank" title="%s" rel="nofollow noopener noreferrer" class="single__link"><img src="%s"></a>',
                            $url,
                            __('Share on') . ' ' . $title,
                            $shareImgUrl
                        );
                    } ?>
                    <div class="single__link copy_url" data-copy="<?php echo esc_url($postLink); ?>">
                        <img src="<?php echo img_url('copy.svg'); ?>" alt="Copy to clipboard" title="Copy Post URL to clipboard">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php if ($similarPosts) { ?>
    <section class="similar_posts slider_section">
        <div class="container">
            <h2 class="title similar_posts__title">
                <?php _e('You may also be interested', DOMAIN); ?>
            </h2>
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