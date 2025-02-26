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




include_once('inc/common/scripts.php');
include_once('inc/template-functions.php');
include_once('inc/nav-walker.php');
include_once('inc/searchform.php');
include_once('inc/recent-post-widget.php');
include_once('inc/breadcrumb.php');
include_once('inc/class-tgm-plugin-activation.php');
include_once('inc/add_plugin.php');
if (class_exists('Kirki')) {
    include_once('inc/techub-kirki.php');
}
