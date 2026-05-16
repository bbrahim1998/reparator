// ========================================================================
//  CHECKOUT
//  Validación del formulario de pago y renderizado del resumen del pedido.
//  Reutiliza funciones de validación de autenticacion.js (validateMaximum2,
//  validateEmailField, validateRequired, validateField).
// ========================================================================

/** Habilita o deshabilita el botón de finalizar compra según la validez de todos los campos */
function updateCheckoutSubmitButton() {
    var greenFields = [
        'name', 'apellidos', 'email', 'telefono',
        'envio_tipo_via', 'envio_nombre_via', 'envio_numero',
        'envio_municipio', 'envio_provincia', 'envio_codigo_postal',
        'card_holder', 'card_number', 'card_expiry', 'card_cvv'
    ];
    var allFieldsValid = greenFields.every(function(id) {
        var field = $('#' + id);
        return field.length > 0 && field.hasClass('border-green-500');
    });
    if (allFieldsValid) {
        $('#finalizarCompraBtn').prop('disabled', false);
        $('#finalizarCompraBtn').css('opacity', '1');
    } else {
        $('#finalizarCompraBtn').prop('disabled', true);
        $('#finalizarCompraBtn').css('opacity', '0.5');
    }
}

/** Valida que el código postal tenga exactamente 5 dígitos */
function validatePostalCode() {
    var field = $('#envio_codigo_postal');
    if (field.length === 0) return;
    var val = field.val() || '';
    var isValid = /^\d{5}$/.test(val);
    validateField('envio_codigo_postal', isValid);
}

/** Valida que un campo requerido del checkout no esté vacío */
function validateRequiredCheckout(id) {
    var field = $('#' + id);
    if (field.length === 0) return;
    var val = field.val() || '';
    var isValid = val.trim() !== '';
    validateField(id, isValid);
}

/** Valida que el número de tarjeta tenga entre 13 y 19 dígitos */
function validateCardNumber() {
    var field = $('#card_number');
    if (field.length === 0) return;
    var val = field.val() || '';
    var digits = val.replace(/\D/g, '');
    var isValid = digits.length >= 13 && digits.length <= 19;
    validateField('card_number', isValid);
}

/** Valida la fecha de caducidad de la tarjeta (formato MM/AA, futuro) */
function validateCardExpiry() {
    var field = $('#card_expiry');
    if (field.length === 0) return;
    var val = field.val() || '';
    var isValid = /^\d{2}\/\d{2}$/.test(val);
    if (isValid) {
        var parts = val.split('/');
        var month = parseInt(parts[0], 10);
        var year = parseInt(parts[1], 10) + 2000;
        isValid = month >= 1 && month <= 12;
        if (isValid) {
            var now = new Date();
            var expiry = new Date(year, month, 0);
            isValid = expiry >= now;
        }
    }
    validateField('card_expiry', isValid);
}

/** Valida que el CVV tenga 3 o 4 dígitos */
function validateCardCvv() {
    var field = $('#card_cvv');
    if (field.length === 0) return;
    var val = field.val() || '';
    var isValid = /^\d{3,4}$/.test(val);
    validateField('card_cvv', isValid);
}

/** Valida que el teléfono tenga entre 9 y 15 dígitos */
function validateCheckoutPhone() {
    var field = $('#telefono');
    if (field.length === 0) return;
    var val = field.val() || '';
    var digits = val.replace(/\D/g, '');
    var isValid = digits.length >= 9 && digits.length <= 15;
    validateField('telefono', isValid);
}

/** Inicializa la validación de todos los campos del formulario de checkout */
function initCheckoutValidation() {
    validateMaximum2('name');
    validateMaximum2('apellidos');
    validateEmailField();
    validateCheckoutPhone();

    var shippingFields = ['envio_tipo_via', 'envio_nombre_via', 'envio_numero', 'envio_municipio', 'envio_provincia'];
    shippingFields.forEach(function(id) {
        validateRequired(id);
        $('#' + id).on('change input', function() { validateRequired(id); });
    });

    validatePostalCode();
    $('#envio_codigo_postal').on('input', validatePostalCode);

    validateRequiredCheckout('card_holder');
    $('#card_holder').on('input', function() { validateRequiredCheckout('card_holder'); });

    validateCardNumber();
    $('#card_number').on('input', function() {
        this.value = this.value.replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim();
        validateCardNumber();
    });

    validateCardExpiry();
    $('#card_expiry').on('input', function() {
        var val = this.value.replace(/\D/g, '');
        if (val.length >= 2) {
            this.value = val.slice(0, 2) + '/' + val.slice(2, 4);
        } else {
            this.value = val;
        }
        validateCardExpiry();
    });

    validateCardCvv();
    $('#card_cvv').on('input', function() {
        this.value = this.value.replace(/\D/g, '');
        validateCardCvv();
    });

    $('#name').on('input', function() { validateMaximum2('name'); });
    $('#name').on('focus', function() { validateMaximum2('name'); });
    $('#apellidos').on('input', function() { validateMaximum2('apellidos'); });
    $('#apellidos').on('focus', function() { validateMaximum2('apellidos'); });
    $('#email').on('input', validateEmailField);
    $('#email').on('focus', validateEmailField);
    $('#telefono').on('input', validateCheckoutPhone);
    $('#telefono').on('focus', validateCheckoutPhone);
}

