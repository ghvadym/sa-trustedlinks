<?php

register_ajax([
    'posts_filter'
]);

function posts_filter()
{
    check_ajax_referer('tl-nonce', 'nonce');

    $data = sanitize_post($_POST);
    $termId = $data['term_id'] ?? 0;

    if (empty($data)) {
        wp_send_json_error('There is no data');
        return;
    }

    $args = [
        'numberposts' => 5
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

    $posts = _get_posts($args);

    ob_start();

    if (!empty($posts)) {
        get_template_part_var('archive/recent-posts-list', [
            'posts' => $posts
        ]);
    } else {
        echo '<h3 class="no-posts-message">' . __('Posts not found', DOMAIN) . '</h3>';
    }

    $html = ob_get_contents();
    ob_end_clean();

    wp_send_json([
        'posts' => $html
    ]);
}