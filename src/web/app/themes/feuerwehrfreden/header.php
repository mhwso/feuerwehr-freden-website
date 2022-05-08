<!doctype html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('d-flex flex-column min-vh-100'); ?>>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light m-0 fixed-top shadow-sm">
            <div class="container">


                <a class="navbar-brand" href="<?php echo home_url() ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <?php

                        if (has_custom_logo()) {
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            echo '<img id="custom-logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                        } ?>

                        <span id="blog-title" class="text-uppercase"><?php echo get_bloginfo('name') ?></span>
                    </div>

                </a>

                <div id="main-nav">
                    <?php
                    wp_nav_menu(
                            [
                                    'menu' => 'primary',
                                    'container' => '',
                                    'theme_location' => 'primary',
                                    'items_wrap' => '<ul id="main-nav-menu" class="nav">%3$s</ul>'
                            ]
                    )
                    ?>
                </div>
            </div>
        </nav>
    </header>
