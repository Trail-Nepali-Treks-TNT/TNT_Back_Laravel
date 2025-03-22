document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.package-card-swiper-container', {
        slidesPerView: 1,
        allowTouchMove: true,
        navigation: {
            nextEl: '.tnt-card-img-slider-next-btn',
            prevEl: '.tnt-card-img-slider-prev-btn',
            hideOnClick: true
        },
        history: {
            key: 'slide'
        },
        simulateTouch: true
    });
});
