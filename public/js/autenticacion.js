// ========================================================================
//  AUTENTICACIÓN
//  Gestiona los modales de login y registro, el dropdown de usuario y
//  la validación de todos los campos del formulario de registro.
// ========================================================================

// ─── Modales de Login y Registro ──────────────────────────────────────
// Estas funciones se exponen a window para los onclick del HTML.

/** Abre el modal de inicio de sesión */
function openLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

/** Cierra el modal de inicio de sesión */
function closeLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
}

/** Abre el modal de registro */
function openRegisterModal() {
    const modal = document.getElementById('registerModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

/** Cierra el modal de registro */
function closeRegisterModal() {
    const modal = document.getElementById('registerModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
}

// Exponer funciones al scope global para los onclick del HTML
if (typeof window !== 'undefined') {
    window.openLoginModal = openLoginModal;
    window.closeLoginModal = closeLoginModal;
    window.openRegisterModal = openRegisterModal;
    window.closeRegisterModal = closeRegisterModal;
}

// ─── Dropdown de usuario ──────────────────────────────────────────────

/** Abre/cierra el menú desplegable del usuario */
function toggleUserDropdown() {
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    if (userDropdownMenu) {
        userDropdownMenu.classList.toggle('hidden');
    }
}

if (typeof window !== 'undefined') {
    window.toggleUserDropdown = toggleUserDropdown;
}

// Cerrar dropdown al hacer click fuera
document.addEventListener('click', function(event) {
    const userDropdownBtn = document.getElementById('userDropdownBtn');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    if (userDropdownBtn && userDropdownMenu) {
        if (!userDropdownBtn.contains(event.target) && !userDropdownMenu.contains(event.target)) {
            userDropdownMenu.classList.add('hidden');
        }
    }
});

// ─── Cambio entre modales ─────────────────────────────────────────────

/** Cierra registro y abre login */
function switchToLogin() {
    closeRegisterModal();
    setTimeout(openLoginModal, 100);
}

/** Cierra login y abre registro */
function switchToRegister() {
    closeLoginModal();
    setTimeout(openRegisterModal, 100);
}

// ─── Inicialización de modales ────────────────────────────────────────

/** Configura eventos de los modales al cargar el DOM */
function initAuthModals() {
    if (window.hasValidationErrors) {
        openRegisterModal();
    }

    const closeLoginBtn = document.getElementById('closeLoginModal');
    const closeRegisterBtn = document.getElementById('closeRegisterModal');
    const loginOverlay = document.getElementById('loginOverlay');
    const registerOverlay = document.getElementById('registerOverlay');
    const showRegisterFromLogin = document.getElementById('showRegisterFromLogin');
    const showLoginFromRegister = document.getElementById('showLoginFromRegister');

    if (closeLoginBtn) closeLoginBtn.addEventListener('click', closeLoginModal);
    if (closeRegisterBtn) closeRegisterBtn.addEventListener('click', closeRegisterModal);
    if (loginOverlay) loginOverlay.addEventListener('click', closeLoginModal);
    if (registerOverlay) registerOverlay.addEventListener('click', closeRegisterModal);

    if (showRegisterFromLogin) {
        showRegisterFromLogin.addEventListener('click', function(e) {
            e.preventDefault();
            switchToRegister();
        });
    }

    if (showLoginFromRegister) {
        showLoginFromRegister.addEventListener('click', function(e) {
            e.preventDefault();
            switchToLogin();
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLoginModal();
            closeRegisterModal();
        }
    });

    var sameAddressCheck = document.getElementById('sameAddress');
    var facturacionDiv = document.getElementById('facturacionDiv');
    if (sameAddressCheck && facturacionDiv) {
        sameAddressCheck.addEventListener('change', function() {
            facturacionDiv.style.display = this.checked ? 'none' : 'block';
        });
    }
}

document.addEventListener('DOMContentLoaded', initAuthModals);

// ─── Validación de campos ─────────────────────────────────────────────

/**
 * Aplica estilos visuales a un campo según si es válido o no.
 * @param {string} fieldId - ID del campo del formulario
 * @param {boolean} isValid - true si el campo es válido
 */
function validateField(fieldId, isValid) {
    const el = $(`#${fieldId}`);
    const color = isValid ? '#22c55e' : '#ef4444';
    const borderClass = isValid ? 'border-green-500' : 'border-red-500';

    el.css({
        'border-color': color,
        '--tw-ring-color': isValid ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)'
    });

    el.removeClass('border-white/10 border-green-500 border-red-500');
    el.addClass(borderClass);
    updateRegisterButtonStatus();
}

/**
 * Valida que el campo nombre/apellidos contenga solo letras,
 * máximo dos palabras separadas por espacio, y no esté vacío.
 */
function validateMaximum2(id) {
    const element = $(`#${id}`);
    if (element.length === 0) return;
    const nameValue = element.val() || '';
    const isValid = /^[a-zA-Zñç]+ {0,1}[a-zA-Zñç]*$/.test(nameValue) && nameValue.trim() !== '';
    validateField(id, isValid);
}

/**
 * Valida un número de teléfono internacional:
 * puede empezar con + o 00, código de país de 2-3 dígitos,
 * espacio opcional y 9 dígitos del número.
 */
function validateInternationalPhone() {
    const countryCode = $('#telefono_codigo').val() || '';
    const phoneNumber = $('#telefono').val() || '';
    const fullPhone = (countryCode + phoneNumber)
        .replace(/^\s+|\s+$/g, '')
        .replace(/^\+/, '00')
        .replace(/\s/g, '');
    const validPattern = /^(\+|00)?\d{2,3}\s?\d{9}$/;
    validateField('telefono', validPattern.test(fullPhone));
}

/**
 * Valida el formato del email contra un patrón de correo estándar.
 */
function validateEmailField() {
    var emailPattern = /^[a-z\d.\-_]{1,64}@[\w.]{1,255}((\.[a-z]+)){1}.{0}$/;
    const email = $('#email').val() || '';
    validateField('email', emailPattern.test(email));
}

/**
 * Valida que un campo requerido no esté vacío.
 */
function validateRequired(id) {
    const element = $('#' + id);
    if (element.length === 0) return;
    var valor = element.val();
    var valido = valor && valor.trim() !== '';
    validateField(id, valido);
}

/** Inicializa la validación de los campos de dirección de envío */
function initShippingAddressFields() {
    var fields = ['envio_tipo_via', 'envio_nombre_via', 'envio_numero', 'envio_municipio', 'envio_provincia'];
    fields.forEach(function(id) {
        validateRequired(id);
        if ($('#' + id).is('select')) {
            $('#' + id).on('change', function() { validateRequired(id); });
        } else {
            $('#' + id).on('input', function() { validateRequired(id); });
        }
        $('#' + id).on('focus', function() { validateRequired(id); });
    });
}

/**
 * Valida la fortaleza de la contraseña y que coincida con su confirmación.
 * Requiere: mínimo 8 caracteres, mayúscula, minúscula, dígito, especial.
 */
function validatePasswordMatch() {
    const password = $('#password').val() || '';
    const confirmation = $('#password_confirmation').val() || '';
    var strengthScore = 0;
    if (password.length >= 8) strengthScore += 1;
    if (/[A-Z]/.test(password)) strengthScore += 1;
    if (/[a-z]/.test(password)) strengthScore += 1;
    if (/\d/.test(password)) strengthScore += 1;
    if (/[@$!%*?&]/.test(password)) strengthScore += 1;

    var strengthLabel = '';
    switch(strengthScore) {
        case 5: strengthLabel = 'muy fuerte'; break;
        case 4: strengthLabel = 'fuerte'; break;
        case 3: strengthLabel = 'media'; break;
        case 2: strengthLabel = 'débil'; break;
        default: strengthLabel = 'muy débil';
    }
    $('#password-strength-meter').val(strengthScore);
    $('#password-strength-text').text(strengthLabel);

    const passwordsMatch = password.length >= 8 && confirmation === password;
    validateField('password', password.length >= 8);
    validateField('password_confirmation', passwordsMatch);
}

/**
 * Valida que el usuario sea mayor de 18 años según su fecha de nacimiento.
 */
function validateLegalAge(id) {
    const element = $('#' + id);
    if (element.length === 0) return;
    const birthDate = new Date(element.val());
    const today = new Date();
    const age = today.getFullYear() - birthDate.getFullYear();
    const isAdult = age > 18 || (age === 18 &&
        (today.getMonth() > birthDate.getMonth() ||
        (today.getMonth() === birthDate.getMonth() && today.getDate() >= birthDate.getDate())));
    validateField(id, isAdult);
}

// ─── Control del botón de registro ───────────────────────────────────

/** Habilita o deshabilita el botón de registro según la validez de todos los campos */
function updateRegisterButtonStatus() {
    var greenFields = ['name', 'apellidos', 'email', 'telefono', 'fecha_nacimiento',
                       'envio_tipo_via', 'envio_nombre_via', 'envio_numero',
                       'envio_municipio', 'envio_provincia', 'password',
                       'password_confirmation'];
    var allValid = greenFields.every(function(id) {
        return $('#' + id).hasClass('border-green-500');
    });
    if (allValid) {
        $('#registerButton').addClass('bg-[var(--color-acento)]');
        $('#registerButton').removeClass('text-[var(--color-acento)]');
        $('#registerButton').prop('disabled', false);
    } else {
        $('#registerButton').removeClass('bg-[var(--color-acento)]');
        $('#registerButton').addClass('text-[var(--color-fondo)]');
        $('#registerButton').prop('disabled', true);
    }
}

// ─── Inicialización de listeners de validación ────────────────────────

/** Vincula eventos de validación a todos los campos del formulario de registro */
function initValidationListeners() {
    validateMaximum2('name');
    validateMaximum2('apellidos');
    validateEmailField();
    $('#name').on('input', function() { validateMaximum2('name'); });
    $('#name').on('focus', function() { validateMaximum2('name'); });
    $('#apellidos').on('input', function() { validateMaximum2('apellidos'); });
    $('#apellidos').on('focus', function() { validateMaximum2('apellidos'); });

    $('#telefono').on('input', validateInternationalPhone);
    $('#telefono_codigo').on('input change', validateInternationalPhone);
    $('#telefono').on('focus', validateInternationalPhone);

    $('#email').on('input', validateEmailField);
    $('#email').on('focus', validateEmailField);

    validatePasswordMatch();
    $('#password').on('input', validatePasswordMatch);
    $('#password_confirmation').on('input', validatePasswordMatch);
    $('#password').on('focus', validatePasswordMatch);
    $('#password_confirmation').on('focus', validatePasswordMatch);
    $('#fecha_nacimiento').on('input', function() { validateLegalAge('fecha_nacimiento'); });
    $('#fecha_nacimiento').on('focus', function() { validateLegalAge('fecha_nacimiento'); });

    initShippingAddressFields();
}

$(document).ready(initValidationListeners);
