let productCounter = 0;

$(document).ready( () =>{
  fetchPost("CountProductsInCart", "response", "Cart", true, "setProductCounter");
});

ButtonManager.registerButtonClickEvent(document.getElementById("cart_icon"), () =>{
  if(UserManager.isLogged()){
    toggleCartDropDown();
  }else{
    UserManager.redirectToLoginPage();
  }
}, false);

function setProductCounter(a){
  productCounter = Number(a);
  $("#BubbleAlertCarrito").html(a);
}

function getProductCounter(){
  return Number(productCounter);
}

function toggleCartDropDown(){
  let cartContainer = document.getElementById("cart-container");

  if(cartContainer.classList.contains("show")){
    $("#cartDropdown").prop("aria-expanded", false);
    document.getElementById("cart-container").classList.remove("show");
    $("#cart-container").removeProp("data-bs-poper");
  }else{
    loadCartItems();
    $("#cartDropdown").prop("aria-expanded", true);
    document.getElementById("cart-container").classList.add("show");
    $("#cart-container").prop("data-bs-poper", "none");
  }
}

function loadCartItems(){
  fetchPost("LoadCartContents", "response", "Cart", true, "loadCartContentsJson");
}

function loadCartContentsJson(response){
  if(response == "Error.") return;

  $("#StylesUl").html(""); //Reiniciar el container.

  let data = JSON.parse(response);

  for(let i = 0;i<data.length;i++){
    let product = data[i];

    let productName = product['productName'];
    let productAmount = product['productAmount'];
    let productImage = product['productImage'];

    let html = '<li id="StylesProducto" key="name">';
    html += '<img src="'+productImage+'" width="50" height="32" />';
    html += '<p class="fw-bold mt-2">'+productName+'</p><span class="mt-2">'+productAmount+'</span>';
    html += '</li>';

    let htmlElement = htmlToElement(html);
    $("#StylesUl").append(htmlElement);
  }
}

