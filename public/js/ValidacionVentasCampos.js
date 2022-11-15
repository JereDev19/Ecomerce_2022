//todo:  FORMS DE AÑADIR 

/*
 ! Elementos para añadir Punto de Venta*/ 
const formAPuntoVenta = document.getElementById('addSalesLocation');
const inputsAPuntoVenta = document.querySelectorAll('#addSalesLocation input');
const btnAPuntoVenta = document.getElementById('btnAñadirPuntoVenta');

/*
 ! Elementos para añadir vendedor*/
const formAVendedor = document.getElementById('addSeller');
const inputsAVendedor = document.querySelectorAll('#addSeller input');
const btnAVendedor = document.getElementById('btnAñadirVendedor');



//todo:  FORMS DE REMOVER

/*
 ! Elementos para remover Punto de Venta*/ 
const formRPuntoVenta = document.getElementById('removeSalesLocation');
const inputsRPuntoVenta = document.querySelectorAll('#removeSalesLocation input');
const btnRPuntoVenta = document.getElementById('btnRemoverPuntoVenta');

/*Elementos para remover vendedor*/
const formRVendedor = document.getElementById('removeSeller');
const inputsRVendedor = document.querySelectorAll('#removeSeller input');
const btnRVendedor = document.getElementById('btnRemoverVendedor');


//todo:  FORMS DE ACTUALIZAR

// --- Acceso

/*
 ! Elementos para actualizar Punto de Venta*/ 
const formActAccesoPuntoVenta = document.getElementById('validateSalesLocation');
const inputsActAccesoPuntoVenta = document.querySelectorAll('#validateSalesLocation input');
const btnActAccesoPuntoVenta = document.getElementById('validateSalesLocationButton');

/*
 ! Elementos para remover Vendedor*/
const formActAccesoVendedor = document.getElementById('validateSeller');
const inputsActAccesoVendedor = document.querySelectorAll('#validateSeller input');
const btnActAccesoVendedor = document.getElementById('validateSellerButton');




// todo: EXPRESIONES GLOBALES
const expresionesS = {
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  postal: /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}/,
  numeros: /^[0-9]+$/,
  direccion: /^[A-Za-z0-9'\.\-\s\,]/,
  letrasYnumeros: /^[A-Z0-9 _]*[A-Z0-9]*[A-Z0-9 _]*/,
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
}


/*------CAMPOS AÑADIR*/

const camposAPuntoVenta = {
  AddDireccionPuntoVenta: false,
  AddDireccion2PuntoVenta: false,
  AddCiudadPuntoVenta: false,
  AddPostalPuntoVenta: false
}

const camposAVendedor = {
  AddCorreoVendedor: false,
  AddNombreEmpresaVendedor: false
}


/*------CAMPOS REMOVER*/

const camposRPuntoVenta = {
  ReIdPuntoVenta: false
}

const camposRVendedor = {
  ReIdVendedor: false
}


/*------CAMPOS ACTUALIZAR*/ 

// ----- Campos Acceso

const camposActAccesoPuntoVenta = {
  ActAccesoPuntoVenta: false
}

const camposActAccesoVendedor = {
  ActAccesoVendedor: false
}



const validarFormulario = (e) => {
 

  switch(e.target.name) {

    /* ---- AÑADIR ---- */ 
    
    // ----  Añadir Punto de Venta 
    case 'AddDireccionPuntoVenta':
      validarCamposAPuntoVenta(expresionesS.direccion, e.target, 'AddDireccionPuntoVenta');
    break;

    case 'AddDireccion2PuntoVenta':
      validarCamposAPuntoVenta(expresionesS.direccion, e.target, 'AddDireccion2PuntoVenta');
    break;

    case 'AddCiudadPuntoVenta':
      validarCamposAPuntoVenta(expresionesS.letrasYnumeros, e.target, 'AddCiudadPuntoVenta');
    break;

    case 'AddPostalPuntoVenta':
      validarCamposAPuntoVenta(expresionesS.postal, e.target, 'AddPostalPuntoVenta');
    break;



    // ----  Añadir Vendedor
    case 'AddCorreoVendedor':
      validarCamposAVendedor(expresionesS.correo, e.target, 'AddCorreoVendedor');
    break;

    case 'AddNombreEmpresaVendedor':
      validarCamposAVendedor(expresionesS.nombre, e.target, 'AddNombreEmpresaVendedor');
    break;



    /* ---- REMOVER ---- */ 

    // ----  Remover Punto de Venta 
    case 'ReIdPuntoVenta':
      validarCamposRPuntoVenta(expresionesS.letrasYnumeros, e.target, 'ReIdPuntoVenta');
    break;

    // ----  Remover Vendedor
    case 'ReIdVendedor':
      validarCamposRVendedor(expresionesS.letrasYnumeros, e.target, 'ReIdVendedor');
    break;



    /* ---- ACTUALIZAR - Acceso ---- */

    // ---- Actualizar Punto de Venta
    case 'ActAccesoPuntoVenta':
      validarCamposActAccesoPuntoVenta(expresionesS.letrasYnumeros, e.target, 'ActAccesoPuntoVenta');
    break;

    // ---- Actualizar Vendedor
    case 'ActAccesoVendedor':
      validarCamposActAccesoVendedor(expresionesS.letrasYnumeros, e.target, 'ActAccesoVendedor');
    break;
  }

}

