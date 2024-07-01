<?php
/*
 * Template Name: Pricing
 */
get_header();

$post = get_post();
$fields = get_fields($post->ID);

get_template_part_var('global/pricing', [
    'bg'          => get_post_thumbnail_id($post),
    'light_theme' => true,
    'title'       => $fields['title'] ?? '',
    'subtitle'    => $fields['subtitle'] ?? ''
]);

get_template_part_var('pricing/blocks', [
    'fields' => $fields,
    'bgUrl'  => get_the_post_thumbnail_url($post->ID, 'full')
]);

get_template_part_var('global/testimonials');

get_template_part_var('global/faq', [
    'fields' => $fields
]);

get_footer();