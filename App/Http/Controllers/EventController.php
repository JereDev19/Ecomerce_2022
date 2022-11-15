<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de eventos.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventModel;

class EventController extends Controller{

  private string $eventsTable = "Events";

  /**
   * Añade un evento a la base de datos.
   */
  public function addEvent(EventModel $event): bool{
    $event->setId(uniqid("eve_", true));

    $sql = "SELECT id FROM $this->eventsTable WHERE id = '".$event->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Retorna falso si tiene el mismo id que uno anterior.

    $result->free();

    $id = $event->getId();
    $date = $event->getDate();
    $startTime = $event->getStartTime();
    $endTime = $event->getEndTime();
    $address = $event->getAddress();

    $sql = "INSERT INTO $this->eventsTable VALUES(
      '$id',
      '$date',
      '$startTime',
      '$endTime',
      '$address'
      )";
  
            
    $this->connection->query($sql);
    return true;
  }

  /**
   * Remueve un evento de la base de datos.
   */
  public function removeEvent(string $eventId): bool{
    $sql = "SELECT id FROM $this->eventsTable WHERE id = '".$eventId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //Retorna falso si no existe un evento con ese id.

    $sql = "DELETE FROM $this->eventsTable WHERE id= '".$eventId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }

  /**
   * Actualiza la información de un evento.
   */
  public function updateEvent(EventModel $event): bool{

    $id = $event->getId();
    $date = $event->getDate();
    $startTime = $event->getStartTime();
    $endTime = $event->getEndTime();
    $address = $event->getAddress();
    
    $sql = "UPDATE $this->eventsTable SET
    id = '$id',
    date = '$date',
    start_time = '$startTime',
    end_time = '$endTime',
    address = '$address'
     WHERE id = '$id'
    ";

    return $this->connection->query($sql);
  }

  /**
   * Muestra una lista con todos los eventos.
   */
  public function listEvents(int $minPos = 0, int $maxPos = 0): array|null{
    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->eventsTable";
    }else{
      $sql = "SELECT * FROM $this->eventsTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existen eventos registrados.

    $events = array();

    while($row = $result->fetch_object('App\Models\EventModel')){
      array_push($events, $row);
    }

    $result->free();

    return $events;
  }

  /**
   * Obtiene un evento específico de la base de datos.
   */
  public function getEvent(string $id): EventModel|null{
    $sql = "SELECT * FROM $this->eventsTable WHERE id = '".$id."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //Retorna nulo si no existe ningún evento con ese id.

    $event = $result->fetch_object('App\Models\EventModel');

    $result->free();

    return $event;
  }

  /**
   * Obtiene la cantidad de eventos registrados en
   * la base de datos.
   */
  public function getEventsAmount(): int{
    $sql = "SELECT count(id) FROM $this->eventsTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún evento guardado.

    return $result->fetch_column();
  }
}

?>