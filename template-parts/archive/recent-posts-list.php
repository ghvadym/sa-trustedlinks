<?php
if (empty($posts)) {
    return;
}

$i = 1;
foreach ($posts as $post) {
    $isMob = wp_is_mobile();
    $cardClass = '';

    if ($isMob) {
        $cardClass = ' full_image';
    } else {
        if ($i === 1) {
            $cardClass = ' card_right_content';
        }

        if ($i === 2) {
            $cardClass = ' full_image';
        }
    }

    get_template_part_var('cards/blog-card', [
        'post'         => $post,
        'card_classes' => $cardClass
    ]);

    $i++;
}
