<script src="/js/profile_page/password/password.js" defer></script>
<link rel="stylesheet" href="/css/profile/password.css">
<title>Gestion de contraseña</title>


<div id="contenedor_barra_busqueda">
<input type="text" id="inputBusqueda" placeholder="¿Qué desea buscar?">
</div>

<ul id="caja_busqueda" class="mt-2">
</ul>

<div id="fondo"> <!--Con los estilos de CSS abarca toda la pagina--> 


  <div id="contenedorPrincipal-Password">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8" id="modal-body">

          <div class="contenedor-title text-center">
            <h1 class="fs-2">Contraseña:</h1>
          </div>

          <form id="FormChangePassword" class="row g-3 mt-5">
            
            <div class="col-md-12 formulario__grupo pb-4" id="grupo__contraseñaActual">
              <label for="email" class="formulario__label mb-2 fs-5">Contraseña actual:</label>
              <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="contraseñaActual" id="contraseñaActualId" placeholder="Escriba su actual contraseña aquí.">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">La sintaxis no es correcta.</p>
            </div>

            <div class="col-md-12 formulario__grupo" id="grupo__constraseñaNueva">
              <label for="contraseña" class="formulario__label mb-2 fs-5">Contraseña nueva:</label>
              <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="constraseñaNueva" id="contraseñaNuevaId" placeholder="Escriba su nueva contraseña aquí.">
                <i class="formulario__validacion-estado fas fa-times-circle mt-5"></i>
              </div>
              <p class="formulario__input-error">La sintaxis no es correcta.</p>
            </div>

            
            <div class="TipMessage text-center mt-5">
              <p class="fw-light fs-5">No compartas tu contraseña con nadie</p>
            </div>

            <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorContraseña">
              <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="col-12 formulario__grupo formulario__grupo-btn-enviar mt-2 pb-5">
              <button type="button" id="btnChangePassword" class="formulario__btn mt-3 mb-4">Cambiar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>