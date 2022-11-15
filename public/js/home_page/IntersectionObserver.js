const imagen1 = document.getElementById('productoTop1-Imagen');
const imagen2 = document.getElementById('productoTop2-Imagen');
const imagen3 = document.getElementById('productoTop3-Imagen');

const cargarImagen = (entradas, observador) => {
  //console.log(entradas)
  //console.log(observador)

  entradas.forEach((entrada) => {
    if(entrada.isIntersecting){
      entrada.target.classList.add('visible');
    } else {
      //entrada.target.classList.remove('visible');
    }
  });
}

// Creamos observador
const observador = new IntersectionObserver(cargarImagen, {
  root: null, //Hacemos referencia al viewport
  rootMargin: '500px 0px 100px 0px', 
  threshold: 1.0//Por donde queremos que se ejecute el codigo (cuando este toda la imagen)
}); 

// Ponemos a observar las imagenes
observador.observe(imagen1);
observador.observe(imagen2); 
observador.observe(imagen3); 