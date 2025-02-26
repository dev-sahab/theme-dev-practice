<?php get_header();
?>

<!-- page area start -->
<section class="tp-page-area pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-page-wrapper">
                    <?php
                    if (have_posts()) : while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page area end -->

<?php get_footer();