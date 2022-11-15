const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
let btnContact = document.getElementById('btnContact');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	nombre: false,
	gmail: false
}

const validarFormulario = (e) => {
	
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre'); /*Expression regular para validar, el input que vamos a validar, nombre del input*/ 
			
		break;

		case "email":
			validarCampo(expresiones.correo, e.target, 'gmail'); /*Expression regular para validar, el input que vamos a validar, nombre del input*/ 
		break;
	}
}

/* Le tenemos que pasar tres parametros que son necesarios para la validacion. */
/* 1 - Que expresion vamos a utilizar para validar - Usuario,nombre,password,correo o telefono. */
/* 2 - Que input validaremos. */
/* 3 - Va ser el prefijo que tienen los inputs. Si quiero validar el input de correo - el campo será grupo__correo.*/

const validarCampo = (expresion, input, campo) => {
	
	if(expresion.test(input.value)){
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
	if(input.value == ''){
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});


btnContact.addEventListener('click', (e) => {
	e.preventDefault();
	const terminosContact = document.getElementById('terminosContact');
	
	if(campos.nombre && campos.gmail && terminosContact.checked) { 
    fetchPost("formulario", "response", "Email", true, "checkEmailSent");
    
		formulario.reset();
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo'); /*Despues de 5 segundo se elimina el mensaje*/ 
		}, 5000);
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 6000)
	}
});

function checkEmailSent(response){
  
}