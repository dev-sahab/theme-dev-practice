<?php

function techub_theme_support()
{
    /**  thumbnail */
    add_theme_support('post-thumbnails');

    /** automatic feed link*/
    add_theme_support('automatic-feed-links');

    /** tag-title **/
    add_theme_support('title-tag');


    /** HTML5 support **/
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

    /** refresh widgest **/
    add_theme_support('customize-selective-refresh-widgets');
    /** WooCommerce support */
    add_theme_support('woocommerce');
    /** remove woocommerce css support */
    add_filter('woocommerce_enqueue_styles', '__return_false');

    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');


    add_theme_support('post-formats', array(
        'image',
        'video',
        'audio',
        'gallery',
        'quote'
    ));

    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'techub'),
        'footer-menu'  => __('Footer Menu', 'techub'),
    ));

    remove_theme_support('widgets-block-editor');
}

add_action("after_setup_theme", "techub_theme_support");

/**
 * Add a sidebar.
 */
function techub_widgets_register()
{
    register_sidebar(array(
        'name'          => __('Shop Page Sidebar', 'techub'),
        'id'            => 'shop_archive_sidebar',
        'description'   => __('Widgets in this area will be shown on shop archive sidebar', 'techub'),
        'before_widget' => '<div id="%1$s" class="shop__sidebar on-left %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="product__widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Post Archive Sidebar', 'techub'),
        'id'            => 'post_archive_sidebar',
        'description'   => __('Widgets in this area will be shown on blog archive sidebar', 'techub'),
        'before_widget' => '<div id="%1$s" class="sidebar__widget sidebar__widget-theme-bg mb-30 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 01', 'techub'),
        'id'            => 'footer-1',
        'description'   => __('Widgets in this area will be shown on footer section column 1', 'techub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-cols-1 pr-75 tp-footer-widget-cutm-pdg-4 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 02', 'techub'),
        'id'            => 'footer-2',
        'description'   => __('Widgets in this area will be shown on footer section column 1', 'techub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-4-widget footer-cols-2 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 03', 'techub'),
        'id'            => 'footer-3',
        'description'   => __('Widgets in this area will be shown on footer section column 1', 'techub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-4-widget footer-cols-3 pl-50 tp-footer-widget-cutm-pdg-3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 04', 'techub'),
        'id'            => 'footer-4',
        'description'   => __('Widgets in this area will be shown on footer section column 1', 'techub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-cols-4 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'techub_widgets_register');

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fix_svg');


include_once('inc/common/scripts.php');
include_once('inc/template-functions.php');
include_once('inc/nav-walker.php');
include_once('inc/searchform.php');
include_once('inc/recent-post-widget.php');
include_once('inc/breadcrumb.php');
if (class_exists('WooCommerce')) {
    include_once('inc/harry-woo.php');
}

if (class_exists('Kirki')) {
    include_once('inc/techub-kirki.php');
}
