<article class="photo-card">
    <?php
    $reference = get_post_meta(get_the_ID(), 'reference', true);
    $categories = get_the_terms(get_the_ID(), 'categorie');
    $category_name = ''; if ($categories && !is_wp_error($categories)) {$category_name = $categories[0]->name;}
    ?>

    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large'); ?>
    <?php endif; ?>

    <div class="photo-overlay">
        <a class="fullscreen-icon" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen-icon.svg" alt="Plein écran">
        </a>
        <a class="eye-icon" href="<?php the_permalink(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eye-icon.svg" alt="Voir les information">
        </a>

        <div class="photo-detail">
            <span class="photo-reference">
                <?php echo esc_html($reference); ?>
            </span>
            <span class="photo-category">
                <?php echo esc_html($category_name); ?>
            </span>
        </div>
    </div>
</article>