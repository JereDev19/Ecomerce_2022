<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase que crea una opción de logo para QR con imagen.
 * 
 * Fecha de modificación: 27/10/2022
 */


declare(strict_types=1);

namespace Utility\QR;

use chillerlan\QRCode\QROptions;

class LogoOptions extends QROptions{
  protected int $logoSpaceWidth;
  protected int $logoSpaceHeight;
}