<link rel="stylesheet" href="/css/login/style.css">
<script src="/js/login/Validacion_Login.js" defer></script>

  <!-- Forms de login -->
<div class="modal-content mt-5" id="modal-content-login">
    <div class="modal-header">
      <h5 class="modal-title">Iniciar sesión</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" id="CerrarModalLogin" aria-label="loginn"></button>
    </div>

    <div class="modal-body">

      <form id="FormLogin" class="formulario row g-3" onsubmit="return false;">

        <!-- Grupo: Correo Electronico -->
        <div class="col-md-12 formulario__grupoL mb-4" id="grupo__correoLogin">
          <label for="correoL" class="formulario__labelL mb-2">Correo Electrónico:</label>
          <div class="formulario__grupo-inputL">
            <input type="email" class="formulario__inputL" name="correoLogin" id="correoL" placeholder="correo@gmail.com" required>
            <i class="formulario__validacion-estadoL fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-errorL">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
        </div>

          <!-- Grupo: Contraseña -->
          <div class="col-md-12 formulario__grupoL mb-4" id="grupo__passwordLogin">
            <label for="passwordLogin" class="formulario__labelL mb-2">Contraseña:</label>
            <div class="formulario__grupo-inputL">
              <input type="password" class="formulario__inputL" name="passwordLogin" id="passwordLogin" placeholder="Ingrese aquí" required>
              <i class="formulario__validacion-estadoL fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-errorL">La contraseña tiene que ser de 4 a 12 dígitos.</p>
          </div>

          <div class="formulario__mensajeL display-none" id="formulario__mensajeL">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
          <div class="formulario__mensajeL display-none" id="formulario_mensaje-ErrInfo">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Informacion inválida. </p>
          </div>
          <div class="formulario__mensajeL display-none" id="formulario_mensaje-ErrLogged">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Usted ya se encuentra logueado. </p>
          </div>
          <div class="formulario__mensajeL formulario_mensaje-success display-none" id="formulario_mensaje-Success">
            <p><i class="fas"></i> <b>Logrado:</b> ¡Usuario logueado con éxito! </p>
          </div>
        
          <div class="col-12 formulario__grupoL formulario__grupo-btn-enviarL">
            <button type="button" id="btnLogin" class="formulario__btnL mt-3 mb-4">Iniciar sesión</button>
            <p id="mensajeLogin">¿No tienes cuenta? <a href="./register">Click Aquí</a></p>
          </div>
      </form>
    </div>
  </div>


  <script>
    $('#BtnAbrirRegister').click(() => {
      $('#login').modal('hide');
    });
    $('#BtnAbrirLogin').click(() => {
      $('#register').modal('hide');
    });
  </script>