// TODO:  FORM DE AÑADIR

/*
 ! Input para añadir usuario
*/
const formAU = document.getElementById('FormAAU');
const inputsAU = document.querySelectorAll('#FormAAU input');
const btnAU = document.getElementById('btnAAU');

/*
 ! Input para añadir modulo
*/
const formAM = document.getElementById('FormAAM');
const inputsAM = document.querySelectorAll('#FormAAM input');
const btnAM = document.getElementById('btnAAM');
const descripcion = document.getElementById('DescripciónModulos');

/*
! Input para añadir modulo
*/
const formAP = document.getElementById('FormAAP');
const inputsAP = document.querySelectorAll('#FormAAP input');
const btnAP = document.getElementById('btnAAP');



// TODO: FORMS DE REMOVER

/*
 ! Input para remover usuario
*/
const FormRU = document.getElementById('FormRRU');
const inputsRU = document.querySelectorAll("#FormRRU input");
const btnRU = document.getElementById('btnRRU');

/*
 ! Input para remover modulo
*/
const FormRM = document.getElementById('FormRRM');
const inputsRM = document.querySelectorAll("#FormRRM input");
const btnRM = document.getElementById('btnRRM');

/*
 ! Input para remover permiso
*/
const FormRP = document.getElementById('FormRRP');
const inputsRP = document.querySelectorAll("#FormRRP input");
const btnRP = document.getElementById('btnRRP');



// TODO: FORMS DE ACTUALIZAR -- Acceso

/*
 ! Input para actualizar usuario
*/
const FormACU = document.getElementById('validateUser');
const inputsACU = document.querySelectorAll("#validateUser input");
const btnACU = document.getElementById('validateUserButton');

/*
 ! Input para actualizar modulo
 */
const FormACM = document.getElementById('validateMod');
const inputsACM = document.querySelectorAll("#validateMod input");
const btnACM = document.getElementById('validateModButton');



// TODO: FORMS DE ACTUALIZAR --- Accedido

/* 
 ! Input para actualizar usuario
*/
const FormACaccedidoU = document.getElementById('updateUser');
const inputsACaccedidoU = document.querySelectorAll("#updateUser input");
const btnACaccedidoU = document.getElementById('BtnActualizarUser');

/* 
 ! Input para actualizar modulo
*/ 
const FormACaccedidoM = document.getElementById('updateMod');
const inputsACaccedidoM = document.querySelectorAll("#updateMod input");
const btnACaccedidoM = document.getElementById('BtnActualizarModulo');


// TODO: EXPRESIONES GLOBALES
const expresionesS = {
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  postal: /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}/,
  permiso: /^[A-Z0-9 .]*[A-Z0-9]*[A-Z0-9 .]*/,
  letrasYnumeros: /^[A-Z0-9 _]*[A-Z0-9]*[A-Z0-9 _]*/,
  direccion: /^[A-Za-z0-9'\.\-\s\,]/,
}



/*
TODO:   ------CAMPOS AÑADIR*/

const camposAU = {
  nameAd: false,
  surname1Ad: false,
  surname2Ad: false,
  gmailAd: false,
  passwordAd: false,
  passwordAd2: false,
  addressAd: false,
  cityAd: false,
  postalCodeAd: false
}

const camposAM = {
  nameModAd: false,
  AddDescripcionMod: false
}

const camposAP = {
  permisoAdPer: false
}


/*
TODO:   -------CAMPOS REMOVER*/

const camposRU = {
  ReEmail: false
}

const camposRM = {
  ReidMod: false
}

const camposRP = {
  permission: false
}



/*
TODO:   -------CAMPOS ACTUALIZAR - Acceso*/
const camposActualizarUser = {
  idActualizarUser: false
}

const camposActualizarMod = {
  idActualizarModulo: false
}



