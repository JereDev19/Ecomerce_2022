<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de Usuarios.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Utility\UserUtils;
use Utility\Utils;

class UserController extends Controller{

  private string $usersTable = "User";
  private string $unconfirmed_usersTable = "UnconfirmedUsers";

  /**
   * Añade un usuario a la bd.
   */
  public function addUser(UserModel $user, bool $hashPass = true): bool{

    $sql = "SELECT email FROM $this->usersTable WHERE email = '".$user->getEmail()."'";
    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un usuario con ese id (email).

    $user->setId(uniqid("usr_", true));

    $id = $user->getId();
    $name = $user->getName();
    $surname1 = $user->getSurname1();
    $surname2 = $user->getSurname2();
    $email = $user->getEmail();
    if($hashPass){
      $password = password_hash($user->getPassword(), PASSWORD_BCRYPT, ['cost'=>4]);
    }else{
      $password = $user->getPassword();
    }
    $city = $user->getCity();
    $street = $user->getStreet();
    $postalCode = $user->getPostalCode();
    $phone = $user->getPhone();

    $sql = "INSERT INTO $this->usersTable VALUES(
      '$id',
      '$name',
      '$surname1',
      '$surname2',
      '$email',
      '$password',
      '$city',
      '$street',
      '$postalCode',
      '$phone'
      )";
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un usuario de la bd.
   */
  public function removeUser(string $userEmail): bool{

    $sql = "SELECT email FROM $this->usersTable WHERE email = '".$userEmail."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un usuario con ese email.

    $sql = "DELETE FROM $this->usersTable WHERE email = '".$userEmail."'";

    $this->connection->query($sql);

    return true;
  }
    
  /**
   * Lista los usuarios de la bd.
   */
  public function listUsers(int $minPos = 0, int $maxPos = 0): array|null{

    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT name, surname1, surname2, email, city, street, postalCode, phone FROM $this->usersTable";
    }else{
      $sql = "SELECT name, surname1, surname2, email, city, street, postalCode, phone FROM $this->usersTable ORDER BY email OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No hay ningún usuario guardado.

    $users = array();

    while($row = $result->fetch_object('App\Models\UserModel')) {
      array_push($users, $row);
    }

    return $users;
  }

  /**
   * Obtiene un usuario específico de la bd.
   */
  public function getUser(string $email): UserModel|null{

    $sql = "SELECT * FROM $this->usersTable WHERE email = '".$email."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un usuario con ese id.

    $user = $result->fetch_object('App\Models\UserModel');
    return $user;
  }

  /**
   * Verifica los datos de un usuario.
   */
  public function validateUser(string $email, string $password): UserModel|null{

    $sql = "SELECT * FROM $this->usersTable WHERE email = '$email'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un usuario con ese id.

    $user = $result->fetch_object('App\Models\UserModel');
        
    if(password_verify($password, $user->getPassword())){
      return $user;
    }else{
      return null; //Retorna nulo ya que la información proporcionada no era correcta.
    }
  }

  /**
   * Carga el layout de perfil inicio.
   */
  public function profile(): string{
    if(!UserUtils::validateSession()){ //En caso de no estar logueado redireccionar al login.
      Utils::redirectTo("User/login", 0);
    }

    $layout = "";

    if(isset($_GET[0])){
      switch($_GET[0]){
        case "password": $layout = "require=User/Profile/profile-password_layout.php"; break;
        case "data": $layout = "require=User/Profile/profile-data_layout.php"; break;
      }
    }

    if($layout == "") $layout = "require=User/Profile/profile_layout.php";

    $info = $this->getUser(UserUtils::getSession())->toArray();

    return $layout."=".json_encode($info);
  }

  /**
   * Carga el layout de login.
   */
  public function login(): string{
    return "require=User/login_layout.php";
  }

  /**
   * Carga el layout de register.
   */
  public function register(): string{
    return "require=User/register_layout.php";
  }

