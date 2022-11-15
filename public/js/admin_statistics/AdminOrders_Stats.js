$(document).ready(() =>{
  fetchPostDefault("ProductCounter", "contadorProducto", "Product");
  fetchPostDefault("IngredientCounter", "contadorIngrediente", "Ingredient");
  fetchPostDefault("RecipeCounter", "contadorReceta", "Recipe");
  fetchPostDefault("OrderCounter", "contadorOrden", "Order");
  fetchPostDefault("EventCounter", "contadorEvento", "Event");

  //INICIALIZAR TABLAS:
  fetchPost('ListOrdersAdmin', 'response', "Order", true, "initializeOT", {'Page': 1, 'Init': true});
  fetchPost('ListProductsAdmin', 'response', "Product", true, "initializePT", {'Page': 1, 'Init': true});
  fetchPost('ListIngredientsAdmin', 'response', "Ingredient", true, "initializeIT", {'Page': 1, 'Init': true});
  fetchPost('ListRecipesAdmin', 'response', "Recipe", true, "initializeRT", {'Page': 1, 'Init': true});
  fetchPost('ListEventsAdmin', 'response', "Event", true, "initializeET", {'Page': 1, 'Init': true});
});

let tablaDeOrdenes; //OT (Order Table)
let tablaDeProductos; //PT (Product Table)
let tablaDeIngredientes; //IT (Ingredient Table)
let tablaDeRecetas; //RT (Recipe Table)
let tablaDeEventos; //ET (Event Table)

/** TABLA DE ÓRDENES */

function initializeOT(response){
  tablaDeOrdenes = new OrderTable(response);
}

function setDataInTableOT(response){
  tablaDeOrdenes.setDataInTable(response);
}

/** TABLA DE PRODUCTOS */

function initializePT(response){
  tablaDeProductos = new ProductTable(response);
}

function setDataInTablePT(response){
  tablaDeProductos.setDataInTable(response);
}

/** TABLA DE INGREDIENTES */

function initializeIT(response){
  tablaDeIngredientes = new IngredientTable(response);
}

function setDataInTableIT(response){
  tablaDeIngredientes.setDataInTable(response);
}

/** TABLA DE RECETAS */

function initializeRT(response){
  tablaDeRecetas = new RecipeTable(response);
}

function setDataInTableRT(response){
  tablaDeRecetas.setDataInTable(response);
}

/** TABLA DE EVENTOS */

function initializeET(response){
  tablaDeEventos = new EventTable(response);
}

function setDataInTableET(response){
  tablaDeEventos.setDataInTable(response);
}
