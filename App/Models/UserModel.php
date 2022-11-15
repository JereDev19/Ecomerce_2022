<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo para usuarios.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class UserModel extends Model{

  private ?string $id = null;
  private ?string $name = null;
  private ?string $surname1 = null;
  private ?string $surname2 = null;
  private ?string $email = null;
  private ?string $password = null;
  private ?string $city = null;
  private ?string $street = null;
  private ?int $postalCode = null;
  private ?string $phone = null;

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
   * Obtiene el valor del nombre.
   */ 
  public function getName(): string | null{
    return $this->name;
  }

  /**
   * Establece el valor del nombre.
   */ 
  public function setName(string $name): void{
    $this->name = $name;
  }

  /**
   * Obtiene el valor del apellido 1.
   */ 
  public function getSurname1(): string | null{
    return $this->surname1;
  }

  /**
   * Establece el valor del apellido 1.
   */ 
  public function setSurname1(string $surname1): void{
    $this->surname1 = $surname1;
  }

  /**
   * Obtiene el valor del apellido 2.
   */ 
  public function getSurname2(): string | null{
    return $this->surname2;
  }

  /**
   * Establece el valor del apellido 2.
   */ 
  public function setSurname2(string $surname2): void{
    $this->surname2 = $surname2;
  }

  /**
   * Obtiene el valor del correo.
   */ 
  public function getEmail(): string | null{
    return $this->email;
  }

  /**
   * Establece el valor del correo.
   */ 
  public function setEmail(string $email): void{
    $this->email = $email;
  }

  /**
   * Obtiene el valor de la contraseña.
   */ 
  public function getPassword(): string | null{
    return $this->password;
  }

  /**
   * Establece el valor de la contraseña.
   */ 
  public function setPassword(string $password): void{
    $this->password = $password;
  }

  /**
   * Obtiene el valor de la ciudad.
   */ 
  public function getCity(): string | null{
    return $this->city;
  }

  /**
   * Establece el valor de la ciudad.
   */ 
  public function setCity(string $city): void{
    $this->city = $city;
  }

  /**
   * Obtiene el valor de la calle.
   */ 
  public function getStreet(): string | null{
    return $this->street;
  }

  /**
   * Establece el valor de la calle.
   */ 
  public function setStreet(string $street): void{
    $this->street = $street;
  }
  
  /**
   * Obtiene el valor de el código postal.
   */ 
  public function getPostalCode(): int | null{
    return $this->postalCode;
  }

  /**
   * Establece el valor del código postal.
   */ 
  public function setPostalCode(int $postalCode): void{
    $this->postalCode = $postalCode;
  }

  /**
   * Obtiene el valor del número de teléfono.
   */
  public function getPhone(): string | null{
    return $this->phone;
  }

  /**
   * Establece el valor del teléfono.
   */
  public function setPhone(string $phone): void{
    $this->phone = $phone;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{
    return array(
      'userId' => $this->getId(),
      'userName' => $this->getName(),
      'userSurName1' => $this->getSurname1(),
      'userSurName2' => $this->getSurname2(),
      'userEmail' => $this->getEmail(),
      'userCity' => $this->getCity(),
      'userStreet' => $this->getStreet(),
      'userPostalCode' => $this->getPostalCode(),
      'userPhone' => $this->getPhone()
    );
  }
}

?>