class UserTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'UT';
    let controlador = 'User';
    let listaVariables = ['userEmail', 'userName', 'userSurName1-userSurName2'];
    let tabla = document.getElementById('tablaDeUsuarios');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'FormRRU', 'userEmail');
    $("#contadorUsuario").html(Number($("#contadorUsuario").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'Actualizarusuarios', 'validateUserInput');
  }
}