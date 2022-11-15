<link rel="stylesheet" href="/css/profile/inicio.css"> 

<!-- Apartado de opciones-->

<main class="contUser" id="cuenta-user">

  <div class="container-fluid">

      <div class="row justify-content-center mt-4" id="contenido-mi-perfil">

          <div class="card col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xxl-8 border-0 border-bottom shadow-md">
              <div class="card-body d-flex justify-content-center align-items-center">
                  <img src="/Images/Profile_Page/usuario.png" class="pb-3" id="icon-user" width="100px">
                  <span class="h4 ms-4" id="nombre-user-perfil"><?= $userName ?></span>
              </div>
          </div>

          <div class="col-12 card col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xxl-8 border-0 shadow-md mt-3" id="card-abajo-mi-perfil">
              <div class="card-body mt-2">
                  <ul class="list-unstyled">

                      <a href="/User/profile/data" class="mi-perfil text-decoration-none" id="mi-perfil-datos">
                          <li class="mb-2">
                              <div class="row border-bottom pb-5">
                                  <div class="col-1">
                                      <img src="/Images/Profile_Page/Inicio/datos.png" class="" width="40px" id="perfil-mis-datos-icono">
                                  </div>
                                  <div class="col">
                                      <ul class="list-unstyled">
                                          <li><span class="fs-3 fw-300 ms-3 mt-3 mis-datos" id="mis-datos-user-perfil">Mis datos.</span></li>
                                          <li><span class="fs-5 fw-light ms-3 mt-3 text-muted">Gestiona tus datos personales.</span></li>
                                      </ul>
                                  </div>
                                  <div class="col-1 mt-2 text-secondary">
                                      <svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                          <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                                      </svg>
                                  </div>
                              </div>
                          </li>
                      </a>
                      


                      <a href="/User/profile/password" class="mi-perfil text-decoration-none">
                          <li class="mb-2">
                              <div class="row border-bottom pb-5 pt-5">
                                  <div class="col-1">
                                      <img src="/Images/Profile_Page/Inicio/password.png" class="" width="40px">
                                  </div>
                                  <div class="col">
                                      <ul class="list-unstyled">
                                          <li><span class="fs-3 fw-300 ms-3 mt-3 titulo-mis-datos" id="mis-direcciones-user-perfil">Contraseña y autentificación.</span></li>
                                          <li><span class="fs-5 fw-light ms-3 mt-3 text-muted">Gestiona tu contraseña.</span></li>
                                      </ul>
                                  </div>
                                  <div class="col-1 mt-2 text-secondary">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                          <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                                      </svg>
                                  </div>
                              </div>
                          </li>
                      </a>


                  </ul>
              </div>
          </div>
      </div>
  </div>
</main>