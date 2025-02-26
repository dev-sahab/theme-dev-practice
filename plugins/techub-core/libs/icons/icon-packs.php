<?php

function feather_icons(){
    // Append new icons
    $feather_icons = array(
        'feather-activity',
        'feather-airplay',
        'feather-alert-circle',
        'feather-alert-octagon',
        'feather-alert-triangle',
        'feather-align-center',
        'feather-align-justify',
        'feather-align-left',
        'feather-align-right',
    );

    $tabs['tp-feather-icons'] = array(
        'name' => 'tp-feather-icons',
        'label' => esc_html__('TP - Feather Icons', 'tpcore'),
        'labelIcon' => 'tp-icon',
        'prefix' => '',
        'displayPrefix' => 'tp',
        'url' => plugins_url('/', __FILE__) . 'assets/css/feather.css',
        'icons' => $feather_icons,
        'ver' => '1.0.0',
    );
}

function flaticons () {
    
    // Append flaticon fonts icons
    $flat_icons = array(
        'flaticon-search',
        'flaticon-loupe',
        'flaticon-shopping-cart',
        'flaticon-menu',
        'flaticon-it-service',
        'flaticon-right-arrow',
        'flaticon-advertisig-agency'
    );

    $tabs['tp-flaticon-icons'] = array(
        'name' => 'tp-flaticon-icons',
        'label' => esc_html__('TP - Flaticons', 'tpcore'),
        'labelIcon' => 'tp-icon',
        'prefix' => '',
        'displayPrefix' => 'tp',
        'url' => plugins_url('/', __FILE__) . 'assets/css/flaticon.css',
        'icons' => $flat_icons,
        'ver' => '1.0.0',
    );
}

function fontawsomeIcons () {
    
    # fontawesome icon
    $fontawesome_icons = array(
        'angle-up',
        'check',
        'times',
        'calendar',
        'language',
        'shopping-cart',
        'bars',
        'search',
        'map-marker',
        'arrow-right',
        'arrow-left',
        'arrow-up',
        'arrow-down',
        'angle-right',
        'angle-left',
        'angle-up',
        'angle-down',
        'phone',
        'users',
        'user',
        'map-marked-alt',
        'trophy-alt',
        'envelope',
        'marker',
        'globe',
        'broom',
        'home',
        'bed',
        'chair',
        'bath',
        'tree',
        'laptop-code',
        'cube',
        'cog',
        'play',
        'trophy-alt',
        'heart',
        'truck',
        'user-circle',
        'map-marker-alt',
        'comments',
         'award',
        'bell',
        'book-alt',
        'book-open',
        'book-reader',
        'graduation-cap',
        'laptop-code',
        'music',
        'ruler-triangle',
        'user-graduate',
        'microscope',
        'glasses-alt',
        'theater-masks',
        'atom'
    );

    $tabs['tp-fontawesome-icons'] = array(
        'name' => 'tp-fontawesome-icons',
        'label' => esc_html__('TP - Fontawesome Pro Light', 'tpcore'),
        'labelIcon' => 'tp-icon',
        'prefix' => 'fa-',
        'displayPrefix' => 'fal',
        'url' => plugins_url('/', __FILE__) . 'assets/css/fontawesome-all.min.css',
        'icons' => $fontawesome_icons,
        'ver' => '1.0.0',
    );
}