<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase principal para todos los modelos.
 * 
 * Fecha de modificación: 7/7/2022
 */

namespace App\Models;

abstract class Model{

  /**
    * Una función que retorna los valores del modelo
    * como un Array.
    */
  public abstract function toArray(): array;
    
}

?>