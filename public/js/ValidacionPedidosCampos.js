// TODO:  FORM DE AÑADIR

/*
 ! Elementos para añadir producto.*/ 
const formAP = document.getElementById('addProduct');
const inputsAP = document.querySelectorAll('#addProduct input');
const btnAP = document.getElementById('btnAP');

/*
 ! Elementos para añadir ingrediente.*/ 
const formAI = document.getElementById('addIngredient');
const inputsAI = document.querySelectorAll('#addIngredient input');
const btnAI = document.getElementById('btnAI');

/*
 ! Elementos para añadir receta.*/ 
const formAR = document.getElementById('addRecipe');
const inputsAR = document.querySelectorAll('#addRecipe input');
const btnAR = document.getElementById('btnAR');

/*
 ! Elementos para añadir pedido.*/ 
const formApe = document.getElementById('addOrder');
const inputsApe = document.querySelectorAll('#addOrder input');
const btnApe = document.getElementById('btnApe');

/*
 ! Elementos para añadir evento*/ 
const formAE = document.getElementById('addEvent');
const inputsAE = document.querySelectorAll('#addEvent input');
const btnAE = document.getElementById('btnAE');


// TODO:  FORM DE REMOVER

/*
 ! Elementos para remover producto*/ 
const formRP = document.getElementById('removeProduct');
const inputsRP = document.querySelectorAll('#removeProduct input');
const btnRP = document.getElementById('btnRP');

/*
 ! Elementos para remover ingrediente*/ 
const formRI = document.getElementById('removeIngredient');
const inputsRI = document.querySelectorAll('#removeIngredient input');
const btnRI = document.getElementById('btnRI');

/*
 ! Elementos para remover receta*/
const formRR = document.getElementById('removeRecipe');
const inputsRR = document.querySelectorAll('#removeRecipe input');
const btnRR = document.getElementById('btnRR');

/*
 ! Elementos para remover pedidos*/
const formRPe = document.getElementById('removeOrder');
const inputsRPe = document.querySelectorAll('#removeOrder input');
const btnRPe = document.getElementById('btnRPe');

/*
 ! Elementos para remover eventos*/ 
const formRE = document.getElementById('removeEvent');
const inputsRE = document.querySelectorAll('#removeEvent input');
const btnRE = document.getElementById('btnRE');

//TODO:  FORM DE ACTUALIZAR - Acceso

/*
 ! Elementos para actualizar producto - Acceso*/ 
const formValidateActP = document.getElementById('validateProduct');
const inputsValidateActP = document.querySelectorAll('#validateProduct input');
const btnValidateActP = document.getElementById('validateProductButton');

/*
 ! Elementos para actualizar ingrediente - Acceso*/ 
const formValidateActI = document.getElementById('validateIngredient');
const inputsValidateActI = document.querySelectorAll('#validateIngredient input');
const btnValidateActI = document.getElementById('validateIngredientButton');

/*
 ! Elementos para actualizar receta - Acceso*/ 
const formValidateActR = document.getElementById('validateRecipe');
const inputsValidateActR = document.querySelectorAll('#validateRecipe input');
const btnValidateActR = document.getElementById('validateRecipeButton');

/*
 ! Elementos para actualizar pedido - Acceso*/ 
const formValidateActPe = document.getElementById('validateOrder');
const inputsValidateActPe = document.querySelectorAll('#validateOrder input');
const btnValidateActPe = document.getElementById('validateOrderButton');

/*
 ! Elementos para actualizar evento - Acceso*/ 
const formValidateActE = document.getElementById('validateEvent');
const inputsValidateActE = document.querySelectorAll('#validateEvent input');
const btnValidateActE = document.getElementById('validateEventButton');


