// ========================================================================
//  MAIN
//  Menú móvil responsive: toggle del menú de navegación y overlay.
//  El carrito se gestiona desde carrito.js
// ========================================================================

const menuToggle = document.getElementById('menuToggle');
const navMobile = document.getElementById('navMobile');
const overlay = document.getElementById('overlay');

/** Abre o cierra el menú de navegación móvil y el overlay */
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

// Cerrar el menú al hacer clic en un enlace de navegación
document.querySelectorAll('#navMobile a').forEach(link => {
    link.addEventListener('click', () => {
        if (navMobile.classList.contains('active')) toggleMenu();
    });
});
