<footer class="footer-site">
    <div class="footer-container">
        <a href="<?php echo get_permalink( get_page_by_path('mentions-legales') ); ?>">
            Mentions légales
        </a>
        <a href="<?php echo get_permalink( get_page_by_path('vie-privee') ); ?>">
            Vie privée
        </a>
        <p class="footer-text">Tous droits réservés</p>
    </div>

<?php get_template_part('template_parts/modal-contact'); ?>

<!-- Lightbox -->
<div class="lightbox">
    <button class="lightbox-close">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lightbox-close.svg" alt="Fermer la lightbox">
    </button>
    <div class="lightbox-content">
        <button class="lightbox-nav lightbox-prev">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lightbox-prev.svg" alt="Photo précédente">
        </button>
        <div class="lightbox-center">
            <div class="lightbox-container">
                <img class="lightbox-image" src="" alt="">
            </div>
            <div class="lightbox-infos">
                <span class="lightbox-reference"></span>
                <span class="lightbox-category"></span>
            </div>
        </div>
        <button class="lightbox-nav lightbox-next">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lightbox-next.svg" alt="Photo suivante">
        </button>
    </div>
</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>