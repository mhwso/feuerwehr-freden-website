<?php

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
    die();
}

add_action('init', 'ff_menus');
add_action('wp_enqueue_scripts', 'ff_add_theme_scripts');
add_action('after_setup_theme', 'ff_add_theme_support');
add_filter('excerpt_length', 'ff_change_excerpt_length');

function ff_change_excerpt_length($length): int
{
    return 10;
}

function ff_add_theme_scripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ff_styles', get_template_directory_uri() . '/dist/css/style.css', false, $version);
    wp_enqueue_script('ff_js', get_template_directory_uri() . '/dist/js/index.js', false, $version, true);
}

function ff_add_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

function ff_menus()
{
    $locations = [
        'primary' => 'Main Menu',
        'footer' => 'Footer Menu'
    ];

    register_nav_menus($locations);
}
