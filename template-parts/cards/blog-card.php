<?php
if (empty($post)) {
    return;
}

$imgUrl = get_the_post_thumbnail_url($post->ID);
$terms = get_the_terms($post->ID, 'category');
$term = $terms[0] ?? [];
$timeToRead = get_field('time_to_read', $post->ID);
$url = get_the_permalink($post);
?>

<div class="card_simple <?php echo $card_classes ?? ''; ?>">
    <?php if (!empty($imgUrl)) { ?>
        <a href="<?php echo esc_url($url); ?>" class="card_simple__img">
            <img src="<?php echo esc_url($imgUrl); ?>"
                 alt="<?php echo esc_attr($post->post_title); ?>">
        </a>
    <?php } ?>
    <div class="card_simple__body">
        <div class="card_simple__head">
            <?php if (!empty($term)) { ?>
                <a href="<?php echo get_term_link($term->term_id); ?>" class="card_simple__cat">
                    <span><?php echo esc_html($term->name); ?></span>
                </a>
            <?php } ?>
            <?php if ($timeToRead) { ?>
                <div class="card_simple__time">
                    <?php echo time_to_read($timeToRead); ?>
                </div>
            <?php } ?>
        </div>
        <a href="<?php echo esc_url($url); ?>" class="card_simple__title" title="<?php echo esc_attr($post->post_title); ?>">
            <?php echo esc_html($post->post_title); ?>
        </a>
        <div class="card_simple__date">
            <?php echo date('M d, Y'); ?>
        </div>
    </div>
</div>
