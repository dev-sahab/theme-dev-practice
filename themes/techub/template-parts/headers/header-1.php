<?php
$address = get_theme_mod("address", __("Manchester 21, Zurich, CH", "techub"));
$address_url = get_theme_mod("address_url", __("#", "techub"));
$email_address = get_theme_mod("email_address", __("techubinfo@mail.com", "techub"));
$topbar_background_color = get_theme_mod("topbar_background_color", __("#212e44", "techub"));
$topbar = get_theme_mod("topbar-switch", false);

// Main Header 
$header_search_switch = get_theme_mod("header_search_switch", false);
$right_header_section = get_theme_mod("right_header_section", false);
$header_button_text = get_theme_mod("header_button_text", __("Get a Quete", "techub"));
$header_button_url = get_theme_mod("header_button_url", __("#", "techub"));

$right_col = empty($right_header_section) || (empty($header_search_switch) && empty($header_button_text)) ? "10 text-end" : "6";
?>

<!-- header area start -->
<header class="tp-header-height">
    <?php if (!empty($topbar)) : ?>
        <div class="tp-header-top tp-header-5-top pt-10 pb-10 pl-110 pr-110 d-none d-xl-block" style="background-color: <?php echo esc_attr($topbar_background_color); ?>;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="tp-header-top-address tp-header-5-top-address">
                            <?php if (!empty($address)) : ?>
                                <span><i class="fa-thin fa-location-dot"></i><a href="<?php echo esc_url($address_url) ?>"><?php echo esc_html($address); ?></a></span>
                            <?php endif ?>

                            <?php if (!empty($email_address)) : ?>
                                <span><i class="fa-light fa-envelope"></i> <a href="mailto:<?php echo esc_attr($email_address); ?>"><?php echo esc_html($email_address); ?></a></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="tp-header-top-right d-flex justify-content-end">
                            <div class="tp-header-top-menu">
                                <ul>
                                    <li><a href="faq.html">Faq <span>/</span></a></li>
                                    <li><a href="service.html">Service <span>/</span></a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                            <div class="tp-header-top-social">
                                <?php techub_social_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div id="header-sticky" class="tp-header-bottom">
        <div class="tp-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="logo">
                            <?php techub_header_logo() ?>
                        </div>
                    </div>
                    <div class="col-xl-<?php echo esc_attr($right_col); ?> d-none d-xl-block">
                        <div class="main-menu main-menu-5">
                            <nav class="tp-main-menu-content">
                                <?php techub_header_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-8 col-md-8 col-6">
                        <div class="tp-header-right d-flex justify-content-end align-items-center">
                            <?php if (!empty($right_header_section)) : ?>

                                <!-- header search button -->
                                <?php if (!empty($header_search_switch)): ?>
                                    <div class="tp-header-search search-box-outer d-none d-md-block">
                                        <button><i class="flaticon-search"></i></button>
                                    </div>
                                <?php endif; ?>
                                <!-- header button -->
                                <?php if (!empty($header_button_text)) : ?>
                                    <div class="tp-header-button d-none d-lg-block">
                                        <a class="tp-header-btn" rel="noreferrer" href="<?php echo esc_url($header_button_url) ?>" target="_blank"><span><?php echo esc_html($header_button_text); ?></span></a>
                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>
                            <!-- header mobile menu ber -->
                            <div class="tp-header-menu-ber">
                                <button class="d-xl-none tp-header-5-bar tp-menu-bar"><i class="fa-solid fa-bars"></i></button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->


<?php
echo get_template_part("template-parts/headers/header-search");
echo get_template_part("template-parts/headers/offcanvas");
?>