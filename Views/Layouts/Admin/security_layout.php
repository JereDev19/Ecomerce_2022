<link rel="stylesheet" href="/css/security.css">
<script src="/js/jquery-3.6.0.min.js" defer></script>
<script src="/js/UpdateValidations.js" defer></script>
<script src="/js/ValidacionSeguridadCampos.js" defer></script>
<script src="/js/admin_statistics/AdminSecurity_Stats.js" defer></script>

<script src="/js/admin_statistics/PaginatedTable.js" defer></script>
<script src="/js/admin_statistics/security/UserTable_Security.js" defer></script>
<script src="/js/admin_statistics/security/ModuleTable_Security.js" defer></script>
<script src="/js/admin_statistics/security/PermissionTable_Security.js" defer></script>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
  <div class="d-flex align-items-center">
    <h2 class="fs-2 m-0" id="seguridad">Seguridad</h2>
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
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Añadirusuarios">Usuario</a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Añadirmodulos">Modulo</a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Añadirpermisos">Permiso</a></li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-sharp fa-solid fa-minus me-2"></i>Remover
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Removerusuarios">Usuario</a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Removermodulos">Modulo</a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Removerpermisos">Permiso</a></li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-solid fa-link me-2"></i>Actualizar
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Actualizarusuarios">Usuario</a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Actualizarmodulos">Modulo</a></li>
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
    <div class="px-4">
      <div class="row g-3 my-2 justify-content-center">
            <div class="col-xl-3">
              <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                  <h3 class="fs-2" id="contadorUsuario">0</h3>
                  <p>Usuario(s)</p>
                </div>
                <i id="iconData" class="fas fa-user fs-1 text-success border rounded-full p-3"></i>
              </div>
            </div>
          
          
            <div class="col-xl-3">
              <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                  <h3 class="fs-2" id="contadorModulo">0</h3>
                  <p>Modulo(s)</p>
                </div>
                <i id="iconData" class="fas fa-solid fa-book  fs-1 text-success border rounded-full p-3"></i>
              </div>
            </div>
        
            <div class="col-xl-3">
              <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                  <h3 class="fs-2" id="contadorPermiso">0</h3>
                  <p>Permiso(s)</p>
                </div>
                <i id="iconData" class="fas fa-solid fa-bell fs-1 text-success border rounded-full p-3"></i>
              </div>
            </div>
      </div>
    
      
      <!--- Lista - Usuario -->
      <div class="container-fluid">
        <div class="row tbl-fixed my-5"> 
          <h2 class="pb-4 fs-4 mb-3">Usuarios ingresados:</h2>
          <div class="col">
            <table class="table bg-white rounded shadow-sm table-hover display nowrap" id="tablaDeUsuarios">
              <thead>
                <tr>
                  <th scope="col" width="50">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>  
        </div>
      </div>


        
      <!--- Paginacion - Usuario -->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaUT">
        <a class="page-link" id="paginaPreviaUT">Anterior</a>
        <a class="page-link" id="paginaSiguienteUT">Siguiente</a>
        </ul>
      </nav>
      <!--- Lista - Modulo -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Modulos ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDeModulos">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>  
      </div>
        
      <!--- Paginacion - Modulo -->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaMT">
        <a class="page-link" id="paginaPreviaMT">Anterior</a>
        <a class="page-link" id="paginaSiguienteMT">Siguiente</a>
        </ul>
      </nav>
      <!--- Lista - Permisos -->
      <div class="row tbl-fixed my-5"> 
        <h2 class="pb-4 fs-4 mb-3">Permisos ingresados:</h2>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover" id="tablaDePermisos">
            <thead>
              <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Email</th>
                <th scope="col">Permiso</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>  
      </div>
        
      <!--- Paginacion - Permisos -->
      <nav aria-label="">
        <ul class="pagination justify-content-end hoverable" id="listaPaginasTablaPT">
        <a class="page-link" id="paginaPreviaPT">Anterior</a>
        <a class="page-link" id="paginaSiguientePT">Siguiente</a>
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



