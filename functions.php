<?php

if (!function_exists('theme_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function theme_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('text_domain', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary'   => __('Primary Menu', 'text_domain'),
            'secondary' => __('Secondary Menu', 'text_domain')
        ));

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
    }
} // theme_setup
add_action('after_setup_theme', 'theme_setup');

function add_css_and_js()
{
    // css din bootstrap
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/modules/dist/css/bootstrap.css');

    //css creat de mine
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

    // js din bootstrap
    wp_enqueue_script('my-script', get_template_directory_uri() . '/modules/dist/js/bootstrap.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'add_css_and_js');


function register_navwalker()
{
    require_once  get_template_directory() . '/modules/wp-bootstrap-navwalker-4.3.0/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

// function register_my_menu()
// {
//     register_nav_menu('primary', __('Primary Menu'));
// }
// add_action('after_setup_theme', 'register_my_menu');

register_nav_menus(array(
    'primary' => __('Primary Menu', 'ditu-iulian'),
));

add_theme_support('custom-logo');

function themename_custom_logo_setup()
{
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');


function wpb_init_widgets_custom($id)
{
    register_sidebar(array(
        'name' => 'footer-widgets',
        'id'   => 'footer-widgets',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'wpb_init_widgets_custom');
