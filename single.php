<?php get_header(); ?>

<main class="single-content">

    <?php
     // WordPress Loop for single page
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