<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de puntos de venta.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SalesLocationModel;

class SaleslocationController extends Controller{

  private string $salesLocationTable = "SalesLocation";

  /**
   * Añade un punto de venta a la bd.
   */
  public function addSalesLocation(SalesLocationModel $salesLoc): bool{
    $salesLoc->setId(uniqid("sl_", true));

    $sql = "SELECT id FROM $this->salesLocationTable WHERE id = '".$salesLoc->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un punto de venta con ese id.

    $result->free();

    $id = $salesLoc->getId();
    $address1 = $salesLoc->getAddress1();
    $address2 = $salesLoc->getAddress2();
    $city = $salesLoc->getCity();
    $postal = $salesLoc->getPostalCode();

    $sql = "INSERT INTO $this->salesLocationTable VALUES(
      '$id',
      '$address1',
      '$address2',
      '$city',
      $postal
      )";
  
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un punto de venta.
   */
  public function removeSalesLocation(string $salesLocId): bool{
    $sql = "SELECT id FROM $this->salesLocationTable WHERE id = '".$salesLocId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un punto de venta con ese id.

    $sql = "DELETE FROM $this->salesLocationTable WHERE id= '".$salesLocId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Lista todos los puntos de venta guardados.
   */
  public function listSalesLocations(int $minPos = 0, int $maxPos = 0): array|null{
    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->salesLocationTable";
    }else{
      $sql = "SELECT * FROM $this->salesLocationTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existen puntos de venta almacenados.

    $salesLoc = array();

    while($row = $result->fetch_object('App\Models\SalesLocationModel')) {
      array_push($salesLoc, $row);
    }

    $result->free();

    return $salesLoc;
  }

  /**
   * Actualiza la información de un punto de venta
   */
  public function updateSalesLocation(SalesLocationModel $model): bool{

    $id = $model->getId();
    $address1 = $model->getAddress1();
    $address2 = $model->getAddress2();
    $city = $model->getCity();
    $postal = $model->getPostalCode();
    
    $sql = "UPDATE $this->salesLocationTable SET
    id = '$id',
    address1 = '$address1',
    address2 = '$address2',
    city = '$city',
    postal = $postal
     WHERE id = '$id'
    ";
            
    return $this->connection->query($sql);
  }

  /**
   * Obtiene un punto de venta específico.
   */
  public function getSalesLocation(string $salesLocId): SalesLocationModel|null{
    $sql = "SELECT * FROM $this->salesLocationTable WHERE id = '".$salesLocId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un punto de venta con ese id.

    $salesLoc = $result->fetch_object('App\Models\SalesLocationModel');

    $result->free();

    return $salesLoc;
  }

  /**
   * Obtiene la cantidad de puntos de venta registrados en
   * la base de datos.
   */
  public function getSalesLocationsAmount(): int{
    $sql = "SELECT count(id) FROM $this->salesLocationTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún punto de venta guardado.

    return $result->fetch_column();
  }
}

?>