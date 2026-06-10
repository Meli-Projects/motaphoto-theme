const contactButton = document.querySelector('.contact-button-menu');
const modal = document.querySelector('.modal-contact');
const overlay = document.querySelector('.modal-overlay');

const thumbnailPrevious = document.querySelector('.thumbnail-previous');
const thumbnailNext = document.querySelector('.thumbnail-next');

const photoContactButton = document.querySelector('.photo-contact-button');
const photoReferenceField = document.querySelector('input[name="your-photo"]');

contactButton.addEventListener('click', () => {
    modal.classList.add('active');
});

overlay.addEventListener('click', () => {
    modal.classList.remove('active');
});

const previousPhoto = document.querySelector('.previous-photo');

if (previousPhoto && thumbnailPrevious) {

    previousPhoto.addEventListener('mouseenter', () => {
        thumbnailPrevious.style.display = 'block';
    });

    previousPhoto.addEventListener('mouseleave', () => {
        thumbnailPrevious.style.display = 'none';
    });

}

const nextPhoto = document.querySelector('.next-photo');

if (nextPhoto && thumbnailNext) {

    nextPhoto.addEventListener('mouseenter', () => {
        thumbnailNext.style.display = 'block';
    });

    nextPhoto.addEventListener('mouseleave', () => {
        thumbnailNext.style.display = 'none';
    });

}

if (photoContactButton && modal && photoReferenceField) {

    photoContactButton.addEventListener('click', () => {
        const photoReference = photoContactButton.dataset.reference;

        photoReferenceField.value = photoReference;

        modal.classList.add('active');
    });

}

/*responsive menu*/
const openMenu = document.querySelector('.open-menu');
const mainNavigation = document.querySelector('.main-navigation');

if (openMenu && mainNavigation) {
    openMenu.addEventListener('click', () => {
        mainNavigation.classList.toggle('active');

        const icon = openMenu.querySelector('img');

        if (mainNavigation.classList.contains('active')) {
            icon.src = icon.src.replace('open.svg', 'close.svg');
            openMenu.setAttribute('aria-label', 'Fermer le menu');
        } else {
            icon.src = icon.src.replace('close.svg', 'open.svg');
            openMenu.setAttribute('aria-label', 'Ouvrir le menu');
        }
    });
}