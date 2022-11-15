<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Modelo de el carrito.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Models;

class CartModel extends Model{

  private string $cartId;
  private string $productId;
  private int $productAmount;

  /**
   * Obtiene el id del carrito.
   */ 
  public function getCartId(): string{
    return $this->cartId;
  }

  /**
   * Establece el valor del id del carrito.
   */ 
  public function setCartId(string $cartId): void{
    $this->cartId = $cartId;
  }

  /**
   * Obtiene el id del producto.
   */ 
  public function getProductId(): string{
    return $this->productId;
  }

  /**
   * Establece el id del producto.
   */ 
  public function setProductId(string $productId): void{
    $this->productId = $productId;
  }

  /**
   * Obtiene la cantidad de productos.
   */ 
  public function getProductAmount(): int{
    return $this->productAmount;
  }

  /**
   * Establece la cantidad de productos.
   */ 
  public function setProductAmount(int $productAmount): void{
    $this->productAmount = $productAmount;
  }

  /**
   * Función por default.
   */
  public function toArray(): array{
    return array(
      "cartId" => $this->cartId,
      "productId" => $this->productId,
      "productAmount" => $this->productAmount
    );
  }
}

?>