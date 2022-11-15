<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Ingrediente.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\IngredientController;
use App\Models\IngredientModel;
use Utility\Messages\Message;

class IngredientControllerPost extends PostManager{

  private IngredientController $controller;
  
  public function __construct(IngredientController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un ingrediente.
   */
  public function addIngredient(): void{
    $ingredient = new IngredientModel();
    $ingredient->setName($_POST['AddNombreInsumo']);
    $ingredient->setStock($_POST['AddStockInsumo']);
    $ingredient->setPrice($_POST['AddPrecioInsumo']);
    $result = $this->controller->addIngredient($ingredient);
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un ingrediente.
   */
  public function removeIngredient(): void{
    $result = "";

    if(isset($_POST['ReIdInsumo'])){
      $result = $this->controller->removeIngredient($_POST['ReIdInsumo']);
    }else{
      $result = $this->controller->removeIngredient($_POST['ingredientId']);
    }

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida la existencia de un ingrediente.
   */
  public function validateIngredient(): void{
    $object = $this->controller->getIngredient($_POST['ActAccesoIngrediente']);

    $this->controller->closeConnection();
    if($object == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($object->toArray());
    }
  }

  /**
   * Actualiza un ingrediente.
   */
  public function updateIngredient(): void{
    $ingredient = new IngredientModel();
    $ingredient->setId($_POST['id']);
    $ingredient->setName($_POST['ActNombreInsumo']);
    $ingredient->setStock($_POST['ActStockInsumo']);
    $ingredient->setPrice($_POST['ActPrecioInsumo']);

    $result = $this->controller->updateIngredient($ingredient);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de ingredientes registrados.
   */
  public function ingredientCounter(): void{
    echo $this->controller->getIngredientsAmount();
  }

  /**
   * Lista los ingredientes (paginado).
   */
  public function listIngredientsAdmin(): void{
    $this->controller->paginatedTableInfo("listIngredients", "getIngredientsAmount");
  }
}