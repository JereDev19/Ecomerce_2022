<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase que contiene metodos útiles a utilizar en todo el programa.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace Utility;

class Utils{

  /**
   * Redirecciona a una página en concreto estableciendo un tiempo de espera y una url.
   */
  public static function redirectTo(string $url, int $timeInSeconds): void{
    $time = $timeInSeconds*1000;
    echo "<script>setTimeout(\"location.href = '/$url';\", $time);</script>";
  }

  //Remueve un directorio y los archivos dentro del mismo (recursividad).
  public static function removeDir(string $dir){
    if(is_file($dir)) {
      return unlink($dir);
    }else if(is_dir($dir)){
          
      //Obtiene la lista de los archivos en el directorio.
      $scan = glob(rtrim($dir, '/').'/*');
          
      //Un loop por cada archivo dentro del mismo.
      foreach($scan as $index=>$path) {
              
        //Llama a la misma función de forma recursiva.
        self::removeDir($path);
      }
          
      //Remueve el directorio mismo.
      return @rmdir($dir);
    }
  }

  /**
   * Guarda una imágen.
   */
  public static function savePicture(string $folderPath, string $filePath, string $imageName, string $imageType): bool{
    if(!file_exists($folderPath)){
      mkdir($folderPath);
    }
    $result = move_uploaded_file($imageName, $filePath);

    if(!$result) return false;

    $img = self::resizeImage($filePath, $folderPath, $imageType, 355, 240);
    if($img == false) return false;
    $img = self::resizeImage($filePath, $folderPath, $imageType, 60, 60);
    if($img == false) return false;
    
    return true;
  }

  /**
   * Convierte un array en json
   */
  public static function arrayToJson(array $array): string{
    $cleanInfo = array();

    foreach($array as $a){
      if(is_object($a)){
        array_push($cleanInfo, $a->toArray());
      }else{
        array_push($cleanInfo, $a);
      }
    }
        
    $json = json_encode($cleanInfo)."\n";
    return $json;
  }

  /**
   * Redimensiona una imágen
   */
  private static function resizeImage(string $filePath, string $folderPath, string $imageType, int $x, int $y): bool{
    if($imageType == "png"){
      $image = imagecreatefrompng($filePath);   // For PNG
      $imgResized = imagescale($image , $x, $y);

      $result = imagepng($imgResized, $folderPath."/".$x."x".$y.".png");
      if(!$result){
        self::removeDir($folderPath);
        return false;
      }

    }else if($imageType == "jpeg"){
      $image = imagecreatefromjpeg($filePath); // For JPEG
      $imgResized = imagescale($image , $x, $y);

      $result = imagejpeg($imgResized, $folderPath."/".$x."x".$y.".png");
      if(!$result){
        self::removeDir($folderPath);
        return false;
      }
      
    }
    return true;
  }
}

?>