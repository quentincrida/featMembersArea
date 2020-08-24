<?php
// adding the CSS and JS files

function qc_setup(){
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:ital@1&family=Roboto+Slab&display=swap');
    // wp_enqueue_style('fontawesome', '//use.fontawesome.com/8673ac2ba2.js');
    wp_enqueue_style('fontawesome', '//use.fontawesome.com/a1bda01fd6.css');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(),'all');
    wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'qc_setup');


// Adding Theme Support

function qc_init(){
    add_theme_support('post-thumbnails');
    add_theme_support('title_tag');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));
}
add_action('after_setup_theme', 'qc_init');

// Projects Post Type

function qc_custom_post_type(){
    register_post_type('project',
     array(
        'rewrite'=> array('slug' => 'projects'),
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project'
        ),
        'menu_icon' => 'dashicons-text-page',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )
    )
  );
}

add_action('init', 'qc_custom_post_type');

// Sidebar

function qc_widgets() {
    register_sidebar(
        array(
            'name'=> 'Main Sidebar',
            'id' => 'main_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
        );
}

add_action('widgets_init', 'qc_widgets');

// only search in Blogs and Projects

function search_filter($query) {
    if($query->is_search()) {
        $query->set('post_type', array('post', 'project'));
    }
}

add_filter('pre_get_posts', 'search_filter');