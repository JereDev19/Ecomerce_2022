<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de permiso.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class PermissionModel extends Model{

  private string $userEmail;
  private string $permission;

  public function __construct(){}

  /**
   * Obtiene el valor del correo del usuario.
   */
  public function getUserEmail(): string{
    return $this->userEmail;
  }

  /**
   * Establece el valor del correo del usuario.
   */
  public function setUserEmail(string $userEmail): void{
    $this->userEmail = $userEmail;
  }

  /**
   * Obtiene el valor del permiso.
   */ 
  public function getPermission(): string{
    return $this->permission;
  }

  /**
   * Establece el valor del permiso.
   */ 
  public function setPermission(string $permission): void{
    $this->permission = $permission;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'userEmail' => $this->getUserEmail(),
      'permission' => $this->getPermission()
    );
        
  }
}

?>