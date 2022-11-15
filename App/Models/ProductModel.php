<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de productos.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class ProductModel extends Model{

  private string $id;
  private string $name;
  private int $price;
  private string $description;
  private int $discount;
  private int $rate;
  private int $stock;
  private string $module = "";
  private ?string $image = "";

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
    * Obtiene el valor de el precio.
    */ 
  public function getPrice(): int{
    return $this->price;
  }

  /**
    * Establece el valor de el precio.
    */ 
  public function setPrice(int $price): void{
    $this->price = $price;;
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
    * Obtiene el valor de el stock.
    */ 
  public function getStock(): int{
    return $this->stock;
  }

  /**
    * Establece el valor de el stock.
    */ 
  public function setStock(int $stock): void{
    $this->stock = $stock;
  }

  /**
    * Obtiene el valor de la imagen.
    */ 
  public function getImage(): ?string{
    return $this->image;
  }

  /**
    * Establece el valor de la imagen.
    */ 
  public function setImage(string $image): void{
    $this->image = $image;
  }

  /**
   * Obtiene el valor de el descuento (%).
   */ 
  public function getDiscount(): int{
    return $this->discount;
  }

  /**
   * Establece el valor de el descuento (%).
   */ 
  public function setDiscount(int $discount): void{
    $this->discount = $discount;
  }

  /**
   * Obtiene el valor de la calificación (0/5).
   */ 
  public function getRate(): int{
    return $this->rate;
  }

  /**
   * Establece el valor de la calificación (0/5).
   */ 
  public function setRate(int $rate): void{
    $this->rate = $rate;
  }

  /**
   * Obtiene el valor de el módulo al que pertenece.
   */
  public function getModule(): string{
    return $this->module;
  }

  /**
   * Establece el valor de el módulo al que pertenece.
   */
  public function setModule(string $module): void{
    $this->module = $module;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'productId' => $this->getId(),
      'productName' => $this->getName(),
      'productPrice' => $this->getPrice(),
      'productDescription' => $this->getDescription(),
      'productStock' => $this->getStock(),
      'productDiscount' => $this->getDiscount(),
      'productRate' => $this->getRate(),
      'productImage' => $this->getImage(),
      'productModule' => $this->getModule()
    );
        
  }
}

?>