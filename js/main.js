// Loader Fade-Out Functionality
document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById('loader') || document.querySelector('.loader-bg') || document.querySelector('.loading');
    if (loader) {
        setTimeout(function() {
            loader.style.opacity = '0';
            setTimeout(function() {
                loader.style.display = 'none';
            }, 800); // Allow fade-out transition to complete
        }, 800); // Show loader for at least 800ms
    }
});

// Additional fallback for window load to guarantee dismissal
window.addEventListener('load', function() {
    const loader = document.getElementById('loader') || document.querySelector('.loader-bg') || document.querySelector('.loading');
    if (loader && loader.style.display !== 'none' && loader.style.opacity !== '0') {
        loader.style.opacity = '0';
        setTimeout(function() {
            loader.style.display = 'none';
        }, 800);
    }
});

// Header scroll effect on homepage
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
});

// Initial call to set scrolled state on page refresh/load
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('header');
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
});
