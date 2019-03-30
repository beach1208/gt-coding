<?php

// adding the CSS and the JS files

function gt_setup(){
    wp_enqueue_style('google-fonts',"https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab");
    wp_enqueue_style('fontawesome',"https://use.fontawesome.com/releases/v5.8.1/css/all.css");
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), all);
    wp_enqueue_script("main", get_theme_file_url('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'gt_setup');