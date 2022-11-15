<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de recetas.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RecipeModel;

class RecipeController extends Controller{

  private string $recipesTable = "Recipes";
  /**
   * Añade una receta a la base de datos.
   */
  public function addRecipe(RecipeModel $recipe): bool{
    $recipe->setId(uniqid("rec_", true));

    $sql = "SELECT id FROM $this->recipesTable WHERE id = '".$recipe->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe una receta con ese id.

    $result->free();

    $id = $recipe->getId();
    $name = $recipe->getName();
    $description = $recipe->getDescription();
    $ingredient = $recipe->getIngredient();

    $sql = "INSERT INTO $this->recipesTable VALUES(
      '$id',
      '$name',
      '$description',
      '$ingredient'
      )";
  
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve una receta de la bd.
   */
  public function removeRecipe(string $recipeId): bool{
    $sql = "SELECT id FROM $this->recipesTable WHERE id = '".$recipeId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe una receta con ese id.

    $sql = "DELETE FROM $this->recipesTable WHERE id= '".$recipeId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Lista las recetas de la bd.
   */
  public function listRecipes(int $minPos = 0, int $maxPos = 0): array|null{
    
    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->recipesTable";
    }else{
      $sql = "SELECT * FROM $this->recipesTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No hay recetas guardadas en la bd.

    $recipes = array();

    while($row = $result->fetch_object('App\Models\RecipeModel')) {
      array_push($recipes, $row);
    }

    $result->free();

    return $recipes;
  }

  /**
   * Actualiza la información de una receta.
   */
  public function updateRecipe(RecipeModel $recipe): bool{

    $id = $recipe->getId();
    $name = $recipe->getName();
    $description = $recipe->getDescription();
    $ingredient = $recipe->getIngredient();

    $sql = "UPDATE $this->recipesTable SET
    id = '$id',
    name = '$name',
    description = '$description',
    ingredient = '$ingredient'
     WHERE id = '$id'
    ";
            
    return $this->connection->query($sql);
  }

  /**
   * Obtiene una receta específica.
   */
  public function getRecipe(string $id): RecipeModel|null{
    $sql = "SELECT * FROM $this->recipesTable WHERE id = '".$id."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe una receta con ese id.

    $recipe = $result->fetch_object('App\Models\RecipeModel');

    $result->free();

    return $recipe;
  }

  /**
   * Obtiene la cantidad de recetas registrados en
   * la base de datos.
   */
  public function getRecipesAmount(): int{
    $sql = "SELECT count(id) FROM $this->recipesTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ninguna receta guardada.

    return $result->fetch_column();
  }
}

?>