// Loader
document.addEventListener('DOMContentLoaded', function() {
    const loader = document.querySelector('.loading');
    if (loader) {
        loader.style.display = "none";
    }
});

// Additional check on window load
window.addEventListener('load', function() {
    const loader = document.querySelector('.loading');
    if (loader) {
        loader.style.display = "none";
    }
});
