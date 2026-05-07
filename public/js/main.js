const menuToggle = document.getElementById('menuToggle');
const navMobile = document.getElementById('navMobile');
const overlay = document.getElementById('overlay');
const userIcon = document.getElementById('userIcon');
const cartIcon = document.getElementById('cartIcon');

function toggleMenu() {
    navMobile.classList.toggle('active');
    navMobile.classList.toggle('flex');
    overlay.classList.toggle('active');
    overlay.classList.toggle('block');
    overlay.classList.toggle('hidden');
    document.body.style.overflow = navMobile.classList.contains('active') ? 'hidden' : '';
}

if (menuToggle) menuToggle.addEventListener('click', toggleMenu);
if (overlay) overlay.addEventListener('click', toggleMenu);

document.querySelectorAll('#navMobile a').forEach(link => {
    link.addEventListener('click', () => {
        if(navMobile.classList.contains('active')) toggleMenu();
    });
});



if (cartIcon) {
    cartIcon.addEventListener('click', () => {
        alert('🛒 Tu carrito está vacío. Explora nuestros servicios');
    });
}