// TODO:    EXPRESIONES GLOBALES
const expresionesS = {
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  numeros: /^[0-9]+$/,
  direccion: /^[A-Za-z0-9'\.\-\s\,]/,
  letrasYnumeros: /^[A-Z0-9 _]*[A-Z0-9]*[A-Z0-9 _]*/,
  Hora: /^(\d{2}):(\d{2})$/,
  LetrasyComas: /^[A-Za-z0-9,-]+$/,
  letrasYnumerosVacio: /^[a-zA-Z\t\h]+|(^$)/
}

/*------CAMPOS AÑADIR*/
const camposAP = {
  AddnombreProducto: false,
  AddPrecioProducto: false,
  AddDescripcionProducto: false,
  AddDescuentoProducto: false,
  AddStockProducto: false,
  AddCategoriaProducto: false
}
const camposAI = {
  AddNombreInsumo: false,
  AddStockInsumo: false,
  AddPrecioInsumo: false
}
const camposAR = {
  AddNombreReceta: false,
  AddDescripcionReceta: false,
  AddIngredienteReceta: false
}
const camposApe = {
  AddNombrePedido: false,
  AddEventoPedido: false,
  AddPrecioPedido: false
}
const camposAE = {
  AddComienzoEvento: false,
  AddFinalizacionEvento: false,
  AddaddressEvento: false
}

/*------- CAMPOS REMOVER*/
const camposRP = {
  ReIdProducto: false
} 
const camposRI = {
  ReIdInsumo: false
}
const camposRR = {
  ReIdReceta: false
}
const camposRPe = {
  ReIdPedido: false
}
const camposRE = {
  ReIdEvento: false
}

/*------- CAMPOS ACTUALIZAR - ACCESO*/
const CamposAccesoActProducto = {
  ActAccesoProducto: false
}
const CamposAccesoActIngrediente = {
  ActAccesoIngrediente: false
}
const CamposAccesoActReceta = {
  ActAccesoReceta: false
}
const CamposAccesoActPedido = {
  ActAccesoPedido: false
}
const CamposAccesoActEvento = {
  ActAccesoEvento: false
}

const validarFormulario = (e) => {

  switch (e.target.name) {

    /*
    TODO:     ----  Añadir producto -----  */

    case 'AddnombreProducto':
      validarCampoAP(expresionesS.nombre, e.target, 'AddnombreProducto');
    break;
    case 'AddPrecioProducto':
      validarCampoAP(expresionesS.numeros, e.target, 'AddPrecioProducto');
    break;
    case 'AddDescripcionProducto':
      validarCampoAP(expresionesS.letrasYnumeros, e.target, 'AddDescripcionProducto');
    break;
    case 'AddDescuentoProducto':
      validarCampoAP(expresionesS.numeros, e.target, 'AddDescuentoProducto');
    break;
    case 'AddStockProducto':
      validarCampoAP(expresionesS.numeros, e.target, 'AddStockProducto');
    break;
    case 'AddCategoriaProducto':
      validarCampoAP(expresionesS.letrasYnumeros, e.target, 'AddCategoriaProducto');
    break;

    /* 
    ! -- Agregar ingrediente -- */ 
    case 'AddNombreInsumo':
      validarCampoAI(expresionesS.nombre, e.target, 'AddNombreInsumo');
    break;
    case 'AddStockInsumo':
      validarCampoAI(expresionesS.numeros, e.target, 'AddStockInsumo');
    break;
    case 'AddPrecioInsumo':
      validarCampoAI(expresionesS.numeros, e.target, 'AddPrecioInsumo');
    /* 
    ! -- Agregar recetas --*/
    case 'AddNombreReceta':
      validarCampoAR(expresionesS.nombre, e.target, 'AddNombreReceta');
    break;
    
    case 'AddDescripcionReceta':
      validarCampoAR(expresionesS.letrasYnumeros, e.target, 'AddDescripcionReceta');
    break;
    
    case 'AddIngredienteReceta':
      validarCampoAR(expresionesS.LetrasyComas, e.target, 'AddIngredienteReceta');
    break;
    /* 
    ! -- Agregar pedido --*/
    case 'AddNombrePedido':
      validarCampoAPe(expresionesS.nombre, e.target, 'AddNombrePedido');
    break;

    case 'AddEventoPedido':
      validarCampoAPe(expresionesS.nombre, e.target, e.target.name);
    break;

    case 'AddPrecioPedido':
      validarCampoAPe(expresionesS.numeros, e.target, e.target.name);
    break;

    /* 
    ! -- Agregar evento -- */ 
    case 'AddComienzoEvento':
      validarCampoAE(expresionesS.Hora, e.target, 'AddComienzoEvento');
    break;
    case 'AddFinalizacionEvento':
      validarCampoAE(expresionesS.Hora, e.target, 'AddFinalizacionEvento');
    break;
    case 'AddaddressEvento':
      validarCampoAE(expresionesS.direccion, e.target, 'AddaddressEvento');
    break;

    /* 
    TODO:     ---- REMOVER ----- */ 
    /* 
    ! ---- REMOVER PRODUCTO ----- */
    case 'ReIdProducto':
      validarCampoRP(expresionesS.letrasYnumeros, e.target, 'ReIdProducto');
    break;
    /* 
    ! ---- REMOVER INGREDIENTE ----- */ 
    case 'ReIdInsumo':
      validarCampoRI(expresionesS.letrasYnumeros, e.target, 'ReIdInsumo');
    break;
    /* 
    ! ---- REMOVER RECETA ----- */ 
    case 'ReIdReceta':
      validarCamposRR(expresionesS.letrasYnumeros, e.target, 'ReIdReceta');
    break;
    /* 
    ! ---- REMOVER PEDIDO ----- */ 
    case 'ReIdPedido':
      validarCampoRPe(expresionesS.letrasYnumeros, e.target, 'ReIdPedido')
    break;
    /* 
    ! ---- REMOVER EVENTO ----- */
    case 'ReIdEvento':
      validarCampoRE(expresionesS.letrasYnumeros, e.target, 'ReIdEvento')
    break;

    /*
    TODO: ---- ACTUALIZAR ----- */

     /* 
     !---- ACTUALIZAR PRODUCTO ----- */
     case 'ActAccesoProducto':
       validarCampoActAccesoP(expresionesS.letrasYnumeros, e.target, 'ActAccesoProducto');
     break;

     case 'ActAccesoIngrediente':
      validarCampoActAccesoI(expresionesS.letrasYnumeros, e.target, 'ActAccesoIngrediente');
     break;

     case 'ActAccesoReceta':
      validarCampoActAccesoR(expresionesS.letrasYnumeros, e.target, 'ActAccesoReceta');
     break;

     case 'ActAccesoPedido':
      validarCampoActAccesoPe(expresionesS.letrasYnumeros, e.target, 'ActAccesoPedido');
     break;

     case 'ActAccesoEvento':
      validarCampoActAccesoE(expresionesS.letrasYnumeros, e.target, 'ActAccesoEvento');
     break;
   }
}

/*
TODOS :-------------VALIDACION DE CAMPO - AÑADIR---------------------------------*/

// todo: Añadir ---------

// ! Add Product ---
const validarCampoAP = (expresionesS, inputValValidarAP, grupoCampoValidarAP) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAP, grupoCampoValidarAP, camposAP);
}
// ! Add Ingredient ---
const validarCampoAI = (expresionesS, inputValValidarAI, grupoCampoValidarAI) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAI, grupoCampoValidarAI, camposAI);
}
// ! Add Recipe ---
const validarCampoAR = (expresionesS, inputValValidarAR, grupoCampoValidarAR) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAR, grupoCampoValidarAR, camposAR);
}
// ! Add Oders ---
const validarCampoAPe = (expresionesS, inputValValidarAPe, grupoCampoValidarAPe) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAPe, grupoCampoValidarAPe, camposApe);
}
// ! Add Events ---
const validarCampoAE = (expresionesS, inputValValidarAE, grupoCampoValidarAE) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarAE, grupoCampoValidarAE, camposAE);
}

