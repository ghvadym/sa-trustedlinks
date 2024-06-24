<?php
/*
* Template name: Home
*/

get_header();

$post_id = get_the_ID();
$fields = get_fields($post_id);

get_template_part_var('home/hero', [
    'fields' => $fields
]);
get_template_part_var('home/how-we-work', [
    'fields' => $fields
]);
get_template_part_var('home/case-studies', [
    'fields' => $fields
]);
get_template_part_var('home/pr-service', [
    'fields' => $fields
]);
get_template_part_var('global/testimonials');
get_template_part_var('global/pricing', [
    'bg' => acf_option('pricing_bg')
]);
get_template_part_var('home/services', [
    'fields' => $fields
]);
get_template_part_var('home/blog', [
    'fields' => $fields
]);

get_footer();
