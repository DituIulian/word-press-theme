<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
</head>

<body
    <?php body_class();
    ?>>

    <?php

    get_template_part('template-parts/navigation/navigation', 'top'); ?>
    <div class="navbar-search container">
        <?php get_search_form(); ?>
    </div>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'bs-example-navbar-collapse-1',
        'menu_class' => 'navbar-nav mr-auto',
        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
        'walker' => new WP_Bootstrap_Navwalker(),
    ));

    ?>



    <div class="container">