const validarFormulario = (e) => {
  // No todos los campos tiene una expresion especifica, si no lo hay y la validacion sirve para el que no tiene una especifica, se usa.
  /*
  ? -------------------AÑADIR------
  */

  /*
   ! Validacion - Agregar Usuarios
  */
  switch (e.target.name) {
    case 'nameAd':
      validarCampoAU(expresionesS.nombre, e.target, 'nameAd');
      //ValidarCierreAU('nameAd')
      break;

    case 'surname1Ad':
      validarCampoAU(expresionesS.nombre, e.target, 'surname1Ad');
      break;

    case 'surname2Ad':
      validarCampoAU(expresionesS.nombre, e.target, 'surname2Ad');
      break;

    case 'gmailAd':
      validarCampoAU(expresionesS.correo, e.target, 'gmailAd');
      break;

    case 'passwordAd':
      validarCampoAU(expresionesS.password, e.target, 'passwordAd');
      validarPassword2();
      break;

    case 'passwordAd2':
      validarCampoAU(expresionesS.password, e.target, 'passwordAd2')
      validarPassword2();
      break;

    case 'addressAd':
      validarCampoAU(expresionesS.direccion, e.target, 'addressAd');
      break;

    case 'cityAd':
      validarCampoAU(expresionesS.letrasYnumeros, e.target, 'cityAd');
      break;

    case 'postalCodeAd':
      validarCampoAU(expresionesS.postal, e.target, 'postalCodeAd');
      break;




    /*
     ! Validacion - Agregar modulos
    */

    case 'nameModAd':
      validarCampoAM(expresionesS.letrasYnumeros, e.target, 'nameModAd');
      //ValidarCierreAM('nameModAd');
    break;

    case 'AddDescripcionMod':
      validarCampoAM(expresionesS.letrasYnumeros, e.target, 'AddDescripcionMod');
      //ValidarCierreAM('AddDescripcionMod');
    break;




    
    /*
     ! Validacion - Agregar permisos
    */

    case 'emailAdPer':
      validarCampoAP(expresionesS.correo, e.target, 'emailAdPer');
      //ValidarCierreAP('emailAdPer');
    break;

    case 'permisoAdPer':
      validarCampoAP(expresionesS.permiso, e.target, 'permisoAdPer');
      //ValidarCierreAP('permisoAdPer');
    break;




    /*
    ? -----------------REMOVER-----------------
    */

    /*
     ! Validacion - Remover Usuarios
    */
    case 'ReEmail':
      validarCampoRU(expresionesS.correo, e.target, 'ReEmail');
      //ValidarCierreRU('ReEmail');
    break;

    /*Validacion - Remover Modulos*/
    case 'ReidMod':
      validarCampoRM(expresionesS.letrasYnumeros, e.target, 'ReidMod');
      //ValidarCierreRM('ReidMod');
    break;

    /*Validacion - Remover Permisos*/
    case 'permission':
      validarCampoRP(expresionesS.letrasYnumeros, e.target, 'permission');
      //ValidarCierreRP('permission');
    break;

    case 'emailPermiso':
      validarCampoRP(expresionesS.correo, e.target, 'emailPermiso');
      //ValidarCierreRP('emailPermiso');
    break;




    /*
    ? --------ACTUALIZAR -- Acceso-------
    */
    
    /*Actualizar User*/ 

    case 'idActualizarUser':
      validarCampoActualizarUser(expresionesS.correo, e.target, 'idActualizarUser');
    break;

   
    /*Actualizar Podulo*/ 
    case 'idActualizarModulo':
      validarCampoActualizarModulo(expresionesS.letrasYnumeros, e.target, 'idActualizarModulo');
    break;

  
  }
}


