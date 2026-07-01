<?php get_header(); ?>

<main class="page-content">

    <?php
    // WordPress Loop for page content
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            //Content manageable via the WordPress editor
            the_content();

        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>