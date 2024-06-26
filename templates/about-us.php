<?php
/*
 * Template Name: About Us
 */
get_header();
$post = get_post();
$fields = get_fields($post->ID);

get_template_part_var('about/hero', [
    'fields' => $fields,
    'post'   => $post
]);

get_template_part_var('about/achievements', [
    'fields' => $fields,
    'post'   => $post
]);

get_template_part_var('about/mission', [
    'fields' => $fields,
    'post'   => $post
]);

get_template_part_var('global/recommended-posts');

get_footer();
