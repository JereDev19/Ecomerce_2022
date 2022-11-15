<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de ingredientes.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IngredientModel;

class IngredientController extends Controller{

  private string $ingredientsTable = "Ingredients";

  /**
   * Añade un ingrediente a la base de datos.
   */
  public function addIngredient(IngredientModel $ingredient): bool{
    $ingredient->setId(uniqid("ing_", true));

    $sql = "SELECT id FROM $this->ingredientsTable WHERE id = '".$ingredient->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un ingrediente con ese id.

    $result->free();

    $id = $ingredient->getId();
    $name = $ingredient->getName();
    $stock = $ingredient->getStock();
    $price = $ingredient->getPrice();

    $sql = "INSERT INTO $this->ingredientsTable VALUES(
      '$id',
      '$name',
      $stock,
      $price
      )";
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un ingrediente de la base de datos.
   */
  public function removeIngredient(string $ingredientId): bool{
    $sql = "SELECT id FROM $this->ingredientsTable WHERE id = '".$ingredientId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un ingrediente con ese id.

    $sql = "DELETE FROM $this->ingredientsTable WHERE id= '".$ingredientId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Actualiza la información de un ingrediente.
   */
  public function updateIngredient(IngredientModel $ingredient): bool{

    $id = $ingredient->getId();
    $name = $ingredient->getName();
    $stock = $ingredient->getStock();
    $price = $ingredient->getPrice();

    $sql = "UPDATE $this->ingredientsTable SET
    id = '$id',
    name = '$name',
    stock = '$stock',
    price = '$price'
     WHERE id = '$id'
    ";
            
    return $this->connection->query($sql);
  }

  /**
   * Muestra una lista de ingredientes.
   */
  public function listIngredients(int $minPos = 0, int $maxPos = 0): array|null{

    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->ingredientsTable";
    }else{
      $sql = "SELECT * FROM $this->ingredientsTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No hay ingredientes en la base de datos.

    $modules = array();

    while($row = $result->fetch_object('App\Models\IngredientModel')) {
      array_push($modules, $row);
    }

    $result->free();

    return $modules;
  }

  /**
   * Obtener un ingrediente en específico.
   */
  public function getIngredient($ingredientId): IngredientModel|null{
    $sql = "SELECT * FROM $this->ingredientsTable WHERE id = '".$ingredientId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un ingrediente con ese id.

    $ingredient = $result->fetch_object('App\Models\IngredientModel');

    $result->free();

    return $ingredient;
  }

  /**
   * Obtiene la cantidad de ingredientes registrados en
   * la base de datos.
   */
  public function getIngredientsAmount(): int{
    $sql = "SELECT count(id) FROM $this->ingredientsTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún ingrediente guardado.

    return $result->fetch_column();
  }
}

?>