$(document).ready(function () {
    $("#formulario").validate({
        rules: { // reglas de validación
            numero: {
                required: true,
                number: true // opcional, para validar que sea número
            }
        },
        messages: { // mensajes personalizados para cada campo
            numero: {
                required: "Por favor, ingresa un número.",
                number: "Por favor, ingresa un valor numérico válido."
            }
        }
    });
});


//VALIDACION CON JS PURO:
// let inputNum = document.getElementById('numero');

// function validar() {
//     let num = inputNum.value.trim();
//     let lleno = true;

//     if (num === "") { //evaluo si está vacio
//         inputNum.style.border = "1px solid red";
//         alert("El campo debe estar lleno");
//         lleno = false;
//     } else {
//         inputNum.style.border = "1px solid"; //limpio el campo
//     }

//     return lleno;
// }