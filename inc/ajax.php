<?php

register_ajax([
    'posts_filter'
]);

function posts_filter()
{
    check_ajax_referer('tl-nonce', 'nonce');

    $data = sanitize_post($_POST);
    $termId = $data['term_id'] ?? 0;
    $page = $data['page'] ?? 1;

    if (empty($data)) {
        wp_send_json_error('There is no data');
        return;
    }

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'DATE',
        'order'          => 'DESC',
        'posts_per_page' => 5,
        'paged'          => $page
    ];

    if ($termId) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'id',
                'terms'    => [$termId]
            ]
        ];
    }

    $posts =  new WP_Query($args);
    $pagination = '';

    ob_start();
    if ($posts->have_posts()) {
        get_template_part_var('archive/recent-posts-list', [
            'posts' => $posts
        ]);
    } else {
        echo '<h3 class="no-posts-message">' . __('Posts not found', DOMAIN) . '</h3>';
    }
    $postsHtml = ob_get_contents();
    ob_end_clean();

    if ($posts->have_posts()) {
        ob_start();
        get_template_part_var('global/pagination', [
            'current' => $page,
            'total'   => ceil($posts->found_posts / 5)
        ]);
        $pagination = ob_get_contents();
        ob_end_clean();
    }

    wp_send_json([
        'posts' => $postsHtml,
        'nav'   => $pagination
    ]);
}