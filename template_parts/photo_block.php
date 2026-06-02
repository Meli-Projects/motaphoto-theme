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
        <a class="fullscreen-icon" href="#">⛶</a>
        <a class="eye-icon" href="<?php the_permalink(); ?>">👁</a>

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