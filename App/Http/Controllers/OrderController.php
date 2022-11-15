<?php

/**
 * Autor: Hiojam Rodríguez.
 * Descripción: Controlador de órdenes.
 * 
 * Fecha de modificación: 27/10/2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use chillerlan\QRCode\QRCode;
use Utility\QR\LogoOptions;
use Utility\QR\QRImageWithLogo;

use Twilio\Rest\Client; 

class OrderController extends Controller{

  private string $orderTable = "Orders";
  private string $orderContentTable = "OrdersContent";

  /**
   * Añade una orden a la base de datos.
   */
  public function addOrder(OrderModel $order): string|bool{
    $order->setId(uniqid("ord_", true));

    $sql = "SELECT id FROM $this->orderTable WHERE id = '".$order->getId()."'";

    $result = $this->connection->query($sql);

    if($result->num_rows > 0) return false; //Ya existe una orden con ese id.

    $result->free();

    $id = $order->getId();
    $name = $order->getName();
    $event = $order->getEvent();
    $date = $order->getDate()->format("Y-m-d H:i:s");
    $price = $order->getPrice();
    $owner = $order->getUserEmail();

    $sql = "INSERT INTO $this->orderTable VALUES(
      '$id',
      '$name',
      '$event',
      '$date',
      $price,
      '$owner'
      )";

    $this->connection->query($sql);

    if($order->getProducts() == null) return true; //En caso de que no contenga productos retornar.

    $sql = "INSERT INTO $this->orderContentTable VALUES ";

    $productList = $order->getProducts();

    $productCount = count($productList);

    $productController = new ProductController(false, $this->getConnection());

    for($i=0;$i<$productCount;$i++){
      $productId = $productList[$i][0];
      $productAmount = $productList[$i][1];

      $result = $productController->updateStock($productId, $productAmount);

      if(!$result){
        return false; //La cantidad de stock no es suficiente.
      }

      if($i+1 != $productCount){
        $sql .= "('$id', '$productId', '$productAmount'), ";
      }else{
        $sql .= "('$id', '$productId', '$productAmount');";
      }
      
    }

    $this->connection->query($sql);

    //Mandar un correo al usuario.
    $emailController = new EmailController(false, $this->getConnection());

    $subject = "Confirmacion de compra";
    $body = "<h1>Gracias por su compra</h1> <br> <p>Puede revisar su factura en el siguiente link o descargar el archivo adjunto. <br>
     https://infinuslight.com/Order/get/".$id."</p>";
    $altBody = "Gracias por su compra \n Puede revisar su factura en el siguiente link o descargar el archivo adjunto. \n https://infinuslight.com/Order/get/".$id."";

    $emailController->sendEmail($owner, $subject, $body, $altBody);

    //Mandar un mensaje de WhatsApp. (Requiere un número autorizado por WhatsApp Bussiness).
     
    /*
    $sid    = "ACae72a227a2bc67b04cd48105dd29d4c1"; 
    $token  = require("../twilio_token.php");

    $twilio = new Client($sid, $token); 
     
    $message = $twilio->messages 
    ->create("whatsapp:+59898861380", // to 
      array( 
        "from" => "whatsapp:+19016575282",       
        "body" => "InfinusLight \n Tu orden ha sido creada éxitosamente. Entra a este link para acceder a tu factura: https://infinuslight.com/Order/get/".$id.""
      ) 
    ); 
     
    print($message->sid);*/
    return $id;
  }

  /**
   * Remueve una orden de la base de datos.
   */
  public function removeOrder(string $orderId): bool{
    $sql = "SELECT id FROM $this->orderTable WHERE id = '".$orderId."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return false; //No existe una orden con ese id.

    $result->free();

    $sql = "DELETE FROM $this->orderTable WHERE id= '".$orderId."'";

    $this->connection->query($sql);

    $sql = "DELETE FROM $this->orderContentTable WHERE orderId = '$orderId'";

    return true;
  }

  /**
   * Actualiza la información de una orden.
   */
  public function updateOrder(OrderModel $order): bool{

    $id = $order->getId();
    $name = $order->getName();
    $event = $order->getEvent();
    $date = $order->getDate()->format("Y-m-d H:i:s");
    
    $sql = "UPDATE $this->orderTable SET
    id = '$id',
    name = '$name',
    event = '$event',
    date = '$date'
     WHERE id = '$id'
    ";
            
    return $this->connection->query($sql);
  }

  /**
   * Muestra una lista con todas las órdenes.
   */
  public function listOrders(int $minPos = 0, int $maxPos = 0): array|null{

    $sql = "";

    if($minPos == 0 && $maxPos == 0){
      $sql = "SELECT * FROM $this->orderTable";
    }else{
      $sql = "SELECT * FROM $this->orderTable ORDER BY id OFFSET {$minPos} ROWS
      FETCH NEXT {$maxPos} ROWS ONLY";
    }

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existen órdenes en la base de datos.

    $orders = array();

    while($row = $result->fetch_object('App\Models\OrderModel')) {
      array_push($orders, $row);
    }

    $result->free();

    return $orders;
  }

  /**
   * Obtiene una órden específica.
   */
  public function getOrder(string $id): OrderModel|null{
    $sql = "SELECT * FROM $this->orderTable WHERE id = '".$id."'";
            
    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No existe una órden con ese id.

    $order = $result->fetch_object('App\Models\OrderModel');

    $result->free();

    return $order;
  }

  /**
   * Obtiene la cantidad de órdenes registrados en
   * la base de datos.
   */
  public function getOrdersAmount(): int{
    $sql = "SELECT count(id) FROM {$this->orderTable}";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return 0; //No hay ninguna órden guardada.

    return $result->fetch_column();
  }

  /**
   * Obtiene los productos de una orden.
   */
  public function getOrderContents(string $orderId): array|null{
    $sql = "SELECT * FROM {$this->orderContentTable} WHERE orderId = '$orderId'";

    $result = $this->connection->query($sql);

    if($result->num_rows == 0) return null; //No tiene contenidos.

    $orderContent = array();

    while($row = $result->fetch_assoc()) {
      array_push($orderContent, $row);
    }

    $result->free();

    $products = [];
    $productsController = new ProductController(false, $this->getConnection());

    foreach($orderContent as $content){
      $productId = $content['productId'];
      $productAmount = $content['productAmount'];

      $product = $productsController->getProduct($productId);
      if($product == null) continue;
      array_push($products, [$product, $productAmount]);
    }

    return $products;
  }

  /**
   * Muestra una órden.
   */
  public function get(): string{
    if(!isset($_GET[0])){
      header("Location: ..", true);
      return "";
    }

    $orderId = $_GET[0];
    $order = $this->getOrder($orderId);
    if($order == null){
      header("Location: ..", true);
      return "";
    }

    $products = $this->getOrderContents($orderId);
    if($products == null){
      return "require=Invoice/invoice_layout.php=".json_encode(['products' => "<td> No existen. </td>", $order->toArray()]);
    }
    $productsHtml = "";

    $subtotal = 0;
    $impuestos = 0;
    $total = 0;
    $orderOwner = $order->getUserEmail();

    foreach($products as $product){
      $productName = $product[0]->getName();
      $productPrice = $product[0]->getPrice();
      $productDiscount = $product[0]->getDiscount();

      $productAmount = $product[1];

      $subtotal += $productPrice*$productAmount;
      $total += $subtotal-(($subtotal*$productDiscount)/100);

      $productsHtml .= "<tr>
      <th scope='row'> $productName </th>
      <td>$productAmount</td>
      <td>$productPrice</td>
      <td>$productDiscount</td>
      </tr>";
    }

    //Generar qr.
    $options = new LogoOptions(
      [
        'eccLevel' => QRCode::ECC_H,
        'imageBase64' => true,
        'logoSpaceHeight' => 17,
        'logoSpaceWidth' => 17,
        'scale' => 20,
        'version' => 7,
        'maskPattern' => 7
      ]
    );
    
    $qrOutputInterface = new QRImageWithLogo(
      $options,
      (new QRCode($options))->getMatrix('https://infinuslight.com/Order/get/'.$orderId)
    );

    $qrcode = $qrOutputInterface->dump(
      null,
      '/var/www/html/public/Images/logotipo.png'
    );

    $finalInfo = [];
    $finalInfo = array_merge($order->toArray(),
      ["products" => $productsHtml],
      ["totalPrice" => $total],
      ["subtotal" => $subtotal], 
      ["impuestos" => $impuestos], 
      ["userId" => $orderOwner],
      ["qrCode" => $qrcode]
    );

    return "require=Invoice/invoice_layout.php=".json_encode($finalInfo)."=file_type='pdf'";
  }
}

?>