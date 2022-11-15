<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar el panel administrativo.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

class AdminController extends Controller{

  public function default(): string{
    return "require=Admin/adminMain_layout.php";
  }

  /**
   * Carga el layout de seguridad.
   */
  public function security(): string{
    return "require=Admin/security_layout.php";
  }

  /**
   * Carga el layout de órdenes.
   */
  public function orders(): string{
    return "require=Admin/orders_layout.php";
  }

  /**
   * Carga el layout de ventas.
   */
  public function sales(): string{
    return "require=Admin/sales_layout.php";
  }

  /**
   * Carga el layout de correos.
   */
  public function emails(): string{
    $mailbox = "{mail.infinuslight.com:143/imap/notls/novalidate-cert}INBOX";
    $inbox = imap_open($mailbox, "support", "support") or die('Cannot connect to email: ' . imap_last_error());

    $emails = imap_search($inbox, 'ALL');

    $emailsHtml = "";
    $emailCount = 0;

    if(!empty($emails)){
      
      foreach($emails as $email){
        
        $overview = imap_fetch_overview($inbox, $email); //Obtiene una vista del email.
        $overview = $overview[0];

        $subject = htmlentities($overview->subject); //Obtiene el tema del email.
        $message = imap_fetchbody($inbox, $email, 1, FT_PEEK); //Obtiene el cuerpo del email.

        $separatedInfo = explode(":", $message);
        $from = $separatedInfo[2];
        $name = $separatedInfo[1];
        $message = $separatedInfo[4];
        
        $emailsHtml .= "<tr> <td>$from</td><td>$name</td><td>$subject</td><td>$message</td> </tr>";
        $emailCount++;
      }
    }

    imap_close($inbox);

    return "require=Admin/emails_layout.php=".json_encode(['emails' => $emailsHtml, 'emailCount' => $emailCount]);
  }

  public function getRequiredPermission(): string{
    return "admin";
  }

}

?>