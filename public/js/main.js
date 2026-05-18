// public/js/main.js
document.addEventListener('DOMContentLoaded', () => {
    const btnMenu = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if(btnMenu && mobileMenu) {
        btnMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
});