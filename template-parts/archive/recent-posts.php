<?php
if (empty($fields)) {
    return;
}

$posts = _get_posts([
    'numberposts' => 5
]);

if (empty($posts)) {
    echo sprintf('<h3>%s</h3>', __('There are no news', DOMAIN));
    return;
}

$terms = get_terms([
    'taxonomy'   => 'category',
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC'
]);
?>

<section class="recent_posts">
    <div class="container">
        <?php _get_field($fields['latest_posts_title'] ?? '', 'title recent_posts__title', 'h2'); ?>
        <?php if (!empty($terms)) { ?>
            <div class="recent_posts__head_wrap">
                <div class="recent_posts__head">
                    <?php foreach ($terms as $term) { ?>
                        <div class="recent_posts__cat"
                             data-id="<?php echo $term->term_id; ?>"
                             data-link="<?php echo get_term_link($term->term_id); ?>">
                            <?php get_svg('check-black'); ?>
                            <?php echo esc_html($term->name); ?>
                        </div>
                    <?php } ?>
                    <div class="recent_posts__close" data-id="">
                        <?php get_svg('close'); ?>
                    </div>
                    <?php if (!empty($terms[0])) { ?>
                        <a class="recent_posts__btn btn_light" href="<?php echo get_term_link($terms[0]->term_id); ?>">
                            <?php _e('View all', DOMAIN); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="recent_posts__list">
            <?php get_template_part_var('archive/recent-posts-list', [
                'posts' => $posts
            ]); ?>
        </div>
    </div>
</section>