<!--Añadir-->
<div class="modal fade" id="Añadirusuarios">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingreso de Usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAU" aria-label="Añadirusuarios"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <!--COMIENZO FORMULARIO AÑADIR USUARIO-->
        <form id="FormAAU" class="row g-3">
          <div class="col-md-12 formulario__grupo" id="grupo__nameAd">
            <label for="nombreUser" class="form-label formulario__label">Nombre:</label>
            <div class="formulario__grupo-input">
              <input type="text" id="nombreUser" name="nameAd" class="form-control formulario__input" placeholder="Ingrese su nombre.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__surname1Ad">
            <label for="Apellido1AddUser" class="form-label formulario__label">Apellido 1:</label>
            <div class="formulario__grupo-input">
              <input type="text" id="Apellido1AddUser" name="surname1Ad" class="form-control formulario__input" placeholder="Ingrese su primer apellido.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <br>
          <div class="col-md-6 formulario__grupo" id="grupo__surname2Ad">
            <label for="Apellido2AddUser" class="form-label formulario__label">Apellido 2:</label>
            <div class="formulario__grupo-input">
              <input type="text" id="Apellido2AddUser" name="surname2Ad" class="form-control formulario__input" placeholder="Ingrese su segundo apellido.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-12 formulario__grupo" id="grupo__gmailAd">
            <label for="GmailAddUser" class="form-label formulario__label">Email:</label>
            <div class="formulario__grupo-input">
              <input type="email" id="GmailAddUser" name="gmailAd" class="form-control formulario__input" placeholder="Ingrese su email.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-12 formulario__grupo" id="grupo__passwordAd">
            <label for="ContraseñaAddUser" class="form-label formulario__label">Contraseña:</label>
            <div class="formulario__grupo-input">
              <input type="password" id="ContraseñaAddUser" name="passwordAd" class="form-control formulario__input" placeholder="Ingrese su contraseña">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-12 formulario__grupo mb-4" id="grupo__passwordAd2">
            <label for="ContraseñaAddUser2" class="form-label formulario__label">Repetir contraseña</label>
            <div class="formulario__grupo-input">
              <input type="password" id="ContraseñaAddUser2" name="passwordAd2" class="form-control formulario__input" placeholder="Repetir su contraseña">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Las contraseñas deben ser iguales</p>
          </div>
          <div class="col-12 formulario__grupo" id="grupo__addressAd">
            <label for="Direccion1AddUser" class="form-label formulario__label">Dirección:</label>
            <div class="formulario__grupo-input">
              <input type="text" id="Direccion1AddUser" name="addressAd" class="form-control formulario__input" placeholder="1234 Calle Principal" placeholder="Ingrese su dirección.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__cityAd">
            <label for="CiudadAddUser" class="form-label formulario__label">Ciudad:</label>
            <div class="formulario__grupo-input">
              <input type="text" id="CiudadAddUser" name="cityAd" class="form-control  formulario__input" placeholder="Ingrese su ciudad.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__postalCodeAd">
            <label for="PostalAddUser" class="form-label formulario__label">Postal:</label>
            <div class="formulario__grupo-input">
              <input type="number" id="PostalAddUser" name="postalCodeAd" class="form-control formulario__input" placeholder="Ingrese su postal.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddUser">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario__mensaje_AñadirUsuarioSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Usuario añadido con éxito! </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario__mensaje_AñadirUsuarioError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro usuario! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btnAAU" class="btn btn-dark mb-3 mt-4">Ingresar usuario</button>
          </div>
        </form>
        <!--FINAL FORMULARIO AÑADIR USUARIO-->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Añadirmodulos">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingreso de Modulos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAM" aria-label="Añadirmodulos"></button>
      </div>
      <div class="modal-body" id="modal-body">
        
        <form class="row g-3" id="FormAAM">
          <div class="mb-3" id="grupo__nameModAd">
            <label for="NombreNameMod" class="form-label formulario__label">Nombre:</label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input" id="NombreNameMod" name="nameModAd" placeholder="Ingrese nombre.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="mb-3" id="grupo__AddDescripcionMod">
            <label for="DescripciónModulos" class="form-label formulario__label">Descripción:</label>
            <div class="formulario__grupo-input">
              <textarea id="DescripciónModulos" class="form-control formulario__input" placeholder="Ingrese descripción." name="AddDescripcionMod"></textarea>
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddMod">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirModuloSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Módulo añadido con éxito! </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirModuloError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Se ha encontrado otro módulo! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btnAAM" class="btn btn-dark mb-3 mt-4">Ingresar modulo</button>
          </div>
       </form>
     </div>
  </div>
 </div>
</div>
<div class="modal fade" id="Añadirpermisos">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingreso de Permisos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalAP" aria-label="Añadirpermisos"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="row g-3" id="FormAAP">
          <div class="mb-3" id="grupo__emailAdPer">
            <label for="emailPermisos" class="form-label formulario__label">Email de usuario</label>
            <div class="formulario__grupo-input">
              <input type="text" id="emailPermisos" name="emailAdPer" class="form-control formulario__input" placeholder="usuario@asd.com">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="mb-3" id="grupo__permisoAdPer">
            <label for="permisos" class="form-label formulario__label">Permiso</label>
            <div class="formulario__grupo-input">
              <input type="text" id="permisos" name="permisoAdPer" class="form-control formulario__input" placeholder="ejemplo.permiso.admin">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorAddPer">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-AñadirPermisoSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Permiso añadido con éxito! </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-AñadirPermisoError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Comprueba tus datos! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btnAAP" class="btn btn-dark mb-3 mt-4">Ingresar permiso</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Remover-->
