<link rel="stylesheet" href="/css/sales.css">
<script src="/js/ValidacionVentasCampos.js" defer></script>

<script src="/js/admin_statistics/PaginatedTable.js" defer></script>
<script src="/js/admin_statistics/AdminSales_Stats.js" defer></script>

<script src="/js/UpdateValidations.js"></script>
<script src="/js/admin_statistics/sales/SaleLocationTable_Sales.js" defer></script>
<script src="/js/admin_statistics/sales/SellerTable_Sales.js" defer></script>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <h2 class="fs-2 m-0">Ventas</h2>
        </div>
        <div class="col-md-6 ms-5 mt-1">
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-solid fa-plus me-2"></i>Añadir
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirPuntoVenta">Punto de venta</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AñadirVendedor">Vendedor</a></li>
               </ul>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-sharp fa-solid fa-minus me-2"></i>Remover
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverPuntoVenta">Puntos de venta</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#RemoverVendedor">Vendedor</a></li>
               </ul>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-solid fa-link me-2"></i>Actualizar
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarPuntoVenta">Punto de venta</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActualizarVendedor">Vendedor</a></li>
               </ul>
              </li>
          </ul>
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
            <h3 class="fs-2" id="contadorPuntosDeVenta">0</h3>
            <p>Punto de venta(s)</p>
          </div>
          <i id="iconData" class="fas fa-duotone fa-truck fs-1 text-success border rounded-full p-3"></i>
        </div>
      </div>

      <div class="col-xl-5">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            <h3 class="fs-2" id="contadorVendedores">0</h3>
            <p>Vendedor(es)</p>
          </div>
          <i id="iconData" class="fas fa-duotone fa-truck fs-1 text-success border rounded-full p-3"></i>
        </div>
      </div>
  </div>


      <!--- Lista - Puntos de venta -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Punto de ventas ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDePuntosDeVenta">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Dirección 1</th>
                <th scope="col">Dirección 2</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Código postal</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

          </table>
        </div>  
      </div>

        
      <!--- Paginacion - Puntos de venta -->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaSL">
        <a class="page-link" id="paginaPreviaSL">Anterior</a>
        <a class="page-link" id="paginaSiguienteSL">Siguiente</a>
        </ul>
      </nav>





        <!--- Lista - Vendedores -->
        <div class="row tbl-fixed my-5"> 
          <h2 class="pb-4 fs-4 mb-3">Vendedores ingresados:</h2>
          <div class="col">
            <table class="table bg-white rounded shadow-sm table-hover" id="tablaDeVendedores">
              <thead>
                <tr>
                  <th scope="col" width="50">#</th>
                  <th scope="col">Id</th>
                  <th scope="col">Compañía</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>

            </table>
          </div>  
        </div>

        
        <!--- Paginacion - Vendedores -->
        <nav aria-label="">
          <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaST">
          <a class="page-link" id="paginaPreviaST">Anterior</a>
          <a class="page-link" id="paginaSiguienteST">Siguiente</a>
          </ul>
        </nav>
  
     


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


  



  <!----------Añadir---------->


  <!--Punto de venta-->
  <div class="modal fade" id="AñadirPuntoVenta">
      <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Punto de Venta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>

            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="addSalesLocation">

                <div class="col-md-12 formulario__grupo" id="grupo__AddDireccionPuntoVenta">
                  <label for="DireccionPuntoVenta" class="form-label formulario__label">Dirección:</label>
                  <div class="formulario__grupo-input">
                   <input type="text" class="form-control formulario__input" id="DireccionPuntoVenta" name="AddDireccionPuntoVenta" placeholder="1234 Main St.">
                   <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__AddDireccion2PuntoVenta">
                  <label for="Direccion2PuntoVenta" class="form-label formulario__label">Dirección 2:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="Direccion2PuntoVenta" name="AddDireccion2PuntoVenta" placeholder="Apartmento, estudio, o piso.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-6 formulario__grupo" id="grupo__AddCiudadPuntoVenta">
                  <label for="CiudadPuntoVenta" class="form-label formulario__label">Ciudad:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="CiudadPuntoVenta" name="AddCiudadPuntoVenta" placeholder="Ingrese ciudad.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-6 formulario__grupo" id="grupo__AddPostalPuntoVenta">
                  <label for="PostalPuntoVenta" class="form-label formulario__label">Código Postal:</label>
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control formulario__input" id="PostalPuntoVenta" name="AddPostalPuntoVenta" placeholder="Ingrese postal.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario_mensajeHiojam display-none formulario_mensaje_success" id="formulario_mensaje-AñadirPuntoDeVentaSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Punto de venta añadido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirPuntoDeVentaError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro punto de venta! </p>
                </div>

                <div class="formulario_mensajeHiojamErr" id="formulario__mensaje_AccesoAñadirPuntoVentaErr">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" id="btnAñadirPuntoVenta" class="btn btn-dark mb-3">Añadir punto de venta</button>
                </div>

              </form>  
           </div>
          </div>
        </div>
      </div>




      <!--Vendedor-->

      <div class="modal fade" id="AñadirVendedor">
       <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ingreso de Vendedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="addSeller">
        
                  <div class="col-md-12 formulario__grupo" id="grupo__AddCorreoVendedor">
                    <label for="NombreAddVendedor" class="form-label formulario__label">Correo de Usuario:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="NombreAddVendedor" name="AddCorreoVendedor" class="form-control formulario__input" placeholder="Ingrese correo.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="col-12 formulario__grupo" id="grupo__AddNombreEmpresaVendedor">
                    <label for="NombreEmpresaVendedor" class="form-label formulario__label">Nombre de Empresa:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="NombreEmpresaVendedor" name="AddNombreEmpresaVendedor" class="form-control formulario__input" placeholder="Ingrese nombre de la empresa.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none formulario_mensaje_success" id="formulario_mensaje-AñadirVendedorSuccess">
                    <p><i class="fas"></i> <b>Logrado:</b> ¡Vendedor añadido con éxito! </p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirVendedorError">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro vendedor o el usuario no existe! </p>
                  </div>

                  <div class="formulario_mensajeHiojamErr" id="formulario__mensaje_AccesoAñadirVendedorErr">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>
                  
                  <div class="d-grid gap-2">
                    <button type="submit" id="btnAñadirVendedor" class="btn btn-dark mb-3">Añadir Vendedor</button>
                  </div>
              </form>
             </div>
          </div>
        </div>
      </div>







      <!----------Remover---------->



      <!--Punto de venta-->

    <div class="modal fade" id="RemoverPuntoVenta">
       <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Punto de Venta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>

            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeSalesLocation">
              
                <div class="col-md-12 formulario__grupo" id="grupo__ReIdPuntoVenta">
                  <label for="idPuntoVenta" class="form-label formulario__label">Identificador:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="idPuntoVenta" name="ReIdPuntoVenta" placeholder="Ingrese identificador de punto venta.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario_mensajeHiojam display-none formulario_mensaje_success" id="formulario_mensaje-RemoverPuntoDeVentaSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Punto de venta removido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverPuntoDeVentaError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado el punto de venta! </p>
                </div>

                <div class="formulario_mensajeHiojamErr" id="formulario__mensaje_AccesoRemoverPuntoVentaErr">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" id="btnRemoverPuntoVenta" class="btn btn-dark mb-3">Remover Punto de Venta</button>
                </div>

              </form>

          </div>
        </div>
      </div>
     </div>

    <!--Vendedor-->

    <div class="modal fade" id="RemoverVendedor">
       <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar Vendedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="removeSeller">
              
                <div class="col-md-12 formulario__grupo" id="grupo__ReIdVendedor">
                  <label for="idVendedor" class="form-label formulario__label">Identificador (Correo):</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="idVendedor" name="ReIdVendedor" placeholder="Ingrese identificador de vendedor.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario_mensajeHiojam display-none formulario_mensaje_success" id="formulario_mensaje-RemoverVendedorSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡Vendedor removido con éxito! </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverVendedorError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No se ha encontrado el vendedor! </p>
                </div>

                <div class="formulario_mensajeHiojamErr" id="formulario__mensaje_AccesoRemoverVendedorErr">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="d-grid gap-2">
                 <button type="submit" id="btnRemoverVendedor" class="btn btn-dark mb-3">Remover Vendedor</button>
                </div>

              </form>
             </div>
          </div>
        </div>
    </div>


    
    <!----------Actualiar---------->


    <!--Punto de venta-->
   <div class="modal fade" id="ActualizarPuntoVenta">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Actualización de Punto de Venta</h5>
            <h5 class="mt-2" id="updateSalesLocationIdParagraph"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
          </div>

            <style>
            /*Estilo para ventana de actualización - No funciona en la clase de css*/
              #updateSalesLocationIdParagraph {
                margin-left: 22rem;
              }
            </style>

            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="validateSalesLocation">

                <div class="mb-3" id="grupo__ActAccesoPuntoVenta">
                  <label for="idModificarPuntoVenta" id="validateIdLabelSalesLocation" class="form-label formulario__label">Identificador:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" class="form-control formulario__input" name="ActAccesoPuntoVenta" id="validateSalesLocationInput" placeholder="Ingrese identificador de Punto de Venta.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarPuntosDeVentaError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese punto de venta no existe. </p>
                </div>

                <div class="formulario_mensajeHiojamErr" id="formulario__mensaje_AccesoActPuntoVentaErr">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" id="validateSalesLocationButton" class="btn btn-dark">Buscar</button>
                </div>
                  
              </form>
              

             
              <form class="row g-3" id="updateSalesLocation" onsubmit="return fetchPost('updateSalesLocation', 'response', 'Saleslocation', true, 'updateSalesLocationVerify')">

                <div class="col-md-12 formulario__grupo" id="grupo__ActDireccionPuntoVenta">
                  <label for="salesLocationAddress1Update" id="NameActualizarProducto" class="form-label formulario__label updateSalesLocationHidden">Dirección:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input updateSalesLocationHidden" id="salesLocationAddress1Update" name="ActDireccionPuntoVenta" placeholder="1234 Main St">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12 formulario__grupo" id="grupo__ActDireccion2PuntoVenta">
                  <label for="salesLocationAddress2Update" id="NameActualizarProducto" class="form-label formulario__label updateSalesLocationHidden">Dirección 2:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input updateSalesLocationHidden" id="salesLocationAddress2Update" placeholder="Apartmento, estudio, o piso" name="ActDireccion2PuntoVenta">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-6 formulario__grupo" id="grupo__ActCiudadPuntoVenta">
                  <label for="salesLocationCityUpdate" id="NameActualizarProducto" class="form-label formulario__label updateSalesLocationHidden">Ciudad:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input updateSalesLocationHidden" id="salesLocationCityUpdate" name="ActCiudadPuntoVenta" placeholder="Ingrese nueva ciudad.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-6 formulario__grupo" id="grupo__ActPostalPuntoVenta">
                  <label for="salesLocationPostalCode" id="NameActualizarProducto" class="form-label formulario__label updateSalesLocationHidden">Postal:</label>
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control formulario__input updateSalesLocationHidden" id="salesLocationPostalCode" name="ActPostalPuntoVenta" placeholder="Ingrese nuevo postal.">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                </div>

                <div class="col-md-12">
                  <input type="hidden" name="id" id="validateSalesLocationInputHidden">
                </div>

                <div class="formulario_mensajeHiojamActDentroErr" id="formulario__mensajeActPuntoVentaErr">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarSalesLocationError">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                </div>
                <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarSalesLocationSuccess">
                  <p><i class="fas"></i> <b>Logrado:</b> ¡El Punto de venta ha sido actualizado con éxito! </p>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" id="btnActualizarPuntoVenta" class="btn btn-dark updateSalesLocationHidden">Actualizar punto de venta</button>
                </div>

              </form>  
              </div>
           </div>
          </div>
        </div>
      </div>


      <!--Vendedor-->

      <div class="modal fade" id="ActualizarVendedor">
       <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Actualización de Vendedor</h5>
            <h5 class="mt-2" id="updateSellerIdParagraph"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
            <style>
              /*Estilo para ventana de actualización - No funciona en la clase de css*/
              #updateSellerIdParagraph {
                margin-left: 18rem;
              }
            </style>
          </div>
          
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="validateSeller">

                  <div class="mb-3" id="grupo__ActAccesoVendedor">
                    <label for="validateSellerInput" id="validateIdLabelSeller" class="form-label formulario__label">Identificador:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" class="form-control formulario__input" name="ActAccesoVendedor" id="validateSellerInput" placeholder="Ingrese identificador de Vendedor.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarVendedorError">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese vendedor no existe. </p>
                  </div>

                  <div class="formulario_mensajeHiojamErr" id="formulario__mensaje_AccesoActVendedorErr">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" id="validateSellerButton" class="btn btn-dark">Buscar</button>
                  </div>

              </form>


              <form class="row g-3" id="updateSeller" onsubmit="return fetchPost('updateSeller', 'response', 'Seller', true, 'updateSellerVerify')">

                  <div class="col-md-12 formulario__grupo" id="grupo__ActCorreoVendedor">
                    <label for="sellerIdUpdate" id="NameActualizarVendedor" class="form-label formulario__label updateSellerHidden">Identificador (Correo de vendedor):</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="sellerIdUpdate" name="ActCorreoVendedor" class="form-control formulario__input updateSellerHidden" placeholder="Ingrese nuevo correo del vendedor.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>


                  <div class="col-12 formulario__grupo" id="grupo__ActNombreEmpresaVendedor">
                    <label for="sellerCompanyUpdate" id="NameActualizarVendedor" class="form-label formulario__label updateSellerHidden">Nombre de empresa:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" id="sellerCompanyUpdate" name="ActNombreEmpresaVendedor" class="form-control formulario__input updateSellerHidden" placeholder="Ingrese nuevo nombre de la empresa.">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
                  </div>

                  <div class="formulario_mensajeHiojamActDentroErr" id="formulario__mensajeActVendedorErr">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarSellerError">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
                  </div>
                  <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarSellerSuccess">
                    <p><i class="fas"></i> <b>Logrado:</b> ¡El Vendedor ha sido actualizado con éxito! </p>
                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" id="btnActualizarVendedor" class="btn btn-dark updateSellerHidden">Actualizar Vendedor</button>
                  </div>
                  
              </form>

             </div>
          </div>
        </div>
      </div>
   