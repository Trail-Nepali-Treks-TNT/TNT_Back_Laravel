document.addEventListener('DOMContentLoaded', () => {
    //Card list items
    new Swiper('.earlyCardSwiper', {
        spaceBetween: 16,
        centeredSlides: false,
        breakpoints: {
            320: {
                slidesPerView: 1 // Mobile view
            },
            640: {
                slidesPerView: 2 // Small tablets
            },
            768: {
                slidesPerView: 3 // Tablets
            },
            1024: {
                slidesPerView: 4 // Desktops
            },
            1280: {
                slidesPerView: 4 // Desktops
            },
            1440: {
                slidesPerView: 4 // Desktops
            },
            1920: {
                slidesPerView: 5 // Desktops
            },
            2560: {
                slidesPerView: 6
            }
        },
        allowTouchMove: true,
        // Optional parameters
        loop: false, // Enables looping

        navigation: {
            nextEl: '.tnt-package-slider-next-btn',
            prevEl: '.tnt-package-slider-prev-btn'
        }
    });
});
