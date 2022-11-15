class PaginatedTable{

  tabla = undefined;
  listaVariables = [];
  paginaActual = 1;
  paginaMaxima = 1;
  datosTabla = [];
  datos = [];
  botonBorrar;
  botonActualizar;

  constructor(nomenclatura, controlador, response, listaVariables, tabla, botonBorrar = true, botonActualizar = true){
    this.nomenclatura = nomenclatura;
    this.controlador = controlador;
    this.listaVariables = listaVariables;
    this.tabla = tabla;
    this.botonBorrar = botonBorrar;
    this.botonActualizar = botonActualizar;

    let data = JSON.parse(response);

    //En caso de que la tabla esté vacía no continúa con la creación de la misma.
    if(data == "Null."){
      return;
    }

    this.paginaMaxima = data[0];
  
    data.shift(); //Borra el primer valor.
  
    this.setDataInTable(JSON.stringify(data));
  
    let listaPaginas = document.getElementById("listaPaginasTabla"+this.getNomenclatura());
  
    for(let i=this.paginaMaxima;i>0;i--){
      let pagina = i;
      listaPaginas.insertBefore(htmlToElement('<li class="page-item" id="pagina'+pagina+this.getNomenclatura()+'" ><a class="page-link tabla'+this.getNomenclatura()+'Page" id="pagina'+this.getNomenclatura()+pagina+'">'+pagina+'</a></li>'), listaPaginas.children[1]);
    }
  
    document.getElementById("pagina"+this.getCurrentPage()+this.getNomenclatura()).classList.add("active");
  
    let elements = document.getElementsByClassName("tabla"+this.getNomenclatura()+"Page");
  
    Array.from(elements).forEach( (element) => {
      this.registerButtonEvent(element, this.pageClickButton);
    });

    this.registerButtonEvent(document.getElementById('paginaSiguiente'+this.getNomenclatura()), this.setNextPage);
    this.registerButtonEvent(document.getElementById('paginaPrevia'+this.getNomenclatura()), this.setPreviousPage);
  }

  //Id del boton y función.
  registerButtonEvent(button, func){
    button.addEventListener('click', func.bind(this));
  }

  pageClickButton(event){
    let elementId = event.srcElement.id;
    
    let pageNumber = elementId.substr(8);
    if(pageNumber != this.getCurrentPage()) this.setPage(pageNumber);
  }

  setNextPage(){
    let siguientePag = this.getCurrentPage()+1;
    if(siguientePag <= this.paginaMaxima){
      this.setPage(siguientePag);
    }
  }

  setPreviousPage(){
    let paginaPrevia = this.getCurrentPage()-1;
    if(paginaPrevia >= 1){
      this.setPage(paginaPrevia);
    }
  }

  getCurrentPage(){
    return this.paginaActual;
  }

  setListeners(){
    if(this.botonBorrar){
      let elements = document.getElementsByClassName("botonBorrar"+this.getNomenclatura());
  
      Array.from(elements).forEach( (element) => {
        this.registerButtonEvent(element, this.deleteElement);
      });
    }
  
    if(this.botonActualizar){
      let elements = document.getElementsByClassName("botonActualizar"+this.getNomenclatura());
  
      Array.from(elements).forEach( (element) => {
        this.registerButtonEvent(element, this.updateElement);
      });
    }
  }

  setLocalDataInTable(){
    let data = this.datosTabla[this.getCurrentPage()];
  
    this.tabla.tBodies[0].innerHTML = ""; //Limpia la tabla
  
    for(let i = 0;i<data.length; i++){
      let datosTabla = data[i];
      this.tabla.tBodies[0].insertRow(-1).innerHTML = datosTabla;
    }
  
    this.setListeners();
  }

  setPage(page, forceLoad = false){
    document.getElementById("pagina"+this.getCurrentPage()+this.getNomenclatura()).classList.remove("active");
  
    this.paginaActual = Number(page);
  
    if((this.datosTabla[page] != null) && !forceLoad){
      this.setLocalDataInTable();
    }else{
      let funcion = 'List'+this.getController()+"sAdmin";
      fetchPost(funcion, 'response', this.getController(), true, "setDataInTable"+this.getNomenclatura(), {'Page': this.getCurrentPage()});
    }
    
    document.getElementById("pagina"+this.getCurrentPage()+this.getNomenclatura()).classList.add("active");
  }

  setDataInTable(response){

    let listaVariables = this.listaVariables;

    let data = JSON.parse(response);

    if(data == null || data == "Null."){
      this.tabla.tBodies[0].innerHTML = ""; //Limpia la tabla
      return;
    }

    let counter = this.getCurrentPage();

    this.tabla.tBodies[0].innerHTML = ""; //Limpia la tabla
  
    let datosCompletosTabla = [];
    let datosCompletos = [];
  
    for(let i = 0; i<data.length; i++){
      let position = ((counter*5)-5)+(i+1);

      let datosTabla = '<tr> <th scope="row">'+position+'</th>';
      let datos = '';

      for(let z = 0; z<listaVariables.length; z++){
        let datoAObtener = listaVariables[z];

        if(datoAObtener.includes('-')){

          let datosConcatenados = "";
          let datosConcatenadosData = "";

          datoAObtener = datoAObtener.split('-');
          datoAObtener.forEach(element => {
            datosConcatenados += data[i][element]+" ";
            datosConcatenadosData += element+":"+data[i][element]+"-";
          });

          datosTabla += '<td>'+datosConcatenados+'</td>';
          datos += datosConcatenadosData+"-";
        }else{
          datosTabla +='<td>'+data[i][listaVariables[z]]+'</td>';
          datos += datoAObtener+":"+data[i][listaVariables[z]]+"-";
        }
      }

      let primaryKey = data[i][listaVariables[0]]; //El primero en la posición debería ser la clave primaria.

      datosTabla +='<td> <div class="btn-group">';
      
      if(this.botonBorrar){
        datosTabla += '<a><i class="fas fa-solid fa-trash text-success botonBorrar'+this.getNomenclatura()+' hoverable" id="borrar'+this.getNomenclatura()+'-'+i+'"></i></a>'; //BOTON BORRAR
      }
      if(this.botonActualizar){
        datosTabla += '<a><i class="fas fa-solid fa-link text-success mx-4 botonActualizar'+this.getNomenclatura()+' hoverable" id="actualizar'+this.getNomenclatura()+'-'+primaryKey+'"></i></a>' //BOTON ACTUALIZAR
      }

      datosTabla += '</div> </td> </tr>';

      this.tabla.tBodies[0].insertRow(-1).innerHTML = datosTabla;
  
      datosCompletosTabla[i] = datosTabla;
      datosCompletos[i] = datos;

    }
  
    this.datosTabla[counter] = datosCompletosTabla;
    this.datos[counter] = datosCompletos;
  
    this.setListeners();
  }

  deleteElement(event, formId, primaryKeyName){
    let elementId = event.srcElement.id;

    let elementPosInArray = elementId.substr(9);
    let elementInArray = this.datos[this.getCurrentPage()][elementPosInArray];
    let dataInArray = elementInArray.split("-");

    if(typeof primaryKeyName === "string"){

      let primaryKeyVal;

      for(let element of dataInArray){
        if(element == "") continue;
  
        let data = element.split(":");
        if(data[0] === primaryKeyName){
          primaryKeyVal = data[1];
          break;
        }
      }

      fetchPost(formId, 'response', this.getController(), false, "", { [primaryKeyName]: primaryKeyVal });

    }else if(Array.isArray(primaryKeyName)){

      let amountOfKeys = primaryKeyName.length;
      let amountFound = 0;
      let primaryKeyvalues = [];

      for(let element of dataInArray){
        if(element == "") continue;

        let data = element.split(":");

        for(let i = 0; i<amountOfKeys; i++){
          if(data[0] === primaryKeyName[i]){
            amountFound++;
            primaryKeyvalues[i] = data[1];
          }
        }
      }

      if(amountFound == amountOfKeys){
        let valores = {};
        for(let i = 0; i<amountFound ; i++){
          valores[primaryKeyName[i]] = primaryKeyvalues[i];
        }

        fetchPost(formId, 'response', this.getController(), false, "", valores);
      }

    }

    this.setPage(this.getCurrentPage(), true);
  }

  updateElement(event, modalId, inputId){
    let elementId = event.srcElement.id;
      
    let elementInArray = elementId.substr(13);
    
    $("#"+modalId).modal('show');
    $("#"+inputId).val(elementInArray);

    $('#'+modalId).on('shown.bs.modal', () => {
      $('#'+inputId).focus();
    });
  }

  getNomenclatura(){
    return this.nomenclatura;
  }

  getController(){
    return this.controlador;
  }

  getListaVariables(){
    return this.listaVariables;
  }
}