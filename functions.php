<?php

// adding the CSS and JS files

function panda_setup() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab&display=swap');
    wp_enqueue_script('fontawesome', '//kit.fontawesome.com/98c5d34ca2.js');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('main', get_theme_file_uri('./js/main.js'), NULL, '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'panda_setup');

// Adding theme support

function panda_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support( 'html5', 
        array('comment-list', 'comment-form', 'search-form') 
    );  

}

add_action('after_setup_theme', 'panda_init');  

// Project post type

function panda_custom_post_type() {
    register_post_type('project', 
    array(
        'rewrite' => array('slug' => 'projects'),
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Projects',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
        ),
        'menu_icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )
    )
);
}

add_action( 'init', 'panda_custom_post_type');

// Sidebar
function panda_widgets_init() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main_sidebar',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'panda_widgets_init');


// Filters

function search_filter($query) {
    if($query->is_search()) {
        $query->set('post-type', array('post', 'project'));
    }
}

add_filter( 'pre_get_posts', 'search_filter' );