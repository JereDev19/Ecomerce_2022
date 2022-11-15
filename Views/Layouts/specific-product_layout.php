<link rel="stylesheet" href="/css/specific_product/main.css">
<script src="/js/specific_product/logic.js" defer></script>
  
  <section class="container productInfo my-5 pt-5 pb-5">
    <div class="row mt-5">
      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 pb-5">

        <p id="userStarsAmount" style="display: none;"><?= $starsAmount ?></p>
        <div class="w-500 pb-1">
          <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" class="d-block w-100">
              </div>
            </div>
          </div>
        </div>
      
        <div class="small-img-group">
          <div class="small-img-col">
            <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" width="100%" class="small-img">
          </div>
          <div class="small-img-col">
            <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" width="100%" class="small-img">
          </div>
          <div class="small-img-col">
            <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" width="100%" class="small-img">
          </div>
          <div class="small-img-col">
            <img src="/Images/Products/<?= $productId ?>/<?= $productImage ?>" width="100%" class="small-img">
          </div>
        </div>
      </div>
    
      <div class="container-fluid col-lg-6 col-md-12 col-12" id="info-product">

        <div class="valoracion pb-5" id="starsSelector">
          <label id="Stars-5">★</label>
          <label id="Stars-4">★</label>
          <label id="Stars-3">★</label>
          <label id="Stars-2">★</label>
          <label id="Stars-1">★</label>
        </div>

        <h2 class="pb-1"><?= $productName ?></h2>
        <h3 class="py-4 pb-3">$UYU <?= $productPrice ?></h3>
        <input type="number" id="inputCant" value="1" max="100" min="1" class="col-lg-8 col-md-12 col-12">

        <div class="icon col-xl-12 col-lg-12 col-md-9 col-8">

            <button id="btn-Addcart" class="col-lg-7 col-md-12 col-12 my-4">Añadir al carrito</button>

            <svg style="fill: <?= $heartColor ?>" class="heart-main" viewBox="0 0 512 512" width="100" title="heart" id="svgHeart">
              <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
            </svg>

        </div>

        <p id="stockDisponible">Stock disponible: <?= $productStock ?> Unidades</p>
  
      </div>

      <div class="container col-md-12 col-12">
        <h5 class="mt-5 mb-4">Detalles del producto:</h5>
        <span><?= $productDescription ?></span>
      </div>

    </div>
  </section>