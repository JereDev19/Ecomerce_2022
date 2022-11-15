//Slider de las categorias
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
const slider = document.querySelector('.slider');
const categoriesList = document.getElementById('categoriesList');
const categoriesContainer = document.getElementById('categoriesContainer');
let categories = [];

$('.CategoryList .CategoryItem[category="all"]').addClass('ct_Item-Active');

prev.addEventListener('click',()=>{
    slider.scrollLeft -= 600;
});
next.addEventListener('click',()=>{
    slider.scrollLeft += 600;
});

//CARGAR CATEGORIAS
let position = 1;
let finished = false;

fetchPost("getModules", "response", "Module", true, "loadCategories");

function loadCategories(response){
  if(response == "Error.") return;
  
  let json = JSON.parse(response);
  
  for(let i = 0; i < json.length; i++){
    let counter = i+1;
    let data = json[i];
    let moduleName = data['moduleName'];
    let moduleId = data['moduleId'];

    let element = htmlToElement('<a href="#" class="btn border-dark CategoryItem" category="'+i+'">'+moduleName+'</a>');
    categoriesList.appendChild(element);

    let container = htmlToElement('<div class="container-fluid row product_item show" id="ctg'+counter+'" category="'+i+'"> </div>');
    categoriesContainer.appendChild(container);
    
    categories[moduleId] = {"position": counter, "moduleName": moduleName, "moduleId": moduleId};
  }

  // Cambia el color de los botones para el que seleccionaste
  $('.CategoryItem').click(function(){
    var catProduct = $(this).attr('category');

    // Agregando clase al enlace relacionado
    $('.CategoryItem').removeClass('ct_Item-Active');
    $(this).addClass('ct_Item-Active');

    // Oculta Productos
    $('.product_item').css('transform', 'scale(0)');

    categorySwitch(catProduct);

    function hideProduct(){
      $('.product_item').hide();
    } setTimeout(hideProduct, 400);

    // Muestra los Productos dependiendo de la categoria
    function showProduct(){
      $('.product_item[category="'+catProduct+'"]').show();
      $('.product_item[category="'+catProduct+'"]').css('transform', 'scale(1)');
    } setTimeout(showProduct,400);

    // Muestra todos los Productos
    $('.CategoryItem[category="all"]').click(function(){
      function showAll(){
          $('.product_item').show();
          $('.product_item').css('transform', 'scale(1)');
      } setTimeout(showAll,400);
    });
  });

  fetchPost("listProductsByPosition", "response", "Product", true, "loadProducts", {"position": 1}); //Carga los primeros productos.
}

//CARGAR PRODUCTS DINÁMICAMENTE.

$("footer").css("display", "none");

$(window).scroll(function(){
  let windowBottom = ($(document).height()) - ($(window).height());

  if(Math.ceil(Number($(window).scrollTop())) == windowBottom){
    if(finished == true){
      alterFinishedState(true);
      return;
    }
    position = position+1;
    fetchPost("listProductsByPosition", "response", "Product", true, "loadProducts", {"position": position});
  }
});

//VERIFICAR ANCHO DE LA PÁGINA
if($(window).width() > 991){
  if(finished == true){
    alterFinishedState(true);
  }else{
    position = position+1;
    fetchPost("listProductsByPosition", "response", "Product", true, "loadProducts", {"position": position});
  }
  
}

function loadProducts(response){
  let json = JSON.parse(response);
  if(json == "Null."){
    alterFinishedState(true);
    return;
  }

  for(let i = 0; i < json.length; i++){
    let data = json[i];
    let productId = data['productId'];
    let productName = data['productName'];
    let productDescription = data['productDescription'];
    let productImage = "/Images/Products/"+productId+"/355x240.png";
    let productCategory = data['productModule'];

    let element = createProductCard(productName, productDescription, productImage, i, productId);

    if(typeof categories[productCategory] === 'undefined'){
      document.getElementById('ctgAll').appendChild(element);
    }else{
      document.getElementById('ctg'+categories[productCategory]['position']).appendChild(element);
    }

    $("#addToCart"+i).click(() =>{
      fetchPost("AddTopProductToCart", "response", "Cart", true, "showAnswerMessage", {"productId": productId});
    });
  }

  if(json.length < 3){
    alterFinishedState(true);
    return;
  }
}

function createProductCard(productName, productDescription, productImage, index, productId){
  let html = '<div class="col-lg-4 col-md-6 mb-lg-0 pb-5">';
  html += '<div class="card border" id="product">';
  html += '<img src="'+productImage+'" id="productoTop1-Imagen" class="img-fluid">';
  html += '<div class="p-3 info-card">';
  html += '<h5 class="pb-3" id="productoNombre">'+productName+'</h5>';
  html += '<p class="pb-2" id="productoDescripcion">'+productDescription+'</p>';
  html += '<a><button class="mt-2 main-btn bg-warning" id="addToCart'+index+'">Añadir al carrito</button></a>';
  html += '<a href="/Product/get/'+productId+'"><button class="mt-2 main-btn bg-warning">Leer más</button></a>';
  html += '</div> </div> </div>';

  return htmlToElement(html);
}


function alterFinishedState(state){
  finished = state;
  if(state) $("footer").css("display", "block");
}

function categorySwitch(category){
  let categories = document.getElementsByClassName("product_item");
  
  for(let i = 0; i < categories.length; i++){
    categories[i].innerHTML = '';
  }

  if(typeof categories[category] === 'undefined'){
    c
  }
  console.log(categories[category]);
  

  position = 1;
  fetchPost("listProductsByPosition", "response", "Product", true, "loadProducts", {"position": position});
}

function showAnswerMessage(response){
  if(response == "Error."){
    console.log("Error al añadir el producto al carrito.");
  }else{
    setProductCounter(getProductCounter()+1);
  }
}

//Animacion al Scrollear
const products = document.querySelectorAll(".product_item")

const observer = new IntersectionObserver(entries =>{
entries.forEach(entry =>{
  if(entry.isIntersecting){
      entry.target.classList.add("show")
  }
})
},{
//root: null,
//rootMargin: '0px',
threshold: 0.7
})

products.forEach(product =>{
  observer.observe(product)
})