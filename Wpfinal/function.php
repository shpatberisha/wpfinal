<?php
require get_template_directory() . '/inc/customizer.php';


function carsallon_load_assets() {

    wp_enqueue_style(
        'carsallon-style',
        get_stylesheet_uri(),
        array(),
        filemtime( get_template_directory() . '/style.css' ),
        'all'
    );

    wp_enqueue_script(
        'carsallon-dropdown',
        get_template_directory_uri() . '/js/dropdown.js',
        array(),
        '1.0',
        false 
    );

    
    wp_enqueue_script(
        'carsallon-slider',
        get_template_directory_uri() . '/js/slider.js',
        array(),
        '1.0',
        true 
    );
}
add_action( 'wp_enqueue_scripts', 'carsallon_load_assets' );


 
function carsallon_theme_setup() {

    register_nav_menus(array(
        'carsallon_main_menu'   => __( 'Main Menu', 'carsallon' ),
        'carsallon_footer_menu' => __( 'Footer Menu', 'carsallon' ),
    ));

   
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));

    add_theme_support( 'custom-logo', array(
        'width'        => 200,
        'height'       => 110,
        'flex-width'   => true,
        'flex-height'  => true,
    ));

   
    add_theme_support( 'custom-header', array(
        'width'       => 1920,
        'height'      => 225,
        'flex-height' => true,
    ));

  
    add_image_size( 'car-thumbnail', 400, 300, true );
}
add_action( 'after_setup_theme', 'carsallon_theme_setup' );


function carsallon_register_sidebars() {
    $sidebars = [
        ['Blog Sidebar', 'sidebar-blog', 'Add widgets for the blog area.'],
        ['Car Services - 1', 'services-1', 'Service section one'],
        ['Car Services - 2', 'services-2', 'Service section two'],
        ['Car Services - 3', 'services-3', 'Service section three'],
    ];

    foreach ( $sidebars as $sidebar ) {
        register_sidebar(array(
            'name'          => $sidebar[0],
            'id'            => $sidebar[1],
            'description'   => $sidebar[2],
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }
}
add_action( 'widgets_init', 'carsallon_register_sidebars' );

if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}