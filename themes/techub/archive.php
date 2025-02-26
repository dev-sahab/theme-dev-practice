<?php get_header();?>


<!-- postbox area start -->
<section class="tp-postbox-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="tp-postbox-wrapper">
                    <div class="row">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-xl-4 col-md-6">
                                    <?php echo get_template_part('template-parts/content', get_post_format()) ?>
                                </div>
                            <?php endwhile;
                        else : ?>
                            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php techub_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- postbox area end -->



<?php get_footer();
