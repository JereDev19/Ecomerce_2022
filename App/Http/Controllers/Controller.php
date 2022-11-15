<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase principal para todos los controladores del programa. Maneja conexión del mismo a la base de datos.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use Libs\Database;
use mysqli;
use Utility\Utils;

abstract class Controller{

  protected mysqli $connection;

  /**
   * Constructor de la clase que conecta a la base de datos una vez creada la instancia del objeto.
   */
  public function __construct(bool $connect = true, mysqli $connection = null){
    if($connect){
      $this->connection = Database::connect();
    }else{
      if($connection != null) $this->connection = $connection;
    }
  }

  /**
   * Cierra la conexión del controlador.
   */
  public function closeConnection(): void{
    $this->connection->close();
  }

  /**
   * Obtiene la conexión previamente establecida.
   */
  public function getConnection(): mysqli{
    return $this->connection;
  }

  /**
   * Obtiene el permiso requerido para cargar el controlador.
   */
  public function getRequiredPermission(): string{
    return "";
  }

  /**
   * Define la función default() que se utiliza cuando una función no ha sido especifiada por la Url.
   */
  public function default(): string{
    header("Location: ..", true);
    return "";
  }

  /**
   * Ejecuta la lógica requerida para el paginado de un controlador.
   */
  public function paginatedTableInfo(string $dataFunc, string $maxAmountFunc): void{
    $page = $_POST['Page'];
    $minPos = ($page*5)-5; //Posicion minima del objeto.
    $maxPos = 5; //Cantidad maxima de objetos.

    $result = $this->$dataFunc($minPos, $maxPos);

    if($result == null){
      echo json_encode("Null.");
      return;
    }

    if(isset($_POST['Init'])){
      $userAmountRegistered = $this->$maxAmountFunc();
      $pageAmount = ceil($userAmountRegistered/5);

      $finalResult = array_merge(['pageAmount' => $pageAmount], $result);

      if($finalResult != null){
        echo Utils::arrayToJson($finalResult);
      }else{
        echo json_encode("Null.");
      }
      
    }else{
      echo Utils::arrayToJson($result);
    }
  }
}

?>