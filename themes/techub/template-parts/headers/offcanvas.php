<?php
$offcanvas_header_content = get_theme_mod('offcanvas_header_content', __('Techub is the partner of choice for many of the world’s leading enterprises. We help businesses development.', 'techub'));
$offcanvas_logo = get_theme_mod('offcanvas_logo', __(get_template_directory_uri() . '/assets/img/logo/logo.png', 'techub'));
$offcanvas_logo_width = get_theme_mod('offcanvas_logo_width', __('150', 'techub'));

$offcanvas_contact_info_switch = get_theme_mod('offcanvas_contact_info_switch', false);
$address = get_theme_mod('address', __('Manchester 21, Zurich, CH', 'techub'));
$address_url = get_theme_mod('address_url', __('#', 'techub'));
$email_address = get_theme_mod('email_address', __('techubinfo@mail.com', 'techub'));
$phone_number = get_theme_mod('phone_number', __('(+00) 678 345 98568', 'techub'));

$offcanvas_social_links_switch = get_theme_mod('offcanvas_social_links_switch', false);
$facebook_url = get_theme_mod('facebook_url', __('#', 'techub'));
$instagram_url = get_theme_mod('instagram_url', __('#', 'techub'));
$x_url = get_theme_mod('x_url', __('#', 'techub'));
$linkedin_url = get_theme_mod('linkedin_url', __('#', 'techub'));
$pinterest_url = get_theme_mod('pinterest_url', __('#', 'techub'));
?>

<!-- tp-offcanvas-area-start -->
<div class="tpoffcanvas-area">
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="tpoffcanvas__logo">
            <a href="index.html">
                <img src="<?php echo esc_url($offcanvas_logo) ?>" style="width: <?php echo esc_attr($offcanvas_logo_width) ?>px" alt="<?php echo bloginfo(); ?>">
            </a>
        </div>
        <?php if(!empty($offcanvas_header_content)) :?>
        <div class="tpoffcanvas__title">
            <p><?php echo esc_html($offcanvas_header_content) ?></p>
        </div>
        <?php endif;?>
        <div class="tp-main-menu-mobile d-xl-none"></div>
        <?php if(!empty($offcanvas_contact_info_switch)) : ?>
        <div class="tpoffcanvas__contact-info">
            <div class="tpoffcanvas__contact-title">
                <h5><? echo esc_html__('Contact us', 'techub') ?></h5>
            </div>
            <ul>
                <?php if (!empty($address)) : ?>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="<?php echo esc_url($address_url) ?>" target="_blank"><?php echo esc_html($address) ?></a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($email_address)) : ?>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo esc_url($email_address) ?>"><span class="__cf_email__"><?php echo esc_html($email_address) ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($phone_number)) : ?>
                    <li>
                        <i class="fa-solid fa-phone-flip"></i>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^\d+]/', '', $phone_number)) ?>"><?php echo esc_html($phone_number) ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(!empty($offcanvas_social_links_switch)):?>
        <div class="tpoffcanvas__social">
            <div class="social-icon">
            <?php techub_social_links(); ?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<div class="body-overlay"></div>
<!-- tp-offcanvas-area-end -->