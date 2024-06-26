<?php

function breadcrumbs()
{
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
    }
}

function custom_get_page_title(): string
{
    $blogName = get_bloginfo('name');
    if (is_archive() || is_tax()) {
        $postData = get_queried_object();
        $title = ucfirst($postData->name) . ' - ' . $blogName;
    } else if (is_home() || is_front_page()) {
        $title = get_bloginfo('name');
    }else {
        $title = get_the_title() . ' - ' . $blogName;;
    }

    return $title;
}

function text_spaces_control(string $string = ''): string
{
    return $string ? str_replace("\n", '<br>', $string) : '';
}

function time_to_read($time = ''): string
{
    if (!$time) {
        return '';
    }

    return sprintf('%s min', $time);
}

function socials_share_links($name): string
{
    switch ($name) {
        case 'X':
            return 'https://twitter.com/share?url=[link]&text=[title]';
        case 'Facebook':
            return 'https://www.facebook.com/sharer/sharer.php?u=[link]';
        case 'Linkedin':
            return 'https://www.linkedin.com/sharing/share-offsite/?url=[link]';
    }

    return '';
}