const validarPassword2 = () => {

  const inputPasword1 = document.getElementById('ContraseñaAddUser');
  const inputPasword2 = document.getElementById('ContraseñaAddUser2');

  if (inputPasword1.value !== inputPasword2.value) {
    document.getElementById(`grupo__passwordAd2`).classList.add('formulario__grupo-incorrecto');
    document.getElementById(`grupo__passwordAd2`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__passwordAd2 i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__passwordAd2 i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__passwordAd2 .formulario__input-error`).classList.add('formulario__input-error-activo');
    camposAU['ContraseñaAddUser'] = false;
  } else {
    document.getElementById(`grupo__passwordAd2`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__passwordAd2`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__passwordAd2 i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__passwordAd2 i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__passwordAd2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
    camposAU['ContraseñaAddUser'] = true;
  }

  /*Si no hay nada en el input, eliminamos todos los estilos de validacion*/
  if (inputPasword1.value == '' || inputPasword2.value == '') {
    document.getElementById(`grupo__passwordAd2`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__passwordAd2`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__passwordAd2 i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__passwordAd2 i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__passwordAd2 .formulario__input-error`).classList.remove('formulario__input-error-activo');

    document.getElementById(`grupo__passwordAd2`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__passwordAd2`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__passwordAd2 i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__passwordAd2 i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__passwordAd2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
  }
}


// todo: Añadir ---------

// ! Add User ---
const validarCampoAU = (expresionesS, inputValValidarAU, grupoCampoValidarAU) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAU, grupoCampoValidarAU, camposAU);
}

// ! Add mod ---
const validarCampoAM = (expresionesS, inputValValidarAM, grupoCampoValidarAM) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAM, grupoCampoValidarAM, camposAM);
}

// ! Add permission
const validarCampoAP = (expresionesS, inputValValidarAP, grupoCampoValidarAP) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAP, grupoCampoValidarAP, camposAP);
}



// todo: Remover ---------

// ! Remove User ---
const validarCampoRU = (expresionesS, inputValValidarRU, grupoCampoValidarRU) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRU, grupoCampoValidarRU, camposRU);
}

// ! Remover mod --- 
const validarCampoRM = (expresionesS, inputValValidarRM, grupoCampoValidarRM) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRM, grupoCampoValidarRM, camposRM);
}

// ! Remover per --- 
const validarCampoRP = (expresionesS, inputValValidarRP, grupoCampoValidarRP) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRP, grupoCampoValidarRP, camposRP);
}




// todo: Actualizar ---------

// ! Update user --- 
const validarCampoActualizarUser = (expresionesS, inputValValidarActualizarUser, grupoCampoValidarActualizarUser) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActualizarUser, grupoCampoValidarActualizarUser, camposActualizarUser);
}

// ! Update mod --- 
const validarCampoActualizarModulo = (expresionesS, inputValValidarActualizarModu, grupoCampoValidarActualizarModu) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActualizarModu, grupoCampoValidarActualizarModu, camposActualizarMod);
}




/*
TODO: -----------------------------------------------------AÑADIR - BOTON FINAL-----------------------------------------------------------*/

// * BOTON AÑADIR

// ? USER
ButtonManager.registerButtonClickEvent(btnAU, () => {
  validateValues(camposAU.nameAd && camposAU.surname1Ad && camposAU.surname2Ad && camposAU.gmailAd && camposAU.passwordAd && camposAU.passwordAd2 && camposAU.addressAd && camposAU.cityAd && camposAU.postalCodeAd, 'ErrorAddUser') ? fetchPost('FormAAU', 'response', 'User', true, "validateAddUser", null) : null;
});
// ? MOD
ButtonManager.registerButtonClickEvent(btnAM, () => {
  validateValues(camposAM.nameModAd && descripcion.value != "", 'ErrorAddMod') ? fetchPost('FormAAM', 'response', 'Module', true, "validateAddModule", null) : null;
});
// ? PER
ButtonManager.registerButtonClickEvent(btnAP, () => {
  validateValues(camposAP.permisoAdPer, 'ErrorAddPer') ? fetchPost('FormAAP', 'response', 'Permission', true, "validateAddPermission", null) : null;
});


// * BOTON REMOVER
// ? USER
ButtonManager.registerButtonClickEvent(btnRU, () => {
  validateValues(camposRU.ReEmail, 'ErrorReUser') ? fetchPost('FormRRU', 'response', 'User', true, "validateRemoveUser", null) : null;
});
// ? MOD
ButtonManager.registerButtonClickEvent(btnRM, () => {
  validateValues(camposRM.ReidMod, 'ErrorReMod') ? fetchPost('FormRRM', 'response', 'Module', true, "validateRemoveModule", null) : null;
});
// ? PER
ButtonManager.registerButtonClickEvent(btnRP, () => {
  validateValues(camposRP.permission, 'ErrorRePer') ? fetchPost('FormRRP', 'response', 'Permission', true, 'validateRemovePermission', null) : null;
});


// * BOTON ACTUALIZAR
// ? USER
ButtonManager.registerButtonClickEvent(btnACU, () => {
  validateValues(camposActualizarUser.idActualizarUser, 'ErrorActUserAcceso') ? fetchPost('validateUser', 'response', 'User', true, 'validateUpdateUserAccess', null) : null;
});
// ? MOD
ButtonManager.registerButtonClickEvent(btnACM, () => {
  validateValues(camposActualizarMod.idActualizarModulo, 'ErrorActModAcceso') ? fetchPost('validateMod', 'response', 'Module', true, 'validateUpdateModuleAccess', null) : null;
});


/*Por cada formulario hay que hacer esto*/

// --------FORM DE AÑADIR

// TODO: verification to call to method of validation 

// ! AÑADIR

// * ------- FORM DE AÑADIR USER
registerInputEvents(inputsAU);

// * ------- FORM DE AÑADIR MOD
registerInputEvents(inputsAM);

// * ------- FORM DE AÑADIR PER
registerInputEvents(inputsAP);


// ! REMOVER

// * ------- FORM DE REMOVER USER
registerInputEvents(inputsRU);

// * ------- FORM DE REMOVER MOD
registerInputEvents(inputsRM);

// * ------- FORM DE REMOVER PER
registerInputEvents(inputsRP);


// ! ACTUALIZAR

// * ------- FORM DE ACTUALIZAR USER
registerInputEvents(inputsACU);

// * ------- FORM DE ACTUALIZAR MOD
registerInputEvents(inputsACM);




/* ------ Validar datos de la database */

//AÑADIR USUARIO
function validateAddUser(response){
  let a = validateDatabaseData(response, formAU, "formulario_mensaje-AñadirUsuarioSuccess", "formulario_mensaje-AñadirUsuarioError");
  if(a) $("#contadorUsuario").html(Number($("#contadorUsuario").text())+1);
}

//AÑADIR MODULO
function validateAddModule(response){
  let a = validateDatabaseData(response, formAM, "formulario_mensaje-AñadirModuloSuccess", "formulario_mensaje-AñadirModuloError");
  if(a) $("#contadorModulo").html(Number($("#contadorModulo").text())+1);
}

//AÑADIR PERMISO
function validateAddPermission(response){
  let a = validateDatabaseData(response, formAP, "formulario_mensaje-AñadirPermisoSuccess", "formulario_mensaje-AñadirPermisoError");
  if(a) $("#contadorPermiso").html(Number($("#contadorPermiso").text())+1);
}

//REMOVER USUARIO
function validateRemoveUser(response){
  let a = validateDatabaseData(response, FormRU, "formulario_mensaje-RemoverUsuarioSuccess", "formulario_mensaje-RemoverUsuarioError");
  if(a) $("#contadorUsuario").html(Number($("#contadorUsuario").text())-1);
}

//REMOVER MODULO
function validateRemoveModule(response){
  let a = validateDatabaseData(response, FormRM, "formulario_mensaje-RemoverModuloSuccess", "formulario_mensaje-RemoverModuloError");
  if(a) $("#contadorModulo").html(Number($("#contadorModulo").text())-1);
}

//REMOVER PERMISO
function validateRemovePermission(response){
  let a = validateDatabaseData(response, FormRP, "formulario_mensaje-RemoverPermisoSuccess", "formulario_mensaje-RemoverPermisoError");
  if(a) $("#contadorPermiso").html(Number($("#contadorPermiso").text())-1);
}

//VALIDAR ACCESO USUARIO
function validateUpdateUserAccess(response){
  let a = validateDatabaseData(response, FormACU, "", "formulario_mensaje-ActualizarBuscarUsuarioError", "msg");
  if(a != "Error."){
    validateUser(a);
  }
}

//VALIDAR ACCESO MODULO
function validateUpdateModuleAccess(response){
  let a = validateDatabaseData(response, FormACM, "", "formulario_mensaje-ActualizarBuscarModuloError", "msg");
  if(a != "Error."){
    validateModule(a);
  }
}

//ACTUALIZAR USUARIO
function updateUserVerify(response){
  let a = validateDatabaseData(response, FormACaccedidoU, "formulario_mensaje-ActualizarUsuarioSuccess", "formulario_mensaje-ActualizarUsuarioError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("User");
  }
}

//ACTUALIZAR MÓDULO
function updateModuleVerify(response){
  let a = validateDatabaseData(response, FormACaccedidoM, "formulario_mensaje-ActualizarModuloSuccess", "formulario_mensaje-ActualizarModuloError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Mod");
  }
}