<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Archivo index que llama a la clase App
 * 
 * Fecha de modificación: 7/7/2022
 */

error_reporting( E_ALL );
ini_set( "display_errors", 1 ); //DISPLAY ERRORS

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\Http\App;

http_response_code(200); //WE HANDLE THE ERROR IN THE APP, SO NO 404 ERROR IS GIVEN.

$app = new App();

$app->send();
?>