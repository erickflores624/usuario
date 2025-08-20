document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const nombre = document.getElementById('nombre');
    const celular = document.getElementById('celular');
    const nombreError = document.getElementById('nombreError');
    const celularError = document.getElementById('celularError');

    form.addEventListener('submit', function(event) {
        let valid = true;

        // Validación del campo de nombre
        const nombrePattern = /^[a-zA-Z\s]+$/;
        if (nombre.value.trim() === '') {
            nombre.classList.add('is-invalid');
            nombre.classList.remove('is-valid');
            nombreError.innerText = 'El nombre es obligatorio';
            valid = false;
        } else if (!nombrePattern.test(nombre.value.trim())) {
            nombre.classList.add('is-invalid');
            nombre.classList.remove('is-valid');
            nombreError.innerText = 'El nombre solo puede contener letras y espacios';
            valid = false;
        } else {
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            nombreError.innerText = '';
        }

        // Validación del campo de celular
        let celularPattern = /^[76][0-9]{7}$/;
        if (!celularPattern.test(celular.value)) {
            celular.classList.add('is-invalid');
            celular.classList.remove('is-valid');
            celularError.innerText = 'Debe ingresar un número de celular válido (8 dígitos).';
            valid = false;
        } else {
            celular.classList.remove('is-invalid');
            celular.classList.add('is-valid');
            celularError.innerText = '';
        }

        // Prevenir el envío del formulario si hay errores
        if (!valid) {
            event.preventDefault();
        }
    });

    document.getElementById('resetBtn').addEventListener('click', function() {
        nombre.classList.remove('is-invalid', 'is-valid');
        celular.classList.remove('is-invalid', 'is-valid');
        nombreError.innerText = '';
        celularError.innerText = '';
    });

    nombre.addEventListener('input', function() {
        const nombrePattern = /^[a-zA-Z\s]+$/;

        if (nombre.value.trim() === '') {
            nombre.classList.add('is-invalid');
            nombre.classList.remove('is-valid');
            nombreError.innerText = 'El nombre es obligatorio';
        } else if (!nombrePattern.test(nombre.value.trim())) {
            nombre.classList.add('is-invalid');
            nombre.classList.remove('is-valid');
            nombreError.innerText = 'El nombre solo puede contener letras y espacios';
        } else {
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            nombreError.innerText = '';
        }
    });

    celular.addEventListener('input', function() {
        let celularPattern = /^[76][0-9]{7}$/;

        if (!celularPattern.test(celular.value)) {
            celular.classList.add('is-invalid');
            celular.classList.remove('is-valid');
            celularError.innerText = 'Debe ingresar un número de celular válido (8 dígitos).';
        } else {
            celular.classList.remove('is-invalid');
            celular.classList.add('is-valid');
            celularError.innerText = '';
        }
    });
});

