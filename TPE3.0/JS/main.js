"use strict";

//Menu responsive

document.querySelector(".btn_menu").addEventListener("click", toggleMenu);

function toggleMenu() {

  document.querySelector(".navegacion").classList.toggle("show");
}


//Validacion Formulario

let num1 = Math.floor((Math.random()*10)+1);
let num2 = Math.floor((Math.random()*10)+1);


let solicitud = document.querySelector("#pedido");

solicitud.innerHTML = `Ingrese el Resultado de ${num1} + ${num2}`;

let captcha = document.querySelector("#mensaje");

let botonCaptcha=document.querySelector("#enviar");
botonCaptcha.addEventListener("click",enviarFormulario);


/*busco en el html el resultado */
function enviarFormulario(e){

    e.preventDefault();

    let ingresado=document.querySelector("#resultado");
  /* aca pongo en una variable el valor que pone el usuario */
    let valorUsuario = ingresado.value;

    if (valorUsuario == num1 + num2){
      captcha.innerHTML="Captcha validado, Datos Enviados";
    }
    else {
      captcha.innerHTML="Datos Incorrectos";

        
    }

}


