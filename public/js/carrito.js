// ========================================================================
//  CARRITO DE COMPRA
//  Gestiona el estado del carrito en localStorage, el modal visual y la
//  sincronización con los botones "Añadir al carrito" del catálogo.
// ========================================================================

const CART_STORAGE_KEY = 'reparator_cart';

// ─── CRUD del carrito en localStorage ─────────────────────────────────

/** Obtiene el carrito desde localStorage */
function getCart() {
    try {
        return JSON.parse(localStorage.getItem(CART_STORAGE_KEY)) || [];
    } catch {
        return [];
    }
}

/** Guarda el carrito en localStorage y actualiza el badge */
function saveCart(cart) {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
    updateCartBadge();
}

/** Calcula el total de artículos (suma de cantidades) */
function getTotalItems(cart) {
    return cart.reduce(function (total, item) { return total + item.quantity; }, 0);
}

// ─── Añadir / quitar productos ────────────────────────────────────────

/**
 * Añade (o incrementa) un producto al carrito.
 * Expuesta globalmente para ser usada desde servicios.js.
 */
function addToCart(productId, productName, productImage, productPrice, quantity) {
    var cart = getCart();
    var existingItem = null;

    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id === productId) {
            existingItem = cart[i];
            break;
        }
    }

    if (existingItem) {
        existingItem.quantity += quantity;
        if (existingItem.quantity > 10) existingItem.quantity = 10;
    } else {
        cart.push({
            id: productId,
            name: productName,
            image: productImage,
            price: parseFloat(productPrice),
            quantity: Math.min(quantity, 10)
        });
    }

    saveCart(cart);
}

/** Elimina un producto del carrito por su id y re-renderiza */
function removeFromCart(productId) {
    var cart = getCart();
    var updatedCart = [];

    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id !== productId) {
            updatedCart.push(cart[i]);
        }
    }

    saveCart(updatedCart);
    renderCart();
}

/** Cambia la cantidad de un producto (si baja de 1, lo elimina) */
function changeQuantity(productId, newQuantity) {
    if (newQuantity < 1) {
        removeFromCart(productId);
        return;
    }

    var cart = getCart();

    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id === productId) {
            cart[i].quantity = Math.min(newQuantity, 10);
            break;
        }
    }

    saveCart(cart);
    renderCart();
}

// ─── Sincronización del badge ─────────────────────────────────────────

/** Actualiza el contador del badge del icono del carrito en el header */
function updateCartBadge() {
    var badge = document.getElementById('cartBadge');
    if (!badge) return;

    var total = getTotalItems(getCart());

    if (total > 0) {
        badge.textContent = total > 99 ? '99+' : total;
        badge.classList.remove('hidden');
        badge.classList.add('flex');
    } else {
        badge.classList.add('hidden');
        badge.classList.remove('flex');
    }
}

// ─── Modal del carrito ────────────────────────────────────────────────

