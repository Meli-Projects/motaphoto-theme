<?php

// header menu 
function register_motaphoto_menu() {
    register_nav_menus(['main-menu' => __( 'Menu principal', 'motaphoto-theme' ) ]);
}
add_action( 'after_setup_theme', 'register_motaphoto_menu' );

//style.css
function motaphoto_enqueue_styles() {
    wp_enqueue_style('motaphoto-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');