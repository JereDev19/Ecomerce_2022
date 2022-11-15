<link rel="stylesheet" href="/css/sales.css">

  <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
      <h2 class="fs-2 m-0">Emails</h2>
    </div>
    <div class="col-md-6 ms-5 mt-1">
    </div>
  </nav>

  <style>
      #iconData {
        background-color: rgb(246, 246, 246);
      }
  </style>


  <div class="container-fluid px-4">

    <div class="row g-3 my-2  justify-content-center">

      <div class="col-xl-5">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            <h3 class="fs-2"><?= $emailCount ?></h3>
            <p>Emails</p>
          </div>
          <i id="iconData" class="fas fa-duotone fa fa-envelope-open-o fs-1 text-success border rounded-full p-3"></i>
        </div>
      </div>
  </div>


      <!--- Lista - Puntos de venta -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Emails recientes:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDePuntosDeVenta">
            <thead>
              <tr>
                <th scope="col" width="50">Remitente</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tema</th>
                <th scope="col">Mensaje</th>
              </tr>
            </thead>
            <tbody>
              <?= $emails ?>
            </tbody>

          </table>
        </div>  
      </div>

      <style>
        .tbl-fixed {
          overflow-x: scroll;
        }
      </style>

      <!-- Quitar color azul de iconos con enlaces -->
      <style type="text/css" media="screen">
        A:link {text-decoration: none }
        A:visited {color: black;  font-family: arial; text-decoration: none }
          *{outline:none !important;}*:focus {outline: none !important;}textarea:focus, input:focus{outline: none !important;}	a{text-decoration: none !important;outline: none !important;}
      </style>