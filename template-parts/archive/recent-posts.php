<?php
if (empty($fields)) {
    return;
}

$posts = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'DATE',
    'order'          => 'DESC',
    'posts_per_page' => 5
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
                    <div class="recent_posts__cat active-cat" data-id="">
                        <?php get_svg('check-black'); ?>
                        <?php _e('View all', DOMAIN); ?>
                    </div>
                    <?php foreach ($terms as $term) { ?>
                        <div class="recent_posts__cat"
                             data-id="<?php echo $term->term_id; ?>">
                            <?php get_svg('check-black'); ?>
                            <?php echo esc_html($term->name); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="recent_posts__list">
            <?php get_template_part_var('archive/recent-posts-list', [
                'posts' => $posts
            ]); ?>
        </div>
        <div class="recent_posts__nav">
            <?php get_template_part_var('global/pagination', [
                'current' => 1,
                'total'   => ceil($posts->found_posts / 5)
            ]); ?>
        </div>
    </div>
</section>
