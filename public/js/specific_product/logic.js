$(document).ready(() =>{
  /** Manejar las estrellas del producto */
  let userStarsAmount = Number($("#userStarsAmount").text());

  //Añadirlas al cargar el documento.
  for(let i = 1;i<=userStarsAmount;i++){
    $("#Stars-"+i).css("color", "orange");
  }

  /** Manejar el botón de añadir al carrito. */
  let url = window.location.pathname.split('/');
  let productId = url[3];

  //TODO VERIFICAR QUE EL USUARIO ESTÉ LOGUEADO AL DARLE A AÑADIR AL CARRITO.

  $("#btn-Addcart").click(() =>{
    let productAmount = Number($("#inputCant").val());
    fetchPost("AddTopProductToCart", "response", "Cart", true, "validateAddedToCart", {"productId": productId, "productAmount": productAmount});
  });

  //Revisa cuántas estrellas han sido clickeadas.
  document.getElementById('starsSelector').addEventListener('click', e => {
    let targetId = e.target.id.slice(6);
    fetchPost("SetStarsToProduct", "response", "Product", true, "validateStablishedStars", {"productId": productId, "starsAmount": targetId});

    //Remover estrellas.
    for(let i = 1;i<=5;i++){
      $("#Stars-"+i).css("color", "black");
    }

    //Añadir estrellas.
    for(let i = 1;i<=targetId;i++){
      $("#Stars-"+i).css("color", "orange");
    }
  });

  //MANEJAR EL CORAZÓN
  handleHeart(productId);
});

function handleHeart(productId){
  let svgHeart = document.getElementById('svgHeart');

  svgHeart.addEventListener('click', () => {
    let resulBackground = svgHeart.style.fill;
    if(resulBackground === 'transparent') {
      svgHeart.style.fill = 'orange';
      activateHeart(productId);
    }else{
      svgHeart.style.fill = 'transparent';
      deactivateHeart(productId);
    }
  });
}

function activateHeart(productId){
  fetchPost("AddFavouriteProduct", "response", "Product", true, "validateAddedToFav", {"productId": productId});
}

function deactivateHeart(productId){
  fetchPost("RemoveFavouriteProduct", "response", "Product", true, "validateRemovedFromFav", {"productId": productId});
}

function validateAddedToCart(response){
  if(response == "Error."){
    
  }else{
    let amount = Number(response);
    setProductCounter(getProductCounter()+amount);
  }
}

function validateAddedToFav(response){
  if(response == "Success."){
    //exito al añadir.
  }else{

  }
}

function validateRemovedFromFav(response){
  if(response == "Success."){
    //exito al remover.
  }else{

  }
}

function validateStablishedStars(response){
  if(response == "Success."){
    //exito al añadir.
  }else{

  }
}
