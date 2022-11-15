  <link rel="stylesheet" href="/css/mainAdmin.css">
  
    <!-- Quitar color azul de iconos con enlaces -->
    <style type="text/css" media="screen">
      A:link {text-decoration: none }
      A:visited {color: black;  font-family: arial; text-decoration: none }
        *{outline:none !important;}*:focus {outline: none !important;}textarea:focus, input:focus{outline: none !important;}	a{text-decoration: none !important;outline: none !important;}
    </style>

  <!--PEDIDOS EN ESPERA-->

  <!--La etiqueta ol permite enumerar-->
    <div class="container-fluid mt-5">
      <div class="row" id="rowOrders">
        <h4 class="pb-3 mx-2">Pedidos:</h4>
        <div class="col-md-8">
          <ol class="list-group list-group-numbered">
            <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
              <div class="ms-2 me-auto">
                <div class="fw-bold mx-3">Subheading</div>
                <p class="mx-3">Cras justo odio</p>
                <!-- <small class="mx-3">3 días</small> -->
              </div>
              <span class="badge bg-danger rounded-pill mt-1 mx-2">En espera</span>
              <button class="btn btn-success" id="spanYbotons">Confirmar</button>
            </li>

            <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
              <div class="ms-2 me-auto">
                <div class="fw-bold mx-3">Subheading</div>
                <p class="mx-3">Cras justo odio</p>
                <!-- <small class="mx-3">3 días</small> -->
              </div>
              <span class="badge bg-danger rounded-pill mt-1 mx-2">En espera</span>
              <button class="btn btn-success" id="spanYbotons">Confirmar</button>
            </li>

            <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
              <div class="ms-2 me-auto">
                <div class="fw-bold mx-3">Subheading</div>
                <p class="mx-3">Cras justo odio</p>
                <!-- <small class="mx-3">3 días</small> -->
              </div>
              <span class="badge bg-danger rounded-pill mt-1 mx-2">En espera</span>
              <button class="btn btn-success" id="spanYbotons">Confirmar</button>
            </li>

          </ol>
        </div>
      </div>  
    </div>  


    


  <!--PEDIDOS EN ESPERA-->

  <!--La etiqueta ol permite enumerar-->
  <div class="container-fluid">
    <div class="row justify-content-end" id="rowOrdersCon">
      <div class="col-md-4">
        <ol class="list-group list-group-numbered">
          <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
            <div class="ms-2 me-auto">
              <div class="fw-bold mx-3">Subheading</div>
              <p class="mx-3">Cras justo odio</p>
              <!-- <small class="mx-3">3 días</small> -->
            </div>
            <div id="container-concretado">
              <span class="badge bg-success rounded-pill mt-1 mx-2">Concretado</span>
            </div>
          </li>

          <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
            <div class="ms-2 me-auto">
              <div class="fw-bold mx-3">Subheading</div>
              <p class="mx-3">Cras justo odio</p>
              <!-- <small class="mx-3">3 días</small> -->
            </div>
            <span class="badge bg-success rounded-pill mt-1 mx-2">Concretado</span>
          </li>

          <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
            <div class="ms-2 me-auto">
              <div class="fw-bold mx-3">Subheading</div>
              <p class="mx-3">Cras justo odio</p>
              <!-- <small class="mx-3">3 días</small> -->
            </div>
            <span class="badge bg-success rounded-pill mt-1 mx-2">Concretado</span>
          </li>

        </ol>
      </div>
    </div>  
  </div>