/** Abre el modal del carrito y renderiza su contenido */
function openCartModal() {
    renderCart();

    var modal = document.getElementById('cartModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

/** Cierra el modal del carrito */
function closeCartModal() {
    var modal = document.getElementById('cartModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

/** Renderiza los productos del carrito dentro del modal HTML */
function renderCart() {
    var cart = getCart();
    var cartContainer = document.getElementById('cartItemsContainer');
    var cartItemsList = document.getElementById('cartItemsList');
    var emptyMessage = document.getElementById('cartEmpty');
    var cartFooter = document.getElementById('cartFooter');
    var totalElement = document.getElementById('cartTotal');

    if (!cartContainer) return;

    if (cart.length === 0) {
        if (emptyMessage) emptyMessage.classList.remove('hidden');
        if (cartItemsList) { cartItemsList.classList.add('hidden'); cartItemsList.innerHTML = ''; }
        if (cartFooter) cartFooter.classList.add('hidden');
        return;
    }

    if (emptyMessage) emptyMessage.classList.add('hidden');
    if (cartItemsList) cartItemsList.classList.remove('hidden');
    if (cartFooter) cartFooter.classList.remove('hidden');

    var itemsHtml = '';
    var orderTotal = 0;

    for (var i = 0; i < cart.length; i++) {
        var item = cart[i];
        var subtotal = item.price * item.quantity;
        orderTotal += subtotal;

        itemsHtml += '<div class="cart-item flex items-center gap-2 border-b border-white/10 pb-3 mb-3">'
              +   '<img src="' + item.image + '" alt="' + item.name + '" class="size-10 rounded-lg object-cover shrink-0">'
              +   '<div class="flex-1 min-w-0">'
              +     '<h4 class="font-titulos text-sm font-bold text-[var(--color-texto)] truncate">' + item.name + '</h4>'
              +     '<p class="font-titulos text-sm text-[var(--color-acento)]">' + item.price.toFixed(2) + ' €</p>'
              +   '</div>'
              +   '<div class="flex items-center gap-1">'
              +     '<button class="cart-qty-minus flex size-[28px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[16px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:bg-[var(--color-acento)]/40" data-id="' + item.id + '">-</button>'
              +     '<span class="min-w-[24px] text-center font-titulos text-[14px] font-bold text-[var(--color-texto)]">' + item.quantity + '</span>'
              +     '<button class="cart-qty-plus flex size-[28px] items-center justify-center rounded-full bg-[var(--color-acento)]/20 text-[16px] font-bold text-[var(--color-acento)] transition-all duration-300 hover:bg-[var(--color-acento)]/40" data-id="' + item.id + '">+</button>'
              +   '</div>'
              +     '<button class="cart-remove flex size-7 shrink-0 items-center justify-center rounded-full bg-red-500/20 text-red-400 transition-all duration-300 hover:bg-red-500/40" data-id="' + item.id + '">'
              +     '<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M18 6L6 18M6 6l12 12"/></svg>'
              +   '</button>'
              + '</div>';
    }

    cartItemsList.innerHTML = itemsHtml;
    totalElement.textContent = orderTotal.toFixed(2) + ' €';

    // Vincular eventos a los botones del carrito renderizado
    cartItemsList.querySelectorAll('.cart-qty-minus').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = parseInt(this.getAttribute('data-id'));
            var item = null;
            for (var j = 0; j < cart.length; j++) {
                if (cart[j].id === id) { item = cart[j]; break; }
            }
            if (item) changeQuantity(id, item.quantity - 1);
        });
    });

    cartItemsList.querySelectorAll('.cart-qty-plus').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = parseInt(this.getAttribute('data-id'));
            var item = null;
            for (var j = 0; j < cart.length; j++) {
                if (cart[j].id === id) { item = cart[j]; break; }
            }
            if (item) changeQuantity(id, item.quantity + 1);
        });
    });

    cartItemsList.querySelectorAll('.cart-remove').forEach(function (btn) {
        btn.addEventListener('click', function () {
            removeFromCart(parseInt(this.getAttribute('data-id')));
        });
    });
}

// ─── Inicialización ───────────────────────────────────────────────────

/** Configura los eventos del modal y el badge al cargar la página */
function initCart() {
    var closeBtn = document.getElementById('closeCartModal');
    var overlay = document.getElementById('cartOverlay');

    if (closeBtn) closeBtn.addEventListener('click', closeCartModal);
    if (overlay) overlay.addEventListener('click', closeCartModal);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeCartModal();
    });

    attachCartIconListener();

    // Delegación global para el icono del carrito si no se encuentra al cargar
    document.body.addEventListener('click', function (e) {
        if (e.target.closest && e.target.closest('#cartIcon')) {
            openCartModal();
        }
    });

    updateCartBadge();
}

/** Vincula el evento de clic al icono del carrito en el header */
function attachCartIconListener() {
    var cartIcon = document.getElementById('cartIcon');
    if (cartIcon && !cartIcon.dataset.cartListenerAttached) {
        cartIcon.addEventListener('click', openCartModal);
        cartIcon.dataset.cartListenerAttached = 'true';
    }
}

// Exponer funciones globalmente para otros módulos
window.addToCart = addToCart;
window.getCart = getCart;
window.getTotalItems = getTotalItems;

// Inicializar inmediatamente (defer ya garantiza DOM listo)
initCart();
