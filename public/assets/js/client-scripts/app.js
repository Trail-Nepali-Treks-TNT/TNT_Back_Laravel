// // import 'bootstrap';
// import Swiper from 'swiper';
// import 'swiper/css';
// import 'swiper/css/navigation';
// import { Navigation } from 'swiper/modules';

//Scroll to top button click
document.addEventListener('DOMContentLoaded', function () {
    const backToTopButton = document.getElementById('scrollToTop');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 640) {
            backToTopButton.classList.remove('hidden');
            backToTopButton.classList.add('d-flex');
        } else {
            backToTopButton.classList.add('hidden');
            backToTopButton.classList.remove('d-flex');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

//Region Nav modal swiper script
var swiper = new Swiper('.region-nav-swiper', {
    slidesPerView: 4, // Show 3 cards at a time
    spaceBetween: 16, // Space between slides
    loop: false, // Enable infinite loop
    navigation: {
        nextEl: '.tnt-region-slider-next-btn',
        prevEl: '.tnt-region-slider-prev-btn'
    },
    breakpoints: {
        2560: { slidesPerView: 7 }, // Desktop
        1440: { slidesPerView: 6 }, // Desktop
        1024: { slidesPerView: 4 }, // Desktop
        768: { slidesPerView: 3 }, // Tablets
        480: { slidesPerView: 1 } // Mobile
    }
});
