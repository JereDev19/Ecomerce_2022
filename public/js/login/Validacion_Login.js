/*--------------------------------------------------------------------Validación login-------------------------------------------------------------------------*/

const formLogin = document.getElementById('FormLogin');
const inputsLogin = document.querySelectorAll('#FormLogin input');
const btnLogin = document.getElementById('btnLogin');

const camposLogin = {
  usuarioLogin: false,
  correoLogin: false,
  passwordLogin: false
}

const expresionesLogin = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const validarFormLogin = (e) => {
  switch (e.target.name) {
    case 'correoLogin':
      ValidarCampoLogin(expresionesLogin.correo, e.target, e.target.name);
      break;
    case 'passwordLogin':
      ValidarCampoLogin(expresionesLogin.password, e.target, e.target.name);
      break;
  }
}

const ValidarCampoLogin = (expresionLogin, InputValLogin, GrupoCampoLogin) => {
  if (expresionLogin.test(InputValLogin.value)) {
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.remove('formulario__grupo-incorrectoL');
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.add('formulario__grupo-correctoL');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} .formulario__input-errorL`).classList.remove('formulario__input-error-activoL');
    camposLogin[GrupoCampoLogin] = true;
  } else {
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.add('formulario__grupo-incorrectoL');
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.remove('formulario__grupo-correctoL');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} .formulario__input-errorL`).classList.add('formulario__input-error-activoL');
    camposLogin[GrupoCampoLogin] = false;
  }

  /*Si no hay nada en el input, eliminamos todos los estilos de validacion*/
  if (InputValLogin.value == '') {
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.remove('formulario__grupo-incorrectoL');
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.remove('formulario__grupo-correctoL');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} .formulario__input-errorL`).classList.remove('formulario__input-error-activoL');

    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.remove('formulario__grupo-incorrectoL');
    document.getElementById(`grupo__${GrupoCampoLogin}`).classList.remove('formulario__grupo-correctoL');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${GrupoCampoLogin} .formulario__input-errorL`).classList.remove('formulario__input-error-activoL');
  }
}

inputsLogin.forEach((inputLogin) => {
  inputLogin.addEventListener('keyup', validarFormLogin);
  inputLogin.addEventListener('blur', validarFormLogin);
});

btnLogin.addEventListener('click', (e) => {
  e.preventDefault();
  if (camposLogin.correoLogin && camposLogin.passwordLogin) {
    fetchPost('FormLogin', 'response', 'User', true, 'validateLogin');
  } else {
    document.getElementById('formulario__mensajeL').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario__mensajeL').classList.add('display-none');
    }, 4000);
  }
});

function validateLogin(response) {
  if (response == "Logueado_correctamente." || response == "Logueado_correctamente. Admin") {

    formLogin.reset();
    document.getElementById('formulario_mensaje-Success').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-Success').classList.add('display-none');
    }, 3000);

    document.querySelectorAll('.formulario__grupo-correctoL').forEach((iconoLogin) => {
      iconoLogin.classList.remove('formulario__grupo-correctoL');
    });
  
    let isAdmin = response == "Logueado_correctamente. Admin" ? true : false;

    UserManager.setLogged("true");
    UserManager.setAdmin(isAdmin.valueOf());

    onLogin(isAdmin);

    setTimeout("location.href = '/'", 2000);

  } else if (response == "Usuario_invalido.") {
    document.getElementById('formulario_mensaje-ErrInfo').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-ErrInfo').classList.add('display-none');
    }, 4000);
  } else if (response == "Logueado_anteriormente.") {
    document.getElementById('formulario_mensaje-ErrLogged').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-ErrLogged').classList.add('display-none');
    }, 4000);
  }
}