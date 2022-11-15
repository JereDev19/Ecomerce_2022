<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

class PostManager{

  public function __construct(string $postClass, Controller $controllerInstance){
    $manager = new $postClass($controllerInstance);
    $method = lcfirst($_POST['Method']);
    $manager->$method();
  }
}