  /**
   * Actualiza un usuario de la bd.
   */
  public function updateUser(UserModel $user): bool{
    $name = $user->getName();
    $surname1 = $user->getSurname1();
    $surname2 = $user->getSurname2();
    $email = $user->getEmail();
    $password = $user->getPassword();
    $street = $user->getStreet();
    $city = $user->getCity();
    $postalCode = $user->getPostalCode();
    $phone = $user->getPhone();

    $sql = "UPDATE $this->usersTable SET
    name = '$name',
    surname1 = '$surname1',
    surname2 = '$surname2',
    email = '$email',
    street = '$street',
    city = '$city',
    postalCode = '$postalCode',
    phone = '$phone'";

    if($password != null){
      $password = password_hash($user->getPassword(), PASSWORD_BCRYPT, ['cost'=>4]);
      $sql .= ", password = '$password'";
    }
    $sql .= " WHERE email = '$email'";
            
    return $this->connection->query($sql);
  }

  /**
   * Actualiza el correo de un usuario.
   */
  public function updateUserEmail(string $userEmail, string $newEmail): bool{
    $sql = "SELECT email FROM $this->usersTable WHERE email = '$newEmail'";

    $result = $this->connection->query($sql);

    if($result->num_rows >= 1) return false; //Ya existe un usuario con ese correo.

    $sql = "UPDATE $this->usersTable SET email = '$newEmail' WHERE email = '$userEmail'";

    $result = $this->connection->query($sql);

    if($result){
      UserUtils::setSession($newEmail);
    }

    return $result;
  }

  /**
   * Actualiza el nombre de un usuario.
   */
  public function updateUserName(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET name = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Actualiza el apellido1 de un usuario.
   */
  public function updateUserSurname1(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET surname1 = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Actualiza el apellido2 de un usuario.
   */
  public function updateUserSurname2(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET surname2 = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Actualiza la ciudad de un usuario.
   */
  public function updateUserCity(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET city = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Actualiza la ciudad de un usuario.
   */
  public function updateUserStreet(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET street = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Actualiza el código postal de un usuario.
   */
  public function updateUserPostal(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET postalCode = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Actualiza el teléfono de un usuario.
   */
  public function updateUserPhone(string $userEmail, string $newVal): bool{
    $sql = "UPDATE $this->usersTable SET phone = '$newVal' WHERE email = '$userEmail'";
    return $this->connection->query($sql);
  }

  /**
   * Obtiene la cantidad de usuarios registrados en
   * la base de datos.
   */
  public function getUserAmount(): int{
    $sql = "SELECT count(id) FROM $this->usersTable";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún usuario guardado.

    return $result->fetch_column();
  }

  /**
   * Registra a un usuario.
   */
  public function registerUser(UserModel $user): bool{
    $sql = "SELECT email FROM $this->usersTable WHERE email = '".$user->getEmail()."'";
    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un usuario con ese id (email).

    $sql = "SELECT email FROM $this->unconfirmed_usersTable WHERE email = '".$user->getEmail()."'";
    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un usuario con ese id sin confirmar (email).

    $id = $user->getId();
    $name = $user->getName();
    $surname1 = $user->getSurname1();
    $surname2 = $user->getSurname2();
    $email = $user->getEmail();
    $password = password_hash($user->getPassword(), PASSWORD_BCRYPT, ['cost'=>4]);
    $city = $user->getCity();
    $street = $user->getStreet();
    $postalCode = $user->getPostalCode();
    $phone = $user->getPhone();

    $sql = "INSERT INTO $this->unconfirmed_usersTable VALUES(
      '$id',
      '$name',
      '$surname1',
      '$surname2',
      '$email',
      '$password',
      '$city',
      '$street',
      '$postalCode',
      '$phone'
      )";
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Valida un registro de usuario.
   */
  public function validateRegistration(string $userId): bool{
    $sql = "SELECT * FROM $this->unconfirmed_usersTable WHERE id = '".$userId."'";
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un usuario con ese id sin confirmar (email).

    $user = $result->fetch_object('App\Models\UserModel');

    $sql = "DELETE FROM $this->unconfirmed_usersTable WHERE email = '".$user->getEmail()."'";
    $this->connection->query($sql);

    return $this->addUser($user, false);
  }

  /**
   * Link de confirmación
   */
  public function confirm(): string{
    if(!isset($_GET[0])){
      Utils::redirectTo("", 0);
      return "";
    }

    $userId = $_GET[0];

    if(!$this->validateRegistration($userId)){
      Utils::redirectTo("", 0);
      return "";
    }

    return "require=User/Confirmation/register_confirmation_layout.php";
  }
}

?>