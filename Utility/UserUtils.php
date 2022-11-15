<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase que contiene metodos útiles a utilizar de usuarios en todo el programa.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace Utility;

class UserUtils{

  /**
   * Establece la sesión de usuario.
   */
  public static function setSession(string $userMail): void{
    $_SESSION['user'] = $userMail;
  }

  /**
   * Devuelve el correo del usuario logueado.
   */
  public static function getSession(): string{
    return $_SESSION['user'];
  }

  /**
   * Verifica si el usuario tiene el permiso de administrador.
   */
  public static function isAdmin(): bool{
    return isset($_SESSION['isAdmin']);
  }

  /**
   * Verifica si un usuario está logueado.
   */
  public static function validateSession(): bool{
    return isset($_SESSION['user']);
  }

}

?>