class ProductTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'PT';
    let controlador = 'Product';
    let listaVariables = ['productId', 'productName', 'productPrice', 'productDescription', 'productStock', 'productDiscount', 'productRate', 'productImage'];
    let tabla = document.getElementById('tablaDeProductos');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'removeProduct', 'productId');
    $("#contadorUsuario").html(Number($("#contadorUsuario").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarProducto', 'validateProductInput');
  }
}