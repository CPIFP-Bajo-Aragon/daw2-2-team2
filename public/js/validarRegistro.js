const form = document.getElementById("formulario");

const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    nombre: /^[a-zA-Z ]{4,16}$/,
    apellido: /^[a-zA-Z ]{4,16}$/,
    password: /^.{8,16}$/,
    nif: /^[0-9]{8}[A-Za-z]$/,
}

const campos = {
    nombre: false,
    password: false,
    apellidos: false,
    nif: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nif":
            validarCampo(expresiones.nif, e.target, 'nif');
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "apellidos":
            validarCampo(expresiones.apellido, e.target, 'apellidos');
            break;
        case "password":
            validarCampo(expresiones.password, e.target, 'password');
            break;
        case "password2":
            validarCampo(expresiones.password, e.target, 'password2'); // Validar el campo password2 con la misma expresión regular que password
            break;
    }
};

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true; // Marcar el campo como válido en el objeto campos
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false; // Marcar el campo como inválido en el objeto campos
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (campos.nombre==true && campos.nif==true && campos.password==true && campos.apellidos==true) {
        form.submit();
    } else {
        alert("Por favor, complete todos los campos correctamente.");
    }
});
