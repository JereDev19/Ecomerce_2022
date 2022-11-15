<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de módulo.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class ModuleModel extends Model{

  private string $id;
  private string $name;
  private string $description;  

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
   * Obtiene el valor de nombre.
   */ 
  public function getName(): string{
    return $this->name;
  }

  /**
   * Establece el valor de nombre.
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
   * Establece el valor de la descripción
   */ 
  public function setDescription(string $description): void{
    $this->description = $description;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'moduleId' => $this->getId(),
      'moduleName' => $this->getName(),
      'moduleDescription' => $this->getDescription()
    );
        
  }

}

?>