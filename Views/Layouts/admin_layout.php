
  <div class="d-flex" id="wrapper"> <!--Gracias a el display flex se concreta el sidebar al costado-->
    <!--Starts Sidebar-->
    <div class="bg-white" id="sidebar-wrapper">

      <div class="list-group list-group-flush my-3">
        <a href="/Admin/security" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-solid fa-lock me-4 mb-5 mt-5 mx-2"></i>Seguridad
        </a>
        <a href="/Admin/orders" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-solid fa-book me-4 mb-5 mt-5 mx-2"></i>Pedidos
        </a>
        <a href="/Admin/sales" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-solid fa-dollar-sign me-4 mb-5 mt-5 mx-2"></i>Ventas
        </a>
        <a href="/Admin/emails" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-solid fa fa-envelope-open-o me-4 mb-5 mt-5 mx-2"></i>Emails
        </a>
        <a href="/index.php" class="list-group-item list-group-item-action bg-transparent second-text text-danger fw-bold">
          <i class="fas fa-project-diagram me-4 mb-4 mt-5 mx-2"></i>Salir
        </a>

      </div>

    </div>

    <!--Ends Sidebar-->

  
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

        <div class="d-flex align-items-center" id="caja">
          <i class="fas fa-bars fs-4 me-3" id="menu-toggle"></i>
          <h4 class="fs-4 mt-1 m-0" id="title-panel">Panel</h4>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
             
  <script>

    let el = document.getElementById("wrapper");
    let toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = () => {
      el.classList.toggle("toggled")
    }

  </script>
