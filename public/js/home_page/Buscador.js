$("#icono-busqueda").click(mostrar_buscador);
$("#fondo").click(ocultar_buscador);

const BarraBusqueda = document.getElementById("contenedor_barra_busqueda");
const InputBusqueda = document.getElementById("inputBusqueda");
const caja_busqueda = document.getElementById('caja_busqueda');

let cantidadDeLetras = 0;

// Funcion para mostrar el buscador - se llama de AnimacionScroll
function mostrar_buscador(){
  if(BarraBusqueda.style.top == "90px"){
    ocultar_buscador();
    return;
  }

  BarraBusqueda.style.top = "90px"; /*Baja el buscador*/ 
  InputBusqueda.focus(); /*El input esta preparado para escribir*/ 

  if (InputBusqueda.value === "") {
    caja_busqueda.style.display = "none";
  }
}

// Funcion para ocultar el buscador - se llama de AnimacionScroll 
function ocultar_buscador(){
  BarraBusqueda.style.top = "-80px";
  InputBusqueda.value = "";
  caja_busqueda.style.display = "none";

  cantidadDeLetras = 0;
}

// Funcionalidad al buscador
document.getElementById("inputBusqueda").addEventListener("keyup", buscador_interno);

function buscador_interno() {

  cantidadDeLetras = $(event.target).val().length; //Retorna cuántos valores tiene escritos.

  if(cantidadDeLetras == 1){
    fetchPost("SearchProductsByLetter", "caja_busqueda", "Product", true, "cargarProductosEnBusqueda", {text: InputBusqueda.value});
    return;
  }

  cargarProductosEnBusqueda();
}

function cargarProductosEnBusqueda(){
  filter = InputBusqueda.value.toUpperCase();
  li = caja_busqueda.getElementsByTagName('li');

  // Recorriendo elementos a filtrar mediante los "li"
  for (let i = 0; i < li.length; i++) {

    a = li[i].getElementsByTagName('a')[0];
    textValue = a.textContent || a.innerText;

    if (textValue.toUpperCase().indexOf(filter) > -1) {

      li[i].style.display = "";
      caja_busqueda.style.display = "block";

      if (InputBusqueda.value === "") {
        caja_busqueda.style.display = "none";
      }

    } else {
      li[i].style.display = "none";
    }
  }
}