let currentIndex = 0;
const lightbox = document.querySelector('.lightbox');

function getPhotos() {
    return Array.from(document.querySelectorAll('.photo-card'));
}

function openLightbox(photoCard) {

    const lightboxImage = document.querySelector('.lightbox-image');
    const lightboxReference = document.querySelector('.lightbox-reference');
    const lightboxCategory = document.querySelector('.lightbox-category');

    lightboxImage.src = photoCard.dataset.image;
    lightboxReference.textContent = photoCard.dataset.reference;
    lightboxCategory.textContent = photoCard.dataset.category;

    lightbox.classList.add('active');
}

document.addEventListener('click', (event) => {

    const fullscreenButton = event.target.closest('.fullscreen-icon');

    if (!fullscreenButton) {
        return;
    }

    event.preventDefault();

    const photoCard = fullscreenButton.closest('.photo-card');
    const photos = getPhotos();

    currentIndex = photos.indexOf(photoCard);

    openLightbox(photoCard);

});

const closeButton = document.querySelector('.lightbox-close');

closeButton.addEventListener('click', () => {
    lightbox.classList.remove('active');
});

const nextButton = document.querySelector('.lightbox-next');

nextButton.addEventListener('click', () => {

    const photos = getPhotos();

    currentIndex++;

    if (currentIndex >= photos.length) {
        currentIndex = 0;
    }

    openLightbox(photos[currentIndex]);

});

const prevButton = document.querySelector('.lightbox-prev');

prevButton.addEventListener('click', () => {

    const photos = getPhotos();

    currentIndex--;

    if (currentIndex < 0) {
        currentIndex = photos.length - 1;
    }

    openLightbox(photos[currentIndex]);

});


document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        lightbox.classList.remove('active');
    }
});

lightbox.addEventListener('click', (event) => {
    if (event.target === lightbox) {
        lightbox.classList.remove('active');
    }
});