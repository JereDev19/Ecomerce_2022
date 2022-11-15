<link rel="stylesheet" href="/css/register/style.css">
<script src="/js/register/Validacion_Register.js" defer></script>

<!--Register-->

<div class="modal-content mt-5" id="modal-content-register">
  <div class="modal-header">
    <h5 class="modal-title">Crear cuenta</h5>
    <button type="button" class="btn-close" id="CerrarModalRegister" data-bs-dismiss="modal"></button>
  </div>
  <div class="modal-body">
    <form class="formulario row g-3" id="FormRegister">
      <!-- Grupo: Nombre -->
      <div class="col-md-12 formulario__grupoLR mb-4" id="grupo__nombreLR">
        <label for="nombreLR" class="formulario__labelLR mb-2">Nombre:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="nombreLR" id="nombreLR" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
      <!-- Grupo: Apellido 1 -->
      <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__apellido1LR">
        <label for="apellido1LR" class="formulario__labelLR mb-2">Primer apellido:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="apellido1LR" id="apellido1LR" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
        <!-- Grupo: Apellido 2 -->
        <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__apellido2LR">
        <label for="apellido2LR" class="formulario__labelLR mb-2">Segundo apellido:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="apellido2LR" id="apellido2LR" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
      <!-- Grupo: Ciudad -->
      <div class="col-md-12 formulario__grupoLR mb-4" id="grupo__ciudad">
        <label for="ciudad" class="formulario__labelLR mb-2">Ciudad:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="ciudad" id="ciudad" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
      <!-- Grupo: Calle -->
      <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__calle">
        <label for="calle" class="formulario__labelLR mb-2">Calle:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="calle" id="calle" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
        <!-- Grupo: Cogio postal -->
        <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__postal">
        <label for="postal" class="formulario__labelLR mb-2">Codigo Postal:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="postal" id="postal" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
      <!-- Grupo: Contraseña -->
      <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__passwordLR">
        <label for="passwordLR" class="formulario__labelLR mb-2">Contraseña:</label>
        <div class="formulario__grupo-inputLR">
          <input type="password" class="formulario__inputLR" name="passwordLR" id="passwordLR" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
      <!-- Grupo: Contraseña 2 -->
      <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__password2LR">
        <label for="password2LR" class="formulario__labelLR mb-2">Repetir Contraseña:</label>
        <div class="formulario__grupo-inputLR">
          <input type="password" class="formulario__inputLR" name="password2LR" id="password2LR" placeholder="Ingrese aquí" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">Ambas contraseñas deben ser iguales.</p>
      </div>
      <!-- Grupo: Correo Electronico -->
      <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__correoLR">
        <label for="correoLR" class="formulario__labelLR mb-2">Correo Electrónico:</label>
        <div class="formulario__grupo-inputLR">
          <input type="email" class="formulario__inputLR" name="correoLR" id="correoLR" placeholder="correo@gmail.com" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>
      <!-- Grupo: Teléfono -->
      <div class="col-md-6 formulario__grupoLR mb-4" id="grupo__telefonoLR">
        <label for="telefonoLR" class="formulario__labelLR mb-2">Teléfono:</label>
        <div class="formulario__grupo-inputLR">
          <input type="text" class="formulario__inputLR" name="telefonoLR" id="telefonoLR" placeholder="+598 00 000 000" required>
          <i class="formulario__validacion-estadoLR fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-errorLR">La sintaxis no es correcta</p>
      </div>

      <div class="col-md-12 formulario__grupoLR" id="grupo__captcha">
        <label class="formulario__labelLR"></label>
        <div class="g-recaptcha" data-sitekey="6Lelq80hAAAAADDMOLPzshJw50ao9rYqn7UkgNyY"></div>
      </div>

      <!-- Grupo: Terminos y Condiciones -->
      <div class="col-md-6 formulario__grupoLR" id="grupo__terminos">
        <label class="formulario__labelLR">
          <input class="formulario__checkboxLR" type="checkbox" name="terminosLR" id="terminosLR" required>
          Acepto los Terminos y Condiciones
        </label>
      </div>

      <div class="formulario__mensajeLR display-none" id="formulario__mensajeLR">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__mensajeLR display-none" id="formulario_mensaje-ErrInfoLR">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Informacion inválida. </p>
      </div>
      <div class="formulario__mensajeLR display-none" id="formulario_mensaje-ErrRegister">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Usted ya se encuentra registrado. </p>
      </div>
      <div class="formulario__mensajeLR formulario_mensaje-success display-none" id="formulario_mensaje-SuccessRegister">
        <p><i class="fas"></i> <b>Logrado:</b> ¡Usuario registrado con éxito! Se le ha enviado un correo para verificar su cuenta. </p>
      </div>

      <div class="col-12 formulario__grupoLR formulario__grupo-btn-enviarLR">
        <button type="button" id="btnLR" class="formulario__btnLR mt-3 mb-4">Crear cuenta</button>
        <p id="mensajeRegister" class="ml-3">¿Ya tienes cuenta? <a href="/User/login" id="BtnAbrirLogin">Click Aquí</a></p>
      </div>
    </form>
  </div>
</div>