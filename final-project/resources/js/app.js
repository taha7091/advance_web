import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const closeMenu = document.getElementById('close-menu');

menuBtn?.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
});

closeMenu?.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
});