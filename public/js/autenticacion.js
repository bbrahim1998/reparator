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

    var sameAddressCheck = document.getElementById('sameAddress');
    var facturacionDiv = document.getElementById('facturacionDiv');
    if (sameAddressCheck && facturacionDiv) {
        sameAddressCheck.addEventListener('change', function() {
            facturacionDiv.style.display = this.checked ? 'none' : 'block';
        });
    }
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
    mostrarBoton();
}

//Validar el campo de nombre para que solo acepte letras, y maximo dos nombres separados por un espacio, y no acepte campos vacios

function validateMaximum2(id) {
    const nameValue = $(`#${id}`).val();
    const isValid = /^[a-zA-Zñç]+ {0,1}[a-zA-Zñç]*$/.test(nameValue) && nameValue.trim() !== '';
    validateField(id, isValid);
}

//verificamos que el numero de telefono sea valido, puede empezar con + o 00, seguido de 2 o 3 digitos del codigo de pais, un espacio opcional y luego 9 digitos del numero, y no acepte campos vacios
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

function verificarEmail(){
    patronEmailCorrecto = /^[a-z\d.\-_]{1,64}@[\w.]{1,255}((\.[a-z]+)){1}.{0}$/
    /**
     * ^[a-z\d.\-_] significa que empieza por cualquier letra minuscula, digito, guion o barra baja
     * ^[a-z\d.-_]{1,64} estos caracteres posibles pueden repetirse entre 1 y 64 veces
     * @ presencia de arroba (al ser una unica vez, no le he puesto ningun indice)
     * [\w._]{1,255} para el nombre del dominio, vale letras mayusculas y minusculas, guin bajo y punto, que se pueden repetir hasta un maximo de 255
     * ((\.[a-z]+)) despues de estos caracteres, tiene que haber la secuencia de punto seguido de 1 o mas letras
     * .{0}$ no tiene que terminar en .
     */
    const email = $('#email').val() || '';
    console.log('Email ingresado:', email);
    validateField('email', patronEmailCorrecto.test(email));
    

}





// ============================================================
// VALIDACIÓN DE CAMPOS REQUERIDOS DE DIRECCIÓN DE ENVÍO
// ============================================================

function validarRequerido(id) {
    var valor = $('#' + id).val();
    var valido = valor && valor.trim() !== '';
    validateField(id, valido);
}

function initCamposDireccionEnvio() {
    var campos = ['envio_tipo_via', 'envio_nombre_via', 'envio_numero', 'envio_municipio', 'envio_provincia'];
    campos.forEach(function(id) {
        validarRequerido(id);
        if ($('#' + id).is('select')) {
            $('#' + id).on('change', function() { validarRequerido(id); });
        } else {
            $('#' + id).on('input', function() { validarRequerido(id); });
        }
        $('#' + id).on('focus', function() { validarRequerido(id); });
    });
}

//Validacion de campo contreseña
function validarContrasenaRepetida() {
    const contrasena = $('#password').val() || '';
    const confiramcion = $('#password_confirmation').val() || '';
    let valorLogintud = 0;
    let valorMayuscula = 0, valorMinuscula = 0, valorNumero = 0, valorCaracterEspecial = 0  ;
    if(contrasena.length >= 8) valorLogintud = 1;
    if(/[A-Z]/.test(contrasena)) valorMayuscula = 1;
    if(/[a-z]/.test(contrasena)) valorMinuscula = 1;
    if(/\d/.test(contrasena)) valorNumero = 1;
    if(/[@$!%*?&]/.test(contrasena)) valorCaracterEspecial = 1;
    fortaleza = valorLogintud + valorMayuscula + valorMinuscula + valorNumero + valorCaracterEspecial;
    switch(fortaleza) {
        case 5:
            fortalezaText = "muy fuerte";
            break;
        case 4:
            fortalezaText = "fuerte";
            break;
        case 3:
            fortalezaText = "media";
            break;
        case 2:
            fortalezaText = "débil";
            break;
        default:
            fortalezaText = "muy débil";
    }
    $('#password-strength-meter').val(fortaleza);
    $('#password-strength-text').text(fortalezaText);

    valorLogintud = contrasena.length >= 8;
    const esValida = contrasena.length >= 8 && confiramcion === contrasena;
    validateField('password', contrasena.length >= 8);
    // console.log('Contraseña:', contrasena, 'Confirmación:', confiramcion, 'Fortaleza:', fortalezaText, '¿Es válida?', esValida);
    validateField('password_confirmation', esValida);
}


// ============================================================
// ============================================================
// CONTROL DEL BOTÓN DE REGISTRO
// ============================================================
function mostrarBoton() {
    var camposVerdes = ['name', 'apellidos', 'email', 'telefono',
                        'envio_tipo_via', 'envio_nombre_via', 'envio_numero',
                        'envio_municipio', 'envio_provincia', 'password',
                        'password_confirmation'];
    var todoValido = camposVerdes.every(function(id) {
        return $('#' + id).hasClass('border-green-500');
    });
    if(todoValido) {
        console.log('Todos los campos son válidos. Habilitando botón de registro.');
        $('#registerButton').addClass('bg-[var(--color-acento)]');
        $('#registerButton').removeClass('text-[var(--color-acento)]');
        $('#registerButton').prop('disabled', false);
        console.log('Campo habilitado:', $('#registerButton').prop('disabled'));

    } else {
        console.log('No todos los campos son válidos. Deshabilitando botón de registro.');
        $('#registerButton').removeClass('bg-[var(--color-acento)]');
        $('#registerButton').addClass('text-[var(--color-fondo)]');
        $('#registerButton').prop('disabled', true);
        console.log('Campo deshabilitado:', $('#registerButton').prop('disabled'));
    }
    
}
// ============================================================

function initValidationListeners() {
    validateMaximum2('name');
    validateMaximum2('apellidos');
    verificarEmail();
    $('#name').on('input', function() { validateMaximum2('name'); });
    $('#name').on('focus', function() { validateMaximum2('name'); });
    $('#apellidos').on('input', function() { validateMaximum2('apellidos'); });
    $('#apellidos').on('focus', function() { validateMaximum2('apellidos'); });

    $('#telefono').on('input', verificarNumeroInternacional);
    $('#telefono_codigo').on('input change', verificarNumeroInternacional);
    $('#telefono').on('focus', verificarNumeroInternacional);
    
    $('#email').on('input', verificarEmail);
    $('#email').on('focus', verificarEmail);

    validarContrasenaRepetida();
    $('#password').on('input', validarContrasenaRepetida);
    $('#password_confirmation').on('input', validarContrasenaRepetida);
    $('#password').on('focus', validarContrasenaRepetida);
    $('#password_confirmation').on('focus', validarContrasenaRepetida);

    initCamposDireccionEnvio();
}

$(document).ready(initValidationListeners);
