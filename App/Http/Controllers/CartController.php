<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Clase la cual se encarga de manejar el carrito.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Utility\UserUtils;
use Utility\Utils;

class CartController extends Controller{

  private string $cartsTable = "Carts";
  private string $cartsContentTable = "CartsContent";

  /**
   * Crea un carrito vacio.
   */
  public function createEmptyCart(string $ownerEmail, bool $checkForUser): string|null{
    //Revisar si el usuario ya cuenta con un carrito
    if($checkForUser){
      if($this->userHasCart($ownerEmail)) return null; //El Usuario ya cuenta con un carrito.
    }

    $cartId = uniqid("cart_", true);

    $sql = "SELECT cartId FROM {$this->cartsTable} WHERE cartId = '{$cartId}' ";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return $this->createEmptyCart($ownerEmail, false); //Seguir intentado hasta que se logre crear un id que no exista.

    $result->free();

    $sql = "INSERT INTO {$this->cartsTable} VALUES(
      '$cartId',
      '$ownerEmail'
      )";

    $result = $this->connection->query($sql);

    return $cartId;
  }

  /**
   * Borra el carrito con su id.
   */
  public function removeCartById(string $cartId): bool{
    $sql = "SELECT cartId FROM {$this->cartsTable} WHERE cartId = '$cartId'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //Retorna falso si no existe un carrito con ese id.
    $result->free();

    $sql = "DELETE FROM {$this->cartsTable} WHERE cartId = '$cartId'";

    $this->connection->query($sql);

    $sql = "DELETE FROM {$this->cartsContentTable} WHERE cartId = '$cartId'";

    $this->connection->query($sql);

    return true;
  }

  /**
   * Borra el carrito especificando el dueño.
   */
  public function removeCartByOwnerEmail(string $ownerEmail): bool{
    if(!$this->userHasCart($ownerEmail)) return false; //Retorna falso si no existe un carrito perteneciente a ese usuario.

    return $this->removeCartById($this->getCartByOwner($ownerEmail));
  }

  /**
   * Añade un producto al carrito.
   */
  public function addProductToCart(string $productId, int $amount, string $cartId): bool{
    $sql = "SELECT cartId FROM {$this->cartsTable} WHERE cartId = '$cartId'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //Retorna falso si no existe un carrito con ese id.

    //TODO REVISAR SI EXISTE EL PRODUCTO TAMBIÉN (PRODUCTCONTROLLER).
    $result->free();

    //REVISAR SI EXISTE EL PRODUCTO EN ESE MISMO CARRITO.
    $sql = "SELECT productId, productAmount FROM {$this->cartsContentTable} WHERE productId = '$productId' AND cartId = '$cartId'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0){
      $object = $result->fetch_assoc();

      $newAmount = $object['productAmount'];
      $newAmount += $amount;

      $sql = "UPDATE {$this->cartsContentTable} SET productAmount = '$newAmount' WHERE cartId = '$cartId'";
      $this->connection->query($sql);
      return true;
    }

    $result->free();

    $sql = "INSERT INTO {$this->cartsContentTable} VALUES(
      '$cartId',
      '$productId',
      $amount
      )";

    $this->connection->query($sql);
    return true;
  }

  /**
   * Remueve un producto del carrito.
   * En caso de que $amount sea igual a 0, el producto se eliminará por completo, sin importar la cantidad.
   */
  public function removeProductFromCart(string $productId, string $cartId, int $amount = 0,): bool{
    $sql = "SELECT cartId FROM {$this->cartsTable} WHERE cartId = '$cartId'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //Retorna falso si no existe un carrito con ese id.

    $sql = "DELETE FROM {$this->cartsContentTable} WHERE productId = '$productId' AND cartId = '$cartId'";

    //TODO BORRAR LA CANTIDAD REQUERIDA.
    $this->connection->query($sql);

    return true;
  }

  /**
   * Crear una órden con los productos del carrito con el email del dueño del carrito.
   */
  public function createOrderByOwnerEmail(string $ownerEmail): string|bool{
    if(!$this->userHasCart($ownerEmail)) return false; //No tiene un carrito.
    return $this->createOrderById($this->getCartByOwner($ownerEmail), $ownerEmail);
  }

  /**
   * Crear una órden con los productos del carrito con el id del carrito.
   */
  public function createOrderById(string $cartId, string $cartOwner): string|bool{

    $cartContents = $this->getCartContents($cartId);

    $productsAndAmount = array();
    $orderCost = 0;

    $productController = new ProductController(false, $this->getConnection());

    foreach($cartContents as $content){
      $product = $productController->getProduct($content->getProductId());

      $orderCost += $product->getPrice()*$content->getProductAmount();

      array_push($productsAndAmount, [$product->getId(), $content->getProductAmount()]);
    }
    
    $orderController = new OrderController(false, $this->getConnection());

    $order = new OrderModel();
    $order->setName("Orden creada por el carrito.");
    $order->setEvent("null");
    $order->setDate('now');
    $order->setPrice($orderCost);
    $order->addProducts($productsAndAmount);
    $order->setUserEmail($cartOwner);

    $orderAdded = $orderController->addOrder($order);

    if($orderAdded == false) return false;

    $this->removeCartById($cartId); //Una vez completado el pedido borramos el carrito.

    return $orderAdded;
  }

  /**
   * Obtiene los contenidos de un carrito
   */
  public function getCartContents(string $cartId): array|null{
    $sql = "SELECT * FROM {$this->cartsContentTable} WHERE cartId = '$cartId'";

    $result = $this->connection->query($sql);
    if($result->num_rows == 0) return null; //Retorna falso si no existe contenido relacionado con ese carrito.

    $products = array();

    while($row = $result->fetch_object('App\Models\CartModel')){
      array_push($products, $row);
    }

    $result->free();

    return $products;
  }

  /**
   * Verifica si existe algún carrito perteneciente al correo especificado.
   */
  public function userHasCart(string $ownerEmail): bool{
    $response = $this->getCartByOwner($ownerEmail);

    if($response == null) return false;
    return true;
  }

  /**
   * Obtiene el id del carrito perteneciente al usuario.
   */
  public function getCartByOwner(string $ownerEmail): string|null{
    $sql = "SELECT cartId FROM {$this->cartsTable} WHERE ownerEmail = '$ownerEmail'";

    $result = $this->connection->query($sql);
    if($result->num_rows == 0) return null; //Retorna falso si no existe un carrito perteneciente a ese usuario.
    return $result->fetch_array()[0];
  }

  /**
   * Carga el layout de el carito.
   */
  public function contents(): string{
    if(!UserUtils::validateSession()){
      Utils::redirectTo("", 0);
      return "";
    }
    $user = UserUtils::getSession();

    if(!UserUtils::validateSession()){
      return "require=Cart/cart_layout.php=".json_encode(["products" => "", "orderPrice" => 0]);
    }

    $cartId = $this->getCartByOwner($user);

    if($cartId == null) return "require=Cart/cart_layout.php=".json_encode(["products" => "", "orderPrice" => 0]);

    $cart = $this->getCartContents($cartId);

    if($cart == null) return "require=Cart/cart_layout.php=".json_encode(["products" => "", "orderPrice" => 0]);

    $productController = new ProductController(false, $this->getConnection());

    $products = "";
    $totalOrderPrice = 0;

    foreach($cart as $item){
      $product = $productController->getProduct($item->getProductId());

      if($product == null){
        $this->removeProductFromCart($item->getProductId(), $cartId);
        continue;
      }

      $productName = $product->getName();
      if($product->getDiscount() >= 100){
        $pricePerProduct = 0;
      }else{
        $pricePerProduct = $product->getPrice()-(($product->getPrice()*$product->getDiscount())/100);
      }
      $productAmount = $item->getProductAmount();
      $totalPrice = $pricePerProduct * $productAmount;

      $totalOrderPrice += $totalPrice;

      $products .= "<tr>
       <th scope='row'> $productName </th>
       <td>$pricePerProduct</td>
       <td>$productAmount</td>
       <td>$totalPrice</td>
       </tr>";
    }

    return "require=Cart/cart_layout.php=".json_encode(["products" => $products, "orderPrice" => $totalOrderPrice]);
  }
}

?>