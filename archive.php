<?php
/*
 * Template Name: Blog
 */
get_header();
?>

    <section class="hero white_theme">
        <div class="container">
            <h1 class="title">
                <?php echo single_term_title(); ?>
            </h1>
        </div>
    </section>
    <section class="archive">
        <div class="container">
            <?php if (have_posts()) { ?>
                <div class="archive__posts">
                    <?php $i = 1; while (have_posts()) {
                        $additionalClass = '';
                        if ($i % 2 === 0) {
                            $additionalClass = 'full_image';
                        }

                        the_post();
                        get_template_part_var('cards/blog-card', [
                            'post'         => get_post(),
                            'card_classes' => $additionalClass
                        ]);

                        $i++;
                    } ?>
                </div>
            <?php } ?>
            <?php get_template_part_var('global/pagination'); ?>
        </div>
    </section>

<?php
get_footer();