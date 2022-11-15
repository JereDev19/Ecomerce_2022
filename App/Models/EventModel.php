<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de evento.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class EventModel extends Model{

  private string $id;
  private string $date;
  private string $start_time;
  private string $end_time;
  private string $address;

  public function __construct(){}

  /**
    * Obtiene el valor del id.
    */ 
  public function getId(): string | null{
    return $this->id;
  }

  /**
    * Establece el valor del id.
    */ 
  public function setId(string $id): void{
    $this->id = $id;
  }

  /**
   * Obtiene el valor de la fecha.
   */ 
  public function getDate(): string | null{
    return $this->date;
  }

  /**
   * Establece el valor de la fecha.
   */ 
  public function setDate(string $date): void{
    $this->date = $date;
  }

  /**
   * Obtiene el valor del horario de comienzo.
   */ 
  public function getStartTime(): string | null{
    return $this->start_time;
  }

  /**
   * Establece el valor del horario de comienzo.
   */ 
  public function setStartTime(string $startTime): void{
    $this->start_time = $startTime;
  }

  /**
   * Obtiene el valor de el horario de finalización
   */ 
  public function getEndTime(): string | null{
    return $this->end_time;
  }

  /**
   * Establece el valor de el horario de finalización
   */ 
  public function setEndTime(string $endTime): void{
    $this->end_time = $endTime;
  }

  /**
   * Obtiene el valor de la dirección.
   */ 
  public function getAddress(): string | null{
    return $this->address;
  }

  /**
   * Establece el valor de la dirección.
   */ 
  public function setAddress(string $address): void{
    $this->address = $address;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{

    return array(
      'eventId' => $this->getId(),
      'eventDate' => $this->getDate(),
      'eventStartTime' => $this->getStartTime(),
      'eventEndTime' => $this->getEndTime(),
      'eventAddress' => $this->getAddress()
    );
        
  }
}

?>