document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('personaForm');
    const nombre = document.getElementById('nombre');
    const edad = document.getElementById('edad');
    const celular = document.getElementById('celular');

    const nombreRegex = /^[a-zA-Z\s]+$/;
    const celularRegex = /^\d{8}$/;

    function validarNombre() {
        if (!nombreRegex.test(nombre.value)) {
            nombre.classList.add('is-invalid');
            return false;
        } else {
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            return true;
        }
    }

    function validarEdad() {
        const edadValue = parseInt(edad.value, 10);
        if (isNaN(edadValue) || edadValue < 1 || edadValue > 90){
            edad.classList.add('is-invalid');
            return false;
        } else {
            edad.classList.remove('is-invalid');
            edad.classList.add('is-valid');
            return true;
        }
    }

    function validarCelular () {
        if (!celularRegex.test(celular.value)) {
            celular.classList.add('is-invalid')
            return false;
        } else {
            celular.classList.remove('is-invalid');
            celular.classList.add('is-valid')
            return true;
        }
    }

    nombre.addEventListener('input', validarNombre);
    edad.addEventListener('input', validarEdad);
    celular.addEventListener('input', validarCelular);

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const isNombreValid = validarNombre();
        const isEdadValid = validarEdad();
        const isCelularValid = validarCelular();

        if (isNombreValid && isEdadValid && isCelularValid) {
            form.submit();
        }
    })
})