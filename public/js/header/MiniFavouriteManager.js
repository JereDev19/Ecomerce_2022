favouriteDropdown
ButtonManager.registerButtonClickEvent(document.getElementById("favourite_icon"), () =>{
  if(UserManager.isLogged()){
    toggleFavouriteDropDown();
  }else{
    UserManager.redirectToLoginPage();
  }
}, false);

function toggleFavouriteDropDown(){
  let favouriteContainer = document.getElementById("favourite-container");

  if(favouriteContainer.classList.contains("show")){
    $("#favouriteDropdown").prop("aria-expanded", false);
    document.getElementById("favourite-container").classList.remove("show");
    $("#favourite-container").removeProp("data-bs-poper");
  }else{
    loadFavouriteItems();
    $("#favouriteDropdown").prop("aria-expanded", true);
    document.getElementById("favourite-container").classList.add("show");
    $("#favourite-container").prop("data-bs-poper", "none");
  }
}

function loadFavouriteItems(){
  fetchPost("LoadFavouriteContents", "response", "Product", true, "loadFavouriteContentsJson");
}

function loadFavouriteContentsJson(response){
  if(response == "Error.") return;

  $("#StylesFl").html(""); //Reiniciar contenido.

  let data = JSON.parse(response);

  for(let i = 0;i<data.length;i++){
    let product = data[i];

    let productName = product['productName'];
    let productImage = product['productImage'];

    let html = '<li id="StylesProducto" key="name">';
    html += '<img src="'+productImage+'" width="50" height="32" />';
    html += '<p class="fw-bold mt-2">'+productName+'</p>';
    html += '<span><i class="fas fa-solid fa-heart fs-4 mt-2" id="iconFavList"></i></span>';
    html += '</li>';

    let htmlElement = htmlToElement(html);
    $("#StylesFl").append(htmlElement);
  }
}

