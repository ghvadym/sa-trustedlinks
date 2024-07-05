<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="preconnect" href="https://fonts.googleapis.com">-->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
<!--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">-->
    <title><?php echo custom_get_page_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(is_page_template('templates/pricing.php') || is_page_template('templates/how-we-work.php') || is_page_template('templates/case-studies.php') || is_archive() || is_tax() ? 'main_bg' : ''); ?>>
<?php wp_body_open(); ?>
<header id="header" class="header">
    <div class="container">
        <div class="header__row">
            <div class="header__logo logo">
                <?php if (function_exists('the_custom_logo') && has_custom_logo()):
                    the_custom_logo();
                endif;

                $logoIconId = acf_option('logo_icon'); ?>
                <?php if ($logoIconId) {
                    $logoIconUrl = wp_get_attachment_image_url($logoIconId, 'full'); ?>
                    <a href="<?php echo home_url(); ?>" class="logo_icon" rel="home">
                        <img src="<?php echo esc_attr($logoIconUrl); ?>" alt="<?php echo get_the_title($logoIconId); ?>">
                    </a>
                <?php } ?>
            </div>
            <div class="header__menu">
                <?php if ($bgImg = acf_option('modal_window_bg')) { ?>
                    <img src="<?php echo esc_url($bgImg); ?>" alt="Header menu background" class="header__menu_bg section_bg">
                <?php } ?>
                <?php wp_nav_menu([
                    'theme_location' => 'main_header',
                ]); ?>
                <img src="<?php img_url('Close.svg') ?>" alt="Close" class="header_close_icon">
            </div>
            <div class="header__burger">
                <img src="<?php img_url('Burger.svg') ?>" alt="Burger" class="header_burger_icon">
            </div>
        </div>
    </div>
</header>
<main class="main">