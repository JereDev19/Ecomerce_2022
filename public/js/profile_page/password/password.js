// FORM
const formChangePassword = document.getElementById('FormChangePassword');
const inputsChangePassword = document.querySelectorAll('#FormChangePassword input');
const btnChangePassword = document.getElementById('btnChangePassword');

// Expresiones globales
const expresiones = {
  password: /^.{4,12}$/, // 4 a 12 digitos.
}
const camposActual = {
  contraseñaActual: false,
}
const camposNueva = {
  constraseñaNueva: false
}
const validarFormulario = (e) => {
  switch (e.target.name) {
    /*
    ! modal of changed of password current
    */
    case 'contraseñaActual':
      validarCampoChangePassword(expresiones.password, e.target, e.target.name);
    break;
    /*
    ! modal of changed of password new
    */
    case 'constraseñaNueva':
      validarCampoChangePassword2(expresiones.password, e.target, e.target.name);
    break;
  }
}


// * Password actual ---
const validarCampoChangePassword = (expresionesS, inputValChangeGmail, grupoCampoChangeGmail) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeGmail, grupoCampoChangeGmail, camposActual);
}
// * Password a cambiar ---
const validarCampoChangePassword2 = (expresionesS, inputValChangeGmail, grupoCampoChangeGmail) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeGmail, grupoCampoChangeGmail, camposNueva);
}


  



// TODO:           ----------------------------------------------BOTON FINAL---------------------------------------------------*/

// * BOTON CAMBIAR CONTRASEÑA

// ? Password
ButtonManager.registerButtonClickEvent(btnChangePassword, () =>{
  validateValues(camposActual.contraseñaActual && camposNueva.constraseñaNueva, "ErrorContraseña") ? fetchPost('FormChangePassword', 'response', 'User', true, "validateChangePassword", null) : null;
});


// TODO: verification to call to method of validation 

// * ------- FORM DE CHANGE PASSWORD

// Change gmail
registerInputEvents(inputsChangePassword);

function validateChangePassword(response){
  if(response == "Error."){
      
  }
  else{
    console.log("NICE.");
  }
}