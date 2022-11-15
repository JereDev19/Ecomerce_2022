// FORMS DE MODALS

// Modal for change gmail
const formChangeGmail = document.getElementById('FormChangeGmail');
const inputsChangeGmail = document.querySelectorAll('#FormChangeGmail input');
const btnChangeGmail = document.getElementById('btnChangeGmail');

// Modal for change name
const formChangeName = document.getElementById('FormChangeName');
const inputsChangeName = document.querySelectorAll('#FormChangeName input');
const btnChangeName = document.getElementById('btnChangeName');

// Modal for change surname 1
const formChangeSurname1 = document.getElementById('FormChangeSurname1');
const inputsChangeSurname1 = document.querySelectorAll('#FormChangeSurname1 input');
const btnChangeSurname1 = document.getElementById('btnChangeSurname1');

// Modal for change surname 2
const formChangeSurname2 = document.getElementById('FormChangeSurname2');
const inputsChangeSurname2 = document.querySelectorAll('#FormChangeSurname2 input');
const btnChangeSurname2 = document.getElementById('btnChangeSurname2');

// Modal for change city
const formChangeCity = document.getElementById('FormChangeCity');
const inputsChangeCity = document.querySelectorAll('#FormChangeCity input');
const btnChangeCity = document.getElementById('btnChangeCity');

// Modal for change street
const formChangeStreet = document.getElementById('FormChangeStreet');
const inputsChangeStreet = document.querySelectorAll('#FormChangeStreet input');
const btnChangeStreet = document.getElementById('btnChangeStreet');

// Modal for change postal code
const formChangePostalCode = document.getElementById('FormChangePostalCode');
const inputsChangePostalCode = document.querySelectorAll('#FormChangePostalCode input');
const btnChangePostalCode = document.getElementById('btnChangePostalCode');

// Modal for change telephone
const formChangeTelephone = document.getElementById('FormChangeTelephone');
const inputsChangeTelephone = document.querySelectorAll('#FormChangeTelephone input');
const btnChangeTelephone = document.getElementById('btnChangeTelephone');

// Expresiones globales
const expresiones = {
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  numeros: /^[0-9]+$/,
  letrasYnumeros: /^[A-Z0-9 _]*[A-Z0-9]*[A-Z0-9 _]*/
}

/* 
 ! ------------ Campos
*/
/* 
 ? ------------ Fields for change gmail
*/
const camposChangeGmail = {
  changeGmail: false
}
/* 
 ? ------------ Fields for change name
*/
const camposChangeName = {
  changeName: false
}
/* 
 ? ------------ Fields for change surname 1
*/
const camposChangeSurname1 = {
  changeSurname1: false
}
/* 
 ? ------------ Fields for change surname 2
*/
const camposChangeSurname2 = {
  changeSurname2: false
}
/* 
 ? ------------ Fields for change city
*/
const camposChangeCity = {
  changeCity: false
}
/* 
 ? ------------ Fields for change street
*/
const camposChangeStreet = {
  changeStreet: false
}
/* 
 ? ------------ Fields for change postal code
*/
const camposChangePostalCode = {
  changePostalCode: false
}
/* 
 ? ------------ Fields for change teleplhone
*/
const camposChangeTelephone = {
  changeTelephone: false
}

const validarFormulario = (e) => {
  switch (e.target.name) {
    /*
    ! modal of changed of gmail
    */
    case 'changeGmail':
      validarCampoChangeGmail(expresiones.correo, e.target, 'changeGmail');
    break;

    /*
    ! modal of changed of name
    */
    case 'changeName':
      validarCampoChangeName(expresiones.nombre, e.target, 'changeName');
    break;

    /*
    ! modal of changed of surname 1
    */
    case 'changeSurname1':
      validarCampoChangeSurname1(expresiones.nombre, e.target, 'changeSurname1');
    break;

    /*
    ! modal of changed of surname 2
    */
    case 'changeSurname2':
      validarCampoChangeSurname2(expresiones.nombre, e.target, 'changeSurname2');
    break;

    /*
    ! modal of changed of city
    */
    case 'changeCity':
      validarCampoChangeCity(expresiones.nombre, e.target, 'changeCity');
    break;

    /*
    ! modal of changed of street
    */
    case 'changeStreet':
      validarCampoChangeStreet(expresiones.letrasYnumeros, e.target, 'changeStreet');
    break;

    /*
    ! modal of changed of postal code
    */
    case 'changePostalCode':
      validarCampoChangePostalCode(expresiones.numeros, e.target, 'changePostalCode');
    break;

    /*
    ! modal of changed of telephone
    */
    case 'changeTelephone':
      validarCampoChangeTelephone(expresiones.numeros, e.target, 'changeTelephone');
    break;
  }
}

// * Change gmail ---
const validarCampoChangeGmail = (expresionesS, inputValChangeGmail, grupoCampoChangeGmail) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeGmail, grupoCampoChangeGmail, camposChangeGmail);
}

// * Change name ---
const validarCampoChangeName = (expresionesS, inputValChangeName, grupoCampoChangeName) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeName, grupoCampoChangeName, camposChangeName);
}

// * Change surname 1 ---
const validarCampoChangeSurname1 = (expresionesS, inputValChangeSurname1, grupoCampoChangeSurname1) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeSurname1, grupoCampoChangeSurname1, camposChangeSurname1);
}

// * Change surname 2 ---
const validarCampoChangeSurname2 = (expresionesS, inputValChangeSurname2, grupoCampoChangeSurname2) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeSurname2, grupoCampoChangeSurname2, camposChangeSurname2);
}

