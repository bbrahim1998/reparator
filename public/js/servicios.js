// ========================================================================
//  MODAL DE DETALLE DE PRODUCTO
//  Gestiona la apertura, cierre y contenido del modal que muestra la
//  información completa de un producto al hacer clic en una tarjeta.
// ========================================================================

/**
 * Abre el modal de detalle de producto y rellena todos sus campos
 * con los datos del producto seleccionado.
 *
 * @param {string|number} productId         - ID del producto en la BD
 * @param {string}        productName       - Nombre del producto
 * @param {string}        productImage      - Ruta de la imagen
 * @param {string}        productDescription - Descripción del producto
 * @param {string|number} productPrice      - Precio del producto
 * @param {string}        categoryName      - Nombre de la categoría
 */
function openProductModal(productId, productName, productImage, productDescription, productPrice, categoryName) {
    // Rellenar la cabecera e información principal del modal
    document.getElementById('modalProductoTitle').textContent = productName;
    document.getElementById('modalProductoTitle').setAttribute('data-product-id', productId);
    document.getElementById('modalProductoNombre').textContent = productName;
    document.getElementById('modalProductoImagen').src = productImage;
    document.getElementById('modalProductoImagen').alt = productName;
    document.getElementById('modalProductoDescripcion').textContent = productDescription;
    document.getElementById('modalProductoPrecio').textContent = parseFloat(productPrice).toFixed(2) + ' €';

    // Mostrar o esconder la categoría según si el producto tiene una asociada
    const categoryElement = document.getElementById('modalProductoCategoria');
    if (categoryName) {
        categoryElement.textContent = categoryName;
        categoryElement.style.display = '';
    } else {
        categoryElement.style.display = 'none';
    }

    // Pre‑seleccionar el producto en el desplegable del formulario de consulta
    const consultationProductSelect = document.getElementById('consulta_producto_id');
    if (consultationProductSelect) consultationProductSelect.value = productId;

    // Actualizar el estado del botón de favoritos en el modal
    const modalFavBtn = document.getElementById('modalFavBtn');
    if (modalFavBtn) {
        var isFav = typeof isFavorite === 'function' && isFavorite(productId);
        var heartSvg = modalFavBtn.querySelector('.fav-icon-heart');
        if (isFav) {
            heartSvg.setAttribute('fill', '#ef4444');
            heartSvg.setAttribute('stroke', '#ef4444');
        } else {
            heartSvg.setAttribute('fill', 'none');
            heartSvg.setAttribute('stroke', 'currentColor');
        }
    }

    // Eliminar mensajes de éxito de envíos anteriores
    const previousSuccessMessage = document.querySelector('#productoModal .alert-success');
    if (previousSuccessMessage) previousSuccessMessage.remove();

    // Mostrar el modal y bloquear el scroll del body
    const productModal = document.getElementById('productoModal');
    productModal.classList.remove('hidden');
    productModal.classList.add('flex');
    document.body.style.overflow = 'hidden';

    // Reiniciar el selector de cantidad a su valor por defecto
    resetQuantitySelector();
}

/**
 * Cierra el modal de detalle de producto y restaura el scroll.
 * También limpia cualquier mensaje de éxito visible.
 */
function closeProductModal() {
    const productModal = document.getElementById('productoModal');
    productModal.classList.add('hidden');
    productModal.classList.remove('flex');
    document.body.style.overflow = 'auto';

    const previousSuccessMessage = document.querySelector('#productoModal .alert-success');
    if (previousSuccessMessage) previousSuccessMessage.remove();
}

/**
 * Reinicia el selector de cantidad dentro del modal a su estado inicial:
 * valor = 1, botón "‑" deshabilitado, botón de carrito en estado neutro.
 */
function resetQuantitySelector() {
    const productModal = document.getElementById('productoModal');
    const quantityMinusButton = productModal.querySelector('.qty-minus');
    const quantityValueDisplay = productModal.querySelector('.qty-value');
    const addToCartButton = productModal.querySelector('.add-to-cart-btn');

    if (quantityValueDisplay) quantityValueDisplay.textContent = '1';
    if (quantityMinusButton) quantityMinusButton.disabled = true;
    if (addToCartButton) {
        addToCartButton.classList.remove('bg-green-400');
        addToCartButton.textContent = 'Añadir al carrito';
    }
    window.modalSelectedQuantity = 1;
}

/**
 * Inicializa los eventos de los botones de cantidad y "Añadir al carrito"
 * dentro del modal. Se ejecuta una sola vez al cargar la página.
 */
