<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Enum para manejar mensajes generales.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace Utility\Messages;

enum Message: string{

  case DatabaseSuccess = 'database_success';
  case DatabaseFailure = 'database_failure';
  case True = 'true';
  case False = 'false';

  public function message(): string{
    return match($this){
      self::DatabaseSuccess => 'Success.',
      self::DatabaseFailure => 'Error.',
      self::True => 'True.',
      self::False => 'False.'
    };
  }
}

?>