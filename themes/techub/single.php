<?php get_header();
?>


<!-- postbox area start -->
<section class="tp-postbox-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="tp-postbox-wrapper">
                    <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <?php echo get_template_part('template-parts/content', get_post_format());

                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>

                            <div class="row post-nav mb-50">
                                <div class="col-md-6 prev-post">
                                    <?php if ($prev_post) : ?>
                                        <a href="<?php echo get_permalink($prev_post) ?>">
                                            <h3 style="font-size: 16px">
                                                <i class="fa fa-arrow-left mr-5"></i> <?php echo get_the_title($prev_post) ?>
                                            </h3>

                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 next-post text-end">
                                    <?php if ($next_post) : ?>
                                        <a href="<?php echo get_permalink($next_post) ?>">
                                            <h3 style="font-size: 16px"><?php echo get_the_title($next_post) ?> <i class="fa fa-arrow-right ml-5"></i></h3>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php get_template_part("/template-parts/biography") ?>


                            <div class="tp-postbox-comment mb-50">
                                <?php
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif; ?>
                            </div>
                    <?php endwhile;
                    endif; ?>




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
