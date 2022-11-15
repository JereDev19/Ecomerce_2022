<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de ingrediente
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class IngredientModel extends Model{

  private string $id;
  private string $name;
  private int $stock;
  private int $price;

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
  public function getName(): string{
    return $this->name;
  }

  /**
   * Establece el valor de el nombre.
   */ 
  public function setName(string $name): void{
    $this->name = $name;
  }

  /**
   * Obtiene la cantidad de stock.
   */ 
  public function getStock(): int{
    return $this->stock;
  }

  /**
   * Establece la cantidad de stock
   */ 
  public function setStock(int $stock): void{
    $this->stock = $stock;
  }

  /**
   * Obtiene el valor de precio.
   */ 
  public function getPrice(): int{
    return $this->price;
  }

  /**
   * Establece el valor del precio.
   */ 
  public function setPrice(int $price): void{
    $this->price = $price;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'ingredientId' => $this->getId(),
      'ingredientName' => $this->getName(),
      'ingredientStock' => $this->getStock(),
      'ingredientPrice' => $this->getPrice()
    );
        
  }
}

?>