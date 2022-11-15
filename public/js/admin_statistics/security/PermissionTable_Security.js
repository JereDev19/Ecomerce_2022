class PermissionTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'PT';
    let controlador = 'Permission';
    let listaVariables = ['userEmail', 'permission'];
    let tabla = document.getElementById('tablaDePermisos');

    super(nomenclatura, controlador, response, listaVariables, tabla, true, false);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'FormRRP', ['userEmail', 'permission'])
    $("#contadorPermiso").html(Number($("#contadorPermiso").text())-1);
  }
  
  updateElement(event){
    //Actualizar permiso no existe.
  }
}