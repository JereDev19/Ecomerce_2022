<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Permiso.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\PermissionController;
use App\Models\PermissionModel;
use Utility\Messages\Message;

class PermissionControllerPost extends PostManager{

  private PermissionController $controller;
  
  public function __construct(PermissionController $controller){
    $this->controller = $controller;
  }

  /**
   * Añadir permiso.
   */
  public function formAAP(): void{
    $permission = new PermissionModel();
    $permission->setUserEmail($_POST['emailAdPer']);
    $permission->setPermission($_POST['permisoAdPer']);
    $result = $this->controller->addPermission($permission);
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remover permiso.
   */
  public function formRRP(): void{
    $result = false;
      
    if(isset($_POST['emailPermiso'])){
      $result = $this->controller->removePermission($_POST['emailPermiso'], $_POST['permission']);
    }else{
      $result = $this->controller->removePermission($_POST['userEmail'], $_POST['permission']);
    }
    
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de permisos registrados.
   */
  public function permissionCounter(): void{
    echo $this->controller->getPermissionsAmount();
  }

  /**
   * Lista los permisos (paginado).
   */
  public function listPermissionsAdmin(): void{
    $this->controller->paginatedTableInfo("listAllPermissions", "getPermissionsAmount");
  }
}