// todo: Remover ---------

// ! Remove Product ---
const validarCampoRP = (expresionesS, inputValValidarRP, grupoCampoValidarRP) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRP, grupoCampoValidarRP, camposRP);
}
// ! Remove Ingredient ---
const validarCampoRI = (expresionesS, inputValValidarRI, grupoCampoValidarRI) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRI, grupoCampoValidarRI, camposRI);
}
// ! Remove Recipe ---
const validarCamposRR = (expresionesS, inputValValidarRR, grupoCampoValidarRR) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRR, grupoCampoValidarRR, camposRR);
}
// ! Remove Oders ---
const validarCampoRPe = (expresionesS, inputValValidarRPe, grupoCampoValidarRPe) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRPe, grupoCampoValidarRPe, camposRPe);
}
// ! Remove Events ---
const validarCampoRE = (expresionesS, inputValValidarRE, grupoCampoValidarRE) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarRE, grupoCampoValidarRE, camposRE);
}

// todo: Actualizar ---------

// ! Remove Product ---
const validarCampoActAccesoP = (expresionesS, inputValValidarActAccesoP, grupoCampoValidarActAccesoP) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoP, grupoCampoValidarActAccesoP, CamposAccesoActProducto);
}
// ! Remove Ingredient ---
const validarCampoActAccesoI = (expresionesS, inputValValidarActAccesoI, grupoCampoValidarActAccesoI) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoI, grupoCampoValidarActAccesoI, CamposAccesoActIngrediente);
}
// ! Remove Recipe ---
const validarCampoActAccesoR = (expresionesS, inputValValidarActAccesoR, grupoCampoValidarActAccesoR) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoR, grupoCampoValidarActAccesoR, CamposAccesoActReceta);
}
// ! Remove Oders ---
const validarCampoActAccesoPe = (expresionesS, inputValValidarActAccesoPe, grupoCampoValidarActAccesoPe) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoPe, grupoCampoValidarActAccesoPe, CamposAccesoActPedido);
}
// ! Remove Events ---
const validarCampoActAccesoE = (expresionesS, inputValValidarActAccesoE, grupoCampoValidarActAccesoE) => {
  validarCampoChangeGeneral(expresionesS, inputValValidarActAccesoE, grupoCampoValidarActAccesoE, CamposAccesoActEvento);
}

