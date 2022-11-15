<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de vendedor.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class SellerModel extends Model{

  private string $id;
  private string $company;

  public function __construct(){}

  /**
    * Obtiene el valor del id.
    */ 
  public function getId(): string{
    return $this->id;
  }

  /**
    * Establece el valor del id.
    */ 
  public function setId(string $id): void{
    $this->id = $id;
  }

  /**
   * Obtiene el valor de la compañia.
   */ 
  public function getCompany(): string{
    return $this->company;
  }

  /**
   * Establece el valor de la compañia.
   */ 
  public function setCompany(string $company): void{
    $this->company = $company;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'sellerId' => $this->getId(),
      'sellerCompany' => $this->getCompany()
    );
        
  }
}

?>