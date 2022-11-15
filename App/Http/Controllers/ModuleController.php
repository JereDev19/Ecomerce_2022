<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de módulos.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModuleModel;

class ModuleController extends Controller{

  private string $modulesTable = "Modules";

  /**
   * Añade un módulo a la base de datos.
   */
  public function addModule(ModuleModel $module): bool{
    $module->setId(uniqid("mod_", true));

    $sql = "SELECT id FROM $this->modulesTable WHERE id = '".$module->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un módulo con ese id.

    $result->free();

    $id = $module->getId();
    $name = $module->getName();
    $description = $module->getDescription();

    $sql = "INSERT INTO $this->modulesTable VALUES(
      '$id',
      '$name',
      '$description'
      )";
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un módulo de la base de datos.
   */
  public function removeModule(string $moduleId): bool{
    $sql = "SELECT id FROM $this->modulesTable WHERE id = '".$moduleId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un módulo con ese id.

    $sql = "DELETE FROM $this->modulesTable WHERE id= '".$moduleId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Muestra todos los módulos guardados.
   */
  public function listModules(int $minPos = 0, int $maxPos = 0): array|null{

    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->modulesTable";
    }else{
      $sql = "SELECT * FROM $this->modulesTable ORDER BY name OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existen módulos en la base de datos.

    $modules = array();

    while($row = $result->fetch_object('App\Models\ModuleModel')) {
      array_push($modules, $row);
    }

    $result->free();

    return $modules;
  }

  /**
   * Obtén un módulo en específico.
   */
  public function getModule(string $id): ModuleModel|null{
    $sql = "SELECT * FROM $this->modulesTable WHERE id = '".$id."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un módulo con ese id.

    $module = $result->fetch_object('App\Models\ModuleModel');

    $result->free();

    return $module;
  }

  /**
   * Actualiza un módulo.
   */
  public function updateModule(ModuleModel $module): bool{
    $moduleId = $module->getId();
    $moduleName = $module->getName();
    $moduleDescription = $module->getDescription();

    $sql = "UPDATE $this->modulesTable SET
    name = '$moduleName',
    description = '$moduleDescription'
    WHERE id = '$moduleId'";

    return $this->connection->query($sql);
  }

  /**
   * Obtiene la cantidad de modulos registrados en
   * la base de datos.
   */
  public function getModuleAmount(): int{
    $sql = "SELECT count(id) FROM $this->modulesTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún modulo guardado.

    return $result->fetch_column();
  }
}

?>