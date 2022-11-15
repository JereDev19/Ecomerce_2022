<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>InfinusLight</title>

  <link rel="stylesheet" href="/css/header/style.css">

  <script src="/js/jquery-3.6.0.min.js"></script>
  
  <!--FontAwesome-->
  <script src="https://kit.fontawesome.com/aeeaca3c2d.js" crossorigin="anonymous"></script>

  <!--Recaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!--Links JS-->
  <script src="/js/UtilityClasses.js"></script>
  <script src="/js/Cookies.js"></script>

  <!--Animaciones - Funcionalidades-->
  <script src="/js/home_page/AnimacionMenu.js" defer></script>
  <script src="/js/home_page/BotonArriba.js" defer></script>
  <script src="/js/home_page/Buscador.js" defer></script>

  <!--Otros-->
  <script src="/js/PostManager.js" defer></script>
  <script src="/js/header/Validacion_Usuario.js" defer></script>
  <script src="/js/header/MiniCartManager.js" defer></script>
  <script src="/js/header/MiniFavouriteManager.js" defer></script>

</head>
<body>
  
<!--------------------------------------------------------HEADER----------------------------------------------------------------->
  <header id="header" class="position-fixed">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">

          <div class="container">

            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="/">
              <div class="logo d-flex justify-content-center align-items-center">
                <img src="/Images/asd.png">
              </div>
            </a>
            
            <div class="icons order-lg-2 dropdown">
              
              <a id="cartDropdown" role="button" aria-expanded="false">
                <!-- Bubble alert -->
                <span id="BubbleAlertCarrito" class="top-0 start-100 translate-middle badge bg-danger">0</span> 
                <i id="cart_icon" class="fa fa-shopping-cart pe-5"></i>

                <ul class="dropdown-menu mt-3" id="cart-container" aria-labelledby="cartDropdown">
                  
                  <p class="dropdown-item fw-bold fst-italic text-center">Carrito</p> 

                  <li><hr class="dropdown-divider"></li>

                  <ul id="StylesUl"></ul>

                  <div id="StylesButtonCarro">
                    <a href="/Cart/contents"><button class="btn btn-warning" id="Carro">Ir al carro</button></a>
                  </div>

                </ul>
              </a>

              

              <a id="favouriteDropdown" role="button" aria-expanded="false">
                <i id="favourite_icon" class="fa fa-heart pe-5"></i>

                <ul class="dropdown-menu mt-3" id="favourite-container" aria-labelledby="favouriteDropdown">
                  
                  <p class="dropdown-item fw-bold fst-italic text-center">Favoritos</p> 

                  <li><hr class="dropdown-divider"></li>

                  <ul id="StylesFl"></ul>
      
                  <div id="StylesButtonCarro">
                    <a href="/Product/favourites"><button class="btn btn-danger" id="Carro">Ir a favoritos</button></a>
                  </div>

                </ul>
              </a>

              <!-- Acomodamiento de contador-->
              <style>
                 #BubbleAlertCarrito {
                  margin-right: -58px;
                 }
              </style>
              
              <a id="loginDropdown" role="button" aria-expanded="false">
                <i class="fa fa-solid fa-user-secret pe-5" id="login_icon"></i>

                <ul class="dropdown-menu" id="options-container" aria-labelledby="loginDropdown">
                  <p class="dropdown-item fw-bold fst-italic">Opciones</p> 
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/User/profile">Perfil</a></li>
                  <li><a id="logout_button" class="dropdown-item" href="">Cerrar sesión</a></li>
                </ul>
              </a>
              
              <a><i class="fa fa-search pe-5" id="icono-busqueda"></i></a>

            </div>

            <!--Menu hamburguesa cuando sea responsive-->
            <button class = "navbar-toggler border-0" type="button" data-bs-toggle="collapse"  data-bs-target="#navMenu">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="menu collapse navbar-collapse order-lg-1 " id="navMenu">
              <ul class="navbar-nav d-flex text-center justify-content mx-auto mb-2 mb-lg-0 me-auto">
                <li class="nav-item px-2 py-2">
                  <a class="desplazar nav-link text-uppercase text-dark fst-normal" href="/">Inicio</a>
                </li>
              </ul>
              </ul>
            </div>

          </div>
        </nav>
   </header>  

  <div id="contenedor_barra_busqueda">
    <input type="text" id="inputBusqueda" placeholder="¿Qué desea buscar?">
  </div>

  <ul id="caja_busqueda" class="mt-2"></ul>