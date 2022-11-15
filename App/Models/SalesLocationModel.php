<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de puntos de venta.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class SalesLocationModel extends Model{

  private string $id;
  private string $address1;
  private string $address2;
  private string $city;
  private int $postal;

  public function __construct(){}

  /**
    * Obtiene el valor de el id.
    */ 
  public function getId(): string | null{
    return $this->id;
  }

  /**
    * Establece el valor de el id.
    */ 
  public function setId(string $id): void{
    $this->id = $id;
  }

  /**
   * Obtiene el valor de la dirección 1.
   */ 
  public function getAddress1(): string | null{
    return $this->address1;
  }

  /**
   * Establece el valor de la dirección 1.
   */ 
  public function setAddress1(string $address1): void{
    $this->address1 = $address1;
  }

  /**
   * Obtiene el valor de la dirección 2.
   */ 
  public function getAddress2(): string | null{
    return $this->address2;
  }

  /**
   * Establece el valor de la dirección 2.
   */ 
  public function setAddress2(string $address2): void{
    $this->address2 = $address2;
  }

  /**
   * Obtiene el valor de la ciudad.
   */ 
  public function getCity(): string | null{
    return $this->city;
  }

  /**
   * Establece el valor de la ciudad.
   */ 
  public function setCity(string $city): void{
    $this->city = $city;
  }

  /**
   * Obtiene el valor de el código postal.
   */ 
  public function getPostalCode(): int | null{
    return $this->postal;
  }

  /**
   * Establece el valor de el código postal.
   */ 
  public function setPostalCode(int $postalCode): void{
    $this->postal = $postalCode;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'salesLocationId' => $this->getId(),
      'salesLocationAddress1' => $this->getAddress1(),
      'salesLocationAddress2' => $this->getAddress2(),
      'salesLocationCity' => $this->getCity(),
      'salesLocationPostalCode' => $this->getPostalCode()
    );
        
  }

}

?>