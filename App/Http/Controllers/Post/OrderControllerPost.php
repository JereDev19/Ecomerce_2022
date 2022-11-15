<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Orden.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\OrderController;
use App\Models\OrderModel;
use Utility\Messages\Message;

class OrderControllerPost extends PostManager{

  private OrderController $controller;
  
  public function __construct(OrderController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade una orden.
   */
  public function addOrder(): void{
    $order = new OrderModel();
    $order->setName($_POST['AddNombrePedido']);
    $order->setEvent($_POST['AddEventoPedido']);
    $order->setDate($_POST['AddFechaPedido']);
    $order->setPrice($_POST['AddPrecioPedido']);
    $result = $this->controller->addOrder($order);
    
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve una orden.
   */
  public function removeOrder(): void{
    $result = "";

    if(isset($_POST['ReIdPedido'])){
      $result = $this->controller->removeOrder($_POST['ReIdPedido']);
    }else{
      $result = $this->controller->removeOrder($_POST['orderId']);
    }

    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida una orden.
   */
  public function validateOrder(): void{
    $object = $this->controller->getOrder($_POST['ActAccesoPedido']);

    $this->controller->closeConnection();
    if($object == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($object->toArray());
    }
  }
  
  /**
   * Actualiza una orden.
   */
  public function updateOrder(): void{
    $order = new OrderModel();
    $order->setId($_POST['id']);
    $order->setName($_POST['ActNombreOrder']);
    $order->setEvent($_POST['ActEventOrder']);
    $order->setDate($_POST['ActDateOrder']);

    $result = $this->controller->updateOrder($order);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de órdenes registradas.
   */
  public function orderCounter(): void{
    echo $this->controller->getOrdersAmount();
  }

  /**
   * Lista las órdenes (paginado).
   */
  public function listOrdersAdmin(): void{
    $this->controller->paginatedTableInfo("listOrders", "getOrdersAmount");
  }
}