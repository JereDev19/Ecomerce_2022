<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="/css/products/products.css">
<script src="/js/products/product.js" defer></script>

<!-- centro -->
  <section id="menu">
    <div class="container">
      <div class="row">
          <div class="col-12 intro-text text-center">
              <h1>Explora nuestro menú</h1>
              <p class="pb-3">¡Encuentra los mejores productos para lo que necesites!</p>
          </div>
      </div>
    </div>

    <div class="container p-4" id="categorias">
      <button class="btn control prev" id="prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
      </button>
        <div class="slider align-items-center justify-content-center CategoryList" id="categoriesList">
          <a href="#" class="btn border-dark CategoryItem" category="all">Todo</a>
        </div>
      <button class="btn control next" id="next">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
      </button>
    </div>
    <section class="product-list">
      <div class="container-fluid" id="categoriesContainer"> 
      <div class="container-fluid row product_item show" id="ctgAll" category="all"> </div> 
    </section>

    <!--Botón de ir hacia arriba-->
    <a class="boton" id="boton">
      <i class="fas fa-solid fa-arrow-up"></i>
    </a>
  </section>