/*
TODO: -----------------------------------------------------AÑADIR - BOTON FINAL-----------------------------------------------------------*/

// * BOTON AÑADIR


// ? PRODUCT
ButtonManager.registerButtonClickEvent(btnAP, () => {
  validateValues(camposAP.AddnombreProducto && camposAP.AddPrecioProducto && camposAP.AddDescripcionProducto && camposAP.AddDescuentoProducto && camposAP.AddStockProducto && camposAP.AddCategoriaProducto && camposAP.AddCategoriaProducto, 'ErrorAddProduct') ? fetchPost('addProduct', 'response', 'Product', true, "validateAddProduct", null) : null;
});
// ? INGREDIENT
ButtonManager.registerButtonClickEvent(btnAI, () => {
  validateValues(camposAI.AddNombreInsumo && camposAI.AddStockInsumo && camposAI.AddPrecioInsumo, 'ErrorAddIngredient') ?  fetchPost('addIngredient', 'response', 'Ingredient', true, "validateAddIngredient", null) : null;
});
// ? RECIPE
ButtonManager.registerButtonClickEvent(btnAR, () => {
  validateValues(camposAR.AddNombreReceta && camposAR.AddDescripcionReceta && camposAR.AddIngredienteReceta, 'ErrorAddRecipe') ? fetchPost('addRecipe', 'response', 'Recipe', true, "validateAddRecipe", null) : null;
});
// ? ORDER
ButtonManager.registerButtonClickEvent(btnApe, () => {
  validateValues(camposApe.AddNombrePedido && camposApe.AddPrecioPedido, 'ErrorAddOrder') ? fetchPost('addOrder', 'response', 'Order', true, "validateAddOrder", null) : null;
});
// ? EVENT
ButtonManager.registerButtonClickEvent(btnAE, () => {
  validateValues(camposAE.AddComienzoEvento && camposAE.AddFinalizacionEvento && camposAE.AddaddressEvento, 'ErrorAddEvent') ? fetchPost('addEvent', 'response', 'Event', true, "validateAddEvent", null) : null;
});




