<?php

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
    die();
}

function add_theme_scripts()
{
    wp_enqueue_style('ff_styles', get_template_directory_uri() . '/dist/css/style.css', false, '1.0');
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');
