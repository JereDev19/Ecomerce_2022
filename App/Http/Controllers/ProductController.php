<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de productos.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Utility\UserUtils;
use Utility\Utils;

class ProductController extends Controller{

  private string $productsTable = "Products";
  private string $favProductsTable = "FavouriteProducts";
  private string $productsStarsTable = "ProductsStars";
  private string $imagesPath = "../public/Images/Products/"; //Dirección donde se encuentran las imágenes guardadas en el servidor.

  /**
   * Añade un producto a la base de datos.
   */
  public function addProduct(ProductModel $product): bool{

    $product->setId(uniqid("pd_", true));
        
    $sql = "SELECT id FROM $this->productsTable WHERE id = '".$product->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe un producto con ese id.

    $result->free();

    $imageName = $_FILES['image']['name'];
    $tmpImageName = $_FILES['image']['tmp_name'];

    $product->setImage($imageName);
    
    $imageType = null;
    if(str_contains($imageName, ".png")){
      $imageType = "png";
    }else if(str_contains($imageName, ".jpeg")){
      $imageType = "jpeg";
    }

    $response = Utils::savePicture(
      $this->imagesPath.$product->getId(),
      $this->imagesPath.$product->getId()."/".$imageName,
      $tmpImageName,
      $imageType
    );

    if(!$response) return false; //Ha habido un error con la subida de la imágen.

    $id = $product->getId();
    $name = $product->getName();
    $price = $product->getPrice();
    $description = $product->getDescription();
    $discount = $product->getDiscount();
    $stock = $product->getStock();
    $image = $product->getImage();
    $module = $product->getModule();

    $sql = "INSERT INTO $this->productsTable VALUES(
      '$id',
      '$name',
      $price,
      '$description',
      $discount,
      $stock,
      '$image',
      '$module'
      )";
            
    $this->connection->query($sql);

