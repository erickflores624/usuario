document.addEventListener('DOMContentLoaded', function() {
    const form              = document.getElementById('contactForm');
    const nombre            = document.getElementById('nombre');
    const celular           = document.getElementById('celular');
    const nombreError       = document.getElementById('nombreError');
    const celularError      = document.getElementById('celularError');

    form.addEventListener('submit', function(event) {
        let valid = true;
        
        if(nombre.value.trim()==='') {
            nombre.classList.add('is-invalid');
            nombre.classList.remove('is-valid');
            nombreError.innerText = 'El nombre es obligatorio';
            valid = false;
        } else {
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            nombreError.innerText = '';
        }

        let celularPattern = /^[76][0-9]{7}$/;
        
        if (celularPattern.test(celular.value)){
            celular.classList.add('is-invalid');
            celular.classList.remove('is-valid');
            celularError.innerText = 'Debe ingresar un numero de celular valido(8 digitos).';
            valid = false;
        } else {
            celular.classList.remove('is-invalid');
            celular.classList.add('is-valid');
            celularError.innerText = '';
        }

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

        if (nombre.value.trim() === ''){
            nombre.classList.add('is-invalid');
            nombre.classList.remove('is-valid');
            nombreError.innerText = 'El nombre es obligatorio';
        } else {
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            nombreError.innerText = '';
        }
    });

    celular.addEventListener('input', function() {
        let celularPattern = /^[76][0-9]{7}$/;

        if (celularPattern.test(celular.value)){
            celular.classList.add('is-invalid');
            celular.classList.remove('is-valid');
            celularError.innerText = 'Debe ingresar un numero de celular valido(8 digitos)'
        } else {
            celular.classList.remove('is-invalid');
            celular.classList.add('is-valid');
            celularError.innerText = '';
        }
    });
});
