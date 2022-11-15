<script src="/js/profile_page/data/datos.js" defer></script>
<link rel="stylesheet" href="/css/profile/datos.css">

  <div class="contenedor-principal mb-5" id="contenedor-principalID">
    <div class="text-center pb-5" id="container-img-user">
      <img src="/Images/Profile_Page/usuario.png" class="img-fluid pb-5" id="icon-user" width="90px"/>
      <h3><?= $userName ?></h3>
    </div>
    
    <div class="container-fluid pb-5">

      <div class="row mt-5 px-3">
        <!-- Espaciado -->
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-0.5">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Correo electronico: <span id="userEmail" class="mx-4 fs-7 fw-light"><?= $userEmail ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateEmail"></i>
          </div>
        </div>
      </div>
        
      
      <div class="row border-none d-flex justify-content-center align-items-center pb-5">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 mt-1 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Contraseña: <span class="mx-4 fs-7 fw-light">********</span></h5>
            <a href="/User/profile/password"><i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <h5 class="fw-bold pb-5 text-center" id="dataPersonUser">Datos personales:</h5>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-1">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Nombre: <span id="userName" class="mx-4 fs-7 fw-light"><?= $userName ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateName"></i>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-1">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Apellido 1: <span id="userSurname1" class="mx-4 fs-7 fw-light"><?= $userSurName1 ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateSurname1"></i>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-1">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Apellido 2: <span id="userSurname2" class="mx-4 fs-7 fw-light"><?= $userSurName1 ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateSurname2"></i>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-1">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Ciudad: <span id="userCity" class="mx-4 fs-7 fw-light"><?= $userCity ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateCity"></i>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-1">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Calle: <span id="userStreet" class="mx-4 fs-7 fw-light"><?= $userStreet ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateStreet"></i>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-1">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Codigo Postal: <span id="userPostal" class="mx-4 fs-7 fw-light"><?= $userPostalCode ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdatePostalCode"></i>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center align-items-center pb-5">
        <div class="card col-11 col-xs-11 col-sm-11 col-md-8 col-lg-8 col-xxl-10 border-bottom shadow-md border-0">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h5>Teléfono: <span id="userPhone" class="mx-4 fs-7 fw-light"><?= $userPhone ?></span></h5>
            <i id="iconEdit" class="fas fa-light fa-pen fs-5" role="button" data-bs-toggle="modal" data-bs-target="#modalUpdateTelephone"></i>
          </div>
        </div>
      </div>
    </div>
                    
  <!------------------------------------------------------------------------------ Modales ------------------------------------------------------------------------>
  <!-- Acceso -->
  <!-- Modal for change gmail -->
  
      <div class="modal fade" id="modalUpdateEmail">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cambiar Correo Electronico</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">

              <form class="row g-3" id="FormChangeGmail">
                  <!-- Grupo: Correo Electronico -->
                  <div class="col-md-12 formulario__grupo" id="grupo__changeGmail">
                    <label for="correo" class="formulario__label">Correo Electrónico:</label>
                    <div class="formulario__grupo-input">
                      <input type="email" class="formulario__input" name="changeGmail" id="correo" placeholder="correo@gmail.com" required>
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La sintaxis no es correcta.</p>
                  </div>

                  <div class="formulario__mensaje display-none" id="formulario__mensaje_C">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                    <button type="button" id="btnChangeGmail" class="formulario__btn mt-3 mb-4">Cambiar</button>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>  
    
    <!-- Personal information -->  
    <!--Modal for change name-->
    <div class="modal fade" id="modalUpdateName">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cambiar Nombre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal-body">
            <form id="FormChangeName" class="row g-3">
              <div class="col-md-12 formulario__grupo" id="grupo__changeName">
                <label for="name" class="formulario__label mb-2">Nombre:</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="changeName" id="name" placeholder="Escriba su nombre aquí">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La sintaxis no es correcta.</p>
              </div>

              <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorName">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
              </div>

              <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                <button type="button" id="btnChangeName" class="formulario__btn mt-3 mb-4">Cambiar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Modal for change surname 1-->
    <div class="modal fade" id="modalUpdateSurname1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cambiar Apellido 1</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal-body">
            <form id="FormChangeSurname1" class="row g-3">
                <div class="col-md-12 formulario__grupo" id="grupo__changeSurname1">
                <label for="surname1" class="formulario__label mb-2">Apellido 1:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="changeSurname1" id="surname1" placeholder="Escriba su primer apellido aquí." required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">La sintaxis no es correcta.</p>
                </div>

                <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorApellido1">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                  <button type="button" id="btnChangeSurname1" class="formulario__btn mt-3 mb-4">Cambiar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Modal for change surname 2-->
    <div class="modal fade" id="modalUpdateSurname2">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cambiar Apellido 2</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal-body">
            <form id="FormChangeSurname2" class="row g-3">
              <div class="col-md-12 formulario__grupo" id="grupo__changeSurname2">
                <label for="surname2" class="formulario__label mb-2">Apellido 2:</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="changeSurname2" id="surname2" placeholder="Escriba su segundo apellido aquí." required>
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La sintaxis no es correcta.</p>
              </div>

              <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorApellido2">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
              </div>

              <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                <button type="button" id="btnChangeSurname2" class="formulario__btn mt-3 mb-4">Cambiar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

      <!--Modal for change city -->
      <div class="modal fade" id="modalUpdateCity">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cambiar Ciudad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
              <form id="FormChangeCity" class="row g-3">
                <div class="col-md-12 formulario__grupo" id="grupo__changeCity">
                  <label for="city" class="formulario__label mb-2">Ciudad:</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="changeCity" id="city" placeholder="Escriba su ciudad aquí." required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">La sintaxis no es correcta.</p>
                </div>

                <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorCiudad">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                  <button type="button" id="btnChangeCity" class="formulario__btn mt-3 mb-4">Cambiar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--Modal for change street -->
       <div class="modal fade" id="modalUpdateStreet">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Calle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="modal-body">
                <form id="FormChangeStreet" class="row g-3">
                  <div class="col-md-12 formulario__grupo" id="grupo__changeStreet">
                    <label for="street" class="formulario__label mb-2">Calle:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" class="formulario__input" name="changeStreet" id="street" placeholder="Escriba su calle aquí." required>
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La sintaxis no es correcta.</p>
                  </div>

                  <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorCalle">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                    <button type="button" id="btnChangeStreet" class="formulario__btn mt-3 mb-4">Cambiar </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--Modal for change postal code -->
        <div class="modal fade" id="modalUpdatePostalCode">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Código Postal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="modal-body">
                <form id="FormChangePostalCode" class="row g-3"> 
                  <div class="col-md-12 formulario__label" id="grupo__changePostalCode">
                    <label for="postalCode" class="formulario__label mb-2">Código Postal:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" class="formulario__input" name="changePostalCode" id="postalCode" placeholder="Escriba su código postal aquí." required>
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La sintaxis no es correcta.</p>
                  </div>

                  <div class="formulario__mensaje display-none" id="formulario__mensaje_PostalCode">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                    <button type="button" id="btnChangePostalCode" class="formulario__btn mt-3 mb-4">Cambiar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--Modal for change telephone -->
        <div class="modal fade" id="modalUpdateTelephone">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Cambiar Teléfono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="modal-body">
                <form id="FormChangeTelephone" class="row g-3">
                  <div class="col-md-12 formulario__label" id="grupo__changeTelephone">
                    <label for="telephone" class="formulario__label mb-2">Telefono:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" class="formulario__input" name="changeTelephone" id="telephone" placeholder="Escriba su teléfono aquí." required>
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La sintaxis no es correcta.</p>
                  </div>

                  <div class="formulario__mensaje display-none" id="formulario__mensaje_ErrorTelefono">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>

                  <div class="col-12 formulario__grupo formulario__grupo-btn-enviar">
                    <button type="button" id="btnChangeTelephone" class="formulario__btn mt-3 mb-4">Cambiar</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>