<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de permisos.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PermissionModel;

class PermissionController extends Controller{

  private string $permissionTable = "Permissions";

  /**
   * Añade un permiso a la base de datos.
   */
  public function addPermission(PermissionModel $permissionModel): bool{

    $sql = "SELECT permission FROM $this->permissionTable WHERE userEmail = '" . $permissionModel->getUserEmail() . "' 
    AND permission = '" . $permissionModel->getPermission() . "'";

    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) return false; //Ya existe ese permiso.

    $result->free();

    $userEmail = $permissionModel->getUserEmail();
    $permission = $permissionModel->getPermission();

    $sql = "INSERT INTO $this->permissionTable VALUES(
      '$userEmail',
      '$permission'
      )";

    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un permiso de la base de datos.
   */
  public function removePermission(string $userEmail, string $permission): bool{
    $sql = "SELECT permission FROM $this->permissionTable WHERE userEmail = '" . $userEmail . "' 
    AND permission = '" . $permission . "'";

    $result = $this->connection->query($sql);

    if ($result->num_rows == 0) return false; //No existe ese permiso.

    $sql = "DELETE FROM $this->permissionTable WHERE permission = '" . $permission . "' AND userEmail = '" . $userEmail . "' ";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Muestra todos los permisos guardados de un usuario.
   */
  public function listPermissions(string $userEmail): array|null{
    $sql = "SELECT * FROM $this->permissionTable WHERE userEmail = '".$userEmail."' ";

    $result = $this->connection->query($sql);

    if ($result->num_rows == 0) return null; //No hay permisos guardados en la base de datos.

    $permissions = array();

    while ($row = $result->fetch_object('App\Models\PermissionModel')) {
      array_push($permissions, $row);
    }

    $result->free();

    return $permissions;
  }

  /**
   * Muestra todos los permisos guardados
   */
  public function listAllPermissions(int $minPos, int $maxPos){

    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->permissionTable";
    }else{
      $sql = "SELECT * FROM $this->permissionTable ORDER BY userEmail OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if ($result->num_rows == 0) return null; //No hay permisos guardados en la base de datos.

    $permissions = array();

    while ($row = $result->fetch_object('App\Models\PermissionModel')) {
      array_push($permissions, $row);
    }

    $result->free();

    return $permissions;
  }

  /**
   * Obtiene un permiso en específico.
   */
  public function getPermission(string $userEmail, string $permission): PermissionModel|null{
    $sql = "SELECT * FROM $this->permissionTable WHERE userEmail = '" . $userEmail . "' 
    AND permission = '" . $permission . "'";

    $result = $this->connection->query($sql);

    if ($result->num_rows == 0) return null; //No existe un permiso con ese id.

    $permission = $result->fetch_object('App\Models\PermissionModel');

    $result->free();

    return $permission;
  }

  public function hasPermission(string $userEmail, string $permission, \mysqli $connection = null): bool{
    $sql = "SELECT permission FROM $this->permissionTable WHERE userEmail = '" . $userEmail . "'";

    $result = null;

    if($connection == null){
      $result = $this->connection->query($sql);
    }else{
      $result = $connection->query($sql);
    }

    if($result->num_rows == 0) return false; //No tiene ningùn permiso

    $permissions = $result->fetch_array();

    foreach($permissions as $p){
      if($p == $permission) return true;
    }

    $result->free();
    return false;
  }

  /**
   * Obtiene la cantidad de permisos registrados en
   * la base de datos.
   */
  public function getPermissionsAmount(): int{
    $sql = "SELECT count(permission) FROM $this->permissionTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún permiso guardado.

    return $result->fetch_column();
  }
}
