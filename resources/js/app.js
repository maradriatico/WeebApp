import './bootstrap';
import 'flowbite';
//import Glide from '@glidejs/glide';

import Alpine from 'alpinejs';

/* document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencias a los elementos del carrusel
    const carousel = document.getElementById('default-carousel');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    const nextButton = carousel.querySelector('[data-carousel-next]');
    const carouselItems = carousel.querySelectorAll('[data-carousel-item]');

    // Variables para seguir la posición actual del carrusel
    let currentIndex = 0;

    // Función para mostrar el elemento en la posición deseada
    function showItem(index) {
        // Ocultar todos los elementos del carrusel
        carouselItems.forEach(item => item.classList.add('hidden'));
        // Mostrar solo el elemento en la posición deseada
        carouselItems[index].classList.remove('hidden');
    }

    // Mostrar el primer elemento al cargar la página
    showItem(currentIndex);

    // Manejadores de eventos para los botones de anterior y siguiente
    prevButton.addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
        showItem(currentIndex);
    });

    nextButton.addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % carouselItems.length;
        showItem(currentIndex);
    });
}); */

window.Alpine = Alpine;

Alpine.start();