// TODO: -------------VALIDACION DE CAMPO - AÑADIR---------------------------------*/

// todo: Añadir ---------

// ! Add Punto de venta ---
const validarCamposAPuntoVenta = (expresionesS, inputValValidarAPuntoVenta, grupoCampoValidarAPuntoVenta) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAPuntoVenta, grupoCampoValidarAPuntoVenta, camposAPuntoVenta);
}
// ! Add Punto de vendedor ---
const validarCamposAVendedor = (expresionesS, inputValValidarAVendedor, grupoCampoValidarAVendedor) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAVendedor, grupoCampoValidarAVendedor, camposAVendedor);
}

// todo: Remover ---------

// ! Remove Punto de venta ---
const validarCamposRPuntoVenta = (expresionesS, inputValValidarRPuntoVenta, grupoCampoValidarRPuntoVenta) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRPuntoVenta, grupoCampoValidarRPuntoVenta, camposRPuntoVenta);
}
// ! Remove vendedor
const validarCamposRVendedor = (expresionesS, inputValValidarRVendedor, grupoCampoValidarRVendedor) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRVendedor, grupoCampoValidarRVendedor, camposRVendedor);
}

// todo: Actualizar ---------

// ! Actualizar Punto de venta --
const validarCamposActAccesoPuntoVenta = (expresionesS, inputValValidarActAccesoPuntoVenta, grupoCampoValidarActAccesoPuntoVenta) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoPuntoVenta, grupoCampoValidarActAccesoPuntoVenta, camposActAccesoPuntoVenta);
}

// ! Actualizar Vendedor -- 
const validarCamposActAccesoVendedor = (expresionesS, inputValValidarActAccesoVendedor, grupoCampoValidarActAccesoVendedor) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoVendedor, grupoCampoValidarActAccesoVendedor, camposActAccesoVendedor);
}


/*
TODO: -----------------------------------------------------------AÑADIR - BOTON FINAL-----------------------------------------------------------*/

// * BOTON AÑADIR

// ? PUNTO DE VENTA
ButtonManager.registerButtonClickEvent(btnAPuntoVenta, () => {
  validateValues(camposAPuntoVenta.AddDireccionPuntoVenta && camposAPuntoVenta.AddDireccion2PuntoVenta && camposAPuntoVenta.AddCiudadPuntoVenta && camposAPuntoVenta.AddPostalPuntoVenta, 'AccesoAñadirPuntoVentaErr') ? fetchPost('addSalesLocation', 'response', 'Saleslocation', true, "validateAddSalesLocation", null) : null;
});

// ? VENDEDOR
ButtonManager.registerButtonClickEvent(btnAVendedor, () => {
  validateValues(camposAVendedor.AddCorreoVendedor && camposAVendedor.AddNombreEmpresaVendedor, 'AccesoAñadirVendedorErr') ? fetchPost('addSeller', 'response', 'Seller', true, 'validateAddSalesSeller', null) : null;
});



// * BOTON REMOVER

// ? PUNTO DE VENTA
ButtonManager.registerButtonClickEvent(btnRPuntoVenta, () => {
  validateValues(camposRPuntoVenta.ReIdPuntoVenta, 'AccesoRemoverPuntoVentaErr') ? fetchPost('removeSalesLocation', 'response', 'Saleslocation', true, 'validateRemoveSalesLocation', null) : null;
});

// ? VENDEDOR
ButtonManager.registerButtonClickEvent(btnRVendedor , () => {
  validateValues(camposRVendedor.ReIdVendedor, 'AccesoRemoverVendedorErr') ? fetchPost('removeSeller', 'response', 'Seller', true, 'validateRemoveSalesSeller', null) : null;
});


// * BOTON ACTUALIZAR

