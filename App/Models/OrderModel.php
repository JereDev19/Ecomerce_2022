<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de órdenes
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

use DateTime;
use DateTimeZone;

class OrderModel extends Model{

  private string $id;
  private string $name;
  private string $event;
  private string|DateTime $date;
  private int $price = 0;
  private ?array $products = null;
  private string $userEmail = "";

  public function __construct(){}

  /**
    * Obtiene el valor de el id.
    */ 
  public function getId(): string{
    return $this->id;
  }

  /**
    * Establece el valor de el id.
    */ 
  public function setId(string $id): void{
    $this->id = $id;
  }

  /**
   * Obtiene el valor del nombre.
   */ 
  public function getName(): string{
    return $this->name;
  }

  /**
   * Establece el valor del nombre.
   */ 
  public function setName(string $name): void{
    $this->name = $name;
  }

  /**
   * Obtiene el valor de el evento en cual se realizó la orden.
   */ 
  public function getEvent(): string{
    return $this->event;
  }

  /**
   * Establece un valor del evento en cual se realizó la orden.
   */ 
  public function setEvent(string $event): void{
    $this->event = $event;
  }

  /**
   * Obtiene el valor de la fecha.
   */ 
  public function getDate(): DateTime{
    if(is_string($this->date)){
      return new DateTime($this->date, new DateTimeZone('GMT-3'));
    }
    return $this->date;
  }

  /**
   * Establece el valor de la fecha.
   */ 
  public function setDate(string $date): void{
    if($date == 'now'){
      $date = new DateTime('now', new DateTimeZone("GMT-3"));
    }else{
      $date = new DateTime($date, new DateTimeZone("GMT-3"));
    }
    $this->date = $date;
  }

  /**
   * Obtiene el valor del precio.
   */ 
  public function getPrice(): int{
    return $this->price;
  }

  /**
   * Establece el valor del precio.
   */ 
  public function setPrice(int $price): void{
    $this->price = $price;
  }

  /**
   * Obtiene lo productos y su cantidad.
   */
  public function getProducts(): array | null{
    return $this->products;
  }

  /**
   * Añade productos y su cantidad.
   */
  public function addProducts(array $products): void{
    if($products == null) return;

    $this->products = $products;
  }

  /**
   * Obtiene el email del usuario dueño de la factura.
   */
  public function getUserEmail(): string{
    return $this->userEmail;
  }

  /**
   * Establece el email del usuario dueño de la factura.
   */
  public function setUserEmail(string $email): void{
    $this->userEmail = $email;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'orderId' => $this->getId(),
      'orderName' => $this->getName(),
      'orderEvent' => $this->getEvent(),
      'orderDate' => $this->getDate()->format("Y-m-d H:i:s"),
      'orderPrice' => $this->getPrice(),
      'userEmail' => $this->getUserEmail()
    );
        
  }
}

?>