    return true;
  }

  /**
   * Remueve un producto.
   */
  public function removeProduct(string $productId): bool{

    $sql = "SELECT id FROM $this->productsTable WHERE id = '".$productId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un producto con ese id.

    $dir = $this->imagesPath.$productId;

    Utils::removeDir($dir);

    $sql = "DELETE FROM $this->productsTable WHERE id= '".$productId."'";

    $this->connection->query($sql);

    $result->free();

    return true;
  }
  
  /**
   * Muestra una lista con todos los productos.
   */
  public function listProducts(int $minPos = 0, int $maxPos = 0): array|null{

    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->productsTable";
    }else{
      $sql = "SELECT * FROM $this->productsTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No hay productos guardados.

    $products = array();

    while($row = $result->fetch_object('App\Models\ProductModel')){
      $stars = $this->getStarsFromProduct($row->getId());
      $row->setRate($stars);
      array_push($products, $row);
    }

    $result->free();

    return $products;
  }

  /**
   * Obtiene los 3 productos con más estrellas
   */
  public function getTopStarsProducts(): array|null{
    $products = $this->listProducts();

    if($products == null) return null;

    if(count($products) <= 3){
      return $products;
    }

    $topStars = array(); //Aqui se irán guardando los de mayores estrellas

    for($i = 0;$i<3;$i++){ //Guarda los primeros tres productos del array para luego sustituir.
      array_push($topStars, $products[$i]);
      unset($products[$i]);
    }

    foreach($products as $product){ 

      for($i = 0;$i<count($topStars);$i++){

        $topProduct = $topStars[$i];

        if($product->getRate() > $topProduct->getRate()){
          unset($topStars[$i]);
          $topStars = array_values($topStars); //Para re acomodar los index.
          array_push($topStars, $product);
          break;
        }
      }
      
    }

    return $topStars;
  }

  /**
   * Obtiene los productos que más se parezcan a la string pasada.
   */
  public function getProductsName(string $name): array|null{
    $sql = "SELECT id, name FROM $this->productsTable WHERE name LIKE '$name%' LIMIT 5";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No encuentra ningún producto con similar nombre.

    $products = array();

    while($row = $result->fetch_assoc()){
      array_push($products, $row);
    }

    $result->free();

    return $products;
  }

  /**
   * Obtiene un producto en específico.
   */
  public function getProduct(string $id): ProductModel|null{

    $sql = "SELECT * FROM $this->productsTable WHERE id = '".$id."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe un producto con ese id.

    $product = $result->fetch_object('App\Models\ProductModel');

    $stars = $this->getStarsFromProduct($product->getId());
    $product->setRate($stars);

    $result->free();

    return $product;
  }

  /**
   * Busca un producto en específico de la url
   */
  public function get(): string{
    $productId = isset($_GET[0]) ? $_GET[0] : null;
    
    if($productId == null){
      Utils::redirectTo("", 0);
      return "";
    }

    $product = $this->getProduct($productId);
    if($product == null){
      Utils::redirectTo("", 0);
      return "";
    }

    $info = $product->toArray();
    if(UserUtils::validateSession()){
      $userHasFav = $this->userHasFavourite($product->getId(), $_SESSION['user']);
      if($userHasFav){
        $info = array_merge($info, ['heartColor' => 'orange']);
      }else{
        $info = array_merge($info, ['heartColor' => 'transparent']);
      }

      $info = array_merge($info, ['starsAmount' => $this->getStarsFromProductByUser($product->getId(), UserUtils::getSession())]);
    }

    return "require=specific-product_layout.php=".json_encode($info);
  }

  /**
   * Actualiza la información de un producto.
   */
  public function updateProduct(ProductModel $product): bool{

    $imageName = $_FILES['image']['name'];
    $tmpImageName = $_FILES['image']['tmp_name'];

    if(isset($imageName) && $imageName != ""){
      $product->setImage($imageName);

      $dir = $this->imagesPath.$product->getId();

      Utils::removeDir($dir);

      $imageType = null;
      if(str_contains($imageName, ".png")){
        $imageType = "png";
      }else if(str_contains($imageName, ".jpeg")){
        $imageType = "jpeg";
      }

      Utils::savePicture(
        $this->imagesPath.$product->getId(),
        $this->imagesPath.$product->getId()."/".$imageName,
        $tmpImageName,
        $imageType
      );
    }

    $id = $product->getId();
    $name = $product->getName();
    $price = $product->getPrice();
    $description = $product->getDescription();
    $discount = $product->getDiscount();
    $stock = $product->getStock();
    $image = $product->getImage();
    $module = $product->getModule();

    $sql = "UPDATE $this->productsTable SET
    id = '$id',
    name = '$name',
    price = '$price',
    description = '$description',
    discount = '$discount',
    stock = '$stock',
    module = '$module'";

    if($image != ""){
      $sql .= ", image = '$image'";
    }

    $sql .= " WHERE id = '$id'";
            
    return $this->connection->query($sql);
  }

  /**
   * Actualiza la cantidad de productos.
   */
  public function updateStock(string $productId, int $newProductStock): bool{
    $sql = "SELECT id, stock FROM $this->productsTable WHERE id = '".$productId."'";
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe un producto con ese id.

    $productStock = $result->fetch_assoc()['stock'];
    $newProductStock = $productStock-$newProductStock;
    if($newProductStock < 0){
      return false; //No puede tener menos de 0.
    }

    $sql = "UPDATE $this->productsTable SET stock = '$newProductStock' WHERE id = '{$productId}'";
    $this->connection->query($sql);
    return true;
  }

  /**
   * Obtiene la dirección de las imágenes.
   */
  public function getImagesPath(): string{
    return $this->imagesPath;
  }

  /**
   * Obtiene la cantidad de productos registrados en
   * la base de datos.
   */
  public function getProductsAmount(): int{
    $sql = "SELECT count(id) FROM Products";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ningún producto guardado.

    return $result->fetch_column();
  }

  /**
   * Añade un producto a favoritos de un usuario.
   */
  public function addFavouriteProduct(string $productId, string $userEmail): bool{
    if($this->userHasFavourite($productId, $userEmail)) return false; //Ya lo tiene como favorito.

    $sql = "INSERT INTO $this->favProductsTable (userEmail, productId) VALUES (
      '".$userEmail."',
      '".$productId."'
    )";
            
    $this->connection->query($sql);
    return true;
  }

  /**
   * Remueve un producto de favoritos de un usuario.
   */
  public function removeFavouriteProduct(string $productId, string $userEmail): bool{
    if(!$this->userHasFavourite($productId, $userEmail)) return false; //No lo tiene como favorito.

    $sql = "DELETE FROM $this->favProductsTable WHERE productId = '".$productId."' AND userEmail = '".$userEmail."'";
    $this->connection->query($sql);

    return true;
  }

  /**
   * Verifica si el usuario tiene ese producto como favorito.
   */
  public function userHasFavourite(string $productId, string $userEmail): bool{
    $sql = "SELECT productId FROM $this->favProductsTable WHERE productId = '".$productId."' AND userEmail = '".$userEmail."'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //Retorna falso si el usuario no tiene ese producto como favorito.

    $result->free();
    return true;
  }

  /**
   * Obtener todos los favoritos del usuario.
   */
  public function userGetFavourites(string $userEmail): array|null{
    $sql = "SELECT productId FROM $this->favProductsTable WHERE userEmail = '$userEmail'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //Retorna falso si el usuario no tiene productos favoritos.

    $productsId = [];

    while($row = $result->fetch_assoc()){
      array_push($productsId, $row['productId']);
    }

    $sql = "SELECT id, name, description FROM $this->productsTable WHERE ";

    $products = array();
    $counter = 0;
    
    foreach($productsId as $id){
      if($counter == 0){
        $sql .= "id = '$id'";
      }
      else{
        $sql .= " OR id = '$id' ";
      }

      $counter++;
    }

    $result = $this->connection->query($sql);

    if(count($productsId) != $result->num_rows){
      foreach($productsId as $id){
        $sql = "SELECT id FROM $this->productsTable WHERE id = '$id'";
        $exists = $this->connection->query($sql);

        if($exists->num_rows == 0){
          $this->removeFavouriteProduct($id, $userEmail);
          unset($productsId[$id]);
        }
        $exists->free();
      }
    }

    while($row = $result->fetch_object('App\Models\ProductModel')){
      $stars = $this->getStarsFromProduct($row->getId());
      $row->setRate($stars);
      array_push($products, $row);
    }
    $result->free();

    return $products;
  }

  /**
   * Establece estrellas a un producto.
   */
  public function setStarsToProduct(string $productId, string $userEmail, int $starsAmount): bool{
    $sql = "SELECT productId FROM $this->productsStarsTable WHERE productId = '".$productId."' AND userEmail = '".$userEmail."'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0){ //El usuario no ha establecido previamente un voto a este producto.
      $sql = "INSERT INTO $this->productsStarsTable VALUES (
        '$productId',
        '$userEmail',
        $starsAmount
      )";
      $this->connection->query($sql);
      return true;
    }

    $sql = "UPDATE $this->productsStarsTable SET stars = $starsAmount WHERE productId = '".$productId."' AND userEmail = '".$userEmail."'";
    $this->connection->query($sql);
    return true;
  }

  /**
   * Obtiene cuántas estrellas le ha dado un usuario específico a un producto.
   */
  public function getStarsFromProductByUser(string $productId, string $userEmail): int{
    $sql = "SELECT stars FROM $this->productsStarsTable WHERE productId = '".$productId."' AND userEmail = '".$userEmail."'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No le ha dado un voto aún.

    $stars = $result->fetch_column();

    return intval($stars);
  }

  /**
   * Obtiene la cantidad de estrellas totales del producto.
   */
  public function getStarsFromProduct(string $productId, bool $checkProduct = false): int{
    if($checkProduct){
      if($this->getProduct($productId) == null) return 0;
    }

    $sql = "SELECT stars FROM $this->productsStarsTable WHERE productId = '".$productId."'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No tiene votos.

    $starsAmount = 0;

    while($row = $result->fetch_column()){
      $starsAmount += intval($row);
    }

    return round($starsAmount/$result->num_rows);
  }

  /**
   * Carga la página de favoritos.
   */
  public function favourites(): string{
    if(!UserUtils::validateSession()){
      Utils::redirectTo("", 0);
      return "";
    }
    $user = UserUtils::getSession();

    if(!UserUtils::validateSession()){
      return "require=Favourite/favourite_layout.php=".json_encode(['products' => ""]);
    }

    $favProducts = $this->userGetFavourites($user);

    if($favProducts == null) return "require=Favourite/favourite_layout.php=".json_encode(['products' => ""]);
    $products = "";

    foreach($favProducts as $product){
      $productName = $product->getName();
      $productDescription = $product->getDescription();
      $productRate = $product->getRate();
      $productImage = "/Images/Products/".$product->getId()."/60x60.png";

      $products .= "<tr>
      <th scope='row'> $productName </th>
      <td>$productDescription</td>
      <td>$productRate</td>
      <td> <img src='$productImage'></td>
      </tr>";
    }

    return "require=Favourite/favourite_layout.php=".json_encode(['products' => $products]);
  }

  /**
     * Carga la página donde se ven todos los productos.
     */
    public function search(): string{
      return "require=Products/products_layout.php";
    }
}

?>