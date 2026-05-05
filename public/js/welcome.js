document.getElementById('ctaBtn').addEventListener('click', () => {
    alert('📞 ¡Gracias por tu interés! Pronto nos pondremos en contacto contigo.');
});

// Carousel
const track = document.getElementById('carouselTrack');
const dots = document.querySelectorAll('.carousel-dot');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let current = 0;
const total = dots.length;

function goTo(index) {
    if (index < 0) index = total - 1;
    if (index >= total) index = 0;
    current = index;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
}

prevBtn.addEventListener('click', () => goTo(current - 1));
nextBtn.addEventListener('click', () => goTo(current + 1));
dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));

// Auto-play cada 4 segundos
let autoplay = setInterval(() => goTo(current + 1), 4000);

// Pausar al hover
track.addEventListener('mouseenter', () => clearInterval(autoplay));
track.addEventListener('mouseleave', () => {
    autoplay = setInterval(() => goTo(current + 1), 4000);
});

// Soporte táctil (swipe)
let startX = 0;
track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
track.addEventListener('touchend', e => {
    const diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) {
        diff > 0 ? goTo(current + 1) : goTo(current - 1);
    }
});
