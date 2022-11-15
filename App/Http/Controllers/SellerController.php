<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de vendedores.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SellerModel;

class SellerController extends Controller{

  private string $sellersTable = "Sellers";

  /**
   * Añade un vendedor a la bd.
   */
  public function addSeller(SellerModel $seller): bool{
    $sql = "SELECT Email FROM User WHERE Email = '".$seller->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //NO EXISTE UN USUARIO CON ESE EMAIL.

    $sql = "SELECT id FROM $this->sellersTable WHERE id = '".$seller->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //YA EXISTE UN VENDEDOR CON ESE ID.

    $result->free();

    $id = $seller->getId();
    $company = $seller->getCompany();

    $sql = "INSERT INTO $this->sellersTable VALUES(
      '$id',
      '$company'
      )";
  
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un vendedor de la bd.
   */
  public function removeSeller(string $sellerId): bool{
    $sql = "SELECT id FROM $this->sellersTable WHERE id = '".$sellerId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //NO EXISTE UN VENDEDOR CON ESE ID.

    $sql = "DELETE FROM $this->sellersTable WHERE id= '".$sellerId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Actualiza la información de un vendedor.
   */
  public function updateSeller(SellerModel $model): bool{

    $id = $model->getId();
    $company = $model->getCompany();
    
    $sql = "UPDATE $this->sellersTable SET
    id = '$id',
    company = '$company'
     WHERE id = '$id'
    ";
            
    return $this->connection->query($sql);
  }

  /**
   * Lista todos los vendedores en la bd.
   */
  public function listSellers(int $minPos = 0, int $maxPos = 0): array|null{
    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->sellersTable";
    }else{
      $sql = "SELECT * FROM $this->sellersTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //NO HAY VENDEDORES EN LA BASE DE DATOS.

    $sellers = array();

    while($row = $result->fetch_object('App\Models\SellerModel')) {
      array_push($sellers, $row);
    }

    $result->free();

    return $sellers;
  }

  /**
   * Obtiene un vendedor específico.
   */
  public function getSeller(string $id): SellerModel|null{
    $sql = "SELECT * FROM $this->sellersTable WHERE id = '".$id."'"; //TODO ACÁ HAY QUE SELECCIONAR EL QUE ESTÉ EN LA TABLA DE USUARIOS Y EN LA DE VENDEDORES AL MISMO TIEMPO.
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un vendedor con ese id.

    $recipe = $result->fetch_object('App\Models\SellerModel');

    $result->free();

    return $recipe;
  }

  /**
   * Obtiene la cantidad de vendedores registrados en
   * la base de datos.
   */
  public function getSellersAmount(): int{
    $sql = "SELECT count(id) FROM $this->sellersTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún vendedor guardado.

    return $result->fetch_column();
  }
}

?>