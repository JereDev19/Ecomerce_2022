class SellerTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'ST';
    let controlador = 'Seller';
    let listaVariables = ['sellerId', 'sellerCompany'];
    let tabla = document.getElementById('tablaDeVendedores');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    $("#contadorVendedores").html(Number($("#contadorVendedores").text())-1);
    super.deleteElement(event, 'removeSeller', 'sellerId');
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarVendedor', 'validateSellerInput');
  }
}