// * Change ciudad ---
const validarCampoChangeCity = (expresionesS, inputValChangeCity, grupoCampoChangeCity) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeCity, grupoCampoChangeCity, camposChangeCity);
}

// * Change Calle ---
const validarCampoChangeStreet = (expresionesS, inputValChangeStreet, grupoCampoChangeStreet) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeStreet, grupoCampoChangeStreet, camposChangeStreet);
}

// * Change Codigo Postal ---
const validarCampoChangePostalCode = (expresionesS, inputValChangePostalCode, grupoCampoChangePostalCode) => {
  validarCampoChangeGeneral(expresionesS, inputValChangePostalCode, grupoCampoChangePostalCode, camposChangePostalCode);
}

// * Change Codigo Teléfono ---
const validarCampoChangeTelephone = (expresionesS, inputValChangeTelephone, grupoCampoChangeTelephone) => {
  validarCampoChangeGeneral(expresionesS, inputValChangeTelephone, grupoCampoChangeTelephone, camposChangeTelephone);
}




// TODO:           ----------------------------------------------BOTON FINAL---------------------------------------------------*/

// * BOTON CAMBIAR

// ? Gmail
ButtonManager.registerButtonClickEvent(btnChangeGmail, () => {
  let a = validateValues(camposChangeGmail.changeGmail, "C");
  if(a) fetchPost('FormChangeGmail', 'response', 'User', true, 'validateChangeMailUser');
});

// ? Name
ButtonManager.registerButtonClickEvent(btnChangeName, () => {
  let a = validateValues(camposChangeName.changeName, "ErrorName");
  if(a) fetchPost('FormChangeName', 'response', 'User', true, 'validateChangeNameUser');
});

// ? Surname 1
ButtonManager.registerButtonClickEvent(btnChangeSurname1, () => {
  let a = validateValues(camposChangeSurname1.changeSurname1, "ErrorApellido1");
  if(a) fetchPost('FormChangeSurname1', 'response', 'User', true, 'validateChangeSurname1User');
});

// ? Surname 2
ButtonManager.registerButtonClickEvent(btnChangeSurname2, () => {
  let a = validateValues(camposChangeSurname2.changeSurname2, "ErrorApellido2");
  if(a) fetchPost('FormChangeSurname2', 'response', 'User', true, 'validateChangeSurname2User');
});

// ? City
ButtonManager.registerButtonClickEvent(btnChangeCity, () => {
  let a = validateValues(camposChangeCity.changeCity, "ErrorCiudad");
  if(a) fetchPost('FormChangeCity', 'response', 'User', true, 'validateChangeCityUser');
});

// ? Street
ButtonManager.registerButtonClickEvent(btnChangeStreet, () =>{
  let a = validateValues(camposChangeStreet.changeStreet, "ErrorCalle");
  if(a) fetchPost('FormChangeStreet', 'response', 'User', true, 'validateChangeStreetUser');
});

// ? Postal code
ButtonManager.registerButtonClickEvent(btnChangePostalCode, () => {
  let a = validateValues(camposChangePostalCode.changePostalCode, "PostalCode");
  if(a) fetchPost('FormChangePostalCode', 'response', 'User', true, 'validateChangePostalUser');
});

// ? Telephone
ButtonManager.registerButtonClickEvent(btnChangeTelephone, () => { 
  let a = validateValues(camposChangeTelephone.changeTelephone, "ErrorTelefono");
  if(a) fetchPost('FormChangeTelephone', 'response', 'User', true, 'validateChangePhoneUser');
});



// TODO: verification to call to method of validation 

// * ------- FORM DE CHANGE GMAIL
registerInputEvents(inputsChangeGmail);

// * ------- FORM DE CHANGE NAME 
registerInputEvents(inputsChangeName);

// * ------- FORM DE CHANGE SURNAME 1
registerInputEvents(inputsChangeSurname1);

// * ------- FORM DE CHANGE SURNAME 2
registerInputEvents(inputsChangeSurname2);

// * ------- FORM DE CHANGE CIUDAD
registerInputEvents(inputsChangeCity);

// * ------- FORM DE CHANGE CALLE
registerInputEvents(inputsChangeStreet);

// * ------- FORM DE CHANGE CODIGO POSTAL
registerInputEvents(inputsChangePostalCode);

// * ------- FORM DE CHANGE TELEFONO
registerInputEvents(inputsChangeTelephone);

/** Validar cambios */

function validateChangeValueUser(response, inputId){
  if(response == "Error."){
    //Mostrar mensaje de error.
  }
  else{
    $("#"+inputId).html(response);
  }
}

//Cambios email de usuario.
function validateChangeMailUser(response){ validateChangeValueUser(response, 'userEmail'); }

//Cambios nombre de usuario.
function validateChangeNameUser(response){ validateChangeValueUser(response, 'userName'); }

//Cambios apellido1 de usuario.
function validateChangeSurname1User(response){ validateChangeValueUser(response, 'userSurname1'); }

//Cambios apellido2 de usuario.
function validateChangeSurname2User(response){ validateChangeValueUser(response, 'userSurname2'); }

//Cambios ciudad de usuario.
function validateChangeCityUser(response){ validateChangeValueUser(response, 'userCity'); }

//Cambios calle de usuario.
function validateChangeStreetUser(response){ validateChangeValueUser(response, 'userStreet'); }

//Cambios postal de usuario.
function validateChangePostalUser(response){ validateChangeValueUser(response, 'userPostal'); }

//Cambios teléfono de usuario.
function validateChangePhoneUser(response){ validateChangeValueUser(response, "userPhone"); }