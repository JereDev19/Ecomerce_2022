<!--Data table - Scroll en tablas -->
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!-- CSS -->
<link rel="stylesheet" href="/css/cart/carrito.css">

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
<script src="/js/favourite/favourite.js" defer></script>

    <!-- SECCION SLIDER -->
      <section class="py-5">
          <div class="container-fluid px-6 px-lg-5 my-5 bg-danger py-3" id="Slider-Carrito">
              <div class="text-center text-white" id="contenedorCarr">
              <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16"> 
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/> </svg>
                  <p class="lead fw-normal text-dark mb-0 mt-4 fw-bold">Tus Favoritos.</p>
              </div>
          </div>
      </section>
          
            <div class="container px-4 px-lg-5">
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table table-hover table-striped table-danger table-sm" id="productos">
                              <thead>
                                  <tr>
                                      <th>Nombre del producto</th>
                                      <th>Descripción del producto</th>
                                      <th>Estrellas</th>
                                      <th>Imagen</th>
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