/*
TODO: -----------------------------------------------------REMOVER - BOTON FINAL-----------------------------------------------------------*/

// * BOTON REMOVER

// ? PRODUCT
ButtonManager.registerButtonClickEvent(btnRP, () => {
  validateValues(camposRP.ReIdProducto, 'ErrorReProduct') ? fetchPost('removeProduct', 'response', 'Product', true, "validateRemoveProduct", null) : null;
});
// ? INGREDIENT
ButtonManager.registerButtonClickEvent(btnRI, () => {
  validateValues(camposRI.ReIdInsumo, 'ErrorReIngredient') ? fetchPost('removeIngredient', 'response', 'Ingredient', true, "validateRemoveIngredient", null) : null;
});
// ? RECIPE
ButtonManager.registerButtonClickEvent(btnRR, () => {
  validateValues(camposRR.ReIdReceta, 'ErrorReRecipe') ? fetchPost('removeRecipe', 'response', 'Recipe', true, "validateRemoveRecipe", null) : null;
});
// ? ORDER
ButtonManager.registerButtonClickEvent(btnRPe, () => {
  validateValues(camposRPe.ReIdPedido, 'ErrorReOrder') ? fetchPost('removeOrder', 'response', 'Order', true, "validateRemoveOrder", null) : null;
});
// ? EVENT
ButtonManager.registerButtonClickEvent(btnRE, () => {
  validateValues(camposRE.ReIdEvento, 'ErrorReEvent') ? fetchPost('removeEvent', 'response', 'Event', true, "validateRemoveEvent", null) : null;
});


/*
TODO: -----------------------------------------------------ACTUALIZAR - BOTON FINAL-----------------------------------------------------------*/

// * BOTON ACTUALIZAR - Acceso

// ? PRODUCT - Acceso
ButtonManager.registerButtonClickEvent(btnValidateActP, () => {
  validateValues(CamposAccesoActProducto.ActAccesoProducto, 'ErrorActProductAcceso') ? fetchPost('validateProduct', 'response', 'Product', true, "validateUpdateProductAccess", null) : null;
});
// ? INGREDIENT - Acceso
ButtonManager.registerButtonClickEvent(btnValidateActI, () => {
  validateValues(CamposAccesoActIngrediente.ActAccesoIngrediente, 'ErrorActIngredientAcceso') ? fetchPost('validateIngredient', 'response', 'Ingredient', true, "validateUpdateIngredientAccess", null) : null;
});
// ? RECIPE - Acceso
ButtonManager.registerButtonClickEvent(btnValidateActR, () => {
  validateValues(CamposAccesoActReceta.ActAccesoReceta, 'ErrorActRecipeAcceso') ? fetchPost('validateRecipe', 'response', 'Recipe', true, "validateUpdateRecipeAccess", null) : null;
});
// ? ORDER - Acceso
ButtonManager.registerButtonClickEvent(btnValidateActPe, () => {
  validateValues(CamposAccesoActPedido.ActAccesoPedido, 'ErrorActOrderAcceso') ? fetchPost('validateOrder', 'response', 'Order', true, "validateUpdateOrderAccess", null) : null;
});
// ? EVENT - Acceso
ButtonManager.registerButtonClickEvent(btnValidateActE, () => {
  validateValues(CamposAccesoActEvento.ActAccesoEvento, 'ErrorActEventAcceso') ? fetchPost('validateEvent', 'response', 'Event', true, "validateUpdateEventAccess", null) : null;
});

