<?php get_header(); ?>

<main class="home-page">
<!-- section 1 header hero -->
    <section class="hero">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_header.webp" alt="Photographe événement">
        <h1>Photographe Event</h1>
    </section>

<!-- section 2 filters -->
    <!-- category filter -->
    <section class="photo-filters">
        <div class="left-filters">
            <div class="custom-select" id="categorie" data-placeholder="CATÉGORIES">
                <div class="select">
                    <span class="select-text">CATÉGORIES</span>
                    <span class="filter-arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/open-filter.svg" alt="Icône menu déroulant filtres"></span>
                </div>
                <ul class="options-list">
                    <li class="reset-option" data-value=""></li>
                    <?php
                    $categories = get_terms([
                        'taxonomy' => 'categorie',
                        'hide_empty' => true,
                    ]);
                    if (!empty($categories) && !is_wp_error($categories)) :
                        foreach ($categories as $category) :
                    ?>
                        <li data-value="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <!-- format filter -->
            <div class="custom-select" id="format" data-placeholder="FORMATS">
                <div class="select">
                    <span class="select-text">FORMATS</span>
                    <span class="filter-arrow">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/open-filter.svg" alt="Icône menu déroulant filtres">
                    </span>
                </div>
                <ul class="options-list">
                    <li class="reset-option" data-value=""></li>
                    <?php
                    $formats = get_terms([
                        'taxonomy' => 'format',
                        'hide_empty' => true,
                    ]);
                    if (!empty($formats) && !is_wp_error($formats)) :
                        foreach ($formats as $format) :
                    ?>
                        <li data-value="<?php echo esc_attr($format->slug); ?>">
                            <?php echo esc_html($format->name); ?>
                        </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>

        <!-- sort filter -->
        <div class="right-filters">
            <div class="custom-select" id="sort" data-placeholder="TRIER PAR">
                <div class="select">
                    <span class="select-text">TRIER PAR</span>
                    <span class="filter-arrow">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/open-filter.svg" alt="Icône menu déroulant filtres">
                    </span>
                </div>
                <ul class="options-list">
                    <li class="reset-option" data-value=""></li>
                    <li data-value="DESC">
                        À partir des plus récentes
                    </li>
                    <li data-value="ASC">
                        À partir des plus anciennes
                    </li>
                </ul>
            </div>
        </div>
    </section>

<!-- section 3 gallery -->
    <section class="photo-gallery">
    <div class="photo-gallery-grid"></div>
    <!-- load more button -->
    <button class="load-more-button" data-page="1" data-action="load_more_photos">Charger plus</button>
</section>
</main>

<?php get_footer(); ?>