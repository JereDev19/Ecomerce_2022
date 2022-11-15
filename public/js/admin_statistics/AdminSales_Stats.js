$(document).ready(() =>{
  
  //INICIALIZAR CONTADORES:
  fetchPostDefault("SalesLocationCounter", "contadorPuntosDeVenta", "Saleslocation");
  fetchPostDefault("SellerCounter", "contadorVendedores", "Seller");

  //INICIALIZAR TABLAS:
  fetchPost('ListSaleslocationsAdmin', 'response', "Saleslocation", true, "initializeSL", {'Page': 1, 'Init': true});
  fetchPost('ListSellersAdmin', 'response', "Seller", true, "initializeST", {'Page': 1, 'Init': true});
});

let tablaDePuntosDeVenta; //SL (Sales Location Table)
let tablaDeVendedores; //ST (Sellers Table)

/** TABLA DE PUNTOS DE VENTA */

function initializeSL(response){
  tablaDePuntosDeVenta = new SaleLocationTable(response);
}

function setDataInTableSL(response){
  tablaDePuntosDeVenta.setDataInTable(response);
}

/** TABLA DE VENDEDORES */
function initializeST(response){
  tablaDeVendedores = new SellerTable(response);
}

function setDataInTableST(response){
  tablaDeVendedores.setDataInTable(response);
}