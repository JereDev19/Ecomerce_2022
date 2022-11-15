    <link rel="stylesheet" href="/css/orders.css">
    <script src="/js/UpdateValidations.js" defer></script>
    <script src="/js/admin_statistics/AdminOrders_Stats.js" defer></script>
    <script src="/js/ValidacionPedidosCampos.js" defer></script> 

    <script src="/js/admin_statistics/PaginatedTable.js" defer></script>
    <script src="/js/admin_statistics/orders/EventTable_Orders.js" defer></script>
    <script src="/js/admin_statistics/orders/IngredientTable_Orders.js" defer></script>
    <script src="/js/admin_statistics/orders/OrderTable_Orders.js" defer></script>
    <script src="/js/admin_statistics/orders/ProductTable_Orders.js" defer></script>
    <script src="/js/admin_statistics/orders/RecipeTable_Orders.js" defer></script>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      
        <div class="d-flex align-items-center">
          <h2 class="fs-2 m-0">Pedidos</h2>
        </div>

        <div class="col-md-6">
          <!--Separar en columnas-->
        </div>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-solid fa-plus me-2"></i>Añadir
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirProducto">Productos</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirInsumo">Ingredientes</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirReceta">Recetas</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirPedido">Pedidos</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirEvento">Eventos</a></li>
               </ul>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-sharp fa-solid fa-minus me-2"></i>Remover
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverProducto">Productos</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverInsumo">Ingredientes</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverReceta">Recetas</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverPedido">Pedidos</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverEvento">Eventos</a></li>
               </ul>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-solid fa-link me-2"></i>Actualizar
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarProducto">Productos</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarInsumo">Ingredientes</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarReceta">Recetas</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarPedido">Pedidos</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarEvento">Eventos</a></li>
               </ul>
              </li>
          </ul>
        </div>
    </nav>

    <!-- Quitar color azul de iconos con enlaces -->
    <style type="text/css" media="screen">
      A:link {text-decoration: none }
      A:visited {color: black;  font-family: arial; text-decoration: none }
        *{outline:none !important;}*:focus {outline: none !important;}textarea:focus, input:focus{outline: none !important;}	a{text-decoration: none !important;outline: none !important;}
    </style>


    <style>
      #iconData {
        background-color: rgb(246, 246, 246);
      }
    </style>

    
   <div class="container-fluid px-4">

      <div class="row g-3 my-2">

          <div class="col-xl-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2" id="contadorProducto">0</h3>
                <p>Producto(s)</p>
              </div>
              <i id="iconData" class="fas fa-duotone fa-truck fs-1 text-success border rounded-full p-3"></i>
            </div>
          </div>
        
       

        <div class="col-xl-3">
          <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
              <h5 class="fs-2" id="contadorIngrediente">0</h5>
              <p>Ingrediente(s)</p>
            </div>
            <i id="iconData" class="fas fa-solid fa-mortar-pestle fs-1 text-success border rounded-full p-3"></i>
          </div>
        </div>

        <div class="col-xl-3">
          <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
              <h3 class="fs-2" id="contadorReceta">0</h3>
              <p>Receta(s)</p>
            </div>
            <i id="iconData" class="fas fa-solid fa-book  fs-1 text-success border rounded-full p-3"></i>
          </div>
        </div>

        
        <div class="col-xl-3">
          <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
              <h3 class="fs-2" id="contadorOrden">0</h3>
              <p>Pedido(s)</p>
            </div>
            <i id="iconData" class="fas fa-solid fa-hand-holding fs-1 text-success border rounded-full p-3"></i>
          </div>
        </div>


        <div class="col-xl-3">
          <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
              <h3 class="fs-2" id="contadorEvento">0</h3>
              <p>Evento(s)</p>
            </div>
            <i id="iconData" class="fas fa-sharp fa-solid fa-calendar-week fs-1 text-success border rounded-full p-3"></i>
          </div>
        </div>
      </div>

      <div class="col-md-6 mt-1">


      <style>
        #listPedidos {
          height: 45px;
        }

        #listPedidosCon {
          height: 45px;
        }
      </style>
  
</form>

<!-- HIOJAM (Acá se ponen los productos)--><table id="products"></table>


