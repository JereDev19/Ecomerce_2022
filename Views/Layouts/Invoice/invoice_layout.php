<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/invoice/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Factura</title>
</head>
<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;500;700;800&family=Nunito:ital,wght@0,300;0,400;0,600;0,700;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100&display=swap');
    * {
      font-family: "Poppins", sans-serif;
    }

    #logo {
      width: 50px;
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-top: 30px;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #clientH1 {
      margin-top: 20px;
      padding-bottom: 20px;
    }

    #RemitenteH1 {
      margin-top: 30px;
    }
 
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-10 ">
        <h1 class="text-center pb-4">Factura</h1>
        
      </div>
      <div class="col-xs-2 text-center">
        <img class="img img-responsive" src="./Images/asd.png" alt="Logotipo" id="logo">
        <img class="img img-responsive" id="imgQR" src='<?= $qrCode ?>' alt='QR Code' width='100' height='100'>
      </div>
    </div>
    <style>
      #logo {
        margin-right: 34rem;
      }
    </style>
    <hr>
    <div class="row">
      <div class="col-xs-10">
        <h1 class="h6">InfinusLight SRL.</h1>
        <h6>https://infinuslight.com</h6>
      </div>
      <div class="col-xs-2 text-center">
        <strong>Fecha</strong>
        <br>
        <?= $orderDate ?>
        <br>
        <strong>Id de factura.</strong>
        <br>
        <?= $orderId ?>
      </div>
    </div>
    <hr>
    <div class="row text-center" style="margin-bottom: 2rem;">
      <div class="col-xs-6">
        <h1 id="clientH1">Cliente</h1>
        <strong id="clientGmail"><?= $userId ?></strong>
      </div>
      <div class="col-xs-6">
        <h1 class="h2" id="RemitenteH1">Remitente</h1>
        <strong>InfinusLight SRL.</strong>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <table class="table table-condensed table-info table-bordered table-striped" id="customers">
          <thead>
          <tr>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Descuento %</th>
          </tr>
          </thead>
          <tbody>
          <?= $products ?></tbody>
          <tfoot>
          <tr>
            <td colspan="3" class="text-right">Subtotal</td>
            <td>$<?php echo number_format($subtotal, 2) ?></td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">Impuestos</td>
            <td>$<?php echo number_format($impuestos, 2) ?></td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">
              <h4>Total</h4></td>
            <td>
              <h4>$<?php echo number_format($totalPrice, 2) ?></h4>
            </td>
          </tr>
          </tfoot>
        </table>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12 text-center">
        <p><u>Gracias por su compra.</u></p>
      </div>
    </div>
  </div>
</body>
</html>