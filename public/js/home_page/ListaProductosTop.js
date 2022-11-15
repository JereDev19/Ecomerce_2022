//CARGAR TODOS LOS PRODUCTOS TOP.

$(document).ready(() =>{
  fetchPost("TopStarProducts", "topProducts", "Product", true, "loadTopProducts");
});

function loadTopProducts(response){
  if(response == "") return;

  let products = JSON.parse(response);

  //Carga los productos top recibidos de PHP.
  for(let i = 0;i<products.length;i++){
    let index = i+1;
    let product = products[i];
    $("#productoTop"+index+"-Nombre").html(product['productName']);
    $("#productoTop"+index+"-Descripcion").html(product['productDescription']);
    $("#productoTop"+index+"-Imagen").attr("src", "/Images/Products/"+product['productId']+"/355x240.png");
    $("#productoTop"+index+"-LeerMas").attr("href", "/Product/get/"+product['productId']);

    //Añade funcionalidad al botón de añadir al carrito.
    $("#productoTop"+index+"-Carrito").click(() =>{
      fetchPost("AddTopProductToCart", "response", "Cart", true, "showAnswerMessage", {"productId": products[i]['productId']});
    });
  }
}

/*---------------------------------------------------------------------------------------------------*/

//FUNCIONES DEL CARRITO

function showAnswerMessage(response){
  if(response == "Error."){
    console.log("Error al añadir el producto al carrito.");
  }else{
    setProductCounter(getProductCounter()+1);
  }
}