</div>

      <!--- Lista - Productos -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Productos ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDeProductos">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Stock</th>
                <th scope="col">Descuento</th>
                <th scope="col">Puntuación</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

          </table>
        </div>  
      </div>
        
      <!--- Paginacion - Productos-->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaPT">
        <a class="page-link" id="paginaPreviaPT">Anterior</a>
        <a class="page-link" id="paginaSiguientePT">Siguiente</a>
        </ul>
      </nav>



      <!--- Lista - Ingredientes -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Ingredientes ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDeIngredientes">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

          </table>
        </div>  
      </div>
        
      <!--- Paginacion - Ingredientes-->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaIT">
        <a class="page-link" id="paginaPreviaIT">Anterior</a>
        <a class="page-link" id="paginaSiguienteIT">Siguiente</a>
        </ul>
      </nav>



      <!--- Lista - Recetas -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Recetas ingresadas:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDeRecetas">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Ingrediente</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

          </table>
        </div>  
      </div>
        
      <!--- Paginacion - Recetas-->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaRT">
        <a class="page-link" id="paginaPreviaRT">Anterior</a>
        <a class="page-link" id="paginaSiguienteRT">Siguiente</a>
        </ul>
      </nav>


      <!--- Lista - Pedidos -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Pedidos ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDePedidos">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Evento</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

          </table>
        </div>  
      </div>

        
      <!--- Paginacion - Pedidos -->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaOT">
        <a class="page-link" id="paginaPreviaOT">Anterior</a>
        <a class="page-link" id="paginaSiguienteOT">Siguiente</a>
        </ul>
      </nav>

  

      <!--- Lista - Eventos -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Eventos ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDeEventos">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora inicio</th>
                <th scope="col">Hora final</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

          </table>
        </div>  
      </div>
        
      <!--- Paginacion - Eventos-->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaET">
        <a class="page-link" id="paginaPreviaET">Anterior</a>
        <a class="page-link" id="paginaSiguienteET">Siguiente</a>
        </ul>
      </nav>



     
      <style>
        .tbl-fixed {
          overflow-x: scroll;
        }
      </style>
  
  

            





  <!--Añadir-->

  <!--Producto-->

   <div class="modal fade" id="AñadirProducto">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Productos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="addProduct">

                <div class="col-md-12 formulario__grupo" id="grupo__AddnombreProducto">
                  <label for="NombreAddProducto" class="form-label formulario__label">Nombre:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" id="NombreAddProducto" name="AddnombreProducto" class="form-control formulario__input" placeholder="Ingrese nombre del producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__AddPrecioProducto">
                  <label for="PrecioAddProducto" class="form-label formulario__label">Precio:</label>
                  <div class="formulario__grupo-input">
                    <input type="number" id="PrecioAddProducto" name="AddPrecioProducto" class="form-control formulario__input" placeholder="Ingrese precio del producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__AddDescripcionProducto">
                  <label for="DescripciónModulos" class="form-label formulario__label">Descripción:</label>
                  <div class="formulario__grupo-input">
                  <input type="text" id="DescripciónModulos" class="form-control formulario__input" placeholder="Ingrese descripción del producto." name="AddDescripcionProducto"></input>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>
                
                <div class="col-md-12 formulario__grupo" id="grupo__AddDescuentoProducto">
                  <label for="DescuentoAddProducto" class="form-label formulario__label">Descuento (%):</label>
                  <div class="formulario__grupo-input">
                    <input type="number" id="DescuentoAddProducto" name="AddDescuentoProducto" class="form-control formulario__input" placeholder="Ingrese descuento del producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__AddStockProducto">
                  <label for="inputStock" class="form-label formulario__label">Stock:</label>
                  <div class="formulario__grupo-input">
                    <input type="number" id="inputStock" name="AddStockProducto" class="form-control formulario__input" placeholder="Ingrese stock del producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__AddCategoriaProducto">
                  <label for="inputCategoria" class="form-label formulario__label">Categoria:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" id="inputCategoria" name="AddCategoriaProducto" class="form-control formulario__input" placeholder="Ingrese categoría del producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__AddImagenProducto">
                  <label for="inputImagen" class="form-label formulario__label">Imagen:</label>
                  <div class="formulario__grupo-input">
                    <input type="file" id="ImagenAddProducto" name="image" class="form-control formulario__input">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddProduct">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
               </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirProductoSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Producto añadido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirProductoError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro producto! </p>
                </div>
                
                <div class="d-grid gap-2">
                  <button type="submit" id="btnAP" class="btn btn-dark mb-3 mt-4">Añadir producto</button>
                </div>
              </form>
              <!--FINAL FORMULARIO AÑADIR USUARIO-->
             </div>
          </div>
        </div>
      </div>
   </div>
  
    <!--Ingrediente-->

    <div class="modal fade" id="AñadirInsumo">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Ingrediente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">


              <form class="row g-3" id="addIngredient">
             
                <div class="mb-3" id="grupo__AddNombreInsumo">
                  <label for="NombreInsumo" class="form-label formulario__label">Nombre:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="NombreInsumo" name="AddNombreInsumo" placeholder="Ingrese nombre del ingrediente.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="mb-3" id="grupo__AddStockInsumo">
                  <label for="StockInsumo" class="form-label formulario__label">Stock:</label>
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control formulario__input" id="StockInsumo" name="AddStockInsumo" placeholder="Ingrese stock (KG) del ingrediente.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="mb-3" id="grupo__AddPrecioInsumo">
                  <label for="StockInsumo" class="form-label formulario__label">Precio (Por KG):</label>
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control formulario__input" id="StockInsumo" name="AddPrecioInsumo" placeholder="Ingrese precio (Por KG) del ingrediente.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddIngredient">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirIngredienteSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Ingrediente añadido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirIngredienteError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro ingrediente! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark mb-3 mt-4" id="btnAI">Crear ingrediente</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>


    <!--Receta-->

    <div class="modal fade" id="AñadirReceta">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Receta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="addRecipe">

                <div class="mb-3" id="grupo__AddNombreReceta">
                  <label for="NombreReceta" class="form-label formulario__label">Nombre:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="NombreReceta" name="AddNombreReceta" placeholder="Ingrese nombre de la receta.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                     <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="mb-3" id="grupo__AddDescripcionReceta">
                  <label for="DescripciónReceta" class="form-label formulario__label">Descripción:</label>
                  <div class="formulario__grupo-input">
                    <input id="DescripciónReceta" class="form-control formulario__input" name="AddDescripcionReceta" placeholder="Ingrese descripción de la receta."></input>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
               </div>

                <div class="mb-3" id="grupo__AddIngredienteReceta">
                  <label for="NombreStock" class="form-label formulario__label">Ingrediente:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="NombreStock" name="AddIngredienteReceta" placeholder="Ingrese nombres de los ingredientes utilizados.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                     <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddRecipe"> 
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirRecetaSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Receta añadida con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirRecetaError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otra receta! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark mb-3 mt-4" id="btnAR">Crear receta</button>
                </div>
            </form>

           </div>
          </div>
        </div>
      </div>
    </div>

    <!--Pedido-->

    <div class="modal fade" id="AñadirPedido">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Pedido</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="addOrder">
              
                <div class="mb-3" id="grupo__AddNombrePedido">
                  <label for="NombrePedido" class="form-label formulario__label">Nombre:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="NombrePedido" name="AddNombrePedido" placeholder="Ingrese nombre del pedido.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="mb-3" id="grupo__AddEventoPedido">
                  <label for="EventoPedido" class="form-label formulario__label">Evento:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="EventoPedido" name="AddEventoPedido" placeholder="Ingrese nombre del evento.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                   <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="pb-3" id="grupo__AddFechaPedido">
                  <label for="FechaPedido" class="form-label formulario__label">Fecha:</label>
                  <div class="formulario__grupo-input">
                   <input type="date" class="form-control formulario__input mb-4" id="FechaPedido" name="AddFechaPedido" placeholder="Ingrese fecha del evento.">
                   <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </input>
                   <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="mb-3" id="grupo__AddPrecioPedido">
                  <label for="PrecioPedido" class="form-label formulario__label">Precio:</label>
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control formulario__input" id="PrecioPedido" name="AddPrecioPedido" placeholder="Ingrese precio del evento.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                   <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>
                
                <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddOrder">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirPedidoSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Pedido añadido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirPedidoError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro pedido! </p>
                </div>
                
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark mb-3 mt-4" id="btnApe">Crear pedido</button>
                </div>
            </form>


           </div>
          </div>
        </div>
      </div>
    </div>

    <!--Evento-->

    <div class="modal fade" id="AñadirEvento">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Evento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

            <form class="row g-3" id="addEvent">
              
              
              <div class="mb-3" id="grupo__AddFechaEvento">
                <label for="FechaEvento" class="form-label formulario__label">Fecha:</label>
                <div class="formulario__grupo-input">
                  <input type="date" class="form-control formulario__input" id="FechaEvento" name="AddFechaEvento" placeholder="Ingrese fecha del evento.">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
              </div>

              <div class="mb-3" id="grupo__AddComienzoEvento">
                <label for="ComienzoEvento" class="form-label formulario__label">Horario Comienzo (Formato 24hs):</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control formulario__input" id="ComienzoEvento" name="AddComienzoEvento" placeholder="Ingrese comienzo del evento.">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
              </div>

              <div class="mb-3" id="grupo__AddFinalizacionEvento">
                <label for="FinalizacionEvento" class="form-label formulario__label">Horario Finalización (Formato 24hs):</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control formulario__input" id="FinalizacionEvento" name="AddFinalizacionEvento" placeholder="Ingrese comienzo del evento.">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
              </div>

              <div class="mb-3" id="grupo__AddaddressEvento">
                <label for="DireccionEvento" class="form-label formulario__label">Dirección:</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control formulario__input" id="DireccionEvento" name="AddaddressEvento" placeholder="1234 Main St">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
              </div>

              <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddEvent">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
              </div>

              <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirEventoSuccess">
                <p><i class="fas"></i> <b>Logrado:</b> ¡Evento añadido con éxito! </p>
              </div>

              <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirEventoError">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro evento! </p>
              </div>
                
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark mb-3 mt-4" id="btnAE">Crear evento</button>
              </div>

            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
      















  <!--Remover-->

  <div class="modal fade" id="RemoverProducto">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeProduct">
              
                <div class="mb-3" id="grupo__ReIdProducto">
                  <label for="ReIdProducto" class="form-label formulario__label">Identificador:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" name="ReIdProducto" class="form-control formulario__input" id="ReIdProducto" placeholder="Ingrese identificador de producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorReProduct">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverProductoSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Producto removido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverProductoError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado el Producto! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark" id="btnRP">Remover producto</button>
                </div>

              </form>
            </div>
        </div>
     </div>
   </div>

  <div class="modal fade" id="RemoverInsumo">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Ingrediente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeIngredient">
                <div class="mb-3" id="grupo__ReIdInsumo">
                  <label for="ReIdInsumo" class="form-label formulario__label">Identificador:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" name="ReIdInsumo" class="form-control formulario__input" id="ReIdInsumo" placeholder="Ingrese identificador de ingrediente.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorReIngredient">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverIngredienteSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Ingrediente removido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverIngredienteError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado el Ingrediente! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark" id="btnRI">Remover Ingrediente</button>
                </div>

                </div>
              </form>
             </div>
          </div>
        </div>
      </div>
   </div>

    <div class="modal fade" id="RemoverReceta">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Receta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeRecipe">
                <div class="mb-3" id="grupo__ReIdReceta">
                  <label for="ReIdReceta" class="form-label formulario__label">Identificador:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" name="ReIdReceta" class="form-control formulario__input" id="ReIdReceta" placeholder="Ingrese identificador de receta.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorReRecipe">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>
              

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverRecetaSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Receta removida con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverRecetaError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado la Receta! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark" id="btnRR">Remover Receta</button>
                </div>  

                </div>
              </form>
             </div>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="RemoverPedido">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Pedido</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeOrder">
                <div class="mb-3" id="grupo__ReIdPedido">
                  <label for="ReIdPedido" class="form-label formulario__label">Identificador</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="ReIdPedido" name="ReIdPedido" placeholder="Ingrese identificador de pedido.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorReOrder">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverPedidoSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Pedido removido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverPedidoError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado el Pedido! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark" id="btnRPe">Remover Pedido</button>
                </div>
                </div>
              </form>
             </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="RemoverEvento">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Evento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeEvent">
                <div class="mb-3" id="grupo__ReIdEvento">
                  <label for="idEvento" class="form-label formulario__label">Identificador</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" name="ReIdEvento" id="idEvento" placeholder="Ingrese identificador de evento.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorReEvent">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverEventoSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Evento removido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverEventoError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado el Evento! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark" id="btnRE">Remover Evento</button>
                </div>
              </form>
             </div>
         </div>
      </div>
    </div>
















    <!--Actualizar-->

    <!--Producto-->

    <div class="modal fade" id="ActualizarProducto">
       <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Actualización de Productos</h5>
              <h5 class="modal-title" id="updateProductIdParagraph"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
            </div>

            <div class="modal-body" id="modal-body">
              <form class="row g-3" id="validateProduct">
                <div class="mb-3" id="grupo__ActAccesoProducto">
                  <label for="validateProductInput" id="validateIdLabelProduct" class="form-label formulario__label">Identificador</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" name="ActAccesoProducto" id="validateProductInput" placeholder="Ingrese identificador de producto.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje_ErrorActProductAcceso">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarProductoError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese producto no existe. </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" id="validateProductButton" class="btn btn-dark">Buscar</button>
                </div>

              </form>
            
           

              <form class="row g-3" id="updateProduct" onsubmit="return fetchPost('updateProduct', 'response', 'Product', true, 'updateProductVerify')">

                  <div class="col-md-12 formulario__grupo" id="grupo__ActnombreProducto">
                    <label for="nameUpdateProduct" class="form-label formulario__label updateProductHidden">Nombre</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="nameUpdateProduct" name="ActnombreProducto" class="form-control formulario__input updateProductHidden" placeholder="Ingrese nombre del producto.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12 formulario__grupo" id="grupo__ActPrecioProducto">
                    <label for="priceUpdateProduct" class="form-label formulario__label updateProductHidden">Precio</label>
                    <div class="formulario__grupo-input">
                      <input type="number" id="priceUpdateProduct" name="ActPrecioProducto" class="form-control formulario__input updateProductHidden" placeholder="Ingrese precio del producto.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12 formulario__grupo" id="grupo__ActDescripcionProducto">
                    <label for="descriptionUpdateProduct" class="form-label formulario__label updateProductHidden">Descripción</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="descriptionUpdateProduct" name="ActDescripcionProducto" class="form-control formulario__input updateProductHidden" placeholder="Ingrese descripción del producto.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>
                  
                  <div class="col-md-12 formulario__grupo" id="grupo__AddDescuentoProducto">
                    <label for="discountUpdateProduct" class="form-label formulario__label updateProductHidden">Descuento</label>
                    <div class="formulario__grupo-input">
                      <input type="numer" id="discountUpdateProduct" name="AddDescuentoProducto" class="form-control formulario__input updateProductHidden" placeholder="Ingrese descuento del producto.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12 formulario__grupo" id="grupo__AddStockProducto">
                    <label for="stockUpdateProduct" class="form-label formulario__label updateProductHidden">Stock</label>
                    <div class="formulario__grupo-input">
                      <input type="number" id="stockUpdateProduct" name="AddStockProducto" class="form-control formulario__input updateProductHidden" placeholder="Ingrese stock del producto">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12 formulario__grupo" id="grupo__AddCategoriaProducto">
                    <label for="categoriaUpdateProduct" class="form-label formulario__label updateProductHidden">Categoría:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="categoriaUpdateProduct" name="AddCategoriaProducto" class="form-control formulario__input updateProductHidden" placeholder="Ingrese categoría del producto.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12 formulario__grupo" id="grupo__AddImagenProducto">
                    <label for="imageUpdateProduct" class="form-label formulario__label updateProductHidden">Imagen</label>
                    <div class="formulario__grupo-input">
                      <input type="file" id="imageUpdateProduct" name="image" class="form-control formulario__input updateProductHidden">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12">
                    <input type="hidden" name="id" id="validateProductInputHidden">
                  </div>

                  <div class="formulario__mensaje" id="formulario__mensajeActProductErr">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarProductoError">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                  </div>
                  
                  <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarProductoSuccess">
                    <p><i class="fas"></i> <b>Logrado:</b> ¡El Producto ha sido actualizado con éxito! </p>
                  </div>
                  
                  <div class="d-grid gap 2">
                    <button type="submit" class="btn btn-dark updateProductHidden" btn="BtnActualizarProducto">Actualizar producto</button>
                  </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  
    
      

      <!--Insumos-->
      
      <div class="modal fade" id="ActualizarInsumo">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualización de Ingrediente</h5>
              <h5 class="modal-title" id="updateIngredientIdParagraph"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
            </div>
              <div class="modal-body" id="modal-body">


                <form class="row g-3" id="validateIngredient">

                  <div class="mb-3" id="grupo__ActAccesoIngrediente">
                    <label for="validateIngredientInput" id="validateIdLabelIngredient" class="form-label formulario__label">Identificador</label>
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="validateIngredientInput" name="ActAccesoIngrediente" placeholder="Ingrese identificador del ingrediente.">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                      </div>
                      <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="formulario__mensaje" id="formulario__mensaje_ErrorActIngredientAcceso">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarIngredienteError">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese ingrediente no existe. </p>
                  </div>

                  <div class="d-grid gap 2">
                    <button type="submit" class="btn btn-dark" id="validateIngredientButton">Buscar</button>
                  </div>

                </form>
          
                <form class="row g-3" id="updateIngredient" onsubmit="return fetchPost('updateIngredient', 'response', 'Ingredient', true, 'updateIngredientVerify')">
                  <div class="col-md-12 formulario__grupo" id="grupo__ActNombreInsumo">
                    <label for="nameUpdateIngredient" class="form-label formulario__label updateIngredientHidden">Nombre</label>
                    <div class="formulario__grupo-input">
                      <input type="text" class="form-control formulario__input updateIngredientHidden" id="nameUpdateIngredient" name="ActNombreInsumo" placeholder="Ingrese nombre del ingrediente.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-md-12 formulario__grupo" id="grupo__ActStockInsumo">
                    <label id="stockUpdateIngredient" for="StockInsumo" class="form-label formulario__label updateIngredientHidden">Stock</label>
                    <div class="formulario__grupo-input">
                      <input type="number" class="form-control formulario__input updateIngredientHidden" id="stockUpdateIngredient" name="ActStockInsumo" placeholder="Ingrese stock del ingrediente.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                    <div class="col-md-12 formulario__grupo" id="grupo__ActPrecioInsumo">
                      <label for="priceUpdateIngredient" class="form-label formulario__label updateIngredientHidden">Precio (Por KG):</label>
                      <div class="formulario__grupo-input">
                        <input type="number" class="form-control formulario__input updateIngredientHidden" id="priceUpdateIngredient" name="ActPrecioInsumo" placeholder="Ingrese precio (Por KG) del ingrediente.">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                     </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                   </div>

                  <div class="col-md-12">
                    <input type="hidden" name="id" id="validateIngredientInputHidden">
                  </div>
                  
                  <div class="formulario__mensaje" id="formulario__mensajeActIngredientErr">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarIngredienteError">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                  </div>
                  <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarIngredienteSuccess">
                    <p><i class="fas"></i> <b>Logrado:</b> ¡El Ingrediente ha sido actualizado con éxito! </p>
                  </div>

                  <div class="d-grid gap 2">
                    <button type="submit" id="BtnActualizarInsumo" class="btn btn-dark updateIngredientHidden">Actualizar ingrediente</button>
                  </div>

              </form>   
          </div>
        </div>
      </div>
     </div>
    </div>
    
        


          <!--Receta-->

          <div class="modal fade" id="ActualizarReceta">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Actualización de Receta</h5>
                  <h5 class="modal-title" id="updateRecipeIdParagraph"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
                </div>
                  <div class="modal-body" id="modal-body">

                    <form class="row g-3" id="validateRecipe">

                        <div class="mb-3" id="grupo__ActAccesoReceta">
                          <label for="validateRecipeInput" id="validateIdLabelRecipe" class="form-label formulario__label">Identificador:</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input" id="validateRecipeInput" name="ActAccesoReceta" placeholder="Ingrese identificador de receta.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="formulario__mensaje mx-1" id="formulario__mensaje_ErrorActRecipeAcceso">
                           <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                        </div>

                        <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarRecetaError">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Esa receta no existe. </p>
                        </div>

                        <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-dark" id="validateRecipeButton">Buscar</button>
                        </div>

                    </form>



                    <form class="row g-3" id="updateRecipe" onsubmit="return fetchPost('updateRecipe', 'response', 'Recipe', true, 'updateRecipeVerify')">

                      <div class="col-md-12" id="grupo__ActNombreReceta">
                        <label for="nameUpdateRecipe" id="NameActualizarReceta" class="form-label formulario__label updateRecipeHidden">Nombre</label>
                        <div class="formulario__grupo-input">
                          <input type="text" class="form-control formulario__input updateRecipeHidden" id="nameUpdateRecipe" name="ActNombreReceta" placeholder="Ingrese nombre de la receta.">
                          <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                      </div>

                      <div class="col-md-12 formulario__grupo" id="grupo__AddDescripcionReceta">
                        <label for="descriptionUpdateRecipe" id="NameActualizarReceta" class="form-label formulario__label updateRecipeHidden">Descripción</label>
                        <div class="formulario__grupo-input">
                          <textarea id="descriptionUpdateRecipe" name="description" class="form-control formulario__input updateRecipeHidden" cols="30" rows="10" placeholder="Ingrese descripción de la receta."></textarea>
                        </div>
                        <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                     </div>

                      <div class="col-md-12 formulario__grupo" id="grupo__AddIngredientReceta">
                        <label for="ingredientUpdateRecipe" id="NameActualizarReceta" class="form-label formulario__label updateRecipeHidden">Ingredient</label>
                        <div class="formulario__grupo-input">
                          <input type="text" class="form-control formulario__input updateRecipeHidden" id="ingredientUpdateRecipe" name="AddIngredient" placeholder="Ingrese ingrediente de la receta.">
                          <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                      </div>

                      <div class="col-md-12">
                        <input type="hidden" name="id" id="validateRecipeInputHidden">
                      </div>

                      <div class="formulario__mensaje" id="formulario__mensajeActRecipeErr">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                      </div>

                      <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarRecetaError">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                      </div>
                      <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarRecetaSuccess">
                        <p><i class="fas"></i> <b>Logrado:</b> ¡La Receta ha sido actualizado con éxito! </p>
                      </div>

                      <div class="d-grid gap 2">
                        <button type="submit" id="BtnActualizarReceta" class="btn btn-dark updateRecipeHidden">Actualizar receta</button>
                      </div>

                    </form>
                 </div>
              </div>
            </div>
          </div>
      
           
          

            <!--Pedido-->

            <div class="modal fade" id="ActualizarPedido">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Actualización de Pedido</h5>
                    <h5 class="modal-title" id="updateOrderIdParagraph"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
                  </div>

                    <div class="modal-body" id="modal-body">

                      <form class="row g-3" id="validateOrder">

                          <div class="mb-3" id="grupo__ActAccesoPedido">
                            <label for="validateOrderInput" class="form-label formulario__label" id="validateIdLabelOrder">Identificador</label>
                            <div class="formulario__grupo-input">
                              <input type="text" class="form-control formulario__input pl-5" id="validateOrderInput" name="ActAccesoPedido" placeholder="Ingrese identificador de pedido.">
                              <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                          </div>

                          <div class="formulario__mensaje" id="formulario__mensaje_ErrorActOrderAcceso">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                          </div>

                          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarPedidoError">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese pedido no existe. </p>
                          </div>

                          <div class="d-grid gap 2">
                            <button type="submit" class="btn btn-dark" id="validateOrderButton">Buscar</button>
                          </div>
            
                      </form>



                      <form class="row g-3" id="updateOrder" onsubmit="return fetchPost('updateOrder', 'response', 'Order', true, 'updateOrderVerify')">
                      
                        <div class="col-md-12" id="grupo__ActNombrePedido">
                          <label for="nameUpdateOrder" id="NameActualizarPedido" class="form-label formulario__label updateOrderHidden">Nombre</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input updateOrderHidden" id="nameUpdateOrder" name="ActNombreOrder" placeholder="Ingrese nombre del pedido.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="col-md-12" id="grupo__ActEventoPedido">
                          <label for="eventUpdateOrder" id="NameActualizarPedido" class="form-label formulario__label updateOrderHidden">Evento</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input updateOrderHidden" id="eventUpdateOrder" name="ActEventOrder" placeholder="Ingrese evento del pedido.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="col-md-12" id="grupo__ActFechaPedido">
                          <label for="dateUpdateOrder" id="NameActualizarPedido" class="form-label formulario__label updateOrderHidden">Fecha</label>
                          <div class="formulario__grupo-input">
                            <input type="datetime" class="form-control formulario__input updateOrderHidden" id="dateUpdateOrder" name="ActDateOrder" placeholder="Ingrese fecha del pedido.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="col-md-12">
                          <input type="hidden" name="id" id="validateOrderInputHidden">
                        </div>

                        <div class="formulario__mensaje" id="formulario__mensajeActOrderErr">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                        </div>

                        <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarPedidoError">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                        </div>
                        <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarPedidoSuccess">
                          <p><i class="fas"></i> <b>Logrado:</b> ¡El Pedido ha sido actualizado con éxito! </p>
                        </div>
                        
                        <div class="d-grid gap 2">
                          <button type="submit" id="BtnActualizarPedido" class="btn btn-dark updateOrderHidden">Actualizar Pedido</button>
                        </div>
                     </form>
                   </div>
                  </div>
                </div>
              </div>
            
         


            <!--Evento-->
    
            <div class="modal fade" id="ActualizarEvento">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title">Actualización de Evento</h5>
                    <h5 class="modal-title" id="updateEventIdParagraph"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
                  </div>

                    <div class="modal-body" id="modal-body">
                      
                      <form class="row g-3" id="validateEvent">

                        <div class="mb-3" id="grupo__ActAccesoEvento">
                          <label for="validateEventInput" class="form-label formulario__label" id="validateIdLabelEvent">Identificador:</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input pl-5" id="validateEventInput" name="ActAccesoEvento" placeholder="Ingrese identificador de evento.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="formulario__mensaje" id="formulario__mensaje_ErrorActEventAcceso">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                        </div>

                        <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarEventoError">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese evento no existe. </p>
                        </div>

                        <div class="d-grid gap 2">
                          <button type="submit" class="btn btn-dark" id="validateEventButton">Buscar</button>
                        </div>
                          
                      </form>

                      <form class="row g-3" id="updateEvent" onsubmit="return fetchPost('updateEvent', 'response', 'Event', true, 'updateEventVerify')">

                        <div class="col-md-12" id="grupo__ActFechaEvento">
                          <label for="dateUpdateEvent" id="NameActualizarEvento" class="form-label formulario__label updateEventHidden">Fecha</label>
                          <div class="formulario__grupo-input">
                            <input type="datetime" class="form-control formulario__input updateEventHidden" id="dateUpdateEvent" name="ActFechaEvento" placeholder="Ingrese fecha del evento.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="col-md-12" id="grupo__ActComienzoEvento">
                          <label for="startTimeUpdateEvent" id="NameActualizarEvento" class="form-label formulario__label updateEventHidden">Horario Comienzo (Formato 24hs)</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input updateEventHidden" id="startTimeUpdateEvent" name="ActComienzoEvento" placeholder="Ingrese comienzo del evento.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>


                        <div class="mb-3" id="grupo__ActFinalizacionEvento">
                          <label for="endTimeUpdateEvent" class="form-label formulario__label updateEventHidden">Horario Finalización (Formato 24hs)</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input updateEventHidden" id="endTimeUpdateEvent" name="ActFinalizacionEvento" placeholder="Ingrese comienzo del evento.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="col-md-12" id="grupo__ActDireccionEvento">
                          <label for="addressTimeUpdateEvent" id="NameActualizarEvento" class="form-label formulario__label updateEventHidden">Dirección</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input updateEventHidden" id="addressTimeUpdateEvent" name="ActDireccionEvento" placeholder="1234 Main St">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                          </div>
                          <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                        </div>

                        <div class="col-md-12">
                          <input type="hidden" name="id" id="validateEventInputHidden">
                        </div>
                        
                        <div class="formulario__mensaje" id="formulario__mensajeActEventErr">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                        </div>

                        <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarEventoError">
                          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                        </div>
                        <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarEventoSuccess">
                          <p><i class="fas"></i> <b>Logrado:</b> ¡El Evento ha sido actualizado con éxito! </p>
                        </div>
                          
                        <div class="d-grid gap 2">
                          <button type="submit" id="BtnActualizarEvento" class="btn btn-dark updateEventHidden">Actualizar evento</button>
                        </div>

                     </form>
                   </div>
                  </div>
                </div>
              </div>
           </div>
          
            
          
              