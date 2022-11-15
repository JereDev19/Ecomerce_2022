<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Evento.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\EventController;
use App\Models\EventModel;
use Utility\Messages\Message;

class EventControllerPost extends PostManager{

  private EventController $controller;
  
  public function __construct(EventController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un evento.
   */
  public function addEvent(): void{
    $event = new EventModel();
    $event->setDate($_POST['AddFechaEvento']);
    $event->setStartTime($_POST['AddComienzoEvento']);
    $event->setEndTime($_POST['AddFinalizacionEvento']);
    $event->setAddress($_POST['AddaddressEvento']);
    $result = $this->controller->addEvent($event);
    
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un evento.
   */
  public function removeEvent(): void{
    $result = "";

    if(isset($_POST['ReIdEvento'])){
      $result = $this->controller->removeEvent($_POST['ReIdEvento']);
    }else{
      $result = $this->controller->removeEvent($_POST['eventId']);
    }
      
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida la existencia de un evento.
   */
  public function validateEvent(): void{
    $object = $this->controller->getEvent($_POST['ActAccesoEvento']);

    if($object == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($object->toArray());
    }
  }

  /**
   * Actualiza la información de un evento.
   */
  public function updateEvent(): void{
    $object = new EventModel();
    $object->setId($_POST['id']);
    $object->setDate($_POST['ActFechaEvento']);
    $object->setStartTime($_POST['ActComienzoEvento']);
    $object->setEndTime($_POST['ActFinalizacionEvento']);
    $object->setAddress($_POST['ActDireccionEvento']);

    $result = $this->controller->updateEvent($object);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Obtiene la cantidad de eventos registrados.
   */
  public function eventCounter(): void{
    echo $this->controller->getEventsAmount();
  }
  
  /**
   * Lista los eventos (paginado).
   */
  public function listEventsAdmin(): void{
    $this->controller->paginatedTableInfo("listEvents", "getEventsAmount");
  }
}