// Interceptar validateField para que también actualice el botón de checkout
var originalValidateField = window.validateField;
window.validateField = function (fieldId, isValid) {
    if (typeof originalValidateField === 'function') {
        originalValidateField(fieldId, isValid);
    }
    updateCheckoutSubmitButton();
};

$(document).ready(function () {
    var cart = getCart();
    var container = document.getElementById('checkoutItems');
    var emptyMessage = document.getElementById('checkoutEmpty');
    var summaryContainer = document.getElementById('checkoutSummary');
    var totalElement = document.getElementById('checkoutTotal');

    if (!container) return;

    if (cart.length === 0) {
        if (emptyMessage) emptyMessage.classList.remove('hidden');
        if (summaryContainer) summaryContainer.classList.add('hidden');
        return;
    }

    if (emptyMessage) emptyMessage.classList.add('hidden');
    if (summaryContainer) summaryContainer.classList.remove('hidden');

    function renderCheckoutItems() {
        var currentCart = getCart();
        if (currentCart.length === 0) {
            container.innerHTML = '';
            if (emptyMessage) emptyMessage.classList.remove('hidden');
            if (summaryContainer) summaryContainer.classList.add('hidden');
            return;
        }

        var html = '';
        var orderTotal = 0;

        for (var i = 0; i < currentCart.length; i++) {
            var item = currentCart[i];
            var subtotal = item.price * item.quantity;
            orderTotal += subtotal;

            html += '<div class="checkout-item" data-id="' + item.id + '">'
                  +   '<img src="' + item.image + '" alt="' + item.name + '" class="checkout-item-img">'
                  +   '<div class="checkout-item-info">'
                  +     '<p class="checkout-item-name">' + item.name + '</p>'
                  +     '<p class="checkout-item-price">' + item.price.toFixed(2) + ' €</p>'
                  +   '</div>'
                  +   '<div class="checkout-qty">'
                  +     '<button class="checkout-qty-btn checkout-qty-minus" data-id="' + item.id + '">-</button>'
                  +     '<span class="checkout-qty-value">' + item.quantity + '</span>'
                  +     '<button class="checkout-qty-btn checkout-qty-plus" data-id="' + item.id + '">+</button>'
                  +   '</div>'
                  +   '<span class="checkout-subtotal">' + subtotal.toFixed(2) + ' €</span>'
                  +   '<button class="checkout-remove-btn" data-id="' + item.id + '">'
                  +     '<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M18 6L6 18M6 6l12 12"/></svg>'
                  +   '</button>'
                  + '</div>';
        }

        container.innerHTML = html;
        totalElement.textContent = orderTotal.toFixed(2) + ' €';

        container.querySelectorAll('.checkout-qty-minus').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var id = parseInt(this.getAttribute('data-id'));
                changeQuantity(id, getItemQuantity(id) - 1);
                renderCheckoutItems();
            });
        });

        container.querySelectorAll('.checkout-qty-plus').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var id = parseInt(this.getAttribute('data-id'));
                changeQuantity(id, getItemQuantity(id) + 1);
                renderCheckoutItems();
            });
        });

        container.querySelectorAll('.checkout-remove-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var id = parseInt(this.getAttribute('data-id'));
                removeFromCart(id);
                renderCheckoutItems();
                updateCartBadge();
            });
        });
    }

    function getItemQuantity(id) {
        var c = getCart();
        for (var j = 0; j < c.length; j++) {
            if (c[j].id === id) return c[j].quantity;
        }
        return 0;
    }

    renderCheckoutItems();

    initCheckoutValidation();

    $('#finalizarCompraBtn').prop('disabled', true).css('opacity', '0.5');
});
