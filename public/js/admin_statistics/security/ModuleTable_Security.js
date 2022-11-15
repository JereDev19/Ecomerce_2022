class ModuleTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'MT';
    let controlador = 'Module';
    let listaVariables = ['moduleId', 'moduleName', 'moduleDescription'];
    let tabla = document.getElementById('tablaDeModulos');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'FormRRM', 'moduleId');
    $("#contadorModulo").html(Number($("#contadorModulo").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'Actualizarmodulos', 'validateModInput');
  }
}