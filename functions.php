<?php

//menu header
function register_motaphoto_menu() {
    register_nav_menus(['main-menu' => __( 'Menu principal', 'motaphoto-theme' ) ]);
}
add_action( 'after_setup_theme', 'register_motaphoto_menu' );