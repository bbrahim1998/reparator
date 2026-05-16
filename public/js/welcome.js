// ========================================================================
//  WELCOME (Página de inicio)
//  Carrusel de imágenes con navegación por botones, dots, auto-play y
//  soporte táctil para dispositivos móviles.
// ========================================================================

// Botón CTA principal
document.getElementById('ctaBtn').addEventListener('click', () => {
    alert('📞 ¡Gracias por tu interés! Pronto nos pondremos en contacto contigo.');
});

// ─── Carrusel ─────────────────────────────────────────────────────────

const track = document.getElementById('carouselTrack');
const dots = document.querySelectorAll('.carousel-dot');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let currentSlide = 0;
const totalSlides = track.children.length;

/** Navega al slide indicado (con wraparound) y actualiza los dots */
function goToSlide(index) {
    if (index < 0) index = totalSlides - 1;
    if (index >= totalSlides) index = 0;
    currentSlide = index;
    track.style.transform = `translateX(-${currentSlide * 100}%)`;
    dots.forEach((dot, i) => dot.classList.toggle('active', i === currentSlide));
}

prevBtn.addEventListener('click', () => goToSlide(currentSlide - 1));
nextBtn.addEventListener('click', () => goToSlide(currentSlide + 1));
dots.forEach((dot, i) => dot.addEventListener('click', () => goToSlide(i)));

// Auto-play cada 4 segundos
let autoplayInterval = setInterval(() => goToSlide(currentSlide + 1), 4000);

// Pausar al hacer hover
track.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
track.addEventListener('mouseleave', () => {
    autoplayInterval = setInterval(() => goToSlide(currentSlide + 1), 4000);
});

// Soporte táctil (swipe)
let touchStartX = 0;
track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
track.addEventListener('touchend', e => {
    const diff = touchStartX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) {
        diff > 0 ? goToSlide(currentSlide + 1) : goToSlide(currentSlide - 1);
    }
});
