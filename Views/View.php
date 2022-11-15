<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase generalizada de vista.
 * 
 * Fecha de modificación: 24/9/2022
 */

namespace Views;

abstract class View{

  public function render(string $data): string|array{
    //AQUI SE HACE LA LÓGICA DEL CONTENIDO.
    $content = "";

    $fileType = "html";

    if(str_contains($data, "file_type='pdf'")){
      $data = str_replace("=file_type='pdf'", "", $data);
      $fileType = "pdf";
    }

    if(str_contains($data, "require=")){
      
      $content = explode("=", $data);
      $loadPage = $content[1];
      $data = str_replace($content[0], "", $data);
      $data = str_replace($content[1], "", $data);
      $data = str_replace("==", "", $data);
    }

    if(isset($loadPage)){
      if($data == "="){
        $content = ["loadPage" => $loadPage];
      }else{
        $content = [
          "loadPage" => $loadPage,
          "jsonData" => $data,
          "fileType" => $fileType
        ];
      }
    }

    return $content;
  }
}