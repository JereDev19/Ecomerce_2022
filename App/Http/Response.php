<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase que se encarga de cargar la vista con información.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http;

use Dompdf\Css\Stylesheet;
use Dompdf\Dompdf;
use Dompdf\Options;

class Response{

  /**
   * Maneja el layout y el contenido de una Vista.
   */
  public function send($dt, string $layout): void{

    $fileType = "html";

    if(is_array($dt)){
      if(isset($dt['jsonData'])){

        $data = json_decode($dt['jsonData'], true); //Obtiene la información como un array asociativo.
        foreach($data as $key => $value){
          ${$key} = $value;
        }
      }
      if(isset($dt['fileType'])){
        $fileType = $dt['fileType'];
      }
    }

    if($fileType == "pdf"){
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $dompdf = new Dompdf($options);

      ob_start();
      
      $dompdf->getOptions()->setChroot("/var/www/html/public");

      
      require_once("../Views/Layouts/".$dt['loadPage']);
      $html = ob_get_clean();
      $dompdf->loadHtml($html);
      $dompdf->render();
      header("Content-type: application/pdf");
      header("Content-Disposition: inline; filename=factura.pdf");
      echo $dompdf->output();
      return;
    }

    if($layout != ""){
      if($layout == "../Views/Layouts/home_layout.php"){
        require_once("../Views/Layouts/Header/main-header_layout.php");
      }else{
        require_once("../Views/Layouts/Header/header_layout.php");
      }
      require_once($layout);
    }

    if(is_string($dt)){

      if(str_contains($dt, "require")){
        $content = explode("=", $dt);

        require_once("../Views/Layouts/Header/header_layout.php");
        require_once("../Views/Layouts/".$content[1]);
      }

    }else{

      if(isset($dt['loadPage'])){
        require_once("../Views/Layouts/Header/header_layout.php");
        require_once("../Views/Layouts/".$dt['loadPage']);
      }

    }

    //Requerir footer
    require_once("../Views/Layouts/Footer/footer_layout.php");
  }
}

?>