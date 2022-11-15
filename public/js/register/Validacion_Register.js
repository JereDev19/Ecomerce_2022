const formularioLR = document.getElementById('FormRegister');
const inputsLR = document.querySelectorAll('#FormRegister input');

const expresionesLR = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{7,14}$/, // 7 a 14 numeros.
  letrasYnumeros: /^[A-Z0-9 _]*[A-Z0-9]*[A-Z0-9 _]*/,
  numeros: /^[0-9]+$/,
}

/*------------------------------------------------------------------Validación registro---------------------------------------------------------------------------*/

const camposLR = {
  nombreLR: false,
  apellido1LR: false,
  apellido2LR: false,
  ciudad: false,
  calle: false,
  postal: false,
  passwordLR: false,
  correoLR: false,
  telefonoLR: false
}

/*
  ExpressionLR - Que expresion vamos a utilizar para validar.
  InputVal - El valor que sale del input (name).
  Grupocampo - Que nombre de grupo vamos a utilizar. Fijarse en el html
*/

const validarFormularioLR = (e) => {
  switch (e.target.name) {

    case 'nombreLR':
      validarCampoLR(expresionesLR.nombre, e.target, e.target.name);
      break;

    case 'apellido1LR':
      validarCampoLR(expresionesLR.nombre, e.target, e.target.name);
      break;

    case 'apellido2LR':
      validarCampoLR(expresionesLR.nombre, e.target, e.target.name);
      break;

    case 'ciudad':
      validarCampoLR(expresionesLR.letrasYnumeros, e.target, e.target.name);
      break;

    case 'calle':
      validarCampoLR(expresionesLR.letrasYnumeros, e.target, e.target.name);
      break;

    case 'postal':
      validarCampoLR(expresionesLR.numeros, e.target, e.target.name);
      break;

    case 'passwordLR':
      validarCampoLR(expresionesLR.password, e.target, e.target.name);
      validarPassword2(); // Se coloca tambien aquí ya que si la primera contraseña se cambia cuando ya se colocaron las dos, tambien se ejecutara
      break;

    case 'password2LR':
      validarPassword2();
      break;

    case 'correoLR':
      validarCampoLR(expresionesLR.correo, e.target, e.target.name);
      break;

    case 'telefonoLR':
      validarCampoLR(expresionesLR.telefono, e.target, e.target.name);
      break;
  }
}

const validarCampoLR = (expresionLR, InputVal, Grupocampo) => {
  if (expresionLR.test(InputVal.value)) {
    document.getElementById(`grupo__${Grupocampo}`).classList.remove('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__${Grupocampo}`).classList.add('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${Grupocampo} .formulario__input-errorLR`).classList.remove('formulario__input-error-activoLR');
    camposLR[Grupocampo] = true;
  } else {
    document.getElementById(`grupo__${Grupocampo}`).classList.add('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__${Grupocampo}`).classList.remove('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${Grupocampo} .formulario__input-errorLR`).classList.add('formulario__input-error-activoLR');
    camposLR[Grupocampo] = false;
  }

  /*Si no hay nada en el input, eliminamos todos los estilos de validacion*/
  if (InputVal.value == '') {
    document.getElementById(`grupo__${Grupocampo}`).classList.remove('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__${Grupocampo}`).classList.remove('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${Grupocampo} .formulario__input-errorLR`).classList.remove('formulario__input-error-activoLR');

    document.getElementById(`grupo__${Grupocampo}`).classList.remove('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__${Grupocampo}`).classList.remove('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${Grupocampo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${Grupocampo} .formulario__input-errorLR`).classList.remove('formulario__input-error-activoLR');
  }
}

const validarPassword2 = () => {

  const inputPasword1 = document.getElementById('passwordLR');
  const inputPasword2 = document.getElementById('password2LR');

  if (inputPasword1.value !== inputPasword2.value) {
    document.getElementById(`grupo__password2LR`).classList.add('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__password2LR`).classList.remove('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__password2LR i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__password2LR i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__password2LR .formulario__input-errorLR`).classList.add('formulario__input-error-activoLR');
    camposLR['passwordLR'] = false;
  } else {
    document.getElementById(`grupo__password2LR`).classList.remove('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__password2LR`).classList.add('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__password2LR i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__password2LR i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__password2LR .formulario__input-errorLR`).classList.remove('formulario__input-error-activoLR');
    camposLR['passwordLR'] = true;
  }

  /*Si no hay nada en el input, eliminamos todos los estilos de validacion*/
  if (inputPasword1.value == '' || inputPasword2.value == '') {
    document.getElementById(`grupo__password2LR`).classList.remove('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__password2LR`).classList.remove('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__password2LR i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__password2LR i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__password2LR .formulario__input-errorLR`).classList.remove('formulario__input-error-activoLR');

    document.getElementById(`grupo__password2LR`).classList.remove('formulario__grupo-incorrectoLR');
    document.getElementById(`grupo__password2LR`).classList.remove('formulario__grupo-correctoLR');
    document.querySelector(`#grupo__password2LR i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__password2LR i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__password2LR .formulario__input-errorLR`).classList.remove('formulario__input-error-activoLR');
  }
}

inputsLR.forEach((input) => {
  input.addEventListener('keyup', validarFormularioLR); // Suelta la tecla
  input.addEventListener('blur', validarFormularioLR); // Le da click fuera del input
});

const btn = document.getElementById("btnLR");

btn.addEventListener('click', (e) => {
  e.preventDefault();
  const terminosL = document.getElementById("terminosLR");
  //let response = grecaptcha.getResponse();
  if (camposLR.nombreLR && camposLR.apellido1LR && camposLR.apellido2LR && camposLR.ciudad && camposLR.calle && camposLR.postal && camposLR.passwordLR && camposLR.correoLR && camposLR.telefonoLR && terminosL.checked) {
    fetchPost('FormRegister', 'response', 'User', true, 'validateRegister');
  } else {
    document.getElementById('formulario__mensajeLR').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario__mensajeLR').classList.add('display-none');
    }, 4000);
  }
});

function validateRegister(response) {
  if (response == 'Registrado_anteriormente.') {
    document.getElementById('formulario_mensaje-ErrRegister').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-ErrRegister').classList.add('display-none');
    }, 4000);

  }else{
    formularioLR.reset();
    grecaptcha.reset();
    document.getElementById('formulario_mensaje-SuccessRegister').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-SuccessRegister').classList.add('display-none');
    }, 4000);

    document.querySelectorAll('.formulario__validacion-estadoLR').forEach((icono) => {
      icono.classList.remove('formulario__validacion-estadoLR');
    });

    setTimeout("location.href = '/User/login'", 5000);
  }
}