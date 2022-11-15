<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de recetas.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class RecipeModel extends Model{

  private string $id;
  private string $name;
  private string $description;
  private string $ingredient;

  public function __construct(){}

  /**
    * Obtiene el valor de el id.
    */ 
  public function getId(): string{
    return $this->id;
  }

  /**
    * Establece el valor de el id.
    */ 
  public function setId(string $id): void{
    $this->id = $id;
  }

  /**
   * Obtiene el valor de el nombre.
   */ 
  public function getName():string{
    return $this->name;
  }

  /**
   * Establece el valor de el nombre.
   */ 
  public function setName(string $name): void{
    $this->name = $name;
  }

  /**
   * Obtiene el valor de la descripción.
   */ 
  public function getDescription(): string{
    return $this->description;
  }

  /**
   * Establece el valor de la descripción.
   */ 
  public function setDescription(string $description): void{
    $this->description = $description;
  }

  /**
   * Obtiene el valor de el ingrediente.
   */ 
  public function getIngredient(): string{
    return $this->ingredient;
  }

  /**
   * Establece el valor de el ingrediente.
   */ 
  public function setIngredient(string $ingredient): void{
    $this->ingredient = $ingredient;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'recipeId' => $this->getId(),
      'recipeName' => $this->getName(),
      'recipeDescription' => $this->getDescription(),
      'recipeIngredient' => $this->getIngredient()
    );
        
  }
}

?>