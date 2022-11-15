<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Conecta a la base de datos y retorna su conexión.
 * 
 * Fecha de modificación: 7/7/2022
 */

namespace Libs;

class Database{

  /**
   * Establece conexión con la base de datos.
   */
  public static function connect(): \mysqli{
    $info = require_once("../Libs/ConnectionInfo.php");
    
    $connection = mysqli_connect(
      $info->ip,
      $info->username, 
      $info->password, 
      $info->database, 
      $info->port
    );

    if($connection->connect_error){
      die("Connection unestablished: ".$connection->connect_error);
    }

    return $connection;
  }

}


?>