<?php

add_filter('show_admin_bar', '__return_false');
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');

add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_call');
function wp_enqueue_scripts_call()
{
    wp_enqueue_style('swiper-styles', TAI_THEME_URL . '/dest/lib/swiper-slider/swiper.css');
    wp_enqueue_script('swiper-scripts', TAI_THEME_URL . '/dest/lib/swiper-slider/swiper.js');

    wp_enqueue_style('aos-styles', TAI_THEME_URL . '/dest/lib/aos-animation/aos.css');
    wp_enqueue_script('aos-scripts', TAI_THEME_URL . '/dest/lib/aos-animation/aos.js');

    wp_enqueue_style('main-styles', TAI_THEME_URL . '/dest/css/app-styles.css');
    wp_enqueue_script('main-scripts', TAI_THEME_URL . '/dest/js/app-scripts.js', ['jquery'], time());

    wp_localize_script('main-scripts', 'tl_ajax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('tl-nonce')
    ]);

    if (is_home() || is_front_page()) {
        wp_enqueue_style('home-styles', TAI_THEME_URL . '/dest/css/home.css');
        wp_enqueue_script('home-scripts', TAI_THEME_URL . '/dest/js/home-scripts.js', ['jquery'], time());
    }

    if (is_archive() || is_tax() || is_page_template('templates/blog.php')) {
        wp_enqueue_style('archive-styles', TAI_THEME_URL . '/dest/css/archive.css');
        wp_enqueue_script('archive-scripts', TAI_THEME_URL . '/dest/js/archive-scripts.js', ['jquery'], time());
    }

    if (is_single()) {
        wp_enqueue_style('single-styles', TAI_THEME_URL . '/dest/css/single.css');
    }

    if (is_page_template('templates/about-us.php')) {
        wp_enqueue_style('about-styles', TAI_THEME_URL . '/dest/css/about.css');
    }

    if (is_page_template('templates/how-we-work.php')) {
        wp_enqueue_style('how-we-work-styles', TAI_THEME_URL . '/dest/css/how-we-work.css');
    }

    if (is_page_template('templates/case-studies.php')) {
        wp_enqueue_style('case-studies-styles', TAI_THEME_URL . '/dest/css/case-studies.css');
    }

    if (is_page_template('templates/pricing.php')) {
        wp_enqueue_style('case-studies-styles', TAI_THEME_URL . '/dest/css/pricing.css');
    }
}

add_action('after_setup_theme', 'after_setup_theme_call');
function after_setup_theme_call()
{
    register_nav_menus([
        'main_header' => __('Main Header', DOMAIN),
        'main_footer' => __('Main Footer', DOMAIN)
    ]);

    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'excerpt');

    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'unlink-homepage-logo' => true
    ]);

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Options',
            'menu_title' => 'Options',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ]);
    }

    load_theme_textdomain(DOMAIN, get_template_directory() . '/languages');
}

add_action('admin_menu', 'remove_default_post_types');
function remove_default_post_types()
{
    remove_menu_page('edit-comments.php');
}

add_filter('upload_mimes', 'upload_mimes_types');
function upload_mimes_types($types)
{
    $types['svg'] = 'image/svg+xml';
    $types['webp'] = 'image/webp';

    return $types;
}

add_filter('the_content', 'the_content_call', 9999);
function the_content_call($content)
{
    $tags = [
        '<p',
        '<div',
        '<ul',
        '<ol',
        '<h1',
        '<h2',
        '<h3',
        '<h4',
        '<h5',
        '<h6',
    ];

    foreach ($tags as $tag) {
        $content = str_replace($tag, $tag.' data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500"', $content);
    }

    return $content;
}
