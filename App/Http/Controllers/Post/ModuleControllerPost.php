<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Modulo.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\ModuleController;
use App\Models\ModuleModel;
use Utility\Messages\Message;
use Utility\Utils;

class ModuleControllerPost extends PostManager{

  private ModuleController $controller;
  
  public function __construct(ModuleController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un módulo.
   */
  public function formAAM(): void{
    $module = new ModuleModel();
    $module->setName($_POST['nameModAd']);
    $module->setDescription($_POST['AddDescripcionMod']);
    $result = $this->controller->addModule($module);
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un módulo.
   */
  public function formRRM(): void{
    $result = false;

    if(isset($_POST['ReidMod'])){
      $result = $this->controller->removeModule($_POST['ReidMod']);
    }else{
      $result = $this->controller->removeModule($_POST['moduleId']);
    }
    
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de módulos.
   */
  public function moduleCounter(): void{
    echo $this->controller->getModuleAmount();
  }

  /**
   * Valida la existencia de un módulo.
   */
  public function validateMod(): void{
    $module = $this->controller->getModule($_POST['idActualizarModulo']);

    if($module == null){
      echo Message::DatabaseFailure->message();
      $this->controller->closeConnection();
    }else{
      echo json_encode($module->toArray());
    }
  }

  /**
   * Actualiza la información de un módulo.
   */
  public function updateMod(): void{
    $module = new ModuleModel();
    $module->setId($_POST['IdModuloActualizar']);
    $module->setName($_POST['NombreModuloActualizar']);
    $module->setDescription($_POST['DescripcionModuloActualizar']);
    
    $result = $this->controller->updateModule($module);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Listado de módulos (paginado).
   */
  public function listModulesAdmin(): void{
    $this->controller->paginatedTableInfo("listModules", "getModuleAmount");
  }

  /**
   * Listado de módulos (categorías productos).
   */
  public function getModules(): void{
    $list = $this->controller->listModules();
    if($list != null){
      echo Utils::arrayToJson($list);
    }else{
      echo Message::DatabaseFailure->message();
    }
  }
}