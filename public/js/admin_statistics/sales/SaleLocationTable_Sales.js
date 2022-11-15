class SaleLocationTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'SL';
    let controlador = 'Saleslocation';
    let listaVariables = ['salesLocationId', 'salesLocationAddress1', 'salesLocationAddress2', 'salesLocationCity', 'salesLocationPostalCode'];
    let tabla = document.getElementById('tablaDePuntosDeVenta');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'removeSalesLocation', 'salesLocationId');
    $("#contadorPuntosDeVenta").html(Number($("#contadorPuntosDeVenta").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarPuntoVenta', 'validateSalesLocationInput');
  }
}