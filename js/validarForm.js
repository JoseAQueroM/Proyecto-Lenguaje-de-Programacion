const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expre = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
};

const campos = {
    usuario: false,
    pass: false,
    correo: false,
};
const validacion = (evento) => {
    switch (evento.target.name) {
        case 'usuario':
            validarTodo(expre.usuario, evento.target, 'usuario');
            break;
        case 'password':
            validarTodo(expre.password, evento.target, 'pass');
            break;
        case 'email':
            validarTodo(expre.correo, evento.target, 'correo');
            break;
    }
};
const validarTodo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .errors`).classList.remove('errors-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .errors`).classList.add('errors-activo');
        campos[campo] = false;
    }
};

inputs.forEach((input) => {
    input.addEventListener('keyup', validacion);
    input.addEventListener('blur', validacion);
});

formulario.addEventListener('submit', (evento) => {
    if (campos.usuario && campos.pass && campos.correo) {
        document.querySelector('.errors-mensaje').classList.remove('errors-mensaje-activo');
    } else {
        document.querySelector('.errors-mensaje').classList.add('errors-mensaje-activo');
        evento.preventDefault();
    }
});
