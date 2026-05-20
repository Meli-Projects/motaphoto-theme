const contactButton = document.querySelector('.contact-button-menu');
const modal = document.querySelector('.modal-contact');
const overlay = document.querySelector('.modal-overlay');

contactButton.addEventListener('click', () => {
    modal.classList.add('active');
});

overlay.addEventListener('click', () => {
    modal.classList.remove('active');
});