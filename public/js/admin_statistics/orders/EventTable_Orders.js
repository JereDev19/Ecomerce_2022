class EventTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'ET';
    let controlador = 'Event';
    let listaVariables = ['eventId', 'eventDate', 'eventStartTime', 'eventEndTime', 'eventAddress'];
    let tabla = document.getElementById('tablaDeEventos');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'removeEvent', 'eventId');
    $("#contadorEvento").html(Number($("#contadorEvento").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarEvento', 'validateEventInput');
  }
}