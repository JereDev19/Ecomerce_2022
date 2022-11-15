class IngredientTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'IT';
    let controlador = 'Ingredient';
    let listaVariables = ['ingredientId', 'ingredientName', 'ingredientStock', 'ingredientPrice'];
    let tabla = document.getElementById('tablaDeIngredientes');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'removeIngredient', 'ingredientId');
    $("#contadorIngrediente").html(Number($("#contadorIngrediente").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarInsumo', 'validateIngredientInput');
  }
}