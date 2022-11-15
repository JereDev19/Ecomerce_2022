class OrderTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'OT';
    let controlador = 'Order';
    let listaVariables = ['orderId', 'orderName', 'orderEvent', 'orderDate', 'orderPrice'];
    let tabla = document.getElementById('tablaDePedidos');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'removeOrder', 'orderId');
    $("#contadorOrden").html(Number($("#contadorOrden").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarPedido', 'validateOrderInput');
  }
}