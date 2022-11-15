<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Receta.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\RecipeController;
use App\Models\RecipeModel;
use Utility\Messages\Message;

class RecipeControllerPost extends PostManager{

  private RecipeController $controller;
  
  public function __construct(RecipeController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade una receta.
   */
  public function addRecipe(): void{
    $recipe = new RecipeModel();
    $recipe->setName($_POST['AddNombreReceta']);
    $recipe->setDescription($_POST['AddDescripcionReceta']);
    $recipe->setIngredient($_POST['AddIngredienteReceta']);
    $result = $this->controller->addRecipe($recipe);
    
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve una receta.
   */
  public function removeRecipe(): void{
    $result = "";

    if(isset($_POST['ReIdReceta'])){
      $result = $this->controller->removeRecipe($_POST['ReIdReceta']);
    }else{
      $result = $this->controller->removeRecipe($_POST['recipeId']);
    }
    
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida una receta.
   */
  public function validateRecipe(): void{
    $object = $this->controller->getRecipe($_POST['ActAccesoReceta']);

    $this->controller->closeConnection();
    if($object == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($object->toArray());
    }
  }

  /**
   * Actualiza una receta.
   */
  public function updateRecipe(): void{
    $recipe = new RecipeModel();
    $recipe->setId($_POST['id']);
    $recipe->setName($_POST['ActNombreReceta']);
    $recipe->setDescription($_POST['description']);
    $recipe->setIngredient($_POST['AddIngredient']);

    echo "Receta actualizada";

    $result = $this->controller->updateRecipe($recipe);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de recetas registradas.
   */
  public function recipeCounter(): void{
    echo $this->controller->getRecipesAmount();
  }

  /**
   * Muestra las recetas (paginadas).
   */
  public function listRecipesAdmin(): void{
    $this->controller->paginatedTableInfo("listRecipes", "getRecipesAmount");
  }
}