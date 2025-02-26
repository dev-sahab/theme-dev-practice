<?php
$copyright_text = get_theme_mod('copyright_text', __('Full Copyright & Design By <a href="#">@ Theme pure</a> – 2024', 'techub'));
$footer_background_image = get_theme_mod('footer_background_image', __('', 'techub'));


// Define column classes dynamically
function get_col_number($default_col_num)
{
    // Count active sidebars
    $active_sidebars = array_filter([
        'footer-1' => is_active_sidebar('footer-1'),
        'footer-2' => is_active_sidebar('footer-2'),
        'footer-3' => is_active_sidebar('footer-3'),
        'footer-4' => is_active_sidebar('footer-4')
    ]);

    // Get the total number of active sidebars
    $sidebar_count = count($active_sidebars);

    if ($sidebar_count == 1) {
        return esc_attr('12'); // Full width for 1 sidebar
    } elseif ($sidebar_count == 2) {
        return esc_attr('6'); // Two equal columns
    } elseif ($sidebar_count == 3) {
        return esc_attr('4'); // Three equal columns
    } else {
        return esc_attr($default_col_num); // Use default value if 4 sidebars are active
    }
}

?>
<!-- Footer area start -->
<section class="tp-footer-area tp-footer-4-area  p-relative">
    <?php if (
        is_active_sidebar('footer-1') ||
        is_active_sidebar('footer-2') ||
        is_active_sidebar('footer-3') ||
        is_active_sidebar('footer-4')
    ) : ?>
        <div class="tp-footer-4-bg-shape">
            <img src="<?php echo esc_url($footer_background_image); ?>" alt="<?php echo bloginfo(); ?>">
        </div>
        <div class="tp-footer-top pt-120 pb-55">
            <div class="container">
                <div class="row">
                    <div class="col-xl-<?php echo get_col_number(4); ?> col-lg-<? echo get_col_number(5); ?> col-md-6 col-sm-6 mb-50">
                        <?php if (is_active_sidebar('footer-1')) { ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php } ?>
                    </div>
                    <div class="col-xl-<?php echo get_col_number(2); ?> col-lg-<?php echo get_col_number(3); ?> col-md-6 col-sm-6 mb-50">
                        <?php if (is_active_sidebar('footer-2')) { ?>
                            <?php dynamic_sidebar('footer-2'); ?>
                        <?php } ?>
                    </div>
                    <div class="col-xl-<?php echo get_col_number(3); ?> col-lg-<?php echo get_col_number(4); ?> col-md-6 col-sm-6 mb-50">
                        <?php if (is_active_sidebar('footer-3')) { ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php } ?>
                    </div>
                    <div class="col-xl-<?php echo get_col_number(3); ?> col-lg-<?php echo get_col_number(4); ?> col-md-6 col-sm-6 mb-50">
                        <?php if (is_active_sidebar('footer-4')) { ?>
                            <?php dynamic_sidebar('footer-4'); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="tp-footer-bottom tp-footer-4-bottom pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-footer-copy-right text-center wow fadeInUp">
                        <p class="tp-footer-copy-paragraph tp-footer-4-copy-paragraph"><?php echo techub_kses($copyright_text) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer area end -->