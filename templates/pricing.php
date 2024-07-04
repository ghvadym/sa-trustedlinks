<?php
/*
 * Template Name: Pricing
 */
get_header();

$post = get_post();
$fields = get_fields($post->ID);
$options = get_fields('options');

get_template_part_var('global/pricing', [
    'light_theme' => true,
    'title'       => $fields['title'] ?? '',
    'subtitle'    => $fields['subtitle'] ?? ''
]);

get_template_part_var('pricing/blocks', [
    'fields' => $fields
]);

get_template_part_var('global/testimonials');

get_template_part_var('global/faq', [
    'fields'  => $fields,
    'options' => $options
]);

get_footer();