class ButtonManager{
  static btnCooldown = 0;

  /**
 * Funcion por default para validar informacion de la base de datos.
 * 
 * @param {HTMLElement} button
 * @param {Function} func
 * @param {Boolean} cooldown
 */
  static registerButtonClickEvent = (buttonId, func, cooldown = false) =>{
    buttonId.addEventListener('click', (e) => {
      e.preventDefault();

      if(cooldown){
        if(this.btnCooldown > 0) return;

        this.btnCooldown = 1;
        setTimeout(() => {
          this.btnCooldown = 0;
        }, 2500);
      }

      func();
    });
  }
}

class UserManager{

  /**
   * Establece el estado de logueado.
   */
  static setLogged(value){
    Cookies.setCookie("IsLogged", value, 1);
  }

  /**
   * Establece si es un administrador.
   */
  static setAdmin(value){
    Cookies.setCookie("IsAdmin", value, 1);
  }

  /**
   * Verifica si el usuario está logueado.
   */
  static isLogged(){
    if(Cookies.getCookie("IsLogged") == "true"){
      return true;
    }else{
      return false;
    }
  }

  /**
   * Verifica si el usuario es admin.
   */
  static isAdmin(){
    if(Cookies.getCookie("IsAdmin") == "true"){
      return true;
    }else{
      return false;
    }
  }

  /**
   * Redirecciona a la página de logueo.
   */
  static redirectToLoginPage(){
    setTimeout("location.href = '/User/login'", 1);
  }
}

/**
 * Funcion para validar valores con condición y mensaje de error.
 * 
 * @param {Boolean} condition
 * @param {String} messageId
 */
const validateValues = (condition, messageId) => {
  if (condition) {
    document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
      icono.classList.remove('formulario__grupo-correcto');
    });
    return true;
  } else {
    document.getElementById('formulario__mensaje_'+messageId).classList.add('formulario__mensaje-activo');
    setTimeout(() => {
      document.getElementById('formulario__mensaje_'+messageId).classList.remove('formulario__mensaje-activo');
    }, 5000);
    return false;
  }
}

/**
 * Funcion para registrar eventos de input para validación - Registra cada vez que se suelta la tecla y clickea fuera del input.
 * 
 * @param {NodeListOf<Element>} condition
 */
const registerInputEvents = (input) => {
  input.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
  });
}

/**
 * Función para convertir html en string a un elemento.
 * @param {String} HTML Representa un elemento.
 * @return {Element}
 */
const htmlToElement = (html) => {
  let template = document.createElement('template');
  html = html.trim(); // Never return a text node of whitespace as the result
  template.innerHTML = html;
  return template.content.firstChild;
}

/**
 * Funcion para validar campos.
 */
const validarCampoChangeGeneral = (expresionesS, inputValChange, grupoCampoChange, camposChange) => {
  if (expresionesS.test(inputValChange.value)) {
    document.getElementById(`grupo__${grupoCampoChange}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${grupoCampoChange}`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${grupoCampoChange} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    camposChange[grupoCampoChange] = true;
  } else {
    document.getElementById(`grupo__${grupoCampoChange}`).classList.add('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${grupoCampoChange}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${grupoCampoChange} .formulario__input-error`).classList.add('formulario__input-error-activo');
    camposChange[grupoCampoChange] = false;
  }

  if (inputValChange.value == '') {
    document.getElementById(`grupo__${grupoCampoChange}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${grupoCampoChange}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${grupoCampoChange} .formulario__input-error`).classList.remove('formulario__input-error-activo');

    document.getElementById(`grupo__${grupoCampoChange}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${grupoCampoChange}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${grupoCampoChange} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${grupoCampoChange} .formulario__input-error`).classList.remove('formulario__input-error-activo');
  }
}

/**
 * Función por default para devolver los inputs y labels a 0.
 * @param {string} controller
 * @param {number} timeout
 */
const resetInputsAndLabels = (controller, timeout = 3000) => {
  setTimeout(() => {
    $(".update"+controller+"Hidden").each(function() {
      $(this).hide();
    });

    $("#update"+controller+"IdParagraph").html("");
    $("#validateIdLabel"+controller+"").css("display", "block");
    $("#validate"+controller+"Input").css("display", "block");
    $("#validate"+controller+"Button").css("display", "block");
  }, timeout);
}


/**
 * Funcion por default para validar informacion de la base de datos.
 * 
 * @param {string} response 
 * @param {HTMLElement} form 
 * @param {string} icon
 * @param {string} successId
 * @param {string} errorId
 * @return {boolean}
 */
const validateDatabaseData = (response, form, successId, errorId, returnType = 'boolean') => {
  if(response == "Error."){

    document.getElementById(errorId).classList.remove('display-none');
    setTimeout(() => {
      document.getElementById(errorId).classList.add('display-none');
    },  3000);

    if(returnType == 'boolean'){
      return false;
    }else{
      return response;
    }
  }
  
  form.reset();

  if(successId != ""){
    document.getElementById(successId).classList.remove('display-none');
    setTimeout(() => {
      document.getElementById(successId).classList.add('display-none');
    },  3000);
  }

  document.querySelectorAll('.formulario__grupo-correcto').forEach((icon) => { // Bucle para eliminar iconos.
    icon.classList.remove('formulario__grupo-correcto');
  });

  if(returnType == 'boolean'){
    return false;
  }else{
    return response;
  }
}

