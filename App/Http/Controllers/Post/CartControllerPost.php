<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Carrito.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Utility\Messages\Message;
use Utility\UserUtils;
use Utility\Utils;

class CartControllerPost extends PostManager{

  private CartController $controller;
  
  public function __construct(CartController $controller){
    $this->controller = $controller;
  }

  /**
   * Crea un carrito vacio para un usuario.
   */
  public function createCart(){
    $answer = $this->controller->createEmptyCart($_SESSION['user'], true);

    if($answer == null){
      echo "El usuario ya cuenta con un carrito.";
    }else{
      echo "Carrito creado con éxito.";
    }
  }

  /**
   * Borra el carrito del usuario logueado.
   */
  public function deleteCart(): void{
    $answer = $this->controller->removeCartByOwnerEmail($_SESSION['user']);

    if($answer == null){
      echo "El usuario no cuenta con un carrito.";
    }else{
      echo Message::DatabaseSuccess->message();
    }
  }

  /**
   * Crea una orden con el carrito del usuario logueado.
   */
  public function createOrder(): void{
    $answer = $this->controller->createOrderByOwnerEmail($_SESSION['user']);

    if($answer == false){
      echo Message::DatabaseFailure->message();
      return;
    }
    echo $answer;
  }

  /**
   * Añade un producto de la lista de productos top a el carrito.
   */
  public function addTopProductToCart(): void{
    if(!UserUtils::validateSession()){
      echo Message::DatabaseFailure->message();
      return;
    }

    $cartId = $this->controller->getCartByOwner($_SESSION['user']);

    if($cartId == null){
      $cartId = $this->controller->createEmptyCart($_SESSION['user'], true);
    }

    $productId = $_POST['productId'];
    $productAmount = isset($_POST['productAmount']) ? $_POST['productAmount'] : 1;

    $response = $this->controller->addProductToCart($productId, $productAmount, $cartId);

    if($response){
      echo $productAmount;
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Obtiene los productos del carrito.
   */
  public function loadCartContents(): void{
    if(!UserUtils::validateSession()){
      echo Message::DatabaseFailure->message();
      return;
    }

    $cartId = $this->controller->getCartByOwner(UserUtils::getSession());
    if($cartId == null){
      echo Message::DatabaseFailure->message();
      return;
    }

    $cartContents = $this->controller->getCartContents($cartId);

    if($cartContents == null){
      echo Message::DatabaseFailure->message();
      return;
    }

    if(count($cartContents) == 0){
      echo Message::DatabaseFailure->message();
      return;
    }

    $cartItems = array();
    $productController = new ProductController(false, $this->controller->getConnection());

    foreach($cartContents as $cartItem){
      $product = $productController->getProduct($cartItem->getProductId());

      $productImage = $product->getImage();
      $productName = $product->getName();
      $productAmount = $cartItem->getProductAmount();

      array_push($cartItems, ["productName" => $productName, "productAmount" => $productAmount, "productImage" => "/Images/Products/".$product->getId()."/".$productImage]);
    }

    echo Utils::arrayToJson($cartItems);
  }

  /**
   * Devuelve la cantidad de objetos en el carrito.
   */
  public function countProductsInCart(){
    if(!UserUtils::validateSession()){
      echo 0;
      return;
    }

    $cartId = $this->controller->getCartByOwner(UserUtils::getSession());

    if($cartId == null){
      echo 0;
      return;
    }

    $cartContents = $this->controller->getCartContents($cartId);

    if($cartContents == null){
      echo 0;
      return;
    }

    $totalAmount = 0;

    if(count($cartContents) == 0){
      echo $totalAmount;
      return;
    }

    foreach($cartContents as $cartItem){
      $totalAmount += $cartItem->getProductAmount();
    }

    echo $totalAmount;
  }
}