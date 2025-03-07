//Scroll to top button click
document.addEventListener('DOMContentLoaded', function () {
    const backToTopButton = document.getElementById('scrollToTop');

    window.addEventListener('scroll', () => {
        console.log('Test');
        if (window.scrollY > 200) {
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