<div class="modal fade" id="Removerusuarios">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalRU" aria-label="Removerusuarios"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="row g-3" id="FormRRU">
          <div class="mb-3" id="grupo__ReEmail">
            <label for="email" class="form-label formulario__label">Identificador (Correo):</label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input" id="email" name="ReEmail" placeholder="Ingrese identificador de usuario.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorReUser">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverUsuarioSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Usuario removido con éxito! </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverUsuarioError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No ha encontrado el usuario! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btnRRU" class="btn btn-dark mb-3 mt-4">Remover Usuario</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Removermodulos">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar modulo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalRM" aria-label="Removermodulos"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="row g-3" id="FormRRM">
          <div class="mb-3" id="grupo__ReidMod">
            <label for="identificador" class="form-label formulario__label">Identificador:</label>
            <div class="formulario__grupo-input">
              <input type="text" name="ReidMod" class="form-control formulario__input" id="identificador" placeholder="Ingrese identificador de modulo.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorReMod">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverModuloSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Módulo removido con éxito! </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverModuloError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡No ha encontrado el módulo! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btnRRM" class="btn btn-dark mb-3 mt-4">Remover modulo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Removerpermisos">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar permiso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalRP" aria-label="Removerpermisos"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="row g-3" id="FormRRP">
          <div class="mb-3" id="grupo__emailPermiso">
            <label for="emailPermisos" class="form-label formulario__label">Email:</label>
            <div class="formulario__grupo-input">
              <input type="text" name="emailPermiso" class="form-control formulario__input" id="emailPermisos" placeholder="Ingrese email.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="mb-3" id="grupo__permission">
            <label for="permisos" class="form-label formulario__label">Permiso:</label>
            <div class="formulario__grupo-input">
              <input type="text" name="permission" class="form-control formulario__input" id="permisos" placeholder="Ingrese permiso.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorRePer">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje_success display-none" id="formulario_mensaje-RemoverPermisoSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Permiso removido con éxito! </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-RemoverPermisoError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Comprueba tus datos! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btnRRP" class="btn btn-dark mb-3 mt-4">Remover permiso</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Modificar-->
