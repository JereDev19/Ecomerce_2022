<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Usuarios.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Models\UserModel;
use Utility\Messages\Message;
use App\Http\Controllers\PermissionController;
use Utility\UserUtils;

class UserControllerPost extends PostManager{

  private UserController $controller;
  
  public function __construct(UserController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un Usuario a la base de datos.
   */
  public function formAAU(){
    $user = new UserModel();
    $user->setName($_POST["nameAd"]);
    $user->setSurname1($_POST["surname1Ad"]);
    $user->setSurname2($_POST["surname2Ad"]);
    $user->setEmail($_POST["gmailAd"]);
    $user->setPassword($_POST["passwordAd"]);
    $user->setCity($_POST["cityAd"]);
    $user->setStreet($_POST["addressAd"]);
    $user->setPostalCode($_POST["postalCodeAd"]);
    
    $result = $this->controller->addUser($user);
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un Usuario de la base de datos.
   */
  public function formRRU(): void{
    $result = false;

    if(isset($_POST['ReEmail'])){
      $result = $this->controller->removeUser($_POST['ReEmail']);
    }else{
      $result = $this->controller->removeUser($_POST['userEmail']);
    }

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Valida si existe un usuario en concreto.
   */
  public function validateUser(): void{
    $user = $this->controller->getUser($_POST['idActualizarUser']);

    $this->controller->closeConnection();
    if($user == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($user->toArray());
    }
  }

  /**
   * Actualiza un usuario.
   */
  public function updateUser(): void{
    $user = new UserModel();
    $user->setName($_POST['ActNameUser']);
    $user->setSurname1($_POST['ActNameSurname1']);
    $user->setSurname2($_POST['ActNameSurname2']);
    $user->setEmail($_POST['ActEmailUser']);
    if($_POST['ActPasswordUser'] != ""){
      $user->setPassword($_POST['ActPasswordUser']);
    }
    $user->setStreet($_POST['ActDireccionUser']);
    $user->setCity($_POST['ActCiudadUser']);
    $user->setPostalCode($_POST['ActPostalUser']);

    $result = $this->controller->updateUser($user);
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Loguea un usuario.
   */
  public function formLogin(): void{
    $email = $_POST['correoLogin'];
    $password = $_POST['passwordLogin'];
    $user = $this->controller->validateUser($email, $password);

    if($user == null){
      echo "Usuario_invalido.";
    }else{
      $permissionController = new PermissionController(false);
      $isAdmin = $permissionController->hasPermission($user->getEmail(), 'admin', $this->controller->getConnection());
      
      if($isAdmin){
        echo("Logueado_correctamente. Admin");
        $_SESSION['isAdmin'] = true;
      }else{
        echo("Logueado_correctamente.");
        unset($_SESSION['isAdmin']);
      }
      
      $_SESSION['user'] = $user->getEmail();
    }
  }

  /**
   * Valida si un usuario está logueado.
   */
  public function formValidateLogged(): void{
    if(UserUtils::validateSession()){

      if(UserUtils::isAdmin()){
        echo("Logueado_anteriormente. Admin");
      }else{
        echo "Logueado_anteriormente.";
      }
      return;
    }

    echo "Usuario_invalido.";
  }

  /**
   * Termina una sesión de Usuario.
   */
  public function formLogout(): void{
    if(isset($_SESSION['user'])) unset($_SESSION['user']);
    if(isset($_SESSION['isAdmin'])) unset($_SESSION['isAdmin']);
  }

  /**
   * Registra un usuario.
   */
  public function formRegister(): void{
    $user = new UserModel();
    $user->setId(uniqid("usr_", true));
    $user->setName($_POST['nombreLR']);
    $user->setSurname1($_POST['apellido1LR']);
    $user->setSurname2($_POST['apellido2LR']);
    $user->setCity($_POST['ciudad']);
    $user->setStreet($_POST['calle']);
    $user->setPostalCode($_POST['postal']);
    $user->setPassword($_POST['passwordLR']);
    $user->setEmail($_POST['correoLR']);
    $user->setPhone($_POST['telefonoLR']);

    $response = $this->controller->registerUser($user);
    if($response == false){
      echo "Registrado_anteriormente.";
    }else{
      echo "Registrado_correctamente.";

      $emailController = new EmailController(false, $this->controller->getConnection());

      $confirmationLink = "https://infinuslight.com/User/confirm/".$user->getId();
      $subject = "Confirmacion de registro.";
      $body = "<p>Por favor confirme su direccion de correo electrónico entrando al siguiente link: $confirmationLink </p>";
      $altBody = "Por favor confirme su direccion de correo electrónico entrando al siguiente link: $confirmationLink";
      $emailController->sendEmail($user->getEmail(), $subject, $body, $altBody);
    }
  }

  /**
   * Cuenta la cantidad de usuarios registrados en la base de datos.
   */
  public function userCounter(): void{
    echo $this->controller->getUserAmount();
  }

  /**
   * Lista los Usuarios por página.
   */
  public function listUsersAdmin(): void{
    $this->controller->paginatedTableInfo("listUsers", "getUserAmount");
  }

  /**
   * Cambia el correo a un usuario.
   */
  public function formChangeGmail(): void{
    $this->formChangeVal('changeGmail', 'updateUserEmail');
  }

  /**
   * Cambia el nombre a un usuario.
   */
  public function formChangeName(): void{
    $this->formChangeVal('changeName', 'updateUserName');
  }

  /**
   * Cambia el apellido1 a un usuario.
   */
  public function formChangeSurname1(): void{
    $this->formChangeVal('changeSurname1', 'updateUserSurname1');
  }

  /**
   * Cambia el apellido2 a un usuario.
   */
  public function formChangeSurname2(): void{
    $this->formChangeVal('changeSurname2', 'updateUserSurname2');
  }

  /**
   * Cambia la ciudad a un usuario.
   */
  public function formChangeCity(): void{
    $this->formChangeVal('changeCity', 'updateUserCity');
  }

  /**
   * Cambia la calle a un usuario.
   */
  public function formChangeStreet(): void{
    $this->formChangeVal('changeStreet', 'updateUserStreet');
  }

  /**
   * Cambia el código postal a un usuario.
   */
  public function formChangePostalCode(): void{
    $this->formChangeVal('changePostalCode', 'updateUserPostal');
  }

  /**
   * Cambia el teléfono a un usuario.
   */
  public function formChangeTelephone(): void{
    $this->formChangeVal('changeTelephone', 'updateUserPhone');
  }

  /**
   * Cambia la contraseña de el usuario.
   */
  public function formChangePassword(): void{
    $actualPass = $_POST['contraseñaActual'];
    $newPass = $_POST['constraseñaNueva'];

    $validation = $this->controller->validateUser(UserUtils::getSession(), $actualPass);
    if($validation != null){
      $validation->setPassword($newPass);
      $this->controller->updateUser($validation);
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Función generalizada para actualizar un valor de un usuario.
   */
  private function formChangeVal(string $postName, string $func): void{
    $userEmail = UserUtils::getSession();
    $newUserValue = $_POST[$postName];

    $response = $this->controller->$func($userEmail, $newUserValue);

    if($response){
      echo $newUserValue;
    }else{
      echo Message::DatabaseFailure->message();
    }
  }
}