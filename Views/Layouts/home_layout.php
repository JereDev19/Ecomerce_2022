<link rel="stylesheet" href="/css/home_page/style.css">

<script src="/js/home_page/validacion.js" defer></script>
<script src="/js/home_page/IntersectionObserver.js" defer></script>
<script src="/js/home_page/ListaProductosTop.js" defer></script>
<script src="/js/home_page/gmail.js"></script>



  <!-- SLIDER -->
  
  <div class="container-fluid">

    <div class="row">

       <div id="sliderInicio" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

          <div class="carousel-item active" id="imagenesSlider" data-bs-interval="1800">
            <img src="/Images/Home_Page/bg/slider1.png" class="img-fluid d-block img-thumbnail w-100">
          </div>
          
          <div class="carousel-item" id="imagenesSlider" data-bs-interval="1800">
            <img src="/Images/Home_Page/bg/slider2.png" class="img-fluid d-block img-thumbnail w-100">
          </div>
          
          <div class="carousel-item" id="imagenesSlider" data-bs-interval="1800">
            <img src="/Images/Home_Page/bg/slider3.png" class="img-fluid d-block img-thumbnail w-100">
          </div>


          
          <div class="text-center mt-5">
              <div class="container h-100 d-flex align-items-center justify-content-center">
                <div class="row justify-content-center">
                  <div class="col-11 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12" id="slider-info">
                    <h6 class="text-light pb-4">BIENVENIDO A TU RESTAURANTE.</h6>
                    <h5 class="display-1 text-light pb-4 fs-1" id="SliderReco">Los mejores platos.</h5>
                    <a href="/Product/search" class="btn btn-warning" id="hacerPedidoBtn">Hacer pedido</a>
                  </div>
                </div>
              </div>
          </div>
          
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#sliderInicio" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#sliderInicio" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

        </div>
    </div>
  
  </div>


<!--FIN SLIDER -->


