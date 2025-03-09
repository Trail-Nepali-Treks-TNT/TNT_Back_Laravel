import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.package-card-swiper-container', {
        modules: [Navigation],
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
