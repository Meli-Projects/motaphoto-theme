<?php get_header(); ?>

<main class="home-page">
<!-- section 1 header hero -->
    <section class="hero">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_header.webp" alt="Photographe événement">
        <h1>Photographe Event</h1>
    </section>

<!-- section 2 filters -->
    <section class="photo-filters">
        <div class="filters-left">
            <select name="categorie" id="categorie">
                <option value="">CATÉGORIES</option>
                <?php $categories = get_terms(['taxonomy' => 'categorie','hide_empty' => true,]);
                if (!empty($categories) && !is_wp_error($categories)) :
                    foreach ($categories as $category) :
                ?>
                    <option value="<?php echo esc_attr($category->slug); ?>">
                        <?php echo esc_html($category->name); ?>
                    </option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>

            <select name="format" id="format">
                <option value="">FORMATS</option>
                <?php $formats = get_terms(['taxonomy' => 'format','hide_empty' => true,]);
                if (!empty($formats) && !is_wp_error($formats)) :
                    foreach ($formats as $format) :
                ?>
                    <option value="<?php echo esc_attr($format->slug); ?>">
                        <?php echo esc_html($format->name); ?>
                    </option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>
        </div>

        <div class="filters-right">
            <select name="sort" id="sort">
                <option value="">TRIER PAR</option>
                <option value="DESC">À partir des plus récentes</option>
                <option value="ASC">À partir des plus anciennes</option>
            </select>
        </div>
    </section>

<!-- section 3 gallery -->
    <section class="photo-gallery">
    <?php
    $photos = new WP_Query([
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'post_status'    => 'publish'
    ]);
    ?>

    <div class="photo-gallery-grid">
        <?php if ($photos->have_posts()) : ?>
            <?php while ($photos->have_posts()) : $photos->the_post(); ?>
                <?php get_template_part('template_parts/photo_block'); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
    <!-- load more button -->
    <button class="load-more-button">Charger plus</button>
</section>




</main>

<?php get_footer(); ?>