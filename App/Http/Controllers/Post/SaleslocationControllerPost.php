<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Punto de venta.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\SaleslocationController;
use App\Models\SalesLocationModel;
use Utility\Messages\Message;

class SaleslocationControllerPost extends PostManager{

  private SaleslocationController $controller;
  
  public function __construct(SaleslocationController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un punto de venta.
   */
  public function addSalesLocation(): void{
    $salesLoc = new SalesLocationModel();
    $salesLoc->setAddress1($_POST['AddDireccionPuntoVenta']);
    $salesLoc->setAddress2($_POST['AddDireccion2PuntoVenta']);
    $salesLoc->setCity($_POST['AddCiudadPuntoVenta']);
    $salesLoc->setPostalCode($_POST['AddPostalPuntoVenta']);
    $this->controller->addSalesLocation($salesLoc);
    $this->controller->closeConnection();
  }

  /**
   * Remueve un punto de venta.
   */
  public function removeSalesLocation(): void{
    $result = "";

    if(isset($_POST['id'])){
      $result = $this->controller->removeSalesLocation($_POST['id']);
    }else if(isset($_POST['ReIdPuntoVenta'])){
      $result = $this->controller->removeSalesLocation($_POST['ReIdPuntoVenta']);
    }else{
      $result = $this->controller->removeSalesLocation($_POST['salesLocationId']);
    }

    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida un punto de venta.
   */
  public function validateSalesLocation(): void{
    $object = $this->controller->getSalesLocation($_POST['ActAccesoPuntoVenta']);

    $this->controller->closeConnection();
    if($object == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($object->toArray());
    }
  }

  /**
   * Actualiza un punto de venta.
   */
  public function updateSalesLocation(): void{
    $object = new SalesLocationModel();
    $object->setId($_POST['id']);
    $object->setAddress1($_POST['ActDireccionPuntoVenta']);
    $object->setAddress2($_POST['ActDireccion2PuntoVenta']);
    $object->setCity($_POST['ActCiudadPuntoVenta']);
    $object->setPostalCode($_POST['ActPostalPuntoVenta']);

    $result = $this->controller->updateSalesLocation($object);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de puntos de venta.
   */
  public function salesLocationCounter(): void{
    echo $this->controller->getSalesLocationsAmount();
  }

  /**
   * Lista los puntos de venta (paginado).
   */
  public function listSaleslocationsAdmin(): void{
    $this->controller->paginatedTableInfo("listSalesLocations", "getSalesLocationsAmount");
  }
}