/*Por cada formulario hay que hacer esto*/

// --------FORM DE AÑADIR

// TODO: verification to call to method of validation 

// ! AÑADIR

// * ------- FORM DE AÑADIR PRODUCT
registerInputEvents(inputsAP);
// * ------- FORM DE AÑADIR INGREDIENT
registerInputEvents(inputsAI);
// * ------- FORM DE AÑADIR RECIPE
registerInputEvents(inputsAR);
// * ------- FORM DE AÑADIR ORDER
registerInputEvents(inputsApe);
// * ------- FORM DE AÑADIR EVENT
registerInputEvents(inputsAE);

// ! REMOVER
// * ------- FORM DE REMOVER PRODUCT
registerInputEvents(inputsRP);
// * ------- FORM DE REMOVER INGREDIENT
registerInputEvents(inputsRI);
// * ------- FORM DE REMOVER RECIPE
registerInputEvents(inputsRR);
// * ------- FORM DE REMOVER ORDER
registerInputEvents(inputsRP);
// * ------- FORM DE REMOVER EVENT
registerInputEvents(inputsRE);

// ! ACTUALIZAR
// * ------- FORM DE ACTUALIZAR PRODUCT
registerInputEvents(inputsValidateActP);
// * ------- FORM DE ACTUALIZAR INGREDIENT
registerInputEvents(inputsValidateActI);
// * ------- FORM DE ACTUALIZAR RECIPE
registerInputEvents(inputsValidateActR);
// * ------- FORM DE ACTUALIZAR ORDER
registerInputEvents(inputsValidateActPe);
// * ------- FORM DE ACTUALIZAR EVENT
registerInputEvents(inputsValidateActE);

/* ------ Validar datos de la database */

//AÑADIR PRODUCTO
function validateAddProduct(response){
  let a = validateDatabaseData(response, formAP, "formulario_mensaje-AñadirProductoSuccess", "formulario_mensaje-AñadirProductoError");
  if(a) $("#contadorProducto").html(Number($("#contadorProducto").text())+1);
}

//AÑADIR INGREDIENTE
function validateAddIngredient(response){
  let a = validateDatabaseData(response, formAI, "formulario_mensaje-AñadirIngredienteSuccess", "formulario_mensaje-AñadirIngredienteError");
  if(a) $("#contadorIngrediente").html(Number($("#contadorIngrediente").text())+1);
}

//AÑADIR RECETA
function validateAddRecipe(response){
  let a = validateDatabaseData(response, formAR, "formulario_mensaje-AñadirRecetaSuccess", "formulario_mensaje-AñadirRecetaError");
  if(a) $("#contadorReceta").html(Number($("#contadorReceta").text())+1);
}

//AÑADIR PEDIDO
function validateAddOrder(response){
  let a = validateDatabaseData(response, formApe, "formulario_mensaje-AñadirPedidoSuccess", "formulario_mensaje-AñadirPedidoError");
  if(a) $("#contadorOrden").html(Number($("#contadorOrden").text())+1);
}

//AÑADIR EVENTO
function validateAddEvent(response){
  let a = validateDatabaseData(response, formAE, "formulario_mensaje-AñadirEventoSuccess", "formulario_mensaje-AñadirEventoError");
  if(a) $("#contadorEvento").html(Number($("#contadorEvento").text())+1);
}

//REMOVER PRODUCTO
function validateRemoveProduct(response){
  let a = validateDatabaseData(response, formRP, "formulario_mensaje-RemoverProductoSuccess", "formulario_mensaje-RemoverProductoError");
  if(a) $("#contadorProducto").html(Number($("#contadorProducto").text())-1);
}

//REMOVER INGREDIENTE
function validateRemoveIngredient(response){
  let a = validateDatabaseData(response, formRI, "formulario_mensaje-RemoverIngredienteSuccess", "formulario_mensaje-RemoverIngredienteError");
  if(a) $("#contadorIngrediente").html(Number($("#contadorIngrediente").text())-1);
}