<div class="modal fade" id="Actualizarusuarios">
  <div class="modal-dialog modal-dialog-centered modal-lg">
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar Usuario</h5>
        <h5 class="mt-2" id="updateUserIdParagraph"></h5>
        <style>
          /*Estilo para ventana de actualización - No funciona en la clase de css*/
            #updateUserIdParagraph {
              margin-left: 22rem;
            }
        </style>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="Actualizarusuarios" aria-label="Actualizarusuarios"></button>
      </div>

      <div class="modal-body" id="modal-body">
        <form class="row g-3" id="validateUser" onsubmit="return validateUser(false)">
          <div class="col-md-12 formulario__grupo" id="grupo__idActualizarUser">
            <label for="validateUserInput" id="validateIdLabelUser" class="form-label formulario__label">Identificador (Correo):</label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input" name="idActualizarUser" id="validateUserInput" placeholder="Ingrese identificador de usuario.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorActUserAcceso">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarUsuarioError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese usuario no existe. </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="validateUserButton" class="btn btn-dark mt-2">Buscar usuario</button>
          </div>
        </form>
        <form class="row g-3" id="updateUser" onsubmit="return fetchPost('updateUser', 'response', 'User', true, 'updateUserVerify')">
          <div class="col-md-12 formulario__grupo" id="grupo__ActNameUser">
            <label for="nameUpdateUser" class="form-label formulario__label updateUserHidden">Nombre</label>
            <div class="formulario__grupo-input">
              <input type="text" id="nameUpdateUser" name="ActNameUser" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su nombre.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El usuario solo puede contener letras.</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__ActNameSurname1">
            <label for="surname1UpdateUser" class="form-label formulario__label updateUserHidden">Apellido 1</label>
            <div class="formulario__grupo-input">
              <input type="text" id="surname1UpdateUser" name="ActNameSurname1" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su primer apellido.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El apellido solo puede contener letras.</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__ActNameSurname2">
            <label for="surname2UpdateUser" class="form-label formulario__label updateUserHidden">Apellido 2</label>
            <div class="formulario__grupo-input">
              <input type="text" id="surname2UpdateUser" name="ActNameSurname2" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su segundo apellido.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El segundo apellido solo puede contener letras.</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__ActEmailUser">
            <label for="emailUpdateUser" class="form-label formulario__label updateUserHidden">Email</label>
            <div class="formulario__grupo-input">
              <input type="text" id="emailUpdateUser" name="ActEmailUser" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su email.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__ActPasswordUser">
            <label for="passwordUpdateUser" class="form-label formulario__label updateUserHidden">Contraseña</label>
            <div class="formulario__grupo-input">
              <input type="password" id="passwordUpdateUser" name="ActPasswordUser" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su contraseña.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
          </div>
          <div class="col-12 formulario__grupo" id="grupo__ActDireccionUser">
            <label for="streetUpdateUser" class="form-label formulario__label updateUserHidden">Dirección</label>
            <div class="formulario__grupo-input">
              <input type="text" id="streetUpdateUser" name="ActDireccionUser" class="form-control formulario__input updateUserHidden" placeholder="1234 Calle Principal">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La dirección debe ser real.</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__ActCiudadUser">
            <label for="cityUpdateUser" class="form-label formulario__label updateUserHidden">Ciudad</label>
            <div class="formulario__grupo-input">
              <input type="text" id="cityUpdateUser" name="ActCiudadUser" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su ciudad.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La ciudad no es correcta</p>
          </div>
          <div class="col-md-6 formulario__grupo" id="grupo__ActPostalUser">
            <label for="postalUpdateUser" class="form-label formulario__label updateUserHidden">Postal</label>
            <div class="formulario__grupo-input">
              <input type="number" id="postalUpdateUser" name="ActPostalUser" class="form-control formulario__input updateUserHidden" placeholder="Ingrese su postal.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El postal no es correcto, debe contener solo numeros</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensajeActUsrErr">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarUsuarioError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarUsuarioSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡El usuario ha sido actualizado con éxito! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="BtnActualizarUser" class="btn btn-dark updateUserHidden mt-3">Actualizar usuario</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="Actualizarmodulos">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar modulo</h5>
        <h5 class="mt-2" id="updateModIdParagraph"></h5>
        <style>
          /*Estilo para ventana de actualización - No funciona en la clase de css*/
            #updateModIdParagraph {
              margin-left: 18rem;
            }
        </style>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="Actualizarmodulos" aria-label="Actualizarmodulos"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="row g-3" id="validateMod" onsubmit="validateModule(false)">
          <div class="col-md-12 formulario__grupo" id="grupo__idActualizarModulo">
            <label for="validateModInput" id="validateIdLabelMod" class="form-label formulario__label">Identificador:</label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input pl-5 mb-2" name="idActualizarModulo" id="validateModInput" placeholder="Ingrese identificador del modulo.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error mt-2">La sintaxis no es correcta</p>
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje_ErrorActModAcceso">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarBuscarModuloError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ese módulo no existe. </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="validateModButton" class="btn btn-dark mt-2">Buscar modulo</button>
          </div>
        </form>
        
        <form class="row g-3" id="updateMod" onsubmit="return fetchPost('updateMod', 'response', 'Module', true, 'updateModuleVerify')">

          <div class="col-md-12 formulario__grupo" id="grupo__NombreModuloActualizar">
            <label id="NameActualizarModulo" for="NombreModulos" class="form-label formulario__label updateModHidden">Nombre</label>
            <div class="formulario__grupo-input">
              <input type="text" class="form-control formulario__input updateModHidden" name="NombreModuloActualizar" id="NombreModulos" placeholder="Ingrese nombre del modulo.">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="input-error_validateMod">La sintaxis no es correcta</p>
          </div>
          <div class="mb-3" id="grupo__DescripcionModuloActualizar">
            <label id="DescriptionActualizarModulo" for="DescriptionModulo" class="form-label formulario__label updateModHidden">Descripción</label>
            <div class="formulario__grupo-input">
              <textarea id="DescriptionModulo" name="DescripcionModuloActualizar" class="form-control formulario__input updateModHidden" cols="30" rows="10" placeholder="Ingrese descripción del modulo."></textarea>
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="input-error_validateMod">La sintaxis no es correcta</p>
          </div>
          <div class="col-md-12">
            <input type="hidden" name="IdModuloActualizar" id="IdModuloActualizar">
          </div>
          <div class="formulario__mensaje" id="formulario__mensajeActModErr">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario_mensajeHiojam display-none" id="formulario_mensaje-ActualizarModuloError">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Ha habido un error. </p>
          </div>
          <div class="formulario_mensajeHiojam formulario_mensaje-success display-none" id="formulario_mensaje-ActualizarModuloSuccess">
            <p><i class="fas"></i> <b>Logrado:</b> ¡El módulo ha sido actualizado con éxito! </p>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="BtnActualizarModulo" class="btn btn-dark updateModHidden mt-3">Actualizar modulo</button>
            <p class="formulario__mensaje-exitoActualizarModulo" id="formulario__mensaje-exitoActualizarModulo">Modulo actualizado con exito !</p>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

