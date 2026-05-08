// Función que abre el modal de login
function openLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

//Funcion que cierra el modal de login
function closeLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
}

//Funcion que abre el modal de registro
function openRegisterModal() {
    const modal = document.getElementById('registerModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

//Funcion que cierra el modal de registro
function closeRegisterModal() {
    const modal = document.getElementById('registerModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
}

// Funciones para cambiar a login
function switchToLogin() {
    closeRegisterModal();
    setTimeout(openLoginModal, 100);
}

// Función para cambiar del modal de login al de registro
function switchToRegister() {
    closeLoginModal();
    setTimeout(openRegisterModal, 100);
}

// Inicialización de eventos para los modales
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
}

document.addEventListener('DOMContentLoaded', initAuthModals);

function validateField(fieldId, isValid) {
    const el = $(`#${fieldId}`);
    const color = isValid ? '#22c55e' : '#ef4444';
    const ringColor = isValid ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)';
    
    el.css({
        'border-color': color,
        '--tw-ring-color': color
    });
    
    el.removeClass('border-white/10 border-green-500 border-red-500');
    el.addClass(isValid ? 'border-green-500' : 'border-red-500');
}

//Validar el campo de nombre para que solo acepte letras, y maximo dos nombres separados por un espacio, y no acepte campos vacios

function validateMaximum2(id) {
    const nameValue = $(`#${id}`).val();
    const isValid = /^[a-zA-Zñç]+ {0,1}[a-zA-Zñç]*$/.test(nameValue) && nameValue.trim() !== '';
    validateField(id, isValid);
}


function verificarNumeroInternacional(){
    const codigo = $('#telefono_codigo').val() || '';
    const numero = $('#telefono').val() || '';
    const telefonoCompleto = (codigo + numero)
        .replace(/^\s+|\s+$/g, '')
        .replace(/^\+/, '00')
        .replace(/\s/g, '');
    const formatoValido = /^(\+|00)?\d{2,3}\s?\d{9}$/;
    validateField('telefono', formatoValido.test(telefonoCompleto));
}

function initValidationListeners() {
    validateMaximum2('name');
    validateMaximum2('apellidos');
    $('#name').on('input', function() { validateMaximum2('name'); });
    $('#name').on('focus', function() { validateMaximum2('name'); });
    $('#apellidos').on('input', function() { validateMaximum2('apellidos'); });
    $('#apellidos').on('focus', function() { validateMaximum2('apellidos'); });

    $('#telefono').on('input', verificarNumeroInternacional);
    $('#telefono_codigo').on('input change', verificarNumeroInternacional);
    $('#telefono').on('focus', verificarNumeroInternacional);
}

$(document).ready(initValidationListeners);
