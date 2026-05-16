// ========================================================================
//  FAVORITOS
//  Gestiona la lista de favoritos en localStorage, el badge del header y
//  el renderizado de la página de favoritos.
// ========================================================================

const FAVORITES_STORAGE_KEY = 'reparator_favoritos';

// ─── CRUD de favoritos en localStorage ────────────────────────────────

/** Obtiene la lista de favoritos desde localStorage */
function getFavorites() {
    var storedData = localStorage.getItem(FAVORITES_STORAGE_KEY);
    return storedData ? JSON.parse(storedData) : [];
}

/** Guarda la lista de favoritos en localStorage */
function saveFavorites(favorites) {
    localStorage.setItem(FAVORITES_STORAGE_KEY, JSON.stringify(favorites));
}

// ─── Operaciones sobre favoritos ──────────────────────────────────────

/** Añade o elimina un producto de favoritos. Devuelve true si se añadió */
function toggleFavorite(productId) {
    var favorites = getFavorites();
    var existingIndex = favorites.indexOf(productId);
    if (existingIndex === -1) {
        favorites.push(productId);
    } else {
        favorites.splice(existingIndex, 1);
    }
    saveFavorites(favorites);
    return existingIndex === -1;
}

/** Comprueba si un producto está en favoritos */
function isFavorite(productId) {
    return getFavorites().indexOf(productId) !== -1;
}

// ─── Sincronización del badge ─────────────────────────────────────────

/** Actualiza el contador del badge del icono de favoritos en el header */
function updateFavoritesBadge() {
    var badge = document.getElementById('favBadge');
    if (!badge) return;
    var count = getFavorites().length;
    if (count > 0) {
        badge.classList.remove('hidden');
        badge.classList.add('flex');
        badge.textContent = count > 99 ? '99+' : count;
    } else {
        badge.classList.add('hidden');
        badge.classList.remove('flex');
    }
}

// ─── Renderizado de la página de favoritos ────────────────────────────

/** Renderiza las tarjetas de productos favoritos en la página /favoritos */
function renderFavoritesPage() {
    var container = document.getElementById('favoritosGrid');
    var emptyMessage = document.getElementById('favoritosEmpty');
    if (!container) return;

    var favorites = getFavorites();

    if (favorites.length === 0) {
        if (emptyMessage) emptyMessage.classList.remove('hidden');
        container.innerHTML = '';
        return;
    }

    if (emptyMessage) emptyMessage.classList.add('hidden');

    var products = window.__productos || [];

    var cardsHtml = '';
    for (var i = 0; i < products.length; i++) {
        var product = products[i];
        if (favorites.indexOf(product.id) !== -1) {
            cardsHtml += '<div class="fav-card" data-id="' + product.id + '">'
                  +   '<div class="fav-card-img-wrap">'
                  +     '<img src="' + product.imagen + '" alt="' + product.nombre + '" class="fav-card-img">'
                  +     '<button class="fav-card-heart active" data-id="' + product.id + '">'
                  +       '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>'
                  +     '</button>'
                  +   '</div>'
                  +   '<div class="fav-card-body">'
                  +     '<h3 class="fav-card-title">' + product.nombre + '</h3>'
                  +     '<p class="fav-card-desc">' + product.descripcion + '</p>'
                  +     '<p class="fav-card-price">' + parseFloat(product.precio).toFixed(2) + ' €</p>'
                  +   '</div>'
                  +   '<div class="fav-card-footer">'
                  +     '<a href="/servicio/' + product.id + '" class="fav-card-btn">Ver producto</a>'
                  +   '</div>'
                  + '</div>';
        }
    }

    if (cardsHtml === '') {
        if (emptyMessage) emptyMessage.classList.remove('hidden');
        container.innerHTML = '';
        return;
    }

    container.innerHTML = cardsHtml;

    // Vincular eventos a los botones de corazón en cada tarjeta renderizada
    container.querySelectorAll('.fav-card-heart').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = parseInt(this.getAttribute('data-id'));
            toggleFavorite(id);
            renderFavoritesPage();
            updateFavoritesBadge();
        });
    });
}

// ─── Arranque ─────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', function () {
    updateFavoritesBadge();
    renderFavoritesPage();
});
