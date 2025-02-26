<!doctype html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    $header_type = function_exists('get_field') ? get_field('header_option') : null;
    $header_type_kirki = get_theme_mod('header_type', __("header-1", 'harry'));

    if ($header_type == 'header_1') {
        echo get_template_part("template-parts/headers/header-1");
    } elseif ($header_type == 'header_2') {
        echo get_template_part('template-parts/headers/header-2');
    } else {
        if ($header_type_kirki == "header-1") {
            echo get_template_part("template-parts/headers/header-1");
        } elseif ($header_type_kirki == "header-2") {
            echo get_template_part("template-parts/headers/header-2");
        }
    }


    do_action('techub_header_before');
    ?>