class RecipeTable extends PaginatedTable{

  constructor(response){
    let nomenclatura = 'RT';
    let controlador = 'Recipe';
    let listaVariables = ['recipeId', 'recipeName', 'recipeDescription', 'recipeIngredient'];
    let tabla = document.getElementById('tablaDeRecetas');

    super(nomenclatura, controlador, response, listaVariables, tabla);
  }
  
  setDataInTable(response){
    super.setDataInTable(response, super.getListaVariables());
  }
  
  deleteElement(event){
    super.deleteElement(event, 'removeRecipe', 'recipeId');
    $("#contadorReceta").html(Number($("#contadorReceta").text())-1);
  }
  
  updateElement(event){
    super.updateElement(event, 'ActualizarReceta', 'validateRecipeInput');
  }
}