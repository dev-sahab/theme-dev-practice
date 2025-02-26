<?php

/** Techub Header Logo */
function techub_header_logo()
{
    $header_logo = get_theme_mod('header-logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
    $header_logo_width = get_theme_mod('header_logo_width', '120');
?>

    <a href="<?php echo get_home_url('/'); ?>"><img src="<?php echo esc_url($header_logo) ?>" width="<?php echo esc_attr($header_logo_width) ?>px" alt="<?php echo bloginfo() ?>"></a>

    <?php }

/** Techub Social Links Elements */
function techub_social_links()
{
    $facebook_url = get_theme_mod('facebook_url', __('#', 'techub'));
    $instagram_url = get_theme_mod('instagram_url', __('#', 'techub'));
    $x_url = get_theme_mod('x_url', __('#', 'techub'));
    $linkein_url = get_theme_mod('linkedin_url', __('#', 'techub'));
    $pinterest_url = get_theme_mod('pinterest_url', __('#', 'techub'));

    if (!empty($facebook_url)) : ?>
        <a href="<?php echo esc_url($facebook_url) ?>"><i class="fa-brands fa-facebook"></i></a>
    <?php endif; ?>
    <?php if (!empty($instagram_url)) : ?>
        <a href="<?php echo esc_url($instagram_url) ?>"><i class="fa-brands fa-instagram"></i></a>
    <?php endif; ?>
    <?php if (!empty($x_url)) : ?>
        <a href="<?php echo esc_url($x_url) ?>"><i class="fa-brands fa-twitter"></i></a>
    <?php endif; ?>
    <?php if (!empty($pinterest_url)) : ?>
        <a href="<?php echo esc_url($pinterest_url) ?>"><i class="fa-brands fa-pinterest"></i></a>
    <?php endif; ?>
    <?php if (!empty($linkein_url)) : ?>
        <a href="<?php echo esc_url($linkein_url) ?>"><i class="fa-brands fa-linkedin"></i></a>
<?php endif;
}

/** Techub Header Menu */
function techub_header_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'main-menu', // menu ID from register menu
        'menu_class' => '', // nav ul class
        'menu_id' => '', // nav ul id
        'container' => '',
        'fallback_cb'    => "Techub_Walker_Nav_Menu::fallback",
        'walker' => new Techub_Walker_Nav_Menu,
    ));
}

/**
 * Sanitize HTML markup for safe front-end display.
 *
 * This function ensures that only specific HTML tags and attributes 
 * are allowed, preventing malicious code injection (XSS attacks).
 *
 * @param  string $allow_html_code The HTML content to sanitize.
 * @return string Sanitized HTML markup.
 */
function techub_kses($allow_html_code = '')
{
    // Define allowed HTML tags and attributes
    $allowed_html = [
        'a'      => [
            'href'   => true,
            'class'  => true,
            'id'     => true,
            'target' => true,
        ],
        'strong' => [],  // Allow bold text
        'em'     => [],  // Allow italic text
        'span'   => ['class' => true], // Allow span with class
        'br'     => [],  // Allow line breaks
    ];

    // Sanitize and return the safe HTML
    return wp_kses($allow_html_code, $allowed_html);
}

/**
 * Pagination nav
 */
function techub_pagination()
{
    $pages = paginate_links(array(
        'type' => 'array',
        'prev_text' => __('<i class="fa-solid fa-arrow-left-long"></i>', 'techub'),
        'next_text' => __('<i class="fa-solid fa-arrow-right-long"></i>', 'techub')
    ));

    if ($pages) {
        echo '<div class="tp-postbox-pagination"><nav><ul>';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul></nav></div>';
    }
}

function techub_get_tags()
{
    $post_tags = get_the_tags();
    if ($post_tags) {
        foreach ($post_tags as $tag) {
            echo '<a href="' . get_tag_link($tag) . '">' . esc_html($tag->name) . '</a>';
        }
    }
}
