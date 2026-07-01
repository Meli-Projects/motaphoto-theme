/* ---- Contact modal ---- */
// Contact button from header menu
const contactButton = document.querySelector('.contact-button-menu');
const modal = document.querySelector('.modal-contact');
const overlay = document.querySelector('.modal-overlay');

// Open modal
contactButton.addEventListener('click', () => {
    modal.classList.add('active');
});

// Close modal when clicking outside
overlay.addEventListener('click', () => {
    modal.classList.remove('active');
});

/* ---- Photo navigation thumbnails ---- */
// Previous/next thumbnails displayed on single photo page
const thumbnailPrevious = document.querySelector('.thumbnail-previous');
const thumbnailNext = document.querySelector('.thumbnail-next');
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

/* ---- Contact form auto fill ---- */
// Single photo contact button
const photoContactButton = document.querySelector('.photo-contact-button');
// Contact Form 7 field used to store the photo reference
const photoReferenceField = document.querySelector('input[name="your-photo"]');

if (photoContactButton && modal && photoReferenceField) {

    photoContactButton.addEventListener('click', () => {
        const photoReference = photoContactButton.dataset.reference;
        // Fill the contact form with the current photo reference
        photoReferenceField.value = photoReference;

        modal.classList.add('active');
    });

}

/* ---- ajax filters ---- */
const categoryFilter = document.querySelector('#categorie');
const formatFilter = document.querySelector('#format');
const sortFilter = document.querySelector('#sort');
const galleryGrid = document.querySelector('.photo-gallery-grid');

const loadMoreButton = document.querySelector('.load-more-button');

/* ---- Gallery loading ---- */
    //Initial gallery loading
    if (galleryGrid) {
    loadPhotos();
}

/* ---- ajax photo loading function ---- */
function loadPhotos(page = 1, isAppend = false) {

    const data = {
        action: 'load_more_photos',
        page: page,
        categorie: categoryFilter?.dataset.value || '',
        format: formatFilter?.dataset.value || '',
        sort: sortFilter?.dataset.value || ''
    };

    fetch(motaphotoData.ajaxUrl, {
        method: 'POST',
        body: new URLSearchParams(data)
    })
    .then(response => response.text())
    .then(result => {

        if (isAppend) {
            galleryGrid.insertAdjacentHTML('beforeend', result);
        } else {
            galleryGrid.innerHTML = result;
        }

    });
}

/* ---- load more button ---- */
if (loadMoreButton) {
    loadMoreButton.addEventListener('click', () => {

        const currentPage = parseInt(loadMoreButton.dataset.page);

        loadPhotos(currentPage + 1, true);
        loadMoreButton.dataset.page =
            currentPage + 1;
    });
}

/* ----  custom filters ----  */
const customSelects = document.querySelectorAll('.custom-select');

customSelects.forEach((customSelect) => {
    const select = customSelect.querySelector('.select');
    const selectText = customSelect.querySelector('.select-text');
    const options = customSelect.querySelectorAll('.options-list li');

    if (select) {
        select.addEventListener('click', (event) => {
            event.stopPropagation();
            customSelect.classList.toggle('open');
        });

    }

    options.forEach((option) => {
        option.addEventListener('click', () => {
            options.forEach((item) => {
                item.classList.remove('active');
            });

            if (option.dataset.value === '') {
                selectText.textContent =
                    customSelect.dataset.placeholder;

            } else {
                selectText.textContent =
                    option.textContent;
                option.classList.add('active');
            }

            customSelect.dataset.value = option.dataset.value;

            loadPhotos();
            loadMoreButton.dataset.page = 1;
            customSelect.classList.remove('open');
        });
    });
});

document.addEventListener('click', () => {
    customSelects.forEach((customSelect) => {
        customSelect.classList.remove('open');
    });
});

/*---- responsive menu ----  */
const openMenu = document.querySelector('.open-menu');
const mainNavigation = document.querySelector('.main-navigation');

if (openMenu && mainNavigation) {
    openMenu.addEventListener('click', () => {

        mainNavigation.classList.toggle('active');

        const icon = openMenu.querySelector('img');

        if (mainNavigation.classList.contains('active')) {

            document.body.style.overflow = 'hidden';

            icon.src = icon.src.replace('open.svg', 'close.svg');
            openMenu.setAttribute('aria-label', 'Fermer le menu');

        } else {

            document.body.style.overflow = '';

            icon.src = icon.src.replace('close.svg', 'open.svg');
            openMenu.setAttribute('aria-label', 'Ouvrir le menu');
        }
    });
}