<!--Data table - Scroll en tablas -->
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!-- CSS -->
<link rel="stylesheet" href="/css/cart/carrito.css">

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
<script src="/js/cart/carrito.js" defer></script>

    <!-- SECCION SLIDER -->
      <section class="py-5">
          <div class="container-fluid px-6 px-lg-5 my-5 bg-warning py-3" id="Slider-Carrito">
              <div class="text-center text-white" id="contenedorCarr">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-cart-check text-dark" viewBox="0 0 16 16">
                  <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
                  <p class="lead fw-normal text-dark mb-0 mt-4 fw-bold">Tus Productos Agregados.</p>
              </div>
          </div>
      </section>
          
            <div class="container px-4 px-lg-5">
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table table-hover table-striped table-warning table-sm" id="productos">
                              <thead>
                                  <tr>
                                      <th>Producto</th>
                                      <th>Precio</th>
                                      <th>Cantidad</th>
                                      <th>Sub Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?= $products ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      


          
            

              <div class="container">
                <div class="row d-flex align-items-center justify-content-center" id="totalOrder">
                  <div class="col-md-6">
                    <div class="table-responsive">
                      <table class="table responsive table-hover">
                          <thead>
                              <tr>
                                  <th class="text-center">Total</th>
                              </tr>
                          </thead>
                      </table>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ms-auto">
                        <h4 class="text-center" id="orderPrice">$UYU <?= $orderPrice ?></h4>
                        <div class="d-grid gap-2 p-1">                        
                          <button class="btn btn-success " type="button" id="btnTermPed"> Terminar Pedido</button>

                          <div class="formulario__mensaje display-none" id="formulario_mensaje-error-pedido">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> No se ha podido crear el pedido.</p>
                          </div>
                          <div class="formulario__mensaje formulario_mensaje-success display-none" id="formulario_mensaje-success-pedido">
                            <p><i class="fas"></i> <b>Logrado:</b> ¡Su pedido ha sido creado con éxito! </p>
                          </div>

                        </div>
                        <div class="d-grid gap-2 p-1">                        
                          <button class="btn btn-warning" type="button" id="btnVaciar"> Vaciar Carrito </button>

                          <div class="formulario__mensaje display-none" id="formulario_mensaje-error-vaciar">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> No se ha podido borrar el carrito.</p>
                          </div>
                          <div class="formulario__mensaje formulario_mensaje-success display-none" id="formulario_mensaje-success-vaciar">
                            <p><i class="fas"></i> <b>Logrado:</b> ¡Su carrito ha sido borrado con éxito! </p>
                          </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>