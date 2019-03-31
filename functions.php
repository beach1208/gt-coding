<?php

// adding the CSS and the JS files

function gt_setup(){
    wp_enqueue_style('google-fonts',"https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab");
    wp_enqueue_style('fontawesome',"https://use.fontawesome.com/releases/v5.8.1/css/all.css");
    wp_enqueue_style('style', get_stylesheet_uri());
    // wp_enqueue_script("main", get_theme_file_url('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'gt_setup');


function my_scripts()
{
    wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/js/main.js',
        array(),
        false,
        true
    );
}

add_action('wp_enqueue_scripts', 'my_scripts');


// Adding Theme support

function gt_init(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5',
        array('comment-list','comment-form','search-form')
    );
}
add_action('after_setup_theme','gt_init');

// Projects Post Type
function gt_custom_post_type(){
    register_post_type('project',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Projects',
                'add_new_item' => 'Add New Projects',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'had_archive' => true,
            'supports' => array(
                'title','thumbnail','editor','excerpt','comments'
            )

        )
    );
}

add_action('init','gt_custom_post_type');