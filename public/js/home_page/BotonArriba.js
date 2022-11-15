$(window).scroll(function() {

    if ($(this).scrollTop() > 300) {
        $('boton').fadeIn();
    }else{
        $('boton').fadeOut();
    }
})

$(window).scroll(function() {
    if ($(this).scrollTop() > 600) {
        $('#boton').fadeIn();
    }else{
        $('#boton').fadeOut();
    }
});


$('boton').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, 800);
});

$('#boton').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, 0);
 })


// Explicación de la logica

/* Con el objeto window y el método scroll de jQuery verificamos la posición actual del scroll para mostrar u ocultar el botón según sea el caso. En específico se mostrará el botón si el usuario ha desplazado 300px hacia abajo la página y se ocultará en caso contrario.

Luego se define la acción click del botón la cual recibe como parámetro la variable event que contiene toda la información del evento que se acaba de ejecutar (click) y se utiliza el método preventDefault para evitar el comportamiento por defecto del botón. 

Finalmente aplico una animación (desplazar hacia arriba) con el método animate que recibe dos parámetros: el primero es la animación a aplicar y el segundo la duración de tal animación. */