<!-- PLATOS -->
 <div class="fondo">
    <section id="explore-food">
      <div class="explore-food">
        <div class="container">
          <div class="row" id="idRowPlatos">
            <div class="col-sm-12">
              <div class="text-content text-center">
                <h2 id="title-platos" class="pb-2 mt-5">Productos destacados</h2>
                <p id="info-platos" class="mt-5">Explora nuestros productos màs frecuentados.</p>
              </div>
            </div>

            <div class="contenedor-img">
              <div class="row pt-5 d-flex">

                <div class="col-lg-4 col-md-6 mb-lg-0 pb-5">
                  <div class="card border">
                    <img src="/Images/Home_Page/img/unknown_product.png" id="productoTop1-Imagen" class="img-fluid">
                    <div class="p-3">
                      <h5 class="pb-3" id="productoTop1-Nombre">Producto 1</h5>
                      <p id="productoTop1-Descripcion">Descripción producto.</p>
                      <a><button class="mt-1 btn btn-warning" id="productoTop1-Carrito">Añadir al carrito</button></a>
                      <a id="productoTop1-LeerMas"><button class="mt-1 btn btn-warning">Leer más</button></a>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-lg-0 pb-5">
                  <div class="card border">
                    <img src="/Images/Home_Page/img/unknown_product.png" id="productoTop2-Imagen" class="img-fluid">
                    <div class="p-3">
                      <h5 class="pb-3" id="productoTop2-Nombre">Producto 2</h5>
                      <p id="productoTop2-Descripcion">Descripción producto.</p>
                      <a><button class="mt-1 btn btn-warning" id="productoTop2-Carrito">Añadir al carrito</button></a>
                      <a id="productoTop2-LeerMas"><button class="mt-1 btn btn-warning">Leer más</button></a>
                    </div>
                  </div>
                </div>
            
                <div class="col-lg-4 col-md-6 mb-lg-0 pb-5">
                  <div class="card border">
                    <img src="/Images/Home_Page/img/unknown_product.png" id="productoTop3-Imagen" class="img-fluid">
                    <div class="p-3">
                      <h5 class="pb-3" id="productoTop3-Nombre">Producto 3</h5>
                      <p  id="productoTop3-Descripcion">Descripción producto.</p>
                      <a><button class="mt-1 btn btn-warning" id="productoTop3-Carrito">Añadir al carrito</button></a>
                      <a id="productoTop3-LeerMas"><button class="mt-1 btn btn-warning">Leer más</button></a>
                    </div>
                  </div>
                </div>

                <div class="row mx-auto" id="rowVerMas">
                  <a href="/Product/search"><button class="btn btn-warning fw-bolder mt-2" id="VerPlatos">Ver más platos</button></a>
                </div>

            </div>
          </div>
        </div>
      </section>






    <!-- PREGUNTAS FRECUENTES -->
      
      <section id="preguntas-frecuentes">
        <div class="preguntas wrapper">
          <div class="container">
            <div class="row" style="margin-top: 8rem;">
              <div class="col-sm-12">
                <div class="text-center">
                  <h2 class="position-relative d-inline-block" id="PregTitle">Preguntas Frecuentes</h2>
                </div>
              </div>

              <div class="parrafos row pt-5">

                  <div class="col-11 col-xs-11 col-sm-6 mb-4">
                    <h5 id="titlePregFrec"><span>~</span>¿Qué medios de pago manejamos?.</h5>
                    <p id="SobreNosotros">De momento solo nos manejamos por pago en efectivo, esperamos prontamente poder ofrecer un servicio de pago electrónico.</p>
                  </div>

                  <div class="col-11 col-xs-11 col-sm-6 mb-4">
                    <h5 id="titlePregFrec"><span>~</span>¿Contamos con Soporte?.</h5>
                    <p id="SobreNosotros">Si tiene alguna consulta o presenta un problema en nuestro sitio, contáctenos por los medios de comunicación disponibles y nuestro personal le asistirá en el menor tiempo posible con la máxima dedicación.</p>
                  </div>

                  <div class="col-11 col-xs-11 col-sm-6 mb-4">
                    <h5 id="titlePregFrec"><span>~</span>¿Cómo se a que vendedor comprarle?.</h5>
                    <p id="SobreNosotros">Hemos incluido un sistema de clasificación en base a las opiniones y experiencias de los consumidores en factores como la calidad del producto o la atención recibida por parte del vendedor. </p>
                  </div>

                  <div class="col-11 col-xs-11 col-sm-6 mb-4">
                    <h5 id="titlePregFrec"><span>~</span>¿Qué beneficios me otorga este sistema?.</h5>
                    <p id="SobreNosotros">Usted tendrá a su disposición un sistema especializado en gestionar aspectos como la venta de sus productos. Además de una vista en tiempo real del flujo de las ventas concretadas con la correspondiente factura de las mismas, todas estás y más funciones están al alcance de su mano y en un solo lugar.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!--FIN - PREGUNTAS FRECUENTES-->


    <!------------------------------------------------------------------------CONTACTO------------------------------------------------------------------------------>

    <section id="contacto">
        <div class="container">

          <div class="row">
            <div class="col-12 text-center mt-5">
              <h1 class="contacto-titulo">Contáctanos</h1>
              <p class="contact-intro pt-2 pb-5">Como empresa nos encanta satisfacer al cliente, brindandole una atención al instante.</p>
            </div>
          </div>

          <form class="formulario row justify-content-center" id="formulario">
            <div class="col-lg-8">
              <div class="row g-3"> <!-- Generar espaciado a los costados y abajo - g-3 -->

                <!--Grupo - Nombre completo-->
                <div class="formulario__grupo col-md-6" id="grupo__nombre">
                  <label for="nombre" id="label-contact" class="pb-3">Nombre Completo:</label>
                  <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese aquí" required>
                  <p class="formulario__input-error">El nombre tiene que contener solo letras.</p>
                </div>

                <!--Grupo - Correo electronico-->
                <div class="formulario__grupo col-md-6 pb-3" id="grupo__gmail">
                  <label for="gmail" id="label-contact" class="pb-3">Correo electronico:</label>
                  <input type="text" class="formulario__input" name="email" id="email" placeholder="Ingrese aquí" required>
                  <p class="formulario__input-error">El correo electronico debe contener el formato clasico.</p>
                </div>

                <!--Grupo - Mensaje-->
                <div class="formulario__grupo" id="grupo__mensaje">
                  <label for="mensaje" id="label-contact" class="pb-3">Mensaje:</label>
                  <textarea name="message" id="message" cols="30" rows="10" class="formulario_inputMensaje" placeholder="Ingrese aquí" required></textarea>
                </div>

                <!--Grupo: Termino y Condiciones-->
                <div class="formulario__grupo col-md-6 pb-4" id="grupo__terminos">
                  <label class="formulario__label"></label>
                    <input type="checkbox" class="formulario__checkbox" name="terminos" id="terminosContact">
                    Acepto los Terminos y Condiciones
                </div>

                <div class="formulario__mensaje col-md-12" id="formulario__mensaje">
                  <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>
              </div>
              
              <div class="formulario__grupo formulario__grupo-btn-enviar col-md-12">
                <input type="submit" id="btnContact" class="formulario__btn mt-3 mb-5" value="Enviar">
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Mensaje enviado exitosamente!</p>
              </div>  

              </div>
            </div>
          </form>

        </div>
      </section>
      


    <!--FIN - CONTACTO-->



    <!----------------------------------------------------------------------------MAPA--------------------------------------------------------------------------------->
    <div class="container">
      <section class="row">
        <div id="mapa">
          <iframe id="mapa-img" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1639.5047421348334!2d-56.22082393616438!3d-34.73015531460332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a1d2bb0d94746b%3A0x233db8c6106abffa!2sEscuela%20T%C3%A9cnica%20Superior%20de%20Las%20Piedras!5e0!3m2!1ses-419!2suy!4v1662853845044!5m2!1ses-419!2suy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
    </div>


    

    <!--Botón de ir hacia arriba-->

    <a class="boton" id="boton">
      <i class="fw-200 fas fa-solid fa-arrow-up"></i>
    </a>

  </div>