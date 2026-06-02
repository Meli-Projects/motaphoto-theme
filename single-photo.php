<?php get_header(); ?>

<main class="single-photo">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

        <?php
        $reference = get_post_meta(get_the_ID(), 'reference', true);
        $type = get_post_meta(get_the_ID(), 'type', true);
        $categories = get_the_terms(get_the_ID(), 'categorie');
        $formats = get_the_terms(get_the_ID(), 'format');
        $year = get_the_date('Y');
        $previous_photo = get_previous_post();
        $next_photo = get_next_post();
        $category_id = ''; if ($categories && !is_wp_error($categories)) {$category_id = $categories[0]->term_id;}
        ?>

            <section class="photo-content">
                <div class="photo-info">
                    <h1><?php the_title(); ?></h1>
                    <p>RÉFÉRENCE : <?php echo esc_html($reference); ?></p>
                    <p>CATÉGORIE : <?php if ($categories && !is_wp_error($categories)) {echo esc_html($categories[0]->name);}?></p>
                    <p>FORMAT : <?php if ($formats && !is_wp_error($formats)) {echo esc_html($formats[0]->name);}?></p>
                    <p>TYPE : <?php echo esc_html($type); ?></p>
                    <p>ANNÉE : <?php echo esc_html($year); ?></p>
                </div>
                <div class="photo-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </div>
            </section>

            <section class="photo-interactions">
                <div class="photo-contact">
                    <p>Cette photo vous intéresse ?</p>
                    <button class="photo-contact-button"
                        data-reference="<?php echo esc_attr($reference); ?>">
                        Contact
                    </button>
                </div>

                <div class="navigation-thumbnail">
                    <?php if ($previous_photo) : ?>
                        <div class="thumbnail-previous">
                            <?php echo get_the_post_thumbnail($previous_photo->ID); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($next_photo) : ?>
                        <div class="thumbnail-next">
                            <?php echo get_the_post_thumbnail($next_photo->ID); ?>
                        </div>
                    <?php endif; ?>
                </div>

                    <div class="navigation-arrows">
                        <?php if ($previous_photo) : ?>
                            <a class="previous-photo" href="<?php echo get_permalink($previous_photo->ID); ?>">←</a>
                        <?php endif; ?>
                        <?php if ($next_photo) : ?>
                            <a class="next-photo" href="<?php echo get_permalink($next_photo->ID); ?>">→</a>
                        <?php endif; ?>
                    </div>
            </section>

            <section class="related-photos">
                <h2>VOUS AIMEREZ AUSSI</h2>
                
                <?php
                $related_photos = new WP_Query([
                    'post_type'      => 'photo',
                    'posts_per_page' => 2,
                    'post__not_in'   => [get_the_ID()],
                    'tax_query' => [
                        [
                            'taxonomy' => 'categorie',
                            'field'    => 'term_id',
                            'terms'    => $category_id,
                        ]
                    ]
                ]);
                ?>

                <div class="related-photos-grid">
                    <?php if ($related_photos->have_posts()) : ?>
                        <?php while ($related_photos->have_posts()) : $related_photos->the_post(); ?>
                            <?php get_template_part('template_parts/photo_block'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>

        <?php endwhile; ?>

    <?php endif; ?>

</main>
<?php get_footer(); ?>