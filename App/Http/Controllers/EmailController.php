<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar el carrito.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use mysqli;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EmailController extends Controller{

  private PHPMailer $mail;

  public function __construct(bool $connect = true, mysqli $connection = null){
    parent::__construct($connect, $connection);

    $mail = new PHPMailer(false); //Pasarle 'true' habilita las excepciones.

    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    ); 

    try {
      //Configuraciones del servidor
      
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Habilita debug.
      $mail->isSMTP();                                            //Protocolo SMTP.
      $mail->Host       = 'mail.infinuslight.com';                     //Host SMTP.
      $mail->SMTPAuth   = true;                                   //Autenticación.
      $mail->Username   = 'support';                     //Usuario SMTP.
      $mail->Password   = 'support';                               //Contraseña SMTP.
      $mail->SMTPSecure = 'tls';            //Habilitar encriptación "tls".
      $mail->Port       = 25;                                    //Puerto 25 (Google).
      

      //Recipientes
      $mail->setFrom('support@infinuslight.com', 'Soporte InfinusLight');
      $mail->addReplyTo('support@infinuslight.com', 'Soporte InfinusLight');

      $this->mail = $mail;
    } catch (Exception $e) {}
  }

  /**
   * Envia un email.
   */
  public function sendEmail(string $address, string $subject, string $body, string $altBody = ""): bool{
    $mail = $this->mail;

    try {
      $mail->addAddress($address);     //Add a recipient

      //Contenido
      $mail->isHTML(true);  //Establece si es html o no.
      $mail->Subject = $subject;
      $mail->Body    = $body;
      $mail->AltBody = $altBody;
    
      $mail->send();

      $mail->clearAddresses();
      $mail->clearAttachments();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}