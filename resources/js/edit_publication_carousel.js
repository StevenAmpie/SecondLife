// resources/js/edit_publication_carousel.js
document.addEventListener('DOMContentLoaded', () => {
    const carousels = document.querySelectorAll('.article-images');

    carousels.forEach(container => {
        const images = container.querySelectorAll('.article-image');
        if (!images.length) return;

        let current = 0;

        images.forEach(img => img.classList.remove('active'));
        images[0].classList.add('active');

        const showImage = (newIndex) => {
            images[current].classList.remove('active');
            current = (newIndex + images.length) % images.length; // índice circular
            images[current].classList.add('active');
        };

        const prevBtn = container.querySelector('.carousel-arrow.left');
        const nextBtn = container.querySelector('.carousel-arrow.right');

        if (prevBtn) {
            prevBtn.addEventListener('click', () => showImage(current - 1));
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', () => showImage(current + 1));
        }
    });
});
