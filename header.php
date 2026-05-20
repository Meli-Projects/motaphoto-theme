<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-site">

    <div class="container">

        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_menu.webp" class="logo-menu" alt="Logo Nathalie Mota Photos"            >
        </a>

        <nav class="main-navigation">

            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'menu'
            ]);
            ?>

        <button class="contact-button-menu">Contact</button>    

        </nav>

    </div>

</header>