// ? PUNTO DE VENTA
ButtonManager.registerButtonClickEvent(btnActAccesoPuntoVenta, () => {
  validateValues(camposActAccesoPuntoVenta.ActAccesoPuntoVenta, 'AccesoActPuntoVentaErr') ? fetchPost('validateSalesLocation', 'response', 'Saleslocation', true, 'validateUpdateLocationAcceso', null) : null;
});
// ? VENDEDOR
ButtonManager.registerButtonClickEvent(btnActAccesoVendedor, () => {
  validateValues(camposActAccesoVendedor.ActAccesoVendedor, 'AccesoActVendedorErr') ? fetchPost('validateSeller', 'response', 'Seller', true, 'validateUpdateSellerAcceso', null) : null;
});


/*Por cada formulario hay que hacer esto*/

// --------FORM DE AÑADIR

// TODO: verification to call to method of validation 

// ! AÑADIR

// * ------- FORM DE AÑADIR PUNTO DE VENTA
registerInputEvents(inputsAPuntoVenta);

// * ------- FORM DE AÑADIR PUNTO DE VENDEDOR
registerInputEvents(inputsAVendedor)


// ! REMOVER

// * ------- FORM DE REMOVER PUNTO DE VENTA
registerInputEvents(inputsRPuntoVenta);

// * ------- FORM DE REMOVER PUNTO DE VENDEDOR
registerInputEvents(inputsRVendedor);


// ! REMOVER

// * ------- FORM DE ACTUALIZAR PUNTO DE VENTA
registerInputEvents(inputsActAccesoPuntoVenta);

// * ------- FORM DE ACTUALIZAR PUNTO DE VENDEDOR
registerInputEvents(inputsActAccesoVendedor);



/* ------ Validar datos de la database */

//AÑADIR PUNTO DE VENTA
function validateAddSalesLocation(response){
  let a = validateDatabaseData(response, formAPuntoVenta, "formulario_mensaje-AñadirPuntoDeVentaSuccess", "formulario_mensaje-AñadirPuntoDeVentaError");
  if(a) $("#contadorPuntosDeVenta").html(Number($("#contadorPuntosDeVenta").text())+1);
}

//AÑADIR VENDEDOR
function validateAddSalesSeller(response){
  let a = validateDatabaseData(response, formAVendedor, "formulario_mensaje-AñadirVendedorSuccess", "formulario_mensaje-AñadirVendedorError");
  if(a) $("#contadorVendedores").html(Number($("#contadorVendedores").text())+1);
}

//REMOVER PUNTO DE VENTA
function validateRemoveSalesLocation(response){
  let a = validateDatabaseData(response, formRPuntoVenta, "formulario_mensaje-RemoverPuntoDeVentaSuccess", "formulario_mensaje-RemoverPuntoDeVentaError");
  if(a) $("#contadorPuntosDeVenta").html(Number($("#contadorPuntosDeVenta").text())-1);
}

//REMOVER VENDEDOR
function validateRemoveSalesSeller(response){
  let a = validateDatabaseData(response, formRVendedor, "formulario_mensaje-RemoverVendedorSuccess", "formulario_mensaje-RemoverVendedorError");
  if(a) $("#contadorVendedores").html(Number($("#contadorVendedores").text())-1);
}

//ACTUALIZAR PUNTO DE VENTA
function validateUpdateLocationAcceso(response){
  let a = validateDatabaseData(response, formActAccesoPuntoVenta, "", "formulario_mensaje-ActualizarBuscarPuntosDeVentaError", "msg");
  if(a != "Error."){
    validateSalesLocation(a);
  }
}

//ACTUALIZAR VENDEDOR
function validateUpdateSellerAcceso(response){
  let a = validateDatabaseData(response, formActAccesoVendedor, "", "formulario_mensaje-ActualizarBuscarVendedorError", "msg");
  if(a != "Error."){
    validateSeller(a);
  }
}

/** FORM DE ACTUALIZAR Y MENSAJES */

//ACTUALIZAR PUNTO DE VENTA
function updateSalesLocationVerify(response){
  let a = validateDatabaseData(response, formActAccesoPuntoVenta, "formulario_mensaje-ActualizarSalesLocationSuccess", "formulario_mensaje-ActualizarSalesLocationError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("SalesLocation");
  }
}

//ACTUALIZAR Vendedor
function updateSellerVerify(response){
  let a = validateDatabaseData(response, formActAccesoVendedor, "formulario_mensaje-ActualizarSellerSuccess", "formulario_mensaje-ActualizarSellerError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Seller");
  }
}