function initQuantityControls() {
    const productModal = document.getElementById('productoModal');
    if (!productModal) return;

    const quantityMinusButton = productModal.querySelector('.qty-minus');
    const quantityPlusButton = productModal.querySelector('.qty-plus');
    const quantityValueDisplay = productModal.querySelector('.qty-value');
    const addToCartButton = productModal.querySelector('.add-to-cart-btn');

    window.modalSelectedQuantity = 1;

    if (quantityMinusButton) {
        quantityMinusButton.addEventListener('click', (event) => {
            event.stopPropagation();
            if (window.modalSelectedQuantity > 1) {
                window.modalSelectedQuantity--;
                quantityValueDisplay.textContent = window.modalSelectedQuantity;
                quantityMinusButton.disabled = window.modalSelectedQuantity === 1;
            }
        });
    }

    if (quantityPlusButton) {
        quantityPlusButton.addEventListener('click', (event) => {
            event.stopPropagation();
            if (window.modalSelectedQuantity < 10) {
                window.modalSelectedQuantity++;
                quantityValueDisplay.textContent = window.modalSelectedQuantity;
                quantityMinusButton.disabled = false;
            }
        });
    }

    if (addToCartButton) {
        addToCartButton.addEventListener('click', (event) => {
            event.stopPropagation();
            const productId = parseInt(document.getElementById('modalProductoTitle').getAttribute('data-product-id'));
            const productName = document.getElementById('modalProductoTitle').textContent || 'Servicio';
            const productImage = document.getElementById('modalProductoImagen').src || '';
            const productPriceText = document.getElementById('modalProductoPrecio').textContent || '0';
            const productPrice = parseFloat(productPriceText.replace(' €', '').replace(',', '.')) || 0;

            if (typeof addToCart === 'function') {
                addToCart(productId, productName, productImage, productPrice, window.modalSelectedQuantity);
            }

            // Feedback visual: el botón se pone verde brevemente
            addToCartButton.classList.add('bg-green-400');
            addToCartButton.textContent = '✓ Añadido';
            setTimeout(() => {
                addToCartButton.classList.remove('bg-green-400');
                addToCartButton.textContent = 'Añadir al carrito';
            }, 2000);
        });
    }

    // Botón de favoritos en el modal
    const modalFavBtn = document.getElementById('modalFavBtn');
    if (modalFavBtn) {
        modalFavBtn.addEventListener('click', () => {
            const productId = parseInt(document.getElementById('modalProductoTitle').getAttribute('data-product-id'));
            var added = false;
            if (typeof toggleFavorite === 'function') {
                added = toggleFavorite(productId);
            }
            var heartSvg = modalFavBtn.querySelector('.fav-icon-heart');
            if (added) {
                heartSvg.setAttribute('fill', '#ef4444');
                heartSvg.setAttribute('stroke', '#ef4444');
            } else {
                heartSvg.setAttribute('fill', 'none');
                heartSvg.setAttribute('stroke', 'currentColor');
            }
            if (typeof updateFavoritesBadge === 'function') {
                updateFavoritesBadge();
            }
        });
    }
}

/**
 * Configura los controles de cierre del modal: botón X, clic en el overlay
 * y tecla Escape. También inicia los controles de cantidad.
 */
function initModalControls() {
    const closeButton = document.getElementById('closeProductoModal');
    const modalOverlay = document.getElementById('productoOverlay');

    if (closeButton) closeButton.addEventListener('click', closeProductModal);
    if (modalOverlay) modalOverlay.addEventListener('click', closeProductModal);

    // Cerrar con la tecla Escape
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeProductModal();
    });

    initQuantityControls();
}

// ========================================================================
//  TARJETAS DE SERVICIO (vista de listado)
//  Controladores de cantidad, carrito y apertura del modal desde cada card.
// ========================================================================