//REMOVER RECETA
function validateRemoveRecipe(response){
  let a = validateDatabaseData(response, formRR, "formulario_mensaje-RemoverRecetaSuccess", "formulario_mensaje-RemoverRecetaError");
  if(a) $("#contadorReceta").html(Number($("#contadorReceta").text())-1);
}

//REMOVER PEDIDO
function validateRemoveOrder(response){
  let a = validateDatabaseData(response, formRPe, "formulario_mensaje-RemoverPedidoSuccess", "formulario_mensaje-RemoverPedidoError");
  if(a) $("#contadorOrden").html(Number($("#contadorOrden").text())-1);
}

//REMOVER EVENTO
function validateRemoveEvent(response){
  let a = validateDatabaseData(response, formRE, "formulario_mensaje-RemoverEventoSuccess", "formulario_mensaje-RemoverEventoError");
  if(a) $("#contadorEvento").html(Number($("#contadorEvento").text())-1);
}

//ACTUALIZAR PRODUCTO
function validateUpdateProductAccess(response){
  let a = validateDatabaseData(response, formValidateActP, "", "formulario_mensaje-ActualizarBuscarProductoError", 'msg');
  if(a != "Error."){
    validateProduct(a);
  }
}

//ACTUALIZAR INGREDIENTE
function validateUpdateIngredientAccess(response){
  let a = validateDatabaseData(response, formValidateActI, "", "formulario_mensaje-ActualizarBuscarIngredienteError", 'msg');
  if(a != "Error."){
    validateIngredient(a);
  }
}

//ACTUALIZAR RECETA
function validateUpdateRecipeAccess(response){
  let a = validateDatabaseData(response, formValidateActR, "", "formulario_mensaje-ActualizarBuscarRecetaError", 'msg');
  if(a != "Error."){
    validateRecipe(a);
  }
}

//ACTUALIZAR PEDIDO
function validateUpdateOrderAccess(response){
  let a = validateDatabaseData(response, formValidateActPe, "", "formulario_mensaje-ActualizarBuscarPedidoError", 'msg');
  if(a != "Error."){
    validateOrder(a);
  }
}

//ACTUALIZAR EVENTO
function validateUpdateEventAccess(response){
  let a = validateDatabaseData(response, formValidateActE, "", "formulario_mensaje-ActualizarBuscarEventoError", 'msg');
  if(a != "Error."){
    validateEvent(a);
  }
}

/** FORM DE ACTUALIZAR Y MENSAJES */

//ACTUALIZAR PRODUCTO
function updateProductVerify(response){
  let a = validateDatabaseData(response, formValidateActP, "formulario_mensaje-ActualizarProductoSuccess", "formulario_mensaje-ActualizarProductoError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Product");
  }
}

//ACTUALIZAR Ingrediente
function updateIngredientVerify(response){
  let a = validateDatabaseData(response, formValidateActI, "formulario_mensaje-ActualizarIngredienteSuccess", "formulario_mensaje-ActualizarIngredienteError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Ingredient");
  }
}

//ACTUALIZAR RECETA
function updateRecipeVerify(response){
  let a = validateDatabaseData(response, formValidateActR, "formulario_mensaje-ActualizarRecetaSuccess", "formulario_mensaje-ActualizarRecetaError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Recipe");
  }
}

//ACTUALIZAR PEDIDO
function updateOrderVerify(response){
  let a = validateDatabaseData(response, formValidateActPe, "formulario_mensaje-ActualizarPedidoSuccess", "formulario_mensaje-ActualizarPedidoError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Order");
  }
}

//ACTUALIZAR EVENTO
function updateEventVerify(response){
  let a = validateDatabaseData(response, formValidateActE, "formulario_mensaje-ActualizarEventoSuccess", "formulario_mensaje-ActualizarEventoError", "msg");
  if(a != "Error."){
    resetInputsAndLabels("Event");
  }
}