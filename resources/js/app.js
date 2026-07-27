import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer configuration
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -60px 0px',
        threshold: 0.12
    };

    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, observerOptions);

    // Initialize observer for elements with animation classes
    const initScrollAnimations = () => {
        const targets = document.querySelectorAll(
            '.reveal-on-scroll, .reveal-left, .reveal-right, .reveal-scale, section, [data-scroll-reveal]'
        );

        targets.forEach((el) => {
            // Auto add reveal-on-scroll to sections if not explicitly set
            if (el.tagName.toLowerCase() === 'section' && 
                !el.classList.contains('reveal-left') && 
                !el.classList.contains('reveal-right') && 
                !el.classList.contains('reveal-scale') &&
                !el.classList.contains('reveal-on-scroll')) {
                el.classList.add('reveal-on-scroll');
            }

            scrollObserver.observe(el);
        });
    };

    initScrollAnimations();
});