document.querySelectorAll('.service-card').forEach((serviceCard) => {
    // Referencias a los elementos interactivos de la tarjeta
    const quantityMinusButton = serviceCard.querySelector('.qty-minus');
    const quantityPlusButton = serviceCard.querySelector('.qty-plus');
    const quantityValueDisplay = serviceCard.querySelector('.qty-value');
    const addToCartButton = serviceCard.querySelector('.add-to-cart-btn');
    const cardFooter = serviceCard.querySelector('.service-footer');
    let cardSelectedQuantity = 1;

    // Botón "‑" : reduce la cantidad (mínimo 1)
    if (quantityMinusButton) {
        quantityMinusButton.addEventListener('click', (event) => {
            event.stopPropagation();
            if (cardSelectedQuantity > 1) {
                cardSelectedQuantity--;
                quantityValueDisplay.textContent = cardSelectedQuantity;
                quantityMinusButton.disabled = cardSelectedQuantity === 1;
            }
        });
    }

    // Botón "+" : aumenta la cantidad (máximo 10)
    if (quantityPlusButton) {
        quantityPlusButton.addEventListener('click', (event) => {
            event.stopPropagation();
            if (cardSelectedQuantity < 10) {
                cardSelectedQuantity++;
                quantityValueDisplay.textContent = cardSelectedQuantity;
                quantityMinusButton.disabled = false;
            }
        });
    }

    // Botón "Añadir al carrito" : guarda en localStorage y feedback visual
    if (addToCartButton) {
        addToCartButton.addEventListener('click', (event) => {
            event.stopPropagation();
            const productId = parseInt(serviceCard.getAttribute('data-id'));
            const productName = serviceCard.getAttribute('data-nombre') || 'Servicio';
            const productImage = serviceCard.getAttribute('data-imagen') || '';
            const productPrice = parseFloat(serviceCard.getAttribute('data-precio')) || 0;

            if (typeof addToCart === 'function') {
                addToCart(productId, productName, productImage, productPrice, cardSelectedQuantity);
            }

            addToCartButton.classList.add('bg-green-400');
            addToCartButton.textContent = '✓ Añadido';
            setTimeout(() => {
                addToCartButton.classList.remove('bg-green-400');
                addToCartButton.textContent = 'Añadir al carrito';
            }, 2000);
        });
    }

    // Botón de favoritos en la tarjeta
    const favBtn = serviceCard.querySelector('.fav-btn');
    if (favBtn) {
        var favId = parseInt(favBtn.getAttribute('data-id'));
        if (typeof isFavorite === 'function' && isFavorite(favId)) {
            favBtn.classList.add('active');
            favBtn.querySelector('.fav-icon-heart').setAttribute('fill', '#ef4444');
            favBtn.querySelector('.fav-icon-heart').setAttribute('stroke', '#ef4444');
        }
        favBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            var id = parseInt(favBtn.getAttribute('data-id'));
            var added = false;
            if (typeof toggleFavorite === 'function') {
                added = toggleFavorite(id);
            }
            if (added) {
                favBtn.classList.add('active');
                favBtn.querySelector('.fav-icon-heart').setAttribute('fill', '#ef4444');
                favBtn.querySelector('.fav-icon-heart').setAttribute('stroke', '#ef4444');
            } else {
                favBtn.classList.remove('active');
                favBtn.querySelector('.fav-icon-heart').setAttribute('fill', 'none');
                favBtn.querySelector('.fav-icon-heart').setAttribute('stroke', 'currentColor');
            }
            if (typeof updateFavoritesBadge === 'function') {
                updateFavoritesBadge();
            }
        });
    }

    // Apertura del modal desde la tarjeta

    /**
     * Lee los atributos data‑* de la tarjeta y abre el modal con ellos.
     */
    function openModalFromCard() {
        const productId = serviceCard.getAttribute('data-id') || '';
        const productName = serviceCard.getAttribute('data-nombre') || '';
        const productImage = serviceCard.getAttribute('data-imagen') || '';
        const productDescription = serviceCard.getAttribute('data-descripcion') || '';
        const productPrice = serviceCard.getAttribute('data-precio') || '0';
        const categoryName = serviceCard.getAttribute('data-categoria') || '';

        openProductModal(productId, productName, productImage, productDescription, productPrice, categoryName);
    }

    // Clic en cualquier parte de la tarjeta (excepto footer y data-open-modal) abre el modal
    serviceCard.addEventListener('click', (event) => {
        if (cardFooter && cardFooter.contains(event.target)) return;
        if (event.target.closest('[data-open-modal]')) return;
        openModalFromCard();
    });

    // Clic explícito en imagen o nombre (marcados con data-open-modal)
    serviceCard.querySelectorAll('[data-open-modal]').forEach((clickableElement) => {
        clickableElement.addEventListener('click', (event) => {
            event.stopPropagation();
            openModalFromCard();
        });
    });
});

// ========================================================================
//  VALIDACIÓN DEL FORMULARIO DE CONSULTA
//  Reutiliza validateMaximum2() de autenticacion.js para nombre/apellidos.
//  Añade validación de email y longitud mínima del mensaje.
// ========================================================================

/**
 * Valida el email con el patrón usuario@dominio.com|es|org|cat
 */
