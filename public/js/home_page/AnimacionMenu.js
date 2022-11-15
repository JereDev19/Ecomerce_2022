/*Animacion - Header*/ 

waitingScroll = false;

let header = document.getElementById("header"); 

window.onscroll = () => {
  if(waitingScroll) return;
  waitingScroll = true;
  
  let scroll = document.documentElement.scrollTop;

  if (scroll > 100){
    header.classList.add('nav_mod');
  }else if (scroll < 100) {
    header.classList.remove('nav_mod');
  }

  setTimeout(() => {
    waitingScroll = false;
  }, 80);
}