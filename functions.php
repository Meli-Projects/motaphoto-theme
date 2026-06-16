<?php

// header menu 
function register_motaphoto_menu() {
    register_nav_menus(['main-menu' => __( 'Menu principal', 'motaphoto-theme' ) ]);
}
add_action( 'after_setup_theme', 'register_motaphoto_menu' );

//style.css
function motaphoto_enqueue_styles() {
    wp_enqueue_style('motaphoto-style', get_stylesheet_uri());

//single-photo.css
wp_enqueue_style('single-photo', get_template_directory_uri() . '/assets/css/single-photo.css',[],'1.0');

//photo-block.css
wp_enqueue_style('photo-block', get_template_directory_uri() . '/assets/css/photo-block.css',[],'1.0');

//front-page.css
wp_enqueue_style('front-page',get_template_directory_uri() . '/assets/css/front-page.css',[],'1.0');

}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');

//script.js
function motaphoto_enqueue_scripts() {

    wp_enqueue_script(
        'motaphoto-script', get_template_directory_uri() . '/js/scripts.js', [], false, true);

    wp_localize_script('motaphoto-script','motaphotoData', ['ajaxUrl' => admin_url('admin-ajax.php')]);
}

add_action('wp_enqueue_scripts', 'motaphoto_enqueue_scripts');

//load more photos
function load_more_photos() {

    $page = $_POST['page'];
    $categorie = $_POST['categorie'];
    $format = $_POST['format'];
    $sort = $_POST['sort'];

    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $page,
        'post_status'    => 'publish',
        'orderby'        => 'date'
    ];

    if (!empty($categorie)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'categorie',
                'field'    => 'slug',
                'terms'    => $categorie
            ]
        ];

    }

    if (!empty($format)) {
    $args['tax_query'][] = [
        'taxonomy' => 'format',
        'field'    => 'slug',
        'terms'    => $format
    ];

    }

    if (!empty($sort)) {
    $args['order'] = $sort;
    }

    $photos = new WP_Query($args);

    if ($photos->have_posts()) {

        while ($photos->have_posts()) {

            $photos->the_post();

            get_template_part('template_parts/photo_block');

        }

        wp_reset_postdata();
    }

    wp_die();

}

add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');