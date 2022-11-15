<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Email.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\EmailController;
use Utility\Messages\Message;

class EmailControllerPost extends PostManager{

  private EmailController $controller;
  
  public function __construct(EmailController $controller){
    $this->controller = $controller;
  }

  /**
   * Envía un correo.
   */
  public function sendEmail(){
    $address = $_POST['email'];
    $subject = $_POST[''];
    $body = $_POST[''];
    $altBody = $_POST[''];
    $answer = $this->controller->sendEmail($address, $subject, $body, $altBody);

    if($answer){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Envía un correo de el formulario de contacto.
   */
  public function formulario(){
    $address = $_POST['email'];

    if($address == ""){
      echo Message::DatabaseFailure->message();
      return;
    }
    
    $subject = "Confirmacion de contacto.";
    $body = "<h1>¡Gracias por preferirnos!</h1> <br> <p>Nos contactaremos con usted lo mas pronto posible</p>";
    $altBody = "¡Gracias por preferirnos! Nos contactaremos con usted lo mas pronto posible";
    $answer = $this->controller->sendEmail($address, $subject, $body, $altBody);

    if($answer){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }

    $subject = "Nuevo formulario de contacto.";
    $body = "Remitente: ".$_POST['nombre'].": ".$_POST['email']."\n :Mensaje: ".$_POST['message'];
    $altBody = $body;
    $this->controller->sendEmail("support@infinuslight.com", $subject, $body, $altBody);
  }
}