function validateConsultationEmail() {
    var emailField = document.getElementById('consulta_email');
    if (!emailField) return;

    var emailPattern = /^[a-z\d.\-_]{1,64}@[\w.]{1,255}\.((com)|(es)|(org)|(cat))$/;
    var emailValue = emailField.value || '';
    var isValid = emailPattern.test(emailValue);

    // Aplicar estilos de borde (mismo patrón que validateField en autenticacion.js)
    emailField.style.borderColor = isValid ? '#22c55e' : '#ef4444';
    emailField.classList.remove('border-white/10', 'border-green-500', 'border-red-500');
    emailField.classList.add(isValid ? 'border-green-500' : 'border-red-500');

    updateConsultSubmitButton();
}

/**
 * Valida que el mensaje tenga al menos 15 caracteres.
 */
function validateConsultationMessage() {
    var messageField = document.getElementById('consulta_mensaje');
    if (!messageField) return;

    var messageValue = messageField.value || '';
    var isValid = messageValue.length > 15;

    messageField.style.borderColor = isValid ? '#22c55e' : '#ef4444';
    messageField.classList.remove('border-white/10', 'border-green-500', 'border-red-500');
    messageField.classList.add(isValid ? 'border-green-500' : 'border-red-500');

    updateConsultSubmitButton();
}

/**
 * Habilita o deshabilita el botón de envío según la validez de los campos visibles.
 * Solo comprueba los campos que existen en el DOM (invitados ven nombre/apellidos/email,
 * usuarios logueados no).
 */
function updateConsultSubmitButton() {
    var consultaForm = document.querySelector('.consulta-form');
    if (!consultaForm) return;

    var submitButton = consultaForm.querySelector('[type=submit]');
    if (!submitButton) return;

    var allValid = true;

    // El desplegable de producto debe tener un valor seleccionado
    var productoSelect = document.getElementById('consulta_producto_id');
    if (productoSelect && !productoSelect.value) allValid = false;

    var nombreField = document.getElementById('consulta_nombre');
    var apellidosField = document.getElementById('consulta_apellidos');
    var emailField = document.getElementById('consulta_email');
    var mensajeField = document.getElementById('consulta_mensaje');

    if (nombreField && !nombreField.classList.contains('border-green-500')) allValid = false;
    if (apellidosField && !apellidosField.classList.contains('border-green-500')) allValid = false;
    if (emailField && !emailField.classList.contains('border-green-500')) allValid = false;
    if (mensajeField && !mensajeField.classList.contains('border-green-500')) allValid = false;

    submitButton.disabled = !allValid;
    submitButton.classList.toggle('opacity-50', !allValid);
    submitButton.classList.toggle('cursor-not-allowed', !allValid);
}

/**
 * Inicializa los eventos de validación en el formulario de consulta.
 */
function initConsultationValidation() {
    var productoSelect = document.getElementById('consulta_producto_id');
    var nombreField = document.getElementById('consulta_nombre');
    var apellidosField = document.getElementById('consulta_apellidos');
    var emailField = document.getElementById('consulta_email');
    var mensajeField = document.getElementById('consulta_mensaje');

    // Validar nombre (solo para invitados) — reutiliza validateMaximum2 de autenticacion.js
    if (nombreField) {
        if (typeof validateMaximum2 === 'function') validateMaximum2('consulta_nombre');
        nombreField.addEventListener('input', function () { validateMaximum2('consulta_nombre'); updateConsultSubmitButton(); });
        nombreField.addEventListener('focus', function () { validateMaximum2('consulta_nombre'); updateConsultSubmitButton(); });
    }

    // Validar apellidos (solo para invitados)
    if (apellidosField) {
        if (typeof validateMaximum2 === 'function') validateMaximum2('consulta_apellidos');
        apellidosField.addEventListener('input', function () { validateMaximum2('consulta_apellidos'); updateConsultSubmitButton(); });
        apellidosField.addEventListener('focus', function () { validateMaximum2('consulta_apellidos'); updateConsultSubmitButton(); });
    }

    // Validar email (solo para invitados)
    if (emailField) {
        validateConsultationEmail();
        emailField.addEventListener('input', validateConsultationEmail);
        emailField.addEventListener('focus', validateConsultationEmail);
    }

    // Desplegable de producto: al cambiar, re-evaluar el botón
    if (productoSelect) {
        productoSelect.addEventListener('change', updateConsultSubmitButton);
    }

    // Validar mensaje (siempre visible)
    if (mensajeField) {
        validateConsultationMessage();
        mensajeField.addEventListener('input', validateConsultationMessage);
        mensajeField.addEventListener('focus', validateConsultationMessage);
    }
}

// ── Arranque ──
initModalControls();
initConsultationValidation();
