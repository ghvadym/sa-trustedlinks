<?php
wp_footer();
get_template_part_var('global/cta');
?>

</main>

<footer id="footer" class="footer">
    <div class="container">
        <div class="footer__body">
            <div class="footer__row">
                <div class="footer__col">
                    <?php if (function_exists('the_custom_logo') && has_custom_logo()): ?>
                        <div class="footer__logo logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $companyInfoList = acf_option('company_info');
                    if (!empty($companyInfoList)) { ?>
                        <div class="footer__company_info">
                            <?php foreach ($companyInfoList as $companyInfoItem) {
                                $title = $companyInfoItem['title'] ?? '';
                                $link = $companyInfoItem['link'] ?? [];

                                if (!$title || empty($link) || !is_array($link)) {
                                    continue;
                                }

                                $url = $link['url'] ?? '';
                                $linkTitle = $link['title'] ?? '';
                                $target = $link['target'] ?? '';
                                ?>
                                <div class="company_info">
                                    <strong>
                                        <?php echo esc_html($title); ?>
                                    </strong>
                                    <a href="<?php echo esc_url($url); ?>"
                                       target="<?php echo esc_attr($target); ?>">
                                        <?php echo esc_html($linkTitle); ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php
                    $footerImgUrl = acf_option('footer_img');
                    if ($footerImgUrl) { ?>
                        <div class="footer__img">
                            <img src="<?php echo esc_url($footerImgUrl); ?>" alt="Clutch image">
                        </div>
                    <?php } ?>
                </div>
                <div class="footer__col">
                    <?php
                    $socials = acf_option('socials');
                    if (!empty($socials)) { ?>
                        <div class="socials">
                            <?php foreach ($socials as $social) {
                                $imageUrl = $social['img'] ?? '';
                                $url = $social['url'] ?? '';
                                $bgUrl = $social['bg'] ?? '';

                                if (!$imageUrl || !$url) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo esc_url($url); ?>"
                                   target="_blank"
                                   rel="noopener nofollow"
                                   class="social__item">
                                    <img src="<?php echo esc_url($imageUrl); ?>" alt="Social" class="social__item_icon">
                                    <?php if ($bgUrl) { ?>
                                        <img src="<?php echo esc_url($bgUrl); ?>" alt="Social background" class="social__item_bg">
                                    <?php } ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php wp_nav_menu([
                        'theme_location' => 'main_footer',
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
