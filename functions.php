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


function contact_design($valori)
{
    return "<span class='p-2 d-inline-block bg-info'><span>";
}
add_shortcode("contactez", "contact_design");


// Our custom post type function
function create_my_custom_post_types_for_movies()
{

    register_post_type(
        'my_movies',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Movies'),
                'singular_name' => __('Movie')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
            'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields',),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_my_custom_post_types_for_movies');


// Our custom post type function
function create_my_custom_post_types_for_actors()
{

    register_post_type(
        'my_actors',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Actors'),
                'singular_name' => __('Actor')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'actors'),
            'show_in_rest' => true,
            'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields',),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_my_custom_post_types_for_actors');


// Our custom post type function
function create_my_custom_post_types_for_directors()
{

    register_post_type(
        'my_directors',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Directors'),
                'singular_name' => __('Director')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'directors'),
            'show_in_rest' => true,
            'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields',),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_my_custom_post_types_for_directors');


//create a custom taxonomy name it genres for your posts
function create_my_custom_taxonomie_genre()
{

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels_for_genre = array(
        'name' => _x('Genres', 'taxonomy general name'),
        'singular_name' => _x('Genre', 'taxonomy singular name'),
        'search_items' =>  __('Search Genres'),
        'all_items' => __('All Genres'),
        'parent_item' => __('Parent Genre'),
        'parent_item_colon' => __('Parent Genre:'),
        'edit_item' => __('Edit Genre'),
        'update_item' => __('Update Genre'),
        'add_new_item' => __('Add New Genre'),
        'new_item_name' => __('New Genre Name'),
        'menu_name' => __('Genres'),
    );

    // Now register the taxonomy
    register_taxonomy('my_genres', array('my_movies'), array(
        'labels' => $labels_for_genre,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'genre'),
    ));
}

//hook into the init action and call create_my_custom_taxonomies when it fires
add_action('init', 'create_my_custom_taxonomie_genre', 0);


//create a custom taxonomy name it genres for your posts
function create_my_custom_taxonomie_year()
{

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels_for_year = array(
        'name' => _x('Years', 'taxonomy general name'),
        'singular_name' => _x('Year', 'taxonomy singular name'),
        'search_items' =>  __('Search Years'),
        'all_items' => __('All Years'),
        'parent_item' => __('Parent Year'),
        'parent_item_colon' => __('Parent Year:'),
        'edit_item' => __('Edit Year'),
        'update_item' => __('Update Year'),
        'add_new_item' => __('Add New Year'),
        'new_item_name' => __('New Year Name'),
        'menu_name' => __('Years'),
    );

    // Now register the taxonomy
    register_taxonomy('my_years', array('my_movies'), array(
        'labels' => $labels_for_year,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'year'),
    ));
}

//hook into the init action and call create_my_custom_taxonomies when it fires
add_action('init', 'create_my_custom_taxonomie_year', 0);


add_action('mb_relationships_init', function () {
    MB_Relationships_API::register([
        'id'   => 'movies_to_actors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Actors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_actors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ]);

    MB_Relationships_API::register([
        'id'   => 'movies_to_directors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Directors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_directors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ]);
});


function check_old_movie($release_date)
{
    $today = date("Y");
    if ($today - $release_date >= 40) {
        return   "<p class='badge bg-danger text-wrap'>" . $release_date . " Old movie: *" . ($today - $release_date) . " years ago*</p>";
    } else {
        return  "<p class='badge bg-success text-wrap'>Release date:</p> " . $release_date;
    }
}

function runtimePrettier($minute)
{
    if ($minute <= 0) {
        return "Unknown";
    }

    $ore = floor($minute / 60);
    $minuteRamase = $minute - ($ore * 60);

    if ($ore > 0) {
        return "<strong>Runtime:</strong> $ore hours $minuteRamase minutes";
    } else {
        return "<strong>Runtime:</strong> $minuteRamase minutes";
    }
}
