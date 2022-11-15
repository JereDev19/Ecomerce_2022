<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase principal que maneja todo el programa.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Post\PostManager;

class App
{

  private string $controller;
  private string $controllerName;
  private string $method;
  private string $view;
  private string $layout;

  /**
   * Constructor que se encarga de manejar la información que llega de la url para manejar controlador, layout y método.
   */
  public function __construct()
  {
    $uri = substr($_SERVER['REQUEST_URI'], 1); //Obtiene la url y remueve el primer "/" que siempre queda aunque no haya nada especificado.

    $url = !empty($uri) ? explode('/', rtrim($uri, '/')) : null; //Separa la URL en un array.

    $method = isset($url[1]) ? strtolower($url[1]) : "";

    if ($url == null && $_SERVER['REQUEST_METHOD'] == "GET") {
      //Carga la página principal ya que no hay ningún controlador especificado.
      $this->setMainPage();
      return;
    }

    $controllerName = ucfirst(strtolower($url[0])) . "Controller"; //Pone el texto en minúscula y después el primer caracter en mayúscula.

    if ($_SERVER['REQUEST_METHOD'] == "POST") $controllerName = ucfirst(strtolower($_POST['Controller'])) . "Controller";

    if(count($url) > 1){
      array_splice($url, 0, 2);
      $_GET = $url; //Establece la información en una variable global.
    }

    $this->setController($controllerName);
    $this->setLayout($controllerName);
    $this->setMethod($method);
  }

  /**
   * Establece el controlador.
   */
  private function setController(string $controllerName): void{
    $this->controllerName = $controllerName;

    $controllerLoc = "../App/Http/Controllers/" . $controllerName . ".php";

    if (!is_readable($controllerLoc)) { //No se pudo acceder al archivo del controlador o no existe.
      header("Location: ..", true); //Redirecciona a la página principal.
      return;
    }

    $controllerLoc = "App\Http\Controllers\\{$controllerName}";

    $viewName = str_replace("Controller", "", $controllerName);
    $viewLoc = "Views\\{$viewName}View";

    $this->controller = $controllerLoc;
    $this->view = $viewLoc;
  }

  /**
   * Establece el método.
   */
  private function setMethod(string $method = ""): void{
    if ($method == "") {
      $this->method = "default";
    } else {
      $this->method = $method;
    }
  }

  /**
   * Establece el layout.
   */
  private function setLayout(string $controllerName = ""): void{
    $layoutLoc = "../Views/Layouts/" . strtolower(str_replace("Controller", "", $controllerName)) . "_layout.php";

    if (!is_readable($layoutLoc)) {
      $layoutLoc = "";
    }

    $this->layout = $layoutLoc;
  }

  /**
   * Carga la página principal
   */
  private function setMainPage(): void{
    $this->setController("HomeController");
    $this->setLayout("home");
    $this->setMethod("");
  }

  /**
   * Carga una página por un controlador.
   */
  private function loadPage($controller): void{

    if ($_SERVER['REQUEST_METHOD'] != "POST") {
      $method = $this->method;

      
      try{
        $data = $controller->$method();
      }catch(\Error $ex){
        header("Location: ..", true);
      }

      $view = new $this->view;
      $htmlView = $view->render($data);

      $response = new Response();
      $response->send($htmlView, $this->layout);
    }else{
      $postClassName = "App\Http\Controllers\Post\\".$this->controllerName."Post";
      new PostManager($postClassName, $controller);
    }
  }

  /**
   * Manda la información una vez recogida y se encarga de cargar la misma.
   */
  public function send(): void{

    if(($this->layout == "") && (is_null($_GET)) && ($_SERVER['REQUEST_METHOD'] == "GET")){
      header("Location: ..", true);
    } 

    $controller = new $this->controller();

    //EN CASO DE QUE EL CONTROLADOR REQUIERA UN PERMISO ESPECIFICO PARA EJECUTARLO, LO COMPROBAMOS.
    if ($controller->getRequiredPermission() != "") {
      $userEmail = isset($_SESSION['user']) ? $_SESSION['user'] : null;
      if ($userEmail == null) { //No existe un usuario logueado en la sesión.
        header("Location: ..", true);
        return;
      }

      $permissionController = new PermissionController(false, $controller->getConnection());
      //Verifica si el usuario en concreto tiene el permiso requerido para acceder a la página
      if ($permissionController->hasPermission($userEmail, $controller->getRequiredPermission())) { 
        $this->loadPage($controller);
      } else {
        header("Location: ..", true);
        return;
      }
    }

    $this->loadPage($controller);
  }
}
