<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Vendedor.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\SellerController;
use App\Models\SellerModel;
use Utility\Messages\Message;

class SellerControllerPost extends PostManager{

  private SellerController $controller;
  
  public function __construct(SellerController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un vendedor.
   */
  public function addSeller(): void{
    $seller = new SellerModel();
    $seller->setId($_POST['AddCorreoVendedor']);
    $seller->setCompany($_POST['AddNombreEmpresaVendedor']);

    $result = $this->controller->addSeller($seller);
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un vendedor.
   */
  public function removeSeller(): void{
    $result = "";

    if(isset($_POST['id'])){
      $result = $this->controller->removeSeller($_POST['id']);
    }else if(isset($_POST['ReIdVendedor'])){
      $result = $this->controller->removeSeller($_POST['ReIdVendedor']);
    }else{
      $result = $this->controller->removeSeller($_POST['sellerId']);
    }

    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida un vendedor.
   */
  public function validateSeller(): void{
    $object = $this->controller->getSeller($_POST['ActAccesoVendedor']);

    $this->controller->closeConnection();
    if($object == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($object->toArray());
    }
  }

  /**
   * Actualiza un vendedor.
   */
  public function updateSeller(): void{
    $object = new SellerModel();
    $object->setId($_POST['ActCorreoVendedor']);
    $object->setCompany($_POST['ActNombreEmpresaVendedor']);

    $result = $this->controller->updateSeller($object);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Lista los vendedores (paginado).
   */
  public function listSellersAdmin(): void{
    $this->controller->paginatedTableInfo("listSellers", "getSellersAmount");
  }

  /**
   * Muestra la cantidad de vendedores.
   */
  public function sellerCounter(): void{
    echo $this->controller->getSellersAmount();
  }
}