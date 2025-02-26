<?php get_header();
?>

<h1>this is portfolio single</h1>
<!-- postbox area start -->
<section class="tp-postbox-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="tp-postbox-wrapper">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <?php echo get_template_part('template-parts/content', get_post_format()) ?>
                        <?php endwhile;
                    else : ?>
                        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                    <?php techub_pagination(); ?>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="sidebar__wrapper">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- postbox area end -->



<?php get_footer();
