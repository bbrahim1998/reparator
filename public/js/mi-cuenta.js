// ========================================================================
//  MI CUENTA
//  Validación del formulario de perfil de usuario en la página /mi-cuenta.
//  Cada campo se valida según su tipo (email, nombre/apellidos con límite
//  de caracteres, o texto requerido genérico).
// ========================================================================

/** Valida que un campo requerido no esté vacío */
function validarRequerido(id) {
    var field = document.getElementById(id);
    if (!field) return true;
    var val = field.value.trim();
    if (val === '') {
        field.classList.remove('border-green-500');
        field.classList.add('border-red-500');
        return false;
    }
    field.classList.remove('border-red-500');
    field.classList.add('border-green-500');
    return true;
}

/** Valida que el campo no exceda el máximo de caracteres y no esté vacío */
function validateMaximum2(id, max) {
    var field = document.getElementById(id);
    if (!field) return true;
    var val = field.value.trim();
    if (val.length > max) {
        field.value = val.substring(0, max);
    }
    if (val.length === 0) {
        field.classList.remove('border-green-500');
        field.classList.add('border-red-500');
        return false;
    }
    field.classList.remove('border-red-500');
    field.classList.add('border-green-500');
    return true;
}

/** Valida el formato del email */
function verificarEmail(id) {
    var field = document.getElementById(id);
    if (!field) return true;
    var val = field.value.trim();
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(val)) {
        field.classList.remove('border-green-500');
        field.classList.add('border-red-500');
        return false;
    }
    field.classList.remove('border-red-500');
    field.classList.add('border-green-500');
    return true;
}

const PROFILE_REQUIRED_FIELDS = [
    'name', 'apellidos', 'email', 'telefono', 'fecha_nacimiento',
    'envio_tipo_via', 'envio_nombre_via', 'envio_numero',
    'envio_codigo_postal', 'envio_municipio', 'envio_provincia'
];

/** Habilita o deshabilita el botón de guardar cambios según la validez de los campos */
function updateProfileSubmitButton() {
    var submitButton = document.getElementById('guardarCambiosBtn');
    if (!submitButton) return;

    var allFieldsValid = true;
    for (var i = 0; i < PROFILE_REQUIRED_FIELDS.length; i++) {
        var field = document.getElementById(PROFILE_REQUIRED_FIELDS[i]);
        if (field && !field.classList.contains('border-green-500')) {
            allFieldsValid = false;
            break;
        }
    }

    submitButton.disabled = !allFieldsValid;
    submitButton.style.opacity = allFieldsValid ? '1' : '0.4';
    submitButton.style.cursor = allFieldsValid ? 'pointer' : 'not-allowed';
}

/** Valida un campo según su tipo (email, max, o texto) y actualiza el botón */
function validateField(id, type) {
    var isValid = false;
    if (type === 'email') {
        isValid = verificarEmail(id);
    } else if (type === 'max') {
        isValid = validateMaximum2(id, 255);
    } else {
        isValid = validarRequerido(id);
    }
    updateProfileSubmitButton();
    return isValid;
}

document.addEventListener('DOMContentLoaded', function () {
    var inputs = document.querySelectorAll('#name, #apellidos, #email, #telefono, #fecha_nacimiento, #envio_tipo_via, #envio_nombre_via, #envio_numero, #envio_codigo_postal, #envio_municipio, #envio_provincia, #distancia');
    inputs.forEach(function (field) {
        var type = 'text';
        if (field.id === 'email') type = 'email';
        else if (field.id === 'apellidos' || field.id === 'name') type = 'max';

        field.addEventListener('input', function () { validateField(field.id, type); });
        field.addEventListener('change', function () { validateField(field.id, type); });
        field.addEventListener('blur', function () { validateField(field.id, type); });
    });

    setTimeout(function () {
        PROFILE_REQUIRED_FIELDS.forEach(function (id) {
            var field = document.getElementById(id);
            if (field && field.value.trim() !== '') {
                var type = 'text';
                if (id === 'email') type = 'email';
                else if (id === 'apellidos' || id === 'name') type = 'max';
                validateField(id, type);
            }
        });
        updateProfileSubmitButton();
    }, 100);
});
