/*Scroll - Header*/
$(document).ready(() => {

$("#scroll-top").click(() =>{
  document.documentElement.scrollTop = 0;
});
  
$("#scroll-destacados").click(() =>{
  document.documentElement.scrollTop = 1000;
});

$("#scroll-questions").click(() =>{
  document.documentElement.scrollTop = 1910;
});

$("#scroll-contact").click(() =>{
  document.documentElement.scrollTop = 2850;
});


// Scroll - Footer
$("#scroll-Precios-Footer").click(() => {
  document.documentElement.scrollTop = 1050;
});

$("#scroll-Ubicacion-Footer").click(() => {
  document.documentElement.scrollTop = 3670;
});

$("#scroll-Pedidos-Footer").click(() => {
  document.documentElement.scrollTop = 1050;
});

$("#scroll-Ayuda-Footer").click(() => {
  document.documentElement.scrollTop = 2800;
});

});