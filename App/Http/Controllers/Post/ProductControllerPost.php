<?php
/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar las peticiones POST de Producto.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers\Post;

use App\Http\Controllers\ProductController;
use App\Models\ProductModel;
use Utility\Messages\Message;
use Utility\UserUtils;
use Utility\Utils;

class ProductControllerPost extends PostManager{

  private ProductController $controller;
  
  public function __construct(ProductController $controller){
    $this->controller = $controller;
  }

  /**
   * Añade un producto.
   */
  public function addProduct(): void{
    $product = new ProductModel();
    $product->setName($_POST['AddnombreProducto']); // name
    $product->setPrice($_POST['AddPrecioProducto']); // price
    $product->setDescription($_POST['AddDescripcionProducto']); // description
    $product->setDiscount($_POST['AddDescuentoProducto']); // discount
    $product->setRate(1); // rate
    $product->setStock($_POST['AddStockProducto']); // stock
    $product->setModule($_POST['AddCategoriaProducto']); // módulo.

    $result = $this->controller->addProduct($product);
    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un producto.
   */
  public function removeProduct(): void{
    $result = "";

    if(isset($_POST['ReIdProducto'])){
      $result = $this->controller->removeProduct($_POST['ReIdProducto']);
    }else{
      $result = $this->controller->removeProduct($_POST['productId']);
    }

    $this->controller->closeConnection();

    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Obtiene un producto.
   */
  public function getProduct(): void{
    $product = $this->controller->getProduct($_POST['id']);
      
    $this->controller->closeConnection();
    
    echo json_encode($product->toArray());
  }

  /**
   * Valida la existencia un producto.
   */
  public function validateProduct(): void{
    $product = $this->controller->getProduct($_POST['ActAccesoProducto']);

    $this->controller->closeConnection();
    if($product == null){
      echo Message::DatabaseFailure->message();
    }else{
      echo json_encode($product->toArray());
    }
  }

  /**
   * Actualiza un producto.
   */
  public function updateProduct(): void{
    $product = new ProductModel();
    $product->setId($_POST['id']);
    $product->setName($_POST['ActnombreProducto']);
    $product->setPrice($_POST['ActPrecioProducto']);
    $product->setDescription($_POST['ActDescripcionProducto']);
    $product->setDiscount($_POST['AddDescuentoProducto']);
    $product->setStock($_POST['AddStockProducto']);
    $product->setModule($_POST['AddCategoriaProducto']);

    $result = $this->controller->updateProduct($product);
    
    if($result){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Devuelve los 9 productos con mayores estrellas.
   */
  public function topStarProducts(): void{
    $topProducts = $this->controller->getTopStarsProducts();

    if($topProducts == null) return;

    $cleanProductInfo = array();

    foreach($topProducts as $product){
      array_push($cleanProductInfo, $product->toArray());
    }
      
    $json = json_encode($cleanProductInfo)."\n";
    echo $json;

    $this->controller->closeConnection();
  }

  /**
   * Busca productos por letras.
   */
  public function searchProductsByLetter(): void{
    $products = $this->controller->getProductsName($_POST['text']);

    if($products == null) return;

    $cleanProductsList = "";

    foreach($products as $p){
      $productName = $p['name'];
      $productId = $p['id'];
      $cleanProductsList .= "<li><a href='/Product/get/$productId'><i class='fas fa-search'></i>$productName</a></li> ";
    }

    echo $cleanProductsList;

    $this->controller->closeConnection();
  }

  /**
   * Añade un producto a favoritos del usuario logueado..
   */
  public function addFavouriteProduct(): void{
    $productId = $_POST['productId'];
    $userId = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    if($userId == null){
      echo Message::DatabaseFailure->message();
      return;
    }

    $resul = $this->controller->addFavouriteProduct($productId, $userId);

    if($resul){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Remueve un producto a favoritos del usuario logueado..
   */
  public function removeFavouriteProduct(): void{
    $productId = $_POST['productId'];
    $userId = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    if($userId == null){
      echo Message::DatabaseFailure->message();
      return;
    }

    $resul = $this->controller->removeFavouriteProduct($productId, $userId);

    if($resul){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Establece estrellas a un producto.
   */
  public function setStarsToProduct(): void{
    $productId = $_POST['productId'];
    $starsAmount = $_POST['starsAmount'];
    $userId = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    if($userId == null){
      echo Message::DatabaseFailure->message();
      return;
    }

    $resul = $this->controller->setStarsToProduct($productId, $userId, $starsAmount);

    if($resul){
      echo Message::DatabaseSuccess->message();
    }else{
      echo Message::DatabaseFailure->message();
    }
  }

  /**
   * Muestra la cantidad de productos registrados.
   */
  public function productCounter(): void{
    echo $this->controller->getProductsAmount();
  }

  /**
   * Lista los productos (paginado).
   */
  public function listProductsAdmin(): void{
    $this->controller->paginatedTableInfo("listProducts", "getProductsAmount");
  }

  /**
   * Carga los products favoritos.
   */
  public function loadFavouriteContents(): void{
    if(!UserUtils::validateSession()){
      echo Message::DatabaseFailure->message();
      return;
    }

    $favProducts = $this->controller->userGetFavourites(UserUtils::getSession());
    
    if($favProducts == null){
      echo Message::DatabaseFailure->message();
      return;
    }

    $favItems = [];

    foreach($favProducts as $product){
      $productName = $product->getName();
      $productDescription = $product->getDescription();
      $productImage = "/Images/Products/".$product->getId()."/355x240.png";

      array_push($favItems, ["productName" => $productName, "productDescription" => $productDescription, "productImage" => $productImage]);
    }

    echo Utils::arrayToJson($favItems);
  }

  /**
   * Carga productos de forma dinámica en la página de todos los productos.
   */
  public function listProductsByPosition(): void{
    $position = $_POST['position'];
    
    $min = ($position*3)-3;
    $max = 3;

    $result = $this->controller->listProducts($min, $max);

    if($result == null){
      echo json_encode("Null.");
      return;
    }

    echo Utils::arrayToJson($result);
  }
}