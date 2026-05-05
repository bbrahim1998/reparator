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

if (prevBtn) prevBtn.addEventListener('click', () => goTo(current - 1));
if (nextBtn) nextBtn.addEventListener('click', () => goTo(current + 1));
dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));

// Auto-play cada 4 segundos
let autoplay = setInterval(() => goTo(current + 1), 4000);

// Pausar al hover
if (track) {
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
}

// Service cards interaction
document.querySelectorAll('.service-card').forEach((card, index) => {
    card.style.animationDelay = `${index * 0.1}s`;

    const minusBtn = card.querySelector('.qty-minus');
    const plusBtn = card.querySelector('.qty-plus');
    const qtyValue = card.querySelector('.qty-value');
    const addBtn = card.querySelector('.add-to-cart-btn');
    let quantity = 1;

    if (minusBtn) {
        minusBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (quantity > 1) {
                quantity--;
                qtyValue.textContent = quantity;
                minusBtn.disabled = quantity === 1;
            }
        });
    }

    if (plusBtn) {
        plusBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (quantity < 10) {
                quantity++;
                qtyValue.textContent = quantity;
                minusBtn.disabled = false;
            }
        });
    }

    if (addBtn) {
        addBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const serviceName = card.getAttribute('data-service') || 'Servicio';
            addBtn.classList.add('bg-green-400');
            addBtn.textContent = '✓ Añadido';
            setTimeout(() => {
                addBtn.classList.remove('bg-green-400');
                addBtn.textContent = 'Añadir al carrito';
            }, 2000);
        });
    }

    card.addEventListener('click', () => {
        const serviceName = card.getAttribute('data-service') || 'Servicio';
        alert(`🔧 Información sobre ${serviceName}. ¿En qué podemos ayudarte?`);
    });
});
